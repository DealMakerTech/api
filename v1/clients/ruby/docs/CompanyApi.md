# DealMakerAPI::CompanyApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_bulk_upload**](CompanyApi.md#create_bulk_upload) | **POST** /companies/{id}/documents/bulk_uploads | Create bulk upload record |
| [**create_bulk_upload_detail**](CompanyApi.md#create_bulk_upload_detail) | **POST** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details | Create a BulkUploadDetail class record |
| [**create_company**](CompanyApi.md#create_company) | **POST** /companies | Create new company |
| [**get_bulk_upload_details**](CompanyApi.md#get_bulk_upload_details) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details | Return full list of bulk upload details order by status desc and id asc |
| [**get_bulk_upload_details_by_status**](CompanyApi.md#get_bulk_upload_details_by_status) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/group_by_status | Return bulk upload details grouped by status |
| [**get_bulk_uploads**](CompanyApi.md#get_bulk_uploads) | **GET** /companies/{id}/documents/bulk_uploads | Return bulk uploads |
| [**get_companies**](CompanyApi.md#get_companies) | **GET** /companies | Get list of Companies |
| [**get_company**](CompanyApi.md#get_company) | **GET** /companies/{id} | Get a Company |


## create_bulk_upload

> <V1EntitiesBulkUpload> create_bulk_upload(id, create_bulk_upload_request)

Create bulk upload record

Create bulk upload record

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
id = 56 # Integer | The company id
create_bulk_upload_request = DealMakerAPI::CreateBulkUploadRequest.new({file_identifier: 'file_identifier_example', document_type: 'document_type_example'}) # CreateBulkUploadRequest | 

begin
  # Create bulk upload record
  result = api_instance.create_bulk_upload(id, create_bulk_upload_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->create_bulk_upload: #{e}"
end
```

#### Using the create_bulk_upload_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesBulkUpload>, Integer, Hash)> create_bulk_upload_with_http_info(id, create_bulk_upload_request)

```ruby
begin
  # Create bulk upload record
  data, status_code, headers = api_instance.create_bulk_upload_with_http_info(id, create_bulk_upload_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesBulkUpload>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->create_bulk_upload_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The company id |  |
| **create_bulk_upload_request** | [**CreateBulkUploadRequest**](CreateBulkUploadRequest.md) |  |  |

### Return type

[**V1EntitiesBulkUpload**](V1EntitiesBulkUpload.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## create_bulk_upload_detail

> <V1EntitiesBulkUploadDetail> create_bulk_upload_detail(bulk_upload_id, company_id, create_bulk_upload_detail_request)

Create a BulkUploadDetail class record

Create a BulkUploadDetail class record

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
bulk_upload_id = 'bulk_upload_id_example' # String | The Bulk upload ID from which detail is associated with
company_id = 56 # Integer | 
create_bulk_upload_detail_request = DealMakerAPI::CreateBulkUploadDetailRequest.new({file_key: 'file_key_example', file_name: 'file_name_example'}) # CreateBulkUploadDetailRequest | 

begin
  # Create a BulkUploadDetail class record
  result = api_instance.create_bulk_upload_detail(bulk_upload_id, company_id, create_bulk_upload_detail_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->create_bulk_upload_detail: #{e}"
end
```

#### Using the create_bulk_upload_detail_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesBulkUploadDetail>, Integer, Hash)> create_bulk_upload_detail_with_http_info(bulk_upload_id, company_id, create_bulk_upload_detail_request)

```ruby
begin
  # Create a BulkUploadDetail class record
  data, status_code, headers = api_instance.create_bulk_upload_detail_with_http_info(bulk_upload_id, company_id, create_bulk_upload_detail_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesBulkUploadDetail>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->create_bulk_upload_detail_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **bulk_upload_id** | **String** | The Bulk upload ID from which detail is associated with |  |
| **company_id** | **Integer** |  |  |
| **create_bulk_upload_detail_request** | [**CreateBulkUploadDetailRequest**](CreateBulkUploadDetailRequest.md) |  |  |

### Return type

[**V1EntitiesBulkUploadDetail**](V1EntitiesBulkUploadDetail.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## create_company

> <V1EntitiesCompany> create_company(create_company_request)

Create new company

Creates a new company.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
create_company_request = DealMakerAPI::CreateCompanyRequest.new({name: 'name_example', country: 'country_example', street: 'street_example', city: 'city_example', state: 'state_example', postal_code: 'postal_code_example'}) # CreateCompanyRequest | 

begin
  # Create new company
  result = api_instance.create_company(create_company_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->create_company: #{e}"
end
```

#### Using the create_company_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesCompany>, Integer, Hash)> create_company_with_http_info(create_company_request)

```ruby
begin
  # Create new company
  data, status_code, headers = api_instance.create_company_with_http_info(create_company_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesCompany>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->create_company_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **create_company_request** | [**CreateCompanyRequest**](CreateCompanyRequest.md) |  |  |

### Return type

[**V1EntitiesCompany**](V1EntitiesCompany.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## get_bulk_upload_details

> <V1EntitiesBulkUploadDetails> get_bulk_upload_details(company_id, bulk_upload_id)

Return full list of bulk upload details order by status desc and id asc

Return full list of bulk upload details

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
company_id = 56 # Integer | 
bulk_upload_id = 56 # Integer | 

begin
  # Return full list of bulk upload details order by status desc and id asc
  result = api_instance.get_bulk_upload_details(company_id, bulk_upload_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_bulk_upload_details: #{e}"
end
```

#### Using the get_bulk_upload_details_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesBulkUploadDetails>, Integer, Hash)> get_bulk_upload_details_with_http_info(company_id, bulk_upload_id)

```ruby
begin
  # Return full list of bulk upload details order by status desc and id asc
  data, status_code, headers = api_instance.get_bulk_upload_details_with_http_info(company_id, bulk_upload_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesBulkUploadDetails>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_bulk_upload_details_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **company_id** | **Integer** |  |  |
| **bulk_upload_id** | **Integer** |  |  |

### Return type

[**V1EntitiesBulkUploadDetails**](V1EntitiesBulkUploadDetails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_bulk_upload_details_by_status

> <V1EntitiesBulkUploadDetails> get_bulk_upload_details_by_status(company_id, bulk_upload_id)

Return bulk upload details grouped by status

Return bulk upload details grouped by status

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
company_id = 56 # Integer | 
bulk_upload_id = 56 # Integer | 

begin
  # Return bulk upload details grouped by status
  result = api_instance.get_bulk_upload_details_by_status(company_id, bulk_upload_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_bulk_upload_details_by_status: #{e}"
end
```

#### Using the get_bulk_upload_details_by_status_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesBulkUploadDetails>, Integer, Hash)> get_bulk_upload_details_by_status_with_http_info(company_id, bulk_upload_id)

```ruby
begin
  # Return bulk upload details grouped by status
  data, status_code, headers = api_instance.get_bulk_upload_details_by_status_with_http_info(company_id, bulk_upload_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesBulkUploadDetails>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_bulk_upload_details_by_status_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **company_id** | **Integer** |  |  |
| **bulk_upload_id** | **Integer** |  |  |

### Return type

[**V1EntitiesBulkUploadDetails**](V1EntitiesBulkUploadDetails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_bulk_uploads

> <V1EntitiesBulkUploads> get_bulk_uploads(id, opts)

Return bulk uploads

Return bulk uploads

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
id = 56 # Integer | 
opts = {
  page: 56, # Integer | Page offset to fetch.
  per_page: 56, # Integer | Number of results to return per page.
  offset: 56 # Integer | Pad a number of results.
}

begin
  # Return bulk uploads
  result = api_instance.get_bulk_uploads(id, opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_bulk_uploads: #{e}"
end
```

#### Using the get_bulk_uploads_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesBulkUploads>, Integer, Hash)> get_bulk_uploads_with_http_info(id, opts)

```ruby
begin
  # Return bulk uploads
  data, status_code, headers = api_instance.get_bulk_uploads_with_http_info(id, opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesBulkUploads>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_bulk_uploads_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |
| **page** | **Integer** | Page offset to fetch. | [optional][default to 1] |
| **per_page** | **Integer** | Number of results to return per page. | [optional][default to 25] |
| **offset** | **Integer** | Pad a number of results. | [optional][default to 0] |

### Return type

[**V1EntitiesBulkUploads**](V1EntitiesBulkUploads.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_companies

> <V1EntitiesCompany> get_companies(opts)

Get list of Companies

Get companies

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
opts = {
  page: 56, # Integer | Page offset to fetch.
  per_page: 56, # Integer | Number of results to return per page.
  offset: 56 # Integer | Pad a number of results.
}

begin
  # Get list of Companies
  result = api_instance.get_companies(opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_companies: #{e}"
end
```

#### Using the get_companies_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesCompany>, Integer, Hash)> get_companies_with_http_info(opts)

```ruby
begin
  # Get list of Companies
  data, status_code, headers = api_instance.get_companies_with_http_info(opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesCompany>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_companies_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **page** | **Integer** | Page offset to fetch. | [optional][default to 1] |
| **per_page** | **Integer** | Number of results to return per page. | [optional][default to 25] |
| **offset** | **Integer** | Pad a number of results. | [optional][default to 0] |

### Return type

[**V1EntitiesCompany**](V1EntitiesCompany.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_company

> <V1EntitiesCompany> get_company(id)

Get a Company

Get a Company.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
id = 56 # Integer | 

begin
  # Get a Company
  result = api_instance.get_company(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_company: #{e}"
end
```

#### Using the get_company_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesCompany>, Integer, Hash)> get_company_with_http_info(id)

```ruby
begin
  # Get a Company
  data, status_code, headers = api_instance.get_company_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesCompany>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_company_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |

### Return type

[**V1EntitiesCompany**](V1EntitiesCompany.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

