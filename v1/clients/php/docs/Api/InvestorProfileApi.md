# DealMaker\InvestorProfileApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createCorporationProfile()**](InvestorProfileApi.md#createCorporationProfile) | **POST** /investor_profiles/corporations | Create new corporation investor profile. |
| [**createIndividualProfile()**](InvestorProfileApi.md#createIndividualProfile) | **POST** /investor_profiles/individuals | Create new individual investor profile |
| [**createJointProfile()**](InvestorProfileApi.md#createJointProfile) | **POST** /investor_profiles/joints | Create new joint investor profile |
| [**createTrustProfile()**](InvestorProfileApi.md#createTrustProfile) | **POST** /investor_profiles/trusts | Create new trust investor profile. |
| [**getDealInvestorProfiles()**](InvestorProfileApi.md#getDealInvestorProfiles) | **GET** /investor_profiles/{deal_id} | Get list of InvestorProfiles for a specific deal |
| [**getInvestorProfile()**](InvestorProfileApi.md#getInvestorProfile) | **GET** /investor_profiles/profile/{id} | Get an investor profile by id |
| [**getInvestorProfiles()**](InvestorProfileApi.md#getInvestorProfiles) | **GET** /investor_profiles | Get list of InvestorProfiles |
| [**patchCorporationProfile()**](InvestorProfileApi.md#patchCorporationProfile) | **PATCH** /investor_profiles/corporations/{investor_profile_id} | Patch a corporation investor profile |
| [**patchIndividualProfile()**](InvestorProfileApi.md#patchIndividualProfile) | **PATCH** /investor_profiles/individuals/{investor_profile_id} | Patch an individual investor profile. |
| [**patchJointProfile()**](InvestorProfileApi.md#patchJointProfile) | **PATCH** /investor_profiles/joints/{investor_profile_id} | Patch a joint investor profile |
| [**patchTrustProfile()**](InvestorProfileApi.md#patchTrustProfile) | **PATCH** /investor_profiles/trusts/{investor_profile_id} | Patch a trust investor profile |


## `createCorporationProfile()`

```php
createCorporationProfile($create_corporation_profile_request): \DealMaker\Model\V1EntitiesInvestorProfileCorporation
```

Create new corporation investor profile.

Create new corporation investor profile associated to the user by email.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_corporation_profile_request = new \DealMaker\Model\CreateCorporationProfileRequest(); // \DealMaker\Model\CreateCorporationProfileRequest

try {
    $result = $apiInstance->createCorporationProfile($create_corporation_profile_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->createCorporationProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_corporation_profile_request** | [**\DealMaker\Model\CreateCorporationProfileRequest**](../Model/CreateCorporationProfileRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileCorporation**](../Model/V1EntitiesInvestorProfileCorporation.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createIndividualProfile()`

```php
createIndividualProfile($create_individual_profile_request): \DealMaker\Model\V1EntitiesInvestorProfileIndividual
```

Create new individual investor profile

Create new individual investor profile associated to the user by email.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_individual_profile_request = new \DealMaker\Model\CreateIndividualProfileRequest(); // \DealMaker\Model\CreateIndividualProfileRequest

try {
    $result = $apiInstance->createIndividualProfile($create_individual_profile_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->createIndividualProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_individual_profile_request** | [**\DealMaker\Model\CreateIndividualProfileRequest**](../Model/CreateIndividualProfileRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileIndividual**](../Model/V1EntitiesInvestorProfileIndividual.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createJointProfile()`

```php
createJointProfile($create_joint_profile_request): \DealMaker\Model\V1EntitiesInvestorProfileJoint
```

Create new joint investor profile

Create new joint investor profile associated to the user by email.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_joint_profile_request = new \DealMaker\Model\CreateJointProfileRequest(); // \DealMaker\Model\CreateJointProfileRequest

try {
    $result = $apiInstance->createJointProfile($create_joint_profile_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->createJointProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_joint_profile_request** | [**\DealMaker\Model\CreateJointProfileRequest**](../Model/CreateJointProfileRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileJoint**](../Model/V1EntitiesInvestorProfileJoint.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createTrustProfile()`

```php
createTrustProfile($create_trust_profile_request): \DealMaker\Model\V1EntitiesInvestorProfileTrust
```

Create new trust investor profile.

Create new trust investor profile associated to the user by email.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_trust_profile_request = new \DealMaker\Model\CreateTrustProfileRequest(); // \DealMaker\Model\CreateTrustProfileRequest

try {
    $result = $apiInstance->createTrustProfile($create_trust_profile_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->createTrustProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_trust_profile_request** | [**\DealMaker\Model\CreateTrustProfileRequest**](../Model/CreateTrustProfileRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileTrust**](../Model/V1EntitiesInvestorProfileTrust.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDealInvestorProfiles()`

```php
getDealInvestorProfiles($deal_id, $page, $per_page, $offset, $user_id): \DealMaker\Model\V1EntitiesInvestorProfiles
```

Get list of InvestorProfiles for a specific deal

Get investor profiles for a specific deal

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$deal_id = 56; // int | The deal id.
$page = 1; // int | Page offset to fetch.
$per_page = 25; // int | Number of results to return per page.
$offset = 0; // int | Pad a number of results.
$user_id = 56; // int | The user id filter.

try {
    $result = $apiInstance->getDealInvestorProfiles($deal_id, $page, $per_page, $offset, $user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->getDealInvestorProfiles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deal_id** | **int**| The deal id. | |
| **page** | **int**| Page offset to fetch. | [optional] [default to 1] |
| **per_page** | **int**| Number of results to return per page. | [optional] [default to 25] |
| **offset** | **int**| Pad a number of results. | [optional] [default to 0] |
| **user_id** | **int**| The user id filter. | [optional] |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfiles**](../Model/V1EntitiesInvestorProfiles.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInvestorProfile()`

```php
getInvestorProfile($id): \DealMaker\Model\V1EntitiesInvestorProfileItem
```

Get an investor profile by id

Get an investor profile

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The id of the investor profile.

try {
    $result = $apiInstance->getInvestorProfile($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->getInvestorProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The id of the investor profile. | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileItem**](../Model/V1EntitiesInvestorProfileItem.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInvestorProfiles()`

```php
getInvestorProfiles($page, $per_page, $offset): \DealMaker\Model\V1EntitiesInvestorProfiles
```

Get list of InvestorProfiles

Get investor profiles

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page offset to fetch.
$per_page = 25; // int | Number of results to return per page.
$offset = 0; // int | Pad a number of results.

try {
    $result = $apiInstance->getInvestorProfiles($page, $per_page, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->getInvestorProfiles: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page offset to fetch. | [optional] [default to 1] |
| **per_page** | **int**| Number of results to return per page. | [optional] [default to 25] |
| **offset** | **int**| Pad a number of results. | [optional] [default to 0] |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfiles**](../Model/V1EntitiesInvestorProfiles.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchCorporationProfile()`

```php
patchCorporationProfile($investor_profile_id, $patch_corporation_profile_request): \DealMaker\Model\V1EntitiesInvestorProfileCorporation
```

Patch a corporation investor profile

Patch corporation investor profile

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$investor_profile_id = 56; // int
$patch_corporation_profile_request = new \DealMaker\Model\PatchCorporationProfileRequest(); // \DealMaker\Model\PatchCorporationProfileRequest

try {
    $result = $apiInstance->patchCorporationProfile($investor_profile_id, $patch_corporation_profile_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->patchCorporationProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profile_id** | **int**|  | |
| **patch_corporation_profile_request** | [**\DealMaker\Model\PatchCorporationProfileRequest**](../Model/PatchCorporationProfileRequest.md)|  | [optional] |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileCorporation**](../Model/V1EntitiesInvestorProfileCorporation.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchIndividualProfile()`

```php
patchIndividualProfile($investor_profile_id, $patch_individual_profile_request): \DealMaker\Model\V1EntitiesInvestorProfileIndividual
```

Patch an individual investor profile.

Patch individual investor profile.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$investor_profile_id = 56; // int
$patch_individual_profile_request = new \DealMaker\Model\PatchIndividualProfileRequest(); // \DealMaker\Model\PatchIndividualProfileRequest

try {
    $result = $apiInstance->patchIndividualProfile($investor_profile_id, $patch_individual_profile_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->patchIndividualProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profile_id** | **int**|  | |
| **patch_individual_profile_request** | [**\DealMaker\Model\PatchIndividualProfileRequest**](../Model/PatchIndividualProfileRequest.md)|  | [optional] |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileIndividual**](../Model/V1EntitiesInvestorProfileIndividual.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchJointProfile()`

```php
patchJointProfile($investor_profile_id, $patch_joint_profile_request): \DealMaker\Model\V1EntitiesInvestorProfileJoint
```

Patch a joint investor profile

Patch joint investor profile

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$investor_profile_id = 56; // int
$patch_joint_profile_request = new \DealMaker\Model\PatchJointProfileRequest(); // \DealMaker\Model\PatchJointProfileRequest

try {
    $result = $apiInstance->patchJointProfile($investor_profile_id, $patch_joint_profile_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->patchJointProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profile_id** | **int**|  | |
| **patch_joint_profile_request** | [**\DealMaker\Model\PatchJointProfileRequest**](../Model/PatchJointProfileRequest.md)|  | [optional] |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileJoint**](../Model/V1EntitiesInvestorProfileJoint.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchTrustProfile()`

```php
patchTrustProfile($investor_profile_id, $patch_trust_profile_request): \DealMaker\Model\V1EntitiesInvestorProfileTrust
```

Patch a trust investor profile

Patch trust investor profile

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$investor_profile_id = 56; // int
$patch_trust_profile_request = new \DealMaker\Model\PatchTrustProfileRequest(); // \DealMaker\Model\PatchTrustProfileRequest

try {
    $result = $apiInstance->patchTrustProfile($investor_profile_id, $patch_trust_profile_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->patchTrustProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profile_id** | **int**|  | |
| **patch_trust_profile_request** | [**\DealMaker\Model\PatchTrustProfileRequest**](../Model/PatchTrustProfileRequest.md)|  | [optional] |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileTrust**](../Model/V1EntitiesInvestorProfileTrust.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
