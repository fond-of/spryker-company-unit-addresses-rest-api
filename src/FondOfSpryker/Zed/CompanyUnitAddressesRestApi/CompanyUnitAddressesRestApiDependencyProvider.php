<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi;

use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Communication\Plugin\CompanyUnitAddressesRestApi\CompanyCompanyUnitAddressMapperPlugin;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Communication\Plugin\CompanyUnitAddressesRestApi\CompanyUnitAddressMapperPlugin;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompaniesRestApiFacadeBridge;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeBridge;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeBridge;
use FondOfSpryker\Zed\CompanyUsersRestApi\Communication\Plugin\CompanyUsersRestApi\CompanyUserMapperPlugin;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CompanyUnitAddressesRestApiDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_COMPANY_UNIT_ADDRESS = 'FACADE_COMPANY_UNIT_ADDRESS';
    public const FACADE_COMPANIES_REST_API = 'FACADE_COMPANIES_REST_API';
    public const PLUGINS_COMPANY_UNIT_ADDRESS_MAPPER = 'PLUGINS_COMPANY_UNIT_ADDRESS_MAPPER';
    public const FACADE_COMPANY_BUSINESS_UNITS_REST_API = 'FACADE_COMPANY_BUSINESS_UNITS_REST_API';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addCompanyUnitAddressFacade($container);
        $container = $this->addCompaniesRestApiFacade($container);
        $container = $this->addCompanyBusinessUnitsRestApiFacade($container);
        $container = $this->addCompanyUnitAddressMapperPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCompanyUnitAddressFacade(Container $container): Container
    {
        $container[static::FACADE_COMPANY_UNIT_ADDRESS] = function (Container $container) {
            return new CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeBridge(
                $container->getLocator()->companyUnitAddress()->facade()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCompanyUnitAddressMapperPlugins(Container $container): Container
    {
        $container[static::PLUGINS_COMPANY_UNIT_ADDRESS_MAPPER] = function () {
            return $this->getCompanyUnitAddressMapperPlugins();
        };

        return $container;
    }

    /**
     * @return \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Plugin\CompanyUnitAddressMapperPluginInterface[]
     */
    protected function getCompanyUnitAddressMapperPlugins(): array
    {
        return [
            new CompanyUnitAddressMapperPlugin(),
            new CompanyCompanyUnitAddressMapperPlugin(),
            new CompanyBusinessUnitCompanyUnitAddressMapperPlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCompaniesRestApiFacade(Container $container): Container
    {
        $container[static::FACADE_COMPANIES_REST_API] = function (Container $container) {
            return new CompanyUnitAddressesRestApiToCompaniesRestApiFacadeBridge(
                $container->getLocator()->companiesRestApi()->facade()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCompanyBusinessUnitsRestApiFacade(Container $container): Container
    {
        $container[static::FACADE_COMPANY_BUSINESS_UNITS_REST_API] = function (Container $container) {
            return new CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeBridge(
                $container->getLocator()->companyBusinessUnitsRestApi()->facade()
            );
        };

        return $container;
    }
}
