function trylog(){
	var user = document.getElementById("username").value;
	var pass = document.getElementById("password").value;
	var req = new XMLHttpRequest();
	if (!req){
		throw 'Unable to create HttpRequest.';
	}
	var url = "trylog.php?username=" + user;
	url = url + "&password=" + pass;
	req.onreadystatechange = function(){
		if (this.readyState === 4 && this.status == 200){
			var a = req.responseText;
			a.substring(1);
			if (a != ""){
				document.getElementById("txtHint").innerHTML=a;
			}else {
				window.location.href="index.php";
			}
		}
	}
	req.open('GET', url,true);
  	req.send();

}