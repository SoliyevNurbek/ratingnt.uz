<?php
    include_once 'config.php';
    $db= new Coder();

    $id=$_GET['id'];
    $sql=$db->getdata('fikrlar',[],"id='$id'");
    echo json_encode($sql);



?>