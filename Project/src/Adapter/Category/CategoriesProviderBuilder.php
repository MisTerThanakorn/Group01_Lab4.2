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

namespace PrestaShop\PrestaShop\Adapter\Category;

use PrestaShop\PrestaShop\Adapter\LegacyContext;
use PrestaShop\PrestaShop\Core\Addon\Theme\ThemeRepository;
use PrestaShop\PrestaShop\Core\Util\File\YamlParser;
use PrestaShopBundle\Service\DataProvider\Admin\CategoriesProvider;

class CategoriesProviderBuilder
{
    public function __construct(
        private readonly LegacyContext $context,
        private readonly ThemeRepository $themeRepository,
        private readonly string $cacheDir,
        private readonly string $rootDir,
        private readonly string $categoriesConfigPath,
    ) {
    }

    public function build(): CategoriesProvider
    {
        $yamlParser = new YamlParser($this->cacheDir);
        $addonsCategories = $yamlParser->parse($this->rootDir . $this->categoriesConfigPath);
        $themeName = $this->context->getContext()->shop->theme_name;
        $modulesTheme = $themeName ? $this->themeRepository->getInstanceByName($themeName)->getModulesToEnable() : [];

        return new CategoriesProvider($addonsCategories['prestashop']['addons']['categories'], $modulesTheme);
    }
}
