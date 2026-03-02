<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\PriceProductOfferVolume;

use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Service\PriceProductOfferVolume\PriceProductOfferVolumeServiceInterface;

class PriceProductOfferVolumeFactory extends AbstractFactory
{
    public function getPriceProductOfferVolumeService(): PriceProductOfferVolumeServiceInterface
    {
        return $this->getProvidedDependency(PriceProductOfferVolumeDependencyProvider::SERVICE_PRICE_PRODUCT_OFFER_VOLUME);
    }
}
