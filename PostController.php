<?php
	require_once('Post.php');

	Class PostController{

		var $posts=array();

		function PostController(){
		}

		function loadPosts(){
			$con=mysqli_connect("127.0.0.1","root", "", "stuco");
			if(mysqli_connect_errno()){
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			if(!isset($_GET['page']))
				$page=1;
			else
				$page=$_GET['page'];
			$sql = "SELECT posts.text, posts.link, posts.linkType, posts.time, posts.user, users.name FROM posts LEFT JOIN users on posts.user = users.userID ORDER BY posts.time DESC LIMIT " . 5*($page-1) . ", 5";

			$result=mysqli_query($con,$sql);

			while($row = mysqli_fetch_array($result)){
				$Post=new Post($row['text'], $row['link'], $row['linkType'], $row['user'], $row['time']);
				$Post->userName=$row['name'];
				array_push($this->posts,$Post);
			}
			mysqli_close($con);
		}

		function postsToHTML(){
			$string="";
			for($i=0;$i<count($this->posts);$i++){
				$string .= '<div id="post">';
				//outdated code to process link type. Replaced by code that automatically detects type of link.
				/*if($this->posts[$i]->linkType==0){
					$string .= '<div id="postLink">' . $this->posts[$i]->createLink() . '</div>';
				}
				if($this->posts[$i]->linkType==1){
					 $string .= '<div id="postLink">' . $this->posts[$i]->createYoutubeEmbed() . '</div>' ;
				}
				if($this->posts[$i]->linkType==2){
					$string .= '<div id="postLink">' . $this->posts[$i]->createImageEmbed() . '</div>';
				}*/
				$string .= '<div id="postLink">' . $this->posts[$i]->linkToHTML() . '</div>';
				$string .= '<div id="postText">' . $this->posts[$i]->text . '</div>'; 
				$string .= '<div id="postInfo">Posted by ' . $this->posts[$i]->userName . ' ' . $this->posts[$i]->timeToString() . ' ago</div>'; 
				$string .= '</div>';
			}
			return $string;
		}
	}
?>