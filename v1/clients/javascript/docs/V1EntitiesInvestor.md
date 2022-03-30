# Dealmakerapi.V1EntitiesInvestor

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **Number** | Investor id. | [optional] 
**createdAt** | **Date** | The creation time. | [optional] 
**updatedAt** | **Date** | The last update time. | [optional] 
**name** | **String** | The full name of the investor. | [optional] 
**allocationUnit** | **String** | The allocation unit. | [optional] 
**state** | **String** | The state. | [optional] 
**fundsState** | **String** | The funding state. | [optional] 
**fundsPending** | **Boolean** | True if any funds are pending; false otherwise. | [optional] 
**beneficialAddress** | **String** | The address. | [optional] 
**investorCurrency** | **String** | The investor currency. | [optional] 
**investmentValue** | **Number** | The current investment value. | [optional] 
**numberOfSecurities** | **Number** | The number of securities. | [optional] 
**allocatedAmount** | **Number** | The amount allocated. | [optional] 
**fundsValue** | **Number** | The current amount that has been funded. | [optional] 
**accessLink** | **String** | The access link for the investor. | [optional] 
**subscriptionAgreement** | [**V1EntitiesSubscriptionAgreement**](V1EntitiesSubscriptionAgreement.md) |  | [optional] 
**attachments** | [**V1EntitiesAttachment**](V1EntitiesAttachment.md) |  | [optional] 
**backgroundCheckSearches** | [**V1EntitiesBackgroundCheckSearch**](V1EntitiesBackgroundCheckSearch.md) |  | [optional] 
**verificationStatus** | **String** | The current 506c verification state. | [optional] 
**warrantExpiryDate** | **Date** | The warrant expiry date. | [optional] 
**warrantCertificateNumber** | **Number** | The warrant certificate number. | [optional] 



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





## Enum: FundsStateEnum


* `unfunded` (value: `"unfunded"`)

* `underfunded` (value: `"underfunded"`)

* `funded` (value: `"funded"`)

* `overfunded` (value: `"overfunded"`)





## Enum: VerificationStatusEnum


* `pending` (value: `"pending"`)

* `approved` (value: `"approved"`)

* `rejected` (value: `"rejected"`)

* `new_documents_requested` (value: `"new_documents_requested"`)




