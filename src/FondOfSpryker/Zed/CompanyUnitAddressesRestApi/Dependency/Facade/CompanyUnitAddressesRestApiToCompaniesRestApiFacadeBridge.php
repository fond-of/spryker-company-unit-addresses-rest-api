<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade;

use FondOfSpryker\Zed\CompaniesRestApi\Business\CompaniesRestApiFacadeInterface;
use Generated\Shared\Transfer\CompanyTransfer;

class CompanyUnitAddressesRestApiToCompaniesRestApiFacadeBridge implements CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompaniesRestApi\Business\CompaniesRestApiFacadeInterface
     */
    protected $companiesRestApiFacade;

    /**
     * @param \FondOfSpryker\Zed\CompaniesRestApi\Business\CompaniesRestApiFacadeInterface $companiesRestApiFacade
     */
    public function __construct(CompaniesRestApiFacadeInterface $companiesRestApiFacade)
    {
        $this->companiesRestApiFacade = $companiesRestApiFacade;
    }

    /**
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer|null
     */
    public function findByExternalReference(string $externalReference): ?CompanyTransfer
    {
        return $this->companiesRestApiFacade->findByExternalReference($externalReference);
    }
}
