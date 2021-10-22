<?php
namespace Part2Unit2\ComputerGames\Controller\Adminhtml\Game;

use Magento\Backend\App\Action;
use Part2Unit2\ComputerGames\Model\Game;

class InlineEdit extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Part2Unit2_ComputerGames::grid';
    private $game;
    protected $resultJsonFactory;
    protected $logger;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Psr\Log\LoggerInterface $logger,
        Game $game
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->logger = $logger;
        $this->game = $game;

        parent::__construct($context);
    }

    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create();

        $postItems = $this->getRequest()->getParam('items', []);
        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }

        foreach (array_keys($postItems) as $gameId) {
            $this->game->load($gameId);
            $this->game->setData($postItems[$gameId]);
            $this->game->save();
        }

        return $resultJson->setData([
            'messages' => $this->getErrorMessages(),
            'error' => $this->isErrorExists()
        ]);
    }

    protected function getErrorMessages()
    {
        $messages = [];
        foreach ($this->getMessageManager()->getMessages()->getItems() as $error) {
            $messages[] = $error->getText();
        }
        return $messages;
    }

    protected function isErrorExists()
    {
        return (bool)$this->getMessageManager()->getMessages(true)->getCount();
    }

    protected function getErrorWithCustomerId($errorText)
    {
        return '[Game ID: ' . $this->getGame()->getId() . '] ' . __($errorText);
    }
}
