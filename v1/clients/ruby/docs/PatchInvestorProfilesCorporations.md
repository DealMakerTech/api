# DealMakerAPI::PatchInvestorProfilesCorporations

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **us_accredited_category** | **String** | The United States accredited investor information. | [optional] |
| **ca_accredited_investor** | **String** | The Canadian accredited investor information. | [optional] |
| **name** | **String** | Corporation name. | [optional] |
| **street_address** | **String** | Corporation street address. | [optional] |
| **unit2** | **String** | Corporation street address line 2. | [optional] |
| **city** | **String** | Corporation city. | [optional] |
| **region** | **String** | Corporation region or state. | [optional] |
| **postal_code** | **String** | Corporation postal code or zipcode. | [optional] |
| **business_number** | **String** | The business number of the investor profile. | [optional] |
| **phone_number** | **String** | The phone number of the investor profile. | [optional] |
| **income** | **Float** | The income of the individual investor profile | [optional] |
| **net_worth** | **Float** | The net worth of the individual investor profile | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offering amount of the individual investor profile | [optional] |
| **signing_officer_first_name** | **String** | Signing officer first name. | [optional] |
| **signing_officer_last_name** | **String** | Signing officer last name. | [optional] |
| **signing_officer_suffix** | **String** | Signing officer suffix. | [optional] |
| **signing_officer_street_address** | **String** | Signing officer street address. | [optional] |
| **signing_officer_unit2** | **String** | Signing officer street address line 2. | [optional] |
| **signing_officer_city** | **String** | Signing officer city. | [optional] |
| **signing_officer_region** | **String** | Signing officer region or state. | [optional] |
| **signing_officer_postal_code** | **String** | Signing officer postal code or zipcode. | [optional] |
| **signing_officer_date_of_birth** | **String** | Signing officer date of birth. | [optional] |
| **signing_officer_taxpayer_id** | **String** | The taxpayer identification number of the investor profile. | [optional] |
| **signing_officer_phone_number** | **String** | The phone number of the signing officer (required). | [optional] |
| **beneficial_owners** | [**Array&lt;PatchInvestorProfilesCorporationsBeneficialOwnersInner&gt;**](PatchInvestorProfilesCorporationsBeneficialOwnersInner.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PatchInvestorProfilesCorporations.new(
  us_accredited_category: null,
  ca_accredited_investor: null,
  name: null,
  street_address: null,
  unit2: null,
  city: null,
  region: null,
  postal_code: null,
  business_number: null,
  phone_number: null,
  income: null,
  net_worth: null,
  reg_cf_prior_offerings_amount: null,
  signing_officer_first_name: null,
  signing_officer_last_name: null,
  signing_officer_suffix: null,
  signing_officer_street_address: null,
  signing_officer_unit2: null,
  signing_officer_city: null,
  signing_officer_region: null,
  signing_officer_postal_code: null,
  signing_officer_date_of_birth: null,
  signing_officer_taxpayer_id: null,
  signing_officer_phone_number: null,
  beneficial_owners: null
)
```

