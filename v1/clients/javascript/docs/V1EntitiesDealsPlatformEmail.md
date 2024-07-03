# Api.V1EntitiesDealsPlatformEmail

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **Number** | The platform email id. | [optional] 
**kind** | **String** | The platform email kind. | [optional] 
**enabled** | **Boolean** | Specifies if platform email is enabled. | [optional] 
**subject** | **String** | The platform email subject. | [optional] 
**lastReminder** | **Date** | The platform email last reminder. | [optional] 
**reminderNumber** | **String** | The number of reminder_type periods of platform email. | [optional] 
**reminderType** | **String** | The reminder type of platform email. | [optional] 



## Enum: KindEnum


* `global` (value: `"global"`)

* `introduction_email` (value: `"introduction_email"`)

* `manual_email` (value: `"manual_email"`)

* `funnel_start_reminder` (value: `"funnel_start_reminder"`)

* `mid_funnel_reminder` (value: `"mid_funnel_reminder"`)

* `end_of_funnel_reminder` (value: `"end_of_funnel_reminder"`)

* `payment_reminder_email` (value: `"payment_reminder_email"`)

* `payment_failure_email` (value: `"payment_failure_email"`)

* `payment_confirmation_email` (value: `"payment_confirmation_email"`)

* `document_reminder_email` (value: `"document_reminder_email"`)

* `next_steps_email` (value: `"next_steps_email"`)

* `acceptance_email` (value: `"acceptance_email"`)

* `reset_signature_or_agreement` (value: `"reset_signature_or_agreement"`)

* `refund_email` (value: `"refund_email"`)

* `access_link` (value: `"access_link"`)

* `payment_instructions` (value: `"payment_instructions"`)

* `microdeposit_email` (value: `"microdeposit_email"`)

* `closing_campaign_email` (value: `"closing_campaign_email"`)

* `closing_opt_out_email` (value: `"closing_opt_out_email"`)

* `material_change_email` (value: `"material_change_email"`)





## Enum: ReminderTypeEnum


* `day` (value: `"day"`)

* `week` (value: `"week"`)




