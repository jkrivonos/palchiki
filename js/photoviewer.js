'use strict';

(function () {
  var ESC_KEY = 27;
  var LINKS = ['images/photoes/1.jpg', 'images/photoes/2.jpg', 'images/photoes/3.jpg', 'images/photoes/10.jpg', 'images/photoes/11.jpg', 'images/photoes/12.jpg'];

  function renderPhotoes() {
    var similarListElement = document.querySelector('#setup-similar-list'); // обращаемся к элементу превьюшек, в котором будут все склонированные копии
    var photoShowTemplate = document.querySelector('#similarPhotoTemplate').content; // тег(шаблон) превьюшек, который мы хотим клонировать
    var fragment = document.createDocumentFragment();
    for (var i = 0; i < LINKS.length; i++) {
      var photoElement = photoShowTemplate.cloneNode(true);// клонируем шаблон превьюшек
      photoElement.querySelector('img').src = LINKS[i]; // находим элемент с тегом img и вставляем ему ссылки из массива фотографий
      photoElement.querySelector('div').id = i + 1;// присваиваем id с 1
      fragment.appendChild(photoElement);
    }
    similarListElement.appendChild(fragment);// закончили клонировать фотки
  }

  function photoClickHandler(evt) {
    var bigPic = similarPhotoElement.querySelector('.bigPic');
    if (bigPic) {
      bigPic.remove();
    }
    wrapperElement.style.opacity = 0.3;
    closeBtn.classList.remove('visibility');
    prevBtn.classList.remove('visibility');
    // prevBtn.addEventListener('click', prevBtnClickHandler); // обработчик на кнопку предыдущий слайд
    //   function prevBtnClickHandler(evt) {
    //     alert('1');
    //   }
    nextBtn.classList.remove('visibility');
    var fragmentBig = document.createDocumentFragment();
    var photoTemplateElement = document.querySelector('#photoesTemplate').content.querySelector('.bigPic'); // обращаемся к образцу, который хотим клонировать
    var photoBigElement = photoTemplateElement.cloneNode(true);// клонируем шаблон
    photoBigElement.querySelector('.cloneImg').src = evt.currentTarget.querySelector('img').src; // меняем src
    photoBigElement.setAttribute('currentid', evt.currentTarget.id);
    photoBigElement.addEventListener('click', bigPicClickHandler);
    fragmentBig.appendChild(photoBigElement);
    wrapperElement.setAttribute('overflow','hidden');
    similarPhotoElement.appendChild(fragmentBig);

    document.addEventListener('keydown', escPressHandler);
  }

  function escPressHandler(evt) {
    if (evt.keyCode !== ESC_KEY){
    } else {
      similarPhotoElement.querySelector('.bigPic').remove();
      wrapperElement.style.opacity = 1;
      closeBtn.classList.add('visibility');
      prevBtn.classList.add('visibility');
      nextBtn.classList.add('visibility');
      document.removeEventListener('keydown', escPressHandler);
    }
  }
  // клонируем фотки
  renderPhotoes();

  var wrapperElement = document.querySelector('.wrapper'); // обращаемся к wrapper, на котором создаем прозрачность
  var closeBtn = document.querySelector('.fa-window-close');// обращаемся к кнопке закрывания на большой фотке
  var prevBtn = document.querySelector('.prevBtn');
  var nextBtn = document.querySelector('.nextBtn');

  var similarPhotoElement = document.querySelector('#similarPhotoesList'); // сюда все будет склонировано
  var bigImage = document.querySelectorAll('.image');
  for (var j = 0; j < LINKS.length; j++) {
    bigImage[j].addEventListener('click', photoClickHandler);
  }

  function bigPicClickHandler(evt) {
    var bigElement = evt.currentTarget;
    var currentID = bigElement.getAttribute('currentid');
    if (currentID == LINKS.length) {
      currentID = 1;
    } else {
      currentID++;
    }
    bigElement.querySelector('.cloneImg').src = LINKS[currentID - 1];
    bigElement.setAttribute('currentid', currentID);
  }
})();
