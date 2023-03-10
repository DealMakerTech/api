# DealMakerAPI::PatchInvestorRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profile_id** | **Integer** | Investor profile id that needs to be set on investor |  |
| **current_step** | **String** | Step on checkout page. | [optional][default to &#39;contact-information&#39;] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PatchInvestorRequest.new(
  investor_profile_id: null,
  current_step: null
)
```

