<?php
namespace Unit4\MultiSelect\Model\Entity\Attribute\Frontend;

class HtmlList extends \Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend
{

    public function getValue(\Magento\Framework\DataObject $object)
    {
        if ($this->getConfigField('input') != 'multiselect') {
            return parent::getValue($object);
        }
        return $this->getValuesAsHtmlList($object);
    }

    private function getValuesAsHtmlList(\Magento\Framework\DataObject $object)
    {
        $options = $this->getOptions($object);
        $escapedOptions = array_map('htmlspecialchars', $options);
        return sprintf(
            '<ul><li>%s</li></ul>',
            implode('</li><li>', $escapedOptions)
        );
    }

    private function getOptions(\Magento\Framework\DataObject $object)
    {
        $optionId = $object->getData($this->getAttribute()->getAttributeCode());
        $option = $this->getOption($optionId);
        return $this->isSingleValue($option) ? [$option] : $option;
    }

    private function isSingleValue($option)
    {
        return !is_array($option);
    }
}