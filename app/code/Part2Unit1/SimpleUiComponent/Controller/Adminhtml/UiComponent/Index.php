<?php
namespace Part2Unit1\SimpleUiComponent\Controller\Adminhtml\UiComponent;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;

class Index extends Action
{
    const ADMIN_RESOURCE = 'Part2Unit1_SimpleUiComponent::simple_list';

    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
