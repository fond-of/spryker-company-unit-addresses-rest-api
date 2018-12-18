<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Communication\Plugin\CompanyUnitAddressesRestApi;

use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Plugin\CompanyUnitAddressMapperPluginInterface;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddressesRestApiFacadeInterface getFacade()
 */
class CompanyUnitAddressMapperPlugin extends AbstractPlugin implements CompanyUnitAddressMapperPluginInterface
{
    /**
     * Specification:
     * - Maps rest company unit address request data to company unit address transfer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyUnitAddressTransfer $companyUnitAddressTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    public function map(
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer,
        CompanyUnitAddressTransfer $companyUnitAddressTransfer
    ): CompanyUnitAddressTransfer {
        return $this->getFacade()->mapCompanyToCompanyUnitAddress(
            $restCompanyUnitAddressesRequestAttributesTransfer,
            $companyUnitAddressTransfer
        );
    }
}
