# DealMakerAPI::CreateShareholderActionRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **request_type** | **String** | The request type of the shareholder action |  |
| **description** | **String** | The description of the shareholder action |  |
| **request_documents** | **Array&lt;File&gt;** | The document associated with the shareholder action | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::CreateShareholderActionRequest.new(
  request_type: null,
  description: null,
  request_documents: null
)
```

