<?php

declare(strict_types=1);

namespace Antidot\React\Socket\Container;

use Antidot\React\Socket\ReactSocketServer;
use Psr\Container\ContainerInterface;
use Webmozart\Assert\Assert;

class ReactSocketServerFactory
{
    public function __invoke(ContainerInterface $container): ReactSocketServer
    {
        $config = $container->get('config')['react_socket_server'];

        Assert::keyExists($config, 'uri');

        return new ReactSocketServer($config);
    }

}
