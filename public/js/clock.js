function clock(){
    var date = new Date(),
        hours = (date.getHours() < 10) ? '0' + date.getHours() : date.getHours(),
        minutes = (date.getMinutes() < 10) ? '0' + date.getMinutes() : date.getMinutes(),
        seconds = (date.getSeconds() < 10) ? '0' + date.getSeconds() : date.getSeconds();


	var date = new Date();
	var monthes = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
	var day = date.getDate(),
		month = monthes[date.getMonth()],
		year = date.getFullYear();
	
	document.getElementById('clock').innerHTML = hours + ':' + minutes + ':' + seconds;
	document.getElementById('date').innerHTML = day + '.' + month + '.' + year;    
}
setInterval(clock, 1000);