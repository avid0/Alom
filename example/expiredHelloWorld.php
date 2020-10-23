<?php
require_once "../alomencoder.obfs.php";

$settings = [
  'expiration' => time() + 60, // 1 min
  'title' => 'Expired Hello World',
  'copyright' => 'https://github.com/avid0/Alom examples',
  'author' => 'Avid'
];

$code = '<?php
$var = "Hello I am hidden! find me";
print "Hello world!";
unset($var);
?>';

$obfuscatored = AlomEncoder::Obfuscator($code, $settings);
file_put_contents('expiredHelloWorld.obfs.php', $obfuscatored);

?>
