entryBtn = document.getElementById("entryBtn");
exitBtn = document.getElementById("exitBtn");
entryPanel = document.getElementById("entryPanel");
exitPanel = document.getElementById("exitPanel");


console.log("dashboard opened");


entryBtn.addEventListener('click', function(event) {

	event.preventDefault();

	
	
	this.classList.add("active");
	exitBtn.classList.remove("active");
	console.log("Click");



	entryPanel.classList.remove("hidden");console.log(entryPanel.classList);
	exitPanel.classList.add("hidden");
});




exitBtn.addEventListener('click', function() {
	this.classList.add("active");
	entryBtn.classList.remove("active");


	entryPanel.classList.add("hidden");
	exitPanel.classList.remove("hidden"); console.log(exitPanel.classList);
});