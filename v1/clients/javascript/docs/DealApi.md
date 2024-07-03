# Api.DealApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**achBankAccountSetupIntent**](DealApi.md#achBankAccountSetupIntent) | **GET** /deals/{id}/investor/{investor_id}/subscription/{subscription_id}/payments/ach/bank_account_setup_intent | Prepares an investor for payment
[**acssBankAccountSetupIntent**](DealApi.md#acssBankAccountSetupIntent) | **GET** /deals/{id}/investor/{investor_id}/subscription/{subscription_id}/payments/acss/bank_account_setup_intent | Prepares an investor for payment
[**createDealSetup**](DealApi.md#createDealSetup) | **POST** /deal_setups | Create deal setup
[**getDeal**](DealApi.md#getDeal) | **GET** /deals/{id} | Get deal by Deal ID
[**getDealIncentivePlan**](DealApi.md#getDealIncentivePlan) | **GET** /deals/{id}/incentive_plan | Get incentive plan by deal id
[**listDeals**](DealApi.md#listDeals) | **GET** /deals | List available deals
[**listPlatformEmails**](DealApi.md#listPlatformEmails) | **GET** /deals/{id}/platform_emails | Get a list of platform emails for the deal
[**patchPlatformEmail**](DealApi.md#patchPlatformEmail) | **PATCH** /deals/{id}/platform_emails/{kind}/update | Patch platform email by kind and deal.



## achBankAccountSetupIntent

> V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent achBankAccountSetupIntent(id, investorId, subscriptionId)

Prepares an investor for payment

Prepare investor for payment

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DealApi();
let id = "id_example"; // String | The deal id
let investorId = 56; // Number | The investor id
let subscriptionId = 56; // Number | The subscription id
apiInstance.achBankAccountSetupIntent(id, investorId, subscriptionId, (error, data, response) => {
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
 **id** | **String**| The deal id | 
 **investorId** | **Number**| The investor id | 
 **subscriptionId** | **Number**| The subscription id | 

### Return type

[**V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent**](V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## acssBankAccountSetupIntent

> V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent acssBankAccountSetupIntent(id, investorId, subscriptionId)

Prepares an investor for payment

Prepare investor for payment

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DealApi();
let id = "id_example"; // String | The deal id
let investorId = 56; // Number | The investor id
let subscriptionId = 56; // Number | The subscription id
apiInstance.acssBankAccountSetupIntent(id, investorId, subscriptionId, (error, data, response) => {
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
 **id** | **String**| The deal id | 
 **investorId** | **Number**| The investor id | 
 **subscriptionId** | **Number**| The subscription id | 

### Return type

[**V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent**](V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## createDealSetup

> V1EntitiesDealSetup createDealSetup(createDealSetupRequest)

Create deal setup

Create deal setup

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DealApi();
let createDealSetupRequest = new Api.CreateDealSetupRequest(); // CreateDealSetupRequest | 
apiInstance.createDealSetup(createDealSetupRequest, (error, data, response) => {
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
 **createDealSetupRequest** | [**CreateDealSetupRequest**](CreateDealSetupRequest.md)|  | 

### Return type

[**V1EntitiesDealSetup**](V1EntitiesDealSetup.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## getDeal

> V1EntitiesDeal getDeal(id)

Get deal by Deal ID

Gets a single deal using the Deal ID

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DealApi();
let id = 56; // Number | The deal id.
apiInstance.getDeal(id, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 

### Return type

[**V1EntitiesDeal**](V1EntitiesDeal.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getDealIncentivePlan

> V1EntitiesDealsPriceDetails getDealIncentivePlan(id, opts)

Get incentive plan by deal id

Gets the current active incentive plan for the given deal id.

### Example

```javascript
import Api from 'api';

let apiInstance = new Api.DealApi();
let id = 56; // Number | The deal id.
let opts = {
  'investmentAmount': 3.4 // Number | The investment amount to get the security price for.
};
apiInstance.getDealIncentivePlan(id, opts, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **investmentAmount** | **Number**| The investment amount to get the security price for. | [optional] 

### Return type

[**V1EntitiesDealsPriceDetails**](V1EntitiesDealsPriceDetails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## listDeals

> V1EntitiesDeals listDeals(opts)

List available deals

List available deals

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DealApi();
let opts = {
  'page': 1, // Number | Page offset to fetch.
  'perPage': 25, // Number | Number of results to return per page.
  'offset': 0 // Number | Pad a number of results.
};
apiInstance.listDeals(opts, (error, data, response) => {
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
 **page** | **Number**| Page offset to fetch. | [optional] [default to 1]
 **perPage** | **Number**| Number of results to return per page. | [optional] [default to 25]
 **offset** | **Number**| Pad a number of results. | [optional] [default to 0]

### Return type

[**V1EntitiesDeals**](V1EntitiesDeals.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## listPlatformEmails

> V1EntitiesDealsPlatformEmails listPlatformEmails(id)

Get a list of platform emails for the deal

Get a list of platform emails for the deal

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DealApi();
let id = 56; // Number | The deal id.
apiInstance.listPlatformEmails(id, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 

### Return type

[**V1EntitiesDealsPlatformEmails**](V1EntitiesDealsPlatformEmails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## patchPlatformEmail

> V1EntitiesDealsPlatformEmail patchPlatformEmail(id, kind, patchPlatformEmailRequest)

Patch platform email by kind and deal.

Patch platform email by kind and deal.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DealApi();
let id = 56; // Number | 
let kind = 56; // Number | 
let patchPlatformEmailRequest = new Api.PatchPlatformEmailRequest(); // PatchPlatformEmailRequest | 
apiInstance.patchPlatformEmail(id, kind, patchPlatformEmailRequest, (error, data, response) => {
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
 **kind** | **Number**|  | 
 **patchPlatformEmailRequest** | [**PatchPlatformEmailRequest**](PatchPlatformEmailRequest.md)|  | 

### Return type

[**V1EntitiesDealsPlatformEmail**](V1EntitiesDealsPlatformEmail.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

