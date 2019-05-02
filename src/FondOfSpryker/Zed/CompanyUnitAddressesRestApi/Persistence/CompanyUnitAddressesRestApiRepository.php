<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence;

use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiPersistenceFactory getFactory()
 */
class CompanyUnitAddressesRestApiRepository extends AbstractRepository implements CompanyUnitAddressesRestApiRepositoryInterface
{
    /**
     * Specification:
     *  - Retrieve a company unit address by externalReference
     *
     * @api
     *
     * @param string $externalReference
     *
     * @return \Generated\Shared\Transfer\CompanyUnitAddressTransfer|null
     */
    public function findCompanyUnitAddressByExternalReference(string $externalReference): ?CompanyUnitAddressTransfer
    {
        $spyCompanyUnitAddress = $this->getFactory()
            ->getCompanyUnitAddressPropelQuery()
            ->filterByExternalReference($externalReference)
            ->findOne();

        if ($spyCompanyUnitAddress === null) {
            return null;
        }

        $companyUnitAddressTransfer = (new CompanyUnitAddressTransfer())->fromArray(
            $spyCompanyUnitAddress->toArray(),
            true
        );

        return $companyUnitAddressTransfer;
    }

    /**
     * Specification:
     *  - Retrieve a company unit address by uuid
     *
     * @api
     *
     * @param string $uuid
     *
     * @return \Generated\Shared\Transfer\CompanyUnitAddressTransfer|null
     */
    public function findCompanyUnitAddressByUuid(string $uuid): ?CompanyUnitAddressTransfer
    {
        $spyCompanyUnitAddress = $this->getFactory()
            ->getCompanyUnitAddressPropelQuery()
            ->filterByUuid($uuid)
            ->findOne();

        if ($spyCompanyUnitAddress === null) {
            return null;
        }

        $companyUnitAddressTransfer = (new CompanyUnitAddressTransfer())->fromArray(
            $spyCompanyUnitAddress->toArray(),
            true
        );

        return $companyUnitAddressTransfer;
    }
}
