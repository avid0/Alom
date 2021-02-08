<?php

/**
 * Alom 2.1
 * Unpacked by Tesla
 * https://github.com/0x11DFE
 */

if (!class_exists('AlomEncoder')) {
    if (!defined('ALOM_VERSION')) {
        define('ALOM_VERSION', '2.1');
    }
    if (!defined('T_NULLSAFE_OBJECT_OPERATOR')) {
        define('T_NULLSAFE_OBJECT_OPERATOR', NULL);
    }
    if (!defined('T_FN')) {
        define('T_FN', NULL);
    }
    if (!defined('T_COALESCE')) {
        define('T_COALESCE', NULL);
    }
    if (!defined('T_COALESCE_EQUAL')) {
        define('T_COALESCE_EQUAL', NULL);
    }

    class AlomEncoder
    {
        private static $mt_prng_seed = 1;
        private static $key = [0x67452301, 0xefcdab89];
        private static $fky = [];
        private static $obfstime = 0;

        public static function getmd5ikey($str) { return md5($str . ':' . microtime() . ':' . lcg_value(), TRUE); }

        public static function getasciiikey($len)
        {
            if (function_exists('random_bytes')) return random_bytes($len);
            $str = '';
            for ($i = 0; $i * 16 < $len; ++$i) $str .= getmd5ikey($str . $len);
            return substr($str, 0, $len);
        }

        public static function getcharikey() { return self::getasciiikey(1); }

        public static function getbitikey() { return ord(self::getcharikey()) & 1; }

        public static function getintikey()
        {
            $ikey = unpack('N', self::getasciiikey(4));
            return $ikey[1];
        }

        public static function minify($src)
        {
            $IW = [
                T_CONCAT_EQUAL,
                T_DOUBLE_ARROW,
                T_BOOLEAN_AND,
                T_BOOLEAN_OR,
                T_IS_EQUAL,
                T_IS_NOT_EQUAL,
                T_IS_SMALLER_OR_EQUAL,
                T_IS_GREATER_OR_EQUAL,
                T_INC,
                T_DEC,
                T_PLUS_EQUAL,
                T_MINUS_EQUAL,
                T_MUL_EQUAL,
                T_DIV_EQUAL,
                T_IS_IDENTICAL,
                T_IS_NOT_IDENTICAL,
                T_DOUBLE_COLON,
                T_PAAMAYIM_NEKUDOTAYIM,
                T_OBJECT_OPERATOR,
                T_DOLLAR_OPEN_CURLY_BRACES,
                T_AND_EQUAL,
                T_MOD_EQUAL,
                T_XOR_EQUAL,
                T_OR_EQUAL,
                T_SL,
                T_SR,
                T_SL_EQUAL,
                T_SR_EQUAL,
            ];
            $tokens = token_get_all($src);
            $new = "";
            $c = sizeof($tokens);
            $iw = FALSE;
            $ih = FALSE;
            $ls = "";
            $ot = NULL;
            for ($i = 0; $i < $c; ++$i) {
                $token = $tokens[$i];
                if (is_array($token)) {
                    [$tn, $ts] = $token;
                    $tname = token_name($tn);
                    if ($tn == T_INLINE_HTML) {
                        $new .= $ts;
                        $iw = FALSE;
                    } else {
                        if ($tn == T_OPEN_TAG) {
                            $ts = rtrim($ts);
                            $ts .= " ";
                            $new .= $ts;
                            $ot = T_OPEN_TAG;
                            $iw = TRUE;
                        } else if ($tn == T_OPEN_TAG_WITH_ECHO) {
                            $new .= $ts;
                            $ot = T_OPEN_TAG_WITH_ECHO;
                            $iw = TRUE;
                        } else if ($tn == T_CLOSE_TAG) {
                            if ($ot == T_OPEN_TAG_WITH_ECHO) $new = rtrim($new, "; "); else $ts = " " . $ts;
                            $new .= $ts;
                            $ot = NULL;
                            $iw = FALSE;
                        } else if (in_array($tn, $IW)) {
                            $new .= $ts;
                            $iw = TRUE;
                        } else if ($tn == T_CONSTANT_ENCAPSED_STRING || $tn == T_ENCAPSED_AND_WHITESPACE) {
                            if ($ts[0] == '"') $ts = addcslashes($ts, "\n\t\r");
                            $new .= $ts;
                            $iw = TRUE;
                        } else if ($tn == T_WHITESPACE) {
                            $nt = isset($tokens[$i + 1]) ? $tokens[$i + 1] : NULL;
                            if (!$iw && (!is_string($nt) || $nt == '$') && !in_array($nt[0], $IW)) $new .= " "; else if ($nt !== NULL && isset($tokens[$i - 1]) && ($tokens[$i - 1] == '.' || $tokens[$i + 1] == '.') && ($tokens[$i - 1][0] == T_LNUMBER || $tokens[$i + 1][0] == T_LNUMBER)) $new .= " ";
                            $iw = FALSE;
                        } else if ($tn == T_START_HEREDOC) {
                            $new .= "<<<S\n";
                            $iw = FALSE;
                            $ih = TRUE;
                        } else if ($tn == T_END_HEREDOC) {
                            $new .= "S;";
                            $iw = TRUE;
                            $ih = FALSE;
                            for ($j = $i + 1; $j < $c; ++$j) {
                                if (is_string($tokens[$j]) && $tokens[$j] == ";") {
                                    $i = $j;
                                    break;
                                } else if ($tokens[$j][0] == T_CLOSE_TAG) break;
                            }
                        } else if ($tn == T_COMMENT || $tn == T_DOC_COMMENT) {
                            $iw = TRUE;
                        } else {
                            $new .= $ts;
                            $iw = FALSE;
                        }
                    }
                    $ls = "";
                } else {
                    $new .= $token;
                    $ls = $token;
                    $iw = TRUE;
                }
            }
            return $new;
        }

        private static function strshuffle($st)
        {
            $len = strlen($st) - 1;
            for ($i = 0; $i <= $len; ++$i) {
                $r = rand(0, $len);
                if ($r != $i) {
                    $t = $st[$i];
                    $st[$i] = $st[$r];
                    $st[$r] = $t;
                }
            }
            return $st;
        }

        private static function arrayshuffle(&$arr)
        {
            $len = count($arr) - 1;
            for ($i = 0; $i <= $len; ++$i) {
                $r = rand(0, $len);
                if ($r != $i) {
                    $t = $arr[$i];
                    $arr[$i] = $arr[$r];
                    $arr[$r] = $t;
                }
            }
            return $arr;
        }

        private static function base64encode($st)
        {
            $s = self::strshuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRSTUVWXYZ+/=");
            $res = '';
            for ($i = 0; isset($st[$i]); $i += 3) {
                $i1 = isset($st[$i + 1]);
                $a1 = ord($st[$i]);
                $a2 = $i1 ? ord($st[$i + 1]) : 0;
                $res .= $s[$a1 >> 2];
                $res .= $s[(($a1 & 3) << 4) | ($a2 >> 4)];
                if ($i1) {
                    $i2 = isset($st[$i + 2]);
                    $a3 = $i2 ? ord($st[$i + 2]) : 0;
                    $res .= $s[(($a2 & 15) << 2) | ($a3 >> 6)];
                    if ($i2) $res .= $s[$a3 & 63]; else $res .= 'Q';
                } else $res .= 'QQ';
            }
            return $res;
        }

        private static function encode($st, $sl1, $sl2, $fa = FALSE)
        {
            srand($sl1 ^ $sl2 & 0x7fffffff);
            $sl1 ^= rand();
            $sl2 ^= rand();
            if ($fa) {
                if (strlen($st) < 2) return $st;
                $sl = $sl1 ^ $sl2 ^ rand();
                $st = array_values(unpack('C*', $st));
                $r = [rand(0, 0xff), rand(0, 0xff), rand(0, 0xff), rand(0, 0xff)];
                $st[0] ^= $r[3];
                $i = count($st) - 1;
                $st[0] = ($st[0] - (($sl >> ($i & 63)) & 0xff) + 0x100 & 0xff) ^ $st[$i];
                for (--$i; $i >= 0; --$i) $st[$i + 1] = ($st[$i + 1] - (($sl >> ($i & 63)) & 0xff) + 0x100 & 0xff) ^ $st[$i];
                $st[0] ^= $r[2];
                $i = count($st) - 1;
                $st[0] = ($st[0] ^ (($sl2 >> ($i & 63)) & 0xff)) - $st[$i] + 0x100 & 0xff;
                for (--$i; $i >= 0; --$i) $st[$i + 1] = ($st[$i + 1] ^ (($sl2 >> ($i & 63)) & 0xff)) - $st[$i] + 0x100 & 0xff;
                $st[0] ^= $r[1];
                $i = count($st) - 1;
                $st[0] = ($st[0] ^ (($sl1 >> ($i & 63)) & 0xff)) - $st[$i] + 0x100 & 0xff;
                for (--$i; $i >= 0; --$i) $st[$i + 1] = ($st[$i + 1] ^ (($sl1 >> ($i & 63)) & 0xff)) - $st[$i] + 0x100 & 0xff;
                $st[0] ^= $r[0];
                array_unshift($st, 'C*');
                return call_user_func_array('pack', $st);
            }
            $t0 = range(0, 0xff);
            $t1 = range(0, 0xff);
            self::arrayshuffle($t0);
            self::arrayshuffle($t1);
            $u0 = array_combine($t0, array_keys($t0));
            $u1 = array_combine($t1, array_keys($t1));
            $len = strlen($st);
            $sq = ceil(pow($len, 5 / 11));
            $sl = (int)($sl1 + $sl2) & 0xffffffff;
            $rounds = ($fa ? -1 : (($sl & 0x3) ^ (($sl >> 8) & 0x3) ^ ($sl2 & 0x3)) + 0x1a) + floor(log($len + 2, 2) - 1);
            $sl = ($sl & 0xff) ^ ($sl1 & 0xff) ^ (($sl >> 16) & 0xff) ^ 1;
            if ($len == 0) return '';
            if ($len == 1) return chr($u1[$u0[ord($st) ^ $sl] ^ $sl] ^ $sl);
            $st = array_values(unpack('C*', $st));
            $l4 = $sq * 4;
            for ($round = $rounds - 1; $round >= 0; --$round) {
                srand(($sl1 ^ $sl2) + ($round * 12329) & 0x7fffffff);
                $randpack = [];
                for ($i = 1; $i <= $l4; $i += 4) {
                    $randpack[$l4 - $i] = rand(0, $len - 1);
                    $randpack[$l4 - $i - 1] = rand(0, $len - 2);
                    $randpack[$l4 - $i - 2] = rand(0, $len - 2);
                    $randpack[$l4 - $i - 3] = rand(0, $len - 2);
                }
                for ($i = 0; $i < $sq; ++$i) {
                    $p = $randpack[$i * 4 + 3];
                    $p1 = $randpack[$i * 4 + 2];
                    $p2 = $randpack[$i * 4 + 1];
                    $p3 = $randpack[$i * 4 + 0];
                    if ($p1 >= $p) ++$p1;
                    if ($p2 >= $p) ++$p2;
                    if ($p3 >= $p) ++$p3;
                    $st[$p2] = $u0[$st[$p2] - $st[$p] + 0x100 & 0xff] ^ $st[$p] ^ $sl;
                    $st[$p3] = $u1[$st[$p3] - $st[$p] + 0x100 & 0xff] ^ $st[$p] ^ $sl;
                    $st[$p1] = $u0[$st[$p1] - $st[$p] + 0x100 & 0xff] ^ $st[$p] ^ $sl;
                    $st[$p] = $u1[$u0[$st[$p] ^ $t1[$st[$p1]]] - $st[$p2] + 0x100 & 0xff] ^ $st[$p3];
                    $st[$p] = $u1[$st[$p] - $st[$p1] + 0x100 & 0xff] - $st[$p1] + 0x100 & 0xff;
                    $st[$p] = $u0[$st[$p] - $st[$p3] + 0x100 & 0xff] ^ $st[$p3];
                    $st[$p] ^= $sl;
                    $st[$p] = $u1[$st[$p] - $st[$p2] + 0x100 & 0xff] ^ $st[$p1];
                    $st[$p] = $u0[$st[$p] ^ $st[$p1]] - $st[$p3] + 0x100 & 0xff;
                    $st[$p] = $u1[$st[$p] ^ $st[$p3]] - $st[$p2] + 0x100 & 0xff;
                }
            }
            array_unshift($st, 'C*');
            return call_user_func_array('pack', $st);
        }

        private static function inc($str, $sl1, $sl2, $fa = FALSE)
        {
            AlomEncoder::mt_prng_reset();
            AlomEncoder::mt_prng_store($sl1 ^ $sl2 ^ rand());
            $str .= pack('V2', rand() ^ $sl1, rand() ^ $sl2);
            srand($sl1 ^ $sl2 & 0x7fffffff);
            $str = self::encode($str, rand() ^ $sl2, rand() ^ $sl1, $fa);
            return $str;
        }

        private static function encodew($st, $sl1, $sl2)
        {
            static $t0, $t1, $u0, $u1;
            if ($st === TRUE) {
                $t0 = range(0, 0xff);
                self::arrayshuffle($t0);
                $t1 = range(0, 0xff);
                self::arrayshuffle($t1);
                $u0 = array_combine($t0, array_keys($t0));
                $u1 = array_combine($t1, array_keys($t1));
                return;
            }
            $sl1 ^= 0x392cc908;
            $sl2 ^= 0x33541515;
            $sl1 ^= $t0[$sl1 & 0xff] ^ 0xafb655d5;
            $sl2 ^= $t1[$sl2 & 0xff] ^ 0x9cd52c07;
            $len = strlen($st);
            $sl = (int)($sl1 + $sl2) & 0xffffffff;
            $rounds = (($sl & 0x5) ^ (($sl >> 8) & 0x5) ^ ($sl2 & 0x5)) + 0xa + floor(log($len + 2, 2) - 1);
            $sl = ($sl & 0xff) ^ ($sl1 & 0xff) ^ (($sl >> 16) & 0xff);
            if ($len == 0) return '';
            if ($len == 1) return chr($u1[$u0[ord($st) ^ $sl] ^ $sl] ^ $sl);
            $l1 = $len - 1;
            $st = array_values(unpack('C*', $st));
            for ($round = $rounds - 1; $round >= 0; --$round) {
                for ($i = $len - 1; $i >= 0; --$i) {
                    $p = (($i * 0xf) % $len + 0x37d973 + $round) % $len;
                    $p1 = (($i * 0xb) % $l1 + ($p * 0x9) % $l1 + 0x2e1081) % $l1;
                    $p2 = (($i * 0x7) % $l1 + ($p1 * 0x9) % $l1 + 0x105977) % $l1;
                    $p3 = (($i * 0x3) % $l1 + ($p2 * 0x1) % $l1 + 0x17d10f) % $l1;
                    if ($p1 >= $p) ++$p1;
                    if ($p2 >= $p) ++$p2;
                    if ($p3 >= $p) ++$p3;
                    $st[$p2] = $u0[$st[$p2] - $st[$p] + 0x100 & 0xff] ^ $st[$p] ^ $sl;
                    $st[$p3] = $u1[$st[$p3] - $st[$p] + 0x100 & 0xff] ^ $st[$p] ^ $sl;
                    $st[$p1] = $u0[$st[$p1] - $st[$p] + 0x100 & 0xff] ^ $st[$p] ^ $sl;
                    $st[$p] = $u1[$u0[$st[$p] ^ $t1[$st[$p1]]] - $st[$p2] + 0x100 & 0xff] ^ $st[$p3];
                    $st[$p] = $u1[$st[$p] - $st[$p1] + 0x100 & 0xff] - $st[$p1] + 0x100 & 0xff;
                    $st[$p] = $u0[$st[$p] - $st[$p3] + 0x100 & 0xff] ^ $st[$p3];
                    $st[$p] ^= $sl;
                    $st[$p] = $u1[$st[$p] - $st[$p2] + 0x100 & 0xff] ^ $st[$p1];
                    $st[$p] = $u0[$st[$p] ^ $st[$p1]] - $st[$p3] + 0x100 & 0xff;
                    $st[$p] = $u1[$st[$p] ^ $st[$p3]] - $st[$p2] + 0x100 & 0xff;
                }
            }
            array_unshift($st, 'C*');
            return call_user_func_array('pack', $st);
        }

        private static function incw($str, $sl1, $sl2)
        {
            $str .= pack('V', $sl1 ^ $sl2 ^ 0x72f70fec);
            $str = self::encodew($str, $sl2 ^ 0x47b426f6, $sl1 ^ 0xaad9d133);
            return $str;
        }

        private static function crc32table(&$t, &$u, &$table = NULL)
        {
            static $tab, $t0, $t1, $t2, $t3, $u0, $u1, $u2, $u3;
            if (!isset($tab)) {
                $tab = [
                    0x00000000,
                    0x77073096,
                    0xee0e612c,
                    0x990951ba,
                    0x076dc419,
                    0x706af48f,
                    0xe963a535,
                    0x9e6495a3,
                    0x0edb8832,
                    0x79dcb8a4,
                    0xe0d5e91e,
                    0x97d2d988,
                    0x09b64c2b,
                    0x7eb17cbd,
                    0xe7b82d07,
                    0x90bf1d91,
                    0x1db71064,
                    0x6ab020f2,
                    0xf3b97148,
                    0x84be41de,
                    0x1adad47d,
                    0x6ddde4eb,
                    0xf4d4b551,
                    0x83d385c7,
                    0x136c9856,
                    0x646ba8c0,
                    0xfd62f97a,
                    0x8a65c9ec,
                    0x14015c4f,
                    0x63066cd9,
                    0xfa0f3d63,
                    0x8d080df5,
                    0x3b6e20c8,
                    0x4c69105e,
                    0xd56041e4,
                    0xa2677172,
                    0x3c03e4d1,
                    0x4b04d447,
                    0xd20d85fd,
                    0xa50ab56b,
                    0x35b5a8fa,
                    0x42b2986c,
                    0xdbbbc9d6,
                    0xacbcf940,
                    0x32d86ce3,
                    0x45df5c75,
                    0xdcd60dcf,
                    0xabd13d59,
                    0x26d930ac,
                    0x51de003a,
                    0xc8d75180,
                    0xbfd06116,
                    0x21b4f4b5,
                    0x56b3c423,
                    0xcfba9599,
                    0xb8bda50f,
                    0x2802b89e,
                    0x5f058808,
                    0xc60cd9b2,
                    0xb10be924,
                    0x2f6f7c87,
                    0x58684c11,
                    0xc1611dab,
                    0xb6662d3d,
                    0x76dc4190,
                    0x01db7106,
                    0x98d220bc,
                    0xefd5102a,
                    0x71b18589,
                    0x06b6b51f,
                    0x9fbfe4a5,
                    0xe8b8d433,
                    0x7807c9a2,
                    0x0f00f934,
                    0x9609a88e,
                    0xe10e9818,
                    0x7f6a0dbb,
                    0x086d3d2d,
                    0x91646c97,
                    0xe6635c01,
                    0x6b6b51f4,
                    0x1c6c6162,
                    0x856530d8,
                    0xf262004e,
                    0x6c0695ed,
                    0x1b01a57b,
                    0x8208f4c1,
                    0xf50fc457,
                    0x65b0d9c6,
                    0x12b7e950,
                    0x8bbeb8ea,
                    0xfcb9887c,
                    0x62dd1ddf,
                    0x15da2d49,
                    0x8cd37cf3,
                    0xfbd44c65,
                    0x4db26158,
                    0x3ab551ce,
                    0xa3bc0074,
                    0xd4bb30e2,
                    0x4adfa541,
                    0x3dd895d7,
                    0xa4d1c46d,
                    0xd3d6f4fb,
                    0x4369e96a,
                    0x346ed9fc,
                    0xad678846,
                    0xda60b8d0,
                    0x44042d73,
                    0x33031de5,
                    0xaa0a4c5f,
                    0xdd0d7cc9,
                    0x5005713c,
                    0x270241aa,
                    0xbe0b1010,
                    0xc90c2086,
                    0x5768b525,
                    0x206f85b3,
                    0xb966d409,
                    0xce61e49f,
                    0x5edef90e,
                    0x29d9c998,
                    0xb0d09822,
                    0xc7d7a8b4,
                    0x59b33d17,
                    0x2eb40d81,
                    0xb7bd5c3b,
                    0xc0ba6cad,
                    0xedb88320,
                    0x9abfb3b6,
                    0x03b6e20c,
                    0x74b1d29a,
                    0xead54739,
                    0x9dd277af,
                    0x04db2615,
                    0x73dc1683,
                    0xe3630b12,
                    0x94643b84,
                    0x0d6d6a3e,
                    0x7a6a5aa8,
                    0xe40ecf0b,
                    0x9309ff9d,
                    0x0a00ae27,
                    0x7d079eb1,
                    0xf00f9344,
                    0x8708a3d2,
                    0x1e01f268,
                    0x6906c2fe,
                    0xf762575d,
                    0x806567cb,
                    0x196c3671,
                    0x6e6b06e7,
                    0xfed41b76,
                    0x89d32be0,
                    0x10da7a5a,
                    0x67dd4acc,
                    0xf9b9df6f,
                    0x8ebeeff9,
                    0x17b7be43,
                    0x60b08ed5,
                    0xd6d6a3e8,
                    0xa1d1937e,
                    0x38d8c2c4,
                    0x4fdff252,
                    0xd1bb67f1,
                    0xa6bc5767,
                    0x3fb506dd,
                    0x48b2364b,
                    0xd80d2bda,
                    0xaf0a1b4c,
                    0x36034af6,
                    0x41047a60,
                    0xdf60efc3,
                    0xa867df55,
                    0x316e8eef,
                    0x4669be79,
                    0xcb61b38c,
                    0xbc66831a,
                    0x256fd2a0,
                    0x5268e236,
                    0xcc0c7795,
                    0xbb0b4703,
                    0x220216b9,
                    0x5505262f,
                    0xc5ba3bbe,
                    0xb2bd0b28,
                    0x2bb45a92,
                    0x5cb36a04,
                    0xc2d7ffa7,
                    0xb5d0cf31,
                    0x2cd99e8b,
                    0x5bdeae1d,
                    0x9b64c2b0,
                    0xec63f226,
                    0x756aa39c,
                    0x026d930a,
                    0x9c0906a9,
                    0xeb0e363f,
                    0x72076785,
                    0x05005713,
                    0x95bf4a82,
                    0xe2b87a14,
                    0x7bb12bae,
                    0x0cb61b38,
                    0x92d28e9b,
                    0xe5d5be0d,
                    0x7cdcefb7,
                    0x0bdbdf21,
                    0x86d3d2d4,
                    0xf1d4e242,
                    0x68ddb3f8,
                    0x1fda836e,
                    0x81be16cd,
                    0xf6b9265b,
                    0x6fb077e1,
                    0x18b74777,
                    0x88085ae6,
                    0xff0f6a70,
                    0x66063bca,
                    0x11010b5c,
                    0x8f659eff,
                    0xf862ae69,
                    0x616bffd3,
                    0x166ccf45,
                    0xa00ae278,
                    0xd70dd2ee,
                    0x4e048354,
                    0x3903b3c2,
                    0xa7672661,
                    0xd06016f7,
                    0x4969474d,
                    0x3e6e77db,
                    0xaed16a4a,
                    0xd9d65adc,
                    0x40df0b66,
                    0x37d83bf0,
                    0xa9bcae53,
                    0xdebb9ec5,
                    0x47b2cf7f,
                    0x30b5ffe9,
                    0xbdbdf21c,
                    0xcabac28a,
                    0x53b39330,
                    0x24b4a3a6,
                    0xbad03605,
                    0xcdd70693,
                    0x54de5729,
                    0x23d967bf,
                    0xb3667a2e,
                    0xc4614ab8,
                    0x5d681b02,
                    0x2a6f2b94,
                    0xb40bbe37,
                    0xc30c8ea1,
                    0x5a05df1b,
                    0x2d02ef8d,
                ];
                $t0 = $t1 = $t2 = $t3 = [];
                foreach ($tab as $i => $x) {
                    $t0[$i] = $x & 0xff;
                    $t1[$i] = ($x >> 8) & 0xff;
                    $t2[$i] = ($x >> 16) & 0xff;
                    $t3[$i] = ($x >> 24) & 0xff;
                }
                $u0 = array_combine($t0, array_keys($t0));
                $u1 = array_combine($t1, array_keys($t1));
                $u2 = array_combine($t2, array_keys($t2));
                $u3 = array_combine($t3, array_keys($t3));
            }
            $table = $tab;
            $t = [$t0, $t1, $t2, $t3];
            $u = [$u0, $u1, $u2, $u3];
        }

        private static function uncrc32($next, $prev = 0)
        {
            self::crc32table($t, $u);
            [$t0, $t1, $t2, $t3] = $t;
            [$u0, $u1, $u2, $u3] = $u;
            unset($t, $u);
            $crc32 = $next;
            $prev ^= 0xffffffff;
            $next ^= 0xffffffff;
            $m0 = $prev & 0xff;
            $m1 = ($prev >> 8) & 0xff;
            $m2 = ($prev >> 16) & 0xff;
            $m3 = ($prev >> 24) & 0xff;
            $c0 = $next & 0xff;
            $c1 = ($next >> 8) & 0xff;
            $c2 = ($next >> 16) & 0xff;
            $c3 = ($next >> 24) & 0xff;
            $x3 = $u3[$c3];
            $x2 = $u3[$c2 ^ $t2[$x3]];
            $x1 = $u3[$c1 ^ $t1[$x3] ^ $t2[$x2]];
            $x0 = $u3[$c0 ^ $t0[$x3] ^ $t1[$x2] ^ $t2[$x1]];
            $s0 = $x0 ^ $m0;
            $s1 = $x1 ^ $t0[$x0] ^ $m1;
            $s2 = $x2 ^ $t0[$x1] ^ $t1[$x0] ^ $m2;
            $s3 = $x3 ^ $t0[$x2] ^ $t1[$x1] ^ $t2[$x0] ^ $m3;
            $r = pack('C4', $s0, $s1, $s2, $s3);
            return $r;
        }

        private static function uncrc32in($first, $last, $next, $prev = 0)
        {
            self::crc32table($t, $u, $table);
            $prev ^= 0xffffffff;
            $next ^= 0xffffffff;
            for ($i = 0; isset($first[$i]); ++$i) {
                $tab = $table[($prev ^ ord($first[$i])) & 0xff];
                $prev = ($tab ^ (($prev >> 8) & 0x00ffffff));
            }
            for ($i = strlen($last) - 1; $i >= 0; --$i) {
                $lch = $u[3][($next >> 24) & 0xff];
                $next = (($lch ^ ord($last[$i])) | (($next ^ $table[$lch]) << 8));
            }
            return self::uncrc32($next ^ 0xffffffff, $prev ^ 0xffffffff);
        }

        public static function mt_prng_reset()
        {
            self::$mt_prng_seed ^= rand();
            return srand(self::$mt_prng_seed);
        }

        public static function mt_prng_store($seed)
        {
            self::$mt_prng_seed ^= rand() ^ $seed;
            self::$mt_prng_seed = (int)(self::$mt_prng_seed + 7012329) & 0xffffffff;
            self::$mt_prng_seed ^= 0x23958cde;
            return srand($seed);
        }

        private static function readl($tokens, $a, $b, &$i)
        {
            $str = '';
            $u = 0;
            do {
                if (is_array($tokens[$i])) {
                    $str .= $tokens[$i][1];
                    if (($tokens[$i][0] == T_CURLY_OPEN || $tokens[$i][0] == T_DOLLAR_OPEN_CURLY_BRACES) && $a == '{') ++$u;
                } else {
                    $str .= $tokens[$i];
                    if ($tokens[$i] == $a) ++$u; else if ($tokens[$i] == $b) --$u;
                }
            } while (isset($tokens[++$i]) && $u != 0);
            --$i;
            return $str;
        }

        private static function readr($tokens, $a, $b, $i, &$j, $nc = FALSE)
        {
            $str = '';
            $u = 0;
            do {
                if (is_array($tokens[$i - $j])) {
                    $str = $tokens[$i - $j][1] . $str;
                    if (($tokens[$i - $j][0] == T_CURLY_OPEN || $tokens[$i - $j][0] == T_DOLLAR_OPEN_CURLY_BRACES) && $a == '{') --$u;
                } else {
                    if ($nc && $tokens[$i - $j] == ';') return FALSE;
                    $str = $tokens[$i - $j] . $str;
                    if ($tokens[$i - $j] == $b) ++$u; else if ($tokens[$i - $j] == $a) --$u;
                }
                ++$j;
            } while ($i >= $j && $u != 0);
            --$j;
            if ($nc && $str[0] != '{') return FALSE;
            return $str;
        }

        private static function reads($tokens, &$i)
        {
            $str = '';
            for (; isset($tokens[$i]); ++$i) if (in_array($tokens[$i], [')', ']', '}', ',', ';'])) break; else if (is_array($tokens[$i]) && $tokens[$i][0] == T_CLOSE_TAG) break;
            else if (is_array($tokens[$i]) && $tokens[$i][0] == T_START_HEREDOC) {
                $str .= $tokens[$i++][1];
                for (; isset($tokens[$i]) && (!is_array($tokens[$i]) || $tokens[$i][0] != T_END_HEREDOC); ++$i) $str .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                $str .= $tokens[$i][1];
            } else if (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_WHILE, T_FOR, T_IF, T_ELSEIF, T_ELSE, T_FOREACH, T_DECLARE])) {
                for (; isset($tokens[$i]); ++$i) if (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_WHILE, T_FOR, T_FOREACH, T_DECLARE])) {
                    $str .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $str .= $tokens[$i++][1];
                    if ($tokens[$i] == '(') {
                        $str .= self::readl($tokens, '(', ')', $i);
                        ++$i;
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $str .= $tokens[$i++][1];
                        if ($tokens[$i] == '{') {
                            $str .= self::readl($tokens, '{', '}', $i);
                            ++$i;
                            break;
                        }
                    }
                    --$i;
                } else if (is_array($tokens[$i]) && $tokens[$i][0] == T_IF) {
                    while (TRUE) {
                        $str .= $tokens[$i++][1];
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $str .= $tokens[$i++][1];
                        if ($tokens[$i] == '(') {
                            $str .= self::readl($tokens, '(', ')', $i);
                            ++$i;
                        }
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $str .= $tokens[$i++][1];
                        if ($tokens[$i] == '{') {
                            $str .= self::readl($tokens, '{', '}', $i);
                            ++$i;
                        } else {
                            $str .= self::reads($tokens, $i);
                            if (isset($tokens[$i]) && $tokens[$i] == ';') $str .= $tokens[$i++];
                        }
                        if (isset($tokens[$i]) && is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $str .= $tokens[$i++][1];
                        if (!isset($tokens[$i])) break;
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_ELSEIF) continue; else if (is_array($tokens[$i]) && $tokens[$i][0] == T_ELSE) {
                            $str .= $tokens[$i++][1];
                            if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $str .= $tokens[$i++][1];
                            if ($tokens[$i] == '{') {
                                $str .= self::readl($tokens, '{', '}', $i);
                                ++$i;
                            } else {
                                $str .= self::reads($tokens, $i);
                                if (isset($tokens[$i]) && $tokens[$i] == ';') $str .= $tokens[$i++];
                            }
                            break;
                        } else break;
                    }
                    break;
                }
                if (isset($tokens[$i]) && $tokens[$i] == ';') $str .= $tokens[$i++];
                break;
            } else if (is_array($tokens[$i])) $str .= $tokens[$i][1];
            else if ($tokens[$i] == '(') $str .= self::readl($tokens, '(', ')', $i);
            else if ($tokens[$i] == '[') $str .= self::readl($tokens, '[', ']', $i);
            else if ($tokens[$i] == '{') $str .= self::readl($tokens, '{', '}', $i);
            else if ($tokens[$i] == '"') {
                $str .= $tokens[$i++];
                for (; isset($tokens[$i]) && $tokens[$i] != '"'; ++$i) $str .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                $str .= $tokens[$i];
            } else if ($tokens[$i] == '`') {
                $str .= $tokens[$i++];
                for (; isset($tokens[$i]) && $tokens[$i] != '`'; ++$i) $str .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                $str .= $tokens[$i];
            } else $str .= $tokens[$i];
            return $str;
        }

        private static function readsl($tokens, &$i, $cama = FALSE)
        {
            $str = '';
            $bra = $cama ? [')', ']', '}', ';'] : [')', ']', '}', ',', ';'];
            for (++$i; isset($tokens[$i]); ++$i) if (in_array($tokens[$i], $bra)) break; else if ($tokens[$i] == ',') {
                $str .= $tokens[$i++];
                if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $str .= $tokens[$i++][1];
                --$i;
            } else if (is_array($tokens[$i]) && $tokens[$i][0] == T_CLOSE_TAG) break;
            else if (is_array($tokens[$i]) && $tokens[$i][0] == T_START_HEREDOC) {
                $str .= $tokens[$i++][1];
                for (; isset($tokens[$i]) && (!is_array($tokens[$i]) || $tokens[$i][0] != T_END_HEREDOC); ++$i) $str .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                $str .= $tokens[$i][1];
            } else if (is_array($tokens[$i]) && in_array($tokens[$i][0], [
                    T_STRING,
                    T_WHITESPACE,
                    T_VARIABLE,
                    T_CONSTANT_ENCAPSED_STRING,
                    T_LNUMBER,
                    T_DNUMBER,
                    T_DIR,
                    T_FILE,
                    T_FUNC_C,
                    T_LINE,
                    T_METHOD_C,
                    T_NS_C,
                    T_TRAIT_C,
                    T_CLASS_C,
                    T_ARRAY_CAST,
                    T_BOOL_CAST,
                    T_DOUBLE_CAST,
                    T_INT_CAST,
                    T_OBJECT_CAST,
                    T_STRING_CAST,
                    T_UNSET_CAST,
                    T_PRINT,
                    T_ECHO,
                    T_EXIT,
                    T_ISSET,
                    T_UNSET,
                    T_ARRAY,
                    T_EVAL,
                    T_FN,
                    T_INCLUDE,
                    T_INCLUDE_ONCE,
                    T_REQUIRE,
                    T_REQUIRE_ONCE,
                    T_DOUBLE_COLON,
                    T_OBJECT_OPERATOR,
                    T_NULLSAFE_OBJECT_OPERATOR,
                    T_COALESCE,
                    T_COALESCE_EQUAL,
                    T_IS_GREATER_OR_EQUAL,
                    T_IS_SMALLER_OR_EQUAL,
                    T_IS_EQUAL,
                    T_IS_IDENTICAL,
                    T_IS_NOT_EQUAL,
                    T_IS_NOT_IDENTICAL,
                    T_LOGICAL_AND,
                    T_LOGICAL_OR,
                    T_LOGICAL_XOR,
                    T_SL,
                    T_SR,
                    T_POW,
                    T_NS_SEPARATOR,
                    T_AND_EQUAL,
                    T_OR_EQUAL,
                    T_XOR_EQUAL,
                    T_PLUS_EQUAL,
                    T_MINUS_EQUAL,
                    T_MUL_EQUAL,
                    T_DIV_EQUAL,
                    T_MOD_EQUAL,
                    T_POW_EQUAL,
                    T_SL_EQUAL,
                    T_SR_EQUAL,
                    T_CONCAT_EQUAL,
                    T_DEC,
                    T_INC,
                    T_BOOLEAN_AND,
                    T_BOOLEAN_OR,
                ])) {
                $str .= $tokens[$i][1];
            } else if (is_array($tokens[$i])) break;
            else if ($tokens[$i] == '(') $str .= self::readl($tokens, '(', ')', $i);
            else if ($tokens[$i] == '[') $str .= self::readl($tokens, '[', ']', $i);
            else if ($tokens[$i] == '{') $str .= self::readl($tokens, '{', '}', $i);
            else if ($tokens[$i] == '"') {
                $str .= $tokens[$i++];
                for (; isset($tokens[$i]) && $tokens[$i] != '"'; ++$i) $str .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                $str .= $tokens[$i];
            } else if ($tokens[$i] == '`') {
                $str .= $tokens[$i++];
                for (; isset($tokens[$i]) && $tokens[$i] != '`'; ++$i) $str .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                $str .= $tokens[$i];
            } else if ($tokens[$i] == '$') $str .= $tokens[$i];
            else if (in_array($tokens[$i], ['~', '!', '<', '>', '+', '-', '*', '/', '%', '.'])) $str .= $tokens[$i];
            else break;
            --$i;
            return $str;
        }

        private static function readsr($tokens, $i)
        {
            $str = '';
            $j = 1;
            if ($tokens[$i - $j][0] == T_WHITESPACE) $str = $tokens[$i - ($j++)][1] . $str;
            for (; $i >= $j; ++$j) {
                if (in_array($tokens[$i - $j], ['(', '[', '{', ',', ';'])) break;
                if (isset($tokens[$i - $j + 3]) && is_array($tokens[$i - $j + 1]) && $tokens[$i - $j + 1][0] == T_WHITESPACE) {
                    if (is_array($tokens[$i - $j + 2]) && in_array($tokens[$i - $j + 2][0], [T_STRING, T_VARIABLE, T_CONSTANT_ENCAPSED_STRING, T_ARRAY])) {
                        --$j;
                        break;
                    } else if (in_array($tokens[$i - $j + 2], ['$', '"'])) {
                        --$j;
                        break;
                    }
                }
                if (is_array($tokens[$i - $j])) {
                    if (in_array($tokens[$i - $j][0], [
                        T_STRING,
                        T_WHITESPACE,
                        T_VARIABLE,
                        T_CONSTANT_ENCAPSED_STRING,
                        T_LNUMBER,
                        T_DNUMBER,
                        T_DIR,
                        T_FILE,
                        T_FUNC_C,
                        T_LINE,
                        T_METHOD_C,
                        T_NS_C,
                        T_TRAIT_C,
                        T_CLASS_C,
                        T_ARRAY_CAST,
                        T_BOOL_CAST,
                        T_DOUBLE_CAST,
                        T_INT_CAST,
                        T_OBJECT_CAST,
                        T_STRING_CAST,
                        T_UNSET_CAST,
                        T_PRINT,
                        T_ECHO,
                        T_EXIT,
                        T_ISSET,
                        T_UNSET,
                        T_ARRAY,
                        T_EVAL,
                        T_FN,
                        T_INCLUDE,
                        T_INCLUDE_ONCE,
                        T_REQUIRE,
                        T_REQUIRE_ONCE,
                        T_DOUBLE_COLON,
                        T_OBJECT_OPERATOR,
                        T_NULLSAFE_OBJECT_OPERATOR,
                        T_COALESCE,
                        T_COALESCE_EQUAL,
                        T_IS_GREATER_OR_EQUAL,
                        T_IS_SMALLER_OR_EQUAL,
                        T_IS_EQUAL,
                        T_IS_IDENTICAL,
                        T_IS_NOT_EQUAL,
                        T_IS_NOT_IDENTICAL,
                        T_LOGICAL_AND,
                        T_LOGICAL_OR,
                        T_LOGICAL_XOR,
                        T_SL,
                        T_SR,
                        T_POW,
                        T_NS_SEPARATOR,
                        T_AND_EQUAL,
                        T_OR_EQUAL,
                        T_XOR_EQUAL,
                        T_PLUS_EQUAL,
                        T_MINUS_EQUAL,
                        T_MUL_EQUAL,
                        T_DIV_EQUAL,
                        T_MOD_EQUAL,
                        T_POW_EQUAL,
                        T_SL_EQUAL,
                        T_SR_EQUAL,
                        T_CONCAT_EQUAL,
                        T_DEC,
                        T_INC,
                        T_BOOLEAN_AND,
                        T_BOOLEAN_OR,
                    ])) $str = $tokens[$i - $j][1] . $str; else if (is_array($tokens[$i - $j]) && $tokens[$i - $j][0] == T_END_HEREDOC) {
                        $str = $tokens[$i - ($j++)] . $str;
                        for (; $i >= $j && (!is_array($tokens[$i - $j]) || $tokens[$i - $j][0] != T_START_HEREDOC); ++$j) $str = (is_array($tokens[$i - $j]) ? $tokens[$i - $j][1] : $tokens[$i - $j]) . $str;
                        $str = $tokens[$i - $j] . $str;
                    } else break;
                } else if ($tokens[$i - $j] == '$') $str = $tokens[$i - $j] . $str;
                else if ($tokens[$i - $j] == ')') {
                    $params = self::readr($tokens, '(', ')', $i, $j);
                    if (is_array($tokens[$i - $j - 1]) && in_array($tokens[$i - $j - 1][0], [T_IF, T_ELSEIF, T_WHILE, T_FOR, T_DECLARE, T_ARRAY, T_FOREACH])) {
                        ++$j;
                        break;
                    }
                    $str = $params . $str;
                } else if ($tokens[$i - $j] == ']') $str = self::readr($tokens, '[', ']', $i, $j) . $str;
                else if ($tokens[$i - $j] == '}') {
                    $params = self::readr($tokens, '{', '}', $i, $j, TRUE);
                    if (!$params) {
                        ++$j;
                        break;
                    }
                    $str = $params . $str;
                } else if ($tokens[$i - $j] == '"') {
                    $str = $tokens[$i - ($j++)] . $str;
                    for (; $i >= $j && $tokens[$i - $j] != '"'; ++$j) $str = (is_array($tokens[$i - $j]) ? $tokens[$i - $j][1] : $tokens[$i - $j]) . $str;
                    $str = $tokens[$i - $j] . $str;
                } else if ($tokens[$i - $j] == '`') {
                    $str = $tokens[$i - ($j++)] . $str;
                    for (; $i >= $j && $tokens[$i - $j] != '`'; ++$j) $str = (is_array($tokens[$i - $j]) ? $tokens[$i - $j][1] : $tokens[$i - $j]) . $str;
                    $str = $tokens[$i - $j] . $str;
                } else if (in_array($tokens[$i - $j], ['!', '~', '<', '>', '+', '-', '*', '/', '%', '.'])) $str = $tokens[$i - $j] . $str;
                else break;
            }
            return ltrim($str);
        }

        private static function readpe($tokens, &$i, $cama = FALSE)
        {
            $str = '';
            if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $str .= $tokens[$i++][1];
            if ($tokens[$i] == ';') {
                --$i;
                return $str;
            }
            if (is_array($tokens[$i]) && $tokens[$i][0] == T_CLOSE_TAG) {
                --$i;
                return $str;
            }
            if ($tokens[$i] == '(') $str .= substr(self::readl($tokens, '(', ')', $i), 1, -1); else {
                --$i;
                $str .= self::readsl($tokens, $i, $cama);
            }
            return $str;
        }

        private static function reparse($code, &$tokens, &$i)
        {
            $j = $i;
            $prev = count($tokens);
            for (++$i; isset($tokens[$i]); ++$i) $code .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
            $tokens = token_get_all($code);
            $next = count($tokens);
            $i = $j + $next - $prev;
        }

        private static function reparseExtra(&$code, &$tokens, &$i, $readed, $extra, $backspace = 0)
        {
            ++$readed;
            ++$i;
            if ($backspace !== 0) {
                $extratokens = array_slice(token_get_all("<?" . "php $extra"), 1);
                $backspacesize = count(token_get_all("<?" . "php " . substr($code, -$backspace))) - 1;
                $pc = $code;
                $code = substr($code, 0, -$backspace) . $extra;
                $tokens = array_merge(array_slice($tokens, 0, $i - $backspacesize - $readed), $extratokens, array_slice($tokens, $i));
                $i += count($extratokens) - $backspacesize - $readed;
            } else {
                $extratokens = array_slice(token_get_all("<?" . "php $extra"), 1);
                $code .= $extra;
                $tokens = array_merge(array_slice($tokens, 0, $i - $readed), $extratokens, array_slice($tokens, $i));
                $i += count($extratokens) - $readed;
            }
            --$i;
        }

        private static function memtwister_op2fn($code, $fli, &$tokens = NULL)
        {
            if ($tokens === NULL) $tokens = token_get_all($code);
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i])) {
                $j = $i;
                if ($tokens[$i][0] == T_NEW) {
                    ++$i;
                    $str = $tokens[$i][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $str .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_STRING) {
                        $str .= $tokens[$i++][1];
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $str .= $tokens[$i++][1];
                        if ($tokens[$i] == '(') {
                            $prm = $tokens[$i++];
                            if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $prm .= $tokens[$i++][1];
                            if ($tokens[$i] == ')') {
                                $prm .= $tokens[$i++];
                                $str = trim($str);
                                $extra = "_ALOM_memtwister{$fli}_v0('$str')";
                                --$i;
                                self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                                $i = $j - 1;
                            } else {
                                $code .= $str . $prm;
                                --$i;
                            }
                        } else {
                            $str = trim($str);
                            $extra = "_ALOM_memtwister{$fli}_v0('$str')";
                            --$i;
                            self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                            $i = $j - 1;
                        }
                    } else {
                        $code .= $str;
                        --$i;
                    }
                } else if ($tokens[$i][0] == T_EXIT) {
                    ++$i;
                    $pe = self::readpe($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_a($pe)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    $i = $j - 1;
                } else if ($tokens[$i][0] == T_PRINT) {
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_c($sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    $i = $j - 1;
                } else if ($tokens[$i][0] == T_ECHO) {
                    ++$i;
                    $pe = self::readpe($tokens, $i, TRUE);
                    $extra = "_ALOM_memtwister{$fli}_d($pe)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    $i = $j - 1;
                } else if ($tokens[$i][0] == T_ARRAY_CAST) {
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_e($sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    $i = $j - 1;
                } else if ($tokens[$i][0] == T_BOOL_CAST) {
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_f($sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    $i = $j - 1;
                } else if ($tokens[$i][0] == T_DOUBLE_CAST) {
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_g($sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    $i = $j - 1;
                } else if ($tokens[$i][0] == T_INT_CAST) {
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_h($sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    $i = $j - 1;
                } else if ($tokens[$i][0] == T_OBJECT_CAST) {
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_i($sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    $i = $j - 1;
                } else if ($tokens[$i][0] == T_STRING_CAST) {
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_j($sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    $i = $j - 1;
                } else $code .= $tokens[$i][1];
            } else {
                $j = $i;
                if ($tokens[$i] == '~') {
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_t0($sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    $i = $j - 1;
                } else if ($tokens[$i] == '!') {
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_u0($sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    $i = $j - 1;
                } else $code .= $tokens[$i];
            }
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i])) {
                $j = $i;
                if ($tokens[$i][0] == T_POW) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "pow($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_DEC) {
                    $sr = trim(self::readsr($tokens, $i));
                    $sl = trim(self::readsl($tokens, $i));
                    if (trim($sl) === '') {
                        $i = $j;
                        $extra = "_ALOM_memtwister{$fli}_n0($sr)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                    } else {
                        $code .= "_ALOM_memtwister{$fli}_p0($sl)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    }
                } else if ($tokens[$i][0] == T_INC) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    if (trim($sl) === '') {
                        $i = $j;
                        $extra = "_ALOM_memtwister{$fli}_o0($sr)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                    } else {
                        $extra = "_ALOM_memtwister{$fli}_q0($sl)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                    }
                } else $code .= $tokens[$i][1];
            } else $code .= $tokens[$i];
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i])) $code .= $tokens[$i][1]; else {
                $j = $i;
                if ($tokens[$i] == '*') {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_1($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i] == '/') {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_2($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i] == '%') {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_3($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else $code .= $tokens[$i];
            }
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i])) $code .= $tokens[$i][1]; else {
                $j = $i;
                if ($tokens[$i] == '+') {
                    $sr = self::readsr($tokens, $i);
                    if (trim($sr) === '') {
                        $code .= $tokens[$i];
                        continue;
                    }
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_z($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i] == '-') {
                    $sr = self::readsr($tokens, $i);
                    if (trim($sr) === '') {
                        $code .= $tokens[$i];
                        continue;
                    }
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else $code .= $tokens[$i];
            }
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i])) $code .= $tokens[$i][1]; else {
                if ($tokens[$i] == '.') {
                    $j = $i;
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_4($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else $code .= $tokens[$i];
            }
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i])) {
                $j = $i;
                if ($tokens[$i][0] == T_SL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_x($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_SR) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_y($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else $code .= $tokens[$i][1];
            } else $code .= $tokens[$i];
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i])) {
                $j = $i;
                if ($tokens[$i][0] == T_LOGICAL_AND) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_u($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_LOGICAL_OR) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_v($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_LOGICAL_XOR) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_w($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else $code .= $tokens[$i][1];
            } else {
                $j = $i;
                if ($tokens[$i] == '&') {
                    $sr = self::readsr($tokens, $i);
                    if (trim($sr) === '') {
                        $code .= $tokens[$i];
                        continue;
                    }
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_u($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i] == '|') {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_v($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i] == '^') {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_w($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else $code .= $tokens[$i];
            }
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i])) {
                $j = $i;
                if ($tokens[$i][0] == T_IS_GREATER_OR_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_l($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_IS_SMALLER_OR_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_m($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_IS_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_p($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_IS_IDENTICAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_q($sr,$sl)";
                } else if ($tokens[$i][0] == T_IS_NOT_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_r($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_IS_NOT_IDENTICAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_s($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else $code .= $tokens[$i][1];
            } else {
                $j = $i;
                if ($tokens[$i] == '>') {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_n($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i] == '<') {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_o($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else $code .= $tokens[$i];
            }
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i])) {
                $j = $i;
                if ($tokens[$i][0] == T_BOOLEAN_AND) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_r0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_BOOLEAN_OR) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_s0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else $code .= $tokens[$i][1];
            } else $code .= $tokens[$i];
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i])) {
                $j = $i;
                if ($tokens[$i][0] == T_AND_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_a0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_OR_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_b0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_XOR_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_c0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_PLUS_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_d0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_MINUS_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_e0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_MUL_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_f0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_DIV_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_g0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_MOD_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_h0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_POW_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_i0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_SL_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_j0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_SR_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_k0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else if ($tokens[$i][0] == T_CONCAT_EQUAL) {
                    $sr = self::readsr($tokens, $i);
                    $sl = self::readsl($tokens, $i);
                    $extra = "_ALOM_memtwister{$fli}_m0($sr,$sl)";
                    self::reparseExtra($code, $tokens, $i, $i - $j, $extra, strlen($sr));
                } else $code .= $tokens[$i][1];
            } else $code .= $tokens[$i];
            return $code;
        }

        private static function memtwister_encode($string, $iv1, $iv2, $ivs)
        {
            $salt = self::getasciiikey(rand(1, 16));
            $mod = (strlen($salt) + strlen($string)) % 3;
            if ($mod > 0) $salt .= self::getasciiikey(3 - $mod);
            $string = chr(strlen($salt)) . $salt . $string;
            for ($i = 0; isset($string[$i]); ++$i) $string[$i] = $ivs[$i & 0xf] ^ $string[$i];
            $string = self::inc($string, $iv1, $iv2, TRUE);
            for ($i = 0; isset($string[$i]); ++$i) $string[$i] = $ivs[$i & 0xf] ^ $string[$i];
            return $string;
        }

        private static function memtwister_encapsed_string($string)
        {
            if ($string[0] == "'") {
                $string = substr($string, 1, -1);
                $string = preg_replace_callback("/(?<!(?<!\\\\)\\\\)\\\\('|\\\\)/", function ($match) { return $match[1]; }, $string);
                return $string;
            }
            $string = substr($string, 1, -1);
            $string = preg_replace_callback("/(?<!(?<!\\\\)\\\\)\\\\([0-7]{1,3}|x[0-9a-fA-F]{1,2}|[ertvnf]|\\\$|\"|\\\\)/", function ($match) {
                switch ($match[1][0]) {
                    case 'e':
                        return "\e";
                    case 'r':
                        return "\r";
                    case 't':
                        return "\t";
                    case 'v':
                        return "\v";
                    case 'n':
                        return "\n";
                    case 'f':
                        return "\f";
                    case '"':
                    case '\\':
                    case '$':
                        return $match[1];
                    case 'x':
                        return chr(hexdec(substr($match[1], 1)));
                    default:
                        return chr(octdec($match[1]));
                }
            }, $string);
            return $string;
        }

        private static function memtwister_lnumber($string)
        {
            if ($string == 0) return '0';
            if ($string[0] == '0') {
                if ($string[1] == 'x') return (string)hexdec(substr($string, 2));
                if ($string[1] == 'b') return (string)bindec(substr($string, 2));
                return (string)octdec(substr($string, 1));
            } else return $string;
        }

        private static function memtwister_stringify(&$tokens, $fli, &$i)
        {
            $code = '';
            $opc = 1;
            for (; isset($tokens[$i]) && $opc != 0; ++$i) if (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_CLASS, T_TRAIT, T_INTERFACE])) {
                $code .= $tokens[$i++][1];
                while (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_WHITESPACE, T_STRING, T_NS_SEPARATOR, T_EXTENDS, T_IMPLEMENTS])) $code .= $tokens[$i++][1];
                if ($tokens[$i] != '{') {
                    --$i;
                    continue;
                }
                $code .= $tokens[$i++];
                for (; isset($tokens[$i]) && $tokens[$i] != '}'; ++$i) if (is_array($tokens[$i]) && $tokens[$i][0] == T_FUNCTION) {
                    $code .= $tokens[$i++][1];
                    for (; isset($tokens[$i]) && $tokens[$i] != '('; ++$i) if (is_array($tokens[$i])) $code .= $tokens[$i][1]; else $code .= $tokens[$i];
                    $code .= self::readl($tokens, '(', ')', $i);
                    ++$i;
                    for (; isset($tokens[$i]) && $tokens[$i] != '{'; ++$i) if ($tokens[$i] == ';') break; else if (is_array($tokens[$i])) $code .= $tokens[$i][1];
                    else $code .= $tokens[$i];
                    if ($tokens[$i] == ';') {
                        $code .= $tokens[$i];
                        continue;
                    }
                    $code .= $tokens[$i++];
                    $code .= self::memtwister_stringify($tokens, $fli, $i);
                    --$i;
                } else if (is_array($tokens[$i])) $code .= $tokens[$i][1];
                else if ($tokens[$i] == '{') $code .= self::readl($tokens, '{', '}', $i);
                else $code .= $tokens[$i];
                $code .= $tokens[$i];
            } else if ($tokens[$i] == '{') {
                ++$opc;
                $code .= $tokens[$i];
            } else if ($tokens[$i] == '}') {
                --$opc;
                $code .= $tokens[$i];
            } else if (is_array($tokens[$i])) {
                if ($tokens[$i][0] == T_FUNCTION) {
                    $code .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $code .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_STRING) {
                        $code .= $tokens[$i++][1];
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $code .= $tokens[$i++][1];
                    }
                    if ($tokens[$i] == '(') {
                        $code .= '(' . self::readpe($tokens, $i) . ')';
                        ++$i;
                    }
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $code .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_USE) {
                        $code .= $tokens[$i++][1];
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $code .= $tokens[$i++][1];
                    }
                    if ($tokens[$i] == '(') $code .= '(' . self::readpe($tokens, $i) . ')'; else--$i;
                } else if ($tokens[$i][0] == T_FN || $tokens[$i][0] == T_DECLARE) {
                    $code .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $code .= $tokens[$i++][1];
                    if ($tokens[$i] == '(') $code .= '(' . self::readpe($tokens, $i) . ')'; else--$i;
                } else if ($tokens[$i][0] == T_STATIC) {
                    $code .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $code .= $tokens[$i++][1];
                    $code .= self::readpe($tokens, $i, TRUE);
                } else if ($tokens[$i][0] == T_NAMESPACE) {
                    $code .= $tokens[$i++][1];
                    while (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_WHITESPACE, T_STRING, T_NS_SEPARATOR])) $code .= $tokens[$i++][1];
                    if ($tokens[$i] != '{') {
                        --$i;
                        continue;
                    }
                    $code .= $tokens[$i++];
                    $code .= self::memtwister_stringify($tokens, $fli, $i);
                    --$i;
                } else if (is_array($tokens[$i]) && $tokens[$i][0] == T_START_HEREDOC) {
                    $code .= $tokens[$i++][1];
                    for (; isset($tokens[$i]) && (!is_array($tokens[$i]) || $tokens[$i][0] != T_END_HEREDOC); ++$i) $code .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                    $code .= $tokens[$i][1];
                } else if ($tokens[$i][0] == T_STRING) {
                    $str = $tokens[$i][1];
                    $prev = '';
                    $j = 1;
                    if (is_array($tokens[$i - $j]) && $tokens[$i - $j][0] == T_WHITESPACE) $prev .= $tokens[$i - ($j++)][1];
                    if (is_array($tokens[$i - $j]) && in_array($tokens[$i - $j][0], [T_OBJECT_OPERATOR, T_NULLSAFE_OBJECT_OPERATOR])) {
                        $code .= "{'$str'}";
                    } else if (is_array($tokens[$i - $j]) && $tokens[$i - $j][0] == T_DOUBLE_COLON) {
                        $next = '';
                        $j = 1;
                        if (is_array($tokens[$i + $j]) && $tokens[$i + $j][0] == T_WHITESPACE) $next .= $tokens[$i + ($j++)][1];
                        if ($tokens[$i + $j] == '(') {
                            $code .= "{'$str'}";
                        } else $code .= $str;
                    } else if (!is_array($tokens[$i - $j]) || !in_array($tokens[$i - $j][0], [
                            T_FUNCTION,
                            T_FN,
                            T_NEW,
                            T_CLASS,
                            T_PUBLIC,
                            T_PROTECTED,
                            T_STATIC,
                            T_PRIVATE,
                            T_VAR,
                            T_TRAIT,
                            T_INTERFACE,
                            T_EXTENDS,
                            T_IMPLEMENTS,
                        ])) {
                        $next = '';
                        for ($j = 1; isset($tokens[$i + $j]) && is_array($tokens[$i + $j]) && in_array($tokens[$i + $j][0], [
                            T_STRING,
                            T_WHITESPACE,
                            T_NS_SEPARATOR,
                        ]); ++$j) if ($j > 1 && $tokens[$i + $j - 1][0] == T_WHITESPACE && $tokens[$i + $j - 2][0] == $tokens[$i + $j][0]) break; else $next .= $tokens[$i + $j][1];
                        $i += $j;
                        $str = str_replace([' ', "\n", "\r", "\t"], '', $str . $next);
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $next .= $tokens[$i++][1];
                        if ($tokens[$i] == '(') {
                            $code .= "(function_exists(__NAMESPACE__.'\\$str')?__NAMESPACE__.'\\$str':(function_exists('$str')?'$str':__NAMESPACE__.'\\$str'))";
                        } else if (is_array($tokens[$i]) && $tokens[$i][0] == T_DOUBLE_COLON) {
                            $code .= in_array(strtolower($str), [
                                'self',
                                'static',
                                'parent',
                            ]) ? $str : "(class_exists(__NAMESPACE__.'\\$str')?__NAMESPACE__.'\\$str':" . "(class_exists('$str')?'$str':__NAMESPACE__.'\\$str'))";
                        } else {
                            $code .= in_array(strtolower($str), [
                                'null',
                                'true',
                                'false',
                            ]) ? "('constant')('$str')" : "(defined(__NAMESPACE__.'$str')?('constant')(__NAMESPACE__.'\\$str'):" . "(defined('$str')?('constant')('$str'):'$str'))";
                        }
                        --$i;
                    } else $code .= $str;
                } else if ($tokens[$i][0] == T_NS_SEPARATOR) {
                    $str = $tokens[$i][1];
                    $j = 1;
                    if (is_array($tokens[$i - $j]) && $tokens[$i - $j][0] == T_WHITESPACE) ++$j;
                    if (!is_array($tokens[$i - $j]) || !in_array($tokens[$i - $j][0], [
                            T_FUNCTION,
                            T_FN,
                            T_NEW,
                            T_CLASS,
                            T_PUBLIC,
                            T_PROTECTED,
                            T_STATIC,
                            T_PRIVATE,
                            T_VAR,
                            T_TRAIT,
                            T_INTERFACE,
                            T_EXTENDS,
                            T_IMPLEMENTS,
                        ])) {
                        $next = '';
                        for ($j = 1; isset($tokens[$i + $j]) && is_array($tokens[$i + $j]) && in_array($tokens[$i + $j][0], [
                            T_STRING,
                            T_WHITESPACE,
                            T_NS_SEPARATOR,
                        ]); ++$j) if ($j > 1 && $tokens[$i + $j - 1][0] == T_WHITESPACE && $tokens[$i + $j - 2][0] == $tokens[$i + $j][0]) break; else $next .= $tokens[$i + $j][1];
                        $i += $j;
                        $str = str_replace([' ', "\n", "\r", "\t"], '', $str . $next);
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $next .= $tokens[$i++][1];
                        if ($tokens[$i] == '(') {
                            $code .= "('$str')";
                        } else if (is_array($tokens[$i]) && $tokens[$i][0] == T_DOUBLE_COLON) {
                            $code .= in_array(strtolower($str), ['self', 'static', 'parent']) ? $str : "('$str')";
                        } else {
                            $code .= "('constant')('$str')";
                        }
                        --$i;
                    } else $code .= $tokens[$i][1];
                } else if ($tokens[$i][0] == T_VARIABLE) {
                    $str = substr($tokens[$i][1], 1);
                    $code .= $str == '$this' ? $str : "\${'$str'}";
                } else if ($tokens[$i][0] == T_LNUMBER) {
                    $str = self::memtwister_lnumber($tokens[$i][1]);
                    $code .= "('_ALOM_memtwister{$fli}_h')('$str')";
                } else if ($tokens[$i][0] == T_DNUMBER) {
                    $str = $tokens[$i][1];
                    $code .= "('_ALOM_memtwister{$fli}_g')('$str')";
                } else $code .= $tokens[$i][1];
            } else if ($tokens[$i] == '"') {
                $code .= $tokens[$i++];
                for (; isset($tokens[$i]) && $tokens[$i] != '"'; ++$i) $code .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                $code .= $tokens[$i];
            } else if ($tokens[$i] == '`') {
                $code .= $tokens[$i++];
                for (; isset($tokens[$i]) && $tokens[$i] != '`'; ++$i) $code .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                $code .= $tokens[$i];
            } else $code .= $tokens[$i];
            return $code;
        }

        private static function memtwister_obfs($code, $fli, $iv1, $iv2, $ivs, $pkyid, $token = NULL)
        {
            if ($token === NULL) $token = token_get_all($code);
            $i = 0;
            $code = self::memtwister_stringify($token, $fli, $i);
            $tokens = token_get_all($code);
            $pkyid = base64_encode($pkyid);
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i]) && $tokens[$i][0] == T_CONSTANT_ENCAPSED_STRING) {
                $str = self::memtwister_encapsed_string($tokens[$i][1]);
                $code .= "\AlomDecoder$fli::memtwister_decode('" . base64_encode(self::memtwister_encode($str, $iv1, $iv2, $ivs)) . "','$pkyid')";
            } else if (is_array($tokens[$i])) $code .= $tokens[$i][1];
            else $code .= $tokens[$i];
            return $code;
        }

        public static function sug($code, $fli)
        {
            $tokens = token_get_all($code);
            $sug = '';
            $vars = [];
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i]) && $tokens[$i][0] == T_VARIABLE) {
                if ($tokens[$i][1] == '$GLOBALS') {
                    if (is_array($tokens[$i + 1]) && $tokens[$i + 1][0] == T_WHITESPACE) ++$i;
                    if ($tokens[$i + 1] == '[') ++$i; else continue;
                    if (is_array($tokens[$i + 1]) && $tokens[$i + 1][0] == T_WHITESPACE) ++$i;
                    if (is_array($tokens[$i + 1]) && in_array($tokens[$i + 1][0], [T_CONSTANT_ENCAPSED_STRING, T_LNUMBER, T_DNUMBER])) {
                        $str = $tokens[++$i][1];
                    } else continue;
                    if (is_array($tokens[$i + 1]) && $tokens[$i + 1][0] == T_WHITESPACE) ++$i;
                    if ($tokens[$i + 1] == ']') ++$i; else continue;
                    $vars[] = '${' . $str . '}';
                } else $vars[] = $tokens[$i][1];
            }
            $vars = implode(',', array_unique($vars));
            if ($vars !== '') $sug .= "if(\AlomDecoder$fli::\$vgb){global $vars;}";
            $code = '';
            $i = 0;
            $code .= $tokens[$i++][1];
            while (isset($tokens[$i]) && ((is_array($tokens[$i]) && in_array($tokens[$i][0], [
                            T_WHITESPACE,
                            T_COMMENT,
                            T_DOC_COMMENT,
                        ])) || $tokens[$i] == ';')) $code .= is_array($tokens[$i]) ? $tokens[$i++][1] : $tokens[$i++];
            if (isset($tokens[$i]) && is_array($tokens[$i]) && $tokens[$i][0] == T_NAMESPACE) {
                $code .= $tokens[$i++][1];
                while (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_WHITESPACE, T_STRING, T_NS_SEPARATOR])) $code .= $tokens[$i++][1];
                if ($tokens[$i] == '{') {
                    $code .= $tokens[$i++];
                    $code .= "if(\$_ALOM_beforeeval){\$_ALOM_code='';unset(\$_ALOM_code,\$_ALOM_beforeeval);}else{file_put_contents(\$_ALOM_code,'');unlink(\$_ALOM_code);\$_ALOM_code='';unset(\$_ALOM_code,\$_ALOM_beforeeval);}";
                    $code .= $sug;
                    for (; isset($tokens[$i]); ++$i) $code .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                    return $code;
                } else {
                    $code .= $tokens[$i++];
                    while (isset($tokens[$i]) && ((is_array($tokens[$i]) && in_array($tokens[$i][0], [
                                    T_WHITESPACE,
                                    T_COMMENT,
                                    T_DOC_COMMENT,
                                ])) || $tokens[$i] == ';')) $code .= is_array($tokens[$i]) ? $tokens[$i++][1] : $tokens[$i++];
                }
            }
            while (isset($tokens[$i]) && is_array($tokens[$i]) && $tokens[$i][0] == T_NAMESPACE) {
                $code .= $tokens[$i++][1];
                while (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_WHITESPACE, T_STRING, T_NS_SEPARATOR])) $code .= $tokens[$i++][1];
                $code .= $tokens[$i++];
                while (isset($tokens[$i]) && ((is_array($tokens[$i]) && in_array($tokens[$i][0], [
                                T_WHITESPACE,
                                T_COMMENT,
                                T_DOC_COMMENT,
                            ])) || $tokens[$i] == ';')) $code .= $tokens[$i++][1];
            }
            $code .= "if(\$_ALOM_beforeeval){\$_ALOM_code='';unset(\$_ALOM_code,\$_ALOM_beforeeval);}else{file_put_contents(\$_ALOM_code,'');unlink(\$_ALOM_code);\$_ALOM_code='';unset(\$_ALOM_code,\$_ALOM_beforeeval);}";
            $code .= $sug;
            for (; isset($tokens[$i]); ++$i) $code .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
            return $code;
        }

        private static function singlequote($string) { return str_replace(['\\', "'"], ['\\\\', "\\'"], $string); }

        private static function setikeys($code)
        {
            $tokens = token_get_all($code);
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i]) && $tokens[$i][0] == T_STRING) {
                if (in_array($tokens[$i][1], [
                    "ALOM_INVISIBLE_KEY2",
                    "ALOM_INVISIBLE_KEY3",
                    "ALOM_INVISIBLE_KEY4",
                    "ALOM_INVISIBLE_KEY8",
                    "ALOM_INVISIBLE_KEY12",
                    "ALOM_INVISIBLE_KEY16",
                    "ALOM_INVISIBLE_KEY24",
                    "ALOM_INVISIBLE_KEY32",
                    "ALOM_INVISIBLE_KEY64",
                    "ALOM_INVISIBLE_KEY96",
                    "ALOM_INVISIBLE_KEY128",
                    "ALOM_INVISIBLE_KEY256",
                    "ALOM_INVISIBLE_KEY384",
                    "ALOM_INVISIBLE_KEY512",
                    "ALOM_INVISIBLE_KEY1024",
                    "ALOM_INVISIBLE_KEY2048",
                    "ALOM_INVISIBLE_KEY4096",
                    "ALOM_INVISIBLE_KEY8192",
                ])) {
                    $len = (int)substr($tokens[$i][1], 18);
                    $ikey = bin2hex(self::getasciiikey($len));
                    $code .= "hex2bin('$ikey')";
                } else if ($tokens[$i][1] == "ALOM_INVISIBLE_CHAR") {
                    $ikey = ord(self::getcharikey());
                    $code .= "chr($ikey)";
                } else if ($tokens[$i][1] == "ALOM_INVISIBLE_BIT") {
                    $ikey = self::getbitikey();
                    $code .= "($ikey)";
                } else if ($tokens[$i][1] == "ALOM_INVISIBLE_INT") {
                    $ikey = self::getintikey();
                    $code .= "($ikey)";
                } else if ($tokens[$i][1] == "ALOM_OBFUSCATORED_TIME") {
                    $ikey = floor(self::$obfstime);
                    $code .= "($ikey)";
                } else if ($tokens[$i][1] == "ALOM_OBFUSCATORED_TIME_FLOAT") {
                    $ikey = self::$obfstime;
                    $code .= "($ikey)";
                } else $code .= $tokens[$i][1];
            } else if (is_array($tokens[$i])) $code .= $tokens[$i][1];
            else $code .= $tokens[$i];
            return $code;
        }

        public static function partition_encode($string, $key, $iv1, $iv2, $ivs)
        {
            $string = gzdeflate($string, 9);
            for ($i = 0; isset($string[$i]); ++$i) $string[$i] = $key[$i & 0xf] ^ $string[$i];
            $string = self::memtwister_encode($string, $iv1, $iv2, $ivs);
            for ($i = 0; isset($string[$i]); ++$i) $string[$i] = $key[$i & 0xf] ^ $string[$i];
            return $string;
        }

        public static function nspartitioning(&$partition, $code, $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast = FALSE, $ns = '', &$ua = [], $rnt = FALSE)
        {
            $tokens = token_get_all("<?" . "php $code");
            array_shift($tokens);
            $part = $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_CLASS, T_TRAIT, T_INTERFACE])) {
                    $part .= $tokens[$i++][1];
                    while (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_WHITESPACE, T_STRING, T_NS_SEPARATOR, T_EXTENDS, T_IMPLEMENTS])) $part .= $tokens[$i++][1];
                    if ($tokens[$i] != '{') {
                        --$i;
                        continue;
                    }
                    $part .= $tokens[$i++];
                    for (; isset($tokens[$i]) && $tokens[$i] != '}'; ++$i) if (is_array($tokens[$i]) && $tokens[$i][0] == T_FUNCTION) {
                        $part .= $tokens[$i++][1];
                        for (; isset($tokens[$i]) && $tokens[$i] != '('; ++$i) if (is_array($tokens[$i])) $part .= $tokens[$i][1]; else $part .= $tokens[$i];
                        $part .= self::readl($tokens, '(', ')', $i);
                        ++$i;
                        for (; isset($tokens[$i]) && $tokens[$i] != '{'; ++$i) if ($tokens[$i] == ';') break; else if (is_array($tokens[$i])) $part .= $tokens[$i][1];
                        else $part .= $tokens[$i];
                        if ($tokens[$i] == ';') {
                            $part .= $tokens[$i];
                            continue;
                        }
                        $rl = self::readl($tokens, '{', '}', $i);
                        $rl = self::nspartitioning($partition, substr($rl, 1, -1), $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns);
                        $part .= '{' . $rl . '}';
                    } else if (is_array($tokens[$i])) $part .= $tokens[$i][1];
                    else if ($tokens[$i] == '{') $part .= self::readl($tokens, '{', '}', $i);
                    else $part .= $tokens[$i];
                    $part = $ns . $part . $tokens[$i];
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [count($partition), $key, self::partition_encode($part, $key, $iv1, $iv2, $ivs)];
                    }
                    $code .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $code .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$fli::partition_decode(\AlomDecoder$fli::\$partition[" . $partition[$part][0] . "],'" . base64_encode($partition[$part][1]) . "','$pkyid'));";
                    $part = '';
                } else if ($tokens[$i][0] == T_FUNCTION) {
                    $part .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_STRING) {
                        $part .= $tokens[$i++][1];
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                        if ($tokens[$i] == '(') {
                            $part .= '(' . self::readpe($tokens, $i) . ')';
                            if (is_array($tokens[++$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                            if ($tokens[$i] == '{') {
                                $rl = self::readl($tokens, '{', '}', $i);
                                $rl = self::nspartitioning($partition, substr($rl, 1, -1), $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns);
                                $part = $ns . $part . '{' . $rl . '}';
                                if (!isset($partition[$part])) {
                                    $key = random_bytes(16);
                                    $partition[$part] = [count($partition), $key, self::partition_encode($part, $key, $iv1, $iv2, $ivs)];
                                }
                                $code .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                                $code .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$fli::partition_decode(\AlomDecoder$fli::\$partition[" . $partition[$part][0] . "],'" . base64_encode($partition[$part][1]) . "','$pkyid'));";
                                $part = '';
                            } else--$i;
                        } else--$i;
                    } else {
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_USE) {
                            $part .= $tokens[$i++][1];
                            if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                        }
                        if ($tokens[$i] == '(') $part .= '(' . self::readpe($tokens, $i) . ')'; else--$i;
                    }
                } else if ($tokens[$i][0] == T_FN || $tokens[$i][0] == T_DECLARE) {
                    $part .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                    if ($tokens[$i] == '(') $part .= '(' . self::readpe($tokens, $i) . ')'; else--$i;
                } else if (in_array($tokens[$i][0], [T_STATIC, T_ECHO, T_GLOBAL])) {
                    $part .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                    $part .= self::readpe($tokens, $i, TRUE);
                } else if ($tokens[$i][0] == T_RETURN) {
                    $part .= $tokens[$i++][1];
                    $part .= self::readpe($tokens, $i, TRUE);
                    if ($tokens[$i + 1] == ';') $part .= $tokens[($i++) + 1];
                    $ua[] = count($partition);
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [count($partition), $key, self::partition_encode($part, $key, $iv1, $iv2, $ivs)];
                    }
                    $code .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $code .= "\$_ALOM_return=true;return \$_ALOM_result=eval(\AlomDecoder$fli::partition_decode(\AlomDecoder$fli::\$partition[" . $partition[$part][0] . "],'" . base64_encode($partition[$part][1]) . "','$pkyid'));";
                    $part = '';
                } else if ($tokens[$i][0] == T_CONTINUE) {
                    ++$i;
                    $pe = max(1, (int)self::readpe($tokens, $i, TRUE));
                    if ($tokens[$i + 1] == ';') ++$i;
                    $part .= "\$_ALOM_continue=$pe;";
                    $ua[] = count($partition);
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [count($partition), $key, self::partition_encode($part, $key, $iv1, $iv2, $ivs)];
                    }
                    $code .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $code .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$fli::partition_decode(\AlomDecoder$fli::\$partition[" . $partition[$part][0] . "],'" . base64_encode($partition[$part][1]) . "','$pkyid'));";
                    $part = '';
                } else if ($tokens[$i][0] == T_BREAK) {
                    ++$i;
                    $pe = max(1, (int)self::readpe($tokens, $i, TRUE));
                    if ($tokens[$i + 1] == ';') ++$i;
                    $part .= "\$_ALOM_break=$pe;";
                    $ua[] = count($partition);
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [count($partition), $key, self::partition_encode($part, $key, $iv1, $iv2, $ivs)];
                    }
                    $code .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $code .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$fli::partition_decode(\AlomDecoder$fli::\$partition[" . $partition[$part][0] . "],'" . base64_encode($partition[$part][1]) . "','$pkyid'));";
                    $part = '';
                } else if ($tokens[$i][0] == T_NAMESPACE) {
                    $code .= $tokens[$i++][1];
                    while (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_WHITESPACE, T_STRING, T_NS_SEPARATOR])) $code .= $tokens[$i++][1];
                    if ($tokens[$i] != '{') {
                        --$i;
                        continue;
                    }
                    $rl = self::readl($tokens, '{', '}', $i);
                    $rl = self::nspartitioning($partition, substr($rl, 1, -1), $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                    $part .= '{' . $rl . '}';
                } else if ($tokens[$i] == ';') {
                    $part = $ns . $part . ';';
                    $ua[] = count($partition);
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [count($partition), $key, self::partition_encode($part, $key, $iv1, $iv2, $ivs)];
                    }
                    $code .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $code .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$fli::partition_decode(\AlomDecoder$fli::\$partition[" . $partition[$part][0] . "],'" . base64_encode($partition[$part][1]) . "','$pkyid'));";
                    $part = '';
                } else if ($tokens[$i] == ',') {
                    $part = $ns . "return $part;";
                    $ua[] = count($partition);
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [count($partition), $key, self::partition_encode($part, $key, $iv1, $iv2, $ivs)];
                    }
                    $code .= "eval(\AlomDecoder$fli::partition_decode(\AlomDecoder$fli::\$partition[" . $partition[$part][0] . "],'" . base64_encode($partition[$part][1]) . "','$pkyid')),";
                    $part = '';
                } else if (is_array($tokens[$i]) && $tokens[$i][0] == T_OBJECT_OPERATOR) {
                    $part .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                    $rl = self::readl($tokens, '{', '}', $i);
                    $rl = self::nspartitioning($partition, 'return ' . substr($rl, 1, -1) . ';', $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                    $part .= '{' . $rl . '}';
                } else if (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_ISSET, T_UNSET, T_EMPTY, T_ARRAY, T_LIST])) {
                    $part .= $tokens[$i++][1];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                    if ($tokens[$i] == '(') {
                        $rl = self::readl($tokens, '(', ')', $i);
                        $part .= $rl;
                    } else--$i;
                } else if (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_WHILE, T_FOR, T_IF, T_ELSEIF, T_ELSE, T_FOREACH, T_DECLARE])) {
                    $code .= 'if(!isset($_ALOM_continue))$_ALOM_continue=0;if(!isset($_ALOM_break))$_ALOM_break=0;';
                    for (; isset($tokens[$i]); ++$i) if (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_WHILE, T_FOR, T_FOREACH, T_DECLARE])) {
                        $lf = $tokens[$i][0] == T_FOR;
                        $part .= $tokens[$i++][1];
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                        if ($tokens[$i] == '(') {
                            $rl = self::readl($tokens, '(', ')', $i);
                            ++$i;
                            if ($fast || $lf) {
                                $part .= $rl;
                            } else {
                                $rl = self::nspartitioning($partition, substr($rl, 1, -1), $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua, TRUE);
                                $part .= '(' . $rl . ')';
                            }
                            if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                            if ($tokens[$i] == '{') {
                                $rl = self::readl($tokens, '{', '}', $i);
                                ++$i;
                                $rl = self::nspartitioning($partition, substr($rl, 1, -1), $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                                $rl = substr($rl, strpos($rl, ';') + 1);
                                $part .= '{' . $rl . 'if($_ALOM_continue>0){--$_ALOM_continue;if($_ALOM_continue>0)break;}if($_ALOM_break>0){--$_ALOM_break;break;}}';
                                $ua[] = count($partition);
                                if (!isset($partition[$part])) {
                                    $key = random_bytes(16);
                                    $partition[$part] = [count($partition), $key, self::partition_encode($part, $key, $iv1, $iv2, $ivs)];
                                }
                                $code .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                                $code .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$fli::partition_decode(\AlomDecoder$fli::\$partition[" . $partition[$part][0] . "],'" . base64_encode($partition[$part][1]) . "','$pkyid'));";
                                $part = '';
                                break;
                            }
                            $rs = self::reads($tokens, $i);
                            if (isset($tokens[$i]) && $tokens[$i] == ';') $rs .= $tokens[$i++];
                            $rs = self::nspartitioning($partition, $rs, $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                            $part .= '{' . $rs . '}';
                            $ua[] = count($partition);
                            if (!isset($partition[$part])) {
                                $key = random_bytes(16);
                                $partition[$part] = [count($partition), $key, self::partition_encode($part, $key, $iv1, $iv2, $ivs)];
                            }
                            $code .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                            $code .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$fli::partition_decode(\AlomDecoder$fli::\$partition[" . $partition[$part][0] . "],'" . base64_encode($partition[$part][1]) . "','$pkyid'));";
                            $part = '';
                        }
                        --$i;
                    } else if (is_array($tokens[$i]) && $tokens[$i][0] == T_IF) {
                        while (TRUE) {
                            $part .= $tokens[$i++][1];
                            if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                            if ($tokens[$i] == '(') {
                                $rl = self::readl($tokens, '(', ')', $i);
                                ++$i;
                                if ($fast) {
                                    $part .= $rl;
                                } else {
                                    $rl = self::nspartitioning($partition, substr($rl, 1, -1), $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua, TRUE);
                                    $part .= '(' . $rl . ')';
                                }
                            }
                            if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                            if ($tokens[$i] == '{') {
                                $rl = self::readl($tokens, '{', '}', $i);
                                ++$i;
                                $rl = self::nspartitioning($partition, substr($rl, 1, -1), $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                                $part .= '{' . $rl . '}';
                            } else {
                                $rs = self::reads($tokens, $i);
                                if (isset($tokens[$i]) && $tokens[$i] == ';') $rs .= $tokens[$i++];
                                $rs = self::nspartitioning($partition, $rs, $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                                $part .= '{' . $rs . '}';
                            }
                            if (isset($tokens[$i]) && is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                            if (!isset($tokens[$i])) break;
                            if (is_array($tokens[$i]) && $tokens[$i][0] == T_ELSEIF) continue; else if (is_array($tokens[$i]) && $tokens[$i][0] == T_ELSE) {
                                $part .= $tokens[$i++][1];
                                if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                                if ($tokens[$i] == '{') {
                                    $rl = self::readl($tokens, '{', '}', $i);
                                    ++$i;
                                    $rl = self::nspartitioning($partition, substr($rl, 1, -1), $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                                    $part .= '{' . $rl . '}';
                                } else {
                                    $rs = self::reads($tokens, $i);
                                    if (isset($tokens[$i]) && $tokens[$i] == ';') $rs .= $tokens[$i++];
                                    $rs = self::nspartitioning($partition, $rs, $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                                    $part .= '{' . $rs . '}';
                                }
                                break;
                            } else break;
                        }
                        break;
                    }
                    if (isset($tokens[$i]) && $tokens[$i] == ';') $part .= $tokens[$i++];
                    --$i;
                    $ua[] = count($partition);
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [count($partition), $key, self::partition_encode($part, $key, $iv1, $iv2, $ivs)];
                    }
                    $code .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $code .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$fli::partition_decode(\AlomDecoder$fli::\$partition[" . $partition[$part][0] . "],'" . base64_encode($partition[$part][1]) . "','$pkyid'));";
                    $part = '';
                } else if ($tokens[$i] == '$') {
                    $part .= $tokens[$i++];
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) $part .= $tokens[$i++][1];
                    $rl = self::readl($tokens, '{', '}', $i);
                    $rl = self::nspartitioning($partition, substr($rl, 1, -1), $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                    $part .= '{' . $rl . '}';
                } else if ($tokens[$i] == '{') {
                    $rl = self::readl($tokens, '{', '}', $i);
                    $rl = self::nspartitioning($partition, substr($rl, 1, -1), $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                    $part .= '{' . $rl . '}';
                } else if ($tokens[$i] == '(') {
                    $rl = self::readl($tokens, '(', ')', $i);
                    if ($fast) {
                        $part .= $rl;
                    } else {
                        $rl = self::nspartitioning($partition, substr($rl, 1, -1), $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                        $part .= '(' . $rl . ')';
                    }
                } else if (is_array($tokens[$i])) $part .= $tokens[$i][1];
                else $part .= $tokens[$i];
            }
            if (trim($part) !== '') {
                $part = $ns . "return $part;";
                $ua[] = count($partition);
                if (!isset($partition[$part])) {
                    $key = random_bytes(16);
                    $partition[$part] = [count($partition), $key, self::partition_encode($part, $key, $iv1, $iv2, $ivs)];
                }
                $code .= "eval(\AlomDecoder$fli::partition_decode(\AlomDecoder$fli::\$partition[" . $partition[$part][0] . "],'" . base64_encode($partition[$part][1]) . "','$pkyid'))";
                $part = '';
                return $code;
            } else {
                $code = $ns . $code;
                $ua[] = count($partition);
                if (!isset($partition[$code])) {
                    $key = random_bytes(16);
                    $partition[$code] = [count($partition), $key, self::partition_encode($code, $key, $iv1, $iv2, $ivs)];
                }
                $code = "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;" . "\$_ALOM_result=eval(\AlomDecoder$fli::partition_decode(\AlomDecoder$fli::\$partition[" . $partition[$code][0] . "],'" . base64_encode($partition[$code][1]) . "','$pkyid'));if(isset(\$_ALOM_return))return \$_ALOM_result;";
            }
            return $code;
        }

        public static function partitioning(&$ua, &$partition, $code, $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast = FALSE)
        {
            $tokens = token_get_all("<?" . "php $code");
            array_shift($tokens);
            $pkyid = base64_encode($pkyid);
            $code = $ns = '';
            $i = 0;
            while (isset($tokens[$i]) && ((is_array($tokens[$i]) && in_array($tokens[$i][0], [
                            T_WHITESPACE,
                            T_COMMENT,
                            T_DOC_COMMENT,
                        ])) || $tokens[$i] == ';')) $code .= is_array($tokens[$i]) ? $tokens[$i++][1] : $tokens[$i++];
            if (isset($tokens[$i]) && is_array($tokens[$i]) && $tokens[$i][0] == T_NAMESPACE) {
                $ns .= $tokens[$i++][1];
                while (is_array($tokens[$i]) && in_array($tokens[$i][0], [T_WHITESPACE, T_STRING, T_NS_SEPARATOR])) $ns .= $tokens[$i++][1];
                if ($tokens[$i] == '{') {
                    $block = substr(self::readl($tokens, '{', '}', $i), 1, -1);
                    ++$i;
                    while (isset($tokens[$i]) && ((is_array($tokens[$i]) && in_array($tokens[$i][0], [
                                    T_WHITESPACE,
                                    T_COMMENT,
                                    T_DOC_COMMENT,
                                ])) || $tokens[$i] == ';')) $ns .= is_array($tokens[$i]) ? $tokens[$i++][1] : $tokens[$i++];
                    $block = self::nspartitioning($partition, $block, $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns);
                    $code .= $block;
                    $ns = '';
                    while (isset($tokens[$i]) && is_array($tokens[$i]) && $tokens[$i][0] == T_NAMESPACE) {
                        $ns .= $tokens[$i++][1];
                        while (isset($tokens[$i]) && $tokens[$i] != '{') $ns .= is_array($tokens[$i]) ? $tokens[$i++][1] : $tokens[$i++];
                        $block = substr(self::readl($tokens, '{', '}', $i), 1, -1);
                        ++$i;
                        while (isset($tokens[$i]) && ((is_array($tokens[$i]) && in_array($tokens[$i][0], [
                                        T_WHITESPACE,
                                        T_COMMENT,
                                        T_DOC_COMMENT,
                                    ])) || $tokens[$i] == ';')) $ns .= is_array($tokens[$i]) ? $tokens[$i++][1] : $tokens[$i++];
                        $block = self::nspartitioning($partition, $block, $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                        $code .= $block;
                        $ns = '';
                    }
                } else {
                    $ns .= $tokens[$i++];
                    while (isset($tokens[$i]) && ((is_array($tokens[$i]) && in_array($tokens[$i][0], [
                                    T_WHITESPACE,
                                    T_COMMENT,
                                    T_DOC_COMMENT,
                                ])) || $tokens[$i] == ';')) $ns .= is_array($tokens[$i]) ? $tokens[$i++][1] : $tokens[$i++];
                    while (isset($tokens[$i]) && is_array($tokens[$i]) && $tokens[$i][0] == T_NAMESPACE) {
                        $ns .= $tokens[$i++][1];
                        while (is_array($tokens[$i]) && in_array($tokens[$i][0], [
                                T_WHITESPACE,
                                T_STRING,
                                T_NS_SEPARATOR,
                            ])) $ns .= is_array($tokens[$i]) ? $tokens[$i++][1] : $tokens[$i++];
                        $ns .= $tokens[$i++];
                        while (isset($tokens[$i]) && ((is_array($tokens[$i]) && in_array($tokens[$i][0], [
                                        T_WHITESPACE,
                                        T_COMMENT,
                                        T_DOC_COMMENT,
                                    ])) || $tokens[$i] == ';')) $ns .= is_array($tokens[$i]) ? $tokens[$i++][1] : $tokens[$i++];
                    }
                    $block = '';
                    for (; isset($tokens[$i]); ++$i) $block .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                    $block = self::nspartitioning($partition, $block, $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                    $code .= $block;
                }
            } else {
                $block = '';
                for (; isset($tokens[$i]); ++$i) $block .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
                $block = self::nspartitioning($partition, $block, $memtwister, $fli, $iv1, $iv2, $ivs, $pkyid, $fast, $ns, $ua);
                $code .= $block;
            }
            $nspartition = $partition;
            $partition = [];
            foreach ($nspartition as $part) $partition[$part[0]] = $part[2];
            return $code;
        }

        public static function findQBC($code, $delimiter, $hbc = 5)
        {
            $zbc = str_repeat('f', $hbc);
            for ($j = 0; ; ++$j) for ($i = 0; $i <= 0x7fffffff; ++$i) {
                $hash = md5(str_replace($delimiter, "$i-$j", $code));
                if (substr($hash, 0, $hbc) == $zbc) return str_replace($delimiter, "$i-$j", $code);
            }
        }

        public static function obfuscator($code, $settings = [])
        {
            self::$obfstime = microtime(TRUE);
            $oui = md5(crc32($code) . rand() . self::$obfstime, TRUE);
            $fli = substr(md5("alom:$oui"), 0, 12);
            self::$key[0] ^= rand();
            self::$key[1] ^= rand();
            self::$fky[0] = self::getasciiikey(16);
            self::$fky[1] = self::getasciiikey(16);
            $depth = isset($settings['depth']) ? abs((float)$settings['depth']) : 1;
            $extra = isset($settings['extra']) ? (string)$settings['extra'] : FALSE;
            $antitamper_extra = isset($settings['antitamper_extra']) ? (string)$settings['antitamper_extra'] : FALSE;
            $uniquname = isset($settings['uniquname']) ? $settings['uniquname'] : FALSE;
            $uniquser = isset($settings['uniquser']) ? $settings['uniquser'] : FALSE;
            $uniqaddr = isset($settings['uniqaddr']) ? $settings['uniqaddr'] : FALSE;
            $uniqhost = isset($settings['uniqhost']) ? $settings['uniqhost'] : FALSE;
            $depthtype = isset($settings['depth_type']) ? $settings['depth_type'] : 'logpower';
            $rtw = isset($settings['rtw']) ? (int)$settings['rtw'] : 0;
            $expiration = isset($settings['expiration']) ? (int)$settings['expiration'] : 0x7fffffff;
            $forcename = isset($settings['force_name']) ? md5(basename((string)$settings['force_name']), TRUE) : FALSE;
            $title = isset($settings['title']) ? (string)$settings['title'] : 'Obfuscatored by ALOM 2.1';
            $author = isset($settings['author']) ? (string)$settings['author'] : FALSE;
            $copyright = isset($settings['copyright']) ? (string)$settings['copyright'] : FALSE;
            $description = isset($settings['description']) ? (string)$settings['description'] : FALSE;
            $hide_comment = isset($settings['hide_comment']) ? (bool)$settings['hide_comment'] : FALSE;
            $file_denied = isset($settings['file_denied']) ? (bool)$settings['file_denied'] : FALSE;
            $force_filenames = isset($settings['force_files']) ? $settings['force_files'] : [];
            $outer_decoder = isset($settings['outer_decoder']) ? (string)$settings['outer_decoder'] : FALSE;
            $outer_memtwister = isset($settings['outer_memtwister']) ? (string)$settings['outer_memtwister'] : FALSE;
            $memtwister = isset($settings['memtwister']) ? (bool)$settings['memtwister'] : FALSE;
            $minify = isset($settings['minify']) ? (bool)$settings['minify'] : TRUE;
            $error_hiding = isset($settings['error_hiding']) ? (bool)$settings['error_hiding'] : TRUE;
            $ptk = isset($settings['partial_keeper']) ? (bool)$settings['partial_keeper'] : FALSE;
            $enabled_eval = strpos(ini_get("disable_functions"), 'eval') === FALSE && eval("return 1;");
            $fast_partitioning = isset($settings['fast_partitioning']) ? (bool)$settings['fast_partitioning'] : $enabled_eval;
            $partitioning = $fast_partitioning || (isset($settings['partitioning']) ? (bool)$settings['partitioning'] : FALSE);
            $qbc = isset($settings['qbc']) ? (string)$settings['qbc'] : FALSE;
            $hbc = 5;
            $raw = isset($settings['raw']) ? (bool)$settings['raw'] : FALSE;
            if (!is_array($force_filenames)) $force_filenames = $force_filenames ? [(string)$force_filenames] : [];
            if (!file_exists($outer_decoder)) $outer_decoder = FALSE; else $force_filenames[] = $outer_decoder;
            $force_files = [];
            $force_files_sum = '';
            if (isset($force_filenames[0])) {
                foreach ($force_filenames as $name) {
                    $force_files[$name] = md5(basename($name) . "\n" . file_get_contents($name), TRUE);
                    $force_files_sum .= $force_files[$name] . "\n";
                }
                $force_files_sum .= count($force_filenames);
                $force_files_sum = md5($force_files_sum, TRUE) . "\n";
            }
            $seed = rand();
            if ($minify) $code = self::minify($code);
            $checksum = md5($code);
            $tokens = token_get_all($code);
            $code = '';
            for ($i = 0; isset($tokens[$i]); ++$i) if (is_array($tokens[$i])) if ($tokens[$i][0] == T_FILE) $code .= "_uwC5JBWaTsMV4Vs$fli()"; else if ($tokens[$i][0] == T_DIR) $code .= "_fETt6AVcU6vr6m5$fli()";
            else if ($i == 0 && $tokens[$i][0] == T_INLINE_HTML) {
                $html = htmlentities($tokens[$i][1]);
                $html = $html == $tokens[$i][1] ? 'print "' . $html . '"' : 'print html_entity_decode("' . $html . '")';
                if (isset($tokens[$i + 1])) {
                    if ($tokens[++$i][0] == T_OPEN_TAG_WITH_ECHO) $code .= "<" . "?php $html;echo "; else $code .= "<" . "?php $html;";
                } else $code .= "<" . "?php $html; ?" . ">";
            } else if ($tokens[$i][0] == T_CLOSE_TAG && isset($tokens[$i + 1])) {
                if ($tokens[++$i][0] == T_OPEN_TAG_WITH_ECHO) $code .= ";echo "; else if ($tokens[$i][0] == T_OPEN_TAG) $code .= ';';
                else if ($tokens[$i][0] == T_INLINE_HTML) {
                    $html = htmlentities($tokens[$i][1]);
                    $html = $html == $tokens[$i][1] ? 'print "' . $html . '"' : 'print html_entity_decode("' . $html . '")';
                    if (isset($tokens[$i + 1])) {
                        if ($tokens[++$i][0] == T_OPEN_TAG_WITH_ECHO) $code .= ";$html;echo "; else $code .= ";$html;";
                    } else $code .= ";$html; ?" . ">";
                }
            } else if ($tokens[$i][0] == T_OPEN_TAG_WITH_ECHO) $code .= "<" . "?php echo ";
            else $code .= $tokens[$i][1]; else $code .= $tokens[$i];
            if ($code === '') $code = '<' . '?php ?' . '>'; else if (substr($code, -2, 2) != '?' . '>') $code .= '?' . '>';
            unset($tokens);
            $code = str_replace("?" . "><" . "?php", '', rtrim($code));
            $code = self::setikeys($code);
            $code = self::sug($code, $fli);
            $pky = [crc32(self::$fky[0]) ^ self::$key[0], crc32(self::$fky[1]) ^ self::$key[1]];
            $pky[2] = md5($pky[0] . $oui . $pky[1], TRUE);
            $pkyid = substr(md5($pky[0] . $pky[2] . $oui . $pky[1], TRUE), 4);
            if ($memtwister) {
                $code = self::minify(self::memtwister_op2fn($code, $fli));
                $code = self::memtwister_obfs($code, $fli, $pky[0], $pky[1], $pky[2], $pkyid);
            }
            $code = substr($code, 5);
            $code = str_replace("?" . "><" . "?php", '', rtrim($code));
            if (substr($code, -2, 2) == '?' . '>') $code = substr($code, 0, -2);
            $code = trim($code);
            self::mt_prng_store($seed ^ 0x90c8);
            self::encodew(TRUE, 0, 0);
            if ($partitioning) {
                $pky2 = [crc32($pkyid . $pky[0]) ^ self::$key[1], crc32($pkyid . $pky[1]) ^ self::$key[0]];
                $pky2[2] = md5($pky2[0] . $pky[2] . $pky2[1], TRUE);
                $pkyid2 = substr(md5($pky2[0] . $pky2[2] . $pky[2] . $pky2[1], TRUE), 4);
                $ua = $partition = [];
                $code = self::partitioning($ua, $partition, $code, $memtwister, $fli, $pky2[0], $pky2[1], $pky2[2], $pkyid2, $fast_partitioning);
                $code = pack('N', strlen($code) ^ $pky[0]) . $code;
                $code .= pack('N', count($ua) ^ $pky[0]);
                foreach ($ua as $part) $code .= pack('N', $part ^ $pky[0]);
                foreach ($partition as $part) $code .= pack('N', strlen($part) ^ $pky[0]) . $part;
                for ($i = strlen($code) - 2; $i >= 0; --$i) $code[$i + 1] = chr((ord($code[$i + 1]) ^ ord($code[$i]) ^ ord(self::$fky[1][$i & 0xf])) - ord(self::$fky[0][$i & 0xf]) + 0x100 & 0xff);
                for ($i = 0; isset($code[$i]); ++$i) $code[$i] = chr((ord($code[$i]) ^ ord(self::$fky[0][$i & 0xf])) - ord(self::$fky[1][$i & 0xf]) + 0x100 & 0xff);
            }
            $code = gzdeflate($code, 9);
            self::mt_prng_store($seed ^ 0x8550255);
            $code = self::inc($code, rand() ^ self::$key[0], rand() ^ self::$key[1]);
            self::mt_prng_store($seed ^ 0xde);
            $len = strlen($code);
            switch ($depthtype) {
                case 'constant':
                    $depth = ceil(($depth + 1) * $depth);
                    break;
                case 'logarthm':
                    $depth = ceil((log($len + 1, 2) + $depth + 1) * $depth);
                    break;
                case 'logpower':
                    $depth = ceil((pow(log($len + 1, 2), 2.02) + $depth + 1) * $depth);
                    break;
                case 'square':
                    $depth = ceil((sqrt($len) + $depth + 1) * $depth);
                    break;
                case 'linear':
                    $depth = ceil(($len + $depth + 1) * $depth);
                    break;
            }
            $randpack = [];
            $rps = $depth * 9 + 6;
            for ($i = 1; $i <= $rps; ++$i) $randpack[$rps - $i] = rand();
            $file = "<" . "?php\n";
            if (!$hide_comment && $title) {
                $title = str_replace(["\n", "*/"], [" *   ", "*//*"], $title);
                $file .= "/** $title\n";
                if ($author) $file .= " * Author: " . str_replace(["\n", "*/"], [" *   ", "*//*"], $author) . "\n";
                if ($copyright) $file .= " * Copyright: " . str_replace(["\n", "*/"], [" *   ", "*//*"], $copyright) . "\n";
                if ($description) $file .= " * Description: " . str_replace(["\n", "*/"], [" *   ", "*//*"], $description) . "\n";
                if ($rtw !== 0) $file .= " * Ready to start: " . date('c', $rtw) . "\n";
                if ($expiration !== 0x7fffffff) $file .= " * Expiration: " . date('c', $expiration) . "\n";
                $file .= " * Script Checksum: $checksum\n";
                $file .= " */\n";
            }
            $hs1 = strlen($file);
            if ($extra) $file .= "$extra\n";
            $hs = strlen($file);
            $file .= "// OUI d472b60006a99679:" . bin2hex($oui) . "\n";
            if ($antitamper_extra) {
                $ouil = strpos($antitamper_extra, "// OUI d472b60006a99679:") === FALSE;
                $file .= "$antitamper_extra\n";
            } else $ouil = TRUE;
            if ($ouil) {
                $file .= 'function _uwC5JBWaTsMV4Vs' . $fli . '(){return __FILE__;}function _fETt6AVcU6vr6m5' . $fli . '(){return __DIR__;}function _s7GdHhyCWB0FOmT' . $fli . '($cMEhPFcDh8H){';
                $file .= 'return ($ndnNmLHVPUs=realpath($cMEhPFcDh8H))?$ndnNmLHVPUs:realpath(__DIR__."/".$cMEhPFcDh8H);}';
                $file .= 'function _p7gVaLbkwAJQogI' . $fli . '($XYZbpYbFeAq){file_put_contents($SIXuBOnIF1l="RTC5n5ykVBf".rand().rand().".php","<"."?php file_put_contents(__FILE__,\'\');unlink(__FILE__);$XYZbpYbFeAq ?".">");return $SIXuBOnIF1l;}';
                $file .= 'function _nZGueubW86A4Fdf' . $fli . '($XYZbpYbFeAq){if(strpos(ini_get("disable_functions"),"\145\x76\141\154")===false&&eval("return 1;"))return eval($XYZbpYbFeAq);$SIXuBOnIF1l=_p7gVaLbkwAJQogI' . $fli . '($XYZbpYbFeAq);';
                $file .= 'include $SIXuBOnIF1l;if(strpos(ini_get("disable_functions"),"file_exists")!==false||file_exists($SIXuBOnIF1l)){file_put_contents($SIXuBOnIF1l,"");unlink($SIXuBOnIF1l);}}';
                $file .= 'function _H4abed0zL6i7Pgw' . $fli . '($XYZbpYbFeAq){return str_replace("AlomDecoder","AlomDecoder' . $fli . '",$XYZbpYbFeAq);}';
                if ($memtwister) $file .= 'function _CuIjYEAXVvJzmV8' . $fli . '($XYZbpYbFeAq){return str_replace("_ALOM_memtwister","_ALOM_memtwister' . $fli . '",$XYZbpYbFeAq);}';
                $file .= "\n_nZGueubW86A4Fdf$fli(_H4abed0zL6i7Pgw$fli(gzinflate(";
                if (!$raw) $file .= "base64_decode(";
                if (!$outer_decoder) {
                    $file .= "'";
                    $contents = file_get_contents(_fETt6AVcU6vr6m5a935dc95a7b2() . '/alomdecoder.obfs.php');
                    $file .= $raw ? self::singlequote(base64_decode($contents)) : $contents;
                    $file .= "'";
                } else {
                    $outer_decoder = base64_encode($outer_decoder);
                    if ($raw) $file .= "base64_decode(";
                    $file .= "file_get_contents(_s7GdHhyCWB0FOmT" . $fli . "(base64_decode('$outer_decoder')))";
                    if ($raw) $file .= ')';
                }
                if (!$raw) $file .= ')';
                $file .= ")));";
                if ($memtwister) {
                    $file .= "\n_nZGueubW86A4Fdf$fli(_CuIjYEAXVvJzmV8$fli(gzinflate(";
                    if (!$raw) $file .= "base64_decode(";
                    if (!$outer_memtwister) {
                        $file .= "'";
                        $contents = file_get_contents(_fETt6AVcU6vr6m5a935dc95a7b2() . '/memtwister.obfs.php');
                        $file .= $raw ? self::singlequote(base64_decode($contents)) : $contents;
                        $file .= "'";
                    } else {
                        $outer_memtwister = base64_encode($outer_memtwister);
                        if ($raw) $file .= "base64_decode(";
                        $file .= "file_get_contents(_s7GdHhyCWB0FOmT" . $fli . "(base64_decode('$outer_memtwister')))";
                        if ($raw) $file .= ')';
                    }
                    if (!$raw) $file .= ')';
                    $file .= ")));";
                }
            }
            $hs2 = strlen($file) - $hs;
            self::mt_prng_reset();
            $p = 0;
            $r = 0;
            for ($i = 0; $i < $depth; ++$i) {
                $act = $ptk ? $randpack[$r + 8] % 0b111 : $randpack[$r + 8] % 0b110;
                switch ($act) {
                    case 0b000:
                        $code[$p] = chr(ord($code[$p]) ^ ((self::$key[0] ^ self::$key[1]) & 0xff));
                        self::$key[1] ^= $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++];
                        self::$key[0] ^= $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++];
                        break;
                    case 0b001:
                        $crc = ((int)(rand() + self::$key[0] + self::$key[1]) & 0xffffffff) ^ rand();
                        $crcb = pack('V', $crc ^ 0x9f0a4382);
                        $sl = self::uncrc32in(substr($code, 0, $p) . $crcb, substr($code, $p), $crc);
                        $code = substr($code, 0, $p) . $crcb . $sl . substr($code, $p);
                        $sl = unpack('V', $sl);
                        $crc ^= $randpack[$r + 7];
                        self::$key[1] ^= $crc ^ $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++] ^ $sl[1];
                        self::$key[0] ^= $crc ^ $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++];
                        ++$r;
                        break;
                    case 0b010:
                        $crc = crc32(pack('V', $randpack[$r + 7]) . self::$fky[0]);
                        $crc ^= crc32(pack('V', $randpack[$r + 6]) . self::$fky[1]);
                        self::$key[1] ^= $crc ^ $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++];
                        self::$key[0] ^= $crc ^ $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++];
                        $r += 2;
                        break;
                    case 0b011:
                        $sl1 = rand();
                        $sl2 = rand();
                        $code = substr($code, 0, $p) . pack('V2', $sl1, $sl2) . substr($code, $p);
                        self::$key[1] ^= $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++] ^ $sl2 ^ 1;
                        self::$key[0] ^= $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++] ^ $sl1;
                        break;
                    case 0b100:
                        $cl = strlen($code) - 1;
                        $lq = ceil($memtwister ? pow($cl, 1 / 3) : sqrt($cl));
                        $cl -= $lq;
                        $loc = $randpack[$r + 7] % $cl;
                        $len = ($randpack[$r + 5] ^ $randpack[$r + 6]) % $lq + 1;
                        $sl1 = self::$key[0] ^ $randpack[$r + 1];
                        $sl2 = self::$key[1] ^ $randpack[$r];
                        if ($len > $cl / 2) $len = $randpack[$r + 2] % $len + 1; else $sl2 ^= $randpack[$r + 2];
                        $code = substr($code, 0, $loc) . self::encodew(substr($code, $loc, $len), $sl1, $sl2) . substr($code, $loc + $len);
                        self::$key[1] = $sl1 ^ $randpack[$r + 4];
                        self::$key[0] = $sl2 ^ $randpack[$r + 3];
                        $r += 8;
                        break;
                    case 0b101:
                        $cl = strlen($code) - 1;
                        $lq = ceil($memtwister ? pow($cl, 1 / 3) : sqrt($cl));
                        $cl -= $lq;
                        $loc = $randpack[$r + 7] % $cl;
                        $len = ($randpack[$r + 5] ^ $randpack[$r + 6]) % $lq + 1;
                        $sl1 = self::$key[0] ^ $randpack[$r + 1];
                        $sl2 = self::$key[1] ^ $randpack[$r];
                        if ($len > $cl / 2) $len = $randpack[$r + 2] % $len + 1; else $sl2 ^= $randpack[$r + 2];
                        $code = substr($code, 0, $loc) . self::incw(substr($code, $loc, $len), $sl1, $sl2) . substr($code, $loc + $len);
                        self::$key[1] = $sl1 ^ $randpack[$r + 4];
                        self::$key[0] = $sl2 ^ $randpack[$r + 3];
                        $r += 8;
                        break;
                    case 0b110:
                        $crc = ((int)(rand() + self::$key[0] + self::$key[1]) & 0xffffffff) ^ rand();
                        self::$key[1] ^= $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++] ^ $crc;
                        self::$key[0] ^= $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++] ^ $randpack[$r++] ^ $crc;
                        $len = strlen($code);
                        $sub = '';
                        do {
                            $loc = rand(0, $len - 1);
                            $dlt = rand(0, 0xff);
                            $code[$loc] = $code[$loc] ^ chr($dlt);
                            if ($dlt > 0xf) $dlt = dechex($dlt); else $dlt = '0' . dechex($dlt);
                            $sub .= "\$code[$loc]=\$code[$loc]^\"\\x$dlt\";";
                        } while (rand(0, 5));
                        if (rand(0, 3)) {
                            if ($file_denied) {
                                $fgc = base64_encode(self::encodew('file_get_contents', self::$key[0] ^ self::$key[1], $crc));
                                $crb = str_pad(dechex($crc), 8, '0', STR_PAD_LEFT);
                                $cuf = base64_encode(self::encodew('_uwC5JBWaTsMV4Vs' . $fli, self::$key[1], self::$key[0]));
                                $sub .= "self::\$encoded_code=\AlomDecoder$fli::decodew(base64_decode('$fgc'),self::\$key[0]^self::\$key[1],0x$crb)";
                                $sub .= "(call_user_func(\AlomDecoder$fli::decodew(base64_decode('$cuf'),self::\$key[1],self::\$key[0])),false,null,0,0x4000);";
                            } else {
                                $fgc1 = base64_encode(self::encodew('file_get_contents', self::$key[0], self::$key[1]));
                                $fgc2 = base64_encode(self::encodew('file_get_contents', self::$key[0] ^ self::$key[1], $crc));
                                $cufe = base64_encode(self::encodew('_uwC5JBWaTsMV4Vs' . $fli, self::$key[1], self::$key[0]));
                                $sub .= "self::\$encoded_code=\AlomDecoder$fli::decodew(base64_decode('$fgc2'),self::\$key[0]^self::\$key[1],";
                                $sub .= "crc32(\AlomDecoder$fli::decodew(base64_decode('$fgc1'),self::\$key[0],self::\$key[1])(__FILE__)))";
                                $sub .= "(call_user_func(\AlomDecoder$fli::decodew(base64_decode('$cufe'),self::\$key[1],self::\$key[0])),false,null,0,0x4000);";
                            }
                        }
                        do {
                            $loc = rand(0, $len - 1);
                            $dlt = rand(0, 0xff);
                            $code[$loc] = $code[$loc] ^ chr($dlt);
                            if ($dlt > 0xf) $dlt = dechex($dlt); else $dlt = '0' . dechex($dlt);
                            $sub .= "\$code[$loc]=\$code[$loc]^\"\\x$dlt\";";
                        } while (rand(0, 5));
                        $sub .= "\n// ";
                        do {
                            $sbb = self::getasciiikey(4);
                            $ext = self::uncrc32in("<" . "?php $sub$sbb", "\n?" . ">", $crc);
                            $sbb .= $ext;
                        } while (str_replace(["\r", "\n"], '', $sbb) != $sbb);
                        $sub .= $sbb;
                        $sbm = $sub;
                        $sub = gzdeflate($sub, 9);
                        $code = substr($code, 0, $p) . pack('V', strlen($sub)) . $sub . substr($code, $p);
                        self::$fky[0] = self::$fky[0] ^ md5($oui . substr($file, 0, $hs1) . $sbm, TRUE);
                        self::$fky[1] = self::$fky[1] ^ md5($oui . substr($file, $hs, $hs2) . $sbm, TRUE);
                        break;
                }
                $loc = rand() % strlen($code);
                $code = substr($code, 0, $loc) . pack('V', $p ^ self::$key[0] ^ self::$key[1]) . substr($code, $loc);
                $p = $loc;
                self::$key[0] = (int)(self::$key[0] - 0x32123 - ($randpack[$r] >> 4)) & 0xffffffff;
                self::$key[1] = (int)(self::$key[1] - 0x12321 - ($randpack[$r] >> 4)) & 0xffffffff;
                ++$r;
            }
            $packet = pack('V', $p ^ self::$key[0] ^ self::$key[1]);
            $sl1 = $randpack[$r++];
            $sl2 = $randpack[$r++];
            $crc1 = crc32(pack('V', $sl1));
            $crc2 = crc32(pack('V', $sl2));
            self::$key[1] ^= 0x9c2858bd;
            self::$key[0] = unpack('V', self::uncrc32(self::$key[0] ^ $randpack[$r++] ^ $sl1, $crc1));
            self::$key[0] = self::$key[0][1] ^ $randpack[$r++] ^ $sl2;
            self::$key[1] = unpack('V', self::uncrc32(self::$key[1] ^ $randpack[$r++] ^ $sl2, $crc2));
            self::$key[1] = self::$key[1][1] ^ $randpack[$r++] ^ $sl1;
            self::$key[0] ^= 0xfb6d7bbe;
            $uniqord = 0xf3;
            $uniqid = $oui;
            if ($uniquname !== FALSE) {
                $uniqid .= "un:$uniquname\n";
                $uniqord ^= 1;
            }
            if ($uniquser !== FALSE) {
                $uniqid .= "us:$uniquser\n";
                $uniqord ^= 2;
            }
            if ($forcename !== FALSE) {
                $uniqid .= "fn:$forcename\n";
                $uniqord ^= 4;
            }
            if ($uniqaddr !== FALSE) {
                $uniqid .= "ip:$uniqaddr\n";
                $uniqord ^= 8;
            }
            if ($uniqhost !== FALSE) {
                $uniqid .= "sh:$uniqhost\n";
                $uniqord ^= 16;
            }
            $uniqid .= $force_files_sum;
            $uniqid = md5($uniqid . chr($uniqord), TRUE);
            self::$key[0] ^= crc32(substr($uniqid, 0, 8));
            self::$key[1] ^= crc32(substr($uniqid, 8, 8));
            self::$fky[0] = self::$fky[0] ^ $uniqid;
            self::$fky[1] = self::$fky[1] ^ $uniqid;
            $code = chr($uniqord) . md5($oui . $uniqid, TRUE) . $code;
            $ffsp = pack('V', count($force_files) ^ 0x405a0ff1);
            foreach ($force_files as $name => $hash) {
                $ffsp .= pack('V', strlen($name) ^ 0x671feb84) . $name . md5($oui . $hash, TRUE);
            }
            $code = $ffsp . $code;
            self::$key[0] ^= $rtw;
            self::$key[1] ^= $expiration;
            self::$fky[0] = self::$fky[0] ^ md5($oui . substr($file, 0, $hs1), TRUE);
            self::$fky[1] = self::$fky[1] ^ md5($oui . substr($file, $hs, $hs2), TRUE);
            $code = pack('V2', $rtw ^ 0xf09132b8, $expiration ^ 0x5627c1f0) . $code;
            $packet .= pack('V3', self::$key[1] ^ 0xefcdab89, self::$key[0], $depth ^ 0x309a2f35);
            $packet .= pack('V2', $hs1 ^ 0x45ff39ae, $hs2 ^ 0x01192bca);
            $packet .= $file_denied ? "\xc0" : "\xb0";
            $packet .= $error_hiding ? "\x32" : "\x03";
            $packet .= $ptk ? "\x55" : "\xad";
            $packet .= $memtwister ? "\x1e" : "\x9d";
            $packet .= $partitioning ? "\x9e" : "\x0c";
            $packet .= self::$fky[0] . self::$fky[1] . $oui;
            $code = $packet . $code;
            $code .= "\x43";
            $len = strlen($code);
            if ($len % 4 != 0) $code .= str_repeat("\x85", 4 - $len % 4);
            self::mt_prng_store($seed ^ 0x74);
            $code = array_values(unpack('V*', $code));
            for ($i = 0; isset($code[$i]); ++$i) $code[$i] ^= rand();
            array_unshift($code, 'V*');
            $code = call_user_func_array('pack', $code);
            $version = 10600;
            $code = pack('V3', $version ^ 0x309a2f37, time() ^ 0x509a2f33, crc32($code) ^ 0xDEADC0DE) . $code;
            self::mt_prng_store($seed ^ 0x51);
            $code = $raw ? "\0" . self::singlequote($code) : self::base64encode($code);
            $code = "\x41l\x6fM$" . dechex($seed) . ($qbc ? ":$qbc" : '') . "$" . $code;
            self::mt_prng_reset();
            $file .= "\n\AlomDecoder$fli::mt_prng_store(rand());";
            $file .= "\$_ALOM_vrs=get_defined_vars();\AlomDecoder$fli::\$vgb=isset(\$GLOBALS['_ALOM_vrs']);\AlomDecoder$fli::\$vrs=array();";
            $file .= "foreach(\$_ALOM_vrs as \$_ALOM_key=>\$_ALOM_val)\AlomDecoder$fli::\$vrs[\$_ALOM_key]=&\$\$_ALOM_key;unset(\$_ALOM_vrs);";
            $file .= "if(isset(\$_ALOM_key))unset(\$_ALOM_key,\$_ALOM_val);\AlomDecoder$fli::run('$code');";
            $file .= "extract(\AlomDecoder$fli::tvg());\AlomDecoder$fli::tvs();";
            self::$key = [0x67452301, 0xefcdab89];
            self::$fky = [];
            self::$obfstime = 0;
            return $file . "\n?" . ">";
        }
    }
}