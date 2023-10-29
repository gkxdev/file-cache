<?php
require_once __DIR__ . '/FileCache.php';

// Süresiz
FileCache::set('name', 'gkxdev');
echo FileCache::get('name');
FileCache::delete('name');

// Süreli
FileCache::set('languages', ['php', 'javascript'], 60); // 60 sn.
var_dump(FileCache::get('languages'));
// FileCache::delete('languages');