entryBtn = document.getElementById("entryBtn");
exitBtn = document.getElementById("exitBtn");
entryPanel = document.getElementById("entryPanel");
exitPanel = document.getElementById("exitPanel");
infosTable = document.getElementById("infosTable");


console.log("dashboard opened");


exitBtn.addEventListener('click', function(event) {

	event.preventDefault();

	
	this.classList.add("active");
	entryBtn.classList.remove("active");
	



	entryPanel.classList.remove("hidden");
	exitPanel.classList.add("hidden");

	infosTable.innerText = 	" " ;

});


entryBtn.addEventListener('click', function() {
	this.classList.add("active");
	exitPanel.classList.remove("active");


	entryPanel.classList.remove("hidden");
	exitPanel.classList.add("hidden"); 
	infosTable.innerText = 	" " ;
	

});


