# DealMakerAPI::CreateBulkUploadRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **file_identifier** | **String** | The file identifier |  |
| **document_type** | **String** | The document type |  |
| **upload_name** | **String** | The bulk upload name |  |
| **send_notification** | **Boolean** | Send notification to the user |  |
| **notification_message** | **String** | Notification message |  |
| **json_notification_message** | **Object** | JSON notification message |  |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::CreateBulkUploadRequest.new(
  file_identifier: null,
  document_type: null,
  upload_name: null,
  send_notification: null,
  notification_message: null,
  json_notification_message: null
)
```

