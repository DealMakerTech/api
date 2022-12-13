# DealMakerAPI::CreateCompanyRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **name** | **String** | The company name |  |
| **country** | **String** | The country of the company |  |
| **street** | **String** | The street of the company |  |
| **line_2** | **String** | The second line of the address of the company | [optional] |
| **city** | **String** | The city of the company |  |
| **state** | **String** | The state of the company |  |
| **postal_code** | **String** | The postal code/zip code of the company |  |
| **primary_color** | **String** | The primary color of the company | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::CreateCompanyRequest.new(
  name: null,
  country: null,
  street: null,
  line_2: null,
  city: null,
  state: null,
  postal_code: null,
  primary_color: null
)
```

