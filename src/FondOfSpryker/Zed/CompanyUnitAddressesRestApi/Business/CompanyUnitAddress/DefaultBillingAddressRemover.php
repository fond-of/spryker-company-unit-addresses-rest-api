<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress;

use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitFacadeInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CompanyUnitAddressResponseTransfer;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Orm\Zed\CompanyBusinessUnit\Persistence\SpyCompanyBusinessUnitQuery;

class DefaultBillingAddressRemover implements DefaultBillingAddressRemoverInterface
{
    protected const DEFAULT_BILLING_ADDRESS_FIELD = 'DefaultBillingAddress';

    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitFacadeInterface
     */
    protected $companyBusinessUnitFacade;

    /**
     * @var \Orm\Zed\CompanyBusinessUnit\Persistence\SpyCompanyBusinessUnitQuery
     */
    protected $spyCompanyBusinessUnitQuery;

    /**
     * @param \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitFacadeInterface $companyBusinessUnitFacade
     * @param \Orm\Zed\CompanyBusinessUnit\Persistence\SpyCompanyBusinessUnitQuery $spyCompanyBusinessUnitQuery
     */
    public function __construct(
        CompanyUnitAddressesRestApiToCompanyBusinessUnitFacadeInterface $companyBusinessUnitFacade,
        SpyCompanyBusinessUnitQuery $spyCompanyBusinessUnitQuery
    ) {
        $this->companyBusinessUnitFacade = $companyBusinessUnitFacade;
        $this->spyCompanyBusinessUnitQuery = $spyCompanyBusinessUnitQuery;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUnitAddressTransfer $companyUnitAddressTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUnitAddressResponseTransfer
     */
    public function remove(CompanyUnitAddressTransfer $companyUnitAddressTransfer): CompanyUnitAddressResponseTransfer
    {
        $companyUnitAddressTransfer->requireIdCompanyUnitAddress();

        if ($companyUnitAddressTransfer->getFkCompanyBusinessUnit()
            && !$companyUnitAddressTransfer->getIsDefaultBilling()
        ) {
            $companyBusinessUnitTransfer = new CompanyBusinessUnitTransfer();
            $companyBusinessUnitTransfer
                ->setIdCompanyBusinessUnit($companyUnitAddressTransfer->getFkCompanyBusinessUnit());

            $companyBusinessUnitTransfer = $this->companyBusinessUnitFacade->getCompanyBusinessUnitById($companyBusinessUnitTransfer);

            if ($companyBusinessUnitTransfer->getDefaultBillingAddress() === $companyUnitAddressTransfer->getIdCompanyUnitAddress()) {
                $this->spyCompanyBusinessUnitQuery->filterByIdCompanyBusinessUnit($companyUnitAddressTransfer->getFkCompanyBusinessUnit())
                    ->update([static::DEFAULT_BILLING_ADDRESS_FIELD => null]);
            }
        }

        return (new CompanyUnitAddressResponseTransfer())
            ->setCompanyUnitAddressTransfer($companyUnitAddressTransfer)
            ->setIsSuccessful(true);
    }
}
