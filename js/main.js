//NAVBAR

const cartLink = document.querySelector('.cart-link');
const cartIcon = document.querySelector('.cart-link > i');

cartLink.addEventListener('mouseover', () => cartIcon.style.color = "#f5a81b");
cartLink.addEventListener('mouseout', () => cartIcon.style.color = "#f6f8fa");

//MAIN SLIDER

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

//SENDING FORM

//choose menu
let chooseContent = document.querySelector('.choose-content');
let chooser = document.querySelector('#chooser');
let chooseMenu = document.querySelector('.choose-content .choose-row');
let menuOpened = false;
let variant = document.querySelector('.variant');


window.addEventListener('click', (event) =>{
   if(event.target.classList.contains('choose-click') && menuOpened == false){
      chooseMenu.style.display = 'block';
      menuOpened = true;
   }
   else if(menuOpened == true && !event.target.classList.contains('choose-not-click')){
      chooseMenu.style.display = 'none';
      menuOpened = false;
   }
   else if(menuOpened == true && event.target.classList.contains('choose-not-click')){
      if(event.target.classList.contains('choose-tel')){
         chooseContent.innerHTML = `
         <a href="javascript:void(0);" data-value="phone" id="chooser" class="choose-click"><i class="choose-click fas fa-phone"></i> Телефон</a>
         <div class="choose-row">
            <a href="javascript:void(0);" class="choose-not-click choose-viber"><i class="choose-not-click choose-viber fab fa-viber"></i> Viber</a>
            <a href="javascript:void(0);" class="choose-not-click choose-telegram"><i class="choose-not-click choose-telegram fab fa-telegram-plane"></i> Telegram</a>
            <a href="javascript:void(0);" class="choose-not-click choose-email"><i class="choose-not-click choose-email fas fa-at"></i> E-mail</a>
         </div>`;
         telMask();
      }
      else if(event.target.classList.contains('choose-viber')){
         chooseContent.innerHTML = `
         <a href="javascript:void(0);" data-value="viber" id="chooser" class="choose-click"><i class="choose-click fab fa-viber"></i> Viber</a>
         <div class="choose-row">
            <a href="javascript:void(0);" class="choose-not-click choose-tel"><i class="choose-not-click choose-tel fas fa-phone"></i> Телефон</a>
            <a href="javascript:void(0);" class="choose-not-click choose-telegram"><i class="choose-not-click choose-telegram fab fa-telegram-plane"></i> Telegram</a>
            <a href="javascript:void(0);" class="choose-not-click choose-email"><i class="choose-not-click choose-email fas fa-at"></i> E-mail</a>
         </div>`;
         viberMask();
      }
      else if(event.target.classList.contains('choose-telegram')){
         chooseContent.innerHTML = `
         <a href="javascript:void(0);" data-value="telegram" id="chooser" class="choose-click"><i class="choose-click fab fa-telegram-plane"></i> Telegram</a>
         <div class="choose-row">
            <a href="javascript:void(0);" class="choose-not-click choose-tel"><i class="choose-not-click choose-tel fas fa-phone"></i> Телефон</a>
            <a href="javascript:void(0);" class="choose-not-click choose-viber"><i class="choose-not-click choose-viber fab fa-viber"></i> Viber</a>
            <a href="javascript:void(0);" class="choose-not-click choose-email"><i class="choose-not-click choose-email fas fa-at"></i> E-mail</a>
         </div>`;
         telegramMask();
      }
      else if(event.target.classList.contains('choose-email')){
         chooseContent.innerHTML = `
         <a href="javascript:void(0);" data-value="email" id="chooser" class="choose-click"><i class="choose-click fas fa-at"></i> Email</a>
         <div class="choose-row">
            <a href="javascript:void(0);" class="choose-not-click choose-tel"><i class="choose-not-click choose-tel fas fa-phone"></i> Телефон</a>
            <a href="javascript:void(0);" class="choose-not-click choose-viber"><i class="choose-not-click choose-viber fab fa-viber"></i> Viber</a>
            <a href="javascript:void(0);" class="choose-not-click choose-telegram"><i class="choose-not-click choose-telegram fab fa-telegram-plane"></i> Telegram</a>
         </div>`;
         emailMask();
      }
      chooseContent = document.querySelector('.choose-content');
      chooser = document.querySelector('#chooser');
      chooseMenu = document.querySelector('.choose-content .choose-row');
      menuOpened = false;
      variant = document.querySelector('.variant');
   }
});

