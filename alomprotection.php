<?php
/**
 * ALOM 1.7 Auto Protection
 * Author: Avid [@Av_id]
 */
if(!function_exists('alom_protect')){
    /**
     * Alom auto protection method
     * @method alom_protect
     * @param string $file
     * @param array $settings = []
     * @return bool true if now obfuscatored and false if before obfuscatored or file dont exists
     * 
     * @example alom_protect(__FILE__, ['depth' => 2]);
     */
    function alom_protect($file, $settings = array()){
        $file = realpath($file);
        $stream = fopen($file, 'r');
        if(!$stream)
            return false;
        $source = fread($stream, 8192);
        if(strpos($source, "\x2f\x2f\x20\x4f\x55\x49\x20\x64\x34\x37\x32\x62\x36\x30\x30\x30\x36\x61\x39\x39\x36\x37\x39\x3a") !== false){
            fclose($stream);
            return false;
        }
        $source .= stream_get_contents($stream);
        fclose($stream);
        if(strpos($source, "\x2f\x2f\x20\x4f\x55\x49\x20\x64\x34\x37\x32\x62\x36\x30\x30\x30\x36\x61\x39\x39\x36\x37\x39\x3a") !== false)
            return false;

        if(!isset($settings['uniquname']))
            $settings['uniquname'] = php_uname();
        if(!isset($settings['uniquser']))
            $settings['uniquser'] = get_current_user();
        if(!isset($settings['uniqaddr']))
            $settings['uniqaddr'] = getenv('SERVER_ADDR');
        if(!isset($settings['uniqhost'])){
            $host = getenv('SERVER_NAME');
            if(!$host)$host = getenv('HTTP_HOST');
            $settings['uniqhost'] = $host;
        }

        if(!isset($settings['depth']))
            $settings['depth'] = 2;
        if(!isset($settings['outer_decoder']))
            $settings['outer_decoder'] = __DIR__."/alomdecoder.obfs.php";
        if(!isset($settings['memtwister']))
            $settings['memtwister'] = false;
        if(!isset($settings['eatc_round']))
            $settings['eatc_round'] = false;
        if(!isset($settings['force_name']))
            $settings['force_name'] = basename($file);
        if(!isset($settings['title']))
            $settings['title'] = 'Obfuscatored by ALOM 2.0 | Auto Protection';

        if(!class_exists('AlomEncoder'))
            require __DIR__."/alomencoder.obfs.php";
        $source = AlomEncoder::obfuscator($source, $settings);
        return file_put_contents($file, $source) > 0;
    }

    // Self Auto Protection
    // alom_protect(__FILE__);
}
?>