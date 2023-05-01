<?php
if (isset($_GET['search'])) {
    $query = $_GET['search'];
    $filelist = json_decode(file_get_contents('filelist.json'), true);

    foreach ($filelist as $file) {
        if (strpos($file['name'], $query) !== false) {
            echo '<tr>';
            echo '<td>' . $file['name'] . '</td>';
            echo '<td><a href="' . $file['link'] . '">Download</a></td>';
            echo '</tr>';
        }
    }
}
?>
