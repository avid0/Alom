# Alom
#### Reversing of the protected "Protector" [alomencoder.obfs.php](https://github.com/avid0/Alom/blob/main/alomencoder.obfs.php).

### 2.0 `gzinflate` BP Vulnerability
- Add breakpoint at call of `gzinflate`
- Start debugging
- Once it hit the breakpoint a second time step in until you see the evaluated variable named `$code` there should be your unprotected code.
![BP Vulnerability demo](demo/bp_vulnerability.demo.gif)


### 1.8 `__FILE__` Vulnerability
- Make backup of the original protected code `alomencoder.obfs.php` => `back.php`.
- Replace `__FILE__` by the backup file name e.g `back.php`.
- Removing all code bellow the decompressing and loading of the `AlomDecoder` class.
```php
if (!class_exists('AlomDecoder')) {
    _nZGueubW86A4Fdf412697615(gzinflate(base64_decode(file_get_contents(_s7GdHhyCWB0FOmT412697615(base64_decode('YWxvbWRlY29kZXIub2Jmcy5waHA='))))));
}

// Remove all code bellow
AlomDecoder::mt_prng_store(rand());
AlomDecoder::run( ... )
```
- Echo or debug the file in order to get the content from the compressed `AlomDecoder` class.
```php 
if (!class_exists('AlomDecoder')) {
    echo(gzinflate(base64_decode(file_get_contents(_s7GdHhyCWB0FOmT412697615(base64_decode('YWxvbWRlY29kZXIub2Jmcy5waHA='))))));
}
```
- By executing the code it should now return the `AlomDecoder` class.
- Once you got the `AlomDecoder` class remove all code and paste the class.
- Bellow the class include the backup file so it loads and overwrite the execution from its own `AlomDecoder` class.
```php
class AlomDecoder {
	...
}

include('back.php');
```
- Now you are set and you can change/view the decryption routine.
- To obtain the unprotected code you'll need to edit the `AlomDecoder` class and change the variable `$_ALOM_code` which is getting executed within the `run` function.
```php
public static function run($code) {
...
	(function ($_ALOM_code) {
	    foreach ($GLOBALS as $_ALOM_key => $_ALOM_val) $$_ALOM_key =& $GLOBALS[$_ALOM_key];
	    unset($_ALOM_key);
	    unset($_ALOM_val);
	    echo $_ALOM_code; // Display it
	    file_put_contents('unpacked.php', $_ALOM_code); // Save it
	    eval($_ALOM_code); // Here the unprotected code gets executed
	    if (isset($_ALOM_code)) {
	        $_ALOM_code = NULL;
	        unset($_ALOM_code);
	    }
	    AlomDecoder::$tmpvars = get_defined_vars();
	})("\$_ALOM_code='';unset(\$_ALOM_code);$code;" . ($code = ''));
...
}
```

###### if you are interested into learning more about php reverse engineering or protecting your own code contact me 😜

### Disclaimer
This has been posted for the sake of maintaining code open source on github and educating.