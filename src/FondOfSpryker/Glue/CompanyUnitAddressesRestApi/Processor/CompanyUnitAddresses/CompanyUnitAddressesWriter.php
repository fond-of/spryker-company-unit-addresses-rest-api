<?php

namespace FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses;

use FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiClientInterface;
use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiConfig;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyUnitAddressesWriter implements CompanyUnitAddressesWriterInterface
{
    /**
     * @var \FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiClientInterface
     */
    protected $companyUnitAddressesRestApiClient;

    /**
     * @var \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilder;

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface $restResourceBuilder
     * @param \FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiClientInterface $companyUnitAddressesRestApiClient
     */
    public function __construct(
        RestResourceBuilderInterface $restResourceBuilder,
        CompanyUnitAddressesRestApiClientInterface $companyUnitAddressesRestApiClient
    ) {
        $this->restResourceBuilder = $restResourceBuilder;
        $this->companyUnitAddressesRestApiClient = $companyUnitAddressesRestApiClient;
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function createCompanyUnitAddress(
        RestRequestInterface $restRequest,
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
    ): RestResponseInterface {
        $restCompanyUnitAddressesResponseTransfer = $this->companyUnitAddressesRestApiClient->create(
            $restCompanyUnitAddressesRequestAttributesTransfer
        );

        if (!$restCompanyUnitAddressesResponseTransfer->getIsSuccess()) {
            return $this->createSaveCompanyUnitAddressFailedErrorResponse($restCompanyUnitAddressesResponseTransfer);
        }

        return $this->createCompanyUnitAddressSavedResponse($restCompanyUnitAddressesResponseTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer $restCompanyUnitAddressesResponseTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected function createSaveCompanyUnitAddressFailedErrorResponse(
        RestCompanyUnitAddressesResponseTransfer $restCompanyUnitAddressesResponseTransfer
    ): RestResponseInterface {
        $restResponse = $this->restResourceBuilder->createRestResponse();

        foreach ($restCompanyUnitAddressesResponseTransfer->getErrors() as $restCompanyUnitAddressesErrorTransfer) {
            $restResponse->addError((new RestErrorMessageTransfer())
                ->setCode($restCompanyUnitAddressesErrorTransfer->getCode())
                ->setStatus($restCompanyUnitAddressesErrorTransfer->getStatus())
                ->setDetail($restCompanyUnitAddressesErrorTransfer->getDetail()));
        }

        return $restResponse;
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer $restCompanyUnitAddressesResponseTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected function createCompanyUnitAddressSavedResponse(
        RestCompanyUnitAddressesResponseTransfer $restCompanyUnitAddressesResponseTransfer
    ): RestResponseInterface {
        $restCompanyUnitAddressesResponseAttributesTransfer = $restCompanyUnitAddressesResponseTransfer->getRestCompanyUnitAddressesResponseAttributes();

        $restResource = $this->restResourceBuilder->createRestResource(
            CompanyUnitAddressesRestApiConfig::RESOURCE_COMPANY_UNIT_ADDRESSES,
            $restCompanyUnitAddressesResponseAttributesTransfer->getUuid(),
            $restCompanyUnitAddressesResponseAttributesTransfer
        );

        return $this->restResourceBuilder
            ->createRestResponse()
            ->addResource($restResource);
    }
}
