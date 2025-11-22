<?php
require_once ("config.php");
$blog_id=$_GET['blog_id'];
$stmt = $dbh->query("SELECT * FROM tbl_comment WHERE tbl_comment.blog_id=$blog_id ORDER BY parent_comment_id asc, comment_id asc");

$record_set = array();
while ($row = $stmt->fetch()) {
    array_push($record_set, $row);
}
echo json_encode($record_set, JSON_PRETTY_PRINT);
?>