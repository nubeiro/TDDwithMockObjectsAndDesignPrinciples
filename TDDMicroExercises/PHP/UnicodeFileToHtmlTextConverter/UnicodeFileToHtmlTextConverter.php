<?php
/**
 * @todo write unit tests
 *       refactor as much as needed to make the class testable.
 */
namespace TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter;

include_once 'FileReader.php';

class UnicodeFileToHtmlTextConverter 
{
    protected $fileReader;

    public function __construct(FileReaderInterface $fileReader)
    {
        $this->fileReader = $fileReader;
    }

    public function convertToHtml()
    {
        $html = $this->fileReader->getContents();
        if (empty($html)) {
            throw new \Exception('Could not read file contents.');
        }
        $output = '';
        foreach ($html as $line) {
            $output .= htmlentities($line);
            $output .= '<br />';
        }

        return $output;
    }
}
