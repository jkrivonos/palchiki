'use strict';
$(document).ready(function(){
  jQuery(function($){
    $("#phone").mask("(999) 999-99-99");
  });
});

(function () {
  function closeIconHandler() {
    callbackFormElement.classList.add('hidden');
    iconPhoneElement.classList.remove('hidden');
  }

  function phoneIconHandler() {
    iconPhoneElement.classList.add('hidden');
    callbackFormElement.classList.remove('hidden');
  }

  var iconPhoneElement = document.querySelector('.phone'); // значок телефонной трубки
  var callbackFormElement = document.querySelector('.callback');
  iconPhoneElement.addEventListener('click', phoneIconHandler); // кликаем по значку телтрубки и вызываем колбэк

  var closeIconElement = document.querySelector('.fa');
  closeIconElement.addEventListener('click', closeIconHandler);
})();


