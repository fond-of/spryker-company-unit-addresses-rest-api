<?php

namespace FondOfSpryker\Client\CompanyUnitAddressesRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyUnitAddressesRestApi\Zed\CompanyUnitAddressesRestApiStubInterface;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;

class CompanyUnitAddressesRestApiClientTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiClient
     */
    protected $companyUnitAddressesRestApiClient;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCompanyUnitAddressesRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiFactory
     */
    protected $companyUnitAddressesRestApiFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyUnitAddressesRestApi\Zed\CompanyUnitAddressesRestApiStubInterface
     */
    protected $companyUnitAddressesRestApiStubInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    protected $restCompanyUnitAddressesResponseTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer
     */
    protected $restCompanyUnitAddressesRequestTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->restCompanyUnitAddressesRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiFactoryMock = $this->getMockBuilder(CompanyUnitAddressesRestApiFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiStubInterfaceMock = $this->getMockBuilder(CompanyUnitAddressesRestApiStubInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesResponseTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesRequestTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiClient = new CompanyUnitAddressesRestApiClient();
        $this->companyUnitAddressesRestApiClient->setFactory($this->companyUnitAddressesRestApiFactoryMock);
    }

    /**
     * @return void
     */
    public function testCreate(): void
    {
        $this->companyUnitAddressesRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createZedCompanyUnitAddressesRestApiStub')
            ->willReturn($this->companyUnitAddressesRestApiStubInterfaceMock);

        $this->companyUnitAddressesRestApiStubInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->with($this->restCompanyUnitAddressesRequestAttributesTransferMock)
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressesRestApiClient->create(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyUnitAddressByExternalReference(): void
    {
        $this->companyUnitAddressesRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createZedCompanyUnitAddressesRestApiStub')
            ->willReturn($this->companyUnitAddressesRestApiStubInterfaceMock);

        $this->companyUnitAddressesRestApiStubInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByExternalReference')
            ->with($this->restCompanyUnitAddressesRequestAttributesTransferMock)
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressesRestApiClient->findCompanyUnitAddressByExternalReference(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdate(): void
    {
        $this->companyUnitAddressesRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createZedCompanyUnitAddressesRestApiStub')
            ->willReturn($this->companyUnitAddressesRestApiStubInterfaceMock);

        $this->companyUnitAddressesRestApiStubInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->with($this->restCompanyUnitAddressesRequestTransferMock)
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressesRestApiClient->update(
                $this->restCompanyUnitAddressesRequestTransferMock
            )
        );
    }
}
