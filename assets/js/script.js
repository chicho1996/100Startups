var loading = $('#loading');
var wrapper = $('#wrapper');
var greeting = $('#greeting');

var btn = {};
btn.start = $('#start');
btn.dir = $('.directions .button');
btn.dir_prev = btn.dir.filter('.prev');
btn.dir_next = btn.dir.filter('.next');

var input = {};
input.all = $('.input');

var step = {};
step.content = $('#content');
step.all = $('.step');
step.current = $('#current');
step.maxEl = $('#maxStep');
step.value = 1;
step.limit = 0;

var data = {};
data.name = '',
data.year = '',
data.founder = '',
data.city = '',
data.memberNum = '',
data.industry = '',
data.desc = '',
data.email = '',
data.logo = '',
data.capital = '';




function debug(index) {
	step.value = index;
	preDebug();
	step.all.filter('.active').removeClass('active');
	$(step.all[index-1]).addClass('active');
}

function preDebug() {
	//btn.dir.hide();
	loading.removeClass('active');
	wrapper.addClass('active');

	greeting.addClass('hide_');
	step.content.addClass('active');
}

$('.year').on('click', function() {
	$('.year').removeClass('active');
	$(this).addClass('active');
});



setFounderFieldBtnAccess();
function setFounderFieldBtnAccess() {
	var n = 0;
	var founder = $('.founder-cont .founder');
	founder.each(function(key,elem) {
		if ( $(this).html().length ) {
			n++;
			$(this).addClass('visible');
		} else {
			$(this).removeClass('visible');
		}
	});
	if (n > 1) {
		$('.deleteFounderColumn').show();
		$('.addFounderColumn').hide();
		$(founder.filter('.visible').get(founder.filter('.visible').length-1)).find('.addFounderColumn').show();
	} else {
		$('.addFounderColumn').show();
		$('.deleteFounderColumn').hide();
		founder.removeClass('visible');
	}
}
$(document).on('click', '.deleteFounderColumn', function() {
	$(this).parent().parent().html('');
	setFounderFieldBtnAccess();
});
$(document).on('click', '.addFounderColumn', function() {
	var cont = $('.founder-cont');
	cont.append('<div class="founder">'+$(this).parent().parent().html()+'</div>');
	setFounderFieldBtnAccess();
	setTimeout(function() {
		cont.scrollTop(cont.get(0).scrollHeight);
	}, 0);
});

$('.group').on('click', function(e) {
	e.preventDefault();
});
$('#logoFile').on('click', function(e) {
	e.stopPropagation();
});
$('.logoClone').on('click', function() {
	$('#logoFile').trigger('click');
});

init();

btn.start.on('click', function() {
	greeting.addClass('hide_');
	step.content.addClass('active');
});

input.all.on('keypress', function(e) {
	if (e.keyCode == 13 && !$(this).hasClass('desc')) {
		changeStep('next');
	}
});

// direction on click
btn.dir_next.on('click', function() {
	changeStep('next');
	collectData();
});

btn.dir_prev.on('click', function() {
	changeStep('prev');
	collectData();
});

// swipe listener for mobile
$(document).on("swipeleft",function(){
	changeStep('next');
});
$(document).on("swiperight",function(){
	changeStep('prev');
});


function init() {
	computeStepLimit();
	changeStep('prev');
	setTimeout(function() {
		input.all.get(0).focus();
	}, 500);
	$.mobile.loading().hide();
}


function collectData()
{
	var current_step_index = step.value-1;
	var currentEl = getStepElByIndex(current_step_index);
	var value = null;
	switch (current_step_index) {
		case 1:
			value = currentEl.find('.input').val();
			data.name = value;
			break;
		case 2:
			value = currentEl.find('.year.active .lbl').text();
			data.year = value;
			break;
		case 3:
			var founderEl = currentEl.find('.founder');
			data.founder = [];
			var error;
			for (var i = 0; i < founderEl.length; i++) {
				value =  $(founderEl[i]);
				error = 0;
				//console.log( value.find('.fname').val() );
				if ( typeof(value.find('.fname').val()) != 'undefined') {
					var fname = value.find('.fname').val();
					if (error > 0) error--;
				} else error++;
				if ( typeof(value.find('.lname').val()) != 'undefined') {
					var lname = value.find('.lname').val();
					if (error > 0) error--;
				} else error++;
				if ( typeof(value.find('.age').val()) != 'undefined') {
					var age = value.find('.age').val();
					if (error > 0) error--;
				} else error++;
				
				console.log(error);
				if (!error) {	
					var FounderData = {
						'fName': fname,
						'lName': lname,
						'age': age
					}
					data.founder.push(FounderData);
				}
			}
			console.log(JSON.stringify(data), data);
			break;
		case 4:
			value = currentEl.find('.input').val();
			data.city = value;
			break;
		case 5:
			value = currentEl.find('.input').val();
			data.memberNum = value;
			break;
		case 6:
			value = currentEl.find('.input').val();
			data.industry = value;
			break;
		case 7:
			value = currentEl.find('.input').val();
			data.desc = value;
			break;
		case 8:
			value = currentEl.find('.input').val();
			data.email = value;
			break;
		case 9:
			value = $('#logoFile').get(0).files[0];
			data.logo = value;
			break;
		case 10:
			value = currentEl.find('.input').val();
			data.capital = value;
			dataValidation();
			break;
	}
	dataValidation();
}

