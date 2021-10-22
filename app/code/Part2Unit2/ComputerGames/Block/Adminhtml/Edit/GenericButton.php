<?php
namespace Part2Unit2\ComputerGames\Block\Adminhtml\Edit;

class GenericButton
{
    protected $urlBuilder;
    protected $registry;
    protected $request;
    
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
        $this->request  = $request;
    }

    public function getGameId()
    {
        return $this->request->getParam('game_id');
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
