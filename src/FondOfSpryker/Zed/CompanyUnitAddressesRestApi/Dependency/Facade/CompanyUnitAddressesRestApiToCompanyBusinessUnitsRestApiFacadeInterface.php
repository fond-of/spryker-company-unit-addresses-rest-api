<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade;

use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;

interface CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface
{
    /**
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    public function findByExternalReference(string $externalReference): CompanyBusinessUnitTransfer;
}
