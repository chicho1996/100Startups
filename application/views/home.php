<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel=icon href="<?=base_url()?>assets/img/favicon1.png">

	<title>100startups</title>

	<meta name="google-site-verification" content="E3vNpVyhEngQZm-BdQvaaYjfvZQdvFqy-x2tvQ7pARg" />

	<meta name="keywords" content="100,ქართული,სტარტაპი,hundred,georgian,startups,lapptech,andromeda,projects,applicable,app,სტარტაპების,რეგისტრაცია,გამოყენებადი,ტექნელოგიების,ლაბორატორია,ანდრომედა">
	<meta name="description" content="100 ქართული სტარტაპი - კონტაქტი: support@100startups.ge">
	<meta name="author" content="Andromeda">

	<meta property="og:url"                content="<?=base_url()?>" />
	<meta property="og:title"              content="100startups" />
	<meta property="og:description"        content="100 ქართული სტარტაპი" />
	<meta property="og:image"              content="<?=base_url('assets/img/bg.jpg')?>" />

	<!-- Bootstrap -->
	<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/js/jquery.mobile.min.js"></script>
	<script src="<?=base_url()?>assets/js/jquery.mask.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
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
						<span class="title">როდის დაიწყეთ ფუნქციონირება?</span>
						<div class="year active">
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
						<span class="title founderTiTle">ვინ არიან დამფუძნებლები?</span>
						<div class="founder-cont">
							<div class="founder">
								<div class="lbl-group helpBTN">
									<div class="add delete deleteFounderColumn">-</div>
								</div>
								<div class="lbl-group">
									<!--<div class="lbl">სახელი</div>-->
									<input type="input" class="input name fname lettersonly" placeholder="სახელი">
								</div>

								<div class="lbl-group">
									<!--<div class="lbl">გვარი</div>-->
									<input type="input" class="input name lname lettersonly" placeholder="გვარი">
								</div>

								<div class="lbl-group">
									<!--<div class="lbl">ასაკი</div>-->
									<input type="number" class="input age" placeholder="ასაკი">
								</div>
								<div class="lbl-group helpBTN">
									<div class="add addFounderColumn">+</div>
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
						<span>რომელია თქვენი ინდუსტრია?</span>
						<input type="text" class="input">
					</label>
				</div>
				<div class="step">
					<label class="group">
						<span>20 სიტყვით აღწერეთ თქვენი პროდუქტი</span>
						<textarea class="input desc"></textarea>
						<br><br><br>
					</label>
				</div>

				<div class="step">
					<label class="group">
						<span>კომპანიის ელ.ფოსტა</span>
						<input type="email" class="input" placeholder="example@domain.com" id="Emailinput">
					</label>
				</div>

				<div class="step">
					<label class="group">
					<img src="" id="img">
						<span></span>
						<div class="logoClone">
							<div class="lbl">ატვირთეთ თქვენი ლოგო</div>
						</div>
						<input type="file" class="logoFile" id="logoFile" accept="image/x-png, image/gif, image/jpeg">

					</label>
				</div>

				<div class="step">
					<label class="group">
						<span>რამდენი იყო სტარტაპის კაპიტალი 2015 წლის ბოლოს?</span>
						<input type="number" class="input">
					</label>
				</div>

				<div class="step last">
					<label class="group">
						<div class="phoneCont">
							<span>მობილური ტელეფონის ვერიფიკაცია</span>
							<input type="tel" class="input" id="phone">

							<button type="button" id="sendMSG">გაგზავნა</button>
						</div>

						<div class="phoneMSG_status">
							<div class="alert alert-success">
								<strong class="displayBlock title">დაფიქსირდა შეცდომა!</strong>
								<p class="msg">მოგვწერეთ: support@100startups.ge

								<div class="codeForm">
								<span class="editPhone">ნომრის შესწორება</span>
								<input type="number" class="input" id="verCode" placeholder="****" onkeypress="if(this.value.length==4) return false;">
								<span class="repeat">ხელახლა გაგზავნა</span>
								<input type="button" class="button" id="codeBTN" value="რეგისტრაცია"> 
								</div>
								</p>
							</div>
						</div>



					</label>
				</div>

			</div>

			<div id="validationMSG">
				<div class="alert alert-danger">
				  <strong class="displayBlock">დაფიქსირდა შეცდომა!</strong>
				  <ul class="errors"></ul>
				</div>
			</div>

			<div class="directions">
				<div class="button prev disabled">წინა</div>
				<div class="button next">შემდეგი</div>
			</div>

			<div id="finished">
				<div class="msg">გილოცავთ, თქვენ წარმატებით გაიარეთ რეგისტრაცია!</div>
				<div class="ct">მოგვწერეთ: <b>support@100startups.ge</b></div>
			</div>

		</div>
	</div>


	<script src="<?=base_url()?>assets/js/script.js"></script>
</body>
</html>
