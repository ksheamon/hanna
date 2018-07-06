'use strict';

$(window).load(function(){
	setInterval(function(){ calcDates(); }, 1000);
});

function calcDates() {
	var goLive = new Date(2018, 7, 30, 10, 0, 0);
	var now = $.now();

	var delta = Math.abs(goLive - now) / 1000;

	var days = Math.floor(delta / 86400);
	delta -= days * 86400;
	
	var hours = Math.floor(delta / 3600) % 24;
	delta -= hours * 3600;
	
	var minutes = Math.floor(delta / 60) % 60;
	delta -= minutes * 60;
	
	var seconds = Math.floor(delta) % 60;  

	$('#days').html(days);
	$('#hrs').html(hours);
	$('#mins').html(minutes);
	$('#secs').html(seconds);
}