<?php

//設定最新消息的顯示筆數
		    $records_per_page=4;
			  if(isset($_GET["page"]))
			  {
				  $page=$_GET["page"];
			  }
			  else
			  {
				  $page=1;
			  }
			  
	    //開啟資料庫
		    $link=mysql_connect("localhost","root","");     
            $db_selected=mysql_select_db("company",$link);
            mysql_query("SET NAMES UTF8");
            $sql= "SELECT * FROM salemess ORDER BY 編號 DESC";
            $result = mysql_query($sql, $link);
			
			
		//取得最新消息資料
		    $total_fields=mysql_num_fields($result);//取得欄位數
			$total_records=mysql_num_rows($result);//取得紀錄數
			$total_pages=ceil($total_records/$records_per_page);//計算總頁數
			$started_redcord=$records_per_page*($page-1);//計算第一筆紀錄的序號
			mysql_data_seek($result,$started_redcord);//紀錄指標移動到第一筆紀錄的序號	

?>
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Coffee Break Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!--start-smoth-scrolling-->
</head>
<body>
	<!--header-top-starts-->
	<div class="header-top">
		<div class="container">
			<div class="head-main">
				<a href="index.html"><img src="images/logo-1.png" alt="" /></a>
			</div>
		</div>
	</div>
	<!--header-top-end-->
	<!--start-header-->
	<div class="header">
		<div class="container">
			<div class="head">
			<div class="navigation">
				 <span class="menu"></span> 
					<ul class="navig">
						<li><a href="index.php"  class="active">首頁</a></li>
						<li><a href="about.html"><strong id="docs-internal-guid-086235d5-041e-e1a1-b995-6b19ecf71118">公司介紹</strong></a></li>
						<li><a href="gallery.html"><strong id="docs-internal-guid-086235d5-041f-21f0-a0b3-0d76e4b3683e">豆系列</strong></a></li>
                        <li><a href="typo.html"><strong id="docs-internal-guid-086235d5-041f-76e1-8f5c-7886d8047d36">沖泡機具</strong></a></li>
                        <li><a href="single1.php"><strong id="docs-internal-guid-086235d5-041f-76e1-8f5c-7886d8047d36">會員登入</strong></a></li>
					</ul>
			</div>
			<div class="header-right">
				<div class="search-bar">
					<input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value="">
				</div>
				<ul>
					<li><a href="#"><span class="fb"> </span></a></li>
					<li><a href="#"><span class="twit"> </span></a></li>
					<li><a href="#"><span class="pin"> </span></a></li>
					<li><a href="#"><span class="rss"> </span></a></li>
					<li><a href="#"><span class="drbl"> </span></a></li>
				</ul>
			</div>
				<div class="clearfix"></div>
			</div>
			</div>
		</div>	
	<!-- script-for-menu -->
	<!-- script-for-menu -->
		<script>
			$("span.menu").click(function(){
				$(" ul.navig").slideToggle("slow" , function(){
				});
			});
		</script>
	<!-- script-for-menu -->
	<!--banner-starts-->
	<div class="banner">
		<div class="container">
			<div class="banner-top">
				<div class="banner-text">
					<h2>秋冬飲品特價中</h2>
					<h1>繽紛聖誕咖啡豆<br>來自巴西的贈禮</h1>
					<div class="banner-btn">
						<a href="gallery.html">詳細優惠說明</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--banner-end-->
    <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >网页模板</a></div>
	<!--about-starts-->
	<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">
					<div class="about-one">
						<p>每日必備飲品</p>
						<h3>每月精選咖啡</h3>
					</div>
					<div class="about-two">
						<a href="single.html"><img src="images/c-1.jpg" alt="" /></a>
						<p></p>
						<p>不管是落日餘暉，或是夜暮低垂，我總希望，能乘風啜飲幾口香 濃咖啡。那種感覺，不知多麼溫暖... 講起咖啡，大家一定對市面上琳瑯滿目的咖啡種類給搞的玻璃霧 颯颯的。伯朗咖啡先出個啥藍山、曼特寧。而後又出個卡布奇諾 、拿鐵，到底什麼是什麼呢？ 這裡就貢獻一點館主的心得。其實，咖啡的世界主要分成兩種， 一種是像藍山、曼特寧這種單品咖啡，這多半是以地域做劃分的 。另一種則是以espresso為基礎所做出來的義式咖啡。 一、單品咖啡單品咖啡： 　　這種咖啡，通常是由單一產區所生產的咖啡豆為名，</p>
						<p>藍山咖啡 　　</p>
						<p>他出產於位於牙買加的藍山山脈。它的咖啡因含量甚低，不到其他產地咖啡的一半，「藍山咖啡」獨特的風味與牙買加藍山地區得天獨厚的地理位置和氣候條件有關。牙買加藍山地區，有肥沃的新火山土壤，空氣清新，幾乎沒有污染．這個地區終年多雨，晝夜溫差大。又因為這邊的特 殊地理環境，每日午後，雲霧籠罩整個藍山山頂，不僅為咖 啡樹遮住陽光，還帶來豐沛的水汽，就是這樣的地利基礎，藍山咖啡的口感與香味獨步全球各地所產製的咖啡。不是整 個藍山地區所生產的咖啡都可以稱為藍山咖啡，只有在海拔 　　1800公尺以上的藍山地區所種植的咖啡才能叫「藍山咖啡」，海拔較低的藍山山區所產的咖啡豆，因為品質差異只能命名為〝牙買加高山咖啡〞而不能稱為「牙買加 藍山咖啡」．因為藍山地區的氣候、土壤、空氣合宜，拿一樣的藍山品種的種苗移植到氣候類似的夏威夷、肯亞、巴不亞新幾內亞等地方，生產出來的品質都無法比擬真正的「藍山咖啡」。</p>
						<p>曼特寧咖啡 　　</p>
						<p>除了「牙買加 藍山咖啡」，印尼「蘇門達臘」島所生產的 「曼特寧」咖啡也十分受到台灣消費者喜愛，根據考察，「曼特寧」實際上是蘇門達臘島當地一個種族的名字。印尼 蘇門達臘地區自十八世紀開始栽植咖啡，但一直沒有受到外界的注意。到50年代，派駐當地的日本士兵偶然間喝到當地 「蘇門達臘」出產的咖啡，向咖啡小販詢問咖啡名稱，小販誤以為日本士兵詢問「你是什麼族人」故回答「曼特寧」。這個典故讓「蘇門達臘」咖啡有了更多人稱呼的「曼特寧」名稱．日本商社是最早經營「曼特寧」咖啡的大客戶．日本商人不但收購「蘇門達臘」島所生產的「曼特寧」咖啡，還對蘇門達臘咖啡進行精緻化處理程序，以日本是細膩的生產管理程序所培養出來的「蘇門達臘曼特寧」有了新的名稱－「黃金曼特寧」日本人在托巴湖區契作的「黃金曼特寧」，為確保產品品質 ，「黃金曼特寧」以純手工採收，再以日式細緻的處理程序，改進「蘇門達臘曼特寧」的品質，讓「蘇門達臘曼特寧」除了一般曼特寧咖啡應有的濃郁粗曠野香之外，還多了一份日式優雅的氣息。頂級黃金曼特寧咖啡經專家團隊不斷的調試、努力下，成就出口感更圓潤、更香醇、更厚實的極品「蘇門達臘黃金曼特寧」。曼特寧屬於深度烘焙咖啡豆，味道濃郁，厚實香醇，適宜的甘苦味，幾乎不帶酸味，是品嚐重口味咖啡的最佳選擇。</p>
						
						<ul>
							<li><p>Share : </p></li>
							<li><a href="#"><span class="fb"> </span></a></li>
							<li><a href="#"><span class="twit"> </span></a></li>
							<li><a href="#"><span class="pin"> </span></a></li>
							<li><a href="#"><span class="rss"> </span></a></li>
							<li><a href="#"><span class="drbl"> </span></a></li>
						</ul>
					</div>	
					<div class="about-tre">
						<div class="a-1">
							<div class="col-md-6 abt-left">
								<a href="single.html"><img src="images/c-3.jpg" alt="" /></a>
								<h6>尋找最高品質</h6>
								<h3><a href="single.html">Tasty Coffee</a></h3>
								<p>「黃金曼特寧」以純手工採收，再以日式細緻的處理程序，改進「蘇門達臘曼特寧」的品質，讓「蘇門達臘曼特寧」除了一般曼特寧咖啡應有的濃郁粗曠野香之外，還多了一份日式優雅的氣息。頂級黃金曼特寧咖啡經專家團隊不斷的調試、努力下，成就出口感更圓潤、更香醇、更厚實的極品「蘇門達臘黃金曼特寧」。</p>
								<label>May 29, 2015</label>
							</div>
							<div class="col-md-6 abt-left">
								<a href="single.html"><img src="images/c-4.jpg" alt="" /></a>
								<h6>尋找最醇香氣</h6>
								<h3><a href="single.html">Tasty Coffee</a></h3>
								<p>「藍山咖啡」獨特的風味與牙買加藍山地區得天獨厚的地理位置和氣候條件有關。牙買加藍山地區，有肥沃的新火山土壤，空氣清新，幾乎沒有污染．這個地區終年多雨，晝夜溫差大。又因為這邊的特 殊地理環境，每日午後，雲霧籠罩整個藍山山頂，不僅為咖 啡樹遮住陽光，還帶來豐沛的水汽，就是這樣的地利基礎，藍山咖啡的口感與香味獨步全球各地所產製的咖啡。</p>
								<label>May 29, 2015</label>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="a-1">
							<div class="col-md-6 abt-left">
								<a href="single.html"><img src="images/c-5.jpg" alt="" /></a>
								<h6>尋找最高精緻</h6>
								<h3><a href="single.html">Tasty Coffee</a></h3>
								<p>「曼特寧」實際上是蘇門達臘島當地一個種族的名字。印尼 蘇門達臘地區自十八世紀開始栽植咖啡，但一直沒有受到外界的注意。到50年代，派駐當地的日本士兵偶然間喝到當地 「蘇門達臘」出產的咖啡，向咖啡小販詢問咖啡名稱，小販誤以為日本士兵詢問「你是什麼族人」故回答「曼特寧」。</p>
								<label>May 29, 2015</label>
							</div>
							<div class="col-md-6 abt-left">
								<a href="single.html"><img src="images/c-6.jpg" alt="" /></a>
								<h6>尋找頂級風味</h6>
								<h3><a href="single.html">Tasty Coffee</a></h3>
								<p>「蘇門達臘曼特寧」除了一般曼特寧咖啡應有的濃郁粗曠野香之外，還多了一份日式優雅的氣息。頂級黃金曼特寧咖啡經專家團隊不斷的調試、努力下，成就出口感更圓潤、更香醇、更厚實的極品「蘇門達臘黃金曼特寧」。曼特寧屬於深度烘焙咖啡豆，味道濃郁，厚實香醇，適宜的甘苦味，幾乎不帶酸味，是品嚐重口味咖啡的最佳選擇。</p>
								<label>May 29, 2015</label>
							</div>
							<div class="clearfix"></div>
						</div>
						
					</div>	
				</div>
				<div class="col-md-4 about-right heading">
					<div class="abt-1">
						<h3>公司介紹</h3>
						<div class="abt-one">
							<img src="images/c-2.jpg" alt="" />
							<P>山豬星巴巴是全台首創定期宅配新鮮48小時現烘咖啡豆服務</P>
							<div class="a-btn">
								<a href="about.html">更多介紹</a>
							</div>
						</div>
					</div>
					<div class="abt-2">
						<h3>精選相關連結</h3>
							<div class="might-grid">
								<div class="grid-might">
									<a href="single.html"><img src="images/c-12.jpg" class="img-responsive" alt=""> </a>
								</div>
								<div class="might-top">
									<h4><a href="http://dreamyeh.pixnet.net/blog/post/24490754-%E5%92%96%E5%95%A1%E7%9A%84%E7%A8%AE%E9%A1%9E%E4%BB%8B%E7%B4%B9(%E8%97%8D%E5%B1%B1%E3%80%81%E6%9B%BC%E7%89%B9%E5%AF%A7%E3%80%81%E5%B7%B4%E8%A5%BF%E3%80%81%E5%8D%A1%E5%B8%83">咖啡的種類介紹</a></h4>
									<p>大家一定對市面上琳瑯滿目的咖啡種類給搞的霧颯颯的。伯朗咖啡先出個啥藍山、曼特寧。而後又出個卡布奇諾
