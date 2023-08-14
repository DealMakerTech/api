# Api.CreateIndividualProfileRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **String** | User email which is associated with individual investor profile. | 
**usAccreditedCategory** | **String** | The United States accredited investor information. | [optional] 
**caAccreditedInvestor** | **String** | The Canadian accredited investor information. | [optional] 
**firstName** | **String** | The first name of the individual investor profile (required). | [optional] 
**lastName** | **String** | The last name of the individual investor profile (required) | [optional] 
**suffix** | **String** | The suffix of the individual investor profile | [optional] 
**dateOfBirth** | **String** | The date of birth of the investor profile (required) | [optional] 
**taxpayerId** | **String** | The taxpayer identification number of the investor profile (required) | [optional] 
**phoneNumber** | **String** | The phone number of the investor profile (required) | [optional] 
**country** | **String** | The country of the individual investor profile (required) | [optional] 
**streetAddress** | **String** | The street address of the individual investor profile (required) | [optional] 
**unit2** | **String** | The street address line 2 of the individual investor profile | [optional] 
**city** | **String** | The city of the individual investor profile (required) | [optional] 
**region** | **String** | The region or state of the individual investor profile (required) | [optional] 
**postalCode** | **String** | The postal code or zipcode of the individual investor profile (required) | [optional] 
**income** | **Number** | The income of the individual investor profile | [optional] 
**netWorth** | **Number** | The net worth of the individual investor profile | [optional] 
**regCfPriorOfferingsAmount** | **Number** | The prior offering amount of the individual investor profile | [optional] 



## Enum: UsAccreditedCategoryEnum


* `income_individual` (value: `"income_individual"`)

* `assets_individual` (value: `"assets_individual"`)

* `director` (value: `"director"`)

* `knowledgable_employee` (value: `"knowledgable_employee"`)

* `broker_or_dealer` (value: `"broker_or_dealer"`)

* `investment_advisor_registered` (value: `"investment_advisor_registered"`)

* `investment_advisor_relying` (value: `"investment_advisor_relying"`)

* `designated_accredited_investor` (value: `"designated_accredited_investor"`)

* `not_accredited` (value: `"not_accredited"`)





## Enum: CaAccreditedInvestorEnum


* `d` (value: `"d"`)

* `e` (value: `"e"`)

* `e_1` (value: `"e_1"`)

* `j` (value: `"j"`)

* `j_1` (value: `"j_1"`)

* `k_alone` (value: `"k_alone"`)

* `k_spouse` (value: `"k_spouse"`)

* `l` (value: `"l"`)

* `q` (value: `"q"`)

* `v` (value: `"v"`)

* `x` (value: `"x"`)




