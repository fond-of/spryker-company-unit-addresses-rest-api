<?php

namespace FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses;

use Codeception\Test\Unit;
use FondOfSpryker\Client\CompanyUnitAddressesRestApi\CompanyUnitAddressesRestApiClientInterface;
use FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\Validation\RestApiErrorInterface;
use Generated\Shared\Transfer\RestCompanyUnitAddressesErrorTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;

class CompanyUnitAddressesWriterTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\CompanyUnitAddressesRestApi\Processor\CompanyUnitAddresses\CompanyUnitAddressesWriter
     */
    protected $companyUnitAddressesWriter;

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
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCompanyUnitAddressesRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesResponseTransfer
     */
    protected $restCompanyUnitAddressesResponseTransferMock;

    /**
     * @var string
     */
    protected $externalReference;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface
     */
    protected $restResourceInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface
     */
    protected $restResponseInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
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
     * @var string
     */
    protected $id;

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

        $this->restCompanyUnitAddressesRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesResponseTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->externalReference = 'external-reference';

        $this->restResourceInterfaceMock = $this->getMockBuilder(RestResourceInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restResponseInterfaceMock = $this->getMockBuilder(RestResponseInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesErrorTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesErrorTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesErrorTransferMocks = [
            $this->restCompanyUnitAddressesErrorTransferMock,
        ];

        $this->errorCode = 'error-code';

        $this->errorStatus = 500;

        $this->errorDetail = 'error-detail';

        $this->id = 'id';

        $this->companyUnitAddressesWriter = new CompanyUnitAddressesWriter(
            $this->restResourceBuilderInterfaceMock,
            $this->companyUnitAddressesRestApiClientInterfaceMock,
            $this->restApiErrorInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyUnitAddress(): void
    {
        $this->companyUnitAddressesRestApiClientInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->with($this->restCompanyUnitAddressesRequestAttributesTransferMock)
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->restCompanyUnitAddressesResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccess')
            ->willReturn(true);

        $this->restCompanyUnitAddressesResponseTransferMock->expects($this->atLeastOnce())
            ->method('getRestCompanyUnitAddressesResponseAttributes')
            ->willReturn($this->restCompanyUnitAddressesRequestAttributesTransferMock);

        $this->restCompanyUnitAddressesRequestAttributesTransferMock->expects($this->atLeastOnce())
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
            $this->companyUnitAddressesWriter->createCompanyUnitAddress(
                $this->restRequestInterfaceMock,
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testCreateCompanyUnitAddressSaveCompanyUnitAddressFailedErrorResponse(): void
    {
        $this->companyUnitAddressesRestApiClientInterfaceMock->expects($this->atLeastOnce())
            ->method('create')
            ->with($this->restCompanyUnitAddressesRequestAttributesTransferMock)
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
            $this->companyUnitAddressesWriter->createCompanyUnitAddress(
                $this->restRequestInterfaceMock,
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdateCompanyUnitAddress(): void
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
            ->method('update')
            ->willReturn($this->restCompanyUnitAddressesResponseTransferMock);

        $this->restCompanyUnitAddressesResponseTransferMock->expects($this->atLeastOnce())
            ->method('getIsSuccess')
            ->willReturn(true);

        $this->restCompanyUnitAddressesResponseTransferMock->expects($this->atLeastOnce())
            ->method('getRestCompanyUnitAddressesResponseAttributes')
            ->willReturn($this->restCompanyUnitAddressesRequestAttributesTransferMock);

        $this->restCompanyUnitAddressesRequestAttributesTransferMock->expects($this->atLeastOnce())
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
            $this->companyUnitAddressesWriter->updateCompanyUnitAddress(
                $this->restRequestInterfaceMock,
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdateCompanyUnitAddressExternalReferenceMissingError(): void
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

        $this->assertInstanceOf(
            RestResponseInterface::class,
            $this->companyUnitAddressesWriter->updateCompanyUnitAddress(
                $this->restRequestInterfaceMock,
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testUpdateCompanyUnitAddressSaveCompanyUnitAddressFailedError(): void
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
            ->method('update')
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
            $this->companyUnitAddressesWriter->updateCompanyUnitAddress(
                $this->restRequestInterfaceMock,
                $this->restCompanyUnitAddressesRequestAttributesTransferMock
            )
        );
    }
}
