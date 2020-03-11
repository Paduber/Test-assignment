<?php

class SQLGenerate{
    private static $filename = "sql.sql";

    public static function createFile(){
        $file = fopen(self::$filename, 'w') or die('Не удалось создать файл');
        fclose($file);
    }

    public static function writeToFile($string)
    {
        $file = fopen(self::$filename, 'a') or die('Не удалось создать файл');
        fwrite($file, $string."\r\n");
        fclose($file);
    }


}