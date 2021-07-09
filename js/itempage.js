const images = document.querySelectorAll('.imgs img');
let imageBig = document.querySelector('.big-img img');

images.forEach(image => {
   image.addEventListener('click', (e) => {
      let target = e.target;
      console.log(target.src);
      imageBig.src = target.src;
   });
   
});