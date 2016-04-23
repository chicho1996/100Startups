<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Bootstrap 101 Template</title>

	<!-- Bootstrap -->
	<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class="loading active" id="loading"></div>

	<div id="wrapper">
		<div class="welcome" id="greeting">
			<div id="start" class="startBTN">დაწყება</div>
		</div>

		<div class="steps-cont" id="content">

			<div class="header"></div>

			<div class="stepNum">
				<div id="current">1</div> / <div id="maxStep"></div>
			</div>

			<div id="steps">
				<div class="step active">

					<label class="group">
						<span class="title">სტარტაპის სახელი</span>
						<input type="input" class="input">
					</label>

				</div>
				<div class="step">
					<label class="group">
						<span class="title">როდის დაიწყეთ ფუნქციონირება</span>
						<div class="year">
							<div class="radio">
								<div class="child"></div>
							</div>
							<div class="lbl">2010</div>
						</div>
						<div class="year">
							<div class="radio">
								<div class="child"></div>
							</div>
							<div class="lbl">2011</div>
						</div>
						<div class="year">
							<div class="radio">
								<div class="child"></div>
							</div>
							<div class="lbl">2012</div>
						</div>
						<div class="year">
							<div class="radio">
								<div class="child"></div>
							</div>
							<div class="lbl">2013</div>
						</div>
						<div class="year">
							<div class="radio">
								<div class="child"></div>
							</div>
							<div class="lbl">2014</div>
						</div>
						<div class="year">
							<div class="radio">
								<div class="child"></div>
							</div>
							<div class="lbl">2015</div>
						</div>
						<div class="year">
							<div class="radio">
								<div class="child"></div>
							</div>
							<div class="lbl">2016</div>
						</div>
					</label>
				</div>

				<div class="step">
					<label class="group">
						<span class="title">ვინ არიან დამფუძნებლები?</span>
						<div class="founder-cont">
							<div class="founder">
								
								<div class="lbl-group">
									<!--<div class="lbl">სახელი</div>-->
									<input type="input" class="input name" placeholder="სახელი">
								</div>

								<div class="lbl-group">
									<!--<div class="lbl">გვარი</div>-->
									<input type="input" class="input name" placeholder="გვარი">
								</div>

								<div class="lbl-group">
									<!--<div class="lbl">ასაკი</div>-->
									<input type="input" class="input age" placeholder="ასაკი">
								</div>
								<div class="lbl-group">
									<div class="add addFounderColumn">+</div>
								</div>
								<div class="lbl-group">
									<div class="add delete deleteFounderColumn">-</div>
								</div>

							</div>
						</div>
					</label>
				</div>
				
				<div class="step">
					<label class="group">
						<span class="title">რომელ ქალაქში მოღვაწეობთ?</span>
						<input type="input" class="input">
					</label>
				</div>
				<div class="step">
					<label class="group">
						<span>რამდენი წევრია გუნდში?</span>
						<input type="number" class="input">
					</label>
				</div>
				<div class="step">
					<label class="group">
						<span>რამელია თქვენი ინდუსტრია?</span>
						<input type="text" class="input">
					</label>
				</div>
				<div class="step">
					<label class="group">
						<span>20 სიტყვით აღწერეთ თქვენი პროდუქტი</span>
						<textarea class="input desc"></textarea>
					</label>
				</div>

				<div class="step">
					<label class="group">
						<span>ატვირთეთ თქვენი ლოგო</span>
						<div class="logoClone">
							<div class="lbl">აირჩიე</div>
						</div>
						<input type="file" class="logoFile">
					</label>
				</div>

				<div class="step">
					<label class="group">
						<span>რამდენი იყო სტარტაპის კაპიტალი 2015 წლის ბოლოს?</span>
						<input type="number" class="input">
					</label>
				</div>

			</div>

			<div class="directions">
				<div class="button prev">წინა</div>
				<div class="button next">შემდეგი</div>
			</div>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/js/jquery.mobile.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/js/script.js"></script>
</body>
</html>