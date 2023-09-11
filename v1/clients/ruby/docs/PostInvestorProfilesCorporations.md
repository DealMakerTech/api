# DealMakerAPI::PostInvestorProfilesCorporations

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **email** | **String** | User email which is associated with investor profile (required). |  |
| **us_accredited_category** | **String** | The United States accredited investor information. | [optional] |
| **ca_accredited_investor** | **String** | The Canadian accredited investor information. | [optional] |
| **name** | **String** | The name of the corporation (required). | [optional] |
| **street_address** | **String** | The street address of the corporation (required). | [optional] |
| **unit2** | **String** | The street address line 2 of the corporation. | [optional] |
| **city** | **String** | The city of the corporation (required). | [optional] |
| **region** | **String** | The region or state of the corporation (required). | [optional] |
| **postal_code** | **String** | The postal code or zipcode of the corporation (required). | [optional] |
| **business_number** | **String** | The taxpayer identification number  of the corporation (required). | [optional] |
| **phone_number** | **String** | The phone number o of the corporation (required). | [optional] |
| **income** | **Float** | The income of the individual investor profile | [optional] |
| **net_worth** | **Float** | The net worth of the individual investor profile | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offering amount of the individual investor profile | [optional] |
| **signing_officer_first_name** | **String** | The first name of the signing officer (required). | [optional] |
| **signing_officer_last_name** | **String** | The last name of the signing officer (required). | [optional] |
| **signing_officer_title** | **String** | The title of the signing officer. | [optional] |
| **signing_officer_suffix** | **String** | The suffix of the signing officer. | [optional] |
| **signing_officer_street_address** | **String** | The street address of the signing officer (required). | [optional] |
| **signing_officer_unit2** | **String** | The street address line 2 of the signing officer. | [optional] |
| **signing_officer_city** | **String** | The city of the signing officer (required). | [optional] |
| **signing_officer_region** | **String** | The region or state of the signing officer (required). | [optional] |
| **signing_officer_postal_code** | **String** | The postal code or zipcode of the signing officer (required). | [optional] |
| **signing_officer_date_of_birth** | **String** | The date of birth of the signing officer (required). | [optional] |
| **signing_officer_taxpayer_id** | **String** | The taxpayer identification number of the signing officer (required). | [optional] |
| **signing_officer_phone_number** | **String** | The phone number of the signing officer (required). | [optional] |
| **beneficial_owners** | [**Array&lt;PostInvestorProfilesCorporationsBeneficialOwnersInner&gt;**](PostInvestorProfilesCorporationsBeneficialOwnersInner.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PostInvestorProfilesCorporations.new(
  email: null,
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
  signing_officer_title: null,
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

