<?php
namespace Part2Unit2\NewCustomerTab\Block\Adminhtml\Edit\Tab;

use Magento\Backend\Block\Template;
use Magento\Framework\Registry;
use Magento\Customer\Controller\RegistryConstants;
use Magento\Ui\Component\Layout\Tabs\TabInterface;

class Custom extends Template implements TabInterface
{
    protected $_coreRegistry;

    public function __construct(Template\Context $context, Registry $registry, array $data = [])
    {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    public function getCustomerId()
    {
        return $this->_coreRegistry->registry(RegistryConstants::CURRENT_CUSTOMER_ID);
    }

    public function getTabLabel()
    {
        return __('Computer Games Tab');
    }

    public function getTabTitle()
    {
        return __('Computer Games Tab');
    }

    public function canShowTab()
    {
        if ($this->getCustomerId()) {
            return true;
        }
        return false;
    }

    public function isHidden()
    {
        if ($this->getCustomerId()) {
            return false;
        }
        return true;
    }

    public function getTabClass()
    {
        return '';
    }

    public function getTabUrl()
    {
        return $this->getUrl('custom/*/custom', ['_current' => true]);
    }

    public function isAjaxLoaded()
    {
        return true;
    }
}
