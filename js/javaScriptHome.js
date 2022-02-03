"use strict";
//9/10/21- separated this code from the Email and contact forms. -AidenB
//9/17/21- fixed spelling errors. -AidenB

$(document).ready( () => 
            $("#accordion").accordion({ 
                event: "click",
                heightStyle: "content",
                collapsible: true,
                active: false
            })
        )

document.getElementById("getBox").addEventListener("click", getInfo);

//BOX BUYING
function getInfo() {
  const textBox = $("#boxTape");
  const item = textBox.val();
  var boxD = document.getElementById("boxTape").value;
  var boxO = document.getElementById("boxOwner").value;
  var boxC = document.getElementById("boxColor").value;
  let isValid = true;

  if (boxO == ("")) {
    isValid = false;
    alert("First name is required.\n");
  } else if (boxC == ("")) {
    isValid = false;
    alert("You need to add a box color!");
  } else if (boxO == ("") && boxC == ("")) {
    isValid = false;
    alert("You need to add a box name and color!");
  } else if (item === "") {
    isValid = false;
    alert("You need to add a box description.")
  }

  if (isValid == true) {
  
    let items = localStorage.BoxData || "";
    localStorage.BoxData = items.concat("Owner: ", boxO, "\n", "Color: ", boxC, "\n", "Tape: ", item, "\n");
  
    $("#boxDesc").val(localStorage.BoxData);
  

  alert(boxO + " is now the owner of a " + boxC + " box! The tape around it will read: '" + boxD+ "'.");
  }
  $("#boxDesc").val(localStorage.BoxData);
}
