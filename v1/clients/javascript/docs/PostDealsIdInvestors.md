# Api.PostDealsIdInvestors

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **String** | The investor email address. | 
**investorProfileId** | **Number** | The Investor Profile id. | [optional] 
**tags** | **[String]** |  | [optional] 
**firstName** | **String** | The first name of the investor. | [optional] 
**lastName** | **String** | The last name of the investor. | [optional] 
**phoneNumber** | **String** | The phone number of the investor. | [optional] 
**message** | **String** | The reminder email text of the investor. | [optional] 
**warrantExpiryDate** | **Date** | The warrant expiry date of the investor. | [optional] 
**warrantCertificateNumber** | **Number** | The certificate number of the investor. | [optional] 
**allocatedAmount** | **Number** | The allocation amount of the investor. | [optional] 
**allocationUnit** | **String** | The allocation unit of the investor. | [optional] [default to &#39;securities&#39;]
**state** | **String** | The initial state of the investor. | [optional] [default to &#39;invited&#39;]



## Enum: AllocationUnitEnum


* `securities` (value: `"securities"`)

* `amount` (value: `"amount"`)





## Enum: StateEnum


* `draft` (value: `"draft"`)

* `invited` (value: `"invited"`)




