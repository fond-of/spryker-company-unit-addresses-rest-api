<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade;

use Generated\Shared\Transfer\CompanyUnitAddressResponseTransfer;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;

interface CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyUnitAddressTransfer $companyUnitAddressTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUnitAddressResponseTransfer
     */
    public function create(CompanyUnitAddressTransfer $companyUnitAddressTransfer): CompanyUnitAddressResponseTransfer;
}
