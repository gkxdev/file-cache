# File-Cache

PHP dosya önbellekleme sınıfı.

## Kullanımı

```php
<?php
require_once 'FileCache.php';

// Süresiz
FileCache::set('name', 'gkxdev');
echo FileCache::get('name');
FileCache::delete('name');

// Süreli
FileCache::set('languages', ['php', 'javascript'], 60); // 60 sn.
var_dump(FileCache::get('languages'));
// FileCache::delete('languages');
```

### FileCache::get($key)

Cache dosyasından veri okur.

### FileCache::set($key, $value, $lifetime = 0)

Cache dosyasına veri yazmak için kullanılır. Süreli önbellekleme yapmak için `$lifetime` parametresine saniye cinsinden değer verebilirsiniz. Varsayılan değeri sıfırdır ve süresiz anlamına gelir.

### FileCache::delete($key)

Cache dosyasını siler.