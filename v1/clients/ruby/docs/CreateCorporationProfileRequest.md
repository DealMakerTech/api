# DealMakerAPI::CreateCorporationProfileRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **email** | **String** | User email which is associated with investor profile (required). |  |
| **us_accredited_category** | **String** | The accredited investor information. | [optional] |
| **name** | **String** | The name of the corporation (required). | [optional] |
| **country** | **String** | The country of the corporation (required). | [optional] |
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
| **signing_officer_suffix** | **String** | The suffix of the signing officer. | [optional] |
| **signing_officer_country** | **String** | The country of the signing officer (required). | [optional] |
| **signing_officer_street_address** | **String** | The street address of the signing officer (required). | [optional] |
| **signing_officer_unit2** | **String** | The street address line 2 of the signing officer. | [optional] |
| **signing_officer_city** | **String** | The city of the signing officer (required). | [optional] |
| **signing_officer_region** | **String** | The region or state of the signing officer (required). | [optional] |
| **signing_officer_postal_code** | **String** | The postal code or zipcode of the signing officer (required). | [optional] |
| **signing_officer_date_of_birth** | **String** | The date of birth of the signing officer (required). | [optional] |
| **signing_officer_taxpayer_id** | **String** | The taxpayer identification number of the signing officer (required). | [optional] |
| **beneficial_owners_first_name** | **Array&lt;String&gt;** | The list of first names for the beneficial owners (required for beneficial owner 1). | [optional] |
| **beneficial_owners_last_name** | **Array&lt;String&gt;** | The list of last names for the beneficial owners (required for beneficial owner 1). | [optional] |
| **beneficial_owners_suffix** | **Array&lt;String&gt;** | The list of suffixes for the beneficial owners. | [optional] |
| **beneficial_owners_country** | **Array&lt;String&gt;** | The list of countries for the beneficial owners (required for beneficial owner 1). | [optional] |
| **beneficial_owners_street_address** | **Array&lt;String&gt;** | The list of street addresses for the beneficial owners (required for beneficial owner 1). | [optional] |
| **beneficial_owners_unit_2** | **Array&lt;String&gt;** | The list of street address line 2 for the beneficial owners. | [optional] |
| **beneficial_owners_city** | **Array&lt;String&gt;** | The list of cities for the beneficial owners (required for beneficial owner 1). | [optional] |
| **beneficial_owners_region** | **Array&lt;String&gt;** | The list of region or states for the beneficial owners (required for beneficial owner 1). | [optional] |
| **beneficial_owners_postal_code** | **Array&lt;String&gt;** | The list of postal codes or zipcodes for the beneficial owners (required for beneficial owner 1). | [optional] |
| **beneficial_owners_date_of_birth** | **Array&lt;String&gt;** | The list of dates of birth for the beneficial owners (required for beneficial owner 1). | [optional] |
| **beneficial_owners_taxpayer_id** | **Array&lt;String&gt;** | The list of taxpayer identification numbers for the beneficial owners (required for beneficial owner 1). | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::CreateCorporationProfileRequest.new(
  email: null,
  us_accredited_category: null,
  name: null,
  country: null,
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
  signing_officer_country: null,
  signing_officer_street_address: null,
  signing_officer_unit2: null,
  signing_officer_city: null,
  signing_officer_region: null,
  signing_officer_postal_code: null,
  signing_officer_date_of_birth: null,
  signing_officer_taxpayer_id: null,
  beneficial_owners_first_name: null,
  beneficial_owners_last_name: null,
  beneficial_owners_suffix: null,
  beneficial_owners_country: null,
  beneficial_owners_street_address: null,
  beneficial_owners_unit_2: null,
  beneficial_owners_city: null,
  beneficial_owners_region: null,
  beneficial_owners_postal_code: null,
  beneficial_owners_date_of_birth: null,
  beneficial_owners_taxpayer_id: null
)
```

