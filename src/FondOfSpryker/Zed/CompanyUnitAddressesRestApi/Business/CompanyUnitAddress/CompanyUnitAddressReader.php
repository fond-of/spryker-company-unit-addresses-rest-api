<?php

namespace FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Business\CompanyUnitAddress;

use FondOfSpryker\Shared\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiConfig;
use FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepositoryInterface;
use Generated\Shared\Transfer\CompanyUnitAddressTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesErrorTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;
use Symfony\Component\HttpFoundation\Response;

class CompanyUnitAddressReader implements CompanyUnitAddressReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepositoryInterface
     */
    protected $companyUnitAddressesRestApiRepository;

    /**
     * @param \FondOfSpryker\Zed\CompanyUnitAddressesRestApi\Persistence\CompanyUnitAddressesRestApiRepositoryInterface $companyUnitAddressesRestApiRepository
     */
    public function __construct(CompanyUnitAddressesRestApiRepositoryInterface $companyUnitAddressesRestApiRepository)
    {
        $this->companyUnitAddressesRestApiRepository = $companyUnitAddressesRestApiRepository;
    }

    /**
     * @param \Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    public function findCompanyUnitAddressByExternalReference(
        RestCompanyUnitAddressesRequestAttributesTransfer $restCompanyUnitAddressesRequestAttributesTransfer
    ): RestCompanyUnitAddressesResponseTransfer {
        $companyUnitAddressTransfer = $this->companyUnitAddressesRestApiRepository->findCompanyUnitAddressByExternalReference(
            $restCompanyUnitAddressesRequestAttributesTransfer->getExternalReference()
        );

        if ($companyUnitAddressTransfer !== null) {
            return $this->createCompanyUnitAddressResponseTransfer($companyUnitAddressTransfer);
        }

        return $this->createCompanyUnitAddressFailedToLoadErrorResponseTransfer();
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUnitAddressTransfer $companyUnitAddressTransfer
     *
     * @return \Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    protected function createCompanyUnitAddressResponseTransfer(
        CompanyUnitAddressTransfer $companyUnitAddressTransfer
    ): RestCompanyUnitAddressesResponseTransfer {
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
