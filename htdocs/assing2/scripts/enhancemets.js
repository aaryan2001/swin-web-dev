/**
* Author: aaryan
* Target: quiz.html
* Purpose: validate answers
* Credits: aaryan
*/

"use strict";
//to make timer
function Timer(){
    alert("Time is up.");
    document.getElementById("submit").style.visibility = "hidden";
}
//executing the timer
function timeoutt(){
	    setTimeout(Timer,30000);
}
//initiating
function init(){
	alert("working")
	var button = document.getElementById("button");
	timeoutt();
}

window.onload = init;