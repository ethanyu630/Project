<!DOCTYPE html>
<html>
<head>

<title>新會員註冊頁</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Coffee Break Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
			function check(){
		    var  Upas=$('#Upas').val();
			var  Upasreg =/^[A-Z]\w{7,14}$/;
			if(!Upasreg.test(Upas)){
				$('#Upas_error').text('密碼格式錯誤');
				return false;
			}else{
				$('#Upas_error').text('');
			}
			var uidun = $('#uidun').val();
			var uidunReg = /^[A-Z](1|2)\d{8}/;
			if (!uidunReg.test(uidun)){
				$('#uidun_error').text('身分證錯');
    			return false;
			} else{
				$('#uidun_error').text('');
			}
			var umote = $('#umote').val();
			var umoteReg = /^[09]{2}\d{8}$/;
			if(!umoteReg.test(umote)){
				$('#umote_error').text('手機號碼格式錯誤');
				return false;
			}else{
				$('#umote_error').text('');
			}
			var uemai = $('#uemai').val();
			var uemaiReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;	;
			if (!uemaiReg.test(uemai)){
				$('#uemai_error').text('信箱格式錯誤');
    			return false;
			} else{
				$('#uemai_error').text('');
			}
			var agree = $('#Agree:checked').val();
			if(!agree){
				alert('請勾選同意');
				return false;	
			}  
			return true;
			}
			
			
			function update(){  //jsjsjsjsjssjsj確認修改
				
			var  Upas=$('#Upas').val();
			var  Upasreg =/^[A-Z]\w{7,14}$/;
			if(!Upasreg.test(Upas)){
				$('#Upas_error').text('密碼格式錯誤');
				return false;
			}else{
				$('#Upas_error').text('');
			}
			var uidun = $('#uidun').val();
			var uidunReg = /^[A-Z](1|2)\d{8}/;
			if (!uidunReg.test(uidun)){
				$('#uidun_error').text('身分證錯');
    			return false;
			} else{
				$('#uidun_error').text('');
			}
			var umote = $('#umote').val();
			var umoteReg = /^[09]{2}\d{8}$/;
			if(!umoteReg.test(umote)){
				$('#umote_error').text('手機號碼格式錯誤');
				return false;
			}else{
				$('#umote_error').text('');
			}
			var uemai = $('#uemai').val();
			var uemaiReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;	;
			if (!uemaiReg.test(uemai)){
				$('#uemai_error').text('信箱格式錯誤');
    			return false;
			} else{
				$('#uemai_error').text('');
			}
			
			return true;
			}
				
				
				
				
			}
		</script>
<!--start-smoth-scrolling-->
</head>
<?php
 session_start();  
   if(isset($_SESSION["membername"])){  ?>
    <table align="right"><tr>
    <td width=""> <?php echo $_SESSION["membername"]; ?>您好</td>
    <td width="" ><a href="single1.php?logout=true">登出</td>
    </tr>
    </table>
    <?php }?>
<body>
<?php
 			/*	 @$uid=$_POST["uid"];
				 @$Upas=$_POST["Upas"];
				 @$Una=$_POST["Una"];
				 @$uidun=$_POST["uidun"];
				 @$Uya=$_POST["Uya"];
				 @$Umo=$_POST["Umo"];
				 @$uda=$_POST["uda"];
				 @$ufri=$_POST["ufri"];
				 @$Ucity=$_POST["Ucity"];
				 @$Usec=$_POST["Usec"];
				 @$uaddr=$_POST["uaddr"];
				 @$Utel=$_POST["Utel"];
				 @$umote=$_POST["umote"];
				 @$uemai=$_POST["uemai"];
		        //建立資料連接
        		 $link = mysql_connect("127.0.0.1", "root", "");
				 		if (!$link) die("建立資料連接失敗");
				//開啟資料表
				 $db_selected = mysql_select_db("coffee", $link);
				if (!$db_selected) die("開啟資料庫失敗");
			     mysql_query("SET NAMES UTF8");
				 mysql_query("INSERT INTO membdata (`uid`, `Upas`, `Una`, `uidnu`, `Uya`, `Umo`, `uda`, `ufri`, `Ucity`, `Usec`, `uaddr`, `Utel`, `umote`, `uemai`) 
				 		 VALUES ('$uid','$Upas','$Una','$uidun','$Uya','$Umo','$uda','$ufri','$Ucity',
						 '$Usec','$uaddr','$Utel','$umote','$uemai')");

		  


	
*/




