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
     * Deal constructor.
     *
     * @param Data $helperData
     * @param Label $dealBlock
     * @param FieldTranslator $fieldTranslator
     */
    public function __construct(
        Data $helperData,
        Label $dealBlock,
        FieldTranslator $fieldTranslator
    ) {
        $this->helperData      = $helperData;
        $this->block           = $dealBlock;
        $this->fieldTranslator = $fieldTranslator;
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!$this->helperData->isEnabled()) {
            return [];
        }
        if (!isset($value['model'])) {
            throw new LocalizedException(__('"model" value should be specified'));
        }
        /** @var Product $product */
        $product   = $value['model'];
        $productId = $product->getId();
        /** @var \Mageplaza\DailyDeal\Model\Deal $dealData */
        $dealData = $this->helperData->getProductDeal($productId);

        if (!$dealData->getId()) {
            return [];
        }

        $percent = $this->helperData->checkDealConfigurableProduct($productId)
            ? $this->block->getMaxPercent($productId)
            : $this->block->getPercentDiscount($productId);
        $dealData->setDiscountLabel($this->block->getLabel($percent));

        return $dealData;
    }
}
