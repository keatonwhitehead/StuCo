<?php

function getFileList($dir){ //Will check if $dir is a directory 
	$test=0;
	$arr=array();
	$dir=realpath($dir);
	$direc=is_dir($dir);
	if ($direc==true){
		$handle=opendir($dir); //opens directory
		if($handle!==false){
			while($test!==false){
			$test=readdir($handle);
			$arr[]=$test;
			
			}
		}
	}
	return $arr;
	}
	
function getValue($key, $default=NULL){ //Gets the value of $key. If $key doesn't exist and $default is set, it will return $default.
	$y=isset($_REQUEST[$key])?$_REQUEST[$key]:$default;
	return $y;
}

function printDoctype (){
	echo '<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01//EN""http://www.w3.org/TR/html4/strict.dtd">';
}

function printFileList ($file){ //Prints the file list from the path $file
	echo "File Path: '$file' <br>\n";
	$file=realPath($file);
	if ($file!==false){
	$handle=openDir($file);
	if($handle != false){
		echo "<ol>";
		$filename=readdir($handle);
	while ($filename != false) {
		if(is_dir($filename)==true){
		echo " <li class=\"directory\"> $filename </li>\n";
		}
		else {
		echo "<li class=\"file\"> $filename </li>\n";
		}
		$filename = readdir ($path);
	}
	echo "</ol>";
	return true;
	}
	else{
		$file=false;
		return $file;
	}
}
else{
	return false;
}
}

function makeFile ($label, $name){ //allows the user to upload a file named $name with the label $label
	echo "$label: <br>";
	echo "<br><input type=\"file\" name=\"$name\"> <br>\n";
}
	
function isPost(){ //if the request method is post, it returns true. Otherwise, it returns false.
	if($_SERVER['REQUEST_METHOD']=='POST'){
		return true;
	}
	else{
		return false;
	}
}

function endDoc(){
	echo "</html>";
}

function endBody(){
	echo "</body>";
}

function endForm(){
	echo "</div> </form>";
}
function makeReset(){ //will reset form
	echo "<button type=\"reset\"> Reset </button><br>\n";
}
function makeSubmit($value,$name){ //makes a submit button with the value $value
	echo "<br><input type=\"submit\" name=\"$name\" value=\"$value\"><br><br>\n";
}
function dropDown ($label, $name, $valueArr, $preSelect=NULL, $errMsg=NULL){ //Makes a drop down with a label $label with $value, with one preselected
	echo "$label: <select name=\"$name\"> ";
	foreach($valueArr as $value){
		if ($value==$preSelect){
			echo "<option value=\"$value\" selected=\"selected\" >" . $value . "</option>\n";
		}
		else{
			echo "<option value=\"$value\">" . $value . "</option>\n";
		}
		
	}
	echo "</select><br>\n";
	if($errMsg!==NULL){
		echo "<div class=\"error\"> $errMsg </div>";
	}
} 
function checkBox ($label, $name, $value=NULL, $preCheck=NULL){ //check box with values of $value
	if($preCheck == $value){
		echo "<input type=\"checkbox\"  name=\"$name\"  value=\"$value\" checked=\"checked\"> $label <br>\n";
	}
	else{
		echo "<input type=\"checkbox\" name=\"$name\"  value=\"$value\"> $label<br>\n";
	}
}
function prnt($text){
	echo "$text <br>\n";
}

function textArea ($label, $name, $rows, $cols, $prefill=NULL, $errMsg=NULL){ // makes a text area with the size of $rows/$cols, prefilled with $prefill.
	echo "$label ";
	if($errMsg!==NULL){
		echo "<div class=\"error\">	 $errMsg </div> <br>\n";
	}
	echo "<textarea name=\"$name\"  rows=\"$rows\" cols=\"$cols\">$prefill</textarea> <br>\n";
}

function passInput ($label, $name, $size, $maxLength, $prefill=NULL, $errMsg=NULL){ //password box filled with $prefill
	echo "$label <input name=\"$name\" type=\"password\" size=\"$size\" maxlength=\"$maxLength\" value=\"$prefill\"><br>\n";
	if($errMsg!==NULL){
		echo "<div class=\"error\"> 	$errMsg </div> <br>\n";
	}
}

function textInput ($label, $name, $size=NULL, $maxLength, $prefill=NULL, $errMsg=NULL){ //text box filled with $prefill
	echo "$label "; 
	echo "<input class=\"input\" name=\"$name\" size=\"$size\" maxlength=\"$maxLength\" value=\"$prefill\"><br>\n";
if($errMsg!==NULL){
		echo "<div class=\"error\"> 	$errMsg </div> <br>\n";
	}
}
function startForm($method, $action=NULL){ //starts a form. if the method is post (defined by $method) it enctypes to post
	if($method=="post"||$method="POST"){
		echo "<form method=\"$method\" enctype=\"multipart/form-data\" action=\"$action\"> <div>";
	}
	else{
		echo "<form method=\"$method\" action=\"$action\"> <div>";
	}
}
function startBody(){
	echo "<body>";
}
function endHead(){
	echo "</head>";
}
function addCSSLink ($file){ //adds a link to CSS file $file
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$file\">  ";
}
function makeTitle($title){
	echo "<title> $title </title>";
}
function startHead(){
	echo "<head>";
}
function startDoc(){
	echo "<html>";
}
function createIcon ($file) {
	echo "<link rel=\"icon\" type=\"image/jpg\" href=\"$file\">";
}
?>