# DealMakerAPI::V1EntitiesBulkUploadDetail

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The ID for the bulk upload detail | [optional] |
| **bulk_upload_id** | **Integer** | The bulk upload ID | [optional] |
| **file_key** | **String** | The generated identifier for the file | [optional] |
| **file_name** | **String** | The name of the file | [optional] |
| **status** | **Integer** | The status of the bulk upload detail | [optional] |
| **readable_status** | **String** | The readable status of the bulk upload detail | [optional] |
| **created_at** | **String** | The created at date | [optional] |
| **updated_at** | **String** | The updated at date | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesBulkUploadDetail.new(
  id: null,
  bulk_upload_id: null,
  file_key: null,
  file_name: null,
  status: null,
  readable_status: null,
  created_at: null,
  updated_at: null
)
```

