<?php
namespace Part2Unit2\NewCustomerTab\Controller\Adminhtml\Index;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Custom extends Action
{
    const ADMIN_RESOURCE = 'Part2Unit2_NewCustomerTab::grid';

    public function execute()
    {
        $backendPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $backendPage;
    }
}
