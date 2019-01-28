<?php

namespace FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\Validation;

use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiConfig;
use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Symfony\Component\HttpFoundation\Response;

class RestApiError implements RestApiErrorInterface
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface $restResponse
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function addExternalReferenceMissingError(RestResponseInterface $restResponse): RestResponseInterface
    {
        $restErrorTransfer = (new RestErrorMessageTransfer())
            ->setCode(CompanyUnitAddressesRestApiConfig::RESPONSE_CODE_EXTERNAL_REFERENCE_MISSING)
            ->setStatus(Response::HTTP_BAD_REQUEST)
            ->setDetail(CompanyUnitAddressesRestApiConfig::RESPONSE_DETAILS_EXTERNAL_REFERENCE_MISSING);

        return $restResponse->addError($restErrorTransfer);
    }
}
