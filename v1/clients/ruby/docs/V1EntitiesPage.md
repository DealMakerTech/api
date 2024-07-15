# DealMakerAPI::V1EntitiesPage

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The page id. | [optional] |
| **name** | **String** | The page name. | [optional] |
| **draft_json_content** | **String** | The page draft json content. | [optional] |
| **json_content** | **String** | The page live json content. | [optional] |
| **pageable_type** | **String** | The pageable type. | [optional] |
| **pageable_id** | **Integer** | The pageable id. | [optional] |
| **page_template_id** | **Integer** | The page template id. | [optional] |
| **created_at** | **Time** | The creation time. | [optional] |
| **updated_at** | **Time** | The last update time. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesPage.new(
  id: null,
  name: null,
  draft_json_content: null,
  json_content: null,
  pageable_type: null,
  pageable_id: null,
  page_template_id: null,
  created_at: null,
  updated_at: null
)
```

