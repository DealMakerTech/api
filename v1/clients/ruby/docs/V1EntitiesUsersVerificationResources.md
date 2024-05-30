# DealMakerAPI::V1EntitiesUsersVerificationResources

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **totp_enabled** | **Boolean** | Check if on the authenticator app is set for the user. | [optional] |
| **sms_enabled** | **Boolean** | Check if on the sms verification is set for the user. | [optional] |
| **phone** | **String** | The last 4 digits of the users phone number. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesUsersVerificationResources.new(
  totp_enabled: null,
  sms_enabled: null,
  phone: null
)
```

