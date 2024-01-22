# Api.CreateDealSetupRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**invoicingEmail** | **String** | The invoice email address. | 
**issuerIndustry** | **String** | The industry. | [optional] [default to &#39;other&#39;]
**prohibitedIndustry** | **String** | Determine if the deal is a high risk or not. | [optional] [default to &#39;prohibited&#39;]
**offeringType** | **String** | The deal kind | [default to &#39;other&#39;]
**title** | **String** | The name of deal to setup. | 
**companyId** | **Number** | the company id. | 
**representative** | **String** | The email of the representative. | [optional] 



## Enum: IssuerIndustryEnum


* `other` (value: `"other"`)

* `beverage` (value: `"beverage"`)

* `blockchain` (value: `"blockchain"`)

* `cannabis` (value: `"cannabis"`)

* `cpc` (value: `"cpc"`)

* `gaming` (value: `"gaming"`)

* `health` (value: `"health"`)

* `industry` (value: `"industry"`)

* `mining` (value: `"mining"`)

* `real_estate` (value: `"real_estate"`)

* `retail` (value: `"retail"`)

* `tech` (value: `"tech"`)

* `psychedelics` (value: `"psychedelics"`)

* `office_of_life_sciences` (value: `"office_of_life_sciences"`)

* `office_of_energy_and_transportation` (value: `"office_of_energy_and_transportation"`)

* `office_of_real_estate_and_construction` (value: `"office_of_real_estate_and_construction"`)

* `office_of_manufacturing` (value: `"office_of_manufacturing"`)

* `office_of_technology` (value: `"office_of_technology"`)

* `office_of_trade_and_services` (value: `"office_of_trade_and_services"`)

* `office_of_finance` (value: `"office_of_finance"`)

* `office_of_international_corp_fin` (value: `"office_of_international_corp_fin"`)





## Enum: ProhibitedIndustryEnum


* `prohibited` (value: `"prohibited"`)

* `not_prohibited` (value: `"not_prohibited"`)





## Enum: OfferingTypeEnum


* `other` (value: `"other"`)

* `canadian_private_placement` (value: `"canadian_private_placement"`)

* `regulation_a_plus_offering` (value: `"regulation_a_plus_offering"`)

* `offering_memorandum` (value: `"offering_memorandum"`)

* `regulation_cf_offering` (value: `"regulation_cf_offering"`)

* `reg_d_506_c` (value: `"reg_d_506_c"`)

* `reg_d_506_b` (value: `"reg_d_506_b"`)

* `reg_s` (value: `"reg_s"`)




