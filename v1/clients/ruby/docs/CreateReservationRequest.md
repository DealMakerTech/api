# DealMakerAPI::CreateReservationRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **campaign_id** | **Integer** | The id of the campaign |  |
| **email** | **String** | The email of the user association with the reservation |  |
| **name** | **String** | The name of the reservation | [optional] |
| **phone** | **String** | The phone of the user association with the reservation | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::CreateReservationRequest.new(
  campaign_id: null,
  email: null,
  name: null,
  phone: null
)
```

