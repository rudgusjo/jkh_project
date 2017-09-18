<?php 
	require_once "../DBConn.php";

	class JoinController{
		protected $disNum = '';
		public $rightID = '';
		protected $join_nick = ''; 
		protected $join_id = '';
		protected $join_name = '';
		protected $join_pass = '';
		protected $join_add = '';
		protected $join_delivery = '';
		protected $join_e_id = '';
		protected $join_e_add = '';
		protected $join_hp = '';
		protected $joinConn;

		function __construct(){
			$this->join_nick 	= isset($_POST['join_nick'])?$_POST['join_nick']:"";
			$this->join_pass 	= isset($_POST['join_pass'])?$_POST['join_pass']:"";
			$this->join_id 		= isset($_POST['join_id'])?$_POST['join_id']:"";
			$this->join_name 	= isset($_POST['join_name'])?$_POST['join_name']:"";
			$this->join_add		= isset($_POST['join_add'])?$_POST['join_add']:"";
			$this->join_delivery= isset($_POST['join_delivery'])?$_POST['join_delivery']:"";
			$this->join_e_id 	= isset($_POST['join_e_id'])?$_POST['join_e_id']:"";
			$this->join_e_add 	= isset($_POST['join_e_add'])?$_POST['join_e_add']:"";
			$this->join_hp 	 	= isset($_POST['join_hp'])?$_POST['join_hp']:"";
			$this->rightID 		= false;
			$this->joinConn 	= new DBConn('localhost',3306,'phpdb','root','');
			$this->joinConn->DB_ErrConfirm();
	    }

	    function processing(){

	    	if($this->join_id 	 == '' || $this->join_name == '' || 
	    		$this->join_nick == '' || $this->join_pass == '' || 
	    		$this->join_add  == '' || $this->join_e_id == '' || 
	    		$this->join_e_add== '' || $this->join_hp   == '' ||
	    		$this->join_delivery== ''){
				echo "<script>alert('빈칸이 존재합니다. 다시한번 확인해주세요');
					</script>";
				echo 
					"<script> history.go(-1); </script>";
				return;
			}else{
				if($this->rightID == FALSE){
					echo "<script>
						alert('중복확인을 하지 않으셨거나 이미 존재하는 아이디입니다.');
						</script>";
					echo "<script> history.go(-1); </script>";
					return;
				}

				$e_mail = "{$this->join_e_id}"."{$this->join_e_add}";
				$sqlSeg = "'{$this->join_id}','{$this->join_name}','{$this->join_nick}','{$this->join_pass}','{$this->join_add}','{$this->join_hp}',0,'{$this->join_delivery}','{$e_mail}',1";
				$this->joinConn->DB_insert('userinfo',$sqlSeg);
/*				echo "<script>alert('회원가입이 완료되었습니다.');
						document.location.href='http://192.168.0.14/shopping/shoppingMall/ChangeUrl.php?urlKind=mainContents';
					</script>";*/
			}
	    }
	    
	    function func_judgeId(){			
			$this->joinConn->DB_select('userinfo','*');
			for($count=0;$count<count($this->joinConn->getResult());$count++){
				if($this->join_id == $this->joinConn->getResult()[$count]['user_id'] || strlen($this->join_id)<4){
					echo "<script>alert('이미 존재하는 아이디이거나 아이디가 4자리 이하입니다. 다시입력하세요');</script>";
					echo 
					"<script> history.go(-1); </script>";
					return;
				}
			}
			$this->rightID = true;
			echo 
			"<script> alert('사용가능한 아이디입니다.'); </script>";
			echo 
			"<script> history.go(-1); </script>";			
		}
	}
?>