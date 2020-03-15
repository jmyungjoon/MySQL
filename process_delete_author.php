<?php
$conn=mysqli_connect('localhost', 'root', 'zxcv1234', 'opentutorial');

settype($_POST['id'], 'integer');
$filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id'])
);

$sql = "DELETE FROM author WHERE id = {$filtered['id']}";
$result=mysqli_query($conn, $sql);
if($result === false){
    echo 'There is a problem while it is saved. Please contact administrator.';
    error_log(mysqli_error($conn));
} else {
    header('Location: author.php');
}
?>