<?php
namespace Unit3\ProductViewDescriptionPlugin\Block\Product\View;

class Description extends \Magento\Catalog\Block\Product\View\Description
{
    public function beforeToHtml(\Magento\Catalog\Block\Product\View\Description $description)
    {
        // http://localhost/magento/breathe-easy-tank.html 
        // rebuild static content and clear cache 
        $description->getProduct()->setDescription('test description!');
    }
}