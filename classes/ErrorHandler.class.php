<?php
/**
 * ErrorHandler class
 * 
 * This class handles errors and exceptions in the application
 */
class ErrorHandler {
    
    /**
     * Constructor method
     */
    public function __construct() {
        // Set error and exception handlers
        set_error_handler(array($this, 'handleError'));
        set_exception_handler(array($this, 'handleException'));
    }
    
    /**
     * Error handler method
     * 
     * @param int $errno The error number
     * @param string $errstr The error message
     * @param string $errfile The file where the error occurred
     * @param int $errline The line number where the error occurred
     */
    public function handleError($errno, $errstr, $errfile, $errline) {
        // Log the error
        $logger = new Logger();
        $logger->logError($errno, $errstr, $errfile, $errline);
        
        // Display error message
        if (ini_get('display_errors')) {
            echo '<div style="background-color: #FFCCCC; border: 1px solid #FF0000; padding: 10px;">';
            echo '<strong>Error:</strong> '.$errstr.'<br>';
            echo '<strong>File:</strong> '.$errfile.'<br>';
            echo '<strong>Line:</strong> '.$errline.'<br>';
            echo '</div>';
        }
    }
    
    /**
     * Exception handler method
     * 
     * @param Exception $exception The exception object
     */
    public function handleException($exception) {
        // Log the exception
        $logger = new Logger();
        $logger->logException($exception);
        
        // Display error message
        if (ini_get('display_errors')) {
            echo '<div style="background-color: #FFCCCC; border: 1px solid #FF0000; padding: 10px;">';
            echo '<strong>Exception:</strong> '.$exception->getMessage().'<br>';
            echo '<strong>File:</strong> '.$exception->getFile().'<br>';
            echo '<strong>Line:</strong> '.$exception->getLine().'<br>';
            echo '</div>';
        }
    }
}

?>