、拿鐵，到底什麼是什麼呢？
這裡就貢獻一點館主的心得。</p> 
								</div>
								<div class="clearfix"></div>
							</div>	
							<div class="might-grid">
								<div class="grid-might">
									<a href="single.html"><img src="images/c-10.jpg" class="img-responsive" alt=""> </a>
								</div>
								<div class="might-top">
									<h4><a href="http://c152.supergood.com.tw/">山豬園/ 果子狸</a></h4>
									<p>山豬園/ 果子狸咖啡( 麝香咖啡) 山豬園小酒坊( ... (極限量)黃金果子狸咖啡(豆)120g##(傳統天然製程) </p> 
								</div>
								<div class="clearfix"></div>
							</div>
											
					</div>
					<div class="abt-2">
						<h3>最新活動</h3>
						<ul>
							
							
							<?php
							//印出資料內容
							   $j=1;
						         while($row=mysql_fetch_row($result) and $j<=$records_per_page)
						         {
						           echo"<li><a href='#'>";
							          for($i=1;$i<$total_fields;$i++)
							          {
								         echo $row[$i].",";
							          }
							           $j++;
							           echo"</a></li>";
						         }
							 //製作導覽頁頁碼
							    echo"<br><br><center>";
							     if($page>1)
							        echo"<a href='index.php?page=".($page - 1)."'>上一頁</a>";
						 
						         for($i=1;$i<=$total_pages;$i++)
						         {
							         if($i==$page)
							           echo"$i";
							
							         else
							           echo"<a href='index.php?page=$i'>$i</a>";
							
						         }

						         if($page < $total_pages)
							     echo"<a href='index.php?page=".($page + 1)."'>下一頁</a>";
						 
							
							    echo"</center>";
							
							
							?>
							
							
						</ul>	
					</div>
					<div class="abt-2">
						<h3>訂閱電子報</h3>
						<div class="news">
							<form>
								<input type="text" value="Email" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Email';}" />
								<input type="submit" value="Subscribe">
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>			
			</div>		
		</div>
	</div>
	<!--about-end-->
	<!--slide-starts-->
	<div class="slide">
		<div class="container">
			<div class="fle-xsel">
			<ul id="flexiselDemo3">
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/s-1.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/s-2.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>			
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/s-3.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>		
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/s-4.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>	
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/s-5.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>	
				<li>
					<a href="#">
						<div class="banner-1">
							<img src="images/s-6.jpg" class="img-responsive" alt="">
						</div>
					</a>
				</li>				
			</ul>
							
							 <script type="text/javascript">
								$(window).load(function() {
									
									$("#flexiselDemo3").flexisel({
										visibleItems: 5,
										animationSpeed: 1000,
										autoPlay: true,
										autoPlaySpeed: 3000,    		
										pauseOnHover: true,
										enableResponsiveBreakpoints: true,
										responsiveBreakpoints: { 
											portrait: { 
												changePoint:480,
												visibleItems: 2
											}, 
											landscape: { 
												changePoint:640,
												visibleItems: 3
											},
											tablet: { 
												changePoint:768,
												visibleItems: 3
											}
										}
									});
									
								});
								</script>
								<script type="text/javascript" src="js/jquery.flexisel.js"></script>
					<div class="clearfix"> </div>
			</div>
		</div>
	</div>	
	<!--slide-end-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-text">
				<p>Copyright &copy; 2015.Company name All rights reserved.More Templates山豬星芭芭<a href="http://www.cssmoban.com/" target="_blank" title="模板之家"></a> -</p>
			</div>
		</div>
	</div>
	<!--footer-end-->
</body>
</html>