<?php

namespace Danielozano\LoggerExample\Logger\Handler;

use Danielozano\LoggerExample\Model\Config;
use Magento\Framework\Filesystem\DriverInterface;
use Magento\Framework\Logger\Handler\Base;

class ConfigurableHandler extends Base
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * ConfigurableHandler constructor.
     * @param Config $config
     * @param DriverInterface $filesystem
     * @param null $filePath
     * @param null $fileName
     */
    public function __construct(
        Config $config,
        DriverInterface $filesystem,
        $filePath = null,
        $fileName = null
    ) {
        $this->config = $config;
        parent::__construct($filesystem, $filePath, $fileName);
    }

    /**
     * @var string
     */
    protected $fileName = 'var/log/danielozano/custom-configurable-logger.log';

    /**
     * @param array $record
     * @return bool
     */
    public function isHandling(array $record)
    {
        return (
            $this->config->isHandlerEnabled() &&
            parent::isHandling($record)
        );
    }
}
