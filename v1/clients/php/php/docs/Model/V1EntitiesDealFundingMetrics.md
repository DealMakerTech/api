# # V1EntitiesDealFundingMetrics

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount_subscribed** | **float** | The amount subscribed. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the investment amount from committed investors. Committed investors are investors with a status of &#x60;signed&#x60;&#x60;, &#x60;waiting&#x60;, or &#x60;accepted&#x60;. | [optional]
**securities_subscribed** | **int** | The number of securities that have been subscribed. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the total number of securities from committed investors. Committed investors are investors with a status of &#x60;signed&#x60;, &#x60;waiting&#x60;, or &#x60;accepted&#x60;. | [optional]
**amount_allocated** | **float** | The amount allocated. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the total allocated investment amount for investors with a status of &#x60;invited&#x60;. Allocated investment amounts are locked in and cannot be changed by the investor. | [optional]
**securities_allocated** | **int** | The number of securities that have been allocated. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the total allocated number of securities for investors with a status of &#x60;invited&#x60;. Allocated securities are locked in and cannot be changed by the investor. | [optional]
**amount_accepted** | **float** | The amount accepted. &lt;br&gt;&lt;br&gt;This value is obtained by taking the sum of the investment amount from investors with the status &#x60;accepted&#x60;. | [optional]
**securities_accepted** | **int** | The number of securities that have been accepted. &lt;br&gt;&lt;br&gt;This value is obtained by dividing the amount_accepted value by the price per security. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
