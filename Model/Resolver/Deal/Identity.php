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

namespace Mageplaza\DailyDealGraphQl\Model\Resolver\Deal;

use Magento\Framework\GraphQl\Query\Resolver\IdentityInterface;

/**
 * Class Identity
 * @package Mageplaza\DailyDealGraphQl\Model\Resolver\Deal
 */
class Identity implements IdentityInterface
{
    /** @var string */
    private $cacheTag = 'mpdailydeal_';

    /**
     * Get page ID from resolved data
     *
     * @param array $resolvedData
     * @return string[]
     */
    public function getIdentities(array $resolvedData): array
    {
        return empty($resolvedData['deal_id']) ?
            [] : [$this->cacheTag, sprintf('%s_%s', $this->cacheTag, $resolvedData['deal_id'])];
    }
}
