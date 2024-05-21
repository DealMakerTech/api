# Api.PaymentsApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**postDealInvestorPaymentsIra**](PaymentsApi.md#postDealInvestorPaymentsIra) | **POST** /deals/{id}/investors/{investor_id}/payments/ira | Creates a payment intent for express wire and mail its instructions.



## postDealInvestorPaymentsIra

> postDealInvestorPaymentsIra(id, investorId)

Creates a payment intent for express wire and mail its instructions.

Creates a payment intent for express wire

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.PaymentsApi();
let id = 56; // Number | The deal id.
let investorId = 56; // Number | The investor id.
apiInstance.postDealInvestorPaymentsIra(id, investorId, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **investorId** | **Number**| The investor id. | 

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

