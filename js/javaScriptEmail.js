"use strict";
//9/9/21- set aside this code for its own file. -AidenB
//9/10/21- fixed spelling error in line "if (email2.value == "")" rn 24 -AidenB
//9/16/21- added regex & touched up on code -AidenB

const $ = selector => document.querySelector(selector);

document.addEventListener("DOMContentLoaded", () => {
    $("#subscribe").addEventListener("click", () => {

        const email1 = $("#email_1");
        const email2 = $("#email_2");
        const yourName = $("#yourName");
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/; //regex
        
        let isValid = true;

        if (!email1.value.match(validRegex)) { //regex
            email1.nextElementSibling.nextElementSibling.textContent = "Enter your Email and in a valid format."; 
            isValid = false;
        } else {
            email1.nextElementSibling.nextElementSibling.textContent = "";
        }
    
        if (email2.value == "") { 
            email2.nextElementSibling.nextElementSibling.textContent = "Enter your Email again";
            isValid = false;
        } else {
            email2.nextElementSibling.nextElementSibling.textContent = "";
        }
    
        if (email1.value != email2.value) { 
            email1.nextElementSibling.nextElementSibling.textContent = "Emails must match.";
            isValid = false;
        } 
    
        if (yourName.value == "") {
            yourName.nextElementSibling.nextElementSibling.textContent = "Enter your name.";
            isValid = false;
        } else {
            yourName.nextElementSibling.nextElementSibling.textContent = "";
        }
    
        
        if (isValid) {
            $("#email_form").submit();
            alert("Thank you for subscribing!")
        }

    });

    $("#clear_form").addEventListener("click", () => {
        $("#email_1").value = "";
        $("#email_2").value = "";
        $("#yourName").value = "";

        $("#email_1").focus();
    });
    
    $("#email_1").focus();
});