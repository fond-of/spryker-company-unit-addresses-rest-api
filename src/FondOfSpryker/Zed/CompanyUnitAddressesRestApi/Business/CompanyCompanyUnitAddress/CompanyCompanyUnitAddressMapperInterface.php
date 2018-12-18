<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyCompanyUnitAddress;

use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;

interface CompanyCompanyUnitAddressMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyUnitAddressTransfer $companyUnitAddressTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    public function mapCompanyToCompanyUnitAddress(
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer,
        CompanyUnitAddressTransfer $companyUnitAddressTransfer
    ): CompanyUnitAddressTransfer;
}
