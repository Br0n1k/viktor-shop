let cartOut = document.querySelector('.cart-out');
let ids = [];

for (let key in cart) {
   ids.push(key);
}
ids = Array.from(new Set(ids));

      
function goodsUpdate(){
   let ids = [];
   for (let key in cart) {
      ids.push(key);
   }

   ids = Array.from(new Set(ids));

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

function goodsOut(data){
   dataParsed = JSON.parse(data);
   cartOut.innerHTML = '';
   dataOut = '';

   dataOut += "<table border='1'>";
   for (const key in dataParsed) {
      dataOut += `
         <tr>
            <td>${dataParsed[key].name}</td>
            <td><img src="..${dataParsed[key].img}" alt=""></td>
            <td>${dataParsed[key].cost}</td>
            <td data-id="${key}">${cart[key]} шт.</td>
            <td class="cart-buttons"><button class="plus-butt" type="button" onclick="plusOne(${key});">+</button></td>
            <td class="cart-buttons"><button class="minus-butt" type="button" onclick="minusOne(${key});">-</button></td>
         </tr>`;

   }
   dataOut += "</table>";

   cartOut.innerHTML = dataOut;


// console.log(cart);
// localStorage.setItem('cart', JSON.stringify(cart));
}

function plusOne(event){
   cart[event]++;
   localStorage.setItem('cart', JSON.stringify(cart));
   goodsUpdate();
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
