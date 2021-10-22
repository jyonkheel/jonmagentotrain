<?php
namespace Unit2\RouterDash\Controller;

class NoRouteHandler implements \Magento\Framework\App\Router\NoRouteHandlerInterface
{

    public function process(\Magento\Framework\App\RequestInterface $request)
    {
        if ($request->getFrontName() == 'admin') {
            return false;
        }

        $moduleName = 'cms';
        $controllerName = 'index';
        $actionName = 'index';
        $request
            ->setModuleName($moduleName)
            ->setControllerName($controllerName)
            ->setActionName($actionName);

        return true;
    }
}