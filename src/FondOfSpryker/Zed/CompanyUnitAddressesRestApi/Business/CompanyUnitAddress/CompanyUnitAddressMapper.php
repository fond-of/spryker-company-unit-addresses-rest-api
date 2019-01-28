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
        if ($restCompanyUnitAddressesRequestAttributesTransfer->getExternalReference() !== null) {
            $companyUnitAddressTransfer->setExternalReference($restCompanyUnitAddressesRequestAttributesTransfer->getExternalReference());
        }

        if ($restCompanyUnitAddressesRequestAttributesTransfer->getAddress1() !== null) {
            $companyUnitAddressTransfer->setAddress1($restCompanyUnitAddressesRequestAttributesTransfer->getAddress1());
        }

        if ($restCompanyUnitAddressesRequestAttributesTransfer->getAddress2() !== null) {
            $companyUnitAddressTransfer->setAddress2($restCompanyUnitAddressesRequestAttributesTransfer->getAddress2());
        }

        if ($restCompanyUnitAddressesRequestAttributesTransfer->getAddress3() !== null) {
            $companyUnitAddressTransfer->setAddress3($restCompanyUnitAddressesRequestAttributesTransfer->getAddress3());
        }

        if ($restCompanyUnitAddressesRequestAttributesTransfer->getCity() !== null) {
            $companyUnitAddressTransfer->setCity($restCompanyUnitAddressesRequestAttributesTransfer->getCity());
        }

        if ($restCompanyUnitAddressesRequestAttributesTransfer->getZipCode() !== null) {
            $companyUnitAddressTransfer->setZipCode($restCompanyUnitAddressesRequestAttributesTransfer->getZipCode());
        }

        if ($restCompanyUnitAddressesRequestAttributesTransfer->getCountry() !== null) {
            $companyUnitAddressTransfer->setIso2Code($restCompanyUnitAddressesRequestAttributesTransfer->getCountry());
        }

        if ($restCompanyUnitAddressesRequestAttributesTransfer->getPhone() !== null) {
            $companyUnitAddressTransfer->setPhone($restCompanyUnitAddressesRequestAttributesTransfer->getPhone());
        }

        if ($restCompanyUnitAddressesRequestAttributesTransfer->getComment() !== null) {
            $companyUnitAddressTransfer->setComment($restCompanyUnitAddressesRequestAttributesTransfer->getComment());
        }

        if ($restCompanyUnitAddressesRequestAttributesTransfer->getIsDefaultBillingAddress() !== null) {
            $companyUnitAddressTransfer->setIsDefaultBilling($restCompanyUnitAddressesRequestAttributesTransfer->getIsDefaultBillingAddress());
        }

        return $companyUnitAddressTransfer;
    }
}
