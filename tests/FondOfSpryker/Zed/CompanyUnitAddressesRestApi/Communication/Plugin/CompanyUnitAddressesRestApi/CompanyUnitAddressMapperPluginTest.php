<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Communication\Plugin\CompanyUnitAddressesRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddressesRestApiFacade;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;

class CompanyUnitAddressMapperPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Communication\Plugin\CompanyUnitAddressesRestApi\CompanyUnitAddressMapperPlugin
     */
    protected $companyUnitAddressMapperPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCompanyUnitAddressesRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    protected $companyUnitAddressTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddressesRestApiFacade
     */
    protected $companyUnitAddressesRestApiFacadeMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyUnitAddressesRestApiFacadeMock = $this->getMockBuilder(CompanyUnitAddressesRestApiFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressTransferMock = $this->getMockBuilder(CompanyUnitAddressTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressMapperPlugin = new CompanyUnitAddressMapperPlugin();
        $this->companyUnitAddressMapperPlugin->setFacade($this->companyUnitAddressesRestApiFacadeMock);
    }

    /**
     * @return void
     */
    public function testMap(): void
    {
        $this->companyUnitAddressesRestApiFacadeMock->expects($this->atLeastOnce())
            ->method('mapToCompanyUnitAddress')
            ->with(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )->willReturn($this->companyUnitAddressTransferMock);

        $this->assertInstanceOf(
            CompanyUnitAddressTransfer::class,
            $this->companyUnitAddressMapperPlugin->map(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )
        );
    }
}
