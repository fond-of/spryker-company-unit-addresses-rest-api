<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyBusinessUnitCompanyUnitAddress\CompanyBusinessUnitCompanyUnitAddressMapperInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyCompanyUnitAddress\CompanyCompanyUnitAddressMapperInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressMapperInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressReaderInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressWriterInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiDependencyProvider;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepository;
use Spryker\Zed\Kernel\Container;

class CompanyUnitAddressesRestApiBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddressesRestApiBusinessFactory
     */
    protected $companyUnitAddressesRestApiBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepository
     */
    protected $companyUnitAddressesRestApiRepository;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface
     */
    protected $companyUnitAddressesRestApiToCompanyUnitAddressFacadeInterfaceMock;

    /**
     * @var array
     */
    protected $companyUnitAddressMapperPlugins;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface
     */
    protected $companyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface
     */
    protected $companyUnitAddressesRestApiToCompaniesRestApiFacadeInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiRepository = $this->getMockBuilder(CompanyUnitAddressesRestApiRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiToCompanyUnitAddressFacadeInterfaceMock = $this->getMockBuilder(CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterfaceMock = $this->getMockBuilder(CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiToCompaniesRestApiFacadeInterfaceMock = $this->getMockBuilder(CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressMapperPlugins = [];

        $this->companyUnitAddressesRestApiBusinessFactory = new CompanyUnitAddressesRestApiBusinessFactory();
        $this->companyUnitAddressesRestApiBusinessFactory->setContainer($this->containerMock);
        $this->companyUnitAddressesRestApiBusinessFactory->setRepository($this->companyUnitAddressesRestApiRepository);
    }

    /**
     * @return void
     */
    public function testCreateCompanyUnitAddressReader(): void
    {
        $this->assertInstanceOf(
            CompanyUnitAddressReaderInterface::class,
            $this->companyUnitAddressesRestApiBusinessFactory->createCompanyUnitAddressReader()
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyUnitAddressWriter(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->withConsecutive(
                [CompanyUnitAddressesRestApiDependencyProvider::FACADE_COMPANY_UNIT_ADDRESS],
                [CompanyUnitAddressesRestApiDependencyProvider::PLUGINS_COMPANY_UNIT_ADDRESS_MAPPER]
            )->willReturnOnConsecutiveCalls(
                $this->companyUnitAddressesRestApiToCompanyUnitAddressFacadeInterfaceMock,
                $this->companyUnitAddressMapperPlugins
            );

        $this->assertInstanceOf(
            CompanyUnitAddressWriterInterface::class,
            $this->companyUnitAddressesRestApiBusinessFactory->createCompanyUnitAddressWriter()
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyUnitAddressMapper(): void
    {
        $this->assertInstanceOf(
            CompanyUnitAddressMapperInterface::class,
            $this->companyUnitAddressesRestApiBusinessFactory->createCompanyUnitAddressMapper()
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyCompanyUnitAddressMapper(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(CompanyUnitAddressesRestApiDependencyProvider::FACADE_COMPANIES_REST_API)
            ->willReturn($this->companyUnitAddressesRestApiToCompaniesRestApiFacadeInterfaceMock);

        $this->assertInstanceOf(
            CompanyCompanyUnitAddressMapperInterface::class,
            $this->companyUnitAddressesRestApiBusinessFactory->createCompanyCompanyUnitAddressMapper()
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyBusinessUnitCompanyUnitAddressMapper(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(CompanyUnitAddressesRestApiDependencyProvider::FACADE_COMPANY_BUSINESS_UNITS_REST_API)
            ->willReturn($this->companyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterfaceMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitCompanyUnitAddressMapperInterface::class,
            $this->companyUnitAddressesRestApiBusinessFactory->createCompanyBusinessUnitCompanyUnitAddressMapper()
        );
    }
}
