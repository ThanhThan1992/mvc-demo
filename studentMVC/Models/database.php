<?php
    class database
    {
       
       function __construct() 
       {
           
       }
       //get all student
       function getAll($table) 
       {
           if($table!="")
           {
             $query  = "SELECT * FROM $table";
             $result = pg_query($query);
           }
           else {$result = null;}
           return $result;
       }
       function insert($student,$table)
       {
           if($student!=null)
           {
              $query = "INSERT INTO $table VALUES($student)";
              $result = pg_query($query);  
              return true;
           }
           else
           {
               return false; 
           }
           return true;
       }
       
       
    }
?>

