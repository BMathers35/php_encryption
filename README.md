# php_encryption
It allows you to encrypt your texts and then decrypt the encrypted data. **In order to use this class, you must have openssl extension on your PHP server.**

For some methods you can use, visit: https://www.php.net/manual/en/function.openssl-get-cipher-methods.php

## **Configuration**
The class must be configured in order to run.

###### **Configuration Example**
```php
$Security = new php_encryption([
  'method' => 'AES-128-CBC', // Encryption method
  'key' => 'SuperKey', // Key
  'secret' => 'SuperSecret' // Secret Key
]);
```
**IMPORTANT: The texts that you have encrypted with the Key and Secret keys you have determined can only be decrypted with these keys. You cannot decrypt the text you encrypt with a key other than the keys you used to encrypt it.** 

## **Encrypt($data)**
It allows you to encrypt a text.

###### **Encrypt() Example**
```php
$Security = new php_encryption([
  'method' => 'AES-128-CBC', // Encryption method
  'key' => 'SuperKey', // Key
  'secret' => 'SuperSecret' // Secret Key
]);

$Encrypt = $Security->Encrypt('test');
echo $Encrypt; // Encrypted Output: uqGYuVLjeAG7l0TQ50khFQ==
```

## **Decrypt($data)**
It allows you to decrypt the encrypted text.

###### **Configuration Example**
```php
$Security = new php_encryption([
  'method' => 'AES-128-CBC', // Encryption method
  'key' => 'SuperKey', // Key
  'secret' => 'SuperSecret' // Secret Key
]);

// Encrypt
$Encrypt = $Security->Encrypt('test');
echo $Encrypt; // Encrypted Output: uqGYuVLjeAG7l0TQ50khFQ==

// Decrypt
$Decrypt = $Security->Decrypt($Encrypt);
echo $Decrypt; // "uqGYuVLjeAG7l0TQ50khFQ==" decrypted data: test
```
**IMPORTANT: The texts that you have encrypted with the Key and Secret keys you have determined can only be decrypted with these keys. You cannot decrypt the text you encrypt with a key other than the keys you used to encrypt it.** 
