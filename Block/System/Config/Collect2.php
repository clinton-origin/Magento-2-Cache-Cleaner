<?php
/**
 * Origin
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the origin license that is
 * available through the world-wide-web at this URL:
 * https://www.origin.uk.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 */

namespace Origin\Cachecleaner\Block\System\Config;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Collect2 extends Field
{
    /**
     * @var string
     */
    protected $_template = 'Origin_Cachecleaner::system/config/collect2.phtml';

    /**
     * @param Context $context

     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Remove scope label
     *
     * @param  AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        $element->unsScope()->unsCanUseWebsiteValue()->unsCanUseDefaultValue();
        return parent::render($element);
    }

    /**
     * Return element html
     *
     * @param  AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->_toHtml();
    }

     /**
     * Return ajax url for collect button
     *
     * @return string
     */
    public function getAjaxUrl2()
    {
        return $this->getUrl('origin_cachecleaner/system_config/collect2');
    }
    

        /**
     * Generate collect button html
     *
     * @return string
     */
    public function getButton2Html()
    {
        $button = $this->getLayout()->createBlock(
            'Magento\Backend\Block\Widget\Button'
        )->setData(
            [
                'id' => 'collect_button2',
                'label' => __('Rebuild Elastic Search Database'),
            ]
        );

        return $button->toHtml();
    }
}