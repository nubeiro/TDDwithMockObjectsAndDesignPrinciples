<?php
/**
 * //@todo
 */
use \TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter\UnicodeFileToHtmlTextConverter;
use \TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter\FileReaderInterface;

class UnicodeFileToHtmlTextConverterTest extends PHPUnit_Framework_TestCase {

    public function testInstanceOf()
    {
        $fileReader = $this->getFileReaderMock();
        $converter = new UnicodeFileToHtmlTextConverter($fileReader);
        $this->assertAttributeInstanceOf(
            '\\TDDMicroExercises\\PHP\\UnicodeFileToHtmlTextConverter\\FileReaderInterface',
            'fileReader',
            $converter,
            'fileReader is not a FileReaderInterface instance.'
        );
        $this->assertInstanceOf('\TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter\UnicodeFileToHtmlTextConverter', $converter);
    }

    /**
     * @expectedException \Exception Could not read file contents.
     *
     */
    public function testEmptyContentsThrowsException()
    {
        $fileReader = $this->getFileReaderMock();
        new UnicodeFileToHtmlTextConverter($fileReader);
    }

    public function testConvertToHtml()
    {
        $contents = ["Rafal es un campeón.\n", "Y Plamen también."];

        $fileReader = $this->getFileReaderMock();
        $fileReader->expects($this->once())
            ->method('getContents')
            ->willReturn($contents);
        $converter = new UnicodeFileToHtmlTextConverter($fileReader);

        $expectedHtml = "Rafal es un campe&oacute;n.
<br />Y Plamen tambi&eacute;n.<br />";

        $this->assertEquals($expectedHtml, $converter->convertToHtml());
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    private function getFileReaderMock()
    {
        $fileReader = $this->getMockBuilder('\\TDDMicroExercises\\PHP\\UnicodeFileToHtmlTextConverter\\FileReaderInterface')
            ->setMethods(array('getContents'))
            ->getMock();
        return $fileReader;
    }
}
