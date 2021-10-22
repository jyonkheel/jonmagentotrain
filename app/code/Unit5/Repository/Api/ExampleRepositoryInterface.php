<?php
namespace Unit5\Repository\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface ExampleRepositoryInterface
{
    public function getList(SearchCriteriaInterface $searchCriteria);
}