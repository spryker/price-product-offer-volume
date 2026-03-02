<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductOfferVolume\Business\Validator\Constraint;

use Spryker\Zed\PriceProductOfferVolume\Dependency\Service\PriceProductOfferVolumeToPriceProductVolumeInterface;
use Symfony\Component\Validator\Constraint as SymfonyConstraint;

class VolumePriceHasBasePriceConstraint extends SymfonyConstraint
{
    /**
     * @var string
     */
    protected const MESSAGE = 'For a volume price the Gross and Net base price needs to be set.';

    /**
     * @var \Spryker\Zed\PriceProductOfferVolume\Dependency\Service\PriceProductOfferVolumeToPriceProductVolumeInterface
     */
    protected $priceProductVolumeService;

    /**
     * @param \Spryker\Zed\PriceProductOfferVolume\Dependency\Service\PriceProductOfferVolumeToPriceProductVolumeInterface $priceProductVolumeService
     * @param array<string, mixed>|null $options
     */
    public function __construct(
        PriceProductOfferVolumeToPriceProductVolumeInterface $priceProductVolumeService,
        ?array $options = null
    ) {
        $this->priceProductVolumeService = $priceProductVolumeService;

        parent::__construct($options);
    }

    public function getMessage(): string
    {
        return static::MESSAGE;
    }

    public function getTargets(): string
    {
        return static::CLASS_CONSTRAINT;
    }

    public function getPriceProductVolumeService(): PriceProductOfferVolumeToPriceProductVolumeInterface
    {
        return $this->priceProductVolumeService;
    }
}
