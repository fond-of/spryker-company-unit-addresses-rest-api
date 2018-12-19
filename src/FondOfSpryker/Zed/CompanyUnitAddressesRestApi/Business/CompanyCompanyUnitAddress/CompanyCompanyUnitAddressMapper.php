<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyCompanyUnitAddress;

use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;

class CompanyCompanyUnitAddressMapper implements CompanyCompanyUnitAddressMapperInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface
     */
    protected $companiesRestApiFacade;

    /**
     * @param \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface $companiesRestApiFacade
     */
    public function __construct(CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface $companiesRestApiFacade)
    {
        $this->companiesRestApiFacade = $companiesRestApiFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyUnitAddressTransfer $companyUnitAddressTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    public function mapCompanyToCompanyUnitAddress(
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer,
        CompanyUnitAddressTransfer $companyUnitAddressTransfer
    ): CompanyUnitAddressTransfer {
        $company = $restCompanyUnitAddressesRequestAttributesTransfer->getCompany();

        if ($company === null || $company->getExternalReference() === null) {
            return $companyUnitAddressTransfer;
        }

        $companyTransfer = $this->companiesRestApiFacade->findByExternalReference($company->getExternalReference());

        if ($companyTransfer !== null) {
            $companyUnitAddressTransfer->setFkCompany($companyTransfer->getIdCompany());
        }

        return $companyUnitAddressTransfer;
    }
}
