<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress;

use FondOfSpryker\Shared\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiConfig;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepositoryInterface;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesErrorTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;
use Propel\Runtime\Exception\PropelException;
use Spryker\Shared\Log\LoggerTrait;
use Symfony\Component\HttpFoundation\Response;

class CompanyUnitAddressWriter implements CompanyUnitAddressWriterInterface
{
    use LoggerTrait;

    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface
     */
    protected $companyUnitAddressFacade;

    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Plugin\CompanyUnitAddressMapperPluginInterface[]
     */
    protected $companyUnitAddressMapperPlugins;

    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepositoryInterface
     */
    protected $companyUnitAddressesRestApiRepository;

    /**
     * @param \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepositoryInterface $companyUnitAddressesRestApiRepository
     * @param \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Facade\CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface $companyUnitAddressFacade
     * @param \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Dependency\Plugin\CompanyUnitAddressMapperPluginInterface[] $companyUnitAddressMapperPlugins
     */
    public function __construct(
        CompanyUnitAddressesRestApiRepositoryInterface $companyUnitAddressesRestApiRepository,
        CompanyUnitAddressesRestApiToCompanyUnitAddressFacadeInterface $companyUnitAddressFacade,
        array $companyUnitAddressMapperPlugins
    ) {
        $this->companyUnitAddressFacade = $companyUnitAddressFacade;
        $this->companyUnitAddressMapperPlugins = $companyUnitAddressMapperPlugins;
        $this->companyUnitAddressesRestApiRepository = $companyUnitAddressesRestApiRepository;
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

    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestTransfer $restCompanyUnitAddressesRequestTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    public function update(RestCompanyUnitAddressesRequestTransfer $restCompanyUnitAddressesRequestTransfer
    ): RestCompanyUnitAddressesResponseTransfer
    {
        $companyUnitAddressTransfer = $this->companyUnitAddressesRestApiRepository
            ->findCompanyUnitAddressByExternalReference($restCompanyUnitAddressesRequestTransfer->getId());

        if ($companyUnitAddressTransfer === null) {
            return $this->createCompanyUnitAddressFailedToLoadErrorResponseTransfer();
        }

        foreach ($this->companyUnitAddressMapperPlugins as $companyUnitAddressMapperPlugin) {
            $companyUnitAddressTransfer = $companyUnitAddressMapperPlugin->map(
                $restCompanyUnitAddressesRequestTransfer->getRestCompanyUnitAddressesRequestAttributes(),
                $companyUnitAddressTransfer
            );
        }

        try {
            $companyUnitAddressResponseTransfer = $this->companyUnitAddressFacade->update($companyUnitAddressTransfer);
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
    protected function createCompanyUnitAddressFailedToLoadErrorResponseTransfer(): RestCompanyUnitAddressesResponseTransfer
    {
        $restCompanyUnitAddressesErrorTransfer = new RestCompanyUnitAddressesErrorTransfer();

        $restCompanyUnitAddressesErrorTransfer->setStatus(Response::HTTP_NOT_FOUND)
            ->setCode(CompanyUnitAddressesRestApiConfig::RESPONSE_CODE_COMPANY_UNIT_ADDRESS_NOT_FOUND)
            ->setDetail(CompanyUnitAddressesRestApiConfig::RESPONSE_DETAILS_COMPANY_UNIT_ADDRESS_NOT_FOUND);

        $restCompanyUnitAddressesResponseTransfer = new RestCompanyUnitAddressesResponseTransfer();

        $restCompanyUnitAddressesResponseTransfer->setIsSuccess(false)
            ->addError($restCompanyUnitAddressesErrorTransfer);

        return $restCompanyUnitAddressesResponseTransfer;
    }
}
