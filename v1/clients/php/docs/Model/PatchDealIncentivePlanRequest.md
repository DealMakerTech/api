# # PatchDealIncentivePlanRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**active_at** | **\DateTime** | The incentive plan active date. | [optional]
**funded_by_offset** | **int** | The incentive plan funded by offset in days. | [optional]
**tiers_id** | **int[]** | The incentive plan tier id. If none, it will be created | [optional]
**tiers__delete** | **bool[]** | If true, this entry will be cleared. | [optional]
**tiers_incentive_percentage** | **float[]** | The incentive plan tier percentage. | [optional]
**tiers_end_at** | **\DateTime[]** | The incentive plan tier end date. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
