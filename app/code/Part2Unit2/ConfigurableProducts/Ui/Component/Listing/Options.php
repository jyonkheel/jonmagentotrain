<?php
namespace Part2Unit2\ConfigurableProducts\Ui\Component\Listing;
use Magento\Framework\Data\OptionSourceInterface;

class Options implements OptionSourceInterface
{
    const ATTR_OPTIONS = [
        ['label' => 'Default', 'value' => ''],
        ['label' => '1',     'value' => '1'],
        ['label' => '2',     'value' => '2'],
        ['label' => '3',     'value' => '3']
    ];

    public function toOptionArray()
    {
        return self::ATTR_OPTIONS;
    }
}