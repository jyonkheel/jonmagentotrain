<?php
namespace Part2Unit2\ComputerGames\Controller\Adminhtml\Game;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\Result\RedirectFactory;
use Part2Unit2\ComputerGames\Model\GameFactory;

class Delete extends Action
{
    protected $gameFactory = null;
    protected $resultRedirectFactory;

    public function __construct(Action\Context $context, GameFactory $gameFactory, RedirectFactory $redirectFactory)
    {
        $this->gameFactory = $gameFactory->create();
        $this->resultRedirectFactory = $redirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $entityId = $this->getRequest()->getParam('game_id');

        $this->gameFactory->load($entityId);
        if ($this->gameFactory->getId()) {
            $this->gameFactory->delete();
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/*/index');
        return $resultRedirect;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Part2Unit2_ComputerGames::grid');
    }
}
