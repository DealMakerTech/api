# Api.V1EntitiesInvestor

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **Number** | Investor id. | [optional] 
**user** | [**V1EntitiesInvestorUser**](V1EntitiesInvestorUser.md) |  | [optional] 
**createdAt** | **Date** | The creation time. | [optional] 
**updatedAt** | **Date** | The last update time. | [optional] 
**name** | **String** | The full name of the investor. | [optional] 
**allocationUnit** | **String** | The allocation unit. | [optional] 
**state** | **String** | The state. | [optional] 
**fundingState** | **String** | The funding state. | [optional] 
**fundsPending** | **Boolean** | True if any funds are pending; false otherwise. | [optional] 
**beneficialAddress** | **String** | The address. | [optional] 
**phoneNumber** | **String** | The beneficial phone number associated with the investor. If there is no phone number, this returns the phone number associated with the user profile. | [optional] 
**investorCurrency** | **String** | The investor currency. | [optional] 
**numberOfSecurities** | **Number** | The number of securities. | [optional] 
**investmentValue** | **Number** | The current investment value. | [optional] 
**allocatedAmount** | **Number** | The amount allocated. | [optional] 
**fundsValue** | **Number** | The current amount that has been funded. | [optional] 
**accessLink** | **String** | The access link for the investor. This is the access link for the specific investment, not the user. If the same user has multiple investments, each one will have a different access link. Please note that this access link expires every hour. In order to redirect the investor into their authentication screen, use the https://app.dealmaker.tech/deals/{{deal_id}}/investors/{{investor_id}}/otp_access url. | [optional] 
**subscriptionId** | **Number** | The investor subscription id. | [optional] 
**subscriptionAgreement** | [**V1EntitiesSubscriptionAgreement**](V1EntitiesSubscriptionAgreement.md) |  | [optional] 
**attachments** | [**V1EntitiesAttachment**](V1EntitiesAttachment.md) |  | [optional] 
**backgroundCheckSearches** | [**V1EntitiesBackgroundCheckSearch**](V1EntitiesBackgroundCheckSearch.md) |  | [optional] 
**verificationStatus** | **String** | The current 506c verification state. | [optional] 
**warrantExpiryDate** | **Date** | The warrant expiry date. | [optional] 
**warrantCertificateNumber** | **Number** | The warrant certificate number. | [optional] 
**rankingScore** | **Number** | A value &#x60;[0, 1]&#x60; that represents the propensity for the investor to complete payment for the investment. A larger value indicates a higher likelihood of payment, as predicted by DealMaker’s machine learning algorithm. This field will only populate if DealMaker Compass is enabled for a deal and the investor &#x60;funds_state&#x60; value is not &#x60;funded&#x60; or &#x60;overfunded&#x60; | [optional] 
**investorProfile** | **String** |  | [optional] 
**investorProfileId** | **Number** | The investor profile id. | [optional] 
**checkoutState** | **String** | Current state on the checkout page. | [optional] 
**legacyFlowLink** | **String** | The legacy link for the investor. If the investor is already on the legacy flow, this link will be null. | [optional] 



## Enum: AllocationUnitEnum


* `securities` (value: `"securities"`)

* `amount` (value: `"amount"`)





## Enum: StateEnum


* `draft` (value: `"draft"`)

* `invited` (value: `"invited"`)

* `cosigning` (value: `"cosigning"`)

* `signed` (value: `"signed"`)

* `waiting` (value: `"waiting"`)

* `accepted` (value: `"accepted"`)

* `inactive` (value: `"inactive"`)

* `processing_countersign` (value: `"processing_countersign"`)





## Enum: FundingStateEnum


* `unfunded` (value: `"unfunded"`)

* `underfunded` (value: `"underfunded"`)

* `funded` (value: `"funded"`)

* `overfunded` (value: `"overfunded"`)





## Enum: VerificationStatusEnum


* `pending` (value: `"pending"`)

* `approved` (value: `"approved"`)

* `rejected` (value: `"rejected"`)

* `new_documents_requested` (value: `"new_documents_requested"`)





## Enum: CheckoutStateEnum


* `pre_checkout` (value: `"pre_checkout"`)

* `investment_amount` (value: `"investment_amount"`)

* `contact_information` (value: `"contact_information"`)

* `investor_confirmation` (value: `"investor_confirmation"`)

* `terms_conditions` (value: `"terms_conditions"`)

* `payment` (value: `"payment"`)

* `checkout_complete` (value: `"checkout_complete"`)

* `resubmit_agreement` (value: `"resubmit_agreement"`)

* `legacy_checkout` (value: `"legacy_checkout"`)




