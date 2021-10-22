<?php
namespace Unit1\Test1\Model\Config;

class Converter implements \Magento\Framework\Config\ConverterInterface
{
    public function convert($source)
    {
        $output = [];
        $xpath = new \DOMXPath($source);
        $messages = $xpath->evaluate('/config/welcome_message');
        foreach ($messages as $messageNode) {
            $storeId = $this->_getAttributeValue($messageNode, 'store_id');

            $data = [];
            foreach ($messageNode->childNodes as $childNode) {
                $data = ['message' => $childNode->nodeValue];
            }
            $output['messages'][$storeId] = $data;
        }

        return $output;
    }

    protected function _getAttributeValue(\DOMNode $input, $attributeName, $default = null)
    {
        $node = $input->attributes->getNamedItem($attributeName);
        return $node ? $node->nodeValue : $default;
    }
}
