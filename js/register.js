function _(elemID) {
  return document.getElementById(elemID);
}

window.onload = init;

function init() {

 if (_("formUsername")){
   validateUserName();
 }
 
 if (_("formInstitution")){
   _("formInstitution").onchange = getData;
   _("formInstitution").onfocus = clearMsg;
}

 if (_("formFaculty")){
   _("formFaculty").onchange = getDepartments;
   _("formFaculty").onfocus = clearMsg;
}
    
if (_("formDepartment")){
   _("formDepartment").onfocus = clearMsg;
}    
    
if (_("formFirstname")){
   _("formFirstname").onfocus = clearMsg;
}
        
if (_("formLastname")){
   _("formLastname").onfocus = clearMsg;
}

//_("formUsername").onchange = validateUserName;
 if (_("formUsername")){
   _("formUsername").onblur = validateUserName;
   _("formUsername").onfocus = clearMsg;
 }

  if (_("formEmail")){
   _("formEmail").onchange = validateEmail;
   _("formEmail").onblur = validateEmail;
   _("formEmail").onfocus = clearMsg;
 }
 
  if (_("formEmail")){
    _("formPassword").onkeyup = checkPassword;
    _("formPassword").onchange = validatePassword;
    _("formPassword").onfocus = clearMsg;
    _("formPassword").onchange = donePass;  
  }
}

function validatePassword(){
  var password = _("formPassword").value;
  var passStat = _("passStat");
  
  // Ensure that the user's password isn't shorter than six characters and has at least a number.
  if (password.length < 6 && (password.indexOf(0) == -1)) {
    passStat.innerHTML = "Your password should be at least six characters long and should contain a number.";
    passStat.style.background = "";
	passStat.style.paddingLeft = "0px";
	passStat.style.color = "#f44";
	passStat.style.fontSize = "0.9em";
  }
}  

function clearMsg(evt){
  // Cross-Browser support
  targetElem = evt.target ? evt.target : window.event.srcElement;
  if (targetElem == _("formUsername")) {
    _("usernameStat").innerHTML = "";
  } else if (targetElem == _("formEmail")) {
    _("emailStat").innerHTML = "";
  } else if (targetElem == _("formPassword")) {
    var passStat = _("passStat");
	passStat.innerHTML = "";
	passStat.style.paddingLeft = "90px";
	passStat.style.paddingBottom = "40px";
	passStat.style.color = "#888";
  } else if (targetElem == _("formInstitution")) {
    _("institutionStat").innerHTML = "";
  } else if (targetElem == _("formFaculty")) {
    _("facultyStat").innerHTML = "";
  } else if (targetElem == _("formDepartment")) {
    _("departmentStat").innerHTML = "";
  } else if (targetElem == _("formFirstname")) {
    _("firstnameStat").innerHTML = "";
  } else if (targetElem == _("formLastname")) {
    _("lastnameStat").innerHTML = "";
  }
    
}

