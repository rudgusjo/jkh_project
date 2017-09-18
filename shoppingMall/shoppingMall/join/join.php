
<div id="mConstract_div">
    <form id="mContractForm" method="POST" action="http://localhost/shopping/shoppingMall/join/joinController.php">
        <div id="mConstract_title" align="center">
            <span>회원가입</span>
        </div>
        <div class="MCTitleInput">
            <div class='MCTitleLine'>
                <li>닉네임 </li>
                <li>이름</li>
                <li>ID</li>
                <li>PASS</li>
                <li>집 주소</li>
                <li>기본 배송지</li>
                <li>E-mail</li>
                <li>집 전화</li>
            </div>
            <div class='MCInputLine'>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="join_nick" class="join_nick_id" value="">
                </li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="join_name" class="join_nick_id" value="">
                </li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="join_id" class="join_nick_id" value=""> &nbsp;
                    <button name="name_judgeId" value="id_confirm">중복확인</button>
                    <!-- <input id='id_bt' type="submit" name='name_judgeId' value='중복확인'>
                    <input type="hidden" name='name_judgeId' value='id_confirm'> -->
                </li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="password" name="join_pass" class="join_pass" value="">
                </li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="join_add" class="join_add" value="">
                </li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="join_delivery" class="join_delivery" value="">
                </li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="join_e_id" class="join_e_id" value=""> @
                    <input type="text" name="join_e_add" class="join_e_add" value="">
                </li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="join_hp" class="join_hp">
                </li>
            </div>
        </div>
        <div align="center" style="margin-top: 3%; width: 100%;">
            <button name="join_confirm" value="confirm">회원가입</button>
            <!-- <input type="submit" name="resistration" value="회원가입">
            <input type="hidden" name="join_confirm" value="confirm"> -->
            <br/>
        </div>
    </form>
</div>
<br/><br/><br/><br/><br/><br/>