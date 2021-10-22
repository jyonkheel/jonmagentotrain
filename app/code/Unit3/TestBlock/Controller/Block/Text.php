<?php
namespace Unit3\TestBlock\Controller\Block;

use Magento\Framework\View\Element\Template;

class Text extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $block = $this->_pageFactory->create()->getLayout()->createBlock('Magento\Framework\View\Element\Text');
        $block->setText("Hello World From a New Module!");
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents($block->toHtml());

        return $result;
    }
}