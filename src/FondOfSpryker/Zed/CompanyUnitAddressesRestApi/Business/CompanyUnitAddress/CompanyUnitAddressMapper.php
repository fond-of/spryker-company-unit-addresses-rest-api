<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress;

use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;

class CompanyUnitAddressMapper implements CompanyUnitAddressMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyUnitAddressTransfer $companyUnitAddressTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    public function mapToCompanyUnitAddress(
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer,
        CompanyUnitAddressTransfer $companyUnitAddressTransfer
    ): CompanyUnitAddressTransfer {
        $properties = $restCompanyUnitAddressesRequestAttributesTransfer->toArray(true, true);

        foreach ($properties as $key => $value) {
            if ($value === null || $key === 'company' || $key === 'companyBusinessUnit') {
                continue;
            }

            $setterMethod = sprintf('set%s', ucfirst($key));

            if ($key === 'country') {
                $setterMethod = sprintf('set%s', ucfirst(CompanyUnitAddressTransfer::ISO2_CODE));
            }

            $companyUnitAddressTransfer->$setterMethod($value);
        }

        return $companyUnitAddressTransfer;
    }
}
