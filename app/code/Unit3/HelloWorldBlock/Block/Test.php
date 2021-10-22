<?php
namespace Unit3\HelloWorldBlock\Block;

class Test extends \Magento\Framework\View\Element\AbstractBlock
{
    protected function _toHtml()
    {
        return "<b>Hello world from the block!</b>";
    }
}