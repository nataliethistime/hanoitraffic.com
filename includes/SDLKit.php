<?php

require_once __DIR__ . '/../vendor/autoload.php';

SDLKit::setEnvironmentDefaults();
SDLKit::setDevelopmentEnvironment();

XLogger::setLogPath(XUtil::joinPaths(__DIR__, '../logs'));

XAdmin::setSiteName('Hanoi Traffic');
XAdmin::setSiteUrl('https://hanoitraffic.com/');

SDLKit::dbConnect(
  'localhost',
  'hanoi-traffic',
  'hanoi-traffic',
  'xIriAqOV9Tr4JsMY'
);

XAsset::registerCssAsset(
  'bulma.css',
  XUtil::joinPaths(__DIR__, '../node_modules/bulma/css/bulma.min.css')
);
