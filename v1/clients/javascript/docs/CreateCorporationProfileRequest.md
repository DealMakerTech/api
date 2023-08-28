# Api.CreateCorporationProfileRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **String** | User email which is associated with investor profile (required). | 
**usAccreditedCategory** | **String** | The United States accredited investor information. | [optional] 
**caAccreditedInvestor** | **String** | The Canadian accredited investor information. | [optional] 
**name** | **String** | The name of the corporation (required). | [optional] 
**country** | **String** | The country of the corporation (required). | [optional] 
**streetAddress** | **String** | The street address of the corporation (required). | [optional] 
**unit2** | **String** | The street address line 2 of the corporation. | [optional] 
**city** | **String** | The city of the corporation (required). | [optional] 
**region** | **String** | The region or state of the corporation (required). | [optional] 
**postalCode** | **String** | The postal code or zipcode of the corporation (required). | [optional] 
**businessNumber** | **String** | The taxpayer identification number  of the corporation (required). | [optional] 
**phoneNumber** | **String** | The phone number o of the corporation (required). | [optional] 
**income** | **Number** | The income of the individual investor profile | [optional] 
**netWorth** | **Number** | The net worth of the individual investor profile | [optional] 
**regCfPriorOfferingsAmount** | **Number** | The prior offering amount of the individual investor profile | [optional] 
**signingOfficerFirstName** | **String** | The first name of the signing officer (required). | [optional] 
**signingOfficerLastName** | **String** | The last name of the signing officer (required). | [optional] 
**signingOfficerSuffix** | **String** | The suffix of the signing officer. | [optional] 
**signingOfficerCountry** | **String** | The country of the signing officer (required). | [optional] 
**signingOfficerStreetAddress** | **String** | The street address of the signing officer (required). | [optional] 
**signingOfficerUnit2** | **String** | The street address line 2 of the signing officer. | [optional] 
**signingOfficerCity** | **String** | The city of the signing officer (required). | [optional] 
**signingOfficerRegion** | **String** | The region or state of the signing officer (required). | [optional] 
**signingOfficerPostalCode** | **String** | The postal code or zipcode of the signing officer (required). | [optional] 
**signingOfficerDateOfBirth** | **String** | The date of birth of the signing officer (required). | [optional] 
**signingOfficerTaxpayerId** | **String** | The taxpayer identification number of the signing officer (required). | [optional] 
**signingOfficerPhoneNumber** | **String** | The phone number of the signing officer (required). | [optional] 
**beneficialOwnersFirstName** | **[String]** | The list of first names for the beneficial owners (required for beneficial owner 1). | [optional] 
**beneficialOwnersLastName** | **[String]** | The list of last names for the beneficial owners (required for beneficial owner 1). | [optional] 
**beneficialOwnersSuffix** | **[String]** | The list of suffixes for the beneficial owners. | [optional] 
**beneficialOwnersCountry** | **[String]** | The list of countries for the beneficial owners (required for beneficial owner 1). | [optional] 
**beneficialOwnersStreetAddress** | **[String]** | The list of street addresses for the beneficial owners (required for beneficial owner 1). | [optional] 
**beneficialOwnersUnit2** | **[String]** | The list of street address line 2 for the beneficial owners. | [optional] 
**beneficialOwnersCity** | **[String]** | The list of cities for the beneficial owners (required for beneficial owner 1). | [optional] 
**beneficialOwnersRegion** | **[String]** | The list of region or states for the beneficial owners (required for beneficial owner 1). | [optional] 
**beneficialOwnersPostalCode** | **[String]** | The list of postal codes or zipcodes for the beneficial owners (required for beneficial owner 1). | [optional] 
**beneficialOwnersDateOfBirth** | **[String]** | The list of dates of birth for the beneficial owners (required for beneficial owner 1). | [optional] 
**beneficialOwnersTaxpayerId** | **[String]** | The list of taxpayer identification numbers for the beneficial owners (required for beneficial owner 1). | [optional] 
**beneficialOwnersPhoneNumber** | **[String]** | The list of phone numbers for the beneficial owners (required for beneficial owner 1). | [optional] 



## Enum: UsAccreditedCategoryEnum


* `entity_owned_by_accredited_investors` (value: `"entity_owned_by_accredited_investors"`)

* `assets_other` (value: `"assets_other"`)

* `assets_family_office` (value: `"assets_family_office"`)

* `assets_benefit_plan` (value: `"assets_benefit_plan"`)

* `assets_state_plan` (value: `"assets_state_plan"`)

* `assets_501_c_3` (value: `"assets_501_c_3"`)

* `assets_corporation` (value: `"assets_corporation"`)

* `broker_or_dealer` (value: `"broker_or_dealer"`)

* `bank_3_a_2` (value: `"bank_3_a_2"`)

* `business_development_company` (value: `"business_development_company"`)

* `private_business_development_company` (value: `"private_business_development_company"`)

* `investment_company` (value: `"investment_company"`)

* `rural_business_investment_company` (value: `"rural_business_investment_company"`)

* `insurance_company` (value: `"insurance_company"`)

* `family_client` (value: `"family_client"`)

* `not_accredited` (value: `"not_accredited"`)





## Enum: CaAccreditedInvestorEnum


* `a` (value: `"a"`)

* `b` (value: `"b"`)

* `c` (value: `"c"`)

* `d` (value: `"d"`)

* `f` (value: `"f"`)

* `g` (value: `"g"`)

* `h` (value: `"h"`)

* `i` (value: `"i"`)

* `m` (value: `"m"`)

* `n` (value: `"n"`)

* `o` (value: `"o"`)

* `p` (value: `"p"`)

* `q` (value: `"q"`)

* `r` (value: `"r"`)

* `s` (value: `"s"`)

* `t` (value: `"t"`)

* `u` (value: `"u"`)

* `v` (value: `"v"`)

* `x` (value: `"x"`)




