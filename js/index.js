function _(elemID) {
  return document.getElementById(elemID);
}

function fadeError(){
  $("#errorBasket").fadeOut(4000);
}

function fadeError2(){
  $("#errorStat").fadeOut(4000);
}

/* function fadeFirstOut(){
  $("#backgroundDiv3").fadeOut(3000, function(){setTimeout(fadeSecondOut, 4000)});
}

function fadeSecondOut(){
  $("#backgroundDiv2").fadeOut(3000, function(){setTimeout(fadeFirstIn, 4000)});
}

function fadeFirstIn(){
  $("#backgroundDiv2").fadeIn(3000, function(){setTimeout(fadeSecondIn, 4000)});
}

function fadeSecondIn(){
  $("#backgroundDiv3").fadeIn(3000, function(){setTimeout(fadeFirstOut, 4000)});
} */

$(document).ready(function(){
  setTimeout(fadeError, 2000);
  setTimeout(fadeError2, 2000);
   // setTimeout(fadeFirstOut, 4000);
    $("section").fadeIn(4000);
 });
 
 




  






