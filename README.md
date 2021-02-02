# Alom Obfuscator / PHP Encoder version 2.0

This powerful php-base obfuscator can protect from your codes for making non-readable scripts.
Of the capabilities of this mixer is setting access for specific system, antitamper, expiration of application, license, obfuscator output style (raw/base64), etc.

--------------

for obfuscatoring we need require alomencoder.obfs.php :
```php
include_once "alomencoder.obfs.php";
```
after that, we define $settings parameter, then use method AlomEncoder::Obfuscator()
```php
/**
 * @method AlomEncoder::Obfuscator()
 * @param string $code (php code with tags and html code)
 * @param string $settings = [] (obfuscate settings parameter)
 */
$settings = [
  'depth' => 1.5,
  'title' => 'example',
  'author' => 'Avid'
];
$code = file_get_contents("file.php"); // for example <?php print 'hello world';
$obfs = AlomEncoder::Obfuscator($code, $settings);
file_put_contents("file.obfs.php", $obfs); // save obfuscatored script
```

## $settings parameter

Index | default | type | description
----- | ------- | ---- | -----------
__depth__ | 1 | float | Complexity of obfuscator steps. This value take time computational O((x - ln(x)^2)^2.5 + depthType(messageLength) * (x - ln(x)^2))
__depth_type__ | logpower | string | Complexity function of depth. It can be one of the values of constant, logarithm, logpower, square, linear
__title__ | "Obfuscatored by ALOM 2.0" | string | Title of obfuscatored script. This parameter is displayed in the comments section at the beginning of the file.
__author__ | null | string | Author of main script. This parameter is displayed in the comments section.
__copyright__ | null | string | Copyright of script. This parameter is displayed in the comments section.
__description__ | null | string | Description of script. This parameter is displayed in the comments section.
__hide_comment__ | false | boolean | Remove comment section from the beginning of the file. (no one can change this section)
__file_denied__ | false | boolean | If the file does not have access to system files, you must set this option.
__rtw__ | null | int(unix time) | (Ready To Work) Start of allowed time for the program to run
__expiration__ | null | int(unix time) | End of allowed time for the program to run
__extra__ | null | string(code) | Extra script for display after comments section without antitamper (everyone can edit this section)
__extra_antitamper__ | null | string(code) | Extra script for display after comments section along antitamper (no one can change this section)
__uniquname__ | null | string(uname) | If you set this section, no system or user that has not this value will be able to run the program.
__uniquser__ | null | string(username) | If you set this section, no system or user that has not this value will be able to run the program.
__uniqaddr__ | null | string(ipv4) | If you set this section, no system or user that has not this value will be able to run the program.
__uniqhost__ | null | string(hostname) | If you set this section, no system or user that has not this value will be able to run the program.
__force_files__ | [] | array | If you specify the address of the files in this section, it means that the program need these files to run.
__outer_decoder__ | null | string | If you put the address of the file alomdecoder.obfs.php in this section, this file will be prevented from being repeated and program files will use this file to run.
__outer_memtwister__ | null | string | If you put the address of the file memtwister.obfs.php in this section, this file will be prevented from being repeated and program files will use this file to run. It will only be used when the round memtwister is active.
__minify__ | true | boolean | enable/disable minifier round.
__memtwister__ | false | boolean | enable/disable memtwister round.
__partial_keeper__ | false | boolean | enable/disable partial_keeper round.
__error_hiding__ | true | boolean | enable/disable display errors.
__raw__ | false | boolean | raw/base64 display style

## rounds
- **main**
- **minifier**
  - ? Script size reduction
  - ? Increase the speed of obfuscator and run
- **partial_keeper**
  - % Resistant to `forging keys and hashes to disable antitamper`
- **memtwister**
  - % Resistant to `forging keys and hashes to disable antitamper`
  - % Resistant to `reading and editing program memory`
  - ? Slowly obfuscatoring and Increase script size

!! Alom version 2.0 is weak without memtwister round. But it is disabled by default. Be careful in choosing options.

## Properties

##### alom auto protection
You can use this feature to automatically protect scripts on your system.
```php
require_once "alomprotection.php";
/**
 * Alom auto protection method
 * @method alom_protect
 * @param string $file
 * @param array $settings = []
 * @return bool true if now obfuscatored and false if before obfuscatored or file dont exists
 */
alom_protect(__FILE__); // Protect the current file
```

##### invisible keys
You can use invisible keys to encrypt data. Invisible keys will only be available to the running program.
Each time the desired constant is used, it will generate a random and fixed key for the program.
```php
if(alom_protect(__FILE__)) // Protect current file for using invisible keys
  die("Obfuscatored");
$key = bin2hex(ALOM_INVISIBLE_KEY32);

$contents = decrypt(file_get_contents("file.txt"), $key); // decrypt file contents
...
file_put_contents("file.txt", encrypt($contents, $key)); // encrypt file contents

unset($key); // delete key
```
invisible keys:
* ALOM_INVISIBLE_KEY[n=2,3,4,8,12,16,24,32,64,96,128,256,384,512,1024,2048,4096,8192] (n-bits binary string)
* ALOM_INVISIBLE_CHAR (one byte)
* ALOM_INVISIBLE_BIT (one bit)
* ALOM_INVISIBLE_INT (int32)

##### variable protection
Protecting variables hides them and no one but the running program can access the contents of the variables. The protected variable will be removed at the end of the program.
```php
if(alom_protect(__FILE__)) // Protect current file for using invisible keys
  die("Obfuscatored");
$iv = "Hello world! 1234";
alom_protect_var('iv');

$key = bin2hex(ALOM_INVISIBLE_KEY32);
alom_protect_var('key');

$contents = decrypt(file_get_contents("file.txt"), $key, $iv); // decrypt file contents
...
file_put_contents("file.txt", encrypt($contents, $key, $iv)); // encrypt file contents
```

##### information constants
* ALOM_VERSION
* ALOM_OBFUSCATORED_TIME
* ALOM_OBFUSCATORED_TIME_FLOAT

##### minify script
The act of removing comments and spaces and extra code from a script is called minifying.
```php
/**
 * @method AlomEncoder::minify
 * @param string $src
 */
$src = file_get_contents("file.php"); // source code
$dst = AlomEncoder::minify($src); // minify source
file_put_contents("file.min.php", $dst); // save code
```

## Fixed vulnerabilities
- [x] [version >= 1.6] `forging keys and hashes to disable antitamper` with partial_keeper round
- [x] [version >= 2.0] [`__FILE__ Vulnerability`](/../../issues/1)
- [x] [version >= 2.0] `reading and editing program memory` (lossy mining) with memtwister round
