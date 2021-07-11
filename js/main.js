//NAVBAR ------------------------------------------------

//nav colors
const cartLink = document.querySelector('.cart-link');
const cartIcon = document.querySelector('.cart-link > i');

cartLink.addEventListener('mouseover', () => cartIcon.style.color = "#f5a81b");
cartLink.addEventListener('mouseout', () => cartIcon.style.color = "#f6f8fa");

//nav mobile

let navInside = document.querySelector('.nav-inside');
let navLeft = document.querySelector('.nav-left');
let navButton = document.querySelector('.mobile-menu-button');
let opened = false;

navButton.addEventListener('click', () => {
   if(opened == false){
      navInside.classList.add('opened');
      navLeft.classList.add('opened');
      opened = true;
   }
   else{
      navInside.classList.remove('opened');
      navLeft.classList.remove('opened');
      opened = false;
   }
});


//SENDING FORM ------------------------------------------------

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
            $('.questions-form button').prop('disabled', false);
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


//FOOTER ------------------------------------------------

//footer colors
const vbLink = document.querySelector('.vb-link');
const vbIcon = document.querySelector('.vb-link > i');
const instLink = document.querySelector('.inst-link');
const instIcon = document.querySelector('.inst-link > i');
const vkLink = document.querySelector('.vk-link');
const vkIcon = document.querySelector('.vk-link > i');
const fbLink = document.querySelector('.fb-link');
const fbIcon = document.querySelector('.fb-link > i');

vbLink.addEventListener('mouseover', () => vbIcon.style.color = "#a156dc");
vbLink.addEventListener('mouseout', () => vbIcon.style.color = "#f6f8fa");
instLink.addEventListener('mouseover', () => instIcon.style.color = "#fd8911");
instLink.addEventListener('mouseout', () => instIcon.style.color = "#f6f8fa");
vkLink.addEventListener('mouseover', () => vkIcon.style.color = "#3776EA");
vkLink.addEventListener('mouseout', () => vkIcon.style.color = "#f6f8fa");
fbLink.addEventListener('mouseover', () => fbIcon.style.color = "#3776EA");
fbLink.addEventListener('mouseout', () => fbIcon.style.color = "#f6f8fa");




//CART ------------------------------------------------

let cart = {}; //id + quantity in local storage

//local storage stuff
function loadFromStorage(){
   if(localStorage.getItem('cart') != undefined){
      cart = JSON.parse(localStorage.getItem('cart'));
   }
}

loadFromStorage();


//cart logic
function addToCart(value){
   let id = value.dataset.id;

   if(cart[id] == undefined){
      cart[id] = 1;
   }
   else{
      cart[id]++;
   }
   
   let plusOneAnimation = value.parentNode.parentNode.children[1];
   let plusOne = document.createElement('p');
   
   plusOne.innerHTML = "+1";
   plusOneAnimation.appendChild(plusOne);

   setTimeout(function(){
      plusOne.remove();
   }, 800);
   
   console.log(cart);
   localStorage.setItem('cart', JSON.stringify(cart));
}

