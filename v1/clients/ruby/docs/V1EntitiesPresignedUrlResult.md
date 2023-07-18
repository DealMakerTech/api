# DealMakerAPI::V1EntitiesPresignedUrlResult

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **file_key** | **String** | The file UUID generated value. | [optional] |
| **presigned_url** | **String** | A pre-signed url by aws for interacting with a S3 bucket. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesPresignedUrlResult.new(
  file_key: null,
  presigned_url: null
)
```

