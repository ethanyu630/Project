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
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!--start-smoth-scrolling-->

<?php

//新加入會員
session_start(); 
if(isset($_POST["Upas2"])){
		 @$uid=$_POST["uid"];
		 @$Upas=$_POST["Upas"];
		
		 $link = mysql_connect("localhost", "root", "");
				if (!$link) die("建立資料連接失敗");
		//開啟資料表
		 $db_selected = mysql_select_db("coffee", $link);
		if (!$db_selected) die("開啟資料庫失敗");
		 mysql_query("SET NAMES UTF8");
		 mysql_query("UPDATE `membdata` SET Upas='$Upas' WHERE uid='$uid'");
		 
}
if(isset($_POST["register"])){
			 @$uid=$_POST["uid"];
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
			 $link = mysql_connect("localhost", "root", "");
					if (!$link) die("建立資料連接失敗");
			//開啟資料表
			 $db_selected = mysql_select_db("coffee", $link);
			if (!$db_selected) die("開啟資料庫失敗");
			 mysql_query("SET NAMES UTF8");
			 mysql_query("INSERT INTO membdata (`uid`, `Upas`, `Una`, `uidnu`, `Uya`, `Umo`, `uda`, `ufri`, `Ucity`, `Usec`, `uaddr`, `Utel`, `umote`, `uemai`) 
					 VALUES ('$uid','$Upas','$Una','$uidun','$Uya','$Umo','$uda','$ufri','$Ucity',
					 '$Usec','$uaddr','$Utel','$umote','$uemai')");
					 }

//執行登入


if(!isset($_SESSION["membername"]) || ($_SESSION["membername"]=="")){

	if(isset($_POST["uid"])&& isset($_POST["Upas"]) ){
		$uid=$_POST["uid"];
		$Upas=$_POST["Upas"];
		
		 //建立資料連接
			 $link = mysql_connect("localhost", "root", "");
					if (!$link) die("建立資料連接失敗");
			//開啟資料表
			 $db_selected = mysql_select_db("coffee", $link);
			if (!$db_selected) die("開啟資料庫失敗");
			 mysql_query("SET NAMES UTF8");
			$sql="select * from membdata where uid ='$uid'";
			//抓取登入數據
			$result=mysql_query($sql,$link);
			
					while ($row = mysql_fetch_array($result))
				{
					$username= $row[0];			
					$passwd= $row[1];
					
				}
			
		if(($_POST["uid"]==$username)&& ($_POST["Upas"]== $passwd) && $uid != ""){
			
			$_SESSION["membername"]=$username;
		
		}
		
		header("location: single1.php");
		
	}
	
}
//執行登出
if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
	unset($_SESSION["membername"]);
	header("location:single1.php");
}
?>	
</head>
<body>
     <?php if(isset($_SESSION["membername"])){  ?>
    <table align="right"><tr>
    <td width=""> <?php echo $_SESSION["membername"]; ?>您好</td>
    <td width="" ><a href="single1.php?logout=true">登出</td>
    </tr>
    </table>
    <?php }?>
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
                    
					
					
					</div>
             
        	</div>	
		</div> 				
	</div>
	<!--end-single-->
      <?php
	 //檢查是否登入狀態
	 if(!isset($_SESSION["membername"]) || ($_SESSION["membername"]=="")){
		
	 ?>
	 <form id="form1" name="form1" method="post" action="single1.php">
	   <table  style="border:4px #ffc groove;" width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#f2f2f2">
	   
	   <tr>
			<td colspan="2" align="center" bgcolor="#cccccc"><font color="#fffffff">會員系統</font></td>
	   </tr>
	   <tr>
			<td width="80" align="center" valign="baseline">帳號</td>
			<td valign="baseline"><input type="text" name="uid" id="uid"></td>
	   </tr>
	   <tr>
			<td width="80" align="center" valign="baseline">密碼</td>
			<td valign="baseline"><input type="password" name="Upas" id="Upas"></td>
	   </tr>
	   <tr>
		<td colspan="2" align="center" bgcolor="#cccccc"><input type="submit" name="su"  value="登入" >
														 <input type="reset" name="botton2" id="botton2" value="重設">
                           </form>                            
	    </td>	   
		</tr>
        <tr>
        <td  align="left" bgcolor="#cccccc"> <a href="forgiving.php">忘記密碼</a> </td>
        <td align="right" bgcolor="#cccccc"><form name="add"method="post" action="single2.php"> <input type="submit" name="add"  value="加入會員"> </form></td>
	   </table>
	   
	   <?php 

	   //若登入即顯示登入成功訊息
	 }  ?>
         	   <?php
	 //檢查是否登入狀態
	 if(isset($_SESSION["membername"])){
		
	 ?>
	 <form id="form1" name="form1" method="post" action="single2.php">
	   <table  style="border:4px #f66 groove;" width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#f2f2f2">
	   
	   <tr>
		<td  align="center" bgcolor="#cccccc"><input type="submit" name="update"  value="修改個人訊息" >

                                                       
	    </td>	   
		
	   </table>
	   </form>
	   <?php 

	 } 
		/* ?>
        else{
	   <table width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#f2f2f2">
	   <tr>
	    <td colspan="2" align="center" bgcolor="#cccccc"><font color="#fffffff">會員系統</font></td>
	   </tr>
	   <tr>
	    <td width="80" align="center" valign="baseline"> <?php echo $_SESSION["membername"]; ?>您好，登入成功!</td>
	   </tr>
	   <tr>
	    <td width="80" align="center" valign="baseline"><a href="single1.php?logout=true">登出系統</td>
	   </tr>
       </table>
       <?PHP } */?>
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