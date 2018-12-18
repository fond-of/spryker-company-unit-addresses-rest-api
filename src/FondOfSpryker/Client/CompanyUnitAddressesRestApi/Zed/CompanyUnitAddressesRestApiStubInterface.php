<?php

namespace FondOfSpryker\Client\CompanyUnitAddressesRestApi\Zed;

use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;

interface CompanyUnitAddressesRestApiStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    public function create(
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
    ): RestCompanyUnitAddressesResponseTransfer;
}
