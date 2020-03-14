<?php
$conn=mysqli_connect('localhost', 'root', 'zxcv1234', 'opentutorial');

settype($_POST['id'], 'integer');
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "UPDATE topic SET title = '{$filtered['title']}', description = '{$filtered['description']}' WHERE id = {$filtered['id']}";
$result=mysqli_query($conn, $sql);
if($result === false){
    echo 'There is a problem while it is saved. Please contact administrator.';
    error_log(mysqli_error($conn));
} else {
    echo 'Successful! <a href="index.php">Home</a>';
}
?>