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
     * @param \Generated\Shared\Transfer\RestCompanyBusinessUnitsRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function postAction(RestRequestInterface $restRequest, RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyBusinessUnitsRequestAttributesTransfer): RestResponseInterface
    {
        return $this->getFactory()->createCompanyUnitAddressesWriter()->createCompanyBusinessUnit($restRequest, $restCompanyBusinessUnitsRequestAttributesTransfer);
    }
}
