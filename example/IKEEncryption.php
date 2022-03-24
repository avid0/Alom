<?php
require_once "../alomtools.php";

$key = alom_includekey_generate("password 1234");
$settings = [
  'license' => [
    'title' => 'example'
  ],
  'identify' => [
    'include_key' => $key
  ]
];
alom_put('include1.php', function(){
  $var = "Hello ";
});
alom_put('include2.php', function(){
  $var.= "World!";
});
alom_obfuscate_into(function(){
  include 'include1.obfs.php';
  include 'include2.obfs.php';
  print $var;
}, "IKEEncryption.obfs.php");

alom_includekey_encrypt_into('include1.php', 'include1.obfs.php', $key);
alom_includekey_encrypt_into('include2.php', 'include2.obfs.php', $key);

?>
