<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductOfferVolume\Business\Validator;

interface PriceProductConstraintProviderInterface
{
    /**
     * @return \Symfony\Component\Validator\Constraint[]
     */
    public function getConstraints(): array;
}
