# Dealmakerapi.V1EntitiesDealFundingMetrics

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amountSubscribed** | **Number** | The amount subscribed. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the investment amount from committed investors. Committed investors are investors with a status of &#x60;signed&#x60;&#x60;, &#x60;waiting&#x60;, or &#x60;accepted&#x60;. | [optional] 
**securitiesSubscribed** | **Number** | The number of securities that have been subscribed. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the total number of securities from committed investors. Committed investors are investors with a status of &#x60;signed&#x60;, &#x60;waiting&#x60;, or &#x60;accepted&#x60;. | [optional] 
**amountAllocated** | **Number** | The amount allocated. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the total allocated investment amount for investors with a status of &#x60;invited&#x60;. Allocated investment amounts are locked in and cannot be changed by the investor. | [optional] 
**securitiesAllocated** | **Number** | The number of securities that have been allocated. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the total allocated number of securities for investors with a status of &#x60;invited&#x60;. Allocated securities are locked in and cannot be changed by the investor. | [optional] 
**amountAccepted** | **Number** | The amount accepted. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the investment amount from investors with the status &#x60;accepted&#x60;. | [optional] 
**securitiesAccepted** | **Number** | The number of securities that have been accepted. &lt;br&gt;&lt;br&gt;This value is obtained by dividing the amount_accepted value by the price per security. | [optional] 


