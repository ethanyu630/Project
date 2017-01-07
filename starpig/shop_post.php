<?php
     session_start(); 
	 
//加進購物車

	 //若session內沒有定義購物車的變量,則設定為空陣列


	 
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
	 


   
   
   
//刪除購物車

    //header("location:shopcar.php");

?>