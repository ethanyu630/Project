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
$check=0;
//新加入會員
    if(isset($_POST["pw"])){
				 @$uid=$_POST["uid"];
				 @$umote=$_POST["umote"];
				 @$uemai=$_POST["uemai"];
				 
		        //建立資料連接
        		 $link = mysql_connect("localhost", "root", "");
				 		if (!$link) die("建立資料連接失敗");
				//開啟資料表
				 $db_selected = mysql_select_db("company", $link);
				if (!$db_selected) die("開啟資料庫失敗");
			     mysql_query("SET NAMES UTF8");
				 $sql="SELECT * FROM membdata where uid='$uid'";
				 $result=mysql_query($sql,$link);
					while ($row = mysql_fetch_array($result))
					{
						$username= $row[0];			
						$umote2= $row[12];
						$uemai2= $row[13];
						
					}
				echo  $username."<br>";
				  print_r($umote2);  echo "<br>";
				  print_r($uemai2);
				if($username==$uid and $umote2 == $umote and $uemai2 == $uemai){
					
						$check++;	
					
				}
	
	}

					 
					  ?>
	
	   <?php
				 
					/* }
				 mysql_query("INSERT INTO membdata (`uid`, `Upas`, `Una`, `uidnu`, `Uya`, `Umo`, `uda`, `ufri`, `Ucity`, `Usec`, `uaddr`, `Utel`, `umote`, `uemai`) 
				 		 VALUES ('$uid','$Upas','$Una','$uidun','$Uya','$Umo','$uda','$ufri','$Ucity',
						 '$Usec','$uaddr','$Utel','$umote','$uemai')");
						*/ 


?>	
</head>
<body>

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

      <?php
	 //檢查是否登入狀態
	 if(!isset($_POST['pw'])){
	 ?>
	 <form  name="form1" method="post" action="forgiving.php">
	   <table  style="border:4px #ffc groove;" width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#f2f2f2">
	   
	   <tr>
			<td colspan="2" align="center" bgcolor="#cccccc"><font color="#fffffff">忘記密碼修改系統</font></td>
	   </tr>
	   <tr>
			<td width="128" align="center" valign="baseline">帳號</td>
			<td width="144" valign="baseline"><input type="text" name="uid" ></td>
	   </tr>
	   <tr>
			<td width="128" align="center" valign="baseline">行動號碼</td>
			<td valign="baseline"><input type="text" name="umote" ></td>
	   </tr>
       <tr>
			<td width="128" align="center" valign="baseline">註冊郵箱</td>
			<td valign="baseline"><input type="text" name="uemai"></td>
	   </tr>
	   <tr>
		<td colspan="2" align="center" bgcolor="#cccccc"><input type="submit" name="pw" id="botton" value="修改密碼" >
														
                                                       
	    </td>
		</tr>
        
        
	   </table>
	   </form>
	   <?php 
	   }
	   //若登入即顯示登入成功訊息
	   if($check==0 and isset($_POST['pw'])){  ?>
		 	 <form  name="form1" method="post" action="forgiving.php">
	   <table  style="border:4px #ffc groove;" width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#f2f2f2">
	   
	   <tr>
			<td colspan="2" align="center" bgcolor="#cccccc"><font color="#fffffff">忘記密碼修改系統</font></td>
	   </tr>
	   <tr>
			<td width="128" align="center" valign="baseline">帳號</td>
			<td width="144" valign="baseline"><input type="text" name="uid" ></td>
	   </tr>
	   <tr>
			<td width="128" align="center" valign="baseline">行動號碼</td>
			<td valign="baseline"><input type="text" name="umote" ></td>
	   </tr>
       <tr>
			<td width="128" align="center" valign="baseline">註冊郵箱</td>
			<td valign="baseline"><input type="text" name="uemai" ></td>
	   </tr>
	   <tr>
		<td colspan="2" align="center" bgcolor="#cccccc"><input type="submit" name="pw"  value="修改密碼" >(<font color=red>請您輸入正確的資料</font>)
														
                                                       
	    </td>
		</tr>
        
        
	   </table>
	   </form>  
		   
	   <?php
	 }
	 
	 if( $check==1){
		 ?>
		  <form  name="npw" method="post" action="single1.php">
	   <table  style="border:4px #ffc groove;" width="300" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#f2f2f2">
	   
	   <tr>
			<td colspan="2" align="center" bgcolor="#cccccc"><font color="#fffffff">修改系統</font></td>
	   </tr>
	   <tr>
			<td width="128" align="center" valign="baseline">新密碼:</td>
			<td width="144" valign="baseline"><input type="text" name="Upas" id="Upas"><input type="hidden" name="uid" value="<?php echo $uid; ?>"></td>
	   </tr>
	   <tr>
			<td width="128" align="center" valign="baseline">再次確認:</td>
			<td valign="baseline"><input type="text" name="Upas2" id="Upas2"></td>
	   </tr>

	   <tr>
		<td colspan="2" align="center" bgcolor="#cccccc"><input type="button" name="tttt"  onclick="checker()" value="重設密碼" >
														
                                                       
	    </td>
		</tr>
        
        
	   </table>

	   <SCRIPT type="text/javascript">
       <!-- 此checker()函式在最後的「傳送」案鈕會用到 -->
        function checker()
        {
 
                if(npw.Upas.value == "") 
                {
                        alert("未輸入新密碼");
                }
                
                else if(npw.Upas2.value == "")
                {
                        alert("未輸入再次確認碼");
                }

                else if(npw.Upas2.value == npw.Upas.value)
                {
                         
						 npw.submit();
                }
				

                else alert("您輸入的密碼不符錯誤");
         }
</SCRIPT>
	   </form>
	   </div>
       <?php
		 }   
		 ?>
       
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