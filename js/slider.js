//MAIN SLIDER ------------------------------------------------

let images = document.querySelectorAll('.slider .slider-line .slide img');
const sliderLine = document.querySelector('.slider .slider-line');
const sliderRight = document.querySelector('.slider .slider-right');
const sliderLeft = document.querySelector('.slider .slider-left');

let count = 0;
let slWidth;
let slideMe;   //autoslide timer

function init(){
   slWidth = document.querySelector('.slider').offsetWidth;
   sliderLine.style.width = slWidth * images.length + 'px';

   for (let i = 0; i < images.length; i++) {
      images[i].style.width = slWidth + 'px';
      images[i].style.height = 'auto';
   }
   rollSlider();
}

//click buttons

function rightButton(){
   slideRight();
   clearInterval(slideMe);
   setTimeout(autoslide, 4000);
}
function leftButton(){
   slideLeft();
   clearInterval(slideMe);
   setTimeout(autoslide, 4000);
}
sliderRight.addEventListener('click', rightButton);
sliderLeft.addEventListener('click', leftButton);


function slideLeft(){
   count--;
   if(count < 0){
      count = images.length -1;
   }
   rollSlider();
}

//for autoslide and right button
function slideRight(){
   count++;
   if(count >= images.length){
      count = 0;
   }
   rollSlider();
}

//change slider line px position
function rollSlider(){
   sliderLine.style.transform = 'translate(-' + count * slWidth + 'px)';
}

function autoslide(){
   clearInterval(slideMe);
   slideMe = setInterval( slideRight, 4000);
}


//change slider size on viewport resize
window.addEventListener('resize', ()=>{
   init();
   if(window.innerWidth < 660){
      for (let i = 0; i < images.length; i++) {
         images[i].src = `/images/slider-half/${[i+1]}.jpg`;
      }
   }
   else if(window.innerWidth >= 660){
      for (let i = 0; i < images.length; i++) {
         images[i].src = `/images/slider-full/${[i+1]}.jpg`;
      }
   }
});

init();
autoslide();


//swipe

sliderLine.addEventListener('touchstart', handleTouchStart);
sliderLine.addEventListener('touchmove', handleTouchMove);
let x1 = null;

function handleTouchStart(event){
   const firstTouch = event.touches[0];
   x1 = firstTouch.clientX;
}
function handleTouchMove(event){
   if (!x1){
      return false;
   }
   let x2 = event.touches[0].clientX;
   let xDiff = x2 - x1;

   if (xDiff > 0){
      leftButton();
   }
   else{
      rightButton();
   }
   x1 = null;
}