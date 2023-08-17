# # V1EntitiesInvestor

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Investor id. | [optional]
**user** | [**\DealMaker\Model\V1EntitiesInvestorUser**](V1EntitiesInvestorUser.md) |  | [optional]
**created_at** | **\DateTime** | The creation time. | [optional]
**updated_at** | **\DateTime** | The last update time. | [optional]
**name** | **string** | The full name of the investor. | [optional]
**allocation_unit** | **string** | The allocation unit. | [optional]
**state** | **string** | The state. | [optional]
**funding_state** | **string** | The funding state. | [optional]
**funds_pending** | **bool** | True if any funds are pending; false otherwise. | [optional]
**beneficial_address** | **string** | The address. | [optional]
**phone_number** | **string** | The beneficial phone number associated with the investor. If there is no phone number, this returns the phone number associated with the user profile. | [optional]
**investor_currency** | **string** | The investor currency. | [optional]
**number_of_securities** | **int** | The number of securities. | [optional]
**investment_value** | **float** | The current investment value. | [optional]
**allocated_amount** | **float** | The amount allocated. | [optional]
**funds_value** | **float** | The current amount that has been funded. | [optional]
**access_link** | **string** | The access link for the investor. This is the access link for the specific investment, not the user. If the same user has multiple investments, each one will have a different access link. Please note that this access link expires every hour. In order to redirect the investor into their authentication screen, use the https://app.dealmaker.tech/deals/{{deal_id}}/investors/{{investor_id}}/otp_access url. | [optional]
**subscription_agreement** | [**\DealMaker\Model\V1EntitiesSubscriptionAgreement**](V1EntitiesSubscriptionAgreement.md) |  | [optional]
**attachments** | [**\DealMaker\Model\V1EntitiesAttachment**](V1EntitiesAttachment.md) |  | [optional]
**background_check_searches** | [**\DealMaker\Model\V1EntitiesBackgroundCheckSearch**](V1EntitiesBackgroundCheckSearch.md) |  | [optional]
**verification_status** | **string** | The current 506c verification state. | [optional]
**warrant_expiry_date** | **\DateTime** | The warrant expiry date. | [optional]
**warrant_certificate_number** | **int** | The warrant certificate number. | [optional]
**ranking_score** | **float** | A value &#x60;[0, 1]&#x60; that represents the propensity for the investor to complete payment for the investment. A larger value indicates a higher likelihood of payment, as predicted by DealMaker’s machine learning algorithm. This field will only populate if DealMaker Compass is enabled for a deal and the investor &#x60;funds_state&#x60; value is not &#x60;funded&#x60; or &#x60;overfunded&#x60; | [optional]
**investor_profile** | **string** |  | [optional]
**investor_profile_id** | **int** | The investor profile id. | [optional]
**checkout_state** | **string** | Current state on checkout page. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
