<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence;

use Generated\Shared\Transfer\CompanyUnitAddressTransfer;

interface CompanyUnitAddressesRestApiRepositoryInterface
{
    /**
     * Specification:
     *  - Retrieve a company unit address by externalReference
     *
     * @api
     *
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyUnitAddressTransfer|null
     */
    public function findCompanyUnitAddressByExternalReference(string $externalReference): ?CompanyUnitAddressTransfer;
}
