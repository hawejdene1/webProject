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

<<<<<<< HEAD
	document.getElementById("checkTicket").focus();
=======
	entryPanel.classList.add("hidden");
	exitPanel.classList.remove("hidden");


>>>>>>> 455377a5f377a33c5b236bf67b3308f554107842

});


entryBtn.addEventListener('click', function() {

	event.preventDefault();

	console.log("clicked Entry");
	this.classList.add("active");
	exitBtn.classList.remove("active");


	entryPanel.classList.remove("hidden");
	exitPanel.classList.add("hidden"); 
<<<<<<< HEAD
	document.getElementById("getTicket").focus();
=======

>>>>>>> 455377a5f377a33c5b236bf67b3308f554107842
	

});

<<<<<<< HEAD
=======

>>>>>>> 455377a5f377a33c5b236bf67b3308f554107842
