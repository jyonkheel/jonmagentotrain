<?php
namespace Unit1\Test1\Model;

use Magento\Framework\Config\CacheInterface;
use Magento\Framework\Config\ReaderInterface;

class Config extends \Magento\Framework\Config\Data
{
    public function __construct(ReaderInterface $reader, CacheInterface $cache, $cacheId = '')
    {
        parent::__construct($reader, $cache, $cacheId);
    }
}