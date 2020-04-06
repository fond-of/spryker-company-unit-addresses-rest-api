<?php

namespace FondOfSpryker\Client\CompanyUnitAddressesRestApi\Dependency\Client;

use Codeception\Test\Unit;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;
use Spryker\Shared\Kernel\Transfer\TransferInterface;

class CompanyUnitAddressesRestApiToZedRequestClientBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyUnitAddressesRestApi\Dependency\Client\CompanyUnitAddressesRestApiToZedRequestClientBridge
     */
    protected $companyUnitAddressesRestApiToZedRequestClientBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    protected $zedRequestClientInterfaceMock;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    protected $transferInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->zedRequestClientInterfaceMock = $this->getMockBuilder(ZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->url = 'url';

        $this->transferInterfaceMock = $this->getMockBuilder(TransferInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiToZedRequestClientBridge = new CompanyUnitAddressesRestApiToZedRequestClientBridge(
            $this->zedRequestClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testCall(): void
    {
        $this->zedRequestClientInterfaceMock->expects($this->atLeastOnce())
            ->method('call')
            ->with($this->url, $this->transferInterfaceMock)
            ->willReturn($this->transferInterfaceMock);

        $this->assertInstanceOf(
            TransferInterface::class,
            $this->companyUnitAddressesRestApiToZedRequestClientBridge->call(
                $this->url,
                $this->transferInterfaceMock
            )
        );
    }
}
