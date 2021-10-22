<?php
namespace Part2Unit2\ComputerGames\Controller\Adminhtml\Game;
use Magento\Backend\App\Action;

class Validate extends Action
{
    public function execute()
    {
        $this->getResponse()->appendBody(json_encode(true));
        $this->getResponse()->sendResponse();
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Part2Unit2_ComputerGames::grid');
    }
}