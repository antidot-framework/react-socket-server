# Antidot React PHP Socket Server

Adapter that allows running a [WAMP protocol](https://wamp-proto.org) [socket server](http://socketo.me/docs/wamp) in 
[Antidot Framework Applications](https://github.com/antidot-framework/antidot-starter).

## Installation:

Using [composer package manager](https://getcomposer.org/download/)

````bash
composer require antidot-fw/react-socket-server:dev-master
````

We have to add the config provider to the framework configuration to load the necessary dependencies, we make sure to 
load it after the provider of the framework itself.

````php
<?php
// config/config.php
declare(strict_types=1);

$aggregator = new ConfigAggregator([
    // ... other config providers
    \Antidot\Container\Config\ConfigProvider::class, // Framework default config provider
    \Antidot\React\Socket\Container\Config\ConfigProvider::class, // React Application config provider
    new PhpFileProvider(realpath(__DIR__).'/services/{{,*.}prod,{,*.}local,{,*.}dev}.php'),
    new YamlConfigProvider(realpath(__DIR__).'/services/{{,*.}prod,{,*.}local,{,*.}dev}.yaml'),
    new ArrayProvider($cacheConfig),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
````

## Running socket server

We just need to run a console command and we'll have the server up and running.

````bash
bin/console serve:socket:wamp
````
