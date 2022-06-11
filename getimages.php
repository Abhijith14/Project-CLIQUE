<?php

include 'db.php';

$search = $_POST['stringC'];
$lang =  $_POST['lang'];


if ($lang == 1){
	$language = "English";
}
elseif ($lang == 2){
	$language = "Tamil";
}
elseif ($lang == 3){
	$language = "Malayalam";
}
elseif ($lang == 4){
	$language = "Telugu";
}
elseif ($lang == 5){
	$language = "Hindi";
}

// echo "$search";

$sql = "SELECT * FROM categories WHERE language = '$language' and UPPER(tags) LIKE UPPER('%$search%')";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

	$filepath = array();
             while($row = $result->fetch_assoc()) {
                $filepath[] = $row['filepath'];
             }
    echo json_encode($filepath);
}
else{
	$sql2 = "SELECT * FROM categories WHERE language = '$language'";

	$result2 = $conn->query($sql2);
	$filepath2 = array();
             while($row2 = $result2->fetch_assoc()) {
                $filepath2[] = $row2['filepath'];
             }
    echo json_encode($filepath2);


}

?>