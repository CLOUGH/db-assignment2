<?php 
include '../configuration/hash-key.php';
include '../configuration/config.php';
include '../post/post-functions.php';
include './admin-functions.php';
include '../friend/friend-functions.php';

session_start();

$user_id = $_GET['user_id'];

//Get all post
$posts = getAllUserPost($user_id);

//Get all post
$comments = getAllUserComment($user_id); 

//Get all friend of the user
$friends = getAllFiends($user_id);

$arr = array('user_posts' => $posts,'user_comments' => $comments,'user_friends' => $friends);

echo json_encode($arr);


?>