# Api.UploadApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**generateUrl**](UploadApi.md#generateUrl) | **POST** /uploads/generate_url | Create a presigned URL for Amazon S3



## generateUrl

> generateUrl(generateUrlRequest)

Create a presigned URL for Amazon S3

Create a presigned URL for Amazon S3

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.UploadApi();
let generateUrlRequest = new Api.GenerateUrlRequest(); // GenerateUrlRequest | 
apiInstance.generateUrl(generateUrlRequest, (error, data, response) => {
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
 **generateUrlRequest** | [**GenerateUrlRequest**](GenerateUrlRequest.md)|  | 

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined

