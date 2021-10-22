<?php
namespace Unit1\Plugins\Plugin;

class AroundBreadcrumbsPlugin
{
    public function aroundAddCrumb(
        \Magento\Theme\Block\Html\Breadcrumbs $subject, callable $proceed,
        $crumbName, $crumbInfo
    )
    {
        $crumbInfo['label'] = $crumbInfo['label'].'(!a)';
        $proceed($crumbName, $crumbInfo);
    }
}