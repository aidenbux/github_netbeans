"use strict";
//9/9/21- created this page to house contact info gatherer -AidenB
//9/16/21- added regex & touched up on code & phone element-AidenB

const $ = selector => document.querySelector(selector);

const processEntries = () => {
    const nameC = $("#nameC");
    const emailC = $("#emailC");
    const phoneC = $("#phoneC");
    const commentC = $("#commentC");
    var validEmailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/; //regex
    var validPhoneRegex = /^\d{3}-\d{3}-\d{4}$/; //regex
    let isValid = true;

    if (nameC.value == "") { 
        nameC.nextElementSibling.textContent = "Please enter name.";
        isValid = false;
    } else {
        nameC.nextElementSibling.textContent = "";
    }

    if (!emailC.value.match(validEmailRegex)) { //regex
        emailC.nextElementSibling.textContent = "Enter your Email and in a valid format.";
        isValid = false;
    } else {
        emailC.nextElementSibling.textContent = "";
    }

    if (!phoneC.value.match(validPhoneRegex)) { //regex
        phoneC.nextElementSibling.textContent = "Please enter phone # in valid ###-###-#### format.";
        isValid = false;
    } else {
        phoneC.nextElementSibling.textContent = "";
    }

    if (commentC.value == "") {
        commentC.nextElementSibling.nextElementSibling.textContent = "Please enter comments.";
        isValid = false;
    }  else {
        commentC.nextElementSibling.nextElementSibling.textContent = "";
    }


    if (isValid == true) {
        $("#contactForm").submit();
        }
};

document.addEventListener("DOMContentLoaded", () => {
    $("#submitForm").addEventListener("click", processEntries);
    $("#reset").addEventListener("click", resetForm);  
    $("#name").focus();   
});

const resetForm = () => {
    $("#nameC").value = "";
    $("#emailC").value = "";
    $("#phoneC").value = "";
    $("#commentC").value = "";

    $("#nameC").focus();
};
