<?php
require_once __DIR__ . '/src/config/config.php';
require_once __DIR__ . '/vendor/autoload.php';

$search_string = isset($_POST) && $_POST['search']
    ? $_POST['search']
    : '';
$page = isset($_POST) && $_POST['page']
    ? (int)$_POST['page']
    : 1;

$search = new MarinusJvv\GallerySearch\Search();
echo json_encode($search->findPictures($search_string, $page));
