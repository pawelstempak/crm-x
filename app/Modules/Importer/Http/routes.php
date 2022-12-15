<?php
$NS = MODULES_NS.'Importer\Http\Controllers\\';

$router->get('importer', $NS.'ImporterController@Start')->name('importer');
$router->post('importer', $NS.'ImporterController@Import')->name('new_import');