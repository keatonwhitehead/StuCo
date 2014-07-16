<?php
	class Post{
		var $text;
		var $link;
		var $linkType;
		var $time;
		var $userNumber;
		var $userName;
		
		function Post($text="", $link="", $linkType=0, $user=0, $time=0){
			$this->text=$text;
			$this->link=$link;
			$this->linkType=$linkType;
			$this->user=$user;	
			$this->time=$time;
		}
		function createLink(){
			if($this->linkType==0){
				return '<a href="' . $this->link . '">Link</a>';
			}
			else{
				return;
			}
		}
		function createYoutubeEmbed(){
			if($this->linkType==1){
				parse_str(parse_url($this->link, PHP_URL_QUERY),$array);
				return '<iframe src="//www.youtube.com/embed/' . $array['v'] . '" frameborder="0" allowfullscreen></iframe>';
			}
			else{
				return;
			}
		}
		function createImageEmbed(){
			if($this->linkType==2){
				return '<img src="' . $this->link . '" />';
			}
			else{
				return;
			}
		}
		function storePost(){
			$con=mysqli_connect("127.0.0.1","root", "", "stuco");
			if(mysqli_connect_errno()){
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			$this->text=mysqli_real_escape_string($con,$this->text);
			$this->link=mysqli_real_escape_string($con,$this->link);

			$sql="INSERT INTO posts (text, link, linktype, time, user) VALUES ('$this->text', '$this->link', '$this->linkType', '$this->time', '$this->user')";

			if(!mysqli_query($con,$sql))
				die(mysqli_error($con));

			mysqli_close($con);
		}

		function timeToString(){
			$timeStrings=array(315362920=>"year",2592000=>"month",86400=>"day",3600=>"hour",60=>"minute",1=>"second");
			$timeSince=time()-$this->time;
			foreach($timeStrings as $sec=>$secString){
				if($timeSince/$sec>=1){
					if(round($timeSince/$sec)==1){
						return 1 . ' ' . $secString;
					}
					else{
						return round($timeSince/$sec) . ' ' . $secString . 's';
					}
				}
			}
			return "less than 1 second";
		}

		//returns the type of link. -1 is no link, 0 is a regular link, 1 is a youtube video , 2 is an image
		function detectLinkType(){
			//check if there's no link
			if($this->link == "")
				return -1;

			if(strpos($this->link,'youtube.com/watch?v=') !== false){
				return 1;
			}

			//check if it's an image
			$imageTypes=Array("jpg", "gif", "jpeg", "png");
			$fileType=pathinfo($this->link, PATHINFO_EXTENSION);
			for($i=0;$i<count($imageTypes);$i++){
				if($imageTypes[$i]==$fileType){
					return 2;
				}
			}

			return 0;
		}

		function linkToHTML(){
			$linkType=$this->detectLinkType();

			if($linkType == -1)
				return "";

			else if($linkType==0)
				return $this->createLink();

			else if($linkType==1)
				return $this->createYoutubeEmbed();

			else
				return $this->createImageEmbed();
		}
	}
?>