# DealMakerAPI::CreateTrustProfileRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **email** | **String** | User email which is associated with investor profile (required). |  |
| **us_accredited_category** | **String** | The accredited investor information. | [optional] |
| **name** | **String** | The name of the trust (required). | [optional] |
| **date** | **String** | The creation date of the trust (required). | [optional] |
| **country** | **String** | The country of the trust (required). | [optional] |
| **street_address** | **String** | Trust street address of the trust (required). | [optional] |
| **unit2** | **String** | The street address line 2 of the trust. | [optional] |
| **city** | **String** | The city of the trust (required). | [optional] |
| **region** | **String** | The region or state of the trust (required). | [optional] |
| **postal_code** | **String** | The postal code or zipcode of the trust (required). | [optional] |
| **phone_number** | **String** | The phone number of the trust (required). | [optional] |
| **income** | **Float** | The income of the trust. | [optional] |
| **net_worth** | **Float** | The net worth of the trust. | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offering amount of the trust. | [optional] |
| **trustees_first_name** | **Array&lt;String&gt;** | The list of first names for the trustees (required for trustee 1). | [optional] |
| **trustees_last_name** | **Array&lt;String&gt;** | The list of last names for the trustees (required for trustee 1). | [optional] |
| **trustees_suffix** | **Array&lt;String&gt;** | The list of suffixes for the trustees. | [optional] |
| **trustees_country** | **Array&lt;String&gt;** | The list of countries for the trustees (required for trustee 1). | [optional] |
| **trustees_street_address** | **Array&lt;String&gt;** | The list of street addresses for the trustees (required for trustee 1). | [optional] |
| **trustees_unit_2** | **Array&lt;String&gt;** | The list of street address line 2 for the trustees. | [optional] |
| **trustees_city** | **Array&lt;String&gt;** | The list of cities for the trustees (required for trustee 1). | [optional] |
| **trustees_region** | **Array&lt;String&gt;** | The list of regions or states for the trustees (required for trustee 1). | [optional] |
| **trustees_postal_code** | **Array&lt;String&gt;** | The list of postal codes or zipcodes for the trustees (required) for trustee 1. | [optional] |
| **trustees_date_of_birth** | **Array&lt;String&gt;** | The list of dates of birth for the trustees (required for trustee 1). | [optional] |
| **trustees_taxpayer_id** | **Array&lt;String&gt;** | The list of taxpayer identification numbers for the trustees (required for trustee 1). | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::CreateTrustProfileRequest.new(
  email: null,
  us_accredited_category: null,
  name: null,
  date: null,
  country: null,
  street_address: null,
  unit2: null,
  city: null,
  region: null,
  postal_code: null,
  phone_number: null,
  income: null,
  net_worth: null,
  reg_cf_prior_offerings_amount: null,
  trustees_first_name: null,
  trustees_last_name: null,
  trustees_suffix: null,
  trustees_country: null,
  trustees_street_address: null,
  trustees_unit_2: null,
  trustees_city: null,
  trustees_region: null,
  trustees_postal_code: null,
  trustees_date_of_birth: null,
  trustees_taxpayer_id: null
)
```

