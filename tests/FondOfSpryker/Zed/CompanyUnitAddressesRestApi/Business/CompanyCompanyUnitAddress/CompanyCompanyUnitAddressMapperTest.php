<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyCompanyUnitAddress;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;

class CompanyCompanyUnitAddressMapperTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyCompanyUnitAddress\CompanyCompanyUnitAddressMapper
     */
    protected $companyCompanyUnitAddressMapper;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface
     */
    protected $companyUnitAddressesRestApiToCompaniesRestApiFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCompanyUnitAddressesRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    protected $companyUnitAddressTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyTransfer
     */
    protected $restCompanyTransferMock;

    /**
     * @var string
     */
    protected $externalReference;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyTransfer
     */
    protected $companyTransferMock;

    /**
     * @var int
     */
    protected $idCompany;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyUnitAddressesRestApiToCompaniesRestApiFacadeInterfaceMock = $this->getMockBuilder(CompanyUnitAddressesRestApiToCompaniesRestApiFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressTransferMock = $this->getMockBuilder(CompanyUnitAddressTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyTransferMock = $this->getMockBuilder(RestCompanyTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->externalReference = 'external-reference';

        $this->companyTransferMock = $this->getMockBuilder(CompanyTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idCompany = 1;

        $this->companyCompanyUnitAddressMapper = new CompanyCompanyUnitAddressMapper(
            $this->companyUnitAddressesRestApiToCompaniesRestApiFacadeInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testMapCompanyToCompanyUnitAddress(): void
    {
        $this->restCompanyUnitAddressesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getCompany')
            ->willReturn($this->restCompanyTransferMock);

        $this->restCompanyTransferMock->expects($this->atLeastOnce())
            ->method('getExternalReference')
            ->willReturn($this->externalReference);

        $this->companyUnitAddressesRestApiToCompaniesRestApiFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('findByExternalReference')
            ->with($this->externalReference)
            ->willReturn($this->companyTransferMock);

        $this->companyTransferMock->expects($this->atLeastOnce())
            ->method('getIdCompany')
            ->willReturn($this->idCompany);

        $this->companyUnitAddressTransferMock->expects($this->atLeastOnce())
            ->method('setFkCompany')
            ->willReturnSelf();

        $this->assertInstanceOf(
            CompanyUnitAddressTransfer::class,
            $this->companyCompanyUnitAddressMapper->mapCompanyToCompanyUnitAddress(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testMapCompanyToCompanyUnitAddressExternalReferenceNull(): void
    {
        $this->restCompanyUnitAddressesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getCompany')
            ->willReturn($this->restCompanyTransferMock);

        $this->restCompanyTransferMock->expects($this->atLeastOnce())
            ->method('getExternalReference')
            ->willReturn(null);

        $this->assertInstanceOf(
            CompanyUnitAddressTransfer::class,
            $this->companyCompanyUnitAddressMapper->mapCompanyToCompanyUnitAddress(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )
        );
    }
}
