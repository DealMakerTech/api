# DealMakerAPI::CreateInvestorRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **email** | **String** | The investor email address. |  |
| **investor_profile_id** | **Integer** | The Investor Profile id. | [optional] |
| **tags** | **Array&lt;String&gt;** |  | [optional] |
| **first_name** | **String** | The first name of the investor. | [optional] |
| **last_name** | **String** | The last name of the investor. | [optional] |
| **phone_number** | **String** | The phone number of the investor. | [optional] |
| **message** | **String** | The reminder email text of the investor. | [optional] |
| **warrant_expiry_date** | **Date** | The warrant expiry date of the investor. | [optional] |
| **warrant_certificate_number** | **Integer** | The certificate number of the investor. | [optional] |
| **allocated_amount** | **Float** | The allocation amount of the investor. | [optional] |
| **investment_value** | **Float** | The investment value of the investor. | [optional] |
| **allocation_unit** | **String** | The allocation unit of the investor. | [optional][default to &#39;securities&#39;] |
| **state** | **String** | The initial state of the investor. | [optional][default to &#39;invited&#39;] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::CreateInvestorRequest.new(
  email: null,
  investor_profile_id: null,
  tags: null,
  first_name: null,
  last_name: null,
  phone_number: null,
  message: null,
  warrant_expiry_date: null,
  warrant_certificate_number: null,
  allocated_amount: null,
  investment_value: null,
  allocation_unit: null,
  state: null
)
```

