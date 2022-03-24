<?php
require_once "../alomtools.php";

// This function will compress your php script

// save uncompressed script
alom_put("uncompressed.php", function(){
  function toggleletters(string $string){
    return strtolower($string) ^ strtoupper($string) ^ $string;
  }
  $string = "Hello world!";
  print toggleletters($string);
});

// get script
$script = file_get_contents("uncompressed.php");

// compression function
function compressphp(string $code){
  // minify script
  $code = alom_minify($code);
  
  // gzip script
  $code = '?'.'>'.gzdeflate($code, 9).'<'.'?php';
  
  // add eval function
  $code = '<'.'?php eval(gzinflate(base64_decode("'.base64_encode($code).'"))); ?'.'>';
  
  return $code; // This is not obfuscatoring. This is just for reduce script size. Alom Obfuscator will automatically use this proccessing do not use this by obfuscator.
}

// compressing script
$compress = compressphp($script);

// save compressed script
alom_put("compressed.php", $compress);

?>
