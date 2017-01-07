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
		padding:3%,5%,5%,1%;
		margin:2%,3%,2%,3%;
		background-color:"#F5F5F5";
		text-align:center;
		position:relative;
	}
  </style>
  
  <script language="JAVASCRIPT">
    function check_data(){
		if(document.form1.gogra.value.length==0)
		 {
			 //判斷"貨品圖案"是否為空值
			 alert("請上傳貨品圖案!")
			 return false;
		 }
		else
		{	
	        if(document.form1.gogra.value.length>30)
		    {
			   //判斷"貨品圖案"名稱是否過長
			   alert("圖案名稱過長!")
			   return false;
		    }
			//取得圖案輸入值驗證格式
			//以表單的id取得元素
			var gogra_element=document.getElementById('gogra');
			//取出id元素內的值
			var gogra=gogra_element.value;
			//開始正規化判斷
			re=/.jpg$|.png$|.jepg$|.JPG$|.PNG$|.JEPG$/;
			if(!re.test(gogra))
			{
				alert("圖案格式不對!")
			    return false;
			}

		    if(document.form1.goid.value.length==0)
		    {
				//判斷"貨品編號"是否為空值
			    alert("貨品編號不可以空白喔!")
			    return false;
		    }
			else
			{	
		       //取得貨品編號輸入值驗證格式
			   //以表單的id取得元素
			   var goid_element=document.getElementById('goid');
			   //取出id元素內的值
			   var goid=goid_element.value;
			   //開始正規化判斷
			   re=/^[A-Z]{2}\d{2}[X-Y]{2}$/;
			   if(!re.test(goid))
			   {
				   alert('貨品編號格式不對');
				   return false;			   
			   }
			   
		       if(document.form1.gona.value.length==0)
		       {
				     //判斷"產品名稱"是否為空值
			         alert("產品名稱不可以空白喔!")
			         return false;
		       }
			   else
			   {
		          if(document.form1.gosze.value.length==0)
		          {
					 //判斷"貨品規格"是否為空值
			         alert("貨品規格不可以空白喔!")
			         return false;
		          }
				  else
				  {
					  //正規化判斷貨品規格
					  var gosze_element=document.getElementById('gosze');
			          var gosze=gosze_element.value;
			          re=/^[1-9]{1}\d{0,8}$/;
			          if(!re.test(gosze))
			          {
				         alert('貨品規格格式不對');
				         return false;			   
			          }
						
		              if(document.form1.gopri.value.length==0)
		              {
						 //判斷"貨品售價"是否為空值
			             alert("貨品售價不可以空白喔!")
			             return false;
		              }
					  else
					  {
						  //正規化判斷貨品售價
					      var gopri_element=document.getElementById('gopri');
			              var gopri=gopri_element.value;
			              re=/^[1-9]{1}\d{0,8}$/;
			              if(!re.test(gopri))
			              {
				             alert('貨品售價格式不對');
				             return false;			   
			              }
						  
		                  if(document.form1.goinpa.value.length==0)
		                  {
							  //判斷"進貨價格"是否為空值
			                  alert("請填寫進貨價格!")
			                  return false;
		                  }
						  else
						  {
							  //正規化判斷進貨價格
					          var goinpa_element=document.getElementById('goinpa');
			                  var goinpa=goinpa_element.value;
			                  re=/^[1-9]{1}\d{0,8}$/;
			                  if(!re.test(goinpa))
			                  {
				                 alert('進貨價格格式不對');
				                 return false;			   
			                  }
							  
		                      if(document.form1.goye.value.length==0)
		                      {
								  //判斷"進貨數量"是否為空值
			                      alert("請填寫進貨數量!")
			                      return false;
		                      }
							  else
							  {
								  //正規化判斷進貨數量
					              var goye_element=document.getElementById('goye');
			                      var goye=goye_element.value;
			                      re=/^[1-9]{1}\d{0,8}$/;
			                      if(!re.test(goye))
			                      {
				                     alert('進貨數量格式不對');
				                     return false;			   
			                      }
							
		                          if(document.form1.gosa.value.length==0)
		                          {
									 //判斷"安全存量"是否為空值
			                         alert("請填寫預計安全存量!")
			                         return false;
		                          }
								  else
								  {
									 //正規化判斷安全存量
					                 var gosa_element=document.getElementById('gosa');
			                         var gosa=gosa_element.value;
			                         re=/^[1-9]{1}\d{0,8}$/;
			                         if(!re.test(gosa))
			                         {
				                        alert('安全存量格式不對');
				                        return false;			   
			                         }
								  }
							  }
						  }
					  }
				  }
			   }
			}
		}
	}

  </script>
  
