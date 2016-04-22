var loading = $('#loading');
var wrapper = $('#wrapper');
var greeting = $('#greeting');

var btn = {};
btn.start = $('#start');
btn.dir = $('.directions .button');
btn.dir_prev = btn.dir.filter('.prev');
btn.dir_next = btn.dir.filter('.next');

var step = {};
step.content = $('#content');
step.all = $('.step');
step.value = 1;

btn.start.on('click', function() {
	greeting.addClass('hide_');
	step.content.addClass('active');
});


btn.dir_next.on('click', function() {
	var current = step.value;
	var next = step.value + 1;

	var nextEl = getStepElByIndex(next);


	if (nextEl.length) {
		step.value++;
		getStepElByIndex(current).removeClass('active');
		getStepElByIndex(next).addClass('active');
	}

	if (!getStepElByIndex(next+1).length)
		$(this).addClass('disabled');

	//step.all.filter(':nth-child('+current+')').hide();
	
});


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