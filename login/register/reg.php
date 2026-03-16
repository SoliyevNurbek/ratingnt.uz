<?php
require_once dirname(__DIR__, 2) . '/config.php';
session_start();

$firstname = isset($_POST['ism']) ? trim($_POST['ism']) : '';
$lastname = isset($_POST['fam']) ? trim($_POST['fam']) : '';
$username = isset($_POST['login']) ? trim($_POST['login']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$password = isset($_POST['password']) ? md5($_POST['password']) : '';
$ret = [];
$db = db();
$sql = $db->insert('users', [
    'ism' => $firstname,
    'familya' => $lastname,
    'usernom' => $username,
    'telnumer' => $phone,
    'PASSWORD' => $password,
]);

if ($sql) {
    $ret += ['xatolik' => 0, 'xabar' => 'Muvaffaqqiyatli yozildi'];
    $_SESSION['login'] = $username;
} else {
    $ret += ['xatolik' => 1, 'xabar' => 'Yozilmadi'];
}

echo json_encode($ret);
?>
