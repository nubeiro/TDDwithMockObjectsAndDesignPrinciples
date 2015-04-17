<?php

use \TDDMicroExercises\PHP\TirePressureMonitoringSystem\Alarm;

class AlarmTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Alarm
     */
    protected $objectToTest;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    protected $sensorMock;

    public function setUp()
    {
        $this->sensorMock = $this->getMockBuilder('\TDDMicroExercises\PHP\TirePressureMonitoringSystem\Sensor')
            ->setMethods(array('popNextPressurePsiValue'))
            ->getMock();
        $this->objectToTest = new Alarm($this->sensorMock);
    }

    public function testConstructor()
    {
        $this->assertAttributeEquals(0, 'alarmCount', $this->objectToTest, "WRONG");
        $this->assertAttributeEquals(false, 'alarmOn', $this->objectToTest, "WRONG ON");
    }

    public function checkDataProvider()
    {
        return array(
            "low pressure alarm" => array (
                "pressure" => Alarm::LOW_PRESSURE_TRESHOLD - 1,
                "expected alarm" => true,
                "expected internal counter" => 1
            ),
            "low pressure border value" => array (
                "pressure" => Alarm::LOW_PRESSURE_TRESHOLD,
                "expected alarm" => false,
                "expected internal counter" => 0
            ),
            "value in the middle" => array (
                "pressure" => rand(Alarm::LOW_PRESSURE_TRESHOLD, Alarm::HIGH_PRESSURE_TRESHOLD),
                "expected alarm" => false,
                "expected internal counter" => 0
            ),
            "high pressure alarm" => array (
                "pressure" => Alarm::HIGH_PRESSURE_TRESHOLD + 1,
                "expected alarm" => true,
                "expected internal counter" => 1
            ),
            "high pressure border value" => array (
                "pressure" => Alarm::HIGH_PRESSURE_TRESHOLD,
                "expected alarm" => false,
                "expected internal counter" => 0
            )
        );
    }

    /**
     * @dataProvider checkDataProvider
     */
    public function testCheck($tested_value, $expectedAlarmValue, $expectedInternalCounter)
    {
        $this->sensorMock
            ->expects($this->once())
            ->method('popNextPressurePsiValue')
            ->will($this->returnValue($tested_value));

        $this->objectToTest->check();
        $this->assertAttributeEquals(
            $expectedInternalCounter,
            'alarmCount',
            $this->objectToTest,
            "Wrong internal counter value"
        );
        $this->assertAttributeEquals(
            $expectedAlarmValue,
            'alarmOn',
            $this->objectToTest,
            "Wrong internal alarm value"
        );
    }
}
