function _(elemID) {
  return document.getElementById(elemID);
}

window.onload = init;

var category = null;


/* Run this function when the page is done loading. */
function init() {
  _("appSciences").onclick = setCategory;
  _("entrepreneurship").onclick = setCategory;

  _("done1").onclick = send_category;
}

/* Extract id of the element involved in the event and use it to set the variable. */
function setCategory(evt) {
  
  if (evt.target.id == "appSciences") {
    category = "Applied Sciences";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("appSciences").style.backgroundColor = "#e0e0e4";
    _("appSciences").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "entrepreneurship") {
    category = "Enterpreneurship and Business Studies";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("entrepreneurship").style.backgroundColor = "#e0e0e4";
    _("entrepreneurship").style.border = "1px solid #cecedf";
  }
    
  if (category) {  
    //alert(category);
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
    xhr.open("POST", "./ask_a_question.php"); // Open a post request send the text
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Set the header of the request so that the webpage knows what to expect.
  } else { }
 
xhr.onreadystatechange = function(){ 
  if (xhr.readyState == 4 && xhr.status == 200) {
     
  }
}
  
  xhr.send("xhr_category=" + xhr_category);
}