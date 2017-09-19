<?php 
	
	class NotIntegerException extends Exception{
		function printMessage(){
			echo "<script>
					alert('수량, 가격 ,배송비, 적립금 칸에는 숫자만 입력하세요');
				</script>";
		}		
	}

 ?>

<?php 
	require_once "../DBConn.php";
	//require_once "imgUpDown.php";

	try {
		$dbConn = new DBConn('localhost',3306,'phpdb','root','');
		$dbConn->DB_ErrConfirm();
	} catch (PDOException $e) {
		echo "{$e->getMessage()}";
	}	

	$productname 	= isset($_POST['productname'])?$_POST['productname']:"";
	$productseller 	= isset($_POST['productseller'])?$_POST['productseller']:"";
	$productcategory= isset($_POST['productcategory'])?$_POST['productcategory']:"";
	$productexplain = isset($_POST['productexplain'])?$_POST['productexplain']:"";
	$p_detail_title	= isset($_POST['p_detail_title'])?$_POST['p_detail_title']:"";

	try{
		$productprice 	= isset($_POST['productprice'])?(int)$_POST['productprice']:"";	
		$delivery_price = isset($_POST['delivery_price'])?(int)$_POST['delivery_price']:"";
		$point 			= isset($_POST['point'])?(int)$_POST['point']:"";
		$productcount	= isset($_POST['productcount'])?(int)$_POST['productcount']:"";
		$discount		= isset($_POST['discount'])?(int)$_POST['discount']:"";

		if(	strcmp(gettype($productprice),'integer') 	|| 
			strcmp(gettype($delivery_price),'integer') 	|| 
			strcmp(gettype($point),'integer') 			|| 
			strcmp(gettype($productcount),'integer')	||
			strcmp(gettype($discount),'integer')){
			throw new NotIntegerException();
		}
	}catch(NotIntegerException $e) {
		$e->printMessage();
		echo "<script>
					history.go(-1);
				</script>";
		return;
	}
	//$main_img = isset($_POST['main_img'])?$_POST['main_img']:"";

	/*getimagesize($_FILES['main_img']['tmp_name']);
	$imageblob = addslashes(fread($main_img, "r"),filesize($main_img));
	//지정한 파일의 내용을 지정한 크기만큼 읽어 들이는 함수
	// "r"은 read로 다 읽어들임
	//addslashes는 파일 정보를 db에 저장할 수 있는 포멧으로 바꾸는 함수
	//흔히 문자열에서 특수문자는 이스케이프처리를 해줘야 하는데 이 함수는 주로 그것들을 처리함
	$dbConn->DB_select('product_info','*','');
	
	$imgCode = "data:image/jpeg;base64,".base64_encode($dbConn->result[0]['main_img']);
*/
	
	$calculationPoint 	= ($productprice / 100) * $point;
	$calculationDiscount= ($productprice / 100) * (100-$discount);

	$dbConn->DB_insert('product(productname,productseller,productcategory,productprice,delivery_price,point,productexplain,productcount,p_detail_title,p_disprice)',"'{$productname}','{$productseller}','{$productcategory}',{$productprice},{$delivery_price},{$calculationPoint},'{$productexplain}',{$productcount},'{$p_detail_title}',{$calculationDiscount}");
	$dbConn->DB_select('product','max(productnum) productnum');
	$p_num = $dbConn->getResult()[0]['productnum'];
	
	//img 업로드
	$uploadDir = '../../upload/';
	$uploadFile = $uploadDir.basename($_FILES['main_img']['name']);

	if(!move_uploaded_file($_FILES['main_img']['tmp_name'], $uploadFile)){
		$dbConn->DB_delete('product');
		echo "<script>
			alert('이미지 업로드에 문제가 발생하였습니다. 파일을 확인하여 주세요');
		</script>";
		echo "<script>
				history.go(-1);
			</script>";
	}

	$filedir = $uploadDir.basename($_FILES['main_img']['name']);
	$filename = basename($_FILES['main_img']['name']);
 	$size = getimagesize($uploadDir.$_FILES['main_img']['name']);
 	$width = $size[0];
 	$height = $size[1];

 	$dbConn->DB_insert('product_images(filename,width,height,productnum,imagekind)',"'{$filename}',{$width},{$height},{$p_num},'main'");
	

 	for($count = 0 ;$count < count($_FILES['content_img']['name']);$count++){

 		$uploadFile = $uploadDir.basename($_FILES['content_img']['name'][$count]);
		if(!move_uploaded_file($_FILES['content_img']['tmp_name'][$count], $uploadFile)){
			echo "<script>
				alert('이미지 업로드에 문제가 발생하였습니다. 파일을 확인하여 주세요');
			</script>";
			$dbConn->DB_delete('product','productnum = {$p_num}');
			echo "<script>
					history.go(-1);
				</script>";
		}

 		$filename = basename($_FILES['content_img']['name'][$count]);
 		$size = getimagesize($uploadDir.$_FILES['content_img']['name'][$count]);
 		$width = $size[0];
 		$height = $size[1];

 		$dbConn->DB_insert('product_images(filename,width,height,productnum,imagekind)',"'{$filename}',{$width},{$height},{$p_num},'sub'");	
 	}

	echo "<script>
		alert('상품 등록이 완료되었습니다. 메인화면으로 이동됩니다.');
		location.href = 'http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=mainContents';
	</script>";
 ?>