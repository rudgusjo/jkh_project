<?php
	require_once "../DBConn.php";
	session_start();

	$user_id	= isset($_SESSION['user']['userID'])?$_SESSION['user']['userID']:"";
	if(!strcmp($user_id, "")){
		echo "<script>
			alert('로그인 후에 이용 가능합니다');
			history.go(-1);
		</script>";
		return;

	}

	$dbConn = new DBConn('localhost',3306,'phpdb','root','');
	$dbConn->DB_ErrConfirm();
	$title 		= isset($_POST['title'])?$_POST['title']:"";
	$content 	= isset($_POST['content'])?$_POST['content']:"";
	
	$year		= date('y');
	$month		= date('m');
	$day		= date('d');
	$boardArr;

	$dbConn->DB_insert('freeBoard(board_title,board_writer,board_date,board_viewCount,board_content)',"'{$title}','{$user_id}','{$year}/{$month}/{$day}',0,'{$content}'");
	$dbConn->DB_select('freeboard',"max(board_id) board_id");
	$boardArr = $dbConn->getResult();

	$uploadDir = '../../uploadfile/';
	for($count = 0 ;$count < count($_FILES['freeBoard_file']['name']);$count++){

 		$uploadFile = $uploadDir.basename($_FILES['freeBoard_file']['name'][$count]);
		if(!move_uploaded_file($_FILES['freeBoard_file']['tmp_name'][$count], $uploadFile)){
			echo "<script>
				alert('이미지 업로드에 문제가 발생하였습니다. 파일을 확인하여 주세요');
			</script>";
			$dbConn->DB_delete('freeboard',"board_id = {$boardArr[$count]['board_id']}");
/*			echo "<script>
					history.go(-1);
				</script>";*/
		}

 		$filename = basename($_FILES['freeBoard_file']['name'][$count]);

 		$dbConn->DB_insert('uploadFile(filename,board_id)',"'{$filename}',{$boardArr[0]['board_id']}");	
 	}
 	$boardArr = NULL;
 	echo "<script>
 		alert('글쓰기가 완료되었습니다.');
 		location.href='http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./freeBoard/freeBoard';
 	</script>";
 ?>