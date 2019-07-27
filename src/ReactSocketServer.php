<?php

declare(strict_types=1);

namespace Antidot\React\Socket;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReactSocketServer extends Command
{
    public const NAME = 'serve:socket:wamp';

    private $config;

    public function __construct(array $config)
    {
        parent::__construct();
        $this->config = $config;
    }

    protected function configure(): void
    {
        $this->setName(self::NAME);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $server = new Server();
        $server($this->config);
    }
}
