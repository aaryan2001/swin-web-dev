
/**
* Author: aaryan
* Target: quiz.html
* Purpose: validate answers
* Credits: aaryan
*/
"use strict";

var result = true;


//to store the score
function storeScore(firstname,lastname,studentid,score,result){

	if(localStorage.getItem(studentid) == undefined){
		localStorage.setItem(studentid, pass = 1);
		localStorage.setItem("lastname", lastname = lastname);
		localStorage.setItem("firstname", firstname = firstname);
		localStorage.setItem("studentid", studentid = studentid);
		localStorage.setItem("score", score = score);
		localStorage.setItem("result", result = result);
	
	}
	else{
		if (localStorage.getItem(studentid)<1){
			alert("you have attempted the quiz for 2 times already and you cant take it again, sorry.");
			result=false;
		}
		else{
				var pass = localStorage.getItem(studentid);
				pass -=1;

				localStorage.setItem(studentid, pass);

		}
	}
	return result;

}
//to calculate score
function calcmarks(ans1, ans2, ans3, ans4, ans51, ans52, ans53, ans54, ans6) {
	var score = 0;
	var answer1 = "Standard Generalized Markup Language";
	var answer2 = "extensible markup language";
	var answer3 = "FALSE";
	var answer4 = "TRUE";

	if (ans1 == answer1) {
		score = score + 2;
	}
	if (ans2 == answer2) {
		score = score + 2;
	}
	if (ans3 == answer3) {
		score = score + 2;
	}
	if (ans4 == answer4) {
		score = score + 2;
	}
	if (ans51) {
	score = score - 1;
	}
	if (ans52) {
	score = score + 1;
	}
	if (ans53) {
	score = score + 1;
	}
	if (ans54) {
	score = score - 1;
	}
	if (ans6) {
	score = score + 2;
	}

	return score;
}
//to execute the whole programme
function validate(){

	var errMsg = "";							
	var result = true;								 
	var firstname = document.getElementById("firstname").value;
	var lastname = document.getElementById("lastname").value;
	var studentid = document.getElementById("studentid").value;
	var lol1 = document.getElementById("partmark1").checked;
	var lol2 = document.getElementById("partmark2").checked;
	var lol3 = document.getElementById("partmark3").checked;
	var lol4 = document.getElementById("partmark4").checked;
	if (!lol1 && !lol2 && !lol3 && !lol4) {
		errMsg = errMsg + "please select atleast one option\n";
		result = false;
	}

	var ok1 = document.getElementById("sgmlmark").value;
	if(ok1 == "op1"){
		errMsg = errMsg + "please select true or false\n";
		result = false;
	}
	var ok2 = document.getElementById("sxpart").value;
	if(ok2 == "op2"){
		errMsg = errMsg + "please select true or false\n";
		result = false;
	}

	var sgmlques = document.getElementById("sgml").value;
	var xmlques = document.getElementById("xml").value;
	var sgmlmark = document.getElementById("sgmlmark").value;
	var sxpart = document.getElementById("sxpart").value;
	var partmark1 = document.getElementById("partmark1").checked;
	var partmark2 = document.getElementById("partmark2").checked;
	var partmark3 = document.getElementById("partmark3").checked;
	var partmark4 = document.getElementById("partmark4").checked;
	var bus = document.getElementById("bus").checked;


	var score = calcmarks(sgmlques,xmlques,sgmlmark,sxpart,partmark1,partmark2,partmark3,partmark4,bus);

		if (score < 1){
			result = false;
			alert("your marks are less than 0. please check your answers.")
		}


	if (errMsg != ""){
		alert(errMsg);
	}

	if(result){
		alert("your score is " + score);
		result = storeScore(firstname,lastname,studentid,score,result);

	}


	return result;
}
//starting the programme
function init(){ 
	alert("HELLO, THIS FORM HAS A AUTOMATIC 5 MIN TIMER THAT WORKS IN BACKGROUND, SO CHOP CHOP BE QUICK.")
	var regForm = document.getElementById("regform");// get ref to the HTML element
	regForm.onsubmit = validate; //register the event listener

}

window.addEventListener('load',init);
