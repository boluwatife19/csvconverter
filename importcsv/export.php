<?php 
include './connect.php';

$query = $conn->query("SELECT * FROM  tbl_person");

if($query->num_rows > 0){
    $delimeter = ",";
    $filename = "export-data_".date('Y-m-d').".csv";

    $f = fopen('php://memory', 'w');


    $fields = array('id', 'fullname');
    fputcsv($f, $fields,$delimeter);
    while($row = $query->fetch_assoc()){
        $lineData = array($row['p_id'], $row['fullname'], $row['birthday'], $row['age'], $row['address']);
        fputcsv($f, $fields,$delimeter);
    };

    fseek($f, 0);
    header('Content-Type: text/csv');
    header(('Content-Disposition: attachment; filename="'.$filename.'";'));

    fpassthru($f);
}

exit;
?>