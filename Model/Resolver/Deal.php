<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_DailyDealGraphQl
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */
declare(strict_types=1);

namespace Mageplaza\DailyDealGraphQl\Model\Resolver;

use Magento\Catalog\Model\Product;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\FieldTranslator;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\DailyDeal\Block\Product\View\Label;
use Mageplaza\DailyDeal\Helper\Data;
use Mageplaza\DailyDeal\Model\DealFactory;

/**
 * Class Deal
 * @package Mageplaza\DailyDealGraphQl\Model\Resolver
 */
class Deal implements ResolverInterface
{

    /**
     * @var Data
     */
    protected $helperData;
    /**
     * @var Label
     */
    protected $block;

    /**
     * @var FieldTranslator
     */
    protected $fieldTranslator;
    /**
     * @var DealFactory
     */
    protected $dealFactory;

    /**
     * Deal constructor.
     *
     * @param Data $helperData
     * @param Label $dealBlock
     * @param FieldTranslator $fieldTranslator
     * @param DealFactory $dealFactory
     */
    public function __construct(
        Data $helperData,
        Label $dealBlock,
        FieldTranslator $fieldTranslator,
        DealFactory $dealFactory
    ) {
        $this->helperData      = $helperData;
        $this->block           = $dealBlock;
        $this->fieldTranslator = $fieldTranslator;
        $this->dealFactory     = $dealFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('The module is disabled'));
        }
        if (!isset($value['model'])) {
            throw new LocalizedException(__('"model" value should be specified'));
        }
        /** @var Product $product */
        $product   = $value['model'];
        $productId = $product->getId();
        $fields    = $this->getProductFieldsFromInfo($info, 'mp_dailydeal');
        /** @var \Mageplaza\DailyDeal\Model\Deal $dealData */
        $dealData = $this->helperData->getProductDeal($productId);

        if (!$dealData->getId()) {
            return [];
        }

        $model    = $this->dealFactory->create();
        foreach ($fields as $fieldProduct) {
            if ($fieldProduct === 'discount_label') {
                $percent = $this->helperData->checkDealConfigurableProduct($productId)
                    ? $this->block->getMaxPercent($productId)
                    : $this->block->getPercentDiscount($productId);
                $model->setData('discount_label', $this->block->getLabel($percent));
            } else {
                $model->setData($fieldProduct, $dealData->getData($fieldProduct));
            }
        }

        return $model;
    }

    /**
     * Return field names for all requested product fields.
     *
     * @param ResolveInfo $info
     * @param string $productNodeName
     *
     * @return string[]
     */
    public function getProductFieldsFromInfo(ResolveInfo $info, string $productNodeName = 'product'): array
    {
        $fieldNames = [];
        foreach ($info->fieldNodes as $node) {
            if ($node->name->value !== $productNodeName) {
                continue;
            }
            foreach ($node->selectionSet->selections as $selectionNode) {
                if ($selectionNode->kind === 'InlineFragment') {
                    foreach ($selectionNode->selectionSet->selections as $inlineSelection) {
                        if ($inlineSelection->kind === 'InlineFragment') {
                            continue;
                        }
                        $fieldNames[] = $this->fieldTranslator->translate($inlineSelection->name->value);
                    }
                    continue;
                }
                $fieldNames[] = $this->fieldTranslator->translate($selectionNode->name->value);
            }
        }

        return $fieldNames;
    }
}
