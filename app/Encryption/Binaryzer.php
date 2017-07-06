<?php


namespace App\Encryption;

class Binaryzer
{
    private $E;

    function __construct($e)
    {
        $this->E = $e;
    }

    public function toBin()
    {
        $result = '';
        $size = 0;
        $res = [];

        if ($this->E == 1) {
            $res[$size] = 1;
            $size++;
        } else if ($this->E == 0) {
            $res[$size++] = 0;
            $size++;
        } else {
            while (($q = (int)($this->E / 2)) != 0) {
                if ($q != 1) {
                    $r = $this->E % 2;
                    if ($r == 1) {
                        $res[$size] = 1;
                        $size++;
                    } else {
                        $res[$size] = 0;
                        $size++;
                    }
                    $this->E = $q;
                } else {
                    $r = $this->E % 2;
                    if ($r == 1) {
                        $res[$size] = 1;
                        $size++;
                    } else {
                        $res[$size] = 0;
                        $size++;
                    }
                    $res[$size] = 1;
                    $size++;
                    break;
                }
            }
        }

        for ($i = count($res) - 1; $i >= 0; $i--) {
            $result .= $res[$i];
        }

        return $result;
    }
}
