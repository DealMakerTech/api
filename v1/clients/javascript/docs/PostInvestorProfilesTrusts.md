# Api.PostInvestorProfilesTrusts

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **String** | User email which is associated with investor profile (required). | 
**usAccreditedCategory** | **String** | The United States accredited investor information. | [optional] 
**caAccreditedInvestor** | **String** | The Canadian accredited investor information. | [optional] 
**name** | **String** | The name of the trust (required). | [optional] 
**date** | **String** | The creation date of the trust (required). | [optional] 
**streetAddress** | **String** | Trust street address of the trust (required). | [optional] 
**unit2** | **String** | The street address line 2 of the trust. | [optional] 
**city** | **String** | The city of the trust (required). | [optional] 
**region** | **String** | The region or state of the trust (required). | [optional] 
**postalCode** | **String** | The postal code or zipcode of the trust (required). | [optional] 
**phoneNumber** | **String** | The phone number of the trust (required). | [optional] 
**income** | **Number** | The income of the trust. | [optional] 
**netWorth** | **Number** | The net worth of the trust. | [optional] 
**regCfPriorOfferingsAmount** | **Number** | The prior offering amount of the trust. | [optional] 
**trustees** | [**[PostInvestorProfilesTrustsTrusteesInner]**](PostInvestorProfilesTrustsTrusteesInner.md) |  | [optional] 



## Enum: UsAccreditedCategoryEnum


* `entity_owned_by_accredited_investors` (value: `"entity_owned_by_accredited_investors"`)

* `broker_or_dealer` (value: `"broker_or_dealer"`)

* `assets_trust` (value: `"assets_trust"`)

* `not_accredited` (value: `"not_accredited"`)





## Enum: CaAccreditedInvestorEnum


* `p` (value: `"p"`)

* `w` (value: `"w"`)




