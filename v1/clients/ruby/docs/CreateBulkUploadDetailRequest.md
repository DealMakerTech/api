# DealMakerAPI::CreateBulkUploadDetailRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **file_key** | **String** | The file ID |  |
| **file_name** | **String** | The name of the file |  |
| **status** | **Integer** | The status of the bulk upload detail | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::CreateBulkUploadDetailRequest.new(
  file_key: null,
  file_name: null,
  status: null
)
```

