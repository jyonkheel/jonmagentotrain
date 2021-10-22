<?php
namespace Part2Unit2\ComputerGames\Model;

use Part2Unit2\ComputerGames\Model\ResourceModel\Game as GameResourceModel;

class Game extends \Magento\Framework\Model\AbstractExtensibleModel
{
    protected function _construct()
    {
        $this->_init(GameResourceModel::class);
    }

    public function getCustomAttributesCodes()
    {
        return array('game_id', 'name', 'type', 'trial_period', 'release_date', 'image');
    }
}