# # CreateCorporationProfileRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **string** | User email which is associated with investor profile (required). |
**us_accredited_category** | **string** | The United States accredited investor information. | [optional]
**ca_accredited_investor** | **string** | The Canadian accredited investor information. | [optional]
**name** | **string** | The name of the corporation (required). | [optional]
**country** | **string** | The country of the corporation (required). | [optional]
**street_address** | **string** | The street address of the corporation (required). | [optional]
**unit2** | **string** | The street address line 2 of the corporation. | [optional]
**city** | **string** | The city of the corporation (required). | [optional]
**region** | **string** | The region or state of the corporation (required). | [optional]
**postal_code** | **string** | The postal code or zipcode of the corporation (required). | [optional]
**business_number** | **string** | The taxpayer identification number  of the corporation (required). | [optional]
**phone_number** | **string** | The phone number o of the corporation (required). | [optional]
**income** | **float** | The income of the individual investor profile | [optional]
**net_worth** | **float** | The net worth of the individual investor profile | [optional]
**reg_cf_prior_offerings_amount** | **float** | The prior offering amount of the individual investor profile | [optional]
**signing_officer_first_name** | **string** | The first name of the signing officer (required). | [optional]
**signing_officer_last_name** | **string** | The last name of the signing officer (required). | [optional]
**signing_officer_suffix** | **string** | The suffix of the signing officer. | [optional]
**signing_officer_country** | **string** | The country of the signing officer (required). | [optional]
**signing_officer_street_address** | **string** | The street address of the signing officer (required). | [optional]
**signing_officer_unit2** | **string** | The street address line 2 of the signing officer. | [optional]
**signing_officer_city** | **string** | The city of the signing officer (required). | [optional]
**signing_officer_region** | **string** | The region or state of the signing officer (required). | [optional]
**signing_officer_postal_code** | **string** | The postal code or zipcode of the signing officer (required). | [optional]
**signing_officer_date_of_birth** | **string** | The date of birth of the signing officer (required). | [optional]
**signing_officer_taxpayer_id** | **string** | The taxpayer identification number of the signing officer (required). | [optional]
**signing_officer_phone_number** | **string** | The phone number of the signing officer (required). | [optional]
**beneficial_owners_first_name** | **string[]** | The list of first names for the beneficial owners (required for beneficial owner 1). | [optional]
**beneficial_owners_last_name** | **string[]** | The list of last names for the beneficial owners (required for beneficial owner 1). | [optional]
**beneficial_owners_suffix** | **string[]** | The list of suffixes for the beneficial owners. | [optional]
**beneficial_owners_country** | **string[]** | The list of countries for the beneficial owners (required for beneficial owner 1). | [optional]
**beneficial_owners_street_address** | **string[]** | The list of street addresses for the beneficial owners (required for beneficial owner 1). | [optional]
**beneficial_owners_unit2** | **string[]** | The list of street address line 2 for the beneficial owners. | [optional]
**beneficial_owners_city** | **string[]** | The list of cities for the beneficial owners (required for beneficial owner 1). | [optional]
**beneficial_owners_region** | **string[]** | The list of region or states for the beneficial owners (required for beneficial owner 1). | [optional]
**beneficial_owners_postal_code** | **string[]** | The list of postal codes or zipcodes for the beneficial owners (required for beneficial owner 1). | [optional]
**beneficial_owners_date_of_birth** | **string[]** | The list of dates of birth for the beneficial owners (required for beneficial owner 1). | [optional]
**beneficial_owners_taxpayer_id** | **string[]** | The list of taxpayer identification numbers for the beneficial owners (required for beneficial owner 1). | [optional]
**beneficial_owners_phone_number** | **string[]** | The list of phone numbers for the beneficial owners (required for beneficial owner 1). | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
