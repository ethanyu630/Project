<html>
<head>
  <style type="text/css">
    .tit2{
		 padding-top:1%;
		 text-valign:center;
		 height:15%;
		 background-color:#ccddff;
	 }
	.bgdiv{
		padding-top:1%;
		padding-bottom:1%;
		padding-left:3%;
		padding-right:3%;
		margin:20px,30px,20px,30px;
		background-color:"#F5F5F5";
		text-align:center;
	}
	.h5{
		text-align:right;
	}
	img{
		width:50px;
		height:50px;
		align:right;
	}
	
  </style>
  
  <script language="JAVASCRIPT">
    //判斷輸入資料的格式
    function updata_data(){
		if(document.form1.upid.value.length==0)
		 {
			 //判斷"修改編號"是否為空值
			 alert("您沒有輸入刪除編號!")
			 return false;
		 }
		 //驗證"修改編號"的格式
		 //以表單的id取得元素
		 var upid_element=document.getElementById('upid');
		 //取出id元素內的值
		 var upid=upid_element.value;
		 //開始正規化判斷
		 re=/^[A-Z]{2}\d{2}[X-Y]{2}$/;
		 if(!re.test(upid))
		 {
			 alert('輸入的編號格式不對!');
			 return false;			   
		 }

	}

  </script>
  
</head>
<body background="images/back1.jpg" width='100%' height='100%'>

<?php
  //預留接收其他頁面的資料
  //echo"管理員您好!";
?>



<!--商品修改介面單筆-->
  <div class="tit2"><h1 align="center">商品修改介面</h1></div>
  <div class="bgdiv">
  <h4 align="center">單品項</h4>  
  
  <form name="form1" action="updataitem2.php" method="POST" onsubmit="return updata_data(this);">

  <!--印出欲修改的新商品資料-->
<?php
    //開啟資料庫
	$link=mysql_connect("localhost","admin","123456");     
    $db_selected=mysql_select_db("xxdb",$link);
    mysql_query("SET NAMES UTF8");
    $sql= "SELECT * FROM salegood";
    $result = mysql_query($sql, $link);
	
	//設定商品的顯示筆數
	$records_per_page=5;
	if(isset($_GET["page"]))
	{
		$page=$_GET["page"];
	}
	else
	{
		$page=1;
	}   
	
	//計算商品數量
	$tot=mysql_num_rows($result);
	
	//取得商品資料
	$total_fields=mysql_num_fields($result);//取得欄位數
	$total_records=mysql_num_rows($result);//取得紀錄數
	$total_pages=ceil($total_records/$records_per_page);//計算總頁數
	$started_redcord=$records_per_page*($page-1);//計算第一筆紀錄的序號
	mysql_data_seek($result,$started_redcord);//紀錄指標移動到第一筆紀錄的序號

	
    echo"<h5 align='right'>目前共有<font color='blue'>".$tot."</font>件商品</h5>";
    echo"<table border='1' align='center' width='80%' height='75%' bgcolor='#2f4f4f'>    
	       <colgroup bgcolor='#ffffff'>
		   <col width:'30'>
		   <col width:'15'>
		   <col width:'300'>
		   <col width:'10'>
		   <col width:'10'>
		   <col width:'10'>
		   <col width:'10'>
		   <col width:'10'>
           </colgroup>	
		  <tr>
		    <td colspan='8' align='center'  height='50px' bgcolor='#dda0dd'>
		      請輸入修改編號:<input type='text' name='upid' id='upid'>
			  <input type='submit' name='subup' value='修改商品'>
			</td>
		  </tr>
		   
	      <tr height='45px' bgcolor='#bdb76b'>
	        <td>貨品編號</td> <td>貨品圖案</td> <td>產品名稱</td> <td>貨品規格</td>
			<td>貨品售價</td> <td>貨品進價</td> <td>庫存數量</td> <td>安全存量</td>	        
	      </tr>";
	
             $j=1;	
			 while($row=mysql_fetch_array($result,MYSQL_BOTH) and $j<=$records_per_page)
			 {
				 echo"<tr height='45px'>";
				 echo"<td>".$row["goid"]."</td>";
				 echo"<td><img src='images/".$row["gogra"]."'>
				          ".$row["gogra"]."</td>";
				 echo"<td>".$row["gona"]."</td>";
				 echo"<td>".$row["gosze"]."</td>";
				 echo"<td>".$row["gopri"]."</td>";
				 echo"<td>".$row["goinpa"]."</td>";
				 echo"<td>".$row["goye"]."</td>";
				 echo"<td>".$row["gosa"]."</td>";
				 $j++;
				 echo"</tr>";
			 }		
			 
			//製作導覽頁頁碼 
		    echo"<tr><td colspan=8 align='center' height='40' bgcolor='#ffddaa'>";
            if($page>1)
		    {
		       echo"<a href='updataitem.php?page=".($page - 1)."'>上一頁</a>";
		    }
		   
		    for($i=1;$i<=$total_pages;$i++)
			{
				if($i==$page)
				{
				  echo"$i";
				}			
				else
				{
				  echo"<a href='updataitem.php?page=$i'>$i</a>";
				}			
			}

			if($page < $total_pages)
			{
			   echo"<a href='updataitem.php?page=".($page + 1)."'>下一頁</a>";
			}
			
		   echo"</td></tr>";
			 
     echo"<table>";
?>  
  <br>

  <br>
  </form> 
  <form name="form2" action="itemmodify.php" method="POST">
  <input type="submit" name="backitem" value="回商品管理頁面">
  </form>
  </div>
  
  <?php
  //釋出資料
       mysql_free_result($result);
       mysql_close($link);
	   


  ?>


</body>
</html>