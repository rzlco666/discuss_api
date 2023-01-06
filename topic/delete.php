<?php
include '../connection.php';

$id = $_POST['id'];
$images = $_POST['images'];

$sql = "DELETE FROM topic WHERE id = '$id'";
$result = $conn->query($sql);
if ($result) {
    $list_images = json_decode($images);
    for ($i = 0; $i < count($list_images); $i++) {
        unlink('../image/topic/' . $list_images[$i]);
    }
    $sql_comment = "DELETE FROM comment WHERE id_topic = '$id'";
    $conn->query($sql_comment);
    echo json_encode(array(
        'success' => true
    ));
} else {
    echo json_encode(array(
        'success' => false
    ));
}
