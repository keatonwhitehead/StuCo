<?php 
	require_once("lib/fileSystem.php");
	echo'<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>';
	echo"<style>";
	require_once(bootstrapCSS);
	require_once(css); 
	echo "</style>";
	require_once(Library);
	require_once(PostController);
	require_once(Post);
	echo'<link rel="stylesheet" href="../StuCo/css/font-awesome.min.css">';
	startDoc ();
	startHead ();
	makeTitle('Student Council');
	echo "<link rel=\"icon\" type=\"image/jpg\" href=\"" . icon . "\">";
	echo'<script type="text/javascript" src="' . bootstrapJS . '"></script>';
	endHead ();
	startBody();
	echo '<div class ="navbar navbar-default navbar-fixed-top>
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="http://localhost/StuCo/index.php" class="navbar-brand">Student Council</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="http://localhost/StuCo/index.php"><i class="fa fa-home"></i><span class="padding-left-10">Home</span></a></li>
						<li><a href="http://localhost/StuCo/calendar.php"><i class="fa fa-calendar"></i><span class="padding-left-10">Calendar</span></a></li>
						<li><a href="http://localhost/StuCo/blog.php"><i class="fa fa-bars"></i><span class="padding-left-10">Blog</span></a></li>
						<li><a href="http://localhost/StuCo/Message.php"><i class="fa fa-comment"></i><span class="padding-left-10">Message</span></a></li>
						<li><a href="http://localhost/StuCo/members.php"><i class="fa fa-users"></i><span class="padding-left-10">Members</span></p></a></li>
					</ul>
				</div>
			</div>
		</div>';	
	echo '<div class ="container-div">';
	echo '<div class="container">';
	echo 'Welcome';
	echo '</div>';
	echo"</div>";
	endBody();
	endDoc();

?>