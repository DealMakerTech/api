# DealMakerAPI::CompanyApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_bulk_upload**](CompanyApi.md#create_bulk_upload) | **POST** /companies/{id}/documents/bulk_uploads | Create bulk upload record |
| [**create_bulk_upload_detail**](CompanyApi.md#create_bulk_upload_detail) | **POST** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details | Create a BulkUploadDetail class record |
| [**create_company**](CompanyApi.md#create_company) | **POST** /companies | Create new company |
| [**create_email_template**](CompanyApi.md#create_email_template) | **POST** /companies/{id}/news_releases/email_template | Creates an email template |
| [**create_shareholder_action**](CompanyApi.md#create_shareholder_action) | **POST** /companies/{company_id}/shareholders/{shareholder_id}/actions | Create a shareholder action |
| [**get_bulk_upload**](CompanyApi.md#get_bulk_upload) | **GET** /companies/{id}/documents/bulk_uploads/{bulk_upload_id} | Return a given bulk upload by id |
| [**get_bulk_upload_details_errors**](CompanyApi.md#get_bulk_upload_details_errors) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/errors | Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc |
| [**get_bulk_uploads**](CompanyApi.md#get_bulk_uploads) | **GET** /companies/{id}/documents/bulk_uploads | Return bulk uploads |
| [**get_companies**](CompanyApi.md#get_companies) | **GET** /companies | Get list of Companies |
| [**get_company**](CompanyApi.md#get_company) | **GET** /companies/{id} | Get a Company |
| [**get_details_errors_grouped**](CompanyApi.md#get_details_errors_grouped) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/grouped_errors | Return bulk upload details grouped by status |
| [**get_dividends**](CompanyApi.md#get_dividends) | **GET** /companies/{company_id}/portal/dividends | Return dividends |
| [**get_email_events**](CompanyApi.md#get_email_events) | **GET** /companies/{company_communication_id}/email_events | Get a list of email events for a company communication |
| [**get_shareholder_ledger**](CompanyApi.md#get_shareholder_ledger) | **GET** /companies/{id}/shareholder_ledger | Get shareholder ledger by company |
| [**get_user_accessible_companies**](CompanyApi.md#get_user_accessible_companies) | **GET** /users/accessible_companies | Get list of all Companies accessible by the user |
| [**send_portal_invite**](CompanyApi.md#send_portal_invite) | **POST** /companies/{id}/shareholders/{shareholder_id}/send_portal_invite | Send portal invite to shareholder |


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
create_bulk_upload_request = DealMakerAPI::CreateBulkUploadRequest.new({file_identifier: 'file_identifier_example', document_type: 'document_type_example', upload_name: 'upload_name_example', send_notification: false, notification_message: 'notification_message_example'}) # CreateBulkUploadRequest | 

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


## create_email_template

> <V1EntitiesEmailTemplate> create_email_template(id, create_email_template_request)

Creates an email template

Create new email template

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
id = 56 # Integer | 
create_email_template_request = DealMakerAPI::CreateEmailTemplateRequest.new({name: 'name_example', json_content: 'json_content_example', html_content: 'html_content_example'}) # CreateEmailTemplateRequest | 

begin
  # Creates an email template
  result = api_instance.create_email_template(id, create_email_template_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->create_email_template: #{e}"
end
```

#### Using the create_email_template_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesEmailTemplate>, Integer, Hash)> create_email_template_with_http_info(id, create_email_template_request)

```ruby
begin
  # Creates an email template
  data, status_code, headers = api_instance.create_email_template_with_http_info(id, create_email_template_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesEmailTemplate>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->create_email_template_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |
| **create_email_template_request** | [**CreateEmailTemplateRequest**](CreateEmailTemplateRequest.md) |  |  |

### Return type

[**V1EntitiesEmailTemplate**](V1EntitiesEmailTemplate.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## create_shareholder_action

> <V1EntitiesGenericResponse> create_shareholder_action(company_id, shareholder_id, create_shareholder_action_request)

Create a shareholder action

Create a shareholder action

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
company_id = 56 # Integer | The company id
shareholder_id = 56 # Integer | The shareholder id
create_shareholder_action_request = DealMakerAPI::CreateShareholderActionRequest.new({request_type: 'request_type_example', description: 'description_example'}) # CreateShareholderActionRequest | 

begin
  # Create a shareholder action
  result = api_instance.create_shareholder_action(company_id, shareholder_id, create_shareholder_action_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->create_shareholder_action: #{e}"
end
```

#### Using the create_shareholder_action_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesGenericResponse>, Integer, Hash)> create_shareholder_action_with_http_info(company_id, shareholder_id, create_shareholder_action_request)

```ruby
begin
  # Create a shareholder action
  data, status_code, headers = api_instance.create_shareholder_action_with_http_info(company_id, shareholder_id, create_shareholder_action_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesGenericResponse>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->create_shareholder_action_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **company_id** | **Integer** | The company id |  |
| **shareholder_id** | **Integer** | The shareholder id |  |
| **create_shareholder_action_request** | [**CreateShareholderActionRequest**](CreateShareholderActionRequest.md) |  |  |

### Return type

[**V1EntitiesGenericResponse**](V1EntitiesGenericResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## get_bulk_upload

> <V1EntitiesBulkUpload> get_bulk_upload(id, bulk_upload_id, opts)

Return a given bulk upload by id

Return a given bulk upload by id

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
id = 56 # Integer | 
bulk_upload_id = 56 # Integer | 
opts = {
  page: 56, # Integer | Page offset to fetch.
  per_page: 56, # Integer | Number of results to return per page.
  offset: 56 # Integer | Pad a number of results.
}

begin
  # Return a given bulk upload by id
  result = api_instance.get_bulk_upload(id, bulk_upload_id, opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_bulk_upload: #{e}"
end
```

#### Using the get_bulk_upload_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesBulkUpload>, Integer, Hash)> get_bulk_upload_with_http_info(id, bulk_upload_id, opts)

```ruby
begin
  # Return a given bulk upload by id
  data, status_code, headers = api_instance.get_bulk_upload_with_http_info(id, bulk_upload_id, opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesBulkUpload>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_bulk_upload_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |
| **bulk_upload_id** | **Integer** |  |  |
| **page** | **Integer** | Page offset to fetch. | [optional][default to 1] |
| **per_page** | **Integer** | Number of results to return per page. | [optional][default to 25] |
| **offset** | **Integer** | Pad a number of results. | [optional][default to 0] |

### Return type

[**V1EntitiesBulkUpload**](V1EntitiesBulkUpload.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_bulk_upload_details_errors

> <V1EntitiesBulkUploadDetails> get_bulk_upload_details_errors(company_id, bulk_upload_id)

Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc

Returns a full list of details with errors of the given bulk upload

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
  # Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc
  result = api_instance.get_bulk_upload_details_errors(company_id, bulk_upload_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_bulk_upload_details_errors: #{e}"
end
```

#### Using the get_bulk_upload_details_errors_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesBulkUploadDetails>, Integer, Hash)> get_bulk_upload_details_errors_with_http_info(company_id, bulk_upload_id)

```ruby
begin
  # Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc
  data, status_code, headers = api_instance.get_bulk_upload_details_errors_with_http_info(company_id, bulk_upload_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesBulkUploadDetails>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_bulk_upload_details_errors_with_http_info: #{e}"
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


## get_details_errors_grouped

> <V1EntitiesBulkUploadDetails> get_details_errors_grouped(company_id, bulk_upload_id)

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
  result = api_instance.get_details_errors_grouped(company_id, bulk_upload_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_details_errors_grouped: #{e}"
end
```

#### Using the get_details_errors_grouped_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesBulkUploadDetails>, Integer, Hash)> get_details_errors_grouped_with_http_info(company_id, bulk_upload_id)

```ruby
begin
  # Return bulk upload details grouped by status
  data, status_code, headers = api_instance.get_details_errors_grouped_with_http_info(company_id, bulk_upload_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesBulkUploadDetails>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_details_errors_grouped_with_http_info: #{e}"
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


## get_dividends

> <V1EntitiesDividends> get_dividends(company_id)

Return dividends

Return dividends associated with a shareholder

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
company_id = 56 # Integer | 

begin
  # Return dividends
  result = api_instance.get_dividends(company_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_dividends: #{e}"
end
```

#### Using the get_dividends_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesDividends>, Integer, Hash)> get_dividends_with_http_info(company_id)

```ruby
begin
  # Return dividends
  data, status_code, headers = api_instance.get_dividends_with_http_info(company_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesDividends>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_dividends_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **company_id** | **Integer** |  |  |

### Return type

[**V1EntitiesDividends**](V1EntitiesDividends.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_email_events

> <V1EntitiesEmailEvents> get_email_events(company_communication_id)

Get a list of email events for a company communication

Gets a list of email events for a specific company communication.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
company_communication_id = 56 # Integer | The id of the company communication.

begin
  # Get a list of email events for a company communication
  result = api_instance.get_email_events(company_communication_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_email_events: #{e}"
end
```

#### Using the get_email_events_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesEmailEvents>, Integer, Hash)> get_email_events_with_http_info(company_communication_id)

```ruby
begin
  # Get a list of email events for a company communication
  data, status_code, headers = api_instance.get_email_events_with_http_info(company_communication_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesEmailEvents>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_email_events_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **company_communication_id** | **Integer** | The id of the company communication. |  |

### Return type

[**V1EntitiesEmailEvents**](V1EntitiesEmailEvents.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_shareholder_ledger

> <V1EntitiesShareholderLedger> get_shareholder_ledger(id)

Get shareholder ledger by company

Get shareholder ledger by company.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
id = 56 # Integer | 

begin
  # Get shareholder ledger by company
  result = api_instance.get_shareholder_ledger(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_shareholder_ledger: #{e}"
end
```

#### Using the get_shareholder_ledger_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesShareholderLedger>, Integer, Hash)> get_shareholder_ledger_with_http_info(id)

```ruby
begin
  # Get shareholder ledger by company
  data, status_code, headers = api_instance.get_shareholder_ledger_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesShareholderLedger>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_shareholder_ledger_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |

### Return type

[**V1EntitiesShareholderLedger**](V1EntitiesShareholderLedger.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_user_accessible_companies

> <V1EntitiesCompany> get_user_accessible_companies(opts)

Get list of all Companies accessible by the user

Get user accessible companies

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
  # Get list of all Companies accessible by the user
  result = api_instance.get_user_accessible_companies(opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_user_accessible_companies: #{e}"
end
```

#### Using the get_user_accessible_companies_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesCompany>, Integer, Hash)> get_user_accessible_companies_with_http_info(opts)

```ruby
begin
  # Get list of all Companies accessible by the user
  data, status_code, headers = api_instance.get_user_accessible_companies_with_http_info(opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesCompany>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->get_user_accessible_companies_with_http_info: #{e}"
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


## send_portal_invite

> send_portal_invite(id, shareholder_id, opts)

Send portal invite to shareholder

Send portal invite to shareholder.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
id = 56 # Integer | 
shareholder_id = 56 # Integer | 
opts = {
  send_portal_invite_request: DealMakerAPI::SendPortalInviteRequest.new # SendPortalInviteRequest | 
}

begin
  # Send portal invite to shareholder
  api_instance.send_portal_invite(id, shareholder_id, opts)
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->send_portal_invite: #{e}"
end
```

#### Using the send_portal_invite_with_http_info variant

This returns an Array which contains the response data (`nil` in this case), status code and headers.

> <Array(nil, Integer, Hash)> send_portal_invite_with_http_info(id, shareholder_id, opts)

```ruby
begin
  # Send portal invite to shareholder
  data, status_code, headers = api_instance.send_portal_invite_with_http_info(id, shareholder_id, opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => nil
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CompanyApi->send_portal_invite_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |
| **shareholder_id** | **Integer** |  |  |
| **send_portal_invite_request** | [**SendPortalInviteRequest**](SendPortalInviteRequest.md) |  | [optional] |

### Return type

nil (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined

