# @DealmakertechApi.V1EntitiesDeal

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **Number** | The deal&#39;s unique id. | [optional] 
**title** | **String** | The deal title. | [optional] 
**state** | **String** | The deal state. | [optional] 
**currency** | **String** | The primary currency associated with the deal. | [optional] 
**securityType** | **String** | The deal security type. | [optional] 
**pricePerSecurity** | **Number** | The deal price per security. | [optional] 
**minimumInvestment** | **Number** | The minimum investment amount, in cents. | [optional] 
**maximumInvestment** | **Number** | The maximum investment amount, in cents. | [optional] 
**issuer** | [**V1EntitiesDealIssuer**](V1EntitiesDealIssuer.md) |  | [optional] 
**enterprise** | [**V1EntitiesDealEnterprise**](V1EntitiesDealEnterprise.md) |  | [optional] 
**dealType** | **String** | The deal type. | [optional] 
**investors** | [**V1EntitiesDealInvestorMetrics**](V1EntitiesDealInvestorMetrics.md) |  | [optional] 
**funding** | [**V1EntitiesDealFundingMetrics**](V1EntitiesDealFundingMetrics.md) |  | [optional] 



## Enum: StateEnum


* `draft` (value: `"draft"`)

* `close` (value: `"close"`)

* `active` (value: `"active"`)

* `amending` (value: `"amending"`)





## Enum: DealTypeEnum


* `other_or_unknown` (value: `"other_or_unknown"`)

* `dm_plus` (value: `"dm_plus"`)

* `dm_basic` (value: `"dm_basic"`)

* `mini_deal` (value: `"mini_deal"`)

* `reg_cf` (value: `"reg_cf"`)

* `reg_a` (value: `"reg_a"`)

* `warrants` (value: `"warrants"`)

* `offering_memorandum` (value: `"offering_memorandum"`)

* `reg_d_506_c` (value: `"reg_d_506_c"`)

* `reg_d_506_b` (value: `"reg_d_506_b"`)




