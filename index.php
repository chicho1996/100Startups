<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Startup</title>
	<link rel="stylesheet" type="text/css" href="assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.form.js"></script> 
	<script src="assets/js/jquery.mask.js"></script>
</head>
<body>

<div id="wrapper">

	<div id="start">
		<div id="startButton">დაწყება</div>
	</div>

	<div class="header"></div>

	
	<div id="steps">

		<div class="stepsNum">
			<span id="current">1</span> / 10
		</div>
		
		<div class="complete">
			<span class="finished">რეგისტრაცია დასრულებულია!</span>
			<span class="wait">დაელოდეთ რეიტინგს!</span>
			<input type="button" id="home" value="მთავარი გვერდი">
		</div>
		
		<div class="step" visible>

			<label>
				<span>სტარტაპის სახელი</span>
				<input type="text">
			</label>
		</div>

		<div class="step">
			<span>როდის დაიწყეთ ფუნქციონირება</span>
			<br>
			<label> <input type="radio" name="year" value="2010" checked> 2010 </label>
			<label> <input type="radio" name="year" value="2011"> 2011 </label>
			<label> <input type="radio" name="year" value="2012"> 2012 </label>
			<label> <input type="radio" name="year" value="2013"> 2013 </label>
			<label> <input type="radio" name="year" value="2014"> 2014 </label>
			<label> <input type="radio" name="year" value="2015"> 2015 </label>
			<label> <input type="radio" name="year" value="2016"> 2016 </label>
		</div>

		<div class="step">
			<span class="titleStep">ვინ არიან დამფუძვნებლები?</span>
			<label class="foundersLBL">
				
				<div class="cont">
					<span class="three nmlbl">სახელი</span>
					<input type="text">
				</div>
				
				<div class="cont">
					<span class="three">გვარი</span>
					<input type="text">
				</div>
				
				<div class="cont">
					<span class="three">ასაკი</span>
					<input type="number">
				</div>
				
				<div class="add">+</div>
			
			</label>
		</div>

		<div class="step">
			<label>
				<span>რომელ ქალაქში მოღვაწეობთ?</span>
				<input type="text">
			</label>
		</div>

		<div class="step">
			<label>
				<span>რამდენი წევრია გუნდში?</span>
				<input type="number" class="members">
			</label>
		</div>

		<div class="step">
			<label>
				<span>რომელია თქვენი ინდუსტრია?</span>
				<input type="text">
			</label>
		</div>

		<div class="step">
			<label>
				<span>20 სიტყვით აღწერეთ თქვენი პროდუქტი</span>
				<textarea></textarea>
			</label>
		</div>

		<div class="step">
			<label>
				<form action="lib/file_upload.php" method="post" id="uploadForm" enctype="multipart/form-data">
					<span>ატვირთეთ თქვენი ლოგო</span>
					<input type="file" id="file" name="file">
				</form>
			</label>
		</div>

		<div class="step">
			<label>
				<span>რამდენი იყო სტარტაპის კაპიტალი 2015 წლის ბოლოს?</span>
				<input type="number" class="members">
				<span class="lari">L</span>
			</label>
		</div>

		<div class="step">

			<label>
				<span>მობილური ტელეფონი ვერიფიკაცია</span>
				<input type="tel" id="phone">
				<input type="button" id="num-send" value="გაგზავნა" class="disabled">
				
				<div class="code disabled">
					<span>შეიყვანეთ კოდი:</span> <input type="number" id="code">
					<span class="repeat">ხელახლა გაგზავნა</span>
				</div>
				
			</label>
		</div>
		
		<div class="directions">
			<input type="button" value="წინა" id="prev" class="changeStep disabled">
			<input type="button" value="შემდეგი" id="button">
		</div>

	</div>

</div>

<script src="assets/js/own-plugin.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>