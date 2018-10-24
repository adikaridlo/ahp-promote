<?php
Yii::setAlias('@command', dirname(__DIR__));
$icons = require(__DIR__ . '/icons.php');
return['icons' => $icons];