<?php

namespace FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Plugin;

use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiConfig;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface;
use Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRoutePluginInterface;
use Spryker\Glue\Kernel\AbstractPlugin;

class CompanyUnitAddressesResourceRoutePlugin extends AbstractPlugin implements ResourceRoutePluginInterface
{
    /**
     * @api
     *
     * {@inheritdoc}
     *
     * @param \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface $resourceRouteCollection
     *
     * @return \Spryker\Glue\GlueApplicationExtension\Dependency\Plugin\ResourceRouteCollectionInterface
     */
    public function configure(ResourceRouteCollectionInterface $resourceRouteCollection): ResourceRouteCollectionInterface
    {
        $resourceRouteCollection
            ->addGet(CompanyUnitAddressesRestApiConfig::ACTION_COMPANY_UNIT_ADDRESSES_GET, true)
            ->addPatch(CompanyUnitAddressesRestApiConfig::ACTION_COMPANY_UNIT_ADDRESSES_PATCH, true)
            ->addPost(CompanyUnitAddressesRestApiConfig::ACTION_COMPANY_UNIT_ADDRESSES_POST, true);

        return $resourceRouteCollection;
    }

    /**
     * @api
     *
     * {@inheritdoc}
     *
     * @return string
     */
    public function getResourceType(): string
    {
        return CompanyUnitAddressesRestApiConfig::RESOURCE_COMPANY_UNIT_ADDRESSES;
    }

    /**
     * @api
     *
     * {@inheritdoc}
     *
     * @return string
     */
    public function getController(): string
    {
        return CompanyUnitAddressesRestApiConfig::CONTROLLER_COMPANY_UNIT_ADDRESSES;
    }

    /**
     * @api
     *
     * {@inheritdoc}
     *
     * @return string
     */
    public function getResourceAttributesClassName(): string
    {
        return RestCompanyUnitAddressesRequestAttributesTransfer::class;
    }
}
