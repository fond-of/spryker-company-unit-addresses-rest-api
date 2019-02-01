<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyBusinessUnitCompanyUnitAddress;

use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitCollectionTransfer;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;

class CompanyBusinessUnitCompanyUnitAddressMapper implements CompanyBusinessUnitCompanyUnitAddressMapperInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface
     */
    protected $companyBusinessUnitsRestApiFacade;

    /**
     * @param \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface $companyBusinessUnitsRestApiFacade
     */
    public function __construct(CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface $companyBusinessUnitsRestApiFacade)
    {
        $this->companyBusinessUnitsRestApiFacade = $companyBusinessUnitsRestApiFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\CompanyUnitAddressTransfer $companyUnitAddressTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    public function mapCompanyBusinessUnitToCompanyUnitAddress(
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer,
        CompanyUnitAddressTransfer $companyUnitAddressTransfer
    ): CompanyUnitAddressTransfer {
        $companyBusinessUnit = $restCompanyUnitAddressesRequestAttributesTransfer->getCompanyBusinessUnit();

        if ($companyBusinessUnit === null || $companyBusinessUnit->getExternalReference() === null) {
            return $companyUnitAddressTransfer;
        }

        $companyBusinessUnitTransfer = $this->companyBusinessUnitsRestApiFacade->findByExternalReference($companyBusinessUnit->getExternalReference());

        if ($companyBusinessUnitTransfer !== null) {
            $companyBusinessUnitCollectionTransfer = new CompanyBusinessUnitCollectionTransfer();
            $companyBusinessUnitCollectionTransfer->addCompanyBusinessUnit($companyBusinessUnitTransfer);

            $companyUnitAddressTransfer->setFkCompanyBusinessUnit($companyBusinessUnitTransfer->getIdCompanyBusinessUnit())
                ->setCompanyBusinessUnits($companyBusinessUnitCollectionTransfer);
        }

        return $companyUnitAddressTransfer;
    }
}
