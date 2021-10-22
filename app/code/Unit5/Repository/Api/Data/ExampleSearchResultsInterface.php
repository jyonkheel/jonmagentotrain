<?php
namespace Unit5\Repository\Api\Data;

interface ExampleSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    public function getItems();
    public function setItems(array $items = null);
}