<?php
require_once "../alomtools.php";
# Slow but Strong
alom_protect(__FILE__, [
  "rounds" => [
    "main" => [
      "depth" => 1.5
    ],
    "optwister" => [
      "enable" => true
    ],
    "partitioning" => [
      "enable" => true
    ]
  ]
]);

$obfuscatored = AlomEncoder::Obfuscator(function(){
  $var = "Hello I am hidden! find me";
  print "Hello Tortoise!";
  alom_protect_var($var);
}, $settings);
file_put_contents('helloTortoise.obfs.php', $obfuscatored);

?>
