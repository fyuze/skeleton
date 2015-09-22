<?php
// Probably best to leave this here
$container = $app->getContainer();

// Add debug toolbar
if ($container->make('config')->get('app.debug') === true) {
    $container->make('response')->modify(function ($body) use ($container) {
        return str_replace('</body>', $container->make('toolbar')->render() . '</body>', $body);
    });
}
