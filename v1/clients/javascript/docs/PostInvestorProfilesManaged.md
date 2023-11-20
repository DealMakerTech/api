# Api.PostInvestorProfilesManaged

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **String** | User email which is associated with investor profile (required). | 
**usAccreditedCategory** | **String** | The United States accredited investor information. | [optional] 
**caAccreditedInvestor** | **String** | The Canadian accredited investor information. | [optional] 
**name** | **String** | The name of the provider (required). | [optional] 
**streetAddress** | **String** | The street address of the provider (required). | [optional] 
**unit2** | **String** | The street address line 2 of the provider. | [optional] 
**city** | **String** | The city of the provider (required). | [optional] 
**region** | **String** | The region or state of the provider (required). | [optional] 
**postalCode** | **String** | The postal code or zipcode of the provider (required). | [optional] 
**taxpayerId** | **String** | The taxpayer identification number of the provider (required). | [optional] 
**confirmation** | **Boolean** | Confirms that the provider is able to custody these securities and release respective funds in order to complete the purchase (required). | [optional] 
**income** | **Number** | The income of the managed investor profile | [optional] 
**netWorth** | **Number** | The net worth of the managed investor profile | [optional] 
**regCfPriorOfferingsAmount** | **Number** | The prior offering amount of the managed investor profile | [optional] 
**beneficiaryAccountNumber** | **String** | The account number of the beneficiary (required). | [optional] 
**beneficiaryFirstName** | **String** | The first name of the beneficiary (required). | [optional] 
**beneficiaryLastName** | **String** | The last name of the beneficiary (required). | [optional] 
**beneficiarySuffix** | **String** | The suffix of the beneficiary. | [optional] 
**beneficiaryStreetAddress** | **String** | The street address of the beneficiary (required). | [optional] 
**beneficiaryUnit2** | **String** | The street address line 2 of the beneficiary. | [optional] 
**beneficiaryCity** | **String** | The city of the beneficiary (required). | [optional] 
**beneficiaryRegion** | **String** | The region or state of the beneficiary (required). | [optional] 
**beneficiaryPostalCode** | **String** | The postal code or zipcode of the beneficiary (required). | [optional] 
**beneficiaryDateOfBirth** | **String** | The date of birth of the beneficiary (required). | [optional] 
**beneficiaryTaxpayerId** | **String** | The taxpayer identification number of the beneficiary (required). | [optional] 
**beneficiaryPhoneNumber** | **String** | The phone number of the beneficiary (required). | [optional] 



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




