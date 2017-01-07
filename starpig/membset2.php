<html>
 <head>
 </head>
 <body bgcolor="#deb887">

    <?php
	//註冊最終畫面
	    //接收用戶帳號和密碼並傳送
		 $user=$_POST["user"];
		 $pass=$_POST["pass"];
		  
	    //開啟資料庫
		    $link=mysql_connect("localhost","root","123456");     
            $db_selected=mysql_select_db("xxdb",$link);
            mysql_query("SET NAMES UTF8");
            $sql= "SELECT * FROM salemess ORDER BY 編號 DESC";
            $result = mysql_query($sql, $link);
		
	    
	    //製作表格

         echo"<table width='70%' height='95%' align='center' bgcolor='#f5deb3'>
		       <tr>
			     <td colspan=2 align='center' height='25%'><h1>山豬星巴巴</h1><hr></td>
			   </tr>
			   <tr>
			     <td rowspan=2 width='35%' valign='top' align='center'>
				     <p><h2>歡迎加入!<br>山豬星巴巴的家庭</h2></p>
                     <h4>註冊方法:</h4><br>
                     1.輸入您的名稱及密碼,加入我們<br>
                     2.填寫有關您的個人資料<br>
                     3.恭喜您!加入我們的行列<br>					 
				 </td> <td height='10%'><h2>恭喜你成功加入我們!!</h2>
										  <br>".$user."您好!</td>
			   </tr>";
		
		   echo"<tr>
			     <td>以下是您的資料確認及享有的福利<p></p>
				      <table border='1' align='center' width='95%' height='65%' bgcolor='#e6e6fa'>
					   <tr align='center'>					 
						     <td><h4>帳號:".$user."<p></p>
                                 密碼:".$pass."<p></p>
                                   您將擁有山豬星巴巴50M的<br>
								   免費網頁空間<br>
                                   及各項購物優惠<br>
                                   一起來喝咖啡吧!<br></h4>
                        <form name='form1' method='post' action='membin.php'>
						<input type='hidden' name='user' value='".$user."'>
						<input type='hidden' name='pass' value='".$pass."'>
						<input type='submit' name='send' value='進入山豬星巴巴'>
						</form>						 
               </td>					  
			    </tr>
			  </table>";
			  
		
	//釋出資料
       mysql_free_result($result);
       mysql_close($link);
	
		
	?>

 </body>
</html>