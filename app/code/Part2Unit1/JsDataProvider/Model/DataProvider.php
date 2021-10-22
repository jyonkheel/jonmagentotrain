<?php
namespace Part2Unit1\JsDataProvider\Model;
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    public function getData()
    {
        return [ 'list' => [
            0 =>
                [
                    'name'      => 'Veronica',
                    'lastname'  => 'Costello'
                ],
            1 =>
                [
                    'name'      => 'John',
                    'lastname'  => 'Doe'
                ],
            2 =>
                [
                    'name'      => 'Jane',
                    'lastname'  => 'Doe'
                ]
            ]
        ];
    }
}