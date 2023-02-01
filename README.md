# PHP Product License Key Generator

SunLicense is a simple and robust PHP product license key generator class.

The goal of this class is to let you; Create random and unique license keys with default or user-defined parameters.

<hr>

`Prefix` attribute: This parameter let you add a prefix at the beginning of the license key. Optional; if you don't use this, the generated key will be with a non-prefix. You can use any string value. For example; if you use `SLK` as the value, your license key looks like `SLK-.......`

`Template` attribute: This parameter let you define the structure of the license key. Optional; if you don't use this, the license key will generate with the default template. You can use `A` for letters, `9` for numbers, and `-` for symbols. For example; `AA9A9A-AA-99` returns `EB3S0J-GT-49` license key.

`Count` attribute: This parameter let you define the total number of license keys to be generated. Optional; if you don't use this, only one license key will be generated. You can use any integer value. For example; if you define `7` as the value, you will get `7` unique license keys.

<hr>

### Installation

To utilize this class, first import SunLicense.php into your project, and require it.
SunLicense requires PHP 5.5+ to work.

```php
require_once ('SunLicense.php');
```

### Initialization

Simple initialization with default parameters:

```php
$license = new SunLicense();
```

or you can use inline parameters:

```php
$license = new SunLicense('SLK', 'AA99-9A9A-A9A9-99AA', 5); // prefix, template, number of keys
```

All config parameters are optional.

It will use default parameters that are set in the class if you don't specify the parameters while creating the object.

### Generate Single Key

```php
$license = new SunLicense(); // or you can use inline parameters as above
echo $license->generate();
```

If you don't use `count` attribute (3rd parameter), the class generates only one license key.

This license key will be returned as a string, therefore you can use it directly.

### Generate Multiple Keys

```php
$license = new SunLicense(null, null, 5); // generates 5 license keys
$keys = $license->generate(); // returned an array
foreach ($keys as $key) {
    echo $key . '<br>';
}
```

If you use `count` attribute (3rd parameter), the class generates a defined number of license keys.

These license keys will be returned to an array, therefore you can't use it directly.
