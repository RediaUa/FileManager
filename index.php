<?php
//General settings
define('DS', '/');
define('ROOT', dirname(__FILE__));  //root of content serviced by filemanager

require_once ROOT. DS. 'Classes'. DS .'Entity.php';
require_once ROOT. DS. 'Classes'. DS .'File.php';

$list = scandir(ROOT); //list of content items
?>

<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Manager</title>
</head>
<body>
<ul class="list-group">

        <?php foreach ($list as $item):

            $fullPath = ROOT. DS. $item;
            $object = is_file($fullPath) ? new File($fullPath) : '---';
            if($object instanceof File)
            {
                $data = $object->getTeaser();
                echo "<li class=\"list-group-item d-flex justify-content-between align-items-center\">
                    <span class=\"glyphicon glyphicon-file\">" . $data['name'] . "</span>
                    <span class=\"badge badge-primary badge-pill\">" . $data['size'] . "</span>
                </li>";
            }

            endforeach;
            ?>





</ul>
</body>
</html>
