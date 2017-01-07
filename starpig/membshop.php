<?php
     session_start(); 
 ?>
<html>
 <head>
 </head>
 <body background="images/back1.jpg" width='100%' height='100%'>
    <?php
  //購物廣場介面//////////////////////////////////////////
        @$uid=$_POST["uid"];
		@$upas=$_POST["upas"];
		
		//設定商品的顯示筆數
		    $records_per_page=3;
			  if(isset($_GET["page"]))
			  {
				  $page=$_GET["page"];
			  }
			  else
			  {
				  $page=1;
			  }
				
		echo"<form name='form1' method='post' action='shopcar.php'>";			  
	    //開啟資料庫
		    $link=mysql_connect("localhost","root","123456");     
            $db_selected=mysql_select_db("xxdb",$link);
            mysql_query("SET NAMES UTF8");
            $sql= "SELECT * FROM salegood";
            $result = mysql_query($sql, $link);
		
		//取得商品資料
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
			   <tr align='center' height='20px' bgcolor='#ffffcc'>
			     	 <td><a href='membshop.php'>購物廣場</a></td>
				 <td><a href='membfun.php'>遊戲廣場</a></td>
				 <td><a href='membsev.php'>客服廣場</a></td>
				 <td><a href='webmana.php'>網頁管理</a></td>
                                 <td><a href='membin.php'>首頁</a></td>
			   </tr>";
			   echo"<tr>
			     <td colspan=5><br><br>購物廣場:<br>
				      <table border='1' align='center' width='95%' height='65%' bgcolor='#e6e6fa'>
					   <tr align='center'><td>";
		 
					     $j=1;
						 while($row=mysql_fetch_row($result,MYSQL_BOTH) and $j<=$records_per_page)
						 {
								 echo"<table border='1' align='left' width='33.5%' height='80px'>
								      <tr><td>貨品編號:".$row["goid"]."</td></tr>
								      <tr><td>產品名稱:<br>".$row["gona"]."</td></tr>
								      <tr><td>貨品規格:".$row["gosze"]."</td></tr>
								      <tr><td>貨品圖案:<br><center><img src='images/".$row["gogra"]."' width='150px' height='100'></center></td></tr>
								      <tr><td>貨品價格:".$row["gopri"]."</td></tr>
								      <tr><td>尚有存貨:".$row["goye"]."</td></tr>";	
									  
								//以數量及購買來決定傳送的值
								   echo"<tr><td>數量:<select size='1' name='seleccar[]'>";
									                  for($a=0;$a<=$row["goye"];$a++)
													  {
														  echo"<option value='".$a."'>".$a."</option>";
													  }
									          echo"</select>
									      </td></tr>
									  <tr><td><input type='checkbox' name='car[]' value='".$row["goid"]."'>加入購物車</td></tr>";

									  
								  echo"</table>";
								  
							 $j++;
						 }
						 
 
					  echo"</td></tr></table>";
					   //製作導覽頁頁碼
                       echo"<center>";
					     if($page>1)
							 echo"<a href='membshop.php?page=".($page - 1)."'>上一頁</a>";
						 
						 for($i=1;$i<=$total_pages;$i++)
						{
							if($i==$page)
							   echo"$i";
							
							else
							   echo"<a href='membshop.php?page=$i'>$i</a>";
							
						}

						 if($page < $total_pages)
							 echo"<a href='membshop.php?page=".($page + 1)."'>下一頁</a>";

             echo"<br><br><input type='submit' name='send' value='查看購物車'>";						 
             echo"</center>";			
			 echo"</td></tr>
			  </table>";
		 echo"</form>";   
	
	
	//釋出資料
       mysql_free_result($result);
       mysql_close($link);
	
		
	?>
 </body>
</html>