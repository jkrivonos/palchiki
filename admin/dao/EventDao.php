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

    public static function createEvent($masterName, $description, $date, $coast){
        $query = "INSERT INTO master_events(master_name, description, event_date, coast) VALUES(:master_name, :description, :date, :coast)";
        $conn = Db::getConnection();
        $result = $conn->prepare($query);

        $result->bindParam(':master_name', $masterName, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':coast', $coast, PDO::PARAM_STR);

        if($result->execute()) {
            return $conn->lastInsertId();
        } else {
            return 0;
        }
    }

    public static function updateEvent($id, $masterName, $description, $date, $coast){
        $query = "UPDATE master_events SET master_name = :master_name , description = :description, event_date = :date, coast = :coast WHERE  id = :id";
        $conn = Db::getConnection();
        $result = $conn->prepare($query);

        $result->bindParam(':master_name', $masterName, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':coast', $coast, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_STR);

        if($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public static function getMasterClassById($id) {
        $query = "SELECT id, master_name, description, DATE_FORMAT(event_date, '%d.%m.%Y %H:%i') date, coast FROM master_events WHERE id = :id";
        $conn = Db::getConnection();
        $result = $conn->prepare($query);

        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }
}