# DealMakerAPI::PostWebhooksRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **name** | **String** | Endpoint name |  |
| **enabled** | **Boolean** | Endpoint status |  |
| **url** | **String** | Payload URL | [optional] |
| **security_token** | **String** | Secret key | [optional] |
| **webhook_subscription_deals_deal_id** | **Array&lt;Integer&gt;** | The id of the deal to link |  |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PostWebhooksRequest.new(
  name: null,
  enabled: null,
  url: null,
  security_token: null,
  webhook_subscription_deals_deal_id: null
)
```

