<?php
require_once "../alomtools.php";

$filename = "toggle.php";
alom_put($filename, function(){
  // This script will be saved in file.php by php tags.
  // This is an additional function. The script will not be obfuscatoring.
  
  function toggleletters(string $string){
    return strtolower($string) ^ strtoupper($string) ^ $string;
  }
  if(isset($_REQUEST['string'])){
    $string = $_REQUEST['string'];
  }elseif(isset($argv[1])){
    $string = $argv[1];
  }else{
    print "please give me an string!";exit;
  }
  
  print toggleletters($string);
});

if(isset($_SERVER['SCRIPT_URI'])){
  $uri = $_SERVER['SCRIPT_URI'];
  $url = $_SERVER['SCRIPT_URL'];
  if(strpos($uri, $url) !== false)
    $uri = dirname($uri);
  $uri.= "/$filename";
  print file_get_contents("$uri?string=Hello+World");
}else{
  print shell_exec("php ".realpath(toggle.php)." 'Hello World'");
}

?>
