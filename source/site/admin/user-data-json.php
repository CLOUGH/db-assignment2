<?php 
include '../configuration/hash-key.php';
include '../configuration/config.php';
include '../post/post-functions.php';
include './admin-functions.php';

session_start();

$user_id = $_GET['user_id'];

//Get all post
$posts = getAllPost($user_id);

//Get all post
$comments = getAllUserComment($user_id); 

$arr = array('user_id' => $_GET['user_id'], 'user_posts' => $posts,'user_comments' => $comments);
echo json_encode($arr);

?>