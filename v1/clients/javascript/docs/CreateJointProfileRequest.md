# Api.CreateJointProfileRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **String** | User email which is associated with investor profile. | 
**usAccreditedCategory** | **String** | The United States accredited investor information. | [optional] 
**caAccreditedInvestor** | **String** | The Canadian accredited investor information. | [optional] 
**jointType** | **String** | The types of joint investor. | [optional] 
**firstName** | **String** | The first name of the primary holder (required). | [optional] 
**lastName** | **String** | The last name of the primary holder (required). | [optional] 
**suffix** | **String** | The suffix of the primary holder. | [optional] 
**country** | **String** | The country the primary holder (required). | [optional] 
**streetAddress** | **String** | The street address of the primary holder (required). | [optional] 
**unit2** | **String** | The street address line 2 of the primary holder. | [optional] 
**city** | **String** | The city of the primary holder (required). | [optional] 
**region** | **String** | The region or State of the primary holder (required). | [optional] 
**postalCode** | **String** | The postal code or zipcode of the primary holder (required). | [optional] 
**dateOfBirth** | **String** | The date of birth of the primary holder (required). | [optional] 
**taxpayerId** | **String** | The taxpayer identification number of the primary holder (required). | [optional] 
**phoneNumber** | **String** | The phone number of the primary holder (required). | [optional] 
**income** | **Number** | The income of the primary holder. | [optional] 
**netWorth** | **Number** | The net worth of the primary holder. | [optional] 
**regCfPriorOfferingsAmount** | **Number** | The prior offerings amount of the primary holder. | [optional] 
**jointHolderFirstName** | **String** | The first name of the joint holder (required). | [optional] 
**jointHolderLastName** | **String** | The last name of the joint holder (required). | [optional] 
**jointHolderSuffix** | **String** | The suffix of the joint holder. | [optional] 
**jointHolderCountry** | **String** | The country of the joint holder (required). | [optional] 
**jointHolderStreetAddress** | **String** | The street address of the joint holder (required). | [optional] 
**jointHolderUnit2** | **String** | The street address line 2 of the joint holder. | [optional] 
**jointHolderCity** | **String** | The city of the joint holder (required). | [optional] 
**jointHolderRegion** | **String** | The region or state of the joint holder (required). | [optional] 
**jointHolderPostalCode** | **String** | The postal code or zipcode of the joint holder (required). | [optional] 
**jointHolderDateOfBirth** | **String** | The date of birth of the joint holder (required). | [optional] 
**jointHolderTaxpayerId** | **String** | The taxpayer identification number of the joint holder (required). | [optional] 



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





## Enum: JointTypeEnum


* `joint_tenant` (value: `"joint_tenant"`)

* `tenants_in_common` (value: `"tenants_in_common"`)

* `community_property` (value: `"community_property"`)




