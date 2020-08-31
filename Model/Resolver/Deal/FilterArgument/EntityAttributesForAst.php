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

namespace Mageplaza\DailyDealGraphQl\Model\Resolver\Deal\FilterArgument;

use Magento\Framework\GraphQl\Query\Resolver\Argument\FieldEntityAttributesInterface;
use Mageplaza\DailyDeal\Helper\Data;

/**
 * Class EntityAttributesForAst
 * @package Mageplaza\DailyDealGraphQl\Model\Resolver\Deal\FilterArgument
 */
class EntityAttributesForAst implements FieldEntityAttributesInterface
{
    /**
     * @var Data
     */
    protected $helperData;

    protected $additionalAttributes = [
        'deal_id',
        'product_id',
        'product_name',
        'product_sku',
        'status',
        'is_featured',
        'deal_price',
        'deal_qty',
        'sale_qty',
        'store_ids',
        'date_from',
        'date_to',
    ];

    /**
     * EntityAttributesForAst constructor.
     *
     * @param Data $helperData
     * @param array $additionalAttributes
     */
    public function __construct(
        Data $helperData,
        array $additionalAttributes = []
    ) {
        $this->helperData = $helperData;
        $this->additionalAttributes = array_merge($this->additionalAttributes, $additionalAttributes);
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityAttributes(): array
    {
        $fields = [];
        foreach ($this->additionalAttributes as $attribute) {
            $fields[$attribute] = 'String';
        }

        if ($this->helperData->versionCompare('2.3.4')) {
            return $fields;
        }

        return array_keys($fields);
    }
}
