function changeBgColor(position,DbPosition){
	// Every element of the Aufstellung Table
	// alert(position);
	
	// The value of selected element from the Aufstellung List
	// alert(document.getElementById("select").options[document.getElementById('select').selectedIndex].value);
	
	var value = document.getElementById("select").options[document.getElementById('select').selectedIndex].value;
	var color = "#FF7000";

	for(var i = 0;i < position.length;i++){
		// document.getElementById("test").innerHTML = "";
		document.getElementById(position[i][2]).getElementsByTagName("input")[0].name = "";
		document.getElementById(position[i][2]).getElementsByTagName("input")[0].value = "";
		document.getElementById(position[i][2]).style.backgroundColor = "green";
		document.getElementById(position[i][2]).getElementsByTagName("select")[0].style.visibility = "hidden";
	}
	for(var i = 97;i<=104;i++){
		for(var j = 1;j<=5;j++){
			// document.getElementById("test").innerHTML += String.fromCharCode(i) + j;
			document.getElementById(String.fromCharCode(i) + j).getElementsByTagName("select")[0].style.visibility = "hidden";
		}
	}

	for(var i = 0;i < position.length;i++){
		if(position[i][0] == value){
			// document.getElementById("test").innerHTML += position[i][1] + ": " + position[i][2] + "<br>";
			document.getElementById(position[i][2]).getElementsByTagName("select")[0].style.visibility = "visible";
			document.getElementById(position[i][2]).getElementsByTagName("select")[0].name = position[i][3];
			document.getElementById(position[i][2]).getElementsByTagName("input")[0].name = position[i][2];
			document.getElementById(position[i][2]).getElementsByTagName("input")[0].value = position[i][2];
		}
	}
}