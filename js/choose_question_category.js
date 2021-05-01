function _(elemID) {
  return document.getElementById(elemID);
}

window.onload = init;

var category = null;


/* Run this function when the page is done loading. */
function init() {
  _("appSciences").onclick = setCategory;
  _("entrepreneurship").onclick = setCategory;
  _("engineering").onclick = setCategory;
  _("ict").onclick = setCategory;
  _("envTech").onclick = setCategory;
  _("agricTech").onclick = setCategory;
  _("sportsCat").onclick = setCategory;
  _("fashion").onclick = setCategory;
  _("politicsCat").onclick = setCategory;
  _("musicCat").onclick = setCategory;
  _("literature").onclick = setCategory;
  _("art").onclick = setCategory;
  _("tech").onclick = setCategory;
  _("food").onclick = setCategory;
  _("finance").onclick = setCategory;
  _("health").onclick = setCategory;

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
  } else if (evt.target.id == "engineering") {
    category = "Engineering";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("engineering").style.backgroundColor = "#e0e0e4";
    _("engineering").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "ict") {
    category = "Information and Communication Engineering";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("ict").style.backgroundColor = "#e0e0e4";
    _("ict").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "envTech") {
    category = "Environmental Technology";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("envTech").style.backgroundColor = "#e0e0e4";
    _("envTech").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "agricTech") {
    category = "Agricultural Technology";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("agricTech").style.backgroundColor = "#e0e0e4";
    _("agricTech").style.border = "1px solid #cecedf";
  } 
  
  if (evt.target.id == "sportsCat") {
    category = "Sports";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("sportsCat").style.backgroundColor = "#e0e0e4";
    _("sportsCat").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "fashion") {
    category = "Fashion";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("fashion").style.backgroundColor = "#e0e0e4";
    _("fashion").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "politicsCat") {
    category = "Politics";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("politicsCat").style.backgroundColor = "#e0e0e4";
    _("politicsCat").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "musicCat") {
    category = "Music";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("musicCat").style.backgroundColor = "#e0e0e4";
    _("musicCat").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "literature") {
    category = "Literature";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("literature").style.backgroundColor = "#e0e0e4";
    _("literature").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "art") {
    category = "Art";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("art").style.backgroundColor = "#e0e0e4";
    _("art").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "tech") {
    category = "Technology";    
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("tech").style.backgroundColor = "#e0e0e4";
    _("tech").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "food") {
    category = "Food";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("food").style.backgroundColor = "#e0e0e4";
    _("food").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "finance") {
    category = "Finance";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("finance").style.backgroundColor = "#e0e0e4";
    _("finance").style.border = "1px solid #cecedf";
  } else if (evt.target.id == "health") {
    category = "Health";
    $("div#categoryDiv ul li").css("background-color", "#fff");
    $("div#categoryDiv ul li").css("border", "1px solid #e4e4e4");
    _("health").style.backgroundColor = "#e0e0e4";
    _("health").style.border = "1px solid #cecedf";
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