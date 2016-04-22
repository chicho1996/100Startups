var loading = $('#loading');
var wrapper = $('#wrapper');
var greeting = $('#greeting');

var btn = {};
btn.start = $('#start');

var step = {};
step.content = $('#content');


btn.start.on('click', function() {
	greeting.addClass('hide_');
	step.content.addClass('active');
});






loading.bind('oanimationend animationend webkitAnimationEnd', function() { 
	loading.hide('slow', function() {
		wrapper.addClass('active');
	});
});