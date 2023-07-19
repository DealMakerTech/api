# DealMakerAPI::UploadApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**generate_url**](UploadApi.md#generate_url) | **POST** /uploads/generate_url | Create a presigned URL for Amazon S3 |


## generate_url

> <V1EntitiesPresignedUrlResult> generate_url(generate_url_request)

Create a presigned URL for Amazon S3

Create a presigned URL for uploading file to Amazon S3 bucket

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::UploadApi.new
generate_url_request = DealMakerAPI::GenerateUrlRequest.new({filename: 'filename_example'}) # GenerateUrlRequest | 

begin
  # Create a presigned URL for Amazon S3
  result = api_instance.generate_url(generate_url_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UploadApi->generate_url: #{e}"
end
```

#### Using the generate_url_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesPresignedUrlResult>, Integer, Hash)> generate_url_with_http_info(generate_url_request)

```ruby
begin
  # Create a presigned URL for Amazon S3
  data, status_code, headers = api_instance.generate_url_with_http_info(generate_url_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesPresignedUrlResult>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UploadApi->generate_url_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **generate_url_request** | [**GenerateUrlRequest**](GenerateUrlRequest.md) |  |  |

### Return type

[**V1EntitiesPresignedUrlResult**](V1EntitiesPresignedUrlResult.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

