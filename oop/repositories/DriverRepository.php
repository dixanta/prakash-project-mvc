<?php

namespace Repositories{
    use Models\Driver;
    use db\RowMapper;
    use db\DbTemplate;


    interface IDriverRepository{
        function fetchAll();
        function getById(int $id);
        function save(Driver $driver);
    }

    class DriverRowMapper implements RowMapper{
        public function mapRow($row){
            $driver=new Driver();
                $driver->setId($row['id'])->setName($row['name'])
                ->setContactNo($row['contact_no'])->setStatus($row['status']);
            return $driver;
        }
    }
    class DriverRepository implements IDriverRepository{
        private $dbTemplate=null;

        public function __construct(){
            $this->dbTemplate=DbTemplate::getInstance();
        }
        public function fetchAll(){
            $sql="select * from tbl_drivers";
            return $this->dbTemplate->query($sql,new DriverRowMapper());
        }

        public function getById(int $id){
            $conn=new \Mysqli('localhost','root','','delivery_project');
            $sql="select * from tbl_drivers where id=?";
            $stmt=$conn->prepare($sql);
            $stmt->bind_param('i',$id);
            $stmt->execute();
            $result=$stmt->get_result();
            $driver=null;
            
            if($row=$result->fetch_array(MYSQLI_ASSOC)){
                $driver=new Driver();
                $driver->setId($row['id'])->setName($row['name'])
                ->setContactNo($row['contact_no'])->setStatus($row['status']);
            }
            
            $conn->close();
            return $driver;
        }

        public function save(Driver $driver){
            
            $sql="insert into tbl_drivers(name,contact_no,status) values(?,?,?)";
            $name=$driver->getName();
            $contact_no = $driver->getContactNo();
            $status= 1;
            return $this->dbTemplate->execute($sql,'ssi',$name,$contact_no,$status);
            
               
        }
    }
}