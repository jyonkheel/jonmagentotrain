<?php
namespace Part2Unit2\ComputerGames\Controller\Adminhtml\Game;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Part2Unit2_ComputerGames::grid';

    public function execute()
    {
        $backendPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $backendPage->setActiveMenu('Part2Unit2_ComputerGames::grid');
        $backendPage->addBreadcrumb(__('Dashboard'),__('Games'));
        $backendPage->getConfig()->getTitle()->prepend(__('Games'));
        return $backendPage;
    }
}
