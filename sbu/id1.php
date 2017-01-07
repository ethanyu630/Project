<html>
<body><center>
<h1>您輸入的身分證號為:</h1>
<br><br>

<?php
$id=$_POST["id"];
$arr_id=str_split($id,1);
    
     echo "您的身分證號為:".$id."<br><br>";
  if(!preg_match("/^[A-Za-z]+$/", $arr_id[0])){
	  echo "您的第一位數不是英文";
    }elseif(!preg_match("/^[0-1]+$/", $arr_id[1])){
	  echo "您的第二位數不是0或1";
    }elseif(strlen($id)<>10){
      echo "您身分證是不滿10位數";
    }else{
		for($a=2;$a<=9;$a++)
	       {		   
		   if(!preg_match("/^[0-9]+$/", $arr_id[$a])){   		         
			 	 echo "抱歉第".($a+=1)."格式不對";
                                break;				 
		   }else{			   
			   if($a==9){
				    echo "格式正確!";
			   }			    
		   }
	   }	   
   }

  

       
     


?>
<br><br><br><br><br>
<a href="id.php">重新輸入</a> 
</center></body>
</html>