# DealMaker\InvestorProfileApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createCorporationProfile()**](InvestorProfileApi.md#createCorporationProfile) | **POST** /investor_profiles/corporations | Create new corporation investor profile. |
| [**createIndividualProfile()**](InvestorProfileApi.md#createIndividualProfile) | **POST** /investor_profiles/individuals | Create new individual investor profile |
| [**createJointProfile()**](InvestorProfileApi.md#createJointProfile) | **POST** /investor_profiles/joints | Create new joint investor profile |
| [**createManagedProfile()**](InvestorProfileApi.md#createManagedProfile) | **POST** /investor_profiles/managed | Create new managed investor profile. |
| [**createTrustProfile()**](InvestorProfileApi.md#createTrustProfile) | **POST** /investor_profiles/trusts | Create new trust investor profile. |
| [**getDealInvestorProfiles()**](InvestorProfileApi.md#getDealInvestorProfiles) | **GET** /investor_profiles/{deal_id} | Get list of InvestorProfiles for a specific deal |
| [**getInvestorProfile()**](InvestorProfileApi.md#getInvestorProfile) | **GET** /investor_profiles/profile/{id} | Get an investor profile by id |
| [**getInvestorProfiles()**](InvestorProfileApi.md#getInvestorProfiles) | **GET** /investor_profiles | Get list of InvestorProfiles |
| [**patchCorporationProfile()**](InvestorProfileApi.md#patchCorporationProfile) | **PATCH** /investor_profiles/corporations/{investor_profile_id} | Patch a corporation investor profile |
| [**patchIndividualProfile()**](InvestorProfileApi.md#patchIndividualProfile) | **PATCH** /investor_profiles/individuals/{investor_profile_id} | Patch an individual investor profile. |
| [**patchJointProfile()**](InvestorProfileApi.md#patchJointProfile) | **PATCH** /investor_profiles/joints/{investor_profile_id} | Patch a joint investor profile |
| [**patchManagedProfile()**](InvestorProfileApi.md#patchManagedProfile) | **PATCH** /investor_profiles/managed/{investor_profile_id} | Patch managed investor profile. |
| [**patchTrustProfile()**](InvestorProfileApi.md#patchTrustProfile) | **PATCH** /investor_profiles/trusts/{investor_profile_id} | Patch a trust investor profile |


## `createCorporationProfile()`

```php
createCorporationProfile($investor_profiles_corporations): \DealMaker\Model\V1EntitiesInvestorProfileId
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
$investor_profiles_corporations = new \DealMaker\Model\PostInvestorProfilesCorporations(); // \DealMaker\Model\PostInvestorProfilesCorporations

try {
    $result = $apiInstance->createCorporationProfile($investor_profiles_corporations);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->createCorporationProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profiles_corporations** | [**\DealMaker\Model\PostInvestorProfilesCorporations**](../Model/PostInvestorProfilesCorporations.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileId**](../Model/V1EntitiesInvestorProfileId.md)

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
createIndividualProfile($investor_profiles_individuals): \DealMaker\Model\V1EntitiesInvestorProfileId
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
$investor_profiles_individuals = new \DealMaker\Model\PostInvestorProfilesIndividuals(); // \DealMaker\Model\PostInvestorProfilesIndividuals

try {
    $result = $apiInstance->createIndividualProfile($investor_profiles_individuals);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->createIndividualProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profiles_individuals** | [**\DealMaker\Model\PostInvestorProfilesIndividuals**](../Model/PostInvestorProfilesIndividuals.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileId**](../Model/V1EntitiesInvestorProfileId.md)

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
createJointProfile($investor_profiles_joints): \DealMaker\Model\V1EntitiesInvestorProfileId
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
$investor_profiles_joints = new \DealMaker\Model\PostInvestorProfilesJoints(); // \DealMaker\Model\PostInvestorProfilesJoints

try {
    $result = $apiInstance->createJointProfile($investor_profiles_joints);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->createJointProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profiles_joints** | [**\DealMaker\Model\PostInvestorProfilesJoints**](../Model/PostInvestorProfilesJoints.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileId**](../Model/V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createManagedProfile()`

```php
createManagedProfile($investor_profiles_managed): \DealMaker\Model\V1EntitiesInvestorProfileId
```

Create new managed investor profile.

Create new managed investor profile associated to the user by email.

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
$investor_profiles_managed = new \DealMaker\Model\PostInvestorProfilesManaged(); // \DealMaker\Model\PostInvestorProfilesManaged

try {
    $result = $apiInstance->createManagedProfile($investor_profiles_managed);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->createManagedProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profiles_managed** | [**\DealMaker\Model\PostInvestorProfilesManaged**](../Model/PostInvestorProfilesManaged.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileId**](../Model/V1EntitiesInvestorProfileId.md)

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
createTrustProfile($investor_profiles_trusts): \DealMaker\Model\V1EntitiesInvestorProfileId
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
$investor_profiles_trusts = new \DealMaker\Model\PostInvestorProfilesTrusts(); // \DealMaker\Model\PostInvestorProfilesTrusts

try {
    $result = $apiInstance->createTrustProfile($investor_profiles_trusts);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->createTrustProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profiles_trusts** | [**\DealMaker\Model\PostInvestorProfilesTrusts**](../Model/PostInvestorProfilesTrusts.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileId**](../Model/V1EntitiesInvestorProfileId.md)

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

Get investor profiles for a specific deal. Because an investor profile belongs                     to the user associated with it, external applications may not use this endpoint                     for other profiles. Only the user may use this endpoint for their own profiles                     (i.e. to see existing profiles within the DealMaker application).

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

Get an investor profile. Because an investor profile belongs to the user associated with it, external applications                     may not use this endpoint for other profiles. Only the user may use this endpoint for their own profiles (i.e. to                     see existing profiles within the DealMaker application).

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

Get investor profiles. Because an investor profile belongs to the user associated with it, external                     applications may not use this endpoint for other profiles. Only the user may use this endpoint for                     their own profiles (i.e. to see existing profiles within the DealMaker application).

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
patchCorporationProfile($investor_profile_id, $investor_profiles_corporations): \DealMaker\Model\V1EntitiesInvestorProfileId
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
$investor_profiles_corporations = new \DealMaker\Model\PatchInvestorProfilesCorporations(); // \DealMaker\Model\PatchInvestorProfilesCorporations

try {
    $result = $apiInstance->patchCorporationProfile($investor_profile_id, $investor_profiles_corporations);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->patchCorporationProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profile_id** | **int**|  | |
| **investor_profiles_corporations** | [**\DealMaker\Model\PatchInvestorProfilesCorporations**](../Model/PatchInvestorProfilesCorporations.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileId**](../Model/V1EntitiesInvestorProfileId.md)

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
patchIndividualProfile($investor_profile_id, $investor_profiles_individuals): \DealMaker\Model\V1EntitiesInvestorProfileId
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
$investor_profiles_individuals = new \DealMaker\Model\PatchInvestorProfilesIndividuals(); // \DealMaker\Model\PatchInvestorProfilesIndividuals

try {
    $result = $apiInstance->patchIndividualProfile($investor_profile_id, $investor_profiles_individuals);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->patchIndividualProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profile_id** | **int**|  | |
| **investor_profiles_individuals** | [**\DealMaker\Model\PatchInvestorProfilesIndividuals**](../Model/PatchInvestorProfilesIndividuals.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileId**](../Model/V1EntitiesInvestorProfileId.md)

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
patchJointProfile($investor_profile_id, $investor_profiles_joints): \DealMaker\Model\V1EntitiesInvestorProfileId
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
$investor_profiles_joints = new \DealMaker\Model\PatchInvestorProfilesJoints(); // \DealMaker\Model\PatchInvestorProfilesJoints

try {
    $result = $apiInstance->patchJointProfile($investor_profile_id, $investor_profiles_joints);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->patchJointProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profile_id** | **int**|  | |
| **investor_profiles_joints** | [**\DealMaker\Model\PatchInvestorProfilesJoints**](../Model/PatchInvestorProfilesJoints.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileId**](../Model/V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchManagedProfile()`

```php
patchManagedProfile($investor_profile_id, $investor_profiles_managed): \DealMaker\Model\V1EntitiesInvestorProfileId
```

Patch managed investor profile.

Patch managed investor profile associated to the profile id.

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
$investor_profiles_managed = new \DealMaker\Model\PatchInvestorProfilesManaged(); // \DealMaker\Model\PatchInvestorProfilesManaged

try {
    $result = $apiInstance->patchManagedProfile($investor_profile_id, $investor_profiles_managed);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->patchManagedProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profile_id** | **int**|  | |
| **investor_profiles_managed** | [**\DealMaker\Model\PatchInvestorProfilesManaged**](../Model/PatchInvestorProfilesManaged.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileId**](../Model/V1EntitiesInvestorProfileId.md)

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
patchTrustProfile($investor_profile_id, $investor_profiles_trusts): \DealMaker\Model\V1EntitiesInvestorProfileId
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
$investor_profiles_trusts = new \DealMaker\Model\PatchInvestorProfilesTrusts(); // \DealMaker\Model\PatchInvestorProfilesTrusts

try {
    $result = $apiInstance->patchTrustProfile($investor_profile_id, $investor_profiles_trusts);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorProfileApi->patchTrustProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_profile_id** | **int**|  | |
| **investor_profiles_trusts** | [**\DealMaker\Model\PatchInvestorProfilesTrusts**](../Model/PatchInvestorProfilesTrusts.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorProfileId**](../Model/V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
