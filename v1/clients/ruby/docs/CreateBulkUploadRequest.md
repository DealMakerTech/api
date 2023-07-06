# DealMakerAPI::CreateBulkUploadRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **file** | **File** | The ZIP file. |  |
| **file_identifier** | **String** | The file identifier |  |
| **document_type** | **String** | The document type |  |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::CreateBulkUploadRequest.new(
  file: null,
  file_identifier: null,
  document_type: null
)
```

