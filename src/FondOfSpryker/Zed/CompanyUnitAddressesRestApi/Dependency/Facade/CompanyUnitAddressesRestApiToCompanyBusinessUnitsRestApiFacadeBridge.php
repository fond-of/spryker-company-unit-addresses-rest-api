<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade;

use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;

class CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeBridge implements CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface
     */
    protected $companyBusinessUnitsRestApiFacade;

    /**
     * @param \FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface $companyBusinessUnitsRestApiFacade
     */
    public function __construct(
        CompanyBusinessUnitsRestApiFacadeInterface $companyBusinessUnitsRestApiFacade
    ) {
        $this->companyBusinessUnitsRestApiFacade = $companyBusinessUnitsRestApiFacade;
    }

    /**
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    public function findByExternalReference(string $externalReference): CompanyBusinessUnitTransfer
    {
        return $this->companyBusinessUnitsRestApiFacade->findByExternalReference($externalReference);
    }
}
