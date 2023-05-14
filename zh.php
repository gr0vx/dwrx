<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN"
"http://www.wapforum.org/DTD/xhtml-mobile10.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head> 
     <link href='http://fonts.googleapis.com/css?family=Federant' rel='stylesheet' type='text/css'/>
     <link href="http://fonts.googleapis.com/css?family=Iceland" rel="stylesheet" type="text/css" />
 <style type="text/css">
 body {
	   background:black; font-size:11px;
	   font-family: Federant;
    color: white;  }
 a {
     color: dodgerblue;
     font-family: Federant;
      }
 a:hover {
     border-bottom:1px solid aqua;
      }
 #menu a {
 	 font-family: Federant;
    	padding:4px 15px;
    	margin:0;
    	background:darkred;
    	color:white;
    	text-decoration:none;
    	letter-spacing:2px;
    	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
       }
       #menu a:hover {
    	padding:4px 15px;
    	margin:0;
    	 font-family: Federant;
    	background: grey;
    	color:white;
    	text-decoration:none;
    	letter-spacing:2px;
    	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
       }
  textarea {
  	   width:600px;
  	   height:200px;
  	   background: black;
  	   border:1px solid darkred;
  	   color: white;
  	   font-family: Federant;
  	   }
  input[type=text] , input[type=file] , select {   
       background:black;
       color:white;border: 1px solid darkred; 
       padding:6px 6px 6px 6px;
       font-family: Federant;
        }
  input[type=submit] {
       background:#b70505;
       color:white;border: 1px solid #000; 
       padding:6px 6px 6px 6px;
       font-family: Federant;
       }
  button[type=submit] {
       background:#b70505;
       color:white;border: 1px solid #000; 
       padding:6px 6px 6px 6px;
       font-family: Federant;
       }
  .subbtn:hover {
  	   background:#c0bfbf;
  	   color:#000000;
  	   font-family: Federant;
  	   }

td, th { font-size: 12pt; text-align: left; vertical-align: top; color: dodgerblue; }
h1           { font-size: 16pt; text-align: center; }
h1 a         { color: #000000 !important; text-decoration: none; }
p            { text-align: center; font-size: 9pt; }
p a          { color: #666666 !important; }
table        {  margin: 0 auto; border-collapse: collapse; border: 1px solid #ffffff; min-width: 400px; }
th, td       { padding: 5px 10px; }
th           { background: black; color: #ffffff; }
td a         { color: dodgerblue !important; text-decoration: none; }
th img       { position: relative; top: -3px; left: 2px; }
td           { border-bottom: 1px solid #cccccc; background: black; }
tr.odd td    { background: black; }

#lol a {
    	padding:4px 15px;
    	margin:0;
    	background:darkgreen;
    	color:white;
    	text-decoration:none;
    	letter-spacing:2px;
    	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
       }
	  
</style>

<title>Zone-H Mass Poster</title>
<br />
        <center> <font color="red" face="iceland" size="10">Zone-H Mass Poster</font>
		 <br /><br />
<form method="POST">
<input type="text" style="width: 230px;height: 20px;" name="defacer" placeholder="Attacker">
<input type="hidden" name="mirror" value="zone-h"><br>
<textarea placeholder="http://" class="put" style="width: 250px;height: 100px;margin-top:15px;" name="domains"></textarea><br>
<input type="submit" value="Submit.." name="go">
</form>
<table>
<?php
set_time_limit (0);
if (!function_exists ("curl_init")){die ("This Script uses cURL Library, you must install first !<br><a href='http://au2.php.net/manual/en/curl.setup.php'>http://au2.php.net/manual/en/curl.setup.php</a>");}

if (@$_POST['go'])
{
	foreach (explode ("\n", htmlspecialchars($_POST['domains'])) as $domain)
	{
		post ($domain, $_POST['defacer'], $_POST['mirror']);
	}
	echo "<br>";
}

function post ($url, $defacer, $mirror)
{
	$ch = curl_init ();
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_POST, 1);

	switch ($mirror)
	{
	case "zone-h";
		curl_setopt ($ch, CURLOPT_URL, "http://www.zone-h.com/notify/single");
		curl_setopt ($ch, CURLOPT_POSTFIELDS, "defacer=$defacer&domain1=$url&hackmode=1&reason=1");
		if (preg_match ("/color=\"red\">OK<\/font><\/li>/", curl_exec ($ch)))
			 echo "<tr><td style='text-align:left'><font color='red'>Zon</font><font color='#fff'>e-H</font> =&gt; <font color='gold'>$url</font> : Status =&gt; <span style='color: green'>SUCCESS</span> [ Perawan ]</td></tr>";
		else
			echo "<tr><td style='text-align:left'><font color='red'>Zon</font><font color='#fff'>e-H</font> =&gt; <font color='gold'>$url</font> : Status =&gt; <span style='color: red'>ERROR</span> [ Bekas/BanList ]</td></tr>";
		break;
	default:
		break;
	}
	curl_close ($ch);
}

?>
</table>
<br>
</center>