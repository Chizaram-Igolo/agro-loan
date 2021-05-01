function _(elemID) {
  return document.getElementById(elemID);
}

window.onload = initAll;

var xhr = false;
var xhr2 = false;

var coursesArray = new Array();
var institutionsArray = new Array();
var degreesArray = new Array();

function initAll() {
 // initAll_1();
 //  initAll_2();
 // initAll_3();
}

function initAll_1() {
  document.getElementById("courseField").onkeyup = searchSuggest;
  if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
  }  else {
    if (window.ActiveXObject) {
      try {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e) {}
    }
  }

  if (xhr) {
    xhr.onreadystatechange = setCoursesArray;
    xhr.open("GET", "./includes/courses.xml", true);
    xhr.send(null);
  } else {
    alert("Sorry, but I couldn't create an XMLHttpRequest");
  }
}

function initAll_2() {
  document.getElementById("institutionField").onkeyup = searchSuggest2;
  if (window.XMLHttpRequest) {
    xhr2 = new XMLHttpRequest();
  }  else {
    if (window.ActiveXObject) {
      try {
        xhr2 = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e) {}
    }
  }

  if (xhr2) {
    xhr2.onreadystatechange = setInstitutionsArray;
    xhr2.open("GET", "./includes/institutions.xml", true);
    xhr2.send(null);
  } else {
    alert("Sorry, but I couldn't create an XMLHttpRequest 2");
  }
}

function initAll_3() {
  document.getElementById("degreeField").onkeyup = searchSuggest3;
  if (window.XMLHttpRequest) {
    xhr3 = new XMLHttpRequest();
  }  else {
    if (window.ActiveXObject) {
      try {
        xhr3 = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e) {}
    }
  }

  if (xhr3) {
    xhr3.onreadystatechange = setDegreesArray;
    xhr3.open("GET", "./includes/degrees.xml", true);
    xhr3.send(null);
  } else {
    alert("Sorry, but I couldn't create an XMLHttpRequest 3");
  }
}

function setCoursesArray() {
  if (xhr.readyState == 4) {
    if (xhr.status == 200) {
      if (xhr.responseXML) {
        var allItems = new Array();
        allItems = xhr.responseXML.getElementsByTagName("item");
        for (var i = 0; i < allItems.length; i++) {
          coursesArray[i] = allItems[i].firstChild;
        //document.write(allItems[i + 1].firstChild.nodeValue);
        }
      }
    } else {
      var outMsg = "There was a problem with the request " + xhr.status;
    }
  } 
}

function setInstitutionsArray() {
  if (xhr2.readyState == 4) {
    if (xhr2.status == 200) {
      if (xhr2.responseXML) {
        var allItems = new Array();
        allItems = xhr2.responseXML.getElementsByTagName("item");
        for (var i = 0; i < allItems.length; i++) {
          institutionsArray[i] = allItems[i].firstChild;
        //document.write(allItems[i + 1].firstChild.nodeValue);
        }
      }
    } else {
      var outMsg = "There was a problem with the request " + xhr.status;
    }
  } 
}

function setDegreesArray() {
  if (xhr3.readyState == 4) {
    if (xhr3.status == 200) {
      if (xhr3.responseXML) {
        var allItems = new Array();
        allItems = xhr3.responseXML.getElementsByTagName("item");
        for (var i = 0; i < allItems.length; i++) {
          degreesArray[i] = allItems[i].firstChild;
        //document.write(allItems[i + 1].firstChild.nodeValue);
        }
      }
    } else {
      var outMsg = "There was a problem with the request " + xhr.status;
    }
  } 
}

function searchSuggest() {
  var str = document.getElementById("courseField").value;
  document.getElementById("courseField").className = "";
  if (str != "") {
    document.getElementById("popups").innerHTML = "";
    
    for (var i = 0; i < coursesArray.length; i++) {
      var thisCourse = coursesArray[i].nodeValue;
        
      if (thisCourse.toLowerCase().indexOf(str.toLowerCase()) == 0) {
        var tempDiv = document.createElement("div");
        tempDiv.innerHTML = thisCourse;
        tempDiv.onclick = makeChoice;
        tempDiv.className = "suggestions";
          
         if (document.getElementById("popups").childNodes.length < 5) {
           document.getElementById("popups").appendChild(tempDiv);
        }
      }
    }//courseField
    var foundCt = document.getElementById("popups").childNodes.length;
    if (foundCt == 0) {
       document.getElementById("courseField").className = "error";   
    }
    /* if (foundCt == 1) {
       document.getElementById("courseField").value = document.getElementById("popups").firstChild.innerHTML; 
       document.getElementById("popups").innerHTML = "";
    } */
  }
}

