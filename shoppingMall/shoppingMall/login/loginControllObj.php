<?php 
	require_once "../DBConn.php";

	class loginController{
		private $saveId;
		private $savePass;
		protected $dbConn;

		function __construct(){
			$this->saveId 	= isset($_POST['login_id'])?$_POST['login_id']:"";
			$this->savePass	= isset($_POST['login_pass'])?$_POST['login_pass']:"";
			$this->dbConn = new DBConn('localhost',3306,'phpdb','root','');
			$this->dbConn->DB_ErrConfirm();
	    }

	    function loginProcessing(){
			$this->dbConn->DB_select('userinfo','*');
			for($count = 0;$count < count($this->dbConn->getResult()); $count++){
				$saveId 	= (String)$this->saveId;
				$savePass 	= (String)$this->savePass;
				$inputId	= (String)$this->dbConn->getResult()[$count]['user_id'];
				$inputPass	= (String)$this->dbConn->getResult()[$count]['user_pass'];
				
				if(!strcmp($saveId, $inputId)){
					if(strcmp($savePass, $inputPass)){
						break;
					}
					$_SESSION['user'] = array();
					echo $_SESSION['user']['userID'] = $this->dbConn->getResult()[$count]['user_id'];
					echo $_SESSION['user']['username'] = $this->dbConn->getResult()[$count]['user_name'];
					echo $_SESSION['user']['usernick'] = $this->dbConn->getResult()[$count]['user_nick'];
					echo $_SESSION['user']['useraddress'] = $this->dbConn->getResult()[$count]['user_add'];
					echo $_SESSION['user']['userhp'] = $this->dbConn->getResult()[$count]['user_hp'];
					echo $_SESSION['user']['userpoint'] = $this->dbConn->getResult()[$count]['user_point'];
					echo $_SESSION['user']['delivery'] = $this->dbConn->getResult()[$count]['user_delivery'];
					echo $_SESSION['user']['email'] = $this->dbConn->getResult()[$count]['user_email'];
					echo $_SESSION['user']['level'] = $this->dbConn->getResult()[$count]['user_level'];
					header("location:http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=mainContents");
					return;
				}
			}
			echo "<script>
					alert('잘못된 아이디 혹은 비밀번호입니다.');
					history.go(-1);
				</script>";
			return;
		}

	}

?>