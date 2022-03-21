<?php

class Database{
     public $pdo;

    public function __construct(){
        $this->pdo=new PDO("mysql:host=localhost;dbname=categories;charset=utf8mb4","root","");
    }

    public function insert($table, $data){
        
           $string = "INSERT INTO ".$table." (";            
           $string .= implode(",", array_keys($data)) . ') VALUES (';            
           $string .= "'" . implode("','", array_values($data)) . "')";  


            $stmt=$this->pdo->prepare($string);
            $stmt->execute(); 
            return $stmt->fetchAll(PDO::FETCH_DEFAULT);
    }

    public function delete($table,$id){
           $string = "UPDATE ".$table." SET active = 0 WHERE id = ".$id."";            
           $stmt=$this->pdo->prepare($string);
            $stmt->execute(); 
            return $stmt->fetchAll(PDO::FETCH_DEFAULT);
    }

        public function edite($table,$id){
            $query = "SELECT * From ".$table." WHERE id=".$id." ";  
           $stmt=$this->pdo->prepare($query);
            $stmt->execute(); 
            while($row = $stmt->fetchAll(PDO::FETCH_DEFAULT))  
           {  
                $array[] = $row;  
           }  
           return $array;  
        }



        public function update($table, $data, $id)  
      {  
           $query = '';  
           $condition = '';  
           foreach($data as $key => $value)  
           {  
                $query .= $key . "='".$value."', ";  
           }  
           $query = substr($query, 0, -2); 
      
           $query = "UPDATE ".$table." SET ".$query." WHERE id=".$id."";  

            $stmt=$this->pdo->prepare($query);
            $stmt->execute(); 
            return $stmt->fetchAll(PDO::FETCH_DEFAULT);
      }  
     
      public function select($table)  
      {  
           $array = array();  
           $query = "SELECT * FROM ".$table." WHERE active=1";  

            $stmt=$this->pdo->prepare($query);
            $stmt->execute(); 
            while($row = $stmt->fetchAll(PDO::FETCH_DEFAULT))  
           {  
                $array[] = $row;  
           }  
           return $array;  
      }  
     }



