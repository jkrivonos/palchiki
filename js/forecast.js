'use strict';

(function () {
  var successHandler = function (message) {
    var meetings = JSON.parse(message);
    var meetingTemplate = document.querySelector('#meetingTemplate').content; // шаблон, который мы хотим клонировать
    var fragment = document.createDocumentFragment();

    for (var i = 0; i < meetings.length; i++) {
      var meetingElement = meetingTemplate.cloneNode(true);// клонируем шаблон (встречи)
      meetingElement.querySelector('#lineFirst').innerHTML = meetings[i].name;
      meetingElement.querySelector('#lineSecond').textContent = meetings[i].date;
      meetingElement.querySelector('#lineThird').innerHTML = meetings[i].coast;
      meetingElement.querySelector('#lineFourth').textContent = meetings[i].description;
      meetingElement.querySelector('.forecast_image img').src = meetings[i].image;
      fragment.appendChild(meetingElement);
    }
    document.querySelector('#meetingList').appendChild(fragment);
  };

  var errorHandler = function () {
    document.querySelector('#error').innerHTML = 'Непредвиденная внутренняя ошибка. Обратитесь к разработчику :)';
  };

  window.load('', 'php/announcement.php', successHandler, errorHandler);
})();
