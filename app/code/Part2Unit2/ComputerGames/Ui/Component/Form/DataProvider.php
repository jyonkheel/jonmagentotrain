<?php
namespace Part2Unit2\ComputerGames\Ui\Component\Form;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Framework\View\Element\UiComponent\DataProvider\FilterPool;
use Magento\Ui\DataProvider\Modifier\ModifierInterface;
use Part2Unit2\ComputerGames\Model\ResourceModel\Game\CollectionFactory as GamesCollectionFactory;
use Magento\Ui\DataProvider\Modifier\PoolInterface;

class DataProvider extends AbstractDataProvider
{
    protected $collection;
    protected $eavConfig;
    protected $filterPool;
    protected $loadedData;
    protected $pool;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        GamesCollectionFactory $collectionFactory,
        FilterPool $filterPool,
        PoolInterface $pool,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->pool = $pool;
        $this->filterPool = $filterPool;
        $this->meta = $this->prepareMeta($this->meta);
    }

    public function prepareMeta(array $meta)
    {
        $meta = parent::getMeta();
        foreach ($this->pool->getModifiersInstances() as $modifier) {
            $meta = $modifier->modifyMeta($meta);
        }
        return $meta;
    }

    public function getData()
    {
        if (!$this->loadedData) {
            $items = $this->collection->getItems();

            foreach ($this->pool->getModifiersInstances() as $modifier) {
                $this->loadedData = $modifier->modifyData($items);
            }
        }
        return $this->loadedData;
    }
}
