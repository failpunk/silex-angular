<?php

use Symfony\Component\HttpKernel\Exception;
use SilexAssetic\AsseticServiceProvider;


/*
 * Register service providers
 */

$app->register(new Silex\Provider\SessionServiceProvider(), [
  'session.storage.save_path' => '/tmp/frontend/sessions',
]);

$app->register(new Silex\Provider\TwigServiceProvider(), [
  'twig.path' => [
      $rootDir . '/app/components',
      $rootDir . '/web/components'
  ],
]);

$app['assetic.scripts'] = json_decode(file_get_contents(__DIR__ . '/js.config.json'), true);

// flattend the dependancies
function getJsGlobs($setName, $app) {
  $set = $app['assetic.scripts'][$setName];
  $flattenedSet = [];

  foreach(new RecursiveIteratorIterator(new RecursiveArrayIterator($set)) as $key => $values) {
    $flattenedSet[] = $values;
  }

  return $flattenedSet;
}

// Assetic
$app['assetic.path_to_cache']           = $app['cache.path'] . '/assetic' ;
$app['assetic.path_to_web']             = __DIR__ . '/../web';

$app->register(new AsseticServiceProvider(), array(
    'assetic.options' => array(
        'debug'            => $app['debug'],
        'auto_dump_assets' => $app['debug'],
    )
));

$app['assetic.filter_manager'] = $app->share(
  $app->extend('assetic.filter_manager', function($fm, $app) {
    $fm->set('compass_php', new Assetic\Filter\CompassFilter());
    return $fm;
  })
);

$app['assetic.asset_manager'] = $app->share(
  $app->extend('assetic.asset_manager', function($am, $app) {
    $am->set('scripts_vendor', new Assetic\Asset\GlobAsset(getJsGlobs('vendor', $app)));
    $am->set('scripts_main', new Assetic\Asset\GlobAsset(getJsGlobs('main', $app)));

    $am->get('scripts_vendor')->setTargetPath('assetic/js/vendor.js');
    $am->get('scripts_main')->setTargetPath('assetic/js/main.js');

    return $am;
  })
);


/*
 * ROUTES
 */

$app->get('/', function () use ($app) {
  return $app->render('home/home.twig', []);
});


return $app;
