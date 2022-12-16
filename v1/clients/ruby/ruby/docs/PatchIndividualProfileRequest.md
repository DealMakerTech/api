# DealMakerAPI::PatchIndividualProfileRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **us_accredited_category** | **String** | The accredited investor information. | [optional] |
| **first_name** | **String** | The first name of the individual investor profile. | [optional] |
| **last_name** | **String** | The last name of the individual investor profile. | [optional] |
| **suffix** | **String** | The suffix of the individual investor profile. | [optional] |
| **date_of_birth** | **String** | The date of birth of the investor profile. | [optional] |
| **taxpayer_id** | **String** | The taxpayer identification number of the investor profile. | [optional] |
| **phone_number** | **String** | The phone number of the investor profile. | [optional] |
| **country** | **String** | The country of the individual investor profile. | [optional] |
| **street_address** | **String** | The street address of the individual investor profile. | [optional] |
| **unit2** | **String** | The street address line 2 of the individual investor profile. | [optional] |
| **city** | **String** | The city of the individual investor profile. | [optional] |
| **region** | **String** | The region or state of the individual investor profile. | [optional] |
| **postal_code** | **String** | The postal code or zipcode of the individual investor profile. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PatchIndividualProfileRequest.new(
  us_accredited_category: null,
  first_name: null,
  last_name: null,
  suffix: null,
  date_of_birth: null,
  taxpayer_id: null,
  phone_number: null,
  country: null,
  street_address: null,
  unit2: null,
  city: null,
  region: null,
  postal_code: null
)
```

