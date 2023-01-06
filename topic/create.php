<?php
include '../connection.php';

$title = $_POST['title'];
$description = $_POST['description'];
$images = $_POST['images'];
$base64codes = $_POST['base64codes'];
$id_user = $_POST['id_user'];

$sql = "INSERT INTO topic SET title = '$title', description = '$description', images = '$images', id_user = '$id_user'";
$result = $conn->query($sql);
if ($result) {
    $list_images = json_decode($images);
    $list_base64codes = json_decode($base64codes);
    for ($i = 0; $i < count($list_images); $i++) {
        file_put_contents('../image/topic/' . $list_images[$i], base64_decode($list_base64codes[$i]));
    }
    echo json_encode(array(
        'success' => true
    ));
} else {
    echo json_encode(array(
        'success' => false
    ));
}
