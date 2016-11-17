
var button = document.getElementsByClassName('change-text');

button[0].addEventListener('mouseover', function(){

    this.text = "You sure?";
});

button[0].addEventListener('mouseout', function(){
	this.text = "GUI Home";
});