<?php

declare(strict_types=1);

namespace SillyTools\Core\Block\Adminhtml\System\Config\Form;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Module\ModuleListInterface;

class Info extends Field
{
    /**
     * @param ModuleListInterface $moduleList
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        private readonly ModuleListInterface $moduleList,
        private readonly Context             $context,
        array                                $data = [],
    )
    {
        parent::__construct($context, $data);
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        $html = '<div style="padding:10px;background-color:#f8f8f8;border:1px solid #ddd;margin-bottom:7px;">
            ' . $this->escapeHtml($this->getModuleTitle()) . ' was developed by ';
        $html .= '<a href="' . $this->escapeHtml($this->getModuleUrl()) . '" target="_blank">S.S.Niranga</a>';
        $html .= '.</div>';
        return $html;
    }

    /**
     * @return string
     */
    protected function getModuleUrl(): string
    {
        return 'https://www.linkedin.com/in/niranga/';
    }

    /**
     * @return string
     */
    protected function getModuleTitle(): string
    {
        return ucwords(str_replace('_', ' ', $this->getModuleName())) . ' Extension';
    }

}
