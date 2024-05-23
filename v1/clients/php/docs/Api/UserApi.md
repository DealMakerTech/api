# DealMaker\UserApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createFactor()**](UserApi.md#createFactor) | **POST** /users/{id}/create_factor | Creates an API endpoint for creating a new TOTP factor |
| [**deleteChannel()**](UserApi.md#deleteChannel) | **DELETE** /users/{id}/two_factor_channels/delete/{channel} | Creates an API endpoint to delete a specific two factor channel\&quot; |
| [**disableMfa()**](UserApi.md#disableMfa) | **DELETE** /users/{id}/disable_mfa | Disable all the multi-factor authentication integrations for a user |
| [**getTwoFactorChannels()**](UserApi.md#getTwoFactorChannels) | **GET** /users/{id}/two_factor_channels | Creates an API endpoint to return a list of existing TOTP factor |
| [**getUser()**](UserApi.md#getUser) | **GET** /users/{id} | Get user by User ID |
| [**setupSmsVerification()**](UserApi.md#setupSmsVerification) | **POST** /users/{id}/setup_sms_verification | Start a setup for a SMS Verification by creating a two factor channel of sms type |
| [**updateUserPassword()**](UserApi.md#updateUserPassword) | **PUT** /users/{id}/update_password | Update user password |
| [**verifyFactor()**](UserApi.md#verifyFactor) | **PUT** /users/{id}/verify_factor | Creates an API endpoint to verify an existing TOTP factor |
| [**verifySmsVerification()**](UserApi.md#verifySmsVerification) | **POST** /users/{id}/verify_sms_verification | Verify a SMS Verification by creating a two factor channel of sms type |


## `createFactor()`

```php
createFactor($id): \DealMaker\Model\V1EntitiesUsersFactor
```

Creates an API endpoint for creating a new TOTP factor

Create an API endpoint for creating a new TOTP factor

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->createFactor($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->createFactor: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesUsersFactor**](../Model/V1EntitiesUsersFactor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteChannel()`

```php
deleteChannel($id, $channel): \DealMaker\Model\V1EntitiesDeleteResult
```

Creates an API endpoint to delete a specific two factor channel\"

Create an API endpoint to delete a specific two factor channel

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$channel = 56; // int

try {
    $result = $apiInstance->deleteChannel($id, $channel);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->deleteChannel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **channel** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesDeleteResult**](../Model/V1EntitiesDeleteResult.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `disableMfa()`

```php
disableMfa($id)
```

Disable all the multi-factor authentication integrations for a user

Disable all the multi-factor authentication integrations for a user

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $apiInstance->disableMfa($id);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->disableMfa: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTwoFactorChannels()`

```php
getTwoFactorChannels($id): \DealMaker\Model\V1EntitiesUsersTwoFactorChannels
```

Creates an API endpoint to return a list of existing TOTP factor

Create an API endpoint to return a list of existing TOTP factor

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->getTwoFactorChannels($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getTwoFactorChannels: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesUsersTwoFactorChannels**](../Model/V1EntitiesUsersTwoFactorChannels.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUser()`

```php
getUser($id): \DealMaker\Model\V1EntitiesUser
```

Get user by User ID

Get a single user using the User ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->getUser($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesUser**](../Model/V1EntitiesUser.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `setupSmsVerification()`

```php
setupSmsVerification($id, $setup_sms_verification_request)
```

Start a setup for a SMS Verification by creating a two factor channel of sms type

Start a setup for a SMS Verification by creating a two factor channel of sms type

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$setup_sms_verification_request = new \DealMaker\Model\SetupSmsVerificationRequest(); // \DealMaker\Model\SetupSmsVerificationRequest

try {
    $apiInstance->setupSmsVerification($id, $setup_sms_verification_request);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->setupSmsVerification: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **setup_sms_verification_request** | [**\DealMaker\Model\SetupSmsVerificationRequest**](../Model/SetupSmsVerificationRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateUserPassword()`

```php
updateUserPassword($id, $update_user_password_request): \DealMaker\Model\V1EntitiesUser
```

Update user password

Update user password

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$update_user_password_request = new \DealMaker\Model\UpdateUserPasswordRequest(); // \DealMaker\Model\UpdateUserPasswordRequest

try {
    $result = $apiInstance->updateUserPassword($id, $update_user_password_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->updateUserPassword: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **update_user_password_request** | [**\DealMaker\Model\UpdateUserPasswordRequest**](../Model/UpdateUserPasswordRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesUser**](../Model/V1EntitiesUser.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `verifyFactor()`

```php
verifyFactor($id, $verify_factor_request): \DealMaker\Model\V1EntitiesUsersTwoFactorChannel
```

Creates an API endpoint to verify an existing TOTP factor

Create an API endpoint to verify an existing TOTP factor

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$verify_factor_request = new \DealMaker\Model\VerifyFactorRequest(); // \DealMaker\Model\VerifyFactorRequest

try {
    $result = $apiInstance->verifyFactor($id, $verify_factor_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->verifyFactor: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **verify_factor_request** | [**\DealMaker\Model\VerifyFactorRequest**](../Model/VerifyFactorRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesUsersTwoFactorChannel**](../Model/V1EntitiesUsersTwoFactorChannel.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `verifySmsVerification()`

```php
verifySmsVerification($id, $verify_sms_verification_request): \DealMaker\Model\V1EntitiesUsersTwoFactorChannel
```

Verify a SMS Verification by creating a two factor channel of sms type

Verify a SMS Verification by creating a two factor channel of sms type

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$verify_sms_verification_request = new \DealMaker\Model\VerifySmsVerificationRequest(); // \DealMaker\Model\VerifySmsVerificationRequest

try {
    $result = $apiInstance->verifySmsVerification($id, $verify_sms_verification_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->verifySmsVerification: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **verify_sms_verification_request** | [**\DealMaker\Model\VerifySmsVerificationRequest**](../Model/VerifySmsVerificationRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesUsersTwoFactorChannel**](../Model/V1EntitiesUsersTwoFactorChannel.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
