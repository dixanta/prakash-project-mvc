<?php
namespace db{

    

    class DbTemplate{
        private $db;
        private static $template=null;
        private function __construct(){
            $this->db=Database::getInstance();
        }

        public static function getInstance(){
            if(self::$template==null){
                self::$template=new DbTemplate();
            }
            return self::$template;
        }

        public function query($sql,RowMapper $mapper){
            $this->db->connect();
            $this->db->prepare($sql);
            $this->db->execute();
            $result=$this->db->getResult();
            $rows=[];
            while($row=$result->fetch_array(MYSQLI_ASSOC)){
                $rows[]=$mapper->mapRow($row);
            }
            $this->db->close();
            return $rows;
        }

        public function execute($sql,...$args){
            $this->db->connect();
            $stmt=$this->db->prepare($sql);
            print_r($args);
            $stmt->bind_param(...$args);
            $result = $this->db->execute();
            $this->db->close();
            return $result;

        }
    }
}