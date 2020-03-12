<?php

namespace FondOfSpryker\Client\CompanyUnitAddressesRestApi;

use FondOfSpryker\Client\CompanyUnitAddressesRestApi\Dependency\Client\CompanyUnitAddressesRestApiToZedRequestClientInterface;
use FondOfSpryker\Client\CompanyUnitAddressesRestApi\Zed\CompanyUnitAddressesRestApiStub;
use FondOfSpryker\Client\CompanyUnitAddressesRestApi\Zed\CompanyUnitAddressesRestApiStubInterface;
use Spryker\Client\Kernel\AbstractFactory;

class CompanyUnitAddressesRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Client\CompanyUnitAddressesRestApi\Zed\CompanyUnitAddressesRestApiStubInterface
     */
    public function createZedCompanyUnitAddressesRestApiStub(): CompanyUnitAddressesRestApiStubInterface
    {
        return new CompanyUnitAddressesRestApiStub($this->getZedRequestClient());
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Client\CompanyUnitAddressesRestApi\Dependency\Client\CompanyUnitAddressesRestApiToZedRequestClientInterface
     */
    protected function getZedRequestClient(): CompanyUnitAddressesRestApiToZedRequestClientInterface
    {
        return $this->getProvidedDependency(CompanyUnitAddressesRestApiDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
