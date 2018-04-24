console.log("oidsf");

close = document.getElementsByClassName("close")[0];
modal = document.getElementsByClassName("modal")[0];
modelContentMain = document.getElementsByClassName("model-content-main")[0];
choiceBtns = document.getElementsByClassName("choiceBtn");

console.log(modelContentMain);


adminForms = {
	addLine: "",
	addStation: "", 
	addMachine: "", 
	deleteStation: "", 
	deleteLine: "", 
	updateDistance: "", 
	updatePrice: "", 
	updateGPrice: "", 
	addAgent: "", 
	updateAgent: "", 
	deleteAgent: ""
};


var text = "";



for(var i=0; i<choiceBtns.length; i++) {
	choiceBtns[i].addEventListener('click', function (event) {
		//displayModal(modal);
		text += ', '+event.target.id+': ';
		//modelContentMain.innerHTML = adminForms[event.target.id];
		console.log(event.target.id);
	});
}


close.addEventListener('click', function() {
	modal.style.display="none";
});





function displayModal(modal) {
		if(modal.style.display!="block") 
			modal.style.display="block";
}


function showModal() {

	console.log(this.target.id);

/*	displayModal(modal);
		console.log(id);
		lastOpened = document.getElementsByClassName(choiceBtns[i].id)[0];
		lastOpened.classList.remove('hidden');*/
}

function showText() {

console.log(text);
}