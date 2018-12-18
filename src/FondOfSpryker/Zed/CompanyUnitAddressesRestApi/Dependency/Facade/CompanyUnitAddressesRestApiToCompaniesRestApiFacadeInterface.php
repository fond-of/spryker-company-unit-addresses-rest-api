<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade;

use Generated\Shared\Transfer\CompanyTransfer;

interface CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface
{
    /**
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer|null
     */
    public function findByExternalReference(string $externalReference): ?CompanyTransfer;
}
