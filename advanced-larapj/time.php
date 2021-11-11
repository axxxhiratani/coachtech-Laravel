<?php
require 'vendor/autoload.php';
use Carbon\Carbon;

$dt = Carbon::now();

echo $dt->addYear()."<br>";
echo $dt->subYear(3)."<br>";
echo $dt->addDay(23)."<br>";

