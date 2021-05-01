function _(elemID) {
  return document.getElementById(elemID);
}

window.onload = initAll;

 if (window.addEventListener) {
  window.addEventListener('click', alert34);
  } else if (window.attachEvent) {
	  window.attachEvent('scroll', alert34);
  }

function initAll() {
}

function remove() {
  _("div_a").style.display = "none";
  _("div_back").style.display = "none";  
  _("div_a").parentNode.removeChild(_("div_a"));
  _("div_back").parentNode.removeChild(_("div_back"));
   if (window.removeEventListener) {
  window.removeEventListener('scroll', noscroll);
  } else if (window.removeEvent) {
	  window.removeEvent('scroll', noscroll);
  }
}

function set_pointer(e) {
 /* _(e.target.id).style.display = "none";
  _("div_a")
  _("div_back").style.display = "none"; */
}

function noscroll() {
  window.scrollTo(0,0);	
}

function alert35(e) {
  alert(e.target.id);	
}
	
function alert34(e) {
if (e.target.id.includes("close_account_span")) {
  var div_back = document.createElement("div");
  var div_a = document.createElement("div");
  var div_p = document.createElement("p");
  var div_b = document.createElement("div");
  var div_b1 = document.createElement("div");
  var div_b2 = document.createElement("div");
  // var a_link = document.createElement("a");
  if (e.target.id.includes("close_account_span")) {
	 var post_id = e.target.id.substring(e.target.id.lastIndexOf('n') + 1);
     var node =  document.createTextNode("Are you sure you want to close this account? This action cannot be undone.");
  }
  var node_1 =  document.createTextNode("Yes");
  var node_2 = document.createTextNode("No");
  
  // a_link.href = href_link; 
  
 div_p.appendChild(node);
 div_b.appendChild(div_b1);
 div_b.appendChild(div_b2);
 // a_link.appendChild(div_b1);
 div_a.appendChild(div_p);
 div_a.appendChild(div_b);
 
 div_b.style.width = "100%";
 
 div_b1.style.float = "left";
 div_b1.style.width = "20%";
 div_b1.style.height = "30px";
 div_b1.style.background = "#6699da";
 div_b1.style.color = "#fff";
 div_b1.style.padding = "5px";
 div_b1.style.marginLeft = "29.5%";
 if (e.target.id.includes("close_account_span")) {
   div_b1.setAttribute("id", "close_account_yes" + post_id);
 } 
 div_b1.onclick = process;
 
 div_b1.style.cursor = "pointer";
 
 
 div_b1.appendChild(node_1);
 div_b2.appendChild(node_2);
 
  div_b2.style.float = "left";
  div_b2.style.width = "20%";
 div_b2.style.height = "30px";
 div_b2.style.background = "#6666ac";
 div_b2.style.marginLeft = "1%";
 div_b2.style.color = "#fff";
 div_b2.style.padding = "5px";
 div_b2.setAttribute("id", "no");
 div_b2.onclick = remove;
 div_b2.style.cursor = "pointer";
 
  
  div_p.style.padding = "20px";
  div_a.style.minWidth = "300px";
  div_a.style.width = "40%";
  div_a.style.margin = "0px 30%";
  div_a.style.minHeight = "100px";
  div_a.style.padding = "10px 0px";
  div_a.style.border = "1px solid #dadada";
  div_a.style.position = "fixed";  
  div_a.style.top = "200px";
  div_a.style.background = "#fff";
  div_a.style.boxShadow = "2px 2px 55px #aaa";
  div_a.style.textAlign = "center";
  div_a.style.zIndex = "400";
  
  div_a.style.opacity = "1";
  
  div_back.style.position = "fixed"; 
  div_back.style.width = "100%"; 
  div_back.style.height = "100%";
  
  div_back.style.border = "0px solid";
  div_back.style.background = "#222";
  div_back.style.opacity = ".1";
  
  div_a.style.opacity = "1";
  div_back.style.zIndex = "300";
  
  div_a.setAttribute("id", "div_a");
  
  div_back.setAttribute("id", "div_back");
  
  _("section").appendChild(div_back);
  
  _("section").appendChild(div_a);
  
  if (window.addEventListener) {
  window.addEventListener('scroll', noscroll);
  } else if (window.attachEvent) {
	  window.attachEvent('scroll', noscroll);
  }
}
}

function process(e) {
_("div_a").style.display = "none";
  _("div_back").style.display = "none";  
  _("div_a").parentNode.removeChild(_("div_a"));
  _("div_back").parentNode.removeChild(_("div_back"));
   if (window.removeEventListener) {
  window.removeEventListener('scroll', noscroll);
  } else if (window.removeEvent) {
	  window.removeEvent('scroll', noscroll);
  }
  
  var xhr = false;  // Create variable
  if (window.XMLHttpRequest) {     // Check to see if browser supports the window.XMLHttpRequest object
    xhr = new XMLHttpRequest();    // Create new http request object.
  } else if (window.ActiveXObject) {  // Check to see if browser supports the window.ActiveXObject object
    xhr = new ActiveXObject("Microsoft.XMLHTTP");  // Create new http request object
  }
	
  if (e.target.id.includes("close_account")) {
	var todo = "close_account";
  } 
  var user_id = e.target.id.substring(e.target.id.lastIndexOf("s") + 1);

	// var privateMessage = document.getElementById("messageText").value; // Retrieve text from the text area element
	 if (xhr) {  // Check to see that the http request object exists to avoid the program from crashing.
	  xhr.open("POST", "./scripts/process_close_account.php"); // Open a post request to send the text
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');  // Set the header of the request so that the webpage knows what to expect
	 
			//document.getElementById("status").innerHTML = privateMessage;
	xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
		     var return_data = xhr.responseText;
			document.getElementById("mainBodyWrapper").innerHTML = return_data;
			// questionForm.elements["messageText"].value = "";
		   // window.frames['richTextField'].document.body.value = "";
			// document.getElementById("status").innerHTML = "processing...";
	}
  }	
	xhr.send("user_id=" + user_id + "&todo=" + todo);
	}
}
