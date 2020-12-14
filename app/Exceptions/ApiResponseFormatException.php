<?php

namespace App\Exceptions;

use Exception;

class ApiResponseFormatException extends Exception
{
    //
    public function __construct($keyName){
        parent::__construct("Api format is not correct.Miss " . $keyName);
    }
}
