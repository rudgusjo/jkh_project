<?php

$filename = isset($_GET['filename'])?$_GET['filename']:"";                      
$reail_filename = urldecode("파일의 원본이름");    
$file_dir = "../../uploadfile/".$filename;  

header('Content-Type: application/octet-stream');
header('Content-Length: '.filesize($file_dir));
header('Content-Disposition: attachment; filename='.$filename);
header('Content-Transfer-Encoding: binary');

$fp = fopen($file_dir, "r");
fpassthru($fp);
fclose($fp);

echo "<script>
	history.go(-1);
</script>";
?>