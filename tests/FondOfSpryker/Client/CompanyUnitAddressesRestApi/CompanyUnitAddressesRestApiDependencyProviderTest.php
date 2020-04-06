<?php

namespace FondOfSpryker\Client\CompanyUnitAddressesRestApi;

use Codeception\Test\Unit;
use Spryker\Client\Kernel\Container;

class CompanyUnitAddressesRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiDependencyProvider
     */
    protected $companyUnitAddressesRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Kernel\Container
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
    public function testProvideServiceLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->companyUnitAddressesRestApiDependencyProvider->provideServiceLayerDependencies(
                $this->containerMock
            )
        );
    }
}
