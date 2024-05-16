# DealMakerAPI::TestDocumentUploadEmailRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **user_id** | **Integer** | The user that will receive the email. |  |
| **send_confidential_email** | **Boolean** | The send_confidential_email flag |  |
| **json_email** | **String** | The json content email |  |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::TestDocumentUploadEmailRequest.new(
  user_id: null,
  send_confidential_email: null,
  json_email: null
)
```

