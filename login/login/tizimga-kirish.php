<?php
session_start();
require_once dirname(__DIR__, 2) . '/config.php';

$db = db();
$login = isset($_POST['login']) ? trim($_POST['login']) : '';
$parol = isset($_POST['parol']) ? md5($_POST['parol']) : '';
$sql = $db->getdata('users', ['usernom' => $login, 'PASSWORD' => $parol]);

$ret = [];
if (!empty($sql['id'])) {
    $_SESSION['login'] = $login;
    $_SESSION['rol'] = $sql['rol_id'];
    $_SESSION['ism'] = $sql['ism'];
    $_SESSION['familya'] = $sql['familya'];
    $ret += ['xatolik' => 0, 'xabar' => 'Muvaffaqiyatli tizimga kirdingiz'];
} else {
    $ret += ['xatolik' => 1, 'xabar' => 'Login yoki parol xato'];
}

echo json_encode($ret);
?>
