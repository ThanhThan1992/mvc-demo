
<?php
include_once ("Models/database.php");
class student 
{       
    private $id;
    private $name;
    private $age;
    private $porn;
    private $studentModel;
    function __construct() 
    {
        $this->id   = 0;
        $this->name = "";
        $this->age  = 0;
        $this->porn = "";
        $this->studentModel=new database();
    }            
    function student($Id,$Name,$Age,$Porn) 
    {
        $this->id   = $Id;
        $this->name = $Name;
        $this->age  = $Age;
        $this->porn = $Porn;
    }
    function setId($new_Id)
    {
        $this->id = $new_Id;
    }
    function getId()
    {
        return $this->id ;
    }
    function setName($new_Name)
    {
        $this->name = $new_Name;
    }
    function getName()
    {
        return $this->name;
    }
    function setAge($new_Age)
    {
        $this->age = $new_Age;
    }
    function getAge()
    {
        return $this->age;
    }
    function setPorn($new_Porn)
    {
        $this->porn = $new_Porn;
    }
    function getPorn()
    {
        return $this->porn;
    }
    public function getAllStudent()
    {
            //$studentModel = new database();
        $student=$this->studentModel->getAll("student");
        return $student;    
    }
    public function inSertStudent($query,$table)
    {
        if($this->studentModel->insert($query, $table))
        {
            return true;
        }
        else{return false;}
        return true;
    }
    //public 
    public function getStudentById($id,$table)
    {
        $query  = "SELECT * FROM $table WHERE id=$id";
        $result = pg_query($query); 
        //var_dump(pg_fetch_object($result));die;
        if(pg_fetch_object($result) != FALSE)
        { return TRUE;}
        else { return FALSE; }
        return TRUE ;
    }
}
?>

