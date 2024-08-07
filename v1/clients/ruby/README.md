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
- Package version: 0.107.5
- Generator version: 7.8.0-SNAPSHOT
- Build package: org.openapitools.codegen.languages.RubyClientCodegen

## Installation

### Build a gem

To build the Ruby code into a gem:

```shell
gem build DealMakerAPI.gemspec
```

Then either install the gem locally:

```shell
gem install ./DealMakerAPI-0.107.5.gem
```

(for development, run `gem install --dev ./DealMakerAPI-0.107.5.gem` to install the development dependencies)

or publish the gem to a gem hosting service, e.g. [RubyGems](https://rubygems.org/).

Finally add this to the Gemfile:

    gem 'DealMakerAPI', '~> 0.107.5'

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

api_instance = DealMakerAPI::CampaignApi.new
id = 56 # Integer | 

begin
  #Gets a TTW campaign for a given company
  result = api_instance.get_ttw_campaign(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Exception when calling CampaignApi->get_ttw_campaign: #{e}"
end

```

## Documentation for API Endpoints

All URIs are relative to *http://api.dealmaker.tech*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DealMakerAPI::CampaignApi* | [**get_ttw_campaign**](docs/CampaignApi.md#get_ttw_campaign) | **GET** /ttw/campaigns/{id} | Gets a TTW campaign for a given company
*DealMakerAPI::CampaignApi* | [**get_ttw_campaigns**](docs/CampaignApi.md#get_ttw_campaigns) | **GET** /ttw/companies/{company_id}/campaigns | Gets a list TTW campaigns for a given company
*DealMakerAPI::CampaignApi* | [**get_user_ttw_reservation**](docs/CampaignApi.md#get_user_ttw_reservation) | **GET** /ttw/campaign/{id}/reservation/{reservation_uuid} | Gets User ID for a TTW reservation
*DealMakerAPI::CompanyApi* | [**create_bulk_upload**](docs/CompanyApi.md#create_bulk_upload) | **POST** /companies/{id}/documents/bulk_uploads | Create bulk upload record
*DealMakerAPI::CompanyApi* | [**create_bulk_upload_detail**](docs/CompanyApi.md#create_bulk_upload_detail) | **POST** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details | Create a BulkUploadDetail class record
*DealMakerAPI::CompanyApi* | [**create_company**](docs/CompanyApi.md#create_company) | **POST** /companies | Create new company
*DealMakerAPI::CompanyApi* | [**create_email_template**](docs/CompanyApi.md#create_email_template) | **POST** /companies/{id}/news_releases/email_templates | Creates an email template
*DealMakerAPI::CompanyApi* | [**create_members_bulk_upload**](docs/CompanyApi.md#create_members_bulk_upload) | **POST** /companies/{id}/members/bulk_uploads | Create bulk upload record
*DealMakerAPI::CompanyApi* | [**create_shareholder_action**](docs/CompanyApi.md#create_shareholder_action) | **POST** /companies/{company_id}/shareholders/{shareholder_id}/actions | Create a shareholder action
*DealMakerAPI::CompanyApi* | [**delete_email_template**](docs/CompanyApi.md#delete_email_template) | **DELETE** /companies/{id}/news_releases/email_templates/{template_id} | Deletes an email template
*DealMakerAPI::CompanyApi* | [**get_bulk_upload**](docs/CompanyApi.md#get_bulk_upload) | **GET** /companies/{id}/documents/bulk_uploads/{bulk_upload_id} | Return a given bulk upload by id
*DealMakerAPI::CompanyApi* | [**get_bulk_upload_details_errors**](docs/CompanyApi.md#get_bulk_upload_details_errors) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/errors | Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc
*DealMakerAPI::CompanyApi* | [**get_bulk_uploads**](docs/CompanyApi.md#get_bulk_uploads) | **GET** /companies/{id}/documents/bulk_uploads | Return bulk uploads
*DealMakerAPI::CompanyApi* | [**get_companies**](docs/CompanyApi.md#get_companies) | **GET** /companies | Get list of Companies
*DealMakerAPI::CompanyApi* | [**get_company**](docs/CompanyApi.md#get_company) | **GET** /companies/{id} | Get a Company
*DealMakerAPI::CompanyApi* | [**get_details_errors_grouped**](docs/CompanyApi.md#get_details_errors_grouped) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/grouped_errors | Return bulk upload details grouped by status
*DealMakerAPI::CompanyApi* | [**get_dividends**](docs/CompanyApi.md#get_dividends) | **GET** /companies/{company_id}/portal/dividends | Return dividends
*DealMakerAPI::CompanyApi* | [**get_email_events**](docs/CompanyApi.md#get_email_events) | **GET** /companies/{company_communication_id}/email_events | Get a list of email events for a company communication
*DealMakerAPI::CompanyApi* | [**get_email_template**](docs/CompanyApi.md#get_email_template) | **GET** /companies/{id}/news_releases/email_templates/{template_id} | Get an email template
*DealMakerAPI::CompanyApi* | [**get_email_templates**](docs/CompanyApi.md#get_email_templates) | **GET** /companies/{id}/news_releases/email_templates | Get list of email template
*DealMakerAPI::CompanyApi* | [**get_members_bulk_upload**](docs/CompanyApi.md#get_members_bulk_upload) | **GET** /companies/{id}/members/bulk_uploads/{id_members_bulk_upload} | Get bulk upload record
*DealMakerAPI::CompanyApi* | [**get_members_bulk_uploads**](docs/CompanyApi.md#get_members_bulk_uploads) | **GET** /companies/{id}/members/bulk_uploads | Get bulk uploads records
*DealMakerAPI::CompanyApi* | [**get_shareholder_ledger**](docs/CompanyApi.md#get_shareholder_ledger) | **GET** /companies/{id}/shareholder_ledger | Get shareholder ledger by company
*DealMakerAPI::CompanyApi* | [**get_user_accessible_companies**](docs/CompanyApi.md#get_user_accessible_companies) | **GET** /users/accessible_companies | Get list of all Companies accessible by the user
*DealMakerAPI::CompanyApi* | [**send_portal_invite**](docs/CompanyApi.md#send_portal_invite) | **POST** /companies/{id}/shareholders/{shareholder_id}/send_portal_invite | Send portal invite to shareholder
*DealMakerAPI::CompanyApi* | [**test_document_upload_email**](docs/CompanyApi.md#test_document_upload_email) | **POST** /companies/{id}/documents/test_upload_email | Send document upload test email to given user
*DealMakerAPI::CountryApi* | [**get_country_states**](docs/CountryApi.md#get_country_states) | **GET** /country/states | Returns a list of all valid countries and it states
*DealMakerAPI::CustomEmailsApi* | [**get_access_token**](docs/CustomEmailsApi.md#get_access_token) | **POST** /custom_emails/get_access_token | Generate authorization token information for initializing Beefree editor
*DealMakerAPI::DealApi* | [**ach_bank_account_setup_intent**](docs/DealApi.md#ach_bank_account_setup_intent) | **GET** /deals/{id}/investor/{investor_id}/subscription/{subscription_id}/payments/ach/bank_account_setup_intent | Prepares an investor for payment
*DealMakerAPI::DealApi* | [**acss_bank_account_setup_intent**](docs/DealApi.md#acss_bank_account_setup_intent) | **GET** /deals/{id}/investor/{investor_id}/subscription/{subscription_id}/payments/acss/bank_account_setup_intent | Prepares an investor for payment
*DealMakerAPI::DealApi* | [**create_deal_setup**](docs/DealApi.md#create_deal_setup) | **POST** /deal_setups | Create deal setup
*DealMakerAPI::DealApi* | [**get_deal**](docs/DealApi.md#get_deal) | **GET** /deals/{id} | Get deal by Deal ID
*DealMakerAPI::DealApi* | [**get_deal_incentive_plan**](docs/DealApi.md#get_deal_incentive_plan) | **GET** /deals/{id}/incentive_plan | Get incentive plan by deal id
*DealMakerAPI::DealApi* | [**get_platform_email_page**](docs/DealApi.md#get_platform_email_page) | **GET** /deals/{id}/platform_emails/{kind}/page | Get the Page for a given Platform Email
*DealMakerAPI::DealApi* | [**list_deals**](docs/DealApi.md#list_deals) | **GET** /deals | List available deals
*DealMakerAPI::DealApi* | [**list_platform_emails**](docs/DealApi.md#list_platform_emails) | **GET** /deals/{id}/platform_emails | Get a list of platform emails for the deal
*DealMakerAPI::DealApi* | [**patch_platform_email**](docs/DealApi.md#patch_platform_email) | **PATCH** /deals/{id}/platform_emails/{kind}/update | Patch platform email by kind and deal.
*DealMakerAPI::DealApi* | [**patch_platform_email_page**](docs/DealApi.md#patch_platform_email_page) | **PATCH** /deals/{id}/platform_emails/{kind}/page | Create and associate a page with a platform email or update the existing page
*DealMakerAPI::DealsApi* | [**post_deals_id_email_campaign_email_campaign_id_send_email**](docs/DealsApi.md#post_deals_id_email_campaign_email_campaign_id_send_email) | **POST** /deals/{id}/email_campaign/{email_campaign_id}/send_email | Send emails to all the investors invited to the material change campaign
*DealMakerAPI::DealsApi* | [**put_deals_id_script_tag_environment**](docs/DealsApi.md#put_deals_id_script_tag_environment) | **PUT** /deals/{id}/script_tag_environment | Update script tag environment for the deal.
*DealMakerAPI::DefaultApi* | [**get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data**](docs/DefaultApi.md#get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data) | **GET** /deals/{deal_id}/payment_onboarding/questionnaire/digital_payments_connection/data | Load data for the digital payments connection stage
*DealMakerAPI::DefaultApi* | [**get_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_data**](docs/DefaultApi.md#get_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_data) | **GET** /deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/data | Get payout account data
*DealMakerAPI::DefaultApi* | [**get_deals_id_investors_investor_id_payments_express_wire_instructions**](docs/DefaultApi.md#get_deals_id_investors_investor_id_payments_express_wire_instructions) | **GET** /deals/{id}/investors/{investor_id}/payments/express_wire/instructions | Displays the express wire instructions for an investor on a deal
*DealMakerAPI::DefaultApi* | [**get_deals_id_investors_payments_express_wire_instructions**](docs/DefaultApi.md#get_deals_id_investors_payments_express_wire_instructions) | **GET** /deals/{id}/investors/payments/express_wire/instructions | Displays the express wire instructions for all the investors on a deal
*DealMakerAPI::DefaultApi* | [**get_deals_id_platform_emails_domain**](docs/DefaultApi.md#get_deals_id_platform_emails_domain) | **GET** /deals/{id}/platform_emails/domain | Get the email domain settings for the deal
*DealMakerAPI::DefaultApi* | [**get_deals_id_progress_page**](docs/DefaultApi.md#get_deals_id_progress_page) | **GET** /deals/{id}/progress_page | Get deal progress
*DealMakerAPI::DefaultApi* | [**get_deals_id_progress_page_summary**](docs/DefaultApi.md#get_deals_id_progress_page_summary) | **GET** /deals/{id}/progress_page/summary | Get the deal progress summary
*DealMakerAPI::DefaultApi* | [**get_deals_id_summary**](docs/DefaultApi.md#get_deals_id_summary) | **GET** /deals/{id}/summary | Get Deal Overview
*DealMakerAPI::DefaultApi* | [**get_deals_payment_onboarding_questionnaire_initial_questions**](docs/DefaultApi.md#get_deals_payment_onboarding_questionnaire_initial_questions) | **GET** /deals/payment_onboarding/questionnaire/initial_questions | Get initial questions
*DealMakerAPI::DefaultApi* | [**get_webhooks**](docs/DefaultApi.md#get_webhooks) | **GET** /webhooks | Returns a list of webhook subscription which is associated to the user
*DealMakerAPI::DefaultApi* | [**get_webhooks_deal_id**](docs/DefaultApi.md#get_webhooks_deal_id) | **GET** /webhooks/deal/{id} | Finds a deal using the id
*DealMakerAPI::DefaultApi* | [**get_webhooks_deals_search**](docs/DefaultApi.md#get_webhooks_deals_search) | **GET** /webhooks/deals/search | Searches for deals for a given user
*DealMakerAPI::DefaultApi* | [**get_webhooks_security_token**](docs/DefaultApi.md#get_webhooks_security_token) | **GET** /webhooks/security_token | Creates a new security token for webhook subscription
*DealMakerAPI::DefaultApi* | [**patch_deals_id_platform_emails_domain**](docs/DefaultApi.md#patch_deals_id_platform_emails_domain) | **PATCH** /deals/{id}/platform_emails/domain | Update the email domain settings for the deal
*DealMakerAPI::DefaultApi* | [**post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit**](docs/DefaultApi.md#post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/submit | Submit a payout account details form
*DealMakerAPI::DefaultApi* | [**post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit**](docs/DefaultApi.md#post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/response/submit | Submit a qualification questionnaire response
*DealMakerAPI::DefaultApi* | [**post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit**](docs/DefaultApi.md#post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/submit | Submit a qualification questionnaire form
*DealMakerAPI::DefaultApi* | [**post_investors_investor_id_delete_investment_process**](docs/DefaultApi.md#post_investors_investor_id_delete_investment_process) | **POST** /investors/{investor_id}/delete_investment/process | Delete investment
*DealMakerAPI::DefaultApi* | [**post_investors_investor_id_transactions_request_refund_process**](docs/DefaultApi.md#post_investors_investor_id_transactions_request_refund_process) | **POST** /investors/{investor_id}/transactions/request_refund/process | Request refund for investor transactions
*DealMakerAPI::DefaultApi* | [**post_webhooks**](docs/DefaultApi.md#post_webhooks) | **POST** /webhooks | Creates a webhook subscription which is associated to the user
*DealMakerAPI::DefaultApi* | [**put_webhooks_id**](docs/DefaultApi.md#put_webhooks_id) | **PUT** /webhooks/{id} | Updates webhook subscription and webhooks subcription deals
*DealMakerAPI::IncentivePlanApi* | [**get_deal_incentive_plans_time**](docs/IncentivePlanApi.md#get_deal_incentive_plans_time) | **GET** /deals/{id}/incentive_plans/time | Get incentive plans by deal id
*DealMakerAPI::IncentivePlanApi* | [**patch_deal_incentive_plan**](docs/IncentivePlanApi.md#patch_deal_incentive_plan) | **PATCH** /deals/{id}/incentive_plans/{incentive_plan_id} | Updates incentive plan by deal id
*DealMakerAPI::IncentivePlanApi* | [**post_deal_incentive_plan**](docs/IncentivePlanApi.md#post_deal_incentive_plan) | **POST** /deals/{id}/incentive_plans | Creates incentive plan by deal id
*DealMakerAPI::InvestorApi* | [**add506c_document**](docs/InvestorApi.md#add506c_document) | **POST** /deals/{id}/investors/{investor_id}/add_506c_document | Add 506c document for deal investor
*DealMakerAPI::InvestorApi* | [**add_document**](docs/InvestorApi.md#add_document) | **POST** /deals/{id}/investors/{investor_id}/add_document | Add document for deal investor
*DealMakerAPI::InvestorApi* | [**bulk_upload_investors**](docs/InvestorApi.md#bulk_upload_investors) | **POST** /deals/{id}/investors/bulk_upload | Bulk upload investors for deal investor
*DealMakerAPI::InvestorApi* | [**create_investor**](docs/InvestorApi.md#create_investor) | **POST** /deals/{id}/investors | Create a deal investor
*DealMakerAPI::InvestorApi* | [**delete_document**](docs/InvestorApi.md#delete_document) | **DELETE** /deals/{id}/investors/{investor_id}/delete_document/{document_id} | Delete document for deal investor
*DealMakerAPI::InvestorApi* | [**delete_investor_profile**](docs/InvestorApi.md#delete_investor_profile) | **DELETE** /investor_profiles/{type}/{id} | Delete investor profile.
*DealMakerAPI::InvestorApi* | [**edit_investor_tags**](docs/InvestorApi.md#edit_investor_tags) | **POST** /deals/{id}/investors/{investor_id}/edit_tags | Append or replace tag(s) for a specific investor
*DealMakerAPI::InvestorApi* | [**get_deal_investor_search_entities**](docs/InvestorApi.md#get_deal_investor_search_entities) | **GET** /deals/{id}/investors/{investor_id}/search_entities | Get the search entities attached to the investor
*DealMakerAPI::InvestorApi* | [**get_enforcements**](docs/InvestorApi.md#get_enforcements) | **GET** /deals/{id}/investors/{investor_id}/background_checks/{search_entity_id}/enforcements | Get enforcements for a background search
*DealMakerAPI::InvestorApi* | [**get_incentive_plan**](docs/InvestorApi.md#get_incentive_plan) | **GET** /deals/{id}/investors/{investor_id}/incentive_plan | Get investor incentive plan by investor id
*DealMakerAPI::InvestorApi* | [**get_investor**](docs/InvestorApi.md#get_investor) | **GET** /deals/{id}/investors/{investor_id} | Get a deal investor by id
*DealMakerAPI::InvestorApi* | [**get_investor_otp_link**](docs/InvestorApi.md#get_investor_otp_link) | **GET** /deals/{id}/investors/{investor_id}/otp_access_link | Get OTP access link for deal investor
*DealMakerAPI::InvestorApi* | [**list_investors**](docs/InvestorApi.md#list_investors) | **GET** /deals/{id}/investors | List deal investors
*DealMakerAPI::InvestorApi* | [**patch_investor**](docs/InvestorApi.md#patch_investor) | **PATCH** /deals/{id}/investors/{investor_id} | Patch a deal investor
*DealMakerAPI::InvestorApi* | [**request_new_document**](docs/InvestorApi.md#request_new_document) | **POST** /deals/{id}/investors/{investor_id}/background_checks/{search_entity_id}/send_review | Request new document for a specific entity
*DealMakerAPI::InvestorApi* | [**run_background_search**](docs/InvestorApi.md#run_background_search) | **POST** /deals/{id}/investors/{investor_id}/background_checks/run | Run Alloy background search for the investor
*DealMakerAPI::InvestorApi* | [**update_investor**](docs/InvestorApi.md#update_investor) | **PUT** /deals/{id}/investors/{investor_id} | Update a deal investor
*DealMakerAPI::InvestorProfileApi* | [**create_corporation_profile**](docs/InvestorProfileApi.md#create_corporation_profile) | **POST** /investor_profiles/corporations | Create new corporation investor profile.
*DealMakerAPI::InvestorProfileApi* | [**create_individual_profile**](docs/InvestorProfileApi.md#create_individual_profile) | **POST** /investor_profiles/individuals | Create new individual investor profile
*DealMakerAPI::InvestorProfileApi* | [**create_joint_profile**](docs/InvestorProfileApi.md#create_joint_profile) | **POST** /investor_profiles/joints | Create new joint investor profile
*DealMakerAPI::InvestorProfileApi* | [**create_managed_profile**](docs/InvestorProfileApi.md#create_managed_profile) | **POST** /investor_profiles/managed | Create new managed investor profile.
*DealMakerAPI::InvestorProfileApi* | [**create_trust_profile**](docs/InvestorProfileApi.md#create_trust_profile) | **POST** /investor_profiles/trusts | Create new trust investor profile.
*DealMakerAPI::InvestorProfileApi* | [**get_deal_investor_profiles**](docs/InvestorProfileApi.md#get_deal_investor_profiles) | **GET** /investor_profiles/{deal_id} | Get list of InvestorProfiles for a specific deal
*DealMakerAPI::InvestorProfileApi* | [**get_investor_profile**](docs/InvestorProfileApi.md#get_investor_profile) | **GET** /investor_profiles/profile/{id} | Get an investor profile by id
*DealMakerAPI::InvestorProfileApi* | [**get_investor_profiles**](docs/InvestorProfileApi.md#get_investor_profiles) | **GET** /investor_profiles | Get list of InvestorProfiles
*DealMakerAPI::InvestorProfileApi* | [**patch_corporation_profile**](docs/InvestorProfileApi.md#patch_corporation_profile) | **PATCH** /investor_profiles/corporations/{investor_profile_id} | Patch a corporation investor profile
*DealMakerAPI::InvestorProfileApi* | [**patch_individual_profile**](docs/InvestorProfileApi.md#patch_individual_profile) | **PATCH** /investor_profiles/individuals/{investor_profile_id} | Patch an individual investor profile.
*DealMakerAPI::InvestorProfileApi* | [**patch_joint_profile**](docs/InvestorProfileApi.md#patch_joint_profile) | **PATCH** /investor_profiles/joints/{investor_profile_id} | Patch a joint investor profile
*DealMakerAPI::InvestorProfileApi* | [**patch_managed_profile**](docs/InvestorProfileApi.md#patch_managed_profile) | **PATCH** /investor_profiles/managed/{investor_profile_id} | Patch managed investor profile.
*DealMakerAPI::InvestorProfileApi* | [**patch_trust_profile**](docs/InvestorProfileApi.md#patch_trust_profile) | **PATCH** /investor_profiles/trusts/{investor_profile_id} | Patch a trust investor profile
*DealMakerAPI::PaymentsApi* | [**post_deal_investor_payments_ira**](docs/PaymentsApi.md#post_deal_investor_payments_ira) | **POST** /deals/{id}/investors/{investor_id}/payments/ira | Creates a payment intent for express wire and mail its instructions.
*DealMakerAPI::ReservationApi* | [**create_reservation**](docs/ReservationApi.md#create_reservation) | **POST** /ttw/reservations | Create a new reservation
*DealMakerAPI::ReservationApi* | [**get_ttw_reservation**](docs/ReservationApi.md#get_ttw_reservation) | **GET** /ttw/reservations/{id} | Gets a TTW reservation
*DealMakerAPI::ShareholderApi* | [**get_shareholders**](docs/ShareholderApi.md#get_shareholders) | **GET** /companies/{id}/shareholders | Get a company shareholders list
*DealMakerAPI::ShareholderApi* | [**get_shareholders_tags**](docs/ShareholderApi.md#get_shareholders_tags) | **GET** /companies/{id}/shareholders/tags | Get a company shareholders list grouped by tags
*DealMakerAPI::ShwApi* | [**get_shw_page**](docs/ShwApi.md#get_shw_page) | **GET** /shw/{id}/page | Get self hosted website page
*DealMakerAPI::ShwApi* | [**publish_shw_page**](docs/ShwApi.md#publish_shw_page) | **PATCH** /shw/{id}/page/publish | Publish self hosted website page
*DealMakerAPI::TtwCampaignsApi* | [**get_ttw_campaign_page**](docs/TtwCampaignsApi.md#get_ttw_campaign_page) | **GET** /ttw/campaigns/{id}/page | Get ttw campaign page
*DealMakerAPI::TtwCampaignsApi* | [**publish_ttw_campaign_page**](docs/TtwCampaignsApi.md#publish_ttw_campaign_page) | **PATCH** /ttw/campaigns/{id}/page/publish | Publish ttw campaign page
*DealMakerAPI::UploadApi* | [**generate_url**](docs/UploadApi.md#generate_url) | **POST** /uploads/generate_url | Create a presigned URL for Amazon S3
*DealMakerAPI::UserApi* | [**create_factor**](docs/UserApi.md#create_factor) | **POST** /users/{id}/create_factor | Creates an API endpoint for creating a new TOTP factor
*DealMakerAPI::UserApi* | [**delete_channel**](docs/UserApi.md#delete_channel) | **DELETE** /users/{id}/two_factor_channels/delete/{channel} | Creates an API endpoint to delete a specific two factor channel\"
*DealMakerAPI::UserApi* | [**disable_mfa**](docs/UserApi.md#disable_mfa) | **DELETE** /users/{id}/disable_mfa | Disable all the multi-factor authentication integrations for a user
*DealMakerAPI::UserApi* | [**get_two_factor_channels**](docs/UserApi.md#get_two_factor_channels) | **GET** /users/{id}/two_factor_channels | Creates an API endpoint to return a list of existing TOTP factor
*DealMakerAPI::UserApi* | [**get_user**](docs/UserApi.md#get_user) | **GET** /users/{id} | Get user by User ID
*DealMakerAPI::UserApi* | [**get_verification_resources**](docs/UserApi.md#get_verification_resources) | **GET** /users/verification/resources | Gets the verification process resources
*DealMakerAPI::UserApi* | [**send_verification_code**](docs/UserApi.md#send_verification_code) | **POST** /users/verification/send_code | Sends the verification code to the user
*DealMakerAPI::UserApi* | [**setup_sms_verification**](docs/UserApi.md#setup_sms_verification) | **POST** /users/{id}/setup_sms_verification | Start a setup for a SMS Verification by creating a two factor channel of sms type
*DealMakerAPI::UserApi* | [**update_user_password**](docs/UserApi.md#update_user_password) | **PUT** /users/{id}/update_password | Update user password
*DealMakerAPI::UserApi* | [**verify_factor**](docs/UserApi.md#verify_factor) | **PUT** /users/{id}/verify_factor | Creates an API endpoint to verify an existing TOTP factor
*DealMakerAPI::UserApi* | [**verify_sms_verification**](docs/UserApi.md#verify_sms_verification) | **POST** /users/{id}/verify_sms_verification | Verify a SMS Verification by creating a two factor channel of sms type
*DealMakerAPI::UsersApi* | [**get_users_id_contexts**](docs/UsersApi.md#get_users_id_contexts) | **GET** /users/{id}/contexts | Get contexts for a user
*DealMakerAPI::UsersApi* | [**get_users_investments**](docs/UsersApi.md#get_users_investments) | **GET** /users/investments | Gets the investments for a specific user.


## Documentation for Models

 - [DealMakerAPI::Add506cDocumentRequest](docs/Add506cDocumentRequest.md)
 - [DealMakerAPI::AddDocumentRequest](docs/AddDocumentRequest.md)
 - [DealMakerAPI::BulkUploadInvestorsRequest](docs/BulkUploadInvestorsRequest.md)
 - [DealMakerAPI::CreateBulkUploadDetailRequest](docs/CreateBulkUploadDetailRequest.md)
 - [DealMakerAPI::CreateBulkUploadRequest](docs/CreateBulkUploadRequest.md)
 - [DealMakerAPI::CreateCompanyRequest](docs/CreateCompanyRequest.md)
 - [DealMakerAPI::CreateDealSetupRequest](docs/CreateDealSetupRequest.md)
 - [DealMakerAPI::CreateEmailTemplateRequest](docs/CreateEmailTemplateRequest.md)
 - [DealMakerAPI::CreateMembersBulkUploadRequest](docs/CreateMembersBulkUploadRequest.md)
 - [DealMakerAPI::CreateReservationRequest](docs/CreateReservationRequest.md)
 - [DealMakerAPI::CreateShareholderActionRequest](docs/CreateShareholderActionRequest.md)
 - [DealMakerAPI::EditInvestorTagsRequest](docs/EditInvestorTagsRequest.md)
 - [DealMakerAPI::GenerateUrlRequest](docs/GenerateUrlRequest.md)
 - [DealMakerAPI::GetAccessTokenRequest](docs/GetAccessTokenRequest.md)
 - [DealMakerAPI::PatchDealIncentivePlanRequest](docs/PatchDealIncentivePlanRequest.md)
 - [DealMakerAPI::PatchDealsIdPlatformEmailsDomainRequest](docs/PatchDealsIdPlatformEmailsDomainRequest.md)
 - [DealMakerAPI::PatchInvestorProfilesCorporations](docs/PatchInvestorProfilesCorporations.md)
 - [DealMakerAPI::PatchInvestorProfilesCorporationsBeneficialOwnersInner](docs/PatchInvestorProfilesCorporationsBeneficialOwnersInner.md)
 - [DealMakerAPI::PatchInvestorProfilesIndividuals](docs/PatchInvestorProfilesIndividuals.md)
 - [DealMakerAPI::PatchInvestorProfilesJoints](docs/PatchInvestorProfilesJoints.md)
 - [DealMakerAPI::PatchInvestorProfilesManaged](docs/PatchInvestorProfilesManaged.md)
 - [DealMakerAPI::PatchInvestorProfilesTrusts](docs/PatchInvestorProfilesTrusts.md)
 - [DealMakerAPI::PatchInvestorProfilesTrustsTrusteesInner](docs/PatchInvestorProfilesTrustsTrusteesInner.md)
 - [DealMakerAPI::PatchInvestorRequest](docs/PatchInvestorRequest.md)
 - [DealMakerAPI::PatchPlatformEmailPageRequest](docs/PatchPlatformEmailPageRequest.md)
 - [DealMakerAPI::PatchPlatformEmailRequest](docs/PatchPlatformEmailRequest.md)
 - [DealMakerAPI::PostDealIncentivePlanRequest](docs/PostDealIncentivePlanRequest.md)
 - [DealMakerAPI::PostDealsIdInvestors](docs/PostDealsIdInvestors.md)
 - [DealMakerAPI::PostInvestorProfilesCorporations](docs/PostInvestorProfilesCorporations.md)
 - [DealMakerAPI::PostInvestorProfilesCorporationsBeneficialOwnersInner](docs/PostInvestorProfilesCorporationsBeneficialOwnersInner.md)
 - [DealMakerAPI::PostInvestorProfilesIndividuals](docs/PostInvestorProfilesIndividuals.md)
 - [DealMakerAPI::PostInvestorProfilesJoints](docs/PostInvestorProfilesJoints.md)
 - [DealMakerAPI::PostInvestorProfilesManaged](docs/PostInvestorProfilesManaged.md)
 - [DealMakerAPI::PostInvestorProfilesTrusts](docs/PostInvestorProfilesTrusts.md)
 - [DealMakerAPI::PostInvestorProfilesTrustsTrusteesInner](docs/PostInvestorProfilesTrustsTrusteesInner.md)
 - [DealMakerAPI::PostWebhooksRequest](docs/PostWebhooksRequest.md)
 - [DealMakerAPI::PutDealsIdInvestors](docs/PutDealsIdInvestors.md)
 - [DealMakerAPI::PutDealsIdScriptTagEnvironmentRequest](docs/PutDealsIdScriptTagEnvironmentRequest.md)
 - [DealMakerAPI::PutWebhooksIdRequest](docs/PutWebhooksIdRequest.md)
 - [DealMakerAPI::RequestNewDocumentRequest](docs/RequestNewDocumentRequest.md)
 - [DealMakerAPI::RunBackgroundSearchRequest](docs/RunBackgroundSearchRequest.md)
 - [DealMakerAPI::SendPortalInviteRequest](docs/SendPortalInviteRequest.md)
 - [DealMakerAPI::SendVerificationCodeRequest](docs/SendVerificationCodeRequest.md)
 - [DealMakerAPI::SetupSmsVerificationRequest](docs/SetupSmsVerificationRequest.md)
 - [DealMakerAPI::TestDocumentUploadEmailRequest](docs/TestDocumentUploadEmailRequest.md)
 - [DealMakerAPI::UpdateUserPasswordRequest](docs/UpdateUserPasswordRequest.md)
 - [DealMakerAPI::V1EntitiesAddress](docs/V1EntitiesAddress.md)
 - [DealMakerAPI::V1EntitiesAddresses](docs/V1EntitiesAddresses.md)
 - [DealMakerAPI::V1EntitiesAttachment](docs/V1EntitiesAttachment.md)
 - [DealMakerAPI::V1EntitiesBackgroundCheckSearch](docs/V1EntitiesBackgroundCheckSearch.md)
 - [DealMakerAPI::V1EntitiesBeefreeAccessToken](docs/V1EntitiesBeefreeAccessToken.md)
 - [DealMakerAPI::V1EntitiesBulkUpload](docs/V1EntitiesBulkUpload.md)
 - [DealMakerAPI::V1EntitiesBulkUploadDetail](docs/V1EntitiesBulkUploadDetail.md)
 - [DealMakerAPI::V1EntitiesBulkUploadDetails](docs/V1EntitiesBulkUploadDetails.md)
 - [DealMakerAPI::V1EntitiesBulkUploads](docs/V1EntitiesBulkUploads.md)
 - [DealMakerAPI::V1EntitiesCompany](docs/V1EntitiesCompany.md)
 - [DealMakerAPI::V1EntitiesCompanyDeal](docs/V1EntitiesCompanyDeal.md)
 - [DealMakerAPI::V1EntitiesCompanyDeals](docs/V1EntitiesCompanyDeals.md)
 - [DealMakerAPI::V1EntitiesCountries](docs/V1EntitiesCountries.md)
 - [DealMakerAPI::V1EntitiesCountry](docs/V1EntitiesCountry.md)
 - [DealMakerAPI::V1EntitiesDeal](docs/V1EntitiesDeal.md)
 - [DealMakerAPI::V1EntitiesDealEnterprise](docs/V1EntitiesDealEnterprise.md)
 - [DealMakerAPI::V1EntitiesDealFundingMetrics](docs/V1EntitiesDealFundingMetrics.md)
 - [DealMakerAPI::V1EntitiesDealInvestorMetrics](docs/V1EntitiesDealInvestorMetrics.md)
 - [DealMakerAPI::V1EntitiesDealIssuer](docs/V1EntitiesDealIssuer.md)
 - [DealMakerAPI::V1EntitiesDealSetup](docs/V1EntitiesDealSetup.md)
 - [DealMakerAPI::V1EntitiesDealSetupUser](docs/V1EntitiesDealSetupUser.md)
 - [DealMakerAPI::V1EntitiesDeals](docs/V1EntitiesDeals.md)
 - [DealMakerAPI::V1EntitiesDealsIncentivePlan](docs/V1EntitiesDealsIncentivePlan.md)
 - [DealMakerAPI::V1EntitiesDealsIncentivePlansIncentiveTier](docs/V1EntitiesDealsIncentivePlansIncentiveTier.md)
 - [DealMakerAPI::V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent](docs/V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent.md)
 - [DealMakerAPI::V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent](docs/V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent.md)
 - [DealMakerAPI::V1EntitiesDealsPlatformEmail](docs/V1EntitiesDealsPlatformEmail.md)
 - [DealMakerAPI::V1EntitiesDealsPlatformEmails](docs/V1EntitiesDealsPlatformEmails.md)
 - [DealMakerAPI::V1EntitiesDealsPlatformEmailsDomainSettings](docs/V1EntitiesDealsPlatformEmailsDomainSettings.md)
 - [DealMakerAPI::V1EntitiesDealsPriceDetails](docs/V1EntitiesDealsPriceDetails.md)
 - [DealMakerAPI::V1EntitiesDealsProgress](docs/V1EntitiesDealsProgress.md)
 - [DealMakerAPI::V1EntitiesDealsProgressColumn](docs/V1EntitiesDealsProgressColumn.md)
 - [DealMakerAPI::V1EntitiesDealsProgressKinds](docs/V1EntitiesDealsProgressKinds.md)
 - [DealMakerAPI::V1EntitiesDealsProgressPageSummary](docs/V1EntitiesDealsProgressPageSummary.md)
 - [DealMakerAPI::V1EntitiesDealsProgressPageSummaryItem](docs/V1EntitiesDealsProgressPageSummaryItem.md)
 - [DealMakerAPI::V1EntitiesDeleteResult](docs/V1EntitiesDeleteResult.md)
 - [DealMakerAPI::V1EntitiesDividend](docs/V1EntitiesDividend.md)
 - [DealMakerAPI::V1EntitiesDividends](docs/V1EntitiesDividends.md)
 - [DealMakerAPI::V1EntitiesEmailEvent](docs/V1EntitiesEmailEvent.md)
 - [DealMakerAPI::V1EntitiesEmailEvents](docs/V1EntitiesEmailEvents.md)
 - [DealMakerAPI::V1EntitiesEmailTemplate](docs/V1EntitiesEmailTemplate.md)
 - [DealMakerAPI::V1EntitiesExpressWireInstruction](docs/V1EntitiesExpressWireInstruction.md)
 - [DealMakerAPI::V1EntitiesExpressWireInstructions](docs/V1EntitiesExpressWireInstructions.md)
 - [DealMakerAPI::V1EntitiesGenericResponse](docs/V1EntitiesGenericResponse.md)
 - [DealMakerAPI::V1EntitiesInvestor](docs/V1EntitiesInvestor.md)
 - [DealMakerAPI::V1EntitiesInvestorOtpAccessLink](docs/V1EntitiesInvestorOtpAccessLink.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileAddress](docs/V1EntitiesInvestorProfileAddress.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileCorporation](docs/V1EntitiesInvestorProfileCorporation.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsAccountHolder](docs/V1EntitiesInvestorProfileFieldsAccountHolder.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsBeneficialOwner](docs/V1EntitiesInvestorProfileFieldsBeneficialOwner.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsBeneficiary](docs/V1EntitiesInvestorProfileFieldsBeneficiary.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsCorporation](docs/V1EntitiesInvestorProfileFieldsCorporation.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsPrimaryHolder](docs/V1EntitiesInvestorProfileFieldsPrimaryHolder.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsProvider](docs/V1EntitiesInvestorProfileFieldsProvider.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsSigningOfficer](docs/V1EntitiesInvestorProfileFieldsSigningOfficer.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsTrust](docs/V1EntitiesInvestorProfileFieldsTrust.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileFieldsTrustee](docs/V1EntitiesInvestorProfileFieldsTrustee.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileId](docs/V1EntitiesInvestorProfileId.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileIndividual](docs/V1EntitiesInvestorProfileIndividual.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileItem](docs/V1EntitiesInvestorProfileItem.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileJoint](docs/V1EntitiesInvestorProfileJoint.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileManaged](docs/V1EntitiesInvestorProfileManaged.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileOwner](docs/V1EntitiesInvestorProfileOwner.md)
 - [DealMakerAPI::V1EntitiesInvestorProfileTrust](docs/V1EntitiesInvestorProfileTrust.md)
 - [DealMakerAPI::V1EntitiesInvestorProfiles](docs/V1EntitiesInvestorProfiles.md)
 - [DealMakerAPI::V1EntitiesInvestorSearchEntities](docs/V1EntitiesInvestorSearchEntities.md)
 - [DealMakerAPI::V1EntitiesInvestorSearchEntitiesRequiredFields](docs/V1EntitiesInvestorSearchEntitiesRequiredFields.md)
 - [DealMakerAPI::V1EntitiesInvestorUser](docs/V1EntitiesInvestorUser.md)
 - [DealMakerAPI::V1EntitiesInvestors](docs/V1EntitiesInvestors.md)
 - [DealMakerAPI::V1EntitiesMembersBulkUpload](docs/V1EntitiesMembersBulkUpload.md)
 - [DealMakerAPI::V1EntitiesMembersBulkUploads](docs/V1EntitiesMembersBulkUploads.md)
 - [DealMakerAPI::V1EntitiesMoneyEntity](docs/V1EntitiesMoneyEntity.md)
 - [DealMakerAPI::V1EntitiesPage](docs/V1EntitiesPage.md)
 - [DealMakerAPI::V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData](docs/V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData.md)
 - [DealMakerAPI::V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData](docs/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData.md)
 - [DealMakerAPI::V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult](docs/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult.md)
 - [DealMakerAPI::V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult](docs/V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult.md)
 - [DealMakerAPI::V1EntitiesPresignedUrlResult](docs/V1EntitiesPresignedUrlResult.md)
 - [DealMakerAPI::V1EntitiesShareholder](docs/V1EntitiesShareholder.md)
 - [DealMakerAPI::V1EntitiesShareholderLedger](docs/V1EntitiesShareholderLedger.md)
 - [DealMakerAPI::V1EntitiesShareholders](docs/V1EntitiesShareholders.md)
 - [DealMakerAPI::V1EntitiesShareholdersTags](docs/V1EntitiesShareholdersTags.md)
 - [DealMakerAPI::V1EntitiesState](docs/V1EntitiesState.md)
 - [DealMakerAPI::V1EntitiesSubscriptionAgreement](docs/V1EntitiesSubscriptionAgreement.md)
 - [DealMakerAPI::V1EntitiesTtwCampaignList](docs/V1EntitiesTtwCampaignList.md)
 - [DealMakerAPI::V1EntitiesTtwCampaignResponse](docs/V1EntitiesTtwCampaignResponse.md)
 - [DealMakerAPI::V1EntitiesTtwReservationCreate](docs/V1EntitiesTtwReservationCreate.md)
 - [DealMakerAPI::V1EntitiesTtwReservationGetResponse](docs/V1EntitiesTtwReservationGetResponse.md)
 - [DealMakerAPI::V1EntitiesTtwReservationResponse](docs/V1EntitiesTtwReservationResponse.md)
 - [DealMakerAPI::V1EntitiesUser](docs/V1EntitiesUser.md)
 - [DealMakerAPI::V1EntitiesUsersBinding](docs/V1EntitiesUsersBinding.md)
 - [DealMakerAPI::V1EntitiesUsersContext](docs/V1EntitiesUsersContext.md)
 - [DealMakerAPI::V1EntitiesUsersContexts](docs/V1EntitiesUsersContexts.md)
 - [DealMakerAPI::V1EntitiesUsersFactor](docs/V1EntitiesUsersFactor.md)
 - [DealMakerAPI::V1EntitiesUsersTwoFactorChannel](docs/V1EntitiesUsersTwoFactorChannel.md)
 - [DealMakerAPI::V1EntitiesUsersTwoFactorChannels](docs/V1EntitiesUsersTwoFactorChannels.md)
 - [DealMakerAPI::V1EntitiesUsersVerificationResources](docs/V1EntitiesUsersVerificationResources.md)
 - [DealMakerAPI::V1EntitiesWebhooksDeal](docs/V1EntitiesWebhooksDeal.md)
 - [DealMakerAPI::V1EntitiesWebhooksSecurityToken](docs/V1EntitiesWebhooksSecurityToken.md)
 - [DealMakerAPI::V1EntitiesWebhooksSubscription](docs/V1EntitiesWebhooksSubscription.md)
 - [DealMakerAPI::V1EntitiesWebhooksSubscriptionDeal](docs/V1EntitiesWebhooksSubscriptionDeal.md)
 - [DealMakerAPI::V1EntitiesWebhooksSubscriptionDeals](docs/V1EntitiesWebhooksSubscriptionDeals.md)
 - [DealMakerAPI::VerifyFactorRequest](docs/VerifyFactorRequest.md)
 - [DealMakerAPI::VerifySmsVerificationRequest](docs/VerifySmsVerificationRequest.md)


## Documentation for Authorization

Endpoints do not require authorization.

