<?php

namespace FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiConfig;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;

class CompanyUnitAddressesResourceRoutePluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Plugin\CompanyUnitAddressesResourceRoutePlugin
     */
    protected $companyUnitAddressesResourceRoutePlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface
     */
    protected $resourceRouteCollectionInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->resourceRouteCollectionInterfaceMock = $this->getMockBuilder(ResourceRouteCollectionInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesResourceRoutePlugin = new CompanyUnitAddressesResourceRoutePlugin();
    }

    /**
     * @return void
     */
    public function testConfigure(): void
    {
        $this->resourceRouteCollectionInterfaceMock->expects($this->atLeastOnce())
            ->method('addGet')
            ->with(CompanyUnitAddressesRestApiConfig::ACTION_COMPANY_UNIT_ADDRESSES_GET, true)
            ->willReturnSelf();

        $this->resourceRouteCollectionInterfaceMock->expects($this->atLeastOnce())
            ->method('addPatch')
            ->with(CompanyUnitAddressesRestApiConfig::ACTION_COMPANY_UNIT_ADDRESSES_PATCH, true)
            ->willReturnSelf();

        $this->resourceRouteCollectionInterfaceMock->expects($this->atLeastOnce())
            ->method('addPost')
            ->with(CompanyUnitAddressesRestApiConfig::ACTION_COMPANY_UNIT_ADDRESSES_POST, true)
            ->willReturnSelf();

        $this->assertInstanceOf(
            ResourceRouteCollectionInterface::class,
            $this->companyUnitAddressesResourceRoutePlugin->configure(
                $this->resourceRouteCollectionInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testGetResourceType(): void
    {
        $this->assertSame(
            CompanyUnitAddressesRestApiConfig::RESOURCE_COMPANY_UNIT_ADDRESSES,
            $this->companyUnitAddressesResourceRoutePlugin->getResourceType()
        );
    }

    /**
     * @return void
     */
    public function testGetController(): void
    {
        $this->assertSame(
            CompanyUnitAddressesRestApiConfig::CONTROLLER_COMPANY_UNIT_ADDRESSES,
            $this->companyUnitAddressesResourceRoutePlugin->getController()
        );
    }

    /**
     * @return void
     */
    public function testGetResourceAttributesClassName(): void
    {
        $this->assertSame(
            RestCompanyUnitAddressesRequestAttributesTransfer::class,
            $this->companyUnitAddressesResourceRoutePlugin->getResourceAttributesClassName()
        );
    }
}
