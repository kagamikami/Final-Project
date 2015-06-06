function det(){
	var mapn = document.getElementById("mapn").value;
	var rank = document.getElementById("rank").value;
	var dropn = document.getElementById("dropn").value;
	if (rank != 'S' && rank != 'A' && rank != 'B'){
		table("0");
	}else{
		table("1");
	}

}

function table(str){
	var req = new XMLHttpRequest();
	if (!req){
		throw 'Unable to create HttpRequest.';
	}
	var mapn = document.getElementById("mapn").value;
	var rank = document.getElementById("rank").value;
	var dropn = document.getElementById("dropn").value;
	var url = "submit.php?q=";
	url = url + str;
	url = url + "&mapn=" + mapn;
	url = url + "&rank=" + rank;
	url = url + "&dropn=" + dropn;
	req.onreadystatechange = function(){
		if (this.readyState === 4 && this.status == 200){
			if (str == "1"){
			var table = document.getElementById("bmessage");
			if (table.rows.length > 0){
				table.deleteRow(0);
			}
			var row = table.insertRow(0);
			var cell = row.insertCell(0);
			cell.innerHTML = "you have submit it successfully";
			}
			if (str == "0"){
			var table = document.getElementById("bmessage");
			if (table.rows.length > 0){
				table.deleteRow(0);
			}
			var row = table.insertRow(0);
			var cell = row.insertCell(0);
			cell.innerHTML = "Rank should be S, A or B";
			}
		}
	}
	req.open('GET', url,true);
  	req.send();
}

