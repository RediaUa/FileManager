<?php
//General settings
define('DS', '/');
define('ROOT', dirname(__FILE__));  //root of content serviced by filemanager

require_once ROOT. DS. 'Classes'. DS .'Entity.php';
require_once ROOT. DS. 'Classes'. DS .'File.php';
require_once ROOT. DS. 'Classes'. DS .'Helper.php';
require_once ROOT. DS. 'Classes'. DS .'Folder.php';
require_once ROOT. DS. 'Classes'. DS .'FilteredFileList.php';


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

<?php
$base = !empty($_GET['entry']) ? urldecode($_GET['entry']) : ROOT;
$entryFolder = new Folder($base);
$entryFolder->showContent();
?>
</ul>
</body>
</html>