</head>
<body background="images/back1.jpg" width='100%' height='100%'>

<?php
  //開啟資料庫
  $link=mysql_connect("localhost","root","123456");     
  $db_selected=mysql_select_db("xxdb",$link);
  mysql_query("SET NAMES UTF8");
  $sql= "SELECT * FROM salegood";
  $result = mysql_query($sql, $link);
  
  $tot=mysql_num_rows($result);
 
  //管理員登入echo"管理員您好!";
?>


<!--新商品上傳介面-->
  <div class="tit2"><h1 align="center">新商品登入</h1></div>
  <div class="bgdiv">
  <h4 align="center">單品項<br><p>請輸入新商品相關資訊</p></h4>  
  <h5 align="right">目前共有<font color="blue"> <?php echo $tot; ?></font>件商品</h5> 
  
  <form name="form1" action="newitemupload2.php" method="POST" Enctype="multipart/form-data" onsubmit="return check_data(this);">

  <!--印出欲輸入的新商品資料-->
  <table border="1" align="center" width="40%" height="75%" bgcolor="#Ffffff">
    
	<colgroup span="1" width="30%" bgcolor='#ffddaa'>
    </colgroup>	
	
	<colgroup span="1">
    </colgroup>

	<tr>
	  <td>貨品圖案:</td>
	  <td>
	   <input type="file" name="gogra">
	   <br><font color="#4169E1">(檔案大小請勿超過1,000,000KB)<br>
	                             (最佳格式為:jpg,png,jepg,JPG,PNG,JEPG)</font>
	  </td>
	</tr>
	
    <tr>
	  <td>貨品編號:</td>
	  <td>
	   <input type="text" name="goid" id="goid"> 
	   <br><font color="#4169E1">[ex:AA00XX
	       <br>廠商編號(AA~ZZ)+產品編號(00~99)+貨品編號(XX~YY為不同規格編號)]</font>		   
	  </td>
	</tr>
	
	<tr>
	  <td>產品名稱:</td>
	  <td><input type="text" name="gona" id="gona" size="30"></td>
	</tr>		
	
	<tr>
	  <td>貨品規格:</td>
	  <td><input type="text" name="gosze" id="gosze">g/包</td>
	</tr>
	
	<tr>
	  <td>貨品售價:</td>
	  <td>$NT.<input type="text" name="gopri" id="gopri">包</td>
	</tr>
	
	<tr>
	  <td>進貨價格:</td>
	  <td>$NT.<input type="text" name="goinpa" id="goinpa">包</td>
	</tr>
	
	<tr>
	  <td>此次進貨數量:</td>
	  <td><input type="text" name="goye" id="goye">包</td>
	</tr>
	
	<tr>
	  <td>預計安全存量:</td>
	  <td><input type="text" name="gosa" id="gosa">包</td>
	</tr>
		
  <table>
  
  <br>
  <input type="submit" name="sub" value="上傳新商品">
  <input type="reset" name="reset" value="重寫"> </form> 
  <br>
  <form name="form2" action="itemmodify.php" method="POST">
  <input type="submit" name="backitem" value="回商品管理頁面">
  </form>
  
  </div>
  

</body>
</html>