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




$('.year').on('click', function() {
	$('.year').removeClass('active');
	$(this).addClass('active');
});

//btn.dir.hide();

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
});

btn.dir_prev.on('click', function() {
	changeStep('prev');
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


loading.removeClass('active');
wrapper.addClass('active');

greeting.addClass('hide_');
step.content.addClass('active');


loading.bind('oanimationend animationend webkitAnimationEnd', function() { 
	loading.hide('slow', function() {
		wrapper.addClass('active');
	});
});