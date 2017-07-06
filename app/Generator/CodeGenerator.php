<?php

/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 27/06/2017
 * Time: 21:50
 */

namespace App\Generator;

use App\Encryption\RSA;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;

class CodeGenerator
{
    /**
     * @param string $value
     * @param bool $encrypt
     */
    public static function generate($value, $encrypt = false)
    {

        // Create a basic QR code

        if (true == $encrypt) {
            $value = RSA::encrypt($value);
        }

        $qrCode = new QrCode($value);
        $qrCode
            ->setSize(300)
            ->setWriterByName('png')
            ->setMargin(10)
            ->setEncoding('UTF-8')
            ->setErrorCorrectionLevel(ErrorCorrectionLevel::LOW)
            ->setValidateResult(false);

        // Directly output the QR code
        //header('Content-Type: ' . $qrCode->getContentType());
        //echo $qrCode->writeString();

        $qrCode->writeFile('tmp/Endroid.png');
    }

}