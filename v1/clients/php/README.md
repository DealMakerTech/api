# DealMaker

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



## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/DealMaker/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');




$apiInstance = new DealMaker\Api\CampaignApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->getTtwCampaign($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->getTtwCampaign: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *http://api.dealmaker.tech*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*CampaignApi* | [**getTtwCampaign**](docs/Api/CampaignApi.md#getttwcampaign) | **GET** /ttw/campaigns/{id} | Gets a TTW campaign for a given company
*CampaignApi* | [**getTtwCampaigns**](docs/Api/CampaignApi.md#getttwcampaigns) | **GET** /ttw/companies/{company_id}/campaigns | Gets a list TTW campaigns for a given company
*CampaignApi* | [**getUserTtwReservation**](docs/Api/CampaignApi.md#getuserttwreservation) | **GET** /ttw/campaign/{id}/reservation/{reservation_uuid} | Gets User ID for a TTW reservation
*CompanyApi* | [**createBulkUpload**](docs/Api/CompanyApi.md#createbulkupload) | **POST** /companies/{id}/documents/bulk_uploads | Create bulk upload record
*CompanyApi* | [**createBulkUploadDetail**](docs/Api/CompanyApi.md#createbulkuploaddetail) | **POST** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details | Create a BulkUploadDetail class record
*CompanyApi* | [**createCompany**](docs/Api/CompanyApi.md#createcompany) | **POST** /companies | Create new company
*CompanyApi* | [**createEmailTemplate**](docs/Api/CompanyApi.md#createemailtemplate) | **POST** /companies/{id}/news_releases/email_templates | Creates an email template
*CompanyApi* | [**createMembersBulkUpload**](docs/Api/CompanyApi.md#createmembersbulkupload) | **POST** /companies/{id}/members/bulk_uploads | Create bulk upload record
*CompanyApi* | [**createShareholderAction**](docs/Api/CompanyApi.md#createshareholderaction) | **POST** /companies/{company_id}/shareholders/{shareholder_id}/actions | Create a shareholder action
*CompanyApi* | [**deleteEmailTemplate**](docs/Api/CompanyApi.md#deleteemailtemplate) | **DELETE** /companies/{id}/news_releases/email_templates/{template_id} | Deletes an email template
*CompanyApi* | [**getBulkUpload**](docs/Api/CompanyApi.md#getbulkupload) | **GET** /companies/{id}/documents/bulk_uploads/{bulk_upload_id} | Return a given bulk upload by id
*CompanyApi* | [**getBulkUploadDetailsErrors**](docs/Api/CompanyApi.md#getbulkuploaddetailserrors) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/errors | Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc
*CompanyApi* | [**getBulkUploads**](docs/Api/CompanyApi.md#getbulkuploads) | **GET** /companies/{id}/documents/bulk_uploads | Return bulk uploads
*CompanyApi* | [**getCompanies**](docs/Api/CompanyApi.md#getcompanies) | **GET** /companies | Get list of Companies
*CompanyApi* | [**getCompany**](docs/Api/CompanyApi.md#getcompany) | **GET** /companies/{id} | Get a Company
*CompanyApi* | [**getDetailsErrorsGrouped**](docs/Api/CompanyApi.md#getdetailserrorsgrouped) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/grouped_errors | Return bulk upload details grouped by status
*CompanyApi* | [**getDividends**](docs/Api/CompanyApi.md#getdividends) | **GET** /companies/{company_id}/portal/dividends | Return dividends
*CompanyApi* | [**getEmailEvents**](docs/Api/CompanyApi.md#getemailevents) | **GET** /companies/{company_communication_id}/email_events | Get a list of email events for a company communication
*CompanyApi* | [**getEmailTemplate**](docs/Api/CompanyApi.md#getemailtemplate) | **GET** /companies/{id}/news_releases/email_templates/{template_id} | Get an email template
*CompanyApi* | [**getEmailTemplates**](docs/Api/CompanyApi.md#getemailtemplates) | **GET** /companies/{id}/news_releases/email_templates | Get list of email template
*CompanyApi* | [**getMembersBulkUpload**](docs/Api/CompanyApi.md#getmembersbulkupload) | **GET** /companies/{id}/members/bulk_uploads/{id_members_bulk_upload} | Get bulk upload record
*CompanyApi* | [**getMembersBulkUploads**](docs/Api/CompanyApi.md#getmembersbulkuploads) | **GET** /companies/{id}/members/bulk_uploads | Get bulk uploads records
*CompanyApi* | [**getShareholderLedger**](docs/Api/CompanyApi.md#getshareholderledger) | **GET** /companies/{id}/shareholder_ledger | Get shareholder ledger by company
*CompanyApi* | [**getUserAccessibleCompanies**](docs/Api/CompanyApi.md#getuseraccessiblecompanies) | **GET** /users/accessible_companies | Get list of all Companies accessible by the user
*CompanyApi* | [**sendPortalInvite**](docs/Api/CompanyApi.md#sendportalinvite) | **POST** /companies/{id}/shareholders/{shareholder_id}/send_portal_invite | Send portal invite to shareholder
*CompanyApi* | [**testDocumentUploadEmail**](docs/Api/CompanyApi.md#testdocumentuploademail) | **POST** /companies/{id}/documents/test_upload_email | Send document upload test email to given user
*CountryApi* | [**getCountryStates**](docs/Api/CountryApi.md#getcountrystates) | **GET** /country/states | Returns a list of all valid countries and it states
*CustomEmailsApi* | [**getAccessToken**](docs/Api/CustomEmailsApi.md#getaccesstoken) | **POST** /custom_emails/get_access_token | Generate authorization token information for initializing Beefree editor
*DealApi* | [**achBankAccountSetupIntent**](docs/Api/DealApi.md#achbankaccountsetupintent) | **GET** /deals/{id}/investor/{investor_id}/subscription/{subscription_id}/payments/ach/bank_account_setup_intent | Prepares an investor for payment
*DealApi* | [**acssBankAccountSetupIntent**](docs/Api/DealApi.md#acssbankaccountsetupintent) | **GET** /deals/{id}/investor/{investor_id}/subscription/{subscription_id}/payments/acss/bank_account_setup_intent | Prepares an investor for payment
*DealApi* | [**createDealSetup**](docs/Api/DealApi.md#createdealsetup) | **POST** /deal_setups | Create deal setup
*DealApi* | [**getDeal**](docs/Api/DealApi.md#getdeal) | **GET** /deals/{id} | Get deal by Deal ID
*DealApi* | [**getDealIncentivePlan**](docs/Api/DealApi.md#getdealincentiveplan) | **GET** /deals/{id}/incentive_plan | Get incentive plan by deal id
*DealApi* | [**getPlatformEmailPage**](docs/Api/DealApi.md#getplatformemailpage) | **GET** /deals/{id}/platform_emails/{kind}/page | Get the Page for a given Platform Email
*DealApi* | [**listDeals**](docs/Api/DealApi.md#listdeals) | **GET** /deals | List available deals
*DealApi* | [**listPlatformEmails**](docs/Api/DealApi.md#listplatformemails) | **GET** /deals/{id}/platform_emails | Get a list of platform emails for the deal
*DealApi* | [**patchPlatformEmail**](docs/Api/DealApi.md#patchplatformemail) | **PATCH** /deals/{id}/platform_emails/{kind}/update | Patch platform email by kind and deal.
*DealApi* | [**patchPlatformEmailPage**](docs/Api/DealApi.md#patchplatformemailpage) | **PATCH** /deals/{id}/platform_emails/{kind}/page | Create and associate a page with a platform email or update the existing page
*DealsApi* | [**postDealsIdEmailCampaignEmailCampaignIdSendEmail**](docs/Api/DealsApi.md#postdealsidemailcampaignemailcampaignidsendemail) | **POST** /deals/{id}/email_campaign/{email_campaign_id}/send_email | Send emails to all the investors invited to the material change campaign
*DealsApi* | [**putDealsIdScriptTagEnvironment**](docs/Api/DealsApi.md#putdealsidscripttagenvironment) | **PUT** /deals/{id}/script_tag_environment | Update script tag environment for the deal.
*DefaultApi* | [**getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData**](docs/Api/DefaultApi.md#getdealsdealidpaymentonboardingquestionnairedigitalpaymentsconnectiondata) | **GET** /deals/{deal_id}/payment_onboarding/questionnaire/digital_payments_connection/data | Load data for the digital payments connection stage
*DefaultApi* | [**getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData**](docs/Api/DefaultApi.md#getdealsdealidpaymentonboardingquestionnairepayoutaccountdetailsdata) | **GET** /deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/data | Get payout account data
*DefaultApi* | [**getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions**](docs/Api/DefaultApi.md#getdealsidinvestorsinvestoridpaymentsexpresswireinstructions) | **GET** /deals/{id}/investors/{investor_id}/payments/express_wire/instructions | Displays the express wire instructions for an investor on a deal
*DefaultApi* | [**getDealsIdInvestorsPaymentsExpressWireInstructions**](docs/Api/DefaultApi.md#getdealsidinvestorspaymentsexpresswireinstructions) | **GET** /deals/{id}/investors/payments/express_wire/instructions | Displays the express wire instructions for all the investors on a deal
*DefaultApi* | [**getDealsIdPlatformEmailsDomain**](docs/Api/DefaultApi.md#getdealsidplatformemailsdomain) | **GET** /deals/{id}/platform_emails/domain | Get the email domain settings for the deal
*DefaultApi* | [**getDealsIdProgressPage**](docs/Api/DefaultApi.md#getdealsidprogresspage) | **GET** /deals/{id}/progress_page | Get deal progress
*DefaultApi* | [**getDealsIdProgressPageSummary**](docs/Api/DefaultApi.md#getdealsidprogresspagesummary) | **GET** /deals/{id}/progress_page/summary | Get the deal progress summary
*DefaultApi* | [**getDealsIdSummary**](docs/Api/DefaultApi.md#getdealsidsummary) | **GET** /deals/{id}/summary | Get Deal Overview
*DefaultApi* | [**getDealsPaymentOnboardingQuestionnaireInitialQuestions**](docs/Api/DefaultApi.md#getdealspaymentonboardingquestionnaireinitialquestions) | **GET** /deals/payment_onboarding/questionnaire/initial_questions | Get initial questions
*DefaultApi* | [**getWebhooks**](docs/Api/DefaultApi.md#getwebhooks) | **GET** /webhooks | Returns a list of webhook subscription which is associated to the user
*DefaultApi* | [**getWebhooksDealId**](docs/Api/DefaultApi.md#getwebhooksdealid) | **GET** /webhooks/deal/{id} | Finds a deal using the id
*DefaultApi* | [**getWebhooksDealsSearch**](docs/Api/DefaultApi.md#getwebhooksdealssearch) | **GET** /webhooks/deals/search | Searches for deals for a given user
*DefaultApi* | [**getWebhooksSecurityToken**](docs/Api/DefaultApi.md#getwebhookssecuritytoken) | **GET** /webhooks/security_token | Creates a new security token for webhook subscription
*DefaultApi* | [**patchDealsIdPlatformEmailsDomain**](docs/Api/DefaultApi.md#patchdealsidplatformemailsdomain) | **PATCH** /deals/{id}/platform_emails/domain | Update the email domain settings for the deal
*DefaultApi* | [**postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit**](docs/Api/DefaultApi.md#postdealsdealidpaymentonboardingquestionnairepayoutaccountdetailssubmit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/submit | Submit a payout account details form
*DefaultApi* | [**postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit**](docs/Api/DefaultApi.md#postdealsdealidpaymentonboardingquestionnairequalificationquestionnaireresponsesubmit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/response/submit | Submit a qualification questionnaire response
*DefaultApi* | [**postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit**](docs/Api/DefaultApi.md#postdealsdealidpaymentonboardingquestionnairequalificationquestionnairesubmit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/submit | Submit a qualification questionnaire form
*DefaultApi* | [**postInvestorsInvestorIdDeleteInvestmentProcess**](docs/Api/DefaultApi.md#postinvestorsinvestoriddeleteinvestmentprocess) | **POST** /investors/{investor_id}/delete_investment/process | Delete investment
*DefaultApi* | [**postInvestorsInvestorIdTransactionsRequestRefundProcess**](docs/Api/DefaultApi.md#postinvestorsinvestoridtransactionsrequestrefundprocess) | **POST** /investors/{investor_id}/transactions/request_refund/process | Request refund for investor transactions
*DefaultApi* | [**postWebhooks**](docs/Api/DefaultApi.md#postwebhooks) | **POST** /webhooks | Creates a webhook subscription which is associated to the user
*DefaultApi* | [**putWebhooksId**](docs/Api/DefaultApi.md#putwebhooksid) | **PUT** /webhooks/{id} | Updates webhook subscription and webhooks subcription deals
*IncentivePlanApi* | [**getDealIncentivePlansTime**](docs/Api/IncentivePlanApi.md#getdealincentiveplanstime) | **GET** /deals/{id}/incentive_plans/time | Get incentive plans by deal id
*IncentivePlanApi* | [**patchDealIncentivePlan**](docs/Api/IncentivePlanApi.md#patchdealincentiveplan) | **PATCH** /deals/{id}/incentive_plans/{incentive_plan_id} | Updates incentive plan by deal id
*IncentivePlanApi* | [**postDealIncentivePlan**](docs/Api/IncentivePlanApi.md#postdealincentiveplan) | **POST** /deals/{id}/incentive_plans | Creates incentive plan by deal id
*InvestorApi* | [**add506cDocument**](docs/Api/InvestorApi.md#add506cdocument) | **POST** /deals/{id}/investors/{investor_id}/add_506c_document | Add 506c document for deal investor
*InvestorApi* | [**addDocument**](docs/Api/InvestorApi.md#adddocument) | **POST** /deals/{id}/investors/{investor_id}/add_document | Add document for deal investor
*InvestorApi* | [**bulkUploadInvestors**](docs/Api/InvestorApi.md#bulkuploadinvestors) | **POST** /deals/{id}/investors/bulk_upload | Bulk upload investors for deal investor
*InvestorApi* | [**createInvestor**](docs/Api/InvestorApi.md#createinvestor) | **POST** /deals/{id}/investors | Create a deal investor
*InvestorApi* | [**deleteDocument**](docs/Api/InvestorApi.md#deletedocument) | **DELETE** /deals/{id}/investors/{investor_id}/delete_document/{document_id} | Delete document for deal investor
*InvestorApi* | [**deleteInvestorProfile**](docs/Api/InvestorApi.md#deleteinvestorprofile) | **DELETE** /investor_profiles/{type}/{id} | Delete investor profile.
*InvestorApi* | [**editInvestorTags**](docs/Api/InvestorApi.md#editinvestortags) | **POST** /deals/{id}/investors/{investor_id}/edit_tags | Append or replace tag(s) for a specific investor
*InvestorApi* | [**getDealInvestorSearchEntities**](docs/Api/InvestorApi.md#getdealinvestorsearchentities) | **GET** /deals/{id}/investors/{investor_id}/search_entities | Get the search entities attached to the investor
*InvestorApi* | [**getEnforcements**](docs/Api/InvestorApi.md#getenforcements) | **GET** /deals/{id}/investors/{investor_id}/background_checks/{search_entity_id}/enforcements | Get enforcements for a background search
*InvestorApi* | [**getIncentivePlan**](docs/Api/InvestorApi.md#getincentiveplan) | **GET** /deals/{id}/investors/{investor_id}/incentive_plan | Get investor incentive plan by investor id
*InvestorApi* | [**getInvestor**](docs/Api/InvestorApi.md#getinvestor) | **GET** /deals/{id}/investors/{investor_id} | Get a deal investor by id
*InvestorApi* | [**getInvestorOtpLink**](docs/Api/InvestorApi.md#getinvestorotplink) | **GET** /deals/{id}/investors/{investor_id}/otp_access_link | Get OTP access link for deal investor
*InvestorApi* | [**listInvestors**](docs/Api/InvestorApi.md#listinvestors) | **GET** /deals/{id}/investors | List deal investors
*InvestorApi* | [**patchInvestor**](docs/Api/InvestorApi.md#patchinvestor) | **PATCH** /deals/{id}/investors/{investor_id} | Patch a deal investor
*InvestorApi* | [**requestNewDocument**](docs/Api/InvestorApi.md#requestnewdocument) | **POST** /deals/{id}/investors/{investor_id}/background_checks/{search_entity_id}/send_review | Request new document for a specific entity
*InvestorApi* | [**runBackgroundSearch**](docs/Api/InvestorApi.md#runbackgroundsearch) | **POST** /deals/{id}/investors/{investor_id}/background_checks/run | Run Alloy background search for the investor
*InvestorApi* | [**updateInvestor**](docs/Api/InvestorApi.md#updateinvestor) | **PUT** /deals/{id}/investors/{investor_id} | Update a deal investor
*InvestorProfileApi* | [**createCorporationProfile**](docs/Api/InvestorProfileApi.md#createcorporationprofile) | **POST** /investor_profiles/corporations | Create new corporation investor profile.
*InvestorProfileApi* | [**createIndividualProfile**](docs/Api/InvestorProfileApi.md#createindividualprofile) | **POST** /investor_profiles/individuals | Create new individual investor profile
*InvestorProfileApi* | [**createJointProfile**](docs/Api/InvestorProfileApi.md#createjointprofile) | **POST** /investor_profiles/joints | Create new joint investor profile
*InvestorProfileApi* | [**createManagedProfile**](docs/Api/InvestorProfileApi.md#createmanagedprofile) | **POST** /investor_profiles/managed | Create new managed investor profile.
*InvestorProfileApi* | [**createTrustProfile**](docs/Api/InvestorProfileApi.md#createtrustprofile) | **POST** /investor_profiles/trusts | Create new trust investor profile.
*InvestorProfileApi* | [**getDealInvestorProfiles**](docs/Api/InvestorProfileApi.md#getdealinvestorprofiles) | **GET** /investor_profiles/{deal_id} | Get list of InvestorProfiles for a specific deal
*InvestorProfileApi* | [**getInvestorProfile**](docs/Api/InvestorProfileApi.md#getinvestorprofile) | **GET** /investor_profiles/profile/{id} | Get an investor profile by id
*InvestorProfileApi* | [**getInvestorProfiles**](docs/Api/InvestorProfileApi.md#getinvestorprofiles) | **GET** /investor_profiles | Get list of InvestorProfiles
*InvestorProfileApi* | [**patchCorporationProfile**](docs/Api/InvestorProfileApi.md#patchcorporationprofile) | **PATCH** /investor_profiles/corporations/{investor_profile_id} | Patch a corporation investor profile
*InvestorProfileApi* | [**patchIndividualProfile**](docs/Api/InvestorProfileApi.md#patchindividualprofile) | **PATCH** /investor_profiles/individuals/{investor_profile_id} | Patch an individual investor profile.
*InvestorProfileApi* | [**patchJointProfile**](docs/Api/InvestorProfileApi.md#patchjointprofile) | **PATCH** /investor_profiles/joints/{investor_profile_id} | Patch a joint investor profile
*InvestorProfileApi* | [**patchManagedProfile**](docs/Api/InvestorProfileApi.md#patchmanagedprofile) | **PATCH** /investor_profiles/managed/{investor_profile_id} | Patch managed investor profile.
*InvestorProfileApi* | [**patchTrustProfile**](docs/Api/InvestorProfileApi.md#patchtrustprofile) | **PATCH** /investor_profiles/trusts/{investor_profile_id} | Patch a trust investor profile
*PaymentsApi* | [**postDealInvestorPaymentsIra**](docs/Api/PaymentsApi.md#postdealinvestorpaymentsira) | **POST** /deals/{id}/investors/{investor_id}/payments/ira | Creates a payment intent for express wire and mail its instructions.
*ReservationApi* | [**createReservation**](docs/Api/ReservationApi.md#createreservation) | **POST** /ttw/reservations | Create a new reservation
*ReservationApi* | [**getTtwReservation**](docs/Api/ReservationApi.md#getttwreservation) | **GET** /ttw/reservations/{id} | Gets a TTW reservation
*ShareholderApi* | [**getShareholders**](docs/Api/ShareholderApi.md#getshareholders) | **GET** /companies/{id}/shareholders | Get a company shareholders list
*ShareholderApi* | [**getShareholdersTags**](docs/Api/ShareholderApi.md#getshareholderstags) | **GET** /companies/{id}/shareholders/tags | Get a company shareholders list grouped by tags
*ShwApi* | [**getShwPage**](docs/Api/ShwApi.md#getshwpage) | **GET** /shw/{id}/page | Get self hosted website page
*ShwApi* | [**publishShwPage**](docs/Api/ShwApi.md#publishshwpage) | **PATCH** /shw/{id}/page/publish | Publish self hosted website page
*TtwCampaignsApi* | [**getTtwCampaignPage**](docs/Api/TtwCampaignsApi.md#getttwcampaignpage) | **GET** /ttw/campaigns/{id}/page | Get ttw campaign page
*TtwCampaignsApi* | [**publishTtwCampaignPage**](docs/Api/TtwCampaignsApi.md#publishttwcampaignpage) | **PATCH** /ttw/campaigns/{id}/page/publish | Publish ttw campaign page
*UploadApi* | [**generateUrl**](docs/Api/UploadApi.md#generateurl) | **POST** /uploads/generate_url | Create a presigned URL for Amazon S3
*UserApi* | [**createFactor**](docs/Api/UserApi.md#createfactor) | **POST** /users/{id}/create_factor | Creates an API endpoint for creating a new TOTP factor
*UserApi* | [**deleteChannel**](docs/Api/UserApi.md#deletechannel) | **DELETE** /users/{id}/two_factor_channels/delete/{channel} | Creates an API endpoint to delete a specific two factor channel\&quot;
*UserApi* | [**disableMfa**](docs/Api/UserApi.md#disablemfa) | **DELETE** /users/{id}/disable_mfa | Disable all the multi-factor authentication integrations for a user
*UserApi* | [**getTwoFactorChannels**](docs/Api/UserApi.md#gettwofactorchannels) | **GET** /users/{id}/two_factor_channels | Creates an API endpoint to return a list of existing TOTP factor
*UserApi* | [**getUser**](docs/Api/UserApi.md#getuser) | **GET** /users/{id} | Get user by User ID
*UserApi* | [**getVerificationResources**](docs/Api/UserApi.md#getverificationresources) | **GET** /users/verification/resources | Gets the verification process resources
*UserApi* | [**sendVerificationCode**](docs/Api/UserApi.md#sendverificationcode) | **POST** /users/verification/send_code | Sends the verification code to the user
*UserApi* | [**setupSmsVerification**](docs/Api/UserApi.md#setupsmsverification) | **POST** /users/{id}/setup_sms_verification | Start a setup for a SMS Verification by creating a two factor channel of sms type
*UserApi* | [**updateUserPassword**](docs/Api/UserApi.md#updateuserpassword) | **PUT** /users/{id}/update_password | Update user password
*UserApi* | [**verifyFactor**](docs/Api/UserApi.md#verifyfactor) | **PUT** /users/{id}/verify_factor | Creates an API endpoint to verify an existing TOTP factor
*UserApi* | [**verifySmsVerification**](docs/Api/UserApi.md#verifysmsverification) | **POST** /users/{id}/verify_sms_verification | Verify a SMS Verification by creating a two factor channel of sms type
*UsersApi* | [**getUsersIdContexts**](docs/Api/UsersApi.md#getusersidcontexts) | **GET** /users/{id}/contexts | Get contexts for a user
*UsersApi* | [**getUsersInvestments**](docs/Api/UsersApi.md#getusersinvestments) | **GET** /users/investments | Gets the investments for a specific user.

## Models

- [Add506cDocumentRequest](docs/Model/Add506cDocumentRequest.md)
- [AddDocumentRequest](docs/Model/AddDocumentRequest.md)
- [BulkUploadInvestorsRequest](docs/Model/BulkUploadInvestorsRequest.md)
- [CreateBulkUploadDetailRequest](docs/Model/CreateBulkUploadDetailRequest.md)
- [CreateBulkUploadRequest](docs/Model/CreateBulkUploadRequest.md)
- [CreateCompanyRequest](docs/Model/CreateCompanyRequest.md)
- [CreateDealSetupRequest](docs/Model/CreateDealSetupRequest.md)
- [CreateEmailTemplateRequest](docs/Model/CreateEmailTemplateRequest.md)
- [CreateMembersBulkUploadRequest](docs/Model/CreateMembersBulkUploadRequest.md)
- [CreateReservationRequest](docs/Model/CreateReservationRequest.md)
- [CreateShareholderActionRequest](docs/Model/CreateShareholderActionRequest.md)
- [EditInvestorTagsRequest](docs/Model/EditInvestorTagsRequest.md)
- [GenerateUrlRequest](docs/Model/GenerateUrlRequest.md)
- [GetAccessTokenRequest](docs/Model/GetAccessTokenRequest.md)
- [PatchDealIncentivePlanRequest](docs/Model/PatchDealIncentivePlanRequest.md)
- [PatchDealsIdPlatformEmailsDomainRequest](docs/Model/PatchDealsIdPlatformEmailsDomainRequest.md)
- [PatchInvestorProfilesCorporations](docs/Model/PatchInvestorProfilesCorporations.md)
- [PatchInvestorProfilesCorporationsBeneficialOwnersInner](docs/Model/PatchInvestorProfilesCorporationsBeneficialOwnersInner.md)
- [PatchInvestorProfilesIndividuals](docs/Model/PatchInvestorProfilesIndividuals.md)
- [PatchInvestorProfilesJoints](docs/Model/PatchInvestorProfilesJoints.md)
- [PatchInvestorProfilesManaged](docs/Model/PatchInvestorProfilesManaged.md)
- [PatchInvestorProfilesTrusts](docs/Model/PatchInvestorProfilesTrusts.md)
- [PatchInvestorProfilesTrustsTrusteesInner](docs/Model/PatchInvestorProfilesTrustsTrusteesInner.md)
- [PatchInvestorRequest](docs/Model/PatchInvestorRequest.md)
- [PatchPlatformEmailPageRequest](docs/Model/PatchPlatformEmailPageRequest.md)
- [PatchPlatformEmailRequest](docs/Model/PatchPlatformEmailRequest.md)
- [PostDealIncentivePlanRequest](docs/Model/PostDealIncentivePlanRequest.md)
- [PostDealsIdInvestors](docs/Model/PostDealsIdInvestors.md)
- [PostInvestorProfilesCorporations](docs/Model/PostInvestorProfilesCorporations.md)
- [PostInvestorProfilesCorporationsBeneficialOwnersInner](docs/Model/PostInvestorProfilesCorporationsBeneficialOwnersInner.md)
- [PostInvestorProfilesIndividuals](docs/Model/PostInvestorProfilesIndividuals.md)
- [PostInvestorProfilesJoints](docs/Model/PostInvestorProfilesJoints.md)
- [PostInvestorProfilesManaged](docs/Model/PostInvestorProfilesManaged.md)
- [PostInvestorProfilesTrusts](docs/Model/PostInvestorProfilesTrusts.md)
- [PostInvestorProfilesTrustsTrusteesInner](docs/Model/PostInvestorProfilesTrustsTrusteesInner.md)
- [PostWebhooksRequest](docs/Model/PostWebhooksRequest.md)
- [PutDealsIdInvestors](docs/Model/PutDealsIdInvestors.md)
- [PutDealsIdScriptTagEnvironmentRequest](docs/Model/PutDealsIdScriptTagEnvironmentRequest.md)
- [PutWebhooksIdRequest](docs/Model/PutWebhooksIdRequest.md)
- [RequestNewDocumentRequest](docs/Model/RequestNewDocumentRequest.md)
- [RunBackgroundSearchRequest](docs/Model/RunBackgroundSearchRequest.md)
- [SendPortalInviteRequest](docs/Model/SendPortalInviteRequest.md)
- [SendVerificationCodeRequest](docs/Model/SendVerificationCodeRequest.md)
- [SetupSmsVerificationRequest](docs/Model/SetupSmsVerificationRequest.md)
- [TestDocumentUploadEmailRequest](docs/Model/TestDocumentUploadEmailRequest.md)
- [UpdateUserPasswordRequest](docs/Model/UpdateUserPasswordRequest.md)
- [V1EntitiesAddress](docs/Model/V1EntitiesAddress.md)
- [V1EntitiesAddresses](docs/Model/V1EntitiesAddresses.md)
- [V1EntitiesAttachment](docs/Model/V1EntitiesAttachment.md)
- [V1EntitiesBackgroundCheckSearch](docs/Model/V1EntitiesBackgroundCheckSearch.md)
- [V1EntitiesBeefreeAccessToken](docs/Model/V1EntitiesBeefreeAccessToken.md)
- [V1EntitiesBulkUpload](docs/Model/V1EntitiesBulkUpload.md)
- [V1EntitiesBulkUploadDetail](docs/Model/V1EntitiesBulkUploadDetail.md)
- [V1EntitiesBulkUploadDetails](docs/Model/V1EntitiesBulkUploadDetails.md)
- [V1EntitiesBulkUploads](docs/Model/V1EntitiesBulkUploads.md)
- [V1EntitiesCompany](docs/Model/V1EntitiesCompany.md)
- [V1EntitiesCompanyDeal](docs/Model/V1EntitiesCompanyDeal.md)
- [V1EntitiesCompanyDeals](docs/Model/V1EntitiesCompanyDeals.md)
- [V1EntitiesCountries](docs/Model/V1EntitiesCountries.md)
- [V1EntitiesCountry](docs/Model/V1EntitiesCountry.md)
- [V1EntitiesDeal](docs/Model/V1EntitiesDeal.md)
- [V1EntitiesDealEnterprise](docs/Model/V1EntitiesDealEnterprise.md)
- [V1EntitiesDealFundingMetrics](docs/Model/V1EntitiesDealFundingMetrics.md)
- [V1EntitiesDealInvestorMetrics](docs/Model/V1EntitiesDealInvestorMetrics.md)
- [V1EntitiesDealIssuer](docs/Model/V1EntitiesDealIssuer.md)
- [V1EntitiesDealSetup](docs/Model/V1EntitiesDealSetup.md)
- [V1EntitiesDealSetupUser](docs/Model/V1EntitiesDealSetupUser.md)
- [V1EntitiesDeals](docs/Model/V1EntitiesDeals.md)
- [V1EntitiesDealsIncentivePlan](docs/Model/V1EntitiesDealsIncentivePlan.md)
- [V1EntitiesDealsIncentivePlansIncentiveTier](docs/Model/V1EntitiesDealsIncentivePlansIncentiveTier.md)
- [V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent](docs/Model/V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent.md)
- [V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent](docs/Model/V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent.md)
- [V1EntitiesDealsPlatformEmail](docs/Model/V1EntitiesDealsPlatformEmail.md)
- [V1EntitiesDealsPlatformEmails](docs/Model/V1EntitiesDealsPlatformEmails.md)
- [V1EntitiesDealsPlatformEmailsDomainSettings](docs/Model/V1EntitiesDealsPlatformEmailsDomainSettings.md)
- [V1EntitiesDealsPriceDetails](docs/Model/V1EntitiesDealsPriceDetails.md)
- [V1EntitiesDealsProgress](docs/Model/V1EntitiesDealsProgress.md)
- [V1EntitiesDealsProgressColumn](docs/Model/V1EntitiesDealsProgressColumn.md)
- [V1EntitiesDealsProgressKinds](docs/Model/V1EntitiesDealsProgressKinds.md)
- [V1EntitiesDealsProgressPageSummary](docs/Model/V1EntitiesDealsProgressPageSummary.md)
- [V1EntitiesDealsProgressPageSummaryItem](docs/Model/V1EntitiesDealsProgressPageSummaryItem.md)
- [V1EntitiesDeleteResult](docs/Model/V1EntitiesDeleteResult.md)
- [V1EntitiesDividend](docs/Model/V1EntitiesDividend.md)
- [V1EntitiesDividends](docs/Model/V1EntitiesDividends.md)
- [V1EntitiesEmailEvent](docs/Model/V1EntitiesEmailEvent.md)
- [V1EntitiesEmailEvents](docs/Model/V1EntitiesEmailEvents.md)
- [V1EntitiesEmailTemplate](docs/Model/V1EntitiesEmailTemplate.md)
- [V1EntitiesExpressWireInstruction](docs/Model/V1EntitiesExpressWireInstruction.md)
- [V1EntitiesExpressWireInstructions](docs/Model/V1EntitiesExpressWireInstructions.md)
- [V1EntitiesGenericResponse](docs/Model/V1EntitiesGenericResponse.md)
- [V1EntitiesInvestor](docs/Model/V1EntitiesInvestor.md)
- [V1EntitiesInvestorOtpAccessLink](docs/Model/V1EntitiesInvestorOtpAccessLink.md)
- [V1EntitiesInvestorProfileAddress](docs/Model/V1EntitiesInvestorProfileAddress.md)
- [V1EntitiesInvestorProfileCorporation](docs/Model/V1EntitiesInvestorProfileCorporation.md)
- [V1EntitiesInvestorProfileFieldsAccountHolder](docs/Model/V1EntitiesInvestorProfileFieldsAccountHolder.md)
- [V1EntitiesInvestorProfileFieldsBeneficialOwner](docs/Model/V1EntitiesInvestorProfileFieldsBeneficialOwner.md)
- [V1EntitiesInvestorProfileFieldsBeneficiary](docs/Model/V1EntitiesInvestorProfileFieldsBeneficiary.md)
- [V1EntitiesInvestorProfileFieldsCorporation](docs/Model/V1EntitiesInvestorProfileFieldsCorporation.md)
- [V1EntitiesInvestorProfileFieldsPrimaryHolder](docs/Model/V1EntitiesInvestorProfileFieldsPrimaryHolder.md)
- [V1EntitiesInvestorProfileFieldsProvider](docs/Model/V1EntitiesInvestorProfileFieldsProvider.md)
- [V1EntitiesInvestorProfileFieldsSigningOfficer](docs/Model/V1EntitiesInvestorProfileFieldsSigningOfficer.md)
- [V1EntitiesInvestorProfileFieldsTrust](docs/Model/V1EntitiesInvestorProfileFieldsTrust.md)
- [V1EntitiesInvestorProfileFieldsTrustee](docs/Model/V1EntitiesInvestorProfileFieldsTrustee.md)
- [V1EntitiesInvestorProfileId](docs/Model/V1EntitiesInvestorProfileId.md)
- [V1EntitiesInvestorProfileIndividual](docs/Model/V1EntitiesInvestorProfileIndividual.md)
- [V1EntitiesInvestorProfileItem](docs/Model/V1EntitiesInvestorProfileItem.md)
- [V1EntitiesInvestorProfileJoint](docs/Model/V1EntitiesInvestorProfileJoint.md)
- [V1EntitiesInvestorProfileManaged](docs/Model/V1EntitiesInvestorProfileManaged.md)
- [V1EntitiesInvestorProfileOwner](docs/Model/V1EntitiesInvestorProfileOwner.md)
- [V1EntitiesInvestorProfileTrust](docs/Model/V1EntitiesInvestorProfileTrust.md)
- [V1EntitiesInvestorProfiles](docs/Model/V1EntitiesInvestorProfiles.md)
- [V1EntitiesInvestorSearchEntities](docs/Model/V1EntitiesInvestorSearchEntities.md)
- [V1EntitiesInvestorSearchEntitiesRequiredFields](docs/Model/V1EntitiesInvestorSearchEntitiesRequiredFields.md)
- [V1EntitiesInvestorUser](docs/Model/V1EntitiesInvestorUser.md)
- [V1EntitiesInvestors](docs/Model/V1EntitiesInvestors.md)
- [V1EntitiesMembersBulkUpload](docs/Model/V1EntitiesMembersBulkUpload.md)
- [V1EntitiesMembersBulkUploads](docs/Model/V1EntitiesMembersBulkUploads.md)
- [V1EntitiesMoneyEntity](docs/Model/V1EntitiesMoneyEntity.md)
- [V1EntitiesPage](docs/Model/V1EntitiesPage.md)
- [V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData](docs/Model/V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData.md)
- [V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData](docs/Model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData.md)
- [V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult](docs/Model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult.md)
- [V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult](docs/Model/V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult.md)
- [V1EntitiesPresignedUrlResult](docs/Model/V1EntitiesPresignedUrlResult.md)
- [V1EntitiesShareholder](docs/Model/V1EntitiesShareholder.md)
- [V1EntitiesShareholderLedger](docs/Model/V1EntitiesShareholderLedger.md)
- [V1EntitiesShareholders](docs/Model/V1EntitiesShareholders.md)
- [V1EntitiesShareholdersTags](docs/Model/V1EntitiesShareholdersTags.md)
- [V1EntitiesState](docs/Model/V1EntitiesState.md)
- [V1EntitiesSubscriptionAgreement](docs/Model/V1EntitiesSubscriptionAgreement.md)
- [V1EntitiesTtwCampaignList](docs/Model/V1EntitiesTtwCampaignList.md)
- [V1EntitiesTtwCampaignResponse](docs/Model/V1EntitiesTtwCampaignResponse.md)
- [V1EntitiesTtwReservationCreate](docs/Model/V1EntitiesTtwReservationCreate.md)
- [V1EntitiesTtwReservationGetResponse](docs/Model/V1EntitiesTtwReservationGetResponse.md)
- [V1EntitiesTtwReservationResponse](docs/Model/V1EntitiesTtwReservationResponse.md)
- [V1EntitiesUser](docs/Model/V1EntitiesUser.md)
- [V1EntitiesUsersBinding](docs/Model/V1EntitiesUsersBinding.md)
- [V1EntitiesUsersContext](docs/Model/V1EntitiesUsersContext.md)
- [V1EntitiesUsersContexts](docs/Model/V1EntitiesUsersContexts.md)
- [V1EntitiesUsersFactor](docs/Model/V1EntitiesUsersFactor.md)
- [V1EntitiesUsersTwoFactorChannel](docs/Model/V1EntitiesUsersTwoFactorChannel.md)
- [V1EntitiesUsersTwoFactorChannels](docs/Model/V1EntitiesUsersTwoFactorChannels.md)
- [V1EntitiesUsersVerificationResources](docs/Model/V1EntitiesUsersVerificationResources.md)
- [V1EntitiesWebhooksDeal](docs/Model/V1EntitiesWebhooksDeal.md)
- [V1EntitiesWebhooksSecurityToken](docs/Model/V1EntitiesWebhooksSecurityToken.md)
- [V1EntitiesWebhooksSubscription](docs/Model/V1EntitiesWebhooksSubscription.md)
- [V1EntitiesWebhooksSubscriptionDeal](docs/Model/V1EntitiesWebhooksSubscriptionDeal.md)
- [V1EntitiesWebhooksSubscriptionDeals](docs/Model/V1EntitiesWebhooksSubscriptionDeals.md)
- [VerifyFactorRequest](docs/Model/VerifyFactorRequest.md)
- [VerifySmsVerificationRequest](docs/Model/VerifySmsVerificationRequest.md)

## Authorization
Endpoints do not require authorization.

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.75.0`
    - Package version: `0.107.5`
    - Generator version: `7.8.0-SNAPSHOT`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
