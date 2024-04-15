# DealMakerAPI::PatchInvestorProfilesManaged

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **email** | **String** | User email which is associated with investor profile (required). |  |
| **us_accredited_category** | **String** | The United States accredited investor information. | [optional] |
| **ca_accredited_investor** | **String** | The Canadian accredited investor information. | [optional] |
| **name** | **String** | The name of the provider. | [optional] |
| **street_address** | **String** | The street address of the provider. | [optional] |
| **unit2** | **String** | The street address line 2 of the provider. | [optional] |
| **city** | **String** | The city of the provider. | [optional] |
| **region** | **String** | The region or state of the provider. | [optional] |
| **postal_code** | **String** | The postal code or zipcode of the provider. | [optional] |
| **taxpayer_id** | **String** | The taxpayer identification number of the provider. | [optional] |
| **confirmation** | **Boolean** | Confirms that the provider is able to custody these securities and release respective funds in order to complete the purchase. | [optional] |
| **income** | **Float** | The income of the managed investor profile. | [optional] |
| **net_worth** | **Float** | The net worth of the managed investor profile | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offering amount of the managed investor profile. | [optional] |
| **beneficiary_account_number** | **String** | The account number of the beneficiary. | [optional] |
| **beneficiary_first_name** | **String** | The first name of the beneficiary. | [optional] |
| **beneficiary_last_name** | **String** | The last name of the beneficiary. | [optional] |
| **beneficiary_suffix** | **String** | The suffix of the beneficiary. | [optional] |
| **beneficiary_street_address** | **String** | The street address of the beneficiary. | [optional] |
| **beneficiary_unit2** | **String** | The street address line 2 of the beneficiary. | [optional] |
| **beneficiary_city** | **String** | The city of the beneficiary. | [optional] |
| **beneficiary_region** | **String** | The region or state of the beneficiary. | [optional] |
| **beneficiary_postal_code** | **String** | The postal code or zipcode of the beneficiary. | [optional] |
| **beneficiary_date_of_birth** | **String** | The date of birth of the beneficiary. | [optional] |
| **beneficiary_taxpayer_id** | **String** | The taxpayer identification number of the beneficiary. | [optional] |
| **beneficiary_phone_number** | **String** | The phone number of the beneficiary. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PatchInvestorProfilesManaged.new(
  email: null,
  us_accredited_category: null,
  ca_accredited_investor: null,
  name: null,
  street_address: null,
  unit2: null,
  city: null,
  region: null,
  postal_code: null,
  taxpayer_id: null,
  confirmation: null,
  income: null,
  net_worth: null,
  reg_cf_prior_offerings_amount: null,
  beneficiary_account_number: null,
  beneficiary_first_name: null,
  beneficiary_last_name: null,
  beneficiary_suffix: null,
  beneficiary_street_address: null,
  beneficiary_unit2: null,
  beneficiary_city: null,
  beneficiary_region: null,
  beneficiary_postal_code: null,
  beneficiary_date_of_birth: null,
  beneficiary_taxpayer_id: null,
  beneficiary_phone_number: null
)
```

