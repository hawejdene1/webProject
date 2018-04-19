entryBtn = document.getElementById("entryBtn");
exitBtn = document.getElementById("exitBtn");


entryBtn.addEventListener('click', function() {
	this.classList.add("active");
	exitBtn.classList.remove("active");
});




exitBtn.addEventListener('click', function() {
	this.classList.add("active");
	entryBtn.classList.remove("active");
});