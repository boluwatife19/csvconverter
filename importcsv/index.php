<?php
include './connect.php';

if(isset($_POST['btnImport'])){
    $fileName = $_FILES["file"]["name"];
    

    if($_FILES["file"]["size"] > 0){
        $filehandle = fopen($fileName, 'r');

        $sqlquery = "LOAD DATA LOCAL INFILE '".$fileName."' INTO TABLE tbl_person 
        FIELDS TERMINATED BY ','
        LINES TERMINATED BY '\n'
        IGNORE 1 LINES
        (fullname, birthday, age, address);";
        $upload_csv =  mysqli_query($conn, $sqlquery);

        if($upload_csv){
            $message = "CSV Data Imported Successfully";
        }else{
            $message = "Problem in importing CSV";
        }
    }
}


?>

<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Users | Start Bootstrap</title>

    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div id="body" class="active">
            <div class="content">
                <div class="container-fluid">
                    <h2>IMPORTING AND EXPORTING OF CSV FILE IN PHP</h2>
                    <?php if(!empty($message)) {?>
                        <div class="alert alert-success" id="response">

                        <?php echo $message ?>

                        </div>
                        <?php }else{?>

                        <div class=""></div>
                        <?php }?>

                    <div class="row">
                        <form action="" method="post" name="frmCSVImport" id="frmCSVImport" class="form-horizontal" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <input type="file" name="file" id="file" accept=".csv">
                                <br />
                                <button type="submit" id="submit" class="btn btn-primary mt-2 mb-2" name="btnImport">Import</button><a href="export.php" class="btn btn-success  mt-2 mb-2">Export to CSV</a>
                            </div>
                        </form>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Person ID</th>
                                        <th>Fullname</th>
                                        <th>Birthday</th>
                                        <th>Age</th>
                                        <th>Address </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sqlSelect = "SELECT * FROM tbl_person";
                                        $result = mysqli_query($conn, $sqlSelect);
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_array($result)){
 
                                    ?>
                                    <tr>
                                        <td><?php echo 
                                         $row['p_id']?></td>
                                        <td><?php echo $row['fullname']?></td>
                                        <td><?php echo $row['birthday']?></td>
                                        <td><?php echo $row['age']?></td>
                                        <td><?php echo $row['address']?></td>
                                    </tr>
                                    <?php };
                                        };?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery3/jquery-3.4.1.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/DataTables/datatables.min.js"></script>
    <script src="assets/js/initiate-tables.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>