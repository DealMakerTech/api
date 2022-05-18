# DealMakerAPI::V1EntitiesDealInvestorMetrics

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **total** | **Integer** | The total number of investors. | [optional] |
| **draft** | **Integer** | The total number of investors in the draft state. | [optional] |
| **invited** | **Integer** | The total number of investors in the invited state. | [optional] |
| **signed** | **Integer** | The total number of investors in the signed state. | [optional] |
| **waiting** | **Integer** | The total number of investors in the waiting state. | [optional] |
| **accepted** | **Integer** | The total number of investors in the accepted state. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesDealInvestorMetrics.new(
  total: null,
  draft: null,
  invited: null,
  signed: null,
  waiting: null,
  accepted: null
)
```

