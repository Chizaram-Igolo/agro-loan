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
  textSize();
  textColor();
}

/* This function selects the highlighted text within the textarea object. */
function selectText3() {
  if (window.getSelection) {
    theText = window.getSelection().toString();
    alert(theText);
  } else if (document.getSelection) {
    theText =  document.getSelection();
    alert(theText);
  } else if (document.getSelection && document.selection.createRange) {
    theText = document.selection.createRange().text;
    alert(theText);
  } 
}


function selectText(evt) {
  // Capture the target element first.
  if (evt.srcElement) {
    elem = evt.srcElement;
    startOfText = elem.selectionStart;
    endOfText = elem.selectionEnd;
    theText = elem.value.substring(startOfText, endOfText);
    beforeSelText = elem.value.slice(0, startOfText);
    afterSelText = elem.value.slice(endOfText);
    newText = beforeSelText + theText.value.bold() + afterSelText;
    elem.value = newText;
  } else if (evt.target) {
    elem = evt.target;
    startOfText = elem.selectionStart;
    endOfText = elem.selectionEnd;
    theText = elem.value.substring(startOfText, endOfText);
  } else {
    elem = null;
  }
}

  /* if (window.getSelection) {
    theText = window.getSelection().toString();
  } else if (document.getSelection) {
    theText =  document.getSelection();
  } else if (document.getSelection && document.selection.createRange) {
    theText = document.selection.createRange().text;
  } */

function clearValues() {
  elem = "";
  startOfText = "";
  endOfText = "";
  theText = "";   
}

/* If 'theText' is a valid object, we try to format it. */
function makeTextBold() {
  richTextField.document.execCommand('bold', false, null);
}

function makeTextItalics() {
  richTextField.document.execCommand('italic', false, null);
}
    
function underlineText() {
  richTextField.document.execCommand('underline', false, null);
}

function strikeThroughText() {
  richTextField.document.execCommand('strikethrough', false, null);
}

function increaseTextSize() {
  var size = prompt('Enter a size 1-7', '');
  richTextField.document.execCommand('FontSize', false, size);
}

function textSize() {
  var size_default = 4;
  richTextField.document.execCommand('FontSize', false, size_default);
}

function textColor() {
  richTextField.document.execCommand('ForeColor', false, '#555');
}

function makeBulletList() {
  richTextField.document.execCommand('InsertUnorderedList', false, "newUL");
}

function indent() {
  richTextField.document.execCommand('Indent', false, null);
}

function alignLeft() {
  richTextField.document.execCommand('JustifyLeft', false, null);
}

function alignCenter() {
  richTextField.document.execCommand('JustifyCenter', false, null);
}

function alignRight() {
  richTextField.document.execCommand('JustifyRight', false, null);
}

function justify() {
  richTextField.document.execCommand('Justify', false, null);
}

function insertLink() {
  var linkURL = prompt('Enter the URL for this link:', 'http://');
  richTextField.document.execCommand('CreateLink', false, linkURL);
}

function insertImage() {
  var imageSource = prompt('Enter the image location:', 'http://');
  if (imageSource != null) {
    richTextField.document.execCommand('insertImage', false, imageSource);
  }
}

function submit_form() {
  var questionForm = document.getElementById("questionForm");
  questionForm.elements["questionContent"].value = window.frames['richTextField'].document.body.innerHTML;
  questionForm.submit();
}

function submit_form_2() {
  var ans_comm_form = document.getElementById("commentsDiv");
  ans_comm_form.elements["ans_comm_Content"].value = 
  window.frames['richTextField'].document.body.innerHTML;
  ans_comm_form.submit();
}