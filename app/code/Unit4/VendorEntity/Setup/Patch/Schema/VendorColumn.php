<?php
namespace Unit4\VendorEntity\Setup\Patch\Schema;

use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class VendorColumn implements SchemaPatchInterface
{
    protected $moduleSchemaSetup;

    public function __construct(SchemaSetupInterface $moduleSchemaSetup)
    {
        $this->moduleSchemaSetup = $moduleSchemaSetup;
    }

    public function apply()
    {
        $this->moduleSchemaSetup->startSetup();

        $this->moduleSchemaSetup->getConnection()->addColumn('vendor_entity', 'goods_type',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => 64,
                'unsigned' => true,
                'nullable' => false,
                'comment' => 'Vendor goods type'
            ]
        );

        $this->moduleSchemaSetup->endSetup();
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