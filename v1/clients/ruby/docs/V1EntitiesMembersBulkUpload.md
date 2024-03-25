# DealMakerAPI::V1EntitiesMembersBulkUpload

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The bulk upload ID | [optional] |
| **company_id** | **Integer** | The company ID | [optional] |
| **status** | **String** | The status [pending, processing, completed, failed] | [optional] |
| **total_count** | **Integer** | The number of members in the bulk upload | [optional] |
| **processed_count** | **Integer** | The number of processed members in the bulk upload | [optional] |
| **error_count** | **Integer** | The number of failed members in the bulk upload | [optional] |
| **send_notification** | **String** | Send notification to the user | [optional] |
| **offsite_shareholder** | **String** | Offside shareholder | [optional] |
| **email_subject** | **String** | Email subject | [optional] |
| **email_content** | **String** | Email content | [optional] |
| **error_details** | **String** | The error details | [optional] |
| **created_at** | **String** | The created at timestamp | [optional] |
| **updated_at** | **String** | The updated at timestamp | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesMembersBulkUpload.new(
  id: null,
  company_id: null,
  status: null,
  total_count: null,
  processed_count: null,
  error_count: null,
  send_notification: null,
  offsite_shareholder: null,
  email_subject: null,
  email_content: null,
  error_details: null,
  created_at: null,
  updated_at: null
)
```

