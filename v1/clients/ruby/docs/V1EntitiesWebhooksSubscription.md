# DealMakerAPI::V1EntitiesWebhooksSubscription

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | Webhook subscription id. | [optional] |
| **name** | **String** | Webhook subscription name. | [optional] |
| **url** | **String** | Webhook subscription payload URL. | [optional] |
| **enabled** | **Boolean** | Webhook subscription status. | [optional] |
| **security_token** | **String** | Webhook subscription secrete key. | [optional] |
| **deals** | [**V1EntitiesWebhooksSubscriptionDeals**](V1EntitiesWebhooksSubscriptionDeals.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesWebhooksSubscription.new(
  id: null,
  name: null,
  url: null,
  enabled: null,
  security_token: null,
  deals: null
)
```

