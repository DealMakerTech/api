# DealMakerAPI::CreateDealSetupRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **invoicing_email** | **String** | The invoice email address. |  |
| **issuer_industry** | **String** | The industry. | [optional][default to &#39;other&#39;] |
| **prohibited_industry** | **String** | Determine if the deal is a high risk or not. | [optional][default to &#39;prohibited&#39;] |
| **offering_type** | **String** | The deal kind | [default to &#39;other&#39;] |
| **title** | **String** | The name of deal to setup. |  |
| **company_id** | **Integer** | the company id. |  |
| **representative** | **String** | The email of the representative. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::CreateDealSetupRequest.new(
  invoicing_email: null,
  issuer_industry: null,
  prohibited_industry: null,
  offering_type: null,
  title: null,
  company_id: null,
  representative: null
)
```

