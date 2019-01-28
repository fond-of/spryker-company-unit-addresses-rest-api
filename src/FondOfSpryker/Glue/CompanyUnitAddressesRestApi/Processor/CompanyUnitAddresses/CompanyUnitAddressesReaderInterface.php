<?php

namespace FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses;

use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

interface CompanyUnitAddressesReaderInterface
{
    /**
     * @param \Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface $restRequest
     *
     * @return \Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    public function findCompanyUnitAddressByExternalReference(RestRequestInterface $restRequest): RestResponseInterface;
}
