# DealMakerAPI::PutWebhooksIdRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **name** | **String** | Endpoint name | [optional] |
| **enabled** | **Boolean** | Endpoint status | [optional] |
| **url** | **String** | Payload URL | [optional] |
| **security_token** | **String** | Secret key | [optional] |
| **webhook_subscription_deals_id** | **Array&lt;Integer&gt;** | The id of the webhook subscription deal | [optional] |
| **webhook_subscription_deals_deal_id** | **Array&lt;Integer&gt;** | The id of the deal to link | [optional] |
| **webhook_subscription_deals__destroy** | **Array&lt;Boolean&gt;** |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PutWebhooksIdRequest.new(
  name: null,
  enabled: null,
  url: null,
  security_token: null,
  webhook_subscription_deals_id: null,
  webhook_subscription_deals_deal_id: null,
  webhook_subscription_deals__destroy: null
)
```

