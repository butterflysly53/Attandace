<?php
     class crud{
         private $db;
         //constructer to initialize private variable to the database object
         function __construct($conn)
         {
             $this ->db=$conn;

         }
         //function to create a new record into the attandee database
         public function insertAttandees($fname,$dob,$email,$specialty,$phone){
            try {
                //define sql statement
                $sql="INSERT INTO attandee(name,email_id,Date_of_birth,speciality_id,contact_number) 
                VALUES (:fname,:dob,:email,:specialty,:phone)";
                //prepare sql statement for execution
                $stmt=$this->db->prepare($sql);
                //bind all the placeholders to the actual values
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(":dob",$dob);
                $stmt->bindparam(":email",$email);
                $stmt->bindparam(":specialty",$specialty);
                $stmt->bindparam(":phone",$phone);
                $stmt->execute();
                return TRUE;
            } 
            catch (PDOException $e) {
                echo $e->getMessage();
                return False;
            }
         }
         public function editAttendee($id,$fname,$email,$dob,$specialty,$phone){
            try {
               $sql="UPDATE `attandee` SET `name`=:fname,
               `email_id`=:email,`Date_of_birth`=:dob ,`speciality_id`= :specialty,`contact_number`=:phone
                WHERE attendee_id=:id";
                
                    //define sql statement
                    $stmt=$this->db->prepare($sql);
                    //bind all the placeholders to the actual values
                    $stmt->bindparam(":id",$id);
                    $stmt->bindparam(":fname",$fname);
                    $stmt->bindparam(":dob",$dob);
                    $stmt->bindparam(":email",$email);
                    $stmt->bindparam(":specialty",$specialty);
                    $stmt->bindparam(":phone",$phone);
                    $stmt->execute();
                    return TRUE;
                } 
                catch (PDOException $e) {
                    echo $e->getMessage();
                    return False;
                }
         }
         public function deleteAttendee($id){
            try{ 
                $sql="delete from attandee where attendee_id=:id ";
             $stmt=$this->db->prepare($sql);
             $stmt->bindparam(":id",$id);
             $stmt->execute();
             return True;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
                return False;
             
            }
         }
         public function getAttandees(){
            try{
                $sql = "SELECT * FROM `attandee` a inner join speciality s on a.speciality_id = s.speciality_id ";
            $result= $this->db->query($sql);
                return  $result;
            }catch(PDOException $e) {
                echo $e->getMessage();
                return False;

          }  
        } 
          public function getAttendeeDetails($id){
             try{
                $sql="select *from attandee a inner join speciality s on a.speciality_id = s.speciality_id  where attendee_id = :id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result=$stmt->fetch();
                return $result;
             } 
             catch(PDOException $e) {
                echo $e->getMessage();
                return False;

             }
          }
          public function getSpeciality(){
              try{
            $sql = "SELECT * FROM `speciality`";
            $result= $this->db->query($sql);
                return  $result;
              }
              catch(PDOException $e) {
                echo $e->getMessage();
                return False;
          }
      } 
    }
?>