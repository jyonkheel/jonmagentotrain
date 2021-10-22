<?php
namespace Unit2\AdminSecret\Controller\Adminhtml\Action;

class Helloworld extends \Magento\Backend\App\Action
{
    public function execute()
    {
        $this->_redirect('catalog/category/edit/id/38');
    }

    public function _processUrlKeys()
    {
        return true;
    }
}