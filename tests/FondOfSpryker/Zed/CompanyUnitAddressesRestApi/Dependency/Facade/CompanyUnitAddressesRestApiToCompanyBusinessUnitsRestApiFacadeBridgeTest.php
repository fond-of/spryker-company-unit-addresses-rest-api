<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;

class CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeBridge
     */
    protected $companyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitsRestApi\Business\CompanyBusinessUnitsRestApiFacadeInterface
     */
    protected $companyBusinessUnitsRestApiFacadeInterfaceMock;

    /**
     * @var string
     */
    protected $externalReference;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyBusinessUnitsRestApiFacadeInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitsRestApiFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->externalReference = 'external-reference';

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeBridge = new CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeBridge(
            $this->companyBusinessUnitsRestApiFacadeInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindByExternalReference(): void
    {
        $this->companyBusinessUnitsRestApiFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('findByExternalReference')
            ->with($this->externalReference)
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitTransfer::class,
            $this->companyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeBridge->findByExternalReference(
                $this->externalReference
            )
        );
    }
}
