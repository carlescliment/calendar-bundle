<?php

class AutoLoader {


    static private $classNames = array();

    public static function registerDirectory($dirName) {
        $di = new DirectoryIterator($dirName);
        foreach ($di as $file) {

            if ($file->isDir() && !$file->isLink() && !$file->isDot()) {
                // recurse into directories other than a few special ones
                self::registerDirectory($file->getPathname());
            } elseif (substr($file->getFilename(), -4) === '.php') {
                $className = self::getFullNamespacedName($file->getPathName());
                AutoLoader::registerClass($className, $file->getPathname());
            }
        }
    }

    public static function registerClass($className, $fileName) {
        AutoLoader::$classNames[$className] = $fileName;
    }


    public static function loadClass($className) {
        if (isset(AutoLoader::$classNames[$className])) {
            require_once(AutoLoader::$classNames[$className]);
        }
    }

    private static function getFullNamespacedName($fileName) {
        $fileName = str_replace('.php', '', $fileName);
        $fileName = str_replace('./src/', '', $fileName);
        return str_replace('/', '\\', $fileName);
    }
}


spl_autoload_register(array('AutoLoader', 'loadClass'));
