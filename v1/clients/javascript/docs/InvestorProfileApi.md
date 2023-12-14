# Api.InvestorProfileApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createCorporationProfile**](InvestorProfileApi.md#createCorporationProfile) | **POST** /investor_profiles/corporations | Create new corporation investor profile.
[**createIndividualProfile**](InvestorProfileApi.md#createIndividualProfile) | **POST** /investor_profiles/individuals | Create new individual investor profile
[**createJointProfile**](InvestorProfileApi.md#createJointProfile) | **POST** /investor_profiles/joints | Create new joint investor profile
[**createManagedProfile**](InvestorProfileApi.md#createManagedProfile) | **POST** /investor_profiles/managed | Create new managed investor profile.
[**createTrustProfile**](InvestorProfileApi.md#createTrustProfile) | **POST** /investor_profiles/trusts | Create new trust investor profile.
[**getDealInvestorProfiles**](InvestorProfileApi.md#getDealInvestorProfiles) | **GET** /investor_profiles/{deal_id} | Get list of InvestorProfiles for a specific deal
[**getInvestorProfile**](InvestorProfileApi.md#getInvestorProfile) | **GET** /investor_profiles/profile/{id} | Get an investor profile by id
[**getInvestorProfiles**](InvestorProfileApi.md#getInvestorProfiles) | **GET** /investor_profiles | Get list of InvestorProfiles
[**patchCorporationProfile**](InvestorProfileApi.md#patchCorporationProfile) | **PATCH** /investor_profiles/corporations/{investor_profile_id} | Patch a corporation investor profile
[**patchIndividualProfile**](InvestorProfileApi.md#patchIndividualProfile) | **PATCH** /investor_profiles/individuals/{investor_profile_id} | Patch an individual investor profile.
[**patchJointProfile**](InvestorProfileApi.md#patchJointProfile) | **PATCH** /investor_profiles/joints/{investor_profile_id} | Patch a joint investor profile
[**patchTrustProfile**](InvestorProfileApi.md#patchTrustProfile) | **PATCH** /investor_profiles/trusts/{investor_profile_id} | Patch a trust investor profile



## createCorporationProfile

> V1EntitiesInvestorProfileId createCorporationProfile(investorProfilesCorporations)

Create new corporation investor profile.

Create new corporation investor profile associated to the user by email.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfilesCorporations = new Api.PostInvestorProfilesCorporations(); // PostInvestorProfilesCorporations | 
apiInstance.createCorporationProfile(investorProfilesCorporations, (error, data, response) => {
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
 **investorProfilesCorporations** | [**PostInvestorProfilesCorporations**](PostInvestorProfilesCorporations.md)|  | 

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## createIndividualProfile

> V1EntitiesInvestorProfileId createIndividualProfile(investorProfilesIndividuals)

Create new individual investor profile

Create new individual investor profile associated to the user by email.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfilesIndividuals = new Api.PostInvestorProfilesIndividuals(); // PostInvestorProfilesIndividuals | 
apiInstance.createIndividualProfile(investorProfilesIndividuals, (error, data, response) => {
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
 **investorProfilesIndividuals** | [**PostInvestorProfilesIndividuals**](PostInvestorProfilesIndividuals.md)|  | 

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## createJointProfile

> V1EntitiesInvestorProfileId createJointProfile(investorProfilesJoints)

Create new joint investor profile

Create new joint investor profile associated to the user by email.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfilesJoints = new Api.PostInvestorProfilesJoints(); // PostInvestorProfilesJoints | 
apiInstance.createJointProfile(investorProfilesJoints, (error, data, response) => {
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
 **investorProfilesJoints** | [**PostInvestorProfilesJoints**](PostInvestorProfilesJoints.md)|  | 

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## createManagedProfile

> V1EntitiesInvestorProfileId createManagedProfile(investorProfilesManaged)

Create new managed investor profile.

Create new managed investor profile associated to the user by email.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfilesManaged = new Api.PostInvestorProfilesManaged(); // PostInvestorProfilesManaged | 
apiInstance.createManagedProfile(investorProfilesManaged, (error, data, response) => {
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
 **investorProfilesManaged** | [**PostInvestorProfilesManaged**](PostInvestorProfilesManaged.md)|  | 

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## createTrustProfile

> V1EntitiesInvestorProfileId createTrustProfile(investorProfilesTrusts)

Create new trust investor profile.

Create new trust investor profile associated to the user by email.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfilesTrusts = new Api.PostInvestorProfilesTrusts(); // PostInvestorProfilesTrusts | 
apiInstance.createTrustProfile(investorProfilesTrusts, (error, data, response) => {
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
 **investorProfilesTrusts** | [**PostInvestorProfilesTrusts**](PostInvestorProfilesTrusts.md)|  | 

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## getDealInvestorProfiles

> V1EntitiesInvestorProfiles getDealInvestorProfiles(dealId, opts)

Get list of InvestorProfiles for a specific deal

Get investor profiles for a specific deal. Because an investor profile belongs                     to the user associated with it, external applications may not use this endpoint                     for other profiles. Only the user may use this endpoint for their own profiles                     (i.e. to see existing profiles within the DealMaker application).

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

Get an investor profile. Because an investor profile belongs to the user associated with it, external applications                     may not use this endpoint for other profiles. Only the user may use this endpoint for their own profiles (i.e. to                     see existing profiles within the DealMaker application).

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

Get investor profiles. Because an investor profile belongs to the user associated with it, external                     applications may not use this endpoint for other profiles. Only the user may use this endpoint for                     their own profiles (i.e. to see existing profiles within the DealMaker application).

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

> V1EntitiesInvestorProfileId patchCorporationProfile(investorProfileId, investorProfilesCorporations)

Patch a corporation investor profile

Patch corporation investor profile

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfileId = 56; // Number | 
let investorProfilesCorporations = new Api.PatchInvestorProfilesCorporations(); // PatchInvestorProfilesCorporations | 
apiInstance.patchCorporationProfile(investorProfileId, investorProfilesCorporations, (error, data, response) => {
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
 **investorProfilesCorporations** | [**PatchInvestorProfilesCorporations**](PatchInvestorProfilesCorporations.md)|  | 

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patchIndividualProfile

> V1EntitiesInvestorProfileId patchIndividualProfile(investorProfileId, investorProfilesIndividuals)

Patch an individual investor profile.

Patch individual investor profile.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfileId = 56; // Number | 
let investorProfilesIndividuals = new Api.PatchInvestorProfilesIndividuals(); // PatchInvestorProfilesIndividuals | 
apiInstance.patchIndividualProfile(investorProfileId, investorProfilesIndividuals, (error, data, response) => {
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
 **investorProfilesIndividuals** | [**PatchInvestorProfilesIndividuals**](PatchInvestorProfilesIndividuals.md)|  | 

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patchJointProfile

> V1EntitiesInvestorProfileId patchJointProfile(investorProfileId, investorProfilesJoints)

Patch a joint investor profile

Patch joint investor profile

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfileId = 56; // Number | 
let investorProfilesJoints = new Api.PatchInvestorProfilesJoints(); // PatchInvestorProfilesJoints | 
apiInstance.patchJointProfile(investorProfileId, investorProfilesJoints, (error, data, response) => {
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
 **investorProfilesJoints** | [**PatchInvestorProfilesJoints**](PatchInvestorProfilesJoints.md)|  | 

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patchTrustProfile

> V1EntitiesInvestorProfileId patchTrustProfile(investorProfileId, investorProfilesTrusts)

Patch a trust investor profile

Patch trust investor profile

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorProfileApi();
let investorProfileId = 56; // Number | 
let investorProfilesTrusts = new Api.PatchInvestorProfilesTrusts(); // PatchInvestorProfilesTrusts | 
apiInstance.patchTrustProfile(investorProfileId, investorProfilesTrusts, (error, data, response) => {
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
 **investorProfilesTrusts** | [**PatchInvestorProfilesTrusts**](PatchInvestorProfilesTrusts.md)|  | 

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

