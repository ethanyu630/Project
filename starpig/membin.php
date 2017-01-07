<?php
     session_start(); 
 ?>
<html>
 <head>
 </head>
  <body background="images/back1.jpg" width='100%' height='100%'> 
    <?php
  //登入後介面//////////////////////////////////////////
        @$uid=$_POST["uid"];
		@$upas=$_POST["upas"];
		
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
		
		
		
		
		echo"<form name='form1' method='post' action='membin.php'>";			  
	    //開啟資料庫
		    $link=mysql_connect("localhost","root","123456");     
            $db_selected=mysql_select_db("xxdb",$link);
            mysql_query("SET NAMES UTF8");
            $sql= "SELECT * FROM salemess";
            $result = mysql_query($sql, $link);
		
		//取得最新消息資料
		    $total_fields=mysql_num_fields($result);//取得欄位數
			$total_records=mysql_num_rows($result);//取得紀錄數
			$total_pages=ceil($total_records/$records_per_page);//計算總頁數
			$started_redcord=$records_per_page*($page-1);//計算第一筆紀錄的序號
			mysql_data_seek($result,$started_redcord);//紀錄指標移動到第一筆紀錄的序號
		  
	    //製作表格

         echo"<table width='70%' height='95%' align='center' bgcolor='#f5deb3'>
		       <tr>
			     <td colspan=5 align='center' height='25%'><h1>山豬星巴巴</h1><hr></td>
			   </tr>
			   <tr align='center' height='20%' bgcolor='#ffffcc'>
			     <td><a href='membshop.php'>購物廣場</a></td>
				 <td><a href='membfun.php'>遊戲廣場</a></td>
				 <td><a href='membsev.php'>客服廣場</a></td>
				 <td><a href='webmana.php'>網頁管理</a></td>
				 <td><a href='membin.php'>首頁</a></td>
			   </tr>";
			   echo"<tr>
			     <td colspan=5><br>最新消息:<br>
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
							 echo"<a href='membin.php?page=".($page - 1)."'>上一頁</a>";
						 
						 for($i=1;$i<=$total_pages;$i++)
						{
							if($i==$page)
							   echo"$i";
							
							else
							   echo"<a href='membin.php?page=$i'>$i</a>";
							
						}

						 if($page < $total_pages)
							 echo"<a href='membin.php?page=".($page + 1)."'>下一頁</a>";
						 
             echo"</center>";
			 echo"</form>";
             echo"<table align='right' height='10%'>
			        <tr>
					  <td><form name='form1' method='post' action='membin.php'>".$_SESSION['username']."您好!                      				  
					    <input type='submit' name='send3' value='登出'>
						</form>
					  </td>
					</tr>
				  </table>";
			 echo"</td></tr>
			  </table>";
   	
	//釋出資料
       mysql_free_result($result);
       mysql_close($link);
	
	
	if(@$send3=$_POST["send3"])
	{
		Session_unset($_SESSION['username']);
		echo"<font color='blue'>Sign out...</font>";
		header("Refresh:2;url=index.php");
	}
	
	ob_end_flush();		
	?>
 </body>
</html>