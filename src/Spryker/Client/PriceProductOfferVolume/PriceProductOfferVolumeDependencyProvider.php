<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\PriceProductOfferVolume;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class PriceProductOfferVolumeDependencyProvider extends AbstractDependencyProvider
{
    /**
     * @var string
     */
    public const SERVICE_PRICE_PRODUCT_OFFER_VOLUME = 'SERVICE_PRICE_PRODUCT_OFFER_VOLUME';

    public function provideServiceLayerDependencies(Container $container): Container
    {
        $container = parent::provideServiceLayerDependencies($container);

        $container = $this->addPriceProductOfferVolumeService($container);

        return $container;
    }

    protected function addPriceProductOfferVolumeService(Container $container): Container
    {
        $container->set(static::SERVICE_PRICE_PRODUCT_OFFER_VOLUME, function (Container $container) {
            return $container->getLocator()->priceProductOfferVolume()->service();
        });

        return $container;
    }
}
