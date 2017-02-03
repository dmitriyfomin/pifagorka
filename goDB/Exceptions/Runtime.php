<?php
/**
 * @package go\DB
 */

namespace go\DB\Exceptions;

/**
 * The basic runtime-exception of the library
 *
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */
abstract class Runtime extends \RuntimeException implements Exception
{
    public function __construct($message, $code = null, $previous = null)
    {
        $backtrace = new Helpers\Backtrace($this->getTrace(), 'go\DB\\');
        $this->realFile = $this->file;
        $this->realLine = $this->line;
        $this->userTrace = $backtrace->getTrace();
        $this->file = $backtrace->getFile();
        $this->line = $backtrace->getLine();
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return array
     */
    final public function getUserTrace()
    {
        return $this->userTrace;
    }

    /**
     * @return string
     */
    final public function getRealFile()
    {
        return $this->realFile;
    }

    /**
     * @return int
     */
    final public function getRealLine()
    {
        return $this->realLine;
    }

    /**
     * @var array
     */
    private $userTrace;

    /**
     * @var string
     */
    private $realFile;

    /**
     * @var int
     */
    private $realLine;
}