//choose mask

function telMask(){
   variant.innerHTML = `<label for="tel">Введите телефон:</label>
   <input type="tel" name="tel" id="tel" placeholder="+38(___)___-__-__" maxlength="18" required>`;
   jQuery(function ($){
      $("input[name='tel']").mask("+38(999) 999-99-99",{autoclear: false}).on('click', function(){
         if ($(this).val() === '+38(___) ___-__-__') {
            $(this).get(0).setSelectionRange(4, 4);
        }
      });
   });
}
function viberMask(){
   variant.innerHTML = `<label for="tel">Введите телефон:</label>
   <input type="tel" name="tel" id="tel" placeholder="+38(___)___-__-__" maxlength="18" required>`;
   jQuery(function ($){
      $("input[name='tel']").mask("+38(999) 999-99-99",{autoclear: false}).on('click', function(){
         if ($(this).val() === '+38(___) ___-__-__') {
            $(this).get(0).setSelectionRange(4, 4);
        }
      });
   });
}
function telegramMask(){
   variant.innerHTML = `<label for="tel">Введите Telegram Username:</label>
   <input type="text" name="tel" id="tel" placeholder="@Username" maxlength="18" required>`;

   let telegramInput = document.querySelector('#tel');
   let re = new RegExp('[a-zA-Z1-9]');
   let re2 = new RegExp('[а-яёА-ЯЁ]');

   telegramInput.addEventListener('input', (input)=>{
      if(input.target.value[0].search(re) > -1){
         return input.target.value = '@' + input.target.value;
      }
      if(input.target.value[0].search(re2) > -1){
         return input.target.value = '';
      }
   });
}
function emailMask(){
   variant.innerHTML = `<label for="email">Введите E-Mail:</label>
   <input type="email" name="tel" id="tel" placeholder="Johnsnow@gmail.com" maxlength="18" required>`;
}

//TELEPHONE MASK (jq maskedinput)

jQuery(function ($){
   $("input[name='tel']").mask("+38(999) 999-99-99",{autoclear: false}).on('click', function(){
      if ($(this).val() === '+38(___) ___-__-__') {
         $(this).get(0).setSelectionRange(4, 4);
     }
   });
});

//form sending logic

$('.questions-form').submit(function(event){
   event.preventDefault();

   let name = $('input[name="name"]').val().trim();
   let howToConnect = $('#chooser').data(); // phone / viber / telegram / email
   let howToConnectInfo = $('#tel').val().trim();
   let somethingMore = $('#some').val().trim();

   const collectedData = {
      'name' : name,
      'connectType' : howToConnect.value,
      'connectData' : howToConnectInfo,
      'someText' : somethingMore
   }
   console.log(collectedData);

   $.ajax({
      type: 'POST',
      url: '../send.php',
      cache: false,
      data: collectedData,
      dataType: 'html',
      beforeSend: function(){
         $('.questions-form button').prop('disabled', true);
      },
      success: function(response){
         if(!response || response == false){
            alert('что-то пошло не так, нет ответа от сервера.');
         }
         else if(response == true) {
            $('.success-form-shadow').css('display', 'flex');
            $('.questions-form button').prop('disabled', false);
            console.log('ALL OK!');
         }
      }
   });
});

//form success stuff

let successFormAlert = document.querySelector('.success-form-shadow');

window.addEventListener('click', (event) => {
   if (event.target.classList.contains('success-form-shadow')){
      successFormAlert.style.display = 'none';
   }
});



