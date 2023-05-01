<?php
$dir = './files/';
$search = isset($_GET['q']) ? trim($_GET['q']) : '';
$files = [];

if ($search !== '') {
  foreach (scandir($dir) as $file) {
    if ($file !== '.' && $file !== '..' && stripos($file, $search) !== false) {
      $files[] = $file;
    }
  }
}

header('Content-Type: application/json');
echo json_encode($files);
