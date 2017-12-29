'use strict';
var xhr = new XMLHttpRequest(); // создаем объект для отправки запроса
xhr.addEventListener('load', function () { // вешаем на него обработчик по загрузке
  try {
    alert(JSON.parse(xhr.responseText)); // парсим в js
  } catch (err) {
    alert(err.message);
  }
});
xhr.open('GET', 'https://up.htmlacademy.ru/assets/javascript/demo/8-xhr/data.json');
xhr.send();

