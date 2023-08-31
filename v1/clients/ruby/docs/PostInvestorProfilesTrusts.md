# DealMakerAPI::PostInvestorProfilesTrusts

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **email** | **String** | User email which is associated with investor profile (required). |  |
| **us_accredited_category** | **String** | The United States accredited investor information. | [optional] |
| **ca_accredited_investor** | **String** | The Canadian accredited investor information. | [optional] |
| **name** | **String** | The name of the trust (required). | [optional] |
| **date** | **String** | The creation date of the trust (required). | [optional] |
| **street_address** | **String** | Trust street address of the trust (required). | [optional] |
| **unit2** | **String** | The street address line 2 of the trust. | [optional] |
| **city** | **String** | The city of the trust (required). | [optional] |
| **region** | **String** | The region or state of the trust (required). | [optional] |
| **postal_code** | **String** | The postal code or zipcode of the trust (required). | [optional] |
| **phone_number** | **String** | The phone number of the trust (required). | [optional] |
| **income** | **Float** | The income of the trust. | [optional] |
| **net_worth** | **Float** | The net worth of the trust. | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offering amount of the trust. | [optional] |
| **trustees** | [**Array&lt;PostInvestorProfilesTrustsTrusteesInner&gt;**](PostInvestorProfilesTrustsTrusteesInner.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PostInvestorProfilesTrusts.new(
  email: null,
  us_accredited_category: null,
  ca_accredited_investor: null,
  name: null,
  date: null,
  street_address: null,
  unit2: null,
  city: null,
  region: null,
  postal_code: null,
  phone_number: null,
  income: null,
  net_worth: null,
  reg_cf_prior_offerings_amount: null,
  trustees: null
)
```

