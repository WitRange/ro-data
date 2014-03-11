<?php

class Log
{
    public static function add($file, $message, $status = Zend_Log::INFO)
    {
        $stream = @fopen(Zend_Registry::get('path')->log_dir . $file, 'a', false);
        if ( ! $stream) {
            throw new Exception('Failed to open log stream');
        }
        $writer = new Zend_Log_Writer_Stream($stream);
        $logger = new Zend_Log($writer);
        $logger->log($message, $status);
    }
}