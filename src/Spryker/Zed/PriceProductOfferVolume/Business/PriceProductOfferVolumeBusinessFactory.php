<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductOfferVolume\Business;

use Spryker\Service\PriceProductOfferVolume\PriceProductOfferVolumeServiceInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\PriceProductOfferVolume\Business\Expander\PriceProductOfferVolumeExpander;
use Spryker\Zed\PriceProductOfferVolume\Business\Expander\PriceProductOfferVolumeExpanderInterface;
use Spryker\Zed\PriceProductOfferVolume\Business\Validator\Constraint\UniqueStoreCurrencyVolumeQuantityConstraint;
use Spryker\Zed\PriceProductOfferVolume\Business\Validator\Constraint\ValidGrossNetPriceConstraint;
use Spryker\Zed\PriceProductOfferVolume\Business\Validator\Constraint\VolumePriceHasBasePriceConstraint;
use Spryker\Zed\PriceProductOfferVolume\Business\Validator\PriceProductConstraintProvider;
use Spryker\Zed\PriceProductOfferVolume\Business\Validator\PriceProductConstraintProviderInterface;
use Spryker\Zed\PriceProductOfferVolume\Business\Validator\PriceProductOfferConstraintProvider;
use Spryker\Zed\PriceProductOfferVolume\Business\Validator\PriceProductOfferConstraintProviderInterface;
use Spryker\Zed\PriceProductOfferVolume\Business\Validator\PriceProductOfferVolumeValidator;
use Spryker\Zed\PriceProductOfferVolume\Business\Validator\PriceProductOfferVolumeValidatorInterface;
use Spryker\Zed\PriceProductOfferVolume\Dependency\External\PriceProductOfferVolumeToValidationAdapterInterface;
use Spryker\Zed\PriceProductOfferVolume\Dependency\Service\PriceProductOfferVolumeToPriceProductVolumeInterface;
use Spryker\Zed\PriceProductOfferVolume\Dependency\Service\PriceProductOfferVolumeToUtilEncodingInterface;
use Spryker\Zed\PriceProductOfferVolume\PriceProductOfferVolumeDependencyProvider;
use Symfony\Component\Validator\Constraint;

/**
 * @method \Spryker\Zed\PriceProductOfferVolume\PriceProductOfferVolumeConfig getConfig()
 */
class PriceProductOfferVolumeBusinessFactory extends AbstractBusinessFactory
{
    public function createPriceProductOfferVolumeExpander(): PriceProductOfferVolumeExpanderInterface
    {
        return new PriceProductOfferVolumeExpander($this->getUtilEncodingService());
    }

    public function createPriceProductOfferVolumeValidator(): PriceProductOfferVolumeValidatorInterface
    {
        return new PriceProductOfferVolumeValidator(
            $this->getValidationAdapter(),
            $this->createPriceProductOfferConstraintProvider(),
            $this->createPriceProductConstraintProvider(),
            $this->getPriceProductOfferVolumeService(),
        );
    }

    public function createPriceProductOfferConstraintProvider(): PriceProductOfferConstraintProviderInterface
    {
        return new PriceProductOfferConstraintProvider($this->createPriceProductOfferConstraints());
    }

    /**
     * @return array<\Symfony\Component\Validator\Constraint>
     */
    public function createPriceProductOfferConstraints(): array
    {
        return [
            $this->createUniqueStoreCurrencyVolumeQuantityConstraint(),
            $this->createVolumePriceHasBasePriceConstraint(),
        ];
    }

    public function createPriceProductConstraintProvider(): PriceProductConstraintProviderInterface
    {
        return new PriceProductConstraintProvider(
            $this->createPriceProductConstraints(),
        );
    }

    /**
     * @return array<\Symfony\Component\Validator\Constraint>
     */
    public function createPriceProductConstraints(): array
    {
        return [
            $this->createValidGrossNetPriceConstraint(),
        ];
    }

    public function createUniqueStoreCurrencyVolumeQuantityConstraint(): Constraint
    {
        return new UniqueStoreCurrencyVolumeQuantityConstraint(
            $this->getPriceProductOfferVolumeService(),
        );
    }

    public function createVolumePriceHasBasePriceConstraint(): Constraint
    {
        return new VolumePriceHasBasePriceConstraint(
            $this->getPriceProductVolumeService(),
        );
    }

    public function createValidGrossNetPriceConstraint(): Constraint
    {
        return new ValidGrossNetPriceConstraint();
    }

    public function getPriceProductOfferVolumeService(): PriceProductOfferVolumeServiceInterface
    {
        return $this->getProvidedDependency(PriceProductOfferVolumeDependencyProvider::SERVICE_PRICE_PRODUCT_OFFER_VOLUME);
    }

    public function getUtilEncodingService(): PriceProductOfferVolumeToUtilEncodingInterface
    {
        return $this->getProvidedDependency(PriceProductOfferVolumeDependencyProvider::SERVICE_UTIL_ENCODING);
    }

    public function getValidationAdapter(): PriceProductOfferVolumeToValidationAdapterInterface
    {
        return $this->getProvidedDependency(PriceProductOfferVolumeDependencyProvider::ADAPTER_VALIDATION);
    }

    public function getPriceProductVolumeService(): PriceProductOfferVolumeToPriceProductVolumeInterface
    {
        return $this->getProvidedDependency(PriceProductOfferVolumeDependencyProvider::SERVICE_PRICE_PRODUCT_VOLUME);
    }
}
