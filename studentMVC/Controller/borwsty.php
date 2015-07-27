<?php
include_once 'studentController.php';
include_once("Models/student.php");
class browsty
{
    private $id ;
    public function command($option)
    {
        $student = new studentController();
        switch ($option) {
        case "insert":
            $student->getViewInsertStudent();
            include_once 'Views/insertStudent.php';
        break;
        case "edit":
            $getStudent = $student->viewStudentById($this->id);
            include_once 'Views/editStudent.php';
        break;
        case "delete":
            
            $student->viewStudent();
            include_once 'Views/editStudent.php';
        break;
        default:
            $student->viewStudent();
            include_once 'Views/studentView.php';
        break;
        }
    }
    public function setID($new_id)
    {
        $this->id=$new_id;
    }
    public function getID()
    {
        return $this->id;
    }
}
?>



