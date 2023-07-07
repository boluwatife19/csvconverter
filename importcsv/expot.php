<?php
include './connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPORT DATA BASE RECORD INTO CSV</title>
    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg">
                    <h1>EXPORT DATA BASE RECORD INTO CSV</h1>
                    <div class="card-body">
                        
                        <table class="table table-stripped table-bordered">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Fullname</th>
                                    <th>Birthday</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = $conn->query("SELECT * FROM tbl_person");
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['p_id']; ?></td>
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td><?php echo $row['birthday']; ?></td>
                                            <td><?php echo $row['age']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                        </tr>
                                    <?php };
                                } else { ?>
                                    <tr>
                                        <td colspan="7">No Data Found.....</td>
                                    </tr>
                            </tbody>

                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery3/jquery-3.4.1.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>

</body>

</html>