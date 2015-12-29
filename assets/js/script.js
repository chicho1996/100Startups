// elements
var el = {};
el.stepsParrent = $('#steps');
el.step = $('.step');

// ste[s]
var step ={};
step.get = null,
step.set = function(n) {
	step.get = Number(n);
};

keepCurrent();

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