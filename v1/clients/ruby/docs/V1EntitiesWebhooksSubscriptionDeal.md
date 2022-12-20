# DealMakerAPI::V1EntitiesWebhooksSubscriptionDeal

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **String** | The id of the webhook subscription deal. | [optional] |
| **deal_id** | **String** | Linked deal id. | [optional] |
| **name** | **String** | Linked deal name. | [optional] |
| **company_name** | **String** | Name of the company that owns the linked deal. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesWebhooksSubscriptionDeal.new(
  id: null,
  deal_id: null,
  name: null,
  company_name: null
)
```

