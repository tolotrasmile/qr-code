<?php

namespace App\Encryption;

class RSA
{

    private static function calculate($message, $key)
    {
        $c = 1;

        $binarizer = new Binaryzer($key);

        $bin = $binarizer->toBin();

        for ($i = 0; $i < strlen($bin); $i++) {
            $c = $bin[$i] == 0 ? self::power((int)$c, 2) % 1073 : (self::power((int)$c, 2) * (int)$message) % 1073;
        }

        return $c;
    }

    private static function power($x, $n)
    {
        $result = 1;

        if (0 == $x) {
            return 0;
        }

        if (0 == $n) {
            return 1;
        }

        for ($i = 0; $i < $n; $i++) {
            $result = $result * $x;
        }

        return $result;
    }

    public static function encrypt($text)
    {
        $encrypted = '';

        for ($i = 0; $i < strlen($text); $i++) {
            $encrypted = $i == strlen($text) - 1 ? $encrypted . self::calculate((ord($text[$i])) - 65, 71) : $encrypted . self::calculate((ord($text[$i])) - 65, 71) . " ";
        }

        return $encrypted;
    }

    public static function decrypt($text)
    {
        $plain = '';

        $txt = \explode(" ", $text);

        for ($i = 0; $i < count($txt); $i++) {
            $plain .= chr(65 + (self::calculate($txt[$i], 1079)));
        }

        return $plain;
    }
}
