<?php
           ob_start();
?>
<html>
 <head>
 </head>
 <body bgcolor="#deb887">
    <?php
	//新會員基本資料
	
	  session_start();
        //接收用戶帳號和密碼並傳送

		 $user=$_POST["user"];
		 $pass=$_POST["pass"];
		 
		$_SESSION['username']=$user;

			  
	    //開啟資料庫
		    $link=mysql_connect("localhost","root","123456");     
            $db_selected=mysql_select_db("xxdb",$link);
            mysql_query("SET NAMES UTF8");
            $sql= "SELECT * FROM membdata";
	

		//接收輸入的基本資料
					@$una=$_POST["una"];
					@$uidnu=$_POST["uidnu"];
					@$uya=$_POST["uya"];
					@$umo=$_POST["umo"];
					@$uda=$_POST["uda"];
					@$ufri=$_POST["ufri"];
					@$ucity=$_POST["ucity"];
					@$usec=$_POST["usec"];
					@$uaddr=$_POST["uaddr"];
					@$utel=$_POST["utel"];
					@$umote=$_POST["umote"];
					@$uemail=$_POST["uemail"];
					
		 echo"<form name='form1' method='post' action='membset1.php'>";
		 echo"<input type='hidden' name='user' value='".$user."'>
			  <input type='hidden' name='pass' value='".$pass."'>";					
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
				 </td> <td height='10%'><h2>第二步.
				                          <br>輸入您的基本資料</h2>
										  <br>".$user."您好!</td>
			   </tr>";

		   echo"<tr>
			     <td><p></p>
				      <table align='center' width='95%' height='65%' bgcolor='#e6e6fa'>
					   <tr align='center'>
					     <td>
						     <table border='1' align='center' width='100%' height='100%'>
							   <tr><td width='25%'>姓名:</td>        <td><input type='text' name='una' value=''></td></tr>
							   <tr><td width='25%'>身分證字號:</td>  <td><input type='text' name='uidnu' value=''></td></tr>
							   <tr><td width='25%'>生日:</td>        <td><select size='1' name='uya'>
							                                               <option value='0'selected>請選擇</option>";
																		    for($a=1866;$a<=2016;$a++)
																		    {
																			   echo"<option value='".$a."'>".$a."</option>";
																		    }
							                                          echo"</select>年
							                                             <select size='1' name='umo'>
																		   <option value='0'selected>請選擇</option>";
																		    for($b=1;$b<=12;$b++)
																		    {
																			   echo"<option value='".$b."'>".$b."</option>";
																		    }
							                                          echo"</select>月
																		 <select size='1' name='uda'>
																		   <option value='0'selected>請選擇</option>";
																		    for($c=1;$c<=12;$c++)
																		    {
																			   echo"<option value='".$c."'>".$c."</option>";
																		    }
							                                          echo"</select>日</td></tr>
																		 
							   <tr><td width='25%'>暱稱:</td>        <td><input type='text' name='ufri' value=''></td></tr>
							   <tr><td width='25%'>地址:</td>        <td><select size='1' name='ucity'>
							                                               <option value='0'selected>請選擇</option>
																		   <option value='台北市'>台北市</option>
																		   <option value='新北市'>新北市</option>
																		   <option value='桃園市'>桃園市</option>
																		   <option value='台中市'>台中市</option>
																		   <option value='台南市'>台南市</option>
																		   <option value='基隆市'>基隆市</option>
																		   <option value='新竹市'>新竹市</option>
																		   <option value='嘉義市'>嘉義市</option>
																		   <option value='高雄市'>高雄市</option>";
							                                          echo"</select>縣市
							                                             <select size='1' name='usec'>
																		   <option value='0'selected>請選擇</option>
																		   <option value='豐原區'>豐原區</option>
																		   <option value='潭子區'>潭子區</option>
																		   <option value='坪林區'>坪林區</option>
																		   <option value='大武鄉'>大武鄉</option>
																		   <option value='金沙鎮'>金沙鎮</option>
																		   <option value='南屯區'>南屯區</option>";
							                                          echo"</select>鄉鎮區
																		 <input type='text' name='uaddr' value=''></td></tr>
																		 
						       <tr><td width='25%'>電話</td>         <td><input type='text' name='utel' value=''>";echo"</td></tr>
							   <tr><td width='25%'>行動電話:</td>    <td><input type='text' name='umote' value=''></td></tr>
							   <tr><td width='25%'>email:</td>       <td><input type='text' name='uemail' value=''></td></tr>
						     </table>
						 </td>
					   </tr> 
					   <tr align='center' valign='top'>
					     <td>
                            <input type='submit' name='send' value='確認送出'>
							<input type='reset' name='reset' value='重寫'><p></p>";
			echo"</form>";
			
			        //接收填寫的資料
			          if(@$send=$_POST["send"])
					  {
						 //判斷是否空值
						 if($uya=='0' or $ucity=='0' or $usec=='0')
						 {
							 echo"<font color='red'>住址或生日資料不完整!</font>";
						 }
						 //判斷身分證字號
						 $uidnu2=str_split($uidnu,1);	 
						  if(strlen("$uidnu")==10)
						  {							  
                              if(preg_match("/^[a-z,A-Z]*$/",$uidnu2[0]))
                              {
							       if($uidnu2[1]==1 or $uidnu2==2)
							       {
								       for($a=2;$a<=8;$a++)
								       {
									       if(!preg_match("/^[0-9]*$/",$uidnu[$a]))
										   {
											   echo"<font color='red'>第".$a."個字格式不符!</font>";
											   break;
										   }
                                           else
										   {
											   $sql= "INSERT INTO membdata(uid , Upas , Una , uidnu , Uya , Umo , uda , ufri , Ucity , Usec , uaddr , Utel , umote , uemai) Values('$user','$pass','$una','$uidnu','$uya','$umo','$uda','$ufri','$ucity','$usec','$uaddr','$utel','$umote','$uemail')";
										       echo"您的資料已成功註冊了!";
											   echo"<form name='form1' method='post' action='membset2.php'>";
											   echo"<input type='hidden' name='user' value='".$user."'>
			                                        <input type='hidden' name='pass' value='".$pass."'>
													<br><br>
													<input type='submit' name='send2' value='下一步'>
							                        <input type='reset' name='reset' value='重寫'>";
											   echo"</form>";
            								   break;
										   }											   
								       }
							       }
							       else
							       {
								       echo"<font color='red'>身分證號碼第二個字格式不對!</font>";
							       }
						      }
                              else
						      {
							      echo"<font color='red'>身分證第一個字必須是英文字!</font>";
						      }	
						  }	
                          else
						  {
							  echo"<font color='red'>身分證號碼字數不對!</font>";
						  }							  
					  }
						
			
						echo"</td>
					   </tr> 
					  </table>						 
                </td>					  
			   </tr>
			  </table>";
	   $result = mysql_query($sql, $link);
	
	
	//釋出資料
       //mysql_free_result($result);
       mysql_close($link);
	ob_end_flush();
		
	?>
 </body>
</html>