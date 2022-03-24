<?php
include_once "alomtoos.php";

$settings = [
  'license' => [
    'title' => 'example',
    'author' => 'Avid'
  ]
];

alom_obfuscate_into("rawfile.php", "encodedfile.obfs.php", $settings);

?>
