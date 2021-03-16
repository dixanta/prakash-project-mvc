<?php

namespace Repositories{
    use Models\Vehicle;

    interface IVehicleRepository{
        function fetchAll();
        function getById(int $id);
        function save(Vehicle $model);
    }
    class VehicleRepository implements IVehicleRepository{
        public function fetchAll(){
            
        }

        public function getById(int $id){
            return $id;
        }

        public function save(Vehicle $model){
            return $model;
        }
    }
}