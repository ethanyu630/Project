<?php
     session_start(); 
 ?>
<html>
 <head>
 </head>
 <body bgcolor="#deb887">
    <?php
	//新會員註冊介面//////////////////////////////////////////	
		echo"<form name='form1' method='post' action='membset.php'>";			  
	    //開啟資料庫
		    $link=mysql_connect("localhost","root","123456");     
            $db_selected=mysql_select_db("xxdb",$link);
            mysql_query("SET NAMES UTF8");
            $sql= "SELECT * FROM memli";

			
		  
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
				 </td> <td height='10%'><h2>第一步.
				                          <br>輸入您的名稱及密碼</h2></td>
			   </tr>";

		   echo"<tr>
			     <td><p></p>";

				      echo"<table align='center' width='95%' height='65%' bgcolor='#e6e6fa'>
					   <tr align='center'>
					     <td>
						   帳號:<input type='text' name='user' value=''><br>
						   (6~10英文數字,首字英文)<br>
						   密碼:<input type='password' name='pass' value=''><br>
						   (6~10英文數字,首字英文)<br>
						 </td>
					   </tr> 
					   <tr align='center' valign='top'>
					     <td>
                            <input type='submit' name='send' value='加入我們'>
							<input type='reset' name='reset' value='重寫'><p></p>";
						 echo"</form>";												
		//驗證帳號是否重複
		    if(@$send=$_POST["send"])
			{   
		        $user=$_POST["user"];
		        $pass=$_POST["pass"];			  
                $data=mysql_query("SELECT*FROM memli WHERE uid='$user'");     
				
                   if($user=="" or $pass=="")
				   {
					   echo"<font color='red'>帳號或密碼不能空白!</font>";
				   }
				   elseif(mysql_num_rows($data)>=1)
				   {
					    echo"<font color='red'>這個帳號已經有人使用了!</font>";
				   }
				   elseif(strlen("$user")>10 or strlen("$user")<6)
				   {
					    echo"<font color='red'>帳號字數不對!</font>";
				   }
				   elseif(strlen("$pass")>10 or strlen("$pass")<6)
				   {
					    echo"<font color='red'>密碼字數不對!</font>";
				   }
				   elseif(mysql_num_rows($data)<=0)
				   {	
				        $user2=str_split($user,1);
						$pass2=str_split($pass,1);
                           if(preg_match("/^[a-z,A-Z]*$/",$user2[0]) and preg_match("/^[a-z,A-Z]*$/",$pass2[0]))
						   {							   
							    for($a=1;$a<=strlen("$user");$a++)
								{  
									   if(!preg_match("/^[[:alnum:]]*$/",$user2[$a]) or !preg_match("/^[[:alnum:]]*$/",$pass2[$a]))
									   {
										  echo"<font color='red'>第".($a+1)."個字不符合格式喔!<font color='red'>";
										  break;
									   }							 
                                       else
									   {
							  	          $sql = "INSERT INTO memli(uid , upas) Values('$user','$pass')";
                                          echo"<font color='#880000'>".$user."已成功註冊喽!<br>請按下一步~~!</font>";										  
										  echo"<form name='form1' method='post' action='membset1.php'>";
										  echo"<input type='hidden' name='user' value='".$user."'>
										       <input type='hidden' name='pass' value='".$pass."'>
										       <input type='submit' name='send2' value='下一步'>";
										  echo"</form>";
										  break;
									   }   
								}

									   									   							    
						   }
	                       else
						   {
							    echo"<font color='red'>帳號或密碼第一個字不是英文!<font color='red'>";
						   }												
				   }
			}
			
		$result = mysql_query($sql, $link);	
		
						 echo"</td>
					   </tr> 
					  </table>";	
					
             echo"</td>					  
			   </tr>
			  </table>";
   
	
	
	//釋出資料
       mysql_free_result($result);
       mysql_close($link);
	
		
	?>
 </body>
</html>