# DealMakerAPI::PatchInvestorProfilesTrusts

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **email** | **String** | The email associated with the profile to be updated. | [optional] |
| **us_accredited_category** | **String** | The United States accredited investor information. | [optional] |
| **ca_accredited_investor** | **String** | The Canadian accredited investor information. | [optional] |
| **name** | **String** | The name of the trust. | [optional] |
| **date** | **String** | The creation date of the trust. | [optional] |
| **phone_number** | **String** | The phone number of the trust. | [optional] |
| **street_address** | **String** | Trust street address. | [optional] |
| **unit2** | **String** | Trust street address line 2. | [optional] |
| **city** | **String** | Trust city. | [optional] |
| **region** | **String** | Trust region or state. | [optional] |
| **postal_code** | **String** | Trust postal code or zipcode. | [optional] |
| **income** | **Float** | The income of the Trust. | [optional] |
| **net_worth** | **Float** | The net worth of the Trust. | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offering amount of the Trust. | [optional] |
| **trustees** | [**Array&lt;PatchInvestorProfilesTrustsTrusteesInner&gt;**](PatchInvestorProfilesTrustsTrusteesInner.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PatchInvestorProfilesTrusts.new(
  email: null,
  us_accredited_category: null,
  ca_accredited_investor: null,
  name: null,
  date: null,
  phone_number: null,
  street_address: null,
  unit2: null,
  city: null,
  region: null,
  postal_code: null,
  income: null,
  net_worth: null,
  reg_cf_prior_offerings_amount: null,
  trustees: null
)
```

