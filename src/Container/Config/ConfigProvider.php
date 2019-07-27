<?php

declare(strict_types=1);

namespace Antidot\React\Socket\Container\Config;

use Antidot\React\Socket\Container\ReactSocketServerFactory;
use Antidot\React\Socket\ReactSocketServer;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                'factories' => [
                    ReactSocketServer::class => ReactSocketServerFactory::class,
                ]
            ],
            'console' => [
                'commands' => [
                    ReactSocketServer::NAME => ReactSocketServer::class,
                ]
            ],
            'react_socket_server' => [
                'uri' => '0.0.0.0:8080',
            ]
        ];
    }
}
