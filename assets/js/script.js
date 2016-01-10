// elements
var el = {};
el.stepsParrent = $('#steps');
el.step = $('.step');
el.butt = $('#button');
el.current = $('#current');

// ste[s]
var allowStep = [];
var step ={};
step.get = null,
step.set = function(n) {
	step.get = Number(n);
};

countSteps();
keepCurrent();

// init startup object to keep after
var startup = {};
resetStartupObj();


$('#startButton').on('click', function(e) {
	e.preventDefault();

	$('#start').slideUp('slow');
	$('#steps').show();
});

el.butt.on('click', function(e) {
	e.preventDefault();

	setAllowableStep(step.get+1, true);

	var input = el.stepsParrent.currentStrepEl().find('input');

	switch (step.get) {
		case 1:
			startup.name = input.val();
		break;
		case 2:
			startup.year = input.filter(':checked').val();
		break;
		case 3:
			startup.founder.firstname = $(input[0]).val();
			startup.founder.lastname = $(input[1]).val();
			startup.founder.age = $(input[2]).val();
		break;
		case 4:
			startup.city = input.val();
		break;
		case 5:
			startup.membersNum = input.val();
		break;
		case 6:
			startup.industry = input.val();
		break;
		case 7:
			startup.description = el.stepsParrent.currentStrepEl().find('textarea').val();
		break;
		case 8:
			startup.logo = input.val();
		break;
		case 9:
			startup.capital = input.val();
		break;
		case 10:
			startup.phone = input.val();
			alert("თქვენ წარმატების გაიარეთ რეგისტრაცია \n" + JSON.stringify( startup ));
			window.location.reload();
		break;

	};

	nextStep();

});


$('.changeStep').on('click', function(e) {

	e.preventDefault();

	var direction = $(this).attr('id');

	if (direction == 'next') {
	 	nextStep();
	} else {
		prevStep();
	}

	displayPrevNexBtns();
	nextBtnText();

});

Object.observe(startup, function(changes) {
	console.log( changes[0].name + ' update to: ' + changes[0].object[changes[0].name] );
});

css();
$(window).resize(function() {
	css();
});
function css()
{
	//$('#startButton').css('top', (window.innerHeight / 2 + 170)+'px');
}

function resetStartupObj()
{
	startup = {};
	startup.name = '';
	startup.startTime = '';
	startup.founder = {
		firstname: '',
		lastname: '',
		age: ''
	};
	startup.city = '';
	startup.membersNum = '';
	startup.industry = '';
	startup.description = '';
	startup.logo = '';
	startup.capital = '';
	startup.phone = '';
}

function countSteps()
{
	el.step.each(function(key, el) {
		$(el).attr('step', key+1);
		allowStep.push(false);
	});
}

function nextStep()
{
	el.stepsParrent.nextStep();
	el.current.text( step.get );
}

function prevStep()
{
	el.stepsParrent.prevStep();
	el.current.text( step.get );
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

function setAllowableStep(key, bool)
{
	allowStep[key-1] = bool; 
}

function isAllowable(key)
{
	if (allowStep[key]) return true;
	return false;
}

function displayPrevNexBtns()
{
	if( isAllowable(step.get-1) ) $('#prev').removeClass('disabled');
	else $('#prev').addClass('disabled');


	//if( isAllowable(step.get) ) $('#next').show();
	//else $('#next').hide();
}

function nextBtnText()
{
	if (step.get == 10)
		el.butt.val('რეგისტრაცია');
	else
		el.butt.val('შემდეგი');
}