entryBtn = document.getElementById("entryBtn");
exitBtn = document.getElementById("exitBtn");
entryPanel = document.getElementById("entryPanel");
exitPanel = document.getElementById("exitPanel");





exitBtn.addEventListener('click', function(event) {

	event.preventDefault();

	
	this.classList.add("active");
	entryBtn.classList.remove("active");
	


	exitPanel.classList.remove("hidden");
	entryPanel.classList.add("hidden");

	document.getElementById("checkTicket").focus();

});


entryBtn.addEventListener('click', function() {

	event.preventDefault();

	console.log("clicked Entry");
	this.classList.add("active");
	exitBtn.classList.remove("active");


	entryPanel.classList.remove("hidden");
	exitPanel.classList.add("hidden"); 
	document.getElementById("getTicket").focus();
	

});

