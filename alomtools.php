<?php
/**
 * ALOM Tools
 * Author: Avid [@Av_id]
 */
if(!defined('ALOM_VERSION')){define('ALOM_VERSION', '2.7');}
if(!defined('ALOM_VERSION_NUMBER')){define('ALOM_VERSION_NUMBER', 20700);}
if(!class_exists('AlomEncoder'))
    require __DIR__."/alomencoder.obfs.php";

/**
 * Check if input file is an obfuscated file by alom
 * @method is_alom_obfuscated
 * @param string $file
 * @return bool
 */
function is_alom_obfuscated($file){
    $stream = @fopen($file, 'r');
    if(!$stream)
        return false;
    $source = fread($stream, 4096);
    $tag = "\x23\x20\x41\x4c\x4f\x4d\x20\x41\x4e\x54\x49\x54\x41\x4d\x50\x45\x52\x20\x53\x45\x47\x4d\x45\x4e\x54\x20\x53\x45".
           "\x50\x41\x52\x41\x54\x4f\x52\x20\x64\x34\x37\x33\x62\x36\x30\x36\x61\x39";
    if(strpos($source, $tag) !== false){
        fclose($stream);
        return true;
    }
    $source .= stream_get_contents($stream);
    fclose($stream);
    if(strpos($source, $tag) !== false)
        return true;
    return false;
}

/**
 * Alom auto protection method
 * @method alom_protect
 * @param string $file
 * @param array $settings = []
 * @return bool true if now obfuscatored and false if before obfuscatored or file dont exists
 * 
 * @example alom_protect(__FILE__);
 */
function alom_protect($file, $settings = array()){
    $file = realpath($file);
    if(!$file || is_alom_obfuscated($file))
        return false;

    if(!isset($settings['identify']))
        $settings['identify'] = [];
    if(!isset($settings['identify']['uname']) || !isset($settings['identify']['uname']['value'])){
        $settings['identify']['uname'] = [
            "value" => php_uname(),
            "hashed" => false
        ];
    }
    if(!isset($settings['identify']['username']) || !isset($settings['identify']['username']['value'])){
        $settings['identify']['username'] = [
            "value" => get_current_user(),
            "hashed" => false
        ];
    }
    if(!isset($settings['identify']['ipaddr']) || !isset($settings['identify']['ipaddr']['value'])){
        $settings['identify']['ipaddr'] = [
            "value" => getenv('SERVER_ADDR'),
            "hashed" => false
        ];
    }
    if(!isset($settings['identify']['hostname']) || !isset($settings['identify']['hostname']['value'])){
        $host = getenv('SERVER_NAME');
        if(!$host)$host = getenv('HTTP_HOST');
        $settings['identify']['hostname'] = [
            "value" => $host,
            "hashed" => false
        ];
    }

    if(!isset($settings['style']))
        $settings['style'] = [];
    if(!isset($settings['style']['separated_loader']))
        $settings['style']['separated_loader'] = [];
    if(!isset($settings['style']['separated_loader']['decoder_file']))
        $settings['outer_decoder'] = __DIR__."/alomdecoder.obfs.php";
    
    if(!isset($settings['license']))
        $settings['license'] = [];
    if(!isset($settings['license']['title']))
        $settings['license']['title'] = 'Obfuscated by ALOM '.ALOM_VERSION.' | Auto Protection';

    $source = AlomEncoder::obfuscator($source, $settings);
    return file_put_contents($file, $source) > 0;
}

/**
 * Alom get license code from license file
 * @method alom_get_license_code
 * @param string $file
 * @return string or false if licenese code do not exists
 */
function alom_get_license_code($file){
    $contents = @file_get_contents($file);
    if(!$contents)
        return false;
    $license_code = AlomEncoder::license_find_code($contents);
    if(!$license_code)
        return false;
    $license_code = str_replace([' ', "\n", "\r", "\t", '-', '[', ']', '*'], '', strtolower($license_code));
    if(!$license_code)
        return false;
    $license_code = '['.substr($license_code, 0, 48).'-'.substr($license_code, 48, 32).'-'.substr($license_code, 80, 16).']';
    return $license_code;
}

/**
 * Alom check if exists license code in license file
 * @method alom_exists_license_code
 * @param string $file
 * @return bool
 */
function alom_exists_license_code($file){
    $contents = @file_get_contents($file);
    if(!$contents)
        return false;
    $license_code = AlomEncoder::license_find_code($contents);
    return (bool)$license_code;
}

/**
 * Alom insert license code with license file
 * @method alom_insert_license_code
 * @param string $file
 * @return bool Return false if license file do not need license code or invalid license code
 */
