<?php
/**
 * //@todo
 */
namespace TDDMicroExercises\PHP\TirePressureMonitoringSystem;

interface SensorInterface
{
    public static function SamplePressure();

    public function popNextPressurePsiValue();
}