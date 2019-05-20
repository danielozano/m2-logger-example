<?php

namespace Danielozano\LoggerExample\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    /**
     * System config path
     */
    const SYSTEM_ENABLE_LOGGER_CONFIG_PATH = 'logger_example/general/enabled';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Config constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return bool
     */
    public function isHandlerEnabled()
    {
        return (bool) $this->scopeConfig->getValue(
            self::SYSTEM_ENABLE_LOGGER_CONFIG_PATH,
            ScopeInterface::SCOPE_STORE
        );
    }
}
