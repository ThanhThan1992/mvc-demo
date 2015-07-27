<?php
    include_once ("config.php");
    include_once("Controller/studentController.php");
    connectToDatabase();
    $studentcontroller = new studentController();
    $studentcontroller->inVoke();
?>
