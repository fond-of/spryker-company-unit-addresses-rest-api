<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepositoryInterface;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;

class CompanyUnitAddressReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressReader
     */
    protected $companyUnitAddressReader;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepositoryInterface
     */
    protected $companyUnitAddressesRestApiRepositoryInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCompanyUnitAddressesRequestAttributesTransferMock;

    /**
     * @var string
     */
    protected $externalReference;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    protected $companyUnitAddressTransferMock;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyUnitAddressesRestApiRepositoryInterfaceMock = $this->getMockBuilder(CompanyUnitAddressesRestApiRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->externalReference = 'external-reference';

        $this->companyUnitAddressTransferMock = $this->getMockBuilder(CompanyUnitAddressTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->uuid = 'uuid';

        $this->companyUnitAddressReader = new CompanyUnitAddressReader(
            $this->companyUnitAddressesRestApiRepositoryInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyUnitAddressByExternalReference(): void
    {
        $this->restCompanyUnitAddressesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getExternalReference')
            ->willReturn($this->externalReference);

        $this->companyUnitAddressesRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByExternalReference')
            ->with($this->externalReference)
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->companyUnitAddressTransferMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn([]);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressReader->findCompanyUnitAddressByExternalReference(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyUnitAddressByExternalReferenceCompanyUnitAddressFailedToLoadError(): void
    {
        $this->restCompanyUnitAddressesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getExternalReference')
            ->willReturn($this->externalReference);

        $this->companyUnitAddressesRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByExternalReference')
            ->with($this->externalReference)
            ->willReturn(null);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressReader->findCompanyUnitAddressByExternalReference(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyUnitAddressByUuid(): void
    {
        $this->restCompanyUnitAddressesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getUuid')
            ->willReturn($this->uuid);

        $this->companyUnitAddressesRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByUuid')
            ->with($this->uuid)
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->companyUnitAddressTransferMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn([]);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressReader->findCompanyUnitAddressByUuid(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyUnitAddressByUuidCompanyUnitAddressFailedToLoad(): void
    {
        $this->restCompanyUnitAddressesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getUuid')
            ->willReturn($this->uuid);

        $this->companyUnitAddressesRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByUuid')
            ->with($this->uuid)
            ->willReturn(null);
        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressReader->findCompanyUnitAddressByUuid(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }
}
