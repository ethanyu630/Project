<html>
<head>
  <style type="text/css">
    .tit2{
		 padding-top:10px;
		 text-valign:center;
		 height:20px;
		 background-color:#ccddff;
	 }
	.bgdiv{
		padding:20px,70px,40px,70px;
		margin:20px,30px,20px,30px;
		background-color:"#F5F5F5";
		text-align:center;
	}
  </style>
  
  <script language="JAVASCRIPT">
    function check_data(){
		if(document.form1.gogra.value.length==0)
		 {
			 alert("�ФW�ǳf�~�Ϯ�!")
			 return false;
		 }
		
		 if(document.form1.goid.value.length==0)
		 {
			 alert("�f�~�s�����i�H�ťճ�!")
			 return false;
		 }
		 if(document.form1.gona.value.length==0)
		 {
			 alert("���~�W�٤��i�H�ťճ�!")
			 return false;
		 }
		 if(document.form1.gosze.value.length==0)
		 {
			 alert("�f�~�W�椣�i�H�ťճ�!")
			 return false;
		 }
		 if(document.form1.gopri.value.length==0)
		 {
			 alert("�f�~������i�H�ťճ�!")
			 return false;
		 }
		 if(document.form1.goinpa.value.length==0)
		 {
			 alert("�ж�g�i�f����!")
			 return false;
		 }
		 if(document.form1.goye.value.length==0)
		 {
			 alert("�ж�g�i�f�ƶq!")
			 return false;
		 }
		 if(document.form1.gosa.value.length==0)
		 {
			 alert("�ж�g�w�p�w���s�q!")
			 return false;
		 }
	}

  </script>
  
</head>
<body background="images/back1.jpg" width='100%' height='100%'>

<?php
  //�w�d������L���������
  //echo"�޲z���z�n!";
?>




<!--�s�ӫ~�W�Ǥ����h��-->
  <div class="tit2"><h1 align="center">�s�ӫ~�n�J</h1></div>
  <div class="bgdiv">
  <h4 align="center">�h�~��</h4>  
  
  <form name="form1" action="newitemupload2.php" method="POST" Enctype="multipart/form-data" onsubmit="return check_data(this);">

  <!--�L�X����J���s�ӫ~���-->
<?php
  echo"<table border='1' align='center' width='40%' height='75%' bgcolor='#Ffffff'>
    
	       <colgroup span='1' width='30%'>
           </colgroup>	
	
	       <colgroup span='1'>
           </colgroup>

	      <tr>
	        <td>�f�~�Ϯ�:</td>
	        <td>
	          <input type='file' name='gogra'>
	          <br><font color='#4169E1'>(�ɮפj�p�ФŶW�L1000000KB)</font>
	        </td>
	      </tr>
	
          <tr>
	       <td>�f�~�s��:</td>
	       <td>
	         <input type='text' name='goid'> 
	         <br><font color='#4169E1'>[ex:AA00XX
	         <br>�t�ӽs��(AA~ZZ)+���~�s��(00~99)+�f�~�s��(XX�����P�W��s��)]</font>	         	   
	       </td>
	      </tr>
	
	      <tr>
	       <td>���~�W��:</td>
	       <td><input type='text' name='gona' size='30'></td>
	      </tr>		
	
	      <tr>
	       <td>�f�~�W��:</td>
	       <td><input type='text' name='gosze'>g/�]</td>
	      </tr>
	
	      <tr>
	       <td>�f�~���:</td>
	       <td>$NT.<input type='text' name='gopri'></td>
	      </tr>
	
	      <tr>
	       <td>�i�f����:</td>
	       <td>$NT.<input type='text' name='goinpa'></td>
	      </tr>
	
	      <tr>
	       <td>�����i�f�ƶq:</td>
	       <td><input type='text' name='goye'>�]</td>
	      </tr>
	
	      <tr>
	       <td>�w�p�w���s�q:</td>
	       <td><input type='text' name='gosa'>�]</td>
	     </tr>
		
      <table>";
?>  
  <br>
  <input type="submit" name="sub" value="�W�Ƿs�ӫ~">
  <input type="reset" name="reset" value="���g"> </form> 

  <input type="submit" name="backitem" value="�^�ӫ~�޲z����">
  
  </div>
  
  


</body>
</html>