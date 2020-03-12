<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business;

use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyBusinessUnitCompanyUnitAddress\CompanyBusinessUnitCompanyUnitAddressMapper;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyBusinessUnitCompanyUnitAddress\CompanyBusinessUnitCompanyUnitAddressMapperInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyCompanyUnitAddress\CompanyCompanyUnitAddressMapper;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyCompanyUnitAddress\CompanyCompanyUnitAddressMapperInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressMapper;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressMapperInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressReader;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressReaderInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressWriter;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressWriterInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\DefaultBillingAddressRemover;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\DefaultBillingAddressRemoverInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiDependencyProvider;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitFacadeInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface;
use Orm\Zed\CompanyBusinessUnit\Persistence\SpyCompanyBusinessUnitQuery;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepositoryInterface getRepository()
 */
class CompanyUnitAddressesRestApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressReaderInterface
     */
    public function createCompanyUnitAddressReader(): CompanyUnitAddressReaderInterface
    {
        return new CompanyUnitAddressReader(
            $this->getRepository()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressWriterInterface
     */
    public function createCompanyUnitAddressWriter(): CompanyUnitAddressWriterInterface
    {
        return new CompanyUnitAddressWriter(
            $this->getRepository(),
            $this->getCompanyUnitAddressFacade(),
            $this->getCompanyUnitAddressMapperPlugins()
        );
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressMapperInterface
     */
    public function createCompanyUnitAddressMapper(): CompanyUnitAddressMapperInterface
    {
        return new CompanyUnitAddressMapper();
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyCompanyUnitAddress\CompanyCompanyUnitAddressMapperInterface
     */
    public function createCompanyCompanyUnitAddressMapper(): CompanyCompanyUnitAddressMapperInterface
    {
        return new CompanyCompanyUnitAddressMapper(
            $this->getCompaniesRestApiFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyBusinessUnitCompanyUnitAddress\CompanyBusinessUnitCompanyUnitAddressMapperInterface
     */
    public function createCompanyBusinessUnitCompanyUnitAddressMapper(): CompanyBusinessUnitCompanyUnitAddressMapperInterface
    {
        return new CompanyBusinessUnitCompanyUnitAddressMapper(
            $this->getCompanyBusinessUnitsRestApiFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\DefaultBillingAddressRemoverInterface
     */
    public function createDefaultBillingAddressRemover(): DefaultBillingAddressRemoverInterface
    {
        return new DefaultBillingAddressRemover(
            $this->getCompanyBusinessUnitFacade(),
            $this->getCompanyBusinessUnitPropelQuery()
        );
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface
     */
    protected function getCompanyUnitAddressFacade(): CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface
    {
        return $this->getProvidedDependency(CompanyUnitAddressesRestApiDependencyProvider::FACADE_COMPANY_UNIT_ADDRESS);
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface
     */
    protected function getCompaniesRestApiFacade(): CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface
    {
        return $this->getProvidedDependency(CompanyUnitAddressesRestApiDependencyProvider::FACADE_COMPANIES_REST_API);
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Plugin\CompanyUnitAddressMapperPluginInterface[]
     */
    protected function getCompanyUnitAddressMapperPlugins(): array
    {
        return $this->getProvidedDependency(CompanyUnitAddressesRestApiDependencyProvider::PLUGINS_COMPANY_UNIT_ADDRESS_MAPPER);
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface
     */
    protected function getCompanyBusinessUnitsRestApiFacade(): CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface
    {
        return $this->getProvidedDependency(CompanyUnitAddressesRestApiDependencyProvider::FACADE_COMPANY_BUSINESS_UNITS_REST_API);
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitFacadeInterface
     */
    protected function getCompanyBusinessUnitFacade(): CompanyUnitAddressesRestApiToCompanyBusinessUnitFacadeInterface
    {
        return $this->getProvidedDependency(CompanyUnitAddressesRestApiDependencyProvider::FACADE_COMPANY_BUSINESS_UNIT);
    }

    /**
     * @throws
     *
     * @return \Orm\Zed\CompanyBusinessUnit\Persistence\SpyCompanyBusinessUnitQuery
     */
    protected function getCompanyBusinessUnitPropelQuery(): SpyCompanyBusinessUnitQuery
    {
        return $this->getProvidedDependency(CompanyUnitAddressesRestApiDependencyProvider::PROPEL_QUERY_COMPANY_BUSINESS_UNIT);
    }
}
