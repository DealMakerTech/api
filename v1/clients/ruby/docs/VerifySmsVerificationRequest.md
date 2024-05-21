# DealMakerAPI::VerifySmsVerificationRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **phone_number** | **String** | The phone number of the given user |  |
| **code** | **String** | The verification code |  |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::VerifySmsVerificationRequest.new(
  phone_number: null,
  code: null
)
```

