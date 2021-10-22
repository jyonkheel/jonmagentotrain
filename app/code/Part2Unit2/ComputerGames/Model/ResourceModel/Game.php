<?php
namespace Part2Unit2\ComputerGames\Model\ResourceModel;

class Game extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('computer_games', 'game_id');
    }
}
