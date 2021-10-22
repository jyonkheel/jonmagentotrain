<?php
namespace Part2Unit1\CustomerFormDump\Plugin;

class Log
{
    protected $logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function afterGetData(\Magento\Customer\Model\Customer\DataProviderWithDefaultAddresses $subject, $result)
    {
        foreach($result as $customer){
            $this->logger->debug('data: ', $customer);
        }

        return $result;
    }
}
