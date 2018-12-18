<?php

namespace FondOfSpryker\Client\CompanyUnitAddressesRestApi\Zed;

use FondOfSpryker\Client\CompanyUnitAddressesRestApi\Dependency\Client\CompanyUnitAddressesRestApiToZedRequestClientInterface;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;

class CompanyUnitAddressesRestApiStub implements CompanyUnitAddressesRestApiStubInterface
{
    /**
     * @var \FondOfSpryker\Client\CompanyUnitAddressesRestApi\Dependency\Client\CompanyUnitAddressesRestApiToZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \FondOfSpryker\Client\CompanyUnitAddressesRestApi\Dependency\Client\CompanyUnitAddressesRestApiToZedRequestClientInterface $zedRequestClient
     */
    public function __construct(CompanyUnitAddressesRestApiToZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    public function create(
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
    ): RestCompanyUnitAddressesResponseTransfer {
        /** @var \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer $restCompanyUnitAddressesResponseTransfer */
        $restCompanyUnitAddressesResponseTransfer = $this->zedRequestClient->call(
            '/company-unit-addresses-rest-api/gateway/create',
            $restCompanyUnitAddressesRequestAttributesTransfer
        );

        return $restCompanyUnitAddressesResponseTransfer;
    }
}
