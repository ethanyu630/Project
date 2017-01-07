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
    function deleting_data(){
		if(document.form1.deleid.value.length==0)
		 {
			 //判斷"刪除編號"是否為空值
			 alert("您沒有輸入刪除編號!")
			 return false;
		 }
		 //驗證"刪除編號"的格式
		 //以表單的id取得元素
		 var deleid_element=document.getElementById('deleid');
		 //取出id元素內的值
		 var deleid=deleid_element.value;
		 //開始正規化判斷
		 re=/^[A-Z]{2}\d{2}[X-Y]{2}$/;
		 if(!re.test(deleid))
		 {
			 alert('輸入的編號格式不對!');
			 return false;			   
		 }
		 else
		 { 
		   alert("確定要刪除嗎?(一但刪除就無法復原喽!)")
		 }
	}

  </script>
  
</head>
<body background="images/back1.jpg" width='100%' height='100%'>

<?php
  //預留接收其他頁面的資料
  //echo"管理員您好!";
?>



<!--商品刪除介面單筆-->
  <div class="tit2"><h1 align="center">商品刪除介面</h1></div>
  <div class="bgdiv">
  <h4 align="center">單品項</h4>  
  
  <form name="form1" action="deleteitem.php" method="POST" onsubmit="return deleting_data(this);">

  <!--印出欲刪除的新商品資料-->
<?php

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

    //開啟資料庫
    $link=mysql_connect("localhost","root","123456");     
    $db_selected=mysql_select_db("xxdb",$link);
    mysql_query("SET NAMES UTF8");
    $sql= "SELECT * FROM salegood";
    $result = mysql_query($sql, $link);
	
//依據所輸入的編號刪除產品			
if(isset($_POST["subde"]))
{
	$deleid=$_POST["deleid"];
    $sql= "SELECT * FROM salegood WHERE goid='$deleid'";
    $result = mysql_query($sql, $link);
	
	//查詢資料是否存在
	if(mysql_num_rows($result)<=0)
	{
		echo"很抱歉,查無此資料!";
		header("Refresh:2;url=deleteitem.php");
	}
	else
	{
	    while($row=mysql_fetch_array($result,MYSQL_BOTH))
	    {
			 $gogra=$row["gogra"];
	    }
	    //先確認商品圖案是否存在	
	    if(file_exists('images/'.$gogra))
	    {
	    unlink('images/'.$gogra);//刪除商品圖案
        //刪除商品資料
	    $sql= "DELETE FROM salegood WHERE goid='$deleid'";
        $result = mysql_query($sql, $link);
        echo"已為您刪除編號".$deleid."的資料!";	
	    header("Refresh:2;url=deleteitem.php");
	    }
	}
}
else
{
  $tot=mysql_num_rows($result);
  echo"<h5 align='right'>目前共有<font color='blue'>".$tot."</font>件商品</h5>";
  
  //取得商品資料
	$total_fields=mysql_num_fields($result);//取得欄位數
	$total_records=mysql_num_rows($result);//取得紀錄數
	$total_pages=ceil($total_records/$records_per_page);//計算總頁數
	$started_redcord=$records_per_page*($page-1);//計算第一筆紀錄的序號
	mysql_data_seek($result,$started_redcord);//紀錄指標移動到第一筆紀錄的序號
  
  
  echo"<table border='1' align='center' width='80%' height='75%' bgcolor='#2f4f4f'>
    
	       <colgroup bgcolor='#Ffffff' height='40'>
		   <col width:'30'>
		   <col width:'15'>
		   <col width:'300'>
		   <col width:'3'>
		   <col width:'3'>
		   <col width:'3'>
		   <col width:'3'>
		   <col width:'3'>
           </colgroup>	

		  <tr>
		    <td colspan='8' align='center'  height='50px' bgcolor='#ffddaa'>
		      請輸入刪除編號:<input type='text' name='deleid' id='deleid'>
			  <input type='submit' name='subde' value='刪除商品'>
			</td>
		  </tr>
		   
	      <tr height='45px' bgcolor='#bdb76b'>
	        <td>貨品編號</td> <td>貨品圖案</td> <td>產品名稱</td> <td>貨品規格</td>
			<td>貨品售價</td> <td>貨品進價</td> <td>庫存數量</td> <td>安全存量</td>	        
	      </tr>";

		     $j=1;
			 while($row=mysql_fetch_row($result,MYSQL_BOTH) and $j<=$records_per_page)
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
				 echo"</tr>";
				 $j++;
				 echo"</tr>";    			 
			 }
			 
		   //製作導覽頁頁碼 
		   echo"<tr><td colspan=8 align='center' height='40' bgcolor='#ffddaa'>";
            if($page>1)
		    {
		       echo"<a href='deleteitem.php?page=".($page - 1)."'>上一頁</a>";
		    }
		   
		    for($i=1;$i<=$total_pages;$i++)
			{
				if($i==$page)
				{
				  echo"$i";
				}			
				else
				{
				  echo"<a href='deleteitem.php?page=$i'>$i</a>";
				}			
			}

			if($page < $total_pages)
			{
			   echo"<a href='deleteitem.php?page=".($page + 1)."'>下一頁</a>";
			}
			
		   echo"</td></tr>";
     echo"<table>";
?>  
  <br>

  <br>
  </form> 
  <br>
  <form name="form2" action="itemmodify.php" method="POST">
  <input type="submit" name="backitem" value="回商品管理頁面">
  </form>
  </div>
  
  <?php
  //釋出資料
  
       mysql_free_result($result);
       mysql_close($link);
	   

}
  ?>


</body>
</html>