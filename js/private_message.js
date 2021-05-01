function _(elemID) {
  return document.getElementById(elemID);
}

var theText;
var textObj;
var elem;
var elemText;
var startOfText;
var endOfText;
var beforeSelText;
var afterSelText;
var newText;

window.onload = iframeOn;

function iframeOn() {
  richTextField.document.designMode = 'On';
}

function send_message() {
  var xhr = false;  // Create variable
  if (window.XMLHttpRequest) {     // Check to see if browser supports the window.XMLHttpRequest object
    xhr = new XMLHttpRequest();    // Create new http request object.
  } else if (window.ActiveXObject) {  // Check to see if browser supports the window.ActiveXObject object
    xhr = new ActiveXObject("Microsoft.XMLHTTP");  // Create new http request object
  }
	
  var privateMessage = document.getElementById("questionForm");
  questionForm.elements["messageText"].value = window.frames['richTextField'].document.body.innerHTML;
	
	var privateMessage = document.getElementById("messageText").value; // Retrieve text from the text area element
	 if (xhr) {  // Check to see that the http request object exists to avoid the program from crashing.
	  xhr.open("POST", "./scripts/send_message.php"); // Open a post request to send the text
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');  // Set the header of the request so that the webpage knows what to expect
	 
			//document.getElementById("status").innerHTML = privateMessage;
	xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
		    var return_data = xhr.responseText;
			document.getElementById("messageSlate").innerHTML += return_data;
			questionForm.elements["messageText"].value = "";
		    window.frames['richTextField'].document.body.value = "";
			// document.getElementById("status").innerHTML = "processing...";
	}
  }	
	xhr.send("messageContent=" + privateMessage);
	}
}
