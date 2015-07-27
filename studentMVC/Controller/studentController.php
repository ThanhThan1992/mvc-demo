<?php 
include_once("Models/student.php");
include_once("Controller/borwsty.php");
class studentController
{
    public $studentModel;
    public $errors 			= array();
    public $nummer                      =0;
    public $err ;
    public function __construct()
    {
        $this->studentModel = new student();
    }
    public function inVoke()
    {   
        $browsty = new browsty();
        
        if (isset($_GET['edit']))
        {   
            if(isset($_POST['Update']))
            {        
                $this->updateStudentById($_POST["id"]);
                return;
            }
            $id = $_GET['edit'];
            $browsty -> setID($id);
            $browsty -> command('edit');
            return;    
        }
        if (isset($_GET['delete']))
        {   
           
            $id = $_GET['delete'];
            $this->deleteStudent($id);
            
            //$browsty -> command('edit');
            return;    
        }
        if(!isset($_GET['insert']))
        {
            $this->viewStudent();
        }
        else 
        {
            if(isset($_POST['submit']))
            {
                $this->insertStudent();
            }
            else {
                $this->getViewInsertStudent();
            }
        }
          
    }
    public function viewStudent()
    {
       $student = new student();
       $students = $student ->getAllStudent();
       include 'Views/studentView.php';
    }
    public function getViewInsertStudent()
    {
       
       $errs = "";
       include 'Views/insertStudent.php';
    }
    public function insertStudent()
    {
        
        $id  = $_POST['id'];
        $name  = $_POST['name'];
        $age   = $_POST['age'];
        $porn  = $_POST['porn'];
        //var_dump($tudent->id);die;
        $query = "$id,'$name',$age,'$porn'";
        if($this->checkInsertStudent() == TRUE && $this->checkExistStudent($id) == TRUE)
        {
           //var_dump($this->checkInsertStudent());die;
           $this->studentModel->inSertStudent($query, "student");
           $this->viewStudent(); 
        }
        else {
            $errs=$this->dumError();
            include_once 'Views/insertStudent.php';
        }
        
    }
    /* checck validate student*/
    public function checkInsertStudent()
    {
        $err = "";
        if($_POST['id'] == "")
        { 
            $this->setError('id not empty');
            return FALSE;
        }
        if($_POST['name'] == "")
        {
            $this->setError('name not empty');
            return FALSE;
        }
        return TRUE;   
    }
    function checkExistStudent($id)
    {
        $check = $this->studentModel->getStudentById($id, "student");
        if($check == TRUE)
        { 
            $this->setError("id is duplicated");
            return FALSE;
        }
        else {
            return TRUE;           
        }
    }
    function setError($msg)
    {
	$this->errors[] = $msg;
	$this->nummer += 1;
    }
	
    function dumError()
    {
        if ($this->nummer >0)
        {
            foreach ($this->errors AS &$err)
            {
		return $err.'<br />';
            }
	}
   }
   function viewStudentById($id)
   {    
       return  $this->studentModel->getOneStudentById($id, "student");
   }
   function updateStudentById($id)
   {
       $studentUpdate = $this->studentModel->getOneStudentById($id, "student");
       $studentUpdate->name = $_POST["name"];
       $studentUpdate->age = $_POST["age"];
       $studentUpdate->porn = $_POST["porn"];
       $this->studentModel->updateStudent($studentUpdate, $id);
       $this -> viewStudent();
   }
   function deleteStudent($id)
   {
       $this->studentModel->deleteStudent($id);
       $this -> viewStudent();
   }
    /*public function actionInsert()
    {
        if(isset($_POST['submit']))
            { $this->insertStudent(); }
        else 
        {
            
                $this->viewStudent();
            
        }
    }*/
    
}
?>

