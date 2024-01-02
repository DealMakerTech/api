# Api.PatchInvestorProfilesTrusts

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **String** | The email associated with the profile to be updated. | [optional] 
**usAccreditedCategory** | **String** | The United States accredited investor information. | [optional] 
**caAccreditedInvestor** | **String** | The Canadian accredited investor information. | [optional] 
**name** | **String** | The name of the trust. | [optional] 
**date** | **String** | The creation date of the trust. | [optional] 
**phoneNumber** | **String** | The phone number of the trust. | [optional] 
**streetAddress** | **String** | Trust street address. | [optional] 
**unit2** | **String** | Trust street address line 2. | [optional] 
**city** | **String** | Trust city. | [optional] 
**region** | **String** | Trust region or state. | [optional] 
**postalCode** | **String** | Trust postal code or zipcode. | [optional] 
**income** | **Number** | The income of the Trust. | [optional] 
**netWorth** | **Number** | The net worth of the Trust. | [optional] 
**regCfPriorOfferingsAmount** | **Number** | The prior offering amount of the Trust. | [optional] 
**trustees** | [**[PatchInvestorProfilesTrustsTrusteesInner]**](PatchInvestorProfilesTrustsTrusteesInner.md) |  | [optional] 



## Enum: UsAccreditedCategoryEnum


* `entity_owned_by_accredited_investors` (value: `"entity_owned_by_accredited_investors"`)

* `broker_or_dealer` (value: `"broker_or_dealer"`)

* `assets_trust` (value: `"assets_trust"`)

* `not_accredited` (value: `"not_accredited"`)





## Enum: CaAccreditedInvestorEnum


* `p` (value: `"p"`)

* `w` (value: `"w"`)




