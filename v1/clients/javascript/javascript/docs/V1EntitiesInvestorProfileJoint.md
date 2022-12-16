# Api.V1EntitiesInvestorProfileJoint

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **Number** | Investor Profile id | [optional] 
**userId** | **Number** | User id | [optional] 
**email** | **String** | User email | [optional] 
**type** | **String** | Investor Profile type | [optional] 
**usAccreditedCategory** | **String** | The accredited investor information | [optional] 
**complete** | **Boolean** | To check if the profile is complete or not | [optional] 
**jointType** | **String** | The kind of joint investor | [optional] 
**primaryHolder** | [**V1EntitiesInvestorProfileFieldsPrimaryHolder**](V1EntitiesInvestorProfileFieldsPrimaryHolder.md) |  | [optional] 
**jointHolder** | [**V1EntitiesInvestorProfileFieldsAccountHolder**](V1EntitiesInvestorProfileFieldsAccountHolder.md) |  | [optional] 



## Enum: TypeEnum


* `individual` (value: `"individual"`)

* `joint` (value: `"joint"`)

* `corporation` (value: `"corporation"`)

* `trust` (value: `"trust"`)




