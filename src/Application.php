<?php

declare(strict_types=1);

namespace Antidot\React\Socket;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\Wamp\WampServerInterface;

class Application implements WampServerInterface
{
    /**
     * @param string JSON'ified string we'll receive from ZeroMQ
     */
    public function notify($entry)
    {
        $entryData = json_decode($entry, true);
    }

    public function onPublish(ConnectionInterface $conn, $topic, $event, array $exclude, array $eligible): void
    {
        $topic->broadcast($event);
    }

    public function onCall(ConnectionInterface $conn, $id, $topic, array $params): void
    {
//        $conn->callError($id, $topic, 'RPC not supported on this demo');
    }

    // No need to anything, since WampServer adds and removes subscribers to Topics automatically
    public function onSubscribe(ConnectionInterface $conn, $topic): void
    {
    }

    public function onUnSubscribe(ConnectionInterface $conn, $topic): void
    {

    }

    public function onOpen(ConnectionInterface $conn): void
    {
        // Verify jwt token
        // Subscribe user to all required channels|events
        echo "onOpen\n";
    }

    public function onClose(ConnectionInterface $conn): void
    {
        // UnSubscribe user from channels|events
        echo "onClose\n";
    }

    public function onError(ConnectionInterface $conn, Exception $e): void
    {
        // Log error
        echo "onError" . $e;
    }
}
