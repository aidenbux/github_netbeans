"use strict";
//slideshow
//9/15/21 added use strict, will remember it from now on.

$(document).ready( () => {
    let nextSlide = $("#slides img:first-child");
        
    // start slide show
    setInterval( () => {   
        $("#slide").fadeOut(2000,
            () => {
                if (nextSlide.next().length == 0) {
                    nextSlide = $("#slides img:first-child");
                }
                else {
                    nextSlide = nextSlide.next();
                }
                const nextSlideSource = nextSlide.attr("src");
                $("#slide").attr("src", nextSlideSource).fadeIn(1500);                    
            });    
    },
    5000);         
  });