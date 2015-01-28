
$(document).ready(function(){
	$("#demo").rangeCalendar({
	lang: "en",
	theme: "default-theme",
	themeContext: this,
	startDate: moment(),
	endDate: moment().add('months', 12),
	start : "+7",
	startRangeWidth : 3, 
	minRangeWidth: 1,
	maxRangeWidth: 14,
	weekends: true,
	autoHideMonths: false,
	visible: true,
	trigger: null,
	changeRangeCallback : function( el, cont, dateProp ) { return false; }
	});
});