<!-- 이파일의 실제 경로 : /applicaion/views/am/upload_result.php  -->
<?php 
  if($error)
  {
    echo $error;
  }else //Success
  {
?>
    <script type="text/javascript">
    alert("저장되었습니다.");
    location.href = "/am/productList";
    </script>
<?php
  }
?>