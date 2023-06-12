# DealMakerAPI::AddDocumentRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **type** | **String** | Document type. | [default to &#39;regular&#39;] |
| **file** | **File** | File to upload. |  |
| **caption** | **String** | The caption. | [optional] |
| **search_entity_id** | **Integer** | Search entity id. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::AddDocumentRequest.new(
  type: null,
  file: null,
  caption: null,
  search_entity_id: null
)
```

