<?php
require_once __DIR__ . '/config.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$db = db();
$sql = $db->delete('fikrlar', [], "id='$id'");

$ret = [];

if ($sql) {
    $ret += ['xatolik' => 0, 'xabar' => "Muvaffaqqiyatli o'chirildi"];
} else {
    $ret += ['xatolik' => 1, 'xabar' => "Xatolik. O'chirilmadi"];
}

echo json_encode($ret);
?>
