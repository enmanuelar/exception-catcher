<?php

/**
 * Copyright (c) 2020 Enmanuel Almonte
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * This class provides functions for handling the catching of exceptions and debugging in a simpler way.
 *
 *
 * @author Enmanuel Almonte https://github.com/enmanuelar
 */
namespace Enmanuelar\ExceptionCatcher;

class ExceptionCatcher
{
    /**
     * Get a simplified version of an exception.
     * @param Exception $exception the exception
     * @param boolean $print if true it will print the details, defaults to false
     * @access public
     * @return array simplified exception details
     */
    public function simplifyException($exception, $print = false) {
        $simplified = ['message' => $exception->getMessage(), 'file' => $exception->getFile(), 'line' => $exception->getLine(), 'stack' => $exception->getTraceAsString()];
        if ($print) {
            $this->printToScreen($simplified);
        }
        return $simplified;
    }

    /**
     * Prints the exception details.
     * @param Exception $exception the exception
     * @access public
     */
    public function printExceptionDetails($exception) {
        $this->simplifyException($exception, true);
        $exceptionName = strtolower(get_class($exception));
        $message = "<pre>Find more information about this exception: <a>https://www.php.net/manual/en/class.{$exceptionName}.php</a></pre>";
        $this->printToScreen($message);
    }

    /**
     * This function can be used for debugging purposes, it will pretty print a variable and display the stack trace data.
     * @param  mixed $variable any variable, can be of any type
     * @param boolean $printStack if true will print the stack trace, defaults to true
     * @access public
     */
    public function debug($variable, $printStack = true) {
        if (isset($variable)) {
            $this->printToScreen($variable);
        }
        if ($printStack) {
            $this->printToScreen($this->getStackTraceAsString());
        }
    }

    /**
     * Gets the stack trace as string where this function is called.
     * @access public
     * @return string the trace as string
     */
    public function getStackTraceAsString($exception = null) {
        if (is_null($exception)) {
            $exception = new Exception;
        }
        return $exception->getTraceAsString();
    }

    /**
     * This function is used to pretty print the content to the screen.
     * @param  mixed $content
     * @access private
     */
    private function printToScreen($content) {
        print("<pre>".print_r($content,true)."</pre>");
    }
}