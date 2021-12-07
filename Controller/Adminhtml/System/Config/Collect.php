<?php
/**
 * Origin
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Origin.uk.com license that is
 * available through the world-wide-web at this URL:
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 */
 
namespace Origin\Cachecleaner\Controller\Adminhtml\System\Config;
 
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
 
class Collect extends Action
{
 
    protected $resultJsonFactory;
 
 
    /**
     * @param Context $context
     * @param JsonFactory $resultJsonFactory
     * @param Data $helper
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory
    )
    {
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }
 
    /**
     * Collect relations data
     *
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute()
    {
        try {
        $command = 'redis-cli FLUSHDB';
        exec($command);
        } catch (\Exception $e) {
            $result = $this->resultJsonFactory->create();
            return $result->setData(['success' => true, 'message' => $e]);
        }
 
        $message = 'done';
        /** @var \Magento\Framework\Controller\Result\Json $result */
        $result = $this->resultJsonFactory->create();
 
        return $result->setData(['success' => true, 'message' => $message]);
    }
 
}
?>