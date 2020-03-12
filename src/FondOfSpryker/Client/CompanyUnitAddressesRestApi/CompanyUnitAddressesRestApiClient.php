<?php

namespace FondOfSpryker\Client\CompanyUnitAddressesRestApi;

use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiFactory getFactory()
 */
class CompanyUnitAddressesRestApiClient extends AbstractClient implements CompanyUnitAddressesRestApiClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    public function create(
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
    ): RestCompanyUnitAddressesResponseTransfer {
        return $this->getFactory()
            ->createZedCompanyUnitAddressesRestApiStub()
            ->create($restCompanyUnitAddressesRequestAttributesTransfer);
    }

    /**
     * Specification:
     *  - Retrieve a company unit address by CompanyUnitAddressTransfer::externalReference in the transfer
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    public function findCompanyUnitAddressByExternalReference(
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
    ): RestCompanyUnitAddressesResponseTransfer {
        return $this->getFactory()
            ->createZedCompanyUnitAddressesRestApiStub()
            ->findCompanyUnitAddressByExternalReference($restCompanyUnitAddressesRequestAttributesTransfer);
    }

    /**
     * Specification:
     *  - Update a company unit address from RestCompanyUnitAddressesRequestTransfer
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer $restCompanyUnitAddressesRequestTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    public function update(
        RestCompanyUnitAddressesRequestTransfer $restCompanyUnitAddressesRequestTransfer
    ): RestCompanyUnitAddressesResponseTransfer {
        return $this->getFactory()
            ->createZedCompanyUnitAddressesRestApiStub()
            ->update($restCompanyUnitAddressesRequestTransfer);
    }
}
