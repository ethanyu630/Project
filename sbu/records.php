 <?php 
 
 
	$recordS_per_page=4;
	if(isset($_GET["page"])){
		
		$page=$_GET["page"];
	}
	else
	{
		$page=1;
	}
	
	$line=mysql_connect("localhost","root","");
	$db_select=mysql_select_db("coffee",$line);
	mysql_query("SET NAMES UTF8");
	$sql="SELECT * frome salemess order by 編號 desc";
	$result = mysql_query($sql,$line);
	
						$total_fields=mysql_num_fields($result);//取得欄位數
						$total_records=mysql_num_rows($result);//取得紀錄數
						$total_pages=ceil($total_records/$records_per_page);//計算總頁數
						$started_redcord=$records_per_page*($page-1);//計算第一筆紀錄的序號
						mysql_data_seek($result,$started_redcord);//紀錄指標移動到第一筆紀錄的序號	
			
					//印出資料內容
					   $j=1;
						 while($row=mysql_fetch_row($result) and $j<=$records_per_page)
						 {
						   echo"<li><a href='#'>";
							  for($i=1;$i<$total_fields;$i++)
							  {
								 echo $row[$i].",";
							  }
							   $j++;
							   echo"</a></li>";
						 }
					 //製作導覽頁頁碼
						echo"<br><br><center>";
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
				 
					
						echo"</center>";
							
							
						
?>