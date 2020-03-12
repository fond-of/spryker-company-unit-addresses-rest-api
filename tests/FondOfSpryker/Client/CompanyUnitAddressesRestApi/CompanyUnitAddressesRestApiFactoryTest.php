<?php

namespace FondOfSpryker\Client\CompanyUnitAddressesRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyUnitAddressesRestApi\Dependency\Client\CompanyUnitAddressesRestApiToZedRequestClientInterface;
use FondOfSpryker\Client\CompanyUnitAddressesRestApi\Zed\CompanyUnitAddressesRestApiStubInterface;
use Spryker\Client\Kernel\Container;

class CompanyUnitAddressesRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiFactory
     */
    protected $companyUnitAddressesRestApiFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyUnitAddressesRestApi\Dependency\Client\CompanyUnitAddressesRestApiToZedRequestClientInterface
     */
    protected $companyUnitAddressesRestApiToZedRequestClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiToZedRequestClientInterfaceMock = $this->getMockBuilder(CompanyUnitAddressesRestApiToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiFactory = new CompanyUnitAddressesRestApiFactory();
        $this->companyUnitAddressesRestApiFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateZedCompanyUnitAddressesRestApiStub(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(CompanyUnitAddressesRestApiDependencyProvider::CLIENT_ZED_REQUEST)
            ->willReturn($this->companyUnitAddressesRestApiToZedRequestClientInterfaceMock);

        $this->assertInstanceOf(
            CompanyUnitAddressesRestApiStubInterface::class,
            $this->companyUnitAddressesRestApiFactory->createZedCompanyUnitAddressesRestApiStub()
        );
    }
}
