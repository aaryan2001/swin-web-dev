/**
* Author: AARYAN PUJARA
* Target: register.html
* Purpose: answers
* Credits: AARYAN PUJARA
*/
"use strict";

function getSpecies() {
	var speciesName = "Unknown";
	var speciesArray = document.getElementById("species").getElementsByTagName("input");
	for(var i = 0; i < speciesArray.length; i++) {
	if(speciesArray[i].checked) 
			speciesName = speciesArray[i].value;
	}
	return speciesName;
}

function checkSpeciesAge(age) {
	var errMsg = "";
	var species = getSpecies();
	switch(species) {
		case "Human":
			if (age>120) {
				errMsg = "you cant be a human and over 120\.n";
			}
			break;
			case "Dwarf":
			case "Hobbit":
				if (age > 150) {
						errMsg = "you cant be " + species + "and over 150, you moron.\n";
				}
				break;
			case "Elf":
			break;
			default:
				errMsg = "you cant5 afford this trip, lol.\n";
	}
	return errMsg;
}

function validate() {
	var errMsg ="";
	var result = true;
	var firstname = document.getElementById("firstname").value;
	if (!firstname.match(/^[a-zA-Z]+$/)) {
		errMsg = errMsg + " your first should only contain alpha charecs\n"
		result = false;
	}
	var lastname = document.getElementById("lastname").value;
	if (!lastname.match(/^[a-zA-Z]+$/)) {
		errMsg = errMsg + " your last should only contain alpha charecs\n"
		result = false;
	}
	var age = document.getElementById("age").value;
	if (isNaN(age)) {
		errMsg = errMsg + "age must be a number\n"
		result = false;
	}
		else if (age < 18) {
			errMsg = errMsg + "your age must be 18\n"
		}
		else if (age >= 10000) {
			errMsg = errMsg + "your age must be less than 10,000\n"
		}
		else {
			var tempMsg = checkSpeciesAge(age);
			if(tempMsg !=""){
				errMsg = errMsg + tempMsg
					result = false;
			};
		}


			
	var partySize = document.getElementById("partySize").value;
	if (isNaN(partySize)) {
		errMsg = errMsg + "number of travlers must be a number\n"
		result = false;
	}
		else if (partySize < 1) {
			errMsg = errMsg + "partySize must be 1 or more\n"
		}
		else if (partySize >= 1000) {
			errMsg = errMsg + "partySize must be less or equal to 1000\n"
		}
	
	if(document.getElementById("food").value == "none") {
		errMsg = errMsg + "you must select a food";
		result = false;
	}
	var is1day = document.getElementById("1day").value;
    var is4day = document.getElementById("4day").value;
	var is10day = document.getElementById("10day").value;
	if (!(is1day || is4day || is10day)) {
		errMsg += "pls select at least one trip.\n";
		result = false;
	}
	
	var ishuman = document.getElementById("human").value;
    var isdwarf = document.getElementById("dwarf").value;
	var iself = document.getElementById("elf").value;
	var ishobbit = document.getElementById("hobbit").value;
	
	if (!(ishuman || isdwarf || iself || ishobbit)) {
		errMsg += "pls select at least one species.\n";
		result = false;
	}
	
	
	if (errMsg != ""){
		alert(errMsg);
	}
	
	
	if (result) {
		storeBooking(firstname, lastname, age, species, is1day, is4day, is10day)
	}
	
	return result;
}
function storeBooking(firstname, lastname, age, species, is1day, is4day, is10day){
	var trip = "";
	if(is1day) trip = "1day";
	if(is4day) trip = ", 4day";
	if(is10day) trip = ", 10day";
	sessionStorage.trip = trip;
	sessionStorage.firstname = firstname;
	sessionStorage.lastname = lastname;
	sessionStorage.age = age;
	sessionStorage.species = species;

	
	sessionStorage.food = food;
	sessionStorage.partySize = partySize;
	alert ("trip stored: " +sessionStorage.trip);
}
function prefill_form(){
	if(sessionStorage.firstname !=undefined){
		document.getElementById("firstname").value = sessionStorage.firstname;
		switch(localStorage.species){
			case "Human":
			document.getElementById("human").checked = true;
			break;
			case "Dwarf":
			document.getElementById("dwarf").checked = true;
			break;
			case "Hobbit":
			document.getElementById("hobbit").checked = true;
			break;
			case "Elf":
			document.getElementById("elf").checked = true;
			break;
		}
	}
}

			
			
function init() {
	var regForm = document.getElementById("regform");// get ref to the HTML element
	regForm.onsubmit = validate; //register the event listener
	prefill_form()
	
}
window.onload = init;



				
