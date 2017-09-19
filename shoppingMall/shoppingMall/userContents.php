
<script type="text/javascript">
    /*$(function(){   //제이쿼리
        $('#id_login').on('click',function() {  //Bpopup 소스코드
            // Triggering bPopup when click event is fired
            $("#login_div").bPopup({
                position:[260,100],
                opacity:0.6
            });
        });
        $('#id_mConstract').on('click',functㅠion() {
            // Triggering bPopup when click event is fired
            $("#mConstract_div").bPopup({
                position:[260,100],
                opacity:0.6
            });
        });
    });*/
</script>

<style type="text/css">
    
    a:link, a:visited{
        text-decoration:none;
    }
    #status span{
        font-size: 7px;
    }

</style>

<?php 
    session_start();
	if(isset($_SESSION['user']['userID']) && $_SESSION['user']['level'] == 1){
       echo <<<FORM
        <div id="status" align='right'>
            <a>{$_SESSION['user']['usernick']}({$_SESSION['user']['userID']}) 님</a>
            <span>│</span>
            <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./login/logout">LOGOUT</a>
            <span>│</span>
            <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./myPage/buyCheck">ORDER</a>
            <span>│</span>
            <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productCart/productCart&pageJudge=cart">CART</a>
            <span>│</span>
            <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./freeBoard/freeBoard">BOARD</a>&nbsp
                     
        </div>
FORM;
	}else if(isset($_SESSION['user']['userID']) && $_SESSION['user']['level'] == 9){
        
        echo <<<FORM
        <div id="status" align='right' >
           <a>{$_SESSION['user']['usernick']}({$_SESSION['user']['userID']}) 님</a>
           <span>│</span>
            <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./login/logout">LOGOUT</a>
            <span>│</span>
            <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productAdd/productAdd">P_RESIT</a>
            <span>│</span>
            <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./freeBoard/freeBoard">BOARD</a>&nbsp       
        </div>
FORM;
    }else{
        echo <<<FORM
        <div id="status" align='right' >
            <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./login/login">LOGIN</a>
            <span>│</span>
            <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./join/join">JOIN</a>
            <span>│</span>
            <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./freeBoard/freeBoard">BOARD</a>&nbsp         
        </div>
FORM;
    }
?>
