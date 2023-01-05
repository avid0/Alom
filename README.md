# Alom Obfuscator / PHP Encoder version 3.0
### (Deprecated - A new version will be written soon)

This powerful php-base obfuscator can protect from your codes for making non-readable scripts.
Of the capabilities of this mixer is setting access for specific system, antitamper, expiration of application, license, obfuscator output style (raw/base64), etc.

[راهنمای فارسی](https://github.com/avid0/Alom/blob/main/doc/README.fa.md)

[Download ZIP](https://github.com/avid0/Alom/archive/refs/heads/main.zip)

--------------

for obfuscatoring we need require alomencoder.obfs.php :
```php
include_once "alomencoder.obfs.php";
```
after that, we define $settings parameter, then use method AlomEncoder::obfuscator()
```php
/**
 * @method AlomEncoder::Obfuscator()
 * @param string|callable $code (php code with tags and html code | php file name | an callable)
 * @param array $settings = [] (obfuscate settings parameter)
 */
$settings = [
  'rounds' => [
    'main' => [
      'depth' => 1
    ]
  ],
  'license' => [
    'title' => 'example',
    'author' => 'Avid'
  ]
];
$obfs = AlomEncoder::obfuscator("file.php", $settings);
file_put_contents("file.obfs.php", $obfs); // save obfuscated script
```

## Setting parameters

Index | Type | Description
----- | ---- | -----------
__license__ | array | [License settings](https://github.com/avid0/Alom#license-settings)
__additional__ | array | [Additional settings](https://github.com/avid0/Alom#additional-settings)
__identify__ | array | [Identify settings](https://github.com/avid0/Alom#identfy-settings)
__date__ | array | [Date settings](https://github.com/avid0/Alom#date-settings)
__rounds__ | array | [Rounds settings](https://github.com/avid0/Alom#rounds-settings)
__style__ | array | [Style settings](https://github.com/avid0/Alom#style-settings)
__handler__ | array | [Handler settings](https://github.com/avid0/Alom#handler-settings)

### License settings
Index | Type | Default | Description
----- | ---- | ------- | -----------
__type__ | string | "comment" | Type of license. comment/file/remove
__license_file__ | string | "alomObfuscator.php.license" | If type of license set to file, then this option is name of license file.
__license_key__ | string | null | We can build a license code system using the license key definition.
__license_verifier_api__ | string | null | For license code systems we can define an api url for verifing and controlling license codes. The format of license code should be like https://example.com/%code% then alom will then replace %code% with the md5(license_code). The response should be in format "status" or "status/warning_log" where status is 0/1 or true/false and warning_log is an string.
__text__ | string | "This script has protected by Alom." | Main text of license on top
__title__ | string | "Obfuscated by Alom" |
__copyright__ | string | null |
__description__ | string | null | Description of script
__checksum__ | bool | false | If set to true then, checksum of script replace with that.
__sience__ | string | null |
__...__ | string | null | Other optional parameters.

### Additional settings
Index | Type | Description
----- | ---- | -----------
__antitamper__ | string\|callable | A part of the script that is not obfuscated and visible and can not be manipulated and changed by the user.
__optional__ | string\|callable | A part of the script that is not obfuscated and visible and can be manipulated and changed by the user.
__shutdown__ | string\|callable | A part of the obfuscatored script for execution on shutdown.

### Identify settings
Index | Type | Description
----- | ---- | -----------
__uname__ | array | [Uname identify settings](https://github.com/avid0/Alom#identify-property-settings)
__username__ | array | [Username identify settings](https://github.com/avid0/Alom#identify-property-settings)
__ipaddr__ | array | [Ipaddr identify settings](https://github.com/avid0/Alom#identify-property-settings)
__hostname__ | array | [Hostname identify settings](https://github.com/avid0/Alom#identify-property-settings)
__filename__ | array | [Filename identify settings](https://github.com/avid0/Alom#identify-property-settings) unique file name of obfuscated file
__include_key__ | string | decryption key for IKE including files
__files__ | array | List of file paths that are required to run the script.

#### Identify property settings
Index | Type | Description
----- | ---- | -----------
__value__ | string | Value of property.
__hashed__ | boolean | Property is hashed with md5 raw. default=false

### Date settings
Index | Type | Description
----- | ---- | -----------
__ready__ | int(unix time) | Start of allowed time for the program to run.
__expiration__ | int(unix time) | End of allowed time for the program to run.

### Rounds settings
Index | Type | Description
----- | ---- | -----------
__main__ | array | [Main round settings](https://github.com/avid0/Alom#main-round-settings)
__minify__ | array | [Minify round settings](https://github.com/avid0/Alom#rounds-property-settings)
__optwister__ | array | [Optwister round settings](https://github.com/avid0/Alom#rounds-property-settings) (slow running)
__partitioning__ | array | [Partitioning round settings](https://github.com/avid0/Alom#partitioning-round-settings) (slow running)
__antidebugger__ | array | [Antidebugger round settings](https://github.com/avid0/Alom#rounds-property-settings)
__antihooking__ | array | [Antihooking round settings](https://github.com/avid0/Alom#antihooking-round-settings)
__unmeaning__ | array | [Unmeaning round settings](https://github.com/avid0/Alom#unmeaning-round-settings)
__qbc__ | array | [QBC round settings](https://github.com/avid0/Alom#rounds-property-settings)

#### Main round settings
Index | Type | Default | Description
----- | ---- | ------- | -----------
__depth_type__ | string | "logpower" | Complexity function of depth. It can be one of the values of constant, logarithm, logpower, square, linear.
__depth__ | float | 1 | Complexity of obfuscator steps.
__base64rand_round__ | boolean | false |
__deflate_round__ | boolean | true |
__iterate_base64__ | int | 0 |

#### Partitioning round settings
Index | Type | Default
----- | ---- | -------
__enable__ | boolean | false
__fast__ | boolean | false

#### Antihooking round settings
Index | Type | Default
----- | ---- | -------
__enable__ | boolean | true
__deep__ | boolean | false (because slow running)

#### Unmeaning round settings
Index | Type | Default
----- | ---- | -------
__variables__ | boolean | true
__strings__ | boolean | true
__statements__ | boolean | true
__var2str__ | boolean | false
__salt__ | string | ALOM_UNIQUE_RANDOM
__prefix__ | string | '\_'
__size__ | int | 10
__free__ | array | []

#### Rounds property settings
Index | Type | Default
----- | ---- | -------
__enable__ | boolean | false(for optwister, qbc)/true(for minify, antidebugger)

### Style settings
Index | Type | Default | Description
----- | ---- | ------- | -----------
__separated_loader__ | array | null | [Separated loader settings](https://github.com/avid0/Alom#separated-loader-settings)
__halt_mode__ | boolean | false | enable/disable halt mode.
__hide_errors__ | boolean | true | enable/disable display errors.
__hide_eval__ | boolean | true | enable/disable run main script in inner eval.
__global_cache__ | boolean | true | enable/disable global caching for enabled hide_eval setting.
__display__ | string | "base64" | raw/hex/bin/base64/base64r display model.

#### Separated loader settings
Index | Type | Description
----- | ---- | -----------
__decoder_file__ | string | If you put the address of the file alomdecoder.obfs.php in this section, this file will be prevented from being repeated and program files will use this file to run.

### Handler settings
Index | Type | Parameters | Description
----- | ---- | ---------- | -----------
__error__ | callable | string $message, int $line | For syntax errors of script.
__status__ | callable | string $status, int $progress = null | For status and progressing of obfuscatoring. (longest level of obfuscator is main_walk state).

### Static properties
Index | Type | Default
----- | ---- | -------
__AlomEncoder::$logger__ | boolean | is cli

## Properties

### Alom auto update
You can use the function alom_autogit on top of your scripts for auto updating alom files.
```php
require_once "alomtools.php";
/**
 * Alom auto update files from github
 * @method alom_autogit
 * @param string $path = '.'
 * @return bool
 */
alom_autogit("path/alom");
```

### Alom auto protection
You can use this feature to automatically protect scripts on your system.
```php
require_once "alomtools.php";
/**
 * Alom auto protection method
 * @method alom_protect
 * @param string $file
 * @param array $settings = []
 * @return bool true if now obfuscatored and false if before obfuscatored or file dont exists
 */
alom_protect(__FILE__); // Protect the current file
```

### Invisible keys
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

### Variable protection
Protecting variables hides them and no one but the running program can access the contents of the variables. The protected variable will be removed at the end of the program.
```php
if(alom_protect(__FILE__)) // Protect current file for using invisible keys
  die("Obfuscatored");
$iv = "Hello world! 1234";
alom_protect_var($iv);

$key = bin2hex(ALOM_INVISIBLE_KEY32);
alom_protect_var($key);

$contents = decrypt(file_get_contents("file.txt"), $key, $iv); // decrypt file contents
...
file_put_contents("file.txt", encrypt($contents, $key, $iv)); // encrypt file contents
```

### Information constants
* ALOM_VERSION
* ALOM_VERSION_NUMBER
* ALOM_OBFUSCATED_TIME
* ALOM_OBFUSCATED_TIME_FLOAT

### Minify script
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

### License code generator
We can generate a license code for users to use the script by keeping the key used in the license secret. This license code can restrict the user's system or have a specific time frame to run the script.
First we need alomtools.php file:
```php
require_once "alomtools.php";
```
We have three thing for making license code:
#### License key
License key is an private string for making license codes. We can create license key with:
```php
string alom_license_key_generate(string $init = null);
```
If no text is entered, it will generate a random key.
#### SystemHash
A hash to restrict systems from running scripts.
You can not set a limit by not entering options, but creating a systemhash is required.
```php
string license_systemhash_generate(array $info = []);
```
The following is a list of variable $info options:
Index | Type | Default
----- | ---- | -------
__uname__ | string | will not be limited
__username__ | string | will not be limited
__ipaddr__ | string | will not be limited
__hostname__ | string | will not be limited
#### License code
After creating the systemhash, you must apply the key to it so that no one but you can create the license code.
```php
string alom_license_code_encrypt(string $systemhash, string $license_key, int(unix) $expiration = will not be limited, int(unix) $ready = will not be limited);
```
You can also decrypt the license code to systemhash, expiration time and ready time using the code and key.
```php
array alom_license_code_decrypt(string $license_code, string $license_key);
```
#### License file
You can paste or read the license code in the license file with the following functions.
```php
string alom_get_license_code(string $file); // get license code from license file
bool alom_exists_license_code(string $file); // check if exists license code in license file
bool alom_insert_license_code(string $file, string $license_code); // insert license code into license file
```
### OScript
You can set up an API system on your server to provide an online script so that you need to call this API for each run. It is not possible to run the script without connecting to the server.
```php
# oscript server
require_once "alomtools.php";
/**
 * Alom oscript web server (send to output)
 * @method alom_prepare_oscript
 * @param string $file obfuscated script with license_code
 * @param string $license_key
 * @param string $password = ''
 * @return bool
 */
alom_prepare_oscript($file, $license_key);
```
And for client we need URL of script on server:
```php
# oscript client
require_once "alomtools.php";
/**
 * Alom oscript client
 * @method alom_exec_oscript
 * @param string $url
 * @param string $password = ''
 * @return string oscript code or false if oscript url is invalid
 *
 * @example include(alom_exec_oscript("https://example.code/oscript.php"));
 */
include(alom_exec_oscript("https://example.code/oscript.php"));
```

### IKE Encryption
You can encrypt files that are being called indirectly by being included in obfuscatored scripts for more speed with this method. Note that your file is no longer executable without the key used, and you can use it by entering the key when scrambling the main script.
#### Include key
Include key is an private string for making IKE files. We can create include key with:
```php
string alom_includekey_generate(string $init = null);
```
If no text is entered, it will generate a random key.
### IKE encrypt and decrypt
For make an IKE file you need source script (example file.php) and dest file name (example file.php.ike). then:
```php
alom_includekey_encrypt_into("file.php", "file.php.ike", $key);
```
Also you can use other functions:
```php
string alom_includekey_encrypt(string|callable $code, string $key);
string alom_includekey_decrypt(string $code, string $key);
int alom_includekey_encrypt_into(string|callable $code, string $file, string $key);
int alom_includekey_decrypt_into(string $code, string $file, string $key);
```

### Other alomtools.php functions
```php
is_alom_obfuscated(string $file); // check if file is obfuscated by alom
alom_minify(string|callable $script); //
alom_minify_into(string $script, string $file); //
alom_obfuscate(string|callable $script); //
alom_obfuscate_into(string $script, string $file); //
alom_put(string $file, string|callable $script); //
alom_phpify(string|callable $script); //
alom_deflate(string|callable $script); //
alom_vanilla(string|callable $script); //
```
#### Obfuscate directory
You can obfuscate all php files in source directory into dest directory.
You can also specify whether or not to copy other files.
```php
alom_obfuscate_dir(string $source, string $dest, array $settings = [], bool $copy = false);
```

-----------
### Updates
- [x] 2.8: Fix bugs for unmeaning, partitioning, optwister, gc_cache
- [x] 2.8: Add handlers for programming obfuscator systems.
- [x] 3.0: Support php version 8
- [x] 3.0: Fixed unmeaning variables indexed by $GLOBALS
- [x] 3.0: Fixed unmeaning variables for includes
- [x] 3.0: Fixed unmeaning variables for phars
- [x] 3.0: Fixed license code system
- [x] 3.0: Add unmeaning.strings
- [x] 3.0: Add unmeaning.var2str
- [x] 3.0: Add unmeaning.statement
- [ ] 3.1: Add unmeaning.shuffling
