<?php

namespace FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Controller;

use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Spryker\Glue\Kernel\Controller\AbstractController;

/**
 * @method \FondOfSpryker\Glue\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiFactory getFactory()
 */
class CompanyUnitAddressesResourceController extends AbstractController
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function getAction(RestRequestInterface $restRequest): RestResponseInterface
    {
        return $this->getFactory()->createCompanyUnitAddressesReader()->findCompanyUnitAddressByExternalReference($restRequest);
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function postAction(RestRequestInterface $restRequest, RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer): RestResponseInterface
    {
        return $this->getFactory()->createCompanyUnitAddressesWriter()->createCompanyUnitAddress($restRequest, $restCompanyUnitAddressesRequestAttributesTransfer);
    }

    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function patchAction(RestRequestInterface $restRequest, RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer): RestResponseInterface
    {
        return $this->getFactory()->createCompanyUnitAddressesWriter()->updateCompanyUnitAddress($restRequest, $restCompanyUnitAddressesRequestAttributesTransfer);
    }
}
