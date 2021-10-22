<?php
namespace Unit2\FlushOutput\Observer;

use Magento\Framework\Event\ObserverInterface;

class LogPageOutput implements ObserverInterface
{
    protected $_logger = null;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer) {
        $response = $observer->getEvent()->getData('response');
        $body = $response->getBody();
        $body = substr($body, 0, 1000);
        $this->_logger->info("--------\n\n\n BODY \n\n\n ". $body, []);
    }
}