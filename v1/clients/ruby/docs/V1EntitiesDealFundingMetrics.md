# DealMakerAPI::V1EntitiesDealFundingMetrics

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **amount_subscribed** | **Float** | The amount subscribed. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the investment amount from committed investors. Committed investors are investors with a status of &#x60;signed&#x60;&#x60;, &#x60;waiting&#x60;, or &#x60;accepted&#x60;. | [optional] |
| **securities_subscribed** | **Integer** | The number of securities that have been subscribed. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the total number of securities from committed investors. Committed investors are investors with a status of &#x60;signed&#x60;, &#x60;waiting&#x60;, or &#x60;accepted&#x60;. | [optional] |
| **amount_allocated** | **Float** | The amount allocated. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the total allocated investment amount for investors with a status of &#x60;invited&#x60;. Allocated investment amounts are locked in and cannot be changed by the investor. | [optional] |
| **securities_allocated** | **Integer** | The number of securities that have been allocated. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the total allocated number of securities for investors with a status of &#x60;invited&#x60;. Allocated securities are locked in and cannot be changed by the investor. | [optional] |
| **amount_accepted** | **Float** | The amount accepted. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the investment amount from investors with the status &#x60;accepted&#x60;. | [optional] |
| **securities_accepted** | **Integer** | The number of securities that have been accepted. &lt;br&gt;&lt;br&gt;This value is obtained by dividing the amount_accepted value by the price per security. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesDealFundingMetrics.new(
  amount_subscribed: null,
  securities_subscribed: null,
  amount_allocated: null,
  securities_allocated: null,
  amount_accepted: null,
  securities_accepted: null
)
```

