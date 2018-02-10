<?php
function getConnection() {
    define('ROOT', dirname(__FILE__));
    $paramPaths = ROOT.'/../admin/config/db_params.php';
    $params = include($paramPaths);

    $dsn = "mysql:host={$params['host']};dbname={$params['dbName']}";
    $conn = new PDO($dsn, $params['user'], $params['password']);

    return $conn;
}

function getImage($id) {
    $defaultImage = 'default.jpg';
    $path = 'upload/mk/';

    $pathToImage = $path.$id.'.jpg';

    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$pathToImage)) {
        return $pathToImage;
    }

    return $path.$defaultImage;
}

function getActualEvents()
{
    $query = "SELECT id, master_name, description, DATE_FORMAT(event_date, '%d.%m.%y %H:%i') date, coast FROM master_events WHERE is_deleted = '0' AND NOW() < event_date";
    $conn = getConnection();
    $result = $conn->query($query);

    $i = 0;
    $eventList = array();
    while ($row = $result->fetch()) {
        $eventList[$i]['image'] = getImage($row['id']);
        $eventList[$i]['name'] = $row['master_name'];
        $eventList[$i]['description'] = $row['description'];
        $eventList[$i]['date'] = $row['date'];
        $eventList[$i]['coast'] = $row['coast'].' р.';
        $i++;
    }

    return $eventList;
}

echo json_encode(getActualEvents());
