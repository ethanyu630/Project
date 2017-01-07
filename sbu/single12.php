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
</head>
<body>
<?php

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
        		 $link = mysql_connect("127.0.0.1", "sabox", "123456");
				 		if (!$link) die("建立資料連接失敗");
				//開啟資料表
				 $db_selected = mysql_select_db("coffee", $link);
				if (!$db_selected) die("開啟資料庫失敗");
			     mysql_query("SET NAMES UTF8");
				 $sql= "SELECT * FROM `membdata`";
                 $result = mysql_query($sql, $link);
				 mysql_query("INSERT INTO membdata (`uid`, `Upas`, `Una`, `uidnu`, `Uya`, `Umo`, `uda`, `ufri`, `Ucity`, `Usec`, `uaddr`, `Utel`, `umote`, `uemai`) 
				 		 VALUES ('$uid','$Upas','$Una','$uidun','$Uya','$Umo','$uda','$ufri','$Ucity',
						 '$Usec','$uaddr','$Utel','$umote','$uemai')");
               if(isset($_POST["uid"])&&empty($_POST["uid"]))
				{
					$noempty="帳號不可空白";
				}
				else{
					$noempty="　　";
				}
		  


	





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
						<li><a href="index.html">首頁</a></li>
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
                    
					  <form name="form1" method="post" action=""><tr>
											<td colspan="2"><div align="center"><b>
										    <form name="form1" method="POST" action="ppsCID.php">
										    <b><font color="#3399FF">基本資訊</font></b></font></b>
											  <font face="Verdana, Arial, Helvetica, sans-serif" size="-1">
										      <font size="-1" color="#999999">(</font><font size="-1" face="Verdana, Arial, Helvetica, sans-serif"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif"><font size="-2"><font color="#FF0000">*</font></font></font></font><font size="-1">
									        <font color="#999999">為必填欄位)</font></font></font></div></td>
										</tr>
					    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
					      
					    <tr>
      <td>帳號</td>
      <td>
      <input type="text" name="uid" value="<?php echo ($uid);?>"><?php echo @$noempty;?>
      </td>
    </tr>
    <tr>
      <td>密碼</td>
      <td>
      <input type="password" name="Upas">
      </td>
    </tr>
    <tr>
      <td>姓名</td>
      <td>
      <input type="text" name="Una">
      </td>
    </tr>
	   <tr>
      <td>身分證字號</td>
      <td>
      <input type="text" name="uidun">
      </td>
    </tr>
    <tr>
      <td>出生年</td>
      <td>
      <input type="text" name="Uya" value="0000" size="5">
     
      出生月
     <select name="Umo">
	<option selected="selected" value="">-月-</option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	
</select>

      出生日
     
	  <select name="uda">
      <option selected="selected" value="">-日-</option>
	<option value="01">01</option>
	<option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>	
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
      </td>
    </tr>
    <tr>
      <td>暱稱</td>
      <td>
      <input type="text" name="ufri">
      </td>
    </tr>
	<tr>
      <td>所在縣市</td>
      <td>
    <select name="Ucity">
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
      <input type="text" name="Usec">
      </td>
    </tr>
		<tr>
      <td>地址</td>
      <td>
      <input type="text" name="uaddr">
      </td>
    </tr>
		<tr>
      <td>電話</td>
      <td>
      <input type="text" name="Utel">
      </td>
    </tr>
			<tr>
      <td>行動電話</td>
      <td>
      <input type="text" name="umote">
      </td>
    </tr>
			<tr>
      <td>email</td>
      <td>
      <input type="text" name="uemai">
      </td>
    </tr>
	<tr>
      
         <td><input type="submit" name="check_data" value="送出表格" > </td>

         <td><input type="reset" name="reset" value="重設" ></td>
       </tr>
</table>
					   

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