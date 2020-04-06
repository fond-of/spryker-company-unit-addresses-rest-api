<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Communication\Plugin\CompanyUnitAddress;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddressesRestApiFacade;
use Generated\Shared\Transfer\CompanyUnitAddressResponseTransfer;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;

class RemoveDefaultCompanyUnitAddressPostSavePluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Communication\Plugin\CompanyUnitAddress\RemoveDefaultCompanyUnitAddressPostSavePlugin
     */
    protected $removeDefaultCompanyUnitAddressPostSavePlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddressesRestApiFacade
     */
    protected $companyUnitAddressesRestApiFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    protected $companyUnitAddressTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUnitAddressResponseTransfer
     */
    protected $companyUnitAddressResponseTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyUnitAddressesRestApiFacadeMock = $this->getMockBuilder(CompanyUnitAddressesRestApiFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressTransferMock = $this->getMockBuilder(CompanyUnitAddressTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressResponseTransferMock = $this->getMockBuilder(CompanyUnitAddressResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->removeDefaultCompanyUnitAddressPostSavePlugin = new RemoveDefaultCompanyUnitAddressPostSavePlugin();
        $this->removeDefaultCompanyUnitAddressPostSavePlugin->setFacade($this->companyUnitAddressesRestApiFacadeMock);
    }

    /**
     * @return void
     */
    public function testPostSave(): void
    {
        $this->companyUnitAddressesRestApiFacadeMock->expects($this->atLeastOnce())
            ->method('removeDefaultBillingAddress')
            ->with($this->companyUnitAddressTransferMock)
            ->willReturn($this->companyUnitAddressResponseTransferMock);

        $this->assertInstanceOf(
            CompanyUnitAddressResponseTransfer::class,
            $this->removeDefaultCompanyUnitAddressPostSavePlugin->postSave(
                $this->companyUnitAddressTransferMock
            )
        );
    }
}
