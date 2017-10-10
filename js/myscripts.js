$(document).ready(function() {

	$(".showmenu").click(function(event) {
		event.preventDefault();
			$(".navigation").toggleClass("open");
	});
});

var image = "http://localhost:8888/lab2/img/hamburger.png";
var theid = document.getElementsByClassName("open").src;

var hello = "hej"

	image.addEventListener("click", function(){

		//if(	document.getElementsByClassName("open").src == "img/hamburger.png"){
		//	document.getElementsByClassName("open").src = "img/hamburgerclose.png";
		//} else {
		//	document.getElementsByClassName("open").src = "img/hamburger.png"
	//	}
	alert("Hello!");
    
});