# Api.DefaultApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData**](DefaultApi.md#getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData) | **GET** /deals/{deal_id}/payment_onboarding/questionnaire/digital_payments_connection/data | Load data for the digital payments connection stage
[**getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData**](DefaultApi.md#getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData) | **GET** /deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/data | Get payout account data
[**getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions**](DefaultApi.md#getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions) | **GET** /deals/{id}/investors/{investor_id}/payments/express_wire/instructions | Displays the express wire instructions for an investor on a deal
[**getDealsIdInvestorsPaymentsExpressWireInstructions**](DefaultApi.md#getDealsIdInvestorsPaymentsExpressWireInstructions) | **GET** /deals/{id}/investors/payments/express_wire/instructions | Displays the express wire instructions for all the investors on a deal
[**getDealsIdProgressPage**](DefaultApi.md#getDealsIdProgressPage) | **GET** /deals/{id}/progress_page | Get deal progress
[**getDealsIdProgressPageSummary**](DefaultApi.md#getDealsIdProgressPageSummary) | **GET** /deals/{id}/progress_page/summary | Get the deal progress summary
[**getDealsIdSummary**](DefaultApi.md#getDealsIdSummary) | **GET** /deals/{id}/summary | Get Deal Overview
[**getDealsPaymentOnboardingQuestionnaireInitialQuestions**](DefaultApi.md#getDealsPaymentOnboardingQuestionnaireInitialQuestions) | **GET** /deals/payment_onboarding/questionnaire/initial_questions | Get initial questions
[**getWebhooks**](DefaultApi.md#getWebhooks) | **GET** /webhooks | Returns a list of webhook subscription which is associated to the user
[**getWebhooksDealId**](DefaultApi.md#getWebhooksDealId) | **GET** /webhooks/deal/{id} | Finds a deal using the id
[**getWebhooksDealsSearch**](DefaultApi.md#getWebhooksDealsSearch) | **GET** /webhooks/deals/search | Searches for deals for a given user
[**getWebhooksSecurityToken**](DefaultApi.md#getWebhooksSecurityToken) | **GET** /webhooks/security_token | Creates a new security token for webhook subscription
[**postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit**](DefaultApi.md#postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/submit | Submit a payout account details form
[**postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit**](DefaultApi.md#postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/response/submit | Submit a qualification questionnaire response
[**postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit**](DefaultApi.md#postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/submit | Submit a qualification questionnaire form
[**postWebhooks**](DefaultApi.md#postWebhooks) | **POST** /webhooks | Creates a webhook subscription which is associated to the user
[**putWebhooksId**](DefaultApi.md#putWebhooksId) | **PUT** /webhooks/{id} | Updates webhook subscription and webhooks subcription deals



## getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData

> V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData(dealId)

Load data for the digital payments connection stage

Load data for the digital payments connection stage

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let dealId = 56; // Number | 
apiInstance.getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData(dealId, (error, data, response) => {
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
 **dealId** | **Number**|  | 

### Return type

[**V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData**](V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData

> V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData(dealId)

Get payout account data

Get payout account data

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let dealId = 56; // Number | 
apiInstance.getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData(dealId, (error, data, response) => {
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
 **dealId** | **Number**|  | 

### Return type

[**V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData**](V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions

> V1EntitiesExpressWireInstruction getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions(id, investorId)

Displays the express wire instructions for an investor on a deal

Get express wire instructions

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let id = 56; // Number | 
let investorId = 56; // Number | 
apiInstance.getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions(id, investorId, (error, data, response) => {
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
 **investorId** | **Number**|  | 

### Return type

[**V1EntitiesExpressWireInstruction**](V1EntitiesExpressWireInstruction.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getDealsIdInvestorsPaymentsExpressWireInstructions

> V1EntitiesExpressWireInstructions getDealsIdInvestorsPaymentsExpressWireInstructions(id)

Displays the express wire instructions for all the investors on a deal

Get list of express wire instructions

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let id = 56; // Number | 
apiInstance.getDealsIdInvestorsPaymentsExpressWireInstructions(id, (error, data, response) => {
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

[**V1EntitiesExpressWireInstructions**](V1EntitiesExpressWireInstructions.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getDealsIdProgressPage

> V1EntitiesDealsProgress getDealsIdProgressPage(id)

Get deal progress

Get deal progress

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let id = 56; // Number | The deal id.
apiInstance.getDealsIdProgressPage(id, (error, data, response) => {
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

[**V1EntitiesDealsProgress**](V1EntitiesDealsProgress.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getDealsIdProgressPageSummary

> V1EntitiesDealsProgressPageSummary getDealsIdProgressPageSummary(id)

Get the deal progress summary

Get the deal progress summary

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let id = 56; // Number | The deal id.
apiInstance.getDealsIdProgressPageSummary(id, (error, data, response) => {
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

[**V1EntitiesDealsProgressPageSummary**](V1EntitiesDealsProgressPageSummary.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getDealsIdSummary

> getDealsIdSummary(id)

Get Deal Overview

Get Deal Overview

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let id = 56; // Number | 
apiInstance.getDealsIdSummary(id, (error, data, response) => {
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


## getDealsPaymentOnboardingQuestionnaireInitialQuestions

> getDealsPaymentOnboardingQuestionnaireInitialQuestions()

Get initial questions

Get initial questions

### Example

```javascript
import Api from 'api';

let apiInstance = new Api.DefaultApi();
apiInstance.getDealsPaymentOnboardingQuestionnaireInitialQuestions((error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully.');
  }
});
```

### Parameters

This endpoint does not need any parameter.

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined


## getWebhooks

> V1EntitiesWebhooksSubscription getWebhooks(opts)

Returns a list of webhook subscription which is associated to the user

Returns a list of webhook subscription

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let opts = {
  'page': 1, // Number | Page offset to fetch.
  'perPage': 25, // Number | Number of results to return per page.
  'offset': 0 // Number | Pad a number of results.
};
apiInstance.getWebhooks(opts, (error, data, response) => {
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

[**V1EntitiesWebhooksSubscription**](V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getWebhooksDealId

> V1EntitiesWebhooksDeal getWebhooksDealId(id)

Finds a deal using the id

Returns a deal

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let id = 56; // Number | 
apiInstance.getWebhooksDealId(id, (error, data, response) => {
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

[**V1EntitiesWebhooksDeal**](V1EntitiesWebhooksDeal.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getWebhooksDealsSearch

> V1EntitiesWebhooksSecurityToken getWebhooksDealsSearch()

Searches for deals for a given user

Searches for deals for a given user

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
apiInstance.getWebhooksDealsSearch((error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**V1EntitiesWebhooksSecurityToken**](V1EntitiesWebhooksSecurityToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getWebhooksSecurityToken

> V1EntitiesWebhooksSecurityToken getWebhooksSecurityToken()

Creates a new security token for webhook subscription

Creates a new security token for webhook subscription

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
apiInstance.getWebhooksSecurityToken((error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**V1EntitiesWebhooksSecurityToken**](V1EntitiesWebhooksSecurityToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit

> V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit(dealId)

Submit a payout account details form

Submit a payout account details form

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let dealId = 56; // Number | 
apiInstance.postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit(dealId, (error, data, response) => {
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
 **dealId** | **Number**|  | 

### Return type

[**V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult**](V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit

> postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit(dealId)

Submit a qualification questionnaire response

Submit a qualification questionnaire response

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let dealId = 56; // Number | 
apiInstance.postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit(dealId, (error, data, response) => {
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
 **dealId** | **Number**|  | 

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined


## postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit

> V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit(dealId)

Submit a qualification questionnaire form

Submit a qualification questionnaire form

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let dealId = 56; // Number | 
apiInstance.postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit(dealId, (error, data, response) => {
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
 **dealId** | **Number**|  | 

### Return type

[**V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult**](V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## postWebhooks

> V1EntitiesWebhooksSubscription postWebhooks(postWebhooksRequest)

Creates a webhook subscription which is associated to the user

Creates new webhook subscription

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let postWebhooksRequest = new Api.PostWebhooksRequest(); // PostWebhooksRequest | 
apiInstance.postWebhooks(postWebhooksRequest, (error, data, response) => {
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
 **postWebhooksRequest** | [**PostWebhooksRequest**](PostWebhooksRequest.md)|  | 

### Return type

[**V1EntitiesWebhooksSubscription**](V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## putWebhooksId

> V1EntitiesWebhooksSubscription putWebhooksId(id, opts)

Updates webhook subscription and webhooks subcription deals

Updates webhook subscription

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let id = 56; // Number | 
let opts = {
  'putWebhooksIdRequest': new Api.PutWebhooksIdRequest() // PutWebhooksIdRequest | 
};
apiInstance.putWebhooksId(id, opts, (error, data, response) => {
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
 **putWebhooksIdRequest** | [**PutWebhooksIdRequest**](PutWebhooksIdRequest.md)|  | [optional] 

### Return type

[**V1EntitiesWebhooksSubscription**](V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

