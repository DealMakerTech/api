# DealMakerAPI::V1EntitiesTtwCampaignResponse

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The campaign ID | [optional] |
| **name** | **String** | Campaign name | [optional] |
| **redirect_link** | **String** | Redirect link for the campaign | [optional] |
| **introduction_email** | **Boolean** | State of the introduction email | [optional] |
| **one_day_reminder_email** | **Boolean** | State of the 1 day reminder email | [optional] |
| **two_day_reminder_email** | **Boolean** | State of the 2 day reminder email | [optional] |
| **seven_day_reminder_email** | **Boolean** | State of the 7 day reminder email | [optional] |
| **confirmation_email** | **Boolean** | State of the confirmation email | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesTtwCampaignResponse.new(
  id: null,
  name: null,
  redirect_link: null,
  introduction_email: null,
  one_day_reminder_email: null,
  two_day_reminder_email: null,
  seven_day_reminder_email: null,
  confirmation_email: null
)
```

