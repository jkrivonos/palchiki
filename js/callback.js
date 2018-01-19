'use strict';
// $(document).ready(function(){
//   jQuery(function($){
//     $("#phone").mask("(999) 999-99-99");
//   });
// });


(function () {
  var URL = 'feedback.php';

  function closeIconHandler() {
    callbackFormElement.classList.add('hidden');
    iconPhoneElement.classList.remove('hidden');
  }

  function phoneIconHandler() {
    iconPhoneElement.classList.add('hidden');
    callbackFormElement.classList.remove('hidden');
  }

  function sendFormHandler(evt) {
    evt.preventDefault();
    evt.preventDefault();

    var formElement = document.querySelector('.callback form');
    var formData = new FormData(formElement);
    window.load(formData, URL, successHandler, errorHandler);
  }
  var errorHandler = function (message) {
    alarmElement.innerHTML = message;
  };

  var successHandler = function (message) {
    alarmElement.innerHTML = message;
  };

  var iconPhoneElement = document.querySelector('.phone'); // значок телефонной трубки
  var callbackFormElement = document.querySelector('.callback');
  iconPhoneElement.addEventListener('click', phoneIconHandler); // кликаем по значку телтрубки и вызываем колбэк

  var closeIconElement = document.querySelector('.fa-window-close');
  closeIconElement.addEventListener('click', closeIconHandler);

  var alarmElement = document.querySelector('#alarm');

  var sendButtonElement = document.querySelector('.callback input[type=submit]');

  sendButtonElement.addEventListener('click', sendFormHandler);
})();

