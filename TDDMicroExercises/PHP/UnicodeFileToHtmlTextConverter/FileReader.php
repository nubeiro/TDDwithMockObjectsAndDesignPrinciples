<?php

namespace TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter;

/**
 * FileReader
 */

class FileReader implements FileReaderInterface
{

    private $filePath;
    protected $filePointer;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return resource
     */
    private function openFile()
    {
        $this->filePointer = fopen($this->filePath, 'r+');
        return $this->filePointer;
    }

    /**
     * @return string
     */
    private function getLineFromFile()
    {
        return fgets($this->filePointer);
    }

    private function closeFile()
    {
        fclose($this->filePointer);
    }

    /**
     * Returns array of lines.
     *
     * @return array
     */
    public function getContents()
    {
        $this->openFile();
        $lines = array();
        while ($line = $this->getLineFromFile()) {
            $lines[] = $line;
        }
        $this->closeFile();
        return $lines;
    }

}