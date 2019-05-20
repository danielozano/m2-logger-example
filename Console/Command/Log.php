<?php

namespace Danielozano\LoggerExample\Console\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Log extends Command
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var LoggerInterface
     */
    protected $configurableLogger;

    /**
     * Log constructor.
     * @param LoggerInterface $logger
     * @param LoggerInterface $configurableLogger
     * @param string $name
     */
    public function __construct(
        LoggerInterface $logger,
        LoggerInterface $configurableLogger,
        $name = null
    ) {
        $this->logger = $logger;
        $this->configurableLogger = $configurableLogger;
        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $text = $input->getArgument('text');
        $this->logger->debug($text);
        $this->configurableLogger->info($text);
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('danielozano:log:write')
            ->setDescription('Write into log file')
            ->addArgument(
                'text',
                InputArgument::REQUIRED,
                'Text that will be added to the custom log file'
            );

        parent::configure();
    }
}
