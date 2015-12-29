// elements
var el = {};
el.stepsParrent = $('#steps');
el.step = $('.step');
el.butt = $('#button');
el.current = $('#current');

// ste[s]
var step ={};
step.get = null,
step.set = function(n) {
	step.get = Number(n);
};

countSteps();
keepCurrent();

el.butt.on('click', function(e) {
	e.preventDefault();

	nextStep();

	el.current.text( step.get );

});

function countSteps()
{
	el.step.each(function(key, el) {
		$(el).attr('step', key+1);
	});
}

function nextStep()
{
	el.stepsParrent.nextStep();	
}


function keepCurrent()
{
	// log each steps and keep visible step
	el.step.each(function(key,value) {
		if ( $(this).attr('visible') != undefined ) {
			step.set( $(this).attr('step') );
			return false;
		}
	});
}


function getStepIdent(n) {
	return '.step[step='+Number(n)+']';
};