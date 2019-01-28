<?php

namespace FondOfSpryker\Shared\CompanyUnitAddressesRestApi;

use Spryker\Shared\Kernel\AbstractBundleConfig;

class CompanyUnitAddressesRestApiConfig extends AbstractBundleConfig
{
    public const RESPONSE_CODE_COMPANY_UNIT_ADDRESS_DATA_INVALID = '1500';
    public const RESPONSE_CODE_COMPANY_UNIT_ADDRESS_NOT_FOUND = '1501';

    public const RESPONSE_DETAILS_COMPANY_UNIT_ADDRESS_DATA_INVALID = 'Company unit address data is invalid.';
    public const RESPONSE_DETAILS_COMPANY_UNIT_ADDRESS_NOT_FOUND = 'Company unit address not found.';
}
