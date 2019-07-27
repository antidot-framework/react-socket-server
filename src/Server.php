<?php

declare(strict_types=1);

namespace Antidot\React\Socket;

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\Wamp\WampServer;
use Ratchet\WebSocket\WsServer;
use React\EventLoop\Factory;

class Server
{
    public function __invoke(array $config): void
    {
        $loop = Factory::create();
        $application = new Application();
        $loop->addTimer(0.001, function($timer) use ($config) {
            echo \sprintf("Socket server listening to tcp://%s.\n", $config['uri']);
        });

        $webSocket = new \React\Socket\Server($config['uri'], $loop);
        $server = new IoServer(
            new HttpServer(
                new WsServer(
                    new WampServer(
                        $application
                    )
                )
            ),
            $webSocket
        );

        $loop->run();
    }
}
