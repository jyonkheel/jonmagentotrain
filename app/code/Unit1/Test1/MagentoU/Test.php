<?php
namespace Unit1\Test\MagentoU;
class Test{
    protected $justAParameter;
    protected $data;

    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Checkout\Model\Session $session,
        $justAParameter = false,
        array $data = []
    ) {
        $this->justAParameter = $justAParameter;
        $this->data = $data;
    } 
}