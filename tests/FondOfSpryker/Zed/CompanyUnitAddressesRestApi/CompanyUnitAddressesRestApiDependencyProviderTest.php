<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi;

use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class CompanyUnitAddressesRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiDependencyProvider
     */
    protected $companyUnitAddressesRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiDependencyProvider = new CompanyUnitAddressesRestApiDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->companyUnitAddressesRestApiDependencyProvider->provideBusinessLayerDependencies(
                $this->containerMock
            )
        );
    }

    /**
     * @return void
     */
    public function testProvidePersistenceLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->companyUnitAddressesRestApiDependencyProvider->providePersistenceLayerDependencies(
                $this->containerMock
            )
        );
    }
}
