<?php
include "koneksi.php";
$sql=mysqli_query($koneksi,"select * from gambar order by id asc");
//$gambar=mysqli_fetch_array($sql);
//echo "gambar=$gambar[3]";
?>
		<link rel="stylesheet" href="demo.css" type="text/css"/>
		
		<script src="src/fastclick.js"></script>
		<script src="jquery.js"></script>
		<script src="src/jquery.easyfader.js"></script>
		<script src="src/jquery.easyfader.slide.js"></script>
		<script src="src/jquery.easyfader.carousel.js"></script>
		<script src="src/jquery.easyfader.swipe.js"></script>
		<script>
			$(function(){
				FastClick.attach(document.body);
				
				$('#Carousel').easyFader({
					effect: 'carousel',
					effectDur: 10
				});
				$('#Fader').easyFader({
					autoCycle: true,
					
				});
				$('#Slider').easyFader({
					effect: 'slide',
					autoCycle: true
				});
			});
		</script>
	</head>
	<body>
	
		<div id="Fader" class="fader">
			<div class="wrapper">
				<?php while($gambar=mysqli_fetch_array($sql)){
					
					
					?>
                
                <img class="slide" src="banner/<?=$gambar[2];?>"/>
				<?php } ?>
            </div>
		   
		</div>
	</body>
</html>