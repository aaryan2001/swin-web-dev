/**
* Author: aaryan
* Target: quiz.html
* Purpose: validate answers
* Credits: aaryan
*/

"use strict";
//to store info
var studentid = localStorage.getItem("studentid");
var pass = localStorage.getItem(studentid);

//to go back
function cancelme() {
    window.location = "quiz.html";
}
//showing data
function showDisplay() {
    document.getElementById("resultname").textContent = localStorage.getItem("firstname") + " " + localStorage.getItem("lastname");
    document.getElementById("resultid").textContent = localStorage.getItem("studentid");
    document.getElementById("resultscore").textContent = localStorage.getItem("score");
    document.getElementById("resultat").textContent = (2 - pass);    

    document.getElementById("firstname").value = localStorage.getItem("firstname");
    document.getElementById("lastname").value = localStorage.getItem("lastname");
    document.getElementById("studentid").value = localStorage.getItem("studentid");
    document.getElementById("score").value = localStorage.getItem("score");
    document.getElementById("pass").value = localStorage.getItem("pass");
    
}
//to hide the button
function nobutton() {
    alert("hidden");
    alert(pass);
    if (pass < 1){
        document.getElementById("cancel").remove();
    }
}

function validate () {
    var errMsg = "";
    var result = true;

    return result;
}

//initiate the programme
function init() {
	alert("hello, welcome to your result page in order to take the test again please select retry.");
    var reset = document.getElementById("cancel");
    reset.onclick = cancelme;
    showDisplay();
    alert("okok")
    nobutton();
}

window.onload = init;
