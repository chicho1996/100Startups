$.fn.nextStep = function() {

	if ( !this.nextStepEl().length || !allowStep[step.get] ) {
		//alert("finished"); 
		return false;
	}

	this.currentStrepEl().fadeOut('fast').removeAttr('visible'); // hide current
	this.nextStepEl().fadeIn(120).attr('visible', true); // show next
	keepCurrent();

	displayPrevNexBtns();

	nextBtnText();

};

$.fn.prevStep = function() {

	if ( !this.prevStepEl().length ) {
		//alert("finished"); 
		return false;
	}

	this.currentStrepEl().fadeOut('fast').removeAttr('visible'); // hide current
	this.prevStepEl().fadeIn(120).attr('visible', true); // show next
	keepCurrent();

	displayPrevNexBtns();

};

$.fn.getByStep =function(n) {
	return this.find( getStepIdent(n) );
};

$.fn.currentStrepEl = function() {
	return this.getByStep(step.get);
};

$.fn.prevStepEl = function() {
	return this.getByStep(step.get-1);
}

$.fn.nextStepEl = function() {
	return this.getByStep(step.get+1);
}