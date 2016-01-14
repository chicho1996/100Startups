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
			//startup.founder.firstname = $(input[0]).val();
			//startup.founder.lastname = $(input[1]).val();
			//startup.founder.age = $(input[2]).val();
			
			founder_count();
			startup.founder = founders;
			
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
		
			$.ajax({
				type: 'POST',
				url: 'http://shavidzet.com/100Startups/lib/code_act.php',
				data: {getData: JSON.stringify(startup), code:$('#code').val()},
				success: function(data) {
					console.log(data);
					if (data == '-1') {
						alert('კოდი არასწორია!');
					} else if (data == '01') {
						//alert('წარმატებით დარეგისტრირდით');
						$('.step').hide();
						$('.complete').show();

						$('.stepsNum').hide();
						$('.directions').hide();

						$('#home').on('click', function(e) {
							e.preventDefault;
							window.location.reload();
						})
					}
					//alert("თქვენ წარმატების გაიარეთ რეგისტრაცია");
					//window.location.reload();
				}
			});
			
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

/*Object.observe(startup, function(changes) {
	console.log( changes[0].name + ' update to: ' + changes[0].object[changes[0].name] );
});*/

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
	if (step.get == 10) {
		el.butt.val('რეგისტრაცია');
					
		if ( $('.code').hasClass('disabled') ) {
			$('#button').addClass('disabled');
		} else {
			$('#button').removeClass('disabled');
		}
		//$('#button').addClass('disabled');
	} else {
		$('#button').removeClass('disabled');
		el.butt.val('შემდეგი');
	}
	
	
}

	$('#uploadForm').ajaxForm(function(data) { 
			console.log('ajax_upload:', data);
	});

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}


var phonePH = "5**  - **  - ** - **";
$("#phone").mask("500 - 00 - 00 - 00", {placeholder: phonePH} );

$('input[type=number]').on('keypress', function(e) {
	return isNumberKey(e);
});

//$('.step').hide();
//$('.foundersLBL').parent().show();


var founderHTML = '';

setInterval(function() {
	//$('.add').css('left', Number($('.nmlbl').offset().left-10)+'px');
}, 500);

$('.step').on('click', '.add', function(e) {
	e.preventDefault();
	
	if (!founderHTML.length) {
		founderHTML = $(this).parent().parent().find('.foundersLBL').outerHTML();
	}
	
	//console.log( $(founderHTML).find('span').text('').parent().parent().outerHTML(), $(founderHTML).html() );
	
	$(this).parent().parent().append( $(founderHTML).find('span').text('').parent().parent().outerHTML() );
	
	$(this).hide();
	
});

$('.step').on('change', '#file', function(e) {
	$('#uploadForm').submit();
});

$(window).resize(function() {
	//alert("OK")
});



$('#num-send').on('click', function(e) {
	e.preventDefault();
	
	startup.phone = $('[step=10] input').val();
	
	if ( $(this).hasClass('disabled') ) return false;
	
	var that = $(this);

	
	if ( startup.phone.replace(/ - /g, '').length == 9 ) {
		$.ajax({
			type: 'POST',
			url: 'http://shavidzet.com/100Startups/lib/reg.php',
			data: {getData: JSON.stringify(startup), found: JSON.stringify(founders), phone: startup.phone.replace(/ - /g, '')  },
			success: function(data) {
				console.log( data );
				$('#button').removeClass('disabled');
				that.addClass('disabled');
				$('.code').removeClass('disabled');
				$('.code').slideDown();
				//alert("თქვენ წარმატების გაიარეთ რეგისტრაცია");
				//window.location.reload();
			}
		});
	} else {
		alert("შეიყვანეთ სწორი მობილურის ნომერი");
	}

});

$('.step').find('input').on('keyup', function(e) {
	if ($(this).parent().parent().attr('step') == 10 && $(this).attr('id') == 'phone') {
		$('#button').addClass('disabled');
		if ($(this).val().replace(/ - /g, '').length == 9) {
			$('#num-send').removeClass('disabled');
		} else {
			$('#num-send').addClass('disabled');
		}
		$('.code').slideUp();
	}
});

$('.repeat').on('click', function(e) {
	$.ajax({
		type: 'POST',
		url: 'http://shavidzet.com/100Startups/lib/reg.php',
		data: {getData: JSON.stringify(startup), found: JSON.stringify(founders), phone: startup.phone.replace(/ - /g, '')  },
		success: function(data) {
			console.log( data );

			
			//alert("თქვენ წარმატების გაიარეთ რეგისტრაცია");
			//window.location.reload();
		}
	});
});

//$('.step').hide();
//$('.step[step=3]').show();

founders = [];
function founder_count() {
	input = $('[step=3]').find('.cont');
	for (var i = 1; i <= input.length; i++) {
		founders[i] = {};
		if ( i % 3 == 0 ) {
			founders[i].f = $(input[Number(i-1)]).find('input').val()
		} else if ( Number(i - 2) % 3 == 0) {
			founders[i].l = $(input[Number(i-1)]).find('input').val()
		} else {
			founders[i].age = $(input[Number(i-1)]).find('input').val()
		}
		//console.log( $(input[0]).find('input').val() ); 
	}
}


function update_founders(key,key2,value)
{
	founders[key][key2] = value;
}
/*$('.foundersLBL').each(function(index) {
	var f = $($(this).find('.cont').get(0)).find('input').val();
	var l = $($(this).find('.cont').get(1)).find('input').val();
	var a = $($(this).find('.cont').get(2)).find('input').val();
	founders[key] = {};
	console.log(f);
	//console.log (  );
});*/

