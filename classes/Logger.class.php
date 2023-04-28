<?php
class Logger {
    private $log_file;

    public function __construct($log_file) {
        $this->log_file = $log_file;
    }

    public function log($message) {
        $date = date('Y-m-d H:i:s');
        $log_message = "[$date] $message\n";
        file_put_contents($this->log_file, $log_message, FILE_APPEND);
    }
}
?>
