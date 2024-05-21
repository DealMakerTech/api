# DealMakerAPI::V1EntitiesAttachment

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The attachment id. | [optional] |
| **url** | **String** | The attachment url. | [optional] |
| **status** | **String** | The attachment status. | [optional] |
| **file_name** | **String** | The attachment file name. | [optional] |
| **original_file_name** | **String** | The attachment original file name. | [optional] |
| **file_size** | **Integer** | The size of the file in bytes. | [optional] |
| **formatted_file_size** | **String** | The size of the file in human readable format. | [optional] |
| **created_at** | **Time** | String representation of the date uploaded. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesAttachment.new(
  id: null,
  url: null,
  status: null,
  file_name: null,
  original_file_name: null,
  file_size: null,
  formatted_file_size: null,
  created_at: null
)
```

