<html>
<head>
  <style type="text/css">
    .tit2{
		 padding-top:10px;
		 text-valign:center;
		 height:20px;
		 background-color:#ccddff;
	 }
	.bgdiv{
		padding:20px,70px,40px,70px;
		margin:20px,30px,20px,30px;
		background-color:"#F5F5F5";
		text-align:center;
	}
  </style>
  
  <script language="JAVASCRIPT">
    function check_data(){
		if(document.form1.gogra.value.length==0)
		 {
			 alert("請上傳貨品圖案!")
			 return false;
		 }
		
		 if(document.form1.goid.value.length==0)
		 {
			 alert("貨品編號不可以空白喔!")
			 return false;
		 }
		 if(document.form1.gona.value.length==0)
		 {
			 alert("產品名稱不可以空白喔!")
			 return false;
		 }
		 if(document.form1.gosze.value.length==0)
		 {
			 alert("貨品規格不可以空白喔!")
			 return false;
		 }
		 if(document.form1.gopri.value.length==0)
		 {
			 alert("貨品售價不可以空白喔!")
			 return false;
		 }
		 if(document.form1.goinpa.value.length==0)
		 {
			 alert("請填寫進貨價格!")
			 return false;
		 }
		 if(document.form1.goye.value.length==0)
		 {
			 alert("請填寫進貨數量!")
			 return false;
		 }
		 if(document.form1.gosa.value.length==0)
		 {
			 alert("請填寫預計安全存量!")
			 return false;
		 }
	}

  </script>
  
</head>
<body background="images/back1.jpg" width='100%' height='100%'>

<?php
  //預留接收其他頁面的資料
  //echo"管理員您好!";
?>




<!--新商品上傳介面多筆-->
  <div class="tit2"><h1 align="center">新商品登入</h1></div>
  <div class="bgdiv">
  <h4 align="center">多品項</h4>  
  
  <form name="form1" action="newitemupload2.php" method="POST" Enctype="multipart/form-data" onsubmit="return check_data(this);">

  <!--印出欲輸入的新商品資料-->
<?php
  echo"<table border='1' align='center' width='40%' height='75%' bgcolor='#Ffffff'>
    
	       <colgroup span='1' width='30%'>
           </colgroup>	
	
	       <colgroup span='1'>
           </colgroup>

	      <tr>
	        <td>貨品圖案:</td>
	        <td>
	          <input type='file' name='gogra'>
	          <br><font color='#4169E1'>(檔案大小請勿超過1000000KB)</font>
	        </td>
	      </tr>
	
          <tr>
	       <td>貨品編號:</td>
	       <td>
	         <input type='text' name='goid'> 
	         <br><font color='#4169E1'>[ex:AA00XX
	         <br>廠商編號(AA~ZZ)+產品編號(00~99)+貨品編號(XX為不同規格編號)]</font>	         	   
	       </td>
	      </tr>
	
	      <tr>
	       <td>產品名稱:</td>
	       <td><input type='text' name='gona' size='30'></td>
	      </tr>		
	
	      <tr>
	       <td>貨品規格:</td>
	       <td><input type='text' name='gosze'>g/包</td>
	      </tr>
	
	      <tr>
	       <td>貨品售價:</td>
	       <td>$NT.<input type='text' name='gopri'></td>
	      </tr>
	
	      <tr>
	       <td>進貨價格:</td>
	       <td>$NT.<input type='text' name='goinpa'></td>
	      </tr>
	
	      <tr>
	       <td>此次進貨數量:</td>
	       <td><input type='text' name='goye'>包</td>
	      </tr>
	
	      <tr>
	       <td>預計安全存量:</td>
	       <td><input type='text' name='gosa'>包</td>
	     </tr>
		
      <table>";
?>  
  <br>
  <input type="submit" name="sub" value="上傳新商品">
  <input type="reset" name="reset" value="重寫"> </form> 

  <input type="submit" name="backitem" value="回商品管理頁面">
  
  </div>
  
  


</body>
</html>