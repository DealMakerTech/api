# DealMakerAPI::PatchInvestorProfilesTrusts

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
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
| **trustee_first_name** | **String** | Trustee first name. | [optional] |
| **trustee_last_name** | **String** | Trustee last name. | [optional] |
| **trustee_suffix** | **String** | Trustee suffix. | [optional] |
| **trustee_street_address** | **String** | Trustee street address. | [optional] |
| **trustee_unit2** | **String** | Trustee street address line 2. | [optional] |
| **trustee_city** | **String** | Trustee city. | [optional] |
| **trustee_region** | **String** | Trustee region or state. | [optional] |
| **trustee_postal_code** | **String** | Trustee postal code or zipcode. | [optional] |
| **trustee_date_of_birth** | **String** | Trustee date of birth. | [optional] |
| **trustee_taxpayer_id** | **String** | The taxpayer identification number of the investor profile. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PatchInvestorProfilesTrusts.new(
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
  trustee_first_name: null,
  trustee_last_name: null,
  trustee_suffix: null,
  trustee_street_address: null,
  trustee_unit2: null,
  trustee_city: null,
  trustee_region: null,
  trustee_postal_code: null,
  trustee_date_of_birth: null,
  trustee_taxpayer_id: null
)
```

