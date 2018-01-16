<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07.01.2018
 * Time: 0:24
 */

class Event
{
    public static function getEvents() {
        return EventDao::getActualEvents();
    }

    public static function createEvent($masterName, $description, $date, $coast) {
        return EventDao::createEvent($masterName, $description, $date, $coast);
    }

    public static function getMasterClassById($id) {
        $eventData = EventDao::getMasterClassById($id);
        $pattern = "([0-9]{2}).([0-9]{2}).([0-9]{4}) ([0-9]{2}):([0-9]{2})";
        $replacement = '$3-$2-$1T$4:$5';
        $eventData['date'] = preg_replace("~$pattern~", $replacement, $eventData['date']);
        return $eventData;
    }

    public static function getMasterNameAndDateById($id) {
        return EventDao::getMasterNameAndDateById($id);
    }

    public static function updateEvent($id, $masterName, $description, $date, $coast) {
        return EventDao::updateEvent($id, $masterName, $description, $date, $coast);
    }

    public static function setIsDeleted($id) {
        return EventDao::setIsDeleted($id);
    }

    public static function getImage($id) {
        $defaultImage = 'default.jpg';
        $path = '/upload/mk/';

        $pathToImage = $path.$id.'.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToImage)) {
            return $pathToImage;
        }

        return $path.$defaultImage;
    }

}