?>
	<!--header-top-starts-->
	<div class="header-top">
		<div class="container">
			<div class="head-main">
				<a href="index.html"><img src="images/logo-1.png" alt="" /></a>
			</div>
		</div>
	</div>
	<!--header-top-end-->
	<!--start-header-->
	<div class="header">
		<div class="container">
			<div class="head">
			<div class="navigation">
				 <span class="menu"></span> 
					<ul class="navig">
						<li><a href="index.php">首頁</a></li>
						<li><a href="about.html">公司介紹</a></li>
						<li><a href="gallery.html">豆產品</a></li>
					</ul>
			</div>
			<div class="header-right">
				<div class="search-bar">
					<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value="">
				</div>
				<ul>
					<li><a href="#"><span class="fb"> </span></a></li>
					<li><a href="#"><span class="twit"> </span></a></li>
					<li><a href="#"><span class="pin"> </span></a></li>
					<li><a href="#"><span class="rss"> </span></a></li>
					<li><a href="#"><span class="drbl"> </span></a></li>
				</ul>
			</div>
				<div class="clearfix"></div>
			</div>
			</div>
		</div>	
	<!-- script-for-menu -->
	<!-- script-for-menu -->
		<script>
			$("span.menu").click(function(){
				$(" ul.navig").slideToggle("slow" , function(){
				});
			});
		</script>
	<!-- script-for-menu -->
	<!--banner-starts-->
	<div class="banner">
		<div class="container"></div>
	</div>
	<!--banner-end-->
	<!--start-single-->
	<div class="single">
		<div class="container">
				<div class="single-top">
						<a href="#"><img class="img-responsive" src="images/single-1.jpg" alt=" "></a><br>
					<div >
					
	<?php 
		if(isset($_POST["update"])){   //修改會員資料
		$uid = $_SESSION["membername"];
		
		$link = mysql_connect("localhost", "root", "");
				 		if (!$link) die("建立資料連接失敗");
				//開啟資料表
				 $db_selected = mysql_select_db("coffee", $link);
				if (!$db_selected) die("開啟資料庫失敗");
			     mysql_query("SET NAMES UTF8");
				$sql="select * from membdata where uid ='$uid'";
		        $result =mysql_query($sql,$link);
				while ($row = mysql_fetch_array($result)) //放入變數內
			{
							
				$Upas= $row[1];	
				$Una= $row[2];	
				$uidun= $row[3];	
				$Uya= $row[4];	
				$Umo= $row[5];	
				$uda= $row[6];	
				$ufri= $row[7];
				$Ucity= $row[8];
				$Usec= $row[9];
				$uaddr= $row[10];
				$Utel= $row[11];
				$umote= $row[12];
				$uemai= $row[13];																			
			}   ?>
			
			
			 <form name="form1" method="post" onsubmit="return update();" action="single1.php">
							    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
					      
					    <tr>
      <td>帳號</td>
      <td>
      <input type="text" name="uid" id="uid"value="<?php echo $uid; ?>" readonly>
	 
      </td>
    </tr>
    <tr>
      <td>修改密碼</td>
      <td>
      <input type="text" name="Upas" id="Upas" value="<?php echo $Upas; ?>">
      </td>
	  <td><div id='Upas_error'></div></td>
    </tr>
    <tr>
      <td>姓名</td>
      <td>
      <input type="text" name="Una" id="Una" value="<?php echo $Una; ?>">
      </td>
    </tr>
	   <tr>
      <td>身分證字號</td>
      <td>
      <input type="text" name="uidun" id="uidun" value="<?php echo $uidun; ?>">
      </td>
	  <td><div id='uidun_error'></div></td>
    </tr>
    <tr>
      <td>出生年</td>
      <td>
      <input type="text" name="Uya" id="Uya" value="<?php echo $Uya; ?>">
      </td>
    </tr>
    <tr>
      <td>出生月</td>
      <td>
     <input type="text" name="Umo" id="Umo"value="<?php echo $Umo; ?>">
      </td>
    </tr>
    <tr>
      <td>出生日</td>
      <td>
      <input type="text" name="uda" id="uda" value="<?php echo $uda; ?>">
      </td>
    </tr>
    <tr>
      <td>暱稱</td>
      <td>
      <input type="text" name="ufri" id="ufri"  value="<?php echo $ufri; ?>" >
      </td>
    </tr>
	<tr>
      <td>所在縣市</td>
      <td>
    <select name="Ucity" id="Ucity" >
	<option selected="selected"  value="<?php echo $Ucity; ?>"><?php echo $Ucity; ?></option>
	
	<option value="台北市">台北市</option>
	<option value="基隆市">基隆市</option>
	<option value="新北市">新北市</option>
	<option value="桃園縣">桃園縣</option>
	<option value="新竹市">新竹市</option>
	<option value="新竹縣">新竹縣</option>
	<option value="苗栗縣">苗栗縣</option>
	<option value="台中市">台中市</option>
	<option value="彰化縣">彰化縣</option>
	<option value="南投縣">南投縣</option>
	<option value="嘉義市">嘉義市</option>
	<option value="嘉義縣">嘉義縣</option>
	<option value="雲林縣">雲林縣</option>
	<option value="台南市">台南市</option>
	<option value="高雄市">高雄市</option>
	<option value="屏東縣">屏東縣</option>
	<option value="台東縣">台東縣</option>
	<option value="花蓮縣">花蓮縣</option>
	<option value="宜蘭縣">宜蘭縣</option>
	<option value="連江縣">連江縣</option>
	<option value="金門縣">金門縣</option>
	<option value="澎湖縣">澎湖縣</option>



</select>
      </td>
    </tr>
	<tr>
      <td>鄉鎮區</td>
      <td>
      <input type="text" name="Usec" id="Usec" value="<?php echo $Usec; ?>">
      </td>
    </tr>
		<tr>
      <td>地址</td>
      <td>
      <input type="text" name="uaddr" id="uaddr" value="<?php echo $uaddr; ?>">
      </td>
    </tr>
		<tr>
      <td>電話</td>
      <td>
      <input type="text" name="Utel" id="Utel" value="<?php echo $Utel; ?>">
      </td>
    </tr>
			<tr>
      <td>行動電話</td>
      <td>
      <input type="text" name="umote" id="umote"  value="<?php echo $umote; ?>">
      </td>
	  	   <td><div id='umote_error'></div></td>
    </tr>
			<tr>
      <td>email</td>
      <td>
      <input type="text" name="uemai" id="uemai" value="<?php echo $uemai; ?>">
	  <input type="hidden" name="update" >
      </td>
	   <td><div id='uemai_error'></div></td>
    </tr>

	  <tr></tr>
				<tr>
      
         <td  align="center"><input type="submit" id="submit" name="register"  value="修改個人訊息" > </td>

       </tr>
</table>
			
			
			
			
			
			
			
	<?php	}		
			
