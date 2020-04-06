<?php

namespace FondOfSpryker\Client\CompanyUnitAddressesRestApi\Dependency\Client;

use Spryker\Shared\Kernel\Transfer\TransferInterface;

interface CompanyUnitAddressesRestApiToZedRequestClientInterface
{
    /**
     * @param string $string
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface $object
     * @param array|null $requestOptions
     *
     * @return \Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function call(string $string, TransferInterface $object, ?array $requestOptions = null): TransferInterface;
}
