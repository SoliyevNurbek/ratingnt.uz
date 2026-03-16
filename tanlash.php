<?php
    session_start();
    if($_SESSION['rol']==3){
        header("Location: user.php");
    }
    elseif($_SESSION['rol']==2){
        header("Location: teachers.php");
    }
    elseif($_SESSION['rol']==1){
        header("Location: students.php");
    }
    else{
        header("Location: index.php");
    }
?>