# DealMakerAPI::V1EntitiesDeal

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal&#39;s unique id. | [optional] |
| **title** | **String** | The deal title. | [optional] |
| **state** | **String** | The deal state. | [optional] |
| **currency** | **String** | The primary currency associated with the deal. | [optional] |
| **security_type** | **String** | The deal security type. | [optional] |
| **price_per_security** | **Float** | The deal price per security. | [optional] |
| **minimum_investment** | **Integer** | The minimum investment amount, in cents. | [optional] |
| **maximum_investment** | **Integer** | The maximum investment amount, in cents. | [optional] |
| **issuer** | [**V1EntitiesDealIssuer**](V1EntitiesDealIssuer.md) |  | [optional] |
| **enterprise** | [**V1EntitiesDealEnterprise**](V1EntitiesDealEnterprise.md) |  | [optional] |
| **deal_type** | **String** | The deal type. | [optional] |
| **investors** | [**V1EntitiesDealInvestorMetrics**](V1EntitiesDealInvestorMetrics.md) |  | [optional] |
| **funding** | [**V1EntitiesDealFundingMetrics**](V1EntitiesDealFundingMetrics.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesDeal.new(
  id: null,
  title: null,
  state: null,
  currency: null,
  security_type: null,
  price_per_security: null,
  minimum_investment: null,
  maximum_investment: null,
  issuer: null,
  enterprise: null,
  deal_type: null,
  investors: null,
  funding: null
)
```

