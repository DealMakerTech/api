# DealMakerAPI::V1EntitiesInvestor

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | Investor id. | [optional] |
| **created_at** | **Time** | The creation time. | [optional] |
| **updated_at** | **Time** | The last update time. | [optional] |
| **name** | **String** | The full name of the investor. | [optional] |
| **allocation_unit** | **String** | The allocation unit. | [optional] |
| **state** | **String** | The state. | [optional] |
| **funds_state** | **String** | The funding state. | [optional] |
| **funds_pending** | **Boolean** | True if any funds are pending; false otherwise. | [optional] |
| **beneficial_address** | **String** | The address. | [optional] |
| **investor_currency** | **String** | The investor currency. | [optional] |
| **investment_value** | **Float** | The current investment value. | [optional] |
| **number_of_securities** | **Integer** | The number of securities. | [optional] |
| **allocated_amount** | **Float** | The amount allocated. | [optional] |
| **funds_value** | **Float** | The current amount that has been funded. | [optional] |
| **access_link** | **String** | The access link for the investor. | [optional] |
| **subscription_agreement** | [**V1EntitiesSubscriptionAgreement**](V1EntitiesSubscriptionAgreement.md) |  | [optional] |
| **attachments** | [**V1EntitiesAttachment**](V1EntitiesAttachment.md) |  | [optional] |
| **background_check_searches** | [**V1EntitiesBackgroundCheckSearch**](V1EntitiesBackgroundCheckSearch.md) |  | [optional] |
| **verification_status** | **String** | The current 506c verification state. | [optional] |
| **warrant_expiry_date** | **Date** | The warrant expiry date. | [optional] |
| **warrant_certificate_number** | **Integer** | The warrant certificate number. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestor.new(
  id: null,
  created_at: null,
  updated_at: null,
  name: null,
  allocation_unit: null,
  state: null,
  funds_state: null,
  funds_pending: null,
  beneficial_address: null,
  investor_currency: null,
  investment_value: null,
  number_of_securities: null,
  allocated_amount: null,
  funds_value: null,
  access_link: null,
  subscription_agreement: null,
  attachments: null,
  background_check_searches: null,
  verification_status: null,
  warrant_expiry_date: null,
  warrant_certificate_number: null
)
```

