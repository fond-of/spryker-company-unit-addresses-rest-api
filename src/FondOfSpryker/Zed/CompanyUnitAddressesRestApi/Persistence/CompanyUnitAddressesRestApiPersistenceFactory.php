<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence;

use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiDependencyProvider;
use Orm\Zed\CompanyUnitAddress\Persistence\SpyCompanyUnitAddressQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

class CompanyUnitAddressesRestApiPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\CompanyUnitAddress\Persistence\SpyCompanyUnitAddressQuery
     */
    public function getCompanyUnitAddressPropelQuery(): SpyCompanyUnitAddressQuery
    {
        return $this->getProvidedDependency(CompanyUnitAddressesRestApiDependencyProvider::PROPEL_QUERY_COMPANY_UNIT_ADDRESS);
    }
}
