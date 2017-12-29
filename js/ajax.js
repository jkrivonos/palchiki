'use strict';
// Файл load.js
(function () {
  window.load = function (url, successHandler, errorHandler) {
    var xhr = new XMLHttpRequest(); // объявляем объект для запроса на сервер

    xhr.responseType = 'json';

    xhr.addEventListener('load', function () {
      if (xhr.status === 200) {
        successHandler(xhr.response);
      } else {
        errorHandler('Неизвестный статус: ' + xhr.status + ' ' + xhr.statusText);
      }
    });

    xhr.addEventListener('error', function () {
      errorHandler('Произошла ошибка соединения');
    });

    xhr.addEventListener('timeout', function () {
      errorHandler('Запрос не успел выполниться за ' + xhr.timeout + 'мс');
    });

    xhr.timeout = 10000; // 10s

    xhr.open('GET', url);
    xhr.send();
  }
})();

// Файл main.js
'use strict';
(function () {
  var errorHandler = function (message) {
    console.error(message);
  };

  var successHandler = function (data) {
    console.log(data);
  };

  window.load('https://up.htmlacademy.ru/assets/javascript/demo/8-xhr/unknownfile.json', successHandler, errorHandler);

  window.load('https://up.htmlacademy.ru/assets/javascript/demo/8-xhr/data.json', successHandler, errorHandler);

  window.load('https://api.github.com/user', successHandler, errorHandler);
})();
