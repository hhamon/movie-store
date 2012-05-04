<?php

require dirname(__FILE__).'/unit.php';

$configuration = ProjectConfiguration::getApplicationConfiguration(
    'frontend',
    'test',
    true
);

new sfDatabaseManager($configuration);