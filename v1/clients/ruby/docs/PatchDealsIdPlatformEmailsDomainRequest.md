# DealMakerAPI::PatchDealsIdPlatformEmailsDomainRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **sender_name** | **String** | The sender name. |  |
| **sender_email** | **String** | The sender email. It must match an authenticated domain. |  |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PatchDealsIdPlatformEmailsDomainRequest.new(
  sender_name: null,
  sender_email: null
)
```

