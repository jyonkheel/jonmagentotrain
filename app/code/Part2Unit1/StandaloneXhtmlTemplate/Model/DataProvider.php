<?php
namespace Part2Unit1\StandaloneXhtmlTemplate\Model;
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    public function getData()
    {
        return [ 'list' => [
            0 =>
                [
                    'name'      => 'Veronica',
                    'lastname'  => 'Costello'
                ]
            ]
        ];
    }
}