function alom_insert_license_code($file, $license_code){
    $contents = @file_get_contents($file);
    if(!$contents)
        return false;
    $prev = $contents;
    $license_code = str_replace([' ', "\n", "\r", "\t", '-', '[', ']', '*'], '', strtolower($license_code));
    if(strlen($license_code) != 96)
        return false;
    $license_code = '['.substr($license_code, 0, 48).'-'.substr($license_code, 48, 32).'-'.substr($license_code, 80, 16).']';
    $contents = AlomEncoder::license_insert_code($contents, $license_code);
    if($contents == $prev)
        return false;
    return (bool)@file_put_contents($file, $contents);
}

/**
 * Alom minify contents
 * @method alom_minify
 * @param string $code
 * @return string minified script
 */
function alom_minify($code){
    return AlomEncoder::minify($code);
}

/**
 * Alom obfuscate contents
 * @method alom_obfuscate
 * @param string|callable $code
 * @param array $settings = []
 * @return string obfuscated code
 */
function alom_obfuscate($code, $settings = []){
    return AlomEncoder::obfuscator($code, $settings);
}

/**
 * Alom minify contents into file
 * @method alom_minify_into
 * @param string $code
 * @param string $file
 * @return bool
 */
function alom_minify_into($code, $file){
    $code = AlomEncoder::minify($code);
    return (bool)@file_put_contents($file, $code);
}

/**
 * Alom obfuscate contents into file
 * @method alom_obfuscate_into
 * @param string|callable $code
 * @param string $file
 * @param array $settings = []
 * @return bool
 */
function alom_obfuscate_into($code, $file, $settings = []){
    $code = AlomEncoder::obfuscator($code, $settings);
    return (bool)@file_put_contents($file, $code);
}

/**
 * Alom generate license key
 * @method alom_license_key_generate
 * @param string $init = Random
 * @return string
 */
function alom_license_key_generate($init = null){
    return AlomEncoder::license_key_generate($init);
}

/**
 * Alom generate systemhash for license code
 * @method alom_license_systemhash_generate
 * @param array $datas [
 *   string $uname,
 *   string $username,
 *   string $ipaddr,
 *   string $hostname
 * ] = []
 * @return string
 */
function alom_license_systemhash_generate($datas = array()){
    return AlomEncoder::license_systemhash_generate($datas);
}

/**
 * Alom license code generator
 * @method alom_license_code_encrypt
 * @param string $systemhash
 * @param string $license_key
 * @param int $expiration = 0x7fffffff Unix time
 * @param int $ready = 0 Unix time
 * @return string license code
 */
function alom_license_code_encrypt($systemhash, $license_key, $expiration = 0x7fffffff, $ready = 0){
    return AlomEncoder::license_code_encrypt($ready, $expiration, $systemhash, $license_key);
}

/**
 * Alom license code decryption
 * @method alom_license_code_decrypt
 * @param string $license_code
 * @param string $license_key
 * @return array or false if license code invalid
 */
function alom_license_code_decrypt($license_code, $license_key){
    return AlomEncoder::license_code_decrypt($license_code, $license_key);
}

/**
 * Alom include key generate
 * @method alom_includekey_generate
 * @param string $init = Random
 * @return string
 */
function alom_includekey_generate($init = null){
    return AlomEncoder::include_key_generate($init);
}

/**
 * Alom include key encrypt
 * @method alom_includekey_encrypt
 * @param string|callable $code
 * @param string $key
 * @return string
 */
function alom_includekey_encrypt($code, $key){
    if(is_string($code) && file_exists($code))
        $code = file_get_contents($code);
    elseif(is_callable($code))
        $code = "<"."?php\n".AlomEncoder::getcallable($code)."\n?".">";
    return AlomEncoder::include_key_encrypt($code, $key);
}

/**
 * Alom include key decrypt
 * @method alom_includekey_decrypt
 * @param string $code
 * @param string $key
 * @return string
 */
function alom_includekey_decrypt($code, $key){
    if(is_string($code) && file_exists($code))
        $code = file_get_contents($code);
    return AlomEncoder::include_key_decrypt($code, $key);
}

/**
 * Alom include key encrypt into file
 * @method alom_includekey_encrypt_into
 * @param string|callable $code
 * @param string $file
 * @param string $key
 * @return int
 */
function alom_includekey_encrypt_into($code, $file, $key){
    if(is_string($code) && file_exists($code))
        $code = file_get_contents($code);
    elseif(is_callable($code))
        $code = "<"."?php\n".AlomEncoder::getcallable($code)."\n?".">";
    return file_put_contents($file, AlomEncoder::include_key_encrypt($code, $key));
}

