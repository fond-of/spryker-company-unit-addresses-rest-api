<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyBusinessUnitCompanyUnitAddress\CompanyBusinessUnitCompanyUnitAddressMapperInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyCompanyUnitAddress\CompanyCompanyUnitAddressMapperInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressMapperInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressReaderInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressWriterInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\DefaultBillingAddressRemoverInterface;
use Generated\Shared\Transfer\CompanyUnitAddressResponseTransfer;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;

class CompanyUnitAddressesRestApiFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddressesRestApiFacade
     */
    protected $companyUnitAddressesRestApiFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCompanyUnitAddressesRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddressesRestApiBusinessFactory
     */
    protected $companyUnitAddressesRestApiBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressWriterInterface
     */
    protected $companyUnitAddressWriterInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    protected $restCompanyUnitAddressesResponseTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    protected $companyUnitAddressTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressMapperInterface
     */
    protected $companyUnitAddressMapperInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyCompanyUnitAddress\CompanyCompanyUnitAddressMapperInterface
     */
    protected $companyCompanyUnitAddressMapperInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyBusinessUnitCompanyUnitAddress\CompanyBusinessUnitCompanyUnitAddressMapperInterface
     */
    protected $companyBusinessUnitCompanyUnitAddressMapperInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressReaderInterface
     */
    protected $companyUnitAddressReaderInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer
     */
    protected $restCompanyUnitAddressesRequestTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\DefaultBillingAddressRemoverInterface
     */
    protected $defaultBillingAddressRemoverInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUnitAddressResponseTransfer
     */
    protected $companyUnitAddressResponseTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyUnitAddressesRestApiBusinessFactoryMock = $this->getMockBuilder(CompanyUnitAddressesRestApiBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressWriterInterfaceMock = $this->getMockBuilder(CompanyUnitAddressWriterInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesResponseTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressTransferMock = $this->getMockBuilder(CompanyUnitAddressTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressMapperInterfaceMock = $this->getMockBuilder(CompanyUnitAddressMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyCompanyUnitAddressMapperInterfaceMock = $this->getMockBuilder(CompanyCompanyUnitAddressMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitCompanyUnitAddressMapperInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitCompanyUnitAddressMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressReaderInterfaceMock = $this->getMockBuilder(CompanyUnitAddressReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesRequestTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->defaultBillingAddressRemoverInterfaceMock = $this->getMockBuilder(DefaultBillingAddressRemoverInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressResponseTransferMock = $this->getMockBuilder(CompanyUnitAddressResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiFacade = new CompanyUnitAddressesRestApiFacade();
        $this->companyUnitAddressesRestApiFacade->setFactory($this->companyUnitAddressesRestApiBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testCreate(): void
    {
        $this->companyUnitAddressesRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyUnitAddressWriter')
            ->willReturn($this->companyUnitAddressWriterInterfaceMock);

        $this->companyUnitAddressWriterInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->with($this->restCompanyUnitAddressesRequestAttributesTransferMock)
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressesRestApiFacade->create(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testMapToCompanyUnitAddress(): void
    {
        $this->companyUnitAddressesRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyUnitAddressMapper')
            ->willReturn($this->companyUnitAddressMapperInterfaceMock);

        $this->companyUnitAddressMapperInterfaceMock->expects($this->atLeastOnce())
            ->method('mapToCompanyUnitAddress')
            ->with(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )->willReturn($this->companyUnitAddressTransferMock);

        $this->assertInstanceOf(
            CompanyUnitAddressTransfer::class,
            $this->companyUnitAddressesRestApiFacade->mapToCompanyUnitAddress(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testMapCompanyToCompanyUnitAddress(): void
    {
        $this->companyUnitAddressesRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyCompanyUnitAddressMapper')
            ->willReturn($this->companyCompanyUnitAddressMapperInterfaceMock);

        $this->companyCompanyUnitAddressMapperInterfaceMock->expects($this->atLeastOnce())
            ->method('mapCompanyToCompanyUnitAddress')
            ->with(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )->willReturn($this->companyUnitAddressTransferMock);

        $this->assertInstanceOf(
            CompanyUnitAddressTransfer::class,
            $this->companyUnitAddressesRestApiFacade->mapCompanyToCompanyUnitAddress(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testMapCompanyBusinessUnitToCompanyUnitAddress(): void
    {
        $this->companyUnitAddressesRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyBusinessUnitCompanyUnitAddressMapper')
            ->willReturn($this->companyBusinessUnitCompanyUnitAddressMapperInterfaceMock);

        $this->companyBusinessUnitCompanyUnitAddressMapperInterfaceMock->expects($this->atLeastOnce())
            ->method('mapCompanyBusinessUnitToCompanyUnitAddress')
            ->with(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )->willReturn($this->companyUnitAddressTransferMock);

        $this->assertInstanceOf(
            CompanyUnitAddressTransfer::class,
            $this->companyUnitAddressesRestApiFacade->mapCompanyBusinessUnitToCompanyUnitAddress(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyUnitAddressByExternalReference(): void
    {
        $this->companyUnitAddressesRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyUnitAddressReader')
            ->willReturn($this->companyUnitAddressReaderInterfaceMock);

        $this->companyUnitAddressReaderInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByExternalReference')
            ->with($this->restCompanyUnitAddressesRequestAttributesTransferMock)
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressesRestApiFacade->findCompanyUnitAddressByExternalReference(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyUnitAddressByUuid(): void
    {
        $this->companyUnitAddressesRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyUnitAddressReader')
            ->willReturn($this->companyUnitAddressReaderInterfaceMock);

        $this->companyUnitAddressReaderInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByUuid')
            ->with($this->restCompanyUnitAddressesRequestAttributesTransferMock)
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressesRestApiFacade->findCompanyUnitAddressByUuid(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdate(): void
    {
        $this->companyUnitAddressesRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyUnitAddressWriter')
            ->willReturn($this->companyUnitAddressWriterInterfaceMock);

        $this->companyUnitAddressWriterInterfaceMock->expects($this->atLeastOnce())
            ->method('update')
            ->with($this->restCompanyUnitAddressesRequestTransferMock)
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->assertInstanceOf(
            RestCompanyUnitAddressesResponseTransfer::class,
            $this->companyUnitAddressesRestApiFacade->update(
                $this->restCompanyUnitAddressesRequestTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testRemoveDefaultBillingAddress(): void
    {
        $this->companyUnitAddressesRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createDefaultBillingAddressRemover')
            ->willReturn($this->defaultBillingAddressRemoverInterfaceMock);

        $this->defaultBillingAddressRemoverInterfaceMock->expects($this->atLeastOnce())
            ->method('remove')
            ->with($this->companyUnitAddressTransferMock)
            ->willReturn($this->companyUnitAddressResponseTransferMock);

        $this->assertInstanceOf(
            CompanyUnitAddressResponseTransfer::class,
            $this->companyUnitAddressesRestApiFacade->removeDefaultBillingAddress(
                $this->companyUnitAddressTransferMock
            )
        );
    }
}
