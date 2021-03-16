<?php

namespace Repositories{
    use Models\Driver;

    interface IDriverRepository{
        function fetchAll();
        function getById(int $id);
        function save(Driver $driver);
    }
    class DriverRepository implements IDriverRepository{
        public function fetchAll(){
            $conn=new \Mysqli('localhost','root','','delivery_project');
            $sql="select * from tbl_drivers";
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->get_result();
            $drivers=[];
            while($row=$result->fetch_array(MYSQLI_ASSOC)){
                $driver=new Driver();
                $driver->setId($row['id'])->setName($row['name'])
                ->setContactNo($row['contact_no'])->setStatus($row['status']);
                $drivers[]=$driver;
            }
            $conn->close();
            return $drivers;
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
            $conn=new \Mysqli('localhost','root','','delivery_project');
            $sql="insert into tbl_drivers(name,contact_no,status) values(?,?,?)";
            $stmt=$conn->prepare($sql);
            $name=$driver->getName();
            $email = $driver->getContactNo();
            $contact_no= $driver->getStatus();
            $stmt->bind_param('ssi',$name,$email,$contact_no);
            $result = $stmt->execute();
            $conn->close();
            return $result;
        }
    }
}