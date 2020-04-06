<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Plugin\CompanyUnitAddressMapperPluginInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepositoryInterface;
use Generated\Shared\Transfer\CompanyUnitAddressResponseTransfer;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;
use Propel\Runtime\Exception\PropelException;

class CompanyUnitAddressWriterTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressWriter
     */
    protected $companyUnitAddressWriter;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepositoryInterface
     */
    protected $companyUnitAddressesRestApiRepositoryInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface
     */
    protected $companyUnitAddressesRestApiToCompanyUnitAddressFacadeInterfaceMock;

    /**
     * @var array
     */
    protected $companyUnitAddressMapperPlugins;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCompanyUnitAddressesRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Plugin\CompanyUnitAddressMapperPluginInterface
     */
    protected $companyUnitAddressMapperPluginInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    protected $companyUnitAddressTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUnitAddressResponseTransfer
     */
    protected $companyUnitAddressResponseTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Propel\Runtime\Exception\PropelException
     */
    protected $propelExceptionMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer
     */
    protected $restCompanyUnitAddressesRequestTransferMock;

    /**
     * @var int
     */
    protected $id;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyUnitAddressesRestApiRepositoryInterfaceMock = $this->getMockBuilder(CompanyUnitAddressesRestApiRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiToCompanyUnitAddressFacadeInterfaceMock = $this->getMockBuilder(CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressMapperPluginInterfaceMock = $this->getMockBuilder(CompanyUnitAddressMapperPluginInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressMapperPlugins = [
            $this->companyUnitAddressMapperPluginInterfaceMock,
        ];

        $this->restCompanyUnitAddressesRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressTransferMock = $this->getMockBuilder(CompanyUnitAddressTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressResponseTransferMock = $this->getMockBuilder(CompanyUnitAddressResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->propelExceptionMock = $this->getMockBuilder(PropelException::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesRequestTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->id = 1;

        $this->companyUnitAddressWriter = new CompanyUnitAddressWriter(
            $this->companyUnitAddressesRestApiRepositoryInterfaceMock,
            $this->companyUnitAddressesRestApiToCompanyUnitAddressFacadeInterfaceMock,
            $this->companyUnitAddressMapperPlugins
        );
    }

    /**
     * @return void
     */
    public function testCreate(): void
    {
        $this->companyUnitAddressMapperPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('map')
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->companyUnitAddressesRestApiToCompanyUnitAddressFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->willReturn($this->companyUnitAddressResponseTransferMock);

        $this->companyUnitAddressResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(true);

        $this->companyUnitAddressResponseTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyUnitAddressTransfer')
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->companyUnitAddressTransferMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn([]);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressWriter->create(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyUnitAddressesDataInvalidError(): void
    {
        $this->companyUnitAddressMapperPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('map')
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->companyUnitAddressesRestApiToCompanyUnitAddressFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->willReturn($this->companyUnitAddressResponseTransferMock);

        $this->companyUnitAddressResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(false);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressWriter->create(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyUnitCatchAddressesDataInvalidError(): void
    {
        $this->companyUnitAddressMapperPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('map')
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->companyUnitAddressesRestApiToCompanyUnitAddressFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->willThrowException($this->propelExceptionMock);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressWriter->create(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdate(): void
    {
        $this->restCompanyUnitAddressesRequestTransferMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyUnitAddressesRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByExternalReference')
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->restCompanyUnitAddressesRequestTransferMock->expects($this->atLeastOnce())
            ->method('getRestCompanyUnitAddressesRequestAttributes')
            ->willReturn($this->restCompanyUnitAddressesRequestAttributesTransferMock);

        $this->companyUnitAddressMapperPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('map')
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->companyUnitAddressesRestApiToCompanyUnitAddressFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->willReturn($this->companyUnitAddressResponseTransferMock);

        $this->companyUnitAddressResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(true);

        $this->companyUnitAddressResponseTransferMock->expects($this->atLeastOnce())
            ->method('getCompanyUnitAddressTransfer')
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->companyUnitAddressTransferMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->willReturn([]);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressWriter->update(
                $this->restCompanyUnitAddressesRequestTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdateCompanyUnitAddressTransferNull(): void
    {
        $this->restCompanyUnitAddressesRequestTransferMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyUnitAddressesRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByExternalReference')
            ->willReturn(null);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressWriter->update(
                $this->restCompanyUnitAddressesRequestTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdateCompanyUnitAddressesDataInvalid(): void
    {
        $this->restCompanyUnitAddressesRequestTransferMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyUnitAddressesRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByExternalReference')
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->restCompanyUnitAddressesRequestTransferMock->expects($this->atLeastOnce())
            ->method('getRestCompanyUnitAddressesRequestAttributes')
            ->willReturn($this->restCompanyUnitAddressesRequestAttributesTransferMock);

        $this->companyUnitAddressMapperPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('map')
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->companyUnitAddressesRestApiToCompanyUnitAddressFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->willThrowException($this->propelExceptionMock);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressWriter->update(
                $this->restCompanyUnitAddressesRequestTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdateCompanyUnitAddressResponseIsNotSuccessful(): void
    {
        $this->restCompanyUnitAddressesRequestTransferMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyUnitAddressesRestApiRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByExternalReference')
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->restCompanyUnitAddressesRequestTransferMock->expects($this->atLeastOnce())
            ->method('getRestCompanyUnitAddressesRequestAttributes')
            ->willReturn($this->restCompanyUnitAddressesRequestAttributesTransferMock);

        $this->companyUnitAddressMapperPluginInterfaceMock->expects($this->atLeastOnce())
            ->method('map')
            ->willReturn($this->companyUnitAddressTransferMock);

        $this->companyUnitAddressesRestApiToCompanyUnitAddressFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->willReturn($this->companyUnitAddressResponseTransferMock);

        $this->companyUnitAddressResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccessful')
            ->willReturn(false);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressWriter->update(
                $this->restCompanyUnitAddressesRequestTransferMock
            )
        );
    }
}
