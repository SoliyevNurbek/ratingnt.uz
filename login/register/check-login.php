<?php
require_once dirname(__DIR__, 2) . '/config.php';

$login = isset($_POST['login']) ? trim($_POST['login']) : '';
$db = db();
$sql = $db->getdata('users', ['usernom' => $login]);
$ret = [];

if (!empty($sql['id'])) {
    $ret += ['xatolik' => 1, 'xabar' => 'Bu login band!'];
} else {
    $ret += ['xatolik' => 0, 'xabar' => 'Muvaffaqqiyatli'];
}

echo json_encode($ret);
?>
