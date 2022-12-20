# Api.CreateTrustProfileRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **String** | User email which is associated with investor profile (required). | 
**usAccreditedCategory** | **String** | The accredited investor information. | [optional] 
**name** | **String** | The name of the trust (required). | [optional] 
**date** | **String** | The creation date of the trust (required). | [optional] 
**country** | **String** | The country of the trust (required). | [optional] 
**streetAddress** | **String** | Trust street address of the trust (required). | [optional] 
**unit2** | **String** | The street address line 2 of the trust. | [optional] 
**city** | **String** | The city of the trust (required). | [optional] 
**region** | **String** | The region or state of the trust (required). | [optional] 
**postalCode** | **String** | The postal code or zipcode of the trust (required). | [optional] 
**phoneNumber** | **String** | The phone number of the trust (required). | [optional] 
**trusteesFirstName** | **[String]** | The list of first names for the trustees (required for trustee 1). | [optional] 
**trusteesLastName** | **[String]** | The list of last names for the trustees (required for trustee 1). | [optional] 
**trusteesSuffix** | **[String]** | The list of suffixes for the trustees. | [optional] 
**trusteesCountry** | **[String]** | The list of countries for the trustees (required for trustee 1). | [optional] 
**trusteesStreetAddress** | **[String]** | The list of street addresses for the trustees (required for trustee 1). | [optional] 
**trusteesUnit2** | **[String]** | The list of street address line 2 for the trustees. | [optional] 
**trusteesCity** | **[String]** | The list of cities for the trustees (required for trustee 1). | [optional] 
**trusteesRegion** | **[String]** | The list of regions or states for the trustees (required for trustee 1). | [optional] 
**trusteesPostalCode** | **[String]** | The list of postal codes or zipcodes for the trustees (required) for trustee 1. | [optional] 
**trusteesDateOfBirth** | **[String]** | The list of dates of birth for the trustees (required for trustee 1). | [optional] 
**trusteesTaxpayerId** | **[String]** | The list of taxpayer identification numbers for the trustees (required for trustee 1). | [optional] 



## Enum: UsAccreditedCategoryEnum


* `entity_owned_by_accredited_investors` (value: `"entity_owned_by_accredited_investors"`)

* `broker_or_dealer` (value: `"broker_or_dealer"`)

* `assets_trust` (value: `"assets_trust"`)

* `not_accredited` (value: `"not_accredited"`)




