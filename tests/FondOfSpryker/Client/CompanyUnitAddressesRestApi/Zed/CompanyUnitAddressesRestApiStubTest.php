<?php

namespace FondOfSpryker\Client\CompanyUnitAddressesRestApi\Zed;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyUnitAddressesRestApi\Dependency\Client\CompanyUnitAddressesRestApiToZedRequestClientInterface;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;

class CompanyUnitAddressesRestApiStubTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyUnitAddressesRestApi\Zed\CompanyUnitAddressesRestApiStub
     */
    protected $companyUnitAddressesRestApiStub;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyUnitAddressesRestApi\Dependency\Client\CompanyUnitAddressesRestApiToZedRequestClientBridge
     */
    protected $companyUnitAddressesRestApiToZedRequestClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCompanyUnitAddressesRequestAttributesTransferMock;

    /**
     * @var string
     */
    protected $createUrl;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    protected $restCompanyUnitAddressesResponseTransferMock;

    /**
     * @var string
     */
    protected $findUrl;

    /**
     * @var string
     */
    protected $updateUrl;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer
     */
    protected $restCompanyUnitAddressesRequestTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyUnitAddressesRestApiToZedRequestClientInterfaceMock = $this->getMockBuilder(CompanyUnitAddressesRestApiToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesResponseTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesRequestTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->createUrl = '/company-unit-addresses-rest-api/gateway/create';

        $this->findUrl = '/company-unit-addresses-rest-api/gateway/find-company-unit-address-by-external-reference';

        $this->updateUrl = '/company-unit-addresses-rest-api/gateway/update';

        $this->companyUnitAddressesRestApiStub = new CompanyUnitAddressesRestApiStub(
            $this->companyUnitAddressesRestApiToZedRequestClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testCreate(): void
    {
        $this->companyUnitAddressesRestApiToZedRequestClientInterfaceMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->createUrl, $this->restCompanyUnitAddressesRequestAttributesTransferMock)
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressesRestApiStub->create(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyUnitAddressByExternalReference(): void
    {
        $this->companyUnitAddressesRestApiToZedRequestClientInterfaceMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->findUrl, $this->restCompanyUnitAddressesRequestAttributesTransferMock)
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressesRestApiStub->findCompanyUnitAddressByExternalReference(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdate(): void
    {
        $this->companyUnitAddressesRestApiToZedRequestClientInterfaceMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->updateUrl, $this->restCompanyUnitAddressesRequestTransferMock)
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressesRestApiStub->update(
                $this->restCompanyUnitAddressesRequestTransferMock
            )
        );
    }
}
