<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript">
        
        function hover(element) {
            element.setAttribute('src', '/shopping/img/94LINE_3.png');
        }
        function unhover(element) {
            element.setAttribute('src', '/shopping/img/94LINE_2.png');
        }
    </script>
</head>
<body>
    <div class='pageLogo' align="center">
        <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=mainContents">
            <img id='headerLogo' src="/shopping/img/94LINE_2.png" onmouseover="hover(this)" onmouseout="unhover(this)">
            <!-- <img id='headerGreen' src="/shopping/img/GREEN.png">
            <img id='headerLogo' src="/shopping/img/94LINESHOP_1.png"> -->
        </a>
        <?php require_once "userContents.php"; ?>
    </div>
    <div class="header_menu" align="center">
        <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productList/productList&kind=outer">OUTER</a>
        <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productList/productList&kind=top">T-Shirts</a>
        <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productList/productList&kind=pants">PANTS</a>
        <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productList/productList&kind=shoes">SHOES</a>
        <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productList/productList&kind=accessory">ACCESSORY</a>
        <a href="http://localhost/shopping/shoppingMall/ChangeUrl.php?urlKind=./productList/productList&kind=bag">BAG</a>    
    </div>
    <div class="border_bottom"></div>
    <div class="clear"></div>
</body>
</html>



    
 <!-- <ul> 
            <li class="topMenuLi">
                <a class="topMenuLink" href="http://localhost:8080/shopping/shoppingMall/ChangeUrl.php?url=productList.php&kind=auter">아우터</a>
                <ul class="subMenu">
                    <li><a class="submenuLink">a</a></li>
                    <li><a class="submenuLink">v</a></li>
                    <li><a class="submenuLink">c</a></li>
                </ul>
            </li>
            
            <li>|</li>
            
            <li class="topMenuLi">
                <a class="topMenuLink" href="http://localhost:8080/shopping/shoppingMall/ChangeUrl.php?url=productList.php&kind=tee">티</a>
            </li>
            
            <li>|</li>
            
            <li class="topMenuLi">
            
                <a class="topMenuLink" href="http://localhost:8080/shopping/shoppingMall/ChangeUrl.php?url=productList.php&kind=pants">바지</a>
            
                <ul class="subMenu">
                    <li><a class="submenuLink">aa</a></li>
                    <li><a class="submenuLink">bb</a></li>
                    <li><a class="submenuLink">cc</a></li>
                </ul>
            
            </li>
            
            <li>|</li>
            
            <li class="topMenuLi">
                <a class="topMenuLink" href="http://localhost:8080/shopping/shoppingMall/ChangeUrl.php?url=productList.php&kind=accessory">악세사리</a>
            </li>
                
            <li>|</li>
            
            <li class="topMenuLi">
                <a class="topMenuLink" href="">게시판</a>
            </li>
        </ul> -->