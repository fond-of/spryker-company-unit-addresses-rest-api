<?php

namespace FondOfSpryker\Glue\CompanyUnitAddressesRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\Validation\RestApiErrorInterface;

class CompanyUnitAddressesRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiFactory
     */
    protected $companyUnitAddressesRestApiFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiClient
     */
    protected $companyUnitAddressesRestApiClientMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->companyUnitAddressesRestApiFactory = new CompanyUnitAddressesRestApiFactory();
    }

    /**
     * @return void
     */
    public function testCreateRestApiError(): void
    {
        $this->assertInstanceOf(
            RestApiErrorInterface::class,
            $this->companyUnitAddressesRestApiFactory->createRestApiError()
        );
    }
}
