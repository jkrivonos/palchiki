'use strict';

(function () {
  // var LINKS = ['images/photoes/1.jpg', 'images/photoes/2.jpg', 'images/photoes/3.jpg', 'images/photoes/10.jpg', 'images/photoes/11.jpg', 'images/photoes/12.jpg'];

  var photoElement = document.querySelector('#similarPhotoesList');
  for (var i = 0; i <= 6; i++) {
    var cloneImgElement = document.querySelectorAll('.cloneImg');
    cloneImgElement.id = i;
  }
  var photoChangeHandler = function () {
  }
  photoElement.addEventListener('click', photoChangeHandler);







})();
