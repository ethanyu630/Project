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
  </script>

</head>
<body background="images/back1.jpg" width='100%' height='100%'>
<!--商品修改介面單筆-->
  <div class="tit2"><h1 align="center">商品修改介面</h1></div>
  <div class="bgdiv">
  <h4 align="center">單品項</h4> 
  
<?php
//預留接收其他頁面的資料
  //echo"管理員您好!";
 
if(isset($_POST["subupda"]))
{	 
  //接收傳來的資料
   $upid=$_POST["upid"];
   $orgogra=$_POST["orgogra"];//接收舊圖片資料 
   $gona=$_POST["gona"];
   $gosze=$_POST["gosze"];
   $gopri=$_POST["gopri"];
   $goinpa=$_POST["goinpa"];
   $goye=$_POST["goye"];
   $gosa=$_POST["gosa"];
  
  //接收新圖片資料 
   $fname=$_FILES["newgogra"]["name"];
   $tmpname=$_FILES["newgogra"]["tmp_name"];
   $fsize=$_FILES["newgogra"]["size"];
   $ftype=$_FILES["newgogra"]["type"];
   
   //開啟資料庫
   $link=mysql_connect("localhost","admin","123456");     
   $db_selected=mysql_select_db("xxdb",$link);
   mysql_query("SET NAMES UTF8");
   $sql= "SELECT * FROM salegood WHERE goid='$upid'";
   $result = mysql_query($sql, $link);
   
   //將原始的舊資料輸出
   while($row=mysql_fetch_array($result,MYSQL_BOTH))
   { 
		$row["goid"];
		$row["gogra"];
		$row["gona"];
		$row["gosze"];
		$row["gopri"];
		$row["goinpa"];
		$row["goye"];
		$row["gosa"];
   }	
 
  //寫入資料前先判斷圖片size是否為0,若為0用舊資料updata,若不為0用新資料updata) 
     if($fsize==0)//沒有上傳圖片size=0
	 {
		 //判斷資料格式
         //updata資料
		 $sql="UPDATE salegood SET gona='$gona',gosze='$gosze',gogra='$orgogra',gopri='$gopri',goye='$goye',gosa='$gosa',goinpa='$goinpa' WHERE goid='$upid'";
		 $result=mysql_query($sql,$link);

		 //印出修改成功的訊息
		 echo"<font color='blue'>編號".$upid."的資料修改成功!</font>";	
	     header("Refresh:2;url=updataitem.php");
		 
		 //印出修改後的商品資料
		 
		 //釋出資料
         mysql_free_result($result);
         mysql_close($link);
 		 		 
	 }
	 else//有上傳圖片size<>0
	 {
		 //判斷資料格式
		 
		 //取得檔案的附檔名並重新命名
         $path_parts=pathinfo($fname);
		 $path_parts['extension'];
		 $newname=$upid.".".$path_parts['extension'];
		 
		 if(file_exists('images/'.$gogra))
	     {
		    //將上傳的圖片移到資料夾中(直接updata同檔名的圖片)
		    $move=move_uploaded_file($tmpname,"images/".$newname);
		 }
		 else
		 {
		    unlink('images/'.$orgogra);//刪除商品圖案(若副檔名不同時直接刪掉)
		 }	 
		 
         //updata資料
		 $sql="UPDATE salegood SET gona='$gona',gosze='$gosze',gogra='$newname',gopri='$gopri',goye='$goye',gosa='$gosa',goinpa='$goinpa' WHERE goid='$upid'";
		 $result=mysql_query($sql,$link);
		 
         //印出修改成功的訊息
		 echo"<font color='blue'>編號".$upid."的資料修改成功!</font>";	
	     header("Refresh:2;url=updataitem.php");
		 
		 //印出修改後的商品資料
		 
		 //釋出資料
         mysql_free_result($result);
         mysql_close($link);
		 
	 }


  
  

}//if(isset)
else
{
	echo"沒有接收到您的資料!";
	header("Refresh:1;url=updataitem.php");
}


?>
  </div>
</body>
</html>  

