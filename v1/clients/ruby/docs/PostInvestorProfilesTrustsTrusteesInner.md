# DealMakerAPI::PostInvestorProfilesTrustsTrusteesInner

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **first_name** | **String** | The list of first names for the trustees (required for trustee 1). | [optional] |
| **last_name** | **String** | The list of last names for the trustees (required for trustee 1). | [optional] |
| **suffix** | **String** | The list of suffixes for the trustees. | [optional] |
| **street_address** | **String** | The list of street addresses for the trustees (required for trustee 1). | [optional] |
| **unit2** | **String** | The list of street address line 2 for the trustees. | [optional] |
| **city** | **String** | The list of cities for the trustees (required for trustee 1). | [optional] |
| **region** | **String** | The list of regions or states for the trustees (required for trustee 1). | [optional] |
| **postal_code** | **String** | The list of postal codes or zipcodes for the trustees (required for trustee 1). | [optional] |
| **date_of_birth** | **String** | The list of dates of birth for the trustees (required for trustee 1). | [optional] |
| **taxpayer_id** | **String** | The list of taxpayer identification numbers for the trustees (required for trustee 1). | [optional] |
| **phone_number** | **String** | The list of phone numbers for the trustees (required for trustee 1). | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PostInvestorProfilesTrustsTrusteesInner.new(
  first_name: null,
  last_name: null,
  suffix: null,
  street_address: null,
  unit2: null,
  city: null,
  region: null,
  postal_code: null,
  date_of_birth: null,
  taxpayer_id: null,
  phone_number: null
)
```

