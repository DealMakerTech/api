# DealMakerAPI::GenerateUrlRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **filename** | **String** | The name of the file to be uploaded to S3. |  |
| **target** | **String** | The target is used to figure out the intended destination (which cloud provider and which bucket) | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::GenerateUrlRequest.new(
  filename: null,
  target: null
)
```

