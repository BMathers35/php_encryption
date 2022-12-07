<?php

    require dirname(__DIR__) . '/src/php_encryption.php';

    // Konfigüre ediyoruz
    $Security = new php_encryption([
        'method' => 'AES-128-CBC',
        'key' => 'SuperKey',
        'secret' => 'SuperSecret'
    ]);

    // Metin şifreleme
    $Encrypt = $Security->Encrypt('Test');
    echo $Encrypt . '<br>'; // Sonuç: uqGYuVLjeAG7l0TQ50khFQ==

    // Şifrelemeyi çözme
    $Decrypt = $Security->Decrypt($Encrypt);
    echo $Decrypt; // Sonuç: Test

