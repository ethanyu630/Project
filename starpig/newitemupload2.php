<html>
<head>
  <style type="text/css">
    .tit2{
		 padding-top:1%;
		 padding-bottom:1%;
		 margin:2%,3%,2%,3%;
		 text-valign:center;
		 max-height:20%;
		 background-color:#ccddff;
		 position:relative; 
	 }
	.bgdiv{
		
		padding:1%,10%,4%,10%;
		margin:1%,3%,2%,3%;
		background-color:"#F5F5F5";
		text-align:center;
		position:relative;
	}
	img{
		width:250px;
		height:auto;
		align:right;
	}
	.ba01{		
		float:top;
		border-style:solid;
		border-width:1pt;
		margin:10%,10%,10%,10%;
		padding:10%,10%,10%,10%;
	}
  </style>

</head>
<body background="images/back1.jpg" width='100%' height='100%'>
  <div class="tit2"><h1 align="center">新商品登入</h1></div>
  <div class="bgdiv">
    <h4 align="center">單品項<br>上傳核對</h4> 

   <?php
if(isset($_POST["sub"]))
{   
     //接收newitemupload.php的文字資料
       $goid=$_POST["goid"];
       $gona=$_POST["gona"];
       $gosze=$_POST["gosze"];
       $gopri=$_POST["gopri"];
	   $goinpa=$_POST["goinpa"];
       $goye=$_POST["goye"];
       $gosa=$_POST["gosa"];
	   
	 //接收newitemupload.php的圖片資料  
	   $fname=$_FILES["gogra"]["name"];
	   $tmpname=$_FILES["gogra"]["tmp_name"];
	   $fsize=$_FILES["gogra"]["size"];
	   $ftype=$_FILES["gogra"]["type"];	 
   
	 //之後管理員登入echo"管理員您好!";

	
	//開啟資料庫
	$link=mysql_connect("localhost","root","123456");     
    $db_selected=mysql_select_db("xxdb",$link);
    mysql_query("SET NAMES UTF8");
	$sql= "SELECT * FROM salegood WHERE goid='$goid'";
    $result = mysql_query($sql, $link);
	
	//確認是否有重複的id,避免商品重複
	if(mysql_num_rows($result)>=1)
	{
		echo"很抱歉,已經有這項產品了!";
		header("Refresh:2;url=newitemupload.php");
	}
	else
	{		
		 //限制檔案上傳的大小
	     if($fsize>1000000)
		 {
			 echo"<font color='red'>檔案大小不符!<br>不能超過1,000,000KB</font>";
			 header("Refresh:3;url=newitemupload.php");
		 }
		 //確認是否有相同的圖片存在
		 if(file_exists('images/'.$fname))
		 {
			 echo"<font color='red'>相同的圖檔已經存在了!</font>";
			 header("Refresh:3;url=newitemupload.php");
		 }
		 else
		 {			 				                 				
			//取得檔案的附檔名並重新命名
            $path_parts=pathinfo($fname);
			$path_parts['extension'];
			$newname=$goid.".".$path_parts['extension'];
			
            //將傳回來的資料寫入資料庫
			$sql="INSERT INTO salegood(goid,gona,gosze,gogra,gopri,goye,gosa,goinpa)Values('$goid','$gona','$gosze','$newname','$gopri','$goye','$gosa','$goinpa')";
            $result=mysql_query($sql,$link);

			//將上傳的圖片移到資料夾中
			$move=move_uploaded_file($tmpname,"images/".$newname);
				
	?>
	
            <center><font color='blue'><h5>您的商品已成功登入喽!</h5></font></center>
	
            <table border="1" align="center" width="40%" height="75%" bgcolor="#Ffffff">
    
	        <colgroup span="1" width="30%">
            </colgroup>	
            <colgroup span="1" align="center">
            </colgroup>		
	
	        <tr>
	          <td>貨品圖案:</td>
	          <td align="center">				
		         <div class="ba01">
		          <?php echo"<img src='images/".$newname."'><br>";?>
		         </div>
		 
		       <?php				
			     echo"檔案名稱:".$fname."<br>"; 
				 echo"圖案新名稱:".$newname."<br>";
			     echo"檔案大小:".$fsize."KB<br>";
                 echo"檔案類型:".$ftype."<br>";                 			
                 if($move)
			     {
				     echo"<font color='blue'>圖檔已成功傳入資料夾中!</font>";
			     }		  					 
		       ?> 
	          </td>
	        </tr>
	
            <tr>
	          <td>貨品編號:</td>
	          <td><?php echo $goid; ?></td>
	        </tr>
	
	        <tr>
	          <td>產品名稱:</td>
	          <td><?php echo $gona; ?></td>
	        </tr>		
	
	        <tr>
	          <td>貨品規格:</td>
	          <td><?php echo $gosze; ?>g/包</td>
	        </tr>
	
	        <tr>
	          <td>貨品售價:</td>
	          <td>$NT.<?php echo $gopri; ?>包</td>
	        </tr>
	
	        <tr>
	          <td>進貨價格:</td>
	          <td>$NT.<?php echo $goinpa; ?>包</td>
	        </tr>
	
	        <tr>
	          <td>此次進貨數量:</td>
	          <td><?php echo $goye; ?>包</td>
	        </tr>
	
	        <tr>
	          <td>預計安全存量:</td>
	          <td><?php echo $gosa; ?>包</td>
	        </tr>
		
	        <table>
 
 <?php
 
	          //釋出資料
	          @mysql_free_result($result);
	          @mysql_close($link);
     
	          echo"<br><font color='blue'>...7秒後回到新增商品頁面...</font>";	 
	          header("Refresh:7;url=newitemupload.php");	 
	
         }//else	
	}//else	 
}//if(isset)
else
{
	echo"<font color='red'>沒有接收到您所輸入的資料!</font>";
	header("Refresh:1;url=newitemupload.php");
}		 
		 		 
 ?>
    
 </div>
</body>
</html>