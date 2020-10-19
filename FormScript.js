"use strict";
var $ = function(id) { return document.getElementById(id) };

var processRegisterEntries = function(){
    var isValid = true;
    var phoneNum = $("phone").value;
    if(phoneNum.match(/^\d{10}$/)){
	isValid = true;
	$("phone").nextElementSibling.firstChild.nodeValue = "";
    }
    else{
	$("phone").nextElementSibling.firstChild.nodeValue = " # must be in the format of xxx xxx xxxx";
        isValid = false;
    }


};
window.onload = function(){
    $("login").onclick = processEntries;
    $("register").onclick = processRegisterEntries;
}