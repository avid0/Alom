# Alom Obfuscator / PHP Encoder version 2.8

این درهم ساز زبان پی اچ پی میتونه با تبدیل اسکریپت های شما به یک اسکریپت غیرقابل فهم و تغییر از انها در برابر ادیت شدن محافظت کنه.
و البته تنظیمات مختلفی هم ارائه داده شده برای نمونه تنظیم قابل اجرا بودن فقط روی یک سیستم خاص یا در یک بازه زمانی خاص, ساختن لایسنس, تنظیم نمایش فایل انکد شده و غیره.

[دانلود زیپ](https://github.com/avid0/Alom/archive/refs/heads/main.zip)

--------------

برای درهم سازی ما به فراخوانی فایل alomencoder.obfs.php نیاز داریم :
```php
include_once "alomencoder.obfs.php";
```
بعدش ما ارایه $settings رو با تنظیمات دلخواهمون میسازیم و سپس از متد AlomEncoder::obfuscator() استفاده میکنیم
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
__license__ | array | [تنظیمات لایسنس](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#license-settings)
__additional__ | array | [تنظیمات کد اضافه](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#additional-settings)
__identify__ | array | [تنظیمات هویتی](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#identfy-settings)
__date__ | array | [تنظیمات بازه زمانی](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#date-settings)
__rounds__ | array | [تنظیمات لایه های امنیتی](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#rounds-settings)
__style__ | array | [تنظیمات استایل](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#style-settings)
__handler__ | array | [تنظیمات هندلر](https://github.com/avid0/Alom#handler-settings)

### License settings
Index | Type | Default | Description
----- | ---- | ------- | -----------
__type__ | string | "comment" | نوع لایسنس comment/file/remove
__license_file__ | string | "alomObfuscator.php.license" | اگر لایسنس از نوع فایل باشد, این پارامتر نام فایل لایسنس خواهد بود.
__license_key__ | string | null | ما میتوانیم یک سیستم کد لایسنس با تنظیم کلید لایسنس مخفی بسازیم.
__license_verifier_api__ | string | null | برای سیستم کد لایسنس میتوانیم یک لینک ای پی ای برای اعتبار سنجی کد لایسنس و کنترل موارد دیگر استفاده کنیم. فرمت لینک ای پی ای باشد به شکل https://example.com/%code% باشد. سپس الوم بجای %code% مقدار md5(license_code) را جایگذاری میکند. خروجی ای پی ای میتواند به فرم "status" یا به فرم باشد "status/warning_log" به طوری که status یک مقدار 0 یا 1 و یا true یا false هست و warning_log یه متن هست.
__text__ | string | "This script has protected by Alom." | متن اصلی لایسنس در بالا
__title__ | string | "Obfuscated by Alom" |
__copyright__ | string | null |
__description__ | string | null | اطلاعات مربوط به اسکریپت
__checksum__ | bool | false | اگر به مقدار true تنظیم شود, یک مولفه اثرانگشت مانند برای اسکریپت به جای این پارامتر در نظر گرفته میشود.
__sience__ | string | null |
__...__ | string | null | بقیه پارامتر های لایسنس

### Additional settings
Index | Type | Description
----- | ---- | -----------
__antitamper__ | string\|callable | بخشی از سورس درهم شده که مستقیما نمایش داده شده ولی قابل تغییر و دستکاری نمیباشد.
__optional__ | string\|callable | بخشی از سورس درهم شده که مستقیما نمایش داده شده و قابل تغییر و دستکاری میباشد.
__shutdown__ | string\|callable | بخشی از سورس درهم شده که هنگام پایان یافتن سورس اجرا میشود.

### Identify settings
Index | Type | Description
----- | ---- | -----------
__uname__ | array | [Uname identify settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#identify-property-settings)
__username__ | array | [Username identify settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#identify-property-settings)
__ipaddr__ | array | [Ipaddr identify settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#identify-property-settings)
__hostname__ | array | [Hostname identify settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#identify-property-settings)
__filename__ | array | [Filename identify settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#identify-property-settings) unique file name of obfuscated file
__include_key__ | string | کلید دکریپت برای فایل های IKE اینکلود شده
__files__ | array | لیستی از ادرس فایل ها که برای اجرای فایل درهم شده وجودشون اجباری و محتوای انها غیرقابل تغییر باشد.

#### Identify property settings
Index | Type | Description
----- | ---- | -----------
__value__ | string | مقدار خصوصیت
__hashed__ | boolean | اگر مقدار به صورت md5 raw هش شده باشد این قسمت را true قرار دهید

### Date settings
Index | Type | Description
----- | ---- | -----------
__ready__ | int(unix time) | شروع بازه زمانی مجاز برای اجرای اسکریپت.
__expiration__ | int(unix time) | پایان بازه زمانی مجاز یا تاریخ انقضا برای اجرای اسکریپت.

### Rounds settings
Index | Type | Description
----- | ---- | -----------
__main__ | array | [Main round settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#main-round-settings)
__minify__ | array | [Minify round settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#rounds-property-settings)
__optwister__ | array | [Optwister round settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#rounds-property-settings) (slow running)
__partitioning__ | array | [Partitioning round settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#partitioning-round-settings) (slow running)
__antidebugger__ | array | [Antidebugger round settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#rounds-property-settings)
__antihooking__ | array | [Antihooking round settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#antihooking-round-settings)
__unmeaning__ | array | [Unmeaning round settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#unmeaning-round-settings)
__qbc__ | array | [QBC round settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#rounds-property-settings)

#### Main round settings
Index | Type | Default | Description
----- | ---- | ------- | -----------
__depth_type__ | string | "logpower" | پیچیدگی محاسباتی مقدار depth. میتونه این مقادیر باشه: constant, logarithm, logpower, square, linear.
__depth__ | float | 1 | پیچیدگی مراحل درهم سازی.
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
__deep__ | boolean | false (بخاطر اجرای کند)

#### Unmeaning round settings
Index | Type | Default
----- | ---- | -------
__variables__ | boolean | true
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
__separated_loader__ | array | null | [Separated loader settings](https://github.com/avid0/Alom/blob/main/doc/README.fa.md#separated-loader-settings)
__halt_mode__ | boolean | false | فعال یا غیر فعال کردن halt mode.
__hide_errors__ | boolean | true | فعال یا غیر فعال کردن نمایش لاگ ها.
__hide_eval__ | boolean | true | فعال یا غیر فعال کردن اجرای کد در eval داخلی.
__global_cache__ | boolean | true | فعال یا غیر فعال کردن کش شدن متغییر های گلوبال.
__display__ | string | "base64" | raw/hex/bin/base64/base64r شیوه نمایش کد درهم شده.

#### Separated loader settings
Index | Type | Description
----- | ---- | -----------
__decoder_file__ | string | اگر شما ادرس فایل alomdecoder.obfs.php را در این قسمت بگذارید, از تکرار شدن محتوای این فایل برای هر فایل درهم شده جلوگیری میشه و برای اجرا از محتویات این فایل استفاده میشه.

### Handler settings
Index | Type | Parameters | Description
----- | ---- | ---------- | -----------
__error__ | callable | string $message, int $line | برای اررور های سینتاکس اسکریپت.
__status__ | callable | string $status, int $progress = null | برای وضعیت و پیشرفت درهم سازی. (طولانی ترین سطح درهم سازی وضعیت main_walk هست)

### Static properties
Index | Type | Default
----- | ---- | -------
__AlomEncoder::$logger__ | boolean | اگر محیط cli باشد مقدار ان true خواهد بود

## Properties

### Alom auto update
شما میتوانید با اضافه کردن تابع alom_autogit دربالای اسکریپت خود فایل های آلوم را به طور خودکار اپدیت کنید.
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
شما میتونید از این خاصیت برای درهم سازی اتوماتیک سورس ها در یک سرور مشخص استفاده کنید.
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
شما میتوانید از کلید های نامرعی برای انکریپت کردن داده ها استفاده کنید. کلید های نامرعی فقط در برنامه درحال اجرا قابل دسترسی خواهند بود.
به ازای هر استفاده از ثابت کلید های نامرعی یک کلید تصادفی و ثابت برای ان در برنامه درنظر گرفته خواهد شد.
```php
if(alom_protect(__FILE__)) // Protect current file for using invisible keys
  die("Obfuscatored");
$key = bin2hex(ALOM_INVISIBLE_KEY32);

$contents = decrypt(file_get_contents("file.txt"), $key); // decrypt file contents
...
file_put_contents("file.txt", encrypt($contents, $key)); // encrypt file contents

unset($key); // delete key
```
کلید های نامرعی:
* ALOM_INVISIBLE_KEY[n=2,3,4,8,12,16,24,32,64,96,128,256,384,512,1024,2048,4096,8192] (n-bits متن باینری)
* ALOM_INVISIBLE_CHAR (یک بایت)
* ALOM_INVISIBLE_BIT (یک بیت)
* ALOM_INVISIBLE_INT (int32)

### Variable protection
محافظت از متغییر ها باعث میشود هیچ کسی جز برنامه به متغییر مورد نظر دسترسی نداشته باشد. متغییر محافظت شده پس از اجرای برنامه فورا حذف میشود.
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
به کاری که باعث حذف کامنت ها و فاصله ها که ارزشی توی اجرای سورس ندارند minify گفته میشود.
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
ما میتوانیم با داشتن کلید لایسنس مخفی خود به کاربران اسکریپتمون کد لایسنس اراعه دهیم. این کد لایسنس میتواند برای سیستم خاصی اراعه داده شده باشد یا میتواند تنها در بازه زمانی خاصی اعتبار داشته باشد.
در ابتدا ما به فایل alomtools.php نیاز داریم:
```php
require_once "alomtools.php";
```
ما سه چیز برای ساخت کد لایسنس نیاز داریم:
#### License key
کلید لایسنس یک متن خصوصی برای سختن کد لایسنس میباشد. ما میتوانیم به صورت زیر کلید لایسنس بسازیم:
```php
string alom_license_key_generate(string $init = null);
```
اگر به تابع ورودی ندهیم, یک کد لایسنس تصادفی خواهد ساخت.
#### SystemHash
یک هش برای محدود کردن کد لایسنس به سیستم دلخواه میباشد.
شما میتوانید با ورودی ندادن پارامتر ها یک هش بدون محدودیت سیستم بسازید اما ساختن این هش اجباری هست.
```php
string license_systemhash_generate(array $info = []);
```
در لیست زیر اپشن های مربوط به متغییر $info امده است:
Index | Type | Default
----- | ---- | -------
__uname__ | string | محدود نخواهد شد
__username__ | string | محدود نخواهد شد
__ipaddr__ | string | محدود نخواهد شد
__hostname__ | string | محدود نخواهد شد
#### License code
بعد از ساختن هش باید کلید لایسنس را روی ان اعمال کنید تا کد لایسنس بسازید پس هرکسی نمیتواند برای اسکریپت شما کد لایسنس بسازد.
```php
string alom_license_code_encrypt(string $systemhash, string $license_key, int(unix) $expiration = will not be limited, int(unix) $ready = will not be limited);
```
همچنین با داشتن کلید شما میتوانید کد لایسنس را به پارامتر های ان دکریپت کنید.
```php
array alom_license_code_decrypt(string $license_code, string $license_key);
```
#### License file
شما میتوانید به توابع زیر براحتی کد لایسنس را از یک فایل لایسنس بخوانید یا در ان جایگذاری کنید:
```php
string alom_get_license_code(string $file); // get license code from license file
bool alom_exists_license_code(string $file); // check if exists license code in license file
bool alom_insert_license_code(string $file, string $license_code); // insert license code into license file
```
### OScript
شما میتوانید یک سیستم ای پی ای روی سرور خود برای اجرای انلاین اسکریپت ها بسازید به طوری که برای هربار اجرای اسکریپت نیاز به یک اتصال به ای پی ای باشد. اجرای اسکریپت بدون اتصال به سرور ممکن نیست.
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
و کلاینت نیاز به لینک اسکریپت روی سرور دارد:
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
شما میتوانید فایل هایی که به صورت غیرمستقیم در فایل درهم شده اینکلود میشوند را برای سرعت بیشتر با استفاده از این متد انکریپت کنید. این فایل ها دیگه بدون استفاده از کلید استفاده شده قابل اجرا نمیباشند و میتوانید با ورودی دادن کلید هنگام درهم کردن سورس اصلی از انها استفاده کنید.
#### Include key
کلید اینکلود یک متن مخفی برای ساختن فایل های IKE میباشد. ما میتونیم کلید اینکلود را به این شکل بسازیم: 
```php
string alom_includekey_generate(string $init = null);
```
اگر متنی ورودی داده نشود خروجی یک کلید تصادفی میدهد.
### IKE encrypt and decrypt
برای ساختن یک فایل IKE شما نیاز به کد اولیه (مثل file.php) و ادرس فایل IKE (مثل file.php.ike) دارید. سپس:
```php
alom_includekey_encrypt_into("file.php", "file.php.ike", $key);
```
همچنین میتوانید از توابع دیگر استفاده کنید:
```php
string alom_includekey_encrypt(string|callable $code, string $key);
string alom_includekey_decrypt(string $code, string $key);
int alom_includekey_encrypt_into(string|callable $code, string $file, string $key);
int alom_includekey_decrypt_into(string $code, string $file, string $key);
```

### توابع دیگر مربوط به alomtools.php
```php
is_alom_obfuscated(string $file); // check if file is obfuscated by alom
alom_minify(string|callable $script); //
alom_minify_into(string $script, string $file); //
alom_obfuscate(string|callable $script); //
alom_obfuscate_into(string $script, string $file); //
alom_put(string $file, string|callable $script); //
alom_phpify(string|callable $script); //
```
#### درهم سازی دایرکتوری
شما میتوانید تمام فایل های php در یک دایرکتوری را در دایرکتوری دیگری درهم سازی کنید.
همچنین میتوانید تعیین کنید که فایل های غیر php کپی شوند یا خیر.
```php
alom_obfuscate_dir(string $source, string $dest, array $settings = [], bool $copy = false);
```
