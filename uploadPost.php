<?php
	require_once('Post.php');
	if(isset($_POST['text']))
		$text=$_POST['text'];
	else
		die();
	if(isset($_POST['link']))
		$link=$_POST['link'];
	else
		die();
	$Post = new Post($text, $link, 0, 0, time());
	$Post->storePost();
?>