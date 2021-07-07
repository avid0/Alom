<?php
require_once "../alomencoder.obfs.php";

$settings = [
  'license' => [
    'title' => 'Expired Hello World',
    'author' => 'Avid',
    'copyright' => 'https://github.com/avid0/Alom examples'
  ],
  'date_domain' => [
    'expiration' => time() + 60, // 1 min
  ]
];

$obfuscatored = AlomEncoder::Obfuscator(function(){
  $var = "Hello I am hidden! find me";
  print "Hello world!";
  unset($var);
}, $settings);
file_put_contents('expiredHelloWorld.obfs.php', $obfuscatored);

?>
