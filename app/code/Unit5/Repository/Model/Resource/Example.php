<?php
namespace Unit5\Repository\Model\Resource;

class Example extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('training_repository_example', 'example_id');
    }
}