function searchSuggest2() {
  var str = document.getElementById("institutionField").value;
  document.getElementById("institutionField").className = "";
  if (str != "") {
    document.getElementById("popups_institution").innerHTML = "";
    
    for (var i = 0; i < institutionsArray.length; i++) {
      var thisInstitution = institutionsArray[i].nodeValue;
        
      if (thisInstitution.toLowerCase().indexOf(str.toLowerCase()) == 0) {
        var tempDiv = document.createElement("div");
        tempDiv.innerHTML = thisInstitution;
        tempDiv.onclick = makeChoice2;
        tempDiv.className = "suggestions";
          
         if (document.getElementById("popups_institution").childNodes.length < 5) {
           document.getElementById("popups_institution").appendChild(tempDiv);
        }
      }
    }//courseField
    var foundCt = document.getElementById("popups").childNodes.length;
    if (foundCt == 0) {
       document.getElementById("institutionField").className = "error";   
    }
    /* if (foundCt == 1) {
       document.getElementById("institutionField").value = document.getElementById("popups_institution").firstChild.innerHTML; 
       document.getElementById("popups_institution").innerHTML = ""; 
    }  */
  }
}
function searchSuggest3() {
  var str = document.getElementById("degreeField").value;
  document.getElementById("degreeField").className = "";
  if (str != "") {
    document.getElementById("popups_degree").innerHTML = "";
    
    for (var i = 0; i < degreesArray.length; i++) {
      var thisDegree = degreesArray[i].nodeValue;
        
      if (thisDegree.toLowerCase().indexOf(str.toLowerCase()) == 0) {
        var tempDiv = document.createElement("div");
        tempDiv.innerHTML = thisDegree;
        tempDiv.onclick = makeChoice3;
        tempDiv.className = "suggestions";
          
         if (document.getElementById("popups_degree").childNodes.length < 5) {
           document.getElementById("popups_degree").appendChild(tempDiv);
        }
      }
    }//courseField
    var foundCt = document.getElementById("popups_degree").childNodes.length;
    if (foundCt == 0) {
       document.getElementById("degreeField").className = "error";   
    }
    /* if (foundCt == 1) {
       document.getElementById("institutionField").value = document.getElementById("popups_institution").firstChild.innerHTML; 
       document.getElementById("popups_institution").innerHTML = ""; 
    }  */
  }
}

function makeChoice(evt) {
  var thisDiv = (evt) ? evt.target:window.event.srcElement;
  document.getElementById("courseField").value = thisDiv.innerHTML;
  document.getElementById("popups").innerHTML = "";
}

function makeChoice2(evt) {
  var thisDiv = (evt) ? evt.target:window.event.srcElement;
  document.getElementById("institutionField").value = thisDiv.innerHTML;
  document.getElementById("popups_institution").innerHTML = "";
}

function makeChoice3(evt) {
  var thisDiv = (evt) ? evt.target:window.event.srcElement;
  document.getElementById("degreeField").value = thisDiv.innerHTML;
  document.getElementById("popups_degree").innerHTML = "";
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
	

	  // Tells whether an object has been dropped in the drop zone.
	  var droppedIn = false;
	  
	  function drag_start(event) {
	    //_("app_status").innerHTML = "Dragging the " + event.target.id;
		event.dataTransfer.dropEffect = "move";
		event.dataTransfer.setData("text", event.target.getAttribute("id"));
	  }
	  
	  function drag_enter(event) {
	   // _("app_status").innerHTML = "You are dragging over the " + event.target.getAttribute("id");
	  }
	
	  function drag_leave(event) {
	    //_("app_status").innerHTML = "You left the " + event.target.getAttribute("id"); 
	  } 
	  
	  function drag_drop(event) {
	    event.preventDefault();
		var elem_id = event.dataTransfer.getData("text");
		//var newElem = document.createElement.
		event.target.appendChild(_(elem_id));
		//_("app_status").innerHTML = "Dropped " + elem_id + " into the" + event.target.getAttribute("id");
	    //_(elem_id).removeAttribute("draggable");
		//_(elem_id).style.cursor = "default";
		droppedIn = true;
	  }
	  
	  function drag_end(event) {
	    if (droppedIn == true) {
		  //_("app_status").innerHTML = "You let the " + event.target.getAttribute('id') + " go.";
		}
		//droppedIn = false;
	  }
	  function readDropZone(){
	    for (var i = 0; i < _("drop_zone").childNodes.length; i++){
		  //  alert(_("drop_zone").children[i].id + " is in the drop zone");
		}
		// Run Ajax request
	  }
	  
	  function doNothing(event){
	    event.target.removeChild(_(elem_id));
	  }

$("#minimizerSpanBtn1").click(function(){
  $("#formDiv1").toggle();
  if (_("minimizerSpanBtn1").firstChild.nodeValue == "-") {
    $("#minimizerSpanBtn1").text("+");
  } else if (_("minimizerSpanBtn1").firstChild.nodeValue == "+") {
    $("#minimizerSpanBtn1").text("-");
  }
});

$("#minimizerSpanBtn2").click(function(){
  $("#formDiv2").toggle();
  if (_("minimizerSpanBtn2").firstChild.nodeValue == "-") {
    $("#minimizerSpanBtn2").text("+");
  } else if (_("minimizerSpanBtn2").firstChild.nodeValue == "+") {
    $("#minimizerSpanBtn2").text("-");
  }
});

$("#minimizerSpanBtn3").click(function(){
  $("#formDiv3").toggle();
  if (_("minimizerSpanBtn3").firstChild.nodeValue == "-") {
    $("#minimizerSpanBtn3").text("+");
  } else if (_("minimizerSpanBtn3").firstChild.nodeValue == "+") {
    $("#minimizerSpanBtn3").text("-");
  }
});
