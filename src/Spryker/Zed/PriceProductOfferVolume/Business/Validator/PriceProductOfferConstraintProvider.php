<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductOfferVolume\Business\Validator;

use Spryker\Zed\PriceProductOfferVolume\Business\Validator\Constraint\ValidUniqueStoreCurrencyCollectionConstraint;
use Symfony\Component\Validator\Constraints\All as AllConstraint;

class PriceProductOfferConstraintProvider implements PriceProductOfferConstraintProviderInterface
{
    /**
     * @var array<\Symfony\Component\Validator\Constraint>
     */
    protected $priceProductTransferConstraints;

    /**
     * @param array<\Symfony\Component\Validator\Constraint> $priceProductTransferConstraints
     */
    public function __construct(array $priceProductTransferConstraints)
    {
        $this->priceProductTransferConstraints = $priceProductTransferConstraints;
    }

    /**
     * @return array<\Symfony\Component\Validator\Constraint>
     */
    public function getConstraints(): array
    {
        return [
            new ValidUniqueStoreCurrencyCollectionConstraint(),
            new AllConstraint(
                $this->priceProductTransferConstraints
            ),
        ];
    }
}
