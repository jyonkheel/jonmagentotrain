<?php
namespace Part2Unit2\ComputerGames\Block\Adminhtml\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{
    public function getButtonData()
    {
        $data = [
            'label'         => __('Delete Game'),
            'class'         => 'delete',
            'id'            => 'game-edit-delete-button',
            'on_click'      => sprintf("location.href = '%s';", $this->getDeleteUrl()),
            'sort_order'    => 20,
        ];
        return $data;
    }

    public function getDeleteUrl()
    {
        return $this->getUrl('*/*/delete', ['game_id' => $this->getGameId()]);
    }
}
