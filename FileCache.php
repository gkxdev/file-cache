<?php
/**
 * File Cache
 * @author Gökhan Kaya <gkxdev@gmail.com>
 */

class FileCache {
    const CACHE_DIR = './cache/';

    public static function get($key) {
        $file = self::getFileName($key);

        if (!is_file($file)) {
            return false;
        }

        list($lifetime, $value) = unserialize(
            file_get_contents($file)
        );

        if ($lifetime !== 0 &&
            time() - filemtime($file) > $lifetime
        ) {
            @unlink($file);
            return false;
        }

        return $value;
    }

    public static function set($key, $value, $lifetime = 0) {
        if (!is_dir(self::CACHE_DIR)) {
            if (!mkdir(self::CACHE_DIR, 0777, true)) {
                return false;
            }
        }

        $file = self::getFileName($key);
        $data = serialize([$lifetime, $value]);

        return (bool) file_put_contents($file, $data);
    }

    public static function delete($key) {
        $file = self::getFileName($key);

        return @unlink($file);
    }

    private static function getFileName($key) {
        return self::CACHE_DIR . '/' . md5($key) . '.cache';
    }
}