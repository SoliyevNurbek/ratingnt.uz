<?php
    session_start();
    include_once 'config.php';
    if($_SESSION['rol']!='1'){
        header("Location: index.php");
    }
    include_once 'config.php';

    $func=explode('.',$_POST['exampleRadios']);

    $idtech = $func[1];
    $old_baho = $func[2];
    $old_sharh=$func[3];

    $new_baho = $func[0];
    $new_sharh = $_POST['radio'.$new_baho];

    $summa_baho = strval(intval($old_baho)+intval($new_baho));
    $summa_sharh = $old_sharh.', '.$new_sharh;

    // echo $summa_baho.'   '.$summa_sharh;

    $db =  new Coder();
    $sql = $db->update('Teacher',['baho'=>$summa_baho,'baho_sharh'=>$summa_sharh],[],"id='$idtech'");

    $ret =[];

    if($sql){
        $ret+=['xatolik'=>0,'xabar'=>'Muvaffaqiyatli baho berdingiz !'];
    }
    else{
        $ret+=['xatolik'=>1,'xabar'=>'Xatolik !'];
    }

    echo json_encode($ret);
    // echo $_POST['radio'.$new_baho];
    // echo $_POST[$x].'   '.$_POST['exampleRadios'];
?>
