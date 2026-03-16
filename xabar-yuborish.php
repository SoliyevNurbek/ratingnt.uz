<?php
require_once __DIR__ . '/config.php';

$db = db();
$user_ism = isset($_POST['name']) ? trim($_POST['name']) : '';
$user_email = isset($_POST['email']) ? trim($_POST['email']) : '';
$xabar = isset($_POST['textarea']) ? trim($_POST['textarea']) : '';

$sql = $db->insert('users_xabar', [
    'user_ism' => $user_ism,
    'user_email' => $user_email,
    'xabar' => $xabar,
]);

$ret = [];

if ($sql) {
    $ret += ['xatolik' => 0, 'xabar' => 'Muvaffaqiyatli yuborildi !'];
} else {
    $ret += ['xatolik' => 1, 'xabar' => 'Xabar yuborilmadi qaytadan uruning !'];
}

echo json_encode($ret);
?>
