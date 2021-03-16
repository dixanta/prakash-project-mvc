<?php

namespace Models{
    class Vehicle{
        private $id;
        private $name;
        private $vehicle_no;
        private $purchase_date=null;
        private $status=false;

        public function __construct(){

        }

        public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function getVehicleNo(){
            return $this->vehicle_no;
        }

        public function getStatus(){
            return $this->status;
        }

        public function setId($id){
            $this->id=$id;
            return $this;
        }

        public function setName($name){
            $this->name=$name;
            return $this;
        }

        public function setVehicleNo($vehicle_no){
            $this->vehicle_no=$vehicle_no;
            return $this;
        }

        public function setStatus($status){
            $this->status=$status;
            return $this;
        }

    }
}