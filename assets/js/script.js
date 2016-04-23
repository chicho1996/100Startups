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



$(document).on('click', '.deleteFounderColumn', function() {
	$(this).parent().parent().html('');
});
$(document).on('click', '.addFounderColumn', function() {
	$('.founder-cont').append('<div class="founder">'+$(this).parent().parent().html()+'</div>');
});

$('.group').on('click', function(e) {
	e.preventDefault();
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
	return false;
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
			error = true;
			for (var i = 0; i < founderEl.length; i++) {
				value =  $(founderEl[i]);
				//console.log( value.find('.fname').val() );
				if ( typeof(value.find('.fname').val()) != 'undefined') {
					var fname = value.find('.fname').val();
					var error = false;
				} else error = true;
				if ( typeof(value.find('.lname').val()) != 'undefined') {
					var lname = value.find('.lname').val();
					var error = false;
				} else error = true;
				if ( typeof(value.find('.age').val()) != 'undefined') {
					var age = value.find('.age').val();
					var error = false;
				} else error = true;
				
				if (!error) {	
					var FounderData = {
						'fName': fname,
						'lName': lname,
						'age': age
					}
					data.founder.push(FounderData);
				}
			}
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
		case 9:
			value = currentEl.find('.input').val();
			data.capital = value;
			break;
		default:

	}
}

//debug(8);



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