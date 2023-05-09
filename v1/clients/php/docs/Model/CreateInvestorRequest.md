# # CreateInvestorRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**email** | **string** | The investor email address. |
**investor_profile_id** | **int** | The Investor Profile id. | [optional]
**tags** | **string[]** |  | [optional]
**first_name** | **string** | The first name of the investor. | [optional]
**last_name** | **string** | The last name of the investor. | [optional]
**phone_number** | **string** | The phone number of the investor. | [optional]
**message** | **string** | The reminder email text of the investor. | [optional]
**warrant_expiry_date** | **\DateTime** | The warrant expiry date of the investor. | [optional]
**warrant_certificate_number** | **int** | The certificate number of the investor. | [optional]
**allocated_amount** | **float** | The allocation amount of the investor. | [optional]
**investment_value** | **float** | The investment value of the investor. | [optional]
**allocation_unit** | **string** | The allocation unit of the investor. | [optional] [default to 'securities']
**state** | **string** | The initial state of the investor. | [optional] [default to 'invited']

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
