<?php

namespace FondOfSpryker\Glue\CompanyUnitAddressesRestApi;

use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses\CompanyUnitAddressesWriter;
use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses\CompanyUnitAddressesWriterInterface;
use Spryker\Glue\Kernel\AbstractFactory;

/**
 * @method \FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiClientInterface getClient()
 */
class CompanyUnitAddressesRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses\CompanyUnitAddressesWriterInterface
     */
    public function createCompanyUnitAddressesWriter(): CompanyUnitAddressesWriterInterface
    {
        return new CompanyUnitAddressesWriter(
            $this->getResourceBuilder(),
            $this->getClient()
        );
    }
}
