<?php

namespace App\Utils;

class Logger
{
    public function log(String $message): void {
        $message .= "\n"; // Add a newline before saving to file
        file_put_contents('log.info', $message, FILE_APPEND); // Saves a log.info file in public folder. It does not override the file if exists
    }
}