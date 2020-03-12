<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Spryker\Zed\CompanyBusinessUnit\Business\CompanyBusinessUnitFacadeInterface;

class CompanyUnitAddressesRestApiToCompanyBusinessUnitFacadeBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitFacadeBridge
     */
    protected $companyUnitAddressesRestApiToCompanyBusinessUnitFacadeBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\CompanyBusinessUnit\Business\CompanyBusinessUnitFacadeInterface
     */
    protected $companyBusinessUnitFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitResponseTransfer
     */
    protected $companyBusinessUnitResponseTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyBusinessUnitFacadeInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitResponseTransferMock = $this->getMockBuilder(CompanyBusinessUnitResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiToCompanyBusinessUnitFacadeBridge = new CompanyUnitAddressesRestApiToCompanyBusinessUnitFacadeBridge(
            $this->companyBusinessUnitFacadeInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testUpdate(): void
    {
        $this->companyBusinessUnitFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->with($this->companyBusinessUnitTransferMock)
            ->willReturn($this->companyBusinessUnitResponseTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitResponseTransfer::class,
            $this->companyUnitAddressesRestApiToCompanyBusinessUnitFacadeBridge->update(
                $this->companyBusinessUnitTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testGetCompanyBusinessUnitById(): void
    {
        $this->companyBusinessUnitFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('getCompanyBusinessUnitById')
            ->with($this->companyBusinessUnitTransferMock)
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitTransfer::class,
            $this->companyUnitAddressesRestApiToCompanyBusinessUnitFacadeBridge->getCompanyBusinessUnitById(
                $this->companyBusinessUnitTransferMock
            )
        );
    }
}
