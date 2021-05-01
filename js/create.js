function _(elemID) {
  return document.getElementById(elemID);
}

//window.onload = init;

var category = null;

/* Run this function when the page is done loading. */
function init() {
  _("createIllusHolder").onclick = setCategory;
  _("post").onclick = setCategory;
  _("question").onclick = setCategory;
}

/* Extract id of the element involved in the event and use it to set the variable. */
function setCategory(evt) {
  if (evt.target.id == "createIllusHolder") {
    category = "Projects";
  } else if (evt.target.id == "post") {
    category = "Posts";
  } else if (evt.target.id == "question") {
    category = "Question";
  }
    
  if (category) {  
    alert(category);
  }
}

function send_category() {
  var xhr = false; // Create variable
  if (window.XMLHttpRequest) {  // Check to see if browser supports this version of the window.XMLHttopRequest object.
    xhr = new XMLHttpRequest(); // Create new http request object.
  } else if (window.ActiveXObject) { // Check to see  if browser supports this version of the window.XMLHttpRequest object.
    xhr = new ActiveXObject("Microsoft.XMLHTTP"); // Create new http request object.
    
  }
  if (category) {
    var xhr_category = category;  // retrieve chosen category
  }
    
  if (xhr) { // Check to see that the http request object exists to avoid the program from crashing.
    xhr.open("POST", "./scripts/functions.php"); // Open a post request send the text
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Set the header of the request so that the webpage knows what to expect.
  }
 
  if (xhr.readyState == 4 && xhr.status == 200) {

  }
}

$(document).ready(function(){
$(function(){
  $("#imageHolder").click(function(){
    $("#picFile").click();
  });
  $("#imageHolder2").click(function(){
    $("#picFile2").click();
});
});
});

$(function(){
  $("#picFile").change(function(){
    //alert(document.getElementById("picFile").value);
	if ((document.getElementById("picFile").value.indexOf(".jpg") !== -1) || (document.getElementById("picFile").value.indexOf(".JPG"))) {
	  // $("#imageHolder").css("background", "#656565 url('./styles/jpg.png') no-repeat 50% 2px");
   	 document.getElementById("imgStatus").innerHTML = "<span style = 'display: inline-block; background-color: #e4e4e4; border: 1px solid #d3e5d3; border-left: 8px solid #458845; padding: 8px; color: #595; width: auto; margin: 10px auto 0px auto;'>" + "Image Selected</span>";
	  $("#imageHolder").css("color", "#fff");
	  $("#donePic1").click();
	}
	if ((document.getElementById("picFile").value.indexOf(".png") !== -1) || (document.getElementById("picFile").value.indexOf(".PNG"))) {
	  //$("#imageHolder").css("background", "#656565 url('./styles/png.png') no-repeat 50% 50%");
	  // document.getElementById("imageHolder").style.background = "#656565 url('./styles/png.png') no-repeat 50% 2px";
	  document.getElementById("imgStatus").innerHTML = "<span style = 'display: inline-block; background-color: #e4e4e4; border: 1px solid #d3e5d3; border-left: 8px solid #458845; padding: 8px; color:#595; width: inherit; margin: 10px auto 0px auto;'>" + "Image Selected</span>";
	  //$("#imageHolder").text($("#picFile").value);
	  $("#imageHolder").css("color", "#fff");
	}
    if ((document.getElementById("picFile").value.indexOf(".gif") !== -1) || (document.getElementById("picFile").value.indexOf(".GIF"))) {
	  //$("#imageHolder").css("background", "#656565 url('./styles/png.png') no-repeat 50% 50%");
	  // document.getElementById("imageHolder").style.background = "#656565 url('./styles/png.png') no-repeat 50% 2px";
	  document.getElementById("imgStatus").innerHTML = "<span style = 'display: inline-block; background-color: #e4e4e4; border: 1px solid #d3e5d3; border-left: 8px solid #458845; padding: 8px; color:#595; width: inherit; margin: 10px auto 0px auto;'>" + "Image Selected</span>";
	  //$("#imageHolder").text($("#picFile").value);
	  $("#imageHolder").css("color", "#fff");
	}
  });
});

$(function(){
  $("#picFile2").change(function(){
    //alert(document.getElementById("picFile2").value);
	if ((document.getElementById("picFile2").value.indexOf(".jpg") !== -1) || (document.getElementById("picFile2").value.indexOf(".JPG"))) {
	  // $("#imageHolder2").css("background", "#656565 url('./styles/jpg.png') no-repeat 50% 2px");
	  document.getElementById("imgStatus2").innerHTML = "<span style = 'display: inline-block; background-color: #e4e4e4; border: 1px solid #d3e5d3; border-left: 8px solid #458845; padding: 8px; color: #595; width: auto; margin: 10px auto 0px auto;'>" + "Image Selected</span>";
	  $("#imageHolder2").css("color", "#fff");
	  $("#donePic2").click();
	}
	if ((document.getElementById("picFile2").value.indexOf(".png") !== -1) || (document.getElementById("picFile2").value.indexOf(".PNG"))) {
	  //$("#imageHolder2").css("background", "#656565 url('./styles/png.png') no-repeat 50% 50%");
	  // document.getElementById("imageHolder2").style.background = "#656565 url('./styles/png.png') no-repeat 50% 2px";
	  document.getElementById("imgStatus2").innerHTML = "<span style = 'display: inline-block; background-color: #e4e4e4; border: 1px solid #d3e5d3; border-left: 8px solid #458845; padding: 8px; color:#595; width: inherit; margin: 10px auto 0px auto;'>" + "Image Selected</span>";
	  //$("#imageHolder2").text($("#picFile2").value);
	  $("#imageHolder2").css("color", "#fff");
	}
    if ((document.getElementById("picFile2").value.indexOf(".gif") !== -1) || (document.getElementById("picFile2").value.indexOf(".GIF"))) {
	  //$("#imageHolder2").css("background", "#656565 url('./styles/png.png') no-repeat 50% 50%");
	  // document.getElementById("imageHolder2").style.background = "#656565 url('./styles/png.png') no-repeat 50% 2px";
	  document.getElementById("imgStatus2").innerHTML = "<span style = 'display: inline-block; background-color: #e4e4e4; border: 1px solid #d3e5d3; border-left: 8px solid #458845; padding: 8px; color:#595; width: inherit; margin: 10px auto 0px auto;'>" + "Image Selected</span>";
	  //$("#imageHolder2").text($("#picFile2").value);
	  $("#imageHolder2").css("color", "#fff");
	}
  });
});