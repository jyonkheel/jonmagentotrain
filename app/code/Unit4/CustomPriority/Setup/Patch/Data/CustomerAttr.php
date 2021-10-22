<?php
namespace Unit4\CustomPriority\Setup\Patch\Data;

use Magento\Customer\Setup\CustomerSetup;
use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\Patch\PatchInterface;


class CustomerAttr implements \Magento\Framework\Setup\Patch\DataPatchInterface
{
    protected $customerSetupFactory;

    private $moduleDataSetup;

    public function __construct(
        CustomerSetupFactory $customerSetupFactory,
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $customerSetup = $this->customerSetupFactory->create(['setup' => $this->moduleDataSetup]);
        // $customerSetup->updateAttribute();

        $customerSetup->addAttribute(
            Customer::ENTITY,
            'custom_priority',
            [
                'label' => 'Priority',
                'type' => 'int',
                'input' => 'select',
                'source' => '\Unit4\CustomPriority\Model\Entity\Attribute\Frontend\Source\CustomerPriority',
                'required' => 0,
                'system' => 0,
                'position' => 100,
            ]
        );
        $customerSetup->getEavConfig()
            ->getAttribute('customer', 'custom_priority')
            ->setData('used_in_forms', ['adminhtml_customer'])
            ->save();

        $this->moduleDataSetup->endSetup();
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

}