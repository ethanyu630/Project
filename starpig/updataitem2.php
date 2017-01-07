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
      function updata_data{}{  
	     //判斷輸入資料的格式
		   if(document.form1.newgogra.value.length>50)
		    {
			   //判斷"貨品圖案"名稱是否過長
			   alert("圖案名稱過長!")
			   return false;
		    }
			else
			{//--------------------!!!!!value內有值,javascript無法判斷格式!!!!!!!
			   //正規化判斷貨品規格
				var gosze_element=document.getElementById('gosze');
			    var gosze=gosze_element.value;
			    re=/^[1-9]{1}\d{0,8}$/;
			    if(!re.test(gosze))
			    {
				   alert('貨品規格格式不對');
				   return false;			   
			    } 


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
  
  <form name="form1" action="updataitem3.php" method="POST" Enctype="multipart/form-data" onsubmit="return updata_data(this);">

  <!--印出欲修改的新商品資料-->
<?php
           //開啟資料庫
		    $link=mysql_connect("localhost","admin","123456");     
            $db_selected=mysql_select_db("xxdb",$link);
            mysql_query("SET NAMES UTF8");
            
	
//依據所輸入的編號修改產品			
if(isset($_POST["subup"]))
{
   //接收編號
   $upid=$_POST["upid"];
   echo"<input type='hidden' name='upid' value='".$upid."'>";
  
   $sql= "SELECT * FROM salegood WHERE goid='$upid'";
   $result = mysql_query($sql, $link);

   //查詢資料是否存在
   if(mysql_num_rows($result)<=0)
   {
	  echo"很抱歉,查無此資料!";
	  header("Refresh:2;url=updataitem.php");
   }
   else
   {
?>  
     <table border="1" align="center" width="85%" height="55%" bgcolor="#Ffffff">
	   <colgroup>
       </colgroup>	
    
       <?php	
         while($row=mysql_fetch_array($result,MYSQL_BOTH))
         {
       ?>	
	       <tr  bgcolor="#ffffcc" height="40">
	         <td>　</td><td>貨品編號</td> <td>貨品圖案</td> <td>產品名稱</td> <td>貨品規格</td> 
	         <td>貨品售價</td> <td>進貨價格</td><td>此次進貨數量</td>  <td>預計安全存量</td>
	       </tr>
	       <tr>
	         <td>目前貨品資料為:</td>
	  	  
	         <td>
	           <?php echo $row["goid"]; ?>
	         </td>
			 
	         <td align="center" height="40">
	           <?php echo"<img src='images/".$row["gogra"]."'>";
	                 echo"\n". $row["gogra"];?>	  
	         </td>
	
	         <td>
	           <?php echo $row["gona"];?>
	         </td>
	
	         <td>
	           <?php echo $row["gosze"]."g/包";?>
	         </td>
	
	         <td>
	           <?php echo "\$NT.".$row["gopri"]."/包";?>
	         </td>
	
	         <td>
	           <?php echo "\$NT.".$row["goinpa"]."/包";?>
	         </td>
	
	         <td>
	           <?php echo"\$NT.".$row["goye"]."/包";?>
	         </td>
	
	         <td>
	           <?php echo"\$NT.".$row["gosa"]."/包";?>
	         </td>
	       </tr>
	

	       <tr height="80">
	         <td>請輸入修改的資料:</td>
	  
	         <td>
	           <?php echo $row["goid"]; ?>
	         </td>
	  
	         <td>
	           <?php echo "<input type='file' name='newgogra' id='newgogra' size='15'>
	                      <p><font color='blue'>(若不修改圖片此項可不填寫)</font></p>";
	                 echo"<input type='hidden' name='orgogra' value='".$row["gogra"]."'>";?>	  
	         </td>

	         <td>
	           <?php echo "<input type='text' name='gona' id='gona' value=".$row["gona"].">";?>
	         </td>
	
	         <td>
	           <?php echo "<input type='text' name='gosze' id='gosze' size='6' value=".$row["gosze"].">g/包";?>
	         </td>
	
	         <td>
	           <?php echo "\$NT.<input type='text' name='gopri' id='gopri' size='6' value=".$row["gopri"].">/包";?>
	         </td>
	
	         <td>
	           <?php echo "\$NT.<input type='text' name='goinpa' id='goinpa' size='6' value=".$row["goinpa"].">/包";?>
	         </td>
	
	         <td>
	           <?php echo "\$NT.<input type='text' name='goye' id='goye' size='6' value=".$row["goye"].">/包";?>
	         </td>
	
	         <td>
	           <?php echo "\$NT.<input type='text' name='gosa' id='gosa' size='6' value=".$row["gosa"].">/包";?>
	         </td>
	       </tr>

	   <?php
	     }
	   ?>
	
     <table>
	 
	  
      <br>	
       <input type="submit" name="subupda" id="subupda" value="確定修改">  
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
		  
   }//else   
}//if(isset)
else
{
	echo"沒有接收到您的資料!";
	header("Refresh:1;url=updataitem.php");
}

  ?>


</body>
</html>