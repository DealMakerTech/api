# DealMakerAPI::V1EntitiesUsersTwoFactorChannel

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The id for the two factor channel. | [optional] |
| **factor_sid** | **String** | The unique string for the resource | [optional] |
| **user_id** | **Integer** | The user id for the two factor channel. | [optional] |
| **identity** | **String** | The identity for the two factor channel. | [optional] |
| **phone_number** | **String** | The phone number for the two factor channel. | [optional] |
| **channel** | **String** | The channel for the two factor channel. | [optional] |
| **verified** | **Boolean** | The verification status for the two factor channel. | [optional] |
| **updated_at** | **String** | The time since the two factor channel was last updated/verified. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesUsersTwoFactorChannel.new(
  id: null,
  factor_sid: null,
  user_id: null,
  identity: null,
  phone_number: null,
  channel: null,
  verified: null,
  updated_at: null
)
```

