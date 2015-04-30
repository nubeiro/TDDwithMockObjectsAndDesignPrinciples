<?php
/**
 * @todo write unit tests
 *       refactor as much as needed to make the class testable.
 */
namespace TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter;

include_once 'FileReader.php';

class UnicodeFileToHtmlTextConverter 
{
    private $_fullFilenameWithPath;

    public function __construct($fullFilenameWithPath)
    {
        $this->_fullFilenameWithPath = $fullFilenameWithPath;
    }

    public function convertToHtml()
    {
        $fileReader = new FileReader($this->_fullFilenameWithPath);

        $fileReader->openFile();

        $html = array();

        while ( $line = $fileReader->getLineFromFile())
        {
            $html[] = $line;
        }

        $output = '';
        foreach ($html as $line) {
            $output .= htmlentities($line);
            $output .= '<br />';
        }


        $fileReader->closeFile();

        return $output;
    }
}
