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
        $resPuis = 1;

        if ($x == 0) {
            return 0;
        }

        if ($n == 0) {
            return 1;
        }

        for ($i = 0; $i < $n; $i++) {
            $resPuis = $resPuis * $x;
        }

        return $resPuis;
    }

    public static function encrypt($text)
    {
        $text_crypte = '';

        for ($i = 0; $i < strlen($text); $i++) {
            $text_crypte = $i == strlen($text) - 1 ? $text_crypte . self::calculate((ord($text[$i])) - 65, 71) : $text_crypte . self::calculate((ord($text[$i])) - 65, 71) . " ";
        }

        return $text_crypte;
    }

    public static function decrypt($text)
    {
        $text_clair = '';

        $txt = \explode(" ", $text);

        for ($i = 0; $i < count($txt); $i++) {
            $text_clair .= chr(65 + (self::calculate($txt[$i], 1079)));
        }

        return $text_clair;
    }
}
