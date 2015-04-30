<?php
/**
 * //@todo
 */

class UnicodeFileToHtmlTextConverterTest extends PHPUnit_Framework_TestCase {

    public function testInstanceOf()
    {
        $converter = new \TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter\UnicodeFileToHtmlTextConverter('hola');
        $this->assertInstanceOf('\TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter\UnicodeFileToHtmlTextConverter', $converter);
    }

    public function testConvertToHtml()
    {
        $converter = new \TDDMicroExercises\PHP\UnicodeFileToHtmlTextConverter\UnicodeFileToHtmlTextConverter('files/rafal.txt');

        $expectedHtml = "Rafal es un campe&oacute;n.
<br />Y Plamen tambi&eacute;n.<br />";

        $this->assertEquals($expectedHtml, $converter->convertToHtml());
    }
}
