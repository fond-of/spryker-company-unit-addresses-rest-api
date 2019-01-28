<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Communication\Controller;

use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddressesRestApiFacadeInterface getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    public function createAction(
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
    ): RestCompanyUnitAddressesResponseTransfer {
        return $this->getFacade()->create($restCompanyUnitAddressesRequestAttributesTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    public function findCompanyUnitAddressByExternalReferenceAction(RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer): RestCompanyUnitAddressesResponseTransfer
    {
        return $this->getFacade()->findCompanyUnitAddressByExternalReference($restCompanyUnitAddressesRequestAttributesTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer $restCompanyUnitAddressesRequestTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    public function updateAction(RestCompanyUnitAddressesRequestTransfer $restCompanyUnitAddressesRequestTransfer): RestCompanyUnitAddressesResponseTransfer
    {
        return $this->getFacade()->update($restCompanyUnitAddressesRequestTransfer);
    }
}
