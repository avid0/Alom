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

$var = "Hello i am hidden! find me :)";
print "Hello Tortoise!";
unset($var);

?>
