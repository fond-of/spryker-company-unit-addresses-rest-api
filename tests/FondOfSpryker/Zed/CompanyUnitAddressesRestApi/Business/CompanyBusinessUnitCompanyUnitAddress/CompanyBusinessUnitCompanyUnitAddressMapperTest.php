<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyBusinessUnitCompanyUnitAddress;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;

class CompanyBusinessUnitCompanyUnitAddressMapperTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyBusinessUnitCompanyUnitAddress\CompanyBusinessUnitCompanyUnitAddressMapper
     */
    protected $companyBusinessUnitCompanyUnitAddressMapper;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCompanyUnitAddressesRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    protected $companyUnitAddressTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface
     */
    protected $companyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyBusinessUnitTransfer
     */
    protected $restCompanyBusinessUnitTransferMock;

    /**
     * @var string
     */
    protected $externalReference;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var int
     */
    protected $idCompanyBusinessUnit;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterfaceMock = $this->getMockBuilder(CompanyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressTransferMock = $this->getMockBuilder(CompanyUnitAddressTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyBusinessUnitTransferMock = $this->getMockBuilder(RestCompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->externalReference = 'external-reference';

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idCompanyBusinessUnit = 1;

        $this->companyBusinessUnitCompanyUnitAddressMapper = new CompanyBusinessUnitCompanyUnitAddressMapper(
            $this->companyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testMapCompanyBusinessUnitToCompanyUnitAddress(): void
    {
        $this->restCompanyUnitAddressesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyBusinessUnit')
            ->willReturn($this->restCompanyBusinessUnitTransferMock);

        $this->restCompanyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('getExternalReference')
            ->willReturn($this->externalReference);

        $this->companyUnitAddressesRestApiToCompanyBusinessUnitsRestApiFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('findByExternalReference')
            ->with($this->externalReference)
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->companyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('getIdCompanyBusinessUnit')
            ->willReturn($this->idCompanyBusinessUnit);

        $this->companyUnitAddressTransferMock->expects($this->atLeastOnce())
            ->method('setFkCompanyBusinessUnit')
            ->with($this->idCompanyBusinessUnit)
            ->willReturnSelf();

        $this->companyUnitAddressTransferMock->expects($this->atLeastOnce())
            ->method('setCompanyBusinessUnits')
            ->willReturnSelf();

        $this->assertInstanceOf(
            CompanyUnitAddressTransfer::class,
            $this->companyBusinessUnitCompanyUnitAddressMapper->mapCompanyBusinessUnitToCompanyUnitAddress(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testMapCompanyBusinessUnitToCompanyUnitAddressExternalReferenceNull(): void
    {
        $this->restCompanyUnitAddressesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyBusinessUnit')
            ->willReturn($this->restCompanyBusinessUnitTransferMock);

        $this->restCompanyBusinessUnitTransferMock->expects($this->atLeastOnce())
            ->method('getExternalReference')
            ->willReturn(null);

        $this->assertInstanceOf(
            CompanyUnitAddressTransfer::class,
            $this->companyBusinessUnitCompanyUnitAddressMapper->mapCompanyBusinessUnitToCompanyUnitAddress(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )
        );
    }
}
