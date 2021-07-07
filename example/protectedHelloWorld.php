<?php
require_once "../alomtools.php";
alom_protect(__FILE__, [
  "rounds" => [
    "main" => [
      "depth" => 1.5
    ]
  ]
]);

$var = "Hello i am hidden! find me";
print "Hello World!";
unset($var);
?>
