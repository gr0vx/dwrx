<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.7.7
*/error_reporting(6135);$Xc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Xc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Ii=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Ii)$$X=$Ii;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$g;return$g;}function
adminer(){global$b;return$b;}function
version(){global$ia;return$ia;}function
idf_unescape($u){$pe=substr($u,-1);return
str_replace($pe.$pe,$pe,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($sg,$Xc=false){if(get_magic_quotes_gpc()){while(list($y,$X)=each($sg)){foreach($X
as$fe=>$W){unset($sg[$y][$fe]);if(is_array($W)){$sg[$y][stripslashes($fe)]=$W;$sg[]=&$sg[$y][stripslashes($fe)];}else$sg[$y][stripslashes($fe)]=($Xc?$W:stripslashes($W));}}}}function
bracket_escape($u,$Oa=false){static$ui=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($Oa?array_flip($ui):$ui));}function
min_version($aj,$De="",$h=null){global$g;if(!$h)$h=$g;$nh=$h->server_info;if($De&&preg_match('~([\d.]+)-MariaDB~',$nh,$A)){$nh=$A[1];$aj=$De;}return(version_compare($nh,$aj)>=0);}function
charset($g){return(min_version("5.5.3",0,$g)?"utf8mb4":"utf8");}function
script($yh,$ti="\n"){return"<script".nonce().">$yh</script>$ti";}function
script_src($Ni){return"<script src='".h($Ni)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($P){return
str_replace("\0","&#0;",htmlspecialchars($P,ENT_QUOTES,'utf-8'));}function
nl_br($P){return
str_replace("\n","<br>",$P);}function
checkbox($B,$Y,$fb,$me="",$uf="",$kb="",$ne=""){$H="<input type='checkbox' name='$B' value='".h($Y)."'".($fb?" checked":"").($ne?" aria-labelledby='$ne'":"").">".($uf?script("qsl('input').onclick = function () { $uf };",""):"");return($me!=""||$kb?"<label".($kb?" class='$kb'":"").">$H".h($me)."</label>":$H);}function
optionlist($_f,$hh=null,$Si=false){$H="";foreach($_f
as$fe=>$W){$Af=array($fe=>$W);if(is_array($W)){$H.='<optgroup label="'.h($fe).'">';$Af=$W;}foreach($Af
as$y=>$X)$H.='<option'.($Si||is_string($y)?' value="'.h($y).'"':'').(($Si||is_string($y)?(string)$y:$X)===$hh?' selected':'').'>'.h($X);if(is_array($W))$H.='</optgroup>';}return$H;}function
html_select($B,$_f,$Y="",$tf=true,$ne=""){if($tf)return"<select name='".h($B)."'".($ne?" aria-labelledby='$ne'":"").">".optionlist($_f,$Y)."</select>".(is_string($tf)?script("qsl('select').onchange = function () { $tf };",""):"");$H="";foreach($_f
as$y=>$X)$H.="<label><input type='radio' name='".h($B)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$H;}function
select_input($Ja,$_f,$Y="",$tf="",$eg=""){$Yh=($_f?"select":"input");return"<$Yh$Ja".($_f?"><option value=''>$eg".optionlist($_f,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$eg'>").($tf?script("qsl('$Yh').onchange = $tf;",""):"");}function
confirm($Ne="",$ih="qsl('input')"){return
script("$ih.onclick = function () { return confirm('".($Ne?js_escape($Ne):'Are you sure?')."'); };","");}function
print_fieldset($t,$ue,$dj=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$ue</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($dj?"":" class='hidden'").">\n";}function
bold($Wa,$kb=""){return($Wa?" class='active $kb'":($kb?" class='$kb'":""));}function
odd($H=' class="odd"'){static$s=0;if(!$H)$s=-1;return($s++%2?$H:'');}function
js_escape($P){return
addcslashes($P,"\r\n'\\/");}function
json_row($y,$X=null){static$Yc=true;if($Yc)echo"{";if($y!=""){echo($Yc?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$Yc=false;}else{echo"\n}\n";$Yc=true;}}function
ini_bool($Sd){$X=ini_get($Sd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$H;if($H===null)$H=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$H;}function
set_password($Zi,$M,$V,$E){$_SESSION["pwds"][$Zi][$M][$V]=($_COOKIE["adminer_key"]&&is_string($E)?array(encrypt_string($E,$_COOKIE["adminer_key"])):$E);}function
get_password(){$H=get_session("pwds");if(is_array($H))$H=($_COOKIE["adminer_key"]?decrypt_string($H[0],$_COOKIE["adminer_key"]):false);return$H;}function
q($P){global$g;return$g->quote($P);}function
get_vals($F,$e=0){global$g;$H=array();$G=$g->query($F);if(is_object($G)){while($I=$G->fetch_row())$H[]=$I[$e];}return$H;}function
get_key_vals($F,$h=null,$qh=true){global$g;if(!is_object($h))$h=$g;$H=array();$G=$h->query($F);if(is_object($G)){while($I=$G->fetch_row()){if($qh)$H[$I[0]]=$I[1];else$H[]=$I[0];}}return$H;}function
get_rows($F,$h=null,$n="<p class='error'>"){global$g;$yb=(is_object($h)?$h:$g);$H=array();$G=$yb->query($F);if(is_object($G)){while($I=$G->fetch_assoc())$H[]=$I;}elseif(!$G&&!is_object($h)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$H;}function
unique_array($I,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$H=array();foreach($v["columns"]as$y){if(!isset($I[$y]))continue
2;$H[$y]=$I[$y];}return$H;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$A))return$A[1].idf_escape(idf_unescape($A[2])).$A[3];return
idf_escape($y);}function
where($Z,$p=array()){global$g,$x;$H=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$e=escape_key($y);$H[]=$e.($x=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$y],q($X))));if($x=="sql"&&preg_match('~char|text~',$p[$y]["type"])&&preg_match("~[^ -@]~",$X))$H[]="$e = ".q($X)." COLLATE ".charset($g)."_bin";}foreach((array)$Z["null"]as$y)$H[]=escape_key($y)." IS NULL";return
implode(" AND ",$H);}function
where_check($X,$p=array()){parse_str($X,$db);remove_slashes(array(&$db));return
where($db,$p);}function
where_link($s,$e,$Y,$wf="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($e)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$wf:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$K=array()){$H="";foreach($f
as$y=>$X){if($K&&!in_array(idf_escape($y),$K))continue;$Ga=convert_field($p[$y]);if($Ga)$H.=", $Ga AS ".idf_escape($y);}return$H;}function
cookie($B,$Y,$xe=2592000){global$ba;return
header("Set-Cookie: $B=".urlencode($Y).($xe?"; expires=".gmdate("D, d M Y H:i:s",time()+$xe)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($ba?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($dd=false){$Ri=ini_bool("session.use_cookies");if(!$Ri||$dd){session_write_close();if($Ri&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Zi,$M,$V,$l=null){global$gc;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($gc))."|username|".($l!==null?"db|":"").session_name()),$A);return"$A[1]?".(sid()?SID."&":"").($Zi!="server"||$M!=""?urlencode($Zi)."=".urlencode($M)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($A[2]?"&$A[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($ze,$Ne=null){if($Ne!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($ze!==null?$ze:$_SERVER["REQUEST_URI"]))][]=$Ne;}if($ze!==null){if($ze=="")$ze=".";header("Location: $ze");exit;}}function
query_redirect($F,$ze,$Ne,$Dg=true,$Ec=true,$Pc=false,$gi=""){global$g,$n,$b;if($Ec){$Fh=microtime(true);$Pc=!$g->query($F);$gi=format_time($Fh);}$Ah="";if($F)$Ah=$b->messageQuery($F,$gi,$Pc);if($Pc){$n=error().$Ah.script("messagesPrint();");return
false;}if($Dg)redirect($ze,$Ne.$Ah);return
true;}function
queries($F){global$g;static$xg=array();static$Fh;if(!$Fh)$Fh=microtime(true);if($F===null)return
array(implode("\n",$xg),format_time($Fh));$xg[]=(preg_match('~;$~',$F)?"DELIMITER ;;\n$F;\nDELIMITER ":$F).";";return$g->query($F);}function
apply_queries($F,$S,$Ac='table'){foreach($S
as$Q){if(!queries("$F ".$Ac($Q)))return
false;}return
true;}function
queries_redirect($ze,$Ne,$Dg){list($xg,$gi)=queries(null);return
query_redirect($xg,$ze,$Ne,$Dg,false,!$Dg,$gi);}function
format_time($Fh){return
sprintf('%.3f s',max(0,microtime(true)-$Fh));}function
relative_uri(){return
preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]);}function
remove_from_uri($Pf=""){return
substr(preg_replace("~(?<=[?&])($Pf".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($D,$Lb){return" ".($D==$Lb?$D+1:'<a href="'.h(remove_from_uri("page").($D?"&page=$D".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($D+1)."</a>");}function
get_file($y,$Tb=false){$Vc=$_FILES[$y];if(!$Vc)return
null;foreach($Vc
as$y=>$X)$Vc[$y]=(array)$X;$H='';foreach($Vc["error"]as$y=>$n){if($n)return$n;$B=$Vc["name"][$y];$oi=$Vc["tmp_name"][$y];$Ab=file_get_contents($Tb&&preg_match('~\.gz$~',$B)?"compress.zlib://$oi":$oi);if($Tb){$Fh=substr($Ab,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Fh,$Jg))$Ab=iconv("utf-16","utf-8",$Ab);elseif($Fh=="\xEF\xBB\xBF")$Ab=substr($Ab,3);$H.=$Ab."\n\n";}else$H.=$Ab;}return$H;}function
upload_error($n){$Ke=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?'Unable to upload a file.'.($Ke?" ".sprintf('Maximum allowed file size is %sB.',$Ke):""):'File does not exist.');}function
repeat_pattern($cg,$ve){return
str_repeat("$cg{0,65535}",$ve/65535)."$cg{0,".($ve%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($P,$ve=80,$Mh=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$ve).")($)?)u",$P,$A))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$ve).")($)?)",$P,$A);return
h($A[1]).$Mh.(isset($A[2])?"":"<i>…</i>");}function
format_number($X){return
strtr(number_format($X,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($sg,$Hd=array()){$H=false;while(list($y,$X)=each($sg)){if(!in_array($y,$Hd)){if(is_array($X)){foreach($X
as$fe=>$W)$sg[$y."[$fe]"]=$W;}else{$H=true;echo'<input type="hidden" name="'.h($y).'" value="'.h($X).'">';}}}return$H;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($Q,$Qc=false){$H=table_status($Q,$Qc);return($H?$H:array("Name"=>$Q));}function
column_foreign_keys($Q){global$b;$H=array();foreach($b->foreignKeys($Q)as$q){foreach($q["source"]as$X)$H[$X][]=$q;}return$H;}function
enum_input($T,$Ja,$o,$Y,$vc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Fe);$H=($vc!==null?"<label><input type='$T'$Ja value='$vc'".((is_array($Y)?in_array($vc,$Y):$Y===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Fe[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$fb=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$H.=" <label><input type='$T'$Ja value='".($s+1)."'".($fb?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$H;}function
input($o,$Y,$r){global$U,$b,$x;$B=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$Ea=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Ea[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Ea);$r="json";}$Ng=($x=="mssql"&&$o["auto_increment"]);if($Ng&&!$_POST["save"])$r=null;$md=(isset($_GET["select"])||$Ng?array("orig"=>'original'):array())+$b->editFunctions($o);$Ja=" name='fields[$B]'";if($o["type"]=="enum")echo
h($md[""])."<td>".$b->editInput($_GET["edit"],$o,$Ja,$Y);else{$wd=(in_array($r,$md)||isset($md[$r]));echo(count($md)>1?"<select name='function[$B]'>".optionlist($md,$r===null||$wd?$r:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($md))).'<td>';$Ud=$b->editInput($_GET["edit"],$o,$Ja,$Y);if($Ud!="")echo$Ud;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ja value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ja value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Fe);foreach($Fe[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$fb=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$B][$s]' value='".(1<<$s)."'".($fb?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$B'>";elseif(($ei=preg_match('~text|lob|memo~i',$o["type"]))||preg_match("~\n~",$Y)){if($ei&&$x!="sqlite")$Ja.=" cols='50' rows='12'";else{$J=min(12,substr_count($Y,"\n")+1);$Ja.=" cols='30' rows='$J'".($J==1?" style='height: 1.2em;'":"");}echo"<textarea$Ja>".h($Y).'</textarea>';}elseif($r=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ja cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Me=(!preg_match('~int~',$o["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$o["length"],$A)?((preg_match("~binary~",$o["type"])?2:1)*$A[1]+($A[3]?1:0)+($A[2]&&!$o["unsigned"]?1:0)):($U[$o["type"]]?$U[$o["type"]]+($o["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$Me+=7;echo"<input".((!$wd||$r==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($Me?" data-maxlength='$Me'":"").(preg_match('~char|binary~',$o["type"])&&$Me>20?" size='40'":"")."$Ja>";}echo$b->editHint($_GET["edit"],$o,$Y);$Yc=0;foreach($md
as$y=>$X){if($y===""||!$X)break;$Yc++;}if($Yc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $Yc), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$u=bracket_escape($o["field"]);$r=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($r=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?idf_escape($o["field"]):false);if($r=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$Vc=get_file("fields-$u");if(!is_string($Vc))return
false;return$m->quoteBinary($Vc);}return$b->processInput($o,$Y,$r);}function
fields_from_edit(){global$m;$H=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$B=bracket_escape($y,1);$H[$B]=array("field"=>$B,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$m->primary),);}return$H;}function
search_tables(){global$b,$g;$_GET["where"][0]["val"]=$_POST["query"];$kh="<ul>\n";foreach(table_status('',true)as$Q=>$R){$B=$b->tableName($R);if(isset($R["Engine"])&&$B!=""&&(!$_POST["tables"]||in_array($Q,$_POST["tables"]))){$G=$g->query("SELECT".limit("1 FROM ".table($Q)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($Q),array())),1));if(!$G||$G->fetch_row()){$og="<a href='".h(ME."select=".urlencode($Q)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$B</a>";echo"$kh<li>".($G?$og:"<p class='error'>$og: ".error())."\n";$kh="";}}}echo($kh?"<p class='message'>".'No tables.':"</ul>")."\n";}function
dump_headers($Ed,$We=false){global$b;$H=$b->dumpHeaders($Ed,$We);$Mf=$_POST["output"];if($Mf!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Ed).".$H".($Mf!="file"&&!preg_match('~[^0-9a-z]~',$Mf)?".$Mf":""));session_write_close();ob_flush();flush();return$H;}function
dump_csv($I){foreach($I
as$y=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$I[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$I)."\r\n";}function
apply_sql_function($r,$e){return($r?($r=="unixepoch"?"DATETIME($e, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$e)"):$e);}function
get_temp_dir(){$H=ini_get("upload_tmp_dir");if(!$H){if(function_exists('sys_get_temp_dir'))$H=sys_get_temp_dir();else{$Wc=@tempnam("","");if(!$Wc)return
false;$H=dirname($Wc);unlink($Wc);}}return$H;}function
file_open_lock($Wc){$kd=@fopen($Wc,"r+");if(!$kd){$kd=@fopen($Wc,"w");if(!$kd)return;chmod($Wc,0660);}flock($kd,LOCK_EX);return$kd;}function
file_write_unlock($kd,$Nb){rewind($kd);fwrite($kd,$Nb);ftruncate($kd,strlen($Nb));flock($kd,LOCK_UN);fclose($kd);}function
password_file($i){$Wc=get_temp_dir()."/adminer.key";$H=@file_get_contents($Wc);if($H||!$i)return$H;$kd=@fopen($Wc,"w");if($kd){chmod($Wc,0660);$H=rand_string();fwrite($kd,$H);fclose($kd);}return$H;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$o,$fi){global$b;if(is_array($X)){$H="";foreach($X
as$fe=>$W)$H.="<tr>".($X!=array_values($X)?"<th>".h($fe):"")."<td>".select_value($W,$_,$o,$fi);return"<table cellspacing='0'>$H</table>";}if(!$_)$_=$b->selectLink($X,$o);if($_===null){if(is_mail($X))$_="mailto:$X";if(is_url($X))$_=$X;}$H=$b->editVal($X,$o);if($H!==null){if(!is_utf8($H))$H="\0";elseif($fi!=""&&is_shortable($o))$H=shorten_utf8($H,max(0,+$fi));else$H=h($H);}return$b->selectVal($H,$_,$o,$X);}function
is_mail($sc){$Ha='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$fc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$cg="$Ha+(\\.$Ha+)*@($fc?\\.)+$fc";return
is_string($sc)&&preg_match("(^$cg(,\\s*$cg)*\$)i",$sc);}function
is_url($P){$fc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($fc?\\.)+$fc(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$P);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($Q,$Z,$ae,$pd){global$x;$F=" FROM ".table($Q).($Z?" WHERE ".implode(" AND ",$Z):"");return($ae&&($x=="sql"||count($pd)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$pd).")$F":"SELECT COUNT(*)".($ae?" FROM (SELECT 1$F GROUP BY ".implode(", ",$pd).") x":$F));}function
slow_query($F){global$b,$qi,$m;$l=$b->database();$hi=$b->queryTimeout();$vh=$m->slowQuery($F,$hi);if(!$vh&&support("kill")&&is_object($h=connect())&&($l==""||$h->select_db($l))){$ke=$h->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$ke,'&token=',$qi,'\');
}, ',1000*$hi,');
</script>
';}else$h=null;ob_flush();flush();$H=@get_key_vals(($vh?$vh:$F),$h,false);if($h){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$H;}function
get_token(){$_g=rand(1,1e6);return($_g^$_SESSION["token"]).":$_g";}function
verify_token(){list($qi,$_g)=explode(":",$_POST["token"]);return($_g^$_SESSION["token"])==$qi;}function
lzw_decompress($Sa){$cc=256;$Ta=8;$mb=array();$Pg=0;$Qg=0;for($s=0;$s<strlen($Sa);$s++){$Pg=($Pg<<8)+ord($Sa[$s]);$Qg+=8;if($Qg>=$Ta){$Qg-=$Ta;$mb[]=$Pg>>$Qg;$Pg&=(1<<$Qg)-1;$cc++;if($cc>>$Ta)$Ta++;}}$bc=range("\0","\xFF");$H="";foreach($mb
as$s=>$lb){$rc=$bc[$lb];if(!isset($rc))$rc=$oj.$oj[0];$H.=$rc;if($s)$bc[]=$oj.$rc[0];$oj=$rc;}return$H;}function
on_help($sb,$sh=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $sb, $sh) }, onmouseout: helpMouseout});","");}function
edit_form($a,$p,$I,$Li){global$b,$x,$qi,$n;$Rh=$b->tableName(table_status1($a,true));page_header(($Li?'Edit':'Insert'),$n,array("select"=>array($a,$Rh)),$Rh);if($I===false)echo"<p class='error'>".'No rows.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$B=>$o){echo"<tr><th>".$b->fieldName($o);$Ub=$_GET["set"][bracket_escape($B)];if($Ub===null){$Ub=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Ub,$Jg))$Ub=$Jg[1];}$Y=($I!==null?($I[$B]!=""&&$x=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($I[$B])?array_sum($I[$B]):+$I[$B]):$I[$B]):(!$Li&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Ub)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$B]:($Li&&preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Li?'Save and continue edit':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n",($Li?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Saving'."…', this); };"):"");}}echo($Li?"<input type='submit' name='delete' value='".'Delete'."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$qi,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0\0\n @\0´C蔜"\0`E㑸?ÀtvM'JdÁd\\b0\0Ĝ"Àfӈ¤ϧсXPaJ0¥8#RT©z`#.©ǣ혃þȀ?À-\0¡Im? .«M¶\0ȯ(̉ýÀ/(%\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1̇ٌެ7B14vb0ͦs¼ꮲB̑±٘ޮ:#(¼b.\rDc)Ȉa7E¤¬¦ñ話̎s´筴fӉȎi7³¹¤ȴ4¦ӹ蚦4°iAT«VV馺Ϧ,:1¦Qݼ񢲙`ǣþ>:7Gјҳ°LXD*bv<܌#£e@ֺ4秡fo·ƴ:<¥ܥ¾o✎\niÅ𧬩»a_¤:¹iÁBvø|Nû4.5Nfi¢vpШ¸°l¨ꡖ܏¦£OFQЄk\$¥өõÀ¤2T㡰ʶþ¡-ؚ ޶½£𐎨:¬a̬£됮2#8А±#6n⮑񊞈¢h«t±䴆O42��ޒ¾*r ©@p@!Ĝ¾σ��6Àr[ퟱ�Áퟯ�Bj§!Hb󃐤=!1V\"²0¿\nSƙƏD7ìDڛÏC!!ইʌ§ ȫ=tC橮C¤À:+Ȋ=ªªº²¡±奟ªc�R/EȒ4© 2°䱠㠂8(ᓹ[W䑜=ySb°=ܹ֭BS+ɯȜý¥ø@pL4Yd㗄qø㦰ꢶ£3Ĭ¯¸Ac܌莨k[&>ö¨ZÁpkm]u-c:ؕ¸Nt摎´pҝ8轿#ᛏ.𜞯~ m˹PPἉ֛ùÀ쇑ª9v[Q\nٲ��+ᔑ2­VÁõz䴍£8÷(	¾Ey*#j¬2]­Rҁ¥)À[N­R\$<>:󭾜$;> ̜r»Έ̓TȜnw¡N 巘£¦켯ˇwබ¹\\Y󟠒t^>\r}ٓ\rz鴽µ\nL%J㓋\",Z 8¸i÷0u©?¨ûѴ¡s3#¨ى :󦻍㽖ȞE]xݒs^8£K^ɷ*0ўwޔȞ~㶺푩ؾv2w½ÿ±û^7㈲7£cݑu+U%{Pܪ4̼錘./!¼1Cşqx!H¹ㆤù­L¨¤¨ĠϠ6댨5®f¸Ć¨=Høl V1\0a2׻Զ඾_هĞ\0&�� d)KE'nµ[X©³\0ZɊԆ[Pޘ@ߡ񙂬`ɕ\"ڷ°Ee9yF>˔9bº憵:ü\0}Ĵ(\$ӈ뀳7Hö£蠌M¾A°²6Rú{MqݷG ڙCCꭲ¢(Ct>[쭴À/&C]ꥴG􌬜4@r>ǂ弚Sq/应Q덨mÀІ��LÀܣ贋˼®6fKPݜr%tԈӖ=\" SH\$} ¸)w¡,W\0F³ªu@آ¦9\rr°2ã¬DX³ڹOIù>»nǢ%㹐'ݟÁt\rτzĜ\1hl¼]Q5Mp6kЄqhÜ$£H~͂|Ҕݡ*4񜐲۠S뽲S t퐐\\g±跇\n-:袪p´lB¦Өc(wO0\\:зÁp4򻔚újO¤6HÊ¶rՒ¥q\n¦ɥ%¶y']\$aZӮfcձ*-ꆗºúkz°µj°lgጺ\$\"ގ¼\r#ɤ⃂¿гcᬌ \"jª\rÀ¶¦Ւ¼Ph1/DA) ²ݛÀknÁp76ÁY´R{ፅ¤Pû°򀜮-¸a·6þߛ»zJH,dl B£ho³쟂򝬫#Dr^µ^µ٥¼E½½ ĜaP��£z౴񠲇Xٖ¢´Á¿V¶ןޙȳт_%K=E©¸b弾߂§kU(.!ܮ8¸üɌI.@K͸nþ¬ü:Ð󎳇2«m툉	C*캶┅\nR¹µ0u­朮ҧ]Λ¯P/µJQd¥{L޳:YÁ2b¼T 񝊳Ӵ䣪¥V=¿L4ΐrġ߂𙳶͙­MeLªܝ眶ùiÀoй< G¤ƕЙMhm^¯UێÀ·򔲋5HiM/¬n흳T [-<__Xr(<¯®ɴ̌uҖGNX20圲\$^:'9趏턻׫¼µf N'a¶ǎ­bŬ˖¤􅫱µ!%6@úϜ$҅Gڜ¬1(mUª兲ս堡ЩN+Ü񩚜䰬ؒf0Æ½[U⸖ʨ-:I^ \$س«b\reugɨª~9۟bµ􂈦䫰¬ԠhXrݬ©!\$e,±w+÷댳̟⁅kù\nkòõʛcuWdYÿ\\׽{.󄍘¢g»p8t\rRZ¿vJ:²>þ£Y|+ŀÀۃCt\rjt½6²𞋥¿ഇ񒞾ù/¥͇ퟻ�`ו䲶~K¤ᶑRЗ𺑌ꬭªwLǹY*q¬xĺ񨓥®ݛ³跣~D͡÷x¾뉟i72ĸяݻû_{񺵳⺴_õzԳùd)C¯$?KӪP%ϏT&þ&\0P׎A^­~¢ pƅ öϜԵ\r\$ޯЖ좪+D6궦ψޭJ\$(ȯlލh&싂S>¸ö;z¶¦xůz>휚oĚ𜮊[϶õ˂Ȝµ°2õOxِVø0fûú¯޲BlɢkжZkµhXcd갪T⯈=­πp0lV鵋袜r¼¥nm¦難(��ⲅܺC¨Cڋ⌜r¨G\ré0÷i暌°þ:`Z1Q\n:ܲ\0˧Ȍq±°ü:`¿-ȍ#}1;边q#|񓑀¾¢hlDĆ\0fiDp뎌 ``°琑0yߒ1Ꜳ񽐑MQ\\¤³%oq­\0؋񣒱¨21¬1°­ ¿±§ќbi:큜r±/Ѣ `)İù@¾±É1«NØʵ񏑱¢Z񣘱±1 򝕑üଥ\rdIǦv䪭1 tڂø°⁒0:0𰓱 A2V񢰠雱%²fi3!&Q·Rc%ұ&w%Ѭ\rֈ#ʸQw`% ¾ҭ*rҹ&i߫r{*²»(rg(±#(2­(𥩒@i-  1\"\0ۚ²R꿮e.r뚄,¡ry(2ªCਲb졂ޏ3%ҵ,R¿1²Ʀ辴䢨a\rL³-3ᓠ֌ 󔜰拳Bp1񹴳O'R°3*²³=\$ۓ£^iI;/3i©5ҋ&}17²# ѹ8 ¿\"߷ѥ8񹪒23!󏡱\\\0ϸ­rk9±;S23¶ړ*Ӻq]5S<³Á#383ݓ#eѽ¹>~9S螳rթT*a@і٢esٛԕ£:-󀏩Ǟ*;, ؙ3!i´LҲퟲ� +nÀ «*²〳3i7´1©´_FS;3φ±\rA¯钳õ>´x: \r³0Δ@-ԯ¬ӷӛ7񄓓J3 箆霤O¤B±%4©+tçg󌱜rJtJ􋍲\r􍷱ƆT@£¾)ⓣdɲP>ΰFi಴þ\nr\0¸b癫(´D¶¿㋑¤´㚱㜢2t��蜲À,\$KCt򵴶#��ᐣPi.Ε2µC澞\"䢩;}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:gCI¼ܜn8Ň3)°˃781Њx:\nOg#)Ъr7\n\"贠ø|2̧SiH)N¦S䧜r\"0¹Ā䩝`(\$s6O!ӨV/=' T4潄iS6IO G#ҁX·VCƳ¡ Z1.Шp8,³[¦H䵋~Cz§ɥ2¹l¾c3ͩs£ىbⴜn醸TƚIݚ©U*fz¹䲰EƓÀع¸񦎙.:攃Iʨأ·ᅎ!_lힷ^(¶N{S)r˱ÁYl٦33ڜn+G¥Ӫyº톋i¶®xV3w³uh㞲؀º´a۔ú¹cب\r¨먮ºChҼ\r)董¡`淣�3'm5£ȕ\nPܺ2£P»ªq 򿅃}īúʁ곸BذhRȲ(0¥¡b\\0Hr44ÁB!¡pǜ$rZZ˲܉.Ƀ(\\5Ë|\nC(Μ"P𸮋Ў̒TʕΓÀ澄HN8HP᜜¬7Jp~ܻ2%¡ЏC¨1㮃§C8·HȲ*j°᜷S(¹/¡쬶KUʞ¡<2pOI��ԤⳈdOH ޵-üƴ㰘25-Ң򛈰z7£¸\"(°P \\32:]Uڗ譢߅!]¸<·AۆۤПiڰl\rԜ0v²ΣJ8«Ϸm펉¤¨<ɠ漥m;p#㠘Dø÷iZøN0ȹø¨占Á蠓wJD¿¾2ҹt¢*øι싎iIh\\9ƕ萺杅ḯ­µyl*ȈΗ晠ܗø긒W³⿵ޛ3ٰʡ\"6囮[¬ʗ\r­*\$¶Ƨ¾nzxƹ\r켪3ףpޓﻶ:(p\\;ԋmz¢ü§9󜐑ü8NÁj2½«ΜrɈH&²(úÁ7i۫£ ¤c¤e򞽧t̌2:SH󈠃/)xހ饴ri9¥½õ뜸π˯yҷ½°Vī^Wڦ­¬kZ晗l·ʣ4ֈƋª¶À¬𜜅Ȼ0¹pDi-T澚û0l°%=Á Ж˃9(5𜮙\nn,4\0菡}܃.°öRs\02B\\ۢ1S±\0003,ԘPHJsp夓K CA!°2*WԱڲ\$䫙¦^\n1´򺅃 Iv¤\\䜲ɛ .*A°E(d±ᰃb꜂܄ƹ Dh&­ª?ĝH°sQ2x~nÁJT2ù&㠥R½GґTwꝑ»õP⣜\ )6¦��򳅨\\3¨\0R	À'\r+*;Rퟢ�!ћͧ~­%t< 簜K#桚񬟌ퟰ�³٬Ā®&ᜤ	Á½`CXӆ0֭弻³ĺM騉皜G䑡&3 D<!萲3ÿh¤J©e ڰhᑜr¡mퟹ�¸£´ʎ؈l7¡®vꗉ宋´Á-ӵ֧ey\rEJ\ni*¼\$@ڒU0,\$U¿E¦Ԕªu)@(tΙSJkᰡ~­ए`̾¯\nû#\rp9jɹܝ&Nc(rTQUª½S·ځ\08n`«yb¤ŖL܏5򞑾x⁢±f䴒☚+\"щ{kMț\r%ƌ[	¤e􎡔1! 迭³Ԯ©F@«b)R£72\nW¨±L²ܜҮtdի휜0wglø0n@򪉢թ퍫\nA§M5n윤E³ױNۡl©ݒז쥪1 Aܻºú÷ݫ񲮩FB÷Ϲol,muNx-͟ ֤C( f遬\r1p[9x(i´BҖ²ۺQlüº8Cԉ´©XU Tb£݉ݠp+V\0;Cb΀X񫏒s＝H÷қ᫋x¬G*􆏝·awnú!Ŷ򢛐mS�IލK˾/ӥ7޹eeNɲªS«/;d偆>}l~Ϫ ¨%^´f瘢pڜDE·t\nx=ëЎ*dºꄰTºüûj2ɪ\n ɠ,e=M84��aj@sԤnf©ݜn\rd¼0ޭ��%ԓ혞~	Ҩ<֐ˋAH¿G8񙿝΃\$z«𻶻²u2*ࡏÀ>»(wK.bP{oý´«zµ#낲ö8=ɋ8>ª¤³A,°e°À+샨§xõ*áҭb=m,aìzkWõ,mJi抧᷁+轰°[¯ÿ.RʳKùǛ䘧ݚZL˧2`̜(vZ¡ܝÀ¶蜤׹,儿H±֖NxX��¨\$󬍍*\nѣ\$<qÿşh!¿¹S⃀xsA!:´K¥Á}Á²ù¬£RþA2k·Xp\n<÷þ¦ý묬§ٳ¯ø¦țVV¬}£g&Yݍ!+󻼸YǳYE3r³َ񆛃�¦Ź¢ճϫkþø°֛£«ϗt÷Uø­)û[ý߁ص´«l確Dø+Ϗ _o㌤h140֡ʰø¯b䋘㬒 öþ鄻lGª#ª©ꎅ¦©켕d涉K«ꂷެค@º®O\0HŚퟢ�6\rۂ©ܜ\cg\0ö㫲BĪeМn	zr!nWz& {H𧜤X  w@Ҹ뎄Gr*넝H姰#Į¦Ԝndü÷,􏥗,ü;g~¯\0У̅²E\r։`𒥅Ү ]`ʌЛ%&Юm°ý\r➅%4Sv𣜮 fH\$%됌-£­ƑqB⭦ À-􎣲§&Àّ̝ 腱h\r񬝠®s ЇѨ䋷±n#±ڭઅ¯Fr礬&dÀؙ庬F6¸Á\" |¿§¢s@ߚ±®庌)0rpڏ\0X\0¤٨|DL<!°��D¶{.B<Eª0nB(|\r\n잩͠h³!֪r\$§(^ª~螂/pq²̂¨ŏ𺬜\µ¨#RRΎ%뤍dЈjċ` 􋮌­ V哅 bSd§iEøﯨ´r<i/k\$-\$o¼+ƅκlҞO³&evƒ¼iҪMPA'u'Ό( M(h/+«򗄾So·.n·.𮔸쪨(\"­À§hö&p¨/˯1D̊窥¨¸E螦⦀,'l\$/.,Ĥ¨WbbO3󂳳H :J`!.ªÀû¥ ,FÀѷ(Ȕ¿³û1l峠֒²Ţq¢X\rÀ®~R鰱`®Ҟ󮙪互¨ùrJ´·%Lϫn¸\"ø\r¦΍H!qb¾2〈±%ӞΓ¨Wj#9ӔObE.I:6Á7\0˶+¤%°.Ȓޅ³a7E8VS忇(DG¨ӳB륻򬹔/<´ú¥À\r 쇴>ûMÀ°@¶¾H DsЋ°Z[tH£Enx(ퟲ� x񏻀¯þGkjW>̂ڣT/8®c8鑰˨_ԉIGII!¥ퟨ�Ed˅´^td鴨 DV!C渎¥\r­´b3©!3↎@ٳ3N}⚂󳐉ϳ俳0ڜM(꾂ʽ䜜Ѵꂦ fˢI\r®󳳷 XԜ"tdά\nbtNO`P⻔­ܕҭÀԎ¯\$\nߤZѭ5U5WUµ^hoýঈtِM/5K4Ej³KQ&53GXXx)Ҽ5D\rûV��r¢5b܀\\J\">§豓\r[-¦ʄuÀ\rҢ§é00󙵈ˢ·k{\nµģµޜr³^·|赜»U埮ɕ~YtӜrIÀ䏳R 󎳺ҵePMS谔µwW¯XȲ򄨲¤KOUܠ;Uõ\n OY降Q,M[\0÷_ªD͈W ¾J*윲g(]ਜr\"ZC©6uꏫµY󎈓Y6ô0ªqõ(ٳ8}󕳁X3T h9j¶jইõMt吊bqMP5>ퟣ�©Yk%&\\1d¢؅4À µYnʌ휤<¥U]Ӊ1mbֶ^ҵ ꒅ\"NV韰¶밵±eMڞכW霢䩑\n ˜nf7\nׅ2´õr8=Ek7tVµ7P¦¶Lɭa6򕔲v@'6i௪&>±☻­㠒ÿa	\0pڨ(µJѫ)«\\¿ªnû򄬒m\0¼¨2��qJö­P��±fjü"[\0¨·¢X,<\\⌷淫md徇⌠ѳ%o°´mnש,ׄ攇²\r4¶¸\r±Ό¸׭EH]¦üֈW­M0D徏ˁKø¸´༦؞ܗ\r>ԭz]2sxDd[stS¢¶\0Qf-K`­¢t؎wT¯9暀ɸ\nB£9 Nb㼚BþI5oׯJ񰀏JNd勜rhލÖ2\"ฦHCݍ:øý9Yn16ƴzr+z±ùþ\\÷��±T ö򠷀Y2lQ<2O+¥%ͮӃhù0Aޱ¸Ú2R¦À1£/¯hH\r¨XȡNB&§ č@֛xʮ¥ꖢ8&Lږ͜vై*j¤ۚGH刜\ٮ	²¶&sۓ\0Q \\\"袠°	ĜrBsɷ	١BN`7§Co(كਜnè¨19̪E 񓅓U0Uº t'|m°޿h[¢\$.#ɵ	 剰โ��ꄀ|§{Àʐ\0x��w¢%¤EsBd¿§CU~O׷Ѕ❄ԃ¨Z3¨¥1¦¥{©eLY¡ڐ¢\\(*R` 	জnΈº̑CFȪ¹¹ੜ¬ڰX|`N¨¾\$[@͕¢అ¦¶ڥ`Zd\"\\\"¢£)«I:贚쯄拜0[²¨ű-© g�®*`hu%£,¬㉵7ī²H󵂭¤6޽®ºN֍³\$»MµUYf&1ùÀe]pz¥§ډ¤ŭ¶G/£ ºw ܡ\\#5¥4I¥d¹E¨q妄÷Ѭk縼ګ¥qDbz?§º>ú¾:[茒ƬZ°X®:¹·ښǪ߷5	¶Y¾0 ©­¯\$\0C¢dSg¸됂 {@\n`	ÀüC ¢·»Mºµ⌻²# t}xΎ÷º{º۰)껃ʆKZޏj0PFYB䰆k0<ھʄ<JEg\rõ.2ü8镀*εfkª̙JD숉4TDU76ɯ´诀·K+×öJ®ºÂ퀓=ܗIOD³85MNº\$R􏜰ø5¨\r๟𪏜셜񏉫ϳN笣ҥy\\��qUБû ª\n@¨ۺð¬¨P۱«7ԽN\rýR{*qmݜ$\0RהťqЌÈ+U@ނ¤煏f*CˬºMC䠟 腼򽋵Nꦔⵙ¦C׻© ¸ܜWÅe&_X_؍h嗂Ƃ3ÀۥܟFW£û|Gޛ'ś¯łÀ°ٕV У^\r猦GR¾P±݆g¢ûYi û¥Ǻ\n⨞+ߞ/¨¼¥½\\6蟢¼dmhע@q폍Ձh֩,J­חǣm÷em]ӏeϫZb0ߥþY񝹭臦؞e¹B;¹ӪOɀwapDWûɜӻ\0À-2/bN¬sֽ޾RaϮh&qt\n\"՚iöRmühzϥø܆S7µНPP򤖤✺B§╳m¶­Y dü޲7}3?*tú򩏬Tڽ~佣ý¬֞ǉڳ;T²L޵*	񾣵A¾sx-7÷f5`أ\"NӢ÷¯Gõ@ܥü[︁¤̳¸-§M6§£qq he5\0ҢÀ±ú*ࢸISܒɜFή9}ýpӭøý`{ý±ɖkP0T<©Z9䰒<՚\r­;!Ögº\r\nKԋ\n\0Á°*½\nb7(À_¸@,\rÀ]K+\0ɿp C\\Ѣ,0¬^§º©@;X\r𿃜$\rj+ö/´¬Bö搠½ù¨J{\"aͶ䉜¹|壜n\0»ܜ5Љ156ÿ .ݛد\0d萲8Y瓎:!ј²=ºÀX.²uCªö!Sº¸opӂݼ۷¸­ů¡Rh­\\hE=úy:< :u³󲵸0si¦TsBۀ\$ ͒逇u	ȑº¦.􁂔0M\\/ꀤ+ƃ\n¡=Ԍ°dūA¢¸¢)\r@@¨3ٸ.eZa|.ⷝYkУÀ񖧄#¨Y򕀘q=M¡ﴴB AM¤¯dU\"Hw4>¬8¨²Ã¸?e_`ЅX:ā9ø��ФGy6½ÆXr¡l÷1¡½ػB¢Å9Rz©õhB{\0륞íⰩ%D5F\"\"ڜʃúiĠˆٮAf¨ \"tDZ\"_֜$ª!/Dᚆ𕿵´٦¡̀F,25ɪT롗y\0N¼x\r癬¦#ƅq\n͈B2\n웠6·Ĵӗ!/\n󃔙Q¸½*®;)bR¸Z0\0ăDo˞48À´µХ\n㦓%\\úPIk(0Áu/G²Ƙ¹¼\\˽ 4FpGû_÷G?)gȯtº[v֜0°¸?bÀ;ªˠ(یඎNS)\n㸽萫@ꜷjú0,𱃅z­>0Gc𣌅VX􃑱۰ʘ%ÀÁQ+ø鯆FõȩܶоQ-㣝ڇl¡³¤w̺5Gꂀ(hcӗHõǲ?Nbþ@ɟ¨öǸ°3U`rwª©ԒUÔ��ԽÀl#򵏬ÿ䨉8¥E\"O6\n±e£`\\hKfV/зPaYK珌ý 鏠x	Oj󛏲7¥F;´ꁂ»꣭̒¼>愐¦²V\rĖļ©'Jµz«¼#PB䄒Y5\0NC¤^\n~LrRԛ̟Rì񧀥Z\0x^»i<Q㯩ӥ@ʐfB²Hfʞ{%Pܢ\"½ø@ªþ)򒈑DE(iM2S*y򓁜"ⱊe̒1«ט\n4`ʩ>¦Q*¦܁y°n¥T䵔⤔Ѿ%+W²XK£Q¡[ʔଁPYy#D٬D<«FLú³ՀÁ6']Ƌû\rFĠ±!%\n0cдÀ˩%c8WrpG.TDo¾UL2ت鼜$¬:灘t5ƘY℉p#񠲞^\nꇄ:#Dú@ֱ\r*ȄK7\0¸CC£xBhɅnK蜬1\"õ*y[ᣡ󗙢ٙ©ʕ°l_¢/öx˜0ɚ5Кǿ4\0005Jƨ\"2%Y¦a®a1SûO4ʥniøPߴqʽ6¤Ķ㱃\n@PjUú\0µ`r;¹H´¢:÷₰¶¨4 _w*ø@F@%¸s[dץ��Ӣh¿\0↉±P\r \\iÀJ§99P9Ξs.␈29©\nNj#,Àڂ𵁈퍩ÿB¦³\ni%~¸§:9ώX\reШ8³½+9Áµ⸁*ـW2᎐ba璞Sż𕲄蜲³¬Ŧpꉮ̜\(/	Lfʰ򙧤X#8ZJăHʂ+PҭI1xɈ¢36΢w\rӁ[x3ý>\rTObᾳə²0ꅎjA8;أј¤³˚ªPdqRJҜ"(x¡hµ*ĳ	T¦顖㖌®Yƌƫ\$ÀZ9ĸ1̚XJ)ak8fDC𹶀ႩMꞨH§ͣМBº̓?i¼TAPܭ^0´PÀµaf/ύP0͍H)\"¡dU@¹r1\\т\rٯH| ǅɨ׃8@?PZ,A>®ʺE(&¿e͞]勑\$¸吪Z¡}a¿¤̙:P¹w:Ĩ袚ʡ8°´«­ஒ@9\$ޕ£(K\"þŦ͒@2璜$P°<ǒº\0õ灦JtUXP\"-A𔉦Ykֲ󑶖4σ\n«\0¶½ 2ý~ĳ_ɾ\0÷N5¼Ҝ葯 ӀIɻi¸¦ĖefkF<ǖrE쬎6%?¨Ij;'S)MÁ§4)͎.~艚ù鯜0JӔõ3©㑺z	?õ§m1¡ªºq	cQHܯyL\"Oυ0|c\$Pʜ"ϰŲ0eLm#dpx.uA¨^邘76¬qnۗBøn擩ZvR@節*㌁qƒÿ)��Iµ¡jIғ53¤鏪ꊏ8ںׄx9	LqЌČOAڈA\0001¢ª%!1-⷗Ҏ%#!5+³¥®¡÷!vue(¨Bp¸\nKůنУ׆\\۩σ朰^À\$, |Z҅(R+kܮ++ژVʇ¤{/𔍼֍¦êÓ¢©°\$仈дꌀy쉖t䃠+¡Sњ¤(u x\"HC·J俠v8J÷P Q\0ùV1Àᣃ '_ᜮº4%ǥ\nza_²ÐDD{¬+\$Szʖ? l¬ʍ«¨2z´!=ÁODЫޛ񢜰鋊Įʹj+ª(Ҕ5讙⫣ZF֭=Aº®­Uך£𰩆Cֈ˪ІǞ׾ƶ.­8+Rx[¬ºˇزŦ·AuޡI8䬎3߁®Ġ'	𩎞fÿஊʈT¢X11¤ø&3춪	򐦆@|O`b®g\0»>ϖxkkMD֑\n¬µ񨁧ѸaÀy\$tÀȆ`\"̵¿𲉵6| `&´À:TŁ\n­˜¥ ©pjRù҉*瑦¨±£aN定柚 q⴩G9\0¿±쏥(İ=Jú dG�9rժ,QpثkZ¡\$׉+(ǵ̅{2휟mǋ8¬e¯À鮵¦®\\6Ŋ¶\${X֋\$·£#kUڭ+v涅¯m׮تvO艒!Adt£_/´(6õ1ڕ­񭖚[㌚¦¼ܮ\$øTαhֈd܍Xøퟀ�/7ꠡB¢ 䗭\$À®Urɾb*)̶ZޘnbĜnª搝ESΝpoe¶p\\¸¢D ¨EͣÁ,¤T~ꮅP觭)aº=óR��<rõ6gHE-t»봺R�ZtF+m[¸ҮuϺד7w÷]`ݠ-®w«¹Ұѡ¯أoۋśDM°ýݛe񁲱6³HҢȘ!*teh킸^蟛ʔ¹Iɍׄ\"DA嘜$\0oH̜ApúEٚL¢}\"öö:󏝼९6藼=n¥ª뇦¶cퟹ�§J]A5cHø8󳞶-«¾⭉O˖BV¥#д򀠝Ӓ\rý -¼	؋BdG^��À.·𪅬ö˜$\$(q鰼9(h{\n4a7B܅P\0n@-hɯW׀¢¼ `Á+^jĠdΎ9cP򱱚Ȝ"ʌ憜\ʂЙÁ±!µ°\".ڤ¿¾Ԅµ¢E<կz}±(¶XD.6?Nxk*,)ˬÁW§9	j\\I恎(J¸歀;ܱ¯nIxԃïਜrI[:ú¬ˈH5/vBuPfuퟄ�«!4³xl♌2ћ¼³^ 읧\0¤ً_qø°~4Iя\"�𜄺Ӣ\\\"­_£rȔ¤§G\"Àba{OªߒڶղqK\0\$úmӢŐퟸ�t@)U𣰮Пpj򣽶Ȉ¼,9ʄꔪT~݌§½dѻ𐋃gÀªPɁLýª¼Fû2ߺP*,uWѻ*Z¶ϺUpUi\0d]Ͽ\rGw\n@`М¸©k!q֧䢧E򈈅ࣀ©ü]y2sÿǥ¿򥎘Ü"ÁÜ\ÿO?üz+¶Դ¢;uzЁ0d7±þFˤʐ<dɶ2uι❂W\$y9ý¨\0P܀dÀ,ȭöÀ·[悆՟񃨼BQ §ᐵҙɥøة<r\0®t;2û9Tª=@珳:䖉ú񌏡v˷©X@WoN Wú\$DD7ø諾ۖ埖:(ٶퟳ�/©²\rAƠ\nź3|¹٘ªz^ev/۹¡؞5Gµ�B¶ÿm`À¼vl֮箾R>\nYTcĔb¬·P\\rPcߣx7c¥õD={*dr8婯©w뎁܆=R6_ƜNy¥¾`&·ᔜ$H°ԇ4Y|»ӯ˙³ƀ饒¤೎­ù¬\"y֛o%Ggҽø{ϟº.rc¾\\Uε⮃ȩ\"®)L׌ˉߟk¿؜r¯üi(폹-´府\dܚ&rö|妦îАޥM韎Iژbc0Ml郾°яZ9&��¸µ¼HKX萎饷AauRş¤񷩉=ºKY򴗄e¸ǜ\rވ1¥D¼\"OmuLoŃ\\m!sˆT\0贺¥|¢uKµ)􈨲Z2¸XoM|C婐h/踴➁!FԨ(튱\0HSz3򴜆ݨfüJشޣݸcbٜ$¤囩Rꠅ i޺.\0ü䁿ଂ[6Ǆ¨ºHֆòR[Àe<q³®ɻ©ꕱú§԰Ktf`/À»ÿԤz\rݫ-Mi荢LJ®,±늃ڔԠõ±f°ӧ[¯ֶ¥ڲ,-Yڇ]!y nTŗʐBl·ބ\$zUcu¡\$¦j>72լ4.Ԧ!£푶󄫬F೗硜͛\n6ÁSo8뚍)®Leٴ¯ª\r,쥽»\rù¦-h#ºM´*=O¶՜n¶#DÁ«ꑄ+a䏂»-Ss1+[@(䍡3|싐r¨F拄=iJ¹£ڲ&ѳ\rO휤!lЕ®D삀䅂tɾiÀ¸Rq;͉@P¡¶䗅P>?=rӗnCs,À;B௪üMĭ¬}­旹ÁM¤𿋹-۰ݾy,g6 qㄱ\"¸q3|d;좔Љ늫@鎶?ƶ@	À¸ERU쐠û&I\\}-X º§gG4°]g6Ԃ>諷\0ͺº³\"jWP仱gÀO\\3̝ø\n𒓜rҠ,߄ߢ9ǜ0	ϓ}jCڷԌ缉H¼6¿ý°팲TFÿö±­!·S+r씔􌘒c3ÁB@XdT6&÷ÁǎGƧn8±Ƒz|)ʖû^霁	©-\08��«8b»7ʭ/@֐>VÁ¬¶+u\0B½zl%5׶ᾃOJǡֲ@øx¤h䷠¼!18SR\0Q*o÷8¾n*?_藘\nxΆ섔ӹ¨þ¡坜ün®4,7oޞȎ]´dºqᖱ#e¡(v¬²올½¸ms.8÷TŗgB>`ό뀸ޕ\\­y䀮\nNq´𱞆E=h4<Ӿ\$ȚsA񢇙u3ʂ±溧@ᵆ2A=³ќ\B-uMёDnWߤ񗖒֔lrRÀ²뒞ܕgȜr¤§õӻF뾁ǃ𧕧	Վ匲´µ¥b¡b͞Ф§Y/|nr\rS䓫*øAO¦Ғ)ƻsÁԔ\$w\$)Ei¾鰠Q 1ݔª됆D3%⃯ ¦˪2rېLs,;޵g+th°b񍶌󈸥ýŲC|Z®眡ǎ*ݐ*5;ۡùU¯A²{І¤��iKX¢ڔD䣢2CJYõ²ֹ>zS²CU£õc§ûõ꒏RԾ¡0)ثҺ:-IN¯£|eχ;ۢ؈\$,p0��_L.Ō\$ċ򶱑SܖF1&U°˨	nxt§¢摤ù¨ʥ±õ䯷c񶟒Ĳ·fѭeĪ蜰=õ㳮¡ÁbsCO4״~§h(¢o}OU򭛮_hԬpԖԑ򫸜�\$?!Ђw³GĹʇ즸¦÷íV?{XS~¦_1طŢqU{#x\nN \$8EÀqݾ¥7 !Ài!񥙮öqi\r\$髗𨞣��׃Ld	ғϜtpA9öᯝ[úsߜ0ضVv,ÿõԂ±¥¡'ݠ꿃shctH\"鋾}n¦峥'®ü뒝»^§3ª¢ğM£%կø¤郄疏͜ٿ£«݅뜮£rpT¼Lퟧ�e񑺊õA²j交|[ᛎ⽌J򺆲4l N±u4]l´M³H&µ¤\$䜰YRÀqzWĘ@ܿ±¢�¡'t|·¿.ºҏޠ(񉼄2¤_5)%¢GЃm\0P\nﭨo@͓>½³xB\"񒅭|ù2\$},3LYXgo¡\$߶ <Ӿ¿IE\"`׺¨4ᑿg©8^£]\n¡𺸛qVTԣҭ°mù7&ғĤÂmӿ&À¨ÀQzÑ½·³ű퟈ԫöyO禽«\r٣.¢¸¶®@¾JW&߱ם50	ԵÀG\n½³�Ɔ­{\0\r²m@ @ P  x4i4+@\0,͚\\C1ӎ蜮Lꅓ>n\0ÿ⢉ #Ǟ鄒#@]/4JR IR²ﰨ¹< ǯ򡪄?)Mv�X|@v\0aº眢­τkø¨魂yA[|À7\r\$쀚󚇭Rഹ>ªϡCErL	öƓrӏªe R/̢J·侓%Xo4ᵒdU\"¦QrºI꺑D岕¤ШQQM}ѿ{)ة­\",fП(,½6ђ+c¯®&S񑹑ݾO톰ᐃº¯́ڇ©Ĺ´Vþ񚍝񗀱蛙<H/ʾԜ0^C ³T҅õq_gPÁpeþ@BÁבÀ麇끠pȿº)Xߣ\0§õߔ񀻼`\0vü§ٌ³Q¨«Ҁ~ 翡ú¿펅TƁW򿖒ûÿ¿΋��®ú߬ÿO÷>⌸&޿CLݑ¦ÿ(¯󏨁ÿ§Ǐ2û서r%;૦4û¨_O;ø5³ö`@<ý²¼/ܷ̟	6'AY«ÿ\"¶ýaS°¿z£kp®4+h@Zÿô 8>®ý⁯ߔLÿû¿¥Àj̳ùÀÿ\rJ؇m±À\0L\0c忂³ümªN(¯÷ ڔp#ü >Àþ©A[?[ûſ·HkＨ\n¡t¿p:G¬ϵ>¾Tʻ*¨ح¡tÀԿٗPÀúX몥N4܋¦0\n\$ø:H,¦H}°A¾©c親ün?㫏¢\nþʻ鏙\0Zú°v©AB£邆`o¡ª8_Ғ--nT#DIs1Ν\0VPM\0Vÿr¬¿0\$Bi`TdX|e\08\\𷩬_º°K¿3(.cÁ\\°d2ێ璼򵨜\£	4ЂNÀ(|gþ|¡N&,³񰹡܍(À²߸bP½1Y'!Ą \0fxҋ땜0䱂[,½>礩&攰/a\rLCÁbE¹§	7紸֢𨫈Ҽb�0¹T\"þ.Àř5s˒D¹Sg땅8¹Rh*4¢}»¦<-9B\$¬Ӟd9B\$婫H8cj\\`🻒扉#`򢚀hHΨp \$0`1W\n%NZ\\#߂bٙ¦P%m7l\"¢d¹��¼!أ/ş̜¤,ͪ¿­J#0µc儝 -(򐹆6𠷬~𜲜0B0À:CA霜pϑ[򟎥ШЌ®JG尉B\"8¼PB*%ʼ#BF72ʂ¤ö闂5Bp	t&ퟧ�0bø񞴼\$퀶¥K¡V\0G	󌭙 ");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("v0F£©̐==ΆS	Њ_6MƳ訲:ECI´ʯ:CXc\r昄J(:=E¦a28¡x𸿔ħi°SANNù𸳅NB጖l0瓉˕l(D|҄犐¦À>E㩶yHch䂭3Eb堸b½߰EÁpÿ9.̾\n?Kb±iw|ȠǷd.¼x8EN¦㡔͒23©ᜲљ̨y6GFmY8o7\n\r³0¤÷\0Dbcӡ¾Q7Шd8Á읅~¬N)ùEг`􎳟𠆓)Џ闋·烯º<xƹo»ԥµÁ쐳n«®2»!r¼:;㫂9CȨ®Ün<񍈠ȳ¯b蜜?`4\r#`Ȕ<¯Beィ¤N ܣ\r.D`¬«j괿p閎ar°ø㢺÷>򸓜$ɣ ¾1ɣ ¡c Ꝅ껮7ÀÂ¡Aퟹ�RLi\r1À¾ø!£(攋j´®+ª62ÀXʸ+ʔ⠤.\r͘Ζ􃎖!x¼厃hù'㢈6S𜰒񏒜n¼1(W0㜇7q뺎Å:68n+䕴5_(®s \r㔪/m6PԀÅQĹ\n¨V-Á󜢦.:劍ϸweα½|؇³XЗ]µݙ XÁe店⼠7⻚1�f٣u£jѴZ{p\\AUˊ<õk၀¼ɍà@}&L7U°wuYhԲ¸Ȁûu  P෋Ah茲°޳ÛꞧXEͅZ]­lဍplv©栁ÁHWԹ>Y-øY诫ªÁhC [*ûF㭅#~!Р��0Pf ·¶¡\Ɏ^åB<\\½fޱšН㦯¦Oퟱ�\jF¨jZ£1«\\:ƴ>N¹¯XaFÁÀ³²ퟍ�fh{\"s\n׶4ܸҖ¼?ĸܞp\"띰񈸜\ڥ(¸PNµ챛g¸Árÿ&}Phʠ¡ÀW٭*ޭr_sːh༠Мnۋïmõ¿¥êӣ§¡.Á\0@鈰dW ²\$Һ°Q۽Tl0 ¾ÈdH멚ۏٟÀ)PӜ؈gཇUþªB襜rt:՜0)\"Ŵ��ۇ[(DøO\nR8!Ƭ֚𜬁üV¨4 hޣSq<=ëʧK±]®ਏ]⽹0°'坢øwA<НѡÁ~򗆗惄|A´2Әٕ2੹Ŋ=¡p)«\0P	sµn3f\0¢F·ºvҌG®ÁI@饤+Àö_I`¶̴Ŝr. N²ºˋI[ʖSJ򅩾aUfSzû«M§􄋥¬·\"Q|9¨Bc§aÁq\0©8#Ҽa³:z1Ufª·>¹l¹Ӏe5#U@iUG©n¨%Ұs¦˻gxL´pP?B猊Q\\bÿ龒Q=7:¸¯ݡQº\r:t쥎:y(Šד\nۤ)¹В\nÁX; 쎑꓃aA¬\r᝱P¨GHù!¡ ¢@ȹ\n\nAl~H úªV\nsªɕ«ƯբBr£ªö­²߻3\rP¿%¢ф\r}b/Α\$5§P냤\"w̂_玉UէAt뤴夅鞑ĥUɎĖjÁ�vh졄4)¹㌫ª)<j^<L󠴕* õBg 됦誮ʖ譿ܵӜ	9O\$´طzyM3\\9ܨ.o¶̐븅(i几ē7	tߚ靭&¢\nj!\rÀyyıg𒶝«ܹRԷ\"𦝧·~À�)TZ0E9M噚tXe!ݦ@终¬yl	8;¦R{븇ĮÁeثUL񧂝F²1ýø渐E5-	П!Է󠛲JˁÁ;HR²鑇¹8p痲݇@£0,ծpsK0\r¿4¢\$sJ¾ôɄZ©Չ¢'\$cLRMpY&ü½ͩ珺3G͕zҚJ%Á̙Pܭ[ɯx糔¾{p¶§zCֶµ¥ӺV'\\KJa¨Í&º°£Ӿ\"ಥo^Q+h^ₐiT𱪏R䬫,5[ݘ\$¹·)¬��U`£SˠZ^𼏀r½=Џ÷n登TU	1HykǴ+\0vᄿ\r	<ƙ챪G­tƪ3%kYܲT*ݟ|\"CülhE§(Ȝ\rør׻ܘ񰥲׾لܟ.6и軣ürBjO'ۜ¥¥Ͼ\$¤Ԡ^6̹#¸¨§洝Xþ¥mh8:껣þ0øל;دԉ·¿¹ػ䜜'( ú'+򽯌·°^]­±NѶ¹磇,붰׃OϏiϖ©>·޼S\\\!س*tl`÷u\0p'跅P࿹·bs{Àv®{·ü7\"{ۆr(¿^漝E÷úÿ빞gҜ/¡øUĹg¶Ȕ`ĜnL\n)À(Aúa𜢅 瘉Á&PøO\n師0(M&©FJ'ڈ! 0<ƹ¥*̼솪珚�n/bö®Ԍ¹.좩o\0ΊdnΩùi:RΫP2ꭵ\0/v쏘÷𜸆ʳψ讜"񮪶0õ0ö¬©�ːgj𰜤񮩄0}°	=MƂ0n/p毴쐀÷°¨𮒌̽g\0Щo\n0ȷ\rF¶鋀 b¾i¶ï}\n°̯	NQ°'𸲐FaЊLõ鏰ЄƜrÀ͜rֶ0Ň񧌰¬ɤ	oepݓ°4DМʐ¦q(~À̌ ꜲE°ۑprùQVFHl£Kj¦¿䎦­j!͈`_bh\r1 ºn!͚Ɏ­z°¡𥌍\\«¬\r튃`V_kڃ\"\\ׂ'V«\0ʾ`ACúÀ±Ϙ¦VƠ\r%¢Ŭ¦\r񢎃k@NÀ°üB񭚙¯ ·!Ȝn\0Z6°\$d ,%६a툗\n#¢S\$!\$@¶ݏ2±I\$r{!±°J2HچM\\ɇhb,'||cj~gв`¼ļº\$ºĂ+ꁱ𜅿ǟÀ٠<ʌ¨ќ$♥-FDªdL焳 ª\n@bVf辻2_(봌Đ¿²<%@ڜ,\"꤄ÀNer��`Ď¤Z¾4ň'ld9-򣠤󅖅ඖ㪶놣㶇 ¶Ε͐f ֿ@܆&B\$嶌(𚦄߳278I ࿠P\rk\\§2`¶\rdLb@Eö2`P( B'㈋¶º0²& ��§:®ªdB屲^؉*\r\0c<K|ݵsZ¾`ºÀÀO3굽@嵀C>@*	=\0N<g¿6s67Sm7u?	{<&L®3~DĪ\rŚ¯x¹�,rnů 咏O\0o{0kΝ3>m1\0I@ԹT34+ԙ@eGFMCɜrE3˅tm!ۣ1ÁD @H(Ӯ Æ<g,V`R]@úɳCr7s~ŇI󩀜0v5\rVߧ¬ ¤ Έ£PÀԜr✤<bЅ%(DdPWĮЌb،fO 渜0轠܋┬b &vj4µLS¼¨ִԶ5&dsF M󴌘Ӝ".Hˍ0󓱵L³\"/J`򻇾§ʸǐYu*\"U.I53Q­3Q��g 5sຎ&jьյ٭ЪGQMTmGBtl-cù*±þ\r«Z7Ե󪨳/RUV·𴪂Nˈ¸Æ󣪅Ԋ੨Lk÷.©´Ĵ젩¾©rYiթ-Sµ3͜\T돍^­G>ZQjԇ\"¤¬i֍sS㓜$Ib	f²⑵榈´庄ꚓB|i¢ Y¦ฉvʣ锄ª4`.˞󈅍_ռuÀUʺ`ZJ	e纝@Ce�\"m󢒄6ԯJR¿֌T?ԣXMZ܍ІͲp蒏¶ªQv¯jÿjV¶{¶¼Ń\rµշTʞª ú�Pö¿]\rӿQAÀ脇Ͳ񾠓V)Ji£ܭN99fl JmͲ;u¨@<FþѠ¾ejҎĦI<+CW@ퟅ�瀿Zlѱɼ2ũFý7`KG~L&+NٴWH飑w	փ򬀒s'gɣq+L麢iz«ƊŢА.ЊǺW²ǠùzdW¦۷¹(y)v݅4,\0Ԍ\"d¢¤\$B㻲!)1U5bp#Žm=׈@wĉP\0䜲쌢·`O|놎ö	ɍüŵûY��öEיOu_§\n`F`ȇ}M®#1႗¬f쪴աµ§  ¿z൚cû³ xfӸkZR¯s2ʂ-§Z2­+ʷ¯(峕õcD򑷊옝X!͵ø&-vPИ±\0'L øLÂ¹o	݋��Ӝr@ِõ\rxF׼E̈­鹿ㄬ®ü=5N֜¸?7ùN˃©w`بX«98 ̘ø¯q¬£z㏤%6̂tͯ䌬돌úͬ¾ʬ܋aN~όÀ۬ú,ÿ'퇀M\rf9£w!x÷x[ϑ؇8;xAù-I̦5\$D\$ö¼³%ظѬÁȂ´À]¤õ&o-39֌ù½zü§y6¹;u¹zZ 葸ÿ_ɐx\0D?X7«y±OY.#38 ǀeQ¨=؀*Gwm ³ڃYù ÀڝYOY¨F¨횙)z#\$e)/z?£z;ٚ¬^ۺFҚg¤ù ̷¥§`^ڥ¡­¦º#§ر©ú?¸e£M£ڳu̥0¹>ʜ"?ö@חXv\"盔¹¬¦*Ԣ\r6v~ÏV~&ר^gü đٞ'΅f6:-Z~¹O6;zx²;&!۫{9M³ٳd¬ \r,9֭°䷗Ɲ­:Ꜳúٜù㝀睂+¢·]̭[gۇ[s¶[iٝiȱy鸩+|7ͻ7˼w³}¢£EûW°Wk¸|J؁¶剸m¸q xwyj»#³e¼ø(²©¸Àߞþ򳠻蟚 y »M»¸´@«扂°Y(g͚-ÿ©º©䭡¡؊(¥ü@󅋻y£S¼µYȰ@ϥ賞úo9;°꛿��+¯ډ¥;«ÁúZNٯº§ k¼V§·u[񼸝|q¤ON?ɕ	`u¡6|­|X¹¤­س|O측뺏¨ϗY]¬¹c¬À\r¹h͹nΌÁ¬¬덎ϸ'ùꙌ࠿ƜrS.1¿¢USȸ¼Xɫˉz]ɵʜ¤?©ʀC˜r׋\\º­¹ø\$Ϡù̩U̼ˤ|Ѩx'՜،䊼̙eμꍳ痌⒌闌Mι(ۧЬк¤O]{ѾטFD®ՙ}¡yuф߬XL\\Ƙxƈ;U׉WtvĜ\OxWJ9Ȓג5·WiMi[Kf(\0澤ĚҨ¿©´\r숍ġș7¿;ȃƳұ瓶KʦIª\rĜøv\r²V3՛߉±.́ҹ¾ɘ἟ᾙ^2^0߾\$ Qͤ[㿄÷ᜣ徱'^X~t1\"6Lþ+þ¾Aޥᜓ枝剑羟墳Ⳁߕ­õpM>ӭ<´ғKʛ筈ɀ¼T76ٓMfg¨=»ŇPʰP֜r¸龍ö¾¡¥2Sb\$C[ؗ羽ĩޥQ#G`u𰇇wp\rkދezhjӄzi(��«󑄞Ӿؔ=·7³򮾌ÿ4\"ef~񖐮�ÿZ÷U-뢧VµJ¹Z7۶©T£8.<¿RMÿ\$��ߢy5øݵ_෱Θ°핚𒠥i޿Jb©g𵍜Sͫ?ͥ`öឬ+¾ϯ M裡7`ùﭜ0¢_ԭûõ_÷?õF°\0õ¸X崆[²¯J8&~D#Áö{Pش4ܗ½ù\"\0̖Àý§ý@ғ¥\0F ?* ^񯍹寚w됞:𗁾uϳxK͞󷓼¨߯y[Ԟ(斑µ#¦/zr_g·濾\0?1wMR&M¿ù?¬StT]ݴGõ:I·ࢷ)©B v��1珼��Ȣ6½:W{À��=Ȯޚ󸺂!!\0xՔ£÷q&ᨰ}z\"]Ğoz¥Ҫ÷ןʚÁ6¸Ҋ¢P۞[\\ }ûª`S\0ऱHM믷BP°]FT㈕8S5±/Iќr\n ¯0aQ\n >ò­j;=ڬۤA=­p£VL)Xõ\n¦`e\$TƦQJͳ®權Iމ亃ыĄBùbPÀûZ͒¸n«ª°Օ;>_ќn	¾õ됗̌`ԵM򌂂m³ճwúB\0\\b8¢Mܐ[z&©1ý\0􉡜rT֗ +\\»3ÀPlb4-)%Wd#\nȥrޕ単\"ϡ䨅i11(b`@fҞ´­Sҳj儆bf£}rýDR1´bӗAۯIy\"µWvgC¸IĿJ8z\"P\\i¥\\m~ZR¹¢vB5Ié@x·°-uM\njKՕ°h\$oJϤ!Ȍ\"#p7\0´ P\0D÷\$	 GK4eԚМ$\nG俹3£EAJF4ɂp\0«׆4±²<f@ %q¸<k㷙	̏p\0xӇ(	G>𕀡اƆ9\0TÀ쇂7 - ø⇺<Q #Ý¨Ӈ´û1Ϧtz£ឰ*J=ৃJ>؟ǆ8q¡Хªց	OÀ¢X􆴄э,ÀʂМ"9®p䪆𶋶A'ý,yIFR³TϽ\"÷HÀR!´j#kyFÀ॑¬z£랩ȰG\0p£aJ`C÷iù@T÷|\nIx£K\"­´*¨Tk\$c³򆔡Ah! \"úE\0Odēx򁔋\0T	ö\0ࡆܜnU|#S&		IvL\"䃜$hЈޅA$%%ù/\nP1²{¤褐<ퟖ� 孚R1¤ⶑ¶<@O*\0J@q¹Ԫ#ɟ@ǵ0\$t|]㠻¡ĊA]虍쐡CÀp\\pҤ\0҅7°Ė@9©bmr¶oےC+ٝ¥JrԦü¶\r삩d¤ё­^h߉\\ή gʾ¥̓ה8ހ'HÀfrJқr篣¥¯.¹v½#yR·+©y˖^򹖛F\0᱁]!ɕҞ++ٟˬ©\0<@M-¤2W򢁙R,ce2Ī@\0꒐ £°a0ǜ\PÁO ø`I_2Qs\$´w£¿=:κ\0)̠̋hÁ碜nJ@@ʫ\0ø 6qT¯凴J%N-ºm¤ĥ㮉%*cn䋎綜"\r͑¸򨗻fҁµÁpõMۀI7\0MȾlO4œ	7cͬ\"쟧\0哶ĝ幮´㉲¦񒆋𝕐Ao1F´IĢ*Ɂ<©ý@¾7З˂p,Nŷ: ¨N²m ,xO%蓡ڶ³¨ gz(ЕM´󀉁à	~y˶h\0U:阏ZyA8<2§²𸄊us޾l򆎅𘏜0±0]'>¡݄ɍ:ܪś;°/·Ҵ䬧~3GΖ~ӭ侧c.	þ򶔜0cش'ӻP²\$À\$øЭs³򥼺!@dЏbwӦc¢õ'Ӏ`P\"x􋃐µ螓À0O5´/|㕻:b©R\"û0шkТ`BD\nkP㣩ᴤ^ p6S`ܜ$됦;ηµ?lsśÀ߆gDʧ4Xja	AE%	86b¡:qr\r±]C8ʣÀF\n'ьf_9å(¦*~㩓蛋ɀ(85 Tˏ[þJڍ4Il=°Qܜ$dÀ®h䀚D	-١ü_]ɚHƊk6:·ڲ\\M-̘𲣜rFJ>\n.qeGú5QZ´' ɢ½ہ0Pࣅ¤øö֩rҭt½ҏˎþ<QT¸£3D\\¹ēpOE¦%)77Wt[º􀼇\$F)½5qG0«-ї´v¢`谞*)RrՅ¨=9qE*K\$g	큡吪BT:Kû§!׷H R0?6¤yA)B@:Q8B+J5U]`Ҭ:£𥪥Ip9̀ÿ`KcQúQ.B±LtbªyJ񝅪T饵7ζAmӤ¢Ku:𓪩 5.q%LiFºTr¦Ài©ՋҨz55T%UUډՂ¦µՙ\"\nSխіĸ¨½Ch÷NZ¶UZĨ B괜$Y˖²〵@蔻¯¢ª|	\$\0ÿ\0 oZw2Ҁx2ûk\$Á*I6IҮ ¡I,ƑU4ü\n¢).øQ��I᝙À 茢h\"øf¢ӗ>:Z¥>L¡`nضլ7VLZue¨똺蔆ºB¿¬¥Bº¡Z`;®øJ]򑔀䓸¼«f \nڶ#\$ùjM(¹ޡ¬a­G�+Aý!踌/\0)	Cö\n񗀩4ºᛩ ԒZ®⃠=Ǯ8`²8~ↃhÀ손 °\r	°섭FyX°+ʦ°QSj+X󼕈9-øs¬xؼ꫉Vɣbp쿔o6Hб °³ªȀ.l 8g½YM֗MPÀªU¡·YL߳Pa莈2й©:¶a²`¬Ƥ\0Ǧ겙잙0٘¡¶S-%;/T݂S³Pԥfؚý @߆�´֍*ѱ +[Z:҅QY\0޴늇UY֓/ý¦pkzȈ򀬴𪇃jڪ¥W°״e©JµF荽VBIµ\r£ưFNقֶ*ըͳkڰ§D{Ը`qҲBqµe¥DcښԖÃE©¬n񗤆G E>jú0g´a|¡Sh췛u\$컡��¡밒[WXʘ(q֣¬P¹Ƥזݣ8!°H¸ؖX§Ď­jøʚ��°Q,DUaQ±X0Օ¨À݋GbÁܬBt9-oZüL÷£¥­尋x6&¯¯MyԏsҐ¿脰\"Ս蒂IWU`c÷°ཬ<|¾ķ\"·𶉥r+Rගn\\عÑ][Ѷ&Á¸݈­áӺ셪¹(ړ𔒑À·C'´ '%de,ȜnFCőe9C¹N䐍-6UeȵýCX¶Ж±¹ýܫԒ+º؇˃3BܘڌJ𢨙±攲 ]쎜0P衇t29ϗ(i#aƮ1\"S:ö· ֯F)kٌf��Ъ\0Άӿþլˈշꃊ@얖򄎵鱮e}KmZúۯ幘nZ{G-»÷՚Qº¯ǽŗ¶û6ɸ𙈵ğ؁Չܮր7ߠ կC\0]_ ©ʵù¬«﻽ûGÁWW: fCYk+隢۶·¦µ2S,	ڋ޹\0﯁+þWĚ!¯eþ°2û���k.Oc֨v̮8DeG`ۇöL±õ,d˜"Cʈւ-İ(þp÷퓰±=ټ¶!ýk؆҄¼ｨýъBkr_R¼08a%ۘL	\0醀񉐢¥²񅾄@ל"іϲ,µ0T۲V>ڛȑЂ\"r޷P&3bᐲ昭 xҐ±uW~\"ÿ*舞N⨗%7²µþK¡Y^A÷®úʃ辻p£ᮁ\0퟈�.`cŦ+ϊ⇊£¤¸H¿À®E¤¾l@|I#Ac⿂D|+<[c2ܫ*WS<r٣g¸ۅ}>i݀!`f8񀨣¦艑ý=f񜮂粄ѣ£h4+q8\na·Rゖܼ°Rת¿ݭµ\\qڵgXÀ ώ0䘤«`nO pȮH򃃔jd¡fµߑEuDVbJɦ¿庱\\¤!mɱ?,TIaءT.L],J??ϏFMct!a٧RꆄG𡆹Aõ»rr-pX·\r»򃞜À7ᰦ㘒霰ΐѦ²*\nõ՛HᣤyǺ腬<¹Ağ¹艚+ΖtAú\0B<Ay(fy1Σ§O;p腡¦`璴СM셠*ꆠ5fvy {?©˺yøш^c⍵'8\0±¼ӱ?«gӗ 8BΦp9֏\"zǵrs0º悑!uͳf{ל0£:Á\n@\0ܔÀ£pن6þv.;ຩʢ«ƫ:J>˂魃BϨkR`-ܱΰaw清j©÷Ár8¸\0\\Á\\¸Uhm ý(mՈ3̴�Á汜0ùNVh³Hy	»5㍍e\\g½\n牐:Sj¦ۡٶ迼¯ўx󦌌ژ¿;nfͶc󱛦\$f𦬯;i³ק0%yΞ¾t쯹÷gU̳¬de:ÌhО@砽1ϭ#ю󷀌ߏ𰺇Μ$򨦗m6鶽ْҋX'¥Iש\\QºY¸4k-.躹zш݈¿¦]榸减ֿ3ü¿M\0£@z7¢³6¦-DO34ދ\0ΚĹΰt\"Μ"vC\"JfϒʞԺku3MΦ~ú¤ӆ5V Ī/3úӈ@gG}D遾ºBӎq´ٽ]\$鿉õӞ3¨x=_jX٨fk(C]^jٍÁ͆«Օ¡ϣCzȒVÁ=]&\r´A<	浂Àܣ続ٔ®¶״ݠjk7:gͮ4ծ᫓YZq֦tu|hȎZҒ6µ­i〰0 ?鄵骭{-7_:°מtѯ�`Y͘&´靉õlP`:톴 j­{h콐f	˃[by¢ʀoЋB°RS¼B6°À^@'4渱Uۄq}샎ڨX��}¬cƻ@8㲂𬓀	ϐFC°Bܤmv¨P朢ºیöՃS³]ݠEٞϬUѦ�{o(䆐)蜰@*a1GĠ( D4-cؓ󐸝£N|R▍¸°׮8G`e}!}¥ǰ»ܲý@_¸͑nCt9ќ0]»u±»ݾ貧»#Cn p;·%>wu¸ޮ÷û¤ݞꂮ✜ۇݨT÷{¸ݥ¼	程·Jퟵ�iJʶ怏¾=¡û柅÷ٴImۯږ'ɝ¿@⦂{ª򶯵;�;^ضŶ@2篬ûԞN﷟ºMɁ¿r_ܰ˃´` 쨌 y߶緑¹ý뮇7/Áp𥾼ߠ	ø=½]ЯcûᦥxNm£烻¬ௌ·GÎ	p»x¨ýݰy\\3τø'։`r⇇÷]ľ񷈜\7ڴ9¡]Şp{<Z᷅¸q4uμ՛Qۙ൰ýi\$¶@ox񟼐À湐pBU\"\0005 i䎗»¸Cûp´\n��[㜆4¼jЁ6b搄\0&F2~Àù£¼U&}¾½¿ɘ	̄a<溸¶k£=ù񕰲3鋨l_FeF4䱓K	\\ӎld1H\r½ùp!%bG昦̄À'\0ȏ؉'6Àps_ᜤ?0\0~p(H\n1W:9Ս¢¯`溨ǂ腧Bk©ưĆ󝜴¼숅BI@<򥃝¸Àù` ꊹd\\Y@DP?|+!ᗆÀø.:Lev,оq󁈃燺:bY鈀8d>r/)紀ЇΨ·`|鸟:t±!«Á¨?<¯@ø«/¥ S¯P\0ྜ\梠|鳂ﺄVѵw¥땧x°(®²4ǚjD^´¥¦Lý'¼섃[קú°§®骂º[ E¸󠵣°{KZ[s6S1̺%1õc£B4B\n3M`0§;粌³Ю&?¡ꡙAÀI,)𥕬W['ƊITj胾F©¼÷S§ BбPợaþǌuݘπøHԉLS􍮰ՙ`Ȝ"il\r炲룏/��PϝNG􌝰JƘ\n?a롏3@M憦ó־¿,°\"腬b��\r_Ꝣ÷üAᙄ¯̼1ыI,ŝ;B,׺󚂾왥¼J #v'{ߑÀ㔌	wx:\ni°¶³}cÀ°eN®ѯ`!wƜ0ĂRU#ؓý!ܼ`&v¬<¾&�OҫΣ¥sfL9Q҄Bʇɳ䏢Ӡ_+﫪Su>%0©8@l±?L1po.ă&½퉠BÀʅqh¦󭒁z\0±`1់9𜢏衐\$ø¶~~-±.¼*3r?øòÀds\0̵ȏ>z\nș\00 1ľ��³𺔼Sޜ��g霰úKԠd¶١ɮPgº%㖷D��һȵ·)¿񊝜jۗ¿`k»ґQރαüº+Υ>/wbüGwOkÞӟ٧¬-CJ¸左¨¢ºퟗ�0L\r>!ϱ́ҷ݁­õo`9O`σö+!}÷P~E厈cöQ)졣û򇀬̑øÀ¡¯花ĺ_u{³ۋ%\0=󡏎X«߶Cù>\n²|w᝿ƇFŪաϩU٥֏b	N¥Y½»鑯úû)އΗ2ü¢K|㱙y/\0餿Z{韐÷YG¤;õ?Z}T!ްսmN¯«úæ؜"%4aö\"!ޟúºµ\0絯©}»򧜾³뢕}»ڕmõ֗2± ö/tþ%#.јĿseBÿp&}[˟Ƿ㼡ùKýﱸ源\0󡈧¼򿚹,֜0ߟr, >¿ýWӾ﹯־[qýk~®CӋ4۞ûG¯:X÷Gúr\0ɩ⁯÷L%VFLUc¯ޛ䑢þHÿybPڧ#ÿ׉\0пýϬ¹`9ؚ9¿~ﲁ_¼¬0q䵋-م0ࢴϭü¡t`lmꭋÿbƘ; ,= 'S.bʧS¾øCc꫊AR,톘@৅8Z0&옎nc<<ȣퟏ�0(ü+*À3·@&\r¸+Ѓ@h, ö򃜤O¸\0Œ胴+>¬¢bªʰ\r£><]#õ%;N쳳®Ŏ¢ʰ*»0-@®ªL젒>½Yp#Эf0±aª,>»ܠƅР:9o·ퟯ�v¹R)e\0ڢ\\²°Áµ\nr{îXҔøκA*ۇ.Dõº7»¼򣖬ûN¸\rEԷhQK2»ݩ¥½zÀ>P@°°¦	T<ғʽ¡:򟀌°XÁGJ<°GAfõ&ׁ^p㠩Àлû԰`¼:ûퟸ�;U !Х\0½ϣp\r³ ¾:(ø@%2	S¯\$Y«ݳ鯨C֬:O#ςÁL󯯝邧¬k,¯K寯7¥BD0{¡j󠬃j&X2ړ«{¯}Rϸ¤¶Á䷘£À9A끸¶¾0;0õᆑୀ5/<ܧ° ¾NܸE¯ǉ+㐅d¡;ªÀ*n¼&²8/jX°\r>	PϐW>KՏ¢VĈ/¬U\n<°¥\0ٜnIk@º㦃[ȏ¦²#?و㑥񃂨ˮ\0001\0ø¡k蠱T· ©¾낉l¼À£p®¢°Á¤³¬³< .£>혵М0䃻	O¬>k@Bn¾<\"i%>ºzĎ烓񡌺ǳِ!𜲀\"¬㬜r >adං󢕿ڇ3Pׁj3£䰑>;Ӥ¡¿>t6˕2䛂𞾍\r >°º\0䬐®·B諞Oe*Rn¬§y;« 8\0ȓ˕o潰ýӸi¸þ3ʀ2@ʽ࣮¯?x��ۃLÿa¯w\ns÷A²¿x\r[ѡª6clc=¶ʼX0§z/>+ªøW[´o2¸)eHQP鄘YzG4#YDöºp)	ºHúp&⴪@/:	ቔ	­¦aH5둨.A>.­Áa	²út/ =3°BnhD?(\n!Ăús\0؂̄ѦDJ)\0jőĹhDh(􋑯!о®h,=۵±㒴J+¡Sõ±,\"M¸Ŀ´Nѱ¿[;øТ¼+õ±#<워I¤ZğP)ġLJ񗄩쐱\$Įõ¼Q>dO¼v飘/mh8881N:øZ0ZÁ蔠B󕃇q3%°¤@¡\0د\"񁘄	೜0!\\츣h¼v쩢ϑT!dªμV\\2󀓫Ņ\nA+ͽpxȑiD(캨༪öګŕE·̔®¾ B蓷CȿT´晄 eA"ᄈ|©u¼v8Ĕ\0002@8D^ooø÷|Nù��ʊ8[¬ϳĝµz׳WL\0¶\0Ȇ8׺y,϶&@À E£ʯݑh;¼!f¼.Bþ;:ÊΛZ3¥«𮻬눑­遨ӱP4,󺘣8^»Ġ׃��üº¢S±hޔ°O+ª%P#Ρ\n?ۜIB½ʥˑO\\]΂6ö#û¦۽؁(!c) Nõ¸ºѿE؈B##D 턤o½吐Aª\0:ܮƟ`  ږ茑³>!\r6¨\0V%cbHFש¤m&\0B¨2I�٣]ú؄>¬쳼\n:ML𐐝ɹC񏊂0㫜0¨(ᏩH\nþ¦ºM\"GR\n@酏ø`[ó\ni*\0𩈼쵩)¤«Hp\0N	À\"®N:9qۏ.\r!´J֔{,ۧ時4BúǌlqŇ¨Xc«´ߜN1ɨ5«Wmǳ\nÁF`­'Ҋx݃&>z>N¬\$4?󛃯(\n쀨>ɫϵPԡCq͌¼p­qGLqqöG²y͈.«^ޜ0z՜$AT9FsЅ¢D{�øcc_Gȁz)󳇠ܽQƂşh󑌈Bָ<y!L­ۡ\\²'H(䭄µ\"in]Ğ³­\\¨!ڠMH,gȎ�*ҋf몜0򾒂6¶ඈֲ󨊦7ٻnq¸ߴɈգcH㣘\r:¶7ʸ܀Z²ZrD£þ߲`rG\0䁬\n®Ii\0<±䣴\0Lg~¨ÒE¬ۜ$¹Ґ\$@ҐƼT03ɈGH±lɑ%*\"N?륜	Μn񃲗Ƀ\$¬p񞅥uR`À˥³򒜤<`։fxª¯÷\$/\$¥\$O(ˁ\0拜0RY*ٯ	ꜲܜC9令hὉӧ\$RRIǧ\\a=Eԏ򵂷'̙wI委üÿ©¾㋹%d¢´·!üÀʔʀҪ졭ӊ&Є斄v̟²\\=<,Eù`ےYÁ򃜜²¤*b0>²r®ତpd̰DD ̖`⬔ ­1ݥ P¤/ø\r򢃹(£õJѨͮT0򠠑ƾި�t©©ʟ((dǊªᨫ <Ɉ+H%iȴ²#´`­ ڊѧ��>t¯JZ\\`<J竨R·ʔ8hR±,J]g򨉤谜n%J¹*Й²¯£JwD°&ʖD±®ɐªR§K\"߱Q򨋠²AJKC,䴭V»²ʙ-±򏋉*±r¨\0ǌ³\"Ƌb(üª󊄒:qKr·dùʟ-)Áˆ#Ը²޸[ºA»@.[Ҩʼߴº¡¯.1򮊽.̮¦u#JÁg\0ƣ򑧣<˦ퟮ�½	M?ͯd£ʥ'/¿2YȤ>­\$͒¬lº\0©+øÁ}-tºͅ*ꉒ䂜$ߔ򌋻.´Á­󊒈ûʉ2\r¿B½(P͓̶\"ünf\0#Ї ®ͥ\$Ċ[\nЮoLJ°œ¥'<¯󖅇1K큹̙1¤ǳ¥0À&zLf#üƳ/%y-²ˣ3-͋£L¶΁ɗ0³븛,¤˓̵,±«§0±Ө.DÀ¡@ϕÁ2.|£÷¤ɲ訳L¥*´¹S:\0ٳ´̭󅇳ĺaːl³@L³3z4­ǽ%̒͌ݳ»³¼!033=Lù4|ȗ¡૜"°ʩ4´˥7˅,\$¬SPM\\±οJY̡¹½+(¡=K¨쁈4¤³C̤<Ё=\$,»³UJ]5h³W &t։%鵬ҳ\\M38g¢́5HN?W1H±^ʙԸY͗ؠ͏.N3M4Å³`i/P7֓dM>d¯/LRΔܢ=K60>¯I\0[𵜰ߍ\r2��@ϱ۲ÿ°7ȹ䆇+䯒Ŝr)਑tL}8\$ʂeC#Ár*Hț«-Hý/؋Ҷȟ\$øRC9¨!ŷük/P˕0Xr5¡3D¼<TÁԒq¯K��Έ§<µFÿ:1SLβÀ%(ÿu)¸Xr1ѐnJÉ̖´S£\$\$鮖·9ԩ²IΟҳ ¨Lì¯Ι9䅃N #ԡ󜤂µ/ԩsɕ9«@6ʂt²®N񹼴·Nɺ¹¡7󠓬ͅ:DᓁM)<#ӃM}+񲎎þ񲛏&𢊎y*򲙸[;񳎏\"mڄ󅍵<c ´°±8¬K²,´ӇN£=07s׊E=T᳆O<Դ³£J齄Ӻσ<̃ˉ=䨳®Kʻ̳Ȍ3¬÷­LTЀ3ʓ,.¨ÿϱ-񳧷;?󼷏;ܠ`ùOA9´󓱏»\$üÁOѻ콠9ήǉAxpܶE=O¹<ü²5ώý2¸O?d´´`N򩏿>þ3½P	?¤򔄏múSퟷ�¬·=¹(㤣¤Aȭ9\0�䲀­9DÁɑ&ܽ򊂋? Ќi9»\nீ񁝁󲈭A¤ýSːo?kuN5¨~4ܣƶؽ򖌓*@(®N\0\\۔dG弰#菤> 0À«\$24z )À`ퟢ�\080£菦 ¤ª亜"TФ0Ժ\0\ne \$rM=¡r\n²NP÷Cmt80𺠣¤؂J= &І3\0*Bú6\"騺#̾	 (Q\n𪴸ѱC\rt2EC\n`(Ǹ?j8N¹\0¨țÀ¤QN>£©ড়0¬x	cꎪ𜮉3׃hü`&\0²Ј´8ќ0ø\n䵏¦úO`/¢A`#ЬXc萏D ÿtR\n>¼ԤїB򄴌Є̵䐍Dt4Ж jpµGAoQoG8,-sіퟡ�#);§E5´TQчдAo\0 >ퟣ�ӄ8yRG@'PõC°	��C圢K\0xüԾ\0ªei9Ьv))ѵGb6±H\r48рM:³F؅tQҡH{R} ��͏ԏ\0¥It8¤ؖ𻈎ǛD4FџD#ʑ+D½'􍏊À>RgIՔ´QUҩEmՏüTZ­Eµ'㪣iEݗ´£ұFzAªº>ý)TQ3HţTLұIjNT½¼&CøҨX\nTљK\0000´5¢JHќ0FE@'љFp´hS5F\"ίѮe%aoS E)  DU «QFmΑ£M´ё²e(tnҠU1ܣ~>\$񟇂­(hՇGüy`«\0ꠉ퇄򳔵Sp(ýõP㇭\$#¤¨	©©N¨\n��ö]ԜPւ=\"RӨ?Lzt·1L\$\0ԸG~嗠,KNý=뒇Mŝ¤NS)ѡO]:ԊS}ݸ1ҁGe@C휰«OP𓵎ͱ��P@ѝS𿕅SG`\nɺP°j7R @3üќn ü㷏₋£DӠ溌ȏ¼ 	諜0ùQ5��CPúµSMP´v4º?h	h딇D0úіֵ>&҉Tx􏅼?@U¤÷R8@%ԖõK§N勣󒹅­E#ýù @ýø䌥L૑«Q¨µ£ª?N5\0¥R\0úԁT놥ԔRS휡oTE(Ϗ¶Ƚĵ\0?3iS@U÷QeMµ	K؜n4PՃeS\0NC«P­Oõ! \"RTûõS¥N՜ÁU5OU>UiIՐU#UnKP��T誕C«U¥/\0+º¸ũȚ:ReAܤ\0ø¤x򇇗Dº3ê üڏü畗5҉HUY��P	õe\0MJiµýQø>õ@«T±C{յѬ?՞µv\0WR]U}Cö걭5+U俭\rõW<¸?5JU-SXüՌԟ \\tտҳMբՃV܁t§T>U+։Eţϔ9Nm\rRǃCý8Sǘ'RҩXjCI#G|¥!Qهht𑘍¸ý )<¹YЪԐRmX0ü��M£õOQߙýhÀ«ߝdu՞¤՚(ýAo#¥NlyN¬VZ9I՜ºM¦V«ZuOՅTՔŅՇַSͥµµ֊\nµXµªSۑERµ³ԙ[MF±V珽/õ­¨>õgչT햍oUT³ZN*T\\*ïЗS-pµSՃVձҖM(ϑ=\\-UUUV­CėZ؜nuV\$?M@UΗJ\r\rUД\\姕ח]W£W8ºN '#h=oC󐽆(ü麹ՙu¤÷V-Uӹ]҃©:U¿\\\nµqWਔT?5P᪜$ R3բºC}`>\0®E]#Rꠉÿ#R¥)²W:`#󇵩4RÀý;õᖩD%8À)Ǔ^¥Qõ飔h	´HX	þ\$Nýx´#i xûԒXRõ'Թ`m\\©¨\nEÀ¦Q±`¥bu@ױN¥dTףYYýµ®GV]j5#?L¤xt/#¬団酽O­PիQ暢6££Ϟ토𼖞؍\\R5t´Ӛp઀XV\"Wń	oRALm\rdGN	Ւրú6p\$P废E5Խ©Tx\n+C[¨��ýָUDu}ػF\$.ªˑ-;4Ȁ±NX\n.X񢍐\0¯b¥)#­NýG4KؐZS^״M¶8سd­\"C¬>œդHe\nöY8¥Ѯ꠺°ҏFúD½W1cZ6Q⋈ü@*\0¿^¸ú֜\Q߆4U3Y|=Ӥ酋ԛ¤¦?-47YPmhYw_\rVeױM±ߙe(0¶ԿF՜r !қPUIuѷQ啃葎?0ÿµݧu\rqधY-Q賏°躽g\0\0M#÷Uד5Zt®֟ae^\$>²ArV¯_\r;t¨HW©Z퀈՘hzD蚜0«S2Jµ HI叠'ǁe�6¹[µR<¸?ȋ /ҋM¤ö؜n>½¤Hᚡiö¤TX6җiºC !ӛg½ࠒG }Q6Ѵ>䷠!ڙC}§VB־媕Qڑjª8cT໖'<>Ƚõ􈑃]¨Vѷjj3v¥¤堰èȐ23ö°вxû@Uk \n:Si5գY삭w੍?c钍QŇQՑb`򜰎@õ˒§\0M¥ਗ਼rKXû֟ٗl­²öͬ峔M׿D\r4QsS¥40ѳQ́õmY㨕d¶`{VgEȜn»XkՁ৓肬4ú¼¹^�ƣ<4鎘nM):¹·OM_6d浸õ[\"KU²nֿl´x\0&\0¿R56T~> 􆕸?Jn Ϛ/iҶ􎚧lͦ֕ۡF}´.£¼JLöCTbM4͓cLõTjSD}JtZªµǺ±L­´d:Ezʤª>֖\$2>­µ¢[㰢6öԒ9uꗮ?1®£RHu蛒¸?58Ԯ¤턝Ƶ£簐ûc욠?r׻ Eaf°}5wY´륂ϒҪŗwT[Sp7'ԟaEk \"[/i¥¿#ÿ\$;mfأWOü��򜲥\$ͪu-t#<š·\n:«KEA£풑]À\nU摭KEÀ #¿X娷5[ʾ`/£̈́µʖ­VEp੏剥ϱߜûn�:¤§le¢´՛e՜\eV[j£鑷 -+֟GWEwt¯WkEžu쑯mõ#ԐW`ýyuǣD݁ö'ױ\r±ՙOD )ZM^³u-|v8]g½höׅLϖW\0øȻ6˘=YԤ½Q­7ϓϑ9£獈²r <Öꄐ³ºB`c 9¿ȠD¬=wx©I%䬡¬蛲ઃj[њ֘ퟏÿ´ ``ż¸򲆞ø¤¼�	AOÀĉ·@偀 0h2휜␀M{e〹^>��7\0򴋂W򒜤,퉅¡@؀Ң嗷^fm剬\0ϹD,ם^X.¯ֆ©7㷁×2ݏŦ;¥6«\n¤^zC©קmz鮖^��FFꌬ°ö[¥eȋõaXy9h!:z͹c򑹢Š!¦µGw_Wɧ¥9©ӓ+t®ڡpݞtɃ\nm+ޙ_ퟦ�\\¼k5£Ҝ]ƴ_h9 ٷNŝ%|¥7˖];|񵠟Xý͹ռ屗̇¢¨[ה\0}U񔧟MCI:ұO¨Vԃa\0\r񒍶πÜ0ø@H¢Ő+r쓤W㇨øp7䅉~p/ø Hϓ^ݪ²ü¤¬E§-%û¥̻Ϳ&.΄+¸Jђ;:³¶«!ýЎퟤ�öª/WĂ!B茙+$𭱧=ü¿+Ѡ/Ƅe\\±ҏxÀpElpSSݢ½ö6ǟ¹(ů©ĩb\\OƊ&켜\е9\0û9n񘏸D¸{¡\$ሸKv2	d]超Cվŕ?tf|Wܺ£Ԇ¨p&¿ٌnΨ³皇R9øT.y¹ü¹´\rl° ú	T苠n3¼ö𔮃9´賛 ¼Z賡¯љ҇񾎈:	0£¦£z譝.]À焣Q?৔»%񙕸Ռ.ԁǮ<죭⸂˳,B򬘲gQþ¢ퟳɎ`ڡ2鄺{g뒄søg󚿕 ׌<搁׷{¦bU9	`5`4\0BxMp𑸱nah醂@ؼ톭⨗>S|0®¾¥3Ḩ\0њ«µCԄzLQ@¶\n?¸`AÀ >2¬÷ᘱN&«xl8sah1輘BɇDxBޣVV׊`W⡧@¬	X_?\n쾠 _⁮ ؐ¼r2®bUarÀI¸~᱅Sຜ0ׅ\" 2֙þÀ>b;vPh{[°7a`˃\0ꋲjo~·ûþv͕ټfv4[½\$¶«{󯐜rv悋Gbp눅øO5ݠ2\0j÷لLmሖ¡ejBB.'R{C¤`؂ %­ǀМ$ O嘝\0`«4 ̎򾻴£³¢/̏´À*¸\\5Ł!û`X*ޥͳSõAM��,þ1¬²®휜¯²caϧ ³ù@؄¬˃¸B/¬͸0`󶲯¡§`hDŊO\$煀p!9!¥\n1ø7pB,>8F4¯囦 π:񞷂£3¿ðT8=+~خ«΢\\ĥ¸<br·þ øFز° ¹C¡N:c:Ԭ<\r㜜3྘񘟇À6ONn䡻᱀tw랆逌ເלº,^aȜra\"ހڮ'ú:vʥ4×;񟤏\r4\r̺ۼÀ¬Sв[cXÿʦPl\$¹ޣiw夣B bΗ¤õ`:Ͼ <\0є2ٛ·RPȜr¸J8D¡t@셎蜰\r͜6ö󤞷½䃘Yϑ£ú\"夑À\rü¦À3¡.+«z3±;_ʟvLݤӷJ¿94ÀIJa,A¦񚈯;s?֎\nR!§ݐOmsȟ慠-zۭwۺܭ7¡ͅzMo¿¥朰¢aŝ¹4帨Pf񙥿򩗖eBΓ౜0ɂjDTeK®UYS忶6R	¦cõ6Ry[c÷°5ٝB͔֒ù_eA)&ù[凕XYRW6VYaeUfYe巕U¹b巔E밊;z¤^W«9䏗§䝖õ뜰<ޘ襪9S厚¤daª	_-L׸ǅ͘Qö蔈[!<p\0£Py5|#ꑐ³	׹vڲ|Ǹᚦaoᬪ8ל$A@k񙃿a˝½b󛣱ȑf4!4¨¶cr,;惑öbƽ»\0°øźcdæX¾b츙aRx0A㨣+w𸎛܂·pڄ¿wTÀ8T%Ml2ǽ¡𗽡ȳ.kY0\$/覕=þسgKÙ¡M õ?ÿ破c.Ը!¡&分g°ûf௾f1=¯V AE<#̹¡f\n») 뛎p򓣠.\"\"»A眄¤㗗üq¸X ٬:aɸ¹f¯Vs󋗇޲:斞ƣԧVlg=`㗓W˽yҧUÀ˙ªẼ= 㗀ဆx 0⠍¼@»¥κb½þwƦۙOø筘ܪ0¯®|tᰥ±Pȍp溧Kù¬?p􀊀<Bٟ#­`12灧¶!3~؜箒nl䅦ؖhù¬.ѿŎaCѹ?³û-౜68>A¤aȜr¦y0 փiJ«} ˹© Ћz:\r¡)Sþ¡@¢娀䶃Y¹㙎´mCEg¡cyφ<õͨ@¼@«zh<Wل`¨±:zO㎖\rͪW«°V08٦7(Gy²`St##²C(9Ȃ؀dù榚8T:¯»0º薘 qµ  79·ᣰhAg܎6.㦷Frb䠈j聵ᡡ1úږhZCh:%¹ΧU¢ퟓ�ŉ׹ϩ0~vTi;VvSw؜r΃?Ǧ²£ÿ¥nϛiY졺¬3 ·9Մ,\nò,/,@.:虾&Fѩú¶}b£詏ݩ暺d职nc=¤L9Oh{¦ 8hY.ـ®¾®üǜr¬և£À鱑¯U	Ch��ÿO°+2o̎잎÷§øzp袨þ]Ө墒Z|¬O¡cѺDᾁ;õT\0j¡\08#>ΎÁ=bZ8Fj󬩓;ힺT酡w®ͩ¦ýøN`櫨¤ÅB{ûz\r󡣓ӑ輤TGi/ûú!iʄ0±¼ø'`Z:CH器ꠜV¥ڣöª\0ܪ§©£WªպgG¾½²-[Ð	iꎜrqº髮o	ƥfEJý¡apb¹꽶£սo¤,t虫ö®EC\r֐x4=¼¾ـ¦.F£[¡zq眨X6:FG¨ #°û\$@&­ab¤þhE:²嬤`¶S­11g1©þ2uhY¬_:Bߡdcÿ­\0úƗFYF:˔£ªn،=ۨH*Z¼Mhk/냡zٹ]Áh@��㱜0øZKù¢뎆螫º,vf󿳮>¤O㼨ÀʳÜ0֜5öX鋮ѯF÷n¿Ar]|ωi4腾 ؂C° h@ع´cߥ¨6smOågX¬V2¦6g?~փYՆѰsúcl \\R\0¨cA+1°ù̩\n(ѺÌ^368cz:=z÷(丠;裨񏳼F¶@`;쀬>yT߯&d½Lןÿ%҃-냈L8\rǢû°°£úMj]4Ym9üۼКڂø}<û؞²¯̥᫧Ŏ^؍ޠ+ B_Fd¬Xøl󷈾⽋蜢:ԪqA1X¾즲и¯3ֈΓEᨱ4ߚZ³¸& 榱~!Nf㴶o\nMeܠ¬I΄퇀V*X¯;µY5{V\n葻ϔ麜rF 3}m¶԰1훀>©t襶w櫀Vֺ#2į	i��㹃p̝»gh櫛elU¦ہߙ¶Ӽi1ġ¾ommµ*KǪ}¶°!톳�ݻme·f`m蒘Cۺ=n޺}g° TmLu1Fܚ}=8¸Zᐭ菞ۭFFMf¤OO𮡀肸߯¼鵸ޓ倾Voqj³²计+½򵼚¨ˉ¹.̹!nG¹\\3a¹~O+Υ::\nڀ¤Hph´\\BĵdmfvC菞Ӑە\" 潛.nW&ꃕn¢øHYþ+\r¶ĺ÷i>Mfqۤùݑc[­H+怯¤Ѫú1'¤÷#āEwD_X큩>г£-~\rT=½£෈׭ �m§¹氻h󟌪ڍ詀^¹@V填iȮβ嵚ɻF D[΢!¼¾´B	¦¤:MP­oC¼vAE?郲IiY͓#þp¶P\$k↊ޱ½.ɰ7þöxl¦sC|¾bo2䘪>M��&»ǅ:2㾛ѣQ²毜ўdႭþ蕜RoYnM;n©#ߜ0P¾f𚐯׿(Cڶ<ʛ¬ø[򯛸ûצѿּÁ;ߡºõ[úY.o®Up¿®pUø. ©B!'\0򣼔񝺱±À¾ 㤮<𮈮F³ퟌ�ǔ´V0ʇRO8wøάaFú¼ɥ¹[´Ο񙏹«/\0ٯx÷Ǒ𿧰:ً놨`h@:«¿öѯM�x:۰c1¤֠û¯�;螦؆@®õ@£ú𽂇\n{¯¼®໧´B¼�º g坒䜜*g幃)ہE^ýOĨ	¡³¦Au>ƨü@ČY悼ퟑ⠯»<>Àpķq,Y1Q¨Á߸/qg\0+\0⦥Dÿ翶þ ڟù\$©û¬헥6~I¥=@푡¾ùvںO񁚲␫͵Ɩ9ǩ³¼aﰐ껅g򰎴¹ÿ?0Gnq²]{Ҹ,FჸO¡⃄ޠ<_>f+¢,񌉻Ա±&��𭂷¼yꃇ©Oü:¬U¯LƜnÃºI:2³¿-;_Ģȼ%饴¿!εf\$¦Xr\"KniÀМ$8#g¤t-r@Lӥ耔S£<rN\nD/rLdQk࣓ªõĮe𥤣Э帜n=4)B˗􌚛-|Hb¡Hkʪ	օQ!ЧꇠYbt!¿ʨn,쐳OfqѫXY±ÿ뜢b F6֌r f򝜢қܳ!N¡󞼦r±B_(휢¨Kʟ-<µ򠁿*Q÷򨙯,)H\0²r眢z2(¹tه.F>#3⮆؃¦268sh٠þ¨ƑI1Sn20¶犭«4ڇ2As(¬4伋¶\0Ɲ#岾K'ˍ·G'7&\n>x߼܊؇O8,󅰄¼⋹8ѓ\0󂗹݉?:3nº\r-w:³ň׻3ȉ!ϻ³ܪZRM+>֜ퟪ�/=R'1ϴոûяmÿ%ȥ}χ9»;=ϮQö㽏hhLõ·GϫWΜr􉥘4Ҝs񎖊3s۴@U%\$ܑN;̿4­»󎚏2|ʳZڏ3ب\0ϳ5^Àxi2d\r|ûM·ʣbh|ݣvǠ \0ꐮ䠻\$\r2h#ú¤?³I\n¼+o-?6`ṽ¿.\$µøKY%؂J?¦c°RN#K:°KᅌÁ>:Á¥@㪞P̮_t&slm'搩ɸӜ²½㻶ۗHU5#쑷U ýWYܕ bNµWû_ûª©;TCø[ݼږ>ŇõWýCUԶX#`MI:tùӵö	u#`­fu«\$«t­öX󠍦<Իb姨öўչ׷ؓ58õ¬ݣ^-õ\0ꀺR*֧£¨(õ𵱚壣꘹Q݆Uvԗ GW�Tꇗ��^§WöďÁսJ=_ؗbm֝bV\\l·/ڍտTmTOXuʽ_ýITvvua\rL_ձR/]]mҳu=H=uѧ o\\UՅgM׉XVU À%õhý¡53U\\=¡öQߘM¹v¡g孠õue¡ٻhÿbݍ݇CeO5®ԁ֝O5ԙًi=eՉGTURvOa°*ݩvWXJ5<õ¯bu ]םְúµ<õÙ՜$u3v#קeöuђ5mvD5.võW=U_娴\\V؂ϟ<õ÷Sͮ)ܱM%QhᚇTf5EէՍW½vŕmiՂUԕ]aW©U§dRv᙭YUZuٕVUiRVõ³Ӈ[£획U§\\=¶{ۘýµ¼wQ÷huHvǗgqݴw!گqt¢U{TGqý{÷#^G_ubQ꥕i9Qb>ڎUdº±k½5hP٭u[\0¦ꅟ¶雵Y-𴷲õȕ(փrMeýJõ!h?QrX3 xÿȏ#÷xּۻu5~푭ݵ뙹Q\r-ùuգuuٿpUڅ)P圜r<u«S0݉w¹߭iݳԡ̖øB÷ᆤ]ù腇ԞƿE갶lmQݏ6k¼Ҋ´w�؃㟌ED¶Uْev:Xߣ؅NW}`-¨tӈ#ebº±u㳆	~B7꠿	OPCWµדE͕V>¶ו۷ߏ牔᭻ӂ¬zÿ=µ͘1º+ ¹mÉ,>µX7झ .½*	^㰎º.莐/\")Љ¯s®|धӟЬÁ}㋸ͧ!󗮃5n±pj£¾h}½谭EẈ¡O0d=A|w럳㫗άu²vù؆¼Gx#®bcS퟊�ùtOm`C򄞍ŀ봨­n\$k´`þ`HD^PEۤ]¹¨rR¸m=.񙇾Ayi \"ú򉐖·o㭬.\nq+À¥妘d«¶㪟½KΘ'ܪ Хa��ù9pû旿øKLMࡾ,芋¨zX#VᆵH%!À63J¾ryՁ�_赉úWù±Ƽ@3b1刷|~wﱳþ큷҄虉¼9cS&{㤒%Vx𯫚O׷Ur?®ªN Ά|CɣŰõ啯 ¹/ú9ftEw¸CÁºa¦^\0øO<þW¦{Y㽩e똽nɚ�f0h@쓝\0:C©´^¸VgpE9:85ó枧Ằ@»Ꭺ_ª[ޫ«ꇩx^ꮆ~@чWª¸㣓9xFC¿­.㚧öük^Iû¡pU9üؓط½\$󛳌ø\r4´ù\0ΨO°㑄)L[°?쮐ECS쉱nm{Ř?P߲Á;񬄰;SºaKfø򛥏?´Xõޫ¤B>½ù9¿¯هjczA͎÷:ꡛ³n0bJ{o¥·!3À­!'؋Å�}㜜莳Wø굮xωÁL;2ζna;²헺Xӛ]ɯºxû{䦵ޙjX÷𗶶Ӛ飱ފEE{р4Á¾öĻ홧	̜nöʾùaﯷ¾ü짯،ûԻ寿½û챧🽞黫\n>Jøߌḓ÷YϜrOʽ𑴯ÿû¥-OÃ¦ü4Կ9Fü;𧁻ԼG𸉪F߬1¯ÿ߳񏲾须w0ӈ»¤Ư;񔄑lüo񠊐Tb\rwǒ2®Jµþ=D#򆮁:ɹ񻓸^㑬.¿?(ȉ\$¯ʚƯ�3÷ó𴍊aCRɆ͇̑úI߰n<ûzyјN¾𿵅➮Ë౴DǼ\r؞霮ճ¨\roõý\nПCl%Á͇Yλ¥߰ϠGѾڽ#VН%ý(ԿҠ3才r𽻴û׿GɌnö[ª{¥¹_<m4[	I¥¢À¼q°µ?𰣟Výnms³nMõõ\"Nj1õw?@윤1¦þ>𙒞øջ¥ö\\̻n\̚鷟¿ٟic1ÿhoo귟?j<GöxlϹ©S迲}̓ڼ\"}÷/ڿs睕¬tI䥪¼&^ý1e󓴣��*'F¸߅=/Fkþ,95rV⡸:쑈ۯ9͸/FÀ_~*^ף{Љƶ¯㟃²^nøþN~øᅁ�d©屾Uøw䱙±宴T¸2À釤?&§洅:yù襟X瘊ۃþd	W蟎~úG!´J}¤ú칵Ă-ӯ±;hê󼒴춅¶ ~⦳.«~ɧ栓AqDVx®ͽ'퉐E٨^û¢~ùø¿粩篯7~M[§Q㮕(³ܹ¸ùnPѾ[WX{qԡϤƉý.&Nڳ]񺈙뛛¶Á٦ü8?ѳ¦¶§݆ڄ»¶ᣌ¦΂𥝎6녖@[°¤£ûÐG\rΫý§}ü÷Áÿϟݓ緖|N§«޴~(zÁ~»¹痢?±ߓț¹ø1Sª]xثöыxO^遍rZ+ºÿ»½*ö¯kþwD(¹ø»R:潜0§퍹'¤󎁓m!OМn䅵肝Ƴ.[ Pơ¹²}׏m ۯ1p񵼢,T©猠	0}❦P٥\n=Dÿ=¾񟐜rA/·o@䒼2㴠6ċ³¶\0șq7l ¼퟊�ú̃(;[񝈫r\r;#älŔ\r³<}zb+ԐO񛀂WrX`Z ţPm'Fn ¼p߭°\0005À`d¨طPÁڇ¾·ۻ²̮\05f¿EJ䜷û۠¹.?À;¶§N򞥬;Ʀϭ[7·ޥþکŢ-֮dَ<[~6k:&Ю7]\0󩁻떹/µ59 񁀥T:煘¯3Ťsݝú5䏜5f\0АµöHB�½º8JԌS\0vI\0ǷDmơ3e׭?B³ª\$´.EЦ˕@ªnúb򇕢Áϱ3|üPaˈøϯX7Tg>.ڰؚ5¸«AHŵ3S𬘁@ԣ&wµ��π򉭃ѥӞ̤J1?©gTၽ#ϓ±=__±	«£ɖq/C۾·݀μ˴ᾐD g>܄õ멠6\r7}qƅ¤JG^\g´ݵü&%­؛ª2Ixìª񶜰3]Á3{ɀRUٍö v<届¿¾sz±uP5ªF:ҩÀ`­qӷV| »¦\nk⽐'|gd!¨8¦ <,됷m¦»||»ÿ¶IAӞ]BB φö0XϺ³	D֟`W µÁqm¦OL	츮ͨÁp¼ҁ䗶\"!ýª\0⍁ÁV7kM¸\$ӆN0\\Վ§\"f᠇뱠Ȝ0uq, 5ƣA6װΎȜnퟝ�jY³7[pK°𴄻l5n©Á@✜fûЬ	¦MöùûPÁ糮C HbЌ©¸cEpPڐ4eooeù{\r-ڲ.Ԗ¥½P50uÁ²°G}Ģ\0¨<\rö!¸~ʽµ¾󱗓¹\n7F®d¶ýӜ>·ԡ¢٥ºc6Ԟ§õMÀ¥|򠤈û·쏓_¨?J檌C0ľЁÁ&7kM4ª`%f�ΘB~¢wxњZG鐆2¯°ü=*pퟘ�BeȔ؏|2Ĝr³?q¸и�±񍐊(·yrᶑ 0ா>ÀE?wܼr]֥Avཁő䀎+ݘÁªAg≌ۿsû®CлAXmNҝú4\0\rڍ½8J݊ퟟ�Қ󴈺=	𳅇놓4¯񆻉¬\\&֨P!6%\$i丩4c½0BỶ2=ڛ1¹̈PCإmˍdpc+Ҙ5圤/rCR`£MQ¤6(\\៲A ¦¹\\ªlG򬬂\0Bq°¤P¯r²ûøBµꛑ¹_6LlˡBQIGÀ團𿘒bs¡]BHr㘃`Θ䜤p屸ퟑ�nbR,±L \"%\0aYB¦s̈́,!ƗϛpN9RbG·4ƾM¬t¸¬jU��§y\0쓝%\$.iL!x¬ғŨĮ)6T(I옡%ҋȝmĴ¥􅺦󇷇ITM󂺔\rza])va%²41TÁj͹(!¬ޗ¡¨\\\\Ɨ\\t\$¤0Ņ楡\0aK\$蔗F(YÀºHόЈ〮DdÛWpɨZ¯'ᚃ,/¡\$û¦£J¡FB¨uܬQ:Υö:-a#콪b¨§lՕg;{R°Uº±EWnԕa»V⮕Nj¬§uGɪ¨yֹ%ݒ@ů*̝䫕Yx걟󲧺]멑v\"£璕匯VIv꽠¾'ª°Uݩ S\r~R\niũ5S¦儴9~ʢ;)3,¦9M3¯HsJkTÜ(¢úuJ][\$uf¨�£µ¹\n.,µ9j1'µ!ö1\$J¶gڤ՟ĆU0­Ӛuah£±·cH¥,Ùt²񋢶5뵖/dY¬³AU҅©[W>¨_Vÿ\r*·õ©j£§-T± zօYʤc®mҹ±غ¹ü˛Ut-{ªµýl	£i+a)».[º_:ڵ䨃򭑗§ɭ»¥%JI´[T«h>®µ·°;˘̺dꂟSdV滜rƱ!NK&AJu4BÁdg΢.Vp¢᭢)ǖ!U\0G丨`Є­\\q⟷Qöb«VL¥޺䕂ú󬘚.­N򘄁*ԏU]Z´l溫ζù®ǒ D1I傣Ѳ:\0<1~;#ÀJbۇ¦ʍyݫ۔/\"ϛj<3棓̌ꅱ¡:P.}ꖥ÷򄜢qٹJýGû·sop¯²þX\rݜ³dޜrxJ%퉏ƼO:%yyㅖ,%{γ<øϟ̷¯zκ(\0 D_÷½.2+֧®bºcڸ쒰gިÁ߼9CPû48U	Q§/Aq®ݑ¼(4 7e\$Dv:V¡b׻N4[ùiv°À겱\rX1¼AJ(<PlFМ0¾¨\\zݩс痈W(ü4􂈖Þگ¢ pӵʠµǜr³da6¯üO֭m񡄴}qŠ6P'h৳§|f jȿA惺ø£+DUWøD픾޵ń%#鰸3{«¶L\r-͙]:jdא	jüf½q:Z÷\"sadҩ󇘳	¤+ퟫ�NKö1Qþ½熸=>û\"¤°-ẟʆ͈õIك*퀞ԟǹ»T휜U訣Y~䢕3D倁㟨f,s¢8HV¯'ɴ9v(:֖B9񜜚¡(&E8¯͗\$X\0»\n9«WBÀbÁö6j9Ѓ ⊈?,¬| ùa¾g1²\nPs \0@%#K¸ \r\0ŧ\0疈À0俀š,䜰ԁhµѨ\08\0l\0֭ܚ±jbŬ\0p\0ޭ٦`ql¢䀰\0i-ܜ\ps¢耷e\"-Zퟝ�b߅Ѭ䜰ȁ̝P ¢څ¶b\0گ,Zퟚ�rÀ\0000[f-@\rӯEڋϗ/Z8½~\"څڋ­ö.^ҎQwŏ\0֯t_ȼÀ⨅ퟭ�0氤]µbúŤ|\0ȁĜ\ؼ¢텤\0af0tZÀѮJ��\0ΰL^´Qj@šJ´^¸¹q#F(1º/웈µ1¢ㆅI殜^8»\0[q؁̛Ñl\"冠\0氬d趀Ɯr́cøµ{cEÁ\0oⰬ]°\0\rc%śퟄ�8½w¢冚µ-Ĝ\º񻣜ŖGª/\\bp@1Ƙ\0a²1ùȏѳ㡅¨/]8¹~c\"śŖþ2��m£\"9q/\\^fQ~cƟ£έ\$i\"֜0003˗¬¤fXºqx#\09Z.´i¸ȑ@F3tZHɠ\rcKb\0j/Djøɱ¨⢆Ih´aȱvƩOZ4Z򌑂#YE¨\0i.hHґsX/F<ϙ.䪸˱­b膍\0mV/d\\蘱b÷E³£3T^(ݑcKFRՖù��q½¢øŠ6ԝhӱc6Eċ󛶶ܨ㮜0005sn/dn¸Ԡ\r\"ц³ڭD`ȕ㎀2Y¤bxÀ񔣜\ūV3x·1xFx¾\0ʶb°q£ǡ8|^̑ub冠՗-��q¼㺆鎥ö0pp񔣁ǔ¢\0ƶԦՑǢⅬdҰqH´±¾£\$ǀq򭼞B4±¦\"ú\081ª/lnxϑ ⪇3:0tjhґ~@Ƽ¥¦3¤vHƱ¹b܇(e4gغq£2Ʊɘ-nX˱º\"ㆼQ1\\j¸¸1®㈅ǋǚ䳴m¨ձª㛟􋮁z7üyhޱ§#ƞ/3\\xб̈́KGÿƶ䯘ѱ{£°FJל6¼lX鱢£Ƶ©޹r(¿1ңGc\0ŝf:rX½ #Ѕ½\0i޼\\}ױ墮F½\0sַܹ2̑棵Fe\">4i؅¿┆猩\n<{¸㑍£↉J;¬]؄1ţΆ0ٜJ;4^肄½㳇®¨³4i¨À(H#چEx/¤nøû1𣯇¡囪6,l۱t㯜0005%0]xü¶£GG5!0¤¨ױڢ閲q¢2̿¨ޑΣNFPo\"4��1פǥe ²3¬s8鑼ㆇ5 涔[H둓c؈jY;��b론y򀄜\¸½qأWHN;̣Ƒ裺ǭ%ª.kXƑý£ڇ͌ϟ1Df¨ߑºcWFl¡!0ü²c Eܐ©;lѱ\"놩ߘ¢7\\\\¨ù񢣔Əqþ.T|\"?񣙆E³f9TyYѩ㓇1û\$f9R\n\"ކx¹>BHڱߤ\0ǂ¶:\$e¹1£³F?=º3Tu)\nq¹b釾˗μTøαУH.m~C��±¸#/ȉ]~3䞈ºф#§ƾY®4^¸ΑjcʇK1\"Ҹ¬|6ѥc\"ǂµ\"b4ㅨ楜¢ԈG\0e\"/t¨´1r£1Ƅe!v2yÀ±õ伇 8\\o¨ʑ#tő\rz@´}H袯ƨy \\¨𑫤eGÁZ3~鄲)㱈¿۞Bl~H½²:£dF£-οk8´q裨F͋K޵|my񀣱Ƽ*@´jء򱣛ž>I´Z荑j䕈2ɜ$0¤hµQ䖆T	\$Ɓl~öqڣȱ\$־\\pٜrq\$/ȵ%Jq \$ 㴅²GN-Tq)򜢢ۈʌ˙¦=얘ɲ-£H«8\\nµRW\$H뜢¢C\\_¹\0»d\$Ǧ³\".Du	'Q£zE팙&0to󱪣úƿ³R@døɑ䣹ǵ##¶LLkɪq󜤪Gđi΀Til㲅ªε¾r\\dIµ\"/̚ɰj\$Tžz5Ld3£뉖o®Tq¹!1{£Ƈ嗖9Z¸¾QբӆwJ94n֤҄{ɨ-8·2h¤uȩ;\$-Dkø岳£H#¡􏙷򜢘/E¿ӝ 	\$j¢^򭣝Ƿ[\"N\$肑¤WȖ¯֯]ܤ²+1Ga/&IDnø@\$冡眤έk!Q¨⹊)(N/\$t¸ݑ¹䫆OKzP´tXܲ[\0Gw(*K\$v˱󣋉'އ̞I򸤭ȜnAҸ\\rX·ҡ£÷IiNI%\$½㒆_÷ª6¤f瑾#ȉ5#F´غ񏣳E⒕\"$¢IܣHݙvR|ùQ¤cE¸񗺒eº±h䶅ΏfK`8þr.#·E³s®0LüR䆆©·!\nC\$`ȶ񴜤􈿒˗nPܥ!񚥀F'¿/¸¶Ė俊¯%,hȌrF\$öȾǞ3´tø撀¥Ŧ!1<ɃQϥɃ¹护Zئ.ݶō·±C¥ʛԜ.²[þBҿx렃蜰NRn`ȹY\n%+N¨IMs:ùYdef¬B[¶°ݮƹY򕭨ÁR®גûə¯ڃX끛j³畫Vk,¯\0P뽢@e²¹¥x¬V¾ºyT¤7u[J±\nD¯§eR¿¬mx&°lÀ\0)}ڊ¼,\0I؂ZƵ\$k!µ¨񙢲Á°Re/Q¾Àk°5.Áe­5À¨W`ª¥\0)Yv\"V0Ün%喠Yn¯աa��Q!,õ`\"	_.偩Ɩtm\$\"²J«¤֍À§vƥM9j°	斧Ī³Kp֔;\\R ¼ü3(§õ^¯:}ȯ|>µa-'U%w*#>¤@̬eJÿ¤;Pw/+¹ስE\rjn¡Ѓd��ú¯§cΰ¥u˺\\ؐ1mi\"xp僻£̮战P)䖸ªǣ±ؒ¡ˡAª;¨߉4쳛a{`aV{KUʸ㨟0''o2¨¢yc̸9]K逕ºҗ^𬁂⏲딣,du¤¾8¤?õՁ%¼gB»Yn+㥣¬e\0°񠤱Yr@f싨]ּ¨\nbizSS2£ÁGdBPj¹ր(ȥ¦!୧v²´eڪc\0ª4J槂ùՙ,Uȁ	dºɥ𪧔H]Ԋԇ!)uՖ¯үùZ˂5û̓W0\n±ᡛԆR«ÁW\\¦Q jĕ^rʥl̖3,ҙy׉f3&̖܎Ց:ϵ2mɒ)T¾(KRÁ 0ªʔ@«왴¢Y:£٥3\r%´¨°Tö%­XÁ¹STԮJ\\밙h􄅗D!ĺu檉U\"¾ŁÁo+7\"µf'º­R\0°ފõ2S2裮m »ÁI劜ý\"Xü³²[րѬ} J¨¯c¼9p0ªüՑ»(U\0£xDEW.LõÁ=<B԰+½)ZS V;✜ⵉ{5IA��dW²u赅w\n\$%ҁ½2i_\$ȅ٫즏,¬혋´ՑJg&J¡úGº%\\J·b.ĝ^LT򆬌薹]k#f@L·GĐT¼ٗҍHό\"q1S̰ùjVɨΙ욖z߅³,§ʨG.1Fû±gNʻױÊV¬¦5EͲ5`򜰃t聽F\nṛαKþ֜0­ۊ±%¨˄]Q\$\r\03J\\,͙³<T4*£Á.ҙK²D«Q錯S%,gԇ坪§ּ˫u0􍕝ĉ֗*x(©厂Yv!þ¥y͉wŴfdª¥rGM \$䪉^;º靮ݦ)<P㑝Dҥ%ӻԪʥI0桜ӵ^Jp[)¦v©3RhRúEöÀ\n斌_#5|ܾխ3P񪨜\Y51X	i³Nȇ񜤜"°ºaü­õh*KU݌¨嵲±%&r毑˚ ²5oէg³;ݲMl[ƨög³ùª·Uͱ깚h|ԥO2·f MlW2AP׹̀́v~eD¬e񳕔ӫlE62iüε쓕b̯¬«õU¬©¨ýªV𪩉!\$i¨ʭ&Z:½xm!ņ.֏ͦwү!̅ӫݤ̓6b\"«IJ]]:T6Җrú¹}ܝǫ]®±U¢	ys7fԍřÿ3܎Y󺔟Mͷ%3Ʈυ¥\nΦz*�h·	»`U²Lÿ,¥ۄе¨󶦃»Ûٴ2_Q¼h͓݇uD§\no£¹)¤ĜիM9¿7foۼ©¤r֝ǎWB~iTݥyQT⎜nd¦pr§#󍧂;4氪¼t꿖(;³5	|¬ǂ­',AV7ܔԥUAö&썒P¯\"䕹ҷ) [n̕񭳖ˬ?s6ºpù3fµ΁۹k|݉®Sf¬*@5ާ¼¾ɿ2·ͽ®þUüݙ𹦈Άl%®p«Ie³beMٓO\r[¼橲3fɎLVᎮrٵ®¾¥ێA:ڇy3Q_̸W.ѕȇ^Sl@&́5֙l̓1妎}Vxꞧʅ§^SnՓ̍Q!:5ךީZCԈ:¿3qg饄ᵝª{U¡3tZ¹`ûӵ%w:ɚQ:Q쏇W f¿9Jpl꩖3xԶ̾K7b#«ù½«瘫J(¢¨´쐪Ӂ´«Λþ¢!ה셏SL稪'¤¨\npBùڪgNʝ§8BuҪ邎¯狎½8niꈉͳ¸US͉;vvڳUõsR7Nu׸©H|�ӷ§̎«8򱴕ٞ+'џ͠x¢9R	ծº睍aR8úx䩐¸'!ϑ;±U¬י֓ݳNIg:ՋT빯3®g͙쫊k䣉ܳn'LO(¿3w4񕴮»¦Ǐڪþl¬񙎊½ªw½9ݜ\징󳨦(¢_~철}9Nö¦Ւ\0´墜"¢Y餃Th,ڞ¤@ú±D¡û\$I·;eü蕘ʿn¨³·,¹OªƉXÿg´-Àɫ>ti'Gölª%\0­8▂˕1«ye\0KTƁ4ûÁȭºV2)\r]I/\rFùԘ׀ߨ񡔷­G¹򪈧»ÿ>ER췰њ-)I\$®¹�¦a˜0¾Fyba٧«w§­(ߟ@§v}öiõʳ^˲5DԳЉȴURO±JH֜\ؙis𦆋KN±qi÷Sg׏\n²F~|«µϪ@gR_Q<9sܬ3i+ؗ².Cw²²꼂øy˶a쏜Y9¶¶ɖ\n딽-([®±_}퓻]c¤S=¿¤Ιþ΍ԙΠU-> <ú©µ\n<ֳO��¦^}\0007u䫨/ۯ5{Lÿ9µ\0§¬Ќ &³[<ϵsۜ0&ͨ#@h̩ª3©V}ОH¢*܈w+]'DЦ @§ց])µ蒻TGe3\\Ϊn®џˤ\$:¦uN4ŹktꭤR!7­ɥ4(P!-þ9À4矐MGbıw«؉6O§S¦F⭩§yh0+²§qT|·+uԿΫ A¬?򞉶T賮q 41T´¸e\n:P ø¯{T³먿«TS£­*«咫嵥>ú\\꾚镭ʮY췢wEJö%·sL±¾dªyÀ+\rC蜟¡'A񬬒y峾粋͗`º	_*ѐû ThKDV²·~5	ఴ+Ἤ-?­]º򳫖֍K嗠¯^¸¤I42(]ªw.憲Ċ˪]¬\nYƨB£­Љ³햽ЋR ¾ɧؽ:H§ퟨ�P²ꄜ"޵𴖜\¬<? >½嗡ÿ§ܬ݆¿=¦:\n0ר\\+񓖴榄ݕ³퉕,WCֈ蕏n¨򎅢§.e9|R÷I'©[ׯº²ęü2ù«Qӂn:Ɖõ\nö§g¼9Ɯrü,Ӓ6³ý璑\$Xݫ¸>©±`\nù)/_8QiԹµꚗ=궿5v\0 \n¨牌G¥Dmw\\놖Ѣ¯ÁdꟵ}s\"Ùv¤|♊*´9h­¡рXEUѪިoQ]\$B,û霋KTv¤AptCɃ\n׃,/<¡­ڙEW-V¡¢=Wÿ*%KꗭQ`9	(ʺ59Ӏ譩˘¸¨@粸 ýT@ے\nS¯bdׅδa+DXUډ	¡F® 2ú%5\njm«W٫xꈋ斌3#¶CTåk¤&ά£l¬jbd7)ӓ\"\n+쐼ºb艊@賑ܵjUҌEsޔԩD¢f뒃õûǐZ3AΌ՜nwTh𗲪ۘŴZ䪼ʵߩߔdq⋊u(÷bKG±ॖ逮Ӕﮈ]z¨f%#3I˦S¨®&}µ@D@++ù¤A�¿\nªޥ|B¡;UmљUEN¥!��1ҝ\0§GmvH~õÁH蔪)öW®³YNý\"垫5©ѶT#=µڥʼ\n}#R3YHŒ͋Iͳܦ;̑Rl£1l鵂%TQJºꈙ'ºE방¬dw,¥zʍ¥:\$¦;Ϳ ü¿)§��ʜ$32J}Ŧ[³\$¨ṍ¤;DnýE״À+0ۡZ{¨蛐C 軀(¤ꋺ¸ ڏ@hø²D£朰¡`PTou³įF®\rQvû¨o½ܡ\$S+ң7À¤Izrpk DWFs͹ Qꆠ Ђ°1gÀţ\0\\Lܤؙ 3g©Xy􆹠-3hÀþánX贝+±	ɝc\0Ȝ0¼b؅\0\rü-{\0ºQ(ퟱ�\$s0º魨°[Ru򖆷Ҙ>Ƙ¼+Ê[©6ђ\0֗ú\\´¶㬒邑K3ý.ꝡ_\0R򊠜Ɨ`^ԶClRۂIK\n \$®nŏҤ¥©\nÁ©~/¥ªmn].ª`��Ң¦#K¾f:`\0錀6¦7K▨zc􂜰ҵ¦/K®­/ªd􄩇FE\0aL¤dZ`J醓ϗʙ2؍4΀/ƨL򙵰ª`´ĩ_Lþ]4Zh��SD¦M4:cѩSR¥׍E4i򀩞SG¦EMj崺dԕ©SFKLª%4ªeԏ%\$ӬKM2õ1Țԩ¦Ә©MV­.¸ڔ֩´Ӂ©Lz/÷��ӄ¦э曬`_��S¦gMƜjg򩇓5¦9.9j_򩺓¥µ.Ź꟱򩾓¦.7ڲ򂩉ӥ§[2m8ºuT橙S±§3M:]3ºq褮ӱ§KN1|^ҫtϜ"ғH§gKj-;zc񩎓§\r<ꟲ-iʓ¸¥񜢖U.¹´󩫒ڑkOF�\\􏜤Zө§MLE­5úx��ӻ_\"֜=<\0񴩙S禹OҞ­1~öi²Ӵ§¹Oꝭ>꾱)򆸨 =6:~Ե㊔ϐ:ͽ¨唿)¢ƫ§ÿPJ8õ@귴��*§͏ʵ]>ªt÷£T\n§塜" 6Y	)Ȉ¨/Pª3ɉ鰆/P~ Ź	ªӮ¨!\"C̔ýj¡ ¨eNJ¡üꈱԪ%Դ¦1Q¡ŃZQjTBQ.¢\rE)\0004˪\$2¨SM+弪t¿j0Ԭ¦9Q¡}F\0\$±s©Ta¨KΣ]Ecj*'K»M¾MGx½՞Rǔ1¦#QꡥGª5ª:Ժ¨L¡4u6z\"j\"TKuN֣ýGڧ\$jFSܨ¤¥Hø"ꍔ©%R¤Hz՜$ª,Է¨Re.\$rªzµ)©۔¦©-Qö ͊¹ʪ@԰©=R&/Iʕ1*]T³À7¼¾QҥD&өqN¦_(´q²c[TwQR��J\0nⷔ­¨û.¦956cԜՓz¥HÁ7ªRԽSr8¥N՜"b֔见Q޵MNõ#㧔詅S§-HÁ7\"ܔü©_SꧽG،?*yԩS򧽐*5#ⶔ܍ϔ:§]PʟõC*ԉT:¨-K8ƵCªՖªR¦--MȾHªՠª'T¨­Hø˵Hªԑה¨풪£õ,⩔܋GTک-SJ¤õM*ԩUTکmMH¸õMªվªgSD³5MȂRªՈªwU\"©틸ՕRª Ԛ¡U*ª-U*¨ஂ¾TقIR­,t¢Z«՞Ꙝ¶IUF«51ª¬µW)vի_KƫpJ«5Zj­ů©R4r\n¬^jIӃKºª}Uʓ_ª°ԛª㏎¬=N·R*¯F-ª½R¬%Wգꦕ\\aV>«EYjµdªªԃ«UάµWX͵*ȕ¹UyõZ°1k㙕¨«7V¬R\\H͵h*֕¢©ϕƧM[²±k궕¸«3V򭽛(䵗ªzո«iB­Oº®1¯ꯔý«V®;­[øR懵«;T@0>\0ꯉ³ªÿW`흦��ª«¿P¯]ȍ1m*yUz¨mW¡õ|ªݓ[«¡֯]J¬ш긕±««ö¯Z*¤5\\jք«뗚ª��5~ª®E쬓Wú«4ZÁ5h£Q՞cXZ®Sú®1o«Vª¹U&«Tºĵ}cU^X°dm*³±kUu¥«SfG=[¹õj䳕¿Ϙ¦Kc\n®iR∧«i#±uWt»µª½¥º«»XգĹ«U¬rڢõUZՇNE¢¬Xº¬4ڈud귅䬥V^²틚ɠnⲖ8sX¥ͦǵ/¨J³-J]ӂӎÁպO±<Eh\$勓·¡󜰋뼢w񅾓·øN\")]b£	⫺ꮣS.¢iF牣£µQNQ«閪ª雎úވO[X¤nx¤P	k­§oNø£}<aO򧉟Áh·ºT;򲄱¤VD6Q߻z]jד~':떛Iv��ʑ§ցj뺷[«ù殺眊ņ¥:u ńs#¦¿Μ\wµ<n|*ቨ뭎Kv;Y҈±ڗ3ᝌ«^#Zªj¥gy³jħY,%;3¾³ʚù׮ȗ\"Ü$ٳ>gڜºϓϦªVT󚎪¥hYݪkD*!h&Xz˩ª¥+GV­\"¥渚:Ҥ§+NoG¥Zjj¥iɝʞkOП­֬ԐmjIª¨§t¯#½[⪜rn㪩וЮߚ¥_,թ󏧞΄©:¹¼ŹÁÿ«[L2®W=Tԗ0®㦶\0P®U6\ns%7isY濣¿u᳾½nb5¡«»X|G~l&׫¤¥·M§ ¯ú¶Ϲ¡SɩΝܭr·¶ٸµ¸欖ꛅ?սu'n0W-ι®柢·´Ǫ쵟k?»vQý7ܽp\n쵀͙®Z*»9)ʡ5ޕZW­-ZB¸²:쵣«W\0WZfpGpõ®:Fpú¤䕙듎/Ϝ\©ܥs9¬S{§ ׸®Ϛ͡sʛ+¢N^®9MջP5ӧ ב®ԮJº¢«y§õը;ڮz¸Yږ ĳ:Dŉë燽¯£19M;º¥��´®\rQ{ꉕ®¶ū£FCLĹN¥©Ԉ\\ùީ\$i۝N'\0¦°Põʇ]X̞s1򦝦\"'<Oø󿚌¡ˌ\0¹\"@֌¥%䐶úAõ1ýi(z̨݁\rҕ䱈bZÀ+IQOﳀº˜r=*ĉ )񨡁 Рª¼h°,ЫmGPCˁ ٲ탁(ZŰ%t쬅h/ÁiȜk¬«¡XEJ6𱄉D般\"\n- «\nvy°_Ăګ¯k	a½B<ǖۄ»/P»��)9L㶨Z°8ꁶvùث	§oКXk䑥§|´&°.¦±C¹ء°`1]7&ę+H¤CBcXB7xX󼎱0¦㡚6°ubpJLǅ(·÷mbl8I¶*Rö@tk0¡¯ŸXۖÁӻÁŠal]4s°t¿텪𰧣'´欟`8M8ÀßD4w`p?@706g̈~K±\rۛ P´٢h\"&¯\n챑PDȐγ\$ШͰQP<÷°Ȁ㬌Q!X´xúԵR·`w/2°2#À¸ `¬»1/܁\r¡ֺ²±¢£B7öV7ZgMYúH3ȠٖbΉZÁӊŶGⷙgl^ƭR-!ͬ7̲Lõư<1 톑C/ղh¼ةϗ6C	÷*dþ6]VK!m션ܣ05G\$Rµ4¯±=Cw&[揋«YP²dɚ³')VK,¨5eȜrފ膋+ﱛX)bۥ)ĢuF2A#EѦg~e¡yfp5¨lYl²Ԝ5õö¿֜n٭}`(¬M Pl9Yÿfø±ý֝Vl-4é¦«>`À/û³fPEi\0kvƜ0ߦhS0±&͂¦lͼ¢#fu同û5	i%ÿ:Fdö9؀G<䝉{ö}삳[7\0ᬎ3�:+.Ȕp >ؕ±£@!Pas6q,À³1bǬŋ㚄K°걜-úar`?RxXÁ鑡ϖﺘ#ĤԺ; ÀD¾H²Á1¥6D`þYꠌ÷RŐ֋>-ơ\$ٹ³엾πЅ۠>ٯ³õh԰��À¬&\0è뻐IwlûZ\$\\\r¡8¶~,\nºo_ဂ2D´a1고ǩ=¢v<ϫF´p``kBF¶6 Ė²hƉT T֎	@?drѥJÀH@1°G´dnÁҷƄ%䚊GҰb𔦝m(ث´qg\\�󸖗¬밪 ȑ3vk'ý^d´¨AXÿ~ǗVsª¼ʱ椴ûM À¬@?²Ěӽ§6\\m9<Β±iݧԬh½^s}武[Ks±q㢎ӭöOORm8\$޹wĎ죐#°@❷\0�� 5F7ö¨ X\nӚÀ|J˚/-SW!fǅ 0¶,w½¨D4١RU¥T´ZXǽ�W\$@┥(XG§Ҋµa>֪ûY¶²\n³ü\n욡«[mjµ0,mu¬W@ FXúڎ򝰼=­ (¦ý­b¿ý<!\n\"ª83ç¦(Rݜn>ù@¨W¦r!L£Hū̜rE\nWƞ\r¢'FH\$£䤀mȽԛ¥{LY&ќ£_\0Ƽݣ¢䔀[9\0¤\"ԓҙ@8ĩKª¹ö0٬ѐp\ngۧqbFع᫣l@9ۨ#JU«ݲ{io­¥.{Ԉͳ4ޖ́VnFɸ𑼺ΠQޞ\$kSa~ʨ0s@£À«%y@À5HN΍¦´@x#	ܫ /\\¥ֿ<hڂù¼IT :3Ün%¸");}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001\0\0\0\0\0!ù\0\0\0,\0\0\0\0\0\0!©˭M񌪩¾oú¯) q¡eµ򌋅\0;";break;case"cross.gif":echo"GIF89a\0\0\0001\0\0\0\0\0!ù\0\0\0,\0\0\0\0\0\0#©˭#\naֆo~yî_waᱧ±J׶]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001\0\0\0\0\0!ù\0\0\0,\0\0\0\0\0\0 ©˭MQN\nｓ��8yaŶ®\0ǲ\0;";break;case"down.gif":echo"GIF89a\0\0\0001\0\0\0\0\0!ù\0\0\0,\0\0\0\0\0\0 ©˭M񌪩¾[Wþ\\¢ǌ&ٜƶ\0ǲ\0;";break;case"arrow.gif":echo"GIF89a\0\n\0\0\0ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0i±ªӲ޻\0\0;";break;}}exit;}if($_GET["script"]=="version"){$kd=file_open_lock(get_temp_dir()."/adminer.version");if($kd)file_write_unlock($kd,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$g,$m,$gc,$oc,$yc,$n,$md,$sd,$ba,$Td,$x,$ca,$oe,$sf,$dg,$Jh,$xd,$qi,$wi,$U,$Ki,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$ba=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$Qf=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Qf[]=true;call_user_func_array('session_set_cookie_params',$Qf);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Xc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'en';}function
lang($vi,$jf=null){if(is_array($vi)){$gg=($jf==1?0:1);$vi=$vi[$gg];}$vi=str_replace("%d","%s",$vi);$jf=format_number($jf);return
sprintf($vi,$jf);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$gg=array_search("SQL",$b->operators);if($gg!==false)unset($b->operators[$gg]);}function
dsn($lc,$V,$E,$_f=array()){try{parent::__construct($lc,$V,$E,$_f);}catch(Exception$Cc){auth_error(h($Cc->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($F,$Ei=false){$G=parent::query($F);$this->error="";if(!$G){list(,$this->errno,$this->error)=$this->errorInfo();if(!$this->error)$this->error='Unknown error.';return
false;}$this->store_result($G);return$G;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result($G=null){if(!$G){$G=$this->_result;if(!$G)return
false;}if($G->columnCount()){$G->num_rows=$G->rowCount();return$G;}$this->affected_rows=$G->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($F,$o=0){$G=$this->query($F);if(!$G)return
false;$I=$G->fetch();return$I[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$I=(object)$this->getColumnMeta($this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=(in_array("blob",(array)$I->flags)?63:0);return$I;}}}$gc=array();class
Min_SQL{var$_conn;function
__construct($g){$this->_conn=$g;}function
select($Q,$K,$Z,$pd,$Bf=array(),$z=1,$D=0,$og=false){global$b,$x;$ae=(count($pd)<count($K));$F=$b->selectQueryBuild($K,$Z,$pd,$Bf,$z,$D);if(!$F)$F="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$pd&&$ae&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$K)."\nFROM ".table($Q),($Z?"\nWHERE ".implode(" AND ",$Z):"").($pd&&$ae?"\nGROUP BY ".implode(", ",$pd):"").($Bf?"\nORDER BY ".implode(", ",$Bf):""),($z!=""?+$z:null),($D?$z*$D:0),"\n");$Fh=microtime(true);$H=$this->_conn->query($F);if($og)echo$b->selectQuery($F,$Fh,!$H);return$H;}function
delete($Q,$yg,$z=0){$F="FROM ".table($Q);return
queries("DELETE".($z?limit1($Q,$F,$yg):" $F$yg"));}function
update($Q,$N,$yg,$z=0,$L="\n"){$Xi=array();foreach($N
as$y=>$X)$Xi[]="$y = $X";$F=table($Q)." SET$L".implode(",$L",$Xi);return
queries("UPDATE".($z?limit1($Q,$F,$yg,$L):" $F$yg"));}function
insert($Q,$N){return
queries("INSERT INTO ".table($Q).($N?" (".implode(", ",array_keys($N)).")\nVALUES (".implode(", ",$N).")":" DEFAULT VALUES"));}function
insertUpdate($Q,$J,$mg){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($F,$hi){}function
convertSearch($u,$X,$o){return$u;}function
value($X,$o){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$o):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($ah){return
q($ah);}function
warnings(){return'';}function
tableHelp($B){}}$gc["sqlite"]="SQLite 3";$gc["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$jg=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($Wc){$this->_link=new
SQLite3($Wc);$aj=$this->_link->version();$this->server_info=$aj["versionString"];}function
query($F){$G=@$this->_link->query($F);$this->error="";if(!$G){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($G->numColumns())return
new
Min_Result($G);$this->affected_rows=$this->_link->changes();return
true;}function
quote($P){return(is_utf8($P)?"'".$this->_link->escapeString($P)."'":"x'".reset(unpack('H*',$P))."'");}function
store_result(){return$this->_result;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->_result->fetchArray();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$T=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$T,"charsetnr"=>($T==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($Wc){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($Wc);}function
query($F,$Ei=false){$Te=($Ei?"unbufferedQuery":"query");$G=@$this->_link->$Te($F,SQLITE_BOTH,$n);$this->error="";if(!$G){$this->error=$n;return
false;}elseif($G===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($G);}function
quote($P){return"'".sqlite_escape_string($P)."'";}function
store_result(){return$this->_result;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->_result->fetch();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;if(method_exists($G,'numRows'))$this->num_rows=$G->numRows();}function
fetch_assoc(){$I=$this->_result->fetch(SQLITE_ASSOC);if(!$I)return
false;$H=array();foreach($I
as$y=>$X)$H[($y[0]=='"'?idf_unescape($y):$y)]=$X;return$H;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$B=$this->_result->fieldName($this->_offset++);$cg='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($cg\\.)?$cg\$~",$B,$A)){$Q=($A[3]!=""?$A[3]:idf_unescape($A[2]));$B=($A[5]!=""?$A[5]:idf_unescape($A[4]));}return(object)array("name"=>$B,"orgname"=>$B,"orgtable"=>$Q,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($Wc){$this->dsn(DRIVER.":$Wc","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($Wc){if(is_readable($Wc)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$Wc)?$Wc:dirname($_SERVER["SCRIPT_FILENAME"])."/$Wc")." AS a")){parent::__construct($Wc);$this->query("PRAGMA foreign_keys = 1");return
true;}return
false;}function
multi_query($F){return$this->_result=$this->query($F);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$mg){$Xi=array();foreach($J
as$N)$Xi[]="(".implode(", ",$N).")";return
queries("REPLACE INTO ".table($Q)." (".implode(", ",array_keys(reset($J))).") VALUES\n".implode(",\n",$Xi));}function
tableHelp($B){if($B=="sqlite_sequence")return"fileformat2.html#seqtab";if($B=="sqlite_master")return"fileformat2.html#$B";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;list(,,$E)=$b->credentials();if($E!="")return'Database does not support password.';return
new
Min_DB;}function
get_databases(){return
array();}function
limit($F,$Z,$z,$C=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($C?" OFFSET $C":""):"");}function
limit1($Q,$F,$Z,$L="\n"){global$g;return(preg_match('~^INTO~',$F)||$g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($F,$Z,1,0,$L):" $F WHERE rowid = (SELECT rowid FROM ".table($Q).$Z.$L."LIMIT 1)");}function
db_collation($l,$pb){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($k){return
array();}function
table_status($B=""){global$g;$H=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$I){$I["Rows"]=$g->result("SELECT COUNT(*) FROM ".idf_escape($I["Name"]));$H[$I["Name"]]=$I;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$I)$H[$I["name"]]["Auto_increment"]=$I["seq"];return($B!=""?$H[$B]:$H);}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){global$g;return!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($Q){global$g;$H=array();$mg="";foreach(get_rows("PRAGMA table_info(".table($Q).")")as$I){$B=$I["name"];$T=strtolower($I["type"]);$Ub=$I["dflt_value"];$H[$B]=array("field"=>$B,"type"=>(preg_match('~int~i',$T)?"integer":(preg_match('~char|clob|text~i',$T)?"text":(preg_match('~blob~i',$T)?"blob":(preg_match('~real|floa|doub~i',$T)?"real":"numeric")))),"full_type"=>$T,"default"=>(preg_match("~'(.*)'~",$Ub,$A)?str_replace("''","'",$A[1]):($Ub=="NULL"?null:$Ub)),"null"=>!$I["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$I["pk"],);if($I["pk"]){if($mg!="")$H[$mg]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$T))$H[$B]["auto_increment"]=true;$mg=$B;}}$Ah=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Ah,$Fe,PREG_SET_ORDER);foreach($Fe
as$A){$B=str_replace('""','"',preg_replace('~^"|"$~','',$A[1]));if($H[$B])$H[$B]["collation"]=trim($A[3],"'");}return$H;}function
indexes($Q,$h=null){global$g;if(!is_object($h))$h=$g;$H=array();$Ah=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($Q));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Ah,$A)){$H[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$A[1],$Fe,PREG_SET_ORDER);foreach($Fe
as$A){$H[""]["columns"][]=idf_unescape($A[2]).$A[4];$H[""]["descs"][]=(preg_match('~DESC~i',$A[5])?'1':null);}}if(!$H){foreach(fields($Q)as$B=>$o){if($o["primary"])$H[""]=array("type"=>"PRIMARY","columns"=>array($B),"lengths"=>array(),"descs"=>array(null));}}$Dh=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($Q),$h);foreach(get_rows("PRAGMA index_list(".table($Q).")",$h)as$I){$B=$I["name"];$v=array("type"=>($I["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($B).")",$h)as$Zg){$v["columns"][]=$Zg["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($B).' ON '.idf_escape($Q),'~').' \((.*)\)$~i',$Dh[$B],$Jg)){preg_match_all('/("[^"]*+")+( DESC)?/',$Jg[2],$Fe);foreach($Fe[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$H[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$H[""]["columns"]||$v["descs"]!=$H[""]["descs"]||!preg_match("~^sqlite_~",$B))$H[$B]=$v;}return$H;}function
foreign_keys($Q){$H=array();foreach(get_rows("PRAGMA foreign_key_list(".table($Q).")")as$I){$q=&$H[$I["id"]];if(!$q)$q=$I;$q["source"][]=$I["from"];$q["target"][]=$I["to"];}return$H;}function
view($B){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($B))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
check_sqlite_name($B){global$g;$Mc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Mc)\$~",$B)){$g->error=sprintf('Please use one of the extensions %s.',str_replace("|",", ",$Mc));return
false;}return
true;}function
create_database($l,$d){global$g;if(file_exists($l)){$g->error='File exists.';return
false;}if(!check_sqlite_name($l))return
false;try{$_=new
Min_SQLite($l);}catch(Exception$Cc){$g->error=$Cc->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$g;$g->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$g->error='File exists.';return
false;}}return
true;}function
rename_database($B,$d){global$g;if(!check_sqlite_name($B))return
false;$g->__construct(":memory:");$g->error='File exists.';return@rename(DB,$B);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($Q,$B,$p,$ed,$ub,$wc,$d,$Ma,$Wf){global$g;$Qi=($Q==""||$ed);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Qi=true;break;}}$c=array();$Kf=array();foreach($p
as$o){if($o[1]){$c[]=($Qi?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$Kf[$o[0]]=$o[1][0];}}if(!$Qi){foreach($c
as$X){if(!queries("ALTER TABLE ".table($Q)." $X"))return
false;}if($Q!=$B&&!queries("ALTER TABLE ".table($Q)." RENAME TO ".table($B)))return
false;}elseif(!recreate_table($Q,$B,$c,$Kf,$ed,$Ma))return
false;if($Ma){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $Ma WHERE name = ".q($B));if(!$g->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($B).", $Ma)");queries("COMMIT");}return
true;}function
recreate_table($Q,$B,$p,$Kf,$ed,$Ma,$w=array()){global$g;if($Q!=""){if(!$p){foreach(fields($Q)as$y=>$o){if($w)$o["auto_increment"]=0;$p[]=process_field($o,$o);$Kf[$y]=idf_escape($y);}}$ng=false;foreach($p
as$o){if($o[6])$ng=true;}$jc=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$jc[$X[1]]=true;unset($w[$y]);}}foreach(indexes($Q)as$ie=>$v){$f=array();foreach($v["columns"]as$y=>$e){if(!$Kf[$e])continue
2;$f[]=$Kf[$e].($v["descs"][$y]?" DESC":"");}if(!$jc[$ie]){if($v["type"]!="PRIMARY"||!$ng)$w[]=array($v["type"],$ie,$f);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$ed[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($Q)as$ie=>$q){foreach($q["source"]as$y=>$e){if(!$Kf[$e])continue
2;$q["source"][$y]=idf_unescape($Kf[$e]);}if(!isset($ed[" $ie"]))$ed[]=" ".format_foreign_key($q);}queries("BEGIN");}foreach($p
as$y=>$o)$p[$y]="  ".implode($o);$p=array_merge($p,array_filter($ed));$bi=($Q==$B?"adminer_$B":$B);if(!queries("CREATE TABLE ".table($bi)." (\n".implode(",\n",$p)."\n)"))return
false;if($Q!=""){if($Kf&&!queries("INSERT INTO ".table($bi)." (".implode(", ",$Kf).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Kf)))." FROM ".table($Q)))return
false;$Bi=array();foreach(triggers($Q)as$_i=>$ii){$zi=trigger($_i);$Bi[]="CREATE TRIGGER ".idf_escape($_i)." ".implode(" ",$ii)." ON ".table($B)."\n$zi[Statement]";}$Ma=$Ma?0:$g->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($Q));if(!queries("DROP TABLE ".table($Q))||($Q==$B&&!queries("ALTER TABLE ".table($bi)." RENAME TO ".table($B)))||!alter_indexes($B,$w))return
false;if($Ma)queries("UPDATE sqlite_sequence SET seq = $Ma WHERE name = ".q($B));foreach($Bi
as$zi){if(!queries($zi))return
false;}queries("COMMIT");}return
true;}function
index_sql($Q,$T,$B,$f){return"CREATE $T ".($T!="INDEX"?"INDEX ":"").idf_escape($B!=""?$B:uniqid($Q."_"))." ON ".table($Q)." $f";}function
alter_indexes($Q,$c){foreach($c
as$mg){if($mg[0]=="PRIMARY")return
recreate_table($Q,$Q,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($Q,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($S){return
apply_queries("DELETE FROM",$S);}function
drop_views($cj){return
apply_queries("DROP VIEW",$cj);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
move_tables($S,$cj,$Zh){return
false;}function
trigger($B){global$g;if($B=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$Ai=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$Ai["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$g->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($B)),$A);$lf=$A[3];return
array("Timing"=>strtoupper($A[1]),"Event"=>strtoupper($A[2]).($lf?" OF":""),"Of"=>($lf[0]=='`'||$lf[0]=='"'?idf_unescape($lf):$lf),"Trigger"=>$B,"Statement"=>$A[4],);}function
triggers($Q){$H=array();$Ai=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q))as$I){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$Ai["Timing"]).')\s*(.*?)\s+ON\b~i',$I["sql"],$A);$H[$I["name"]]=array($A[1],$A[2]);}return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ROWID()");}function
explain($g,$F){return$g->query("EXPLAIN QUERY PLAN $F");}function
found_rows($R,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($dh){return
true;}function
create_sql($Q,$Ma,$Kh){global$g;$H=$g->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($Q));foreach(indexes($Q)as$B=>$v){if($B=='')continue;$H.=";\n\n".index_sql($Q,$v['type'],$B,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$H;}function
truncate_sql($Q){return"DELETE FROM ".table($Q);}function
use_sql($j){}function
trigger_sql($Q){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($Q)));}function
show_variables(){global$g;$H=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$H[$y]=$g->result("PRAGMA $y");return$H;}function
show_status(){$H=array();foreach(get_vals("PRAGMA compile_options")as$zf){list($y,$X)=explode("=",$zf,2);$H[$y]=$X;}return$H;}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($Rc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Rc);}$x="sqlite";$U=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Jh=array_keys($U);$Ki=array();$xf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$md=array("hex","length","lower","round","unixepoch","upper");$sd=array("avg","count","count distinct","group_concat","max","min","sum");$oc=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$gc["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$jg=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($zc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$E){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($E,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$aj=pg_version($this->_link);$this->server_info=$aj["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($P){return"'".pg_escape_string($this->_link,$P)."'";}function
value($X,$o){return($o["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($P){return"'".pg_escape_bytea($this->_link,$P)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$H=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($H)$this->_link=$H;return$H;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($F,$Ei=false){$G=@pg_query($this->_link,$F);$this->error="";if(!$G){$this->error=pg_last_error($this->_link);$H=false;}elseif(!pg_num_fields($G)){$this->affected_rows=pg_affected_rows($G);$H=true;}else$H=new
Min_Result($G);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$H;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);if(!$G||!$G->num_rows)return
false;return
pg_fetch_result($G->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($G){$this->_result=$G;$this->num_rows=pg_num_rows($G);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$H=new
stdClass;if(function_exists('pg_field_table'))$H->orgtable=pg_field_table($this->_result,$e);$H->name=pg_field_name($this->_result,$e);$H->orgname=$H->name;$H->type=pg_field_type($this->_result,$e);$H->charsetnr=($H->type=="bytea"?63:0);return$H;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($M,$V,$E){global$b;$l=$b->database();$P="pgsql:host='".str_replace(":","' port='",addcslashes($M,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$P dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$E);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
quoteBinary($ah){return
q($ah);}function
query($F,$Ei=false){$H=parent::query($F,$Ei);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$H;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$mg){global$g;foreach($J
as$N){$Li=array();$Z=array();foreach($N
as$y=>$X){$Li[]="$y = $X";if(isset($mg[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($Q)." SET ".implode(", ",$Li)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($Q)." (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).")")))return
false;}return
true;}function
slowQuery($F,$hi){$this->_conn->query("SET statement_timeout = ".(1000*$hi));$this->_conn->timeout=1000*$hi;return$F;}function
convertSearch($u,$X,$o){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$o["type"])?$u:"CAST($u AS text)");}function
quoteBinary($ah){return$this->_conn->quoteBinary($ah);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($B){$ye=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$_=$ye[$_GET["ns"]];if($_)return"$_-".str_replace("_","-",$B).".html";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$Jh;$g=new
Min_DB;$Ib=$b->credentials();if($g->connect($Ib[0],$Ib[1],$Ib[2])){if(min_version(9,0,$g)){$g->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$g)){$Jh['Strings'][]="json";$U["json"]=4294967295;if(min_version(9.4,0,$g)){$Jh['Strings'][]="jsonb";$U["jsonb"]=4294967295;}}}return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($F,$Z,$z,$C=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($C?" OFFSET $C":""):"");}function
limit1($Q,$F,$Z,$L="\n"){return(preg_match('~^INTO~',$F)?limit($F,$Z,1,0,$L):" $F".(is_view(table_status1($Q))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($Q).$Z.$L."LIMIT 1)"));}function
db_collation($l,$pb){global$g;return$g->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){$F="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$F.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$F.="
ORDER BY 1";return
get_key_vals($F);}function
count_tables($k){return
array();}function
table_status($B=""){$H=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f')
".($B!=""?"AND relname = ".q($B):"ORDER BY relname"))as$I)$H[$I["Name"]]=$I;return($B!=""?$H[$B]:$H);}function
is_view($R){return
in_array($R["Engine"],array("view","materialized view"));}function
fk_support($R){return
true;}function
fields($Q){$H=array();$Ca=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);$Fd=min_version(10)?"(a.attidentity = 'd')::int":'0';foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment, $Fd AS identity
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($Q)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$I){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$I["full_type"],$A);list(,$T,$ve,$I["length"],$wa,$Fa)=$A;$I["length"].=$Fa;$eb=$T.$wa;if(isset($Ca[$eb])){$I["type"]=$Ca[$eb];$I["full_type"]=$I["type"].$ve.$Fa;}else{$I["type"]=$T;$I["full_type"]=$I["type"].$ve.$wa.$Fa;}if($I['identity'])$I['default']='GENERATED BY DEFAULT AS IDENTITY';$I["null"]=!$I["attnotnull"];$I["auto_increment"]=$I['identity']||preg_match('~^nextval\(~i',$I["default"]);$I["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$I["default"],$A))$I["default"]=($A[1]=="NULL"?null:(($A[1][0]=="'"?idf_unescape($A[1]):$A[1]).$A[2]));$H[$I["field"]]=$I;}return$H;}function
indexes($Q,$h=null){global$g;if(!is_object($h))$h=$g;$H=array();$Sh=$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($Q));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Sh AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Sh AND ci.oid = i.indexrelid",$h)as$I){$Kg=$I["relname"];$H[$Kg]["type"]=($I["indispartial"]?"INDEX":($I["indisprimary"]?"PRIMARY":($I["indisunique"]?"UNIQUE":"INDEX")));$H[$Kg]["columns"]=array();foreach(explode(" ",$I["indkey"])as$Pd)$H[$Kg]["columns"][]=$f[$Pd];$H[$Kg]["descs"]=array();foreach(explode(" ",$I["indoption"])as$Qd)$H[$Kg]["descs"][]=($Qd&1?'1':null);$H[$Kg]["lengths"]=array();}return$H;}function
foreign_keys($Q){global$sf;$H=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($Q)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$I){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$I['definition'],$A)){$I['source']=array_map('trim',explode(',',$A[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$A[2],$Ee)){$I['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Ee[2]));$I['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Ee[4]));}$I['target']=array_map('trim',explode(',',$A[3]));$I['on_delete']=(preg_match("~ON DELETE ($sf)~",$A[4],$Ee)?$Ee[1]:'NO ACTION');$I['on_update']=(preg_match("~ON UPDATE ($sf)~",$A[4],$Ee)?$Ee[1]:'NO ACTION');$H[$I['conname']]=$I;}}return$H;}function
view($B){global$g;return
array("select"=>trim($g->result("SELECT pg_get_viewdef(".$g->result("SELECT oid FROM pg_class WHERE relname = ".q($B)).")")));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$g;$H=h($g->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$H,$A))$H=$A[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($A[3]).'})(.*)~','\1<b>\2</b>',$A[2]).$A[4];return
nl_br($H);}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($k){global$g;$g->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($B,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($B));}function
auto_increment(){return"";}function
alter_table($Q,$B,$p,$ed,$ub,$wc,$d,$Ma,$Wf){$c=array();$xg=array();if($Q!=""&&$Q!=$B)$xg[]="ALTER TABLE ".table($Q)." RENAME TO ".table($B);foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Wi=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($Q!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$xg[]="ALTER TABLE ".table($B)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Wi!="")$xg[]="COMMENT ON COLUMN ".table($B).".$X[0] IS ".($Wi!=""?substr($Wi,9):"''");}}$c=array_merge($c,$ed);if($Q=="")array_unshift($xg,"CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($xg,"ALTER TABLE ".table($Q)."\n".implode(",\n",$c));if($Q!=""||$ub!="")$xg[]="COMMENT ON TABLE ".table($B)." IS ".q($ub);if($Ma!=""){}foreach($xg
as$F){if(!queries($F))return
false;}return
true;}function
alter_indexes($Q,$c){$i=array();$hc=array();$xg=array();foreach($c
as$X){if($X[0]!="INDEX")$i[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$hc[]=idf_escape($X[1]);else$xg[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q)." (".implode(", ",$X[2]).")";}if($i)array_unshift($xg,"ALTER TABLE ".table($Q).implode(",",$i));if($hc)array_unshift($xg,"DROP INDEX ".implode(", ",$hc));foreach($xg
as$F){if(!queries($F))return
false;}return
true;}function
truncate_tables($S){return
queries("TRUNCATE ".implode(", ",array_map('table',$S)));return
true;}function
drop_views($cj){return
drop_tables($cj);}function
drop_tables($S){foreach($S
as$Q){$O=table_status($Q);if(!queries("DROP ".strtoupper($O["Engine"])." ".table($Q)))return
false;}return
true;}function
move_tables($S,$cj,$Zh){foreach(array_merge($S,$cj)as$Q){$O=table_status($Q);if(!queries("ALTER ".strtoupper($O["Engine"])." ".table($Q)." SET SCHEMA ".idf_escape($Zh)))return
false;}return
true;}function
trigger($B,$Q=null){if($B=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($Q===null)$Q=$_GET['trigger'];$J=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($Q).' AND t.trigger_name = '.q($B));return
reset($J);}function
triggers($Q){$H=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($Q))as$I)$H[$I["trigger_name"]]=array($I["action_timing"],$I["event_manipulation"]);return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($B,$T){$J=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($B));$H=$J[0];$H["returns"]=array("type"=>$H["type_udt_name"]);$H["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($B).'
ORDER BY ordinal_position');return$H;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($B,$I){$H=array();foreach($I["fields"]as$o)$H[]=$o["type"];return
idf_escape($B)."(".implode(", ",$H).")";}function
last_id(){return
0;}function
explain($g,$F){return$g->query("EXPLAIN $F");}function
found_rows($R,$Z){global$g;if(preg_match("~ rows=([0-9]+)~",$g->result("EXPLAIN SELECT * FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Jg))return$Jg[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$g;return$g->result("SELECT current_schema()");}function
set_schema($ch,$h=null){global$g,$U,$Jh;if(!$h)$h=$g;$H=$h->query("SET search_path TO ".idf_escape($ch));foreach(types()as$T){if(!isset($U[$T])){$U[$T]=0;$Jh['User types'][]=$T;}}return$H;}function
create_sql($Q,$Ma,$Kh){global$g;$H='';$Sg=array();$mh=array();$O=table_status($Q);if(is_view($O)){$bj=view($Q);return
rtrim("CREATE VIEW ".idf_escape($Q)." AS $bj[select]",";");}$p=fields($Q);$w=indexes($Q);ksort($w);$bd=foreign_keys($Q);ksort($bd);if(!$O||empty($p))return
false;$H="CREATE TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." (\n    ";foreach($p
as$Tc=>$o){$Tf=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$Sg[]=$Tf;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$Fe)){$lh=$Fe[1];$_h=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($lh):"SELECT * FROM $lh"));$mh[]=($Kh=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $lh;\n":"")."CREATE SEQUENCE $lh INCREMENT $_h[increment_by] MINVALUE $_h[min_value] MAXVALUE $_h[max_value] START ".($Ma?$_h['last_value']:1)." CACHE $_h[cache_value];";}}if(!empty($mh))$H=implode("\n\n",$mh)."\n\n$H";foreach($w
as$Kd=>$v){switch($v['type']){case'UNIQUE':$Sg[]="CONSTRAINT ".idf_escape($Kd)." UNIQUE (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;case'PRIMARY':$Sg[]="CONSTRAINT ".idf_escape($Kd)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;}}foreach($bd
as$ad=>$Zc)$Sg[]="CONSTRAINT ".idf_escape($ad)." $Zc[definition] ".($Zc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE');$H.=implode(",\n    ",$Sg)."\n) WITH (oids = ".($O['Oid']?'true':'false').");";foreach($w
as$Kd=>$v){if($v['type']=='INDEX'){$f=array();foreach($v['columns']as$y=>$X)$f[]=idf_escape($X).($v['descs'][$y]?" DESC":"");$H.="\n\nCREATE INDEX ".idf_escape($Kd)." ON ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." USING btree (".implode(', ',$f).");";}}if($O['Comment'])$H.="\n\nCOMMENT ON TABLE ".idf_escape($O['nspname']).".".idf_escape($O['Name'])." IS ".q($O['Comment']).";";foreach($p
as$Tc=>$o){if($o['comment'])$H.="\n\nCOMMENT ON COLUMN ".idf_escape($O['nspname']).".".idf_escape($O['Name']).".".idf_escape($Tc)." IS ".q($o['comment']).";";}return
rtrim($H,';');}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
trigger_sql($Q){$O=table_status($Q);$H="";foreach(triggers($Q)as$yi=>$xi){$zi=trigger($yi,$O['Name']);$H.="\nCREATE TRIGGER ".idf_escape($zi['Trigger'])." $zi[Timing] $zi[Events] ON ".idf_escape($O["nspname"]).".".idf_escape($O['Name'])." $zi[Type] $zi[Statement];;\n";}return$H;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($Rc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$Rc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$g;return$g->result("SHOW max_connections");}$x="pgsql";$U=array();$Jh=array();foreach(array('Numbers'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Date and time'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'Strings'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binary'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Network'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometry'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$U+=$X;$Jh[$y]=array_keys($X);}$Ki=array();$xf=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$md=array("char_length","lower","round","to_hex","to_timestamp","upper");$sd=array("avg","count","count distinct","max","min","sum");$oc=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$gc["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$jg=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($zc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($M,$V,$E){$this->_link=@oci_new_connect($V,$E,$M,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return
true;}function
query($F,$Ei=false){$G=oci_parse($this->_link,$F);$this->error="";if(!$G){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$H=@oci_execute($G);restore_error_handler();if($H){if(oci_num_fields($G))return
new
Min_Result($G);$this->affected_rows=oci_num_rows($G);}return$H;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=1){$G=$this->query($F);if(!is_object($G)||!oci_fetch($G->_result))return
false;return
oci_result($G->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($G){$this->_result=$G;}function
_convert($I){foreach((array)$I
as$y=>$X){if(is_a($X,'OCI-Lob'))$I[$y]=$X->load();}return$I;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$H=new
stdClass;$H->name=oci_field_name($this->_result,$e);$H->orgname=$H->name;$H->type=oci_field_type($this->_result,$e);$H->charsetnr=(preg_match("~raw|blob|bfile~",$H->type)?63:0);return$H;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($M,$V,$E){$this->dsn("oci:dbname=//$M;charset=AL32UTF8",$V,$E);return
true;}function
select_db($j){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$Ib=$b->credentials();if($g->connect($Ib[0],$Ib[1],$Ib[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($F,$Z,$z,$C=0,$L=" "){return($C?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $F$Z) t WHERE rownum <= ".($z+$C).") WHERE rnum > $C":($z!==null?" * FROM (SELECT $F$Z) WHERE rownum <= ".($z+$C):" $F$Z"));}function
limit1($Q,$F,$Z,$L="\n"){return" $F$Z";}function
db_collation($l,$pb){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($k){return
array();}function
table_status($B=""){$H=array();$eh=q($B);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($B!=""?" AND table_name = $eh":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($B!=""?" WHERE view_name = $eh":"")."
ORDER BY 1")as$I){if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]=="view";}function
fk_support($R){return
true;}function
fields($Q){$H=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($Q)." ORDER BY column_id")as$I){$T=$I["DATA_TYPE"];$ve="$I[DATA_PRECISION],$I[DATA_SCALE]";if($ve==",")$ve=$I["DATA_LENGTH"];$H[$I["COLUMN_NAME"]]=array("field"=>$I["COLUMN_NAME"],"full_type"=>$T.($ve?"($ve)":""),"type"=>strtolower($T),"length"=>$ve,"default"=>$I["DATA_DEFAULT"],"null"=>($I["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$H;}function
indexes($Q,$h=null){$H=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($Q)."
ORDER BY uc.constraint_type, uic.column_position",$h)as$I){$Kd=$I["INDEX_NAME"];$H[$Kd]["type"]=($I["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($I["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$H[$Kd]["columns"][]=$I["COLUMN_NAME"];$H[$Kd]["lengths"][]=($I["CHAR_LENGTH"]&&$I["CHAR_LENGTH"]!=$I["COLUMN_LENGTH"]?$I["CHAR_LENGTH"]:null);$H[$Kd]["descs"][]=($I["DESCEND"]?'1':null);}return$H;}function
view($B){$J=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($B));return
reset($J);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
explain($g,$F){$g->query("EXPLAIN PLAN FOR $F");return$g->query("SELECT * FROM plan_table");}function
found_rows($R,$Z){}function
alter_table($Q,$B,$p,$ed,$ub,$wc,$d,$Ma,$Wf){$c=$hc=array();foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($Q)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");if($X)$c[]=($Q!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($Q!=""?")":"");else$hc[]=idf_escape($o[0]);}if($Q=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($Q)."\n".implode("\n",$c)))&&(!$hc||queries("ALTER TABLE ".table($Q)." DROP (".implode(", ",$hc).")"))&&($Q==$B||queries("ALTER TABLE ".table($Q)." RENAME TO ".table($B)));}function
foreign_keys($Q){$H=array();$F="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($Q);foreach(get_rows($F)as$I)$H[$I['NAME']]=array("db"=>$I['DEST_DB'],"table"=>$I['DEST_TABLE'],"source"=>array($I['SRC_COLUMN']),"target"=>array($I['DEST_COLUMN']),"on_delete"=>$I['ON_DELETE'],"on_update"=>null,);return$H;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($cj){return
apply_queries("DROP VIEW",$cj);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$g;return$g->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($dh,$h=null){global$g;if(!$h)$h=$g;return$h->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($dh));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$J=get_rows('SELECT * FROM v$instance');return
reset($J);}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($Rc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Rc);}$x="oracle";$U=array();$Jh=array();foreach(array('Numbers'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Date and time'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Strings'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binary'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$U+=$X;$Jh[$y]=array_keys($X);}$Ki=array();$xf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$md=array("length","lower","round","upper");$sd=array("avg","count","count distinct","max","min","sum");$oc=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$gc["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$jg=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($M,$V,$E){global$b;$l=$b->database();$zb=array("UID"=>$V,"PWD"=>$E,"CharacterSet"=>"UTF-8");if($l!="")$zb["Database"]=$l;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$M),$zb);if($this->_link){$Rd=sqlsrv_server_info($this->_link);$this->server_info=$Rd['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($F,$Ei=false){$G=sqlsrv_query($this->_link,$F);$this->error="";if(!$G){$this->_get_error();return
false;}return$this->store_result($G);}function
multi_query($F){$this->_result=sqlsrv_query($this->_link,$F);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($G=null){if(!$G)$G=$this->_result;if(!$G)return
false;if(sqlsrv_field_metadata($G))return
new
Min_Result($G);$this->affected_rows=sqlsrv_rows_affected($G);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;$I=$G->fetch_row();return$I[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($G){$this->_result=$G;}function
_convert($I){foreach((array)$I
as$y=>$X){if(is_a($X,'DateTime'))$I[$y]=$X->format("Y-m-d H:i:s");}return$I;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$H=new
stdClass;$H->name=$o["Name"];$H->orgname=$o["Name"];$H->type=($o["Type"]==1?254:0);return$H;}function
seek($C){for($s=0;$s<$C;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($M,$V,$E){$this->_link=@mssql_connect($M,$V,$E);if($this->_link){$G=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($G){$I=$G->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$I[0]] $I[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($F,$Ei=false){$G=@mssql_query($F,$this->_link);$this->error="";if(!$G){$this->error=mssql_get_last_message();return
false;}if($G===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($F,$o=0){$G=$this->query($F);if(!is_object($G))return
false;return
mssql_result($G->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($G){$this->_result=$G;$this->num_rows=mssql_num_rows($G);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$H=mssql_fetch_field($this->_result);$H->orgtable=$H->table;$H->orgname=$H->name;return$H;}function
seek($C){mssql_data_seek($this->_result,$C);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($M,$V,$E){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$E);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($Q,$J,$mg){foreach($J
as$N){$Li=array();$Z=array();foreach($N
as$y=>$X){$Li[]="$y = $X";if(isset($mg[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($Q)." USING (VALUES(".implode(", ",$N).")) AS source (c".implode(", c",range(1,count($N))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Li)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($N)).") VALUES (".implode(", ",$N).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$Ib=$b->credentials();if($g->connect($Ib[0],$Ib[1],$Ib[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($F,$Z,$z,$C=0,$L=" "){return($z!==null?" TOP (".($z+$C).")":"")." $F$Z";}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$pb){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$g;$H=array();foreach($k
as$l){$g->select_db($l);$H[$l]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$H;}function
table_status($B=""){$H=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$I){if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]=="VIEW";}function
fk_support($R){return
true;}function
fields($Q){$wb=get_key_vals("SELECT objname, cast(value as varchar) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($Q).", 'column', NULL)");$H=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($Q))as$I){$T=$I["type"];$ve=(preg_match("~char|binary~",$T)?$I["max_length"]:($T=="decimal"?"$I[precision],$I[scale]":""));$H[$I["name"]]=array("field"=>$I["name"],"full_type"=>$T.($ve?"($ve)":""),"type"=>$T,"length"=>$ve,"default"=>$I["default"],"null"=>$I["is_nullable"],"auto_increment"=>$I["is_identity"],"collation"=>$I["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$I["is_identity"],"comment"=>$wb[$I["name"]],);}return$H;}function
indexes($Q,$h=null){$H=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($Q),$h)as$I){$B=$I["name"];$H[$B]["type"]=($I["is_primary_key"]?"PRIMARY":($I["is_unique"]?"UNIQUE":"INDEX"));$H[$B]["lengths"]=array();$H[$B]["columns"][$I["key_ordinal"]]=$I["column_name"];$H[$B]["descs"][$I["key_ordinal"]]=($I["is_descending_key"]?'1':null);}return$H;}function
view($B){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($B))));}function
collations(){$H=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$H[preg_replace('~_.*~','',$d)][]=$d;return$H;}function
information_schema($l){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$g->error)));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($B,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($B));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($Q,$B,$p,$ed,$ub,$wc,$d,$Ma,$Wf){$c=array();$wb=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$wb[$o[0]]=$X[5];unset($X[5]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($Q==""?substr($ed[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($Q).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($Q=="")return
queries("CREATE TABLE ".table($B)." (".implode(",",(array)$c["ADD"])."\n)");if($Q!=$B)queries("EXEC sp_rename ".q(table($Q)).", ".q($B));if($ed)$c[""]=$ed;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($B)." $y".implode(",",$X)))return
false;}foreach($wb
as$y=>$X){$ub=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($B).", @level2type = N'Column', @level2name = ".q($y));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$ub.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($B).", @level2type = N'Column', @level2name = ".q($y));}return
true;}function
alter_indexes($Q,$c){$v=array();$hc=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$hc[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($Q);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($Q."_"))." ON ".table($Q):"ALTER TABLE ".table($Q)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$hc||queries("ALTER TABLE ".table($Q)." DROP ".implode(", ",$hc)));}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$F){$g->query("SET SHOWPLAN_ALL ON");$H=$g->query($F);$g->query("SET SHOWPLAN_ALL OFF");return$H;}function
found_rows($R,$Z){}function
foreign_keys($Q){$H=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($Q))as$I){$q=&$H[$I["FK_NAME"]];$q["db"]=$I["PKTABLE_QUALIFIER"];$q["table"]=$I["PKTABLE_NAME"];$q["source"][]=$I["FKCOLUMN_NAME"];$q["target"][]=$I["PKCOLUMN_NAME"];}return$H;}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($cj){return
queries("DROP VIEW ".implode(", ",array_map('table',$cj)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$cj,$Zh){return
apply_queries("ALTER SCHEMA ".idf_escape($Zh)." TRANSFER",array_merge($S,$cj));}function
trigger($B){if($B=="")return
array();$J=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($B));$H=reset($J);if($H)$H["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$H["text"]);return$H;}function
triggers($Q){$H=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($Q))as$I)$H[$I["name"]]=array($I["Timing"],$I["Event"]);return$H;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$g;if($_GET["ns"]!="")return$_GET["ns"];return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($ch){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
support($Rc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$Rc);}$x="mssql";$U=array();$Jh=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Date and time'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Strings'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binary'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$U+=$X;$Jh[$y]=array_keys($X);}$Ki=array();$xf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$md=array("len","lower","round","upper");$sd=array("avg","count","count distinct","max","min","sum");$oc=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$gc['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$jg=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($M,$V,$E){$this->_link=ibase_connect($M,$V,$E);if($this->_link){$Oi=explode(':',$M);$this->service_link=ibase_service_attach($Oi[0],$V,$E);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($P){return"'".str_replace("'","''",$P)."'";}function
select_db($j){return($j=="domain");}function
query($F,$Ei=false){$G=ibase_query($F,$this->_link);if(!$G){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($G===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);if(!$G||!$G->num_rows)return
false;$I=$G->fetch_row();return$I[$o];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($G){$this->_result=$G;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$o=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$o['name'],'orgname'=>$o['name'],'type'=>$o['type'],'charsetnr'=>$o['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$Ib=$b->credentials();if($g->connect($Ib[0],$Ib[1],$Ib[2]))return$g;return$g->error;}function
get_databases($cd){return
array("domain");}function
limit($F,$Z,$z,$C=0,$L=" "){$H='';$H.=($z!==null?$L."FIRST $z".($C?" SKIP $C":""):"");$H.=" $F$Z";return$H;}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$pb){}function
engines(){return
array();}function
logged_user(){global$b;$Ib=$b->credentials();return$Ib[1];}function
tables_list(){global$g;$F='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$G=ibase_query($g->_link,$F);$H=array();while($I=ibase_fetch_assoc($G))$H[$I['RDB$RELATION_NAME']]='table';ksort($H);return$H;}function
count_tables($k){return
array();}function
table_status($B="",$Qc=false){global$g;$H=array();$Nb=tables_list();foreach($Nb
as$v=>$X){$v=trim($v);$H[$v]=array('Name'=>$v,'Engine'=>'standard',);if($B==$v)return$H[$v];}return$H;}function
is_view($R){return
false;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"]);}function
fields($Q){global$g;$H=array();$F='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($Q).'
ORDER BY r.RDB$FIELD_POSITION';$G=ibase_query($g->_link,$F);while($I=ibase_fetch_assoc($G))$H[trim($I['FIELD_NAME'])]=array("field"=>trim($I["FIELD_NAME"]),"full_type"=>trim($I["FIELD_TYPE"]),"type"=>trim($I["FIELD_SUB_TYPE"]),"default"=>trim($I['FIELD_DEFAULT_VALUE']),"null"=>(trim($I["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($I["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($I["FIELD_DESCRIPTION"]),);return$H;}function
indexes($Q,$h=null){$H=array();return$H;}function
foreign_keys($Q){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($ch){return
true;}function
support($Rc){return
preg_match("~^(columns|sql|status|table)$~",$Rc);}$x="firebird";$xf=array("=");$md=array();$sd=array();$oc=array();}$gc["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$jg=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($j){return($j=="domain");}function
query($F,$Ei=false){$Qf=array('SelectExpression'=>$F,'ConsistentRead'=>'true');if($this->next)$Qf['NextToken']=$this->next;$G=sdb_request_all('Select','Item',$Qf,$this->timeout);$this->timeout=0;if($G===false)return$G;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$F)){$Nh=0;foreach($G
as$de)$Nh+=$de->Attribute->Value;$G=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Nh,))));}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($P){return"'".str_replace("'","''",$P)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($G){foreach($G
as$de){$I=array();if($de->Name!='')$I['itemName()']=(string)$de->Name;foreach($de->Attribute
as$Ia){$B=$this->_processValue($Ia->Name);$Y=$this->_processValue($Ia->Value);if(isset($I[$B])){$I[$B]=(array)$I[$B];$I[$B][]=$Y;}else$I[$B]=$Y;}$this->_rows[]=$I;foreach($I
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($rc){return(is_object($rc)&&$rc['encoding']=='base64'?base64_decode($rc):(string)$rc);}function
fetch_assoc(){$I=current($this->_rows);if(!$I)return$I;$H=array();foreach($this->_rows[0]as$y=>$X)$H[$y]=$I[$y];next($this->_rows);return$H;}function
fetch_row(){$H=$this->fetch_assoc();if(!$H)return$H;return
array_values($H);}function
fetch_field(){$je=array_keys($this->_rows[0]);return(object)array('name'=>$je[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$mg="itemName()";function
_chunkRequest($Gd,$va,$Qf,$Gc=array()){global$g;foreach(array_chunk($Gd,25)as$ib){$Rf=$Qf;foreach($ib
as$s=>$t){$Rf["Item.$s.ItemName"]=$t;foreach($Gc
as$y=>$X)$Rf["Item.$s.$y"]=$X;}if(!sdb_request($va,$Rf))return
false;}$g->affected_rows=count($Gd);return
true;}function
_extractIds($Q,$yg,$z){$H=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$yg,$Fe))$H=array_map('idf_unescape',$Fe[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($Q).$yg.($z?" LIMIT 1":"")))as$de)$H[]=$de->Name;}return$H;}function
select($Q,$K,$Z,$pd,$Bf=array(),$z=1,$D=0,$og=false){global$g;$g->next=$_GET["next"];$H=parent::select($Q,$K,$Z,$pd,$Bf,$z,$D,$og);$g->next=0;return$H;}function
delete($Q,$yg,$z=0){return$this->_chunkRequest($this->_extractIds($Q,$yg,$z),'BatchDeleteAttributes',array('DomainName'=>$Q));}function
update($Q,$N,$yg,$z=0,$L="\n"){$Xb=array();$Vd=array();$s=0;$Gd=$this->_extractIds($Q,$yg,$z);$t=idf_unescape($N["`itemName()`"]);unset($N["`itemName()`"]);foreach($N
as$y=>$X){$y=idf_unescape($y);if($X=="NULL"||($t!=""&&array($t)!=$Gd))$Xb["Attribute.".count($Xb).".Name"]=$y;if($X!="NULL"){foreach((array)$X
as$fe=>$W){$Vd["Attribute.$s.Name"]=$y;$Vd["Attribute.$s.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$fe)$Vd["Attribute.$s.Replace"]="true";$s++;}}}$Qf=array('DomainName'=>$Q);return(!$Vd||$this->_chunkRequest(($t!=""?array($t):$Gd),'BatchPutAttributes',$Qf,$Vd))&&(!$Xb||$this->_chunkRequest($Gd,'BatchDeleteAttributes',$Qf,$Xb));}function
insert($Q,$N){$Qf=array("DomainName"=>$Q);$s=0;foreach($N
as$B=>$Y){if($Y!="NULL"){$B=idf_unescape($B);if($B=="itemName()")$Qf["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$Qf["Attribute.$s.Name"]=$B;$Qf["Attribute.$s.Value"]=(is_array($Y)?$X:idf_unescape($Y));$s++;}}}}return
sdb_request('PutAttributes',$Qf);}function
insertUpdate($Q,$J,$mg){foreach($J
as$N){if(!$this->update($Q,$N,"WHERE `itemName()` = ".q($N["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}function
slowQuery($F,$hi){$this->_conn->timeout=$hi;return$F;}}function
connect(){global$b;list(,,$E)=$b->credentials();if($E!="")return'Database does not support password.';return
new
Min_DB;}function
support($Rc){return
preg_match('~sql~',$Rc);}function
logged_user(){global$b;$Ib=$b->credentials();return$Ib[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($l,$pb){}function
tables_list(){global$g;$H=array();foreach(sdb_request_all('ListDomains','DomainName')as$Q)$H[(string)$Q]='table';if($g->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$H;}function
table_status($B="",$Qc=false){$H=array();foreach(($B!=""?array($B=>true):tables_list())as$Q=>$T){$I=array("Name"=>$Q,"Auto_increment"=>"");if(!$Qc){$Se=sdb_request('DomainMetadata',array('DomainName'=>$Q));if($Se){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$y=>$X)$I[$y]=(string)$Se->$X;}}if($B!="")return$I;$H[$Q]=$I;}return$H;}function
explain($g,$F){}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($Q){return
fields_from_edit();}function
foreign_keys($Q){return
array();}function
table($u){return
idf_escape($u);}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
limit($F,$Z,$z,$C=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z":"");}function
unconvert_field($o,$H){return$H;}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$B,$p,$ed,$ub,$wc,$d,$Ma,$Wf){return($Q==""&&sdb_request('CreateDomain',array('DomainName'=>$B)));}function
drop_tables($S){foreach($S
as$Q){if(!sdb_request('DeleteDomain',array('DomainName'=>$Q)))return
false;}return
true;}function
count_tables($k){foreach($k
as$l)return
array($l=>count(tables_list()));}function
found_rows($R,$Z){return($Z?null:$R["Rows"]);}function
last_id(){}function
hmac($Ba,$Nb,$y,$Bg=false){$Va=64;if(strlen($y)>$Va)$y=pack("H*",$Ba($y));$y=str_pad($y,$Va,"\0");$ge=$y^str_repeat("\x36",$Va);$he=$y^str_repeat("\x5C",$Va);$H=$Ba($he.pack("H*",$Ba($ge.$Nb)));if($Bg)$H=pack("H*",$H);return$H;}function
sdb_request($va,$Qf=array()){global$b,$g;list($Cd,$Qf['AWSAccessKeyId'],$fh)=$b->credentials();$Qf['Action']=$va;$Qf['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$Qf['Version']='2009-04-15';$Qf['SignatureVersion']=2;$Qf['SignatureMethod']='HmacSHA1';ksort($Qf);$F='';foreach($Qf
as$y=>$X)$F.='&'.rawurlencode($y).'='.rawurlencode($X);$F=str_replace('%7E','~',substr($F,1));$F.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$Cd)."\n/\n$F",$fh,true)));@ini_set('track_errors',1);$Vc=@file_get_contents((preg_match('~^https?://~',$Cd)?$Cd:"http://$Cd"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$F,'ignore_errors'=>1,))));if(!$Vc){$g->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$pj=simplexml_load_string($Vc);if(!$pj){$n=libxml_get_last_error();$g->error=$n->message;return
false;}if($pj->Errors){$n=$pj->Errors->Error;$g->error="$n->Message ($n->Code)";return
false;}$g->error='';$Yh=$va."Result";return($pj->$Yh?$pj->$Yh:true);}function
sdb_request_all($va,$Yh,$Qf=array(),$hi=0){$H=array();$Fh=($hi?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$Qf['SelectExpression'],$A)?$A[1]:0);do{$pj=sdb_request($va,$Qf);if(!$pj)break;foreach($pj->$Yh
as$rc)$H[]=$rc;if($z&&count($H)>=$z){$_GET["next"]=$pj->NextToken;break;}if($hi&&microtime(true)-$Fh>$hi)return
false;$Qf['NextToken']=$pj->NextToken;if($z)$Qf['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($H),$Qf['SelectExpression']);}while($pj->NextToken);return$H;}$x="simpledb";$xf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$md=array();$sd=array("count");$oc=array(array("json"));}$gc["mongo"]="MongoDB";if(isset($_GET["mongo"])){$jg=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Mi,$_f){return@new
MongoClient($Mi,$_f);}function
query($F){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$Cc){$this->error=$Cc->getMessage();return
false;}}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($G){foreach($G
as$de){$I=array();foreach($de
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$I[$y]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$I;foreach($I
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);if(!$I)return$I;$H=array();foreach($this->_rows[0]as$y=>$X)$H[$y]=$I[$y];next($this->_rows);return$H;}function
fetch_row(){$H=$this->fetch_assoc();if(!$H)return$H;return
array_values($H);}function
fetch_field(){$je=array_keys($this->_rows[0]);$B=$je[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$mg="_id";function
select($Q,$K,$Z,$pd,$Bf=array(),$z=1,$D=0,$og=false){$K=($K==array("*")?array():array_fill_keys($K,true));$xh=array();foreach($Bf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Fb);$xh[$X]=($Fb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($Q)->find(array(),$K)->sort($xh)->limit($z!=""?+$z:0)->skip($D*$z));}function
insert($Q,$N){try{$H=$this->_conn->_db->selectCollection($Q)->insert($N);$this->_conn->errno=$H['code'];$this->_conn->error=$H['err'];$this->_conn->last_id=$N['_id'];return!$H['err'];}catch(Exception$Cc){$this->_conn->error=$Cc->getMessage();return
false;}}}function
get_databases($cd){global$g;$H=array();$Sb=$g->_link->listDBs();foreach($Sb['databases']as$l)$H[]=$l['name'];return$H;}function
count_tables($k){global$g;$H=array();foreach($k
as$l)$H[$l]=count($g->_link->selectDB($l)->getCollectionNames(true));return$H;}function
tables_list(){global$g;return
array_fill_keys($g->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$g;foreach($k
as$l){$Og=$g->_link->selectDB($l)->drop();if(!$Og['ok'])return
false;}return
true;}function
indexes($Q,$h=null){global$g;$H=array();foreach($g->_db->selectCollection($Q)->getIndexInfo()as$v){$ac=array();foreach($v["key"]as$e=>$T)$ac[]=($T==-1?'1':null);$H[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$ac,);}return$H;}function
fields($Q){return
fields_from_edit();}function
found_rows($R,$Z){global$g;return$g->_db->selectCollection($_GET["select"])->count($Z);}$xf=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Mi,$_f){$kb='MongoDB\Driver\Manager';return
new$kb($Mi,$_f);}function
query($F){return
false;}function
select_db($j){$this->_db_name=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($G){foreach($G
as$de){$I=array();foreach($de
as$y=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$y]=63;$I[$y]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$I;foreach($I
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=$G->count;}function
fetch_assoc(){$I=current($this->_rows);if(!$I)return$I;$H=array();foreach($this->_rows[0]as$y=>$X)$H[$y]=$I[$y];next($this->_rows);return$H;}function
fetch_row(){$H=$this->fetch_assoc();if(!$H)return$H;return
array_values($H);}function
fetch_field(){$je=array_keys($this->_rows[0]);$B=$je[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$mg="_id";function
select($Q,$K,$Z,$pd,$Bf=array(),$z=1,$D=0,$og=false){global$g;$K=($K==array("*")?array():array_fill_keys($K,1));if(count($K)&&!isset($K['_id']))$K['_id']=0;$Z=where_to_query($Z);$xh=array();foreach($Bf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Fb);$xh[$X]=($Fb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$z=$_GET['limit'];$z=min(200,max(1,(int)$z));$uh=$D*$z;$kb='MongoDB\Driver\Query';$F=new$kb($Z,array('projection'=>$K,'limit'=>$z,'skip'=>$uh,'sort'=>$xh));$Rg=$g->_link->executeQuery("$g->_db_name.$Q",$F);return
new
Min_Result($Rg);}function
update($Q,$N,$yg,$z=0,$L="\n"){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($yg);$kb='MongoDB\Driver\BulkWrite';$Za=new$kb(array());if(isset($N['_id']))unset($N['_id']);$Lg=array();foreach($N
as$y=>$Y){if($Y=='NULL'){$Lg[$y]=1;unset($N[$y]);}}$Li=array('$set'=>$N);if(count($Lg))$Li['$unset']=$Lg;$Za->update($Z,$Li,array('upsert'=>false));$Rg=$g->_link->executeBulkWrite("$l.$Q",$Za);$g->affected_rows=$Rg->getModifiedCount();return
true;}function
delete($Q,$yg,$z=0){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($yg);$kb='MongoDB\Driver\BulkWrite';$Za=new$kb(array());$Za->delete($Z,array('limit'=>$z));$Rg=$g->_link->executeBulkWrite("$l.$Q",$Za);$g->affected_rows=$Rg->getDeletedCount();return
true;}function
insert($Q,$N){global$g;$l=$g->_db_name;$kb='MongoDB\Driver\BulkWrite';$Za=new$kb(array());if(isset($N['_id'])&&empty($N['_id']))unset($N['_id']);$Za->insert($N);$Rg=$g->_link->executeBulkWrite("$l.$Q",$Za);$g->affected_rows=$Rg->getInsertedCount();return
true;}}function
get_databases($cd){global$g;$H=array();$kb='MongoDB\Driver\Command';$sb=new$kb(array('listDatabases'=>1));$Rg=$g->_link->executeCommand('admin',$sb);foreach($Rg
as$Sb){foreach($Sb->databases
as$l)$H[]=$l->name;}return$H;}function
count_tables($k){$H=array();return$H;}function
tables_list(){global$g;$kb='MongoDB\Driver\Command';$sb=new$kb(array('listCollections'=>1));$Rg=$g->_link->executeCommand($g->_db_name,$sb);$qb=array();foreach($Rg
as$G)$qb[$G->name]='table';return$qb;}function
drop_databases($k){return
false;}function
indexes($Q,$h=null){global$g;$H=array();$kb='MongoDB\Driver\Command';$sb=new$kb(array('listIndexes'=>$Q));$Rg=$g->_link->executeCommand($g->_db_name,$sb);foreach($Rg
as$v){$ac=array();$f=array();foreach(get_object_vars($v->key)as$e=>$T){$ac[]=($T==-1?'1':null);$f[]=$e;}$H[$v->name]=array("type"=>($v->name=="_id_"?"PRIMARY":(isset($v->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$ac,);}return$H;}function
fields($Q){$p=fields_from_edit();if(!count($p)){global$m;$G=$m->select($Q,array("*"),null,null,array(),10);while($I=$G->fetch_assoc()){foreach($I
as$y=>$X){$I[$y]=null;$p[$y]=array("field"=>$y,"type"=>"string","null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$p;}function
found_rows($R,$Z){global$g;$Z=where_to_query($Z);$kb='MongoDB\Driver\Command';$sb=new$kb(array('count'=>$R['Name'],'query'=>$Z));$Rg=$g->_link->executeCommand($g->_db_name,$sb);$pi=$Rg->toArray();return$pi[0]->n;}function
sql_query_where_parser($yg){$yg=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$yg));$yg=preg_replace('/\)\)\)$/',')',$yg);$mj=explode(' AND ',$yg);$nj=explode(') OR (',$yg);$Z=array();foreach($mj
as$kj)$Z[]=trim($kj);if(count($nj)==1)$nj=array();elseif(count($nj)>1)$Z=array();return
where_to_query($Z,$nj);}function
where_to_query($ij=array(),$jj=array()){global$b;$Nb=array();foreach(array('and'=>$ij,'or'=>$jj)as$T=>$Z){if(is_array($Z)){foreach($Z
as$Jc){list($nb,$vf,$X)=explode(" ",$Jc,3);if($nb=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$kb='MongoDB\BSON\ObjectID';$X=new$kb($X);}if(!in_array($vf,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$vf,$A)){$X=(float)$X;$vf=$A[1];}elseif(preg_match('~^\(date\)(.+)~',$vf,$A)){$Pb=new
DateTime($X);$kb='MongoDB\BSON\UTCDatetime';$X=new$kb($Pb->getTimestamp()*1000);$vf=$A[1];}switch($vf){case'=':$vf='$eq';break;case'!=':$vf='$ne';break;case'>':$vf='$gt';break;case'<':$vf='$lt';break;case'>=':$vf='$gte';break;case'<=':$vf='$lte';break;case'regex':$vf='$regex';break;default:continue
2;}if($T=='and')$Nb['$and'][]=array($nb=>array($vf=>$X));elseif($T=='or')$Nb['$or'][]=array($nb=>array($vf=>$X));}}}return$Nb;}$xf=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($u){return$u;}function
idf_escape($u){return$u;}function
table_status($B="",$Qc=false){$H=array();foreach(tables_list()as$Q=>$T){$H[$Q]=array("Name"=>$Q);if($B==$Q)return$H[$Q];}return$H;}function
create_database($l,$d){return
true;}function
last_id(){global$g;return$g->last_id;}function
error(){global$g;return
h($g->error);}function
collations(){return
array();}function
logged_user(){global$b;$Ib=$b->credentials();return$Ib[1];}function
connect(){global$b;$g=new
Min_DB;list($M,$V,$E)=$b->credentials();$_f=array();if($V.$E!=""){$_f["username"]=$V;$_f["password"]=$E;}$l=$b->database();if($l!="")$_f["db"]=$l;if(($La=getenv("MONGO_AUTH_SOURCE")))$_f["authSource"]=$La;try{$g->_link=$g->connect("mongodb://$M",$_f);if($E!=""){$_f["password"]="";try{$g->connect("mongodb://$M",$_f);return'Database does not support password.';}catch(Exception$Cc){}}return$g;}catch(Exception$Cc){return$Cc->getMessage();}}function
alter_indexes($Q,$c){global$g;foreach($c
as$X){list($T,$B,$N)=$X;if($N=="DROP")$H=$g->_db->command(array("deleteIndexes"=>$Q,"index"=>$B));else{$f=array();foreach($N
as$e){$e=preg_replace('~ DESC$~','',$e,1,$Fb);$f[$e]=($Fb?-1:1);}$H=$g->_db->selectCollection($Q)->ensureIndex($f,array("unique"=>($T=="UNIQUE"),"name"=>$B,));}if($H['errmsg']){$g->error=$H['errmsg'];return
false;}}return
true;}function
support($Rc){return
preg_match("~database|indexes|descidx~",$Rc);}function
db_collation($l,$pb){}function
information_schema(){}function
is_view($R){}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
foreign_keys($Q){return
array();}function
fk_support($R){}function
engines(){return
array();}function
alter_table($Q,$B,$p,$ed,$ub,$wc,$d,$Ma,$Wf){global$g;if($Q==""){$g->_db->createCollection($B);return
true;}}function
drop_tables($S){global$g;foreach($S
as$Q){$Og=$g->_db->selectCollection($Q)->drop();if(!$Og['ok'])return
false;}return
true;}function
truncate_tables($S){global$g;foreach($S
as$Q){$Og=$g->_db->selectCollection($Q)->remove();if(!$Og['ok'])return
false;}return
true;}$x="mongo";$md=array();$sd=array();$oc=array(array("json"));}$gc["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$jg=array("json + allow_url_fopen");define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($ag,$Ab=array(),$Te='GET'){@ini_set('track_errors',1);$Vc=@file_get_contents("$this->_url/".ltrim($ag,'/'),false,stream_context_create(array('http'=>array('method'=>$Te,'content'=>$Ab===null?$Ab:json_encode($Ab),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$Vc){$this->error=$php_errormsg;return$Vc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Vc;return
false;}$H=json_decode($Vc,true);if($H===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$_b=get_defined_constants(true);foreach($_b['json']as$B=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$B)){$this->error=$B;break;}}}}return$H;}function
query($ag,$Ab=array(),$Te='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($ag,'/'),$Ab,$Te);}function
connect($M,$V,$E){preg_match('~^(https?://)?(.*)~',$M,$A);$this->_url=($A[1]?$A[1]:"http://")."$V:$E@$A[2]";$H=$this->query('');if($H)$this->server_info=$H['version']['number'];return(bool)$H;}function
select_db($j){$this->_db=$j;return
true;}function
quote($P){return$P;}}class
Min_Result{var$num_rows,$_rows;function
__construct($J){$this->num_rows=count($J);$this->_rows=$J;reset($this->_rows);}function
fetch_assoc(){$H=current($this->_rows);next($this->_rows);return$H;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($Q,$K,$Z,$pd,$Bf=array(),$z=1,$D=0,$og=false){global$b;$Nb=array();$F="$Q/_search";if($K!=array("*"))$Nb["fields"]=$K;if($Bf){$xh=array();foreach($Bf
as$nb){$nb=preg_replace('~ DESC$~','',$nb,1,$Fb);$xh[]=($Fb?array($nb=>"desc"):$nb);}$Nb["sort"]=$xh;}if($z){$Nb["size"]=+$z;if($D)$Nb["from"]=($D*$z);}foreach($Z
as$X){list($nb,$vf,$X)=explode(" ",$X,3);if($nb=="_id")$Nb["query"]["ids"]["values"][]=$X;elseif($nb.$X!=""){$ci=array("term"=>array(($nb!=""?$nb:"_all")=>$X));if($vf=="=")$Nb["query"]["filtered"]["filter"]["and"][]=$ci;else$Nb["query"]["filtered"]["query"]["bool"]["must"][]=$ci;}}if($Nb["query"]&&!$Nb["query"]["filtered"]["query"]&&!$Nb["query"]["ids"])$Nb["query"]["filtered"]["query"]=array("match_all"=>array());$Fh=microtime(true);$eh=$this->_conn->query($F,$Nb);if($og)echo$b->selectQuery("$F: ".json_encode($Nb),$Fh,!$eh);if(!$eh)return
false;$H=array();foreach($eh['hits']['hits']as$Bd){$I=array();if($K==array("*"))$I["_id"]=$Bd["_id"];$p=$Bd['_source'];if($K!=array("*")){$p=array();foreach($K
as$y)$p[$y]=$Bd['fields'][$y];}foreach($p
as$y=>$X){if($Nb["fields"])$X=$X[0];$I[$y]=(is_array($X)?json_encode($X):$X);}$H[]=$I;}return
new
Min_Result($H);}function
update($T,$Cg,$yg,$z=0,$L="\n"){$Yf=preg_split('~ *= *~',$yg);if(count($Yf)==2){$t=trim($Yf[1]);$F="$T/$t";return$this->_conn->query($F,$Cg,'POST');}return
false;}function
insert($T,$Cg){$t="";$F="$T/$t";$Og=$this->_conn->query($F,$Cg,'POST');$this->_conn->last_id=$Og['_id'];return$Og['created'];}function
delete($T,$yg,$z=0){$Gd=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Gd[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$db){$Yf=preg_split('~ *= *~',$db);if(count($Yf)==2)$Gd[]=trim($Yf[1]);}}$this->_conn->affected_rows=0;foreach($Gd
as$t){$F="{$T}/{$t}";$Og=$this->_conn->query($F,'{}','DELETE');if(is_array($Og)&&$Og['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$g=new
Min_DB;list($M,$V,$E)=$b->credentials();if($E!=""&&$g->connect($M,$V,""))return'Database does not support password.';if($g->connect($M,$V,$E))return$g;return$g->error;}function
support($Rc){return
preg_match("~database|table|columns~",$Rc);}function
logged_user(){global$b;$Ib=$b->credentials();return$Ib[1];}function
get_databases(){global$g;$H=$g->rootQuery('_aliases');if($H){$H=array_keys($H);sort($H,SORT_STRING);}return$H;}function
collations(){return
array();}function
db_collation($l,$pb){}function
engines(){return
array();}function
count_tables($k){global$g;$H=array();$G=$g->query('_stats');if($G&&$G['indices']){$Od=$G['indices'];foreach($Od
as$Nd=>$Gh){$Md=$Gh['total']['indexing'];$H[$Nd]=$Md['index_total'];}}return$H;}function
tables_list(){global$g;$H=$g->query('_mapping');if($H)$H=array_fill_keys(array_keys($H[$g->_db]["mappings"]),'table');return$H;}function
table_status($B="",$Qc=false){global$g;$eh=$g->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$H=array();if($eh){$S=$eh["aggregations"]["count_by_type"]["buckets"];foreach($S
as$Q){$H[$Q["key"]]=array("Name"=>$Q["key"],"Engine"=>"table","Rows"=>$Q["doc_count"],);if($B!=""&&$B==$Q["key"])return$H[$B];}}return$H;}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($R){}function
indexes($Q,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($Q){global$g;$G=$g->query("$Q/_mapping");$H=array();if($G){$Be=$G[$Q]['properties'];if(!$Be)$Be=$G[$g->_db]['mappings'][$Q]['properties'];if($Be){foreach($Be
as$B=>$o){$H[$B]=array("field"=>$B,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($H[$B]["privileges"]["insert"]);unset($H[$B]["privileges"]["update"]);}}}}return$H;}function
foreign_keys($Q){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($o){}function
unconvert_field($o,$H){return$H;}function
fk_support($R){}function
found_rows($R,$Z){return
null;}function
create_database($l){global$g;return$g->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$g;return$g->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($Q,$B,$p,$ed,$ub,$wc,$d,$Ma,$Wf){global$g;$ug=array();foreach($p
as$Oc){$Tc=trim($Oc[1][0]);$Uc=trim($Oc[1][1]?$Oc[1][1]:"text");$ug[$Tc]=array('type'=>$Uc);}if(!empty($ug))$ug=array('properties'=>$ug);return$g->query("_mapping/{$B}",$ug,'PUT');}function
drop_tables($S){global$g;$H=true;foreach($S
as$Q)$H=$H&&$g->query(urlencode($Q),array(),'DELETE');return$H;}function
last_id(){global$g;return$g->last_id;}$x="elastic";$xf=array("=","query");$md=array();$sd=array();$oc=array(array("json"));$U=array();$Jh=array();foreach(array('Numbers'=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),'Date and time'=>array("date"=>10),'Strings'=>array("string"=>65535,"text"=>65535),'Binary'=>array("binary"=>255),)as$y=>$X){$U+=$X;$Jh[$y]=array_keys($X);}}$gc["clickhouse"]="ClickHouse (alpha)";if(isset($_GET["clickhouse"])){define("DRIVER","clickhouse");class
Min_DB{var$extension="JSON",$server_info,$errno,$_result,$error,$_url;var$_db='default';function
rootQuery($l,$F){@ini_set('track_errors',1);$Vc=@file_get_contents("$this->_url/?database=$l",false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$this->isQuerySelectLike($F)?"$F FORMAT JSONCompact":$F,'header'=>'Content-type: application/x-www-form-urlencoded','ignore_errors'=>1,))));if($Vc===false){$this->error=$php_errormsg;return$Vc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Vc;return
false;}$H=json_decode($Vc,true);if($H===null){if(!$this->isQuerySelectLike($F)&&$Vc==='')return
true;$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$_b=get_defined_constants(true);foreach($_b['json']as$B=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$B)){$this->error=$B;break;}}}}return
new
Min_Result($H);}function
isQuerySelectLike($F){return(bool)preg_match('~^(select|show)~i',$F);}function
query($F){return$this->rootQuery($this->_db,$F);}function
connect($M,$V,$E){preg_match('~^(https?://)?(.*)~',$M,$A);$this->_url=($A[1]?$A[1]:"http://")."$V:$E@$A[2]";$H=$this->query('SELECT 1');return(bool)$H;}function
select_db($j){$this->_db=$j;return
true;}function
quote($P){return"'".addcslashes($P,"\\'")."'";}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);return$G['data'];}}class
Min_Result{var$num_rows,$_rows,$columns,$meta,$_offset=0;function
__construct($G){$this->num_rows=$G['rows'];$this->_rows=$G['data'];$this->meta=$G['meta'];$this->columns=array_column($this->meta,'name');reset($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);next($this->_rows);return$I===false?false:array_combine($this->columns,$I);}function
fetch_row(){$I=current($this->_rows);next($this->_rows);return$I;}function
fetch_field(){$e=$this->_offset++;$H=new
stdClass;if($e<count($this->columns)){$H->name=$this->meta[$e]['name'];$H->orgname=$H->name;$H->type=$this->meta[$e]['type'];}return$H;}}class
Min_Driver
extends
Min_SQL{function
delete($Q,$yg,$z=0){if($yg==='')$yg='WHERE 1=1';return
queries("ALTER TABLE ".table($Q)." DELETE $yg");}function
update($Q,$N,$yg,$z=0,$L="\n"){$Xi=array();foreach($N
as$y=>$X)$Xi[]="$y = $X";$F=$L.implode(",$L",$Xi);return
queries("ALTER TABLE ".table($Q)." UPDATE $F$yg");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
explain($g,$F){return'';}function
found_rows($R,$Z){$J=get_vals("SELECT COUNT(*) FROM ".idf_escape($R["Name"]).($Z?" WHERE ".implode(" AND ",$Z):""));return
empty($J)?false:$J[0];}function
alter_table($Q,$B,$p,$ed,$ub,$wc,$d,$Ma,$Wf){$c=$Bf=array();foreach($p
as$o){if($o[1][2]===" NULL")$o[1][1]=" Nullable({$o[1][1]})";elseif($o[1][2]===' NOT NULL')$o[1][2]='';if($o[1][3])$o[1][3]='';$c[]=($o[1]?($Q!=""?($o[0]!=""?"MODIFY COLUMN ":"ADD COLUMN "):" ").implode($o[1]):"DROP COLUMN ".idf_escape($o[0]));$Bf[]=$o[1][0];}$c=array_merge($c,$ed);$O=($wc?" ENGINE ".$wc:"");if($Q=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)$O$Wf".' ORDER BY ('.implode(',',$Bf).')');if($Q!=$B){$G=queries("RENAME TABLE ".table($Q)." TO ".table($B));if($c)$Q=$B;else
return$G;}if($O)$c[]=ltrim($O);return($c||$Wf?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$Wf):true);}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($cj){return
drop_tables($cj);}function
drop_tables($S){return
apply_queries("DROP TABLE",$S);}function
connect(){global$b;$g=new
Min_DB;$Ib=$b->credentials();if($g->connect($Ib[0],$Ib[1],$Ib[2]))return$g;return$g->error;}function
get_databases($cd){global$g;$G=get_rows('SHOW DATABASES');$H=array();foreach($G
as$I)$H[]=$I['name'];sort($H);return$H;}function
limit($F,$Z,$z,$C=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($C?", $C":""):"");}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$pb){}function
engines(){return
array('MergeTree');}function
logged_user(){global$b;$Ib=$b->credentials();return$Ib[1];}function
tables_list(){$G=get_rows('SHOW TABLES');$H=array();foreach($G
as$I)$H[$I['name']]='table';ksort($H);return$H;}function
count_tables($k){return
array();}function
table_status($B="",$Qc=false){global$g;$H=array();$S=get_rows("SELECT name, engine FROM system.tables WHERE database = ".q($g->_db));foreach($S
as$Q){$H[$Q['name']]=array('Name'=>$Q['name'],'Engine'=>$Q['engine'],);if($B===$Q['name'])return$H[$Q['name']];}return$H;}function
is_view($R){return
false;}function
fk_support($R){return
false;}function
convert_field($o){}function
unconvert_field($o,$H){if(in_array($o['type'],array("Int8","Int16","Int32","Int64","UInt8","UInt16","UInt32","UInt64","Float32","Float64")))return"to$o[type]($H)";return$H;}function
fields($Q){$H=array();$G=get_rows("SELECT name, type, default_expression FROM system.columns WHERE ".idf_escape('table')." = ".q($Q));foreach($G
as$I){$T=trim($I['type']);$hf=strpos($T,'Nullable(')===0;$H[trim($I['name'])]=array("field"=>trim($I['name']),"full_type"=>$T,"type"=>$T,"default"=>trim($I['default_expression']),"null"=>$hf,"auto_increment"=>'0',"privileges"=>array("insert"=>1,"select"=>1,"update"=>0),);}return$H;}function
indexes($Q,$h=null){return
array();}function
foreign_keys($Q){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($ch){return
true;}function
auto_increment(){return'';}function
last_id(){return
0;}function
support($Rc){return
preg_match("~^(columns|sql|status|table|drop_col)$~",$Rc);}$x="clickhouse";$U=array();$Jh=array();foreach(array('Numbers'=>array("Int8"=>3,"Int16"=>5,"Int32"=>10,"Int64"=>19,"UInt8"=>3,"UInt16"=>5,"UInt32"=>10,"UInt64"=>20,"Float32"=>7,"Float64"=>16,'Decimal'=>38,'Decimal32'=>9,'Decimal64'=>18,'Decimal128'=>38),'Date and time'=>array("Date"=>13,"DateTime"=>20),'Strings'=>array("String"=>0),'Binary'=>array("FixedString"=>0),)as$y=>$X){$U+=$X;$Jh[$y]=array_keys($X);}$Ki=array();$xf=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$md=array();$sd=array("avg","count","count distinct","max","min","sum");$oc=array();}$gc=array("server"=>"MySQL")+$gc;if(!defined("DRIVER")){$jg=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($M="",$V="",$E="",$j=null,$fg=null,$wh=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Cd,$fg)=explode(":",$M,2);$Eh=$b->connectSsl();if($Eh)$this->ssl_set($Eh['key'],$Eh['cert'],$Eh['ca'],'','');$H=@$this->real_connect(($M!=""?$Cd:ini_get("mysqli.default_host")),($M.$V!=""?$V:ini_get("mysqli.default_user")),($M.$V.$E!=""?$E:ini_get("mysqli.default_pw")),$j,(is_numeric($fg)?$fg:ini_get("mysqli.default_port")),(!is_numeric($fg)?$fg:$wh),($Eh?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$H;}function
set_charset($cb){if(parent::set_charset($cb))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $cb");}function
result($F,$o=0){$G=$this->query($F);if(!$G)return
false;$I=$G->fetch_array();return$I[$o];}function
quote($P){return"'".$this->escape_string($P)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($M,$V,$E){if(ini_bool("mysql.allow_local_infile")){$this->error=sprintf('Disable %s or enable %s or %s extensions.',"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($M!=""?$M:ini_get("mysql.default_host")),("$M$V"!=""?$V:ini_get("mysql.default_user")),("$M$V$E"!=""?$E:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($cb){if(function_exists('mysql_set_charset')){if(mysql_set_charset($cb,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $cb");}function
quote($P){return"'".mysql_real_escape_string($P,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($F,$Ei=false){$G=@($Ei?mysql_unbuffered_query($F,$this->_link):mysql_query($F,$this->_link));$this->error="";if(!$G){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($G===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($G);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$o=0){$G=$this->query($F);if(!$G||!$G->num_rows)return
false;return
mysql_result($G->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($G){$this->_result=$G;$this->num_rows=mysql_num_rows($G);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$H=mysql_fetch_field($this->_result,$this->_offset++);$H->orgtable=$H->table;$H->orgname=$H->name;$H->charsetnr=($H->blob?63:0);return$H;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($M,$V,$E){global$b;$_f=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Eh=$b->connectSsl();if($Eh){if(!empty($Eh['key']))$_f[PDO::MYSQL_ATTR_SSL_KEY]=$Eh['key'];if(!empty($Eh['cert']))$_f[PDO::MYSQL_ATTR_SSL_CERT]=$Eh['cert'];if(!empty($Eh['ca']))$_f[PDO::MYSQL_ATTR_SSL_CA]=$Eh['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$M)),$V,$E,$_f);return
true;}function
set_charset($cb){$this->query("SET NAMES $cb");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($F,$Ei=false){$this->setAttribute(1000,!$Ei);return
parent::query($F,$Ei);}}}class
Min_Driver
extends
Min_SQL{function
insert($Q,$N){return($N?parent::insert($Q,$N):queries("INSERT INTO ".table($Q)." ()\nVALUES ()"));}function
insertUpdate($Q,$J,$mg){$f=array_keys(reset($J));$kg="INSERT INTO ".table($Q)." (".implode(", ",$f).") VALUES\n";$Xi=array();foreach($f
as$y)$Xi[$y]="$y = VALUES($y)";$Mh="\nON DUPLICATE KEY UPDATE ".implode(", ",$Xi);$Xi=array();$ve=0;foreach($J
as$N){$Y="(".implode(", ",$N).")";if($Xi&&(strlen($kg)+$ve+strlen($Y)+strlen($Mh)>1e6)){if(!queries($kg.implode(",\n",$Xi).$Mh))return
false;$Xi=array();$ve=0;}$Xi[]=$Y;$ve+=strlen($Y)+2;}return
queries($kg.implode(",\n",$Xi).$Mh);}function
slowQuery($F,$hi){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$hi FOR $F";elseif(preg_match('~^(SELECT\b)(.+)~is',$F,$A))return"$A[1] /*+ MAX_EXECUTION_TIME(".($hi*1000).") */ $A[2]";}}function
convertSearch($u,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$G=$this->_conn->query("SHOW WARNINGS");if($G&&$G->num_rows){ob_start();select($G);return
ob_get_clean();}}function
tableHelp($B){$Ce=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Ce?"information-schema-$B-table/":str_replace("_","-",$B)."-table.html"));if(DB=="mysql")return($Ce?"mysql$B-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$U,$Jh;$g=new
Min_DB;$Ib=$b->credentials();if($g->connect($Ib[0],$Ib[1],$Ib[2])){$g->set_charset(charset($g));$g->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$g)){$Jh['Strings'][]="json";$U["json"]=4294967295;}return$g;}$H=$g->error;if(function_exists('iconv')&&!is_utf8($H)&&strlen($ah=iconv("windows-1250","utf-8",$H))>strlen($H))$H=$ah;return$H;}function
get_databases($cd){$H=get_session("dbs");if($H===null){$F=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$H=($cd?slow_query($F):get_vals($F));restart_session();set_session("dbs",$H);stop_session();}return$H;}function
limit($F,$Z,$z,$C=0,$L=" "){return" $F$Z".($z!==null?$L."LIMIT $z".($C?" OFFSET $C":""):"");}function
limit1($Q,$F,$Z,$L="\n"){return
limit($F,$Z,1,0,$L);}function
db_collation($l,$pb){global$g;$H=null;$i=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$i,$A))$H=$A[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$i,$A))$H=$pb[$A[1]][-1];return$H;}function
engines(){$H=array();foreach(get_rows("SHOW ENGINES")as$I){if(preg_match("~YES|DEFAULT~",$I["Support"]))$H[]=$I["Engine"];}return$H;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$H=array();foreach($k
as$l)$H[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$H;}function
table_status($B="",$Qc=false){$H=array();foreach(get_rows($Qc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($B!=""?"AND TABLE_NAME = ".q($B):"ORDER BY Name"):"SHOW TABLE STATUS".($B!=""?" LIKE ".q(addcslashes($B,"%_\\")):""))as$I){if($I["Engine"]=="InnoDB")$I["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$I["Comment"]);if(!isset($I["Engine"]))$I["Comment"]="";if($B!="")return$I;$H[$I["Name"]]=$I;}return$H;}function
is_view($R){return$R["Engine"]===null;}function
fk_support($R){return
preg_match('~InnoDB|IBMDB2I~i',$R["Engine"])||(preg_match('~NDB~i',$R["Engine"])&&min_version(5.6));}function
fields($Q){$H=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($Q))as$I){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$I["Type"],$A);$H[$I["Field"]]=array("field"=>$I["Field"],"full_type"=>$I["Type"],"type"=>$A[1],"length"=>$A[2],"unsigned"=>ltrim($A[3].$A[4]),"default"=>($I["Default"]!=""||preg_match("~char|set~",$A[1])?$I["Default"]:null),"null"=>($I["Null"]=="YES"),"auto_increment"=>($I["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$I["Extra"],$A)?$A[1]:""),"collation"=>$I["Collation"],"privileges"=>array_flip(preg_split('~, *~',$I["Privileges"])),"comment"=>$I["Comment"],"primary"=>($I["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$I["Extra"]),);}return$H;}function
indexes($Q,$h=null){$H=array();foreach(get_rows("SHOW INDEX FROM ".table($Q),$h)as$I){$B=$I["Key_name"];$H[$B]["type"]=($B=="PRIMARY"?"PRIMARY":($I["Index_type"]=="FULLTEXT"?"FULLTEXT":($I["Non_unique"]?($I["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$H[$B]["columns"][]=$I["Column_name"];$H[$B]["lengths"][]=($I["Index_type"]=="SPATIAL"?null:$I["Sub_part"]);$H[$B]["descs"][]=null;}return$H;}function
foreign_keys($Q){global$g,$sf;static$cg='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$H=array();$Gb=$g->result("SHOW CREATE TABLE ".table($Q),1);if($Gb){preg_match_all("~CONSTRAINT ($cg) FOREIGN KEY ?\\(((?:$cg,? ?)+)\\) REFERENCES ($cg)(?:\\.($cg))? \\(((?:$cg,? ?)+)\\)(?: ON DELETE ($sf))?(?: ON UPDATE ($sf))?~",$Gb,$Fe,PREG_SET_ORDER);foreach($Fe
as$A){preg_match_all("~$cg~",$A[2],$yh);preg_match_all("~$cg~",$A[5],$Zh);$H[idf_unescape($A[1])]=array("db"=>idf_unescape($A[4]!=""?$A[3]:$A[4]),"table"=>idf_unescape($A[4]!=""?$A[4]:$A[3]),"source"=>array_map('idf_unescape',$yh[0]),"target"=>array_map('idf_unescape',$Zh[0]),"on_delete"=>($A[6]?$A[6]:"RESTRICT"),"on_update"=>($A[7]?$A[7]:"RESTRICT"),);}}return$H;}function
view($B){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$g->result("SHOW CREATE VIEW ".table($B),1)));}function
collations(){$H=array();foreach(get_rows("SHOW COLLATION")as$I){if($I["Default"])$H[$I["Charset"]][-1]=$I["Collation"];else$H[$I["Charset"]][]=$I["Collation"];}ksort($H);foreach($H
as$y=>$X)asort($H[$y]);return$H;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" COLLATE ".q($d):""));}function
drop_databases($k){$H=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$H;}function
rename_database($B,$d){$H=false;if(create_database($B,$d)){$Mg=array();foreach(tables_list()as$Q=>$T)$Mg[]=table($Q)." TO ".idf_escape($B).".".table($Q);$H=(!$Mg||queries("RENAME TABLE ".implode(", ",$Mg)));if($H)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$H;}function
auto_increment(){$Na=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Na="";break;}if($v["type"]=="PRIMARY")$Na=" UNIQUE";}}return" AUTO_INCREMENT$Na";}function
alter_table($Q,$B,$p,$ed,$ub,$wc,$d,$Ma,$Wf){$c=array();foreach($p
as$o)$c[]=($o[1]?($Q!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($Q!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$ed);$O=($ub!==null?" COMMENT=".q($ub):"").($wc?" ENGINE=".q($wc):"").($d?" COLLATE ".q($d):"").($Ma!=""?" AUTO_INCREMENT=$Ma":"");if($Q=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)$O$Wf");if($Q!=$B)$c[]="RENAME TO ".table($B);if($O)$c[]=ltrim($O);return($c||$Wf?queries("ALTER TABLE ".table($Q)."\n".implode(",\n",$c).$Wf):true);}function
alter_indexes($Q,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($Q).implode(",",$c));}function
truncate_tables($S){return
apply_queries("TRUNCATE TABLE",$S);}function
drop_views($cj){return
queries("DROP VIEW ".implode(", ",array_map('table',$cj)));}function
drop_tables($S){return
queries("DROP TABLE ".implode(", ",array_map('table',$S)));}function
move_tables($S,$cj,$Zh){$Mg=array();foreach(array_merge($S,$cj)as$Q)$Mg[]=table($Q)." TO ".idf_escape($Zh).".".table($Q);return
queries("RENAME TABLE ".implode(", ",$Mg));}function
copy_tables($S,$cj,$Zh){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($S
as$Q){$B=($Zh==DB?table("copy_$Q"):idf_escape($Zh).".".table($Q));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $B"))||!queries("CREATE TABLE $B LIKE ".table($Q))||!queries("INSERT INTO $B SELECT * FROM ".table($Q)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$I){$zi=$I["Trigger"];if(!queries("CREATE TRIGGER ".($Zh==DB?idf_escape("copy_$zi"):idf_escape($Zh).".".idf_escape($zi))." $I[Timing] $I[Event] ON $B FOR EACH ROW\n$I[Statement];"))return
false;}}foreach($cj
as$Q){$B=($Zh==DB?table("copy_$Q"):idf_escape($Zh).".".table($Q));$bj=view($Q);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $B"))||!queries("CREATE VIEW $B AS $bj[select]"))return
false;}return
true;}function
trigger($B){if($B=="")return
array();$J=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($B));return
reset($J);}function
triggers($Q){$H=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")))as$I)$H[$I["Trigger"]]=array($I["Timing"],$I["Event"]);return$H;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($B,$T){global$g,$yc,$Td,$U;$Ca=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$zh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Di="((".implode("|",array_merge(array_keys($U),$Ca)).")\\b(?:\\s*\\(((?:[^'\")]|$yc)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$cg="$zh*(".($T=="FUNCTION"?"":$Td).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Di";$i=$g->result("SHOW CREATE $T ".idf_escape($B),2);preg_match("~\\(((?:$cg\\s*,?)*)\\)\\s*".($T=="FUNCTION"?"RETURNS\\s+$Di\\s+":"")."(.*)~is",$i,$A);$p=array();preg_match_all("~$cg\\s*,?~is",$A[1],$Fe,PREG_SET_ORDER);foreach($Fe
as$Pf)$p[]=array("field"=>str_replace("``","`",$Pf[2]).$Pf[3],"type"=>strtolower($Pf[5]),"length"=>preg_replace_callback("~$yc~s",'normalize_enum',$Pf[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$Pf[8] $Pf[7]"))),"null"=>1,"full_type"=>$Pf[4],"inout"=>strtoupper($Pf[1]),"collation"=>strtolower($Pf[9]),);if($T!="FUNCTION")return
array("fields"=>$p,"definition"=>$A[11]);return
array("fields"=>$p,"returns"=>array("type"=>$A[12],"length"=>$A[13],"unsigned"=>$A[15],"collation"=>$A[16]),"definition"=>$A[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($B,$I){return
idf_escape($B);}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$F){return$g->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$F);}function
found_rows($R,$Z){return($Z||$R["Engine"]!="InnoDB"?null:$R["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($ch,$h=null){return
true;}function
create_sql($Q,$Ma,$Kh){global$g;$H=$g->result("SHOW CREATE TABLE ".table($Q),1);if(!$Ma)$H=preg_replace('~ AUTO_INCREMENT=\d+~','',$H);return$H;}function
truncate_sql($Q){return"TRUNCATE ".table($Q);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($Q){$H="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($Q,"%_\\")),null,"-- ")as$I)$H.="\nCREATE TRIGGER ".idf_escape($I["Trigger"])." $I[Timing] $I[Event] ON ".table($I["Table"])." FOR EACH ROW\n$I[Statement];;\n";return$H;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$H){if(preg_match("~binary~",$o["type"]))$H="UNHEX($H)";if($o["type"]=="bit")$H="CONV($H, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$H=(min_version(8)?"ST_":"")."GeomFromText($H, SRID($o[field]))";return$H;}function
support($Rc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$Rc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$g;return$g->result("SELECT @@max_connections");}$x="sql";$U=array();$Jh=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometry'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$U+=$X;$Jh[$y]=array_keys($X);}$Ki=array("unsigned","zerofill","unsigned zerofill");$xf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$md=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$sd=array("avg","count","count distinct","group_concat","max","min","sum");$oc=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",str_replace(":","%3a",preg_replace('~\?.*~','',relative_uri())).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.7.7";class
Adminer{var$operators;function
name(){return"<a href='https://www.adminer.org/'".target_blank()." id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($i=false){return
password_file($i);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($M){return
h($M);}function
database(){return
DB;}function
databases($cd=true){return
get_databases($cd);}function
schemas(){return
schemas();}function
queryTimeout(){return
2;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$H=array();$Wc="adminer.css";if(file_exists($Wc))$H[]="$Wc?v=".crc32(file_get_contents($Wc));return$H;}function
loginForm(){global$gc;echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('driver','<tr><th>'.'System'.'<td>',html_select("auth[driver]",$gc,DRIVER,"loginDriver(this);")."\n"),$this->loginFormField('server','<tr><th>'.'Server'.'<td>','<input name="auth[server]" value="'.h(SERVER).'" title="hostname[:port]" placeholder="localhost" autocapitalize="off">'."\n"),$this->loginFormField('username','<tr><th>'.'Username'.'<td>','<input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username')); qs('#username').form['auth[driver]'].onchange();")),$this->loginFormField('password','<tr><th>'.'Password'.'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),$this->loginFormField('db','<tr><th>'.'Database'.'<td>','<input name="auth[db]" value="'.h($_GET["db"]).'" autocapitalize="off">'."\n"),"</table>\n","<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
loginFormField($B,$zd,$Y){return$zd.$Y;}function
login($_e,$E){if($E=="")return
sprintf('Adminer does not support accessing a database without a password, <a href="https://www.adminer.org/en/password/"%s>more information</a>.',target_blank());return
true;}function
tableName($Qh){return
h($Qh["Name"]);}function
fieldName($o,$Bf=0){return'<span title="'.h($o["full_type"]).'">'.h($o["field"]).'</span>';}function
selectLinks($Qh,$N=""){global$x,$m;echo'<p class="links">';$ye=array("select"=>'Select data');if(support("table")||support("indexes"))$ye["table"]='Show structure';if(support("table")){if(is_view($Qh))$ye["view"]='Alter view';else$ye["create"]='Alter table';}if($N!==null)$ye["edit"]='New item';$B=$Qh["Name"];foreach($ye
as$y=>$X)echo" <a href='".h(ME)."$y=".urlencode($B).($y=="edit"?$N:"")."'".bold(isset($_GET[$y])).">$X</a>";echo
doc_link(array($x=>$m->tableHelp($B)),"?"),"\n";}function
foreignKeys($Q){return
foreign_keys($Q);}function
backwardKeys($Q,$Ph){return
array();}function
backwardKeysPrint($Pa,$I){}function
selectQuery($F,$Fh,$Pc=false){global$x,$m;$H="</p>\n";if(!$Pc&&($fj=$m->warnings())){$t="warnings";$H=", <a href='#$t'>".'Warnings'."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."$H<div id='$t' class='hidden'>\n$fj</div>\n";}return"<p><code class='jush-$x'>".h(str_replace("\n"," ",$F))."</code> <span class='time'>(".format_time($Fh).")</span>".(support("sql")?" <a href='".h(ME)."sql=".urlencode($F)."'>".'Edit'."</a>":"").$H;}function
sqlCommandQuery($F){return
shorten_utf8(trim($F),1000);}function
rowDescription($Q){return"";}function
rowDescriptions($J,$fd){return$J;}function
selectLink($X,$o){}function
selectVal($X,$_,$o,$Jf){$H=($X===null?"<i>NULL</i>":(preg_match("~char|binary|boolean~",$o["type"])&&!preg_match("~var~",$o["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$o["type"])&&!is_utf8($X))$H="<i>".lang(array('%d byte','%d bytes'),strlen($Jf))."</i>";if(preg_match('~json~',$o["type"]))$H="<code class='jush-js'>$H</code>";return($_?"<a href='".h($_)."'".(is_url($_)?target_blank():"").">$H</a>":$H);}function
editVal($X,$o){return$X;}function
tableStructurePrint($p){echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap'>\n","<thead><tr><th>".'Column'."<td>".'Type'.(support("comment")?"<td>".'Comment':"")."</thead>\n";foreach($p
as$o){echo"<tr".odd()."><th>".h($o["field"]),"<td><span title='".h($o["collation"])."'>".h($o["full_type"])."</span>",($o["null"]?" <i>NULL</i>":""),($o["auto_increment"]?" <i>".'Auto Increment'."</i>":""),(isset($o["default"])?" <span title='".'Default value'."'>[<b>".h($o["default"])."</b>]</span>":""),(support("comment")?"<td>".h($o["comment"]):""),"\n";}echo"</table>\n","</div>\n";}function
tableIndexesPrint($w){echo"<table cellspacing='0'>\n";foreach($w
as$B=>$v){ksort($v["columns"]);$og=array();foreach($v["columns"]as$y=>$X)$og[]="<i>".h($X)."</i>".($v["lengths"][$y]?"(".$v["lengths"][$y].")":"").($v["descs"][$y]?" DESC":"");echo"<tr title='".h($B)."'><th>$v[type]<td>".implode(", ",$og)."\n";}echo"</table>\n";}function
selectColumnsPrint($K,$f){global$md,$sd;print_fieldset("select",'Select',$K);$s=0;$K[""]=array();foreach($K
as$y=>$X){$X=$_GET["columns"][$y];$e=select_input(" name='columns[$s][col]'",$f,$X["col"],($y!==""?"selectFieldChange":"selectAddRow"));echo"<div>".($md||$sd?"<select name='columns[$s][fun]'>".optionlist(array(-1=>"")+array_filter(array('Functions'=>$md,'Aggregation'=>$sd)),$X["fun"])."</select>".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).script("qsl('select').onchange = function () { helpClose();".($y!==""?"":" qsl('select, input', this.parentNode).onchange();")." };","")."($e)":$e)."</div>\n";$s++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$f,$w){print_fieldset("search",'Search',$Z);foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"){echo"<div>(<i>".implode("</i>, <i>",array_map('h',$v["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$s]' value='".h($_GET["fulltext"][$s])."'>",script("qsl('input').oninput = selectFieldChange;",""),checkbox("boolean[$s]",1,isset($_GET["boolean"][$s]),"BOOL"),"</div>\n";}}$bb="this.parentNode.firstChild.onchange();";foreach(array_merge((array)$_GET["where"],array(array()))as$s=>$X){if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$s][col]'",$f,$X["col"],($X?"selectFieldChange":"selectAddRow"),"(".'anywhere'.")"),html_select("where[$s][op]",$this->operators,$X["op"],$bb),"<input type='search' name='where[$s][val]' value='".h($X["val"])."'>",script("mixin(qsl('input'), {oninput: function () { $bb }, onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});",""),"</div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($Bf,$f,$w){print_fieldset("sort",'Sort',$Bf);$s=0;foreach((array)$_GET["order"]as$y=>$X){if($X!=""){echo"<div>".select_input(" name='order[$s]'",$f,$X,"selectFieldChange"),checkbox("desc[$s]",1,isset($_GET["desc"][$y]),'descending')."</div>\n";$s++;}}echo"<div>".select_input(" name='order[$s]'",$f,"","selectAddRow"),checkbox("desc[$s]",1,false,'descending')."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".'Limit'."</legend><div>";echo"<input type='number' name='limit' class='size' value='".h($z)."'>",script("qsl('input').oninput = selectFieldChange;",""),"</div></fieldset>\n";}function
selectLengthPrint($fi){if($fi!==null){echo"<fieldset><legend>".'Text length'."</legend><div>","<input type='number' name='text_length' class='size' value='".h($fi)."'>","</div></fieldset>\n";}}function
selectActionPrint($w){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>"," <span id='noindex' title='".'Full table scan'."'></span>","<script".nonce().">\n","var indexColumns = ";$f=array();foreach($w
as$v){$Mb=reset($v["columns"]);if($v["type"]!="FULLTEXT"&&$Mb)$f[$Mb]=1;}$f[""]=1;foreach($f
as$y=>$X)json_row($y);echo";\n","selectFieldChange.call(qs('#form')['select']);\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return!information_schema(DB);}function
selectEmailPrint($tc,$f){}function
selectColumnsProcess($f,$w){global$md,$sd;$K=array();$pd=array();foreach((array)$_GET["columns"]as$y=>$X){if($X["fun"]=="count"||($X["col"]!=""&&(!$X["fun"]||in_array($X["fun"],$md)||in_array($X["fun"],$sd)))){$K[$y]=apply_sql_function($X["fun"],($X["col"]!=""?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$sd))$pd[]=$K[$y];}}return
array($K,$pd);}function
selectSearchProcess($p,$w){global$g,$m;$H=array();foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"&&$_GET["fulltext"][$s]!="")$H[]="MATCH (".implode(", ",array_map('idf_escape',$v["columns"])).") AGAINST (".q($_GET["fulltext"][$s]).(isset($_GET["boolean"][$s])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$y=>$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$kg="";$xb=" $X[op]";if(preg_match('~IN$~',$X["op"])){$Jd=process_length($X["val"]);$xb.=" ".($Jd!=""?$Jd:"(NULL)");}elseif($X["op"]=="SQL")$xb=" $X[val]";elseif($X["op"]=="LIKE %%")$xb=" LIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="ILIKE %%")$xb=" ILIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="FIND_IN_SET"){$kg="$X[op](".q($X["val"]).", ";$xb=")";}elseif(!preg_match('~NULL$~',$X["op"]))$xb.=" ".$this->processInput($p[$X["col"]],$X["val"]);if($X["col"]!="")$H[]=$kg.$m->convertSearch(idf_escape($X["col"]),$X,$p[$X["col"]]).$xb;else{$rb=array();foreach($p
as$B=>$o){if((preg_match('~^[-\d.'.(preg_match('~IN$~',$X["op"])?',':'').']+$~',$X["val"])||!preg_match('~'.number_type().'|bit~',$o["type"]))&&(!preg_match("~[\x80-\xFF]~",$X["val"])||preg_match('~char|text|enum|set~',$o["type"])))$rb[]=$kg.$m->convertSearch(idf_escape($B),$X,$o).$xb;}$H[]=($rb?"(".implode(" OR ",$rb).")":"1 = 0");}}}return$H;}function
selectOrderProcess($p,$w){$H=array();foreach((array)$_GET["order"]as$y=>$X){if($X!="")$H[]=(preg_match('~^((COUNT\(DISTINCT |[A-Z0-9_]+\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\)|COUNT\(\*\))$~',$X)?$X:idf_escape($X)).(isset($_GET["desc"][$y])?" DESC":"");}return$H;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$fd){return
false;}function
selectQueryBuild($K,$Z,$pd,$Bf,$z,$D){return"";}function
messageQuery($F,$gi,$Pc=false){global$x,$m;restart_session();$_d=&get_session("queries");if(!$_d[$_GET["db"]])$_d[$_GET["db"]]=array();if(strlen($F)>1e6)$F=preg_replace('~[\x80-\xFF]+$~','',substr($F,0,1e6))."\n…";$_d[$_GET["db"]][]=array($F,time(),$gi);$Ch="sql-".count($_d[$_GET["db"]]);$H="<a href='#$Ch' class='toggle'>".'SQL command'."</a>\n";if(!$Pc&&($fj=$m->warnings())){$t="warnings-".count($_d[$_GET["db"]]);$H="<a href='#$t' class='toggle'>".'Warnings'."</a>, $H<div id='$t' class='hidden'>\n$fj</div>\n";}return" <span class='time'>".@date("H:i:s")."</span>"." $H<div id='$Ch' class='hidden'><pre><code class='jush-$x'>".shorten_utf8($F,1000)."</code></pre>".($gi?" <span class='time'>($gi)</span>":'').(support("sql")?'<p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($_d[$_GET["db"]])-1)).'">'.'Edit'.'</a>':'').'</div>';}function
editFunctions($o){global$oc;$H=($o["null"]?"NULL/":"");foreach($oc
as$y=>$md){if(!$y||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($md
as$cg=>$X){if(!$cg||preg_match("~$cg~",$o["type"]))$H.="/$X";}if($y&&!preg_match('~set|blob|bytea|raw|file~',$o["type"]))$H.="/SQL";}}if($o["auto_increment"]&&!isset($_GET["select"])&&!where($_GET))$H='Auto Increment';return
explode("/",$H);}function
editInput($Q,$o,$Ja,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ja value='-1' checked><i>".'original'."</i></label> ":"").($o["null"]?"<label><input type='radio'$Ja value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ja,$o,$Y,0);return"";}function
editHint($Q,$o,$Y){return"";}function
processInput($o,$Y,$r=""){if($r=="SQL")return$Y;$B=$o["field"];$H=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$r))$H="$r()";elseif(preg_match('~^current_(date|timestamp)$~',$r))$H=$r;elseif(preg_match('~^([+-]|\|\|)$~',$r))$H=idf_escape($B)." $r $H";elseif(preg_match('~^[+-] interval$~',$r))$H=idf_escape($B)." $r ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+\$~i",$Y)?$Y:$H);elseif(preg_match('~^(addtime|subtime|concat)$~',$r))$H="$r(".idf_escape($B).", $H)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$r))$H="$r($H)";return
unconvert_field($o,$H);}function
dumpOutput(){$H=array('text'=>'open','file'=>'save');if(function_exists('gzencode'))$H['gz']='gzip';return$H;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($Q,$Kh,$ce=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($Kh)dump_csv(array_keys(fields($Q)));}else{if($ce==2){$p=array();foreach(fields($Q)as$B=>$o)$p[]=idf_escape($B)." $o[full_type]";$i="CREATE TABLE ".table($Q)." (".implode(", ",$p).")";}else$i=create_sql($Q,$_POST["auto_increment"],$Kh);set_utf8mb4($i);if($Kh&&$i){if($Kh=="DROP+CREATE"||$ce==1)echo"DROP ".($ce==2?"VIEW":"TABLE")." IF EXISTS ".table($Q).";\n";if($ce==1)$i=remove_definer($i);echo"$i;\n\n";}}}function
dumpData($Q,$Kh,$F){global$g,$x;$He=($x=="sqlite"?0:1048576);if($Kh){if($_POST["format"]=="sql"){if($Kh=="TRUNCATE+INSERT")echo
truncate_sql($Q).";\n";$p=fields($Q);}$G=$g->query($F,1);if($G){$Vd="";$Ya="";$je=array();$Mh="";$Sc=($Q!=''?'fetch_assoc':'fetch_row');while($I=$G->$Sc()){if(!$je){$Xi=array();foreach($I
as$X){$o=$G->fetch_field();$je[]=$o->name;$y=idf_escape($o->name);$Xi[]="$y = VALUES($y)";}$Mh=($Kh=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$Xi):"").";\n";}if($_POST["format"]!="sql"){if($Kh=="table"){dump_csv($je);$Kh="INSERT";}dump_csv($I);}else{if(!$Vd)$Vd="INSERT INTO ".table($Q)." (".implode(", ",array_map('idf_escape',$je)).") VALUES";foreach($I
as$y=>$X){$o=$p[$y];$I[$y]=($X!==null?unconvert_field($o,preg_match(number_type(),$o["type"])&&!preg_match('~\[~',$o["full_type"])&&is_numeric($X)?$X:q(($X===false?0:$X))):"NULL");}$ah=($He?"\n":" ")."(".implode(",\t",$I).")";if(!$Ya)$Ya=$Vd.$ah;elseif(strlen($Ya)+4+strlen($ah)+strlen($Mh)<$He)$Ya.=",$ah";else{echo$Ya.$Mh;$Ya=$Vd.$ah;}}}if($Ya)echo$Ya.$Mh;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$g->error)."\n";}}function
dumpFilename($Ed){return
friendly_url($Ed!=""?$Ed:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($Ed,$We=false){$Mf=$_POST["output"];$Kc=(preg_match('~sql~',$_POST["format"])?"sql":($We?"tar":"csv"));header("Content-Type: ".($Mf=="gz"?"application/x-gzip":($Kc=="tar"?"application/x-tar":($Kc=="sql"||$Mf!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($Mf=="gz")ob_start('ob_gzencode',1e6);return$Kc;}function
importServerPath(){return"adminer.sql";}function
homepage(){echo'<p class="links">'.($_GET["ns"]==""&&support("database")?'<a href="'.h(ME).'database=">'.'Alter database'."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?'Alter schema':'Create schema')."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.'Database schema'."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".'Privileges'."</a>\n":"");return
true;}function
navigation($Ve){global$ia,$x,$gc,$g;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="https://www.adminer.org/#download"',target_blank(),' id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Ve=="auth"){$Mf="";foreach((array)$_SESSION["pwds"]as$Zi=>$oh){foreach($oh
as$M=>$Ui){foreach($Ui
as$V=>$E){if($E!==null){$Sb=$_SESSION["db"][$Zi][$M][$V];foreach(($Sb?array_keys($Sb):array(""))as$l)$Mf.="<li><a href='".h(auth_url($Zi,$M,$V,$l))."'>($gc[$Zi]) ".h($V.($M!=""?"@".$this->serverName($M):"").($l!=""?" - $l":""))."</a>\n";}}}}if($Mf)echo"<ul id='logins'>\n$Mf</ul>\n".script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");}else{if($_GET["ns"]!==""&&!$Ve&&DB!=""){$g->select_db(DB);$S=table_status('',true);}echo
script_src(preg_replace("~\\?.*~","",ME)."?file=jush.js&version=4.7.7");if(support("sql")){echo'<script',nonce(),'>
';if($S){$ye=array();foreach($S
as$Q=>$T)$ye[]=preg_quote($Q,'/');echo"var jushLinks = { $x: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$ye).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$x;\n";}$nh=$g->server_info;echo'bodyLoad(\'',(is_object($g)?preg_replace('~^(\d\.?\d).*~s','\1',$nh):""),'\'',(preg_match('~MariaDB~',$nh)?", true":""),');
</script>
';}$this->databasesPrint($Ve);if(DB==""||!$Ve){echo"<p class='links'>".(support("sql")?"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".'SQL command'."</a>\n<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".'Import'."</a>\n":"")."";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".'Export'."</a>\n";}if($_GET["ns"]!==""&&!$Ve&&DB!=""){echo'<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".'Create table'."</a>\n";if(!$S)echo"<p class='message'>".'No tables.'."\n";else$this->tablesPrint($S);}}}function
databasesPrint($Ve){global$b,$g;$k=$this->databases();if($k&&!in_array(DB,$k))array_unshift($k,DB);echo'<form action="">
<p id="dbs">
';hidden_fields_get();$Qb=script("mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});");echo"<span title='".'database'."'>".'DB'."</span>: ".($k?"<select name='db'>".optionlist(array(""=>"")+$k,DB)."</select>$Qb":"<input name='db' value='".h(DB)."' autocapitalize='off'>\n"),"<input type='submit' value='".'Use'."'".($k?" class='hidden'":"").">\n";if($Ve!="db"&&DB!=""&&$g->select_db(DB)){if(support("scheme")){echo"<br>".'Schema'.": <select name='ns'>".optionlist(array(""=>"")+$b->schemas(),$_GET["ns"])."</select>$Qb";if($_GET["ns"]!="")set_schema($_GET["ns"]);}}foreach(array("import","sql","schema","dump","privileges")as$X){if(isset($_GET[$X])){echo"<input type='hidden' name='$X' value=''>";break;}}echo"</p></form>\n";}function
tablesPrint($S){echo"<ul id='tables'>".script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($S
as$Q=>$O){$B=$this->tableName($O);if($B!=""){echo'<li><a href="'.h(ME).'select='.urlencode($Q).'"'.bold($_GET["select"]==$Q||$_GET["edit"]==$Q,"select").">".'select'."</a> ",(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($Q).'"'.bold(in_array($Q,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"])),(is_view($O)?"view":"structure"))." title='".'Show structure'."'>$B</a>":"<span>$B</span>")."\n";}}echo"</ul>\n";}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if($b->operators===null)$b->operators=$xf;function
page_header($ji,$n="",$Xa=array(),$ki=""){global$ca,$ia,$b,$gc,$x;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$li=$ji.($ki!=""?": $ki":"");$mi=strip_tags($li.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$mi,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.7.7"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.7.7");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.7"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.7"),'">
';foreach($b->css()as$Kb){echo'<link rel="stylesheet" type="text/css" href="',h($Kb),'">
';}}echo'
<body class="ltr nojs">
';$Wc=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($Wc)&&filemtime($Wc)+86400>time()){$aj=unserialize(file_get_contents($Wc));$vg="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($aj["version"],base64_decode($aj["signature"]),$vg)==1)$_COOKIE["adminer_version"]=$aj["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ia', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('You are offline.'),'\';
var thousandsSeparator = \'',js_escape(','),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Xa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$gc[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$M=$b->serverName(SERVER);$M=($M!=""?$M:'Server');if($Xa===false)echo"$M\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$M</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Xa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Xa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Xa
as$y=>$X){$Zb=(is_array($X)?$X[1]:h($X));if($Zb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$Zb</a> &raquo; ";}}echo"$ji\n";}}echo"<h2>$li</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Jb){$yd=array();foreach($Jb
as$y=>$X)$yd[]="$y $X";header("Content-Security-Policy: ".implode("; ",$yd));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$ff;if(!$ff)$ff=base64_encode(rand_string());return$ff;}function
page_messages($n){$Mi=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Re=$_SESSION["messages"][$Mi];if($Re){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Re)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Mi]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Ve=""){global$b,$qi;echo'</div>

';if($Ve!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="',$qi,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Ve);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($Ye){while($Ye>=2147483648)$Ye-=4294967296;while($Ye<=-2147483649)$Ye+=4294967296;return(int)$Ye;}function
long2str($W,$ej){$ah='';foreach($W
as$X)$ah.=pack('V',$X);if($ej)return
substr($ah,0,end($W));return$ah;}function
str2long($ah,$ej){$W=array_values(unpack('V*',str_pad($ah,4*ceil(strlen($ah)/4),"\0")));if($ej)$W[]=strlen($ah);return$W;}function
xxtea_mx($rj,$qj,$Nh,$fe){return
int32((($rj>>5&0x7FFFFFF)^$qj<<2)+(($qj>>3&0x1FFFFFFF)^$rj<<4))^int32(($Nh^$qj)+($fe^$rj));}function
encrypt_string($Ih,$y){if($Ih=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Ih,true);$Ye=count($W)-1;$rj=$W[$Ye];$qj=$W[0];$wg=floor(6+52/($Ye+1));$Nh=0;while($wg-->0){$Nh=int32($Nh+0x9E3779B9);$nc=$Nh>>2&3;for($Nf=0;$Nf<$Ye;$Nf++){$qj=$W[$Nf+1];$Xe=xxtea_mx($rj,$qj,$Nh,$y[$Nf&3^$nc]);$rj=int32($W[$Nf]+$Xe);$W[$Nf]=$rj;}$qj=$W[0];$Xe=xxtea_mx($rj,$qj,$Nh,$y[$Nf&3^$nc]);$rj=int32($W[$Ye]+$Xe);$W[$Ye]=$rj;}return
long2str($W,false);}function
decrypt_string($Ih,$y){if($Ih=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Ih,false);$Ye=count($W)-1;$rj=$W[$Ye];$qj=$W[0];$wg=floor(6+52/($Ye+1));$Nh=int32($wg*0x9E3779B9);while($Nh){$nc=$Nh>>2&3;for($Nf=$Ye;$Nf>0;$Nf--){$rj=$W[$Nf-1];$Xe=xxtea_mx($rj,$qj,$Nh,$y[$Nf&3^$nc]);$qj=int32($W[$Nf]-$Xe);$W[$Nf]=$qj;}$rj=$W[$Ye];$Xe=xxtea_mx($rj,$qj,$Nh,$y[$Nf&3^$nc]);$qj=int32($W[0]-$Xe);$W[0]=$qj;$Nh=int32($Nh-0x9E3779B9);}return
long2str($W,true);}$g='';$xd=$_SESSION["token"];if(!$xd)$_SESSION["token"]=rand(1,1e6);$qi=get_token();$dg=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$dg[$y]=$X;}}function
add_invalid_login(){global$b;$kd=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$kd)return;$Yd=unserialize(stream_get_contents($kd));$gi=time();if($Yd){foreach($Yd
as$Zd=>$X){if($X[0]<$gi)unset($Yd[$Zd]);}}$Xd=&$Yd[$b->bruteForceKey()];if(!$Xd)$Xd=array($gi+30*60,0);$Xd[1]++;file_write_unlock($kd,serialize($Yd));}function
check_invalid_login(){global$b;$Yd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Xd=$Yd[$b->bruteForceKey()];$ef=($Xd[1]>29?$Xd[0]-time():0);if($ef>0)auth_error(lang(array('Too many unsuccessful logins, try again in %d minute.','Too many unsuccessful logins, try again in %d minutes.'),ceil($ef/60)));}$Ka=$_POST["auth"];if($Ka){session_regenerate_id();$Zi=$Ka["driver"];$M=$Ka["server"];$V=$Ka["username"];$E=(string)$Ka["password"];$l=$Ka["db"];set_password($Zi,$M,$V,$E);$_SESSION["db"][$Zi][$M][$V][$l]=true;if($Ka["permanent"]){$y=base64_encode($Zi)."-".base64_encode($M)."-".base64_encode($V)."-".base64_encode($l);$pg=$b->permanentLogin(true);$dg[$y]="$y:".base64_encode($pg?encrypt_string($E,$pg):"");cookie("adminer_permanent",implode(" ",$dg));}if(count($_POST)==1||DRIVER!=$Zi||SERVER!=$M||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($Zi,$M,$V,$l));}elseif($_POST["logout"]){if($xd&&!verify_token()){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.'.' '.'Thanks for using Adminer, consider <a href="https://www.adminer.org/en/donation/">donating</a>.');}}elseif($dg&&!$_SESSION["pwds"]){session_regenerate_id();$pg=$b->permanentLogin();foreach($dg
as$y=>$X){list(,$jb)=explode(":",$X);list($Zi,$M,$V,$l)=array_map('base64_decode',explode("-",$y));set_password($Zi,$M,$V,decrypt_string(base64_decode($jb),$pg));$_SESSION["db"][$Zi][$M][$V][$l]=true;}}function
unset_permanent(){global$dg;foreach($dg
as$y=>$X){list($Zi,$M,$V,$l)=array_map('base64_decode',explode("-",$y));if($Zi==DRIVER&&$M==SERVER&&$V==$_GET["username"]&&$l==DB)unset($dg[$y]);}cookie("adminer_permanent",implode(" ",$dg));}function
auth_error($n){global$b,$xd;$ph=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$ph]||$_GET[$ph])&&!$xd)$n='Session expired, please login again.';else{restart_session();add_invalid_login();$E=get_password();if($E!==null){if($E===false)$n.='<br>'.sprintf('Master password expired. <a href="https://www.adminer.org/en/extension/"%s>Implement</a> %s method to make it permanent.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$ph]&&$_GET[$ph]&&ini_bool("session.use_only_cookies"))$n='Session support must be enabled.';$Qf=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$Qf["lifetime"]);page_header('Login',$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'The action will be performed after successful login with the same credentials.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$jg)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Cd,$fg)=explode(":",SERVER,2);if(is_numeric($fg)&&($fg<1024||$fg>65535))auth_error('Connecting to privileged ports is not allowed.');check_invalid_login();$g=connect();$m=new
Min_Driver($g);}$_e=null;if(!is_object($g)||($_e=$b->login($_GET["username"],get_password()))!==true){$n=(is_string($g)?h($g):(is_string($_e)?$_e:'Invalid credentials.'));auth_error($n.(preg_match('~^ | $~',get_password())?'<br>'.'There is a space in the input password which might be the cause.':''));}if($Ka&&$_POST["token"])$_POST["token"]=$qi;$n='';if($_POST){if(!verify_token()){$Sd="max_input_vars";$Le=ini_get($Sd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$Le||$X<$Le)){$Sd=$y;$Le=$X;}}}$n=(!$_POST["token"]&&$Le?sprintf('Maximum number of allowed fields exceeded. Please increase %s.',"'$Sd'"):'Invalid CSRF token. Send the form again.'.' '.'If you did not send this request from Adminer then close this page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.',"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.'You can upload a big SQL file via FTP and import it from server.';}function
select($G,$h=null,$Ef=array(),$z=0){global$x;$ye=array();$w=array();$f=array();$Ua=array();$U=array();$H=array();odd('');for($s=0;(!$z||$s<$z)&&($I=$G->fetch_row());$s++){if(!$s){echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($ee=0;$ee<count($I);$ee++){$o=$G->fetch_field();$B=$o->name;$Df=$o->orgtable;$Cf=$o->orgname;$H[$o->table]=$Df;if($Ef&&$x=="sql")$ye[$ee]=($B=="table"?"table=":($B=="possible_keys"?"indexes=":null));elseif($Df!=""){if(!isset($w[$Df])){$w[$Df]=array();foreach(indexes($Df,$h)as$v){if($v["type"]=="PRIMARY"){$w[$Df]=array_flip($v["columns"]);break;}}$f[$Df]=$w[$Df];}if(isset($f[$Df][$Cf])){unset($f[$Df][$Cf]);$w[$Df][$Cf]=$ee;$ye[$ee]=$Df;}}if($o->charsetnr==63)$Ua[$ee]=true;$U[$ee]=$o->type;echo"<th".($Df!=""||$o->name!=$Cf?" title='".h(($Df!=""?"$Df.":"").$Cf)."'":"").">".h($B).($Ef?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($B),'mariadb'=>"explain/#the-columns-in-explain-select",)):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($I
as$y=>$X){if($X===null)$X="<i>NULL</i>";elseif($Ua[$y]&&!is_utf8($X))$X="<i>".lang(array('%d byte','%d bytes'),strlen($X))."</i>";else{$X=h($X);if($U[$y]==254)$X="<code>$X</code>";}if(isset($ye[$y])&&!$f[$ye[$y]]){if($Ef&&$x=="sql"){$Q=$I[array_search("table=",$ye)];$_=$ye[$y].urlencode($Ef[$Q]!=""?$Ef[$Q]:$Q);}else{$_="edit=".urlencode($ye[$y]);foreach($w[$ye[$y]]as$nb=>$ee)$_.="&where".urlencode("[".bracket_escape($nb)."]")."=".urlencode($I[$ee]);}$X="<a href='".h(ME.$_)."'>$X</a>";}echo"<td>$X";}}echo($s?"</table>\n</div>":"<p class='message'>".'No rows.')."\n";return$H;}function
referencable_primary($jh){$H=array();foreach(table_status('',true)as$Rh=>$Q){if($Rh!=$jh&&fk_support($Q)){foreach(fields($Rh)as$o){if($o["primary"]){if($H[$Rh]){unset($H[$Rh]);break;}$H[$Rh]=$o;}}}}return$H;}function
adminer_settings(){parse_str($_COOKIE["adminer_settings"],$rh);return$rh;}function
adminer_setting($y){$rh=adminer_settings();return$rh[$y];}function
set_adminer_settings($rh){return
cookie("adminer_settings",http_build_query($rh+adminer_settings()));}function
textarea($B,$Y,$J=10,$rb=80){global$x;echo"<textarea name='$B' rows='$J' cols='$rb' class='sqlarea jush-$x' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($y,$o,$pb,$gd=array(),$Nc=array()){global$Jh,$U,$Ki,$sf;$T=$o["type"];echo'<td><select name="',h($y),'[type]" class="type" aria-labelledby="label-type">';if($T&&!isset($U[$T])&&!isset($gd[$T])&&!in_array($T,$Nc))$Nc[]=$T;if($gd)$Jh['Foreign keys']=$gd;echo
optionlist(array_merge($Nc,$Jh),$T),'</select><td><input name="',h($y),'[length]" value="',h($o["length"]),'" size="3"',(!$o["length"]&&preg_match('~var(char|binary)$~',$T)?" class='required'":"");echo' aria-labelledby="label-length"><td class="options">',"<select name='".h($y)."[collation]'".(preg_match('~(char|text|enum|set)$~',$T)?"":" class='hidden'").'><option value="">('.'collation'.')'.optionlist($pb,$o["collation"]).'</select>',($Ki?"<select name='".h($y)."[unsigned]'".(!$T||preg_match(number_type(),$T)?"":" class='hidden'").'><option>'.optionlist($Ki,$o["unsigned"]).'</select>':''),(isset($o['on_update'])?"<select name='".h($y)."[on_update]'".(preg_match('~timestamp|datetime~',$T)?"":" class='hidden'").'>'.optionlist(array(""=>"(".'ON UPDATE'.")","CURRENT_TIMESTAMP"),(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"CURRENT_TIMESTAMP":$o["on_update"])).'</select>':''),($gd?"<select name='".h($y)."[on_delete]'".(preg_match("~`~",$T)?"":" class='hidden'")."><option value=''>(".'ON DELETE'.")".optionlist(explode("|",$sf),$o["on_delete"])."</select> ":" ");}function
process_length($ve){global$yc;return(preg_match("~^\\s*\\(?\\s*$yc(?:\\s*,\\s*$yc)*+\\s*\\)?\\s*\$~",$ve)&&preg_match_all("~$yc~",$ve,$Fe)?"(".implode(",",$Fe[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$ve)));}function
process_type($o,$ob="COLLATE"){global$Ki;return" $o[type]".process_length($o["length"]).(preg_match(number_type(),$o["type"])&&in_array($o["unsigned"],$Ki)?" $o[unsigned]":"").(preg_match('~char|text|enum|set~',$o["type"])&&$o["collation"]?" $ob ".q($o["collation"]):"");}function
process_field($o,$Ci){return
array(idf_escape(trim($o["field"])),process_type($Ci),($o["null"]?" NULL":" NOT NULL"),default_value($o),(preg_match('~timestamp|datetime~',$o["type"])&&$o["on_update"]?" ON UPDATE $o[on_update]":""),(support("comment")&&$o["comment"]!=""?" COMMENT ".q($o["comment"]):""),($o["auto_increment"]?auto_increment():null),);}function
default_value($o){$Ub=$o["default"];return($Ub===null?"":" DEFAULT ".(preg_match('~char|binary|text|enum|set~',$o["type"])||preg_match('~^(?![a-z])~i',$Ub)?q($Ub):$Ub));}function
type_class($T){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$y=>$X){if(preg_match("~$y|$X~",$T))return" class='$y'";}}function
edit_fields($p,$pb,$T="TABLE",$gd=array()){global$Td;$p=array_values($p);$Vb=(($_POST?$_POST["defaults"]:adminer_setting("defaults"))?"":" class='hidden'");$vb=(($_POST?$_POST["comments"]:adminer_setting("comments"))?"":" class='hidden'");echo'<thead><tr>
';if($T=="PROCEDURE"){echo'<td>';}echo'<th id="label-name">',($T=="TABLE"?'Column name':'Parameter name'),'<td id="label-type">Type<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;"></textarea>',script("qs('#enum-edit').onblur = editingLengthBlur;"),'<td id="label-length">Length
<td>','Options';if($T=="TABLE"){echo'<td id="label-null">NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym id="label-ai" title="Auto Increment">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'mariadb'=>"auto_increment/",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td id="label-default"',$Vb,'>Default value
',(support("comment")?"<td id='label-comment'$vb>".'Comment':"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($p))."]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.7.7")."' alt='+' title='".'Add next'."'>".script("row_count = ".count($p).";"),'</thead>
<tbody>
',script("mixin(qsl('tbody'), {onclick: editingClick, onkeydown: editingKeydown, oninput: editingInput});");foreach($p
as$s=>$o){$s++;$Ff=$o[($_POST?"orig":"field")];$dc=(isset($_POST["add"][$s-1])||(isset($o["field"])&&!$_POST["drop_col"][$s]))&&(support("drop_col")||$Ff=="");echo'<tr',($dc?"":" style='display: none;'"),'>
',($T=="PROCEDURE"?"<td>".html_select("fields[$s][inout]",explode("|",$Td),$o["inout"]):""),'<th>';if($dc){echo'<input name="fields[',$s,'][field]" value="',h($o["field"]),'" data-maxlength="64" autocapitalize="off" aria-labelledby="label-name">';}echo'<input type="hidden" name="fields[',$s,'][orig]" value="',h($Ff),'">';edit_type("fields[$s]",$o,$pb,$gd);if($T=="TABLE"){echo'<td>',checkbox("fields[$s][null]",1,$o["null"],"","","block","label-null"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$s,'"';if($o["auto_increment"]){echo' checked';}echo' aria-labelledby="label-ai"></label><td',$Vb,'>',checkbox("fields[$s][has_default]",1,$o["has_default"],"","","","label-default"),'<input name="fields[',$s,'][default]" value="',h($o["default"]),'" aria-labelledby="label-default">',(support("comment")?"<td$vb><input name='fields[$s][comment]' value='".h($o["comment"])."' data-maxlength='".(min_version(5.5)?1024:255)."' aria-labelledby='label-comment'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.7.7")."' alt='+' title='".'Add next'."'> "."<input type='image' class='icon' name='up[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=up.gif&version=4.7.7")."' alt='↑' title='".'Move up'."'> "."<input type='image' class='icon' name='down[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=down.gif&version=4.7.7")."' alt='↓' title='".'Move down'."'> ":""),($Ff==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.7.7")."' alt='x' title='".'Remove'."'>":"");}}function
process_fields(&$p){$C=0;if($_POST["up"]){$pe=0;foreach($p
as$y=>$o){if(key($_POST["up"])==$y){unset($p[$y]);array_splice($p,$pe,0,array($o));break;}if(isset($o["field"]))$pe=$C;$C++;}}elseif($_POST["down"]){$id=false;foreach($p
as$y=>$o){if(isset($o["field"])&&$id){unset($p[key($_POST["down"])]);array_splice($p,$C,0,array($id));break;}if(key($_POST["down"])==$y)$id=$o;$C++;}}elseif($_POST["add"]){$p=array_values($p);array_splice($p,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($A){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($A[0][0].$A[0][0],$A[0][0],substr($A[0],1,-1))),'\\'))."'";}function
grant($nd,$rg,$f,$rf){if(!$rg)return
true;if($rg==array("ALL PRIVILEGES","GRANT OPTION"))return($nd=="GRANT"?queries("$nd ALL PRIVILEGES$rf WITH GRANT OPTION"):queries("$nd ALL PRIVILEGES$rf")&&queries("$nd GRANT OPTION$rf"));return
queries("$nd ".preg_replace('~(GRANT OPTION)\([^)]*\)~','\1',implode("$f, ",$rg).$f).$rf);}function
drop_create($hc,$i,$ic,$di,$kc,$ze,$Qe,$Oe,$Pe,$of,$bf){if($_POST["drop"])query_redirect($hc,$ze,$Qe);elseif($of=="")query_redirect($i,$ze,$Pe);elseif($of!=$bf){$Hb=queries($i);queries_redirect($ze,$Oe,$Hb&&queries($hc));if($Hb)queries($ic);}else
queries_redirect($ze,$Oe,queries($di)&&queries($kc)&&queries($hc)&&queries($i));}function
create_trigger($rf,$I){global$x;$ii=" $I[Timing] $I[Event]".($I["Event"]=="UPDATE OF"?" ".idf_escape($I["Of"]):"");return"CREATE TRIGGER ".idf_escape($I["Trigger"]).($x=="mssql"?$rf.$ii:$ii.$rf).rtrim(" $I[Type]\n$I[Statement]",";").";";}function
create_routine($Wg,$I){global$Td,$x;$N=array();$p=(array)$I["fields"];ksort($p);foreach($p
as$o){if($o["field"]!="")$N[]=(preg_match("~^($Td)\$~",$o["inout"])?"$o[inout] ":"").idf_escape($o["field"]).process_type($o,"CHARACTER SET");}$Wb=rtrim("\n$I[definition]",";");return"CREATE $Wg ".idf_escape(trim($I["name"]))." (".implode(", ",$N).")".(isset($_GET["function"])?" RETURNS".process_type($I["returns"],"CHARACTER SET"):"").($I["language"]?" LANGUAGE $I[language]":"").($x=="pgsql"?" AS ".q($Wb):"$Wb;");}function
remove_definer($F){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\1)',logged_user()).'`~','\1',$F);}function
format_foreign_key($q){global$sf;$l=$q["db"];$gf=$q["ns"];return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$q["source"])).") REFERENCES ".($l!=""&&$l!=$_GET["db"]?idf_escape($l).".":"").($gf!=""&&$gf!=$_GET["ns"]?idf_escape($gf).".":"").table($q["table"])." (".implode(", ",array_map('idf_escape',$q["target"])).")".(preg_match("~^($sf)\$~",$q["on_delete"])?" ON DELETE $q[on_delete]":"").(preg_match("~^($sf)\$~",$q["on_update"])?" ON UPDATE $q[on_update]":"");}function
tar_file($Wc,$ni){$H=pack("a100a8a8a8a12a12",$Wc,644,0,0,decoct($ni->size),decoct(time()));$hb=8*32;for($s=0;$s<strlen($H);$s++)$hb+=ord($H[$s]);$H.=sprintf("%06o",$hb)."\0 ";echo$H,str_repeat("\0",512-strlen($H));$ni->send();echo
str_repeat("\0",511-($ni->size+511)%512);}function
ini_bytes($Sd){$X=ini_get($Sd);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($bg,$ei="<sup>?</sup>"){global$x,$g;$nh=$g->server_info;$aj=preg_replace('~^(\d\.?\d).*~s','\1',$nh);$Pi=array('sql'=>"https://dev.mysql.com/doc/refman/$aj/en/",'sqlite'=>"https://www.sqlite.org/",'pgsql'=>"https://www.postgresql.org/docs/$aj/",'mssql'=>"https://msdn.microsoft.com/library/",'oracle'=>"https://www.oracle.com/pls/topic/lookup?ctx=db".preg_replace('~^.* (\d+)\.(\d+)\.\d+\.\d+\.\d+.*~s','\1\2',$nh)."&id=",);if(preg_match('~MariaDB~',$nh)){$Pi['sql']="https://mariadb.com/kb/en/library/";$bg['sql']=(isset($bg['mariadb'])?$bg['mariadb']:str_replace(".html","/",$bg['sql']));}return($bg[$x]?"<a href='$Pi[$x]$bg[$x]'".target_blank().">$ei</a>":"");}function
ob_gzencode($P){return
gzencode($P);}function
db_size($l){global$g;if(!$g->select_db($l))return"?";$H=0;foreach(table_status()as$R)$H+=$R["Data_length"]+$R["Index_length"];return
format_number($H);}function
set_utf8mb4($i){global$g;static$N=false;if(!$N&&preg_match('~\butf8mb4~i',$i)){$N=true;echo"SET NAMES ".charset($g).";\n\n";}}function
connect_error(){global$b,$g,$qi,$n,$gc;if(DB!=""){header("HTTP/1.1 404 Not Found");page_header('Database'.": ".h(DB),'Invalid database.',true);}else{if($_POST["db"]&&!$n)queries_redirect(substr(ME,0,-1),'Databases have been dropped.',drop_databases($_POST["db"]));page_header('Select database',$n,false);echo"<p class='links'>\n";foreach(array('database'=>'Create database','privileges'=>'Privileges','processlist'=>'Process list','variables'=>'Variables','status'=>'Status',)as$y=>$X){if(support($y))echo"<a href='".h(ME)."$y='>$X</a>\n";}echo"<p>".sprintf('%s version: %s through PHP extension %s',$gc[DRIVER],"<b>".h($g->server_info)."</b>","<b>$g->extension</b>")."\n","<p>".sprintf('Logged as: %s',"<b>".h(logged_user())."</b>")."\n";$k=$b->databases();if($k){$dh=support("scheme");$pb=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),"<thead><tr>".(support("database")?"<td>":"")."<th>".'Database'." - <a href='".h(ME)."refresh=1'>".'Refresh'."</a>"."<td>".'Collation'."<td>".'Tables'."<td>".'Size'." - <a href='".h(ME)."dbsize=1'>".'Compute'."</a>".script("qsl('a').onclick = partial(ajaxSetHtml, '".js_escape(ME)."script=connect');","")."</thead>\n";$k=($_GET["dbsize"]?count_tables($k):array_flip($k));foreach($k
as$l=>$S){$Vg=h(ME)."db=".urlencode($l);$t=h("Db-".$l);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$l,in_array($l,(array)$_POST["db"]),"","","",$t):""),"<th><a href='$Vg' id='$t'>".h($l)."</a>";$d=h(db_collation($l,$pb));echo"<td>".(support("database")?"<a href='$Vg".($dh?"&amp;ns=":"")."&amp;database=' title='".'Alter database'."'>$d</a>":$d),"<td align='right'><a href='$Vg&amp;schema=' id='tables-".h($l)."' title='".'Database schema'."'>".($_GET["dbsize"]?$S:"?")."</a>","<td align='right' id='size-".h($l)."'>".($_GET["dbsize"]?db_size($l):"?"),"\n";}echo"</table>\n",(support("database")?"<div class='footer'><div>\n"."<fieldset><legend>".'Selected'." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value=''>".script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^db/)); };")."<input type='submit' name='drop' value='".'Drop'."'>".confirm()."\n"."</div></fieldset>\n"."</div></div>\n":""),"<input type='hidden' name='token' value='$qi'>\n","</form>\n",script("tableCheck();");}}page_footer("db");}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$g->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header('Schema'.": ".h($_GET["ns"]),'Invalid schema.',true);page_footer("ns");exit;}}$sf="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
__construct(){$this->handler=tmpfile();}function
write($Bb){$this->size+=strlen($Bb);fwrite($this->handler,$Bb);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$yc="'(?:''|[^'\\\\]|\\\\.)*'";$Td="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$K=array(idf_escape($_GET["field"]));$G=$m->select($a,$K,array(where($_GET,$p)),$K);$I=($G?$G->fetch_row():array());echo$m->value($I[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$p=fields($a);if(!$p)$n=error();$R=table_status1($a,true);$B=$b->tableName($R);page_header(($p&&is_view($R)?$R['Engine']=='materialized view'?'Materialized view':'View':'Table').": ".($B!=""?$B:h($a)),$n);$b->selectLinks($R);$ub=$R["Comment"];if($ub!="")echo"<p class='nowrap'>".'Comment'.": ".h($ub)."\n";if($p)$b->tableStructurePrint($p);if(!is_view($R)){if(support("indexes")){echo"<h3 id='indexes'>".'Indexes'."</h3>\n";$w=indexes($a);if($w)$b->tableIndexesPrint($w);echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.'Alter indexes'."</a>\n";}if(fk_support($R)){echo"<h3 id='foreign-keys'>".'Foreign keys'."</h3>\n";$gd=foreign_keys($a);if($gd){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Source'."<td>".'Target'."<td>".'ON DELETE'."<td>".'ON UPDATE'."<td></thead>\n";foreach($gd
as$B=>$q){echo"<tr title='".h($B)."'>","<th><i>".implode("</i>, <i>",array_map('h',$q["source"]))."</i>","<td><a href='".h($q["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($q["db"]),ME):($q["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($q["ns"]),ME):ME))."table=".urlencode($q["table"])."'>".($q["db"]!=""?"<b>".h($q["db"])."</b>.":"").($q["ns"]!=""?"<b>".h($q["ns"])."</b>.":"").h($q["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$q["target"]))."</i>)","<td>".h($q["on_delete"])."\n","<td>".h($q["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($B)).'">'.'Alter'.'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.'Add foreign key'."</a>\n";}}if(support(is_view($R)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".'Triggers'."</h3>\n";$Bi=triggers($a);if($Bi){echo"<table cellspacing='0'>\n";foreach($Bi
as$y=>$X)echo"<tr valign='top'><td>".h($X[0])."<td>".h($X[1])."<th>".h($y)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($y))."'>".'Alter'."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.'Add trigger'."</a>\n";}}elseif(isset($_GET["schema"])){page_header('Database schema',"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Th=array();$Uh=array();$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE["adminer_schema-".str_replace(".","_",DB)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$Fe,PREG_SET_ORDER);foreach($Fe
as$s=>$A){$Th[$A[1]]=array($A[2],$A[3]);$Uh[]="\n\t'".js_escape($A[1])."': [ $A[2], $A[3] ]";}$ri=0;$Ra=-1;$ch=array();$Hg=array();$te=array();foreach(table_status('',true)as$Q=>$R){if(is_view($R))continue;$gg=0;$ch[$Q]["fields"]=array();foreach(fields($Q)as$B=>$o){$gg+=1.25;$o["pos"]=$gg;$ch[$Q]["fields"][$B]=$o;}$ch[$Q]["pos"]=($Th[$Q]?$Th[$Q]:array($ri,0));foreach($b->foreignKeys($Q)as$X){if(!$X["db"]){$re=$Ra;if($Th[$Q][1]||$Th[$X["table"]][1])$re=min(floatval($Th[$Q][1]),floatval($Th[$X["table"]][1]))-1;else$Ra-=.1;while($te[(string)$re])$re-=.0001;$ch[$Q]["references"][$X["table"]][(string)$re]=array($X["source"],$X["target"]);$Hg[$X["table"]][$Q][(string)$re]=$X["target"];$te[(string)$re]=true;}}$ri=max($ri,$ch[$Q]["pos"][0]+2.5+$gg);}echo'<div id="schema" style="height: ',$ri,'em;">
<script',nonce(),'>
qs(\'#schema\').onselectstart = function () { return false; };
var tablePos = {',implode(",",$Uh)."\n",'};
var em = qs(\'#schema\').offsetHeight / ',$ri,';
document.onmousemove = schemaMousemove;
document.onmouseup = partialArg(schemaMouseup, \'',js_escape(DB),'\');
</script>
';foreach($ch
as$B=>$Q){echo"<div class='table' style='top: ".$Q["pos"][0]."em; left: ".$Q["pos"][1]."em;'>",'<a href="'.h(ME).'table='.urlencode($B).'"><b>'.h($B)."</b></a>",script("qsl('div').onmousedown = schemaMousedown;");foreach($Q["fields"]as$o){$X='<span'.type_class($o["type"]).' title="'.h($o["full_type"].($o["null"]?" NULL":'')).'">'.h($o["field"]).'</span>';echo"<br>".($o["primary"]?"<i>$X</i>":$X);}foreach((array)$Q["references"]as$ai=>$Ig){foreach($Ig
as$re=>$Eg){$se=$re-$Th[$B][1];$s=0;foreach($Eg[0]as$yh)echo"\n<div class='references' title='".h($ai)."' id='refs$re-".($s++)."' style='left: $se"."em; top: ".$Q["fields"][$yh]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$se)."em;'></div></div>";}}foreach((array)$Hg[$B]as$ai=>$Ig){foreach($Ig
as$re=>$f){$se=$re-$Th[$B][1];$s=0;foreach($f
as$Zh)echo"\n<div class='references' title='".h($ai)."' id='refd$re-".($s++)."' style='left: $se"."em; top: ".$Q["fields"][$Zh]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME)."?file=arrow.gif) no-repeat right center;&version=4.7.7")."'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$se)."em;'></div></div>";}}echo"\n</div>\n";}foreach($ch
as$B=>$Q){foreach((array)$Q["references"]as$ai=>$Ig){foreach($Ig
as$re=>$Eg){$Ue=$ri;$Je=-10;foreach($Eg[0]as$y=>$yh){$hg=$Q["pos"][0]+$Q["fields"][$yh]["pos"];$ig=$ch[$ai]["pos"][0]+$ch[$ai]["fields"][$Eg[1][$y]]["pos"];$Ue=min($Ue,$hg,$ig);$Je=max($Je,$hg,$ig);}echo"<div class='references' id='refl$re' style='left: $re"."em; top: $Ue"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($Je-$Ue)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">Permanent link</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$n){$Eb="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$y)$Eb.="&$y=".urlencode($_POST[$y]);cookie("adminer_export",substr($Eb,1));$S=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$Kc=dump_headers((count($S)==1?key($S):DB),(DB==""||count($S)>1));$be=preg_match('~sql~',$_POST["format"]);if($be){echo"-- Adminer $ia ".$gc[DRIVER]." dump\n\n";if($x=="sql"){echo"SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
".($_POST["data_style"]?"SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
";$g->query("SET time_zone = '+00:00';");}}$Kh=$_POST["db_style"];$k=array(DB);if(DB==""){$k=$_POST["databases"];if(is_string($k))$k=explode("\n",rtrim(str_replace("\r","",$k),"\n"));}foreach((array)$k
as$l){$b->dumpDatabase($l);if($g->select_db($l)){if($be&&preg_match('~CREATE~',$Kh)&&($i=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1))){set_utf8mb4($i);if($Kh=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($l).";\n";echo"$i;\n";}if($be){if($Kh)echo
use_sql($l).";\n\n";$Lf="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Wg){foreach(get_rows("SHOW $Wg STATUS WHERE Db = ".q($l),null,"-- ")as$I){$i=remove_definer($g->result("SHOW CREATE $Wg ".idf_escape($I["Name"]),2));set_utf8mb4($i);$Lf.=($Kh!='DROP+CREATE'?"DROP $Wg IF EXISTS ".idf_escape($I["Name"]).";;\n":"")."$i;;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$I){$i=remove_definer($g->result("SHOW CREATE EVENT ".idf_escape($I["Name"]),3));set_utf8mb4($i);$Lf.=($Kh!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($I["Name"]).";;\n":"")."$i;;\n\n";}}if($Lf)echo"DELIMITER ;;\n\n$Lf"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$cj=array();foreach(table_status('',true)as$B=>$R){$Q=(DB==""||in_array($B,(array)$_POST["tables"]));$Nb=(DB==""||in_array($B,(array)$_POST["data"]));if($Q||$Nb){if($Kc=="tar"){$ni=new
TmpFile;ob_start(array($ni,'write'),1e5);}$b->dumpTable($B,($Q?$_POST["table_style"]:""),(is_view($R)?2:0));if(is_view($R))$cj[]=$B;elseif($Nb){$p=fields($B);$b->dumpData($B,$_POST["data_style"],"SELECT *".convert_fields($p,$p)." FROM ".table($B));}if($be&&$_POST["triggers"]&&$Q&&($Bi=trigger_sql($B)))echo"\nDELIMITER ;;\n$Bi\nDELIMITER ;\n";if($Kc=="tar"){ob_end_flush();tar_file((DB!=""?"":"$l/")."$B.csv",$ni);}elseif($be)echo"\n";}}foreach($cj
as$bj)$b->dumpTable($bj,$_POST["table_style"],1);if($Kc=="tar")echo
pack("x512");}}}if($be)echo"-- ".$g->result("SELECT NOW()")."\n";exit;}page_header('Export',$n,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0" class="layout">
';$Rb=array('','USE','DROP+CREATE','CREATE');$Vh=array('','DROP+CREATE','CREATE');$Ob=array('','TRUNCATE+INSERT','INSERT');if($x=="sql")$Ob[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$I);if(!$I)$I=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($I["events"])){$I["routines"]=$I["events"]=($_GET["dump"]=="");$I["triggers"]=$I["table_style"];}echo"<tr><th>".'Output'."<td>".html_select("output",$b->dumpOutput(),$I["output"],0)."\n";echo"<tr><th>".'Format'."<td>".html_select("format",$b->dumpFormat(),$I["format"],0)."\n";echo($x=="sqlite"?"":"<tr><th>".'Database'."<td>".html_select('db_style',$Rb,$I["db_style"]).(support("routine")?checkbox("routines",1,$I["routines"],'Routines'):"").(support("event")?checkbox("events",1,$I["events"],'Events'):"")),"<tr><th>".'Tables'."<td>".html_select('table_style',$Vh,$I["table_style"]).checkbox("auto_increment",1,$I["auto_increment"],'Auto Increment').(support("trigger")?checkbox("triggers",1,$I["triggers"],'Triggers'):""),"<tr><th>".'Data'."<td>".html_select('data_style',$Ob,$I["data_style"]),'</table>
<p><input type="submit" value="Export">
<input type="hidden" name="token" value="',$qi,'">

<table cellspacing="0">
',script("qsl('table').onclick = dumpClick;");$lg=array();if(DB!=""){$fb=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$fb>".'Tables'."</label>".script("qs('#check-tables').onclick = partial(formCheck, /^tables\\[/);",""),"<th style='text-align: right;'><label class='block'>".'Data'."<input type='checkbox' id='check-data'$fb></label>".script("qs('#check-data').onclick = partial(formCheck, /^data\\[/);",""),"</thead>\n";$cj="";$Wh=tables_list();foreach($Wh
as$B=>$T){$kg=preg_replace('~_.*~','',$B);$fb=($a==""||$a==(substr($a,-1)=="%"?"$kg%":$B));$og="<tr><td>".checkbox("tables[]",$B,$fb,$B,"","block");if($T!==null&&!preg_match('~table~i',$T))$cj.="$og\n";else
echo"$og<td align='right'><label class='block'><span id='Rows-".h($B)."'></span>".checkbox("data[]",$B,$fb)."</label>\n";$lg[$kg]++;}echo$cj;if($Wh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}else{echo"<thead><tr><th style='text-align: left;'>","<label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"").">".'Database'."</label>",script("qs('#check-databases').onclick = partial(formCheck, /^databases\\[/);",""),"</thead>\n";$k=$b->databases();if($k){foreach($k
as$l){if(!information_schema($l)){$kg=preg_replace('~_.*~','',$l);echo"<tr><td>".checkbox("databases[]",$l,$a==""||$a=="$kg%",$l,"","block")."\n";$lg[$kg]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$Yc=true;foreach($lg
as$y=>$X){if($y!=""&&$X>1){echo($Yc?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$y%")."'>".h($y)."</a>";$Yc=false;}}}elseif(isset($_GET["privileges"])){page_header('Privileges');echo'<p class="links"><a href="'.h(ME).'user=">'.'Create user'."</a>";$G=$g->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$nd=$G;if(!$G)$G=$g->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($nd?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".'Username'."<th>".'Server'."<th></thead>\n";while($I=$G->fetch_assoc())echo'<tr'.odd().'><td>'.h($I["User"])."<td>".h($I["Host"]).'<td><a href="'.h(ME.'user='.urlencode($I["User"]).'&host='.urlencode($I["Host"])).'">'.'Edit'."</a>\n";if(!$nd||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".'Edit'."'>\n";echo"</table>\n","</form>\n";}elseif(isset($_GET["sql"])){if(!$n&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$Ad=&get_session("queries");$_d=&$Ad[DB];if(!$n&&$_POST["clear"]){$_d=array();redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?'Import':'SQL command'),$n);if(!$n&&$_POST){$kd=false;if(!isset($_GET["import"]))$F=$_POST["query"];elseif($_POST["webfile"]){$Bh=$b->importServerPath();$kd=@fopen((file_exists($Bh)?$Bh:"compress.zlib://$Bh.gz"),"rb");$F=($kd?fread($kd,1e6):false);}else$F=get_file("sql_file",true);if(is_string($F)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($F)+memory_get_usage()+8e6));if($F!=""&&strlen($F)<1e6){$wg=$F.(preg_match("~;[ \t\r\n]*\$~",$F)?"":";");if(!$_d||reset(end($_d))!=$wg){restart_session();$_d[]=array($wg,time());set_session("queries",$Ad);stop_session();}}$zh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Yb=";";$C=0;$vc=true;$h=connect();if(is_object($h)&&DB!=""){$h->select_db(DB);if($_GET["ns"]!="")set_schema($_GET["ns"],$h);}$tb=0;$_c=array();$Sf='[\'"'.($x=="sql"?'`#':($x=="sqlite"?'`[':($x=="mssql"?'[':''))).']|/\*|-- |$'.($x=="pgsql"?'|\$[^$]*\$':'');$si=microtime(true);parse_str($_COOKIE["adminer_export"],$xa);$mc=$b->dumpFormat();unset($mc["sql"]);while($F!=""){if(!$C&&preg_match("~^$zh*+DELIMITER\\s+(\\S+)~i",$F,$A)){$Yb=$A[1];$F=substr($F,strlen($A[0]));}else{preg_match('('.preg_quote($Yb)."\\s*|$Sf)",$F,$A,PREG_OFFSET_CAPTURE,$C);list($id,$gg)=$A[0];if(!$id&&$kd&&!feof($kd))$F.=fread($kd,1e5);else{if(!$id&&rtrim($F)=="")break;$C=$gg+strlen($id);if($id&&rtrim($id)!=$Yb){while(preg_match('('.($id=='/*'?'\*/':($id=='['?']':(preg_match('~^-- |^#~',$id)?"\n":preg_quote($id)."|\\\\."))).'|$)s',$F,$A,PREG_OFFSET_CAPTURE,$C)){$ah=$A[0][0];if(!$ah&&$kd&&!feof($kd))$F.=fread($kd,1e5);else{$C=$A[0][1]+strlen($ah);if($ah[0]!="\\")break;}}}else{$vc=false;$wg=substr($F,0,$gg);$tb++;$og="<pre id='sql-$tb'><code class='jush-$x'>".$b->sqlCommandQuery($wg)."</code></pre>\n";if($x=="sqlite"&&preg_match("~^$zh*+ATTACH\\b~i",$wg,$A)){echo$og,"<p class='error'>".'ATTACH queries are not supported.'."\n";$_c[]=" <a href='#sql-$tb'>$tb</a>";if($_POST["error_stops"])break;}else{if(!$_POST["only_errors"]){echo$og;ob_flush();flush();}$Fh=microtime(true);if($g->multi_query($wg)&&is_object($h)&&preg_match("~^$zh*+USE\\b~i",$wg))$h->query($wg);do{$G=$g->store_result();if($g->error){echo($_POST["only_errors"]?$og:""),"<p class='error'>".'Error in query'.($g->errno?" ($g->errno)":"").": ".error()."\n";$_c[]=" <a href='#sql-$tb'>$tb</a>";if($_POST["error_stops"])break
2;}else{$gi=" <span class='time'>(".format_time($Fh).")</span>".(strlen($wg)<1000?" <a href='".h(ME)."sql=".urlencode(trim($wg))."'>".'Edit'."</a>":"");$za=$g->affected_rows;$fj=($_POST["only_errors"]?"":$m->warnings());$gj="warnings-$tb";if($fj)$gi.=", <a href='#$gj'>".'Warnings'."</a>".script("qsl('a').onclick = partial(toggle, '$gj');","");$Hc=null;$Ic="explain-$tb";if(is_object($G)){$z=$_POST["limit"];$Ef=select($G,$h,array(),$z);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n";$if=$G->num_rows;echo"<p>".($if?($z&&$if>$z?sprintf('%d / ',$z):"").lang(array('%d row','%d rows'),$if):""),$gi;if($h&&preg_match("~^($zh|\\()*+SELECT\\b~i",$wg)&&($Hc=explain($h,$wg)))echo", <a href='#$Ic'>Explain</a>".script("qsl('a').onclick = partial(toggle, '$Ic');","");$t="export-$tb";echo", <a href='#$t'>".'Export'."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."<span id='$t' class='hidden'>: ".html_select("output",$b->dumpOutput(),$xa["output"])." ".html_select("format",$mc,$xa["format"])."<input type='hidden' name='query' value='".h($wg)."'>"." <input type='submit' name='export' value='".'Export'."'><input type='hidden' name='token' value='$qi'></span>\n"."</form>\n";}}else{if(preg_match("~^$zh*+(CREATE|DROP|ALTER)$zh++(DATABASE|SCHEMA)\\b~i",$wg)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($g->info)."'>".lang(array('Query executed OK, %d row affected.','Query executed OK, %d rows affected.'),$za)."$gi\n";}echo($fj?"<div id='$gj' class='hidden'>\n$fj</div>\n":"");if($Hc){echo"<div id='$Ic' class='hidden'>\n";select($Hc,$h,$Ef);echo"</div>\n";}}$Fh=microtime(true);}while($g->next_result());}$F=substr($F,$C);$C=0;}}}}if($vc)echo"<p class='message'>".'No commands to execute.'."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".lang(array('%d query executed OK.','%d queries executed OK.'),$tb-count($_c))," <span class='time'>(".format_time($si).")</span>\n";}elseif($_c&&$tb>1)echo"<p class='error'>".'Error in query'.": ".implode("",$_c)."\n";}else
echo"<p class='error'>".upload_error($F)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$Ec="<input type='submit' value='".'Execute'."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$wg=$_GET["sql"];if($_POST)$wg=$_POST["query"];elseif($_GET["history"]=="all")$wg=$_d;elseif($_GET["history"]!="")$wg=$_d[$_GET["history"]][0];echo"<p>";textarea("query",$wg,20);echo
script(($_POST?"":"qs('textarea').focus();\n")."qs('#form').onsubmit = partial(sqlSubmit, qs('#form'), '".remove_from_uri("sql|limit|error_stops|only_errors")."');"),"<p>$Ec\n",'Limit rows'.": <input type='number' name='limit' class='size' value='".h($_POST?$_POST["limit"]:$_GET["limit"])."'>\n";}else{echo"<fieldset><legend>".'File upload'."</legend><div>";$td=(extension_loaded("zlib")?"[.gz]":"");echo(ini_bool("file_uploads")?"SQL$td (&lt; ".ini_get("upload_max_filesize")."B): <input type='file' name='sql_file[]' multiple>\n$Ec":'File uploads are disabled.'),"</div></fieldset>\n";$Id=$b->importServerPath();if($Id){echo"<fieldset><legend>".'From server'."</legend><div>",sprintf('Webserver file %s',"<code>".h($Id)."$td</code>"),' <input type="submit" name="webfile" value="'.'Run file'.'">',"</div></fieldset>\n";}echo"<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])),'Stop on error')."\n",checkbox("only_errors",1,($_POST?$_POST["only_errors"]:isset($_GET["import"])),'Show only errors')."\n","<input type='hidden' name='token' value='$qi'>\n";if(!isset($_GET["import"])&&$_d){print_fieldset("history",'History',$_GET["history"]!="");for($X=end($_d);$X;$X=prev($_d)){$y=key($_d);list($wg,$gi,$qc)=$X;echo'<a href="'.h(ME."sql=&history=$y").'">'.'Edit'."</a>"." <span class='time' title='".@date('Y-m-d',$gi)."'>".@date("H:i:s",$gi)."</span>"." <code class='jush-$x'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$wg)))),80,"</code>").($qc?" <span class='time'>($qc)</span>":"")."<br>\n";}echo"<input type='submit' name='clear' value='".'Clear'."'>\n","<a href='".h(ME."sql=&history=all")."'>".'Edit all'."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Li=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$B=>$o){if(!isset($o["privileges"][$Li?"update":"insert"])||$b->fieldName($o)==""||$o["generated"])unset($p[$B]);}if($_POST&&!$n&&!isset($_GET["select"])){$ze=$_POST["referer"];if($_POST["insert"])$ze=($Li?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$ze))$ze=ME."select=".urlencode($a);$w=indexes($a);$Gi=unique_array($_GET["where"],$w);$zg="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($ze,'Item has been deleted.',$m->delete($a,$zg,!$Gi));else{$N=array();foreach($p
as$B=>$o){$X=process_input($o);if($X!==false&&$X!==null)$N[idf_escape($B)]=$X;}if($Li){if(!$N)redirect($ze);queries_redirect($ze,'Item has been updated.',$m->update($a,$N,$zg,!$Gi));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$G=$m->insert($a,$N);$qe=($G?last_id():0);queries_redirect($ze,sprintf('Item%s has been inserted.',($qe?" $qe":"")),$G);}}}$I=null;if($_POST["save"])$I=(array)$_POST["fields"];elseif($Z){$K=array();foreach($p
as$B=>$o){if(isset($o["privileges"]["select"])){$Ga=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$Ga="''";if($x=="sql"&&preg_match("~enum|set~",$o["type"]))$Ga="1*".idf_escape($B);$K[]=($Ga?"$Ga AS ":"").idf_escape($B);}}$I=array();if(!support("table"))$K=array("*");if($K){$G=$m->select($a,$K,array($Z),$K,array(),(isset($_GET["select"])?2:1));if(!$G)$n=error();else{$I=$G->fetch_assoc();if(!$I)$I=false;}if(isset($_GET["select"])&&(!$I||$G->fetch_assoc()))$I=null;}}if(!support("table")&&!$p){if(!$Z){$G=$m->select($a,array("*"),$Z,array("*"));$I=($G?$G->fetch_assoc():false);if(!$I)$I=array($m->primary=>"");}if($I){foreach($I
as$y=>$X){if(!$Z)$I[$y]=null;$p[$y]=array("field"=>$y,"null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary));}}}edit_form($a,$p,$I,$Li);}elseif(isset($_GET["create"])){$a=$_GET["create"];$Uf=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$y)$Uf[$y]=$y;$Gg=referencable_primary($a);$gd=array();foreach($Gg
as$Rh=>$o)$gd[str_replace("`","``",$Rh)."`".str_replace("`","``",$o["field"])]=$Rh;$Hf=array();$R=array();if($a!=""){$Hf=fields($a);$R=table_status($a);if(!$R)$n='No tables.';}$I=$_POST;$I["fields"]=(array)$I["fields"];if($I["auto_increment_col"])$I["fields"][$I["auto_increment_col"]]["auto_increment"]=true;if($_POST)set_adminer_settings(array("comments"=>$_POST["comments"],"defaults"=>$_POST["defaults"]));if($_POST&&!process_fields($I["fields"])&&!$n){if($_POST["drop"])queries_redirect(substr(ME,0,-1),'Table has been dropped.',drop_tables(array($a)));else{$p=array();$Da=array();$Qi=false;$ed=array();$Gf=reset($Hf);$Aa=" FIRST";foreach($I["fields"]as$y=>$o){$q=$gd[$o["type"]];$Ci=($q!==null?$Gg[$q]:$o);if($o["field"]!=""){if(!$o["has_default"])$o["default"]=null;if($y==$I["auto_increment_col"])$o["auto_increment"]=true;$tg=process_field($o,$Ci);$Da[]=array($o["orig"],$tg,$Aa);if($tg!=process_field($Gf,$Gf)){$p[]=array($o["orig"],$tg,$Aa);if($o["orig"]!=""||$Aa)$Qi=true;}if($q!==null)$ed[idf_escape($o["field"])]=($a!=""&&$x!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$gd[$o["type"]],'source'=>array($o["field"]),'target'=>array($Ci["field"]),'on_delete'=>$o["on_delete"],));$Aa=" AFTER ".idf_escape($o["field"]);}elseif($o["orig"]!=""){$Qi=true;$p[]=array($o["orig"]);}if($o["orig"]!=""){$Gf=next($Hf);if(!$Gf)$Aa="";}}$Wf="";if($Uf[$I["partition_by"]]){$Xf=array();if($I["partition_by"]=='RANGE'||$I["partition_by"]=='LIST'){foreach(array_filter($I["partition_names"])as$y=>$X){$Y=$I["partition_values"][$y];$Xf[]="\n  PARTITION ".idf_escape($X)." VALUES ".($I["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$Wf.="\nPARTITION BY $I[partition_by]($I[partition])".($Xf?" (".implode(",",$Xf)."\n)":($I["partitions"]?" PARTITIONS ".(+$I["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$R["Create_options"]))$Wf.="\nREMOVE PARTITIONING";$Ne='Table has been altered.';if($a==""){cookie("adminer_engine",$I["Engine"]);$Ne='Table has been created.';}$B=trim($I["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($B),$Ne,alter_table($a,$B,($x=="sqlite"&&($Qi||$ed)?$Da:$p),$ed,($I["Comment"]!=$R["Comment"]?$I["Comment"]:null),($I["Engine"]&&$I["Engine"]!=$R["Engine"]?$I["Engine"]:""),($I["Collation"]&&$I["Collation"]!=$R["Collation"]?$I["Collation"]:""),($I["Auto_increment"]!=""?number($I["Auto_increment"]):""),$Wf));}}page_header(($a!=""?'Alter table':'Create table'),$n,array("table"=>$a),h($a));if(!$_POST){$I=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($U["int"])?"int":(isset($U["integer"])?"integer":"")),"on_update"=>"")),"partition_names"=>array(""),);if($a!=""){$I=$R;$I["name"]=$a;$I["fields"]=array();if(!$_GET["auto_increment"])$I["Auto_increment"]="";foreach($Hf
as$o){$o["has_default"]=isset($o["default"]);$I["fields"][]=$o;}if(support("partitioning")){$ld="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$G=$g->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $ld ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($I["partition_by"],$I["partitions"],$I["partition"])=$G->fetch_row();$Xf=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $ld AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$Xf[""]="";$I["partition_names"]=array_keys($Xf);$I["partition_values"]=array_values($Xf);}}}$pb=collations();$xc=engines();foreach($xc
as$wc){if(!strcasecmp($wc,$I["Engine"])){$I["Engine"]=$wc;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo'Table name: <input name="name" data-maxlength="64" value="',h($I["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST)echo
script("focus(qs('#form')['name']);");echo($xc?"<select name='Engine'>".optionlist(array(""=>"(".'engine'.")")+$xc,$I["Engine"])."</select>".on_help("getTarget(event).value",1).script("qsl('select').onchange = helpClose;"):""),' ',($pb&&!preg_match("~sqlite|mssql~",$x)?html_select("Collation",array(""=>"(".'collation'.")")+$pb,$I["Collation"]):""),' <input type="submit" value="Save">
';}echo'
';if(support("columns")){echo'<div class="scrollable">
<table cellspacing="0" id="edit-fields" class="nowrap">
';edit_fields($I["fields"],$pb,"TABLE",$gd);echo'</table>
',script("editFields();"),'</div>
<p>
Auto Increment: <input type="number" name="Auto_increment" size="6" value="',h($I["Auto_increment"]),'">
',checkbox("defaults",1,($_POST?$_POST["defaults"]:adminer_setting("defaults")),'Default values',"columnShow(this.checked, 5)","jsonly"),(support("comment")?checkbox("comments",1,($_POST?$_POST["comments"]:adminer_setting("comments")),'Comment',"editingCommentsClick(this, true);","jsonly").' <input name="Comment" value="'.h($I["Comment"]).'" data-maxlength="'.(min_version(5.5)?2048:60).'">':''),'<p>
<input type="submit" value="Save">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$a));}if(support("partitioning")){$Vf=preg_match('~RANGE|LIST~',$I["partition_by"]);print_fieldset("partition",'Partition by',$I["partition_by"]);echo'<p>
',"<select name='partition_by'>".optionlist(array(""=>"")+$Uf,$I["partition_by"])."</select>".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).script("qsl('select').onchange = partitionByChange;"),'(<input name="partition" value="',h($I["partition"]),'">)
Partitions: <input type="number" name="partitions" class="size',($Vf||!$I["partition_by"]?" hidden":""),'" value="',h($I["partitions"]),'">
<table cellspacing="0" id="partition-table"',($Vf?"":" class='hidden'"),'>
<thead><tr><th>Partition name<th>Values</thead>
';foreach($I["partition_names"]as$y=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'" autocapitalize="off">',($y==count($I["partition_names"])-1?script("qsl('input').oninput = partitionNameChange;"):''),'<td><input name="partition_values[]" value="'.h($I["partition_values"][$y]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$Ld=array("PRIMARY","UNIQUE","INDEX");$R=table_status($a,true);if(preg_match('~MyISAM|M?aria'.(min_version(5.6,'10.0.5')?'|InnoDB':'').'~i',$R["Engine"]))$Ld[]="FULLTEXT";if(preg_match('~MyISAM|M?aria'.(min_version(5.7,'10.2.2')?'|InnoDB':'').'~i',$R["Engine"]))$Ld[]="SPATIAL";$w=indexes($a);$mg=array();if($x=="mongo"){$mg=$w["_id_"];unset($Ld[0]);unset($w["_id_"]);}$I=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($I["indexes"]as$v){$B=$v["name"];if(in_array($v["type"],$Ld)){$f=array();$we=array();$ac=array();$N=array();ksort($v["columns"]);foreach($v["columns"]as$y=>$e){if($e!=""){$ve=$v["lengths"][$y];$Zb=$v["descs"][$y];$N[]=idf_escape($e).($ve?"(".(+$ve).")":"").($Zb?" DESC":"");$f[]=$e;$we[]=($ve?$ve:null);$ac[]=$Zb;}}if($f){$Fc=$w[$B];if($Fc){ksort($Fc["columns"]);ksort($Fc["lengths"]);ksort($Fc["descs"]);if($v["type"]==$Fc["type"]&&array_values($Fc["columns"])===$f&&(!$Fc["lengths"]||array_values($Fc["lengths"])===$we)&&array_values($Fc["descs"])===$ac){unset($w[$B]);continue;}}$c[]=array($v["type"],$B,$N);}}}foreach($w
as$B=>$Fc)$c[]=array($Fc["type"],$B,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),'Indexes have been altered.',alter_indexes($a,$c));}page_header('Indexes',$n,array("table"=>$a),h($a));$p=array_keys(fields($a));if($_POST["add"]){foreach($I["indexes"]as$y=>$v){if($v["columns"][count($v["columns"])]!="")$I["indexes"][$y]["columns"][]="";}$v=end($I["indexes"]);if($v["type"]||array_filter($v["columns"],'strlen'))$I["indexes"][]=array("columns"=>array(1=>""));}if(!$I){foreach($w
as$y=>$v){$w[$y]["name"]=$y;$w[$y]["columns"][]="";}$w[]=array("columns"=>array(1=>""));$I["indexes"]=$w;}echo'
<form action="" method="post">
<div class="scrollable">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th id="label-type">Index Type
<th><input type="submit" class="wayoff">Column (length)
<th id="label-name">Name
<th><noscript>',"<input type='image' class='icon' name='add[0]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.7.7")."' alt='+' title='".'Add next'."'>",'</noscript>
</thead>
';if($mg){echo"<tr><td>PRIMARY<td>";foreach($mg["columns"]as$y=>$e){echo
select_input(" disabled",$p,$e),"<label><input disabled type='checkbox'>".'descending'."</label> ";}echo"<td><td>\n";}$ee=1;foreach($I["indexes"]as$v){if(!$_POST["drop_col"]||$ee!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$ee][type]",array(-1=>"")+$Ld,$v["type"],($ee==count($I["indexes"])?"indexesAddRow.call(this);":1),"label-type"),"<td>";ksort($v["columns"]);$s=1;foreach($v["columns"]as$y=>$e){echo"<span>".select_input(" name='indexes[$ee][columns][$s]' title='".'Column'."'",($p?array_combine($p,$p):$p),$e,"partial(".($s==count($v["columns"])?"indexesAddColumn":"indexesChangeColumn").", '".js_escape($x=="sql"?"":$_GET["indexes"]."_")."')"),($x=="sql"||$x=="mssql"?"<input type='number' name='indexes[$ee][lengths][$s]' class='size' value='".h($v["lengths"][$y])."' title='".'Length'."'>":""),(support("descidx")?checkbox("indexes[$ee][descs][$s]",1,$v["descs"][$y],'descending'):"")," </span>";$s++;}echo"<td><input name='indexes[$ee][name]' value='".h($v["name"])."' autocapitalize='off' aria-labelledby='label-name'>\n","<td><input type='image' class='icon' name='drop_col[$ee]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.7.7")."' alt='x' title='".'Remove'."'>".script("qsl('input').onclick = partial(editingRemoveRow, 'indexes\$1[type]');");}$ee++;}echo'</table>
</div>
<p>
<input type="submit" value="Save">
<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["database"])){$I=$_POST;if($_POST&&!$n&&!isset($_POST["add_x"])){$B=trim($I["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),'Database has been dropped.',drop_databases(array(DB)));}elseif(DB!==$B){if(DB!=""){$_GET["db"]=$B;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($B),'Database has been renamed.',rename_database($B,$I["collation"]));}else{$k=explode("\n",str_replace("\r","",$B));$Lh=true;$pe="";foreach($k
as$l){if(count($k)==1||$l!=""){if(!create_database($l,$I["collation"]))$Lh=false;$pe=$l;}}restart_session();set_session("dbs",null);queries_redirect(ME."db=".urlencode($pe),'Database has been created.',$Lh);}}else{if(!$I["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($B).(preg_match('~^[a-z0-9_]+$~i',$I["collation"])?" COLLATE $I[collation]":""),substr(ME,0,-1),'Database has been altered.');}}page_header(DB!=""?'Alter database':'Create database',$n,array(),h(DB));$pb=collations();$B=DB;if($_POST)$B=$I["name"];elseif(DB!="")$I["collation"]=db_collation(DB,$pb);elseif($x=="sql"){foreach(get_vals("SHOW GRANTS")as$nd){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\.\*)?~',$nd,$A)&&$A[1]){$B=stripcslashes(idf_unescape("`$A[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($B,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($B).'</textarea><br>':'<input name="name" id="name" value="'.h($B).'" data-maxlength="64" autocapitalize="off">')."\n".($pb?html_select("collation",array(""=>"(".'collation'.")")+$pb,$I["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mariadb'=>"supported-character-sets-and-collations/",'mssql'=>"ms187963.aspx",)):""),script("focus(qs('#name'));"),'<input type="submit" value="Save">
';if(DB!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',DB))."\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.7.7")."' alt='+' title='".'Add next'."'>\n";echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["scheme"])){$I=$_POST;if($_POST&&!$n){$_=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$_,'Schema has been dropped.');else{$B=trim($I["name"]);$_.=urlencode($B);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($B),$_,'Schema has been created.');elseif($_GET["ns"]!=$B)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($B),$_,'Schema has been altered.');else
redirect($_);}}page_header($_GET["ns"]!=""?'Alter schema':'Create schema',$n);if(!$I)$I["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($I["name"]),'" autocapitalize="off">
',script("focus(qs('#name'));"),'<input type="submit" value="Save">
';if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',$_GET["ns"]))."\n";echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["call"])){$da=($_GET["name"]?$_GET["name"]:$_GET["call"]);page_header('Call'.": ".h($da),$n);$Wg=routine($_GET["call"],(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Jd=array();$Lf=array();foreach($Wg["fields"]as$s=>$o){if(substr($o["inout"],-3)=="OUT")$Lf[$s]="@".idf_escape($o["field"])." AS ".idf_escape($o["field"]);if(!$o["inout"]||substr($o["inout"],0,2)=="IN")$Jd[]=$s;}if(!$n&&$_POST){$ab=array();foreach($Wg["fields"]as$y=>$o){if(in_array($y,$Jd)){$X=process_input($o);if($X===false)$X="''";if(isset($Lf[$y]))$g->query("SET @".idf_escape($o["field"])." = $X");}$ab[]=(isset($Lf[$y])?"@".idf_escape($o["field"]):$X);}$F=(isset($_GET["callf"])?"SELECT":"CALL")." ".table($da)."(".implode(", ",$ab).")";$Fh=microtime(true);$G=$g->multi_query($F);$za=$g->affected_rows;echo$b->selectQuery($F,$Fh,!$G);if(!$G)echo"<p class='error'>".error()."\n";else{$h=connect();if(is_object($h))$h->select_db(DB);do{$G=$g->store_result();if(is_object($G))select($G,$h);else
echo"<p class='message'>".lang(array('Routine has been called, %d row affected.','Routine has been called, %d rows affected.'),$za)." <span class='time'>".@date("H:i:s")."</span>\n";}while($g->next_result());if($Lf)select($g->query("SELECT ".implode(", ",$Lf)));}}echo'
<form action="" method="post">
';if($Jd){echo"<table cellspacing='0' class='layout'>\n";foreach($Jd
as$y){$o=$Wg["fields"][$y];$B=$o["field"];echo"<tr><th>".$b->fieldName($o);$Y=$_POST["fields"][$B];if($Y!=""){if($o["type"]=="enum")$Y=+$Y;if($o["type"]=="set")$Y=array_sum($Y);}input($o,$Y,(string)$_POST["function"][$B]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="Call">
<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$B=$_GET["name"];$I=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$Ne=($_POST["drop"]?'Foreign key has been dropped.':($B!=""?'Foreign key has been altered.':'Foreign key has been created.'));$ze=ME."table=".urlencode($a);if(!$_POST["drop"]){$I["source"]=array_filter($I["source"],'strlen');ksort($I["source"]);$Zh=array();foreach($I["source"]as$y=>$X)$Zh[$y]=$I["target"][$y];$I["target"]=$Zh;}if($x=="sqlite")queries_redirect($ze,$Ne,recreate_table($a,$a,array(),array(),array(" $B"=>($_POST["drop"]?"":" ".format_foreign_key($I)))));else{$c="ALTER TABLE ".table($a);$hc="\nDROP ".($x=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($B);if($_POST["drop"])query_redirect($c.$hc,$ze,$Ne);else{query_redirect($c.($B!=""?"$hc,":"")."\nADD".format_foreign_key($I),$ze,$Ne);$n='Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.'."<br>$n";}}}page_header('Foreign key',$n,array("table"=>$a),h($a));if($_POST){ksort($I["source"]);if($_POST["add"])$I["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$I["target"]=array();}elseif($B!=""){$gd=foreign_keys($a);$I=$gd[$B];$I["source"][]="";}else{$I["table"]=$a;$I["source"]=array("");}echo'
<form action="" method="post">
';$yh=array_keys(fields($a));if($I["db"]!="")$g->select_db($I["db"]);if($I["ns"]!="")set_schema($I["ns"]);$Fg=array_keys(array_filter(table_status('',true),'fk_support'));$Zh=($a===$I["table"]?$yh:array_keys(fields(in_array($I["table"],$Fg)?$I["table"]:reset($Fg))));$tf="this.form['change-js'].value = '1'; this.form.submit();";echo"<p>".'Target table'.": ".html_select("table",$Fg,$I["table"],$tf)."\n";if($x=="pgsql")echo'Schema'.": ".html_select("ns",$b->schemas(),$I["ns"]!=""?$I["ns"]:$_GET["ns"],$tf);elseif($x!="sqlite"){$Sb=array();foreach($b->databases()as$l){if(!information_schema($l))$Sb[]=$l;}echo'DB'.": ".html_select("db",$Sb,$I["db"]!=""?$I["db"]:$_GET["db"],$tf);}echo'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="Change"></noscript>
<table cellspacing="0">
<thead><tr><th id="label-source">Source<th id="label-target">Target</thead>
';$ee=0;foreach($I["source"]as$y=>$X){echo"<tr>","<td>".html_select("source[".(+$y)."]",array(-1=>"")+$yh,$X,($ee==count($I["source"])-1?"foreignAddRow.call(this);":1),"label-source"),"<td>".html_select("target[".(+$y)."]",$Zh,$I["target"][$y],1,"label-target");$ee++;}echo'</table>
<p>
ON DELETE: ',html_select("on_delete",array(-1=>"")+explode("|",$sf),$I["on_delete"]),' ON UPDATE: ',html_select("on_update",array(-1=>"")+explode("|",$sf),$I["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'mariadb'=>"foreign-keys/",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"https://docs.oracle.com/cd/B19306_01/server.102/b14200/clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add column"></noscript>
';if($B!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$B));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$I=$_POST;$If="VIEW";if($x=="pgsql"&&$a!=""){$O=table_status($a);$If=strtoupper($O["Engine"]);}if($_POST&&!$n){$B=trim($I["name"]);$Ga=" AS\n$I[select]";$ze=ME."table=".urlencode($B);$Ne='View has been altered.';$T=($_POST["materialized"]?"MATERIALIZED VIEW":"VIEW");if(!$_POST["drop"]&&$a==$B&&$x!="sqlite"&&$T=="VIEW"&&$If=="VIEW")query_redirect(($x=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($B).$Ga,$ze,$Ne);else{$bi=$B."_adminer_".uniqid();drop_create("DROP $If ".table($a),"CREATE $T ".table($B).$Ga,"DROP $T ".table($B),"CREATE $T ".table($bi).$Ga,"DROP $T ".table($bi),($_POST["drop"]?substr(ME,0,-1):$ze),'View has been dropped.',$Ne,'View has been created.',$a,$B);}}if(!$_POST&&$a!=""){$I=view($a);$I["name"]=$a;$I["materialized"]=($If!="VIEW");if(!$n)$n=error();}page_header(($a!=""?'Alter view':'Create view'),$n,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>Name: <input name="name" value="',h($I["name"]),'" data-maxlength="64" autocapitalize="off">
',(support("materializedview")?" ".checkbox("materialized",1,$I["materialized"],'Materialized view'):""),'<p>';textarea("select",$I["select"]);echo'<p>
<input type="submit" value="Save">
';if($a!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$a));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$Wd=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$Hh=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$I=$_POST;if($_POST&&!$n){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),'Event has been dropped.');elseif(in_array($I["INTERVAL_FIELD"],$Wd)&&isset($Hh[$I["STATUS"]])){$bh="\nON SCHEDULE ".($I["INTERVAL_VALUE"]?"EVERY ".q($I["INTERVAL_VALUE"])." $I[INTERVAL_FIELD]".($I["STARTS"]?" STARTS ".q($I["STARTS"]):"").($I["ENDS"]?" ENDS ".q($I["ENDS"]):""):"AT ".q($I["STARTS"]))." ON COMPLETION".($I["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?'Event has been altered.':'Event has been created.'),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$bh.($aa!=$I["EVENT_NAME"]?"\nRENAME TO ".idf_escape($I["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($I["EVENT_NAME"]).$bh)."\n".$Hh[$I["STATUS"]]." COMMENT ".q($I["EVENT_COMMENT"]).rtrim(" DO\n$I[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?'Alter event'.": ".h($aa):'Create event'),$n);if(!$I&&$aa!=""){$J=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$I=reset($J);}echo'
<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>Name<td><input name="EVENT_NAME" value="',h($I["EVENT_NAME"]),'" data-maxlength="64" autocapitalize="off">
<tr><th title="datetime">Start<td><input name="STARTS" value="',h("$I[EXECUTE_AT]$I[STARTS]"),'">
<tr><th title="datetime">End<td><input name="ENDS" value="',h($I["ENDS"]),'">
<tr><th>Every<td><input type="number" name="INTERVAL_VALUE" value="',h($I["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$Wd,$I["INTERVAL_FIELD"]),'<tr><th>Status<td>',html_select("STATUS",$Hh,$I["STATUS"]),'<tr><th>Comment<td><input name="EVENT_COMMENT" value="',h($I["EVENT_COMMENT"]),'" data-maxlength="64">
<tr><th><td>',checkbox("ON_COMPLETION","PRESERVE",$I["ON_COMPLETION"]=="PRESERVE",'On completion preserve'),'</table>
<p>';textarea("EVENT_DEFINITION",$I["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="Save">
';if($aa!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$aa));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=($_GET["name"]?$_GET["name"]:$_GET["procedure"]);$Wg=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$I=$_POST;$I["fields"]=(array)$I["fields"];if($_POST&&!process_fields($I["fields"])&&!$n){$Ff=routine($_GET["procedure"],$Wg);$bi="$I[name]_adminer_".uniqid();drop_create("DROP $Wg ".routine_id($da,$Ff),create_routine($Wg,$I),"DROP $Wg ".routine_id($I["name"],$I),create_routine($Wg,array("name"=>$bi)+$I),"DROP $Wg ".routine_id($bi,$I),substr(ME,0,-1),'Routine has been dropped.','Routine has been altered.','Routine has been created.',$da,$I["name"]);}page_header(($da!=""?(isset($_GET["function"])?'Alter function':'Alter procedure').": ".h($da):(isset($_GET["function"])?'Create function':'Create procedure')),$n);if(!$_POST&&$da!=""){$I=routine($_GET["procedure"],$Wg);$I["name"]=$da;}$pb=get_vals("SHOW CHARACTER SET");sort($pb);$Xg=routine_languages();echo'
<form action="" method="post" id="form">
<p>Name: <input name="name" value="',h($I["name"]),'" data-maxlength="64" autocapitalize="off">
',($Xg?'Language'.": ".html_select("language",$Xg,$I["language"])."\n":""),'<input type="submit" value="Save">
<div class="scrollable">
<table cellspacing="0" class="nowrap">
';edit_fields($I["fields"],$pb,$Wg);if(isset($_GET["function"])){echo"<tr><td>".'Return type';edit_type("returns",$I["returns"],$pb,array(),($x=="pgsql"?array("void","trigger"):array()));}echo'</table>
',script("editFields();"),'</div>
<p>';textarea("definition",$I["definition"]);echo'<p>
<input type="submit" value="Save">
';if($da!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$da));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$I=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);$B=trim($I["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$_,'Sequence has been dropped.');elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($B),$_,'Sequence has been created.');elseif($fa!=$B)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($B),$_,'Sequence has been altered.');else
redirect($_);}page_header($fa!=""?'Alter sequence'.": ".h($fa):'Create sequence',$n);if(!$I)$I["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($I["name"]),'" autocapitalize="off">
<input type="submit" value="Save">
';if($fa!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',$fa))."\n";echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$I=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$_,'Type has been dropped.');else
query_redirect("CREATE TYPE ".idf_escape(trim($I["name"]))." $I[as]",$_,'Type has been created.');}page_header($ga!=""?'Alter type'.": ".h($ga):'Create type',$n);if(!$I)$I["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',$ga))."\n";else{echo"<input name='name' value='".h($I['name'])."' autocapitalize='off'>\n";textarea("as",$I["as"]);echo"<p><input type='submit' value='".'Save'."'>\n";}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$B=$_GET["name"];$Ai=trigger_options();$I=(array)trigger($B)+array("Trigger"=>$a."_bi");if($_POST){if(!$n&&in_array($_POST["Timing"],$Ai["Timing"])&&in_array($_POST["Event"],$Ai["Event"])&&in_array($_POST["Type"],$Ai["Type"])){$rf=" ON ".table($a);$hc="DROP TRIGGER ".idf_escape($B).($x=="pgsql"?$rf:"");$ze=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($hc,$ze,'Trigger has been dropped.');else{if($B!="")queries($hc);queries_redirect($ze,($B!=""?'Trigger has been altered.':'Trigger has been created.'),queries(create_trigger($rf,$_POST)));if($B!="")queries(create_trigger($rf,$I+array("Type"=>reset($Ai["Type"]))));}}$I=$_POST;}page_header(($B!=""?'Alter trigger'.": ".h($B):'Create trigger'),$n,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0" class="layout">
<tr><th>Time<td>',html_select("Timing",$Ai["Timing"],$I["Timing"],"triggerChange(/^".preg_quote($a,"/")."_[ba][iud]$/, '".js_escape($a)."', this.form);"),'<tr><th>Event<td>',html_select("Event",$Ai["Event"],$I["Event"],"this.form['Timing'].onchange();"),(in_array("UPDATE OF",$Ai["Event"])?" <input name='Of' value='".h($I["Of"])."' class='hidden'>":""),'<tr><th>Type<td>',html_select("Type",$Ai["Type"],$I["Type"]),'</table>
<p>Name: <input name="Trigger" value="',h($I["Trigger"]),'" data-maxlength="64" autocapitalize="off">
',script("qs('#form')['Timing'].onchange();"),'<p>';textarea("Statement",$I["Statement"]);echo'<p>
<input type="submit" value="Save">
';if($B!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$B));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$rg=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$I){foreach(explode(",",($I["Privilege"]=="Grant option"?"":$I["Context"]))as$Cb)$rg[$Cb][$I["Privilege"]]=$I["Comment"];}$rg["Server Admin"]+=$rg["File access on server"];$rg["Databases"]["Create routine"]=$rg["Procedures"]["Create routine"];unset($rg["Procedures"]["Create routine"]);$rg["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$rg["Columns"][$X]=$rg["Tables"][$X];unset($rg["Server Admin"]["Usage"]);foreach($rg["Tables"]as$y=>$X)unset($rg["Databases"][$y]);$af=array();if($_POST){foreach($_POST["objects"]as$y=>$X)$af[$X]=(array)$af[$X]+(array)$_POST["grants"][$y];}$od=array();$pf="";if(isset($_GET["host"])&&($G=$g->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($I=$G->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$I[0],$A)&&preg_match_all('~ *([^(,]*[^ ,(])( *\([^)]+\))?~',$A[1],$Fe,PREG_SET_ORDER)){foreach($Fe
as$X){if($X[1]!="USAGE")$od["$A[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$I[0]))$od["$A[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$I[0],$A))$pf=$A[1];}}if($_POST&&!$n){$qf=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $qf",ME."privileges=",'User has been dropped.');else{$cf=q($_POST["user"])."@".q($_POST["host"]);$Zf=$_POST["pass"];if($Zf!=''&&!$_POST["hashed"]&&!min_version(8)){$Zf=$g->result("SELECT PASSWORD(".q($Zf).")");$n=!$Zf;}$Hb=false;if(!$n){if($qf!=$cf){$Hb=queries((min_version(5)?"CREATE USER":"GRANT USAGE ON *.* TO")." $cf IDENTIFIED BY ".(min_version(8)?"":"PASSWORD ").q($Zf));$n=!$Hb;}elseif($Zf!=$pf)queries("SET PASSWORD FOR $cf = ".q($Zf));}if(!$n){$Tg=array();foreach($af
as$kf=>$nd){if(isset($_GET["grant"]))$nd=array_filter($nd);$nd=array_keys($nd);if(isset($_GET["grant"]))$Tg=array_diff(array_keys(array_filter($af[$kf],'strlen')),$nd);elseif($qf==$cf){$nf=array_keys((array)$od[$kf]);$Tg=array_diff($nf,$nd);$nd=array_diff($nd,$nf);unset($od[$kf]);}if(preg_match('~^(.+)\s*(\(.*\))?$~U',$kf,$A)&&(!grant("REVOKE",$Tg,$A[2]," ON $A[1] FROM $cf")||!grant("GRANT",$nd,$A[2]," ON $A[1] TO $cf"))){$n=true;break;}}}if(!$n&&isset($_GET["host"])){if($qf!=$cf)queries("DROP USER $qf");elseif(!isset($_GET["grant"])){foreach($od
as$kf=>$Tg){if(preg_match('~^(.+)(\(.*\))?$~U',$kf,$A))grant("REVOKE",array_keys($Tg),$A[2]," ON $A[1] FROM $cf");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?'User has been altered.':'User has been created.'),!$n);if($Hb)$g->query("DROP USER $cf");}}page_header((isset($_GET["host"])?'Username'.": ".h("$ha@$_GET[host]"):'Create user'),$n,array("privileges"=>array('','Privileges')));if($_POST){$I=$_POST;$od=$af;}else{$I=$_GET+array("host"=>$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$I["pass"]=$pf;if($pf!="")$I["hashed"]=true;$od[(DB==""||$od?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0" class="layout">
<tr><th>Server<td><input name="host" data-maxlength="60" value="',h($I["host"]),'" autocapitalize="off">
<tr><th>Username<td><input name="user" data-maxlength="80" value="',h($I["user"]),'" autocapitalize="off">
<tr><th>Password<td><input name="pass" id="pass" value="',h($I["pass"]),'" autocomplete="new-password">
';if(!$I["hashed"])echo
script("typePassword(qs('#pass'));");echo(min_version(8)?"":checkbox("hashed",1,$I["hashed"],'Hashed',"typePassword(this.form['pass'], this.checked);")),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".'Privileges'.doc_link(array('sql'=>"grant.html#priv_level"));$s=0;foreach($od
as$kf=>$nd){echo'<th>'.($kf!="*.*"?"<input name='objects[$s]' value='".h($kf)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$s]' value='*.*' size='10'>*.*");$s++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>'Server',"Databases"=>'Database',"Tables"=>'Table',"Columns"=>'Column',"Procedures"=>'Routine',)as$Cb=>$Zb){foreach((array)$rg[$Cb]as$qg=>$ub){echo"<tr".odd()."><td".($Zb?">$Zb<td":" colspan='2'").' lang="en" title="'.h($ub).'">'.h($qg);$s=0;foreach($od
as$kf=>$nd){$B="'grants[$s][".h(strtoupper($qg))."]'";$Y=$nd[strtoupper($qg)];if($Cb=="Server Admin"&&$kf!=(isset($od["*.*"])?"*.*":".*"))echo"<td>";elseif(isset($_GET["grant"]))echo"<td><select name=$B><option><option value='1'".($Y?" selected":"").">".'Grant'."<option value='0'".($Y=="0"?" selected":"").">".'Revoke'."</select>";else{echo"<td align='center'><label class='block'>","<input type='checkbox' name=$B value='1'".($Y?" checked":"").($qg=="All privileges"?" id='grants-$s-all'>":">".($qg=="Grant option"?"":script("qsl('input').onclick = function () { if (this.checked) formUncheck('grants-$s-all'); };"))),"</label>";}$s++;}}}echo"</table>\n",'<p>
<input type="submit" value="Save">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',"$ha@$_GET[host]"));}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$n){$le=0;foreach((array)$_POST["kill"]as$X){if(kill_process($X))$le++;}queries_redirect(ME."processlist=",lang(array('%d process has been killed.','%d processes have been killed.'),$le),$le||!$_POST["kill"]);}page_header('Process list',$n);echo'
<form action="" method="post">
<div class="scrollable">
<table cellspacing="0" class="nowrap checkable">
',script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});");$s=-1;foreach(process_list()as$s=>$I){if(!$s){echo"<thead><tr lang='en'>".(support("kill")?"<th>":"");foreach($I
as$y=>$X)echo"<th>$y".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($y),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"REFRN30223",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$I[$x=="sql"?"Id":"pid"],0):"");foreach($I
as$y=>$X)echo"<td>".(($x=="sql"&&$y=="Info"&&preg_match("~Query|Killed~",$I["Command"])&&$X!="")||($x=="pgsql"&&$y=="current_query"&&$X!="<IDLE>")||($x=="oracle"&&$y=="sql_text"&&$X!="")?"<code class='jush-$x'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($I["db"]!=""?"db=".urlencode($I["db"])."&":"")."sql=".urlencode($X)).'">'.'Clone'.'</a>':h($X));echo"\n";}echo'</table>
</div>
<p>
';if(support("kill")){echo($s+1)."/".sprintf('%d in total',max_connections()),"<p><input type='submit' value='".'Kill'."'>\n";}echo'<input type="hidden" name="token" value="',$qi,'">
</form>
',script("tableCheck();");}elseif(isset($_GET["select"])){$a=$_GET["select"];$R=table_status1($a);$w=indexes($a);$p=fields($a);$gd=column_foreign_keys($a);$mf=$R["Oid"];parse_str($_COOKIE["adminer_import"],$ya);$Ug=array();$f=array();$fi=null;foreach($p
as$y=>$o){$B=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$B!=""){$f[$y]=html_entity_decode(strip_tags($B),ENT_QUOTES);if(is_shortable($o))$fi=$b->selectLengthProcess();}$Ug+=$o["privileges"];}list($K,$pd)=$b->selectColumnsProcess($f,$w);$ae=count($pd)<count($K);$Z=$b->selectSearchProcess($p,$w);$Bf=$b->selectOrderProcess($p,$w);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Hi=>$I){$Ga=convert_field($p[key($I)]);$K=array($Ga?$Ga:idf_escape(key($I)));$Z[]=where_check($Hi,$p);$H=$m->select($a,$K,$Z,$K);if($H)echo
reset($H->fetch_row());}exit;}$mg=$Ji=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$mg=array_flip($v["columns"]);$Ji=($K?$mg:array());foreach($Ji
as$y=>$X){if(in_array(idf_escape($y),$K))unset($Ji[$y]);}break;}}if($mf&&!$mg){$mg=$Ji=array($mf=>0);$w[]=array("type"=>"PRIMARY","columns"=>array($mf));}if($_POST&&!$n){$lj=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$gb=array();foreach($_POST["check"]as$db)$gb[]=where_check($db,$p);$lj[]="((".implode(") OR (",$gb)."))";}$lj=($lj?"\nWHERE ".implode(" AND ",$lj):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$ld=($K?implode(", ",$K):"*").convert_fields($f,$p,$K)."\nFROM ".table($a);$rd=($pd&&$ae?"\nGROUP BY ".implode(", ",$pd):"").($Bf?"\nORDER BY ".implode(", ",$Bf):"");if(!is_array($_POST["check"])||$mg)$F="SELECT $ld$lj$rd";else{$Fi=array();foreach($_POST["check"]as$X)$Fi[]="(SELECT".limit($ld,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$rd,1).")";$F=implode(" UNION ALL ",$Fi);}$b->dumpData($a,"table",$F);exit;}if(!$b->selectEmailProcess($Z,$gd)){if($_POST["save"]||$_POST["delete"]){$G=true;$za=0;$N=array();if(!$_POST["delete"]){foreach($f
as$B=>$X){$X=process_input($p[$B]);if($X!==null&&($_POST["clone"]||$X!==false))$N[idf_escape($B)]=($X!==false?$X:idf_escape($B));}}if($_POST["delete"]||$N){if($_POST["clone"])$F="INTO ".table($a)." (".implode(", ",array_keys($N)).")\nSELECT ".implode(", ",$N)."\nFROM ".table($a);if($_POST["all"]||($mg&&is_array($_POST["check"]))||$ae){$G=($_POST["delete"]?$m->delete($a,$lj):($_POST["clone"]?queries("INSERT $F$lj"):$m->update($a,$N,$lj)));$za=$g->affected_rows;}else{foreach((array)$_POST["check"]as$X){$hj="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$G=($_POST["delete"]?$m->delete($a,$hj,1):($_POST["clone"]?queries("INSERT".limit1($a,$F,$hj)):$m->update($a,$N,$hj,1)));if(!$G)break;$za+=$g->affected_rows;}}}$Ne=lang(array('%d item has been affected.','%d items have been affected.'),$za);if($_POST["clone"]&&$G&&$za==1){$qe=last_id();if($qe)$Ne=sprintf('Item%s has been inserted.'," $qe");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Ne,$G);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n='Ctrl+click on a value to modify it.';else{$G=true;$za=0;foreach($_POST["val"]as$Hi=>$I){$N=array();foreach($I
as$y=>$X){$y=bracket_escape($y,1);$N[idf_escape($y)]=(preg_match('~char|text~',$p[$y]["type"])||$X!=""?$b->processInput($p[$y],$X):"NULL");}$G=$m->update($a,$N," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Hi,$p),!$ae&&!$mg," ");if(!$G)break;$za+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$za),$G);}}elseif(!is_string($Vc=get_file("csv_file",true)))$n=upload_error($Vc);elseif(!preg_match('~~u',$Vc))$n='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($ya["output"])."&format=".urlencode($_POST["separator"]));$G=true;$rb=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$Vc,$Fe);$za=count($Fe[0]);$m->begin();$L=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$J=array();foreach($Fe[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$L]*)$L~",$X.$L,$Ge);if(!$y&&!array_diff($Ge[1],$rb)){$rb=$Ge[1];$za--;}else{$N=array();foreach($Ge[1]as$s=>$nb)$N[idf_escape($rb[$s])]=($nb==""&&$p[$rb[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$nb))));$J[]=$N;}}$G=(!$J||$m->insertUpdate($a,$J,$mg));if($G)$G=$m->commit();queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$za),$G);$m->rollback();}}}$Rh=$b->tableName($R);if(is_ajax()){page_headers();ob_start();}else
page_header('Select'.": $Rh",$n);$N=null;if(isset($Ug["insert"])||!support("table")){$N="";foreach((array)$_GET["where"]as$X){if($gd[$X["col"]]&&count($gd[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$N.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($R,$N);if(!$f&&support("table"))echo"<p class='error'>".'Unable to select the table'.($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($K,$f);$b->selectSearchPrint($Z,$f,$w);$b->selectOrderPrint($Bf,$f,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($fi);$b->selectActionPrint($w);echo"</form>\n";$D=$_GET["page"];if($D=="last"){$jd=$g->result(count_rows($a,$Z,$ae,$pd));$D=floor(max(0,$jd-1)/$z);}$gh=$K;$qd=$pd;if(!$gh){$gh[]="*";$Db=convert_fields($f,$p,$K);if($Db)$gh[]=substr($Db,2);}foreach($K
as$y=>$X){$o=$p[idf_unescape($X)];if($o&&($Ga=convert_field($o)))$gh[$y]="$Ga AS $X";}if(!$ae&&$Ji){foreach($Ji
as$y=>$X){$gh[]=idf_escape($y);if($qd)$qd[]=idf_escape($y);}}$G=$m->select($a,$gh,$Z,$qd,$Bf,$z,$D,true);if(!$G)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$D)$G->seek($z*$D);$uc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$J=array();while($I=$G->fetch_assoc()){if($D&&$x=="oracle")unset($I["RNUM"]);$J[]=$I;}if($_GET["page"]!="last"&&$z!=""&&$pd&&$ae&&$x=="sql")$jd=$g->result(" SELECT FOUND_ROWS()");if(!$J)echo"<p class='message'>".'No rows.'."\n";else{$Qa=$b->backwardKeys($a,$Rh);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$pd&&$K?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$Ze=array();$md=array();reset($K);$Ag=1;foreach($J[0]as$y=>$X){if(!isset($Ji[$y])){$X=$_GET["columns"][key($K)];$o=$p[$K?($X?$X["col"]:current($K)):$y];$B=($o?$b->fieldName($o,$Ag):($X["fun"]?"*":$y));if($B!=""){$Ag++;$Ze[$y]=$B;$e=idf_escape($y);$Dd=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$Zb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Dd.($Bf[0]==$e||$Bf[0]==$y||(!$Bf&&$ae&&$pd[0]==$e)?$Zb:'')).'">';echo
apply_sql_function($X["fun"],$B)."</a>";echo"<span class='column hidden'>","<a href='".h($Dd.$Zb)."' title='".'descending'."' class='text'> ↓</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.'Search'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$md[$y]=$X["fun"];next($K);}}$we=array();if($_GET["modify"]){foreach($J
as$I){foreach($I
as$y=>$X)$we[$y]=max($we[$y],min(40,strlen(utf8_decode($X))));}}echo($Qa?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($z%2==1&&$D%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($J,$gd)as$Ye=>$I){$Gi=unique_array($J[$Ye],$w);if(!$Gi){$Gi=array();foreach($J[$Ye]as$y=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$y))$Gi[$y]=$X;}}$Hi="";foreach($Gi
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$p[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$p[$y]["collation"])?$y:"CONVERT($y USING ".charset($g).")").")";$X=md5($X);}$Hi.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$pd&&$K?"":"<td>".checkbox("check[]",substr($Hi,1),in_array(substr($Hi,1),(array)$_POST["check"])).($ae||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Hi)."' class='edit'>".'edit'."</a>"));foreach($I
as$y=>$X){if(isset($Ze[$y])){$o=$p[$y];$X=$m->value($X,$o);if($X!=""&&(!isset($uc[$y])||$uc[$y]!=""))$uc[$y]=(is_mail($X)?$Ze[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$Hi;if(!$_&&$X!==null){foreach((array)$gd[$y]as$q){if(count($gd[$y])==1||end($q["source"])==$y){$_="";foreach($q["source"]as$s=>$yh)$_.=where_link($s,$q["target"][$s],$J[$Ye][$yh]);$_=($q["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($q["db"]),ME):ME).'select='.urlencode($q["table"]).$_;if($q["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($q["ns"]),$_);if(count($q["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Gi))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Gi
as$fe=>$W)$_.=where_link($s++,$fe,$W);}$X=select_value($X,$_,$o,$fi);$t=h("val[$Hi][".bracket_escape($y)."]");$Y=$_POST["val"][$Hi][bracket_escape($y)];$pc=!is_array($I[$y])&&is_utf8($X)&&$J[$Ye][$y]==$I[$y]&&!$md[$y];$ei=preg_match('~text|lob~',$o["type"]);echo"<td id='$t'";if(($_GET["modify"]&&$pc)||$Y!==null){$ud=h($Y!==null?$Y:$I[$y]);echo">".($ei?"<textarea name='$t' cols='30' rows='".(substr_count($I[$y],"\n")+1)."'>$ud</textarea>":"<input name='$t' value='$ud' size='$we[$y]'>");}else{$Ae=strpos($X,"<i>…</i>");echo" data-text='".($Ae?2:($ei?1:0))."'".($pc?"":" data-warning='".h('Use edit link to modify this value.')."'").">$X</td>";}}}if($Qa)echo"<td>";$b->backwardKeysPrint($Qa,$J[$Ye]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($J||$D){$Dc=true;if($_GET["page"]!="last"){if($z==""||(count($J)<$z&&($J||!$D)))$jd=($D?$D*$z:0)+count($J);elseif($x!="sql"||!$ae){$jd=($ae?false:found_rows($R,$Z));if($jd<max(1e4,2*($D+1)*$z))$jd=reset(slow_query(count_rows($a,$Z,$ae,$pd)));else$Dc=false;}}$Of=($z!=""&&($jd===false||$jd>$z||$D));if($Of){echo(($jd===false?count($J)+1:$jd-$D*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($D+1)).'" class="loadmore">'.'Load more data'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".'Loading'."…');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($J||$D){if($Of){$Ie=($jd===false?$D+(count($J)>=$z?2:1):floor(($jd-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'Page'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'Page'."', '".($D+1)."')); return false; };"),pagination(0,$D).($D>5?" …":"");for($s=max(1,$D-4);$s<min($Ie,$D+5);$s++)echo
pagination($s,$D);if($Ie>0){echo($D+5<$Ie?" …":""),($Dc&&$jd!==false?pagination($Ie,$D):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Ie'>".'last'."</a>");}}else{echo"<legend>".'Page'."</legend>",pagination(0,$D).($D>1?" …":""),($D?pagination($D,$D):""),($Ie>$D?pagination($D+1,$D).($Ie>$D+1?" …":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'Whole result'."</legend>";$ec=($Dc?"":"~ ").$jd;echo
checkbox("all",1,0,($jd!==false?($Dc?"":"~ ").lang(array('%d row','%d rows'),$jd):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$ec' : checked); selectCount('selected2', this.checked || !checked ? '$ec' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete">',confirm(),'</div></fieldset>
';}$hd=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($hd['sql']);break;}}if($hd){print_fieldset("export",'Export'." <span id='selected2'></span>");$Mf=$b->dumpOutput();echo($Mf?html_select("output",$Mf,$ya["output"])." ":""),html_select("format",$hd,$ya["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($uc,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'Import'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ya["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$qi'>\n","</form>\n",(!$pd&&$K?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$O=isset($_GET["status"]);page_header($O?'Status':'Variables');$Yi=($O?show_status():show_variables());if(!$Yi)echo"<p class='message'>".'No rows.'."\n";else{echo"<table cellspacing='0'>\n";foreach($Yi
as$y=>$X){echo"<tr>","<th><code class='jush-".$x.($O?"status":"set")."'>".h($y)."</code>","<td>".h($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Oh=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$B=>$R){json_row("Comment-$B",h($R["Comment"]));if(!is_view($R)){foreach(array("Engine","Collation")as$y)json_row("$y-$B",h($R[$y]));foreach($Oh+array("Auto_increment"=>0,"Rows"=>0)as$y=>$X){if($R[$y]!=""){$X=format_number($R[$y]);json_row("$y-$B",($y=="Rows"&&$X&&$R["Engine"]==($Ah=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Oh[$y]))$Oh[$y]+=($R["Engine"]!="InnoDB"||$y!="Data_free"?$R[$y]:0);}elseif(array_key_exists($y,$R))json_row("$y-$B");}}}foreach($Oh
as$y=>$X)json_row("sum-$y",format_number($X));json_row("");}elseif($_GET["script"]=="kill")$g->query("KILL ".number($_POST["kill"]));else{foreach(count_tables($b->databases())as$l=>$X){json_row("tables-$l",$X);json_row("size-$l",db_size($l));}json_row("");}exit;}else{$Xh=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Xh&&!$n&&!$_POST["search"]){$G=true;$Ne="";if($x=="sql"&&$_POST["tables"]&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$G=truncate_tables($_POST["tables"]);$Ne='Tables have been truncated.';}elseif($_POST["move"]){$G=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Ne='Tables have been moved.';}elseif($_POST["copy"]){$G=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Ne='Tables have been copied.';}elseif($_POST["drop"]){if($_POST["views"])$G=drop_views($_POST["views"]);if($G&&$_POST["tables"])$G=drop_tables($_POST["tables"]);$Ne='Tables have been dropped.';}elseif($x!="sql"){$G=($x=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$Ne='Tables have been optimized.';}elseif(!$_POST["tables"])$Ne='No tables.';elseif($G=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($I=$G->fetch_assoc())$Ne.="<b>".h($I["Table"])."</b>: ".h($I["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$Ne,$G);}page_header(($_GET["ns"]==""?'Database'.": ".h(DB):'Schema'.": ".h($_GET["ns"])),$n,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".'Tables and views'."</h3>\n";$Wh=tables_list();if(!$Wh)echo"<p class='message'>".'No tables.'."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".'Search data in tables'." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'>",script("qsl('input').onkeydown = partialArg(bodyKeydown, 'search');","")," <input type='submit' name='search' value='".'Search'."'>\n","</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!=""){$_GET["where"][0]["op"]="LIKE %%";search_tables();}}echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^(tables|views)\[/);",""),'<th>'.'Table','<td>'.'Engine'.doc_link(array('sql'=>'storage-engines.html')),'<td>'.'Collation'.doc_link(array('sql'=>'charset-charsets.html','mariadb'=>'supported-character-sets-and-collations/')),'<td>'.'Data Length'.doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-admin.html#FUNCTIONS-ADMIN-DBOBJECT','oracle'=>'REFRN20286')),'<td>'.'Index Length'.doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-admin.html#FUNCTIONS-ADMIN-DBOBJECT')),'<td>'.'Data Free'.doc_link(array('sql'=>'show-table-status.html')),'<td>'.'Auto Increment'.doc_link(array('sql'=>'example-auto-increment.html','mariadb'=>'auto_increment/')),'<td>'.'Rows'.doc_link(array('sql'=>'show-table-status.html','pgsql'=>'catalog-pg-class.html#CATALOG-PG-CLASS','oracle'=>'REFRN20286')),(support("comment")?'<td>'.'Comment'.doc_link(array('sql'=>'show-table-status.html','pgsql'=>'functions-info.html#FUNCTIONS-INFO-COMMENT-TABLE')):''),"</thead>\n";$S=0;foreach($Wh
as$B=>$T){$bj=($T!==null&&!preg_match('~table~i',$T));$t=h("Table-".$B);echo'<tr'.odd().'><td>'.checkbox(($bj?"views[]":"tables[]"),$B,in_array($B,$Xh,true),"","","",$t),'<th>'.(support("table")||support("indexes")?"<a href='".h(ME)."table=".urlencode($B)."' title='".'Show structure'."' id='$t'>".h($B).'</a>':h($B));if($bj){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($B).'" title="'.'Alter view'.'">'.(preg_match('~materialized~i',$T)?'Materialized view':'View').'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($B).'" title="'.'Select data'.'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",'Alter table'),"Index_length"=>array("indexes",'Alter indexes'),"Data_free"=>array("edit",'New item'),"Auto_increment"=>array("auto_increment=1&create",'Alter table'),"Rows"=>array("select",'Select data'),)as$y=>$_){$t=" id='$y-".h($B)."'";echo($_?"<td align='right'>".(support("table")||$y=="Rows"||(support("indexes")&&$y!="Data_length")?"<a href='".h(ME."$_[0]=").urlencode($B)."'$t title='$_[1]'>?</a>":"<span$t>?</span>"):"<td id='$y-".h($B)."'>");}$S++;}echo(support("comment")?"<td id='Comment-".h($B)."'>":"");}echo"<tr><td><th>".sprintf('%d in total',count($Wh)),"<td>".h($x=="sql"?$g->result("SELECT @@storage_engine"):""),"<td>".h(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$y)echo"<td align='right' id='sum-$y'>";echo"</table>\n","</div>\n";if(!information_schema(DB)){echo"<div class='footer'><div>\n";$Vi="<input type='submit' value='".'Vacuum'."'> ".on_help("'VACUUM'");$yf="<input type='submit' name='optimize' value='".'Optimize'."'> ".on_help($x=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'");echo"<fieldset><legend>".'Selected'." <span id='selected'></span></legend><div>".($x=="sqlite"?$Vi:($x=="pgsql"?$Vi.$yf:($x=="sql"?"<input type='submit' value='".'Analyze'."'> ".on_help("'ANALYZE TABLE'").$yf."<input type='submit' name='check' value='".'Check'."'> ".on_help("'CHECK TABLE'")."<input type='submit' name='repair' value='".'Repair'."'> ".on_help("'REPAIR TABLE'"):"")))."<input type='submit' name='truncate' value='".'Truncate'."'> ".on_help($x=="sqlite"?"'DELETE'":"'TRUNCATE".($x=="pgsql"?"'":" TABLE'")).confirm()."<input type='submit' name='drop' value='".'Drop'."'>".on_help("'DROP TABLE'").confirm()."\n";$k=(support("scheme")?$b->schemas():$b->databases());if(count($k)!=1&&$x!="sqlite"){$l=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".'Move to other database'.": ",($k?html_select("target",$k,$l):'<input name="target" value="'.h($l).'" autocapitalize="off">')," <input type='submit' name='move' value='".'Move'."'>",(support("copy")?" <input type='submit' name='copy' value='".'Copy'."'> ".checkbox("overwrite",1,$_POST["overwrite"],'overwrite'):""),"\n";}echo"<input type='hidden' name='all' value=''>";echo
script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $S);":"")." }"),"<input type='hidden' name='token' value='$qi'>\n","</div></fieldset>\n","</div></div>\n";}echo"</form>\n",script("tableCheck();");}echo'<p class="links"><a href="'.h(ME).'create=">'.'Create table'."</a>\n",(support("view")?'<a href="'.h(ME).'view=">'.'Create view'."</a>\n":"");if(support("routine")){echo"<h3 id='routines'>".'Routines'."</h3>\n";$Yg=routines();if($Yg){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.'Name'.'<td>'.'Type'.'<td>'.'Return type'."<td></thead>\n";odd('');foreach($Yg
as$I){$B=($I["SPECIFIC_NAME"]==$I["ROUTINE_NAME"]?"":"&name=".urlencode($I["ROUTINE_NAME"]));echo'<tr'.odd().'>','<th><a href="'.h(ME.($I["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($I["SPECIFIC_NAME"]).$B).'">'.h($I["ROUTINE_NAME"]).'</a>','<td>'.h($I["ROUTINE_TYPE"]),'<td>'.h($I["DTD_IDENTIFIER"]),'<td><a href="'.h(ME.($I["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($I["SPECIFIC_NAME"]).$B).'">'.'Alter'."</a>";}echo"</table>\n";}echo'<p class="links">'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.'Create procedure'.'</a>':'').'<a href="'.h(ME).'function=">'.'Create function'."</a>\n";}if(support("sequence")){echo"<h3 id='sequences'>".'Sequences'."</h3>\n";$mh=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema() ORDER BY sequence_name");if($mh){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($mh
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."sequence='>".'Create sequence'."</a>\n";}if(support("type")){echo"<h3 id='user-types'>".'User types'."</h3>\n";$Ti=types();if($Ti){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($Ti
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."type='>".'Create type'."</a>\n";}if(support("event")){echo"<h3 id='events'>".'Events'."</h3>\n";$J=get_rows("SHOW EVENTS");if($J){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."<td>".'Schedule'."<td>".'Start'."<td>".'End'."<td></thead>\n";foreach($J
as$I){echo"<tr>","<th>".h($I["Name"]),"<td>".($I["Execute at"]?'At given time'."<td>".$I["Execute at"]:'Every'." ".$I["Interval value"]." ".$I["Interval field"]."<td>$I[Starts]"),"<td>$I[Ends]",'<td><a href="'.h(ME).'event='.urlencode($I["Name"]).'">'.'Alter'.'</a>';}echo"</table>\n";$Bc=$g->result("SELECT @@event_scheduler");if($Bc&&$Bc!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($Bc)."\n";}echo'<p class="links"><a href="'.h(ME).'event=">'.'Create event'."</a>\n";}if($Wh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}}}page_footer();
