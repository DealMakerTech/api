# DealMakerAPI::CreateJointProfileRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **email** | **String** | User email which is associated with investor profile. |  |
| **us_accredited_category** | **String** | The United States accredited investor information. | [optional] |
| **ca_accredited_investor** | **String** | The Canadian accredited investor information. | [optional] |
| **joint_type** | **String** | The types of joint investor. | [optional] |
| **first_name** | **String** | The first name of the primary holder (required). | [optional] |
| **last_name** | **String** | The last name of the primary holder (required). | [optional] |
| **suffix** | **String** | The suffix of the primary holder. | [optional] |
| **country** | **String** | The country the primary holder (required). | [optional] |
| **street_address** | **String** | The street address of the primary holder (required). | [optional] |
| **unit2** | **String** | The street address line 2 of the primary holder. | [optional] |
| **city** | **String** | The city of the primary holder (required). | [optional] |
| **region** | **String** | The region or State of the primary holder (required). | [optional] |
| **postal_code** | **String** | The postal code or zipcode of the primary holder (required). | [optional] |
| **date_of_birth** | **String** | The date of birth of the primary holder (required). | [optional] |
| **taxpayer_id** | **String** | The taxpayer identification number of the primary holder (required). | [optional] |
| **phone_number** | **String** | The phone number of the primary holder (required). | [optional] |
| **income** | **Float** | The income of the primary holder. | [optional] |
| **net_worth** | **Float** | The net worth of the primary holder. | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offerings amount of the primary holder. | [optional] |
| **joint_holder_first_name** | **String** | The first name of the joint holder (required). | [optional] |
| **joint_holder_last_name** | **String** | The last name of the joint holder (required). | [optional] |
| **joint_holder_suffix** | **String** | The suffix of the joint holder. | [optional] |
| **joint_holder_country** | **String** | The country of the joint holder (required). | [optional] |
| **joint_holder_street_address** | **String** | The street address of the joint holder (required). | [optional] |
| **joint_holder_unit2** | **String** | The street address line 2 of the joint holder. | [optional] |
| **joint_holder_city** | **String** | The city of the joint holder (required). | [optional] |
| **joint_holder_region** | **String** | The region or state of the joint holder (required). | [optional] |
| **joint_holder_postal_code** | **String** | The postal code or zipcode of the joint holder (required). | [optional] |
| **joint_holder_date_of_birth** | **String** | The date of birth of the joint holder (required). | [optional] |
| **joint_holder_taxpayer_id** | **String** | The taxpayer identification number of the joint holder (required). | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::CreateJointProfileRequest.new(
  email: null,
  us_accredited_category: null,
  ca_accredited_investor: null,
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

