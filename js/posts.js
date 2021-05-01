/* $(document).ready(function(){
$("#switchPostForm").click(function(){
  $("#postFormDiv").toggle("slow");
});
}); */

window.onload = init;

function init() {
	if (document.getElementById("recommend_button")) {
		document.getElementById("recommend_button").onclick = recommend;
	}
	if (document.getElementById("recommend_button")) {
		document.getElementById("recommend_button2").onclick = recommend2;
	}
}

/* function addComment() {
  var xhr = false;
  if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
	var comment = document.getElementById("commentText").value;
	 if (xhr) {
	  xhr.open("POST", "./scripts/add_comment.php");
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	 
			//document.getElementById("status").innerHTML = privateMessage;
	xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
		    var return_data = xhr.responseText;
			document.getElementById("commentSlate").innerHTML += return_data;
			
			// document.getElementById("status").innerHTML = "processing...";
	}
  }	
	xhr.send("comment=" + comment);
	}
} */

/* function recommend() {
  var xhr2 = false;
  
  if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  } 
  
  var comment = document.getElementById("");
  if (xhr) {
	  xhr.open("POST", "./scripts/add_comment.php");
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	 
			//document.getElementById("status").innerHTML = privateMessage;
	xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
		    var return_data = xhr.responseText;
			document.getElementById("commentSlate").innerHTML += return_data;
			
			// document.getElementById("status").innerHTML = "processing...";
	}
  }	
	xhr.send("comment=" + comment);
	}
} */
 
function recommend() {
  if (document.getElementById("recommend_button").style.background != "#999") {
  var xhr = false;  // Create variable

  if (window.XMLHttpRequest) {     // Check to see if browser supports the window.XMLHttpRequest object
    xhr = new XMLHttpRequest();    // Create new http request object.
  } else if (window.ActiveXObject) {  // Check to see if browser supports the window.ActiveXObject object
    xhr = new ActiveXObject("Microsoft.XMLHTTP");  // Create new http request object
  }
  
  var recommend_count = parseInt(document.getElementById("rec_val").value) + 1; 
  var comment_id = parseInt(document.getElementById("comment_id_val").value); 

	 if (xhr) {  // Check to see that the http request object exists to avoid the program from crashing.
	 xhr.open("GET", "./scripts/recommend.php?rec_count=" + recommend_count + "&comment_id=" + comment_id);  // Open a post request to send the text
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');  // Set the header of the request so that the webpage knows what to expect
	 
			//document.getElementById("status").innerHTML = privateMessage;
	xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
		document.getElementById("rec_count_span").innerHTML = "+" + xhr.responseText;
			
			// document.getElementById("status").innerHTML = "processing...";
		
	}
  }	
	xhr.send();
	}  
  document.getElementById("recommend_button").style.background = "#999";
}
} 

function recommend2() {
  if (document.getElementById("recommend_button2").style.background != "#999") {
  var xhr = false;  // Create variable
 
  if (window.XMLHttpRequest) {     // Check to see if browser supports the window.XMLHttpRequest object
    xhr = new XMLHttpRequest();    // Create new http request object.
  } else if (window.ActiveXObject) {  // Check to see if browser supports the window.ActiveXObject object
    xhr = new ActiveXObject("Microsoft.XMLHTTP");  // Create new http request object
  }
  
  var recommend_count2 = parseInt(document.getElementById("rec_val2").value) + 1; 
  var comment_id2 = parseInt(document.getElementById("comment_id_val2").value); 

	 if (xhr) {  // Check to see that the http request object exists to avoid the program from crashing.
	  xhr.open("GET", "./scripts/recommend.php?rec_count=" + recommend_count2 + "&comment_id=" + comment_id2); // Open a post request to send the text
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');  // Set the header of the request so that the webpage knows what to expect
	 
			//document.getElementById("status").innerHTML = privateMessage;
	xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
	//alert(document.getElementById("rec_count_span").innerHTML);
		document.getElementById("rec_count_span2").innerHTML = "+" + xhr.responseText;
		//	document.getElementById("rec_val").innerHTML = return_data;
			
			// document.getElementById("status").innerHTML = "processing...";
	}
  }	
	xhr.send();
	}
  document.getElementById("recommend_button2").style.background = "#999";
  } 
} 


