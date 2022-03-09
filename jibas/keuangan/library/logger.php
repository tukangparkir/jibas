<?php
class Logger
{
    private $logFile = "";
    private $file;

    public function __construct()
    {
        $this->logFile = realpath(dirname(__FILE__)) . "/../log/debugger.log";

        $this->file = fopen($this->logFile, "a");
        fwrite($this->file, "-------------------------------------------\r\n");
    }

    public function ClearLog()
    {
        ftruncate($this->file, 0);
    }

    public function Log($message)
    {
        fwrite($this->file, date('H:i:s') . " " . $message . "\r\n");
    }

    public function Close()
    {
        fclose($this->file);
    }
}
?>