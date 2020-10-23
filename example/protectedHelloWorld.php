<?php
require_once "../alomprotection.php";
alom_protect(__FILE__, [
  "depth" => 1.5
]);

$var = "Hello i am hidden! find me";
print "Hello World!";
unset($var);
?>
