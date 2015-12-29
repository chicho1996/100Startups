<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Startup</title>
	<link rel="stylesheet" type="text/css" href="assets/css/reset.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<script src="assets/js/jquery.min.js"></script>
</head>
<body>

<div id="wrapper">
	
	<div id="steps">

		<div class="stepsNum">
			<span id="current">1</span> / 10
		</div>
		
		<div class="step" visible>
			<label>
				<span>სტარტაპის სახელი</span>
				<input type="text">
			</label>
		</div>

		<div class="step">
			<label>
				<span>როდის დაიწყეთ ფუნქციონირება</span>
				<select>
					<option>2010</option>
					<option>2011</option>
					<option>2012</option>
					<option>2013</option>
					<option>2014</option>
					<option>2015</option>
					<option>2016</option>
				</select>
			</label>
		</div>

		<div class="step">
			<label>
				<span>ვინ არიან დამფუძვნებლები?</span>
				<br>
				<span>სახელი</span>
				<input type="text">
				<br>
				<span>გვარი</span>
				<input type="text">
				<br>
				<span>ასაკი</span>
				<input type="text">
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
				<input type="text">
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
				<span>ატვირთეთ თქვენი ლოგო</span>
				<input type="file">
			</label>
		</div>

		<div class="step">
			<label>
				<span>რამდენი იყო სტარტაპის კაპიტალი 2015 წლის ბოლოს?</span>
				<input type="text">
			</label>
		</div>

		<div class="step">
			<label>
				<span>მობილური ტელეფონი ვერიფიკაცია</span>
				<input type="text">
			</label>
		</div>
		

		<input type="button" value="შემდეგი" id="button">

	</div>

</div>

<script src="assets/js/own-plugin.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>