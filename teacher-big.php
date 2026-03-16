<?php
    session_start();
    if($_SESSION['rol']!=2){
        header("Location: index.php");
    }

    include_once 'config.php';

    $db = new Coder();
    $sql = $db -> insert(
    'Teacher',
    [
        'ism'=>$_SESSION['ism'],
        'familya'=>$_SESSION['familya'],
        'sharif'=>$_POST['sharif'],
        'daraja'=>$_POST["daraja"],
        'chettajriba'=>$_POST["chettajriba"],
        'darssoat'=>$_POST['darssoat'],
        'tugilgansana'=>$_POST['sana'],
        'maqola_son'=>$_POST['maqola_son'],
        'user_name'=>$_SESSION['login']
    ]);

    $ret = [];  
    if($sql){
        $ret+=['xatolik'=>0,'xabar'=>"Muvaffaqiyatli qo'shildi !"];
    }
    else{
        $ret+=['xatolik'=>1,'xabar'=>'Yuborishda xatolik ?!'];
    }
    echo json_encode($ret);
?>