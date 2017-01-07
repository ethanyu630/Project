<?php
           ob_start();
?>

<html>
 <head>
 </head>
 <body bgcolor="#deb887">

    <?php
	       session_start();
		   
	//首頁
		    //設定最新消息的顯示筆數
		    $records_per_page=4;
			  if(isset($_GET["page"]))
			  {
				  $page=$_GET["page"];
			  }
			  else
			  {
				  $page=1;
			  }
			  
	    //開啟資料庫
		    $link=mysql_connect("localhost","root","123456");     
            $db_selected=mysql_select_db("xxdb",$link);
            mysql_query("SET NAMES UTF8");
            $sql= "SELECT * FROM salemess ORDER BY 編號 DESC";
            $result = mysql_query($sql, $link);
		//取得登入資訊		
            if(@$_POST["send"])
			{
				$user=$_POST["user"];
				$pass=$_POST["pass"];
				$data=mysql_query("SELECT*FROM memli WHERE uid='$user' and upas='$pass'");
				if(mysql_num_rows($data)>=1)
				{
				   $_SESSION['username']=$user;
				   echo"<font color='blue'>Loding....</font>";
				   header("Refresh:2;url=membin.php");//輸入正確跳到登入系統
				}
				else
				{
					header("location:index.php?msg=error");//輸入錯誤
				}			
			}

	    //取得最新消息資料
		    $total_fields=mysql_num_fields($result);//取得欄位數
			$total_records=mysql_num_rows($result);//取得紀錄數
			$total_pages=ceil($total_records/$records_per_page);//計算總頁數
			$started_redcord=$records_per_page*($page-1);//計算第一筆紀錄的序號
			mysql_data_seek($result,$started_redcord);//紀錄指標移動到第一筆紀錄的序號		
	
	    //製作表格
		echo"<form name='form1' method='post' action='index.php'>";
         echo"<table width='70%' height='95%' align='center' bgcolor='#f5deb3'>
		       <tr>
			     <td colspan=2 align='center' height='25%'><h1>山豬星巴巴</h1><hr></td>
			   </tr>
			   <tr>
			     <td rowspan=2 width='35%'><a href='membset.php'>新會員註冊</a><p></p>
				               <br>會員登入:<br>
				               帳號:<input type='text' name='user' value=''><br>
							   (6~10英文數字,首字英文)<br>
							   密碼:<input type='password' name='pass' value=''><br>
							   (6~10英文數字,首字英文)<br>
							   <p></p>
							   <input type='submit' name='send' value='登入'>
							   <input type='reset' name='reset' value='重寫'>";
		                            //當查無此會員時印出錯誤					   
		                              if(@$_GET['msg']=="error")
		                              {
                                         echo"<p><center><font color='red'>查無此人</font></center></p>";
                                      } 
							   
		    echo"</td> <td height='10%'><h2>最新消息</h2></td>
			  </tr>";
	    echo"</form>";//表單結束
		
		   echo"<tr>
			     <td>活動訊息<p></p>
				      <table border='1' align='center' width='95%' height='65%' bgcolor='#e6e6fa'>
					   <tr align='center'>";
					     for($i=0;$i<$total_fields;$i++)
						 {						
							 echo"<td>". mysql_field_name($result, $i) ."</td>";
						 }
					   echo"</tr>";
					     $j=1;
						 while($row=mysql_fetch_row($result) and $j<=$records_per_page)
						 {
						echo"<tr>";
							 for($i=0;$i<$total_fields;$i++)
							 {
								 echo"<td>".$row[$i]."</td>";
							 }
							 $j++;
							 echo"</tr>";
						 }
					  echo"</table>";

					  //製作導覽頁頁碼
                       echo"<center>";
					     if($page>1)
							 echo"<a href='index.php?page=".($page - 1)."'>上一頁</a>";
						 
						 for($i=1;$i<=$total_pages;$i++)
						{
							if($i==$page)
							   echo"$i";
							
							else
							   echo"<a href='index.php?page=$i'>$i</a>";
							
						}

						 if($page < $total_pages)
							 echo"<a href='index.php?page=".($page + 1)."'>下一頁</a>";
						 
             echo"</center></td>					  
			    </tr>
			  </table>";
			  
		
	//釋出資料
       mysql_free_result($result);
       mysql_close($link);
	
	   ob_end_flush();	
	?>

 </body>
</html>