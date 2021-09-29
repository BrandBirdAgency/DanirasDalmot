const doc = document;
const menuOpen = doc.querySelector(".menu");
const menuClose = doc.querySelector(".close");
const overlay = doc.querySelector(".overlay");

menuOpen.addEventListener("click", () => {
  overlay.classList.add("overlay--active");
});
console.log("ogooo");
menuClose.addEventListener("click", () => {
  overlay.classList.remove("overlay--active");
});



// HEADER SCROLL EFFECT
window.addEventListener("scroll", () => {
  const header = document.querySelector("header");
  header.classList.toggle("scrollingheader", window.scrollY > 150);

  // Parallex Effect
  let parallex_scrolled = window.scrollY;
  let target = document.querySelector('.header__img');
  let offsetFromTop = target.offsetTop;
  let rate = parallex_scrolled *-.08;

  if(parallex_scrolled>=offsetFromTop)
  {
    console.log('checking'+rate);
    target.style.transform = 'translate3d(0px,' + rate + 'px, 0px)';
    target.style.transition = 'all .2s ease';
  }


});
// 3D - DISPLAY EFFECT
const card = document.querySelector(".cards");
const container = document.querySelector(".display");

if (container) {
  container.addEventListener("mousemove", (e) => {
    let xAxis = window.innerWidth / 2 - e.pageX / 25;
    let yAxis = window.innerHeight / 2 - e.pageY / 25;
    card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
  });

  container.addEventListener("mouseenter", (e) => {
    card.style.transition = "none";
  });
  container.addEventListener("mouseleave", (e) => {
    card.style.transform = `rotateY(0deg) rotateX(0deg)`;
    // card.style.transition = "all 0.5s ease";
  });
}

// SWIPER FOR TEAM
// SWIPER FOR PRODUCT
var swiper = new Swiper("#more-products .swiper", {
  slidesPerView: 4,
  spaceBetween: 10,
  // Optional parameters
  grabCursor: true,
  direction: "horizontal",
  loop: true,
  simulateTouch: true,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    // when window width is >= 320px
    200: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    // when window width is >= 480px
    360: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    // when window width is >= 640px
    900: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
  },
});

let count = document.querySelector(".count");
let minus = document.querySelector(".minus");
let plus = document.querySelector(".plus");
let counter = 1;

minus.addEventListener("click", () => {
  if (counter <= 0) count.innerHTML = 0;
  else {
    counter--;
    count.innerHTML = counter;
  }
});

plus.addEventListener("click", () => {
  counter++;
  count.innerHTML = counter;
});


// Pen JS Starts Here
jQuery(document).ready(function(){

  // SVG 
  var snapC = Snap("#svgC"); 

  // SVG C - "Squiggly" Path
  var myPathC = snapC.path("M62.9 14.9c-25-7.74-56.6 4.8-60.4 24.3-3.73 19.6 21.6 35 39.6 37.6 42.8 6.2 72.9-53.4 116-58.9 65-18.2 191 101 215 28.8 5-16.7-7-49.1-34-44-34 11.5-31 46.5-14 69.3 9.38 12.6 24.2 20.6 39.8 22.9 91.4 9.05 102-98.9 176-86.7 18.8 3.81 33 17.3 36.7 34.6 2.01 10.2.124 21.1-5.18 30.1").attr({
    id: "squiggle",
    fill: "none",
    strokeWidth: "1",
    stroke: "rgba(0,0,0,0.1)",
    strokeMiterLimit: "10",
    strokeDasharray: "5 10",
    strokeDashOffset: "180"
  });

  // SVG C - Triangle (As Polyline)
  var Triangle = snapC.polyline("0, 30, 15, 0, 30, 30");
  Triangle.attr({
    id: "plane",
    fill: "rgba(0,0,0,0.050)"
  }); 
  
  initTriangle();
  
  // Initialize Triangle on Path
  function initTriangle(){
    var triangleGroup = snapC.g( Triangle ); // Group polyline 
    movePoint = myPathC.getPointAtLength(length);
    triangleGroup.transform( 't' + parseInt(movePoint.x - 15) + ',' + parseInt( movePoint.y - 15) + 'r' + (movePoint.alpha - 90));
  }
  
  // SVG C - Draw Path
  var lenC = myPathC.getTotalLength();

  // SVG C - Animate Path
  function animateSVG() {
    
    myPathC.attr({
      stroke: 'rgba(0,0,0,0.1)',
      strokeWidth: 1,
      fill: 'none',
      // Draw Path
      "stroke-dasharray": "5 10",
      "stroke-dashoffset": "180"
    }).animate({"stroke-dashoffset": 10}, 2500,mina.easeinout);
    
    var triangleGroup = snapC.g( Triangle ); // Group polyline

    setTimeout( function() {
      Snap.animate(0, lenC, function( value ) {
   
        movePoint = myPathC.getPointAtLength( value );
      
        triangleGroup.transform( 't' + parseInt(movePoint.x - 15) + ',' + parseInt( movePoint.y - 15) + 'r' + (movePoint.alpha - 90));
    
      }, 2500,mina.easeinout, function(){
      });
    });
    
  } 
  
  
  // Animate Button
  function kapow(){
    $(window).on('scroll', function (){       
      // Run SVG
      animateSVG();      
    });
  }

  kapow();

});
