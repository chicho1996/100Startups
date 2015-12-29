$.fn.nextStep = function() {

	if ( !this.nextStepEl().length ) {
		alert("finished"); 
		return false;
	}

	this.currentStrepEl().fadeOut('fast').removeAttr('visible'); // hide current
	this.nextStepEl().fadeIn('slow').attr('visible', true); // show next
	keepCurrent();
};

$.fn.getByStep =function(n) {
	return this.find( getStepIdent(n) );
};

$.fn.currentStrepEl = function() {
	return this.getByStep(step.get);
};

$.fn.nextStepEl = function() {
	return this.getByStep(step.get+1);
}