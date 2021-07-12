let cartOut = document.querySelector('.cart-out');
let cartSumOut = document.querySelector('.cart-sum-out');
let ids = [];
let arrOut = [];
let sum = 0;

for (let key in cart) {
   ids.push(key);
}
// ids = Array.from(new Set(ids));

//update from DB
function goodsUpdate(){
   ids = [];
   for (let key in cart) {
      ids.push(key);
   }
console.log(ids);
   // ids = Array.from(new Set(ids));

   $.post(
         "../cartloader.php",
         {
            ids
         },
         goodsOut
   );
   console.log(cart);
}
goodsUpdate();

//out from DB
function goodsOut(data){
   dataParsed = JSON.parse(data);
   let dataOut = '';
   sum = 0;
   arrOut = [];
   let count = 0;


   dataOut += "<table border='1'>";
   for (const key in dataParsed) {
      let costOut = dataParsed[key].cost.replace(/\D+/g,"");

      dataOut += `
         <tr>
            <td>${dataParsed[key].name}</td>
            <td><img src="..${dataParsed[key].img}" alt=""></td>
            <td>${dataParsed[key].cost}</td>
            <td data-id="${key}">${cart[key]} шт.</td>
            <td class="cart-buttons"><button class="plus-butt" type="button" onclick="plusOne(${key});">+</button></td>
            <td class="cart-buttons"><button class="minus-butt" type="button" onclick="minusOne(${key});">-</button></td>
         </tr>`;
      sum += costOut * cart[key];
      arrOut[count] = dataParsed[key].name + " " + dataParsed[key].cost + "грн " + cart[key] + "шт.";
      count++;
   }
   dataOut += "</table>";
   cartSumOut.innerHTML = "<b>Итого:</b> " + sum + " грн.";
   cartOut.innerHTML = dataOut;
}

//Plus-minus buttons
function plusOne(event){
   cart[event]++;
   goodsUpdate();
   localStorage.setItem('cart', JSON.stringify(cart));
}
function minusOne(event){
   if(cart[event] -1 == 0){
      delete cart[event];
   }
   else{
      cart[event]--;
   }
   goodsUpdate();
   localStorage.setItem('cart', JSON.stringify(cart));
}

//form sending logic

$('.questions-form.cart').submit(function(event){
   event.preventDefault();

   let name = $('input[name="name"]').val().trim();
   let howToConnect = $('#chooser').data(); // phone / viber / telegram / email
   let howToConnectInfo = $('#tel').val().trim();
   let somethingMore = $('#some').val().trim();

   const collectedData = {
      'name' : name,
      'connectType' : howToConnect.value,
      'connectData' : howToConnectInfo,
      'someText' : somethingMore,
      'arrOut' : arrOut,
      'sum' : sum
   }
   console.log(collectedData);

   $.ajax({
      type: 'POST',
      url: '../sendfromcart.php',
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