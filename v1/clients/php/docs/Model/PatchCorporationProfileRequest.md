# # PatchCorporationProfileRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**us_accredited_category** | **string** | The United States accredited investor information. | [optional]
**ca_accredited_investor** | **string** | The Canadian accredited investor information. | [optional]
**name** | **string** | Corporation name. | [optional]
**country** | **string** | Corporation country. | [optional]
**street_address** | **string** | Corporation street address. | [optional]
**unit2** | **string** | Corporation street address line 2. | [optional]
**city** | **string** | Corporation city. | [optional]
**region** | **string** | Corporation region or state. | [optional]
**postal_code** | **string** | Corporation postal code or zipcode. | [optional]
**business_number** | **string** | The business number of the investor profile. | [optional]
**phone_number** | **string** | The phone number of the investor profile. | [optional]
**income** | **float** | The income of the individual investor profile | [optional]
**net_worth** | **float** | The net worth of the individual investor profile | [optional]
**reg_cf_prior_offerings_amount** | **float** | The prior offering amount of the individual investor profile | [optional]
**signing_officer_first_name** | **string** | Signing officer first name. | [optional]
**signing_officer_last_name** | **string** | Signing officer last name. | [optional]
**signing_officer_suffix** | **string** | Signing officer suffix. | [optional]
**signing_officer_country** | **string** | Signing officer country. | [optional]
**signing_officer_street_address** | **string** | Signing officer street address. | [optional]
**signing_officer_unit2** | **string** | Signing officer street address line 2. | [optional]
**signing_officer_city** | **string** | Signing officer city. | [optional]
**signing_officer_region** | **string** | Signing officer region or state. | [optional]
**signing_officer_postal_code** | **string** | Signing officer postal code or zipcode. | [optional]
**signing_officer_date_of_birth** | **string** | Signing officer date of birth. | [optional]
**signing_officer_taxpayer_id** | **string** | The taxpayer identification number of the investor profile. | [optional]
**signing_officer_phone_number** | **string** | The phone number of the signing officer (required). | [optional]
**beneficial_owners_index** | **int[]** | The index of the beneficial owner. |
**beneficial_owners__delete** | **bool[]** | If true, this entry will be cleared. | [optional]
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
