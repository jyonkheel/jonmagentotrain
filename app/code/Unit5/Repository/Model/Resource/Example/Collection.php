<?php
namespace Unit5\Repository\Model\Resource\Example;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection implements \Magento\Framework\Api\Search\SearchResultInterface
{
    protected $aggregations;

    protected function _construct()
    {
        $this->_init('Unit5\Repository\Model\Example', 'Unit5\Repository\Model\Resource\Example');
    }

    public function getAggregations()
    {
        return $this->aggregations;
    }

    public function setAggregations($aggregations)
    {
        $this->aggregations = $aggregations;
    }

    public function getSearchCriteria()
    {
        return null;
    }

    public function setSearchCriteria(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null)
    {
        return $this;
    }

    public function getTotalCount()
    {
        return $this->getSize();
    }

    public function setTotalCount($totalCount)
    {
        return $this;
    }

    public function setItems(array $items = null)
    {
        return $this;
    }
}