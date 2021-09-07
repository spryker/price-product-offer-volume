<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductOfferVolume\Business\Validator\Constraint;

use Symfony\Component\Validator\Constraint as SymfonyConstraint;

class ValidUniqueStoreCurrencyCollectionConstraint extends SymfonyConstraint
{
    /**
     * @var string
     */
    protected const MESSAGE = 'The set of Store, Currency, and Quantity needs to be unique.';

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return static::MESSAGE;
    }

    /**
     * @return string
     */
    public function getTargets(): string
    {
        return static::CLASS_CONSTRAINT;
    }
}
