# DealMakerAPI::V1EntitiesDealSetup

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal setup id. | [optional] |
| **deal_name** | **String** | The title/name of the deal. | [optional] |
| **deal_type** | **Integer** | The type of the deal. | [optional] |
| **invoice_contact** | **String** | The invoice email address. | [optional] |
| **industry** | **String** | The industry. | [optional] |
| **high_risk** | **Boolean** | Determine if the deal is a high risk or not. | [optional] |
| **company_id** | **Integer** | The id of the company. | [optional] |
| **link** | **String** | Link to the second page of the deal setup | [optional] |
| **representative** | [**V1EntitiesDealSetupUser**](V1EntitiesDealSetupUser.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesDealSetup.new(
  id: null,
  deal_name: null,
  deal_type: null,
  invoice_contact: null,
  industry: null,
  high_risk: null,
  company_id: null,
  link: null,
  representative: null
)
```

