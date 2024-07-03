# DealMakerAPI::V1EntitiesTtwReservationResponse

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The TTW reservation ID | [optional] |
| **email** | **String** | The reservation email | [optional] |
| **name** | **String** | The reservation name | [optional] |
| **phone** | **String** | The reservation phone | [optional] |
| **reservation_amount** | **Integer** | The reservation amount | [optional] |
| **state** | **String** | The state of the reservation | [optional] |
| **validated** | **Boolean** | The validated status for the reservation | [optional] |
| **ttw_campaign_id** | **Integer** | The ID of the associated campaign | [optional] |
| **user_id** | **Integer** | The ID of the associated user | [optional] |
| **investor_profile_id** | **Integer** | The ID of the associated investor profile | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesTtwReservationResponse.new(
  id: null,
  email: null,
  name: null,
  phone: null,
  reservation_amount: null,
  state: null,
  validated: null,
  ttw_campaign_id: null,
  user_id: null,
  investor_profile_id: null
)
```

