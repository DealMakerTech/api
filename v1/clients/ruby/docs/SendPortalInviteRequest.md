# DealMakerAPI::SendPortalInviteRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **subject** | **String** | The custom subject of the invite email | [optional] |
| **email_content** | **String** | The custom email content of the invite email | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::SendPortalInviteRequest.new(
  subject: null,
  email_content: null
)
```

