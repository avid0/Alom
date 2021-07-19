<?php

/**
 * Alom 2.2
 * Unpacked by Tesla
 * https://github.com/0x11DFE
 */

if ($_ALOM_beforeeval) {
    $_ALOM_code = "";
    unset($_ALOM_code, $_ALOM_beforeeval);
} else {
    file_put_contents($_ALOM_code, "");
    unlink($_ALOM_code);
    $_ALOM_code = "";
    unset($_ALOM_code, $_ALOM_beforeeval);
}
if (!class_exists("AlomEncoder")) {
    if (!defined("ALOM_VERSION")) {
        define("ALOM_VERSION", "2.2");
    }
    if (!defined("ALOM_VERSION_NUMBER")) {
        define("ALOM_VERSION_NUMBER", 20200);
    }
    if (!defined("T_NULLSAFE_OBJECT_OPERATOR")) {
        define("T_NULLSAFE_OBJECT_OPERATOR", NULL);
    }
    if (!defined("T_FN")) {
        define("T_FN", NULL);
    }
    if (!defined("T_COALESCE")) {
        define("T_COALESCE", NULL);
    }
    if (!defined("T_COALESCE_EQUAL")) {
        define("T_COALESCE_EQUAL", NULL);
    }

    class AlomEncoder
    {
        private static $mt_prng_seed = 1;
        private static $key = [0x67452301, 0xefcdab89];
        private static $fky = [];
        private static $obfstime = 0;
        public static $iscli = TRUE;
        public static $logger = TRUE;
        private static $license_code_sbox = [
            0x7c,
            0x12,
            0x9a,
            0x4d,
            0x03,
            0xd8,
            0x63,
            0x51,
            0x75,
            0x5b,
            0x70,
            0x7d,
            0x58,
            0x20,
            0x0a,
            0x60,
            0xe3,
            0xfd,
            0x8d,
            0xc2,
            0xeb,
            0x05,
            0x6f,
            0x09,
            0x7a,
            0x25,
            0xce,
            0xe9,
            0x9c,
            0x48,
            0x35,
            0x33,
            0xb8,
            0x07,
            0x14,
            0xef,
            0x66,
            0x16,
            0xa6,
            0xd2,
            0xc0,
            0x61,
            0xe2,
            0x1b,
            0x0c,
            0xf8,
            0x4f,
            0x95,
            0x45,
            0x3b,
            0xc4,
            0xdc,
            0x84,
            0x6d,
            0x5e,
            0xa8,
            0xea,
            0x54,
            0x0f,
            0x6c,
            0x78,
            0x34,
            0x8e,
            0x0e,
            0x19,
            0x5a,
            0x97,
            0xcd,
            0x5d,
            0x00,
            0x1a,
            0xab,
            0xd9,
            0x29,
            0x01,
            0x43,
            0xe0,
            0xc5,
            0x15,
            0xc6,
            0x82,
            0xae,
            0xe7,
            0xa1,
            0xc7,
            0x99,
            0x4c,
            0x06,
            0x90,
            0xaa,
            0xf6,
            0xdd,
            0x2b,
            0xe8,
            0x1d,
            0xdb,
            0x3d,
            0xe5,
            0xbf,
            0xf2,
            0xc3,
            0x5f,
            0x89,
            0xe1,
            0x9d,
            0x4b,
            0x27,
            0x77,
            0x2c,
            0x62,
            0x68,
            0x57,
            0x73,
            0x59,
            0x38,
            0x6e,
            0xa0,
            0x2a,
            0x1f,
            0xf9,
            0xa9,
            0xde,
            0x92,
            0x0b,
            0xf5,
            0xee,
            0x88,
            0xf7,
            0x36,
            0x8b,
            0xc8,
            0x08,
            0x24,
            0x2e,
            0x7e,
            0xda,
            0x79,
            0xa5,
            0x69,
            0x10,
            0x3a,
            0x23,
            0x87,
            0xa4,
            0xcf,
            0xe6,
            0x02,
            0xf3,
            0x3f,
            0x7b,
            0xd6,
            0x50,
            0x44,
            0x37,
            0xb7,
            0x72,
            0x6b,
            0xd0,
            0x3e,
            0xa3,
            0xfc,
            0x91,
            0x74,
            0xfa,
            0x0d,
            0xcc,
            0x7f,
            0xe4,
            0xbb,
            0x71,
            0x31,
            0x56,
            0x9f,
            0x53,
            0x98,
            0xf4,
            0xb4,
            0xc1,
            0x39,
            0xad,
            0x85,
            0x80,
            0x96,
            0x1e,
            0x28,
            0xbe,
            0xff,
            0xf0,
            0xed,
            0x9b,
            0x55,
            0xaf,
            0xa2,
            0x2f,
            0x86,
            0x32,
            0x3c,
            0x1c,
            0xba,
            0xb1,
            0x21,
            0xca,
            0xb0,
            0x13,
            0x46,
            0xd1,
            0x18,
            0xb2,
            0x47,
            0x26,
            0xd4,
            0x30,
            0xc9,
            0xac,
            0x81,
            0x8f,
            0xd7,
            0xbc,
            0xb5,
            0x93,
            0x9e,
            0x41,
            0x65,
            0x64,
            0xfb,
            0xb3,
            0xb6,
            0xcb,
            0x8c,
            0xdf,
            0x42,
            0xfe,
            0x40,
            0x17,
            0x2d,
            0xbd,
            0x11,
            0xd5,
            0x83,
            0x04,
            0x49,
            0xd3,
            0xa7,
            0x4a,
            0x4e,
            0x94,
            0xec,
            0xb9,
            0x5c,
            0xf1,
            0x52,
            0x67,
            0x76,
            0x6a,
            0x22,
            0x8a,
        ];
        private static $license_code_ubox = [
            0x45,
            0x4a,
            0x92,
            0x04,
            0xef,
            0x15,
            0x57,
            0x21,
            0x83,
            0x17,
            0x0e,
            0x7b,
            0x2c,
            0xa4,
            0x3f,
            0x3a,
            0x8b,
            0xec,
            0x01,
            0xcb,
            0x22,
            0x4e,
            0x25,
            0xe9,
            0xce,
            0x40,
            0x46,
            0x2b,
            0xc5,
            0x5e,
            0xb7,
            0x76,
            0x0d,
            0xc8,
            0xfe,
            0x8d,
            0x84,
            0x19,
            0xd1,
            0x6a,
            0xb8,
            0x49,
            0x75,
            0x5c,
            0x6c,
            0xea,
            0x85,
            0xc1,
            0xd3,
            0xaa,
            0xc3,
            0x1f,
            0x3d,
            0x1e,
            0x80,
            0x99,
            0x72,
            0xb2,
            0x8c,
            0x31,
            0xc4,
            0x60,
            0x9e,
            0x94,
            0xe8,
            0xdd,
            0xe6,
            0x4b,
            0x98,
            0x30,
            0xcc,
            0xd0,
            0x1d,
            0xf0,
            0xf3,
            0x69,
            0x56,
            0x03,
            0xf4,
            0x2e,
            0x97,
            0x07,
            0xfa,
            0xad,
            0x39,
            0xbe,
            0xab,
            0x6f,
            0x0c,
            0x71,
            0x41,
            0x09,
            0xf8,
            0x44,
            0x36,
            0x65,
            0x0f,
            0x29,
            0x6d,
            0x06,
            0xdf,
            0xde,
            0x24,
            0xfb,
            0x6e,
            0x8a,
            0xfd,
            0x9c,
            0x3b,
            0x35,
            0x73,
            0x16,
            0x0a,
            0xa9,
            0x9b,
            0x70,
            0xa2,
            0x08,
            0xfc,
            0x6b,
            0x3c,
            0x88,
            0x18,
            0x95,
            0x00,
            0x0b,
            0x86,
            0xa6,
            0xb5,
            0xd6,
            0x50,
            0xee,
            0x34,
            0xb4,
            0xc2,
            0x8e,
            0x7e,
            0x66,
            0xff,
            0x81,
            0xe4,
            0x12,
            0x3e,
            0xd7,
            0x58,
            0xa1,
            0x7a,
            0xdb,
            0xf5,
            0x2f,
            0xb6,
            0x42,
            0xae,
            0x55,
            0x02,
            0xbd,
            0x1c,
            0x68,
            0xdc,
            0xac,
            0x74,
            0x53,
            0xc0,
            0x9f,
            0x8f,
            0x89,
            0x26,
            0xf2,
            0x37,
            0x78,
            0x59,
            0x47,
            0xd5,
            0xb3,
            0x51,
            0xbf,
            0xca,
            0xc7,
            0xcf,
            0xe1,
            0xb0,
            0xda,
            0xe2,
            0x9a,
            0x20,
            0xf7,
            0xc6,
            0xa8,
            0xd9,
            0xeb,
            0xb9,
            0x62,
            0x28,
            0xb1,
            0x13,
            0x64,
            0x32,
            0x4d,
            0x4f,
            0x54,
            0x82,
            0xd4,
            0xc9,
            0xe3,
            0xa5,
            0x43,
            0x1a,
            0x90,
            0x9d,
            0xcd,
            0x27,
            0xf1,
            0xd2,
            0xed,
            0x96,
            0xd8,
            0x05,
            0x48,
            0x87,
            0x5f,
            0x33,
            0x5b,
            0x79,
            0xe5,
            0x4c,
            0x67,
            0x2a,
            0x10,
            0xa7,
            0x61,
            0x91,
            0x52,
            0x5d,
            0x1b,
            0x38,
            0x14,
            0xf6,
            0xbc,
            0x7d,
            0x23,
            0xbb,
            0xf9,
            0x63,
            0x93,
            0xaf,
            0x7c,
            0x5a,
            0x7f,
            0x2d,
            0x77,
            0xa3,
            0xe0,
            0xa0,
            0x11,
            0xe7,
            0xba,
        ];

        public static function getmd5ikey($str)
        {
            return md5($str . ":" . microtime() . ":" . lcg_value(), TRUE);
        }

        public static function getasciiikey($len)
        {
            if (function_exists("random_bytes")) {
                return random_bytes($len);
            }
            $str = "";
            for ($i = 0; $i * 16 < $len; ++$i) {
                $str .= getmd5ikey($str . $len);
            }
            return substr($str, 0, $len);
        }

        public static function getcharikey()
        {
            return self::getasciiikey(1);
        }

        public static function getbitikey()
        {
            return ord(self::getcharikey()) & 1;
        }

        public static function getintikey()
        {
            $ikey = unpack("N", self::getasciiikey(4));
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
                            if ($ot == T_OPEN_TAG_WITH_ECHO) {
                                $new = rtrim($new, "; ");
                            } else {
                                $ts = " " . $ts;
                            }
                            $new .= $ts;
                            $ot = NULL;
                            $iw = FALSE;
                        } else if (in_array($tn, $IW)) {
                            $new .= $ts;
                            $iw = TRUE;
                        } else if (
                            $tn == T_CONSTANT_ENCAPSED_STRING ||
                            $tn == T_ENCAPSED_AND_WHITESPACE
                        ) {
                            if ($ts[0] == '"') {
                                $ts = addcslashes($ts, "\n\t\r");
                            }
                            $new .= $ts;
                            $iw = TRUE;
                        } else if ($tn == T_WHITESPACE) {
                            $nt = isset($tokens[$i + 1])
                                ? $tokens[$i + 1]
                                : NULL;
                            if (
                                !$iw &&
                                (!is_string($nt) || $nt == '$') &&
                                !in_array($nt[0], $IW)
                            ) {
                                $new .= " ";
                            } else if (
                                $nt !== NULL &&
                                isset($tokens[$i - 1]) &&
                                ($tokens[$i - 1] == "." ||
                                    $tokens[$i + 1] == ".") &&
                                ($tokens[$i - 1][0] == T_LNUMBER ||
                                    $tokens[$i + 1][0] == T_LNUMBER)
                            ) {
                                $new .= " ";
                            }
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
                                if (
                                    is_string($tokens[$j]) &&
                                    $tokens[$j] == ";"
                                ) {
                                    $i = $j;
                                    break;
                                } else if ($tokens[$j][0] == T_CLOSE_TAG) {
                                    break;
                                }
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
            $s = self::strshuffle(
                "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRSTUVWXYZ+/="
            );
            $res = "";
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
                    if ($i2) {
                        $res .= $s[$a3 & 63];
                    } else {
                        $res .= "Q";
                    }
                } else {
                    $res .= "QQ";
                }
            }
            return $res;
        }

        private static function encode($st, $sl1, $sl2, $fa = FALSE)
        {
            srand($sl1 ^ ($sl2 & 0x7fffffff));
            $sl1 ^= rand();
            $sl2 ^= rand();
            if ($fa) {
                if (strlen($st) < 2) {
                    return $st;
                }
                $sl = $sl1 ^ $sl2 ^ rand();
                $st = array_values(unpack("C*", $st));
                $r = [
                    rand(0, 0xff),
                    rand(0, 0xff),
                    rand(0, 0xff),
                    rand(0, 0xff),
                ];
                $st[0] ^= $r[3];
                $i = count($st) - 1;
                $st[0] =
                    (($st[0] - (($sl >> ($i & 63)) & 0xff) + 0x100) & 0xff) ^
                    $st[$i];
                for (--$i; $i >= 0; --$i) {
                    $st[$i + 1] =
                        (($st[$i + 1] - (($sl >> ($i & 63)) & 0xff) + 0x100) &
                            0xff) ^
                        $st[$i];
                }
                $st[0] ^= $r[2];
                $i = count($st) - 1;
                $st[0] =
                    (($st[0] ^ (($sl2 >> ($i & 63)) & 0xff)) -
                        $st[$i] +
                        0x100) &
                    0xff;
                for (--$i; $i >= 0; --$i) {
                    $st[$i + 1] =
                        (($st[$i + 1] ^ (($sl2 >> ($i & 63)) & 0xff)) -
                            $st[$i] +
                            0x100) &
                        0xff;
                }
                $st[0] ^= $r[1];
                $i = count($st) - 1;
                $st[0] =
                    (($st[0] ^ (($sl1 >> ($i & 63)) & 0xff)) -
                        $st[$i] +
                        0x100) &
                    0xff;
                for (--$i; $i >= 0; --$i) {
                    $st[$i + 1] =
                        (($st[$i + 1] ^ (($sl1 >> ($i & 63)) & 0xff)) -
                            $st[$i] +
                            0x100) &
                        0xff;
                }
                $st[0] ^= $r[0];
                array_unshift($st, "C*");
                return call_user_func_array("pack", $st);
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
            $rounds =
                ($fa
                    ? -1
                    : (($sl & 0x3) ^ (($sl >> 8) & 0x3) ^ ($sl2 & 0x3)) +
                    0x1a) + floor(log($len + 2, 2) - 1);
            $sl = ($sl & 0xff) ^ ($sl1 & 0xff) ^ (($sl >> 16) & 0xff) ^ 1;
            if ($len == 0) {
                return "";
            }
            if ($len == 1) {
                return chr($u1[$u0[ord($st) ^ $sl] ^ $sl] ^ $sl);
            }
            $st = array_values(unpack("C*", $st));
            $l4 = $sq * 4;
            for ($round = $rounds - 1; $round >= 0; --$round) {
                srand((($sl1 ^ $sl2) + $round * 12329) & 0x7fffffff);
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
                    if ($p1 >= $p) {
                        ++$p1;
                    }
                    if ($p2 >= $p) {
                        ++$p2;
                    }
                    if ($p3 >= $p) {
                        ++$p3;
                    }
                    $st[$p2] =
                        $u0[($st[$p2] - $st[$p] + 0x100) & 0xff] ^
                        $st[$p] ^
                        $sl;
                    $st[$p3] =
                        $u1[($st[$p3] - $st[$p] + 0x100) & 0xff] ^
                        $st[$p] ^
                        $sl;
                    $st[$p1] =
                        $u0[($st[$p1] - $st[$p] + 0x100) & 0xff] ^
                        $st[$p] ^
                        $sl;
                    $st[$p] =
                        $u1[($u0[$st[$p] ^ $t1[$st[$p1]]] - $st[$p2] + 0x100) &
                        0xff] ^ $st[$p3];
                    $st[$p] =
                        ($u1[($st[$p] - $st[$p1] + 0x100) & 0xff] -
                            $st[$p1] +
                            0x100) &
                        0xff;
                    $st[$p] =
                        $u0[($st[$p] - $st[$p3] + 0x100) & 0xff] ^ $st[$p3];
                    $st[$p] ^= $sl;
                    $st[$p] =
                        $u1[($st[$p] - $st[$p2] + 0x100) & 0xff] ^ $st[$p1];
                    $st[$p] =
                        ($u0[$st[$p] ^ $st[$p1]] - $st[$p3] + 0x100) & 0xff;
                    $st[$p] =
                        ($u1[$st[$p] ^ $st[$p3]] - $st[$p2] + 0x100) & 0xff;
                }
            }
            array_unshift($st, "C*");
            return call_user_func_array("pack", $st);
        }

        private static function inc($str, $sl1, $sl2, $fa = FALSE)
        {
            AlomEncoder::mt_prng_reset();
            AlomEncoder::mt_prng_store($sl1 ^ $sl2 ^ rand());
            $str .= pack("V2", rand() ^ $sl1, rand() ^ $sl2);
            srand($sl1 ^ ($sl2 & 0x7fffffff));
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
            $rounds =
                (($sl & 0x5) ^ (($sl >> 8) & 0x5) ^ ($sl2 & 0x5)) +
                0xa +
                floor(log($len + 2, 2) - 1);
            $sl = ($sl & 0xff) ^ ($sl1 & 0xff) ^ (($sl >> 16) & 0xff);
            if ($len == 0) {
                return "";
            }
            if ($len == 1) {
                return chr($u1[$u0[ord($st) ^ $sl] ^ $sl] ^ $sl);
            }
            $l1 = $len - 1;
            $st = array_values(unpack("C*", $st));
            for ($round = $rounds - 1; $round >= 0; --$round) {
                for ($i = $len - 1; $i >= 0; --$i) {
                    $p = ((($i * 0xf) % $len) + 0x37d973 + $round) % $len;
                    $p1 =
                        ((($i * 0xb) % $l1) + (($p * 0x9) % $l1) + 0x2e1081) %
                        $l1;
                    $p2 =
                        ((($i * 0x7) % $l1) + (($p1 * 0x9) % $l1) + 0x105977) %
                        $l1;
                    $p3 =
                        ((($i * 0x3) % $l1) + (($p2 * 0x1) % $l1) + 0x17d10f) %
                        $l1;
                    if ($p1 >= $p) {
                        ++$p1;
                    }
                    if ($p2 >= $p) {
                        ++$p2;
                    }
                    if ($p3 >= $p) {
                        ++$p3;
                    }
                    $st[$p2] =
                        $u0[($st[$p2] - $st[$p] + 0x100) & 0xff] ^
                        $st[$p] ^
                        $sl;
                    $st[$p3] =
                        $u1[($st[$p3] - $st[$p] + 0x100) & 0xff] ^
                        $st[$p] ^
                        $sl;
                    $st[$p1] =
                        $u0[($st[$p1] - $st[$p] + 0x100) & 0xff] ^
                        $st[$p] ^
                        $sl;
                    $st[$p] =
                        $u1[($u0[$st[$p] ^ $t1[$st[$p1]]] - $st[$p2] + 0x100) &
                        0xff] ^ $st[$p3];
                    $st[$p] =
                        ($u1[($st[$p] - $st[$p1] + 0x100) & 0xff] -
                            $st[$p1] +
                            0x100) &
                        0xff;
                    $st[$p] =
                        $u0[($st[$p] - $st[$p3] + 0x100) & 0xff] ^ $st[$p3];
                    $st[$p] ^= $sl;
                    $st[$p] =
                        $u1[($st[$p] - $st[$p2] + 0x100) & 0xff] ^ $st[$p1];
                    $st[$p] =
                        ($u0[$st[$p] ^ $st[$p1]] - $st[$p3] + 0x100) & 0xff;
                    $st[$p] =
                        ($u1[$st[$p] ^ $st[$p3]] - $st[$p2] + 0x100) & 0xff;
                }
            }
            array_unshift($st, "C*");
            return call_user_func_array("pack", $st);
        }

        private static function incw($str, $sl1, $sl2)
        {
            $str .= pack("V", $sl1 ^ $sl2 ^ 0x72f70fec);
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
            $r = pack("C4", $s0, $s1, $s2, $s3);
            return $r;
        }

        private static function uncrc32in($first, $last, $next, $prev = 0)
        {
            self::crc32table($t, $u, $table);
            $prev ^= 0xffffffff;
            $next ^= 0xffffffff;
            for ($i = 0; isset($first[$i]); ++$i) {
                $tab = $table[($prev ^ ord($first[$i])) & 0xff];
                $prev = $tab ^ (($prev >> 8) & 0x00ffffff);
            }
            for ($i = strlen($last) - 1; $i >= 0; --$i) {
                $lch = $u[3][($next >> 24) & 0xff];
                $next = ($lch ^ ord($last[$i])) | (($next ^ $table[$lch]) << 8);
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
            self::$mt_prng_seed =
                (int)(self::$mt_prng_seed + 7012329) & 0xffffffff;
            self::$mt_prng_seed ^= 0x23958cde;
            return srand($seed);
        }

        private static function readl($tokens, $a, $b, &$i)
        {
            $str = "";
            $u = 0;
            do {
                if (is_array($tokens[$i])) {
                    $str .= $tokens[$i][1];
                    if (
                        ($tokens[$i][0] == T_CURLY_OPEN ||
                            $tokens[$i][0] == T_DOLLAR_OPEN_CURLY_BRACES) &&
                        $a == "{"
                    ) {
                        ++$u;
                    }
                } else {
                    $str .= $tokens[$i];
                    if ($tokens[$i] == $a) {
                        ++$u;
                    } else if ($tokens[$i] == $b) {
                        --$u;
                    }
                }
            } while (isset($tokens[++$i]) && $u != 0);
            --$i;
            return $str;
        }

        private static function readr($tokens, $a, $b, $i, &$j, $nc = FALSE)
        {
            $str = "";
            $u = 0;
            do {
                if (is_array($tokens[$i - $j])) {
                    $str = $tokens[$i - $j][1] . $str;
                    if (
                        ($tokens[$i - $j][0] == T_CURLY_OPEN ||
                            $tokens[$i - $j][0] ==
                            T_DOLLAR_OPEN_CURLY_BRACES) &&
                        $a == "{"
                    ) {
                        --$u;
                    }
                } else {
                    if ($nc && $tokens[$i - $j] == ";") {
                        return FALSE;
                    }
                    $str = $tokens[$i - $j] . $str;
                    if ($tokens[$i - $j] == $b) {
                        ++$u;
                    } else if ($tokens[$i - $j] == $a) {
                        --$u;
                    }
                }
                ++$j;
            } while ($i >= $j && $u != 0);
            --$j;
            if ($nc && $str[0] != "{") {
                return FALSE;
            }
            return $str;
        }

        private static function reads($tokens, &$i)
        {
            $str = "";
            for (; isset($tokens[$i]); ++$i) {
                if (in_array($tokens[$i], [")", "]", "}", ",", ";"])) {
                    break;
                } else if (
                    is_array($tokens[$i]) &&
                    $tokens[$i][0] == T_CLOSE_TAG
                ) {
                    break;
                } else if (
                    is_array($tokens[$i]) &&
                    $tokens[$i][0] == T_START_HEREDOC
                ) {
                    $str .= $tokens[$i++][1];
                    for (
                    ;
                        isset($tokens[$i]) &&
                        (!is_array($tokens[$i]) ||
                            $tokens[$i][0] != T_END_HEREDOC);
                        ++$i
                    ) {
                        $str .= is_array($tokens[$i])
                            ? $tokens[$i][1]
                            : $tokens[$i];
                    }
                    $str .= $tokens[$i][1];
                } else if (
                    is_array($tokens[$i]) &&
                    in_array($tokens[$i][0], [
                        T_WHILE,
                        T_FOR,
                        T_IF,
                        T_ELSEIF,
                        T_ELSE,
                        T_FOREACH,
                        T_DECLARE,
                    ])
                ) {
                    for (; isset($tokens[$i]); ++$i) {
                        if (
                            is_array($tokens[$i]) &&
                            in_array($tokens[$i][0], [
                                T_WHILE,
                                T_FOR,
                                T_FOREACH,
                                T_DECLARE,
                            ])
                        ) {
                            $str .= $tokens[$i++][1];
                            if (
                                is_array($tokens[$i]) &&
                                $tokens[$i][0] == T_WHITESPACE
                            ) {
                                $str .= $tokens[$i++][1];
                            }
                            if ($tokens[$i] == "(") {
                                $str .= self::readl($tokens, "(", ")", $i);
                                ++$i;
                                if (
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_WHITESPACE
                                ) {
                                    $str .= $tokens[$i++][1];
                                }
                                if ($tokens[$i] == "{") {
                                    $str .= self::readl($tokens, "{", "}", $i);
                                    ++$i;
                                    break;
                                }
                            }
                            --$i;
                        } else if (
                            is_array($tokens[$i]) &&
                            $tokens[$i][0] == T_IF
                        ) {
                            while (TRUE) {
                                $str .= $tokens[$i++][1];
                                if (
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_WHITESPACE
                                ) {
                                    $str .= $tokens[$i++][1];
                                }
                                if ($tokens[$i] == "(") {
                                    $str .= self::readl($tokens, "(", ")", $i);
                                    ++$i;
                                }
                                if (
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_WHITESPACE
                                ) {
                                    $str .= $tokens[$i++][1];
                                }
                                if ($tokens[$i] == "{") {
                                    $str .= self::readl($tokens, "{", "}", $i);
                                    ++$i;
                                } else {
                                    $str .= self::reads($tokens, $i);
                                    if (
                                        isset($tokens[$i]) &&
                                        $tokens[$i] == ";"
                                    ) {
                                        $str .= $tokens[$i++];
                                    }
                                }
                                if (
                                    isset($tokens[$i]) &&
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_WHITESPACE
                                ) {
                                    $str .= $tokens[$i++][1];
                                }
                                if (!isset($tokens[$i])) {
                                    break;
                                }
                                if (
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_ELSEIF
                                ) {
                                    continue;
                                } else if (
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_ELSE
                                ) {
                                    $str .= $tokens[$i++][1];
                                    if (
                                        is_array($tokens[$i]) &&
                                        $tokens[$i][0] == T_WHITESPACE
                                    ) {
                                        $str .= $tokens[$i++][1];
                                    }
                                    if ($tokens[$i] == "{") {
                                        $str .= self::readl(
                                            $tokens,
                                            "{",
                                            "}",
                                            $i
                                        );
                                        ++$i;
                                    } else {
                                        $str .= self::reads($tokens, $i);
                                        if (
                                            isset($tokens[$i]) &&
                                            $tokens[$i] == ";"
                                        ) {
                                            $str .= $tokens[$i++];
                                        }
                                    }
                                    break;
                                } else {
                                    break;
                                }
                            }
                            break;
                        }
                    }
                    if (isset($tokens[$i]) && $tokens[$i] == ";") {
                        $str .= $tokens[$i++];
                    }
                    break;
                } else if (is_array($tokens[$i])) {
                    $str .= $tokens[$i][1];
                } else if ($tokens[$i] == "(") {
                    $str .= self::readl($tokens, "(", ")", $i);
                } else if ($tokens[$i] == "[") {
                    $str .= self::readl($tokens, "[", "]", $i);
                } else if ($tokens[$i] == "{") {
                    $str .= self::readl($tokens, "{", "}", $i);
                } else if ($tokens[$i] == '"') {
                    $str .= $tokens[$i++];
                    for (; isset($tokens[$i]) && $tokens[$i] != '"'; ++$i) {
                        $str .= is_array($tokens[$i])
                            ? $tokens[$i][1]
                            : $tokens[$i];
                    }
                    $str .= $tokens[$i];
                } else if ($tokens[$i] == "`") {
                    $str .= $tokens[$i++];
                    for (; isset($tokens[$i]) && $tokens[$i] != "`"; ++$i) {
                        $str .= is_array($tokens[$i])
                            ? $tokens[$i][1]
                            : $tokens[$i];
                    }
                    $str .= $tokens[$i];
                } else {
                    $str .= $tokens[$i];
                }
            }
            return $str;
        }

        private static function readsl($tokens, &$i, $cama = FALSE)
        {
            $str = "";
            $bra = $cama ? [")", "]", "}", ";"] : [")", "]", "}", ",", ";"];
            for (++$i; isset($tokens[$i]); ++$i) {
                if (in_array($tokens[$i], $bra)) {
                    break;
                } else if ($tokens[$i] == ",") {
                    $str .= $tokens[$i++];
                    if (
                        is_array($tokens[$i]) &&
                        $tokens[$i][0] == T_WHITESPACE
                    ) {
                        $str .= $tokens[$i++][1];
                    }
                    --$i;
                } else if (
                    is_array($tokens[$i]) &&
                    $tokens[$i][0] == T_CLOSE_TAG
                ) {
                    break;
                } else if (
                    is_array($tokens[$i]) &&
                    $tokens[$i][0] == T_START_HEREDOC
                ) {
                    $str .= $tokens[$i++][1];
                    for (
                    ;
                        isset($tokens[$i]) &&
                        (!is_array($tokens[$i]) ||
                            $tokens[$i][0] != T_END_HEREDOC);
                        ++$i
                    ) {
                        $str .= is_array($tokens[$i])
                            ? $tokens[$i][1]
                            : $tokens[$i];
                    }
                    $str .= $tokens[$i][1];
                } else if (
                    is_array($tokens[$i]) &&
                    in_array($tokens[$i][0], [
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
                    ])
                ) {
                    $str .= $tokens[$i][1];
                } else if (is_array($tokens[$i])) {
                    break;
                } else if ($tokens[$i] == "(") {
                    $str .= self::readl($tokens, "(", ")", $i);
                } else if ($tokens[$i] == "[") {
                    $str .= self::readl($tokens, "[", "]", $i);
                } else if ($tokens[$i] == "{") {
                    $str .= self::readl($tokens, "{", "}", $i);
                } else if ($tokens[$i] == '"') {
                    $str .= $tokens[$i++];
                    for (; isset($tokens[$i]) && $tokens[$i] != '"'; ++$i) {
                        $str .= is_array($tokens[$i])
                            ? $tokens[$i][1]
                            : $tokens[$i];
                    }
                    $str .= $tokens[$i];
                } else if ($tokens[$i] == "`") {
                    $str .= $tokens[$i++];
                    for (; isset($tokens[$i]) && $tokens[$i] != "`"; ++$i) {
                        $str .= is_array($tokens[$i])
                            ? $tokens[$i][1]
                            : $tokens[$i];
                    }
                    $str .= $tokens[$i];
                } else if ($tokens[$i] == '$') {
                    $str .= $tokens[$i];
                } else if (
                in_array($tokens[$i], [
                    "~",
                    "!",
                    "<",
                    ">",
                    "+",
                    "-",
                    "*",
                    "/",
                    "%",
                    ".",
                ])
                ) {
                    $str .= $tokens[$i];
                } else {
                    break;
                }
            }
            --$i;
            return $str;
        }

        private static function readsr($tokens, $i)
        {
            $str = "";
            $j = 1;
            if ($tokens[$i - $j][0] == T_WHITESPACE) {
                $str = $tokens[$i - $j++][1] . $str;
            }
            for (; $i >= $j; ++$j) {
                if (in_array($tokens[$i - $j], ["(", "[", "{", ",", ";"])) {
                    break;
                }
                if (
                    isset($tokens[$i - $j + 3]) &&
                    is_array($tokens[$i - $j + 1]) &&
                    $tokens[$i - $j + 1][0] == T_WHITESPACE
                ) {
                    if (
                        is_array($tokens[$i - $j + 2]) &&
                        in_array($tokens[$i - $j + 2][0], [
                            T_STRING,
                            T_VARIABLE,
                            T_CONSTANT_ENCAPSED_STRING,
                            T_ARRAY,
                        ])
                    ) {
                        --$j;
                        break;
                    } else if (in_array($tokens[$i - $j + 2], ['$', '"'])) {
                        --$j;
                        break;
                    }
                }
                if (is_array($tokens[$i - $j])) {
                    if (
                    in_array($tokens[$i - $j][0], [
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
                    ])
                    ) {
                        $str = $tokens[$i - $j][1] . $str;
                    } else if (
                        is_array($tokens[$i - $j]) &&
                        $tokens[$i - $j][0] == T_END_HEREDOC
                    ) {
                        $str = $tokens[$i - $j++] . $str;
                        for (
                        ;
                            $i >= $j &&
                            (!is_array($tokens[$i - $j]) ||
                                $tokens[$i - $j][0] != T_START_HEREDOC);
                            ++$j
                        ) {
                            $str =
                                (is_array($tokens[$i - $j])
                                    ? $tokens[$i - $j][1]
                                    : $tokens[$i - $j]) . $str;
                        }
                        $str = $tokens[$i - $j] . $str;
                    } else {
                        break;
                    }
                } else if ($tokens[$i - $j] == '$') {
                    $str = $tokens[$i - $j] . $str;
                } else if ($tokens[$i - $j] == ")") {
                    $params = self::readr($tokens, "(", ")", $i, $j);
                    if (
                        is_array($tokens[$i - $j - 1]) &&
                        in_array($tokens[$i - $j - 1][0], [
                            T_IF,
                            T_ELSEIF,
                            T_WHILE,
                            T_FOR,
                            T_DECLARE,
                            T_ARRAY,
                            T_FOREACH,
                        ])
                    ) {
                        ++$j;
                        break;
                    }
                    $str = $params . $str;
                } else if ($tokens[$i - $j] == "]") {
                    $str = self::readr($tokens, "[", "]", $i, $j) . $str;
                } else if ($tokens[$i - $j] == "}") {
                    $params = self::readr($tokens, "{", "}", $i, $j, TRUE);
                    if (!$params) {
                        ++$j;
                        break;
                    }
                    $str = $params . $str;
                } else if ($tokens[$i - $j] == '"') {
                    $str = $tokens[$i - $j++] . $str;
                    for (; $i >= $j && $tokens[$i - $j] != '"'; ++$j) {
                        $str =
                            (is_array($tokens[$i - $j])
                                ? $tokens[$i - $j][1]
                                : $tokens[$i - $j]) . $str;
                    }
                    $str = $tokens[$i - $j] . $str;
                } else if ($tokens[$i - $j] == "`") {
                    $str = $tokens[$i - $j++] . $str;
                    for (; $i >= $j && $tokens[$i - $j] != "`"; ++$j) {
                        $str =
                            (is_array($tokens[$i - $j])
                                ? $tokens[$i - $j][1]
                                : $tokens[$i - $j]) . $str;
                    }
                    $str = $tokens[$i - $j] . $str;
                } else if (
                in_array($tokens[$i - $j], [
                    "!",
                    "~",
                    "<",
                    ">",
                    "+",
                    "-",
                    "*",
                    "/",
                    "%",
                    ".",
                ])
                ) {
                    $str = $tokens[$i - $j] . $str;
                } else {
                    break;
                }
            }
            return ltrim($str);
        }

        private static function readpe($tokens, &$i, $cama = FALSE)
        {
            $str = "";
            if (is_array($tokens[$i]) && $tokens[$i][0] == T_WHITESPACE) {
                $str .= $tokens[$i++][1];
            }
            if ($tokens[$i] == ";") {
                --$i;
                return $str;
            }
            if (is_array($tokens[$i]) && $tokens[$i][0] == T_CLOSE_TAG) {
                --$i;
                return $str;
            }
            if ($tokens[$i] == "(") {
                $str .= substr(self::readl($tokens, "(", ")", $i), 1, -1);
            } else {
                --$i;
                $str .= self::readsl($tokens, $i, $cama);
            }
            return $str;
        }

        private static function reparse($code, &$tokens, &$i)
        {
            $j = $i;
            $prev = count($tokens);
            for (++$i; isset($tokens[$i]); ++$i) {
                $code .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
            }
            $tokens = token_get_all($code);
            $next = count($tokens);
            $i = $j + $next - $prev;
        }

        private static function reparseExtra(
            &$code,
            &$tokens,
            &$i,
            $readed,
            $extra,
            $backspace = 0
        )
        {
            ++$readed;
            ++$i;
            if ($backspace !== 0) {
                $extratokens = array_slice(
                    token_get_all("<?" . "php $extra"),
                    1
                );
                $backspacesize =
                    count(
                        token_get_all(
                            "<?" . "php " . substr($code, -$backspace)
                        )
                    ) - 1;
                $pc = $code;
                $code = substr($code, 0, -$backspace) . $extra;
                $tokens = array_merge(
                    array_slice($tokens, 0, $i - $backspacesize - $readed),
                    $extratokens,
                    array_slice($tokens, $i)
                );
                $i += count($extratokens) - $backspacesize - $readed;
            } else {
                $extratokens = array_slice(
                    token_get_all("<?" . "php $extra"),
                    1
                );
                $code .= $extra;
                $tokens = array_merge(
                    array_slice($tokens, 0, $i - $readed),
                    $extratokens,
                    array_slice($tokens, $i)
                );
                $i += count($extratokens) - $readed;
            }
            --$i;
        }

        private static function optwister_op2fn(
            $code,
            $signflag,
            &$tokens = NULL
        )
        {
            if ($tokens === NULL) {
                $tokens = token_get_all($code);
            }
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i])) {
                    $j = $i;
                    if ($tokens[$i][0] == T_NEW) {
                        ++$i;
                        $str = $tokens[$i][1];
                        if (
                            is_array($tokens[$i]) &&
                            $tokens[$i][0] == T_WHITESPACE
                        ) {
                            $str .= $tokens[$i++][1];
                        }
                        if (
                            is_array($tokens[$i]) &&
                            $tokens[$i][0] == T_STRING
                        ) {
                            $str .= $tokens[$i++][1];
                            if (
                                is_array($tokens[$i]) &&
                                $tokens[$i][0] == T_WHITESPACE
                            ) {
                                $str .= $tokens[$i++][1];
                            }
                            if ($tokens[$i] == "(") {
                                $prm = $tokens[$i++];
                                if (
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_WHITESPACE
                                ) {
                                    $prm .= $tokens[$i++][1];
                                }
                                if ($tokens[$i] == ")") {
                                    $prm .= $tokens[$i++];
                                    $str = trim($str);
                                    $extra = "_ALOM_optwister{$signflag}_v0('$str')";
                                    --$i;
                                    self::reparseExtra(
                                        $code,
                                        $tokens,
                                        $i,
                                        $i - $j,
                                        $extra
                                    );
                                    $i = $j - 1;
                                } else {
                                    $code .= $str . $prm;
                                    --$i;
                                }
                            } else {
                                $str = trim($str);
                                $extra = "_ALOM_optwister{$signflag}_v0('$str')";
                                --$i;
                                self::reparseExtra(
                                    $code,
                                    $tokens,
                                    $i,
                                    $i - $j,
                                    $extra
                                );
                                $i = $j - 1;
                            }
                        } else {
                            $code .= $str;
                            --$i;
                        }
                    } else if ($tokens[$i][0] == T_EXIT) {
                        ++$i;
                        $pe = self::readpe($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_a($pe)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                        $i = $j - 1;
                    } else if ($tokens[$i][0] == T_PRINT) {
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_c($sl)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                        $i = $j - 1;
                    } else if ($tokens[$i][0] == T_ECHO) {
                        ++$i;
                        $pe = self::readpe($tokens, $i, TRUE);
                        $extra = "_ALOM_optwister{$signflag}_d($pe)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                        $i = $j - 1;
                    } else if ($tokens[$i][0] == T_ARRAY_CAST) {
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_e($sl)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                        $i = $j - 1;
                    } else if ($tokens[$i][0] == T_BOOL_CAST) {
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_f($sl)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                        $i = $j - 1;
                    } else if ($tokens[$i][0] == T_DOUBLE_CAST) {
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_g($sl)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                        $i = $j - 1;
                    } else if ($tokens[$i][0] == T_INT_CAST) {
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_h($sl)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                        $i = $j - 1;
                    } else if ($tokens[$i][0] == T_OBJECT_CAST) {
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_i($sl)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                        $i = $j - 1;
                    } else if ($tokens[$i][0] == T_STRING_CAST) {
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_j($sl)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                        $i = $j - 1;
                    } else {
                        $code .= $tokens[$i][1];
                    }
                } else {
                    $j = $i;
                    if ($tokens[$i] == "~") {
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_t0($sl)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                        $i = $j - 1;
                    } else if ($tokens[$i] == "!") {
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_u0($sl)";
                        self::reparseExtra($code, $tokens, $i, $i - $j, $extra);
                        $i = $j - 1;
                    } else {
                        $code .= $tokens[$i];
                    }
                }
            }
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i])) {
                    $j = $i;
                    if ($tokens[$i][0] == T_POW) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "pow($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_DEC) {
                        $sr = trim(self::readsr($tokens, $i));
                        $sl = trim(self::readsl($tokens, $i));
                        if (trim($sl) === "") {
                            $i = $j;
                            $extra = "_ALOM_optwister{$signflag}_n0($sr)";
                            self::reparseExtra(
                                $code,
                                $tokens,
                                $i,
                                $i - $j,
                                $extra,
                                strlen($sr)
                            );
                        } else {
                            $extra = "_ALOM_optwister{$signflag}_p0($sl)";
                            self::reparseExtra(
                                $code,
                                $tokens,
                                $i,
                                $i - $j,
                                $extra
                            );
                        }
                    } else if ($tokens[$i][0] == T_INC) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        if (trim($sl) === "") {
                            $i = $j;
                            $extra = "_ALOM_optwister{$signflag}_o0($sr)";
                            self::reparseExtra(
                                $code,
                                $tokens,
                                $i,
                                $i - $j,
                                $extra,
                                strlen($sr)
                            );
                        } else {
                            $extra = "_ALOM_optwister{$signflag}_q0($sl)";
                            self::reparseExtra(
                                $code,
                                $tokens,
                                $i,
                                $i - $j,
                                $extra
                            );
                        }
                    } else {
                        $code .= $tokens[$i][1];
                    }
                } else {
                    $code .= $tokens[$i];
                }
            }
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i])) {
                    $code .= $tokens[$i][1];
                } else {
                    $j = $i;
                    if ($tokens[$i] == "*") {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_1($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i] == "/") {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_2($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i] == "%") {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_3($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else {
                        $code .= $tokens[$i];
                    }
                }
            }
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i])) {
                    $code .= $tokens[$i][1];
                } else {
                    $j = $i;
                    if ($tokens[$i] == "+") {
                        $sr = self::readsr($tokens, $i);
                        if (trim($sr) === "") {
                            $code .= $tokens[$i];
                            continue;
                        }
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_z($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i] == "-") {
                        $sr = self::readsr($tokens, $i);
                        if (trim($sr) === "") {
                            $code .= $tokens[$i];
                            continue;
                        }
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else {
                        $code .= $tokens[$i];
                    }
                }
            }
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i])) {
                    $code .= $tokens[$i][1];
                } else {
                    if ($tokens[$i] == ".") {
                        $j = $i;
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_4($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else {
                        $code .= $tokens[$i];
                    }
                }
            }
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i])) {
                    $j = $i;
                    if ($tokens[$i][0] == T_SL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_x($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_SR) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_y($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else {
                        $code .= $tokens[$i][1];
                    }
                } else {
                    $code .= $tokens[$i];
                }
            }
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i])) {
                    $j = $i;
                    if ($tokens[$i][0] == T_LOGICAL_AND) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_u($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_LOGICAL_OR) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_v($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_LOGICAL_XOR) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_w($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else {
                        $code .= $tokens[$i][1];
                    }
                } else {
                    $j = $i;
                    if ($tokens[$i] == "&") {
                        $sr = self::readsr($tokens, $i);
                        if (trim($sr) === "") {
                            $code .= $tokens[$i];
                            continue;
                        }
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_u($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i] == "|") {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_v($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i] == "^") {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_w($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else {
                        $code .= $tokens[$i];
                    }
                }
            }
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i])) {
                    $j = $i;
                    if ($tokens[$i][0] == T_IS_GREATER_OR_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_l($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_IS_SMALLER_OR_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_m($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_IS_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_p($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_IS_IDENTICAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_q($sr,$sl)";
                    } else if ($tokens[$i][0] == T_IS_NOT_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_r($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_IS_NOT_IDENTICAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_s($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else {
                        $code .= $tokens[$i][1];
                    }
                } else {
                    $j = $i;
                    if ($tokens[$i] == ">") {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_n($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i] == "<") {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_o($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else {
                        $code .= $tokens[$i];
                    }
                }
            }
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i])) {
                    $j = $i;
                    if ($tokens[$i][0] == T_BOOLEAN_AND) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_r0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_BOOLEAN_OR) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_s0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else {
                        $code .= $tokens[$i][1];
                    }
                } else {
                    $code .= $tokens[$i];
                }
            }
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i])) {
                    $j = $i;
                    if ($tokens[$i][0] == T_AND_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_a0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_OR_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_b0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_XOR_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_c0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_PLUS_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_d0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_MINUS_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_e0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_MUL_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_f0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_DIV_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_g0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_MOD_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_h0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_POW_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_i0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_SL_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_j0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_SR_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_k0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else if ($tokens[$i][0] == T_CONCAT_EQUAL) {
                        $sr = self::readsr($tokens, $i);
                        $sl = self::readsl($tokens, $i);
                        $extra = "_ALOM_optwister{$signflag}_m0($sr,$sl)";
                        self::reparseExtra(
                            $code,
                            $tokens,
                            $i,
                            $i - $j,
                            $extra,
                            strlen($sr)
                        );
                    } else {
                        $code .= $tokens[$i][1];
                    }
                } else {
                    $code .= $tokens[$i];
                }
            }
            return $code;
        }

        private static function optwister_encode($string, $iv1, $iv2, $ivs)
        {
            $salt = self::getasciiikey(rand(1, 16));
            $mod = (strlen($salt) + strlen($string)) % 3;
            if ($mod > 0) {
                $salt .= self::getasciiikey(3 - $mod);
            }
            $string = chr(strlen($salt)) . $salt . $string;
            for ($i = 0; isset($string[$i]); ++$i) {
                $string[$i] = $ivs[$i & 0xf] ^ $string[$i];
            }
            $string = self::inc($string, $iv1, $iv2, TRUE);
            for ($i = 0; isset($string[$i]); ++$i) {
                $string[$i] = $ivs[$i & 0xf] ^ $string[$i];
            }
            return $string;
        }

        private static function optwister_encapsed_string($string)
        {
            if ($string[0] == "'") {
                $string = substr($string, 1, -1);
                $string = preg_replace_callback(
                    "/(?<!(?<!\\\\)\\\\)\\\\('|\\\\)/",
                    function ($match) {
                        return $match[1];
                    },
                    $string
                );
                return $string;
            }
            $string = substr($string, 1, -1);
            $string = preg_replace_callback(
                "/(?<!(?<!\\\\)\\\\)\\\\([0-7]{1,3}|x[0-9a-fA-F]{1,2}|[ertvnf]|\\\$|\"|\\\\)/",
                function ($match) {
                    switch ($match[1][0]) {
                        case "e":
                            return "\e";
                        case "r":
                            return "\r";
                        case "t":
                            return "\t";
                        case "v":
                            return "\v";
                        case "n":
                            return "\n";
                        case "f":
                            return "\f";
                        case '"':
                        case "\\":
                        case '$':
                            return $match[1];
                        case "x":
                            return chr(hexdec(substr($match[1], 1)));
                        default:
                            return chr(octdec($match[1]));
                    }
                },
                $string
            );
            return $string;
        }

        private static function optwister_lnumber($string)
        {
            if ($string == 0) {
                return "0";
            }
            if ($string[0] == "0") {
                if ($string[1] == "x") {
                    return (string)hexdec(substr($string, 2));
                }
                if ($string[1] == "b") {
                    return (string)bindec(substr($string, 2));
                }
                return (string)octdec(substr($string, 1));
            } else {
                return $string;
            }
        }

        private static function optwister_stringify(&$tokens, $signflag, &$i)
        {
            $code = "";
            $opc = 1;
            for (; isset($tokens[$i]) && $opc != 0; ++$i) {
                if (
                    is_array($tokens[$i]) &&
                    in_array($tokens[$i][0], [T_CLASS, T_TRAIT, T_INTERFACE])
                ) {
                    $code .= $tokens[$i++][1];
                    while (
                        is_array($tokens[$i]) &&
                        in_array($tokens[$i][0], [
                            T_WHITESPACE,
                            T_STRING,
                            T_NS_SEPARATOR,
                            T_EXTENDS,
                            T_IMPLEMENTS,
                        ])
                    ) {
                        $code .= $tokens[$i++][1];
                    }
                    if ($tokens[$i] != "{") {
                        --$i;
                        continue;
                    }
                    $code .= $tokens[$i++];
                    for (; isset($tokens[$i]) && $tokens[$i] != "}"; ++$i) {
                        if (
                            is_array($tokens[$i]) &&
                            $tokens[$i][0] == T_FUNCTION
                        ) {
                            $code .= $tokens[$i++][1];
                            for (
                            ;
                                isset($tokens[$i]) && $tokens[$i] != "(";
                                ++$i
                            ) {
                                if (is_array($tokens[$i])) {
                                    $code .= $tokens[$i][1];
                                } else {
                                    $code .= $tokens[$i];
                                }
                            }
                            $code .= self::readl($tokens, "(", ")", $i);
                            ++$i;
                            for (
                            ;
                                isset($tokens[$i]) && $tokens[$i] != "{";
                                ++$i
                            ) {
                                if ($tokens[$i] == ";") {
                                    break;
                                } else if (is_array($tokens[$i])) {
                                    $code .= $tokens[$i][1];
                                } else {
                                    $code .= $tokens[$i];
                                }
                            }
                            if ($tokens[$i] == ";") {
                                $code .= $tokens[$i];
                                continue;
                            }
                            $code .= $tokens[$i++];
                            $code .= self::optwister_stringify(
                                $tokens,
                                $signflag,
                                $i
                            );
                            --$i;
                        } else if (is_array($tokens[$i])) {
                            $code .= $tokens[$i][1];
                        } else if ($tokens[$i] == "{") {
                            $code .= self::readl($tokens, "{", "}", $i);
                        } else {
                            $code .= $tokens[$i];
                        }
                    }
                    $code .= $tokens[$i];
                } else if ($tokens[$i] == "{") {
                    ++$opc;
                    $code .= $tokens[$i];
                } else if ($tokens[$i] == "}") {
                    --$opc;
                    $code .= $tokens[$i];
                } else if (is_array($tokens[$i])) {
                    if ($tokens[$i][0] == T_FUNCTION) {
                        $code .= $tokens[$i++][1];
                        if (
                            is_array($tokens[$i]) &&
                            $tokens[$i][0] == T_WHITESPACE
                        ) {
                            $code .= $tokens[$i++][1];
                        }
                        if (
                            is_array($tokens[$i]) &&
                            $tokens[$i][0] == T_STRING
                        ) {
                            $code .= $tokens[$i++][1];
                            if (
                                is_array($tokens[$i]) &&
                                $tokens[$i][0] == T_WHITESPACE
                            ) {
                                $code .= $tokens[$i++][1];
                            }
                        }
                        if ($tokens[$i] == "(") {
                            $code .= "(" . self::readpe($tokens, $i) . ")";
                            ++$i;
                        }
                        if (
                            is_array($tokens[$i]) &&
                            $tokens[$i][0] == T_WHITESPACE
                        ) {
                            $code .= $tokens[$i++][1];
                        }
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_USE) {
                            $code .= $tokens[$i++][1];
                            if (
                                is_array($tokens[$i]) &&
                                $tokens[$i][0] == T_WHITESPACE
                            ) {
                                $code .= $tokens[$i++][1];
                            }
                        }
                        if ($tokens[$i] == "(") {
                            $code .= "(" . self::readpe($tokens, $i) . ")";
                        } else {
                            --$i;
                        }
                    } else if (
                        $tokens[$i][0] == T_FN ||
                        $tokens[$i][0] == T_DECLARE
                    ) {
                        $code .= $tokens[$i++][1];
                        if (
                            is_array($tokens[$i]) &&
                            $tokens[$i][0] == T_WHITESPACE
                        ) {
                            $code .= $tokens[$i++][1];
                        }
                        if ($tokens[$i] == "(") {
                            $code .= "(" . self::readpe($tokens, $i) . ")";
                        } else {
                            --$i;
                        }
                    } else if ($tokens[$i][0] == T_STATIC) {
                        $code .= $tokens[$i++][1];
                        if (
                            is_array($tokens[$i]) &&
                            $tokens[$i][0] == T_WHITESPACE
                        ) {
                            $code .= $tokens[$i++][1];
                        }
                        $code .= self::readpe($tokens, $i, TRUE);
                    } else if ($tokens[$i][0] == T_NAMESPACE) {
                        $code .= $tokens[$i++][1];
                        while (
                            is_array($tokens[$i]) &&
                            in_array($tokens[$i][0], [
                                T_WHITESPACE,
                                T_STRING,
                                T_NS_SEPARATOR,
                            ])
                        ) {
                            $code .= $tokens[$i++][1];
                        }
                        if ($tokens[$i] != "{") {
                            --$i;
                            continue;
                        }
                        $code .= $tokens[$i++];
                        $code .= self::optwister_stringify(
                            $tokens,
                            $signflag,
                            $i
                        );
                        --$i;
                    } else if (
                        is_array($tokens[$i]) &&
                        $tokens[$i][0] == T_START_HEREDOC
                    ) {
                        $code .= $tokens[$i++][1];
                        for (
                        ;
                            isset($tokens[$i]) &&
                            (!is_array($tokens[$i]) ||
                                $tokens[$i][0] != T_END_HEREDOC);
                            ++$i
                        ) {
                            $code .= is_array($tokens[$i])
                                ? $tokens[$i][1]
                                : $tokens[$i];
                        }
                        $code .= $tokens[$i][1];
                    } else if ($tokens[$i][0] == T_STRING) {
                        $str = $tokens[$i][1];
                        $prev = "";
                        $j = 1;
                        if (
                            is_array($tokens[$i - $j]) &&
                            $tokens[$i - $j][0] == T_WHITESPACE
                        ) {
                            $prev .= $tokens[$i - $j++][1];
                        }
                        if (
                            is_array($tokens[$i - $j]) &&
                            in_array($tokens[$i - $j][0], [
                                T_OBJECT_OPERATOR,
                                T_NULLSAFE_OBJECT_OPERATOR,
                            ])
                        ) {
                            $code .= "{'$str'}";
                        } else if (
                            is_array($tokens[$i - $j]) &&
                            $tokens[$i - $j][0] == T_DOUBLE_COLON
                        ) {
                            $next = "";
                            $j = 1;
                            if (
                                is_array($tokens[$i + $j]) &&
                                $tokens[$i + $j][0] == T_WHITESPACE
                            ) {
                                $next .= $tokens[$i + $j++][1];
                            }
                            if ($tokens[$i + $j] == "(") {
                                $code .= "{'$str'}";
                            } else {
                                $code .= $str;
                            }
                        } else if (
                            !is_array($tokens[$i - $j]) ||
                            !in_array($tokens[$i - $j][0], [
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
                            ])
                        ) {
                            $next = "";
                            for (
                                $j = 1;
                                isset($tokens[$i + $j]) &&
                                is_array($tokens[$i + $j]) &&
                                in_array($tokens[$i + $j][0], [
                                    T_STRING,
                                    T_WHITESPACE,
                                    T_NS_SEPARATOR,
                                ]);
                                ++$j
                            ) {
                                if (
                                    $j > 1 &&
                                    $tokens[$i + $j - 1][0] == T_WHITESPACE &&
                                    $tokens[$i + $j - 2][0] ==
                                    $tokens[$i + $j][0]
                                ) {
                                    break;
                                } else {
                                    $next .= $tokens[$i + $j][1];
                                }
                            }
                            $i += $j;
                            $str = str_replace(
                                [" ", "\n", "\r", "\t"],
                                "",
                                $str . $next
                            );
                            if (
                                is_array($tokens[$i]) &&
                                $tokens[$i][0] == T_WHITESPACE
                            ) {
                                $next .= $tokens[$i++][1];
                            }
                            if ($tokens[$i] == "(") {
                                $code .= "(function_exists(__NAMESPACE__.'\\$str')?__NAMESPACE__.'\\$str':(function_exists('$str')?'$str':__NAMESPACE__.'\\$str'))";
                            } else if (
                                is_array($tokens[$i]) &&
                                $tokens[$i][0] == T_DOUBLE_COLON
                            ) {
                                $code .= in_array(strtolower($str), [
                                    "self",
                                    "static",
                                    "parent",
                                ])
                                    ? $str
                                    : "(class_exists(__NAMESPACE__.'\\$str')?__NAMESPACE__.'\\$str':" .
                                    "(class_exists('$str')?'$str':__NAMESPACE__.'\\$str'))";
                            } else {
                                $code .= in_array(strtolower($str), [
                                    "null",
                                    "true",
                                    "false",
                                ])
                                    ? "('constant')('$str')"
                                    : "(defined(__NAMESPACE__.'$str')?('constant')(__NAMESPACE__.'\\$str'):" .
                                    "(defined('$str')?('constant')('$str'):'$str'))";
                            }
                            --$i;
                        } else {
                            $code .= $str;
                        }
                    } else if ($tokens[$i][0] == T_NS_SEPARATOR) {
                        $str = $tokens[$i][1];
                        $j = 1;
                        if (
                            is_array($tokens[$i - $j]) &&
                            $tokens[$i - $j][0] == T_WHITESPACE
                        ) {
                            ++$j;
                        }
                        if (
                            !is_array($tokens[$i - $j]) ||
                            !in_array($tokens[$i - $j][0], [
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
                            ])
                        ) {
                            $next = "";
                            for (
                                $j = 1;
                                isset($tokens[$i + $j]) &&
                                is_array($tokens[$i + $j]) &&
                                in_array($tokens[$i + $j][0], [
                                    T_STRING,
                                    T_WHITESPACE,
                                    T_NS_SEPARATOR,
                                ]);
                                ++$j
                            ) {
                                if (
                                    $j > 1 &&
                                    $tokens[$i + $j - 1][0] == T_WHITESPACE &&
                                    $tokens[$i + $j - 2][0] ==
                                    $tokens[$i + $j][0]
                                ) {
                                    break;
                                } else {
                                    $next .= $tokens[$i + $j][1];
                                }
                            }
                            $i += $j;
                            $str = str_replace(
                                [" ", "\n", "\r", "\t"],
                                "",
                                $str . $next
                            );
                            if (
                                is_array($tokens[$i]) &&
                                $tokens[$i][0] == T_WHITESPACE
                            ) {
                                $next .= $tokens[$i++][1];
                            }
                            if ($tokens[$i] == "(") {
                                $code .= "('$str')";
                            } else if (
                                is_array($tokens[$i]) &&
                                $tokens[$i][0] == T_DOUBLE_COLON
                            ) {
                                $code .= in_array(strtolower($str), [
                                    "self",
                                    "static",
                                    "parent",
                                ])
                                    ? $str
                                    : "('$str')";
                            } else {
                                $code .= "('constant')('$str')";
                            }
                            --$i;
                        } else {
                            $code .= $tokens[$i][1];
                        }
                    } else if ($tokens[$i][0] == T_VARIABLE) {
                        $str = substr($tokens[$i][1], 1);
                        $code .= $str == '$this' ? $str : "\${'$str'}";
                    } else if ($tokens[$i][0] == T_LNUMBER) {
                        $str = self::optwister_lnumber($tokens[$i][1]);
                        $code .= "('_ALOM_optwister{$signflag}_h')('$str')";
                    } else if ($tokens[$i][0] == T_DNUMBER) {
                        $str = $tokens[$i][1];
                        $code .= "('_ALOM_optwister{$signflag}_g')('$str')";
                    } else {
                        $code .= $tokens[$i][1];
                    }
                } else if ($tokens[$i] == '"') {
                    $code .= $tokens[$i++];
                    for (; isset($tokens[$i]) && $tokens[$i] != '"'; ++$i) {
                        $code .= is_array($tokens[$i])
                            ? $tokens[$i][1]
                            : $tokens[$i];
                    }
                    $code .= $tokens[$i];
                } else if ($tokens[$i] == "`") {
                    $code .= $tokens[$i++];
                    for (; isset($tokens[$i]) && $tokens[$i] != "`"; ++$i) {
                        $code .= is_array($tokens[$i])
                            ? $tokens[$i][1]
                            : $tokens[$i];
                    }
                    $code .= $tokens[$i];
                } else {
                    $code .= $tokens[$i];
                }
            }
            return $code;
        }

        private static function optwister_obfs(
            $code,
            $signflag,
            $iv1,
            $iv2,
            $ivs,
            $pkyid,
            $token = NULL
        )
        {
            if ($token === NULL) {
                $token = token_get_all($code);
            }
            $i = 0;
            $code = self::optwister_stringify($token, $signflag, $i);
            $tokens = token_get_all($code);
            $pkyid = base64_encode($pkyid);
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (
                    is_array($tokens[$i]) &&
                    $tokens[$i][0] == T_CONSTANT_ENCAPSED_STRING
                ) {
                    $str = self::optwister_encapsed_string($tokens[$i][1]);
                    $code .=
                        "\AlomDecoder$signflag::optwister_decode('" .
                        base64_encode(
                            self::optwister_encode($str, $iv1, $iv2, $ivs)
                        ) .
                        "','$pkyid')";
                } else if (is_array($tokens[$i])) {
                    $code .= $tokens[$i][1];
                } else {
                    $code .= $tokens[$i];
                }
            }
            return $code;
        }

        public static function sug($code, $signflag)
        {
            $tokens = token_get_all($code);
            $code = "";
            $i = 0;
            $code .= $tokens[$i++][1];
            while (
                isset($tokens[$i]) &&
                ((is_array($tokens[$i]) &&
                        in_array($tokens[$i][0], [
                            T_WHITESPACE,
                            T_COMMENT,
                            T_DOC_COMMENT,
                        ])) ||
                    $tokens[$i] == ";")
            ) {
                $code .= is_array($tokens[$i])
                    ? $tokens[$i++][1]
                    : $tokens[$i++];
            }
            if (
                isset($tokens[$i]) &&
                is_array($tokens[$i]) &&
                $tokens[$i][0] == T_NAMESPACE
            ) {
                $code .= $tokens[$i++][1];
                while (
                    is_array($tokens[$i]) &&
                    in_array($tokens[$i][0], [
                        T_WHITESPACE,
                        T_STRING,
                        T_NS_SEPARATOR,
                    ])
                ) {
                    $code .= $tokens[$i++][1];
                }
                if ($tokens[$i] == "{") {
                    $code .= $tokens[$i++];
                    $code .=
                        "if(\$_ALOM_beforeeval){\$_ALOM_code='';unset(\$_ALOM_code,\$_ALOM_beforeeval);}else{file_put_contents(\$_ALOM_code,'');unlink(\$_ALOM_code);\$_ALOM_code='';unset(\$_ALOM_code,\$_ALOM_beforeeval);}";
                    for (; isset($tokens[$i]); ++$i) {
                        $code .= is_array($tokens[$i])
                            ? $tokens[$i][1]
                            : $tokens[$i];
                    }
                    return $code;
                } else {
                    $code .= $tokens[$i++];
                    while (
                        isset($tokens[$i]) &&
                        ((is_array($tokens[$i]) &&
                                in_array($tokens[$i][0], [
                                    T_WHITESPACE,
                                    T_COMMENT,
                                    T_DOC_COMMENT,
                                ])) ||
                            $tokens[$i] == ";")
                    ) {
                        $code .= is_array($tokens[$i])
                            ? $tokens[$i++][1]
                            : $tokens[$i++];
                    }
                }
            }
            while (
                isset($tokens[$i]) &&
                is_array($tokens[$i]) &&
                $tokens[$i][0] == T_NAMESPACE
            ) {
                $code .= $tokens[$i++][1];
                while (
                    is_array($tokens[$i]) &&
                    in_array($tokens[$i][0], [
                        T_WHITESPACE,
                        T_STRING,
                        T_NS_SEPARATOR,
                    ])
                ) {
                    $code .= $tokens[$i++][1];
                }
                $code .= $tokens[$i++];
                while (
                    isset($tokens[$i]) &&
                    ((is_array($tokens[$i]) &&
                            in_array($tokens[$i][0], [
                                T_WHITESPACE,
                                T_COMMENT,
                                T_DOC_COMMENT,
                            ])) ||
                        $tokens[$i] == ";")
                ) {
                    $code .= $tokens[$i++][1];
                }
            }
            $code .=
                "if(\$_ALOM_beforeeval){\$_ALOM_code='';unset(\$_ALOM_code,\$_ALOM_beforeeval);}else{file_put_contents(\$_ALOM_code,'');unlink(\$_ALOM_code);\$_ALOM_code='';unset(\$_ALOM_code,\$_ALOM_beforeeval);}";
            for (; isset($tokens[$i]); ++$i) {
                $code .= is_array($tokens[$i]) ? $tokens[$i][1] : $tokens[$i];
            }
            return $code;
        }

        private static function singlequote($string)
        {
            return str_replace(["\\", "'"], ["\\\\", "\\'"], $string);
        }

        private static function commentquote($string)
        {
            return str_replace(["\n", "*/"], [" *   ", "*//*"], $string);
        }

        private static function setikeys($code)
        {
            $tokens = token_get_all($code);
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i]) && $tokens[$i][0] == T_STRING) {
                    if (
                    in_array($tokens[$i][1], [
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
                    ])
                    ) {
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
                    } else if ($tokens[$i][1] == "ALOM_OBFUSCATED_TIME") {
                        $ikey = floor(self::$obfstime);
                        $code .= "($ikey)";
                    } else if ($tokens[$i][1] == "ALOM_OBFUSCATED_TIME_FLOAT") {
                        $ikey = self::$obfstime;
                        $code .= "($ikey)";
                    } else {
                        $code .= $tokens[$i][1];
                    }
                } else if (is_array($tokens[$i])) {
                    $code .= $tokens[$i][1];
                } else {
                    $code .= $tokens[$i];
                }
            }
            return $code;
        }

        public static function partition_encode($string, $key, $iv1, $iv2, $ivs)
        {
            $string = gzdeflate($string, 9);
            for ($i = 0; isset($string[$i]); ++$i) {
                $string[$i] = $key[$i & 0xf] ^ $string[$i];
            }
            $string = self::optwister_encode($string, $iv1, $iv2, $ivs);
            for ($i = 0; isset($string[$i]); ++$i) {
                $string[$i] = $key[$i & 0xf] ^ $string[$i];
            }
            return $string;
        }

        public static function nspartitioning(
            &$partition,
            $code,
            $optwister,
            $signflag,
            $iv1,
            $iv2,
            $ivs,
            $pkyid,
            $fast = FALSE,
            $ns = "",
            &$ua = [],
            $rnt = FALSE
        )
        {
            $tokens = token_get_all("<?" . "php $code");
            array_shift($tokens);
            $part = $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (
                    is_array($tokens[$i]) &&
                    in_array($tokens[$i][0], [T_CLASS, T_TRAIT, T_INTERFACE])
                ) {
                    $part .= $tokens[$i++][1];
                    while (
                        is_array($tokens[$i]) &&
                        in_array($tokens[$i][0], [
                            T_WHITESPACE,
                            T_STRING,
                            T_NS_SEPARATOR,
                            T_EXTENDS,
                            T_IMPLEMENTS,
                        ])
                    ) {
                        $part .= $tokens[$i++][1];
                    }
                    if ($tokens[$i] != "{") {
                        --$i;
                        continue;
                    }
                    $part .= $tokens[$i++];
                    for (; isset($tokens[$i]) && $tokens[$i] != "}"; ++$i) {
                        if (
                            is_array($tokens[$i]) &&
                            $tokens[$i][0] == T_FUNCTION
                        ) {
                            $part .= $tokens[$i++][1];
                            for (
                            ;
                                isset($tokens[$i]) && $tokens[$i] != "(";
                                ++$i
                            ) {
                                if (is_array($tokens[$i])) {
                                    $part .= $tokens[$i][1];
                                } else {
                                    $part .= $tokens[$i];
                                }
                            }
                            $part .= self::readl($tokens, "(", ")", $i);
                            ++$i;
                            for (
                            ;
                                isset($tokens[$i]) && $tokens[$i] != "{";
                                ++$i
                            ) {
                                if ($tokens[$i] == ";") {
                                    break;
                                } else if (is_array($tokens[$i])) {
                                    $part .= $tokens[$i][1];
                                } else {
                                    $part .= $tokens[$i];
                                }
                            }
                            if ($tokens[$i] == ";") {
                                $part .= $tokens[$i];
                                continue;
                            }
                            $rl = self::readl($tokens, "{", "}", $i);
                            $rl = self::nspartitioning(
                                $partition,
                                substr($rl, 1, -1),
                                $optwister,
                                $signflag,
                                $iv1,
                                $iv2,
                                $ivs,
                                $pkyid,
                                $fast,
                                $ns
                            );
                            $part .= "{" . $rl . "}";
                        } else if (is_array($tokens[$i])) {
                            $part .= $tokens[$i][1];
                        } else if ($tokens[$i] == "{") {
                            $part .= self::readl($tokens, "{", "}", $i);
                        } else {
                            $part .= $tokens[$i];
                        }
                    }
                    $part = $ns . $part . $tokens[$i];
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [
                            count($partition),
                            $key,
                            self::partition_encode(
                                $part,
                                $key,
                                $iv1,
                                $iv2,
                                $ivs
                            ),
                        ];
                    }
                    $code .=
                        "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $code .=
                        "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$signflag::partition_decode(\AlomDecoder$signflag::\$partition[" .
                        $partition[$part][0] .
                        "],'" .
                        base64_encode($partition[$part][1]) .
                        "','$pkyid'));";
                    $part = "";
                } else if ($tokens[$i][0] == T_FUNCTION) {
                    $part .= $tokens[$i++][1];
                    if (
                        is_array($tokens[$i]) &&
                        $tokens[$i][0] == T_WHITESPACE
                    ) {
                        $part .= $tokens[$i++][1];
                    }
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_STRING) {
                        $part .= $tokens[$i++][1];
                        if (
                            is_array($tokens[$i]) &&
                            $tokens[$i][0] == T_WHITESPACE
                        ) {
                            $part .= $tokens[$i++][1];
                        }
                        if ($tokens[$i] == "(") {
                            $part .= "(" . self::readpe($tokens, $i) . ")";
                            if (
                                is_array($tokens[++$i]) &&
                                $tokens[$i][0] == T_WHITESPACE
                            ) {
                                $part .= $tokens[$i++][1];
                            }
                            if ($tokens[$i] == "{") {
                                $rl = self::readl($tokens, "{", "}", $i);
                                $rl = self::nspartitioning(
                                    $partition,
                                    substr($rl, 1, -1),
                                    $optwister,
                                    $signflag,
                                    $iv1,
                                    $iv2,
                                    $ivs,
                                    $pkyid,
                                    $fast,
                                    $ns
                                );
                                $part = $ns . $part . "{" . $rl . "}";
                                if (!isset($partition[$part])) {
                                    $key = random_bytes(16);
                                    $partition[$part] = [
                                        count($partition),
                                        $key,
                                        self::partition_encode(
                                            $part,
                                            $key,
                                            $iv1,
                                            $iv2,
                                            $ivs
                                        ),
                                    ];
                                }
                                $code .=
                                    "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                                $code .=
                                    "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$signflag::partition_decode(\AlomDecoder$signflag::\$partition[" .
                                    $partition[$part][0] .
                                    "],'" .
                                    base64_encode($partition[$part][1]) .
                                    "','$pkyid'));";
                                $part = "";
                            } else {
                                --$i;
                            }
                        } else {
                            --$i;
                        }
                    } else {
                        if (is_array($tokens[$i]) && $tokens[$i][0] == T_USE) {
                            $part .= $tokens[$i++][1];
                            if (
                                is_array($tokens[$i]) &&
                                $tokens[$i][0] == T_WHITESPACE
                            ) {
                                $part .= $tokens[$i++][1];
                            }
                        }
                        if ($tokens[$i] == "(") {
                            $part .= "(" . self::readpe($tokens, $i) . ")";
                        } else {
                            --$i;
                        }
                    }
                } else if (
                    $tokens[$i][0] == T_FN ||
                    $tokens[$i][0] == T_DECLARE
                ) {
                    $part .= $tokens[$i++][1];
                    if (
                        is_array($tokens[$i]) &&
                        $tokens[$i][0] == T_WHITESPACE
                    ) {
                        $part .= $tokens[$i++][1];
                    }
                    if ($tokens[$i] == "(") {
                        $part .= "(" . self::readpe($tokens, $i) . ")";
                    } else {
                        --$i;
                    }
                } else if (
                in_array($tokens[$i][0], [T_STATIC, T_ECHO, T_GLOBAL])
                ) {
                    $part .= $tokens[$i++][1];
                    if (
                        is_array($tokens[$i]) &&
                        $tokens[$i][0] == T_WHITESPACE
                    ) {
                        $part .= $tokens[$i++][1];
                    }
                    $part .= self::readpe($tokens, $i, TRUE);
                } else if ($tokens[$i][0] == T_RETURN) {
                    $part .= $tokens[$i++][1];
                    $part .= self::readpe($tokens, $i, TRUE);
                    if ($tokens[$i + 1] == ";") {
                        $part .= $tokens[$i++ + 1];
                    }
                    $ua[] = count($partition);
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [
                            count($partition),
                            $key,
                            self::partition_encode(
                                $part,
                                $key,
                                $iv1,
                                $iv2,
                                $ivs
                            ),
                        ];
                    }
                    $code .=
                        "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $code .=
                        "\$_ALOM_return=true;return \$_ALOM_result=eval(\AlomDecoder$signflag::partition_decode(\AlomDecoder$signflag::\$partition[" .
                        $partition[$part][0] .
                        "],'" .
                        base64_encode($partition[$part][1]) .
                        "','$pkyid'));";
                    $part = "";
                } else if ($tokens[$i][0] == T_CONTINUE) {
                    ++$i;
                    $pe = max(1, (int)self::readpe($tokens, $i, TRUE));
                    if ($tokens[$i + 1] == ";") {
                        ++$i;
                    }
                    $part .= "\$_ALOM_continue=$pe;";
                    $ua[] = count($partition);
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [
                            count($partition),
                            $key,
                            self::partition_encode(
                                $part,
                                $key,
                                $iv1,
                                $iv2,
                                $ivs
                            ),
                        ];
                    }
                    $code .=
                        "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $code .=
                        "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$signflag::partition_decode(\AlomDecoder$signflag::\$partition[" .
                        $partition[$part][0] .
                        "],'" .
                        base64_encode($partition[$part][1]) .
                        "','$pkyid'));";
                    $part = "";
                } else if ($tokens[$i][0] == T_BREAK) {
                    ++$i;
                    $pe = max(1, (int)self::readpe($tokens, $i, TRUE));
                    if ($tokens[$i + 1] == ";") {
                        ++$i;
                    }
                    $part .= "\$_ALOM_break=$pe;";
                    $ua[] = count($partition);
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [
                            count($partition),
                            $key,
                            self::partition_encode(
                                $part,
                                $key,
                                $iv1,
                                $iv2,
                                $ivs
                            ),
                        ];
                    }
                    $code .=
                        "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $code .=
                        "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$signflag::partition_decode(\AlomDecoder$signflag::\$partition[" .
                        $partition[$part][0] .
                        "],'" .
                        base64_encode($partition[$part][1]) .
                        "','$pkyid'));";
                    $part = "";
                } else if ($tokens[$i][0] == T_NAMESPACE) {
                    $code .= $tokens[$i++][1];
                    while (
                        is_array($tokens[$i]) &&
                        in_array($tokens[$i][0], [
                            T_WHITESPACE,
                            T_STRING,
                            T_NS_SEPARATOR,
                        ])
                    ) {
                        $code .= $tokens[$i++][1];
                    }
                    if ($tokens[$i] != "{") {
                        --$i;
                        continue;
                    }
                    $rl = self::readl($tokens, "{", "}", $i);
                    $rl = self::nspartitioning(
                        $partition,
                        substr($rl, 1, -1),
                        $optwister,
                        $signflag,
                        $iv1,
                        $iv2,
                        $ivs,
                        $pkyid,
                        $fast,
                        $ns,
                        $ua
                    );
                    $part .= "{" . $rl . "}";
                } else if ($tokens[$i] == ";") {
                    $part = $ns . $part . ";";
                    $ua[] = count($partition);
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [
                            count($partition),
                            $key,
                            self::partition_encode(
                                $part,
                                $key,
                                $iv1,
                                $iv2,
                                $ivs
                            ),
                        ];
                    }
                    $code .=
                        "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $code .=
                        "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$signflag::partition_decode(\AlomDecoder$signflag::\$partition[" .
                        $partition[$part][0] .
                        "],'" .
                        base64_encode($partition[$part][1]) .
                        "','$pkyid'));";
                    $part = "";
                } else if ($tokens[$i] == ",") {
                    $part = $ns . "return $part;";
                    $ua[] = count($partition);
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [
                            count($partition),
                            $key,
                            self::partition_encode(
                                $part,
                                $key,
                                $iv1,
                                $iv2,
                                $ivs
                            ),
                        ];
                    }
                    $code .=
                        "eval(\AlomDecoder$signflag::partition_decode(\AlomDecoder$signflag::\$partition[" .
                        $partition[$part][0] .
                        "],'" .
                        base64_encode($partition[$part][1]) .
                        "','$pkyid')),";
                    $part = "";
                } else if (
                    is_array($tokens[$i]) &&
                    in_array($tokens[$i][0], [
                        T_ISSET,
                        T_UNSET,
                        T_EMPTY,
                        T_ARRAY,
                        T_LIST,
                    ])
                ) {
                    $part .= $tokens[$i++][1];
                    if (
                        is_array($tokens[$i]) &&
                        $tokens[$i][0] == T_WHITESPACE
                    ) {
                        $part .= $tokens[$i++][1];
                    }
                    if ($tokens[$i] == "(") {
                        $rl = self::readl($tokens, "(", ")", $i);
                        $part .= $rl;
                    } else {
                        --$i;
                    }
                } else if (
                    is_array($tokens[$i]) &&
                    in_array($tokens[$i][0], [
                        T_WHILE,
                        T_FOR,
                        T_IF,
                        T_ELSEIF,
                        T_ELSE,
                        T_FOREACH,
                        T_DECLARE,
                    ])
                ) {
                    $code .=
                        'if(!isset($_ALOM_continue))$_ALOM_continue=0;if(!isset($_ALOM_break))$_ALOM_break=0;';
                    for (; isset($tokens[$i]); ++$i) {
                        if (
                            is_array($tokens[$i]) &&
                            in_array($tokens[$i][0], [
                                T_WHILE,
                                T_FOR,
                                T_FOREACH,
                                T_DECLARE,
                            ])
                        ) {
                            $lf = $tokens[$i][0] == T_FOR;
                            $part .= $tokens[$i++][1];
                            if (
                                is_array($tokens[$i]) &&
                                $tokens[$i][0] == T_WHITESPACE
                            ) {
                                $part .= $tokens[$i++][1];
                            }
                            if ($tokens[$i] == "(") {
                                $rl = self::readl($tokens, "(", ")", $i);
                                ++$i;
                                if ($fast || $lf) {
                                    $part .= $rl;
                                } else {
                                    $rl = self::nspartitioning(
                                        $partition,
                                        substr($rl, 1, -1),
                                        $optwister,
                                        $signflag,
                                        $iv1,
                                        $iv2,
                                        $ivs,
                                        $pkyid,
                                        $fast,
                                        $ns,
                                        $ua,
                                        TRUE
                                    );
                                    $part .= "(" . $rl . ")";
                                }
                                if (
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_WHITESPACE
                                ) {
                                    $part .= $tokens[$i++][1];
                                }
                                if ($tokens[$i] == "{") {
                                    $rl = self::readl($tokens, "{", "}", $i);
                                    ++$i;
                                    $rl = self::nspartitioning(
                                        $partition,
                                        substr($rl, 1, -1),
                                        $optwister,
                                        $signflag,
                                        $iv1,
                                        $iv2,
                                        $ivs,
                                        $pkyid,
                                        $fast,
                                        $ns,
                                        $ua
                                    );
                                    $part .=
                                        "{" .
                                        $rl .
                                        'if($_ALOM_continue>0){--$_ALOM_continue;if($_ALOM_continue>0)break;}if($_ALOM_break>0){--$_ALOM_break;break;}}';
                                    $ua[] = count($partition);
                                    if (!isset($partition[$part])) {
                                        $key = random_bytes(16);
                                        $partition[$part] = [
                                            count($partition),
                                            $key,
                                            self::partition_encode(
                                                $part,
                                                $key,
                                                $iv1,
                                                $iv2,
                                                $ivs
                                            ),
                                        ];
                                    }
                                    $code .=
                                        "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                                    $code .=
                                        "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$signflag::partition_decode(\AlomDecoder$signflag::\$partition[" .
                                        $partition[$part][0] .
                                        "],'" .
                                        base64_encode($partition[$part][1]) .
                                        "','$pkyid'));";
                                    $part = "";
                                    break;
                                }
                                $rs = self::reads($tokens, $i);
                                if (isset($tokens[$i]) && $tokens[$i] == ";") {
                                    $rs .= $tokens[$i++];
                                }
                                $rs = self::nspartitioning(
                                    $partition,
                                    $rs,
                                    $optwister,
                                    $signflag,
                                    $iv1,
                                    $iv2,
                                    $ivs,
                                    $pkyid,
                                    $fast,
                                    $ns,
                                    $ua
                                );
                                $part .=
                                    "{" .
                                    $rs .
                                    'if($_ALOM_continue>0){--$_ALOM_continue;if($_ALOM_continue>0)break;}if($_ALOM_break>0){--$_ALOM_break;break;}}';
                                $ua[] = count($partition);
                                if (!isset($partition[$part])) {
                                    $key = random_bytes(16);
                                    $partition[$part] = [
                                        count($partition),
                                        $key,
                                        self::partition_encode(
                                            $part,
                                            $key,
                                            $iv1,
                                            $iv2,
                                            $ivs
                                        ),
                                    ];
                                }
                                $code .=
                                    "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                                $code .=
                                    "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$signflag::partition_decode(\AlomDecoder$signflag::\$partition[" .
                                    $partition[$part][0] .
                                    "],'" .
                                    base64_encode($partition[$part][1]) .
                                    "','$pkyid'));";
                                $part = "";
                                break;
                            }
                            --$i;
                        } else if (
                            is_array($tokens[$i]) &&
                            $tokens[$i][0] == T_IF
                        ) {
                            while (TRUE) {
                                $part .= $tokens[$i++][1];
                                if (
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_WHITESPACE
                                ) {
                                    $part .= $tokens[$i++][1];
                                }
                                if ($tokens[$i] == "(") {
                                    $rl = self::readl($tokens, "(", ")", $i);
                                    ++$i;
                                    if ($fast) {
                                        $part .= $rl;
                                    } else {
                                        $rl = self::nspartitioning(
                                            $partition,
                                            substr($rl, 1, -1),
                                            $optwister,
                                            $signflag,
                                            $iv1,
                                            $iv2,
                                            $ivs,
                                            $pkyid,
                                            $fast,
                                            $ns,
                                            $ua,
                                            TRUE
                                        );
                                        $part .= "(" . $rl . ")";
                                    }
                                }
                                if (
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_WHITESPACE
                                ) {
                                    $part .= $tokens[$i++][1];
                                }
                                if ($tokens[$i] == "{") {
                                    $rl = self::readl($tokens, "{", "}", $i);
                                    ++$i;
                                    $rl = self::nspartitioning(
                                        $partition,
                                        substr($rl, 1, -1),
                                        $optwister,
                                        $signflag,
                                        $iv1,
                                        $iv2,
                                        $ivs,
                                        $pkyid,
                                        $fast,
                                        $ns,
                                        $ua
                                    );
                                    $part .= "{" . $rl . "}";
                                } else {
                                    $rs = self::reads($tokens, $i);
                                    if (
                                        isset($tokens[$i]) &&
                                        $tokens[$i] == ";"
                                    ) {
                                        $rs .= $tokens[$i++];
                                    }
                                    $rs = self::nspartitioning(
                                        $partition,
                                        $rs,
                                        $optwister,
                                        $signflag,
                                        $iv1,
                                        $iv2,
                                        $ivs,
                                        $pkyid,
                                        $fast,
                                        $ns,
                                        $ua
                                    );
                                    $part .= "{" . $rs . "}";
                                }
                                if (
                                    isset($tokens[$i]) &&
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_WHITESPACE
                                ) {
                                    $part .= $tokens[$i++][1];
                                }
                                if (!isset($tokens[$i])) {
                                    break;
                                }
                                if (
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_ELSEIF
                                ) {
                                    continue;
                                } else if (
                                    is_array($tokens[$i]) &&
                                    $tokens[$i][0] == T_ELSE
                                ) {
                                    $part .= $tokens[$i++][1];
                                    if (
                                        is_array($tokens[$i]) &&
                                        $tokens[$i][0] == T_WHITESPACE
                                    ) {
                                        $part .= $tokens[$i++][1];
                                    }
                                    if ($tokens[$i] == "{") {
                                        $rl = self::readl(
                                            $tokens,
                                            "{",
                                            "}",
                                            $i
                                        );
                                        ++$i;
                                        $rl = self::nspartitioning(
                                            $partition,
                                            substr($rl, 1, -1),
                                            $optwister,
                                            $signflag,
                                            $iv1,
                                            $iv2,
                                            $ivs,
                                            $pkyid,
                                            $fast,
                                            $ns,
                                            $ua
                                        );
                                        $part .= "{" . $rl . "}";
                                    } else {
                                        $rs = self::reads($tokens, $i);
                                        if (
                                            isset($tokens[$i]) &&
                                            $tokens[$i] == ";"
                                        ) {
                                            $rs .= $tokens[$i++];
                                        }
                                        $rs = self::nspartitioning(
                                            $partition,
                                            $rs,
                                            $optwister,
                                            $signflag,
                                            $iv1,
                                            $iv2,
                                            $ivs,
                                            $pkyid,
                                            $fast,
                                            $ns,
                                            $ua
                                        );
                                        $part .= "{" . $rs . "}";
                                    }
                                    break;
                                } else {
                                    break;
                                }
                            }
                            break;
                        }
                    }
                    if (isset($tokens[$i]) && $tokens[$i] == ";") {
                        $part .= $tokens[$i++];
                    }
                    --$i;
                    $ua[] = count($partition);
                    if (!isset($partition[$part])) {
                        $key = random_bytes(16);
                        $partition[$part] = [
                            count($partition),
                            $key,
                            self::partition_encode(
                                $part,
                                $key,
                                $iv1,
                                $iv2,
                                $ivs
                            ),
                        ];
                    }
                    $code .=
                        "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $code .=
                        "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$signflag::partition_decode(\AlomDecoder$signflag::\$partition[" .
                        $partition[$part][0] .
                        "],'" .
                        base64_encode($partition[$part][1]) .
                        "','$pkyid'));";
                    $part = "";
                } else if (
                    is_array($tokens[$i]) &&
                    $tokens[$i][0] == T_OBJECT_OPERATOR
                ) {
                    $part .= $tokens[$i++][1];
                    if (
                        is_array($tokens[$i]) &&
                        $tokens[$i][0] == T_WHITESPACE
                    ) {
                        $part .= $tokens[$i++][1];
                    }
                    if ($tokens[$i] == "{") {
                        $rl = self::readl($tokens, "{", "}", $i);
                        if ($fast) {
                            $part .= $rl;
                        } else {
                            $rl = self::nspartitioning(
                                $partition,
                                substr($rl, 1, -1),
                                $optwister,
                                $signflag,
                                $iv1,
                                $iv2,
                                $ivs,
                                $pkyid,
                                $fast,
                                $ns,
                                $ua
                            );
                            $part .= "{" . $rl . "}";
                        }
                    } else {
                        --$i;
                    }
                } else if ($tokens[$i] == '$') {
                    $part .= $tokens[$i++];
                    if (
                        is_array($tokens[$i]) &&
                        $tokens[$i][0] == T_WHITESPACE
                    ) {
                        $part .= $tokens[$i++][1];
                    }
                    if ($tokens[$i] == "{") {
                        $rl = self::readl($tokens, "{", "}", $i);
                        if ($fast) {
                            $part .= $rl;
                        } else {
                            $rl = self::nspartitioning(
                                $partition,
                                substr($rl, 1, -1),
                                $optwister,
                                $signflag,
                                $iv1,
                                $iv2,
                                $ivs,
                                $pkyid,
                                $fast,
                                $ns,
                                $ua
                            );
                            $part .= "{" . $rl . "}";
                        }
                    } else {
                        --$i;
                    }
                } else if ($tokens[$i] == "{") {
                    $rl = self::readl($tokens, "{", "}", $i);
                    $rl = self::nspartitioning(
                        $partition,
                        substr($rl, 1, -1),
                        $optwister,
                        $signflag,
                        $iv1,
                        $iv2,
                        $ivs,
                        $pkyid,
                        $fast,
                        $ns,
                        $ua
                    );
                    $part .= "{" . $rl . "}";
                } else if ($tokens[$i] == "(") {
                    $rl = self::readl($tokens, "(", ")", $i);
                    if ($fast) {
                        $part .= $rl;
                    } else {
                        $rl = self::nspartitioning(
                            $partition,
                            substr($rl, 1, -1),
                            $optwister,
                            $signflag,
                            $iv1,
                            $iv2,
                            $ivs,
                            $pkyid,
                            $fast,
                            $ns,
                            $ua
                        );
                        $part .= "(" . $rl . ")";
                    }
                } else if (is_array($tokens[$i])) {
                    $part .= $tokens[$i][1];
                } else {
                    $part .= $tokens[$i];
                }
            }
            if (trim($part) !== "") {
                $part = $ns . "return $part;";
                $ua[] = count($partition);
                if (!isset($partition[$part])) {
                    $key = random_bytes(16);
                    $partition[$part] = [
                        count($partition),
                        $key,
                        self::partition_encode($part, $key, $iv1, $iv2, $ivs),
                    ];
                }
                $code .=
                    "eval(\AlomDecoder$signflag::partition_decode(\AlomDecoder$signflag::\$partition[" .
                    $partition[$part][0] .
                    "],'" .
                    base64_encode($partition[$part][1]) .
                    "','$pkyid'))";
                $part = "";
                return $code;
            } else {
                $code = $ns . $code;
                $ua[] = count($partition);
                if (!isset($partition[$code])) {
                    $key = random_bytes(16);
                    $partition[$code] = [
                        count($partition),
                        $key,
                        self::partition_encode($code, $key, $iv1, $iv2, $ivs),
                    ];
                }
                $code =
                    "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;" .
                    "\$_ALOM_result=eval(\AlomDecoder$signflag::partition_decode(\AlomDecoder$signflag::\$partition[" .
                    $partition[$code][0] .
                    "],'" .
                    base64_encode($partition[$code][1]) .
                    "','$pkyid'));if(isset(\$_ALOM_return))return \$_ALOM_result;";
            }
            return $code;
        }

        public static function partitioning(
            &$ua,
            &$partition,
            $code,
            $optwister,
            $signflag,
            $iv1,
            $iv2,
            $ivs,
            $pkyid,
            $fast = FALSE
        )
        {
            $tokens = token_get_all("<?" . "php $code");
            array_shift($tokens);
            $pkyid = base64_encode($pkyid);
            $code = $ns = "";
            $i = 0;
            while (
                isset($tokens[$i]) &&
                ((is_array($tokens[$i]) &&
                        in_array($tokens[$i][0], [
                            T_WHITESPACE,
                            T_COMMENT,
                            T_DOC_COMMENT,
                        ])) ||
                    $tokens[$i] == ";")
            ) {
                $code .= is_array($tokens[$i])
                    ? $tokens[$i++][1]
                    : $tokens[$i++];
            }
            if (
                isset($tokens[$i]) &&
                is_array($tokens[$i]) &&
                $tokens[$i][0] == T_NAMESPACE
            ) {
                $ns .= $tokens[$i++][1];
                while (
                    is_array($tokens[$i]) &&
                    in_array($tokens[$i][0], [
                        T_WHITESPACE,
                        T_STRING,
                        T_NS_SEPARATOR,
                    ])
                ) {
                    $ns .= $tokens[$i++][1];
                }
                if ($tokens[$i] == "{") {
                    $block = substr(self::readl($tokens, "{", "}", $i), 1, -1);
                    ++$i;
                    while (
                        isset($tokens[$i]) &&
                        ((is_array($tokens[$i]) &&
                                in_array($tokens[$i][0], [
                                    T_WHITESPACE,
                                    T_COMMENT,
                                    T_DOC_COMMENT,
                                ])) ||
                            $tokens[$i] == ";")
                    ) {
                        $ns .= is_array($tokens[$i])
                            ? $tokens[$i++][1]
                            : $tokens[$i++];
                    }
                    $block = self::nspartitioning(
                        $partition,
                        $block,
                        $optwister,
                        $signflag,
                        $iv1,
                        $iv2,
                        $ivs,
                        $pkyid,
                        $fast,
                        $ns
                    );
                    $code .= $block;
                    $ns = "";
                    while (
                        isset($tokens[$i]) &&
                        is_array($tokens[$i]) &&
                        $tokens[$i][0] == T_NAMESPACE
                    ) {
                        $ns .= $tokens[$i++][1];
                        while (isset($tokens[$i]) && $tokens[$i] != "{") {
                            $ns .= is_array($tokens[$i])
                                ? $tokens[$i++][1]
                                : $tokens[$i++];
                        }
                        $block = substr(
                            self::readl($tokens, "{", "}", $i),
                            1,
                            -1
                        );
                        ++$i;
                        while (
                            isset($tokens[$i]) &&
                            ((is_array($tokens[$i]) &&
                                    in_array($tokens[$i][0], [
                                        T_WHITESPACE,
                                        T_COMMENT,
                                        T_DOC_COMMENT,
                                    ])) ||
                                $tokens[$i] == ";")
                        ) {
                            $ns .= is_array($tokens[$i])
                                ? $tokens[$i++][1]
                                : $tokens[$i++];
                        }
                        $block = self::nspartitioning(
                            $partition,
                            $block,
                            $optwister,
                            $signflag,
                            $iv1,
                            $iv2,
                            $ivs,
                            $pkyid,
                            $fast,
                            $ns,
                            $ua
                        );
                        $code .= $block;
                        $ns = "";
                    }
                } else {
                    $ns .= $tokens[$i++];
                    while (
                        isset($tokens[$i]) &&
                        ((is_array($tokens[$i]) &&
                                in_array($tokens[$i][0], [
                                    T_WHITESPACE,
                                    T_COMMENT,
                                    T_DOC_COMMENT,
                                ])) ||
                            $tokens[$i] == ";")
                    ) {
                        $ns .= is_array($tokens[$i])
                            ? $tokens[$i++][1]
                            : $tokens[$i++];
                    }
                    while (
                        isset($tokens[$i]) &&
                        is_array($tokens[$i]) &&
                        $tokens[$i][0] == T_NAMESPACE
                    ) {
                        $ns .= $tokens[$i++][1];
                        while (
                            is_array($tokens[$i]) &&
                            in_array($tokens[$i][0], [
                                T_WHITESPACE,
                                T_STRING,
                                T_NS_SEPARATOR,
                            ])
                        ) {
                            $ns .= is_array($tokens[$i])
                                ? $tokens[$i++][1]
                                : $tokens[$i++];
                        }
                        $ns .= $tokens[$i++];
                        while (
                            isset($tokens[$i]) &&
                            ((is_array($tokens[$i]) &&
                                    in_array($tokens[$i][0], [
                                        T_WHITESPACE,
                                        T_COMMENT,
                                        T_DOC_COMMENT,
                                    ])) ||
                                $tokens[$i] == ";")
                        ) {
                            $ns .= is_array($tokens[$i])
                                ? $tokens[$i++][1]
                                : $tokens[$i++];
                        }
                    }
                    $block = "";
                    for (; isset($tokens[$i]); ++$i) {
                        $block .= is_array($tokens[$i])
                            ? $tokens[$i][1]
                            : $tokens[$i];
                    }
                    $block = self::nspartitioning(
                        $partition,
                        $block,
                        $optwister,
                        $signflag,
                        $iv1,
                        $iv2,
                        $ivs,
                        $pkyid,
                        $fast,
                        $ns,
                        $ua
                    );
                    $code .= $block;
                }
            } else {
                $block = "";
                for (; isset($tokens[$i]); ++$i) {
                    $block .= is_array($tokens[$i])
                        ? $tokens[$i][1]
                        : $tokens[$i];
                }
                $block = self::nspartitioning(
                    $partition,
                    $block,
                    $optwister,
                    $signflag,
                    $iv1,
                    $iv2,
                    $ivs,
                    $pkyid,
                    $fast,
                    $ns,
                    $ua
                );
                $code .= $block;
            }
            $nspartition = $partition;
            $partition = [];
            foreach ($nspartition as $part) {
                $partition[$part[0]] = $part[2];
            }
            return $code;
        }

        public static function getcallable($callable)
        {
            if (is_string($callable)) {
                $callable = strtolower($callable);
                if (in_array($callable, ["print", "echo"])) {
                    return "";
                }
                if (in_array($callable, ["exit", "die"])) {
                    return $callable . ";";
                }
            }
            if (is_object($callable) || is_numeric($callable)) {
                $reflection = new ReflectionFunction($callable);
            } else if (is_string($callable)) {
                $callable = explode("::", $callable, 2);
                if (!isset($callable[1])) {
                    $reflection = new ReflectionFunction($callable[0]);
                } else {
                    $reflection = new ReflectionMethod(
                        $callable[0],
                        $callable[1]
                    );
                }
            } else if (is_array($callable)) {
                if (!isset($callable[0])) {
                    return "";
                }
                if (!isset($callable[1])) {
                    $reflection = new ReflectionFunction($callable[0]);
                } else {
                    $reflection = new ReflectionMethod(
                        $callable[0],
                        $callable[1]
                    );
                }
            } else {
                return "";
            }
            $filename = $reflection->getFileName();
            if (!$filename) {
                return $callable . "();";
            }
            $start = $reflection->getStartLine() - 1;
            $end = $reflection->getEndLine();
            $source = file($filename);
            $source = array_slice($source, $start, $end - $start);
            $source = implode("", $source);
            $name = strtolower($reflection->getName());
            $tokens = token_get_all("<" . "?php $source");
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (
                    is_array($tokens[$i]) &&
                    ($tokens[$i][0] == T_FN || $tokens[$i][0] == T_FUNCTION)
                ) {
                    if (
                        is_array($tokens[++$i]) &&
                        $tokens[$i][0] == T_WHITESPACE
                    ) {
                        ++$i;
                    }
                    if ($name != "{closure}") {
                        if (
                            !is_array($tokens[$i]) ||
                            $tokens[$i][0] != T_STRING ||
                            strtolower($tokens[$i][1]) != $name
                        ) {
                            --$i;
                            continue;
                        }
                        if (
                            is_array($tokens[++$i]) &&
                            $tokens[$i][0] == T_WHITESPACE
                        ) {
                            ++$i;
                        }
                    }
                    if ($tokens[$i] != "(") {
                        --$i;
                        continue;
                    }
                    self::readl($tokens, "(", ")", $i);
                    if (
                        is_array($tokens[++$i]) &&
                        $tokens[$i][0] == T_WHITESPACE
                    ) {
                        ++$i;
                    }
                    if (is_array($tokens[$i]) && $tokens[$i][0] == T_USE) {
                        if (
                            is_array($tokens[++$i]) &&
                            $tokens[$i][0] == T_WHITESPACE
                        ) {
                            ++$i;
                        }
                        if ($tokens[$i] != "(") {
                            --$i;
                            continue;
                        }
                        self::readl($tokens, "(", ")", $i);
                        if (
                            is_array($tokens[++$i]) &&
                            $tokens[$i][0] == T_WHITESPACE
                        ) {
                            ++$i;
                        }
                    }
                    if ($tokens[$i] == ":") {
                        if (
                            is_array($tokens[++$i]) &&
                            $tokens[$i][0] == T_WHITESPACE
                        ) {
                            ++$i;
                        }
                        while (
                            is_array($tokens[$i]) &&
                            ($tokens[$i][0] == T_STRING ||
                                $tokens[$i][0] == T_NS_SEPARATOR ||
                                $tokens[$i][0] == T_WHITESPACE)
                        ) {
                            ++$i;
                        }
                    }
                    if (is_array($tokens[$i])) {
                        if ($tokens[$i][0] != T_DOUBLE_ARROW) {
                            --$i;
                            continue;
                        }
                        if (
                            is_array($tokens[++$i]) &&
                            $tokens[$i][0] == T_WHITESPACE
                        ) {
                            ++$i;
                        }
                        $str = "return ";
                        for (; isset($tokens[$i]); ++$i) {
                            if (
                            in_array($tokens[$i], [")", "]", "}", ",", ";"])
                            ) {
                                break;
                            } else if (
                                is_array($tokens[$i]) &&
                                $tokens[$i][0] == T_CLOSE_TAG
                            ) {
                                break;
                            } else if (is_array($tokens[$i])) {
                                $str .= $tokens[$i][1];
                            } else {
                                $str .= $tokens[$i];
                            }
                        }
                        $str .= ";";
                        return $str;
                    } else {
                        if ($tokens[$i] != "{") {
                            --$i;
                            continue;
                        }
                        $str = self::readl($tokens, "{", "}", $i);
                        $str = trim(substr($str, 1, -1));
                        return $str;
                    }
                }
            }
            return "";
        }

        public static function sizeformat($size)
        {
            if ($size >= 1024 * 1024 * 1024 * 1024 * 1024 * 1024) {
                return round(
                        $size / 1024 / 1024 / 1024 / 1024 / 1024 / 1024,
                        1
                    ) . "zb";
            }
            if ($size >= 1024 * 1024 * 1024 * 1024 * 1024) {
                return round($size / 1024 / 1024 / 1024 / 1024 / 1024, 1) .
                    "eb";
            }
            if ($size >= 1024 * 1024 * 1024 * 1024) {
                return round($size / 1024 / 1024 / 1024 / 1024, 1) . "tb";
            }
            if ($size >= 1024 * 1024 * 1024) {
                return round($size / 1024 / 1024 / 1024, 1) . "gb";
            }
            if ($size >= 1024 * 1024) {
                return round($size / 1024 / 1024, 1) . "mb";
            }
            if ($size >= 1024) {
                return round($size / 1024, 1) . "kb";
            }
            return round($size) . "b";
        }

        public static function license_key_generate($init = NULL)
        {
            if ($init === NULL) {
                $key = random_bytes(32);
            } else {
                $key = hash(
                    "sha256",
                    "Alom License N&.~>.ZYv;V5lN0h " . (string)$init . "%"
                );
            }
            return bin2hex($key);
        }

        public static function license_find_code($license)
        {
            if (
            !preg_match(
                "/license code: (\[[0-9a-fA-F*-]+])/i",
                $license,
                $match
            )
            ) {
                return FALSE;
            }
            return $match[1];
        }

        public static function license_insert_code(
            $license,
            $code = "[************************************************-********************************-****************]"
        )
        {
            return preg_replace(
                "/license code: (\[[0-9a-fA-F*-]+])/i",
                "license code: " . $code,
                $license
            );
        }

        public static function license_null_systemhash_generate()
        {
            return "NULL SYSTEMHASH X</k/LMI3M7Et@\*\*";
        }

        public static function license_systemhash_generate(
            $uname,
            $username,
            $ipaddr,
            $hostname
        )
        {
            $id = "SYSTEMHASH Xcpv{E^Bk9eq\*VIm";
            $id .= "un:$uname\n";
            $id .= "us:$username\n";
            $id .= "ip:$ipaddr\n";
            $id .= "hn:$hostname\n";
            return md5($id, TRUE);
        }

        public static function license_code_encrypt(
            $ready,
            $expiration,
            $systemhash,
            $license_key
        )
        {
            $sbox = self::$license_code_sbox;
            $ubox = self::$license_code_ubox;
            if (strlen($license_key) == 64) {
                $license_key = hex2bin($license_key);
            } else if (strlen($license_key) != 32) {
                $license_key = hash("sha256", $license_key, TRUE);
            }
            if (strlen($systemhash) != 16) {
                $systemhash = md5($systemhash, TRUE);
            }
            $ready = (int)$ready;
            $expiration = (int)$expiration;
            $limiter = "%zqYJ3}rX\xfeZ2hA.]Ss0(Xv1z";
            $string =
                $limiter .
                $systemhash .
                pack("N2", $ready ^ 0xf9a02eec, $expiration ^ 0x2904a19b);
            $string = array_values(unpack("C*", $string));
            $license_key = array_values(unpack("C*", $license_key));
            for ($j = 0; $j < 52; ++$j) {
                for ($i = 48 - 1; $i >= 0; --$i) {
                    $a = (7 * $i + 1) % 48;
                    $b = (3 * $i + $a + 7) % 48;
                    $c = (11 * $i + $b + 5) % 48;
                    if ($a == $i) {
                        $a = (3 * $a + 5) % 48;
                    }
                    if ($b == $i) {
                        $b = (7 * $b + 13) % 48;
                    }
                    if ($c == $i) {
                        $c = (11 * $c + 3) % 48;
                    }
                    $x = $license_key[(3 * $c + 5 * $i + 7) % 32];
                    $y = $license_key[(5 * $a + 7 * $i + 11) % 32];
                    $z = $license_key[(7 * $b + 11 * $i + 3) % 32];
                    for ($k = 0; $k < 2; ++$k) {
                        $x = $license_key[(3 * $c + 5 * $z + 7 * $i + 11) % 32];
                        $y = $license_key[(5 * $a + 7 * $x + 11 * $i + 3) % 32];
                        $z = $license_key[(7 * $b + 11 * $y + 3 * $i + 5) % 32];
                    }
                    $x = (3 * $c + 5 * $z + 7 * $i + 11) % 32;
                    $y = (5 * $a + 7 * $x + 11 * $i + 3) % 32;
                    $z = (7 * $b + 11 * $y + 3 * $i + 5) % 32;
                    $string[$i] =
                        $ubox[$string[$i] ^ $a] ^
                        $license_key[$z] ^
                        $sbox[$string[$b] ^ $string[$c]];
                    $string[$i] =
                        $ubox[$string[$i] ^ $c] ^
                        $license_key[$z] ^
                        $sbox[$string[$a] & $string[$b]];
                    $string[$i] =
                        $ubox[$string[$i] ^ $z] ^
                        $license_key[$y] ^
                        $sbox[$string[$a] | $string[$c]];
                    $string[$i] =
                        $ubox[$string[$i] ^ $y] ^
                        $license_key[$x] ^
                        $sbox[$string[$b] & $string[$c]];
                    $string[$i] =
                        $ubox[$string[$i] ^ $x] ^
                        $license_key[$x] ^
                        $sbox[$string[$a] ^ $string[$b]];
                }
            }
            array_unshift($string, "C*");
            $string = bin2hex(call_user_func_array("pack", $string));
            return "[" .
                substr($string, 0, 48) .
                "-" .
                substr($string, 48, 32) .
                "-" .
                substr($string, 80, 16) .
                "]";
        }

        public static function license_code_decrypt($string, $license_key)
        {
            $sbox = self::$license_code_sbox;
            if (strlen($license_key) == 64) {
                $license_key = hex2bin($license_key);
            } else if (strlen($license_key) != 32) {
                $license_key = hash("sha256", $license_key, TRUE);
            }
            $limiter = "%zqYJ3}rX\xfeZ2hA.]Ss0(Xv1z";
            $string = hex2bin(
                str_replace(
                    [" ", "\n", "\r", "\t", "-", "[", "]", "*"],
                    "",
                    $string
                )
            );
            $string = array_values(unpack("C*", $string));
            $license_key = array_values(unpack("C*", $license_key));
            for ($j = 0; $j < 52; ++$j) {
                for ($i = 0; $i < 48; ++$i) {
                    $a = (7 * $i + 1) % 48;
                    $b = (3 * $i + $a + 7) % 48;
                    $c = (11 * $i + $b + 5) % 48;
                    if ($a == $i) {
                        $a = (3 * $a + 5) % 48;
                    }
                    if ($b == $i) {
                        $b = (7 * $b + 13) % 48;
                    }
                    if ($c == $i) {
                        $c = (11 * $c + 3) % 48;
                    }
                    $x = $license_key[(3 * $c + 5 * $i + 7) % 32];
                    $y = $license_key[(5 * $a + 7 * $i + 11) % 32];
                    $z = $license_key[(7 * $b + 11 * $i + 3) % 32];
                    for ($k = 0; $k < 2; ++$k) {
                        $x = $license_key[(3 * $c + 5 * $z + 7 * $i + 11) % 32];
                        $y = $license_key[(5 * $a + 7 * $x + 11 * $i + 3) % 32];
                        $z = $license_key[(7 * $b + 11 * $y + 3 * $i + 5) % 32];
                    }
                    $x = (3 * $c + 5 * $z + 7 * $i + 11) % 32;
                    $y = (5 * $a + 7 * $x + 11 * $i + 3) % 32;
                    $z = (7 * $b + 11 * $y + 3 * $i + 5) % 32;
                    $string[$i] =
                        $sbox[$string[$i] ^
                        $license_key[$x] ^
                        $sbox[$string[$a] ^ $string[$b]]] ^ $x;
                    $string[$i] =
                        $sbox[$string[$i] ^
                        $license_key[$x] ^
                        $sbox[$string[$b] & $string[$c]]] ^ $y;
                    $string[$i] =
                        $sbox[$string[$i] ^
                        $license_key[$y] ^
                        $sbox[$string[$a] | $string[$c]]] ^ $z;
                    $string[$i] =
                        $sbox[$string[$i] ^
                        $license_key[$z] ^
                        $sbox[$string[$a] & $string[$b]]] ^ $c;
                    $string[$i] =
                        $sbox[$string[$i] ^
                        $license_key[$z] ^
                        $sbox[$string[$b] ^ $string[$c]]] ^ $a;
                }
            }
            array_unshift($string, "C*");
            $string = call_user_func_array("pack", $string);
            if (substr($string, 0, 24) != $limiter) {
                return FALSE;
            }
            $times = unpack("N2", substr($string, 40, 8));
            return [
                "systemhash" => substr($string, 24, 16),
                "ready"      => $times[1] ^ 0xf9a02eec,
                "expiration" => $times[2] ^ 0x2904a19b,
            ];
        }

        public static function createLogMsg($msg, $type)
        {
            $msg = str_replace("\n", "\n  ", $msg);
            $level = error_reporting();
            switch ($type) {
                case "success":
                case "notice":
                    if (!($level & E_USER_NOTICE) || !self::$logger) {
                        return FALSE;
                    }
                    break;
                case "warning":
                    if (!($level & E_USER_WARNING)) {
                        return FALSE;
                    }
            }
            if (self::$iscli) {
                switch ($type) {
                    case "error":
                        $msg = "\e[31mError:   \e[0m$msg\n";
                        break;
                    case "success":
                        $msg = "\e[32mSuccess: \e[0m$msg\n";
                        break;
                    case "warning":
                        $msg = "\e[33mWarning: \e[0m$msg\n";
                        break;
                    case "notice":
                        $msg = "\e[36mNotice:  \e[0m$msg\n";
                        break;
                }
            } else {
                switch ($type) {
                    case "error":
                        $msg = "Error:   $msg\n";
                        break;
                    case "success":
                        $msg = "Success: $msg\n";
                        break;
                    case "warning":
                        $msg = "Warning: $msg\n";
                        break;
                    case "notice":
                        $msg = "Notice:  $msg\n";
                        break;
                }
            }
            return $msg;
        }

        public static function log($msg, $type = "error")
        {
            if (self::$iscli) {
                $msg = self::createLogMsg($msg, $type);
                if ($msg) {
                    print $msg;
                }
            } else {
                if (!headers_sent()) {
                    header("Content-type: text/plain");
                }
                $msg = self::createLogMsg($msg, $type);
                if ($msg) {
                    error_log($msg);
                    print $msg;
                }
            }
            if ($type == "error") {
                die();
                exit();
                sleep(1e9);
            }
        }

        public static function backlog()
        {
            if (self::$iscli) {
                print "\e[1A\e[2K";
            }
        }

        public static function removedLoader($loader)
        {
            self::log(
                "The loader file '$loader' do not exists for complete obfuscatoring proccess!",
                "error"
            );
        }

        public static function findQBC($code, $delimiter, $hbc = 5)
        {
            $zbc = str_repeat("f", $hbc);
            for ($j = 0; ; ++$j) {
                for ($i = 0; $i <= 0x7fffffff; ++$i) {
                    $hash = md5(str_replace($delimiter, "$i-$j", $code));
                    if (substr($hash, 0, $hbc) == $zbc) {
                        return str_replace($delimiter, "$i-$j", $code);
                    }
                };
            }
        }

        public static function obfuscator($code, $settings = [])
        {
            if (is_string($code) && file_exists($code)) {
                $code = file_get_contents($code);
            } else if (is_callable($code)) {
                $code = "<" . "?php\n" . self::getcallable($code) . "\n?" . ">";
            }
            self::$obfstime = microtime(TRUE);
            $sign = md5(crc32($code) . rand() . self::$obfstime, TRUE);
            $signflag = substr(md5("alom:$sign"), 0, 12);
            self::$key[0] ^= rand();
            self::$key[1] ^= rand();
            self::$fky[0] = self::getasciiikey(16);
            self::$fky[1] = self::getasciiikey(16);
            self::log(
                "Script initialized. (unixtime: " .
                self::$obfstime .
                ")\nsign:     " .
                bin2hex($sign) .
                "\nsignflag: $signflag",
                "notice"
            );
            if (!isset($settings["rounds"])) {
                $settings["rounds"] = [];
            }
            if (!isset($settings["rounds"]["main"])) {
                $settings["rounds"]["main"] = [
                    "depth_type" => "logpower",
                    "depth"      => 1,
                ];
            } else {
                if (!isset($settings["rounds"]["main"]["depth_type"])) {
                    $settings["rounds"]["main"]["depth_type"] = "logpower";
                } else {
                    $settings["rounds"]["main"]["depth_type"] = strtolower(
                        $settings["rounds"]["main"]["depth_type"]
                    );
                    if (
                    !in_array($settings["rounds"]["main"]["depth_type"], [
                        "constant",
                        "logarithm",
                        "logpower",
                        "square",
                        "linear",
                    ])
                    ) {
                        $settings["rounds"]["main"]["depth_type"] = "logpower";
                    }
                }
                if (
                    !isset($settings["rounds"]["main"]["depth"]) ||
                    !is_numeric($settings["rounds"]["main"]["depth"])
                ) {
                    self::log(
                        "The parameter rounds.main.depth is not initialized. Set to 1 by default.",
                        "notice"
                    );
                    $settings["rounds"]["main"]["depth"] = 1;
                } else {
                    $settings["rounds"]["main"]["depth"] =
                        (float)$settings["rounds"]["main"]["depth"];
                }
            }
            if (!isset($settings["rounds"]["main"]["extrascript_round"])) {
                $settings["rounds"]["main"]["extrascript_round"] = TRUE;
            }
            if (!isset($settings["rounds"]["main"]["base64rand_round"])) {
                $settings["rounds"]["main"]["base64rand_round"] = FALSE;
            }
            if (!isset($settings["rounds"]["main"]["deflate_rounds"])) {
                $settings["rounds"]["main"]["deflate_round"] = TRUE;
            }
            if (!isset($settings["rounds"]["minify"])) {
                $settings["rounds"]["minify"] = ["enable" => TRUE];
            } else {
                if (!isset($settings["rounds"]["minify"]["enable"])) {
                    $settings["rounds"]["minify"]["enable"] = TRUE;
                }
            }
            if (!isset($settings["rounds"]["optwister"])) {
                $settings["rounds"]["optwister"] = ["enable" => FALSE];
            } else {
                if (!isset($settings["rounds"]["optwister"]["enable"])) {
                    $settings["rounds"]["optwister"]["enable"] = FALSE;
                }
            }
            if (!isset($settings["rounds"]["partitioning"])) {
                $settings["rounds"]["partitioning"] = [
                    "enable" => FALSE,
                    "fast"   => FALSE,
                ];
            } else {
                if (!isset($settings["rounds"]["partitioning"]["enable"])) {
                    $settings["rounds"]["partitioning"]["enable"] = FALSE;
                }
                if (!isset($settings["rounds"]["partitioning"]["fast"])) {
                    $settings["rounds"]["partitioning"]["fast"] = FALSE;
                }
            }
            if (!isset($settings["rounds"]["antidebugger"])) {
                $settings["rounds"]["antidebugger"] = ["enable" => TRUE];
            } else {
                if (!isset($settings["rounds"]["antidebugger"]["enable"])) {
                    $settings["rounds"]["antidebugger"]["enable"] = TRUE;
                }
            }
            if (!isset($settings["rounds"]["qbc"])) {
                $settings["rounds"]["qbc"] = FALSE;
            }
            if ($settings["rounds"]["minify"]["enable"]) {
                $code = self::minify($code);
            }
            if (!isset($settings["style"])) {
                $settings["style"] = [];
            }
            if (!isset($settings["style"]["separated_loader"])) {
                $settings["style"]["separated_loader"] = [];
            }
            if (!isset($settings["style"]["halt_mode"])) {
                $settings["style"]["halt_mode"] = FALSE;
            }
            if (!isset($settings["style"]["hide_errors"])) {
                $settings["style"]["hide_errors"] = TRUE;
            }
            if (!isset($settings["style"]["raw"])) {
                $settings["style"]["raw"] = FALSE;
            }
            if (!isset($settings["identify"])) {
                $settings["identify"] = [];
            }
            if (!isset($settings["identify"]["files"])) {
                $settings["identify"]["files"] = [];
            }
            if (
            !isset($settings["style"]["separated_loader"]["decoder_file"])
            ) {
                $settings["style"]["separated_loader"]["decoder_file"] = FALSE;
            } else {
                $settings["style"]["separated_loader"]["decoder_file"] =
                    (string)$settings["style"]["separated_loader"]["decoder_file"];
                if (
                file_exists(
                    $settings["style"]["separated_loader"]["decoder_file"]
                )
                ) {
                    $settings["indentify"]["files"][] =
                        $settings["style"]["separated_loader"]["decoder_file"];
                } else if (
                @!file_get_contents(
                    $settings["style"]["separated_loader"]["decoder_file"]
                )
                ) {
                    $settings["style"]["separated_loader"]["decoder_file"] = FALSE;
                }
            }
            if (
                !$settings["rounds"]["optwister"]["enable"] ||
                !isset($settings["style"]["separated_loader"]["optwister_file"])
            ) {
                $settings["style"]["separated_loader"]["optwister_file"] = FALSE;
            } else {
                $settings["style"]["separated_loader"]["optwister_file"] =
                    (string)$settings["style"]["separated_loader"]["optwister_file"];
                if (
                file_exists(
                    $settings["style"]["separated_loader"]["optwister_file"]
                )
                ) {
                    $settings["indentify"]["files"][] =
                        $settings["style"]["separated_loader"]["optwister_file"];
                } else if (
                @!file_get_contents(
                    $settings["style"]["separated_loader"]["optwister_file"]
                )
                ) {
                    $settings["style"]["separated_loader"]["optwister_file"] = FALSE;
                }
            }
            if (!isset($settings["license"])) {
                $settings["license"] = [];
            }
            if (!isset($settings["license"]["type"])) {
                $license_type = "comment";
            } else {
                $license_type = strtolower($settings["license"]["type"]);
                if (!in_array($license_type, ["comment", "file", "remove"])) {
                    $license_type = "comment";
                }
                unset($settings["license"]["type"]);
            }
            if ($license_type == "remove") {
                $settings["license"] = "";
            } else {
                $parameters = $settings["license"];
                if (!isset($parameters["title"])) {
                    $parameters["title"] = "Obfuscated by ALOM " . ALOM_VERSION;
                }
                if (
                    isset($parameters["checksum"]) &&
                    $parameters["checksum"] === TRUE
                ) {
                    $parameters["checksum"] = md5($code);
                }
                if (isset($parameters["license_key"])) {
                    if ($parameters["license_key"] == 64) {
                        $parameters["license_key"] = hex2bin(
                            $parameters["license_key"]
                        );
                    } else if (strlen($parameters["license_key"]) != 32) {
                        $parameters["license_key"] = hash(
                            "sha256",
                            $parameters["license_key"],
                            TRUE
                        );
                    }
                    $license_key = $parameters["license_key"];
                    unset($parameters["license_key"]);
                    $parameters["license_code"] =
                        "[************************************************-********************************-****************]";
                    if (isset($paramteres["license_verifier_api"])) {
                        $license_verifier_api =
                            $parameters["license_verifier_api"];
                        unset($parameters["license_verifier_api"]);
                    }
                }
                $license_text = "Do not change anything of segment antitamper";
                if ($license_type == "comment") {
                    $settings["license"] =
                        "/** ALOM Obfuscator License\n * " .
                        str_replace("\n", "\n * ", $license_text) .
                        "\n *\n";
                    foreach ($parameters as $key => $value) {
                        $key = str_replace(["\n", "_"], " ", $key);
                        $key = self::commentquote($key);
                        $value = self::commentquote(
                            str_replace("\n", "\n  ", $value)
                        );
                        $settings["license"] .= " * $key: $value\n";
                    }
                    $settings["license"] .= " */";
                } else if ($license_type == "file") {
                    if (isset($parameters["license_file"])) {
                        $license_file = $parameters["license_file"];
                        unset($parameters["license_file"]);
                    } else {
                        $license_file = "alomObfuscator.php.license";
                    }
                    $settings["identify"]["files"][] = $license_file;
                    $settings["license"] =
                        "* ALOM Obfuscator License\r\n" .
                        str_replace("\n", "\r\n", $license_text) .
                        "\r\n\r\n";
                    foreach ($parameters as $key => $value) {
                        $key = str_replace(["\n", "_"], " ", $key);
                        $value = str_replace("\n", "\n  ", $value);
                        $settings["license"] .= "$key: $value\r\n";
                    }
                    file_put_contents($license_file, $settings["license"]);
                }
            }
            if (isset($license_key)) {
                self::log(
                    "License created. (type=$license_type, license_key=" .
                    bin2hex($license_key) .
                    ")",
                    "notice"
                );
            } else {
                self::log("License created. (type=$license_type)", "notice");
            }
            $hashes = [
                "files"  => [],
                "system" => ["ord" => 0xe3, "id" => $sign],
                "id"     => "W]",
            ];
            foreach ($settings["identify"]["files"] as $file) {
                if (!file_exists($file)) {
                    continue;
                }
                $hashes["files"][$file] = md5(
                    basename($file) . "\n" . file_get_contents($file),
                    TRUE
                );
                $hashes["id"] .= $hashes["files"][$file] . "\n";
            }
            $hashes["id"] .= count($hashes["files"]) . "/+\xf1%R\r";
            if (isset($settings["identify"]["uname"])) {
                if (
                    !isset($settings["identify"]["uname"]["hashed"]) ||
                    !$settings["identify"]["uname"]["hashed"]
                ) {
                    $settings["identify"]["uname"]["value"] = md5(
                        $settings["identify"]["uname"]["value"],
                        TRUE
                    );
                }
                $hashes["system"]["ord"] ^= 0x1;
                $hashes["system"]["id"] .= "un:{$settings["identify"]["uname"]["value"]}\n";
            }
            if (isset($settings["identify"]["username"])) {
                if (
                    !isset($settings["identify"]["username"]["hashed"]) ||
                    !$settings["identify"]["username"]["hashed"]
                ) {
                    $settings["identify"]["username"]["value"] = md5(
                        $settings["identify"]["username"]["value"],
                        TRUE
                    );
                }
                $hashes["system"]["ord"] ^= 0x2;
                $hashes["system"]["id"] .= "us:{$settings["identify"]["username"]["value"]}\n";
            }
            if (isset($settings["identify"]["filename"])) {
                if (
                    !isset($settings["identify"]["filename"]["hashed"]) ||
                    !$settings["identify"]["filename"]["hashed"]
                ) {
                    $settings["identify"]["filename"]["value"] = md5(
                        basename($settings["identify"]["filename"]["value"]),
                        TRUE
                    );
                }
                $hashes["system"]["ord"] ^= 0x4;
                $hashes["system"]["id"] .= "fn:{$settings["identify"]["filename"]["value"]}\n";
            }
            if (isset($settings["identify"]["ipaddr"])) {
                if (
                    !isset($settings["identify"]["ipaddr"]["hashed"]) ||
                    !$settings["identify"]["ipaddr"]["hashed"]
                ) {
                    $settings["identify"]["ipaddr"]["value"] = md5(
                        $settings["identify"]["ipaddr"]["value"],
                        TRUE
                    );
                }
                $hashes["system"]["ord"] ^= 0x8;
                $hashes["system"]["id"] .= "ip:{$settings["identify"]["ipaddr"]["value"]}\n";
            }
            if (isset($settings["identify"]["hostname"])) {
                if (
                    !isset($settings["identify"]["hostname"]["hashed"]) ||
                    !$settings["identify"]["hostname"]["hashed"]
                ) {
                    $settings["identify"]["hostname"]["value"] = md5(
                        $settings["identify"]["hostname"]["value"],
                        TRUE
                    );
                }
                $hashes["system"]["ord"] ^= 0x10;
                $hashes["system"]["id"] .= "hn:{$settings["identify"]["hostname"]["value"]}\n";
            }
            $hashes["id"] .=
                $hashes["system"]["id"] .
                "..\xaf\0S!\r" .
                $hashes["system"]["ord"];
            $hashes["id"] = md5($hashes["id"], TRUE);
            $hashes["system"]["id"] = md5(
                $hashes["system"]["id"] . chr($hashes["system"]["ord"]),
                TRUE
            );
            if (!isset($settings["date_domain"])) {
                $settings["date_domain"] = [];
            }
            if (
                !isset($settings["date_domain"]["expiration"]) ||
                !is_numeric($settings["date_domain"]["expiration"])
            ) {
                $settings["date_domain"]["expiration"] = 0x7fffffff;
            } else {
                $settings["date_domain"]["expiration"] =
                    (int)$settings["date_domain"]["expiration"];
            }
            if (
                !isset($settings["date_domain"]["ready"]) ||
                !is_numeric($settings["date_domain"]["ready"])
            ) {
                $settings["date_domain"]["ready"] = 0;
            } else {
                $settings["date_domain"]["ready"] =
                    (int)$settings["date_domain"]["ready"];
            }
            if (!isset($settings["additional"])) {
                $settings["additional"] = [];
            }
            if (!isset($settings["additional"]["antitamper"])) {
                $settings["additional"]["antitamper"] = "";
            } else if (is_callable($settings["additional"]["antitamper"])) {
                $settings["additional"]["antitamper"] =
                    self::getcallable($settings["additional"]["antitamper"]) .
                    "\n";
            } else {
                $settings["additional"]["antitamper"] =
                    trim((string)$settings["additional"]["antitamper"]) . "\n";
            }
            if (!isset($settings["additional"]["optional"])) {
                $settings["additional"]["optional"] = "";
            } else if (is_callable($settings["additional"]["optional"])) {
                $settings["additional"]["optional"] =
                    self::getcallable($settings["additional"]["optional"]) .
                    "\n";
            } else {
                $settings["additional"]["optional"] =
                    trim((string)$settings["additional"]["optional"]) . "\n";
            }
            $seed = rand();
            $tokens = token_get_all($code);
            $code = "";
            for ($i = 0; isset($tokens[$i]); ++$i) {
                if (is_array($tokens[$i])) {
                    if ($tokens[$i][0] == T_FILE) {
                        $code .= "_uwC5JBWaTsMV4Vs$signflag()";
                    } else if ($tokens[$i][0] == T_DIR) {
                        $code .= "_fETt6AVcU6vr6m5$signflag()";
                    } else if ($i == 0 && $tokens[$i][0] == T_INLINE_HTML) {
                        $html = htmlentities($tokens[$i][1]);
                        $html =
                            $html == $tokens[$i][1]
                                ? 'print "' . $html . '"'
                                : 'print html_entity_decode("' . $html . '")';
                        if (isset($tokens[$i + 1])) {
                            if ($tokens[++$i][0] == T_OPEN_TAG_WITH_ECHO) {
                                $code .= "<" . "?php $html;echo ";
                            } else {
                                $code .= "<" . "?php $html;";
                            }
                        } else {
                            $code .= "<" . "?php $html; ?" . ">";
                        }
                    } else if (
                        $tokens[$i][0] == T_CLOSE_TAG &&
                        isset($tokens[$i + 1])
                    ) {
                        if ($tokens[++$i][0] == T_OPEN_TAG_WITH_ECHO) {
                            $code .= ";echo ";
                        } else if ($tokens[$i][0] == T_OPEN_TAG) {
                            $code .= ";";
                        } else if ($tokens[$i][0] == T_INLINE_HTML) {
                            $html = htmlentities($tokens[$i][1]);
                            $html =
                                $html == $tokens[$i][1]
                                    ? 'print "' . $html . '"'
                                    : 'print html_entity_decode("' .
                                    $html .
                                    '")';
                            if (isset($tokens[$i + 1])) {
                                if ($tokens[++$i][0] == T_OPEN_TAG_WITH_ECHO) {
                                    $code .= ";$html;echo ";
                                } else {
                                    $code .= ";$html;";
                                }
                            } else {
                                $code .= ";$html; ?" . ">";
                            }
                        }
                    } else if ($tokens[$i][0] == T_OPEN_TAG_WITH_ECHO) {
                        $code .= "<" . "?php echo ";
                    } else {
                        $code .= $tokens[$i][1];
                    }
                } else {
                    $code .= $tokens[$i];
                }
            }
            if ($code === "") {
                $code = "<" . "?php ?" . ">";
            } else if (substr($code, -2, 2) != "?" . ">") {
                $code .= "?" . ">";
            }
            unset($tokens);
            $code = str_replace("?" . "><" . "?php", "", rtrim($code));
            $code = self::setikeys($code);
            $code = self::sug($code, $signflag);
            $pky = [
                crc32(self::$fky[0]) ^ self::$key[0],
                crc32(self::$fky[1]) ^ self::$key[1],
            ];
            $pky[2] = md5($pky[0] . $sign . $pky[1], TRUE);
            $pkyid = substr(md5($pky[0] . $pky[2] . $sign . $pky[1], TRUE), 4);
            if ($settings["rounds"]["optwister"]["enable"]) {
                self::log("optwister round is proccessing...", "notice");
                $code = self::minify(self::optwister_op2fn($code, $signflag));
                $code = self::optwister_obfs(
                    $code,
                    $signflag,
                    $pky[0],
                    $pky[1],
                    $pky[2],
                    $pkyid
                );
                self::backlog();
                self::log("optwister round proccessed.", "notice");
            }
            $code = substr($code, 5);
            $code = str_replace("?" . "><" . "?php", "", rtrim($code));
            if (substr($code, -2, 2) == "?" . ">") {
                $code = substr($code, 0, -2);
            }
            $code = trim($code);
            self::mt_prng_store($seed ^ 0x90c8);
            self::encodew(TRUE, 0, 0);
            if ($settings["rounds"]["partitioning"]["enable"]) {
                self::log("partitioning round is proccessing...", "notice");
                $pky2 = [
                    crc32($pkyid . $pky[0]) ^ self::$key[1],
                    crc32($pkyid . $pky[1]) ^ self::$key[0],
                ];
                $pky2[2] = md5($pky2[0] . $pky[2] . $pky2[1], TRUE);
                $pkyid2 = substr(
                    md5($pky2[0] . $pky2[2] . $pky[2] . $pky2[1], TRUE),
                    4
                );
                $ua = $partition = [];
                $code = self::partitioning(
                    $ua,
                    $partition,
                    $code,
                    $settings["rounds"]["optwister"]["enable"],
                    $signflag,
                    $pky2[0],
                    $pky2[1],
                    $pky2[2],
                    $pkyid2,
                    $settings["rounds"]["partitioning"]["fast"]
                );
                $code = pack("N", strlen($code) ^ $pky[0]) . $code;
                $code .= pack("N", count($ua) ^ $pky[0]);
                foreach ($ua as $part) {
                    $code .= pack("N", $part ^ $pky[0]);
                }
                foreach ($partition as $part) {
                    $code .= pack("N", strlen($part) ^ $pky[0]) . $part;
                }
                for ($i = strlen($code) - 2; $i >= 0; --$i) {
                    $code[$i + 1] = chr(
                        ((ord($code[$i + 1]) ^
                                ord($code[$i]) ^
                                ord(self::$fky[1][$i & 0xf])) -
                            ord(self::$fky[0][$i & 0xf]) +
                            0x100) &
                        0xff
                    );
                }
                for ($i = 0; isset($code[$i]); ++$i) {
                    $code[$i] = chr(
                        ((ord($code[$i]) ^ ord(self::$fky[0][$i & 0xf])) -
                            ord(self::$fky[1][$i & 0xf]) +
                            0x100) &
                        0xff
                    );
                }
                self::backlog();
                self::log("partitioning round proccessed.", "notice");
            }
            if ($settings["rounds"]["main"]["deflate_round"]) {
                $code = gzdeflate($code, 9);
            }
            self::mt_prng_store($seed ^ 0x8550255);
            $code = self::inc(
                $code,
                rand() ^ self::$key[0],
                rand() ^ self::$key[1]
            );
            if ($settings["rounds"]["main"]["base64rand_round"]) {
                self::mt_prng_store($seed ^ 0x1c);
                $code = self::base64encode($code);
            }
            self::mt_prng_store($seed ^ 0xde);
            $len = strlen($code);
            $depth = $settings["rounds"]["main"]["depth"];
            switch ($settings["rounds"]["main"]["depth_type"]) {
                case "constant":
                    $depth = ceil(($depth + 1) * $depth);
                    break;
                case "logarthm":
                    $depth = ceil((log($len + 1, 2) + $depth + 1) * $depth);
                    break;
                case "logpower":
                    $depth = ceil(
                        (pow(log($len + 1, 2), 2.02) + $depth + 1) * $depth
                    );
                    break;
                case "square":
                    $depth = ceil((sqrt($len) + $depth + 1) * $depth);
                    break;
                case "linear":
                    $depth = ceil(($len + $depth + 1) * $depth);
                    break;
            }
            $randpack = [];
            $rps = $depth * 9 + 6;
            for ($i = 1; $i <= $rps; ++$i) {
                $randpack[$rps - $i] = rand();
            }
            $file = "<" . "?php\n";
            if ($license_type == "comment") {
                $file .= $settings["license"] . "\n";
            }
            $license_length = strlen($file);
            if ($settings["additional"]["optional"]) {
                $file .=
                    "# ALOM OPTIONAL SEGMENT SEPARATOR d473b606a9" .
                    bin2hex($sign) .
                    " #\n";
                $file .= $settings["additional"]["optional"];
                $antitamper_offset = strlen($file);
                $file .=
                    "# ALOM ANTITAMPER SEGMENT SEPARATOR d473b606a9" .
                    bin2hex($sign) .
                    " #\n";
                if ($settings["additional"]["antitamper"]) {
                    $file .= $settings["additional"]["antitamper"];
                }
            } else {
                $antitamper_offset = strlen($file);
                $file .=
                    "# ALOM ANTITAMPER SEGMENT SEPARATOR d473b606a9" .
                    bin2hex($sign) .
                    " #\n";
                if ($settings["additional"]["antitamper"]) {
                    $file .= $settings["additional"]["antitamper"];
                }
            }
            $file .=
                "function _uwC5JBWaTsMV4Vs" .
                $signflag .
                "(){return __FILE__;}function _fETt6AVcU6vr6m5" .
                $signflag .
                "(){return __DIR__;}";
            $file .=
                "function _H4abed0zL6i7Pgw" .
                $signflag .
                '($XYZbpYbFeAq){return str_replace("AlomDecoder","AlomDecoder' .
                $signflag .
                '",$XYZbpYbFeAq);}';
            if ($settings["rounds"]["optwister"]["enable"]) {
                $file .=
                    "function _CuIjYEAXVvJzmV8" .
                    $signflag .
                    '($XYZbpYbFeAq){return str_replace("_ALOM_optwister","_ALOM_optwister' .
                    $signflag .
                    '",$XYZbpYbFeAq);}';
            }
            $file .=
                "function _s7GdHhyCWB0FOmT" .
                $signflag .
                '($cMEhPFcDh8H,$Zb5nfJM7T9u){return ($ndnNmLHVPUs=realpath($cMEhPFcDh8H))?' .
                '$ndnNmLHVPUs:(($ndnNmLHVPUs=realpath(__DIR__."/".$cMEhPFcDh8H))?$ndnNmLHVPUs:AlomDecoder' .
                $signflag .
                '::removedLoader($Zb5nfJM7T9u));}';
            $file .= "\neval(_H4abed0zL6i7Pgw$signflag(gzinflate(";
            if ($settings["style"]["separated_loader"]["decoder_file"]) {
                $file .=
                    "file_get_contents(_s7GdHhyCWB0FOmT('" .
                    self::singlequote(
                        $settings["style"]["separated_loader"]["decoder_file"]
                    ) .
                    "'))";
            } else if ($settings["style"]["raw"]) {
                if (
                !file_exists(
                    _fETt6AVcU6vr6m5f4ee4df4bf1a() . "/alomdecoder.obfs.php"
                )
                ) {
                    $contents = @file_get_contents(
                        _fETt6AVcU6vr6m5f4ee4df4bf1a() . "/alomdecoder.obfs.php"
                    );
                    if (!$contents) {
                        self::removedLoader("alomdecoder.obfs.php");
                    }
                } else {
                    $contents = file_get_contents(
                        _fETt6AVcU6vr6m5f4ee4df4bf1a() . "/alomdecoder.obfs.php"
                    );
                }
                $file .=
                    "'" . self::singlequote(base64_decode($contents)) . "'";
            } else {
                if (
                !file_exists(
                    _fETt6AVcU6vr6m5f4ee4df4bf1a() . "/alomdecoder.obfs.php"
                )
                ) {
                    $contents = @file_get_contents(
                        _fETt6AVcU6vr6m5f4ee4df4bf1a() . "/alomdecoder.obfs.php"
                    );
                    if (!$contents) {
                        self::removedLoader("alomdecoder.obfs.php");
                    }
                } else {
                    $contents = file_get_contents(
                        _fETt6AVcU6vr6m5f4ee4df4bf1a() . "/alomdecoder.obfs.php"
                    );
                }
                $file .= "base64_decode('$contents')";
            }
            $file .= ")));\n";
            if ($settings["rounds"]["optwister"]["enable"]) {
                $file .= "eval(_CuIjYEAXVvJzmV8$signflag(gzinflate(";
                if ($settings["style"]["separated_loader"]["optwister_file"]) {
                    $file .=
                        "file_get_contents(_s7GdHhyCWB0FOmT('" .
                        self::singlequote(
                            $settings["style"]["separated_loader"]["optwister_file"]
                        ) .
                        "'))";
                } else if ($settings["style"]["raw"]) {
                    if (
                    !file_exists(
                        _fETt6AVcU6vr6m5f4ee4df4bf1a() .
                        "/optwister.obfs.php"
                    )
                    ) {
                        $contents = @file_get_contents(
                            _fETt6AVcU6vr6m5f4ee4df4bf1a() .
                            "/optwister.obfs.php"
                        );
                        if (!$contents) {
                            self::removedLoader("optwister.obfs.php");
                        }
                    } else {
                        $contents = file_get_contents(
                            _fETt6AVcU6vr6m5f4ee4df4bf1a() .
                            "/optwister.obfs.php"
                        );
                    }
                    $file .=
                        "'" . self::singlequote(base64_decode($contents)) . "'";
                } else {
                    if (
                    !file_exists(
                        _fETt6AVcU6vr6m5f4ee4df4bf1a() .
                        "/optwister.obfs.php"
                    )
                    ) {
                        $contents = @file_get_contents(
                            _fETt6AVcU6vr6m5f4ee4df4bf1a() .
                            "/optwister.obfs.php"
                        );
                        if (!$contents) {
                            self::removedLoader("optwister.obfs.php");
                        }
                    } else {
                        $contents = file_get_contents(
                            _fETt6AVcU6vr6m5f4ee4df4bf1a() .
                            "/optwister.obfs.php"
                        );
                    }
                    $file .= "base64_decode('$contents')";
                }
                $file .= ")));\n";
            }
            $file .= "\AlomDecoder$signflag::mt_prng_store(rand());";
            if ($settings["style"]["hide_errors"]) {
                $file .= "try{@eval(\AlomDecoder$signflag::run('";
            } else {
                $file .= "eval(\AlomDecoder$signflag::run('";
            }
            $antitamper_length = strlen($file) - $antitamper_offset;
            self::mt_prng_reset();
            $p = 0;
            $r = 0;
            if (self::$iscli) {
                $prevprog = 0;
                self::log("main round proccessing... 0%", "notice");
            } else {
                self::log("main round proccessing...", "notice");
            }
            for ($i = 0; $i < $depth; ++$i) {
                if (self::$iscli) {
                    $prog = round(($i / $depth) * 50, 1) * 2;
                    if ($prog != $prevprog) {
                        self::backlog();
                        self::log("main round proccessing... $prog%", "notice");
                        $prevprog = $prog;
                    }
                }
                $action = $settings["rounds"]["main"]["extrascript_round"]
                    ? $randpack[$r + 8] % 0b111
                    : $randpack[$r + 8] % 0b110;
                switch ($action) {
                    case 0b000:
                        $code[$p] = chr(
                            ord($code[$p]) ^
                            ((self::$key[0] ^ self::$key[1]) & 0xff)
                        );
                        self::$key[1] ^=
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++];
                        self::$key[0] ^=
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++];
                        break;
                    case 0b001:
                        $crc =
                            ((int)(rand() + self::$key[0] + self::$key[1]) &
                                0xffffffff) ^
                            rand();
                        $crcb = pack("V", $crc ^ 0x9f0a4382);
                        $sl = self::uncrc32in(
                            substr($code, 0, $p) . $crcb,
                            substr($code, $p),
                            $crc
                        );
                        $code =
                            substr($code, 0, $p) .
                            $crcb .
                            $sl .
                            substr($code, $p);
                        $sl = unpack("V", $sl);
                        $crc ^= $randpack[$r + 7];
                        self::$key[1] ^=
                            $crc ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $sl[1];
                        self::$key[0] ^=
                            $crc ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++];
                        ++$r;
                        break;
                    case 0b010:
                        $crc = crc32(
                            pack("V", $randpack[$r + 7]) . self::$fky[0]
                        );
                        $crc ^= crc32(
                            pack("V", $randpack[$r + 6]) . self::$fky[1]
                        );
                        self::$key[1] ^=
                            $crc ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++];
                        self::$key[0] ^=
                            $crc ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++];
                        $r += 2;
                        break;
                    case 0b011:
                        $sl1 = rand();
                        $sl2 = rand();
                        $code =
                            substr($code, 0, $p) .
                            pack("V2", $sl1, $sl2) .
                            substr($code, $p);
                        self::$key[1] ^=
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $sl2 ^
                            1;
                        self::$key[0] ^=
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $sl1;
                        break;
                    case 0b100:
                        $cl = strlen($code) - 1;
                        $lq = ceil(
                            $settings["rounds"]["optwister"]["enable"]
                                ? pow($cl, 1 / 3)
                                : sqrt($cl)
                        );
                        $cl -= $lq;
                        $loc = $randpack[$r + 7] % $cl;
                        $len =
                            (($randpack[$r + 5] ^ $randpack[$r + 6]) % $lq) + 1;
                        $sl1 = self::$key[0] ^ $randpack[$r + 1];
                        $sl2 = self::$key[1] ^ $randpack[$r];
                        if ($len > $cl / 2) {
                            $len = ($randpack[$r + 2] % $len) + 1;
                        } else {
                            $sl2 ^= $randpack[$r + 2];
                        }
                        $code =
                            substr($code, 0, $loc) .
                            self::encodew(
                                substr($code, $loc, $len),
                                $sl1,
                                $sl2
                            ) .
                            substr($code, $loc + $len);
                        self::$key[1] = $sl1 ^ $randpack[$r + 4];
                        self::$key[0] = $sl2 ^ $randpack[$r + 3];
                        $r += 8;
                        break;
                    case 0b101:
                        $cl = strlen($code) - 1;
                        $lq = ceil(
                            $settings["rounds"]["optwister"]["enable"]
                                ? pow($cl, 1 / 3)
                                : sqrt($cl)
                        );
                        $cl -= $lq;
                        $loc = $randpack[$r + 7] % $cl;
                        $len =
                            (($randpack[$r + 5] ^ $randpack[$r + 6]) % $lq) + 1;
                        $sl1 = self::$key[0] ^ $randpack[$r + 1];
                        $sl2 = self::$key[1] ^ $randpack[$r];
                        if ($len > $cl / 2) {
                            $len = ($randpack[$r + 2] % $len) + 1;
                        } else {
                            $sl2 ^= $randpack[$r + 2];
                        }
                        $code =
                            substr($code, 0, $loc) .
                            self::incw(substr($code, $loc, $len), $sl1, $sl2) .
                            substr($code, $loc + $len);
                        self::$key[1] = $sl1 ^ $randpack[$r + 4];
                        self::$key[0] = $sl2 ^ $randpack[$r + 3];
                        $r += 8;
                        break;
                    case 0b110:
                        $crc =
                            ((int)(rand() + self::$key[0] + self::$key[1]) &
                                0xffffffff) ^
                            rand();
                        self::$key[1] ^=
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $crc;
                        self::$key[0] ^=
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $randpack[$r++] ^
                            $crc;
                        $len = strlen($code);
                        $sub = "";
                        do {
                            $loc = rand(0, $len - 1);
                            $dlt = rand(0, 0xff);
                            $code[$loc] = $code[$loc] ^ chr($dlt);
                            if ($dlt > 0xf) {
                                $dlt = dechex($dlt);
                            } else {
                                $dlt = "0" . dechex($dlt);
                            }
                            $sub .= "\$code[$loc]=\$code[$loc]^\"\\x$dlt\";";
                        } while (rand(0, 6));
                        if (rand(0, 2)) {
                            $sub .=
                                "\$obfuscatored=file_get_contents(preg_replace(\"/\([0-9]+\) : eval\(\)'d code/i\",'',__FILE__));";
                            while (rand(0, 2)) {
                                $loc = rand(0, $len - 1);
                                $dlt = rand(0, $license_length - 1);
                                $code[$loc] = $code[$loc] ^ $file[$dlt];
                                $sub .= "\$code[$loc]=\$code[$loc]^\$obfuscatored[\$license_offset+$dlt];";
                                $loc = rand(0, $len - 1);
                                $dlt = rand(0, $license_length - 1);
                                $code[$loc] =
                                    $code[$loc] ^
                                    $file[$antitamper_offset + $dlt];
                                $sub .= "\$code[$loc]=\$code[$loc]^\$obfuscatored[\$antitamper_offset+$dlt];";
                            }
                        }
                        do {
                            $loc = rand(0, $len - 1);
                            $dlt = rand(0, 0xff);
                            $code[$loc] = $code[$loc] ^ chr($dlt);
                            if ($dlt > 0xf) {
                                $dlt = dechex($dlt);
                            } else {
                                $dlt = "0" . dechex($dlt);
                            }
                            $sub .= "\$code[$loc]=\$code[$loc]^\"\\x$dlt\";";
                        } while (rand(0, 6));
                        $rtn = 0;
                        while (!rand(0, 26)) {
                            $rnb = random_bytes(strlen($sub));
                            if (rand(0, 3)) {
                                $sub =
                                    "\$brt$rtn=microtime(true);eval('" .
                                    self::singlequote($sub ^ $rnb) .
                                    "'^'" .
                                    self::singlequote($rnb) .
                                    "');";
                                $sub .= "if(microtime(true)-\$brt$rtn>0.07)self::starvationDetected();";
                            } else {
                                $sub =
                                    "eval('" .
                                    self::singlequote($sub ^ $rnb) .
                                    "'^'" .
                                    self::singlequote($rnb) .
                                    "');";
                            }
                        }
                        $sub .= "\n// ";
                        do {
                            $sbb = self::getasciiikey(4);
                            $sbb .= self::uncrc32in(
                                "alom:$sub$sbb",
                                ":alom",
                                $crc
                            );
                        } while (str_replace(["\r", "\n"], "", $sbb) != $sbb);
                        $sub .= $sbb;
                        $sbm = $sub;
                        $sub = gzdeflate($sub, 9);
                        $code =
                            substr($code, 0, $p) .
                            pack("V", strlen($sub)) .
                            $sub .
                            substr($code, $p);
                        self::$fky[0] =
                            self::$fky[0] ^
                            md5(
                                $sign .
                                substr($file, 0, $license_length) .
                                $sbm,
                                TRUE
                            );
                        self::$fky[1] =
                            self::$fky[1] ^
                            md5(
                                $sign .
                                substr(
                                    $file,
                                    $antitamper_offset,
                                    $antitamper_length
                                ) .
                                $sbm,
                                TRUE
                            );
                        break;
                }
                $loc = rand() % strlen($code);
                $code =
                    substr($code, 0, $loc) .
                    pack("V", $p ^ self::$key[0] ^ self::$key[1]) .
                    substr($code, $loc);
                $p = $loc;
                self::$key[0] =
                    (int)(self::$key[0] - 0x32123 - ($randpack[$r] >> 4)) &
                    0xffffffff;
                self::$key[1] =
                    (int)(self::$key[1] - 0x12321 - ($randpack[$r] >> 4)) &
                    0xffffffff;
                ++$r;
            }
            self::backlog();
            self::log("main round proccessed.", "notice");
            $packet = pack("V", $p ^ self::$key[0] ^ self::$key[1]);
            $sl1 = $randpack[$r++];
            $sl2 = $randpack[$r++];
            $crc1 = crc32(pack("V", $sl1));
            $crc2 = crc32(pack("V", $sl2));
            self::$key[1] ^= 0x9c2858bd;
            self::$key[0] = unpack(
                "V",
                self::uncrc32(self::$key[0] ^ $randpack[$r++] ^ $sl1, $crc1)
            );
            self::$key[0] = self::$key[0][1] ^ $randpack[$r++] ^ $sl2;
            self::$key[1] = unpack(
                "V",
                self::uncrc32(self::$key[1] ^ $randpack[$r++] ^ $sl2, $crc2)
            );
            self::$key[1] = self::$key[1][1] ^ $randpack[$r++] ^ $sl1;
            self::$key[0] ^= 0x9c2858bf;
            self::$key[0] ^= crc32(substr($hashes["system"]["id"], 0, 8));
            self::$key[1] ^= crc32(substr($hashes["system"]["id"], 8, 8));
            self::$fky[0] = self::$fky[0] ^ $hashes["id"];
            self::$fky[1] = self::$fky[1] ^ $hashes["id"];
            $code =
                chr($hashes["system"]["ord"]) .
                md5($sign . $hashes["id"], TRUE) .
                $code;
            $ffsp = pack("V", count($hashes["files"]) ^ 0x405a0ff1);
            foreach ($hashes["files"] as $name => $hash) {
                $ffsp .=
                    pack("V", strlen($name) ^ 0x671feb84) .
                    $name .
                    md5($sign . $hash, TRUE);
            }
            $code = $ffsp . $code;
            if (isset($license_key)) {
                $code = $license_key . $code;
            }
            if (isset($license_verifier_api)) {
                $code =
                    pack("N", strlen($license_verifier_api) ^ 0x7702235f) .
                    $license_verifier_api .
                    $code;
            }
            if (isset($license_file)) {
                $code =
                    pack("N", strlen($license_file) ^ 0x5598aa1e) .
                    $license_file .
                    $code;
            }
            self::$key[0] ^= $settings["date_domain"]["ready"];
            self::$key[1] ^= $settings["date_domain"]["expiration"];
            self::$fky[0] =
                self::$fky[0] ^
                md5($sign . substr($file, 0, $license_length), TRUE);
            self::$fky[1] =
                self::$fky[1] ^
                md5(
                    $sign .
                    substr($file, $antitamper_offset, $antitamper_length),
                    TRUE
                );
            $code =
                pack(
                    "V2",
                    $settings["date_domain"]["ready"] ^ 0xf09132b8,
                    $settings["date_domain"]["expiration"] ^ 0x5627c1f0
                ) . $code;
            $packet .= pack(
                "V3",
                self::$key[1] ^ 0xefcdab89,
                self::$key[0] ^ 0x67452301,
                $depth ^ 0x309a2f35
            );
            $packet .= pack(
                "V2",
                $license_length ^ 0x45ff39ae,
                $antitamper_length ^ 0x01192bca
            );
            $flag = 0x9e;
            if ($settings["rounds"]["optwister"]["enable"]) {
                $flag ^= 0x1;
            }
            if ($settings["rounds"]["partitioning"]["enable"]) {
                $flag ^= 0x2;
            }
            if ($settings["rounds"]["antidebugger"]["enable"]) {
                $flag ^= 0x4;
            }
            if ($settings["rounds"]["main"]["extrascript_round"]) {
                $flag ^= 0x8;
            }
            if ($settings["rounds"]["main"]["base64rand_round"]) {
                $flag ^= 0x10;
            }
            if ($settings["rounds"]["main"]["deflate_round"]) {
                $flag ^= 0x20;
            }
            if (isset($license_key)) {
                $flag ^= 0x40;
            }
            if ($settings["additional"]["optional"]) {
                $flag ^= 0x80;
            }
            $packet .= chr($flag);
            $flag = 0xb5;
            if (isset($license_verifier_api)) {
                $flag ^= 0x1;
            }
            if (isset($license_file)) {
                $flag ^= 0x2;
            }
            $packet .= chr($flag) . self::$fky[0] . self::$fky[1] . $sign;
            $code = $packet . $code;
            $code .= "\x43";
            $len = strlen($code);
            if ($len % 4 != 0) {
                $code .= str_repeat("\x85", 4 - ($len % 4));
            }
            self::mt_prng_store($seed ^ 0x74);
            $code = array_values(unpack("V*", $code));
            for ($i = 0; isset($code[$i]); ++$i) {
                $code[$i] ^= rand();
            }
            array_unshift($code, "V*");
            $code = call_user_func_array("pack", $code);
            $code =
                pack(
                    "V2",
                    floor(self::$obfstime) ^ 0x509a2f33,
                    crc32($code) ^ 0xdeadc0de
                ) . $code;
            self::mt_prng_store($seed ^ ALOM_VERSION_NUMBER ^ 0x51);
            if ($settings["style"]["halt_mode"]) {
                $code = $settings["style"]["raw"]
                    ? "\0" . $code
                    : self::base64encode($code);
            } else {
                $code = $settings["style"]["raw"]
                    ? "\0" . self::singlequote($code)
                    : self::base64encode($code);
            }
            $code =
                "\x41l\x6fM$" .
                dechex($seed) .
                ($settings["rounds"]["qbc"]
                    ? ":{$settings["rounds"]["qbc"]}"
                    : "") .
                '$' .
                $code;
            if ($settings["style"]["halt_mode"]) {
                $len = strlen($code);
                if ($settings["style"]["hide_errors"]) {
                    $pos = strlen($file) + 47 + 52;
                    $file .= "$pos:$len'));}catch(\Error|\Exception \$_ALOM_catcherr){}";
                } else {
                    $pos = strlen($file) + 4 + 52;
                    $file .= "$pos:$len'));";
                }
                $file .= "AlomDecoder{$signflag}::uspv();\n__halt_compiler();\n$code";
            } else {
                if ($settings["style"]["hide_errors"]) {
                    $file .=
                        $code .
                        "'));}catch(\Error|\Exception \$_ALOM_catcherr){}";
                } else {
                    $file .= $code . "'));";
                }
                $file .= "AlomDecoder{$signflag}::uspv();";
            }
            $file .= "\n?" . ">";
            self::mt_prng_reset();
            self::$key = [0x67452301, 0xefcdab89];
            self::$fky = [];
            self::$obfstime = 0;
            self::log(
                "code obfuscated successfully. (size=" .
                self::sizeformat(strlen($file)) .
                ")",
                "success"
            );
            return $file;
        }
    }

    AlomEncoder::$iscli =
        defined("STDIN") ||
        PHP_SAPI === "cli" ||
        (empty($_SERVER["REMOTE_ADDR"]) and
            !isset($_SERVER["HTTP_USER_AGENT"]) and
            count($_SERVER["argv"]) > 0);
    AlomEncoder::$logger = AlomEncoder::$iscli;
}