# Api.V1EntitiesInvestorProfileIndividual

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **Number** | Investor Profile id | [optional] 
**userId** | **Number** | User id | [optional] 
**email** | **String** | User email | [optional] 
**type** | **String** | Investor Profile type | [optional] 
**usAccreditedCategory** | **String** | The accredited investor information | [optional] 
**complete** | **Boolean** | To check if the profile is complete or not | [optional] 
**ownerType** | **String** | Type of the investor profile owner | [optional] 
**owner** | [**V1EntitiesInvestorProfileOwner**](V1EntitiesInvestorProfileOwner.md) |  | [optional] 
**accountHolder** | [**V1EntitiesInvestorProfileFieldsPrimaryHolder**](V1EntitiesInvestorProfileFieldsPrimaryHolder.md) |  | [optional] 



## Enum: TypeEnum


* `individual` (value: `"individual"`)

* `joint` (value: `"joint"`)

* `corporation` (value: `"corporation"`)

* `trust` (value: `"trust"`)




