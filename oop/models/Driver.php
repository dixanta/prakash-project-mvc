<?php

namespace Models{
    class Driver{
        private $id;
        private $name;
        private $contact_no;
        private $join_date=null;
        private $status=false;

        public function __construct(){

        }

        public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function getContactNo(){
            return $this->contact_no;
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

        public function setContactNo($contact_no){
            $this->contact_no=$contact_no;
            return $this;
        }

        public function setStatus($status){
            $this->status=$status;
            return $this;
        }

    }
}