/**
 * Alom include key decrypt into file
 * @method alom_includekey_decrypt_into
 * @param string $code
 * @param string $file
 * @param string $key
 * @return int
 */
function alom_includekey_decrypt_into($code, $file, $key){
    if(is_string($code) && file_exists($code))
        $code = file_get_contents($code);
    return file_put_contents($file, AlomEncoder::include_key_decrypt($code, $key));
}

/**
 * Alom oscript web server (send to output)
 * @method alom_prepare_oscript
 * @param string $file obfuscated script with license_code
 * @param string $license_key
 * @param string $password = ''
 * @return bool
 */
function alom_prepare_oscript($file, $license_key, $password = ''){ #server
    if(!is_alom_obfuscated($file))
        return false;
    $contents = @file_get_contents($file);
    if(!$contents)
        return false;
    $license_code = AlomEncoder::license_find_code($contents);
    if(!$license_code)
        return false; // obfuscated script do not need license_code
    if(!isset($_POST['ipaddr']) || !isset($_POST['username']) || !isset($_POST['uname']) || !isset($_POST['hostname']) || !isset($_POST['password']))
        return false;
    $ipaddr = hex2bin($_POST['ipaddr']);
    $username = hex2bin($_POST['username']);
    $uname = hex2bin($_POST['uname']);
    $hostname = hex2bin($_POST['hostname']);
    $password = md5('alom-oscript-rY^!1bV&r[o4[=Jk2-'.$password);
    if($password != $_POST['password'])
        return false;
    $systemhash = alom_license_systemhash_generate(array(
        'uname' => $uname,
        'username' => $username,
        'ipaddr' => $ipaddr,
        'hostname' => $hostname
    ));
    $now = time();
    $license_code = alom_license_code_encrypt($now, $now + 3, $systemhash, $license_key);
    $contents = alom_license_insert_code($contents, $license_code);
    if(!send_headers()){
        header("Content-Type: text/plain");
    }
    print $contents;
    return true;
}

/**
 * Alom oscript client
 * @method alom_exec_oscript
 * @param string $url
 * @param string $password = ''
 * @return string oscript code or false if oscript url is invalid
 *
 * @example include(alom_exec_oscript("https://example.code/oscript.php"));
 */
function alom_exec_oscript($url, $password = ''){
	$uname = md5(php_uname());
    $username = md5(get_current_user());
    $ipaddr = md5(getenv('SERVER_ADDR'));
    $hostname = getenv('SERVER_NAME');
    if(!$hostname)
      	$hostname = getenv('HTTP_HOST');
	$hostname = md5($hostname);
    $password = md5('alom-oscript-rY^!1bV&r[o4[=Jk2-'.$password);
    $ch = curl_init($url);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'uname' => $uname,
        'username' => $username,
        'ipaddr' => $ipaddr,
        'hostname' => $hostname,
        'password' => $password
    ]);
    $result = curl_exec($ch);
    curl_close($ch);
    if(!$result)
        return false;
    $filename = "alom.oscript.".bin2hex(random_bytes(8)).".php";
    $result = "<?php file_put_contents(__FILE__,substr(file_get_contents(__FILE__),79,-25));?>$result<?php unlink(__FILE__);?>";
    file_put_contents($filename, $result);
  	return $filename;
}

/**
 * Alom directory obfuscator
 * obfuscate all php files in directory into another directory
 * @method alom_obfuscate_dir
 * @param string $from directory
 * @param string $to directory
 * @param array $settings = []
 * @param bool $copy = false Copy non php files
 * @param bool
 */
function alom_obfuscate_dir($from, $to, $settings = [], $copy = false){
    if(!file_exists($to)){
        if(!mkdir($to))
            return false;
    }elseif(is_file($to))
        return false;
    $files = scandir($from);
    if(!$files)
        return false;
    foreach($files as $file)
        if($file == '.' || $file == '..');
        elseif(is_file("$from/$file")){
            if(strtolower(substr($file, -4)) == '.php')
                alom_obfuscate_into("$from/$file", "$to/$file", $settings);
            elseif($copy)
                copy("$from/$file", "$to/$file");
        }else{
            if(!file_exists("$to/$file")){
                if(!mkdir("$to/$file"))
                    continue;
            }elseif(is_file($to))
                continue;
            alom_obfuscate_dir("$from/$file", "$to/$file", $settings);
        }
    return true;
}

?>