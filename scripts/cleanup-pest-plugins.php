<?php

$path = __DIR__ . '/../vendor/pest-plugins.json';

if (! file_exists($path)) {
    exit(0);
}

$contents = file_get_contents($path);

if ($contents === false) {
    exit(0);
}

$plugins = json_decode($contents, true);

if (! is_array($plugins)) {
    exit(0);
}

$plugins = array_values(array_filter(
    $plugins,
    static fn ($plugin) => $plugin !== 'Pest\\Mutate\\Plugins\\Mutate'
));

file_put_contents($path, json_encode($plugins, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
