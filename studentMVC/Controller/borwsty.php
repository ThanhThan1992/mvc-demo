<?php
include_once 'studentController.php';
class browsty
{
    public function command($option)
    {
        $student = new studentController();
        switch ($option) {
        case "insert":
            $student->getViewInsertStudent();
            include_once 'Views/insertStudent.php';
        break;
        case "edit":
            include_once 'Views/editStudent.php';
        break;
        default:
            $student->viewStudent();
            include_once 'Views/studentView.php';
        break;
        }
    }
}
?>



