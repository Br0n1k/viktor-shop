//NAVBAR

const cartLink = document.querySelector('.cart-link');
const cartIcon = document.querySelector('.cart-link > i');

cartLink.addEventListener('mouseover', () => cartIcon.style.color = "#f5a81b");
cartLink.addEventListener('mouseout', () => cartIcon.style.color = "#f6f8fa");

//MAIN SLIDER

const slides = document.querySelectorAll('.slider .slider-line .slide');

const images = document.querySelectorAll('.slider .slider-line .slide img');
const sliderLine = document.querySelector('.slider .slider-line');

const sliderRight = document.querySelector('.slider .slider-right');
const sliderLeft = document.querySelector('.slider .slider-left');

let count = 0;
let slWidth;

function init(){
   slWidth = document.querySelector('.slider').offsetWidth;
   sliderLine.style.width = slWidth * images.length + 'px';

   for (let i = 0; i < images.length; i++) {
      images[i].style.width = slWidth + 'px';
      images[i].style.height = 'auto';
   }
   rollSlider();
}

sliderRight.addEventListener('click', function(){
   count++;
   if(count >= images.length){
      count = 0;
   }
   rollSlider();
});
sliderLeft.addEventListener('click', function(){
   count--;
   if(count < 0){
      count = images.length -1;
   }
   rollSlider();
});

function rollSlider(){
   sliderLine.style.transform = 'translate(-' + count * slWidth + 'px)';
}








window.addEventListener('resize', init);
init();

