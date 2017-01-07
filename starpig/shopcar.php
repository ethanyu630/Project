<?php
     session_start(); 
	 
	//接收上一頁的購買種類資料並存進陣列   
	 if(isset($_POST['car']))
	 {
		 $car=$_POST['car'];
	 }
	 print_r($car);
    //接收上一頁的購買數量並存進陣列
	 if(isset($_POST['seleccar']))
	 {
		 $seleccar=$_POST['seleccar'];
	 }
     print_r($_POST['seleccar']);
	 

 ?>
<html>
 <head>
 </head>
 <body>
    <?php
  //購物車介面//////////////////////////////////////////

		echo"<form name='form1' method='post' action='shopcar.php'>";			  
	    //開啟資料庫
		    $link=mysql_connect("localhost","root","123456");     
            $db_selected=mysql_select_db("xxdb",$link);
            mysql_query("SET NAMES UTF8");

            
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
			     <td colspan=5><br><br>購物車:<br>
				      <table border='1' align='center' width='95%' height='65%' bgcolor='#e6e6fa'>
					   <tr align='center'><td>";
       					echo"<center><h5>您購買了以下的產品:</h5></center>";
						
                    //印出購買的物品種類
                        for($a=0;$a<count($car);$a++)
                        {							
                            $sql= "SELECT * FROM salegood WHERE goid='$car[$a]'";
						    $result = mysql_query($sql, $link);
							
                             while ($row = mysql_fetch_array($result, MYSQL_BOTH))
			                 {		
                                 //先假設客戶有將產品加入購物車,但沒有選數量						 
									if($seleccar[$a]==0)
                                    {
										if(count($car)==count($seleccar))
										{//有選產品也有選數量(正常採購)
											echo"<table width='85%' align='center'><tr align='center'><td>貨品編號</td><td>產品名稱</td><td>貨品規格</td><td>貨品價格</td><td>數量</td><td>金額</td></tr>";
											echo "<tr align='center'>";
                                            echo"<td>".$row["goid"]."</td>";
							                echo"<td>".$row["gona"]."</td>";
							                echo"<td>".$row["gosze"]."</td>";
							                echo"<td>".$row["gopri"]."</td>";
											
											echo"<td><input type='text' name='' value=".$seleccar[$a]." size='2'></td>";
										    echo"<td>".$row["gopri"]*$seleccar[$a]."</td>";
										}		
										else
										{//有選產品但沒有選數量(數量預設為0)
											echo"<table width='85%' align='center'><tr align='center'><td>貨品編號</td><td>產品名稱</td><td>貨品規格</td><td>貨品價格</td><td>數量</td><td>金額</td></tr>";
											echo "<tr align='center'>";
                                            echo"<td>".$row["goid"]."</td>";
							                echo"<td>".$row["gona"]."</td>";
							                echo"<td>".$row["gosze"]."</td>";
							                echo"<td>".$row["gopri"]."</td>";
																				
											$b=$a+1;
										    echo"<td><input type='text' name='' value=".$seleccar[$b]." size='2'></td>";
										    echo"<td>".$row["gopri"]*$seleccar[$b]."</td>";
										}									    
									}
									//如果客戶有選數量但沒選產品
                                    else
                                    {   
							            						

											echo"<table width='85%' align='center'><tr align='center'><td>貨品編號</td><td>產品名稱</td><td>貨品規格</td><td>貨品價格</td><td>數量</td><td>金額</td></tr>";
											echo "<tr align='center'>";
                                            echo"<td>".$row["goid"]."</td>";
							                echo"<td>".$row["gona"]."</td>";
							                echo"<td>".$row["gosze"]."</td>";
							                echo"<td>".$row["gopri"]."</td>";
											
											echo"<td><input type='text' name='' value=".$seleccar[$a]." size='2'></td>";
										    echo"<td>".$row["gopri"]*$seleccar[$a]."</td>";										

									}																	        
							        													
				                    echo "</tr>";				
			                 }
						}

						echo"</table>";

					  echo"</tr></table>";
             echo"<center><br><br><input type='submit' name='sendcheck' value='結帳'>";						 
             echo"</center>";			
			 echo"</td></tr>
			  </table>";
		 echo"</form>";   
	
	

	
	    if(@$_POST["sendcheck"])
		{
			Session_unset($_SESSION['car']);
			Session_unset($_SESSION['seleccar']);
			ob_end_flush();
			header("location:shopcar.php");
		}
	
	//釋出資料
       mysql_free_result($result);
       mysql_close($link);
	
		
	?>
 </body>
</html>