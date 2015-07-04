<?php

$config = [];

if (!YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
   $config['bootstrap'][] = 'debug';
   $config['modules']['debug'] = 'yii\debug\Module';
}

return $config;
