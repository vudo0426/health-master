<?php

//CREDENTIALS FOR DB
define ('DBSERVER', 'localhost');
define ('DBUSER', 'root');
define ('DBPASS','');
define ('DBNAME','health');

//LET'S INITIATE CONNECT TO DB
$connection = mysqli_connect(DBSERVER, DBUSER, DBPASS) or die("Can't connect to server. Please check credentials and try again");
$result = mysqli_select_db($connection,"health") or die("Can't select database. Please check DB name and try again");

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $sql = mysqli_query ($connection,"SELECT name,desc1,diseases FROM product WHERE name LIKE '%{$query}%' OR desc1 LIKE '%{$query}%' OR diseases LIKE '%{$query}%'");
	$array = array();
    while ($row = mysqli_fetch_array($sql)) {
        $array[] = array (
            'label' => $row['name'].', '.$row['desc1'],
            'value' => $row['name'].' - for '.$row['diseases'],
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}

?>