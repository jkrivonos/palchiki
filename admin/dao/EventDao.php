<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07.01.2018
 * Time: 0:24
 */

class EventDao
{
    public static function getActualEvents() {
        $query = "SELECT id, master_name, description, DATE_FORMAT(event_date, '%d.%m.%y %H:%i') date, coast FROM master_events WHERE is_deleted = '0' AND NOW() < event_date";
        $conn = Db::getConnection();
        $result = $conn->query($query);

        $i = 0;
        $eventList = array();
        while ($row = $result->fetch()) {
            $eventList[$i]['id'] = $row['id'];
            $eventList[$i]['master_name'] = $row['master_name'];
            $eventList[$i]['description'] = $row['description'];
            $eventList[$i]['date'] = $row['date'];
            $eventList[$i]['coast'] = $row['coast'];
            $i++;
        }

        return $eventList;
    }
}