debug(3);

function avoidSpaceKey(value) {
	var test = value.replace(/\s\s+/g, ' ');
	if (test[0] == ' ')
		test = test.substr(1);

	return test;
}
function dataValidation() {
	var errors = {};
	errors.name = 0;
	if (!data.name.length) {
		//console.log('სტარტაპის სახელი!');
		errors.name = 1;
	} else if ( avoidSpaceKey(data.name).length < 2 ) {
		//console.log('სახელი ნაკლებია 2ზე!');
		errors.name = 2;
	} else {
		errors.name = 0;
		//console.log(avoidSpaceKey(data.name));
	}

	errors.year = 0;
	if (!data.year.length) {
		errors.year = 1;
	} else {
		errors.year = 0;
	}

	errors.founder = 0;
	if (!data.founder.length) {
		errors.founder = 1;
	} else {
		errors.founder = {};
		for (var key=0;key<data.founder.length;key++) {
			var arr = data.founder[key];
			var fName = arr.fName;
			var lName = arr.lName;
			var age = arr.age;
			errors.founder[key] = [];
			if ( data.founder.length > 1 && !fName.length 
				&& !lName.length
				&& !age.length 
				&& data.founder[0].fName.length
				&& data.founder[0].lName.length
				&& data.founder[0].age.length
				) {
				errors.founder[key] = 0;
				//console.log(2555555555, key, errors.founder);
			} else {
				if (!fName.length) {
					errors.founder[key] = 2;
				} else if(!lName.length) {
					errors.founder[key] = 3;
				} else if (!age.length) {
					errors.founder[key] = 4;
				} else {
					errors.founder[key] = 0;
				}
			}
		}
	}
	// '----'+JSON.stringify(errors.founder)
	//console.log( JSON.stringify(errors.founder) );
	

	errors.city = 0;
	if (!data.city.length) {
		errors.city = 1;
	} else {
		errors.city = 0;
	}

	errors.memberNum = 0;
	if (!data.memberNum.length) {
		errors.memberNum = 1;
	} else {
		errors.memberNum = 0;
	}

	errors.industry = 0;
	if (!data.industry.length) {
		errors.industry = 1;
	} else {
		errors.industry = 0;
	}

	errors.desc = 0;
	if (!data.desc.length) {
		errors.desc = 1;
	} else {
		errors.desc = 0;
	}

	errors.email = 0;
	if (!data.email.length) {
		errors.email = 1;
	} else {
		errors.email = 0;
	}

	errors.logo = 0;
	if (typeof data.logo == 'undefined' 
		|| typeof data.logo.name == 'undefined') {
		errors.logo = 1;
	} else {
		errors.logo = 0;
	}

	errors.capital = 0;
	if (!data.capital.length) {
		errors.capital = 1;
	} else {
		errors.capital = 0;
	}

	//console.log(errors);

}

var phonePH = "5**  - **  - ** - **";
$("#phone").mask("500 - 00 - 00 - 00", {placeholder: phonePH} );

$('.input').on('focus', function() {
	setTimeout(function() {
		$('#wrapper').scrollTop($('#wrapper').get(0).scrollHeight);
	}, 300);
});


$('#logoFile').on('change', function() {
	openFile( $(this) );
});
var openFile = function(el) {
	var file = el.get(0).files[0];
	var reader = new FileReader();

	reader.readAsDataURL(file);
	reader.onload = function(){
		var dataURL = reader.result;
		$('.logoClone').css('background-image', 'url("'+dataURL+'")');
	};
};



function changeStep(direction)
{
	var next;
	if (direction == 'next')
		next = true;
	else if (direction == 'prev')
		next = false;
	else {
		alert('undefined direction');
		return false;
	}

	var current = step.value;
	var nextStep = step.value + 1;
	var nextNext = nextStep + 1;
	if (!next) {
		nextStep -= 2;
		nextNext -= 4;
	}

	var nextEl = getStepElByIndex(nextStep);

	// check if next step
	if (nextEl.length) {
		if (next) step.value++;
		else step.value--;
		if (next) {
			getStepElByIndex(current).addClass('goLeft').removeClass('active goRight fromLeft fromRight');
			nextEl.addClass('fromRight active');
		} else {
			getStepElByIndex(current).addClass('goRight').removeClass('active goLeft goRight fromLeft fromRight');
			nextEl.addClass('fromLeft active');
		}
		updateStepDOM();
	}

	// disable buttons
	if (!getStepElByIndex(nextNext).length) 
		btn['dir_'+direction].addClass('disabled');
	else
		btn['dir_'+direction].removeClass('disabled');

	// undisable buttons
	if (next)
		btn.dir_prev.removeClass('disabled');
	else
		btn.dir_next.removeClass('disabled');

	nextEl.find('.input').focus();
}

function computeStepLimit()
{
	step.limit = step.all.length;
	step.maxEl.text(step.limit);
}

function updateStepDOM()
{
	step.current.text( step.value );
}

function getStepElByIndex(index) {
	return step.all.filter(':nth-child('+index+')');
}



loading.bind('oanimationend animationend webkitAnimationEnd', function() { 
	loading.hide('slow', function() {
		wrapper.addClass('active');
	});
});