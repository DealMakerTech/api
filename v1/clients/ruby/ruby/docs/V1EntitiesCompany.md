# DealMakerAPI::V1EntitiesCompany

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The unique id. | [optional] |
| **type** | **Integer** | The entity company. | [optional] |
| **name** | **String** | The name of the company. | [optional] |
| **description** | **String** | The description of the company. | [optional] |
| **reply_email** | **String** | The reply email of the company. | [optional] |
| **company_url** | **String** | The url of the company. | [optional] |
| **addresses** | [**V1EntitiesAddresses**](V1EntitiesAddresses.md) |  | [optional] |
| **portals** | [**V1EntitiesCompanyDeals**](V1EntitiesCompanyDeals.md) |  | [optional] |
| **primary_color** | **String** | The primary color of the company. This should be a hex color code, with the leading \&quot;#\&quot;. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesCompany.new(
  id: null,
  type: null,
  name: null,
  description: null,
  reply_email: null,
  company_url: null,
  addresses: null,
  portals: null,
  primary_color: null
)
```

