<?php
$conn=mysqli_connect('localhost', 'root', 'zxcv1234', 'opentutorial');
$filtered = array(
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description']),
    'author_id'=>mysqli_real_escape_string($conn, $_POST['author_id'])
);

$sql = "
    INSERT INTO topic
        (title, description, created, author_id)
        VALUES(
            '{$filtered['title']}',
            '{$filtered['description']}',
            NOW(),
            {$filtered['author_id']}
        )
";
$result=mysqli_query($conn, $sql);
if($result === false){
    echo 'There is a problem while it is saved. Please contact administrator.';
    error_log(mysqli_error($conn));
} else {
    echo 'Successful! <a href="index.php">Home</a>';
}
?>