# DealMakerAPI::V1EntitiesExpressWireInstruction

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_id** | **String** | The id of the investor | [optional] |
| **bank_name** | **String** | Name of the bank for the payment | [optional] |
| **bank_address** | **String** | Address of the bank for the payment | [optional] |
| **beneficiary_address** | **String** | Address of the beneficiary for the payment | [optional] |
| **beneficiary_name** | **String** | Name of the beneficiary for the payment | [optional] |
| **account_number** | **String** | Account number for the payment | [optional] |
| **aba_routing** | **String** | Aba routing number for the payment | [optional] |
| **swift_code** | **String** | Swift code for the payment | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesExpressWireInstruction.new(
  investor_id: null,
  bank_name: null,
  bank_address: null,
  beneficiary_address: null,
  beneficiary_name: null,
  account_number: null,
  aba_routing: null,
  swift_code: null
)
```

