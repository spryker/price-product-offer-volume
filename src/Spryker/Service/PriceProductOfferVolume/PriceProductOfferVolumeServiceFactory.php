<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\PriceProductOfferVolume;

use Spryker\Service\Kernel\AbstractServiceFactory;
use Spryker\Service\PriceProductOfferVolume\Dependency\Service\PriceProductOfferVolumeToUtilEncodingServiceInterface;
use Spryker\Service\PriceProductOfferVolume\PriceProduct\PriceProductReader;
use Spryker\Service\PriceProductOfferVolume\PriceProduct\PriceProductReaderInterface;
use Spryker\Service\PriceProductOfferVolume\VolumePriceExtractor\ProductOfferVolumePriceExtractor;
use Spryker\Service\PriceProductOfferVolume\VolumePriceExtractor\ProductOfferVolumePriceExtractorInterface;

class PriceProductOfferVolumeServiceFactory extends AbstractServiceFactory
{
    public function createPriceProductReader(): PriceProductReaderInterface
    {
        return new PriceProductReader();
    }

    public function createProductOfferVolumePriceExtractor(): ProductOfferVolumePriceExtractorInterface
    {
        return new ProductOfferVolumePriceExtractor($this->getUtilEncodingService());
    }

    public function getUtilEncodingService(): PriceProductOfferVolumeToUtilEncodingServiceInterface
    {
        return $this->getProvidedDependency(PriceProductOfferVolumeDependencyProvider::SERVICE_UTIL_ENCODING);
    }
}
