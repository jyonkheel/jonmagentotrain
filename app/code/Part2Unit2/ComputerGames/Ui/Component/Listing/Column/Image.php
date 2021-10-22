<?php
namespace Part2Unit2\ComputerGames\Ui\Component\Listing\Column;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Catalog\Model\ImageUploader as Uploader;
use \Magento\Store\Model\StoreManagerInterface;

class Image extends Column
{
    protected $storeManager;
    protected $imageUploader;
    protected $urlBuilder;
 
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Uploader $imageUploader,
        StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->imageUploader = $imageUploader;
        $this->storeManager = $storeManager;
    }

    public function prepareDataSource(array $dataSource)
    {
        $fieldName = $this->getData('name');
        foreach ($dataSource['data']['items'] as & $item) {
            $url = $this->storeManager->getStore()->getBaseUrl(
                    \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
                ) . $this->imageUploader->getFilePath(
                    $this->imageUploader->getBasePath(),
                    $item['image']
                );
            $item[$fieldName . '_src'] = $url;
            $item[$fieldName . '_link'] =  $url;
            $item[$fieldName . '_orig_src'] = $url;
        }
        return $dataSource;
    }
}