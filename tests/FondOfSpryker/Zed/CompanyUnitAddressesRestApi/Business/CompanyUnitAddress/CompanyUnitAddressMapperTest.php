<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;

class CompanyUnitAddressMapperTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress\CompanyUnitAddressMapper
     */
    protected $companyUnitAddressMapper;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCompanyUnitAddressesRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyUnitAddressTransfer
     */
    protected $companyUnitAddressTransferMock;

    /**
     * @var array
     */
    protected $properties;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->restCompanyUnitAddressesRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressTransferMock = $this->getMockBuilder(CompanyUnitAddressTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->properties = [
            'company' => 'company',
            'isDefaultBillingAddress' => 1,
            'country' => 'DE',
        ];

        $this->companyUnitAddressMapper = new CompanyUnitAddressMapper();
    }

    /**
     * @return void
     */
    public function testMapToCompanyUnitAddress(): void
    {
        $this->restCompanyUnitAddressesRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('toArray')
            ->with(true, true)
            ->willReturn($this->properties);

        $this->assertInstanceOf(
            CompanyUnitAddressTransfer::class,
            $this->companyUnitAddressMapper->mapToCompanyUnitAddress(
                $this->restCompanyUnitAddressesRequestAttributesTransferMock,
                $this->companyUnitAddressTransferMock
            )
        );
    }
}
