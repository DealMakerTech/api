# DealMakerAPI::V1EntitiesInvestor

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | Investor id. | [optional] |
| **user** | [**V1EntitiesInvestorUser**](V1EntitiesInvestorUser.md) |  | [optional] |
| **created_at** | **Time** | The creation time. | [optional] |
| **updated_at** | **Time** | The last update time. | [optional] |
| **name** | **String** | The full name of the investor. | [optional] |
| **allocation_unit** | **String** | The allocation unit. | [optional] |
| **state** | **String** | The state. | [optional] |
| **funding_state** | **String** | The funding state. | [optional] |
| **funds_pending** | **Boolean** | True if any funds are pending; false otherwise. | [optional] |
| **beneficial_address** | **String** | The address. | [optional] |
| **phone_number** | **String** | The beneficial phone number associated with the investor. If there is no phone number, this returns the phone number associated with the user profile. | [optional] |
| **investor_currency** | **String** | The investor currency. | [optional] |
| **number_of_securities** | **Integer** | The number of securities. | [optional] |
| **investment_value** | **Float** | The current investment value. | [optional] |
| **allocated_amount** | **Float** | The amount allocated. | [optional] |
| **funds_value** | **Float** | The current amount that has been funded. | [optional] |
| **access_link** | **String** | The access link for the investor. This is the access link for the specific investment, not the user. If the same user has multiple investments, each one will have a different access link. Please note that this access link expires every hour. In order to redirect the investor into their authentication screen, use the https://app.dealmaker.tech/deals/{{deal_id}}/investors/{{investor_id}}/otp_access url. | [optional] |
| **subscription_agreement** | [**V1EntitiesSubscriptionAgreement**](V1EntitiesSubscriptionAgreement.md) |  | [optional] |
| **attachments** | [**V1EntitiesAttachment**](V1EntitiesAttachment.md) |  | [optional] |
| **background_check_searches** | [**V1EntitiesBackgroundCheckSearch**](V1EntitiesBackgroundCheckSearch.md) |  | [optional] |
| **verification_status** | **String** | The current 506c verification state. | [optional] |
| **warrant_expiry_date** | **Date** | The warrant expiry date. | [optional] |
| **warrant_certificate_number** | **Integer** | The warrant certificate number. | [optional] |
| **ranking_score** | **Float** | A value &#x60;[0, 1]&#x60; that represents the propensity for the investor to complete payment for the investment. A larger value indicates a higher likelihood of payment, as predicted by DealMaker’s machine learning algorithm. This field will only populate if DealMaker Compass is enabled for a deal and the investor &#x60;funds_state&#x60; value is not &#x60;funded&#x60; or &#x60;overfunded&#x60; | [optional] |
| **investor_profile** | **String** |  | [optional] |
| **investor_profile_id** | **Integer** | The investor profile id. | [optional] |
| **checkout_state** | **String** | Current state on the checkout page. | [optional] |
| **legacy_flow_link** | **String** | The legacy link for the investor. If the investor is already on the legacy flow, this link will be null. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestor.new(
  id: null,
  user: null,
  created_at: null,
  updated_at: null,
  name: null,
  allocation_unit: null,
  state: null,
  funding_state: null,
  funds_pending: null,
  beneficial_address: null,
  phone_number: null,
  investor_currency: null,
  number_of_securities: null,
  investment_value: null,
  allocated_amount: null,
  funds_value: null,
  access_link: null,
  subscription_agreement: null,
  attachments: null,
  background_check_searches: null,
  verification_status: null,
  warrant_expiry_date: null,
  warrant_certificate_number: null,
  ranking_score: null,
  investor_profile: null,
  investor_profile_id: null,
  checkout_state: null,
  legacy_flow_link: null
)
```

