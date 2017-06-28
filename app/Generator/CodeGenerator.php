<?php

/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 27/06/2017
 * Time: 21:50
 */

namespace App\Generator;

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;

class CodeGenerator
{
    public static function generate(string $value)
    {

        //$user = \serialize(Query::fetchOne('SELECT * FROM users LIMIT 1'));

        // Create a basic QR code
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