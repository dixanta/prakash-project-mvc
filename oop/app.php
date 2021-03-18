<?php

function __autoload($class){
    $class= str_replace('\\','/',$class);
    require($class .'.php');
}

use Models\Driver;
use Repositories\DriverRepository;


use Models\Vehicle;
use Repositories\VehicleRepository;





$repository=new DriverRepository();

$driver=new Driver();
$driver->setName('ramesh karki ji')->setContactNo('75765765')->setStatus(false);

$repository->save($driver);

foreach($repository->fetchAll() as $driver){
    print_r($driver);
}