function donePass(){
  // Set the graphical message below the password field to disappear
  passStat.innerHTML = "";
  passStat.style.background = "";
}

 function getData() { 
  // Create a XMLHttp Request Object and initialize it to false
  var xhr = false;

  if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
   
  var formInstitution = _("formInstitution");
  var formInstitution_value = formInstitution.options[formInstitution.selectedIndex].value;
  
   if (formInstitution_value) {
     // If xhr creation was successful.
     if (xhr && (formInstitution_value !== "")) {
	   xhr.open("GET", "./includes/faculty_options.php?formInstVal=" + formInstitution_value , true);
	   //xhr.setRequestHeader("Content-type", "application-x-www-form-urlencoded");
       xhr.send(null);
	   
	   xhr.onreadystatechange = function() {
	      if (xhr.readyState == 4 && xhr.status == 200){
	        _("formFaculty").innerHTML = xhr.responseText;
			_("formFaculty").style.borderColor = "#e8d853";
		    _("formFaculty").style.boxShadow = "0px 0px 3px #f8e853";

 		  }	
	   } 
	   //formInstitution_value = escape(formInstitution_value);
	
    } if (formInstitution_value === "") {
	  _("formFaculty").innerHTML = "";
	  _("formFaculty").style.borderColor = "#000";
	}
  }
}

 function getDepartments() { 
  // Create a XMLHttp Request Object and initialize it to false
  var xhr = false;

  if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
   
  var formFaculty = _("formFaculty");
  var formFaculty_value = formFaculty.options[formFaculty.selectedIndex].value;
  
   if (formFaculty_value) {
     // If xhr creation was successful.
     if (xhr && (formFaculty_value !== "")) {
	   xhr.open("GET", "./includes/department_options.php?formDeptVal=" + formFaculty_value , true);
	   //xhr.setRequestHeader("Content-type", "application-x-www-form-urlencoded");
       xhr.send(null);
	   
	   xhr.onreadystatechange = function() {
	      if (xhr.readyState == 4 && xhr.status == 200){
	        _("formDepartment").innerHTML = xhr.responseText;
			_("formDepartment").style.borderColor = "#e8d853";
		    _("formDepartment").style.boxShadow = "0px 0px 3px #f8e853";
			_("formFaculty").style.borderColor = "#d9d9d9";
		    _("formFaculty").style.boxShadow = "none";
 		  }	
	   } 
	   //formInstitution_value = escape(formInstitution_value);
	
    } if (formFaculty_value === "") {
	  _("formDepartment").innerHTML = "";
	  _("formDepartment").style.borderColor = "#000";
	}
  }
}

function validateUserName() {
  var username = _("formUsername").value;
  var usernameStat = _("usernameStat");
  
  if (username.length == 0) {
  } else if (username.length < 4) {
    usernameStat.innerHTML = "Username should be at least 4 characters long.";
	usernameStat.style.color = "#f44";
  } else if (username.indexOf('`') != -1) {
    usernameStat.innerHTML = "Username cannot contain the '`' character.";
	usernameStat.style.color = "#f44";
  } else {
  }
}

function resetMessages() {
    usernameStat.innerHTML = "This will be your username on this site. It should be at least 6 characters long and should contain at least a letter.";
    usernameStat.style.color = "#888";
}

function validateEmail(event) {
  event.preventDefault();
  var email = _("formEmail").value;
  var emailStat = _("emailStat");

// If the user does not include the @ symbol in the email address.
if (email.length > 0 && email.length < 6) {
emailStat.innerHTML = "Invalid email address. Too few characters!";
emailStat.style.color = "#f44";
} else if (email.length > 0 && email.indexOf("@") == -1) {
emailStat.innerHTML = "Invalid email address. Please include the '@' symbol.";
emailStat.style.color = "#f44";
} else if (email.length > 0 && !(email.indexOf("@") < (email.length - 3))) {
emailStat.innerHTML = "Invalid email address. Please include a valid domain.";
emailStat.style.color = "#f44";
} else {
emailStat.style.color = "#888";
}
}

function checkPassword(){
var password = _("formPassword").value;
var passStat = _("passStat");

if (password.length == 0) {
passStat.innerHTML = "Nothing";
passStat.style.background = "url('./styles/passstrength0.png') no-repeat left 2.4px";
} else if (password.length > 0 && password.length < 4) {
passStat.innerHTML = "Very weak";
passStat.style.background = "url('./styles/passstrength1.png') no-repeat left 2.4px";
} else if (password.length >= 4 && password.length <=6) {
passStat.innerHTML = "Weak";
passStat.style.background = "url('./styles/passstrength2.png') no-repeat left 2.4px";
} else if (password.length >= 7 && password.length < 9) {
passStat.innerHTML = "Medium";
passStat.style.background = "url('./styles/passstrength3.png') no-repeat left 2.4px";
} else if (password.length >= 8 && password.length < 10) {
passStat.innerHTML = "Strong";
passStat.style.background = "url('./styles/passstrength4.png') no-repeat left 2.4px";
} else if (password.length >= 10){
passStat.innerHTML = "Very Strong";
passStat.style.background = "url('./styles/passstrength5.png') no-repeat left 2.4px";
}
}
