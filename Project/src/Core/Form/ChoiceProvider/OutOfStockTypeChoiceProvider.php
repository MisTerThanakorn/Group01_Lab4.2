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
declare(strict_types=1);

namespace PrestaShop\PrestaShop\Core\Form\ChoiceProvider;

use PrestaShop\PrestaShop\Core\Domain\Configuration\ShopConfigurationInterface;
use PrestaShop\PrestaShop\Core\Domain\Product\Stock\ValueObject\OutOfStockType;
use PrestaShop\PrestaShop\Core\Form\FormChoiceProviderInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Provides form choices for "when product is out of stock" behavior
 */
final class OutOfStockTypeChoiceProvider implements FormChoiceProviderInterface
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @var ShopConfigurationInterface
     */
    private $configuration;

    /**
     * @param TranslatorInterface $translator
     * @param ShopConfigurationInterface $configuration
     */
    public function __construct(
        TranslatorInterface $translator,
        ShopConfigurationInterface $configuration
    ) {
        $this->translator = $translator;
        $this->configuration = $configuration;
    }

    /**
     * {@inheritdoc}
     */
    public function getChoices()
    {
        $allowOrdersLabel = $this->translator->trans('Allow orders', [], 'Admin.Catalog.Feature');
        $denyOrdersLabel = $this->translator->trans('Deny orders', [], 'Admin.Catalog.Feature');

        $defaultLabel = sprintf(
            '%s (%s)',
            $this->translator->trans('Use default behavior', [], 'Admin.Catalog.Feature'),
            $this->configuration->get('PS_ORDER_OUT_OF_STOCK') ? $allowOrdersLabel : $denyOrdersLabel
        );

        return [
            $denyOrdersLabel => OutOfStockType::OUT_OF_STOCK_NOT_AVAILABLE,
            $allowOrdersLabel => OutOfStockType::OUT_OF_STOCK_AVAILABLE,
            $defaultLabel => OutOfStockType::OUT_OF_STOCK_DEFAULT,
        ];
    }
}
