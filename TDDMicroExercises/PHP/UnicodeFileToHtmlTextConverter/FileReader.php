<?php

namespace TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter;

/**
 * FileReader
 */

class FileReader {

    private $filePath;
    protected $filePointer;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @return resource
     */
    public function openFile()
    {
        $this->filePointer = fopen($this->filePath, 'r+');
        return $this->filePointer;
    }

    /**
     * @param $unicodeFileStrem
     *
     * @return string
     */
    public function getLineFromFile()
    {
        return fgets($this->filePointer);
    }

    /**
     * @param $unicodeFileStrem
     */
    public function closeFile()
    {
        fclose($this->filePointer);
    }
}