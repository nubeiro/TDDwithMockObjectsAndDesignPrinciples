<?php
/**
 * //@todo
 */
namespace TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter;


/**
 * FileReader
 */
interface FileReaderInterface
{
    /**
     * Returns array of lines.
     *
     * @return array
     */
    public function getContents();
}