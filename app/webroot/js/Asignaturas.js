window.onload = function (){	
	var ra = document.getElementById("responsableAsig");
	ra.style.setProperty("display","none");
	
	var chkBox = document.getElementsByClassName("chekResp");

	for (var i = 0; i < chkBox.length; i++) {
    chkBox[i].style.setProperty("display","none");
	}
	var td = document.getElementsByClassName("tdResp");
	for (var i = 0; i < td.length; i++) {
    td[i].onmousedown = function (){
			var childs = this.childNodes;
			var elem=0;
			childs[1].checked=1
			console.log(childs);
			document.getElementById("nameResp").innerHTML = childs[3].innerHTML;		
		}
	} 
	document.getElementById("selectResp").onmousedown= function(){
		if(ra.style.display == 'none'){
			ra.style.setProperty("display","block");	
		}else{
			ra.style.setProperty("display","none");	
		}
	}	
}
