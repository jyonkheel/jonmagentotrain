<?php
namespace Unit4\ProductSave\Observer;
use Magento\Framework\Event\ObserverInterface;

class LogProductSave implements ObserverInterface
{
    protected $_logger = null;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();

        if ($product->getId() && ($product->isDataChanged() || $product->isObjectNew())) {
            $logMessage  = PHP_EOL . 'Product Saving Log...' . PHP_EOL;

            foreach ($product->getData() as $key => $dataItem) {
                if ((is_string($dataItem) || is_int($dataItem)) && $dataItem != $product->getOrigData($key)) {
                    $logMessage .= $key . ' = ' . $dataItem . PHP_EOL;
                }
            }
            $this->_logger->info($logMessage);
        }
    }
}