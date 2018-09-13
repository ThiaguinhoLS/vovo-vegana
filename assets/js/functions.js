document.addEventListener("load", function() {
	if (window.location.href !== "http://www.vovoprojeto.com/") {
		var element = document.getElementsByClassName("header");
		element.style.borderBottom = "10px solid #2A544B";
	}
});