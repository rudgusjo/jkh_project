function PopUp(link,argWidth,argHeight) {
	size = "width="+argWidth+", height="+argHeight+";";
  	window.open(link,"",size);
}

function changeTagUrl(argIdTag,argUrl){
	document.getElementById(argIdTag).src = argUrl;
}
