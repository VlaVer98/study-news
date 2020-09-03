
$(document).ready(function() {
	let date = new Date();
	let days =  ['sunday','monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
	let num_day_week = date.getDay();
	console.log(num_day_week);
	if(num_day_week<=5 && num_day_week>=1) {
		let day_week = days[num_day_week];
	 	let nav = "#"+day_week+"-tab";
	 	let tab_panel = "#"+day_week;
	 	$(nav).addClass("active");
	 	$(tab_panel).addClass("show active");
	} else {
		$("#monday-tab").addClass("active");
	 	$("#monday").addClass("show active");
	} 

});