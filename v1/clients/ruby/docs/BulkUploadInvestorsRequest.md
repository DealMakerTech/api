# DealMakerAPI::BulkUploadInvestorsRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **import_file** | **File** | The CSV file with data to upload. |  |
| **alerts_email** | **String** | The email to send alerts to. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::BulkUploadInvestorsRequest.new(
  import_file: null,
  alerts_email: null
)
```

