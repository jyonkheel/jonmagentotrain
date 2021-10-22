<?php
namespace Part2Unit2\ComputerGames\Model\ResourceModel\Game;
use Part2Unit2\ComputerGames\Model\Game as Model;
use Part2Unit2\ComputerGames\Model\ResourceModel\Game as ResourceModel;
use Magento\Framework\Api\Search\SearchResultInterface;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
    implements SearchResultInterface
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
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
        return $this->searchCriteria;
    }

    public function setSearchCriteria(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria = null)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }

    public function getTotalCount()
    {
        return $this->getSize();
    }

    public function setTotalCount($totalCount)
    {
        $this->setSize($totalCount);
        return $this;
    }

    public function setItems(array $items = null)
    {
        return $this;
    }

}