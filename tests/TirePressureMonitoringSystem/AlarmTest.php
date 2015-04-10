<?php

use \TDDMicroExercises\PHP\TirePressureMonitoringSystem\Alarm;

class AlarmTest extends PHPUnit_Framework_TestCase {


    public function testInstantiation()
    {
//        $obj = new Alarm();
    }

    public function testCheck()
    {
        $tested_value = 15;
        $mock_sensor = $this->getMockBuilder('\TDDMicroExercises\PHP\TirePressureMonitoringSystem\Sensor')
            ->setMethods(array('popNextPressurePsiValue'))
            ->getMock();
        $mock_sensor
            ->expects($this->once())
            ->method('popNextPressurePsiValue')
            ->will($this->returnValue($tested_value));
        $tested_obj = new Alarm($mock_sensor);
        $this->assertAttributeEquals(0, 'alarmCount', $tested_obj, "WRONG");
        $this->assertAttributeEquals(false, 'alarmOn', $tested_obj, "WRONG ON");
        $tested_obj->check();
        $this->assertAttributeEquals(1, 'alarmCount', $tested_obj, "WRONG2");
        $this->assertAttributeEquals(true, 'alarmOn', $tested_obj, "WRONG ON2");

    }
}
