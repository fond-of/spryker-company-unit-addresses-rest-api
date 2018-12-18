<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress;

use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;

interface CompanyUnitAddressWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    public function create(RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer): RestCompanyUnitAddressesResponseTransfer;
}
