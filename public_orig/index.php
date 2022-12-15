<?php
/**
 * Frontcontroller to bootstrap essentials and return a response.
 */
define("ANAX_INSTALL_PATH", realpath(__DIR__ . "/../vendor/mos/anax"));
define("ANAX_APP_PATH", __DIR__ . "/..");

// To load frontmatter
ini_set('max_execution_time', 120);

require __DIR__ . "/../vendor/autoload.php";

$di  = new \Anax\DI\CDIFactoryDefault();
$app = new \Anax\App\CAnaxDefault($di);



/**
 * Sample function to integrate with a phpbb installation and lend some
 * information on the authorized user.
 */
call_user_func(function () use ($app) {
    $phpbb = new \Anax\AddOn\PHPBB\CInterface();
    $data = $phpbb->getSessionDetails(__DIR__ . "/forum/");
    $app->views->add("default/profile-phpbb", $data, "profile");
});



/**
 * Add HTML classes based on query string.
 */
if ($app->request->hasGet("vgrid")) {
    $app->theme->appendToVariable("htmlClass", "vgrid");
}

if ($app->request->hasGet("hgrid")) {
    $app->theme->appendToVariable("htmlClass", "hgrid");
}



//$app->session();
$app->loadRoutes();
$app->router->handle();
$app->theme->render();
