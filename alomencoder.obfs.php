<?php

/**
 * Alom 2.3
 * Unpacked by Tesla
 * https://github.com/0x11DFE
 * 
 * This version of Alom is obfuscated internally
 * Look on older commits to manually deobfuscate it.
 */

if (isset($_ALOM_code)) {
    file_put_contents($_ALOM_code, '');
    unlink($_ALOM_code);
    $_ALOM_code = '';
    unset($_ALOM_code);
}
if (!class_exists('AlomEncoder')) {
    if (!defined('ALOM_VERSION')) {
        define('ALOM_VERSION', '2.3');
    }
    if (!defined('ALOM_VERSION_NUMBER')) {
        define('ALOM_VERSION_NUMBER', 20300);
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
        private static $_bd534020b8b7 = 1;
        private static $_d186186a7d16 = [0x67452301, 0xefcdab89];
        private static $_3227269fab81 = [];
        private static $_68aa9304b10c = 0;
        public static $_2b3c116ebf09 = TRUE;
        public static $_bf509b6a6b3d = TRUE;
        private static $_7520f8b4b421 = [
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
        private static $_468b0eed41c8 = [
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

        public static function getmd5ikey($_23bf89ec40b6) { return md5($_23bf89ec40b6 . ':' . microtime() . ':' . lcg_value(), TRUE); }

        public static function getasciiikey($_8d2d7939f6cb)
        {
            if (function_exists('random_bytes')) return random_bytes($_8d2d7939f6cb);
            $_23bf89ec40b6 = '';
            for ($_44af9f79ea06 = 0; $_44af9f79ea06 * 16 < $_8d2d7939f6cb; ++$_44af9f79ea06) $_23bf89ec40b6 .= getmd5ikey($_23bf89ec40b6 . $_8d2d7939f6cb);
            return substr($_23bf89ec40b6, 0, $_8d2d7939f6cb);
        }

        public static function getcharikey() { return self::getasciiikey(1); }

        public static function getbitikey() { return ord(self::getcharikey()) & 1; }

        public static function getintikey()
        {
            $_e3883a47f8e2 = unpack('N', self::getasciiikey(4));
            return $_e3883a47f8e2[1];
        }

        public static function minify($_c3ff9ca148fc)
        {
            $_00c3c9be86c9 = [
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
            $_ce467557df24 = token_get_all($_c3ff9ca148fc);
            $_7847d9353cff = "";
            $_40d1e3c43b78 = sizeof($_ce467557df24);
            $_f7220aea6cbf = FALSE;
            $_7a6ee10567a9 = FALSE;
            $_ef0328743c06 = "";
            $_3a4dc0472b89 = NULL;
            for ($_44af9f79ea06 = 0; $_44af9f79ea06 < $_40d1e3c43b78; ++$_44af9f79ea06) {
                $_5572c1da585c = $_ce467557df24[$_44af9f79ea06];
                if (is_array($_5572c1da585c)) {
                    [$_69e78850f7b6, $_250a58058e85] = $_5572c1da585c;
                    $_21f1c89c7f62 = token_name($_69e78850f7b6);
                    if ($_69e78850f7b6 == T_INLINE_HTML) {
                        $_7847d9353cff .= $_250a58058e85;
                        $_f7220aea6cbf = FALSE;
                    } else {
                        if ($_69e78850f7b6 == T_OPEN_TAG) {
                            $_250a58058e85 = rtrim($_250a58058e85);
                            $_250a58058e85 .= " ";
                            $_7847d9353cff .= $_250a58058e85;
                            $_3a4dc0472b89 = T_OPEN_TAG;
                            $_f7220aea6cbf = TRUE;
                        } else if ($_69e78850f7b6 == T_OPEN_TAG_WITH_ECHO) {
                            $_7847d9353cff .= $_250a58058e85;
                            $_3a4dc0472b89 = T_OPEN_TAG_WITH_ECHO;
                            $_f7220aea6cbf = TRUE;
                        } else if ($_69e78850f7b6 == T_CLOSE_TAG) {
                            if ($_3a4dc0472b89 == T_OPEN_TAG_WITH_ECHO) $_7847d9353cff = rtrim($_7847d9353cff, "; "); else $_250a58058e85 = " " . $_250a58058e85;
                            $_7847d9353cff .= $_250a58058e85;
                            $_3a4dc0472b89 = NULL;
                            $_f7220aea6cbf = FALSE;
                        } else if (in_array($_69e78850f7b6, $_00c3c9be86c9)) {
                            $_7847d9353cff .= $_250a58058e85;
                            $_f7220aea6cbf = TRUE;
                        } else if ($_69e78850f7b6 == T_CONSTANT_ENCAPSED_STRING || $_69e78850f7b6 == T_ENCAPSED_AND_WHITESPACE) {
                            if ($_250a58058e85[0] == '"') $_250a58058e85 = addcslashes($_250a58058e85, "\n\t\r");
                            $_7847d9353cff .= $_250a58058e85;
                            $_f7220aea6cbf = TRUE;
                        } else if ($_69e78850f7b6 == T_WHITESPACE) {
                            $_9b99e9c201bc = isset($_ce467557df24[$_44af9f79ea06 + 1]) ? $_ce467557df24[$_44af9f79ea06 + 1] : NULL;
                            if (!$_f7220aea6cbf && (!is_string($_9b99e9c201bc) || $_9b99e9c201bc == '$') && !in_array($_9b99e9c201bc[0], $_00c3c9be86c9)) $_7847d9353cff .= " "; else if ($_9b99e9c201bc !== NULL && isset($_ce467557df24[$_44af9f79ea06 - 1]) && ($_ce467557df24[$_44af9f79ea06 - 1] == '.' || $_ce467557df24[$_44af9f79ea06 + 1] == '.') && ($_ce467557df24[$_44af9f79ea06 - 1][0] == T_LNUMBER || $_ce467557df24[$_44af9f79ea06 + 1][0] == T_LNUMBER)) $_7847d9353cff .= " ";
                            $_f7220aea6cbf = FALSE;
                        } else if ($_69e78850f7b6 == T_START_HEREDOC) {
                            $_7847d9353cff .= "<<<S\n";
                            $_f7220aea6cbf = FALSE;
                            $_7a6ee10567a9 = TRUE;
                        } else if ($_69e78850f7b6 == T_END_HEREDOC) {
                            $_7847d9353cff .= "S;";
                            $_f7220aea6cbf = TRUE;
                            $_7a6ee10567a9 = FALSE;
                            for ($_d87f4c1f5462 = $_44af9f79ea06 + 1; $_d87f4c1f5462 < $_40d1e3c43b78; ++$_d87f4c1f5462) {
                                if (is_string($_ce467557df24[$_d87f4c1f5462]) && $_ce467557df24[$_d87f4c1f5462] == ";") {
                                    $_44af9f79ea06 = $_d87f4c1f5462;
                                    break;
                                } else if ($_ce467557df24[$_d87f4c1f5462][0] == T_CLOSE_TAG) break;
                            }
                        } else if ($_69e78850f7b6 == T_COMMENT || $_69e78850f7b6 == T_DOC_COMMENT) {
                            $_f7220aea6cbf = TRUE;
                        } else {
                            $_7847d9353cff .= $_250a58058e85;
                            $_f7220aea6cbf = FALSE;
                        }
                    }
                    $_ef0328743c06 = "";
                } else {
                    $_7847d9353cff .= $_5572c1da585c;
                    $_ef0328743c06 = $_5572c1da585c;
                    $_f7220aea6cbf = TRUE;
                }
            }
            return $_7847d9353cff;
        }

        private static function strshuffle($_6e4b8fdcc8be)
        {
            $_8d2d7939f6cb = strlen($_6e4b8fdcc8be) - 1;
            for ($_44af9f79ea06 = 0; $_44af9f79ea06 <= $_8d2d7939f6cb; ++$_44af9f79ea06) {
                $_203a4ef6ac3d = rand(0, $_8d2d7939f6cb);
                if ($_203a4ef6ac3d != $_44af9f79ea06) {
                    $_16d7e9582425 = $_6e4b8fdcc8be[$_44af9f79ea06];
                    $_6e4b8fdcc8be[$_44af9f79ea06] = $_6e4b8fdcc8be[$_203a4ef6ac3d];
                    $_6e4b8fdcc8be[$_203a4ef6ac3d] = $_16d7e9582425;
                }
            }
            return $_6e4b8fdcc8be;
        }

        private static function arrayshuffle(&$_b8ba8f88521b)
        {
            $_8d2d7939f6cb = count($_b8ba8f88521b) - 1;
            for ($_44af9f79ea06 = 0; $_44af9f79ea06 <= $_8d2d7939f6cb; ++$_44af9f79ea06) {
                $_203a4ef6ac3d = rand(0, $_8d2d7939f6cb);
                if ($_203a4ef6ac3d != $_44af9f79ea06) {
                    $_16d7e9582425 = $_b8ba8f88521b[$_44af9f79ea06];
                    $_b8ba8f88521b[$_44af9f79ea06] = $_b8ba8f88521b[$_203a4ef6ac3d];
                    $_b8ba8f88521b[$_203a4ef6ac3d] = $_16d7e9582425;
                }
            }
            return $_b8ba8f88521b;
        }

        private static function base64encode($_6e4b8fdcc8be)
        {
            $_12aaff6b3248 = self::strshuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRSTUVWXYZ+/=");
            $_db9743bd099b = '';
            for ($_44af9f79ea06 = 0; isset($_6e4b8fdcc8be[$_44af9f79ea06]); $_44af9f79ea06 += 3) {
                $_b5805c07f8f5 = isset($_6e4b8fdcc8be[$_44af9f79ea06 + 1]);
                $_4b54fd0a6712 = ord($_6e4b8fdcc8be[$_44af9f79ea06]);
                $_31cf078581ad = $_b5805c07f8f5 ? ord($_6e4b8fdcc8be[$_44af9f79ea06 + 1]) : 0;
                $_db9743bd099b .= $_12aaff6b3248[$_4b54fd0a6712 >> 2];
                $_db9743bd099b .= $_12aaff6b3248[(($_4b54fd0a6712 & 3) << 4) | ($_31cf078581ad >> 4)];
                if ($_b5805c07f8f5) {
                    $_5baf9fa0aef8 = isset($_6e4b8fdcc8be[$_44af9f79ea06 + 2]);
                    $_c63663215036 = $_5baf9fa0aef8 ? ord($_6e4b8fdcc8be[$_44af9f79ea06 + 2]) : 0;
                    $_db9743bd099b .= $_12aaff6b3248[(($_31cf078581ad & 15) << 2) | ($_c63663215036 >> 6)];
                    if ($_5baf9fa0aef8) $_db9743bd099b .= $_12aaff6b3248[$_c63663215036 & 63]; else $_db9743bd099b .= 'Q';
                } else $_db9743bd099b .= 'QQ';
            }
            return $_db9743bd099b;
        }

        private static function encode($_6e4b8fdcc8be, $_d2ce9730d406, $_974584786d5a, $_d9d51056bc94 = FALSE)
        {
            srand($_d2ce9730d406 ^ $_974584786d5a & 0x7fffffff);
            $_d2ce9730d406 ^= rand();
            $_974584786d5a ^= rand();
            if ($_d9d51056bc94) {
                if (strlen($_6e4b8fdcc8be) < 2) return $_6e4b8fdcc8be;
                $_a62b34eb6df6 = $_d2ce9730d406 ^ $_974584786d5a ^ rand();
                $_6e4b8fdcc8be = array_values(unpack('C*', $_6e4b8fdcc8be));
                $_203a4ef6ac3d = [rand(0, 0xff), rand(0, 0xff), rand(0, 0xff), rand(0, 0xff)];
                $_6e4b8fdcc8be[0] ^= $_203a4ef6ac3d[3];
                $_44af9f79ea06 = count($_6e4b8fdcc8be) - 1;
                $_6e4b8fdcc8be[0] = ($_6e4b8fdcc8be[0] - (($_a62b34eb6df6 >> ($_44af9f79ea06 & 63)) & 0xff) + 0x100 & 0xff) ^ $_6e4b8fdcc8be[$_44af9f79ea06];
                for (--$_44af9f79ea06; $_44af9f79ea06 >= 0; --$_44af9f79ea06) $_6e4b8fdcc8be[$_44af9f79ea06 + 1] = ($_6e4b8fdcc8be[$_44af9f79ea06 + 1] - (($_a62b34eb6df6 >> ($_44af9f79ea06 & 63)) & 0xff) + 0x100 & 0xff) ^ $_6e4b8fdcc8be[$_44af9f79ea06];
                $_6e4b8fdcc8be[0] ^= $_203a4ef6ac3d[2];
                $_44af9f79ea06 = count($_6e4b8fdcc8be) - 1;
                $_6e4b8fdcc8be[0] = ($_6e4b8fdcc8be[0] ^ (($_974584786d5a >> ($_44af9f79ea06 & 63)) & 0xff)) - $_6e4b8fdcc8be[$_44af9f79ea06] + 0x100 & 0xff;
                for (--$_44af9f79ea06; $_44af9f79ea06 >= 0; --$_44af9f79ea06) $_6e4b8fdcc8be[$_44af9f79ea06 + 1] = ($_6e4b8fdcc8be[$_44af9f79ea06 + 1] ^ (($_974584786d5a >> ($_44af9f79ea06 & 63)) & 0xff)) - $_6e4b8fdcc8be[$_44af9f79ea06] + 0x100 & 0xff;
                $_6e4b8fdcc8be[0] ^= $_203a4ef6ac3d[1];
                $_44af9f79ea06 = count($_6e4b8fdcc8be) - 1;
                $_6e4b8fdcc8be[0] = ($_6e4b8fdcc8be[0] ^ (($_d2ce9730d406 >> ($_44af9f79ea06 & 63)) & 0xff)) - $_6e4b8fdcc8be[$_44af9f79ea06] + 0x100 & 0xff;
                for (--$_44af9f79ea06; $_44af9f79ea06 >= 0; --$_44af9f79ea06) $_6e4b8fdcc8be[$_44af9f79ea06 + 1] = ($_6e4b8fdcc8be[$_44af9f79ea06 + 1] ^ (($_d2ce9730d406 >> ($_44af9f79ea06 & 63)) & 0xff)) - $_6e4b8fdcc8be[$_44af9f79ea06] + 0x100 & 0xff;
                $_6e4b8fdcc8be[0] ^= $_203a4ef6ac3d[0];
                array_unshift($_6e4b8fdcc8be, 'C*');
                return call_user_func_array('pack', $_6e4b8fdcc8be);
            }
            $_3ed83ea0f086 = range(0, 0xff);
            $_d6658df05cd0 = range(0, 0xff);
            self::arrayshuffle($_3ed83ea0f086);
            self::arrayshuffle($_d6658df05cd0);
            $_8637bcb1d969 = array_combine($_3ed83ea0f086, array_keys($_3ed83ea0f086));
            $_80b29472d2ff = array_combine($_d6658df05cd0, array_keys($_d6658df05cd0));
            $_8d2d7939f6cb = strlen($_6e4b8fdcc8be);
            $_44d3954db149 = ceil(pow($_8d2d7939f6cb, 5 / 11));
            $_a62b34eb6df6 = (int)($_d2ce9730d406 + $_974584786d5a) & 0xffffffff;
            $_ca30218261a8 = ($_d9d51056bc94 ? -1 : (($_a62b34eb6df6 & 0x3) ^ (($_a62b34eb6df6 >> 8) & 0x3) ^ ($_974584786d5a & 0x3)) + 0x1a) + floor(log($_8d2d7939f6cb + 2, 2) - 1);
            $_a62b34eb6df6 = ($_a62b34eb6df6 & 0xff) ^ ($_d2ce9730d406 & 0xff) ^ (($_a62b34eb6df6 >> 16) & 0xff) ^ 1;
            if ($_8d2d7939f6cb == 0) return '';
            if ($_8d2d7939f6cb == 1) return chr($_80b29472d2ff[$_8637bcb1d969[ord($_6e4b8fdcc8be) ^ $_a62b34eb6df6] ^ $_a62b34eb6df6] ^ $_a62b34eb6df6);
            $_6e4b8fdcc8be = array_values(unpack('C*', $_6e4b8fdcc8be));
            $_c2a49abf23ee = $_44d3954db149 * 4;
            for ($_e4d131348e9b = $_ca30218261a8 - 1; $_e4d131348e9b >= 0; --$_e4d131348e9b) {
                srand(($_d2ce9730d406 ^ $_974584786d5a) + ($_e4d131348e9b * 12329) & 0x7fffffff);
                $_7755dc3006fd = [];
                for ($_44af9f79ea06 = 1; $_44af9f79ea06 <= $_c2a49abf23ee; $_44af9f79ea06 += 4) {
                    $_7755dc3006fd[$_c2a49abf23ee - $_44af9f79ea06] = rand(0, $_8d2d7939f6cb - 1);
                    $_7755dc3006fd[$_c2a49abf23ee - $_44af9f79ea06 - 1] = rand(0, $_8d2d7939f6cb - 2);
                    $_7755dc3006fd[$_c2a49abf23ee - $_44af9f79ea06 - 2] = rand(0, $_8d2d7939f6cb - 2);
                    $_7755dc3006fd[$_c2a49abf23ee - $_44af9f79ea06 - 3] = rand(0, $_8d2d7939f6cb - 2);
                }
                for ($_44af9f79ea06 = 0; $_44af9f79ea06 < $_44d3954db149; ++$_44af9f79ea06) {
                    $_f6090e078f91 = $_7755dc3006fd[$_44af9f79ea06 * 4 + 3];
                    $_e70220c21bba = $_7755dc3006fd[$_44af9f79ea06 * 4 + 2];
                    $_ea8658d23504 = $_7755dc3006fd[$_44af9f79ea06 * 4 + 1];
                    $_8ad1291db0a7 = $_7755dc3006fd[$_44af9f79ea06 * 4 + 0];
                    if ($_e70220c21bba >= $_f6090e078f91) ++$_e70220c21bba;
                    if ($_ea8658d23504 >= $_f6090e078f91) ++$_ea8658d23504;
                    if ($_8ad1291db0a7 >= $_f6090e078f91) ++$_8ad1291db0a7;
                    $_6e4b8fdcc8be[$_ea8658d23504] = $_8637bcb1d969[$_6e4b8fdcc8be[$_ea8658d23504] - $_6e4b8fdcc8be[$_f6090e078f91] + 0x100 & 0xff] ^ $_6e4b8fdcc8be[$_f6090e078f91] ^ $_a62b34eb6df6;
                    $_6e4b8fdcc8be[$_8ad1291db0a7] = $_80b29472d2ff[$_6e4b8fdcc8be[$_8ad1291db0a7] - $_6e4b8fdcc8be[$_f6090e078f91] + 0x100 & 0xff] ^ $_6e4b8fdcc8be[$_f6090e078f91] ^ $_a62b34eb6df6;
                    $_6e4b8fdcc8be[$_e70220c21bba] = $_8637bcb1d969[$_6e4b8fdcc8be[$_e70220c21bba] - $_6e4b8fdcc8be[$_f6090e078f91] + 0x100 & 0xff] ^ $_6e4b8fdcc8be[$_f6090e078f91] ^ $_a62b34eb6df6;
                    $_6e4b8fdcc8be[$_f6090e078f91] = $_80b29472d2ff[$_8637bcb1d969[$_6e4b8fdcc8be[$_f6090e078f91] ^ $_d6658df05cd0[$_6e4b8fdcc8be[$_e70220c21bba]]] - $_6e4b8fdcc8be[$_ea8658d23504] + 0x100 & 0xff] ^ $_6e4b8fdcc8be[$_8ad1291db0a7];
                    $_6e4b8fdcc8be[$_f6090e078f91] = $_80b29472d2ff[$_6e4b8fdcc8be[$_f6090e078f91] - $_6e4b8fdcc8be[$_e70220c21bba] + 0x100 & 0xff] - $_6e4b8fdcc8be[$_e70220c21bba] + 0x100 & 0xff;
                    $_6e4b8fdcc8be[$_f6090e078f91] = $_8637bcb1d969[$_6e4b8fdcc8be[$_f6090e078f91] - $_6e4b8fdcc8be[$_8ad1291db0a7] + 0x100 & 0xff] ^ $_6e4b8fdcc8be[$_8ad1291db0a7];
                    $_6e4b8fdcc8be[$_f6090e078f91] ^= $_a62b34eb6df6;
                    $_6e4b8fdcc8be[$_f6090e078f91] = $_80b29472d2ff[$_6e4b8fdcc8be[$_f6090e078f91] - $_6e4b8fdcc8be[$_ea8658d23504] + 0x100 & 0xff] ^ $_6e4b8fdcc8be[$_e70220c21bba];
                    $_6e4b8fdcc8be[$_f6090e078f91] = $_8637bcb1d969[$_6e4b8fdcc8be[$_f6090e078f91] ^ $_6e4b8fdcc8be[$_e70220c21bba]] - $_6e4b8fdcc8be[$_8ad1291db0a7] + 0x100 & 0xff;
                    $_6e4b8fdcc8be[$_f6090e078f91] = $_80b29472d2ff[$_6e4b8fdcc8be[$_f6090e078f91] ^ $_6e4b8fdcc8be[$_8ad1291db0a7]] - $_6e4b8fdcc8be[$_ea8658d23504] + 0x100 & 0xff;
                }
            }
            array_unshift($_6e4b8fdcc8be, 'C*');
            return call_user_func_array('pack', $_6e4b8fdcc8be);
        }

        private static function inc($_23bf89ec40b6, $_d2ce9730d406, $_974584786d5a, $_d9d51056bc94 = FALSE)
        {
            AlomEncoder::mt_prng_reset();
            AlomEncoder::mt_prng_store($_d2ce9730d406 ^ $_974584786d5a ^ rand());
            $_23bf89ec40b6 .= pack('V2', rand() ^ $_d2ce9730d406, rand() ^ $_974584786d5a);
            srand($_d2ce9730d406 ^ $_974584786d5a & 0x7fffffff);
            $_23bf89ec40b6 = self::encode($_23bf89ec40b6, rand() ^ $_974584786d5a, rand() ^ $_d2ce9730d406, $_d9d51056bc94);
            return $_23bf89ec40b6;
        }

        private static function encodew($_6e4b8fdcc8be, $_d2ce9730d406, $_974584786d5a)
        {
            static $_3ed83ea0f086, $_d6658df05cd0, $_8637bcb1d969, $_80b29472d2ff;
            if ($_6e4b8fdcc8be === TRUE) {
                $_3ed83ea0f086 = range(0, 0xff);
                self::arrayshuffle($_3ed83ea0f086);
                $_d6658df05cd0 = range(0, 0xff);
                self::arrayshuffle($_d6658df05cd0);
                $_8637bcb1d969 = array_combine($_3ed83ea0f086, array_keys($_3ed83ea0f086));
                $_80b29472d2ff = array_combine($_d6658df05cd0, array_keys($_d6658df05cd0));
                return;
            }
            $_d2ce9730d406 ^= 0x392cc908;
            $_974584786d5a ^= 0x33541515;
            $_d2ce9730d406 ^= $_3ed83ea0f086[$_d2ce9730d406 & 0xff] ^ 0xafb655d5;
            $_974584786d5a ^= $_d6658df05cd0[$_974584786d5a & 0xff] ^ 0x9cd52c07;
            $_8d2d7939f6cb = strlen($_6e4b8fdcc8be);
            $_a62b34eb6df6 = (int)($_d2ce9730d406 + $_974584786d5a) & 0xffffffff;
            $_ca30218261a8 = (($_a62b34eb6df6 & 0x5) ^ (($_a62b34eb6df6 >> 8) & 0x5) ^ ($_974584786d5a & 0x5)) + 0xa + floor(log($_8d2d7939f6cb + 2, 2) - 1);
            $_a62b34eb6df6 = ($_a62b34eb6df6 & 0xff) ^ ($_d2ce9730d406 & 0xff) ^ (($_a62b34eb6df6 >> 16) & 0xff);
            if ($_8d2d7939f6cb == 0) return '';
            if ($_8d2d7939f6cb == 1) return chr($_80b29472d2ff[$_8637bcb1d969[ord($_6e4b8fdcc8be) ^ $_a62b34eb6df6] ^ $_a62b34eb6df6] ^ $_a62b34eb6df6);
            $_de52ea136b8b = $_8d2d7939f6cb - 1;
            $_6e4b8fdcc8be = array_values(unpack('C*', $_6e4b8fdcc8be));
            for ($_e4d131348e9b = $_ca30218261a8 - 1; $_e4d131348e9b >= 0; --$_e4d131348e9b) {
                for ($_44af9f79ea06 = $_8d2d7939f6cb - 1; $_44af9f79ea06 >= 0; --$_44af9f79ea06) {
                    $_f6090e078f91 = (($_44af9f79ea06 * 0xf) % $_8d2d7939f6cb + 0x37d973 + $_e4d131348e9b) % $_8d2d7939f6cb;
                    $_e70220c21bba = (($_44af9f79ea06 * 0xb) % $_de52ea136b8b + ($_f6090e078f91 * 0x9) % $_de52ea136b8b + 0x2e1081) % $_de52ea136b8b;
                    $_ea8658d23504 = (($_44af9f79ea06 * 0x7) % $_de52ea136b8b + ($_e70220c21bba * 0x9) % $_de52ea136b8b + 0x105977) % $_de52ea136b8b;
                    $_8ad1291db0a7 = (($_44af9f79ea06 * 0x3) % $_de52ea136b8b + ($_ea8658d23504 * 0x1) % $_de52ea136b8b + 0x17d10f) % $_de52ea136b8b;
                    if ($_e70220c21bba >= $_f6090e078f91) ++$_e70220c21bba;
                    if ($_ea8658d23504 >= $_f6090e078f91) ++$_ea8658d23504;
                    if ($_8ad1291db0a7 >= $_f6090e078f91) ++$_8ad1291db0a7;
                    $_6e4b8fdcc8be[$_ea8658d23504] = $_8637bcb1d969[$_6e4b8fdcc8be[$_ea8658d23504] - $_6e4b8fdcc8be[$_f6090e078f91] + 0x100 & 0xff] ^ $_6e4b8fdcc8be[$_f6090e078f91] ^ $_a62b34eb6df6;
                    $_6e4b8fdcc8be[$_8ad1291db0a7] = $_80b29472d2ff[$_6e4b8fdcc8be[$_8ad1291db0a7] - $_6e4b8fdcc8be[$_f6090e078f91] + 0x100 & 0xff] ^ $_6e4b8fdcc8be[$_f6090e078f91] ^ $_a62b34eb6df6;
                    $_6e4b8fdcc8be[$_e70220c21bba] = $_8637bcb1d969[$_6e4b8fdcc8be[$_e70220c21bba] - $_6e4b8fdcc8be[$_f6090e078f91] + 0x100 & 0xff] ^ $_6e4b8fdcc8be[$_f6090e078f91] ^ $_a62b34eb6df6;
                    $_6e4b8fdcc8be[$_f6090e078f91] = $_80b29472d2ff[$_8637bcb1d969[$_6e4b8fdcc8be[$_f6090e078f91] ^ $_d6658df05cd0[$_6e4b8fdcc8be[$_e70220c21bba]]] - $_6e4b8fdcc8be[$_ea8658d23504] + 0x100 & 0xff] ^ $_6e4b8fdcc8be[$_8ad1291db0a7];
                    $_6e4b8fdcc8be[$_f6090e078f91] = $_80b29472d2ff[$_6e4b8fdcc8be[$_f6090e078f91] - $_6e4b8fdcc8be[$_e70220c21bba] + 0x100 & 0xff] - $_6e4b8fdcc8be[$_e70220c21bba] + 0x100 & 0xff;
                    $_6e4b8fdcc8be[$_f6090e078f91] = $_8637bcb1d969[$_6e4b8fdcc8be[$_f6090e078f91] - $_6e4b8fdcc8be[$_8ad1291db0a7] + 0x100 & 0xff] ^ $_6e4b8fdcc8be[$_8ad1291db0a7];
                    $_6e4b8fdcc8be[$_f6090e078f91] ^= $_a62b34eb6df6;
                    $_6e4b8fdcc8be[$_f6090e078f91] = $_80b29472d2ff[$_6e4b8fdcc8be[$_f6090e078f91] - $_6e4b8fdcc8be[$_ea8658d23504] + 0x100 & 0xff] ^ $_6e4b8fdcc8be[$_e70220c21bba];
                    $_6e4b8fdcc8be[$_f6090e078f91] = $_8637bcb1d969[$_6e4b8fdcc8be[$_f6090e078f91] ^ $_6e4b8fdcc8be[$_e70220c21bba]] - $_6e4b8fdcc8be[$_8ad1291db0a7] + 0x100 & 0xff;
                    $_6e4b8fdcc8be[$_f6090e078f91] = $_80b29472d2ff[$_6e4b8fdcc8be[$_f6090e078f91] ^ $_6e4b8fdcc8be[$_8ad1291db0a7]] - $_6e4b8fdcc8be[$_ea8658d23504] + 0x100 & 0xff;
                }
            }
            array_unshift($_6e4b8fdcc8be, 'C*');
            return call_user_func_array('pack', $_6e4b8fdcc8be);
        }

        private static function incw($_23bf89ec40b6, $_d2ce9730d406, $_974584786d5a)
        {
            $_23bf89ec40b6 .= pack('V', $_d2ce9730d406 ^ $_974584786d5a ^ 0x72f70fec);
            $_23bf89ec40b6 = self::encodew($_23bf89ec40b6, $_974584786d5a ^ 0x47b426f6, $_d2ce9730d406 ^ 0xaad9d133);
            return $_23bf89ec40b6;
        }

        private static function crc32table(&$_16d7e9582425, &$_f6cbc2e672d5, &$_220bad5a564a = NULL)
        {
            static $_35d7dd6928e4, $_3ed83ea0f086, $_d6658df05cd0, $_d48f13488eff, $_89d9e65212a8, $_8637bcb1d969, $_80b29472d2ff, $_4774a8571a87, $_a8d88d9716c1;
            if (!isset($_35d7dd6928e4)) {
                $_35d7dd6928e4 = [
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
                $_3ed83ea0f086 = $_d6658df05cd0 = $_d48f13488eff = $_89d9e65212a8 = [];
                foreach ($_35d7dd6928e4 as $_44af9f79ea06 => $_4d693db07b39) {
                    $_3ed83ea0f086[$_44af9f79ea06] = $_4d693db07b39 & 0xff;
                    $_d6658df05cd0[$_44af9f79ea06] = ($_4d693db07b39 >> 8) & 0xff;
                    $_d48f13488eff[$_44af9f79ea06] = ($_4d693db07b39 >> 16) & 0xff;
                    $_89d9e65212a8[$_44af9f79ea06] = ($_4d693db07b39 >> 24) & 0xff;
                }
                $_8637bcb1d969 = array_combine($_3ed83ea0f086, array_keys($_3ed83ea0f086));
                $_80b29472d2ff = array_combine($_d6658df05cd0, array_keys($_d6658df05cd0));
                $_4774a8571a87 = array_combine($_d48f13488eff, array_keys($_d48f13488eff));
                $_a8d88d9716c1 = array_combine($_89d9e65212a8, array_keys($_89d9e65212a8));
            }
            $_220bad5a564a = $_35d7dd6928e4;
            $_16d7e9582425 = [$_3ed83ea0f086, $_d6658df05cd0, $_d48f13488eff, $_89d9e65212a8];
            $_f6cbc2e672d5 = [$_8637bcb1d969, $_80b29472d2ff, $_4774a8571a87, $_a8d88d9716c1];
        }

        private static function uncrc32($_a3621bb833f4, $_90812c0999bc = 0)
        {
            self::crc32table($_16d7e9582425, $_f6cbc2e672d5);
            [$_3ed83ea0f086, $_d6658df05cd0, $_d48f13488eff, $_89d9e65212a8] = $_16d7e9582425;
            [$_8637bcb1d969, $_80b29472d2ff, $_4774a8571a87, $_a8d88d9716c1] = $_f6cbc2e672d5;
            unset($_16d7e9582425, $_f6cbc2e672d5);
            $_662deee426a3 = $_a3621bb833f4;
            $_90812c0999bc ^= 0xffffffff;
            $_a3621bb833f4 ^= 0xffffffff;
            $_3299f044233b = $_90812c0999bc & 0xff;
            $_da756242ac1d = ($_90812c0999bc >> 8) & 0xff;
            $_303979fe02c5 = ($_90812c0999bc >> 16) & 0xff;
            $_5bd7b44f9a27 = ($_90812c0999bc >> 24) & 0xff;
            $_e33a57bc566c = $_a3621bb833f4 & 0xff;
            $_718aa4bb3fdf = ($_a3621bb833f4 >> 8) & 0xff;
            $_410758d34564 = ($_a3621bb833f4 >> 16) & 0xff;
            $_670a6c88f55a = ($_a3621bb833f4 >> 24) & 0xff;
            $_f828454cafba = $_a8d88d9716c1[$_670a6c88f55a];
            $_797cb60f407f = $_a8d88d9716c1[$_410758d34564 ^ $_d48f13488eff[$_f828454cafba]];
            $_ffc81c726284 = $_a8d88d9716c1[$_718aa4bb3fdf ^ $_d6658df05cd0[$_f828454cafba] ^ $_d48f13488eff[$_797cb60f407f]];
            $_2501124487f4 = $_a8d88d9716c1[$_e33a57bc566c ^ $_3ed83ea0f086[$_f828454cafba] ^ $_d6658df05cd0[$_797cb60f407f] ^ $_d48f13488eff[$_ffc81c726284]];
            $_0a385214c241 = $_2501124487f4 ^ $_3299f044233b;
            $_94fb4ecd45ef = $_ffc81c726284 ^ $_3ed83ea0f086[$_2501124487f4] ^ $_da756242ac1d;
            $_a114eadbc2b2 = $_797cb60f407f ^ $_3ed83ea0f086[$_ffc81c726284] ^ $_d6658df05cd0[$_2501124487f4] ^ $_303979fe02c5;
            $_e93a6346645b = $_f828454cafba ^ $_3ed83ea0f086[$_797cb60f407f] ^ $_d6658df05cd0[$_ffc81c726284] ^ $_d48f13488eff[$_2501124487f4] ^ $_5bd7b44f9a27;
            $_203a4ef6ac3d = pack('C4', $_0a385214c241, $_94fb4ecd45ef, $_a114eadbc2b2, $_e93a6346645b);
            return $_203a4ef6ac3d;
        }

        private static function uncrc32in($_09a7ca0f5754, $_88d3ea2f3365, $_a3621bb833f4, $_90812c0999bc = 0)
        {
            self::crc32table($_16d7e9582425, $_f6cbc2e672d5, $_220bad5a564a);
            $_90812c0999bc ^= 0xffffffff;
            $_a3621bb833f4 ^= 0xffffffff;
            for ($_44af9f79ea06 = 0; isset($_09a7ca0f5754[$_44af9f79ea06]); ++$_44af9f79ea06) {
                $_35d7dd6928e4 = $_220bad5a564a[($_90812c0999bc ^ ord($_09a7ca0f5754[$_44af9f79ea06])) & 0xff];
                $_90812c0999bc = ($_35d7dd6928e4 ^ (($_90812c0999bc >> 8) & 0x00ffffff));
            }
            for ($_44af9f79ea06 = strlen($_88d3ea2f3365) - 1; $_44af9f79ea06 >= 0; --$_44af9f79ea06) {
                $_ae74968aafde = $_f6cbc2e672d5[3][($_a3621bb833f4 >> 24) & 0xff];
                $_a3621bb833f4 = (($_ae74968aafde ^ ord($_88d3ea2f3365[$_44af9f79ea06])) | (($_a3621bb833f4 ^ $_220bad5a564a[$_ae74968aafde]) << 8));
            }
            return self::uncrc32($_a3621bb833f4 ^ 0xffffffff, $_90812c0999bc ^ 0xffffffff);
        }

        public static function mt_prng_reset()
        {
            self::$_bd534020b8b7 ^= rand();
            return srand(self::$_bd534020b8b7);
        }

        public static function mt_prng_store($_fb3a29fe9bdf)
        {
            self::$_bd534020b8b7 ^= rand() ^ $_fb3a29fe9bdf;
            self::$_bd534020b8b7 = (int)(self::$_bd534020b8b7 + 7012329) & 0xffffffff;
            self::$_bd534020b8b7 ^= 0x23958cde;
            return srand($_fb3a29fe9bdf);
        }

        private static function readl($_ce467557df24, $_8bd220e50993, $_76ea69771708, &$_44af9f79ea06)
        {
            $_23bf89ec40b6 = '';
            $_f6cbc2e672d5 = 0;
            do {
                if (is_array($_ce467557df24[$_44af9f79ea06])) {
                    $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06][1];
                    if (($_ce467557df24[$_44af9f79ea06][0] == T_CURLY_OPEN || $_ce467557df24[$_44af9f79ea06][0] == T_DOLLAR_OPEN_CURLY_BRACES) && $_8bd220e50993 == '{') ++$_f6cbc2e672d5;
                } else {
                    $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06];
                    if ($_ce467557df24[$_44af9f79ea06] == $_8bd220e50993) ++$_f6cbc2e672d5; else if ($_ce467557df24[$_44af9f79ea06] == $_76ea69771708) --$_f6cbc2e672d5;
                }
            } while (isset($_ce467557df24[++$_44af9f79ea06]) && $_f6cbc2e672d5 != 0);
            --$_44af9f79ea06;
            return $_23bf89ec40b6;
        }

        private static function readr($_ce467557df24, $_8bd220e50993, $_76ea69771708, $_44af9f79ea06, &$_d87f4c1f5462, $_12e5210f9506 = FALSE)
        {
            $_23bf89ec40b6 = '';
            $_f6cbc2e672d5 = 0;
            do {
                if (is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462])) {
                    $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][1] . $_23bf89ec40b6;
                    if (($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][0] == T_CURLY_OPEN || $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][0] == T_DOLLAR_OPEN_CURLY_BRACES) && $_8bd220e50993 == '{') --$_f6cbc2e672d5;
                } else {
                    if ($_12e5210f9506 && $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] == ';') return FALSE;
                    $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] . $_23bf89ec40b6;
                    if ($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] == $_76ea69771708) ++$_f6cbc2e672d5; else if ($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] == $_8bd220e50993) --$_f6cbc2e672d5;
                }
                ++$_d87f4c1f5462;
            } while ($_44af9f79ea06 >= $_d87f4c1f5462 && $_f6cbc2e672d5 != 0);
            --$_d87f4c1f5462;
            if ($_12e5210f9506 && $_23bf89ec40b6[0] != '{') return FALSE;
            return $_23bf89ec40b6;
        }

        private static function reads($_ce467557df24, &$_44af9f79ea06)
        {
            $_23bf89ec40b6 = '';
            for (; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (in_array($_ce467557df24[$_44af9f79ea06], [
                ')',
                ']',
                '}',
                ',',
                ';',
            ])) break; else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_CLOSE_TAG) break;
            else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_START_HEREDOC) {
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                for (; isset($_ce467557df24[$_44af9f79ea06]) && (!is_array($_ce467557df24[$_44af9f79ea06]) || $_ce467557df24[$_44af9f79ea06][0] != T_END_HEREDOC); ++$_44af9f79ea06) $_23bf89ec40b6 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06][1];
            } else if (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [T_WHILE, T_FOR, T_IF, T_ELSEIF, T_ELSE, T_FOREACH, T_DECLARE])) {
                for (; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                        T_WHILE,
                        T_FOR,
                        T_FOREACH,
                        T_DECLARE,
                    ])) {
                    $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                    if ($_ce467557df24[$_44af9f79ea06] == '(') {
                        $_23bf89ec40b6 .= self::readl($_ce467557df24, '(', ')', $_44af9f79ea06);
                        ++$_44af9f79ea06;
                        if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                        if ($_ce467557df24[$_44af9f79ea06] == '{') {
                            $_23bf89ec40b6 .= self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                            ++$_44af9f79ea06;
                            break;
                        }
                    }
                    --$_44af9f79ea06;
                } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_IF) {
                    while (TRUE) {
                        $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                        if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                        if ($_ce467557df24[$_44af9f79ea06] == '(') {
                            $_23bf89ec40b6 .= self::readl($_ce467557df24, '(', ')', $_44af9f79ea06);
                            ++$_44af9f79ea06;
                        }
                        if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                        if ($_ce467557df24[$_44af9f79ea06] == '{') {
                            $_23bf89ec40b6 .= self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                            ++$_44af9f79ea06;
                        } else {
                            $_23bf89ec40b6 .= self::reads($_ce467557df24, $_44af9f79ea06);
                            if (isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] == ';') $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++];
                        }
                        if (isset($_ce467557df24[$_44af9f79ea06]) && is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                        if (!isset($_ce467557df24[$_44af9f79ea06])) break;
                        if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_ELSEIF) continue; else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_ELSE) {
                            $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                            if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                            if ($_ce467557df24[$_44af9f79ea06] == '{') {
                                $_23bf89ec40b6 .= self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                                ++$_44af9f79ea06;
                            } else {
                                $_23bf89ec40b6 .= self::reads($_ce467557df24, $_44af9f79ea06);
                                if (isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] == ';') $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++];
                            }
                            break;
                        } else break;
                    }
                    break;
                }
                if (isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] == ';') $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++];
                break;
            } else if (is_array($_ce467557df24[$_44af9f79ea06])) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06][1];
            else if ($_ce467557df24[$_44af9f79ea06] == '(') $_23bf89ec40b6 .= self::readl($_ce467557df24, '(', ')', $_44af9f79ea06);
            else if ($_ce467557df24[$_44af9f79ea06] == '[') $_23bf89ec40b6 .= self::readl($_ce467557df24, '[', ']', $_44af9f79ea06);
            else if ($_ce467557df24[$_44af9f79ea06] == '{') $_23bf89ec40b6 .= self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
            else if ($_ce467557df24[$_44af9f79ea06] == '"') {
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++];
                for (; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '"'; ++$_44af9f79ea06) $_23bf89ec40b6 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06];
            } else if ($_ce467557df24[$_44af9f79ea06] == '`') {
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++];
                for (; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '`'; ++$_44af9f79ea06) $_23bf89ec40b6 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06];
            } else $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06];
            return $_23bf89ec40b6;
        }

        private static function readsl($_ce467557df24, &$_44af9f79ea06, $_8251ec0e732c = FALSE)
        {
            $_23bf89ec40b6 = '';
            $_9de2c054a9f2 = $_8251ec0e732c ? [')', ']', '}', ';'] : [')', ']', '}', ',', ';'];
            for (++$_44af9f79ea06; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (in_array($_ce467557df24[$_44af9f79ea06], $_9de2c054a9f2)) break; else if ($_ce467557df24[$_44af9f79ea06] == ',') {
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++];
                if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                --$_44af9f79ea06;
            } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_CLOSE_TAG) break;
            else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_START_HEREDOC) {
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                for (; isset($_ce467557df24[$_44af9f79ea06]) && (!is_array($_ce467557df24[$_44af9f79ea06]) || $_ce467557df24[$_44af9f79ea06][0] != T_END_HEREDOC); ++$_44af9f79ea06) $_23bf89ec40b6 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06][1];
            } else if (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
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
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06][1];
            } else if (is_array($_ce467557df24[$_44af9f79ea06])) break;
            else if ($_ce467557df24[$_44af9f79ea06] == '(') $_23bf89ec40b6 .= self::readl($_ce467557df24, '(', ')', $_44af9f79ea06);
            else if ($_ce467557df24[$_44af9f79ea06] == '[') $_23bf89ec40b6 .= self::readl($_ce467557df24, '[', ']', $_44af9f79ea06);
            else if ($_ce467557df24[$_44af9f79ea06] == '{') $_23bf89ec40b6 .= self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
            else if ($_ce467557df24[$_44af9f79ea06] == '"') {
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++];
                for (; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '"'; ++$_44af9f79ea06) $_23bf89ec40b6 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06];
            } else if ($_ce467557df24[$_44af9f79ea06] == '`') {
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++];
                for (; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '`'; ++$_44af9f79ea06) $_23bf89ec40b6 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
                $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06];
            } else if ($_ce467557df24[$_44af9f79ea06] == '$') $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06];
            else if (in_array($_ce467557df24[$_44af9f79ea06], ['?', ':', '!', '~', '<', '>', '+', '-', '*', '/', '%', '.'])) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06];
            else break;
            --$_44af9f79ea06;
            return $_23bf89ec40b6;
        }

        private static function readsr($_ce467557df24, $_44af9f79ea06)
        {
            $_23bf89ec40b6 = '';
            $_d87f4c1f5462 = 1;
            if ($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][0] == T_WHITESPACE) $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06 - ($_d87f4c1f5462++)][1] . $_23bf89ec40b6;
            for (; $_44af9f79ea06 >= $_d87f4c1f5462; ++$_d87f4c1f5462) {
                if (in_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462], ['(', '[', '{', ',', ';'])) break;
                if (isset($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462 + 3]) && is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462 + 1]) && $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462 + 1][0] == T_WHITESPACE) {
                    if (is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462 + 2]) && in_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462 + 2][0], [
                            T_STRING,
                            T_VARIABLE,
                            T_CONSTANT_ENCAPSED_STRING,
                            T_ARRAY,
                        ])) {
                        --$_d87f4c1f5462;
                        break;
                    } else if (in_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462 + 2], ['$', '"'])) {
                        --$_d87f4c1f5462;
                        break;
                    }
                }
                if (is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462])) {
                    if (in_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][0], [
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
                    ])) $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][1] . $_23bf89ec40b6; else if (is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) && $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][0] == T_END_HEREDOC) {
                        $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06 - ($_d87f4c1f5462++)] . $_23bf89ec40b6;
                        for (; $_44af9f79ea06 >= $_d87f4c1f5462 && (!is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) || $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][0] != T_START_HEREDOC); ++$_d87f4c1f5462) $_23bf89ec40b6 = (is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) ? $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][1] : $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) . $_23bf89ec40b6;
                        $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] . $_23bf89ec40b6;
                    } else break;
                } else if ($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] == '$') $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] . $_23bf89ec40b6;
                else if ($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] == ')') {
                    $_67cb949e5b90 = self::readr($_ce467557df24, '(', ')', $_44af9f79ea06, $_d87f4c1f5462);
                    if (is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462 - 1]) && in_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462 - 1][0], [
                            T_IF,
                            T_ELSEIF,
                            T_WHILE,
                            T_FOR,
                            T_DECLARE,
                            T_ARRAY,
                            T_FOREACH,
                        ])) {
                        ++$_d87f4c1f5462;
                        break;
                    }
                    $_23bf89ec40b6 = $_67cb949e5b90 . $_23bf89ec40b6;
                } else if ($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] == ']') $_23bf89ec40b6 = self::readr($_ce467557df24, '[', ']', $_44af9f79ea06, $_d87f4c1f5462) . $_23bf89ec40b6;
                else if ($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] == '}') {
                    $_67cb949e5b90 = self::readr($_ce467557df24, '{', '}', $_44af9f79ea06, $_d87f4c1f5462, TRUE);
                    if (!$_67cb949e5b90) {
                        ++$_d87f4c1f5462;
                        break;
                    }
                    $_23bf89ec40b6 = $_67cb949e5b90 . $_23bf89ec40b6;
                } else if ($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] == '"') {
                    $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06 - ($_d87f4c1f5462++)] . $_23bf89ec40b6;
                    for (; $_44af9f79ea06 >= $_d87f4c1f5462 && $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] != '"'; ++$_d87f4c1f5462) $_23bf89ec40b6 = (is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) ? $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][1] : $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) . $_23bf89ec40b6;
                    $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] . $_23bf89ec40b6;
                } else if ($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] == '`') {
                    $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06 - ($_d87f4c1f5462++)] . $_23bf89ec40b6;
                    for (; $_44af9f79ea06 >= $_d87f4c1f5462 && $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] != '`'; ++$_d87f4c1f5462) $_23bf89ec40b6 = (is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) ? $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][1] : $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) . $_23bf89ec40b6;
                    $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] . $_23bf89ec40b6;
                } else if (in_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462], [
                    '?',
                    ':',
                    '!',
                    '~',
                    '<',
                    '>',
                    '+',
                    '-',
                    '*',
                    '/',
                    '%',
                    '.',
                ])) $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462] . $_23bf89ec40b6;
                else break;
            }
            return ltrim($_23bf89ec40b6);
        }

        private static function readpe($_ce467557df24, &$_44af9f79ea06, $_8251ec0e732c = FALSE)
        {
            $_23bf89ec40b6 = '';
            if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
            if ($_ce467557df24[$_44af9f79ea06] == ';') {
                --$_44af9f79ea06;
                return $_23bf89ec40b6;
            }
            if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_CLOSE_TAG) {
                --$_44af9f79ea06;
                return $_23bf89ec40b6;
            }
            if ($_ce467557df24[$_44af9f79ea06] == '(') $_23bf89ec40b6 .= substr(self::readl($_ce467557df24, '(', ')', $_44af9f79ea06), 1, -1); else {
                --$_44af9f79ea06;
                $_23bf89ec40b6 .= self::readsl($_ce467557df24, $_44af9f79ea06, $_8251ec0e732c);
            }
            return $_23bf89ec40b6;
        }

        private static function reparse($_d5cbf76f6b55, &$_ce467557df24, &$_44af9f79ea06)
        {
            $_d87f4c1f5462 = $_44af9f79ea06;
            $_90812c0999bc = count($_ce467557df24);
            for (++$_44af9f79ea06; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) $_d5cbf76f6b55 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
            $_ce467557df24 = token_get_all($_d5cbf76f6b55);
            $_a3621bb833f4 = count($_ce467557df24);
            $_44af9f79ea06 = $_d87f4c1f5462 + $_a3621bb833f4 - $_90812c0999bc;
        }

        private static function reparseExtra(&$_d5cbf76f6b55, &$_ce467557df24, &$_44af9f79ea06, $_67b3418874aa, $_d88d4c12fcc4, $_a2d13a6e48d8 = 0)
        {
            ++$_67b3418874aa;
            ++$_44af9f79ea06;
            if ($_a2d13a6e48d8 !== 0) {
                $_62b3f98bf654 = array_slice(token_get_all("<?" . "php $_d88d4c12fcc4"), 1);
                $_ae2ed626c558 = count(token_get_all("<?" . "php " . substr($_d5cbf76f6b55, -$_a2d13a6e48d8))) - 1;
                $_236a6bd464ca = $_d5cbf76f6b55;
                $_d5cbf76f6b55 = substr($_d5cbf76f6b55, 0, -$_a2d13a6e48d8) . $_d88d4c12fcc4;
                $_ce467557df24 = array_merge(array_slice($_ce467557df24, 0, $_44af9f79ea06 - $_ae2ed626c558 - $_67b3418874aa), $_62b3f98bf654, array_slice($_ce467557df24, $_44af9f79ea06));
                $_44af9f79ea06 += count($_62b3f98bf654) - $_ae2ed626c558 - $_67b3418874aa;
            } else {
                $_62b3f98bf654 = array_slice(token_get_all("<?" . "php $_d88d4c12fcc4"), 1);
                $_d5cbf76f6b55 .= $_d88d4c12fcc4;
                $_ce467557df24 = array_merge(array_slice($_ce467557df24, 0, $_44af9f79ea06 - $_67b3418874aa), $_62b3f98bf654, array_slice($_ce467557df24, $_44af9f79ea06));
                $_44af9f79ea06 += count($_62b3f98bf654) - $_67b3418874aa;
            }
            --$_44af9f79ea06;
        }

        private static function optwister_op2fn($_d5cbf76f6b55, $_5b3eb1c32c0d, &$_ce467557df24 = NULL)
        {
            if ($_ce467557df24 === NULL) $_ce467557df24 = token_get_all($_d5cbf76f6b55);
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) {
                $_d87f4c1f5462 = $_44af9f79ea06;
                if ($_ce467557df24[$_44af9f79ea06][0] == T_NEW) {
                    ++$_44af9f79ea06;
                    $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_STRING) {
                        $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                        if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06++][1];
                        if ($_ce467557df24[$_44af9f79ea06] == '(') {
                            $_3c4dcc509033 = $_ce467557df24[$_44af9f79ea06++];
                            if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_3c4dcc509033 .= $_ce467557df24[$_44af9f79ea06++][1];
                            if ($_ce467557df24[$_44af9f79ea06] == ')') {
                                $_3c4dcc509033 .= $_ce467557df24[$_44af9f79ea06++];
                                $_23bf89ec40b6 = trim($_23bf89ec40b6);
                                $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_v0('$_23bf89ec40b6')";
                                --$_44af9f79ea06;
                                self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                                $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                            } else {
                                $_d5cbf76f6b55 .= $_23bf89ec40b6 . $_3c4dcc509033;
                                --$_44af9f79ea06;
                            }
                        } else {
                            $_23bf89ec40b6 = trim($_23bf89ec40b6);
                            $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_v0('$_23bf89ec40b6')";
                            --$_44af9f79ea06;
                            self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                            $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                        }
                    } else {
                        $_d5cbf76f6b55 .= $_23bf89ec40b6;
                        --$_44af9f79ea06;
                    }
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_EXIT) {
                    ++$_44af9f79ea06;
                    $_6bd7e3077fe8 = self::readpe($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_a($_6bd7e3077fe8)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_PRINT) {
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_c($_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_ECHO) {
                    ++$_44af9f79ea06;
                    $_6bd7e3077fe8 = self::readpe($_ce467557df24, $_44af9f79ea06, TRUE);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_d($_6bd7e3077fe8)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_ARRAY_CAST) {
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_e($_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_BOOL_CAST) {
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_f($_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_DOUBLE_CAST) {
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_g($_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_INT_CAST) {
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_h($_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_OBJECT_CAST) {
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_i($_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_STRING_CAST) {
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_j($_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
            } else {
                $_d87f4c1f5462 = $_44af9f79ea06;
                if ($_ce467557df24[$_44af9f79ea06] == '~') {
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_t0($_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                } else if ($_ce467557df24[$_44af9f79ea06] == '!') {
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_u0($_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    $_44af9f79ea06 = $_d87f4c1f5462 - 1;
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            }
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) {
                $_d87f4c1f5462 = $_44af9f79ea06;
                if ($_ce467557df24[$_44af9f79ea06][0] == T_POW) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "pow($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_DEC) {
                    $_08db2b3c2769 = trim(self::readsr($_ce467557df24, $_44af9f79ea06));
                    $_a62b34eb6df6 = trim(self::readsl($_ce467557df24, $_44af9f79ea06));
                    if (trim($_a62b34eb6df6) === '') {
                        $_44af9f79ea06 = $_d87f4c1f5462;
                        $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_n0($_08db2b3c2769)";
                        self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                    } else {
                        $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_p0($_a62b34eb6df6)";
                        self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    }
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_INC) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    if (trim($_a62b34eb6df6) === '') {
                        $_44af9f79ea06 = $_d87f4c1f5462;
                        $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_o0($_08db2b3c2769)";
                        self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                    } else {
                        $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_q0($_a62b34eb6df6)";
                        self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4);
                    }
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
            } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1]; else {
                $_d87f4c1f5462 = $_44af9f79ea06;
                if ($_ce467557df24[$_44af9f79ea06] == '*') {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_1($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06] == '/') {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_2($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06] == '%') {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_3($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            }
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1]; else {
                $_d87f4c1f5462 = $_44af9f79ea06;
                if ($_ce467557df24[$_44af9f79ea06] == '+') {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    if (trim($_08db2b3c2769) === '') {
                        $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
                        continue;
                    }
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_z($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06] == '-') {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    if (trim($_08db2b3c2769) === '') {
                        $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
                        continue;
                    }
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            }
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1]; else {
                if ($_ce467557df24[$_44af9f79ea06] == '.') {
                    $_d87f4c1f5462 = $_44af9f79ea06;
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_4($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            }
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) {
                $_d87f4c1f5462 = $_44af9f79ea06;
                if ($_ce467557df24[$_44af9f79ea06][0] == T_SL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_x($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_SR) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_y($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
            } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) {
                $_d87f4c1f5462 = $_44af9f79ea06;
                if ($_ce467557df24[$_44af9f79ea06][0] == T_LOGICAL_AND) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_u($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_LOGICAL_OR) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_v($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_LOGICAL_XOR) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_w($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
            } else {
                $_d87f4c1f5462 = $_44af9f79ea06;
                if ($_ce467557df24[$_44af9f79ea06] == '&') {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    if (trim($_08db2b3c2769) === '') {
                        $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
                        continue;
                    }
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_u($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06] == '|') {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_v($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06] == '^') {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_w($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            }
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) {
                $_d87f4c1f5462 = $_44af9f79ea06;
                if ($_ce467557df24[$_44af9f79ea06][0] == T_IS_GREATER_OR_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_l($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_IS_SMALLER_OR_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_m($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_IS_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_p($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_IS_IDENTICAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_q($_08db2b3c2769,$_a62b34eb6df6)";
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_IS_NOT_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_r($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_IS_NOT_IDENTICAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_s($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
            } else {
                $_d87f4c1f5462 = $_44af9f79ea06;
                if ($_ce467557df24[$_44af9f79ea06] == '>') {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_n($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06] == '<') {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_o($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            }
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) {
                $_d87f4c1f5462 = $_44af9f79ea06;
                if ($_ce467557df24[$_44af9f79ea06][0] == T_BOOLEAN_AND) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_r0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_BOOLEAN_OR) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_s0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
            } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) {
                $_d87f4c1f5462 = $_44af9f79ea06;
                if ($_ce467557df24[$_44af9f79ea06][0] == T_AND_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_a0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_OR_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_b0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_XOR_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_c0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_PLUS_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_d0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_MINUS_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_e0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_MUL_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_f0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_DIV_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_g0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_MOD_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_h0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_POW_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_i0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_SL_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_j0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_SR_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_k0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_CONCAT_EQUAL) {
                    $_08db2b3c2769 = self::readsr($_ce467557df24, $_44af9f79ea06);
                    $_a62b34eb6df6 = self::readsl($_ce467557df24, $_44af9f79ea06);
                    $_d88d4c12fcc4 = "_ALOM_optwister{$_5b3eb1c32c0d}_m0($_08db2b3c2769,$_a62b34eb6df6)";
                    self::reparseExtra($_d5cbf76f6b55, $_ce467557df24, $_44af9f79ea06, $_44af9f79ea06 - $_d87f4c1f5462, $_d88d4c12fcc4, strlen($_08db2b3c2769));
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
            } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            return $_d5cbf76f6b55;
        }

        private static function optwister_encode($_2f79040d85dc, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c)
        {
            $_0187a8a1d97a = self::getasciiikey(rand(1, 16));
            $_d098a58698c1 = (strlen($_0187a8a1d97a) + strlen($_2f79040d85dc)) % 3;
            if ($_d098a58698c1 > 0) $_0187a8a1d97a .= self::getasciiikey(3 - $_d098a58698c1);
            $_2f79040d85dc = chr(strlen($_0187a8a1d97a)) . $_0187a8a1d97a . $_2f79040d85dc;
            for ($_44af9f79ea06 = 0; isset($_2f79040d85dc[$_44af9f79ea06]); ++$_44af9f79ea06) $_2f79040d85dc[$_44af9f79ea06] = $_9b3c20ca2a6c[$_44af9f79ea06 & 0xf] ^ $_2f79040d85dc[$_44af9f79ea06];
            $_2f79040d85dc = self::inc($_2f79040d85dc, $_e790ce3071f2, $_91dba975883a, TRUE);
            for ($_44af9f79ea06 = 0; isset($_2f79040d85dc[$_44af9f79ea06]); ++$_44af9f79ea06) $_2f79040d85dc[$_44af9f79ea06] = $_9b3c20ca2a6c[$_44af9f79ea06 & 0xf] ^ $_2f79040d85dc[$_44af9f79ea06];
            return $_2f79040d85dc;
        }

        private static function optwister_encapsed_string($_2f79040d85dc)
        {
            if ($_2f79040d85dc[0] == "'") {
                $_2f79040d85dc = substr($_2f79040d85dc, 1, -1);
                $_2f79040d85dc = preg_replace_callback("/(?<!(?<!\\\\)\\\\)\\\\('|\\\\)/", function ($_358662e4fc83) { return $_358662e4fc83[1]; }, $_2f79040d85dc);
                return $_2f79040d85dc;
            }
            $_2f79040d85dc = substr($_2f79040d85dc, 1, -1);
            $_2f79040d85dc = preg_replace_callback("/(?<!(?<!\\\\)\\\\)\\\\([0-7]{1,3}|x[0-9a-fA-F]{1,2}|[ertvnf]|\\\$|\"|\\\\)/", function ($_358662e4fc83) {
                switch ($_358662e4fc83[1][0]) {
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
                        return $_358662e4fc83[1];
                    case 'x':
                        return chr(hexdec(substr($_358662e4fc83[1], 1)));
                    default:
                        return chr(octdec($_358662e4fc83[1]));
                }
            }, $_2f79040d85dc);
            return $_2f79040d85dc;
        }

        private static function optwister_lnumber($_2f79040d85dc)
        {
            if ($_2f79040d85dc == 0) return '0';
            if ($_2f79040d85dc[0] == '0') {
                if ($_2f79040d85dc[1] == 'x') return (string)hexdec(substr($_2f79040d85dc, 2));
                if ($_2f79040d85dc[1] == 'b') return (string)bindec(substr($_2f79040d85dc, 2));
                return (string)octdec(substr($_2f79040d85dc, 1));
            } else return $_2f79040d85dc;
        }

        private static function optwister_stringify(&$_ce467557df24, $_5b3eb1c32c0d, &$_44af9f79ea06)
        {
            $_d5cbf76f6b55 = '';
            $_cfce0741e92e = 1;
            for (; isset($_ce467557df24[$_44af9f79ea06]) && $_cfce0741e92e != 0; ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                    T_CLASS,
                    T_TRAIT,
                    T_INTERFACE,
                ])) {
                $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                while (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                        T_WHITESPACE,
                        T_STRING,
                        T_NS_SEPARATOR,
                        T_EXTENDS,
                        T_IMPLEMENTS,
                    ])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                if ($_ce467557df24[$_44af9f79ea06] != '{') {
                    --$_44af9f79ea06;
                    continue;
                }
                $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++];
                for (; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '}'; ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_FUNCTION) {
                    $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    for (; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '('; ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1]; else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
                    $_d5cbf76f6b55 .= self::readl($_ce467557df24, '(', ')', $_44af9f79ea06);
                    ++$_44af9f79ea06;
                    for (; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '{'; ++$_44af9f79ea06) if ($_ce467557df24[$_44af9f79ea06] == ';') break; else if (is_array($_ce467557df24[$_44af9f79ea06])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
                    else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
                    if ($_ce467557df24[$_44af9f79ea06] == ';') {
                        $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
                        continue;
                    }
                    $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++];
                    $_d5cbf76f6b55 .= self::optwister_stringify($_ce467557df24, $_5b3eb1c32c0d, $_44af9f79ea06);
                    --$_44af9f79ea06;
                } else if (is_array($_ce467557df24[$_44af9f79ea06])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
                else if ($_ce467557df24[$_44af9f79ea06] == '{') $_d5cbf76f6b55 .= self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
                $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            } else if ($_ce467557df24[$_44af9f79ea06] == '{') {
                ++$_cfce0741e92e;
                $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            } else if ($_ce467557df24[$_44af9f79ea06] == '}') {
                --$_cfce0741e92e;
                $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            } else if (is_array($_ce467557df24[$_44af9f79ea06])) {
                if ($_ce467557df24[$_44af9f79ea06][0] == T_FUNCTION) {
                    $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_STRING) {
                        $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                        if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    }
                    if ($_ce467557df24[$_44af9f79ea06] == '(') {
                        $_d5cbf76f6b55 .= '(' . self::readpe($_ce467557df24, $_44af9f79ea06) . ')';
                        ++$_44af9f79ea06;
                    }
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_USE) {
                        $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                        if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    }
                    if ($_ce467557df24[$_44af9f79ea06] == '(') $_d5cbf76f6b55 .= '(' . self::readpe($_ce467557df24, $_44af9f79ea06) . ')'; else--$_44af9f79ea06;
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_FN || $_ce467557df24[$_44af9f79ea06][0] == T_DECLARE) {
                    $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    if ($_ce467557df24[$_44af9f79ea06] == '(') $_d5cbf76f6b55 .= '(' . self::readpe($_ce467557df24, $_44af9f79ea06) . ')'; else--$_44af9f79ea06;
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_STATIC) {
                    $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    $_d5cbf76f6b55 .= self::readpe($_ce467557df24, $_44af9f79ea06, TRUE);
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_NAMESPACE) {
                    $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    while (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                            T_WHITESPACE,
                            T_STRING,
                            T_NS_SEPARATOR,
                        ])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    if ($_ce467557df24[$_44af9f79ea06] != '{') {
                        --$_44af9f79ea06;
                        continue;
                    }
                    $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++];
                    $_d5cbf76f6b55 .= self::optwister_stringify($_ce467557df24, $_5b3eb1c32c0d, $_44af9f79ea06);
                    --$_44af9f79ea06;
                } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_START_HEREDOC) {
                    $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    for (; isset($_ce467557df24[$_44af9f79ea06]) && (!is_array($_ce467557df24[$_44af9f79ea06]) || $_ce467557df24[$_44af9f79ea06][0] != T_END_HEREDOC); ++$_44af9f79ea06) $_d5cbf76f6b55 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
                    $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_STRING) {
                    $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06][1];
                    $_90812c0999bc = '';
                    $_d87f4c1f5462 = 1;
                    if (is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) && $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][0] == T_WHITESPACE) $_90812c0999bc .= $_ce467557df24[$_44af9f79ea06 - ($_d87f4c1f5462++)][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) && in_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][0], [
                            T_OBJECT_OPERATOR,
                            T_NULLSAFE_OBJECT_OPERATOR,
                        ])) {
                        $_d5cbf76f6b55 .= "{'$_23bf89ec40b6'}";
                    } else if (is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) && $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][0] == T_DOUBLE_COLON) {
                        $_a3621bb833f4 = '';
                        $_d87f4c1f5462 = 1;
                        if (is_array($_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462]) && $_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462][0] == T_WHITESPACE) $_a3621bb833f4 .= $_ce467557df24[$_44af9f79ea06 + ($_d87f4c1f5462++)][1];
                        if ($_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462] == '(') {
                            $_d5cbf76f6b55 .= "{'$_23bf89ec40b6'}";
                        } else $_d5cbf76f6b55 .= $_23bf89ec40b6;
                    } else if (!is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) || !in_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][0], [
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
                        $_a3621bb833f4 = '';
                        for ($_d87f4c1f5462 = 1; isset($_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462]) && is_array($_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462]) && in_array($_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462][0], [
                            T_STRING,
                            T_WHITESPACE,
                            T_NS_SEPARATOR,
                        ]); ++$_d87f4c1f5462) if ($_d87f4c1f5462 > 1 && $_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462 - 1][0] == T_WHITESPACE && $_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462 - 2][0] == $_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462][0]) break; else $_a3621bb833f4 .= $_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462][1];
                        $_44af9f79ea06 += $_d87f4c1f5462;
                        $_23bf89ec40b6 = str_replace([' ', "\n", "\r", "\t"], '', $_23bf89ec40b6 . $_a3621bb833f4);
                        if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_a3621bb833f4 .= $_ce467557df24[$_44af9f79ea06++][1];
                        if ($_ce467557df24[$_44af9f79ea06] == '(') {
                            $_d5cbf76f6b55 .= "(function_exists(__NAMESPACE__.'\\$_23bf89ec40b6')?__NAMESPACE__.'\\$_23bf89ec40b6':(function_exists('$_23bf89ec40b6')?'$_23bf89ec40b6':__NAMESPACE__.'\\$_23bf89ec40b6'))";
                        } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_DOUBLE_COLON) {
                            $_d5cbf76f6b55 .= in_array(strtolower($_23bf89ec40b6), [
                                'self',
                                'static',
                                'parent',
                            ]) ? $_23bf89ec40b6 : "(class_exists(__NAMESPACE__.'\\$_23bf89ec40b6')?__NAMESPACE__.'\\$_23bf89ec40b6':" . "(class_exists('$_23bf89ec40b6')?'$_23bf89ec40b6':__NAMESPACE__.'\\$_23bf89ec40b6'))";
                        } else {
                            $_d5cbf76f6b55 .= in_array(strtolower($_23bf89ec40b6), [
                                'null',
                                'true',
                                'false',
                            ]) ? "('constant')('$_23bf89ec40b6')" : "(defined(__NAMESPACE__.'$_23bf89ec40b6')?('constant')(__NAMESPACE__.'\\$_23bf89ec40b6'):" . "(defined('$_23bf89ec40b6')?('constant')('$_23bf89ec40b6'):'$_23bf89ec40b6'))";
                        }
                        --$_44af9f79ea06;
                    } else $_d5cbf76f6b55 .= $_23bf89ec40b6;
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_NS_SEPARATOR) {
                    $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06][1];
                    $_d87f4c1f5462 = 1;
                    if (is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) && $_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][0] == T_WHITESPACE) ++$_d87f4c1f5462;
                    if (!is_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462]) || !in_array($_ce467557df24[$_44af9f79ea06 - $_d87f4c1f5462][0], [
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
                        $_a3621bb833f4 = '';
                        for ($_d87f4c1f5462 = 1; isset($_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462]) && is_array($_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462]) && in_array($_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462][0], [
                            T_STRING,
                            T_WHITESPACE,
                            T_NS_SEPARATOR,
                        ]); ++$_d87f4c1f5462) if ($_d87f4c1f5462 > 1 && $_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462 - 1][0] == T_WHITESPACE && $_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462 - 2][0] == $_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462][0]) break; else $_a3621bb833f4 .= $_ce467557df24[$_44af9f79ea06 + $_d87f4c1f5462][1];
                        $_44af9f79ea06 += $_d87f4c1f5462;
                        $_23bf89ec40b6 = str_replace([' ', "\n", "\r", "\t"], '', $_23bf89ec40b6 . $_a3621bb833f4);
                        if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_a3621bb833f4 .= $_ce467557df24[$_44af9f79ea06++][1];
                        if ($_ce467557df24[$_44af9f79ea06] == '(') {
                            $_d5cbf76f6b55 .= "('$_23bf89ec40b6')";
                        } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_DOUBLE_COLON) {
                            $_d5cbf76f6b55 .= in_array(strtolower($_23bf89ec40b6), ['self', 'static', 'parent']) ? $_23bf89ec40b6 : "('$_23bf89ec40b6')";
                        } else {
                            $_d5cbf76f6b55 .= "('constant')('$_23bf89ec40b6')";
                        }
                        --$_44af9f79ea06;
                    } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_VARIABLE) {
                    $_23bf89ec40b6 = substr($_ce467557df24[$_44af9f79ea06][1], 1);
                    $_d5cbf76f6b55 .= $_23bf89ec40b6 == '$this' ? $_23bf89ec40b6 : "\${'$_23bf89ec40b6'}";
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_LNUMBER) {
                    $_23bf89ec40b6 = self::optwister_lnumber($_ce467557df24[$_44af9f79ea06][1]);
                    $_d5cbf76f6b55 .= "('_ALOM_optwister{$_5b3eb1c32c0d}_h')('$_23bf89ec40b6')";
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_DNUMBER) {
                    $_23bf89ec40b6 = $_ce467557df24[$_44af9f79ea06][1];
                    $_d5cbf76f6b55 .= "('_ALOM_optwister{$_5b3eb1c32c0d}_g')('$_23bf89ec40b6')";
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
            } else if ($_ce467557df24[$_44af9f79ea06] == '"') {
                $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++];
                for (; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '"'; ++$_44af9f79ea06) $_d5cbf76f6b55 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
                $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            } else if ($_ce467557df24[$_44af9f79ea06] == '`') {
                $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++];
                for (; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '`'; ++$_44af9f79ea06) $_d5cbf76f6b55 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
                $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            return $_d5cbf76f6b55;
        }

        private static function optwister_obfs($_d5cbf76f6b55, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_5572c1da585c = NULL)
        {
            if ($_5572c1da585c === NULL) $_5572c1da585c = token_get_all($_d5cbf76f6b55);
            $_44af9f79ea06 = 0;
            $_d5cbf76f6b55 = self::optwister_stringify($_5572c1da585c, $_5b3eb1c32c0d, $_44af9f79ea06);
            $_ce467557df24 = token_get_all($_d5cbf76f6b55);
            $_231acd6afa62 = base64_encode($_231acd6afa62);
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_CONSTANT_ENCAPSED_STRING) {
                $_23bf89ec40b6 = self::optwister_encapsed_string($_ce467557df24[$_44af9f79ea06][1]);
                $_d5cbf76f6b55 .= "\AlomDecoder$_5b3eb1c32c0d::optwister_decode('" . base64_encode(self::optwister_encode($_23bf89ec40b6, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c)) . "','$_231acd6afa62')";
            } else if (is_array($_ce467557df24[$_44af9f79ea06])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
            else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            return $_d5cbf76f6b55;
        }

        public static function sug($_d5cbf76f6b55, $_5b3eb1c32c0d)
        {
            $_ce467557df24 = token_get_all($_d5cbf76f6b55);
            $_d5cbf76f6b55 = '';
            $_44af9f79ea06 = 0;
            $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
            while (isset($_ce467557df24[$_44af9f79ea06]) && ((is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                            T_WHITESPACE,
                            T_COMMENT,
                            T_DOC_COMMENT,
                        ])) || $_ce467557df24[$_44af9f79ea06] == ';')) $_d5cbf76f6b55 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06++][1] : $_ce467557df24[$_44af9f79ea06++];
            if (isset($_ce467557df24[$_44af9f79ea06]) && is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_NAMESPACE) {
                $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                while (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                        T_WHITESPACE,
                        T_STRING,
                        T_NS_SEPARATOR,
                    ])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                if ($_ce467557df24[$_44af9f79ea06] == '{') {
                    $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++];
                    $_d5cbf76f6b55 .= "if(isset(\$_ALOM_code)){file_put_contents(\$_ALOM_code,'');unlink(\$_ALOM_code);\$_ALOM_code='';unset(\$_ALOM_code);}";
                    for (; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) $_d5cbf76f6b55 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
                    return $_d5cbf76f6b55;
                } else {
                    $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++];
                    while (isset($_ce467557df24[$_44af9f79ea06]) && ((is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                                    T_WHITESPACE,
                                    T_COMMENT,
                                    T_DOC_COMMENT,
                                ])) || $_ce467557df24[$_44af9f79ea06] == ';')) $_d5cbf76f6b55 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06++][1] : $_ce467557df24[$_44af9f79ea06++];
                }
            }
            while (isset($_ce467557df24[$_44af9f79ea06]) && is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_NAMESPACE) {
                $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                while (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                        T_WHITESPACE,
                        T_STRING,
                        T_NS_SEPARATOR,
                    ])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++];
                while (isset($_ce467557df24[$_44af9f79ea06]) && ((is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                                T_WHITESPACE,
                                T_COMMENT,
                                T_DOC_COMMENT,
                            ])) || $_ce467557df24[$_44af9f79ea06] == ';')) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
            }
            $_d5cbf76f6b55 .= "if(isset(\$_ALOM_code)){file_put_contents(\$_ALOM_code,'');unlink(\$_ALOM_code);\$_ALOM_code='';unset(\$_ALOM_code);}";
            for (; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) $_d5cbf76f6b55 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
            return $_d5cbf76f6b55;
        }

        private static function singlequote($_2f79040d85dc) { return str_replace(['\\', "'"], ['\\\\', "\\'"], $_2f79040d85dc); }

        private static function commentquote($_2f79040d85dc) { return str_replace(["\n", "*/"], [" *   ", "*//*"], $_2f79040d85dc); }

        private static function setikeys($_d5cbf76f6b55)
        {
            $_ce467557df24 = token_get_all($_d5cbf76f6b55);
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_STRING) {
                if (in_array($_ce467557df24[$_44af9f79ea06][1], [
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
                    $_8d2d7939f6cb = (int)substr($_ce467557df24[$_44af9f79ea06][1], 18);
                    $_e3883a47f8e2 = bin2hex(self::getasciiikey($_8d2d7939f6cb));
                    $_d5cbf76f6b55 .= "hex2bin('$_e3883a47f8e2')";
                } else if ($_ce467557df24[$_44af9f79ea06][1] == "ALOM_INVISIBLE_CHAR") {
                    $_e3883a47f8e2 = ord(self::getcharikey());
                    $_d5cbf76f6b55 .= "chr($_e3883a47f8e2)";
                } else if ($_ce467557df24[$_44af9f79ea06][1] == "ALOM_INVISIBLE_BIT") {
                    $_e3883a47f8e2 = self::getbitikey();
                    $_d5cbf76f6b55 .= "($_e3883a47f8e2)";
                } else if ($_ce467557df24[$_44af9f79ea06][1] == "ALOM_INVISIBLE_INT") {
                    $_e3883a47f8e2 = self::getintikey();
                    $_d5cbf76f6b55 .= "($_e3883a47f8e2)";
                } else if ($_ce467557df24[$_44af9f79ea06][1] == "ALOM_OBFUSCATED_TIME") {
                    $_e3883a47f8e2 = floor(self::$_68aa9304b10c);
                    $_d5cbf76f6b55 .= "($_e3883a47f8e2)";
                } else if ($_ce467557df24[$_44af9f79ea06][1] == "ALOM_OBFUSCATED_TIME_FLOAT") {
                    $_e3883a47f8e2 = self::$_68aa9304b10c;
                    $_d5cbf76f6b55 .= "($_e3883a47f8e2)";
                } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
            } else if (is_array($_ce467557df24[$_44af9f79ea06])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
            else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            return $_d5cbf76f6b55;
        }

        public static function partition_encode($_2f79040d85dc, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c)
        {
            $_2f79040d85dc = gzdeflate($_2f79040d85dc, 9);
            for ($_44af9f79ea06 = 0; isset($_2f79040d85dc[$_44af9f79ea06]); ++$_44af9f79ea06) $_2f79040d85dc[$_44af9f79ea06] = $_d186186a7d16[$_44af9f79ea06 & 0xf] ^ $_2f79040d85dc[$_44af9f79ea06];
            $_2f79040d85dc = self::optwister_encode($_2f79040d85dc, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c);
            for ($_44af9f79ea06 = 0; isset($_2f79040d85dc[$_44af9f79ea06]); ++$_44af9f79ea06) $_2f79040d85dc[$_44af9f79ea06] = $_d186186a7d16[$_44af9f79ea06 & 0xf] ^ $_2f79040d85dc[$_44af9f79ea06];
            return $_2f79040d85dc;
        }

        public static function nspartitioning(&$_5a71f81a43eb, $_d5cbf76f6b55, $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87 = FALSE, $_2d1cac7779b8 = '', &$_a56962748828 = [], $_f012aae02306 = FALSE)
        {
            $_ce467557df24 = token_get_all("<?" . "php $_d5cbf76f6b55");
            array_shift($_ce467557df24);
            $_f60e006196fb = $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) {
                if (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [T_CLASS, T_TRAIT, T_INTERFACE])) {
                    $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    while (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                            T_WHITESPACE,
                            T_STRING,
                            T_NS_SEPARATOR,
                            T_EXTENDS,
                            T_IMPLEMENTS,
                        ])) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    if ($_ce467557df24[$_44af9f79ea06] != '{') {
                        --$_44af9f79ea06;
                        continue;
                    }
                    $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++];
                    for (; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '}'; ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_FUNCTION) {
                        $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                        for (; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '('; ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06][1]; else $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06];
                        $_f60e006196fb .= self::readl($_ce467557df24, '(', ')', $_44af9f79ea06);
                        ++$_44af9f79ea06;
                        for (; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '{'; ++$_44af9f79ea06) if ($_ce467557df24[$_44af9f79ea06] == ';') break; else if (is_array($_ce467557df24[$_44af9f79ea06])) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06][1];
                        else $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06];
                        if ($_ce467557df24[$_44af9f79ea06] == ';') {
                            $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06];
                            continue;
                        }
                        $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                        $_6c1e753a12d0 = self::nspartitioning($_5a71f81a43eb, substr($_6c1e753a12d0, 1, -1), $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8);
                        $_f60e006196fb .= '{' . $_6c1e753a12d0 . '}';
                    } else if (is_array($_ce467557df24[$_44af9f79ea06])) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06][1];
                    else if ($_ce467557df24[$_44af9f79ea06] == '{') $_f60e006196fb .= self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                    else $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06];
                    $_f60e006196fb = $_2d1cac7779b8 . $_f60e006196fb . $_ce467557df24[$_44af9f79ea06];
                    if (!isset($_5a71f81a43eb[$_f60e006196fb])) {
                        $_d186186a7d16 = random_bytes(16);
                        $_5a71f81a43eb[$_f60e006196fb] = [
                            count($_5a71f81a43eb),
                            $_d186186a7d16,
                            self::partition_encode($_f60e006196fb, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c),
                        ];
                    }
                    $_d5cbf76f6b55 .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $_d5cbf76f6b55 .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$_5b3eb1c32c0d::partition_decode(\AlomDecoder$_5b3eb1c32c0d::\$partition[" . $_5a71f81a43eb[$_f60e006196fb][0] . "],'" . base64_encode($_5a71f81a43eb[$_f60e006196fb][1]) . "','$_231acd6afa62'));";
                    $_f60e006196fb = '';
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_FUNCTION) {
                    $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_STRING) {
                        $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                        if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                        if ($_ce467557df24[$_44af9f79ea06] == '(') {
                            $_f60e006196fb .= '(' . self::readpe($_ce467557df24, $_44af9f79ea06) . ')';
                            if (is_array($_ce467557df24[++$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                            if ($_ce467557df24[$_44af9f79ea06] == '{') {
                                $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                                $_6c1e753a12d0 = self::nspartitioning($_5a71f81a43eb, substr($_6c1e753a12d0, 1, -1), $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8);
                                $_f60e006196fb = $_2d1cac7779b8 . $_f60e006196fb . '{' . $_6c1e753a12d0 . '}';
                                if (!isset($_5a71f81a43eb[$_f60e006196fb])) {
                                    $_d186186a7d16 = random_bytes(16);
                                    $_5a71f81a43eb[$_f60e006196fb] = [
                                        count($_5a71f81a43eb),
                                        $_d186186a7d16,
                                        self::partition_encode($_f60e006196fb, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c),
                                    ];
                                }
                                $_d5cbf76f6b55 .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                                $_d5cbf76f6b55 .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$_5b3eb1c32c0d::partition_decode(\AlomDecoder$_5b3eb1c32c0d::\$partition[" . $_5a71f81a43eb[$_f60e006196fb][0] . "],'" . base64_encode($_5a71f81a43eb[$_f60e006196fb][1]) . "','$_231acd6afa62'));";
                                $_f60e006196fb = '';
                            } else--$_44af9f79ea06;
                        } else--$_44af9f79ea06;
                    } else {
                        if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_USE) {
                            $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                            if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                        }
                        if ($_ce467557df24[$_44af9f79ea06] == '(') $_f60e006196fb .= '(' . self::readpe($_ce467557df24, $_44af9f79ea06) . ')'; else--$_44af9f79ea06;
                    }
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_FN || $_ce467557df24[$_44af9f79ea06][0] == T_DECLARE) {
                    $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    if ($_ce467557df24[$_44af9f79ea06] == '(') $_f60e006196fb .= '(' . self::readpe($_ce467557df24, $_44af9f79ea06) . ')'; else--$_44af9f79ea06;
                } else if (in_array($_ce467557df24[$_44af9f79ea06][0], [T_STATIC, T_ECHO, T_GLOBAL])) {
                    $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    $_f60e006196fb .= self::readpe($_ce467557df24, $_44af9f79ea06, TRUE);
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_RETURN) {
                    $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1] . ' ';
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) ++$_44af9f79ea06;
                    while ($_ce467557df24[$_44af9f79ea06] == '(') {
                        $_f60e006196fb .= '(' . self::readpe($_ce467557df24, $_44af9f79ea06, TRUE) . ')';
                        ++$_44af9f79ea06;
                    }
                    if ($_ce467557df24[$_44af9f79ea06] == ';') {
                        $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06];
                    } else {
                        $_f60e006196fb .= self::readpe($_ce467557df24, $_44af9f79ea06, TRUE);
                        if (is_array($_ce467557df24[$_44af9f79ea06 + 1]) && $_ce467557df24[$_44af9f79ea06 + 1][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[($_44af9f79ea06++) + 1][1];
                        if ($_ce467557df24[$_44af9f79ea06 + 1] == ';') $_f60e006196fb .= $_ce467557df24[($_44af9f79ea06++) + 1];
                    }
                    $_a56962748828[] = count($_5a71f81a43eb);
                    if (!isset($_5a71f81a43eb[$_f60e006196fb])) {
                        $_d186186a7d16 = random_bytes(16);
                        $_5a71f81a43eb[$_f60e006196fb] = [
                            count($_5a71f81a43eb),
                            $_d186186a7d16,
                            self::partition_encode($_f60e006196fb, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c),
                        ];
                    }
                    $_d5cbf76f6b55 = "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $_d5cbf76f6b55 .= "\$_ALOM_return=true;return \$_ALOM_result=eval(\AlomDecoder$_5b3eb1c32c0d::partition_decode(\AlomDecoder$_5b3eb1c32c0d::\$partition[" . $_5a71f81a43eb[$_f60e006196fb][0] . "],'" . base64_encode($_5a71f81a43eb[$_f60e006196fb][1]) . "','$_231acd6afa62'));";
                    $_f60e006196fb = '';
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_CONTINUE) {
                    ++$_44af9f79ea06;
                    $_6bd7e3077fe8 = max(1, (int)self::readpe($_ce467557df24, $_44af9f79ea06, TRUE));
                    if ($_ce467557df24[$_44af9f79ea06 + 1] == ';') ++$_44af9f79ea06;
                    $_f60e006196fb .= "\$_ALOM_continue=$_6bd7e3077fe8;";
                    $_a56962748828[] = count($_5a71f81a43eb);
                    if (!isset($_5a71f81a43eb[$_f60e006196fb])) {
                        $_d186186a7d16 = random_bytes(16);
                        $_5a71f81a43eb[$_f60e006196fb] = [
                            count($_5a71f81a43eb),
                            $_d186186a7d16,
                            self::partition_encode($_f60e006196fb, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c),
                        ];
                    }
                    $_d5cbf76f6b55 .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $_d5cbf76f6b55 .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$_5b3eb1c32c0d::partition_decode(\AlomDecoder$_5b3eb1c32c0d::\$partition[" . $_5a71f81a43eb[$_f60e006196fb][0] . "],'" . base64_encode($_5a71f81a43eb[$_f60e006196fb][1]) . "','$_231acd6afa62'));";
                    $_f60e006196fb = '';
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_BREAK) {
                    ++$_44af9f79ea06;
                    $_6bd7e3077fe8 = max(1, (int)self::readpe($_ce467557df24, $_44af9f79ea06, TRUE));
                    if ($_ce467557df24[$_44af9f79ea06 + 1] == ';') ++$_44af9f79ea06;
                    $_f60e006196fb .= "\$_ALOM_break=$_6bd7e3077fe8;";
                    $_a56962748828[] = count($_5a71f81a43eb);
                    if (!isset($_5a71f81a43eb[$_f60e006196fb])) {
                        $_d186186a7d16 = random_bytes(16);
                        $_5a71f81a43eb[$_f60e006196fb] = [
                            count($_5a71f81a43eb),
                            $_d186186a7d16,
                            self::partition_encode($_f60e006196fb, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c),
                        ];
                    }
                    $_d5cbf76f6b55 .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $_d5cbf76f6b55 .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$_5b3eb1c32c0d::partition_decode(\AlomDecoder$_5b3eb1c32c0d::\$partition[" . $_5a71f81a43eb[$_f60e006196fb][0] . "],'" . base64_encode($_5a71f81a43eb[$_f60e006196fb][1]) . "','$_231acd6afa62'));";
                    $_f60e006196fb = '';
                } else if ($_ce467557df24[$_44af9f79ea06][0] == T_NAMESPACE) {
                    $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    while (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                            T_WHITESPACE,
                            T_STRING,
                            T_NS_SEPARATOR,
                        ])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06++][1];
                    if ($_ce467557df24[$_44af9f79ea06] != '{') {
                        --$_44af9f79ea06;
                        continue;
                    }
                    $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                    $_6c1e753a12d0 = self::nspartitioning($_5a71f81a43eb, substr($_6c1e753a12d0, 1, -1), $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                    $_f60e006196fb .= '{' . $_6c1e753a12d0 . '}';
                } else if ($_ce467557df24[$_44af9f79ea06] == ';') {
                    $_f60e006196fb = $_2d1cac7779b8 . $_f60e006196fb . ';';
                    $_a56962748828[] = count($_5a71f81a43eb);
                    if (!isset($_5a71f81a43eb[$_f60e006196fb])) {
                        $_d186186a7d16 = random_bytes(16);
                        $_5a71f81a43eb[$_f60e006196fb] = [
                            count($_5a71f81a43eb),
                            $_d186186a7d16,
                            self::partition_encode($_f60e006196fb, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c),
                        ];
                    }
                    $_d5cbf76f6b55 .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $_d5cbf76f6b55 .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$_5b3eb1c32c0d::partition_decode(\AlomDecoder$_5b3eb1c32c0d::\$partition[" . $_5a71f81a43eb[$_f60e006196fb][0] . "],'" . base64_encode($_5a71f81a43eb[$_f60e006196fb][1]) . "','$_231acd6afa62'));";
                    $_f60e006196fb = '';
                } else if ($_ce467557df24[$_44af9f79ea06] == ',') {
                    $_f60e006196fb = $_2d1cac7779b8 . "return $_f60e006196fb;";
                    $_a56962748828[] = count($_5a71f81a43eb);
                    if (!isset($_5a71f81a43eb[$_f60e006196fb])) {
                        $_d186186a7d16 = random_bytes(16);
                        $_5a71f81a43eb[$_f60e006196fb] = [
                            count($_5a71f81a43eb),
                            $_d186186a7d16,
                            self::partition_encode($_f60e006196fb, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c),
                        ];
                    }
                    $_d5cbf76f6b55 .= "eval(\AlomDecoder$_5b3eb1c32c0d::partition_decode(\AlomDecoder$_5b3eb1c32c0d::\$partition[" . $_5a71f81a43eb[$_f60e006196fb][0] . "],'" . base64_encode($_5a71f81a43eb[$_f60e006196fb][1]) . "','$_231acd6afa62')),";
                    $_f60e006196fb = '';
                } else if (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [T_ISSET, T_UNSET, T_EMPTY, T_ARRAY, T_LIST])) {
                    $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    if ($_ce467557df24[$_44af9f79ea06] == '(') {
                        $_6c1e753a12d0 = self::readl($_ce467557df24, '(', ')', $_44af9f79ea06);
                        $_f60e006196fb .= $_6c1e753a12d0;
                    } else--$_44af9f79ea06;
                } else if (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                        T_WHILE,
                        T_FOR,
                        T_IF,
                        T_ELSEIF,
                        T_ELSE,
                        T_FOREACH,
                        T_DECLARE,
                    ])) {
                    $_d5cbf76f6b55 .= 'if(!isset($_ALOM_continue))$_ALOM_continue=0;if(!isset($_ALOM_break))$_ALOM_break=0;';
                    for (; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                            T_WHILE,
                            T_FOR,
                            T_FOREACH,
                            T_DECLARE,
                        ])) {
                        $_5a8577b364df = $_ce467557df24[$_44af9f79ea06][0] == T_FOR;
                        $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                        if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                        if ($_ce467557df24[$_44af9f79ea06] == '(') {
                            $_6c1e753a12d0 = self::readl($_ce467557df24, '(', ')', $_44af9f79ea06);
                            ++$_44af9f79ea06;
                            if ($_498b56a16a87 || $_5a8577b364df) {
                                $_f60e006196fb .= $_6c1e753a12d0;
                            } else {
                                $_6c1e753a12d0 = self::nspartitioning($_5a71f81a43eb, substr($_6c1e753a12d0, 1, -1), $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828, TRUE);
                                $_f60e006196fb .= '(' . $_6c1e753a12d0 . ')';
                            }
                            if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                            if ($_ce467557df24[$_44af9f79ea06] == '{') {
                                $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                                ++$_44af9f79ea06;
                                $_6c1e753a12d0 = self::nspartitioning($_5a71f81a43eb, substr($_6c1e753a12d0, 1, -1), $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                                $_f60e006196fb .= '{' . $_6c1e753a12d0 . 'if($_ALOM_continue>0){--$_ALOM_continue;if($_ALOM_continue>0)break;}if($_ALOM_break>0){--$_ALOM_break;break;}}';
                                $_a56962748828[] = count($_5a71f81a43eb);
                                if (!isset($_5a71f81a43eb[$_f60e006196fb])) {
                                    $_d186186a7d16 = random_bytes(16);
                                    $_5a71f81a43eb[$_f60e006196fb] = [
                                        count($_5a71f81a43eb),
                                        $_d186186a7d16,
                                        self::partition_encode($_f60e006196fb, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c),
                                    ];
                                }
                                $_d5cbf76f6b55 .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                                $_d5cbf76f6b55 .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$_5b3eb1c32c0d::partition_decode(\AlomDecoder$_5b3eb1c32c0d::\$partition[" . $_5a71f81a43eb[$_f60e006196fb][0] . "],'" . base64_encode($_5a71f81a43eb[$_f60e006196fb][1]) . "','$_231acd6afa62'));";
                                $_f60e006196fb = '';
                                break;
                            }
                            $_d04e40edfd8e = self::reads($_ce467557df24, $_44af9f79ea06);
                            if (isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] == ';') $_d04e40edfd8e .= $_ce467557df24[$_44af9f79ea06++];
                            $_d04e40edfd8e = self::nspartitioning($_5a71f81a43eb, $_d04e40edfd8e, $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                            $_f60e006196fb .= '{' . $_d04e40edfd8e . 'if($_ALOM_continue>0){--$_ALOM_continue;if($_ALOM_continue>0)break;}if($_ALOM_break>0){--$_ALOM_break;break;}}';
                            $_a56962748828[] = count($_5a71f81a43eb);
                            if (!isset($_5a71f81a43eb[$_f60e006196fb])) {
                                $_d186186a7d16 = random_bytes(16);
                                $_5a71f81a43eb[$_f60e006196fb] = [
                                    count($_5a71f81a43eb),
                                    $_d186186a7d16,
                                    self::partition_encode($_f60e006196fb, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c),
                                ];
                            }
                            $_d5cbf76f6b55 .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                            $_d5cbf76f6b55 .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$_5b3eb1c32c0d::partition_decode(\AlomDecoder$_5b3eb1c32c0d::\$partition[" . $_5a71f81a43eb[$_f60e006196fb][0] . "],'" . base64_encode($_5a71f81a43eb[$_f60e006196fb][1]) . "','$_231acd6afa62'));";
                            $_f60e006196fb = '';
                            break;
                        }
                        --$_44af9f79ea06;
                    } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_IF) {
                        while (TRUE) {
                            $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                            if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                            if ($_ce467557df24[$_44af9f79ea06] == '(') {
                                $_6c1e753a12d0 = self::readl($_ce467557df24, '(', ')', $_44af9f79ea06);
                                ++$_44af9f79ea06;
                                if ($_498b56a16a87) {
                                    $_f60e006196fb .= $_6c1e753a12d0;
                                } else {
                                    $_6c1e753a12d0 = self::nspartitioning($_5a71f81a43eb, substr($_6c1e753a12d0, 1, -1), $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828, TRUE);
                                    $_f60e006196fb .= '(' . $_6c1e753a12d0 . ')';
                                }
                            }
                            if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                            if ($_ce467557df24[$_44af9f79ea06] == '{') {
                                $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                                ++$_44af9f79ea06;
                                $_6c1e753a12d0 = self::nspartitioning($_5a71f81a43eb, substr($_6c1e753a12d0, 1, -1), $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                                $_f60e006196fb .= '{' . $_6c1e753a12d0 . '}';
                            } else {
                                $_d04e40edfd8e = self::reads($_ce467557df24, $_44af9f79ea06);
                                if (isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] == ';') $_d04e40edfd8e .= $_ce467557df24[$_44af9f79ea06++];
                                $_d04e40edfd8e = self::nspartitioning($_5a71f81a43eb, $_d04e40edfd8e, $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                                $_f60e006196fb .= '{' . $_d04e40edfd8e . '}';
                            }
                            if (isset($_ce467557df24[$_44af9f79ea06]) && is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                            if (!isset($_ce467557df24[$_44af9f79ea06])) break;
                            if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_ELSEIF) continue; else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_ELSE) {
                                $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                                if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                                if ($_ce467557df24[$_44af9f79ea06] == '{') {
                                    $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                                    ++$_44af9f79ea06;
                                    $_6c1e753a12d0 = self::nspartitioning($_5a71f81a43eb, substr($_6c1e753a12d0, 1, -1), $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                                    $_f60e006196fb .= '{' . $_6c1e753a12d0 . '}';
                                } else {
                                    $_d04e40edfd8e = self::reads($_ce467557df24, $_44af9f79ea06);
                                    if (isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] == ';') $_d04e40edfd8e .= $_ce467557df24[$_44af9f79ea06++];
                                    $_d04e40edfd8e = self::nspartitioning($_5a71f81a43eb, $_d04e40edfd8e, $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                                    $_f60e006196fb .= '{' . $_d04e40edfd8e . '}';
                                }
                                break;
                            } else break;
                        }
                        break;
                    }
                    if (isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] == ';') $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++];
                    --$_44af9f79ea06;
                    $_a56962748828[] = count($_5a71f81a43eb);
                    if (!isset($_5a71f81a43eb[$_f60e006196fb])) {
                        $_d186186a7d16 = random_bytes(16);
                        $_5a71f81a43eb[$_f60e006196fb] = [
                            count($_5a71f81a43eb),
                            $_d186186a7d16,
                            self::partition_encode($_f60e006196fb, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c),
                        ];
                    }
                    $_d5cbf76f6b55 .= "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;";
                    $_d5cbf76f6b55 .= "if(isset(\$_ALOM_return))return \$_ALOM_result;\$_ALOM_result=eval(\AlomDecoder$_5b3eb1c32c0d::partition_decode(\AlomDecoder$_5b3eb1c32c0d::\$partition[" . $_5a71f81a43eb[$_f60e006196fb][0] . "],'" . base64_encode($_5a71f81a43eb[$_f60e006196fb][1]) . "','$_231acd6afa62'));";
                    $_f60e006196fb = '';
                } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_OBJECT_OPERATOR) {
                    $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    if ($_ce467557df24[$_44af9f79ea06] == '{') {
                        $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                        if ($_498b56a16a87) {
                            $_f60e006196fb .= $_6c1e753a12d0;
                        } else {
                            $_6c1e753a12d0 = self::nspartitioning($_5a71f81a43eb, substr($_6c1e753a12d0, 1, -1), $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                            $_f60e006196fb .= '{' . $_6c1e753a12d0 . '}';
                        }
                    } else--$_44af9f79ea06;
                } else if ($_ce467557df24[$_44af9f79ea06] == '$') {
                    $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++];
                    if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06++][1];
                    if ($_ce467557df24[$_44af9f79ea06] == '{') {
                        $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                        if ($_498b56a16a87) {
                            $_f60e006196fb .= $_6c1e753a12d0;
                        } else {
                            $_6c1e753a12d0 = self::nspartitioning($_5a71f81a43eb, substr($_6c1e753a12d0, 1, -1), $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                            $_f60e006196fb .= '{' . $_6c1e753a12d0 . '}';
                        }
                    } else--$_44af9f79ea06;
                } else if ($_ce467557df24[$_44af9f79ea06] == '{') {
                    $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                    $_6c1e753a12d0 = self::nspartitioning($_5a71f81a43eb, substr($_6c1e753a12d0, 1, -1), $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                    $_f60e006196fb .= '{' . $_6c1e753a12d0 . '}';
                } else if ($_ce467557df24[$_44af9f79ea06] == '(') {
                    $_6c1e753a12d0 = self::readl($_ce467557df24, '(', ')', $_44af9f79ea06);
                    if ($_498b56a16a87) {
                        $_f60e006196fb .= $_6c1e753a12d0;
                    } else {
                        $_6c1e753a12d0 = self::nspartitioning($_5a71f81a43eb, substr($_6c1e753a12d0, 1, -1), $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                        $_f60e006196fb .= '(' . $_6c1e753a12d0 . ')';
                    }
                } else if (is_array($_ce467557df24[$_44af9f79ea06])) $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06][1];
                else $_f60e006196fb .= $_ce467557df24[$_44af9f79ea06];
            }
            if (trim($_f60e006196fb) !== '') {
                $_f60e006196fb = $_2d1cac7779b8 . "return $_f60e006196fb;";
                $_a56962748828[] = count($_5a71f81a43eb);
                if (!isset($_5a71f81a43eb[$_f60e006196fb])) {
                    $_d186186a7d16 = random_bytes(16);
                    $_5a71f81a43eb[$_f60e006196fb] = [
                        count($_5a71f81a43eb),
                        $_d186186a7d16,
                        self::partition_encode($_f60e006196fb, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c),
                    ];
                }
                $_d5cbf76f6b55 .= "eval(\AlomDecoder$_5b3eb1c32c0d::partition_decode(\AlomDecoder$_5b3eb1c32c0d::\$partition[" . $_5a71f81a43eb[$_f60e006196fb][0] . "],'" . base64_encode($_5a71f81a43eb[$_f60e006196fb][1]) . "','$_231acd6afa62'))";
                $_f60e006196fb = '';
                return $_d5cbf76f6b55;
            } else {
                $_d5cbf76f6b55 = $_2d1cac7779b8 . $_d5cbf76f6b55;
                $_a56962748828[] = count($_5a71f81a43eb);
                if (!isset($_5a71f81a43eb[$_d5cbf76f6b55])) {
                    $_d186186a7d16 = random_bytes(16);
                    $_5a71f81a43eb[$_d5cbf76f6b55] = [
                        count($_5a71f81a43eb),
                        $_d186186a7d16,
                        self::partition_encode($_d5cbf76f6b55, $_d186186a7d16, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c),
                    ];
                }
                $_d5cbf76f6b55 = "if((isset(\$_ALOM_continue)&&\$_ALOM_continue>0)||(isset(\$_ALOM_break)&&\$_ALOM_break>0))return;" . "\$_ALOM_result=eval(\AlomDecoder$_5b3eb1c32c0d::partition_decode(\AlomDecoder$_5b3eb1c32c0d::\$partition[" . $_5a71f81a43eb[$_d5cbf76f6b55][0] . "],'" . base64_encode($_5a71f81a43eb[$_d5cbf76f6b55][1]) . "','$_231acd6afa62'));if(isset(\$_ALOM_return))return \$_ALOM_result;";
            }
            return $_d5cbf76f6b55;
        }

        public static function partitioning(&$_a56962748828, &$_5a71f81a43eb, $_d5cbf76f6b55, $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87 = FALSE)
        {
            $_ce467557df24 = token_get_all("<?" . "php $_d5cbf76f6b55");
            array_shift($_ce467557df24);
            $_231acd6afa62 = base64_encode($_231acd6afa62);
            $_d5cbf76f6b55 = $_2d1cac7779b8 = '';
            $_44af9f79ea06 = 0;
            while (isset($_ce467557df24[$_44af9f79ea06]) && ((is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                            T_WHITESPACE,
                            T_COMMENT,
                            T_DOC_COMMENT,
                        ])) || $_ce467557df24[$_44af9f79ea06] == ';')) $_d5cbf76f6b55 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06++][1] : $_ce467557df24[$_44af9f79ea06++];
            if (isset($_ce467557df24[$_44af9f79ea06]) && is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_NAMESPACE) {
                $_2d1cac7779b8 .= $_ce467557df24[$_44af9f79ea06++][1];
                while (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                        T_WHITESPACE,
                        T_STRING,
                        T_NS_SEPARATOR,
                    ])) $_2d1cac7779b8 .= $_ce467557df24[$_44af9f79ea06++][1];
                if ($_ce467557df24[$_44af9f79ea06] == '{') {
                    $_22a0069e993a = substr(self::readl($_ce467557df24, '{', '}', $_44af9f79ea06), 1, -1);
                    ++$_44af9f79ea06;
                    while (isset($_ce467557df24[$_44af9f79ea06]) && ((is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                                    T_WHITESPACE,
                                    T_COMMENT,
                                    T_DOC_COMMENT,
                                ])) || $_ce467557df24[$_44af9f79ea06] == ';')) $_2d1cac7779b8 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06++][1] : $_ce467557df24[$_44af9f79ea06++];
                    $_22a0069e993a = self::nspartitioning($_5a71f81a43eb, $_22a0069e993a, $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8);
                    $_d5cbf76f6b55 .= $_22a0069e993a;
                    $_2d1cac7779b8 = '';
                    while (isset($_ce467557df24[$_44af9f79ea06]) && is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_NAMESPACE) {
                        $_2d1cac7779b8 .= $_ce467557df24[$_44af9f79ea06++][1];
                        while (isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '{') $_2d1cac7779b8 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06++][1] : $_ce467557df24[$_44af9f79ea06++];
                        $_22a0069e993a = substr(self::readl($_ce467557df24, '{', '}', $_44af9f79ea06), 1, -1);
                        ++$_44af9f79ea06;
                        while (isset($_ce467557df24[$_44af9f79ea06]) && ((is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                                        T_WHITESPACE,
                                        T_COMMENT,
                                        T_DOC_COMMENT,
                                    ])) || $_ce467557df24[$_44af9f79ea06] == ';')) $_2d1cac7779b8 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06++][1] : $_ce467557df24[$_44af9f79ea06++];
                        $_22a0069e993a = self::nspartitioning($_5a71f81a43eb, $_22a0069e993a, $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                        $_d5cbf76f6b55 .= $_22a0069e993a;
                        $_2d1cac7779b8 = '';
                    }
                } else {
                    $_2d1cac7779b8 .= $_ce467557df24[$_44af9f79ea06++];
                    while (isset($_ce467557df24[$_44af9f79ea06]) && ((is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                                    T_WHITESPACE,
                                    T_COMMENT,
                                    T_DOC_COMMENT,
                                ])) || $_ce467557df24[$_44af9f79ea06] == ';')) $_2d1cac7779b8 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06++][1] : $_ce467557df24[$_44af9f79ea06++];
                    while (isset($_ce467557df24[$_44af9f79ea06]) && is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_NAMESPACE) {
                        $_2d1cac7779b8 .= $_ce467557df24[$_44af9f79ea06++][1];
                        while (is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                                T_WHITESPACE,
                                T_STRING,
                                T_NS_SEPARATOR,
                            ])) $_2d1cac7779b8 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06++][1] : $_ce467557df24[$_44af9f79ea06++];
                        $_2d1cac7779b8 .= $_ce467557df24[$_44af9f79ea06++];
                        while (isset($_ce467557df24[$_44af9f79ea06]) && ((is_array($_ce467557df24[$_44af9f79ea06]) && in_array($_ce467557df24[$_44af9f79ea06][0], [
                                        T_WHITESPACE,
                                        T_COMMENT,
                                        T_DOC_COMMENT,
                                    ])) || $_ce467557df24[$_44af9f79ea06] == ';')) $_2d1cac7779b8 .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06++][1] : $_ce467557df24[$_44af9f79ea06++];
                    }
                    $_22a0069e993a = '';
                    for (; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) $_22a0069e993a .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
                    $_22a0069e993a = self::nspartitioning($_5a71f81a43eb, $_22a0069e993a, $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                    $_d5cbf76f6b55 .= $_22a0069e993a;
                }
            } else {
                $_22a0069e993a = '';
                for (; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) $_22a0069e993a .= is_array($_ce467557df24[$_44af9f79ea06]) ? $_ce467557df24[$_44af9f79ea06][1] : $_ce467557df24[$_44af9f79ea06];
                $_22a0069e993a = self::nspartitioning($_5a71f81a43eb, $_22a0069e993a, $_61152f9ba785, $_5b3eb1c32c0d, $_e790ce3071f2, $_91dba975883a, $_9b3c20ca2a6c, $_231acd6afa62, $_498b56a16a87, $_2d1cac7779b8, $_a56962748828);
                $_d5cbf76f6b55 .= $_22a0069e993a;
            }
            $_09fe86acdf26 = $_5a71f81a43eb;
            $_5a71f81a43eb = [];
            foreach ($_09fe86acdf26 as $_f60e006196fb) $_5a71f81a43eb[$_f60e006196fb[0]] = $_f60e006196fb[2];
            return $_d5cbf76f6b55;
        }

        public static function getcallable($_a2315524abb8)
        {
            if (is_string($_a2315524abb8)) {
                $_a2315524abb8 = strtolower($_a2315524abb8);
                if (in_array($_a2315524abb8, ["print", "echo"])) return '';
                if (in_array($_a2315524abb8, ["exit", "die"])) return $_a2315524abb8 . ';';
            }
            if (is_object($_a2315524abb8) || is_numeric($_a2315524abb8)) $_52209a9cc716 = new ReflectionFunction($_a2315524abb8); else if (is_string($_a2315524abb8)) {
                $_a2315524abb8 = explode('::', $_a2315524abb8, 2);
                if (!isset($_a2315524abb8[1])) {
                    $_52209a9cc716 = new ReflectionFunction($_a2315524abb8[0]);
                } else {
                    $_52209a9cc716 = new ReflectionMethod($_a2315524abb8[0], $_a2315524abb8[1]);
                }
            } else if (is_array($_a2315524abb8)) {
                if (!isset($_a2315524abb8[0])) return '';
                if (!isset($_a2315524abb8[1])) {
                    $_52209a9cc716 = new ReflectionFunction($_a2315524abb8[0]);
                } else {
                    $_52209a9cc716 = new ReflectionMethod($_a2315524abb8[0], $_a2315524abb8[1]);
                }
            } else return '';
            $_4fc9ab696503 = $_52209a9cc716->getFileName();
            if (!$_4fc9ab696503) return $_a2315524abb8 . '();';
            $_83aa7a8f66c7 = $_52209a9cc716->getStartLine() - 1;
            $_8a1ef48bd59b = $_52209a9cc716->getEndLine();
            $_43e6ec2ea9c2 = file($_4fc9ab696503);
            $_43e6ec2ea9c2 = array_slice($_43e6ec2ea9c2, $_83aa7a8f66c7, $_8a1ef48bd59b - $_83aa7a8f66c7);
            $_43e6ec2ea9c2 = implode('', $_43e6ec2ea9c2);
            $_fed760c6c858 = strtolower($_52209a9cc716->getName());
            $_ce467557df24 = token_get_all("<" . "?php $_43e6ec2ea9c2");
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06]) && ($_ce467557df24[$_44af9f79ea06][0] == T_FN || $_ce467557df24[$_44af9f79ea06][0] == T_FUNCTION)) {
                if (is_array($_ce467557df24[++$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) ++$_44af9f79ea06;
                if ($_fed760c6c858 != '{closure}') {
                    if (!is_array($_ce467557df24[$_44af9f79ea06]) || $_ce467557df24[$_44af9f79ea06][0] != T_STRING || strtolower($_ce467557df24[$_44af9f79ea06][1]) != $_fed760c6c858) {
                        --$_44af9f79ea06;
                        continue;
                    }
                    if (is_array($_ce467557df24[++$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) ++$_44af9f79ea06;
                }
                if ($_ce467557df24[$_44af9f79ea06] != '(') {
                    --$_44af9f79ea06;
                    continue;
                }
                self::readl($_ce467557df24, '(', ')', $_44af9f79ea06);
                if (is_array($_ce467557df24[++$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) ++$_44af9f79ea06;
                if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_USE) {
                    if (is_array($_ce467557df24[++$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) ++$_44af9f79ea06;
                    if ($_ce467557df24[$_44af9f79ea06] != '(') {
                        --$_44af9f79ea06;
                        continue;
                    }
                    self::readl($_ce467557df24, '(', ')', $_44af9f79ea06);
                    if (is_array($_ce467557df24[++$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) ++$_44af9f79ea06;
                }
                if ($_ce467557df24[$_44af9f79ea06] == ':') {
                    if (is_array($_ce467557df24[++$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) ++$_44af9f79ea06;
                    while (is_array($_ce467557df24[$_44af9f79ea06]) && ($_ce467557df24[$_44af9f79ea06][0] == T_STRING || $_ce467557df24[$_44af9f79ea06][0] == T_NS_SEPARATOR || $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE)) ++$_44af9f79ea06;
                }
                if (is_array($_ce467557df24[$_44af9f79ea06])) {
                    if ($_ce467557df24[$_44af9f79ea06][0] != T_DOUBLE_ARROW) {
                        --$_44af9f79ea06;
                        continue;
                    }
                    if (is_array($_ce467557df24[++$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_WHITESPACE) ++$_44af9f79ea06;
                    $_23bf89ec40b6 = 'return ';
                    for (; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (in_array($_ce467557df24[$_44af9f79ea06], [
                        ')',
                        ']',
                        '}',
                        ',',
                        ';',
                    ])) break; else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_CLOSE_TAG) break;
                    else if (is_array($_ce467557df24[$_44af9f79ea06])) $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06][1];
                    else $_23bf89ec40b6 .= $_ce467557df24[$_44af9f79ea06];
                    $_23bf89ec40b6 .= ';';
                    return $_23bf89ec40b6;
                } else {
                    if ($_ce467557df24[$_44af9f79ea06] != '{') {
                        --$_44af9f79ea06;
                        continue;
                    }
                    $_23bf89ec40b6 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                    $_23bf89ec40b6 = trim(substr($_23bf89ec40b6, 1, -1));
                    return $_23bf89ec40b6;
                }
            }
            return '';
        }

        public static function sizeformat($_9f3b56b90a07)
        {
            if ($_9f3b56b90a07 >= 1024 * 1024 * 1024 * 1024 * 1024 * 1024) return round($_9f3b56b90a07 / 1024 / 1024 / 1024 / 1024 / 1024 / 1024, 1) . "zb";
            if ($_9f3b56b90a07 >= 1024 * 1024 * 1024 * 1024 * 1024) return round($_9f3b56b90a07 / 1024 / 1024 / 1024 / 1024 / 1024, 1) . "eb";
            if ($_9f3b56b90a07 >= 1024 * 1024 * 1024 * 1024) return round($_9f3b56b90a07 / 1024 / 1024 / 1024 / 1024, 1) . "tb";
            if ($_9f3b56b90a07 >= 1024 * 1024 * 1024) return round($_9f3b56b90a07 / 1024 / 1024 / 1024, 1) . "gb";
            if ($_9f3b56b90a07 >= 1024 * 1024) return round($_9f3b56b90a07 / 1024 / 1024, 1) . "mb";
            if ($_9f3b56b90a07 >= 1024) return round($_9f3b56b90a07 / 1024, 1) . "kb";
            return round($_9f3b56b90a07) . "b";
        }

        public static function license_key_generate($_243570ef6ff2 = NULL)
        {
            if ($_243570ef6ff2 === NULL) $_d186186a7d16 = random_bytes(32); else $_d186186a7d16 = hash('sha256', "Alom License N&.~>.ZYv;V5lN0h " . (string)$_243570ef6ff2 . '%');
            return bin2hex($_d186186a7d16);
        }

        public static function license_find_code($_5d1ad1d86b62)
        {
            if (!preg_match("/license code: (\[[0-9a-fA-F*-]+])/i", $_5d1ad1d86b62, $_358662e4fc83)) return FALSE;
            return $_358662e4fc83[1];
        }

        public static function license_insert_code($_5d1ad1d86b62, $_d5cbf76f6b55 = '[************************************************-********************************-****************]') { return preg_replace("/license code: (\[[0-9a-fA-F*-]+])/i", 'license code: ' . $_d5cbf76f6b55, $_5d1ad1d86b62); }

        public static function license_null_systemhash_generate() { return "NULL SYSTEMHASH X</k/LMI3M7Et@\*\*"; }

        public static function license_systemhash_generate($_cc7b9ef7c49d, $_71ee7a2be8bc, $_70e3f7fbcdd8, $_a58d25e9a4f2)
        {
            $_62e8a0d7de46 = "SYSTEMHASH Xcpv{E^Bk9eq\*VIm";
            $_62e8a0d7de46 .= "un:$_cc7b9ef7c49d\n";
            $_62e8a0d7de46 .= "us:$_71ee7a2be8bc\n";
            $_62e8a0d7de46 .= "ip:$_70e3f7fbcdd8\n";
            $_62e8a0d7de46 .= "hn:$_a58d25e9a4f2\n";
            return md5($_62e8a0d7de46, TRUE);
        }

        public static function license_code_encrypt($_03b34b704926, $_cc45d601472a, $_07308be74dc0, $_85e9b296e2f6)
        {
            $_7520f8b4b421 = self::$_7520f8b4b421;
            $_468b0eed41c8 = self::$_468b0eed41c8;
            if (strlen($_85e9b296e2f6) == 64) $_85e9b296e2f6 = hex2bin($_85e9b296e2f6); else if (strlen($_85e9b296e2f6) != 32) $_85e9b296e2f6 = hash('sha256', $_85e9b296e2f6, TRUE);
            if (strlen($_07308be74dc0) != 16) $_07308be74dc0 = md5($_07308be74dc0, TRUE);
            $_03b34b704926 = (int)$_03b34b704926;
            $_cc45d601472a = (int)$_cc45d601472a;
            $_01f86327f477 = "%zqYJ3}rX\xfeZ2hA.]Ss0(Xv1z";
            $_2f79040d85dc = $_01f86327f477 . $_07308be74dc0 . pack("N2", $_03b34b704926 ^ 0xf9a02eec, $_cc45d601472a ^ 0x2904a19b);
            $_2f79040d85dc = array_values(unpack('C*', $_2f79040d85dc));
            $_85e9b296e2f6 = array_values(unpack('C*', $_85e9b296e2f6));
            for ($_d87f4c1f5462 = 0; $_d87f4c1f5462 < 52; ++$_d87f4c1f5462) {
                for ($_44af9f79ea06 = 48 - 1; $_44af9f79ea06 >= 0; --$_44af9f79ea06) {
                    $_8bd220e50993 = (7 * $_44af9f79ea06 + 1) % 48;
                    $_76ea69771708 = (3 * $_44af9f79ea06 + $_8bd220e50993 + 7) % 48;
                    $_40d1e3c43b78 = (11 * $_44af9f79ea06 + $_76ea69771708 + 5) % 48;
                    if ($_8bd220e50993 == $_44af9f79ea06) $_8bd220e50993 = (3 * $_8bd220e50993 + 5) % 48;
                    if ($_76ea69771708 == $_44af9f79ea06) $_76ea69771708 = (7 * $_76ea69771708 + 13) % 48;
                    if ($_40d1e3c43b78 == $_44af9f79ea06) $_40d1e3c43b78 = (11 * $_40d1e3c43b78 + 3) % 48;
                    $_4d693db07b39 = $_85e9b296e2f6[(3 * $_40d1e3c43b78 + 5 * $_44af9f79ea06 + 7) % 32];
                    $_6dcc89ef5930 = $_85e9b296e2f6[(5 * $_8bd220e50993 + 7 * $_44af9f79ea06 + 11) % 32];
                    $_b87938c399a1 = $_85e9b296e2f6[(7 * $_76ea69771708 + 11 * $_44af9f79ea06 + 3) % 32];
                    for ($_9e721865cfe7 = 0; $_9e721865cfe7 < 2; ++$_9e721865cfe7) {
                        $_4d693db07b39 = $_85e9b296e2f6[(3 * $_40d1e3c43b78 + 5 * $_b87938c399a1 + 7 * $_44af9f79ea06 + 11) % 32];
                        $_6dcc89ef5930 = $_85e9b296e2f6[(5 * $_8bd220e50993 + 7 * $_4d693db07b39 + 11 * $_44af9f79ea06 + 3) % 32];
                        $_b87938c399a1 = $_85e9b296e2f6[(7 * $_76ea69771708 + 11 * $_6dcc89ef5930 + 3 * $_44af9f79ea06 + 5) % 32];
                    }
                    $_4d693db07b39 = (3 * $_40d1e3c43b78 + 5 * $_b87938c399a1 + 7 * $_44af9f79ea06 + 11) % 32;
                    $_6dcc89ef5930 = (5 * $_8bd220e50993 + 7 * $_4d693db07b39 + 11 * $_44af9f79ea06 + 3) % 32;
                    $_b87938c399a1 = (7 * $_76ea69771708 + 11 * $_6dcc89ef5930 + 3 * $_44af9f79ea06 + 5) % 32;
                    $_2f79040d85dc[$_44af9f79ea06] = $_468b0eed41c8[$_2f79040d85dc[$_44af9f79ea06] ^ $_8bd220e50993] ^ $_85e9b296e2f6[$_b87938c399a1] ^ $_7520f8b4b421[$_2f79040d85dc[$_76ea69771708] ^ $_2f79040d85dc[$_40d1e3c43b78]];
                    $_2f79040d85dc[$_44af9f79ea06] = $_468b0eed41c8[$_2f79040d85dc[$_44af9f79ea06] ^ $_40d1e3c43b78] ^ $_85e9b296e2f6[$_b87938c399a1] ^ $_7520f8b4b421[$_2f79040d85dc[$_8bd220e50993] & $_2f79040d85dc[$_76ea69771708]];
                    $_2f79040d85dc[$_44af9f79ea06] = $_468b0eed41c8[$_2f79040d85dc[$_44af9f79ea06] ^ $_b87938c399a1] ^ $_85e9b296e2f6[$_6dcc89ef5930] ^ $_7520f8b4b421[$_2f79040d85dc[$_8bd220e50993] | $_2f79040d85dc[$_40d1e3c43b78]];
                    $_2f79040d85dc[$_44af9f79ea06] = $_468b0eed41c8[$_2f79040d85dc[$_44af9f79ea06] ^ $_6dcc89ef5930] ^ $_85e9b296e2f6[$_4d693db07b39] ^ $_7520f8b4b421[$_2f79040d85dc[$_76ea69771708] & $_2f79040d85dc[$_40d1e3c43b78]];
                    $_2f79040d85dc[$_44af9f79ea06] = $_468b0eed41c8[$_2f79040d85dc[$_44af9f79ea06] ^ $_4d693db07b39] ^ $_85e9b296e2f6[$_4d693db07b39] ^ $_7520f8b4b421[$_2f79040d85dc[$_8bd220e50993] ^ $_2f79040d85dc[$_76ea69771708]];
                }
            }
            array_unshift($_2f79040d85dc, 'C*');
            $_2f79040d85dc = bin2hex(call_user_func_array('pack', $_2f79040d85dc));
            return '[' . substr($_2f79040d85dc, 0, 48) . '-' . substr($_2f79040d85dc, 48, 32) . '-' . substr($_2f79040d85dc, 80, 16) . ']';
        }

        public static function license_code_decrypt($_2f79040d85dc, $_85e9b296e2f6)
        {
            $_7520f8b4b421 = self::$_7520f8b4b421;
            if (strlen($_85e9b296e2f6) == 64) $_85e9b296e2f6 = hex2bin($_85e9b296e2f6); else if (strlen($_85e9b296e2f6) != 32) $_85e9b296e2f6 = hash('sha256', $_85e9b296e2f6, TRUE);
            $_01f86327f477 = "%zqYJ3}rX\xfeZ2hA.]Ss0(Xv1z";
            $_2f79040d85dc = hex2bin(str_replace([' ', "\n", "\r", "\t", '-', '[', ']', '*'], '', $_2f79040d85dc));
            $_2f79040d85dc = array_values(unpack('C*', $_2f79040d85dc));
            $_85e9b296e2f6 = array_values(unpack('C*', $_85e9b296e2f6));
            for ($_d87f4c1f5462 = 0; $_d87f4c1f5462 < 52; ++$_d87f4c1f5462) {
                for ($_44af9f79ea06 = 0; $_44af9f79ea06 < 48; ++$_44af9f79ea06) {
                    $_8bd220e50993 = (7 * $_44af9f79ea06 + 1) % 48;
                    $_76ea69771708 = (3 * $_44af9f79ea06 + $_8bd220e50993 + 7) % 48;
                    $_40d1e3c43b78 = (11 * $_44af9f79ea06 + $_76ea69771708 + 5) % 48;
                    if ($_8bd220e50993 == $_44af9f79ea06) $_8bd220e50993 = (3 * $_8bd220e50993 + 5) % 48;
                    if ($_76ea69771708 == $_44af9f79ea06) $_76ea69771708 = (7 * $_76ea69771708 + 13) % 48;
                    if ($_40d1e3c43b78 == $_44af9f79ea06) $_40d1e3c43b78 = (11 * $_40d1e3c43b78 + 3) % 48;
                    $_4d693db07b39 = $_85e9b296e2f6[(3 * $_40d1e3c43b78 + 5 * $_44af9f79ea06 + 7) % 32];
                    $_6dcc89ef5930 = $_85e9b296e2f6[(5 * $_8bd220e50993 + 7 * $_44af9f79ea06 + 11) % 32];
                    $_b87938c399a1 = $_85e9b296e2f6[(7 * $_76ea69771708 + 11 * $_44af9f79ea06 + 3) % 32];
                    for ($_9e721865cfe7 = 0; $_9e721865cfe7 < 2; ++$_9e721865cfe7) {
                        $_4d693db07b39 = $_85e9b296e2f6[(3 * $_40d1e3c43b78 + 5 * $_b87938c399a1 + 7 * $_44af9f79ea06 + 11) % 32];
                        $_6dcc89ef5930 = $_85e9b296e2f6[(5 * $_8bd220e50993 + 7 * $_4d693db07b39 + 11 * $_44af9f79ea06 + 3) % 32];
                        $_b87938c399a1 = $_85e9b296e2f6[(7 * $_76ea69771708 + 11 * $_6dcc89ef5930 + 3 * $_44af9f79ea06 + 5) % 32];
                    }
                    $_4d693db07b39 = (3 * $_40d1e3c43b78 + 5 * $_b87938c399a1 + 7 * $_44af9f79ea06 + 11) % 32;
                    $_6dcc89ef5930 = (5 * $_8bd220e50993 + 7 * $_4d693db07b39 + 11 * $_44af9f79ea06 + 3) % 32;
                    $_b87938c399a1 = (7 * $_76ea69771708 + 11 * $_6dcc89ef5930 + 3 * $_44af9f79ea06 + 5) % 32;
                    $_2f79040d85dc[$_44af9f79ea06] = $_7520f8b4b421[$_2f79040d85dc[$_44af9f79ea06] ^ $_85e9b296e2f6[$_4d693db07b39] ^ $_7520f8b4b421[$_2f79040d85dc[$_8bd220e50993] ^ $_2f79040d85dc[$_76ea69771708]]] ^ $_4d693db07b39;
                    $_2f79040d85dc[$_44af9f79ea06] = $_7520f8b4b421[$_2f79040d85dc[$_44af9f79ea06] ^ $_85e9b296e2f6[$_4d693db07b39] ^ $_7520f8b4b421[$_2f79040d85dc[$_76ea69771708] & $_2f79040d85dc[$_40d1e3c43b78]]] ^ $_6dcc89ef5930;
                    $_2f79040d85dc[$_44af9f79ea06] = $_7520f8b4b421[$_2f79040d85dc[$_44af9f79ea06] ^ $_85e9b296e2f6[$_6dcc89ef5930] ^ $_7520f8b4b421[$_2f79040d85dc[$_8bd220e50993] | $_2f79040d85dc[$_40d1e3c43b78]]] ^ $_b87938c399a1;
                    $_2f79040d85dc[$_44af9f79ea06] = $_7520f8b4b421[$_2f79040d85dc[$_44af9f79ea06] ^ $_85e9b296e2f6[$_b87938c399a1] ^ $_7520f8b4b421[$_2f79040d85dc[$_8bd220e50993] & $_2f79040d85dc[$_76ea69771708]]] ^ $_40d1e3c43b78;
                    $_2f79040d85dc[$_44af9f79ea06] = $_7520f8b4b421[$_2f79040d85dc[$_44af9f79ea06] ^ $_85e9b296e2f6[$_b87938c399a1] ^ $_7520f8b4b421[$_2f79040d85dc[$_76ea69771708] ^ $_2f79040d85dc[$_40d1e3c43b78]]] ^ $_8bd220e50993;
                }
            }
            array_unshift($_2f79040d85dc, 'C*');
            $_2f79040d85dc = call_user_func_array('pack', $_2f79040d85dc);
            if (substr($_2f79040d85dc, 0, 24) != $_01f86327f477) return FALSE;
            $_6c0ba4a6c965 = unpack('N2', substr($_2f79040d85dc, 40, 8));
            return ['systemhash' => substr($_2f79040d85dc, 24, 16), 'ready' => $_6c0ba4a6c965[1] ^ 0xf9a02eec, 'expiration' => $_6c0ba4a6c965[2] ^ 0x2904a19b];
        }

        public static function gcmake($_d5cbf76f6b55, $_5b3eb1c32c0d, &$_37a746be78db = 0)
        {
            $_ce467557df24 = token_get_all($_d5cbf76f6b55);
            $_bd34d9e828bc = [];
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_VARIABLE && !in_array($_ce467557df24[$_44af9f79ea06][1], [
                    '$_ALOM_code',
                    '$this',
                ])) {
                $_bd34d9e828bc[] = [$_37a746be78db + 1, "GLOBALS['", 0];
                $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]) + 9;
                $_bd34d9e828bc[] = [$_37a746be78db, "']", 0];
                $_37a746be78db += 2;
            } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_START_HEREDOC && strpos($_ce467557df24[$_44af9f79ea06][1], "'") === FALSE) {
                $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]);
                for (++$_44af9f79ea06; isset($_ce467557df24[$_44af9f79ea06]) && (!is_array($_ce467557df24[$_44af9f79ea06]) || $_ce467557df24[$_44af9f79ea06][0] != T_END_HEREDOC); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_VARIABLE && !in_array($_ce467557df24[$_44af9f79ea06][1], [
                        '$_ALOM_code',
                        '$this',
                    ])) {
                    $_bd34d9e828bc[] = [$_37a746be78db, "{\$GLOBALS['", 1];
                    $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]) + 10;
                    if ($_ce467557df24[++$_44af9f79ea06] == '[') {
                        if (is_array($_ce467557df24[++$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_STRING) {
                            $_bd34d9e828bc[] = [$_37a746be78db, "']['", 1];
                            $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]) + 4;
                            $_bd34d9e828bc[] = [$_37a746be78db, "']}", 1];
                            $_37a746be78db += 3;
                        } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_NUM_STRING) {
                            $_bd34d9e828bc[] = [$_37a746be78db, "'][", 1];
                            $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]) + 3;
                            $_bd34d9e828bc[] = [$_37a746be78db, "]}", 1];
                            $_37a746be78db += 2;
                        } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_VARIABLE) {
                            $_bd34d9e828bc[] = [$_37a746be78db, "'][\$GLOBALS['", 2];
                            $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]) + 12;
                            $_bd34d9e828bc[] = [$_37a746be78db, "']]}", 1];
                            $_37a746be78db += 4;
                        }
                        ++$_44af9f79ea06;
                    } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_OBJECT_OPERATOR) {
                        if (is_array($_ce467557df24[++$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_STRING) {
                            $_bd34d9e828bc[] = [$_37a746be78db, "']", 0];
                            $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]) + 4;
                            $_bd34d9e828bc[] = [$_37a746be78db, "}", 0];
                            ++$_37a746be78db;
                        }
                    } else {
                        $_bd34d9e828bc[] = [$_37a746be78db, "']}", 0];
                        $_37a746be78db += 3;
                        --$_44af9f79ea06;
                    }
                } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_DOLLAR_OPEN_CURLY_BRACES) {
                    $_ce467557df24[$_44af9f79ea06] = '{';
                    $_37a746be78db += 2;
                    $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                    $_33acc18097b4 = self::gcmake("<" . "?php \$" . substr($_6c1e753a12d0, 1, -1) . ";?" . ">", $_5b3eb1c32c0d, $_37a746be78db);
                    foreach ($_33acc18097b4 as &$_c003a1341591) $_c003a1341591[0] -= 7;
                    $_bd34d9e828bc = array_merge($_bd34d9e828bc, $_33acc18097b4);
                    $_37a746be78db -= 9;
                } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_CURLY_OPEN) {
                    $_ce467557df24[$_44af9f79ea06] = '{';
                    $_37a746be78db += 2;
                    $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                    $_33acc18097b4 = self::gcmake("<" . "?php " . substr($_6c1e753a12d0, 1, -1) . ";?" . ">", $_5b3eb1c32c0d, $_37a746be78db);
                    foreach ($_33acc18097b4 as &$_c003a1341591) $_c003a1341591[0] -= 7;
                    $_bd34d9e828bc = array_merge($_bd34d9e828bc, $_33acc18097b4);
                    $_37a746be78db -= 9;
                } else if (is_array($_ce467557df24[$_44af9f79ea06])) $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]);
                else $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06]);
                $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]);
            } else if (is_array($_ce467557df24[$_44af9f79ea06])) $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]);
            else if ($_ce467557df24[$_44af9f79ea06] == '$') {
                if ($_ce467557df24[$_44af9f79ea06 + 1] == '{') {
                    $_44af9f79ea06 += 2;
                    $_bd34d9e828bc[] = [$_37a746be78db + 1, "GLOBALS[", 1];
                    $_37a746be78db += 9;
                    $_6bd7e3077fe8 = self::readpe($_ce467557df24, $_44af9f79ea06);
                    $_e5ba1f1551d1 = self::gcmake("<" . "?php $_6bd7e3077fe8;?" . ">", $_5b3eb1c32c0d, $_37a746be78db);
                    foreach ($_e5ba1f1551d1 as &$_745187e78d5c) $_745187e78d5c[0] -= 6;
                    $_bd34d9e828bc = array_merge($_bd34d9e828bc, $_e5ba1f1551d1);
                    $_37a746be78db -= 9;
                    $_bd34d9e828bc[] = [$_37a746be78db, "]", 1];
                } else {
                    $_9499c2a16c8e = 1;
                    while ($_ce467557df24[++$_44af9f79ea06] == '$') ++$_9499c2a16c8e;
                    for ($_d87f4c1f5462 = 0; $_d87f4c1f5462 < $_9499c2a16c8e; ++$_d87f4c1f5462) {
                        $_bd34d9e828bc[] = [$_37a746be78db + 1, "GLOBALS[", 0];
                        $_37a746be78db += 9;
                    }
                    if ($_ce467557df24[$_44af9f79ea06][0] == T_VARIABLE) {
                        $_bd34d9e828bc[] = [$_37a746be78db + 1, 0];
                        $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]) + 9;
                        $_bd34d9e828bc[] = [$_37a746be78db, 1];
                        $_37a746be78db += 2;
                    } else--$_44af9f79ea06;
                    for ($_d87f4c1f5462 = 0; $_d87f4c1f5462 < $_9499c2a16c8e; ++$_d87f4c1f5462) {
                        $_bd34d9e828bc[] = [$_37a746be78db, "]", 0];
                        ++$_37a746be78db;
                    }
                }
            } else if ($_ce467557df24[$_44af9f79ea06] == '"' || $_ce467557df24[$_44af9f79ea06] == '`') {
                ++$_37a746be78db;
                for (++$_44af9f79ea06; isset($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06] != '"' && $_ce467557df24[$_44af9f79ea06] != '`'; ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_VARIABLE && !in_array($_ce467557df24[$_44af9f79ea06][1], [
                        '$_ALOM_code',
                        '$this',
                    ])) {
                    $_bd34d9e828bc[] = [$_37a746be78db, "{\$GLOBALS['", 1];
                    $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]) + 10;
                    if ($_ce467557df24[++$_44af9f79ea06] == '[') {
                        if (is_array($_ce467557df24[++$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_STRING) {
                            $_bd34d9e828bc[] = [$_37a746be78db, "']['", 1];
                            $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]) + 4;
                            $_bd34d9e828bc[] = [$_37a746be78db, "']}", 1];
                            $_37a746be78db += 3;
                        } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_NUM_STRING) {
                            $_bd34d9e828bc[] = [$_37a746be78db, "'][", 1];
                            $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]) + 3;
                            $_bd34d9e828bc[] = [$_37a746be78db, "]}", 1];
                            $_37a746be78db += 2;
                        } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_VARIABLE) {
                            $_bd34d9e828bc[] = [$_37a746be78db, "'][\$GLOBALS['", 2];
                            $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]) + 12;
                            $_bd34d9e828bc[] = [$_37a746be78db, "']]}", 1];
                            $_37a746be78db += 4;
                        }
                        ++$_44af9f79ea06;
                    } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_OBJECT_OPERATOR) {
                        if (is_array($_ce467557df24[++$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_STRING) {
                            $_bd34d9e828bc[] = [$_37a746be78db, "']", 0];
                            $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]) + 4;
                            $_bd34d9e828bc[] = [$_37a746be78db, "}", 0];
                            ++$_37a746be78db;
                        }
                    } else {
                        $_bd34d9e828bc[] = [$_37a746be78db, "']}", 0];
                        $_37a746be78db += 3;
                        --$_44af9f79ea06;
                    }
                } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_DOLLAR_OPEN_CURLY_BRACES) {
                    $_ce467557df24[$_44af9f79ea06] = '{';
                    $_37a746be78db += 2;
                    $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                    $_33acc18097b4 = self::gcmake("<" . "?php \$" . substr($_6c1e753a12d0, 1, -1) . ";?" . ">", $_5b3eb1c32c0d, $_37a746be78db);
                    foreach ($_33acc18097b4 as &$_c003a1341591) $_c003a1341591[0] -= 7;
                    $_bd34d9e828bc = array_merge($_bd34d9e828bc, $_33acc18097b4);
                    $_37a746be78db -= 9;
                } else if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_CURLY_OPEN) {
                    $_ce467557df24[$_44af9f79ea06] = '{';
                    $_37a746be78db += 2;
                    $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                    $_33acc18097b4 = self::gcmake("<" . "?php " . substr($_6c1e753a12d0, 1, -1) . ";?" . ">", $_5b3eb1c32c0d, $_37a746be78db);
                    foreach ($_33acc18097b4 as &$_c003a1341591) $_c003a1341591[0] -= 7;
                    $_bd34d9e828bc = array_merge($_bd34d9e828bc, $_33acc18097b4);
                    $_37a746be78db -= 9;
                } else if (is_array($_ce467557df24[$_44af9f79ea06])) $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06][1]);
                else $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06]);
                ++$_37a746be78db;
            } else $_37a746be78db += strlen($_ce467557df24[$_44af9f79ea06]);
            return $_bd34d9e828bc;
        }

        public static function unmeaning_string($_2f79040d85dc, $_9f3b56b90a07 = 12, $_068d233c378a = '_', $_0187a8a1d97a = '')
        {
            if (in_array($_2f79040d85dc, ['_ALOM_code', 'this'])) return $_2f79040d85dc;
            $_fc00f38c21f0 = md5($_9f3b56b90a07 . $_0187a8a1d97a . $_2f79040d85dc . $_068d233c378a . 'AlomUnmeaning+' . ALOM_VERSION);
            while (strlen($_fc00f38c21f0) < $_9f3b56b90a07) $_fc00f38c21f0 .= md5($_0187a8a1d97a . $_2f79040d85dc . $_fc00f38c21f0);
            return $_068d233c378a . substr($_fc00f38c21f0, 0, $_9f3b56b90a07);
        }

        public static function unmeaning($_d5cbf76f6b55, $_9f3b56b90a07 = 12, $_068d233c378a = '_', $_0187a8a1d97a = '', $_909697b5c852 = TRUE)
        {
            $_ce467557df24 = token_get_all($_d5cbf76f6b55);
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if ($_909697b5c852 && is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_VARIABLE) {
                $_fed760c6c858 = substr($_ce467557df24[$_44af9f79ea06][1], 1);
                $_fed760c6c858 = '$' . self::unmeaning_string($_fed760c6c858, $_9f3b56b90a07, $_068d233c378a, $_0187a8a1d97a);
                $_d5cbf76f6b55 .= $_fed760c6c858;
            } else if (is_array($_ce467557df24[$_44af9f79ea06])) $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1];
            else if ($_909697b5c852 && $_ce467557df24[$_44af9f79ea06] == '$') {
                if ($_ce467557df24[$_44af9f79ea06 + 1] == '{') {
                    $_44af9f79ea06 += 2;
                    $_6bd7e3077fe8 = self::readpe($_ce467557df24, $_44af9f79ea06);
                    $_6bd7e3077fe8 = self::unmeaning("<" . "?php $_6bd7e3077fe8;?" . ">", $_9f3b56b90a07, $_068d233c378a, $_0187a8a1d97a, $_909697b5c852);
                    $_6bd7e3077fe8 = "\AlomDecoder$_0187a8a1d97a::unmeaning(" . substr($_6bd7e3077fe8, 6, -3) . ",$_9f3b56b90a07,'$_068d233c378a')";
                    $_d5cbf76f6b55 .= '${' . $_6bd7e3077fe8;
                } else {
                    $_9499c2a16c8e = 1;
                    while ($_ce467557df24[++$_44af9f79ea06] == '$') ++$_9499c2a16c8e;
                    $_d5cbf76f6b55 .= str_repeat("\AlomDecoder$_0187a8a1d97a::unmeaning(", $_9499c2a16c8e);
                    if ($_ce467557df24[$_44af9f79ea06][0] == T_VARIABLE) {
                        $_fed760c6c858 = substr($_ce467557df24[$_44af9f79ea06][1], 1);
                        $_fed760c6c858 = '$' . self::unmeaning_string($_fed760c6c858, $_9f3b56b90a07, $_068d233c378a, $_0187a8a1d97a);
                        $_d5cbf76f6b55 .= $_fed760c6c858;
                    } else--$_44af9f79ea06;
                    $_d5cbf76f6b55 .= str_repeat(",$_9f3b56b90a07,'$_068d233c378a')", $_9499c2a16c8e);
                }
            } else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            return $_d5cbf76f6b55;
        }

        public static function createLogMsg($_49aa68a7da88, $_cbdfc7000a8f)
        {
            $_49aa68a7da88 = str_replace("\n", "\n  ", $_49aa68a7da88);
            $_926c6461c9e6 = error_reporting();
            switch ($_cbdfc7000a8f) {
                case 'success':
                case 'notice':
                    if (!($_926c6461c9e6 & E_USER_NOTICE) || !self::$_bf509b6a6b3d) return FALSE;
                    break;
                case 'warning':
                    if (!($_926c6461c9e6 & E_USER_WARNING)) return FALSE;
            }
            if (self::$_2b3c116ebf09) {
                switch ($_cbdfc7000a8f) {
                    case 'error':
                        $_49aa68a7da88 = "\e[31mAlom Error:   \e[0m$_49aa68a7da88\n";
                        break;
                    case 'success':
                        $_49aa68a7da88 = "\e[32mAlom Success: \e[0m$_49aa68a7da88\n";
                        break;
                    case 'warning':
                        $_49aa68a7da88 = "\e[33mAlom Warning: \e[0m$_49aa68a7da88\n";
                        break;
                    case 'notice':
                        $_49aa68a7da88 = "\e[36mAlom Notice:  \e[0m$_49aa68a7da88\n";
                        break;
                }
            } else {
                switch ($_cbdfc7000a8f) {
                    case 'error':
                        $_49aa68a7da88 = "Alom Error:   $_49aa68a7da88\n";
                        break;
                    case 'success':
                        $_49aa68a7da88 = "Alom Success: $_49aa68a7da88\n";
                        break;
                    case 'warning':
                        $_49aa68a7da88 = "Alom Warning: $_49aa68a7da88\n";
                        break;
                    case 'notice':
                        $_49aa68a7da88 = "Alom Notice:  $_49aa68a7da88\n";
                        break;
                }
            }
            return $_49aa68a7da88;
        }

        public static function log($_49aa68a7da88, $_cbdfc7000a8f = 'error')
        {
            if (self::$_2b3c116ebf09) {
                $_49aa68a7da88 = self::createLogMsg($_49aa68a7da88, $_cbdfc7000a8f);
                if ($_49aa68a7da88) {
                    print $_49aa68a7da88;
                }
            } else {
                if (!headers_sent()) {
                    header("Content-type: text/plain");
                }
                $_49aa68a7da88 = self::createLogMsg($_49aa68a7da88, $_cbdfc7000a8f);
                if ($_49aa68a7da88) {
                    error_log($_49aa68a7da88);
                    print $_49aa68a7da88;
                }
            }
            if ($_cbdfc7000a8f == 'error') {
                while (1) die;
            }
        }

        public static function backlog($_cbdfc7000a8f)
        {
            if (self::$_2b3c116ebf09) {
                $_926c6461c9e6 = error_reporting();
                switch ($_cbdfc7000a8f) {
                    case 'success':
                    case 'notice':
                        if (!($_926c6461c9e6 & E_USER_NOTICE) || !self::$_bf509b6a6b3d) return FALSE;
                        break;
                    case 'warning':
                        if (!($_926c6461c9e6 & E_USER_WARNING)) return FALSE;
                }
                print "\e[1A\e[2K";
                return TRUE;
            }
            return FALSE;
        }

        public static function removedLoader($_8ed714a238a8) { self::log("The loader file '$_8ed714a238a8' do not exists for complete obfuscatoring process!", 'error'); }

        public static function findQBC($_d5cbf76f6b55, $_78f65e614162, $_80e836368f40 = 5)
        {
            $_1a6ddb5e786d = str_repeat('f', $_80e836368f40);
            for ($_d87f4c1f5462 = 0; ; ++$_d87f4c1f5462) for ($_44af9f79ea06 = 0; $_44af9f79ea06 <= 0x7fffffff; ++$_44af9f79ea06) {
                $_fc00f38c21f0 = md5(str_replace($_78f65e614162, "$_44af9f79ea06-$_d87f4c1f5462", $_d5cbf76f6b55));
                if (substr($_fc00f38c21f0, 0, $_80e836368f40) == $_1a6ddb5e786d) return str_replace($_78f65e614162, "$_44af9f79ea06-$_d87f4c1f5462", $_d5cbf76f6b55);
            }
        }

        public static function obfuscator($_d5cbf76f6b55, $_9d1930831f12 = [])
        {
            if (is_string($_d5cbf76f6b55) && file_exists($_d5cbf76f6b55)) $_d5cbf76f6b55 = file_get_contents($_d5cbf76f6b55); else if (is_callable($_d5cbf76f6b55)) $_d5cbf76f6b55 = "<" . "?php\n" . self::getcallable($_d5cbf76f6b55) . "\n?" . ">";
            self::$_68aa9304b10c = microtime(TRUE);
            $_ebe2944af80d = md5(crc32($_d5cbf76f6b55) . rand() . self::$_68aa9304b10c, TRUE);
            $_5b3eb1c32c0d = substr(md5("alom:$_ebe2944af80d"), 0, 12);
            self::$_d186186a7d16[0] ^= rand();
            self::$_d186186a7d16[1] ^= rand();
            self::$_3227269fab81[0] = self::getasciiikey(16);
            self::$_3227269fab81[1] = self::getasciiikey(16);
            self::log("Script initialized. (unixtime: " . self::$_68aa9304b10c . ")\nsign:     " . bin2hex($_ebe2944af80d) . "\nsignflag: $_5b3eb1c32c0d", 'notice');
            $_02d46eb104a0 = '';
            $_ce467557df24 = token_get_all($_d5cbf76f6b55);
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06]) && $_ce467557df24[$_44af9f79ea06][0] == T_NAMESPACE) {
                while ($_ce467557df24[++$_44af9f79ea06] != '{' && $_ce467557df24[$_44af9f79ea06] != ';') ;
                if ($_ce467557df24[$_44af9f79ea06] == '{') {
                    $_6c1e753a12d0 = self::readl($_ce467557df24, '{', '}', $_44af9f79ea06);
                    $_02d46eb104a0 .= substr($_6c1e753a12d0, 1, -1);
                }
            } else if (is_array($_ce467557df24[$_44af9f79ea06])) $_02d46eb104a0 .= $_ce467557df24[$_44af9f79ea06][1];
            else $_02d46eb104a0 .= $_ce467557df24[$_44af9f79ea06];
            try {
                @eval("return;?>$_02d46eb104a0<?php");
            } catch (\Error | \Exception $_3b1ec3aca618) {
                self::log("Script error: " . $_3b1ec3aca618->getMessage() . " on line " . $_3b1ec3aca618->getLine());
                while (1) die;
            }
            unset($_02d46eb104a0);
            if (!isset($_9d1930831f12['rounds'])) $_9d1930831f12['rounds'] = [];
            if (!isset($_9d1930831f12['rounds']['main'])) {
                $_9d1930831f12['rounds']['main'] = ['depth_type' => 'logpower', 'depth' => 1];
            } else {
                if (!isset($_9d1930831f12['rounds']['main']['depth_type'])) {
                    $_9d1930831f12['rounds']['main']['depth_type'] = 'logpower';
                } else {
                    $_9d1930831f12['rounds']['main']['depth_type'] = strtolower($_9d1930831f12['rounds']['main']['depth_type']);
                    if (!in_array($_9d1930831f12['rounds']['main']['depth_type'], [
                        'constant',
                        'logarithm',
                        'logpower',
                        'square',
                        'linear',
                    ])) $_9d1930831f12['rounds']['main']['depth_type'] = 'logpower';
                }
                if (!isset($_9d1930831f12['rounds']['main']['depth']) || !is_numeric($_9d1930831f12['rounds']['main']['depth'])) {
                    self::log("The parameter rounds.main.depth is not initialized. Set to 1 by default.", 'notice');
                    $_9d1930831f12['rounds']['main']['depth'] = 1;
                } else $_9d1930831f12['rounds']['main']['depth'] = (float)$_9d1930831f12['rounds']['main']['depth'];
            }
            if (!isset($_9d1930831f12['rounds']['main']['extrascript_round'])) $_9d1930831f12['rounds']['main']['extrascript_round'] = TRUE;
            if (!isset($_9d1930831f12['rounds']['main']['base64rand_round'])) $_9d1930831f12['rounds']['main']['base64rand_round'] = FALSE;
            if (!isset($_9d1930831f12['rounds']['main']['deflate_round'])) $_9d1930831f12['rounds']['main']['deflate_round'] = TRUE;
            if (!isset($_9d1930831f12['rounds']['main']['iterate_base64'])) $_9d1930831f12['rounds']['main']['iterate_base64'] = 0;
            if (!isset($_9d1930831f12['rounds']['minify'])) {
                $_9d1930831f12['rounds']['minify'] = ['enable' => TRUE];
            } else {
                if (!isset($_9d1930831f12['rounds']['minify']['enable'])) $_9d1930831f12['rounds']['minify']['enable'] = TRUE;
            }
            if (!isset($_9d1930831f12['rounds']['optwister'])) {
                $_9d1930831f12['rounds']['optwister'] = ['enable' => FALSE];
            } else {
                if (!isset($_9d1930831f12['rounds']['optwister']['enable'])) $_9d1930831f12['rounds']['optwister']['enable'] = FALSE;
            }
            if (!isset($_9d1930831f12['rounds']['partitioning'])) {
                $_9d1930831f12['rounds']['partitioning'] = ['enable' => FALSE, 'fast' => FALSE];
            } else {
                if (!isset($_9d1930831f12['rounds']['partitioning']['enable'])) $_9d1930831f12['rounds']['partitioning']['enable'] = FALSE;
                if (!isset($_9d1930831f12['rounds']['partitioning']['fast'])) $_9d1930831f12['rounds']['partitioning']['fast'] = FALSE;
            }
            if ($_9d1930831f12['rounds']['partitioning']['enable']) $_9d1930831f12['rounds']['main']['iterate_base64'] = 0;
            if (!isset($_9d1930831f12['rounds']['antidebugger'])) {
                $_9d1930831f12['rounds']['antidebugger'] = ['enable' => TRUE];
            } else {
                if (!isset($_9d1930831f12['rounds']['antidebugger']['enable'])) $_9d1930831f12['rounds']['antidebugger']['enable'] = TRUE;
            }
            if (!isset($_9d1930831f12['rounds']['unmeaning'])) $_9d1930831f12['rounds']['unmeaning'] = [];
            if (!isset($_9d1930831f12['rounds']['unmeaning']['variables'])) $_9d1930831f12['rounds']['unmeaning']['variables'] = FALSE;
            if (!isset($_9d1930831f12['rounds']['unmeaning']['prefix']) || !$_9d1930831f12['rounds']['unmeaning']['prefix']) $_9d1930831f12['rounds']['unmeaning']['prefix'] = '_'; else $_9d1930831f12['rounds']['unmeaning']['prefix'] = (string)$_9d1930831f12['rounds']['unmeaning']['prefix'];
            if (!isset($_9d1930831f12['rounds']['unmeaning']['size']) || $_9d1930831f12['rounds']['unmeaning']['size'] < 1) $_9d1930831f12['rounds']['unmeaning']['size'] = 12; else $_9d1930831f12['rounds']['unmeaning']['size'] = (int)$_9d1930831f12['rounds']['unmeaning']['size'];
            if (!isset($_9d1930831f12['rounds']['qbc'])) $_9d1930831f12['rounds']['qbc'] = FALSE;
            if ($_9d1930831f12['rounds']['minify']['enable']) $_d5cbf76f6b55 = self::minify($_d5cbf76f6b55);
            if (!isset($_9d1930831f12['style'])) $_9d1930831f12['style'] = [];
            if (!isset($_9d1930831f12['style']['separated_loader'])) $_9d1930831f12['style']['separated_loader'] = [];
            if (!isset($_9d1930831f12['style']['halt_mode'])) $_9d1930831f12['style']['halt_mode'] = FALSE;
            if (!isset($_9d1930831f12['style']['hide_errors'])) $_9d1930831f12['style']['hide_errors'] = TRUE;
            if (!isset($_9d1930831f12['style']['hide_eval'])) $_9d1930831f12['style']['hide_eval'] = TRUE;
            if (!isset($_9d1930831f12['style']['global_cache'])) $_9d1930831f12['style']['global_cache'] = TRUE;
            if (!isset($_9d1930831f12['style']['raw'])) $_9d1930831f12['style']['raw'] = FALSE;
            if (!isset($_9d1930831f12['identify'])) $_9d1930831f12['identify'] = [];
            if (!isset($_9d1930831f12['identify']['files'])) $_9d1930831f12['identify']['files'] = [];
            if (!isset($_9d1930831f12['style']['separated_loader']['decoder_file'])) {
                $_9d1930831f12['style']['separated_loader']['decoder_file'] = FALSE;
            } else {
                $_9d1930831f12['style']['separated_loader']['decoder_file'] = (string)$_9d1930831f12['style']['separated_loader']['decoder_file'];
                if (file_exists($_9d1930831f12['style']['separated_loader']['decoder_file'])) {
                    $_9d1930831f12['indentify']['files'][] = $_9d1930831f12['style']['separated_loader']['decoder_file'];
                } else if (@!file_get_contents($_9d1930831f12['style']['separated_loader']['decoder_file'])) {
                    $_9d1930831f12['style']['separated_loader']['decoder_file'] = FALSE;
                }
            }
            if (!$_9d1930831f12['rounds']['optwister']['enable'] || !isset($_9d1930831f12['style']['separated_loader']['optwister_file'])) {
                $_9d1930831f12['style']['separated_loader']['optwister_file'] = FALSE;
            } else {
                $_9d1930831f12['style']['separated_loader']['optwister_file'] = (string)$_9d1930831f12['style']['separated_loader']['optwister_file'];
                if (file_exists($_9d1930831f12['style']['separated_loader']['optwister_file'])) {
                    $_9d1930831f12['indentify']['files'][] = $_9d1930831f12['style']['separated_loader']['optwister_file'];
                } else if (@!file_get_contents($_9d1930831f12['style']['separated_loader']['optwister_file'])) {
                    $_9d1930831f12['style']['separated_loader']['optwister_file'] = FALSE;
                }
            }
            if (!isset($_9d1930831f12['license'])) $_9d1930831f12['license'] = [];
            if (!isset($_9d1930831f12['license']['type'])) {
                $_073b842fff17 = 'comment';
            } else {
                $_073b842fff17 = strtolower($_9d1930831f12['license']['type']);
                if (!in_array($_073b842fff17, ['comment', 'file', 'remove'])) $_073b842fff17 = 'comment';
                unset($_9d1930831f12['license']['type']);
            }
            if ($_073b842fff17 == 'remove') {
                $_9d1930831f12['license'] = '';
            } else {
                $_f9f3ba55208c = $_9d1930831f12['license'];
                if (!isset($_f9f3ba55208c['title'])) $_f9f3ba55208c['title'] = 'Obfuscated by ALOM ' . ALOM_VERSION;
                if (isset($_f9f3ba55208c['checksum']) && $_f9f3ba55208c['checksum'] === TRUE) $_f9f3ba55208c['checksum'] = md5($_d5cbf76f6b55);
                if (isset($_f9f3ba55208c['license_key'])) {
                    if (strlen($_f9f3ba55208c['license_key']) == 64) $_f9f3ba55208c['license_key'] = hex2bin($_f9f3ba55208c['license_key']); else if (strlen($_f9f3ba55208c['license_key']) != 32) $_f9f3ba55208c['license_key'] = hash('sha256', $_f9f3ba55208c['license_key'], TRUE);
                    $_85e9b296e2f6 = $_f9f3ba55208c['license_key'];
                    unset($_f9f3ba55208c['license_key']);
                    $_f9f3ba55208c['license_code'] = "[************************************************-********************************-****************]";
                    if (isset($_379e02d909b1['license_verifier_api'])) {
                        $_0fd6f110872f = $_f9f3ba55208c['license_verifier_api'];
                        unset($_f9f3ba55208c['license_verifier_api']);
                    }
                }
                $_657a98c9ba29 = "Do not change anything of segment antitamper";
                if ($_073b842fff17 == 'comment') {
                    $_9d1930831f12['license'] = "/** ALOM Obfuscator License\n * " . str_replace("\n", "\n * ", $_657a98c9ba29) . "\n *\n";
                    foreach ($_f9f3ba55208c as $_d186186a7d16 => $_00cdb5a3dfe0) {
                        $_d186186a7d16 = str_replace(["\n", '_'], ' ', $_d186186a7d16);
                        $_d186186a7d16 = self::commentquote($_d186186a7d16);
                        $_00cdb5a3dfe0 = self::commentquote(str_replace("\n", "\n  ", $_00cdb5a3dfe0));
                        $_9d1930831f12['license'] .= " * $_d186186a7d16: $_00cdb5a3dfe0\n";
                    }
                    $_9d1930831f12['license'] .= " */";
                } else if ($_073b842fff17 == 'file') {
                    if (isset($_f9f3ba55208c['license_file'])) {
                        $_ffafc4d0a7af = $_f9f3ba55208c['license_file'];
                        unset($_f9f3ba55208c['license_file']);
                    } else {
                        $_ffafc4d0a7af = 'alomObfuscator.php.license';
                    }
                    $_9d1930831f12['identify']['files'][] = $_ffafc4d0a7af;
                    $_9d1930831f12['license'] = "* ALOM Obfuscator License\r\n" . str_replace("\n", "\r\n", $_657a98c9ba29) . "\r\n\r\n";
                    foreach ($_f9f3ba55208c as $_d186186a7d16 => $_00cdb5a3dfe0) {
                        $_d186186a7d16 = str_replace(["\n", '_'], ' ', $_d186186a7d16);
                        $_00cdb5a3dfe0 = str_replace("\n", "\n  ", $_00cdb5a3dfe0);
                        $_9d1930831f12['license'] .= "$_d186186a7d16: $_00cdb5a3dfe0\r\n";
                    }
                    file_put_contents($_ffafc4d0a7af, $_9d1930831f12['license']);
                }
            }
            if (isset($_85e9b296e2f6)) {
                self::log("License created. (type=$_073b842fff17, license_key=" . bin2hex($_85e9b296e2f6) . ")", 'notice');
            } else {
                self::log("License created. (type=$_073b842fff17)", 'notice');
            }
            $_e2396294dbd0 = ['files' => [], 'system' => ['ord' => 0xe3, 'id' => $_ebe2944af80d], 'id' => 'W]'];
            foreach ($_9d1930831f12['identify']['files'] as $_dcd32d9a06d7) {
                if (!file_exists($_dcd32d9a06d7)) {
                    continue;
                }
                $_e2396294dbd0['files'][$_dcd32d9a06d7] = md5(basename($_dcd32d9a06d7) . "\n" . file_get_contents($_dcd32d9a06d7), TRUE);
                $_e2396294dbd0['id'] .= $_e2396294dbd0['files'][$_dcd32d9a06d7] . "\n";
            }
            $_e2396294dbd0['id'] .= count($_e2396294dbd0['files']) . "/+\xf1%R\r";
            if (isset($_9d1930831f12['identify']['uname'])) {
                if (!isset($_9d1930831f12['identify']['uname']['hashed']) || !$_9d1930831f12['identify']['uname']['hashed']) $_9d1930831f12['identify']['uname']['value'] = md5($_9d1930831f12['identify']['uname']['value'], TRUE);
                $_e2396294dbd0['system']['ord'] ^= 0x1;
                $_e2396294dbd0['system']['id'] .= "un:{$_9d1930831f12['identify']['uname']['value']}\n";
            }
            if (isset($_9d1930831f12['identify']['username'])) {
                if (!isset($_9d1930831f12['identify']['username']['hashed']) || !$_9d1930831f12['identify']['username']['hashed']) $_9d1930831f12['identify']['username']['value'] = md5($_9d1930831f12['identify']['username']['value'], TRUE);
                $_e2396294dbd0['system']['ord'] ^= 0x2;
                $_e2396294dbd0['system']['id'] .= "us:{$_9d1930831f12['identify']['username']['value']}\n";
            }
            if (isset($_9d1930831f12['identify']['filename'])) {
                if (!isset($_9d1930831f12['identify']['filename']['hashed']) || !$_9d1930831f12['identify']['filename']['hashed']) $_9d1930831f12['identify']['filename']['value'] = md5(basename($_9d1930831f12['identify']['filename']['value']), TRUE);
                $_e2396294dbd0['system']['ord'] ^= 0x4;
                $_e2396294dbd0['system']['id'] .= "fn:{$_9d1930831f12['identify']['filename']['value']}\n";
            }
            if (isset($_9d1930831f12['identify']['ipaddr'])) {
                if (!isset($_9d1930831f12['identify']['ipaddr']['hashed']) || !$_9d1930831f12['identify']['ipaddr']['hashed']) $_9d1930831f12['identify']['ipaddr']['value'] = md5($_9d1930831f12['identify']['ipaddr']['value'], TRUE);
                $_e2396294dbd0['system']['ord'] ^= 0x8;
                $_e2396294dbd0['system']['id'] .= "ip:{$_9d1930831f12['identify']['ipaddr']['value']}\n";
            }
            if (isset($_9d1930831f12['identify']['hostname'])) {
                if (!isset($_9d1930831f12['identify']['hostname']['hashed']) || !$_9d1930831f12['identify']['hostname']['hashed']) $_9d1930831f12['identify']['hostname']['value'] = md5($_9d1930831f12['identify']['hostname']['value'], TRUE);
                $_e2396294dbd0['system']['ord'] ^= 0x10;
                $_e2396294dbd0['system']['id'] .= "hn:{$_9d1930831f12['identify']['hostname']['value']}\n";
            }
            $_e2396294dbd0['id'] .= $_e2396294dbd0['system']['id'] . "..\xaf\0S!\r" . $_e2396294dbd0['system']['ord'];
            $_e2396294dbd0['id'] = md5($_e2396294dbd0['id'], TRUE);
            $_e2396294dbd0['system']['id'] = md5($_e2396294dbd0['system']['id'] . chr($_e2396294dbd0['system']['ord']), TRUE);
            if (!isset($_9d1930831f12['date_domain'])) $_9d1930831f12['date_domain'] = [];
            if (!isset($_9d1930831f12['date_domain']['expiration']) || !is_numeric($_9d1930831f12['date_domain']['expiration'])) $_9d1930831f12['date_domain']['expiration'] = 0x7fffffff; else $_9d1930831f12['date_domain']['expiration'] = (int)$_9d1930831f12['date_domain']['expiration'];
            if (!isset($_9d1930831f12['date_domain']['ready']) || !is_numeric($_9d1930831f12['date_domain']['ready'])) $_9d1930831f12['date_domain']['ready'] = 0; else $_9d1930831f12['date_domain']['ready'] = (int)$_9d1930831f12['date_domain']['ready'];
            if (!isset($_9d1930831f12['additional'])) $_9d1930831f12['additional'] = [];
            if (!isset($_9d1930831f12['additional']['antitamper'])) $_9d1930831f12['additional']['antitamper'] = ''; else if (is_callable($_9d1930831f12['additional']['antitamper'])) $_9d1930831f12['additional']['antitamper'] = self::getcallable($_9d1930831f12['additional']['antitamper']) . "\n";
            else $_9d1930831f12['additional']['antitamper'] = trim((string)$_9d1930831f12['additional']['antitamper']) . "\n";
            if (!isset($_9d1930831f12['additional']['optional'])) $_9d1930831f12['additional']['optional'] = ''; else if (is_callable($_9d1930831f12['additional']['optional'])) $_9d1930831f12['additional']['optional'] = self::getcallable($_9d1930831f12['additional']['optional']) . "\n";
            else $_9d1930831f12['additional']['optional'] = trim((string)$_9d1930831f12['additional']['optional']) . "\n";
            if (!isset($_9d1930831f12['additional']['shutdown'])) $_9d1930831f12['additional']['shutdown'] = ''; else if (is_callable($_9d1930831f12['additional']['shutdown'])) $_9d1930831f12['additional']['shutdown'] = self::getcallable($_9d1930831f12['additional']['shutdown']) . "\n";
            else $_9d1930831f12['additional']['shutdown'] = trim((string)$_9d1930831f12['additional']['shutdown']) . "\n";
            $_fb3a29fe9bdf = rand();
            $_ce467557df24 = token_get_all($_d5cbf76f6b55);
            $_d5cbf76f6b55 = '';
            for ($_44af9f79ea06 = 0; isset($_ce467557df24[$_44af9f79ea06]); ++$_44af9f79ea06) if (is_array($_ce467557df24[$_44af9f79ea06])) if ($_ce467557df24[$_44af9f79ea06][0] == T_FILE) $_d5cbf76f6b55 .= "_uwC5JBWaTsMV4Vs$_5b3eb1c32c0d()"; else if ($_ce467557df24[$_44af9f79ea06][0] == T_DIR) $_d5cbf76f6b55 .= "_fETt6AVcU6vr6m5$_5b3eb1c32c0d()";
            else if ($_44af9f79ea06 == 0 && $_ce467557df24[$_44af9f79ea06][0] == T_INLINE_HTML) {
                $_d5dca515a504 = htmlentities($_ce467557df24[$_44af9f79ea06][1]);
                $_d5dca515a504 = $_d5dca515a504 == $_ce467557df24[$_44af9f79ea06][1] ? 'print "' . $_d5dca515a504 . '"' : 'print html_entity_decode("' . $_d5dca515a504 . '")';
                if (isset($_ce467557df24[$_44af9f79ea06 + 1])) {
                    if ($_ce467557df24[++$_44af9f79ea06][0] == T_OPEN_TAG_WITH_ECHO) $_d5cbf76f6b55 .= "<" . "?php $_d5dca515a504;echo "; else $_d5cbf76f6b55 .= "<" . "?php $_d5dca515a504;";
                } else $_d5cbf76f6b55 .= "<" . "?php $_d5dca515a504; ?" . ">";
            } else if ($_ce467557df24[$_44af9f79ea06][0] == T_CLOSE_TAG && isset($_ce467557df24[$_44af9f79ea06 + 1])) {
                if ($_ce467557df24[++$_44af9f79ea06][0] == T_OPEN_TAG_WITH_ECHO) $_d5cbf76f6b55 .= ";echo "; else if ($_ce467557df24[$_44af9f79ea06][0] == T_OPEN_TAG) $_d5cbf76f6b55 .= ';';
                else if ($_ce467557df24[$_44af9f79ea06][0] == T_INLINE_HTML) {
                    $_d5dca515a504 = htmlentities($_ce467557df24[$_44af9f79ea06][1]);
                    $_d5dca515a504 = $_d5dca515a504 == $_ce467557df24[$_44af9f79ea06][1] ? 'print "' . $_d5dca515a504 . '"' : 'print html_entity_decode("' . $_d5dca515a504 . '")';
                    if (isset($_ce467557df24[$_44af9f79ea06 + 1])) {
                        if ($_ce467557df24[++$_44af9f79ea06][0] == T_OPEN_TAG_WITH_ECHO) $_d5cbf76f6b55 .= ";$_d5dca515a504;echo "; else $_d5cbf76f6b55 .= ";$_d5dca515a504;";
                    } else $_d5cbf76f6b55 .= ";$_d5dca515a504; ?" . ">";
                }
            } else if ($_ce467557df24[$_44af9f79ea06][0] == T_OPEN_TAG_WITH_ECHO) $_d5cbf76f6b55 .= "<" . "?php echo ";
            else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06][1]; else $_d5cbf76f6b55 .= $_ce467557df24[$_44af9f79ea06];
            if ($_d5cbf76f6b55 === '') $_d5cbf76f6b55 = '<' . '?php ?' . '>'; else if (substr($_d5cbf76f6b55, -2, 2) != '?' . '>') $_d5cbf76f6b55 .= '?' . '>';
            unset($_ce467557df24);
            $_d5cbf76f6b55 = str_replace("?" . "><" . "?php", '', rtrim($_d5cbf76f6b55));
            $_d5cbf76f6b55 = self::setikeys($_d5cbf76f6b55);
            $_d5cbf76f6b55 = self::sug($_d5cbf76f6b55, $_5b3eb1c32c0d);
            $_81eef8d1e5b4 = [crc32(self::$_3227269fab81[0]) ^ self::$_d186186a7d16[0], crc32(self::$_3227269fab81[1]) ^ self::$_d186186a7d16[1]];
            $_81eef8d1e5b4[2] = md5($_81eef8d1e5b4[0] . $_ebe2944af80d . $_81eef8d1e5b4[1], TRUE);
            $_231acd6afa62 = substr(md5($_81eef8d1e5b4[0] . $_81eef8d1e5b4[2] . $_ebe2944af80d . $_81eef8d1e5b4[1], TRUE), 4);
            if ($_9d1930831f12['rounds']['unmeaning']['variables']) {
                self::log("Unmeaning round is processing...", 'notice');
                $_d5cbf76f6b55 = self::unmeaning($_d5cbf76f6b55, $_9d1930831f12['rounds']['unmeaning']['size'], $_9d1930831f12['rounds']['unmeaning']['prefix'], $_5b3eb1c32c0d, $_9d1930831f12['rounds']['unmeaning']['variables']);
                self::backlog('notice');
                self::log("optwister round processed.", 'notice');
            }
            if ($_9d1930831f12['rounds']['optwister']['enable']) {
                self::log("optwister round is processing...", 'notice');
                $_d5cbf76f6b55 = self::minify(self::optwister_op2fn($_d5cbf76f6b55, $_5b3eb1c32c0d));
                $_d5cbf76f6b55 = self::optwister_obfs($_d5cbf76f6b55, $_5b3eb1c32c0d, $_81eef8d1e5b4[0], $_81eef8d1e5b4[1], $_81eef8d1e5b4[2], $_231acd6afa62);
                self::backlog('notice');
                self::log("optwister round processed.", 'notice');
            }
            $_d5cbf76f6b55 = substr($_d5cbf76f6b55, 5);
            $_d5cbf76f6b55 = str_replace("?" . "><" . "?php", '', rtrim($_d5cbf76f6b55));
            if (substr($_d5cbf76f6b55, -2, 2) == '?' . '>') $_d5cbf76f6b55 = substr($_d5cbf76f6b55, 0, -2);
            $_d5cbf76f6b55 = trim($_d5cbf76f6b55);
            self::mt_prng_store($_fb3a29fe9bdf ^ 0x90c8);
            self::encodew(TRUE, 0, 0);
            if ($_9d1930831f12['rounds']['partitioning']['enable']) {
                $_9d1930831f12['style']['hide_eval'] = FALSE;
                self::log("partitioning round is processing...", 'notice');
                $_d97b76b09ecb = [crc32($_231acd6afa62 . $_81eef8d1e5b4[0]) ^ self::$_d186186a7d16[1], crc32($_231acd6afa62 . $_81eef8d1e5b4[1]) ^ self::$_d186186a7d16[0]];
                $_d97b76b09ecb[2] = md5($_d97b76b09ecb[0] . $_81eef8d1e5b4[2] . $_d97b76b09ecb[1], TRUE);
                $_40b1740abb59 = substr(md5($_d97b76b09ecb[0] . $_d97b76b09ecb[2] . $_81eef8d1e5b4[2] . $_d97b76b09ecb[1], TRUE), 4);
                $_a56962748828 = $_5a71f81a43eb = [];
                $_d5cbf76f6b55 = self::partitioning($_a56962748828, $_5a71f81a43eb, $_d5cbf76f6b55, $_9d1930831f12['rounds']['optwister']['enable'], $_5b3eb1c32c0d, $_d97b76b09ecb[0], $_d97b76b09ecb[1], $_d97b76b09ecb[2], $_40b1740abb59, $_9d1930831f12['rounds']['partitioning']['fast']);
                $_d5cbf76f6b55 = pack('N', strlen($_d5cbf76f6b55) ^ $_81eef8d1e5b4[0]) . $_d5cbf76f6b55;
                $_d5cbf76f6b55 .= pack('N', count($_a56962748828) ^ $_81eef8d1e5b4[0]);
                foreach ($_a56962748828 as $_f60e006196fb) $_d5cbf76f6b55 .= pack('N', $_f60e006196fb ^ $_81eef8d1e5b4[0]);
                foreach ($_5a71f81a43eb as $_f60e006196fb) $_d5cbf76f6b55 .= pack('N', strlen($_f60e006196fb) ^ $_81eef8d1e5b4[0]) . $_f60e006196fb;
                for ($_44af9f79ea06 = strlen($_d5cbf76f6b55) - 2; $_44af9f79ea06 >= 0; --$_44af9f79ea06) $_d5cbf76f6b55[$_44af9f79ea06 + 1] = chr((ord($_d5cbf76f6b55[$_44af9f79ea06 + 1]) ^ ord($_d5cbf76f6b55[$_44af9f79ea06]) ^ ord(self::$_3227269fab81[1][$_44af9f79ea06 & 0xf])) - ord(self::$_3227269fab81[0][$_44af9f79ea06 & 0xf]) + 0x100 & 0xff);
                for ($_44af9f79ea06 = 0; isset($_d5cbf76f6b55[$_44af9f79ea06]); ++$_44af9f79ea06) $_d5cbf76f6b55[$_44af9f79ea06] = chr((ord($_d5cbf76f6b55[$_44af9f79ea06]) ^ ord(self::$_3227269fab81[0][$_44af9f79ea06 & 0xf])) - ord(self::$_3227269fab81[1][$_44af9f79ea06 & 0xf]) + 0x100 & 0xff);
                self::backlog('notice');
                self::log("partitioning round processed. (fast=" . ($_9d1930831f12['rounds']['partitioning']['fast'] ? 'true' : 'false') . ")", 'notice');
            }
            $_6360a51c3f2f = '';
            if ($_9d1930831f12['style']['hide_eval'] && $_9d1930831f12['style']['global_cache']) {
                $_bd34d9e828bc = self::gcmake("<" . "?php $_d5cbf76f6b55 ?" . ">", $_5b3eb1c32c0d);
                foreach ($_bd34d9e828bc as $_8b00b3e5a686) $_6360a51c3f2f .= pack("N", $_8b00b3e5a686[0] - 6) . chr(strlen($_8b00b3e5a686[1])) . chr($_8b00b3e5a686[2]) . $_8b00b3e5a686[1];
            }
            if ($_9d1930831f12['rounds']['main']['iterate_base64'] > 0) {
                $_5d1f753e4a96 = $_9d1930831f12['rounds']['main']['iterate_base64'];
                self::log("base64 iterating round is processing... ($_5d1f753e4a96 iterates)", 'notice');
                for ($_44af9f79ea06 = 0; $_44af9f79ea06 < $_5d1f753e4a96; ++$_44af9f79ea06) {
                    if ($_5d1f753e4a96 > 30 && $_44af9f79ea06 % 20 == 0) {
                        self::backlog('notice');
                        self::log("base64 iterating round is processing... ($_44af9f79ea06/$_5d1f753e4a96 iterates)", 'notice');
                    }
                    $_d5cbf76f6b55 = "eval(gzinflate(base64_decode('" . self::singlequote(base64_encode(gzdeflate($_d5cbf76f6b55, 9))) . "')));";
                }
                if ($_5d1f753e4a96 > 10) {
                    self::backlog('notice');
                    self::log("base64 iterating round is processed. ($_5d1f753e4a96 iterates)", 'notice');
                }
            }
            if ($_9d1930831f12['additional']['shutdown']) {
                $_d5cbf76f6b55 = pack('N', strlen($_9d1930831f12['additional']['shutdown'])) . $_9d1930831f12['additional']['shutdown'] . $_d5cbf76f6b55;
            }
            $_d5cbf76f6b55 = $_d5cbf76f6b55 ^ str_repeat("\x80", strlen($_d5cbf76f6b55));
            if ($_9d1930831f12['rounds']['main']['deflate_round']) {
                $_d5cbf76f6b55 = gzdeflate($_d5cbf76f6b55, 9);
            }
            $_d5cbf76f6b55 = pack('N', strlen($_6360a51c3f2f)) . $_6360a51c3f2f . $_d5cbf76f6b55;
            self::mt_prng_store($_fb3a29fe9bdf ^ 0x8550255);
            $_d5cbf76f6b55 = self::inc($_d5cbf76f6b55, rand() ^ self::$_d186186a7d16[0], rand() ^ self::$_d186186a7d16[1]);
            if ($_9d1930831f12['rounds']['main']['base64rand_round']) {
                self::mt_prng_store($_fb3a29fe9bdf ^ 0x1c);
                $_d5cbf76f6b55 = self::base64encode($_d5cbf76f6b55);
            }
            self::mt_prng_store($_fb3a29fe9bdf ^ 0xde);
            $_8d2d7939f6cb = strlen($_d5cbf76f6b55);
            $_e5752171fb85 = $_9d1930831f12['rounds']['main']['depth'];
            switch ($_9d1930831f12['rounds']['main']['depth_type']) {
                case 'constant':
                    $_e5752171fb85 = ceil(($_e5752171fb85 + 1) * $_e5752171fb85);
                    break;
                case 'logarthm':
                    $_e5752171fb85 = ceil((log($_8d2d7939f6cb + 1, 2) + $_e5752171fb85 + 1) * $_e5752171fb85);
                    break;
                case 'logpower':
                    $_e5752171fb85 = ceil((pow(log($_8d2d7939f6cb + 1, 2), 2.02) + $_e5752171fb85 + 1) * $_e5752171fb85);
                    break;
                case 'square':
                    $_e5752171fb85 = ceil((sqrt($_8d2d7939f6cb) + $_e5752171fb85 + 1) * $_e5752171fb85);
                    break;
                case 'linear':
                    $_e5752171fb85 = ceil(($_8d2d7939f6cb + $_e5752171fb85 + 1) * $_e5752171fb85);
                    break;
            }
            $_7755dc3006fd = [];
            $_198a2bd39cff = $_e5752171fb85 * 9 + 6;
            for ($_44af9f79ea06 = 1; $_44af9f79ea06 <= $_198a2bd39cff; ++$_44af9f79ea06) $_7755dc3006fd[$_198a2bd39cff - $_44af9f79ea06] = rand();
            $_dcd32d9a06d7 = "<" . "?php\n";
            if ($_073b842fff17 == 'comment') $_dcd32d9a06d7 .= $_9d1930831f12['license'] . "\n";
            $_609134e7cdf4 = strlen($_dcd32d9a06d7);
            if ($_9d1930831f12['additional']['optional']) {
                $_dcd32d9a06d7 .= "# ALOM OPTIONAL SEGMENT SEPARATOR d473b606a9" . bin2hex($_ebe2944af80d) . " #\n";
                $_dcd32d9a06d7 .= $_9d1930831f12['additional']['optional'];
                $_042341f22967 = strlen($_dcd32d9a06d7);
                $_dcd32d9a06d7 .= "# ALOM ANTITAMPER SEGMENT SEPARATOR d473b606a9" . bin2hex($_ebe2944af80d) . " #\n";
                if ($_9d1930831f12['additional']['antitamper']) $_dcd32d9a06d7 .= $_9d1930831f12['additional']['antitamper'];
            } else {
                $_042341f22967 = strlen($_dcd32d9a06d7);
                $_dcd32d9a06d7 .= "# ALOM ANTITAMPER SEGMENT SEPARATOR d473b606a9" . bin2hex($_ebe2944af80d) . " #\n";
                if ($_9d1930831f12['additional']['antitamper']) $_dcd32d9a06d7 .= $_9d1930831f12['additional']['antitamper'];
            }
            $_dcd32d9a06d7 .= 'if(!class_exists("AlomDecoder' . $_5b3eb1c32c0d . '")){';
            $_dcd32d9a06d7 .= 'function _uwC5JBWaTsMV4Vs' . $_5b3eb1c32c0d . '(){return __FILE__;}function _fETt6AVcU6vr6m5' . $_5b3eb1c32c0d . '(){return __DIR__;}';
            $_dcd32d9a06d7 .= 'function _H4abed0zL6i7Pgw' . $_5b3eb1c32c0d . '($XYZbpYbFeAq){return str_replace("AlomDecoder","AlomDecoder' . $_5b3eb1c32c0d . '",$XYZbpYbFeAq);}';
            if ($_9d1930831f12['rounds']['optwister']['enable']) $_dcd32d9a06d7 .= 'function _CuIjYEAXVvJzmV8' . $_5b3eb1c32c0d . '($XYZbpYbFeAq){return str_replace("_ALOM_optwister","_ALOM_optwister' . $_5b3eb1c32c0d . '",$XYZbpYbFeAq);}';
            $_dcd32d9a06d7 .= 'function _s7GdHhyCWB0FOmT' . $_5b3eb1c32c0d . '($cMEhPFcDh8H,$Zb5nfJM7T9u){return ($ndnNmLHVPUs=realpath($cMEhPFcDh8H))?' . '$ndnNmLHVPUs:(($ndnNmLHVPUs=realpath(__DIR__."/".$cMEhPFcDh8H))?$ndnNmLHVPUs:AlomDecoder' . $_5b3eb1c32c0d . '::removedLoader($Zb5nfJM7T9u));}';
            $_dcd32d9a06d7 .= "\neval(_H4abed0zL6i7Pgw$_5b3eb1c32c0d(gzinflate(";
            if ($_9d1930831f12['style']['separated_loader']['decoder_file']) {
                $_dcd32d9a06d7 .= "file_get_contents(_s7GdHhyCWB0FOmT('" . self::singlequote($_9d1930831f12['style']['separated_loader']['decoder_file']) . "'))";
            } else if ($_9d1930831f12['style']['raw']) {
                if (!file_exists(_fETt6AVcU6vr6m525c0b2da0dc0() . '/alomdecoder.obfs.php')) {
                    $_51db06b79ed6 = @file_get_contents(_fETt6AVcU6vr6m525c0b2da0dc0() . '/alomdecoder.obfs.php');
                    if (!$_51db06b79ed6) self::removedLoader('alomdecoder.obfs.php');
                } else {
                    $_51db06b79ed6 = file_get_contents(_fETt6AVcU6vr6m525c0b2da0dc0() . '/alomdecoder.obfs.php');
                }
                $_dcd32d9a06d7 .= "'" . self::singlequote(base64_decode($_51db06b79ed6)) . "'";
            } else {
                if (!file_exists(_fETt6AVcU6vr6m525c0b2da0dc0() . '/alomdecoder.obfs.php')) {
                    $_51db06b79ed6 = @file_get_contents(_fETt6AVcU6vr6m525c0b2da0dc0() . '/alomdecoder.obfs.php');
                    if (!$_51db06b79ed6) self::removedLoader('alomdecoder.obfs.php');
                } else {
                    $_51db06b79ed6 = file_get_contents(_fETt6AVcU6vr6m525c0b2da0dc0() . '/alomdecoder.obfs.php');
                }
                $_dcd32d9a06d7 .= "base64_decode('$_51db06b79ed6')";
            }
            $_dcd32d9a06d7 .= ")));\n";
            if ($_9d1930831f12['rounds']['optwister']['enable']) {
                $_dcd32d9a06d7 .= "eval(_CuIjYEAXVvJzmV8$_5b3eb1c32c0d(gzinflate(";
                if ($_9d1930831f12['style']['separated_loader']['optwister_file']) {
                    $_dcd32d9a06d7 .= "file_get_contents(_s7GdHhyCWB0FOmT('" . self::singlequote($_9d1930831f12['style']['separated_loader']['optwister_file']) . "'))";
                } else if ($_9d1930831f12['style']['raw']) {
                    if (!file_exists(_fETt6AVcU6vr6m525c0b2da0dc0() . '/optwister.obfs.php')) {
                        $_51db06b79ed6 = @file_get_contents(_fETt6AVcU6vr6m525c0b2da0dc0() . '/optwister.obfs.php');
                        if (!$_51db06b79ed6) self::removedLoader('optwister.obfs.php');
                    } else {
                        $_51db06b79ed6 = file_get_contents(_fETt6AVcU6vr6m525c0b2da0dc0() . '/optwister.obfs.php');
                    }
                    $_dcd32d9a06d7 .= "'" . self::singlequote(base64_decode($_51db06b79ed6)) . "'";
                } else {
                    if (!file_exists(_fETt6AVcU6vr6m525c0b2da0dc0() . '/optwister.obfs.php')) {
                        $_51db06b79ed6 = @file_get_contents(_fETt6AVcU6vr6m525c0b2da0dc0() . '/optwister.obfs.php');
                        if (!$_51db06b79ed6) self::removedLoader('optwister.obfs.php');
                    } else {
                        $_51db06b79ed6 = file_get_contents(_fETt6AVcU6vr6m525c0b2da0dc0() . '/optwister.obfs.php');
                    }
                    $_dcd32d9a06d7 .= "base64_decode('$_51db06b79ed6')";
                }
                $_dcd32d9a06d7 .= ")));\n";
            }
            $_dcd32d9a06d7 .= "}\AlomDecoder$_5b3eb1c32c0d::mt_prng_store(rand());\n";
            if ($_9d1930831f12['style']['hide_eval']) $_dcd32d9a06d7 .= 'foreach(get_defined_vars() as $_ALOM_key=>$_ALOM_val)\AlomDecoder' . $_5b3eb1c32c0d . '::$vrs[$_ALOM_key]=&$$_ALOM_key;';
            if ($_9d1930831f12['style']['hide_errors']) {
                $_dcd32d9a06d7 .= "try{";
                $_dcd32d9a06d7 .= "@eval(\AlomDecoder$_5b3eb1c32c0d::run('";
            } else {
                $_dcd32d9a06d7 .= "eval(\AlomDecoder$_5b3eb1c32c0d::run('";
            }
            $_87d6dcd949e5 = strlen($_dcd32d9a06d7) - $_042341f22967;
            self::mt_prng_reset();
            $_f6090e078f91 = 0;
            $_203a4ef6ac3d = 0;
            if (self::$_2b3c116ebf09) {
                $_78deaaae8602 = 0;
                self::log("main round processing... 0%", 'notice');
            } else {
                self::log("main round processing...", 'notice');
            }
            for ($_44af9f79ea06 = 0; $_44af9f79ea06 < $_e5752171fb85; ++$_44af9f79ea06) {
                if (self::$_2b3c116ebf09) {
                    $_6a7ca792fc3d = round($_44af9f79ea06 / $_e5752171fb85 * 50, 1) * 2;
                    if ($_6a7ca792fc3d != $_78deaaae8602) {
                        self::backlog('notice');
                        self::log("main round processing... $_6a7ca792fc3d%", 'notice');
                        $_78deaaae8602 = $_6a7ca792fc3d;
                    }
                }
                $_9dbbf3da27d7 = $_9d1930831f12['rounds']['main']['extrascript_round'] ? $_7755dc3006fd[$_203a4ef6ac3d + 8] % 0b111 : $_7755dc3006fd[$_203a4ef6ac3d + 8] % 0b110;
                switch ($_9dbbf3da27d7) {
                    case 0b000:
                        $_d5cbf76f6b55[$_f6090e078f91] = chr(ord($_d5cbf76f6b55[$_f6090e078f91]) ^ ((self::$_d186186a7d16[0] ^ self::$_d186186a7d16[1]) & 0xff));
                        self::$_d186186a7d16[1] ^= $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++];
                        self::$_d186186a7d16[0] ^= $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++];
                        break;
                    case 0b001:
                        $_87724dcfcb3c = ((int)(rand() + self::$_d186186a7d16[0] + self::$_d186186a7d16[1]) & 0xffffffff) ^ rand();
                        $_30acf8485ad4 = pack('V', $_87724dcfcb3c ^ 0x9f0a4382);
                        $_a62b34eb6df6 = self::uncrc32in(substr($_d5cbf76f6b55, 0, $_f6090e078f91) . $_30acf8485ad4, substr($_d5cbf76f6b55, $_f6090e078f91), $_87724dcfcb3c);
                        $_d5cbf76f6b55 = substr($_d5cbf76f6b55, 0, $_f6090e078f91) . $_30acf8485ad4 . $_a62b34eb6df6 . substr($_d5cbf76f6b55, $_f6090e078f91);
                        $_a62b34eb6df6 = unpack('V', $_a62b34eb6df6);
                        $_87724dcfcb3c ^= $_7755dc3006fd[$_203a4ef6ac3d + 7];
                        self::$_d186186a7d16[1] ^= $_87724dcfcb3c ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_a62b34eb6df6[1];
                        self::$_d186186a7d16[0] ^= $_87724dcfcb3c ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++];
                        ++$_203a4ef6ac3d;
                        break;
                    case 0b010:
                        $_87724dcfcb3c = crc32(pack('V', $_7755dc3006fd[$_203a4ef6ac3d + 7]) . self::$_3227269fab81[0]);
                        $_87724dcfcb3c ^= crc32(pack('V', $_7755dc3006fd[$_203a4ef6ac3d + 6]) . self::$_3227269fab81[1]);
                        self::$_d186186a7d16[1] ^= $_87724dcfcb3c ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++];
                        self::$_d186186a7d16[0] ^= $_87724dcfcb3c ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++];
                        $_203a4ef6ac3d += 2;
                        break;
                    case 0b011:
                        $_d2ce9730d406 = rand();
                        $_974584786d5a = rand();
                        $_d5cbf76f6b55 = substr($_d5cbf76f6b55, 0, $_f6090e078f91) . pack('V2', $_d2ce9730d406, $_974584786d5a) . substr($_d5cbf76f6b55, $_f6090e078f91);
                        self::$_d186186a7d16[1] ^= $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_974584786d5a ^ 1;
                        self::$_d186186a7d16[0] ^= $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_d2ce9730d406;
                        break;
                    case 0b100:
                        $_3266760cbb47 = strlen($_d5cbf76f6b55) - 1;
                        $_882e2160efc7 = ceil($_9d1930831f12['rounds']['optwister']['enable'] ? pow($_3266760cbb47, 1 / 3) : sqrt($_3266760cbb47));
                        $_3266760cbb47 -= $_882e2160efc7;
                        $_e395e653b603 = $_7755dc3006fd[$_203a4ef6ac3d + 7] % $_3266760cbb47;
                        $_8d2d7939f6cb = ($_7755dc3006fd[$_203a4ef6ac3d + 5] ^ $_7755dc3006fd[$_203a4ef6ac3d + 6]) % $_882e2160efc7 + 1;
                        $_d2ce9730d406 = self::$_d186186a7d16[0] ^ $_7755dc3006fd[$_203a4ef6ac3d + 1];
                        $_974584786d5a = self::$_d186186a7d16[1] ^ $_7755dc3006fd[$_203a4ef6ac3d];
                        if ($_8d2d7939f6cb > $_3266760cbb47 / 2) $_8d2d7939f6cb = $_7755dc3006fd[$_203a4ef6ac3d + 2] % $_8d2d7939f6cb + 1; else $_974584786d5a ^= $_7755dc3006fd[$_203a4ef6ac3d + 2];
                        $_d5cbf76f6b55 = substr($_d5cbf76f6b55, 0, $_e395e653b603) . self::encodew(substr($_d5cbf76f6b55, $_e395e653b603, $_8d2d7939f6cb), $_d2ce9730d406, $_974584786d5a) . substr($_d5cbf76f6b55, $_e395e653b603 + $_8d2d7939f6cb);
                        self::$_d186186a7d16[1] = $_d2ce9730d406 ^ $_7755dc3006fd[$_203a4ef6ac3d + 4];
                        self::$_d186186a7d16[0] = $_974584786d5a ^ $_7755dc3006fd[$_203a4ef6ac3d + 3];
                        $_203a4ef6ac3d += 8;
                        break;
                    case 0b101:
                        $_3266760cbb47 = strlen($_d5cbf76f6b55) - 1;
                        $_882e2160efc7 = ceil($_9d1930831f12['rounds']['optwister']['enable'] ? pow($_3266760cbb47, 1 / 3) : sqrt($_3266760cbb47));
                        $_3266760cbb47 -= $_882e2160efc7;
                        $_e395e653b603 = $_7755dc3006fd[$_203a4ef6ac3d + 7] % $_3266760cbb47;
                        $_8d2d7939f6cb = ($_7755dc3006fd[$_203a4ef6ac3d + 5] ^ $_7755dc3006fd[$_203a4ef6ac3d + 6]) % $_882e2160efc7 + 1;
                        $_d2ce9730d406 = self::$_d186186a7d16[0] ^ $_7755dc3006fd[$_203a4ef6ac3d + 1];
                        $_974584786d5a = self::$_d186186a7d16[1] ^ $_7755dc3006fd[$_203a4ef6ac3d];
                        if ($_8d2d7939f6cb > $_3266760cbb47 / 2) $_8d2d7939f6cb = $_7755dc3006fd[$_203a4ef6ac3d + 2] % $_8d2d7939f6cb + 1; else $_974584786d5a ^= $_7755dc3006fd[$_203a4ef6ac3d + 2];
                        $_d5cbf76f6b55 = substr($_d5cbf76f6b55, 0, $_e395e653b603) . self::incw(substr($_d5cbf76f6b55, $_e395e653b603, $_8d2d7939f6cb), $_d2ce9730d406, $_974584786d5a) . substr($_d5cbf76f6b55, $_e395e653b603 + $_8d2d7939f6cb);
                        self::$_d186186a7d16[1] = $_d2ce9730d406 ^ $_7755dc3006fd[$_203a4ef6ac3d + 4];
                        self::$_d186186a7d16[0] = $_974584786d5a ^ $_7755dc3006fd[$_203a4ef6ac3d + 3];
                        $_203a4ef6ac3d += 8;
                        break;
                    case 0b110:
                        $_87724dcfcb3c = ((int)(rand() + self::$_d186186a7d16[0] + self::$_d186186a7d16[1]) & 0xffffffff) ^ rand();
                        self::$_d186186a7d16[1] ^= $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_87724dcfcb3c;
                        self::$_d186186a7d16[0] ^= $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_87724dcfcb3c;
                        $_8d2d7939f6cb = strlen($_d5cbf76f6b55);
                        $_2193a50fc7d6 = '';
                        do {
                            $_e395e653b603 = rand(0, $_8d2d7939f6cb - 1);
                            $_7be91b582a1e = rand(0, 0xff);
                            $_d5cbf76f6b55[$_e395e653b603] = $_d5cbf76f6b55[$_e395e653b603] ^ chr($_7be91b582a1e);
                            if ($_7be91b582a1e > 0xf) $_7be91b582a1e = dechex($_7be91b582a1e); else $_7be91b582a1e = '0' . dechex($_7be91b582a1e);
                            $_2193a50fc7d6 .= "\$code[$_e395e653b603]=\$code[$_e395e653b603]^\"\\x$_7be91b582a1e\";";
                        } while (rand(0, 6));
                        if (rand(0, 2)) {
                            $_2193a50fc7d6 .= "\$obfuscatored=file_get_contents(preg_replace(\"/\([0-9]+\) : eval\(\)'d code/i\",'',__FILE__));";
                        }
                        do {
                            $_e395e653b603 = rand(0, $_8d2d7939f6cb - 1);
                            $_7be91b582a1e = rand(0, 0xff);
                            $_d5cbf76f6b55[$_e395e653b603] = $_d5cbf76f6b55[$_e395e653b603] ^ chr($_7be91b582a1e);
                            if ($_7be91b582a1e > 0xf) $_7be91b582a1e = dechex($_7be91b582a1e); else $_7be91b582a1e = '0' . dechex($_7be91b582a1e);
                            $_2193a50fc7d6 .= "\$code[$_e395e653b603]=\$code[$_e395e653b603]^\"\\x$_7be91b582a1e\";";
                        } while (rand(0, 6));
                        $_756eaa8fa413 = 0;
                        while (!rand(0, 14)) {
                            if (rand(0, 2)) {
                                $_2193a50fc7d6 = gzdeflate($_2193a50fc7d6, 1);
                                $_bfa2ffd23bc0 = random_bytes(strlen($_2193a50fc7d6));
                                $_8bdc20d549d7 = lcg_value() * 0.07;
                                $_382b19e22575 = 0.07 - $_8bdc20d549d7;
                                $_2193a50fc7d6 = "\$brt$_756eaa8fa413=microtime(true);eval(gzinflate('" . self::singlequote($_2193a50fc7d6 ^ $_bfa2ffd23bc0) . "'^'" . self::singlequote($_bfa2ffd23bc0) . "'));";
                                $_2193a50fc7d6 .= "if(microtime(true)-\$brt$_756eaa8fa413>$_8bdc20d549d7+$_382b19e22575){self::starvationDetected();while(1)die;}";
                            } else {
                                $_bfa2ffd23bc0 = random_bytes(strlen($_2193a50fc7d6));
                                $_2193a50fc7d6 = "eval('" . self::singlequote($_2193a50fc7d6 ^ $_bfa2ffd23bc0) . "'^'" . self::singlequote($_bfa2ffd23bc0) . "');";
                            }
                        }
                        $_2193a50fc7d6 .= "\n// ";
                        do {
                            $_49079b50c603 = self::getasciiikey(4);
                            $_49079b50c603 .= self::uncrc32in("alom:$_2193a50fc7d6$_49079b50c603", ":alom", $_87724dcfcb3c);
                        } while (str_replace(["\r", "\n"], '', $_49079b50c603) != $_49079b50c603);
                        $_2193a50fc7d6 .= $_49079b50c603;
                        $_dbb75d67fdab = $_2193a50fc7d6;
                        $_2193a50fc7d6 = gzdeflate($_2193a50fc7d6, 1);
                        $_d5cbf76f6b55 = substr($_d5cbf76f6b55, 0, $_f6090e078f91) . pack('V', strlen($_2193a50fc7d6)) . $_2193a50fc7d6 . substr($_d5cbf76f6b55, $_f6090e078f91);
                        self::$_3227269fab81[0] = self::$_3227269fab81[0] ^ md5($_ebe2944af80d . substr($_dcd32d9a06d7, 0, $_609134e7cdf4) . $_dbb75d67fdab, TRUE);
                        self::$_3227269fab81[1] = self::$_3227269fab81[1] ^ md5($_ebe2944af80d . substr($_dcd32d9a06d7, $_042341f22967, $_87d6dcd949e5) . $_dbb75d67fdab, TRUE);
                        break;
                }
                $_e395e653b603 = rand() % strlen($_d5cbf76f6b55);
                $_d5cbf76f6b55 = substr($_d5cbf76f6b55, 0, $_e395e653b603) . pack('V', $_f6090e078f91 ^ self::$_d186186a7d16[0] ^ self::$_d186186a7d16[1]) . substr($_d5cbf76f6b55, $_e395e653b603);
                $_f6090e078f91 = $_e395e653b603;
                self::$_d186186a7d16[0] = (int)(self::$_d186186a7d16[0] - 0x32123 - ($_7755dc3006fd[$_203a4ef6ac3d] >> 4)) & 0xffffffff;
                self::$_d186186a7d16[1] = (int)(self::$_d186186a7d16[1] - 0x12321 - ($_7755dc3006fd[$_203a4ef6ac3d] >> 4)) & 0xffffffff;
                ++$_203a4ef6ac3d;
            }
            self::backlog('notice');
            self::log("main round processed. (depth-{$_9d1930831f12['rounds']['main']['depth_type']}:{$_9d1930831f12['rounds']['main']['depth']})", 'notice');
            $_ed17beaee59c = pack('V', $_f6090e078f91 ^ self::$_d186186a7d16[0] ^ self::$_d186186a7d16[1]);
            $_d2ce9730d406 = $_7755dc3006fd[$_203a4ef6ac3d++];
            $_974584786d5a = $_7755dc3006fd[$_203a4ef6ac3d++];
            $_53ac9417ba24 = crc32(pack('V', $_d2ce9730d406));
            $_e08b1926cedf = crc32(pack('V', $_974584786d5a));
            self::$_d186186a7d16[1] ^= 0x9c2858bd;
            self::$_d186186a7d16[0] = unpack('V', self::uncrc32(self::$_d186186a7d16[0] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_d2ce9730d406, $_53ac9417ba24));
            self::$_d186186a7d16[0] = self::$_d186186a7d16[0][1] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_974584786d5a;
            self::$_d186186a7d16[1] = unpack('V', self::uncrc32(self::$_d186186a7d16[1] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_974584786d5a, $_e08b1926cedf));
            self::$_d186186a7d16[1] = self::$_d186186a7d16[1][1] ^ $_7755dc3006fd[$_203a4ef6ac3d++] ^ $_d2ce9730d406;
            self::$_d186186a7d16[0] ^= 0x9c2858bf;
            self::$_d186186a7d16[0] ^= crc32(substr($_e2396294dbd0['system']['id'], 0, 8));
            self::$_d186186a7d16[1] ^= crc32(substr($_e2396294dbd0['system']['id'], 8, 8));
            self::$_3227269fab81[0] = self::$_3227269fab81[0] ^ $_e2396294dbd0['id'];
            self::$_3227269fab81[1] = self::$_3227269fab81[1] ^ $_e2396294dbd0['id'];
            $_d5cbf76f6b55 = chr($_e2396294dbd0['system']['ord']) . md5($_ebe2944af80d . $_e2396294dbd0['id'], TRUE) . $_d5cbf76f6b55;
            $_3b0fa7799e5a = pack('V', count($_e2396294dbd0['files']) ^ 0x405a0ff1);
            foreach ($_e2396294dbd0['files'] as $_fed760c6c858 => $_fc00f38c21f0) {
                $_3b0fa7799e5a .= pack('V', strlen($_fed760c6c858) ^ 0x671feb84) . $_fed760c6c858 . md5($_ebe2944af80d . $_fc00f38c21f0, TRUE);
            }
            $_d5cbf76f6b55 = $_3b0fa7799e5a . $_d5cbf76f6b55;
            if (isset($_85e9b296e2f6)) $_d5cbf76f6b55 = $_85e9b296e2f6 . $_d5cbf76f6b55;
            if (isset($_0fd6f110872f)) $_d5cbf76f6b55 = pack('N', strlen($_0fd6f110872f) ^ 0x7702235f) . $_0fd6f110872f . $_d5cbf76f6b55;
            if (isset($_ffafc4d0a7af)) $_d5cbf76f6b55 = pack('N', strlen($_ffafc4d0a7af) ^ 0x5598aa1e) . $_ffafc4d0a7af . $_d5cbf76f6b55;
            self::$_d186186a7d16[0] ^= $_9d1930831f12['date_domain']['ready'];
            self::$_d186186a7d16[1] ^= $_9d1930831f12['date_domain']['expiration'];
            self::$_3227269fab81[0] = self::$_3227269fab81[0] ^ md5($_ebe2944af80d . substr($_dcd32d9a06d7, 0, $_609134e7cdf4), TRUE);
            self::$_3227269fab81[1] = self::$_3227269fab81[1] ^ md5($_ebe2944af80d . substr($_dcd32d9a06d7, $_042341f22967, $_87d6dcd949e5), TRUE);
            $_d5cbf76f6b55 = pack('V2', $_9d1930831f12['date_domain']['ready'] ^ 0xf09132b8, $_9d1930831f12['date_domain']['expiration'] ^ 0x5627c1f0) . $_d5cbf76f6b55;
            $_ed17beaee59c .= pack('V3', self::$_d186186a7d16[1] ^ 0xefcdab89, self::$_d186186a7d16[0] ^ 0x67452301, $_e5752171fb85 ^ 0x309a2f35);
            $_ed17beaee59c .= pack('V2', $_609134e7cdf4 ^ 0x45ff39ae, $_87d6dcd949e5 ^ 0x01192bca);
            $_5bd06b814ee2 = 0x9e;
            if ($_9d1930831f12['rounds']['optwister']['enable']) $_5bd06b814ee2 ^= 0x1;
            if ($_9d1930831f12['rounds']['partitioning']['enable']) $_5bd06b814ee2 ^= 0x2;
            if ($_9d1930831f12['rounds']['antidebugger']['enable']) $_5bd06b814ee2 ^= 0x4;
            if ($_9d1930831f12['rounds']['main']['extrascript_round']) $_5bd06b814ee2 ^= 0x8;
            if ($_9d1930831f12['rounds']['main']['base64rand_round']) $_5bd06b814ee2 ^= 0x10;
            if ($_9d1930831f12['rounds']['main']['deflate_round']) $_5bd06b814ee2 ^= 0x20;
            if (isset($_85e9b296e2f6)) $_5bd06b814ee2 ^= 0x40;
            if ($_9d1930831f12['additional']['optional']) $_5bd06b814ee2 ^= 0x80;
            $_ed17beaee59c .= chr($_5bd06b814ee2);
            $_5bd06b814ee2 = 0xb5;
            if (isset($_0fd6f110872f)) $_5bd06b814ee2 ^= 0x1;
            if (isset($_ffafc4d0a7af)) $_5bd06b814ee2 ^= 0x2;
            if ($_9d1930831f12['additional']['shutdown']) $_5bd06b814ee2 ^= 0x4;
            if ($_9d1930831f12['style']['hide_errors']) $_5bd06b814ee2 ^= 0x8;
            if ($_9d1930831f12['style']['hide_eval']) $_5bd06b814ee2 ^= 0x10;
            if ($_9d1930831f12['style']['global_cache']) $_5bd06b814ee2 ^= 0x20;
            $_ed17beaee59c .= chr($_5bd06b814ee2) . self::$_3227269fab81[0] . self::$_3227269fab81[1] . $_ebe2944af80d;
            $_d5cbf76f6b55 = $_ed17beaee59c . $_d5cbf76f6b55;
            $_d5cbf76f6b55 .= "\x43";
            $_8d2d7939f6cb = strlen($_d5cbf76f6b55);
            if ($_8d2d7939f6cb % 4 != 0) $_d5cbf76f6b55 .= str_repeat("\x85", 4 - $_8d2d7939f6cb % 4);
            self::mt_prng_store($_fb3a29fe9bdf ^ 0x74);
            $_d5cbf76f6b55 = array_values(unpack('V*', $_d5cbf76f6b55));
            for ($_44af9f79ea06 = 0; isset($_d5cbf76f6b55[$_44af9f79ea06]); ++$_44af9f79ea06) $_d5cbf76f6b55[$_44af9f79ea06] ^= rand();
            array_unshift($_d5cbf76f6b55, 'V*');
            $_d5cbf76f6b55 = call_user_func_array('pack', $_d5cbf76f6b55);
            $_d5cbf76f6b55 = pack('V2', floor(self::$_68aa9304b10c) ^ 0x509a2f33, crc32($_d5cbf76f6b55) ^ 0xDEADC0DE) . $_d5cbf76f6b55;
            self::mt_prng_store($_fb3a29fe9bdf ^ ALOM_VERSION_NUMBER ^ 0x51);
            if ($_9d1930831f12['style']['halt_mode']) {
                $_d5cbf76f6b55 = $_9d1930831f12['style']['raw'] ? "\0" . $_d5cbf76f6b55 : self::base64encode($_d5cbf76f6b55);
            } else {
                $_d5cbf76f6b55 = $_9d1930831f12['style']['raw'] ? "\0" . self::singlequote($_d5cbf76f6b55) : self::base64encode($_d5cbf76f6b55);
            }
            $_d5cbf76f6b55 = ($_9d1930831f12['rounds']['qbc'] ? ":{$_9d1930831f12['rounds']['qbc']}" : '') . '$' . $_d5cbf76f6b55;
            $_d5cbf76f6b55 = "\x41l\x6fM$" . dechex($_fb3a29fe9bdf ^ 0x7f983369) . $_d5cbf76f6b55;
            if ($_9d1930831f12['style']['halt_mode']) {
                $_8d2d7939f6cb = strlen($_d5cbf76f6b55);
                if ($_9d1930831f12['style']['hide_errors']) {
                    $_43c7e99cffe2 = strlen($_dcd32d9a06d7) + 47 + 53;
                    if ($_9d1930831f12['style']['hide_eval']) $_43c7e99cffe2 += 140;
                    $_dcd32d9a06d7 .= "$_43c7e99cffe2:$_8d2d7939f6cb'));";
                    if ($_9d1930831f12['style']['hide_eval']) $_dcd32d9a06d7 .= 'foreach(\AlomDecoder' . $_5b3eb1c32c0d . '::$vrs as $_ALOM_key=>&$_ALOM_val)$$_ALOM_key=&$_ALOM_val;if(isset($_ALOM_key))unset($_ALOM_key,$_ALOM_val);';
                    $_dcd32d9a06d7 .= "}catch(\Error|\Exception \$_ALOM_catcherr){}";
                } else {
                    $_43c7e99cffe2 = strlen($_dcd32d9a06d7) + 4 + 53;
                    if ($_9d1930831f12['style']['hide_eval']) $_43c7e99cffe2 += 140;
                    $_dcd32d9a06d7 .= "$_43c7e99cffe2:$_8d2d7939f6cb'));";
                    if ($_9d1930831f12['style']['hide_eval']) $_dcd32d9a06d7 .= 'foreach(\AlomDecoder' . $_5b3eb1c32c0d . '::$vrs as $_ALOM_key=>&$_ALOM_val)$$_ALOM_key=&$_ALOM_val;if(isset($_ALOM_key))unset($_ALOM_key,$_ALOM_val);';
                }
                $_dcd32d9a06d7 .= "\AlomDecoder{$_5b3eb1c32c0d}::uspv();\n__halt_compiler();\n$_d5cbf76f6b55";
            } else {
                if ($_9d1930831f12['style']['hide_errors']) {
                    $_dcd32d9a06d7 .= $_d5cbf76f6b55 . "'));";
                    if ($_9d1930831f12['style']['hide_eval']) $_dcd32d9a06d7 .= 'foreach(\AlomDecoder' . $_5b3eb1c32c0d . '::$vrs as $_ALOM_key=>&$_ALOM_val)$$_ALOM_key=&$_ALOM_val;if(isset($_ALOM_key))unset($_ALOM_key,$_ALOM_val);';
                    $_dcd32d9a06d7 .= "}catch(\Error|\Exception \$_ALOM_catcherr){}";
                } else {
                    $_dcd32d9a06d7 .= $_d5cbf76f6b55 . "'));";
                    if ($_9d1930831f12['style']['hide_eval']) $_dcd32d9a06d7 .= 'foreach(\AlomDecoder' . $_5b3eb1c32c0d . '::$vrs as $_ALOM_key=>&$_ALOM_val)$$_ALOM_key=&$_ALOM_val;if(isset($_ALOM_key))unset($_ALOM_key,$_ALOM_val);';
                }
                $_dcd32d9a06d7 .= "\AlomDecoder{$_5b3eb1c32c0d}::uspv();";
            }
            $_dcd32d9a06d7 .= "\n?" . ">";
            self::mt_prng_reset();
            self::$_d186186a7d16 = [0x67452301, 0xefcdab89];
            self::$_3227269fab81 = [];
            self::$_68aa9304b10c = 0;
            self::log('code obfuscated successfully. (size=' . self::sizeformat(strlen($_dcd32d9a06d7)) . ')', 'success');
            return $_dcd32d9a06d7;
        }
    }

    AlomEncoder::$_2b3c116ebf09 = defined("STDIN") || PHP_SAPI === "cli" || (empty($_2a8f9d6dd428['REMOTE_ADDR']) and !isset($_2a8f9d6dd428['HTTP_USER_AGENT']) and count($_2a8f9d6dd428['argv']) > 0);
    AlomEncoder::$_bf509b6a6b3d = AlomEncoder::$_2b3c116ebf09;
}
