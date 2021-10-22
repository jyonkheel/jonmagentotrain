<?php
namespace Unit2\RouterDash\Controller;

class Router implements \Magento\Framework\App\RouterInterface
{
    protected $actionPath;

    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory) {
        $this->actionPath = $actionFactory;
    }

    public function match(\Magento\Framework\App\RequestInterface $request) {
        $testCategory = 'id/6';
        $info = $request->getPathInfo();
        if (preg_match("%^/(.*?)-(.*?)-(.*?)$%", $info, $m)) {
            $request->setPathInfo(sprintf("/%s/%s/%s/%s", $m[1], $m[2], $m[3], $testCategory));
            return $this->actionPath->create('Magento\Framework\App\Action\Forward',
                ['request' => $request]);
        }
        return null;
    }
}