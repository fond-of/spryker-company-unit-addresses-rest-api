<?php

namespace FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiClientInterface;
use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\Validation\RestApiErrorInterface;
use Generated\Shared\Transfer\RestCompanyUnitAddressesErrorTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyUnitAddressesReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses\CompanyUnitAddressesReader
     */
    protected $companyUnitAddressesReader;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface
     */
    protected $restResourceBuilderInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiClientInterface
     */
    protected $companyUnitAddressesRestApiClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\Validation\RestApiErrorInterface
     */
    protected $restApiErrorInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface
     */
    protected $restRequestInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected $restResponseInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface
     */
    protected $restResourceInterfaceMock;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    protected $restCompanyUnitAddressesResponseTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesResponseAttributesTransfer
     */
    protected $restCompanyUnitAddressesResponseAttributesTransferMock;

    /**
     * @var string
     */
    protected $externalReference;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesErrorTransfer
     */
    protected $restCompanyUnitAddressesErrorTransferMock;

    /**
     * @var array
     */
    protected $restCompanyUnitAddressesErrorTransferMocks;

    /**
     * @var string
     */
    protected $errorCode;

    /**
     * @var int
     */
    protected $errorStatus;

    /**
     * @var string
     */
    protected $errorDetail;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->restResourceBuilderInterfaceMock = $this->getMockBuilder(RestResourceBuilderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyUnitAddressesRestApiClientInterfaceMock = $this->getMockBuilder(CompanyUnitAddressesRestApiClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restApiErrorInterfaceMock = $this->getMockBuilder(RestApiErrorInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restRequestInterfaceMock = $this->getMockBuilder(RestRequestInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restResponseInterfaceMock = $this->getMockBuilder(RestResponseInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restResourceInterfaceMock = $this->getMockBuilder(RestResourceInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->id = 'id';

        $this->restCompanyUnitAddressesResponseTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesResponseAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesResponseAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->externalReference = 'external-reference';

        $this->restCompanyUnitAddressesErrorTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesErrorTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesErrorTransferMocks = [
          $this->restCompanyUnitAddressesErrorTransferMock,
        ];

        $this->errorCode = 'error-code';

        $this->errorStatus = 500;

        $this->errorDetail = 'error-detail';

        $this->companyUnitAddressesReader = new CompanyUnitAddressesReader(
            $this->restResourceBuilderInterfaceMock,
            $this->companyUnitAddressesRestApiClientInterfaceMock,
            $this->restApiErrorInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyUnitAddressByExternalReference(): void
    {
        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResponse')
            ->willReturn($this->restResponseInterfaceMock);

        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyUnitAddressesRestApiClientInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByExternalReference')
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->restCompanyUnitAddressesResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccess')
            ->willReturn(true);

        $this->restCompanyUnitAddressesResponseTransferMock->expects($this->atLeastOnce())
            ->method('getRestCompanyUnitAddressesResponseAttributes')
            ->willReturn($this->restCompanyUnitAddressesResponseAttributesTransferMock);

        $this->restCompanyUnitAddressesResponseAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getExternalReference')
            ->willReturn($this->externalReference);

        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResponse')
            ->willReturn($this->restResponseInterfaceMock);

        $this->restResponseInterfaceMock->expects($this->atLeastOnce())
            ->method('addResource')
            ->with($this->restResourceInterfaceMock)
            ->willReturn($this->restResponseInterfaceMock);

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyUnitAddressesReader->findCompanyUnitAddressByExternalReference(
                $this->restRequestInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyUnitAddressByExternalReferenceExternalReferenceMissingError(): void
    {
        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResponse')
            ->willReturn($this->restResponseInterfaceMock);

        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn(null);

        $this->restApiErrorInterfaceMock->expects($this->atLeastOnce())
            ->method('addExternalReferenceMissingError')
            ->with($this->restResponseInterfaceMock)
            ->willReturn($this->restResponseInterfaceMock);

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyUnitAddressesReader->findCompanyUnitAddressByExternalReference(
                $this->restRequestInterfaceMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindCompanyUnitAddressByExternalReferenceCompanyUnitAddressesResponseTransferIsNotSuccess(): void
    {
        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResponse')
            ->willReturn($this->restResponseInterfaceMock);

        $this->restRequestInterfaceMock->expects($this->atLeastOnce())
            ->method('getResource')
            ->willReturn($this->restResourceInterfaceMock);

        $this->restResourceInterfaceMock->expects($this->atLeastOnce())
            ->method('getId')
            ->willReturn($this->id);

        $this->companyUnitAddressesRestApiClientInterfaceMock->expects($this->atLeastOnce())
            ->method('findCompanyUnitAddressByExternalReference')
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->restCompanyUnitAddressesResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccess')
            ->willReturn(false);

        $this->restResourceBuilderInterfaceMock->expects($this->atLeastOnce())
            ->method('createRestResponse')
            ->willReturn($this->restResponseInterfaceMock);

        $this->restCompanyUnitAddressesResponseTransferMock->expects($this->atLeastOnce())
            ->method('getErrors')
            ->willReturn($this->restCompanyUnitAddressesErrorTransferMocks);

        $this->restCompanyUnitAddressesErrorTransferMock->expects($this->atLeastOnce())
            ->method('getCode')
            ->willReturn($this->errorCode);

        $this->restCompanyUnitAddressesErrorTransferMock->expects($this->atLeastOnce())
            ->method('getStatus')
            ->willReturn($this->errorStatus);

        $this->restCompanyUnitAddressesErrorTransferMock->expects($this->atLeastOnce())
            ->method('getDetail')
            ->willReturn($this->errorDetail);

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyUnitAddressesReader->findCompanyUnitAddressByExternalReference(
                $this->restRequestInterfaceMock
            )
        );
    }
}
