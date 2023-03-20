# Api.InvestorProfileApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createCorporationProfile**](InvestorProfileApi.md#createCorporationProfile) | **POST** /investor_profiles/corporations | Create new corporation investor profile.
[**createIndividualProfile**](InvestorProfileApi.md#createIndividualProfile) | **POST** /investor_profiles/individuals | Create new individual investor profile
[**createJointProfile**](InvestorProfileApi.md#createJointProfile) | **POST** /investor_profiles/joints | Create new joint investor profile
[**createTrustProfile**](InvestorProfileApi.md#createTrustProfile) | **POST** /investor_profiles/trusts | Create new trust investor profile.
[**getDealInvestorProfiles**](InvestorProfileApi.md#getDealInvestorProfiles) | **GET** /investor_profiles/{deal_id} | Get list of InvestorProfiles for a specific deal
[**getInvestorProfile**](InvestorProfileApi.md#getInvestorProfile) | **GET** /investor_profiles/profile/{id} | Get an investor profile by id
[**getInvestorProfiles**](InvestorProfileApi.md#getInvestorProfiles) | **GET** /investor_profiles | Get list of InvestorProfiles
[**patchCorporationProfile**](InvestorProfileApi.md#patchCorporationProfile) | **PATCH** /investor_profiles/corporations/{investor_profile_id} | Patch a corporation investor profile
[**patchIndividualProfile**](InvestorProfileApi.md#patchIndividualProfile) | **PATCH** /investor_profiles/individuals/{investor_profile_id} | Patch an individual investor profile.
[**patchJointProfile**](InvestorProfileApi.md#patchJointProfile) | **PATCH** /investor_profiles/joints/{investor_profile_id} | Patch a joint investor profile
[**patchTrustProfile**](InvestorProfileApi.md#patchTrustProfile) | **PATCH** /investor_profiles/trusts/{investor_profile_id} | Patch a trust investor profile



## createCorporationProfile

> V1EntitiesInvestorProfileCorporation createCorporationProfile(createCorporationProfileRequest)

Create new corporation investor profile.

Create new corporation investor profile associated to the user by email.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let createCorporationProfileRequest = new Api.CreateCorporationProfileRequest(); // CreateCorporationProfileRequest | 
apiInstance.createCorporationProfile(createCorporationProfileRequest, (error, data, response) => {
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
 **createCorporationProfileRequest** | [**CreateCorporationProfileRequest**](CreateCorporationProfileRequest.md)|  | 

### Return type

[**V1EntitiesInvestorProfileCorporation**](V1EntitiesInvestorProfileCorporation.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## createIndividualProfile

> V1EntitiesInvestorProfileIndividual createIndividualProfile(createIndividualProfileRequest)

Create new individual investor profile

Create new individual investor profile associated to the user by email.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let createIndividualProfileRequest = new Api.CreateIndividualProfileRequest(); // CreateIndividualProfileRequest | 
apiInstance.createIndividualProfile(createIndividualProfileRequest, (error, data, response) => {
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
 **createIndividualProfileRequest** | [**CreateIndividualProfileRequest**](CreateIndividualProfileRequest.md)|  | 

### Return type

[**V1EntitiesInvestorProfileIndividual**](V1EntitiesInvestorProfileIndividual.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## createJointProfile

> V1EntitiesInvestorProfileJoint createJointProfile(createJointProfileRequest)

Create new joint investor profile

Create new joint investor profile associated to the user by email.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let createJointProfileRequest = new Api.CreateJointProfileRequest(); // CreateJointProfileRequest | 
apiInstance.createJointProfile(createJointProfileRequest, (error, data, response) => {
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
 **createJointProfileRequest** | [**CreateJointProfileRequest**](CreateJointProfileRequest.md)|  | 

### Return type

[**V1EntitiesInvestorProfileJoint**](V1EntitiesInvestorProfileJoint.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## createTrustProfile

> V1EntitiesInvestorProfileTrust createTrustProfile(createTrustProfileRequest)

Create new trust investor profile.

Create new trust investor profile associated to the user by email.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let createTrustProfileRequest = new Api.CreateTrustProfileRequest(); // CreateTrustProfileRequest | 
apiInstance.createTrustProfile(createTrustProfileRequest, (error, data, response) => {
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
 **createTrustProfileRequest** | [**CreateTrustProfileRequest**](CreateTrustProfileRequest.md)|  | 

### Return type

[**V1EntitiesInvestorProfileTrust**](V1EntitiesInvestorProfileTrust.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## getDealInvestorProfiles

> V1EntitiesInvestorProfiles getDealInvestorProfiles(dealId, opts)

Get list of InvestorProfiles for a specific deal

Get investor profiles for a specific deal

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let dealId = 56; // Number | The deal id.
let opts = {
  'page': 1, // Number | Page offset to fetch.
  'perPage': 25, // Number | Number of results to return per page.
  'offset': 0, // Number | Pad a number of results.
  'userId': 56 // Number | The user id filter.
};
apiInstance.getDealInvestorProfiles(dealId, opts, (error, data, response) => {
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
 **dealId** | **Number**| The deal id. | 
 **page** | **Number**| Page offset to fetch. | [optional] [default to 1]
 **perPage** | **Number**| Number of results to return per page. | [optional] [default to 25]
 **offset** | **Number**| Pad a number of results. | [optional] [default to 0]
 **userId** | **Number**| The user id filter. | [optional] 

### Return type

[**V1EntitiesInvestorProfiles**](V1EntitiesInvestorProfiles.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getInvestorProfile

> V1EntitiesInvestorProfileItem getInvestorProfile(id)

Get an investor profile by id

Get an investor profile

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let id = 56; // Number | The id of the investor profile.
apiInstance.getInvestorProfile(id, (error, data, response) => {
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
 **id** | **Number**| The id of the investor profile. | 

### Return type

[**V1EntitiesInvestorProfileItem**](V1EntitiesInvestorProfileItem.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getInvestorProfiles

> V1EntitiesInvestorProfiles getInvestorProfiles(opts)

Get list of InvestorProfiles

Get investor profiles

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let opts = {
  'page': 1, // Number | Page offset to fetch.
  'perPage': 25, // Number | Number of results to return per page.
  'offset': 0 // Number | Pad a number of results.
};
apiInstance.getInvestorProfiles(opts, (error, data, response) => {
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

[**V1EntitiesInvestorProfiles**](V1EntitiesInvestorProfiles.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## patchCorporationProfile

> V1EntitiesInvestorProfileCorporation patchCorporationProfile(investorProfileId, opts)

Patch a corporation investor profile

Patch corporation investor profile

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfileId = 56; // Number | 
let opts = {
  'patchCorporationProfileRequest': new Api.PatchCorporationProfileRequest() // PatchCorporationProfileRequest | 
};
apiInstance.patchCorporationProfile(investorProfileId, opts, (error, data, response) => {
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
 **investorProfileId** | **Number**|  | 
 **patchCorporationProfileRequest** | [**PatchCorporationProfileRequest**](PatchCorporationProfileRequest.md)|  | [optional] 

### Return type

[**V1EntitiesInvestorProfileCorporation**](V1EntitiesInvestorProfileCorporation.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patchIndividualProfile

> V1EntitiesInvestorProfileIndividual patchIndividualProfile(investorProfileId, opts)

Patch an individual investor profile.

Patch individual investor profile.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfileId = 56; // Number | 
let opts = {
  'patchIndividualProfileRequest': new Api.PatchIndividualProfileRequest() // PatchIndividualProfileRequest | 
};
apiInstance.patchIndividualProfile(investorProfileId, opts, (error, data, response) => {
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
 **investorProfileId** | **Number**|  | 
 **patchIndividualProfileRequest** | [**PatchIndividualProfileRequest**](PatchIndividualProfileRequest.md)|  | [optional] 

### Return type

[**V1EntitiesInvestorProfileIndividual**](V1EntitiesInvestorProfileIndividual.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patchJointProfile

> V1EntitiesInvestorProfileJoint patchJointProfile(investorProfileId, opts)

Patch a joint investor profile

Patch joint investor profile

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfileId = 56; // Number | 
let opts = {
  'patchJointProfileRequest': new Api.PatchJointProfileRequest() // PatchJointProfileRequest | 
};
apiInstance.patchJointProfile(investorProfileId, opts, (error, data, response) => {
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
 **investorProfileId** | **Number**|  | 
 **patchJointProfileRequest** | [**PatchJointProfileRequest**](PatchJointProfileRequest.md)|  | [optional] 

### Return type

[**V1EntitiesInvestorProfileJoint**](V1EntitiesInvestorProfileJoint.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patchTrustProfile

> V1EntitiesInvestorProfileTrust patchTrustProfile(investorProfileId, opts)

Patch a trust investor profile

Patch trust investor profile

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfileId = 56; // Number | 
let opts = {
  'patchTrustProfileRequest': new Api.PatchTrustProfileRequest() // PatchTrustProfileRequest | 
};
apiInstance.patchTrustProfile(investorProfileId, opts, (error, data, response) => {
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
 **investorProfileId** | **Number**|  | 
 **patchTrustProfileRequest** | [**PatchTrustProfileRequest**](PatchTrustProfileRequest.md)|  | [optional] 

### Return type

[**V1EntitiesInvestorProfileTrust**](V1EntitiesInvestorProfileTrust.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

