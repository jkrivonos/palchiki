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
        return EventDao::getMasterClassById($id);
    }

}