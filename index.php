<?php

$host = 'localhost';
$dbname = 'users';
$username = 'root';
$password = 'root';

try {
    $connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple User Management System</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
</head>
<body>

<hr>
<div class="form">
    <form action="add.php" name="newUser" id="newUser" method="POST">
        <fieldset>
            <div class="mb-6">
                <input type="text"  class="form-control" placeholder="Enter your name and lastname">
            </div>
            <div class="mb-6">
                <label for="disabledSelect" class="form-label">Select you role</label>
                <select class="form-select" >
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add user</button>
        </fieldset>
    </form>
</div>
<?php
$dsn = 'mysql:host=localhost;dbname=users';
$pdo =new PDO($dsn, 'root', 'root');

$query = $pdo->query("SELECT * FROM `users` ORDER BY id ASC");

?>

<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                            <tr>
                                <th><span>ID</span></th>
                                <th><div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Select all
                                        </label>
                                    </div></th>
                                <th><span>Name</span></th>
                                <th><span>Status</span></th>
                                <th><span>Role</span></th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><div class="form-check">
                                            <?php if($row['checkbox']) { ?>
                                                <input checked class="form-check-input" type="checkbox" value=""   />
                                            <?php }else {?>
                                                <input class="form-check-input" type="checkbox" value="" />
                                            <?php }?>
                                        </div></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td> <span class="label label-default"><?php echo $row['status'];?></span></td>
                                    <td><?php echo $row['role'];?></td>
                                    <td style="width: 20%;">
                                        <a href="#" class="table-link text-info">
                                            <span  class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                       <?php echo '<a href="/delete.php?id='.$row['id'].'" class="table-link danger" >
                                            <span class="fa-stack" >
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>'
                                        ?>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


