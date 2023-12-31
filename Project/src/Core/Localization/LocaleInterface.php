<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

namespace PrestaShop\PrestaShop\Core\Localization;

use PrestaShop\PrestaShop\Core\Localization\Specification\NumberInterface;

/**
 * Locale entity interface.
 *
 * Describes the behavior of locale classes
 */
interface LocaleInterface
{
    /**
     * Latin numbering system is the "occidental" numbering system. Number digits are 0123456789.
     * This is the default numbering system in PrestaShop, even for arabian or asian languages, until we
     * provide a way to configure this in admin.
     */
    public const NUMBERING_SYSTEM_LATIN = 'latn';

    /**
     * Get this locale's code (simplified IETF tag syntax)
     * Combination of ISO 639-1 (2-letters language code) and ISO 3166-2 (2-letters region code)
     * eg: fr-FR, en-US.
     *
     * @return string
     */
    public function getCode(): string;

    /**
     * Format a number according to locale rules.
     *
     * @param int|float|string $number The number to be formatted
     *
     * @return string The formatted number
     */
    public function formatNumber(int|float|string $number): string;

    /**
     * Format a number as a price.
     *
     * @param int|float|string $number Number to be formatted as a price
     * @param string $currencyCode Currency of the price
     *
     * @return string The formatted price
     */
    public function formatPrice(int|float|string $number, string $currencyCode): string;

    /**
     * Get price specification by currency code.
     *
     * @param string $currencyCode Currency of the price
     *
     * @return NumberInterface
     */
    public function getPriceSpecification(string $currencyCode): NumberInterface;

    /**
     * Get number specification
     *
     * @return NumberInterface
     */
    public function getNumberSpecification(): NumberInterface;
}
