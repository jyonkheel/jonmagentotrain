<?php
namespace Part2Unit2\RequireVerification\Observer\Adminhtml;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\State;

class Verification implements ObserverInterface
{
    private $logger;

    private $state;

    public function __construct(
        LoggerInterface $logger,
        State $state
        )
    {
        $this->logger = $logger;
        $this->state = $state;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $order->setRequireVerification(0)->save();

        $this->logger->info('order saving...' . PHP_EOL, [$this->state->getAreaCode(),
         $observer->getEvent()->getOrder()->getData()]);
    }
}