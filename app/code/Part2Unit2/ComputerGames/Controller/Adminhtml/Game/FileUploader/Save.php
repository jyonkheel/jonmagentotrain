<?php
namespace Part2Unit2\ComputerGames\Controller\Adminhtml\Game\FileUploader;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Catalog\Model\ImageUploader;

class Save extends Action
{
    protected $imageUploader;

    public function __construct(
        Action\Context $context,
        ImageUploader $imageUploader
    )
    {
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
    }

    protected function _isAllowed()
    {
        return true;
    }

    public function execute()
    {
        try {
            $result = $this->imageUploader->saveFileToTmpDir('image');

            $result['cookie'] = [
                'name' => $this->_getSession()->getName(),
                'value' => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path' => $this->_getSession()->getCookiePath(),
                'domain' => $this->_getSession()->getCookieDomain(),
            ];
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }

        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}