?>
    <?php
		if(isset($_POST["add"])){    //加入會員
		
	
	
	?>                
					  <form name="form1" method="post" onsubmit="return check();" action="single1.php"><tr>   <!-- js判斷是否填寫正確-->
											<td colspan="2"><div align="center"><b>
										    
										    <b><font color="#3399FF">基本資訊</font></b></font></b>
											  <font face="Verdana, Arial, Helvetica, sans-serif" size="-1">
										      <font size="-1" color="#999999">(</font><font size="-1" face="Verdana, Arial, Helvetica, sans-serif"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif"><font size="-2"><font color="#FF0000">*</font></font></font></font><font size="-1">
									        <font color="#999999">為必填欄位)</font></font></font></div></td>
										</tr>
					    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
					      
					    <tr>
      <td>帳號</td>
      <td>
      <input type="text" name="uid" id="uid"value="">
	 
      </td>
    </tr>
    <tr>
      <td>密碼<font color="red" size="1">(第一位大寫英文字母)最少7位數</font></td>
      <td>
      <input type="password" name="Upas" id="Upas">
      </td>
	  <td><div id='Upas_error'></div></td>
    </tr>
    <tr>
      <td>姓名</td>
      <td>
      <input type="text" name="Una" id="Una">
      </td>
    </tr>
	   <tr>
      <td>身分證字號</td>
      <td>
      <input type="text" name="uidun" id="uidun">
      </td>
	  <td><div id='uidun_error'></div></td>
    </tr>
    <tr>
      <td>出生年</td>
      <td>
      <input type="text" name="Uya" id="Uya" value="0000">
      </td>
    </tr>
    <tr>
      <td>出生月</td>
      <td>
     <input type="text" name="Umo" id="Umo"value="00">
      </td>
    </tr>
    <tr>
      <td>出生日</td>
      <td>
      <input type="text" name="uda" id="uda" value="00">
      </td>
    </tr>
    <tr>
      <td>暱稱</td>
      <td>
      <input type="text" name="ufri" id="ufri">
      </td>
    </tr>
	<tr>
      <td>所在縣市</td>
      <td>
    <select name="Ucity" id="Ucity">
	<option selected="selected" value="">-縣市-</option>
	<option value="台北市">台北市</option>
	<option value="基隆市">基隆市</option>
	<option value="新北市">新北市</option>
	<option value="桃園縣">桃園縣</option>
	<option value="新竹市">新竹市</option>
	<option value="新竹縣">新竹縣</option>
	<option value="苗栗縣">苗栗縣</option>
	<option value="台中市">台中市</option>
	<option value="彰化縣">彰化縣</option>
	<option value="南投縣">南投縣</option>
	<option value="嘉義市">嘉義市</option>
	<option value="嘉義縣">嘉義縣</option>
	<option value="雲林縣">雲林縣</option>
	<option value="台南市">台南市</option>
	<option value="高雄市">高雄市</option>
	<option value="屏東縣">屏東縣</option>
	<option value="台東縣">台東縣</option>
	<option value="花蓮縣">花蓮縣</option>
	<option value="宜蘭縣">宜蘭縣</option>
	<option value="連江縣">連江縣</option>
	<option value="金門縣">金門縣</option>
	<option value="澎湖縣">澎湖縣</option>



</select>
      </td>
    </tr>
	<tr>
      <td>鄉鎮區</td>
      <td>
      <input type="text" name="Usec" id="Usec">
      </td>
    </tr>
		<tr>
      <td>地址</td>
      <td>
      <input type="text" name="uaddr" id="uaddr">
      </td>
    </tr>
		<tr>
      <td>電話</td>
      <td>
      <input type="text" name="Utel" id="Utel">
      </td>
    </tr>
			<tr>
      <td>行動電話</td>
      <td>
      <input type="text" name="umote" id="umote" >
      </td>
	  	   <td><div id='umote_error'></div></td>
    </tr>
			<tr>
      <td>email</td>
      <td>
      <input type="text" name="uemai" id="uemai">
      </td>
	   <td><div id='uemai_error'></div></td>
    </tr>

	   <tr>
	   <td colspan="2">
				<input type="checkbox" name="Agree" id="Agree">我已仔細閱讀並同意 < <a href="customerservice.html	">會員條款</a> > < <a href="Customerprivacy.html">隱私權政策</a> >
			</td>
			</tr>
				<tr>
      
         <td><input type="submit" id="submit" name="register"  value="送出表格" > </td>

         <td><input type="reset" name="reset" value="重設" ></td>
       </tr>
</table>
<?php

       }
 ?>
					   

					  </form>
					
					</div>
             
        	</div>	
		</div> 				
	</div>
	<!--end-single-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-text">
				<p>Copyright &copy; 2016.Company name All rights reserved.</p>
			</div>
		</div>
	</div>
	<!--footer-end-->
</body>
</html>