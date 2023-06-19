# DealMakerAPI::EditInvestorTagsRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **tags** | **Array&lt;String&gt;** | The list of tags. |  |
| **mode** | **String** | The type of request for the tag(s): \&quot;append\&quot; or \&quot;replace\&quot;. | [optional][default to &#39;append&#39;] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::EditInvestorTagsRequest.new(
  tags: null,
  mode: null
)
```

