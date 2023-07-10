# DealMakerAPI

DealMakerAPI - the Ruby gem for the DealMaker API

# Introduction

Welcome to DealMaker’s Web API v1! This API is RESTful, easy to integrate with, and offers support in 2 different languages. This is the technical documentation for our API. There are tutorials and examples of integrations with our API available on our [knowledge centre](https://help.dealmaker.tech/training-centre) as well.

# Libraries

- Javascript
- Ruby

# Authentication

To authenticate, add an Authorization header to your API request that contains an access token. Before you [generate an access token](#how-to-generate-an-access-token) your must first [create an application](#create-an-application) on your portal and retrieve the your client ID and secret

## Create an Application

DealMaker’s Web API v1 supports the use of OAuth applications. Applications can be generated in your [account](https://app.dealmaker.tech/developer/applications).

To create an API Application, click on your user name in the top right corner to open a dropdown menu, and select \"Integrations\". Under the API settings tab, click the `Create New Application` button

![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-1.png)

Name your application and assign the level of permissions for this application

![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-2.png)

Once your application is created, save in a secure space your client ID and secret.

**WARNING**: The secret key will not be visible after you click the close button

![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-3.png)

From the developer tab, you will be able to view and manage all the available applications

![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-4.png)

Each Application consists of a client id, secret and set of scopes. The scopes define what resources you want to have access to. The client ID and secret are used to generate an access token. You will need to create an application to use API endpoints.

## How to generate an access token

After creating an application, you must make a call to obtain a bearer token using the Generate an OAuth token operation. This operation requires the following parameters:

`token endpoint` - https://app.dealmaker.tech/oauth/token

`grant_type` - must be set to `client_credentials`

`client_id` - the Client ID displayed when you created the OAuth application in the previous step

`client_secret` - the Client Secret displayed when you created the OAuth application in the previous step

`scope` - the scope is established when you created the OAuth application in the previous step

Note: The Generate an OAuth token response specifies how long the bearer token is valid for. You should reuse the bearer token until it is expired. When the token is expired, call Generate an OAuth token again to generate a new one.

To use the access token, you must set a plain text header named `Authorization` with the contents of the header being “Bearer XXX” where XXX is your generated access token.

### Example

#### Postman

Here's an example on how to generate the access token with Postman, where `{{CLIENT_ID}}` and `{{CLIENT_SECRET}}` are the values generated after following the steps on [Create an Application](#create-an-application)

![Get access token postman example](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/token-postman.png)

# Status Codes

## Content-Type Header

All responses are returned in JSON format. We specify this by sending the Content-Type header.

## Status Codes

Below is a table containing descriptions of the various status codes we currently support against various resources.

Sometimes your API call will generate an error. Here you will find additional information about what to expect if you don’t format your request properly, or we fail to properly process your request.

| Status Code | Description |
| ----------- | ----------- |
| `200`       | Success     |
| `403`       | Forbidden   |
| `404`       | Not found   |

# Pagination

Pagination is used to divide large responses is smaller portions (pages). By default, all endpoints return a maximum of 25 records per page. You can change the number of records on a per request basis by passing a `per_page` parameter in the request header parameters. The largest supported `per_page` parameter is 100.

When the response exceeds the `per_page` parameter, you can paginate through the records by increasing the `offset` parameter. Example: `offset=25` will return 25 records starting from 26th record. You may also paginate using the `page` parameter to indicate the page number you would like to show on the response.

Please review the table below for the input parameters

## Inputs

| Parameter  | Description                                                                     |
| ---------- | ------------------------------------------------------------------------------- |
| `per_page` | Amount of records included on each page (Default is 25)                         |
| `page`     | Page number                                                                     |
| `offset`   | Amount of records offset on the API request where 0 represents the first record |

## Response Headers

| Response Header | Description                                  |
| --------------- | -------------------------------------------- |
| `X-Total`       | Total number of records of response          |
| `X-Total-Pages` | Total number of pages of response            |
| `X-Per-Page`    | Total number of records per page of response |
| `X-Page`        | Number of current page                       |
| `X-Next-Page`   | Number of next page                          |
| `X-Prev-Page`   | Number of previous page                      |
| `X-Offset`      | Total number of records offset               |

# Search and Filtering (The q parameter)

The q optional parameter accepts a string as input and allows you to filter the request based on that string. Please note that search strings must be encoded according to ASCII. For example, \"john+investor&#64;dealmaker.tech\" should be passed as “john%2Binvestor%40dealmaker.tech”. There are two main ways to filter with it.

## Keyword filtering

Some keywords allow you to filter investors based on a specific “scope” of the investors, for example using the string “Invited” will filter all investors with the status invited, and the keyword “Has attachments” will filter investors with attachments.

Here’s a list of possible keywords and the “scope” each one of the keywords filters by:

| Keywords                                       | Scope                                                                       | Decoded Example                                                      | Encoded Example                                                                          |
| ---------------------------------------------- | --------------------------------------------------------------------------- | -------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- |
| Signed on \\(date range\\)                       | Investors who signed in the provided date range                             | Signed on (date range) [2020-07-01:2020-07-31]                       | `Signed%20on%20%28date%20range%29%20%5B2020-07-01%3A2020-07-31%5D`                       |
| Enabled for countersignature on \\(date range\\) | Investors who were enabled for counter signature in the provided date range | Enabled for countersignature on (date range) [2022-05-24:2022-05-25] | `Enabled%20for%20countersignature%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D` |
| Accepted on \\(date range\\)                     | Investors accepted in the provided date rage                                | Accepted on (date range) [2022-05-24:2022-05-25]                     | `Accepted%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D`                         |
| Offline                                        | Investors added to the deal offline                                         | Offline                                                              | `Offline`                                                                                |
| Online                                         | Investors added to the deal online                                          | Online                                                               | `Online`                                                                                 |
| Signed                                         | Investors who signed their agreement                                        | Signed                                                               | `Signed`                                                                                 |
| Waiting for countersignature                   | Investors who have signed and are waiting for counter signature             | Waiting for countersignature                                         | `Waiting%20for%20countersignature`                                                       |
| Invited                                        | Investors on the Invited Status                                             | Invited                                                              | `Invited`                                                                                |
| Accepted                                       | Investors in the Accepted Status                                            | Accepted                                                             | `Accepted`                                                                               |
| Questionnaire in progress                      | All Investors who have not finished completing the questionnaire            | Questionnaire in progress                                            | `Questionnaire%20in%20progress`                                                          |
| Has attachments                                | All Investors with attachments                                              | Has attachments                                                      | `Has%20attachments`                                                                      |
| Has notes                                      | All Investors with notes                                                    | Has notes                                                            | `Has%20notes`                                                                            |
| Waiting for co-signature                       | Investors who have signed and are waiting for co-signature                  | Waiting for co-signature                                             | `Waiting%20for%20co-signature`                                                           |
| Background Check Approved                      | Investors with approved background check                                    | Background Check Approved                                            | `Background%20Check%20Approved`                                                          |
| Document Review Pending                        | Investors with pending review                                               | Document Review Pending                                              | `Document%20Review%20Pending`                                                            |
| Document Upload Pending                        | Investors with pending documents to upload                                  | Document Upload Pending                                              | `Document%20Upload%20Pending`                                                            |
| Required adjudicator review                    | Investors who are required to be review by the adjudicator                  | Required adjudicator review                                          | `Required%20adjudicator%20review`                                                        |

---

**NOTE**

Filtering keywords are case sensitive and need to be encoded

---

## Search String

Any value for the parameter which does not match one of the keywords listed above, will use fields like `first name`, `last name`, `email`, `tags` to search for the investor.

For example, if you search “Robert”, because this does not match one of the keywords listed above, it will then return any investors who have the string “Robert” in their name, email, or tags fields.

# Versioning

The latest version is v1.

The version can be updated on the `Accept` header, just set the version as stated on the following example:

```

Accept:application/vnd.dealmaker-v1+json

```

| Version | Accept Header                       |
| ------- | ----------------------------------- |
| `v1`    | application/vnd.dealmaker-`v1`+json |

# SDK’s

For instruction on installing SDKs, please view the following links

- [Javascript](https://github.com/DealMakerTech/api/tree/main/v1/clients/javascript)
- [Ruby](https://github.com/DealMakerTech/api/tree/main/v1/clients/ruby)

# Webhooks

Our webhooks functionality allows clients to automatically receive updates on a deal's investor data.

Some of the data that the webhooks include:

- Investor Name
- Date created
- Email
- Phone
- Allocation
- Attachments
- Accredited investor status
- Accredited investor category
- State (Draft, Invited, Signed, Accepted, Waiting, Inactive)

Via webhooks clients can subscribe to the following events as they happen on Dealmaker:

- Investor is created
- Investor details are updated (any of the investor details above change or are updated)
- Investor has signed their agreement
- Invertor fully funded their investment
- Investor has been accepted
- Investor is deleted

A URL supplied by the client will receive all the events with the information as part of the payload. Clients are able to add and update the URL within DealMaker.

## Configuration

For a comprehensive guide on how to configure Webhooks please visit our support article: [Configuring Webhooks on DealMaker – DealMaker Support](https://help.dealmaker.tech/configuring-webhooks-on-dealmaker).

As a developer user on DealMaker, you are able to configure webhooks by following the steps below:

1. Sign into Dealmaker
2. Go to **“Your profile”** in the top right corner
3. Access an **“Integrations”** configuration via the left menu
4. The developer configures webhooks by including:
   - The HTTPS URL where the request will be sent
   - Optionally, a security token that we would use to build a SHA1 hash that would be included in the request headers. The name of the header is `X-DealMaker-Signature`. If the secret is not specified, the hash won’t be included in the headers.
   - The Deal(s) to include in the webhook subscription
   - An email address that will be used to notify about errors.
5. The developers can disable webhooks temporarily if needed

## Specification

### Events

The initial set of events will be related to the investor. The events are:

1. `investor.created`

   - Triggers every time a new investor is added to a deal

2. `investor.updated`

   - Triggers on updates to any of the following fields:
     - Status
     - Name
     - Email - (this is a user field so we trigger event for all investors with webhook subscription)
     - Allocated Amount
     - Investment Amount
     - Accredited investor fields
     - Adding or removing attachments
     - Tags
   - When the investor status is signed, the payload also includes a link to the signed document; the link expires after 30 minutes
  
3. `investor.signed`

   - Triggers when the investor signs their subscription agreement (terms and conditions)
     - When this happens the investor.state becomes `signed`
   - This event includes the same fields as the `investor.updated` event

4. `investor.funded`

   - Triggers when the investor becomes fully funded
     - This happens when the investor.funded_state becomes `funded`
   - This event includes the same fields as the `investor.updated` event

5. `investor.accepted`

   - Triggers when the investor is countersigned
     - When this happens the investor.state becomes `accepted`
   - This event includes the same fields as the `investor.updated` event

6.  `investor.deleted`

   - Triggers when the investor is removed from the deal
   - The investor key of the payload only includes investor ID
   - The deal is not included in the payload. Due to our implementation it’s impossible to retrieve the deal the investor was part of

### Requests

- The request is a `POST`
- The payload’s `content-type` is `application/json`
- Only `2XX` responses are considered successful. In the event of a different response, we consider it failed and queue the event for retry
- We retry the request five times, after the initial attempt. Doubling the waiting time between intervals with each try. The first retry happens after 30 seconds, then 60 seconds, 2 mins, 4 minutes, and 8 minutes. This timing scheme gives the receiver about 1 hour if all the requests fail
- If an event fails all the attempts to be delivered, we send an email to the address that the user configured

### Payload

#### Common Properties

There will be some properties that are common to all the events on the system.

| Key               | Type   | Description                                                                              |
| ----------------- | ------ | --------------------------------------------------------------------------------------   |
| event             | String | The event that triggered the call                                                        |
| event_id          | String | A unique identifier for the event                                                        |
| deal<sup>\\*</sup> | Object | The deal in which the event occurred. please see below for an example on the deal object<sup>\\*\\*</sup> |

<sup>\\*</sup>This field is not included when deleting a resource

<sup>\\*\\*</sup> Sample Deal Object in the webhook payload

```json
\"deal\": {
        \"id\": 0,
        \"title\": \"string\",
        \"created_at\": \"2022-12-06T18:14:44.000Z\",
        \"updated_at\": \"2022-12-08T12:46:48.000Z\",
        \"state\": \"string\",
        \"currency\": \"string\",
        \"security_type\": \"string\",
        \"price_per_security\": 0.00,
        \"deal_type\": \"string\",
        \"minimum_investment\": 0,
        \"maximum_investment\": 0,
        \"issuer\": {
            \"id\": 0,
            \"name\": \"string\"
        },
        \"enterprise\": {
            \"id\": 0,
            \"name\": \"string\"
        }
    }
```

#### Common Properties (investor scope)

By design, we have incorporated on the webhooks payload the same investor-related fields included in the Investor model, for reference on the included fields, their types and values please click [here](https://docs.dealmaker.tech/#tag/investor_model). This will allow you to get all the necessary information you need about a particular investor without having to call the Get Investor by ID endpoint.                                                           |
#### Investor State

Here is a brief description of each investor state:

- **Draft:** the investor is added to the platform but hasn't been invited yet and cannot access the portal
- **Invited:** the investor was added to the platform but hasn’t completed the questionnaire
- **Signed:** the investor signed the document (needs approval from Lawyer or Reviewer before countersignature)
- **Waiting:** the investor was approved for countersignature by any of the Lawyers or Reviewers in the deal
- **Accepted:** the investor's agreement was countersigned by the Signatory
- **Inactive** the investor is no longer eligible to participate in the offering. This may be because their warrant expired, they requested a refund, or they opted out of the offering

#### Update Delay

Given the high number of updates our platform performs on any investor, we’ve added a cool down period on update events that allows us to “group” updates and trigger only one every minute. In consequence, update events will be delivered 1 minute after the initial request was made and will include the latest version of the investor data at delivery time.


This SDK is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: 1.75.0
- Package version: 0.82.1
- Build package: org.openapitools.codegen.languages.RubyClientCodegen

## Installation

### Build a gem

To build the Ruby code into a gem:

```shell
gem build DealMakerAPI.gemspec
```

Then either install the gem locally:

```shell
gem install ./DealMakerAPI-0.82.1.gem
```

(for development, run `gem install --dev ./DealMakerAPI-0.82.1.gem` to install the development dependencies)

or publish the gem to a gem hosting service, e.g. [RubyGems](https://rubygems.org/).

Finally add this to the Gemfile:

    gem 'DealMakerAPI', '~> 0.82.1'

### Install from Git

If the Ruby gem is hosted at a git repository: https://github.com/GIT_USER_ID/GIT_REPO_ID, then add the following in the Gemfile:

    gem 'DealMakerAPI', :git => 'https://github.com/GIT_USER_ID/GIT_REPO_ID.git'

### Include the Ruby code directly

Include the Ruby code directly using `-I` as follows:

```shell
ruby -Ilib script.rb
```

## Getting Started

Please follow the [installation](#installation) procedure and then run the following code:

```ruby
# Load the gem
require 'DealMakerAPI'

# Setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CompanyApi.new
id = 56 # Integer | The company id
create_bulk_upload_request = DealMakerAPI::CreateBulkUploadRequest.new({file: File.new('/path/to/some/file'), file_identifier: 'file_identifier_example', document_type: 'document_type_example'}) # CreateBulkUploadRequest | 

begin
  #Create bulk upload record
  result = api_instance.create_bulk_upload(id, create_bulk_upload_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Exception when calling CompanyApi->create_bulk_upload: #{e}"
end

```

## Documentation for API Endpoints

All URIs are relative to *http://api.dealmaker.tech*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DealMakerAPI::CompanyApi* | [**create_bulk_upload**](docs/CompanyApi.md#create_bulk_upload) | **POST** /companies/{id}/documents/bulk_uploads | Create bulk upload record
*DealMakerAPI::CompanyApi* | [**create_company**](docs/CompanyApi.md#create_company) | **POST** /companies | Create new company
*DealMakerAPI::CompanyApi* | [**get_companies**](docs/CompanyApi.md#get_companies) | **GET** /companies | Get list of Companies
*DealMakerAPI::CompanyApi* | [**get_company**](docs/CompanyApi.md#get_company) | **GET** /companies/{id} | Get a Company
*DealMakerAPI::DealApi* | [**get_analytics_dashboard_info**](docs/DealApi.md#get_analytics_dashboard_info) | **GET** /deals/{id}/analytics_dashboard_info | Get Analytics Dashboard Info
*DealMakerAPI::DealApi* | [**get_deal**](docs/DealApi.md#get_deal) | **GET** /deals/{id} | Get deal by Deal ID
*DealMakerAPI::DealApi* | [**list_deals**](docs/DealApi.md#list_deals) | **GET** /deals | List available deals
*DealMakerAPI::DealSetupApi* | [**create_deal_setup**](docs/DealSetupApi.md#create_deal_setup) | **POST** /deal_setups | Create deal setup
*DealMakerAPI::DefaultApi* | [**get_deals_id_investors_investor_id_payments_express_wire_instructions**](docs/DefaultApi.md#get_deals_id_investors_investor_id_payments_express_wire_instructions) | **GET** /deals/{id}/investors/{investor_id}/payments/express_wire/instructions | Displays the express wire instructions for an investor on a deal
*DealMakerAPI::DefaultApi* | [**get_deals_id_investors_payments_express_wire_instructions**](docs/DefaultApi.md#get_deals_id_investors_payments_express_wire_instructions) | **GET** /deals/{id}/investors/payments/express_wire/instructions | Displays the express wire instructions for all the investors on a deal
*DealMakerAPI::DefaultApi* | [**get_webhooks**](docs/DefaultApi.md#get_webhooks) | **GET** /webhooks | Returns a list of webhook subscription which is associated to the user
*DealMakerAPI::DefaultApi* | [**get_webhooks_deal_id**](docs/DefaultApi.md#get_webhooks_deal_id) | **GET** /webhooks/deal/{id} | Finds a deal using the id
*DealMakerAPI::DefaultApi* | [**get_webhooks_deals_search**](docs/DefaultApi.md#get_webhooks_deals_search) | **GET** /webhooks/deals/search | Searches for deals for a given user
*DealMakerAPI::DefaultApi* | [**get_webhooks_security_token**](docs/DefaultApi.md#get_webhooks_security_token) | **GET** /webhooks/security_token | Creates a new security token for webhook subscription
*DealMakerAPI::DefaultApi* | [**post_webhooks**](docs/DefaultApi.md#post_webhooks) | **POST** /webhooks | Creates a webhook subscription which is associated to the user
*DealMakerAPI::DefaultApi* | [**put_webhooks_id**](docs/DefaultApi.md#put_webhooks_id) | **PUT** /webhooks/{id} | Updates webhook subscription and webhooks subcription deals
*DealMakerAPI::InvestorApi* | [**add_document**](docs/InvestorApi.md#add_document) | **POST** /deals/{id}/investors/{investor_id}/add_document | Add document for deal investor
*DealMakerAPI::InvestorApi* | [**create_investor**](docs/InvestorApi.md#create_investor) | **POST** /deals/{id}/investors | Create a deal investor
*DealMakerAPI::InvestorApi* | [**delete_document**](docs/InvestorApi.md#delete_document) | **DELETE** /deals/{id}/investors/{investor_id}/delete_document/{document_id} | Delete document for deal investor
*DealMakerAPI::InvestorApi* | [**edit_investor_tags**](docs/InvestorApi.md#edit_investor_tags) | **POST** /deals/{id}/investors/{investor_id}/edit_tags | Append or replace tag(s) for a specific investor
*DealMakerAPI::InvestorApi* | [**get_investor**](docs/InvestorApi.md#get_investor) | **GET** /deals/{id}/investors/{investor_id} | Get a deal investor by id
*DealMakerAPI::InvestorApi* | [**get_investor_otp_link**](docs/InvestorApi.md#get_investor_otp_link) | **GET** /deals/{id}/investors/{investor_id}/otp_access_link | Get OTP access link for deal investor
*DealMakerAPI::InvestorApi* | [**list_investors**](docs/InvestorApi.md#list_investors) | **GET** /deals/{id}/investors | List deal investors
*DealMakerAPI::InvestorApi* | [**patch_investor**](docs/InvestorApi.md#patch_investor) | **PATCH** /deals/{id}/investors/{investor_id} | Patch a deal investor
*DealMakerAPI::InvestorApi* | [**update_investor**](docs/InvestorApi.md#update_investor) | **PUT** /deals/{id}/investors/{investor_id} | Update a deal investor
*DealMakerAPI::InvestorProfileApi* | [**create_corporation_profile**](docs/InvestorProfileApi.md#create_corporation_profile) | **POST** /investor_profiles/corporations | Create new corporation investor profile.
*DealMakerAPI::InvestorProfileApi* | [**create_individual_profile**](docs/InvestorProfileApi.md#create_individual_profile) | **POST** /investor_profiles/individuals | Create new individual investor profile
*DealMakerAPI::InvestorProfileApi* | [**create_joint_profile**](docs/InvestorProfileApi.md#create_joint_profile) | **POST** /investor_profiles/joints | Create new joint investor profile
*DealMakerAPI::InvestorProfileApi* | [**create_trust_profile**](docs/InvestorProfileApi.md#create_trust_profile) | **POST** /investor_profiles/trusts | Create new trust investor profile.
*DealMakerAPI::InvestorProfileApi* | [**get_deal_investor_profiles**](docs/InvestorProfileApi.md#get_deal_investor_profiles) | **GET** /investor_profiles/{deal_id} | Get list of InvestorProfiles for a specific deal
*DealMakerAPI::InvestorProfileApi* | [**get_investor_profile**](docs/InvestorProfileApi.md#get_investor_profile) | **GET** /investor_profiles/profile/{id} | Get an investor profile by id
*DealMakerAPI::InvestorProfileApi* | [**get_investor_profiles**](docs/InvestorProfileApi.md#get_investor_profiles) | **GET** /investor_profiles | Get list of InvestorProfiles
*DealMakerAPI::InvestorProfileApi* | [**patch_corporation_profile**](docs/InvestorProfileApi.md#patch_corporation_profile) | **PATCH** /investor_profiles/corporations/{investor_profile_id} | Patch a corporation investor profile
*DealMakerAPI::InvestorProfileApi* | [**patch_individual_profile**](docs/InvestorProfileApi.md#patch_individual_profile) | **PATCH** /investor_profiles/individuals/{investor_profile_id} | Patch an individual investor profile.
*DealMakerAPI::InvestorProfileApi* | [**patch_joint_profile**](docs/InvestorProfileApi.md#patch_joint_profile) | **PATCH** /investor_profiles/joints/{investor_profile_id} | Patch a joint investor profile
*DealMakerAPI::InvestorProfileApi* | [**patch_trust_profile**](docs/InvestorProfileApi.md#patch_trust_profile) | **PATCH** /investor_profiles/trusts/{investor_profile_id} | Patch a trust investor profile
*DealMakerAPI::ShareholderApi* | [**get_shareholders**](docs/ShareholderApi.md#get_shareholders) | **GET** /companies/{id}/shareholders | Get a company shareholders list
*DealMakerAPI::ShareholderApi* | [**get_shareholders_tags**](docs/ShareholderApi.md#get_shareholders_tags) | **GET** /companies/{id}/shareholders/tags | Get a company shareholders list grouped by tags
*DealMakerAPI::UploadApi* | [**generate_url**](docs/UploadApi.md#generate_url) | **POST** /uploads/generate_url | Create a presigned URL for Amazon S3


## Documentation for Models

 - [DealMakerAPI::AddDocumentRequest](docs/AddDocumentRequest.md)
 - [DealMakerAPI::CreateBulkUploadRequest](docs/CreateBulkUploadRequest.md)
 - [DealMakerAPI::CreateCompanyRequest](docs/CreateCompanyRequest.md)
 - [DealMakerAPI::CreateCorporationProfileRequest](docs/CreateCorporationProfileRequest.md)
 - [DealMakerAPI::CreateDealSetupRequest](docs/CreateDealSetupRequest.md)
 - [DealMakerAPI::CreateIndividualProfileRequest](docs/CreateIndividualProfileRequest.md)
 - [DealMakerAPI::CreateInvestorRequest](docs/CreateInvestorRequest.md)
 - [DealMakerAPI::CreateJointProfileRequest](docs/CreateJointProfileRequest.md)
 - [DealMakerAPI::CreateTrustProfileRequest](docs/CreateTrustProfileRequest.md)
 - [DealMakerAPI::EditInvestorTagsRequest](docs/EditInvestorTagsRequest.md)
 - [DealMakerAPI::GenerateUrlRequest](docs/GenerateUrlRequest.md)
 - [DealMakerAPI::PatchCorporationProfileRequest](docs/PatchCorporationProfileRequest.md)
 - [DealMakerAPI::PatchIndividualProfileRequest](docs/PatchIndividualProfileRequest.md)
 - [DealMakerAPI::PatchInvestorRequest](docs/PatchInvestorRequest.md)
 - [DealMakerAPI::PatchJointProfileRequest](docs/PatchJointProfileRequest.md)
 - [DealMakerAPI::PatchTrustProfileRequest](docs/PatchTrustProfileRequest.md)
 - [DealMakerAPI::PostWebhooksRequest](docs/PostWebhooksRequest.md)
 - [DealMakerAPI::PutWebhooksIdRequest](docs/PutWebhooksIdRequest.md)
 - [DealMakerAPI::UpdateInvestorRequest](docs/UpdateInvestorRequest.md)
 - [DealMakerAPI::V1EntitiesAddress](docs/V1EntitiesAddress.md)
 - [DealMakerAPI::V1EntitiesAddresses](docs/V1EntitiesAddresses.md)
 - [DealMakerAPI::V1EntitiesAttachment](docs/V1EntitiesAttachment.md)
 - [DealMakerAPI::V1EntitiesBackgroundCheckSearch](docs/V1EntitiesBackgroundCheckSearch.md)
 - [DealMakerAPI::V1EntitiesBulkUpload](docs/V1EntitiesBulkUpload.md)
 - [DealMakerAPI::V1EntitiesCompany](docs/V1EntitiesCompany.md)
 - [DealMakerAPI::V1EntitiesCompanyDeal](docs/V1EntitiesCompanyDeal.md)
 - [DealMakerAPI::V1EntitiesCompanyDeals](docs/V1EntitiesCompanyDeals.md)
 - [DealMakerAPI::V1EntitiesDeal](docs/V1EntitiesDeal.md)
 - [DealMakerAPI::V1EntitiesDealEnterprise](docs/V1EntitiesDealEnterprise.md)
 - [DealMakerAPI::V1EntitiesDealFundingMetrics](docs/V1EntitiesDealFundingMetrics.md)
 - [DealMakerAPI::V1EntitiesDealInvestorMetrics](docs/V1EntitiesDealInvestorMetrics.md)
 - [DealMakerAPI::V1EntitiesDealIssuer](docs/V1EntitiesDealIssuer.md)
 - [DealMakerAPI::V1EntitiesDealSetup](docs/V1EntitiesDealSetup.md)
 - [DealMakerAPI::V1EntitiesDealSetupUser](docs/V1EntitiesDealSetupUser.md)
 - [DealMakerAPI::V1EntitiesDeals](docs/V1EntitiesDeals.md)
 - [DealMakerAPI::V1EntitiesExpressWireInstruction](docs/V1EntitiesExpressWireInstruction.md)
 - [DealMakerAPI::V1EntitiesExpressWireInstructions](docs/V1EntitiesExpressWireInstructions.md)
 - [DealMakerAPI::V1EntitiesInvestor](docs/V1EntitiesInvestor.md)
 - [DealMakerAPI::V1EntitiesInvestorOtpAccessLink](docs/V1EntitiesInvestorOtpAccessLink.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileAddress](docs/V1EntitiesInvestorProfileAddress.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileCorporation](docs/V1EntitiesInvestorProfileCorporation.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsAccountHolder](docs/V1EntitiesInvestorProfileFieldsAccountHolder.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsCorporation](docs/V1EntitiesInvestorProfileFieldsCorporation.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsPrimaryHolder](docs/V1EntitiesInvestorProfileFieldsPrimaryHolder.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsTrust](docs/V1EntitiesInvestorProfileFieldsTrust.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileIndividual](docs/V1EntitiesInvestorProfileIndividual.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileItem](docs/V1EntitiesInvestorProfileItem.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileJoint](docs/V1EntitiesInvestorProfileJoint.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileOwner](docs/V1EntitiesInvestorProfileOwner.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileTrust](docs/V1EntitiesInvestorProfileTrust.md)
 - [DealMakerAPI::V1EntitiesInvestorProfiles](docs/V1EntitiesInvestorProfiles.md)
 - [DealMakerAPI::V1EntitiesInvestorUser](docs/V1EntitiesInvestorUser.md)
 - [DealMakerAPI::V1EntitiesInvestors](docs/V1EntitiesInvestors.md)
 - [DealMakerAPI::V1EntitiesShareholder](docs/V1EntitiesShareholder.md)
 - [DealMakerAPI::V1EntitiesShareholders](docs/V1EntitiesShareholders.md)
 - [DealMakerAPI::V1EntitiesShareholdersTags](docs/V1EntitiesShareholdersTags.md)
 - [DealMakerAPI::V1EntitiesSubscriptionAgreement](docs/V1EntitiesSubscriptionAgreement.md)
 - [DealMakerAPI::V1EntitiesWebhooksDeal](docs/V1EntitiesWebhooksDeal.md)
 - [DealMakerAPI::V1EntitiesWebhooksSecurityToken](docs/V1EntitiesWebhooksSecurityToken.md)
 - [DealMakerAPI::V1EntitiesWebhooksSubscription](docs/V1EntitiesWebhooksSubscription.md)
 - [DealMakerAPI::V1EntitiesWebhooksSubscriptionDeal](docs/V1EntitiesWebhooksSubscriptionDeal.md)
 - [DealMakerAPI::V1EntitiesWebhooksSubscriptionDeals](docs/V1EntitiesWebhooksSubscriptionDeals.md)


## Documentation for Authorization

Endpoints do not require authorization.

