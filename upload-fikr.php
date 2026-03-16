<?php

require_once __DIR__ . '/config.php';

$allow_type = ['png', 'jpg', 'gif', 'svg'];
$fileName = isset($_FILES['rasm']['name']) ? $_FILES['rasm']['name'] : '';
$ex = explode('.', $fileName);
$exct = strtolower($ex[count($ex) - 1]);

if (in_array($exct, $allow_type, true)) {
    $safeFileName = 'user_' . time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $fileName);
    move_uploaded_file($_FILES['rasm']['tmp_name'], 'uploads/' . $safeFileName);

    $db = db();
    $sql = $db->insert('fikrlar', ['matn' => $_POST['matn'], 'rasm' => $safeFileName]);

    $ret = [];

    if ($sql) {
        $ret += ['xatolik' => 0, 'xabar' => 'Muvaffaqiyatli yozildi!'];
    } else {
        $ret += ['xatolik' => 1, 'xabar' => 'Yozilmadi'];
    }

    echo json_encode($ret);
} else {
    echo 'taqiqlangan format';
}
?>
