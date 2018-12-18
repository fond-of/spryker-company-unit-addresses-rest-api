<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress;

use FondOfSpryker\Shared\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiConfig;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesErrorTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;
use Propel\Runtime\Exception\PropelException;
use Symfony\Component\HttpFoundation\Response;

class CompanyUnitAddressWriter implements CompanyUnitAddressWriterInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface
     */
    protected $companyUnitAddressFacade;

    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Plugin\CompanyUnitAddressMapperPluginInterface[]
     */
    protected $companyUnitAddressMapperPlugins;

    /**
     * @param \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface $companyUnitAddressFacade
     * @param \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Plugin\CompanyUnitAddressMapperPluginInterface[] $companyUnitAddressMapperPlugins
     */
    public function __construct(
        CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface $companyUnitAddressFacade,
        array $companyUnitAddressMapperPlugins
    ) {
        $this->companyUnitAddressFacade = $companyUnitAddressFacade;
        $this->companyUnitAddressMapperPlugins = $companyUnitAddressMapperPlugins;
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    public function create(
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
    ): RestCompanyUnitAddressesResponseTransfer {
        $companyUnitAddressTransfer = new CompanyUnitAddressTransfer();

        foreach ($this->companyUnitAddressMapperPlugins as $companyUnitAddressMapperPlugin) {
            $companyUnitAddressTransfer = $companyUnitAddressMapperPlugin->map(
                $restCompanyUnitAddressesRequestAttributesTransfer,
                $companyUnitAddressTransfer
            );
        }

        try {
            $companyUnitAddressResponseTransfer = $this->companyUnitAddressFacade->create($companyUnitAddressTransfer);
        } catch (PropelException $e) {
            return $this->createCompanyUnitAddressesDataInvalidErrorResponse();
        }

        if (!$companyUnitAddressResponseTransfer->getIsSuccessful()) {
            return $this->createCompanyUnitAddressesDataInvalidErrorResponse();
        }

        return $this->createCompanyUnitAddressesResponseTransfer(
            $companyUnitAddressResponseTransfer->getCompanyUnitAddressTransfer()
        );
    }

    /**
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    protected function createCompanyUnitAddressesDataInvalidErrorResponse(): RestCompanyUnitAddressesResponseTransfer
    {
        $restCompanyUnitAddressesErrorTransfer = new RestCompanyUnitAddressesErrorTransfer();

        $restCompanyUnitAddressesErrorTransfer->setStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->setCode(CompanyUnitAddressesRestApiConfig::RESPONSE_CODE_COMPANY_UNIT_ADDRESS_DATA_INVALID)
            ->setDetail(CompanyUnitAddressesRestApiConfig::RESPONSE_DETAILS_COMPANY_UNIT_ADDRESS_DATA_INVALID);

        $restCompanyUnitAddressesResponseTransfer = new RestCompanyUnitAddressesResponseTransfer();

        $restCompanyUnitAddressesResponseTransfer->setIsSuccess(false)
            ->addError($restCompanyUnitAddressesErrorTransfer);

        return $restCompanyUnitAddressesResponseTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUnitAddressTransfer $companyUnitAddressTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    protected function createCompanyUnitAddressesResponseTransfer(CompanyUnitAddressTransfer $companyUnitAddressTransfer): RestCompanyUnitAddressesResponseTransfer
    {
        $restCompanyUnitAddressesResponseAttributesTransfer = new RestCompanyUnitAddressesResponseAttributesTransfer();

        $restCompanyUnitAddressesResponseAttributesTransfer->fromArray(
            $companyUnitAddressTransfer->toArray(),
            true
        );

        $restCompanyUnitAddressesResponseTransfer = new RestCompanyUnitAddressesResponseTransfer();

        $restCompanyUnitAddressesResponseTransfer->setIsSuccess(true)
            ->setRestCompanyUnitAddressesResponseAttributes($restCompanyUnitAddressesResponseAttributesTransfer);

        return $restCompanyUnitAddressesResponseTransfer;
    }
}
