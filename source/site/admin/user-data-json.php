<?php 
include '../configuration/hash-key.php';
include '../configuration/config.php';
include '../post/post-functions.php';

session_start();

$user_id = $_GET['user_id'];

//Get all post
$posts = getAllPost($user_id);

$arr = array('user_id' => $_GET['user_id'], 'user_posts' => $posts);
echo json_encode($arr);

?>