<html>
<head>
  <style type="text/css">
    .tit2{
		 padding-top:3%;
		 vartical-align:middle;
		 height:15%;
		 background-color:#ccddff;
	 }
	.bgdiv{
		height:85%;
		padding-top:1%;
		padding-bottom:1%;
		padding-left:3%;
		padding-right:3%;
		margin:20px,30px,20px,30px;
		background-color:"#F5F5F5";
		text-align:center;
	}
	h5{
		text-align:left;
	}
	img{
		width:50px;
		height:50px;
		align:right;
	}
	.leftmenu{
		float:left;
		width:74%;
		height:auto;
		background-color:#ffffff;
		margin-top:5px;
		padding-top:20px;
		padding-bottom:20px;	
	}
	.rightmenu{
		float:right;
		width:25%;
		height:auto;
		background-color:#ffffff;
		margin-top:5px;
	}
	
  </style>
</head>
<body background="images/back1.jpg" width='100%' height='100%'>

<?php
  //預留接收其他頁面的資料
  //echo"管理員您好!";
  
  //設定商品的顯示筆數
	$records_per_page=7;
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
    $sql= "SELECT * FROM salegood";
    $result = mysql_query($sql, $link);
  
   //取得商品資料
	$total_fields=mysql_num_fields($result);//取得欄位數
	$total_records=mysql_num_rows($result);//取得紀錄數
	$total_pages=ceil($total_records/$records_per_page);//計算總頁數
	$started_redcord=$records_per_page*($page-1);//計算第一筆紀錄的序號
	mysql_data_seek($result,$started_redcord);//紀錄指標移動到第一筆紀錄的序號
  
    //計算商品總量
    $tot=mysql_num_rows($result);
  
?>

<!--商品修改首頁-->
  <div class="tit2"><h1 align="center">商品管理中心</h1></div>
  <div class="bgdiv">
  <h4 align="center">商品管理中心首頁</h4> 
  <?php echo"<h5>目前共有<font color='blue'>".$tot."</font>件商品</h5>";?>
  <div class="leftmenu">
    <table border="1" align="center" width="90%">
	 <colgroup bgcolor='#Ffffff' height='35'>
        <col width="100" align="center">
		<col width="200">
		<col width="200">
		<col width="90">
		<col width="100">
		<col width="100">
		<col width="90">
		<col width="90">
     </colgroup>
        <tr><td colspan=8 height="40" bgcolor="#ffddaa">商品資訊</td></tr>
    <?php
	
	    $j=1;
	    while($row=mysql_fetch_row($result,MYSQL_BOTH) and $j<=$records_per_page)
		{
			echo"<tr height='45px'>";
			echo"<td>".$row["goid"]."</td>";
			echo"<td><img src='images/".$row["gogra"]."'>
				        ".$row["gogra"]."</td>";
			echo"<td>".$row["gona"]."</td>";
			echo"<td>".$row["gosze"]."g/包</td>";
			echo"<td>\$NT.".$row["gopri"]."/包</td>";
			echo"<td>\$NT.".$row["goinpa"]."/包</td>";
			echo"<td>".$row["goye"]."/包</td>";
			echo"<td>".$row["gosa"]."/包</td>";
			echo"</tr>";
			$j++;
			echo"</tr>";    			 
		}
	    //製作導覽頁頁碼 
		   echo"<tr><td colspan=8 align='center' height='40' bgcolor='#ffddaa'>";
            if($page>1)
		    {
		       echo"<a href='itemmodify.php?page=".($page - 1)."'>上一頁</a>";
		    }
		   
		    for($i=1;$i<=$total_pages;$i++)
			{
				if($i==$page)
				{
				  echo"$i";
				}			
				else
				{
				  echo"<a href='itemmodify.php?page=$i'>$i</a>";
				}			
			}

			if($page < $total_pages)
			{
			   echo"<a href='itemmodify.php?page=".($page + 1)."'>下一頁</a>";
			}
			
		   echo"</td></tr>";
	
	
	
	?>
  
	</table>  
  </div>
  
  <div class="rightmenu">
  <table>
    <tr><td>--Menu--</td></tr>
    <tr><td><a href="newitemupload.php">新增商品</a></td></tr>
	<tr><td><a href="deleteitem.php">刪除商品</a></td></tr>
	<tr><td><a href="updataitem.php">修改商品</a></td></tr>
	<tr><td><a href="#">查詢商品</a></td></tr>
  </table>
  </div>
  
  
  
  
  
  
  
  
  <div>
<body>
<html>