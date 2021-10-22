<?php
namespace Part2Unit2\NewCustomerTab\Block\Adminhtml\Edit\Tab\View;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Helper\Data;
use Part2Unit2\ComputerGames\Model\GameFactory;
use Magento\Framework\Registry;

class Custom extends \Magento\Backend\Block\Widget\Grid\Extended
{
    protected $_coreRegistry = null;
    protected $_collectionFactory;

    public function __construct(
        Context $context,
        Data $backendHelper,
        GameFactory $collectionFactory,
        Registry $coreRegistry,
        array $data = []
    ) {

        $this->_coreRegistry = $coreRegistry;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setDefaultSort('created_at', 'desc');
        $this->setSortable(false);
        $this->setPagerVisibility(false);
        $this->setFilterVisibility(false);
    }
    protected function _prepareGrid()
    {
        $this->setId('computer_games_customer_custom' . $this->getWebsiteId());
        parent::_prepareGrid();
    }

    protected function _prepareCollection()
    {
        $collection = $this->_collectionFactory->create();
        $this->setCollection($collection->getCollection());
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn(
            'game_id',
            [
                'header' => __('ID'),
                'index' => 'game_id',
                'type' => 'number'
            ]
        );

        $this->addColumn(
            'name',
            [
                'header' => __('Name'),
                'index' => 'name'
            ]
        );

        $this->addColumn(
            'type',
            [
                'header' => __('Type'),
                'index' => 'type'
            ]
        );

        $this->addColumn(
            'trial_period',
            [
                'header' => __('Trial Period'),
                'index' => 'trial_period'
            ]
        );

        $this->addColumn(
            'release_date',
            [
                'header' => __('Telease Date'),
                'index' => 'release_date'
            ]
        );

        return parent::_prepareColumns();
    }
}
