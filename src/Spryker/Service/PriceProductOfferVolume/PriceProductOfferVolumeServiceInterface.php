<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Service\PriceProductOfferVolume;

use Generated\Shared\Transfer\PriceProductFilterTransfer;

interface PriceProductOfferVolumeServiceInterface
{
    /**
     * Specification:
     * - Returns PriceProductTransfers with min volume quantity.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer[] $priceProductTransfers
     * @param \Generated\Shared\Transfer\PriceProductFilterTransfer $priceProductFilterTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer[]
     */
    public function getMinPriceProducts(array $priceProductTransfers, PriceProductFilterTransfer $priceProductFilterTransfer): array;
}
