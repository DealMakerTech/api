# DealMakerAPI::CreateMembersBulkUploadRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **csv_file** | **File** | The file csv |  |
| **send_notification** | **Boolean** | Send notification to the user | [optional][default to false] |
| **offsite_shareholder** | **Boolean** | Offside shareholder | [optional][default to false] |
| **email_subject** | **String** | Email subject | [optional] |
| **email_content** | **String** | Email content | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::CreateMembersBulkUploadRequest.new(
  csv_file: null,
  send_notification: null,
  offsite_shareholder: null,
  email_subject: null,
  email_content: null
)
```

