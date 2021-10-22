<?php
namespace Unit1\Test1\Controller\Test;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    private $customConfig;

    public function __construct(
        Context $context,
        \Unit1\Test1\Model\Config $customConfig
    )
    {
        $this->customConfig = $customConfig;
        return parent::__construct($context);
    }

    public function execute()
    {
        $storeId = 2;
        $storeWelcomeMsg = $this->customConfig->get('messages/' . $storeId . '/message');

        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents($storeWelcomeMsg);

        return $result;
    }
}
