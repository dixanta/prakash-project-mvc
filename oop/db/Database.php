<?php

namespace db{
    class Database{
        private $conn;
        private $stmt;

        public static function getInstance(){
            return new Database();
        }
        function connect(){
            $this->conn=new \Mysqli('localhost','root','','delivery_project');
        }
        function prepare($sql){
            $this->stmt=$this->conn->prepare($sql);
            return $this->stmt;
        }

        function execute(){
            $this->stmt->execute();
        }

        function getResult(){
            return $this->stmt->get_result();
        }
        function close(){
            $this->conn->close();
        }
    }
}