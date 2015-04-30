<?php

namespace TDDMicroExercises\PHP\TirePressureMonitoringSystem;

require_once "Sensor.php";

class Alarm
{
	const LOW_PRESSURE_TRESHOLD 	= 17;
	const HIGH_PRESSURE_TRESHOLD 	= 21;

	private $sensor;
	private $alarmOn;
	private $alarmCount;

	public function __construct(SensorInterface $sensor) {
		$this->sensor 		= $sensor;
		$this->alarmOn 		= false;
		$this->alarmCount	= 0;		
	}


	public function check() 
	{
		$psiPressureValue = $this->sensor->popNextPressurePsiValue();

		if ($psiPressureValue < Alarm::LOW_PRESSURE_TRESHOLD
			|| Alarm::HIGH_PRESSURE_TRESHOLD < $psiPressureValue) {

			$this->alarmOn = true;
			$this->alarmCount += 1;
		}
	}

	public function alarmOn() 
	{
		return $this->alarmOn;
	}
}