# DealMakerAPI::PostInvestorProfilesIndividuals

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **email** | **String** | User email which is associated with individual investor profile. |  |
| **us_accredited_category** | **String** | The United States accredited investor information. | [optional] |
| **ca_accredited_investor** | **String** | The Canadian accredited investor information. | [optional] |
| **first_name** | **String** | The first name of the individual investor profile (required). | [optional] |
| **last_name** | **String** | The last name of the individual investor profile (required) | [optional] |
| **suffix** | **String** | The suffix of the individual investor profile | [optional] |
| **date_of_birth** | **String** | The date of birth of the investor profile (required) | [optional] |
| **taxpayer_id** | **String** | The taxpayer identification number of the investor profile (required) | [optional] |
| **phone_number** | **String** | The phone number of the investor profile (required) | [optional] |
| **street_address** | **String** | The street address of the individual investor profile (required) | [optional] |
| **unit2** | **String** | The street address line 2 of the individual investor profile | [optional] |
| **city** | **String** | The city of the individual investor profile (required) | [optional] |
| **region** | **String** | The region or state of the individual investor profile (required) | [optional] |
| **postal_code** | **String** | The postal code or zipcode of the individual investor profile (required) | [optional] |
| **income** | **Float** | The income of the individual investor profile | [optional] |
| **net_worth** | **Float** | The net worth of the individual investor profile | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offering amount of the individual investor profile | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PostInvestorProfilesIndividuals.new(
  email: null,
  us_accredited_category: null,
  ca_accredited_investor: null,
  first_name: null,
  last_name: null,
  suffix: null,
  date_of_birth: null,
  taxpayer_id: null,
  phone_number: null,
  street_address: null,
  unit2: null,
  city: null,
  region: null,
  postal_code: null,
  income: null,
  net_worth: null,
  reg_cf_prior_offerings_amount: null
)
```

