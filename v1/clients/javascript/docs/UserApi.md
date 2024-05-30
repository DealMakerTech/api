# Api.UserApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createFactor**](UserApi.md#createFactor) | **POST** /users/{id}/create_factor | Creates an API endpoint for creating a new TOTP factor
[**deleteChannel**](UserApi.md#deleteChannel) | **DELETE** /users/{id}/two_factor_channels/delete/{channel} | Creates an API endpoint to delete a specific two factor channel\&quot;
[**disableMfa**](UserApi.md#disableMfa) | **DELETE** /users/{id}/disable_mfa | Disable all the multi-factor authentication integrations for a user
[**getTwoFactorChannels**](UserApi.md#getTwoFactorChannels) | **GET** /users/{id}/two_factor_channels | Creates an API endpoint to return a list of existing TOTP factor
[**getUser**](UserApi.md#getUser) | **GET** /users/{id} | Get user by User ID
[**getVerificationResources**](UserApi.md#getVerificationResources) | **GET** /users/verification/resources | Gets the verification process resources
[**sendVerificationCode**](UserApi.md#sendVerificationCode) | **POST** /users/verification/send_code | Sends the verification code to the user
[**setupSmsVerification**](UserApi.md#setupSmsVerification) | **POST** /users/{id}/setup_sms_verification | Start a setup for a SMS Verification by creating a two factor channel of sms type
[**updateUserPassword**](UserApi.md#updateUserPassword) | **PUT** /users/{id}/update_password | Update user password
[**verifyFactor**](UserApi.md#verifyFactor) | **PUT** /users/{id}/verify_factor | Creates an API endpoint to verify an existing TOTP factor
[**verifySmsVerification**](UserApi.md#verifySmsVerification) | **POST** /users/{id}/verify_sms_verification | Verify a SMS Verification by creating a two factor channel of sms type



## createFactor

> V1EntitiesUsersFactor createFactor(id)

Creates an API endpoint for creating a new TOTP factor

Create an API endpoint for creating a new TOTP factor

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.UserApi();
let id = 56; // Number | 
apiInstance.createFactor(id, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**|  | 

### Return type

[**V1EntitiesUsersFactor**](V1EntitiesUsersFactor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## deleteChannel

> V1EntitiesDeleteResult deleteChannel(id, channel)

Creates an API endpoint to delete a specific two factor channel\&quot;

Create an API endpoint to delete a specific two factor channel

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.UserApi();
let id = 56; // Number | 
let channel = 56; // Number | 
apiInstance.deleteChannel(id, channel, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**|  | 
 **channel** | **Number**|  | 

### Return type

[**V1EntitiesDeleteResult**](V1EntitiesDeleteResult.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## disableMfa

> disableMfa(id)

Disable all the multi-factor authentication integrations for a user

Disable all the multi-factor authentication integrations for a user

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.UserApi();
let id = 56; // Number | 
apiInstance.disableMfa(id, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully.');
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**|  | 

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined


## getTwoFactorChannels

> V1EntitiesUsersTwoFactorChannels getTwoFactorChannels(id)

Creates an API endpoint to return a list of existing TOTP factor

Create an API endpoint to return a list of existing TOTP factor

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.UserApi();
let id = 56; // Number | 
apiInstance.getTwoFactorChannels(id, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**|  | 

### Return type

[**V1EntitiesUsersTwoFactorChannels**](V1EntitiesUsersTwoFactorChannels.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getUser

> V1EntitiesUser getUser(id)

Get user by User ID

Get a single user using the User ID

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.UserApi();
let id = 56; // Number | 
apiInstance.getUser(id, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**|  | 

### Return type

[**V1EntitiesUser**](V1EntitiesUser.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getVerificationResources

> V1EntitiesUsersVerificationResources getVerificationResources(loginToken)

Gets the verification process resources

Get verification process resources

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.UserApi();
let loginToken = "loginToken_example"; // String | The token containing the user information.
apiInstance.getVerificationResources(loginToken, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **loginToken** | **String**| The token containing the user information. | 

### Return type

[**V1EntitiesUsersVerificationResources**](V1EntitiesUsersVerificationResources.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## sendVerificationCode

> V1EntitiesDeleteResult sendVerificationCode(sendVerificationCodeRequest)

Sends the verification code to the user

Send the verification code to the user

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.UserApi();
let sendVerificationCodeRequest = new Api.SendVerificationCodeRequest(); // SendVerificationCodeRequest | 
apiInstance.sendVerificationCode(sendVerificationCodeRequest, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **sendVerificationCodeRequest** | [**SendVerificationCodeRequest**](SendVerificationCodeRequest.md)|  | 

### Return type

[**V1EntitiesDeleteResult**](V1EntitiesDeleteResult.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## setupSmsVerification

> setupSmsVerification(id, setupSmsVerificationRequest)

Start a setup for a SMS Verification by creating a two factor channel of sms type

Start a setup for a SMS Verification by creating a two factor channel of sms type

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.UserApi();
let id = 56; // Number | 
let setupSmsVerificationRequest = new Api.SetupSmsVerificationRequest(); // SetupSmsVerificationRequest | 
apiInstance.setupSmsVerification(id, setupSmsVerificationRequest, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully.');
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**|  | 
 **setupSmsVerificationRequest** | [**SetupSmsVerificationRequest**](SetupSmsVerificationRequest.md)|  | 

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined


## updateUserPassword

> V1EntitiesUser updateUserPassword(id, updateUserPasswordRequest)

Update user password

Update user password

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.UserApi();
let id = 56; // Number | 
let updateUserPasswordRequest = new Api.UpdateUserPasswordRequest(); // UpdateUserPasswordRequest | 
apiInstance.updateUserPassword(id, updateUserPasswordRequest, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**|  | 
 **updateUserPasswordRequest** | [**UpdateUserPasswordRequest**](UpdateUserPasswordRequest.md)|  | 

### Return type

[**V1EntitiesUser**](V1EntitiesUser.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## verifyFactor

> V1EntitiesUsersTwoFactorChannel verifyFactor(id, verifyFactorRequest)

Creates an API endpoint to verify an existing TOTP factor

Create an API endpoint to verify an existing TOTP factor

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.UserApi();
let id = 56; // Number | 
let verifyFactorRequest = new Api.VerifyFactorRequest(); // VerifyFactorRequest | 
apiInstance.verifyFactor(id, verifyFactorRequest, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**|  | 
 **verifyFactorRequest** | [**VerifyFactorRequest**](VerifyFactorRequest.md)|  | 

### Return type

[**V1EntitiesUsersTwoFactorChannel**](V1EntitiesUsersTwoFactorChannel.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## verifySmsVerification

> V1EntitiesUsersTwoFactorChannel verifySmsVerification(id, verifySmsVerificationRequest)

Verify a SMS Verification by creating a two factor channel of sms type

Verify a SMS Verification by creating a two factor channel of sms type

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.UserApi();
let id = 56; // Number | 
let verifySmsVerificationRequest = new Api.VerifySmsVerificationRequest(); // VerifySmsVerificationRequest | 
apiInstance.verifySmsVerification(id, verifySmsVerificationRequest, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**|  | 
 **verifySmsVerificationRequest** | [**VerifySmsVerificationRequest**](VerifySmsVerificationRequest.md)|  | 

### Return type

[**V1EntitiesUsersTwoFactorChannel**](V1EntitiesUsersTwoFactorChannel.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

