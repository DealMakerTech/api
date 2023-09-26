# DealMakerAPI::V1EntitiesBulkUpload

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The bulk upload ID | [optional] |
| **company_id** | **Integer** | The company ID | [optional] |
| **file_identifier** | **String** | The file identifier [shareholder, investor] | [optional] |
| **document_type** | **String** | The document type  | [optional] |
| **upload_name** | **String** | The bulk upload name | [optional] |
| **files_count** | **Integer** | The number of files in the bulk upload | [optional] |
| **errors_count** | **Integer** | The number of errors in the bulk upload | [optional] |
| **success_count** | **Integer** | The number of succeeded files in the bulk upload | [optional] |
| **status** | **String** | The status [pending, processing, completed, failed] | [optional] |
| **created_at** | **String** | The created at timestamp | [optional] |
| **updated_at** | **String** | The updated at timestamp | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesBulkUpload.new(
  id: null,
  company_id: null,
  file_identifier: null,
  document_type: null,
  upload_name: null,
  files_count: null,
  errors_count: null,
  success_count: null,
  status: null,
  created_at: null,
  updated_at: null
)
```

