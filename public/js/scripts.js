var carousel = document.getElementById('carouselExampleIndicators');
carousel.addEventListener('slide.bs.carousel', function (event) {
  var buttons = carousel.querySelectorAll('.button-cat');
  
  // Menghapus kelas warna hitam dari tombol sebelumnya
  buttons.forEach(function (button) {
    button.classList.remove('button-active');
  });
  
  // Menambahkan kelas warna hitam pada tombol slide aktif
  var activeSlideIndex = event.to;
  var activeButton = carousel.querySelector('.button-cat[data-bs-slide-to="' + activeSlideIndex + '"]');
  activeButton.classList.add('button-active');
});


var priceRange = document.getElementById('priceRange');
var priceOutput = document.getElementById('priceOutput');

priceRange.addEventListener('input', function() {
  priceOutput.textContent = '$' + priceRange.value;
});
