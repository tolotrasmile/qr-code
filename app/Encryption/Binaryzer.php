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
        $tab_size = 0;
        $res = [];

        if ($this->E == 1) {
            $res[$tab_size] = 1;
            $tab_size++;
        } else if ($this->E == 0) {
            $res[$tab_size] = 0;
            $tab_size++;
        } else {
            while (($q = (int)($this->E / 2)) != 0) {
                if ($q != 1) {
                    $r = $this->E % 2;
                    if ($r == 1) {
                        $res[$tab_size] = 1;
                        $tab_size++;
                    } else {
                        $res[$tab_size] = 0;
                        $tab_size++;
                    }
                    $this->E = $q;
                } else {
                    $r = $this->E % 2;
                    if ($r == 1) {
                        $res[$tab_size] = 1;
                        $tab_size++;
                    } else {
                        $res[$tab_size] = 0;
                        $tab_size++;
                    }
                    $res[$tab_size] = 1;
                    $tab_size++;
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
