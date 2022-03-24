<?php
require_once "alomtools.php";

$key = alom_license_key_generate("password 1234");
$settings = [
  'license' => [
    'license_key' => $key,
    'title' => 'example',
    'author' => 'Avid',
    'copyright' => 'Alom obfuscator',
    'checksum' => true
  ]
];

// Obfuscate script
alom_obfuscate_into("licenseCodeMaker.obfs.php", function(){
  print "Hello World!\n2 + 2 = " . (2 + 2);
});

// This script will not work without license code
// Create an license code
$systemhash = license_systemhash_generate([
  'user' => get_current_user()
]);
$licensecode = alom_license_code_encrypt($systemhash, $key, time() + 86400); // code valid for 1 day

// Insert license code to main script
alom_insert_license_code("licenseCodeMaker.obfs.php", $licensecode);

?>
