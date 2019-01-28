<?php

namespace FondOfSpryker\Glue\CompanyUnitAddressesRestApi;

use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses\CompanyUnitAddressesReader;
use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses\CompanyUnitAddressesReaderInterface;
use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses\CompanyUnitAddressesWriter;
use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses\CompanyUnitAddressesWriterInterface;
use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\Validation\RestApiError;
use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\Validation\RestApiErrorInterface;
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
            $this->getClient(),
            $this->createRestApiError()
        );
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses\CompanyUnitAddressesReaderInterface
     */
    public function createCompanyUnitAddressesReader(): CompanyUnitAddressesReaderInterface
    {
        return new CompanyUnitAddressesReader(
            $this->getResourceBuilder(),
            $this->getClient(),
            $this->createRestApiError()
        );
    }

    /**
     * @return \FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\Validation\RestApiErrorInterface
     */
    public function createRestApiError(): RestApiErrorInterface
    {
        return new RestApiError();
    }
}
