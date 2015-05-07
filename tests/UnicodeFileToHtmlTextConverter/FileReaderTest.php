<?php
/**
 * //@todo
 */

use \TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter\FileReader;

class FileReaderTest extends PHPUnit_Framework_TestCase
{
    public function testInstance()
    {

        $filePath   = '/path/to/file';
        $fileReader = new FileReader($filePath);
        $this->assertInstanceOf(
            '\TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter\FileReader',
            $fileReader,
            'FileReader is not an instance of FileReader'
        );

        $this->assertAttributeEquals(
            $filePath,
            'filePath',
            $fileReader,
            'Attribute filePath was not initiated in constructor.'
        );
    }

    public function testGetContents()
    {
        $expected = ["Rafal es un campeón.\n", "Y Plamen también."];
        $filePath = 'files/rafal.txt';

        $this->assertEquals(
            $expected,
            (new FileReader($filePath))->getContents(),
            'getContents() does not return expected result.'
        );
    }

}
