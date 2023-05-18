# DealMakerAPI::PatchJointProfileRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **us_accredited_category** | **String** | The accredited investor information. | [optional] |
| **joint_type** | **String** | The kind of joint investor. | [optional] |
| **first_name** | **String** | The first name of the investor profile. | [optional] |
| **last_name** | **String** | The last name of the investor profile. | [optional] |
| **suffix** | **String** | The suffix of the investor profile. | [optional] |
| **country** | **String** | The country the investor profile. | [optional] |
| **street_address** | **String** | The street address of the investor profile. | [optional] |
| **unit2** | **String** | The street address line 2 of the investor profile. | [optional] |
| **city** | **String** | The city of the investor profile. | [optional] |
| **region** | **String** | The region or State of the investor profile. | [optional] |
| **postal_code** | **String** | The postal code or zipcode of the investor profile. | [optional] |
| **date_of_birth** | **String** | The date of birth of the investor profile. | [optional] |
| **taxpayer_id** | **String** | The taxpayer identification number of the investor profile. | [optional] |
| **phone_number** | **String** | The phone number of the investor profile. | [optional] |
| **income** | **Float** | The income of the investor profile. | [optional] |
| **net_worth** | **Float** | The net worth of the investor profile. | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offerings amount of the investor profile. | [optional] |
| **joint_holder_first_name** | **String** | The joint holder first name of the investor profile. | [optional] |
| **joint_holder_last_name** | **String** | The joint holder last name of the investor profile. | [optional] |
| **joint_holder_suffix** | **String** | The suffix of the individual investor profile. | [optional] |
| **joint_holder_country** | **String** | The joint holder country of the investor profile. | [optional] |
| **joint_holder_street_address** | **String** | The joint holder street address of the investor profile. | [optional] |
| **joint_holder_unit2** | **String** | The Joint holder street address line 2 of the investor profile. | [optional] |
| **joint_holder_city** | **String** | The Joint holder city of the investor profile. | [optional] |
| **joint_holder_region** | **String** | The joint holder region or state of the investor profile. | [optional] |
| **joint_holder_postal_code** | **String** | The joint holder postal code or zipcode of the investor profile. | [optional] |
| **joint_holder_date_of_birth** | **String** | The joint holder date of birth of the investor profile. | [optional] |
| **joint_holder_taxpayer_id** | **String** | The joint holder taxpayer identification number of the investor profile. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PatchJointProfileRequest.new(
  us_accredited_category: null,
  joint_type: null,
  first_name: null,
  last_name: null,
  suffix: null,
  country: null,
  street_address: null,
  unit2: null,
  city: null,
  region: null,
  postal_code: null,
  date_of_birth: null,
  taxpayer_id: null,
  phone_number: null,
  income: null,
  net_worth: null,
  reg_cf_prior_offerings_amount: null,
  joint_holder_first_name: null,
  joint_holder_last_name: null,
  joint_holder_suffix: null,
  joint_holder_country: null,
  joint_holder_street_address: null,
  joint_holder_unit2: null,
  joint_holder_city: null,
  joint_holder_region: null,
  joint_holder_postal_code: null,
  joint_holder_date_of_birth: null,
  joint_holder_taxpayer_id: null
)
```

