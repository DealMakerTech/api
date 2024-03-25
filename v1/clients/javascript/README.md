# api

Api - JavaScript client for api
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
- Package version: 0.99.2
- Generator version: 7.5.0-SNAPSHOT
- Build package: org.openapitools.codegen.languages.JavascriptClientCodegen

## Installation

### For [Node.js](https://nodejs.org/)

#### npm

To publish the library as a [npm](https://www.npmjs.com/), please follow the procedure in ["Publishing npm packages"](https://docs.npmjs.com/getting-started/publishing-npm-packages).

Then install it via:

```shell
npm install api --save
```

Finally, you need to build the module:

```shell
npm run build
```

##### Local development

To use the library locally without publishing to a remote npm registry, first install the dependencies by changing into the directory containing `package.json` (and this README). Let's call this `JAVASCRIPT_CLIENT_DIR`. Then run:

```shell
npm install
```

Next, [link](https://docs.npmjs.com/cli/link) it globally in npm with the following, also from `JAVASCRIPT_CLIENT_DIR`:

```shell
npm link
```

To use the link you just defined in your project, switch to the directory you want to use your api from, and run:

```shell
npm link /path/to/<JAVASCRIPT_CLIENT_DIR>
```

Finally, you need to build the module:

```shell
npm run build
```

#### git

If the library is hosted at a git repository, e.g.https://github.com/GIT_USER_ID/GIT_REPO_ID
then install it via:

```shell
    npm install GIT_USER_ID/GIT_REPO_ID --save
```

### For browser

The library also works in the browser environment via npm and [browserify](http://browserify.org/). After following
the above steps with Node.js and installing browserify with `npm install -g browserify`,
perform the following (assuming *main.js* is your entry file):

```shell
browserify main.js > bundle.js
```

Then include *bundle.js* in the HTML pages.

### Webpack Configuration

Using Webpack you may encounter the following error: "Module not found: Error:
Cannot resolve module", most certainly you should disable AMD loader. Add/merge
the following section to your webpack config:

```javascript
module: {
  rules: [
    {
      parser: {
        amd: false
      }
    }
  ]
}
```

## Getting Started

Please follow the [installation](#installation) instruction and execute the following JS code:

```javascript
var Api = require('api');

var defaultClient = Api.ApiClient.instance;

var api = new Api.CompanyApi()
var id = 56; // {Number} The company id
var createBulkUploadRequest = new Api.CreateBulkUploadRequest(); // {CreateBulkUploadRequest} 
var callback = function(error, data, response) {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
};
api.createBulkUpload(id, createBulkUploadRequest, callback);

```

## Documentation for API Endpoints

All URIs are relative to *http://api.dealmaker.tech*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*Api.CompanyApi* | [**createBulkUpload**](docs/CompanyApi.md#createBulkUpload) | **POST** /companies/{id}/documents/bulk_uploads | Create bulk upload record
*Api.CompanyApi* | [**createBulkUploadDetail**](docs/CompanyApi.md#createBulkUploadDetail) | **POST** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details | Create a BulkUploadDetail class record
*Api.CompanyApi* | [**createCompany**](docs/CompanyApi.md#createCompany) | **POST** /companies | Create new company
*Api.CompanyApi* | [**createEmailTemplate**](docs/CompanyApi.md#createEmailTemplate) | **POST** /companies/{id}/news_releases/email_template | Creates an email template
*Api.CompanyApi* | [**createMembersBulkUpload**](docs/CompanyApi.md#createMembersBulkUpload) | **POST** /companies/{id}/members/bulk_uploads | Create bulk upload record
*Api.CompanyApi* | [**createShareholderAction**](docs/CompanyApi.md#createShareholderAction) | **POST** /companies/{company_id}/shareholders/{shareholder_id}/actions | Create a shareholder action
*Api.CompanyApi* | [**getBulkUpload**](docs/CompanyApi.md#getBulkUpload) | **GET** /companies/{id}/documents/bulk_uploads/{bulk_upload_id} | Return a given bulk upload by id
*Api.CompanyApi* | [**getBulkUploadDetailsErrors**](docs/CompanyApi.md#getBulkUploadDetailsErrors) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/errors | Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc
*Api.CompanyApi* | [**getBulkUploads**](docs/CompanyApi.md#getBulkUploads) | **GET** /companies/{id}/documents/bulk_uploads | Return bulk uploads
*Api.CompanyApi* | [**getCompanies**](docs/CompanyApi.md#getCompanies) | **GET** /companies | Get list of Companies
*Api.CompanyApi* | [**getCompany**](docs/CompanyApi.md#getCompany) | **GET** /companies/{id} | Get a Company
*Api.CompanyApi* | [**getDetailsErrorsGrouped**](docs/CompanyApi.md#getDetailsErrorsGrouped) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/grouped_errors | Return bulk upload details grouped by status
*Api.CompanyApi* | [**getDividends**](docs/CompanyApi.md#getDividends) | **GET** /companies/{company_id}/portal/dividends | Return dividends
*Api.CompanyApi* | [**getEmailEvents**](docs/CompanyApi.md#getEmailEvents) | **GET** /companies/{company_communication_id}/email_events | Get a list of email events for a company communication
*Api.CompanyApi* | [**getEmailTemplate**](docs/CompanyApi.md#getEmailTemplate) | **GET** /companies/{id}/news_releases/email_template/{template_id} | Get a email template
*Api.CompanyApi* | [**getEmailTemplates**](docs/CompanyApi.md#getEmailTemplates) | **GET** /companies/{id}/news_releases/email_templates | Get list of email template
*Api.CompanyApi* | [**getMembersBulkUpload**](docs/CompanyApi.md#getMembersBulkUpload) | **GET** /companies/{id}/members/bulk_uploads/{id_members_bulk_upload} | Get bulk upload record
*Api.CompanyApi* | [**getMembersBulkUploads**](docs/CompanyApi.md#getMembersBulkUploads) | **GET** /companies/{id}/members/bulk_uploads | Get bulk uploads records
*Api.CompanyApi* | [**getShareholderLedger**](docs/CompanyApi.md#getShareholderLedger) | **GET** /companies/{id}/shareholder_ledger | Get shareholder ledger by company
*Api.CompanyApi* | [**getUserAccessibleCompanies**](docs/CompanyApi.md#getUserAccessibleCompanies) | **GET** /users/accessible_companies | Get list of all Companies accessible by the user
*Api.CompanyApi* | [**sendPortalInvite**](docs/CompanyApi.md#sendPortalInvite) | **POST** /companies/{id}/shareholders/{shareholder_id}/send_portal_invite | Send portal invite to shareholder
*Api.CountryApi* | [**getCountryStates**](docs/CountryApi.md#getCountryStates) | **GET** /country/states | Returns a list of all valid countries and it states
*Api.CustomEmailsApi* | [**getAccessToken**](docs/CustomEmailsApi.md#getAccessToken) | **POST** /custom_emails/get_access_token | Generate authorization token information for initializing Beefree editor
*Api.DealApi* | [**createDealSetup**](docs/DealApi.md#createDealSetup) | **POST** /deal_setups | Create deal setup
*Api.DealApi* | [**getDeal**](docs/DealApi.md#getDeal) | **GET** /deals/{id} | Get deal by Deal ID
*Api.DealApi* | [**getDealIncentivePlan**](docs/DealApi.md#getDealIncentivePlan) | **GET** /deals/{id}/incentive_plan | Get incentive plan by deal id
*Api.DealApi* | [**listDeals**](docs/DealApi.md#listDeals) | **GET** /deals | List available deals
*Api.DealsApi* | [**putDealsIdScriptTagEnvironment**](docs/DealsApi.md#putDealsIdScriptTagEnvironment) | **PUT** /deals/{id}/script_tag_environment | Update script tag environment for the deal.
*Api.DefaultApi* | [**getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData**](docs/DefaultApi.md#getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData) | **GET** /deals/{deal_id}/payment_onboarding/questionnaire/digital_payments_connection/data | Load data for the digital payments connection stage
*Api.DefaultApi* | [**getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData**](docs/DefaultApi.md#getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData) | **GET** /deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/data | Get payout account data
*Api.DefaultApi* | [**getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions**](docs/DefaultApi.md#getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions) | **GET** /deals/{id}/investors/{investor_id}/payments/express_wire/instructions | Displays the express wire instructions for an investor on a deal
*Api.DefaultApi* | [**getDealsIdInvestorsPaymentsExpressWireInstructions**](docs/DefaultApi.md#getDealsIdInvestorsPaymentsExpressWireInstructions) | **GET** /deals/{id}/investors/payments/express_wire/instructions | Displays the express wire instructions for all the investors on a deal
*Api.DefaultApi* | [**getDealsIdSummary**](docs/DefaultApi.md#getDealsIdSummary) | **GET** /deals/{id}/summary | Get Deal Overview
*Api.DefaultApi* | [**getDealsPaymentOnboardingQuestionnaireInitialQuestions**](docs/DefaultApi.md#getDealsPaymentOnboardingQuestionnaireInitialQuestions) | **GET** /deals/payment_onboarding/questionnaire/initial_questions | Get initial questions
*Api.DefaultApi* | [**getWebhooks**](docs/DefaultApi.md#getWebhooks) | **GET** /webhooks | Returns a list of webhook subscription which is associated to the user
*Api.DefaultApi* | [**getWebhooksDealId**](docs/DefaultApi.md#getWebhooksDealId) | **GET** /webhooks/deal/{id} | Finds a deal using the id
*Api.DefaultApi* | [**getWebhooksDealsSearch**](docs/DefaultApi.md#getWebhooksDealsSearch) | **GET** /webhooks/deals/search | Searches for deals for a given user
*Api.DefaultApi* | [**getWebhooksSecurityToken**](docs/DefaultApi.md#getWebhooksSecurityToken) | **GET** /webhooks/security_token | Creates a new security token for webhook subscription
*Api.DefaultApi* | [**postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit**](docs/DefaultApi.md#postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/submit | Submit a payout account details form
*Api.DefaultApi* | [**postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit**](docs/DefaultApi.md#postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/response/submit | Submit a qualification questionnaire response
*Api.DefaultApi* | [**postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit**](docs/DefaultApi.md#postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/submit | Submit a qualification questionnaire form
*Api.DefaultApi* | [**postWebhooks**](docs/DefaultApi.md#postWebhooks) | **POST** /webhooks | Creates a webhook subscription which is associated to the user
*Api.DefaultApi* | [**putWebhooksId**](docs/DefaultApi.md#putWebhooksId) | **PUT** /webhooks/{id} | Updates webhook subscription and webhooks subcription deals
*Api.IncentivePlanApi* | [**getDealIncentivePlansTime**](docs/IncentivePlanApi.md#getDealIncentivePlansTime) | **GET** /deals/{id}/incentive_plans/time | Get incentive plans by deal id
*Api.IncentivePlanApi* | [**patchDealIncentivePlan**](docs/IncentivePlanApi.md#patchDealIncentivePlan) | **PATCH** /deals/{id}/incentive_plans/{incentive_plan_id} | Updates incentive plan by deal id
*Api.IncentivePlanApi* | [**postDealIncentivePlan**](docs/IncentivePlanApi.md#postDealIncentivePlan) | **POST** /deals/{id}/incentive_plans | Creates incentive plan by deal id
*Api.InvestorApi* | [**add506cDocument**](docs/InvestorApi.md#add506cDocument) | **POST** /deals/{id}/investors/{investor_id}/add_506c_document | Add 506c document for deal investor
*Api.InvestorApi* | [**addDocument**](docs/InvestorApi.md#addDocument) | **POST** /deals/{id}/investors/{investor_id}/add_document | Add document for deal investor
*Api.InvestorApi* | [**bulkUploadInvestors**](docs/InvestorApi.md#bulkUploadInvestors) | **POST** /deals/{id}/investors/bulk_upload | Bulk upload investors for deal investor
*Api.InvestorApi* | [**createInvestor**](docs/InvestorApi.md#createInvestor) | **POST** /deals/{id}/investors | Create a deal investor
*Api.InvestorApi* | [**deleteDocument**](docs/InvestorApi.md#deleteDocument) | **DELETE** /deals/{id}/investors/{investor_id}/delete_document/{document_id} | Delete document for deal investor
*Api.InvestorApi* | [**deleteInvestorProfile**](docs/InvestorApi.md#deleteInvestorProfile) | **DELETE** /investor_profiles/{type}/{id} | Delete investor profile.
*Api.InvestorApi* | [**editInvestorTags**](docs/InvestorApi.md#editInvestorTags) | **POST** /deals/{id}/investors/{investor_id}/edit_tags | Append or replace tag(s) for a specific investor
*Api.InvestorApi* | [**getDealInvestorSearchEntities**](docs/InvestorApi.md#getDealInvestorSearchEntities) | **GET** /deals/{id}/investors/{investor_id}/search_entities | Get the search entities attached to the investor
*Api.InvestorApi* | [**getEnforcements**](docs/InvestorApi.md#getEnforcements) | **GET** /deals/{id}/investors/{investor_id}/background_checks/{search_entity_id}/enforcements | Get enforcements for a background search
*Api.InvestorApi* | [**getIncentivePlan**](docs/InvestorApi.md#getIncentivePlan) | **GET** /deals/{id}/investors/{investor_id}/incentive_plan | Get investor incentive plan by investor id
*Api.InvestorApi* | [**getInvestor**](docs/InvestorApi.md#getInvestor) | **GET** /deals/{id}/investors/{investor_id} | Get a deal investor by id
*Api.InvestorApi* | [**getInvestorOtpLink**](docs/InvestorApi.md#getInvestorOtpLink) | **GET** /deals/{id}/investors/{investor_id}/otp_access_link | Get OTP access link for deal investor
*Api.InvestorApi* | [**listInvestors**](docs/InvestorApi.md#listInvestors) | **GET** /deals/{id}/investors | List deal investors
*Api.InvestorApi* | [**patchInvestor**](docs/InvestorApi.md#patchInvestor) | **PATCH** /deals/{id}/investors/{investor_id} | Patch a deal investor
*Api.InvestorApi* | [**runBackgroundSearch**](docs/InvestorApi.md#runBackgroundSearch) | **POST** /deals/{id}/investors/{investor_id}/background_checks/run | Run Alloy background search for the investor
*Api.InvestorApi* | [**updateInvestor**](docs/InvestorApi.md#updateInvestor) | **PUT** /deals/{id}/investors/{investor_id} | Update a deal investor
*Api.InvestorProfileApi* | [**createCorporationProfile**](docs/InvestorProfileApi.md#createCorporationProfile) | **POST** /investor_profiles/corporations | Create new corporation investor profile.
*Api.InvestorProfileApi* | [**createIndividualProfile**](docs/InvestorProfileApi.md#createIndividualProfile) | **POST** /investor_profiles/individuals | Create new individual investor profile
*Api.InvestorProfileApi* | [**createJointProfile**](docs/InvestorProfileApi.md#createJointProfile) | **POST** /investor_profiles/joints | Create new joint investor profile
*Api.InvestorProfileApi* | [**createManagedProfile**](docs/InvestorProfileApi.md#createManagedProfile) | **POST** /investor_profiles/managed | Create new managed investor profile.
*Api.InvestorProfileApi* | [**createTrustProfile**](docs/InvestorProfileApi.md#createTrustProfile) | **POST** /investor_profiles/trusts | Create new trust investor profile.
*Api.InvestorProfileApi* | [**getDealInvestorProfiles**](docs/InvestorProfileApi.md#getDealInvestorProfiles) | **GET** /investor_profiles/{deal_id} | Get list of InvestorProfiles for a specific deal
*Api.InvestorProfileApi* | [**getInvestorProfile**](docs/InvestorProfileApi.md#getInvestorProfile) | **GET** /investor_profiles/profile/{id} | Get an investor profile by id
*Api.InvestorProfileApi* | [**getInvestorProfiles**](docs/InvestorProfileApi.md#getInvestorProfiles) | **GET** /investor_profiles | Get list of InvestorProfiles
*Api.InvestorProfileApi* | [**patchCorporationProfile**](docs/InvestorProfileApi.md#patchCorporationProfile) | **PATCH** /investor_profiles/corporations/{investor_profile_id} | Patch a corporation investor profile
*Api.InvestorProfileApi* | [**patchIndividualProfile**](docs/InvestorProfileApi.md#patchIndividualProfile) | **PATCH** /investor_profiles/individuals/{investor_profile_id} | Patch an individual investor profile.
*Api.InvestorProfileApi* | [**patchJointProfile**](docs/InvestorProfileApi.md#patchJointProfile) | **PATCH** /investor_profiles/joints/{investor_profile_id} | Patch a joint investor profile
*Api.InvestorProfileApi* | [**patchTrustProfile**](docs/InvestorProfileApi.md#patchTrustProfile) | **PATCH** /investor_profiles/trusts/{investor_profile_id} | Patch a trust investor profile
*Api.ShareholderApi* | [**getShareholders**](docs/ShareholderApi.md#getShareholders) | **GET** /companies/{id}/shareholders | Get a company shareholders list
*Api.ShareholderApi* | [**getShareholdersTags**](docs/ShareholderApi.md#getShareholdersTags) | **GET** /companies/{id}/shareholders/tags | Get a company shareholders list grouped by tags
*Api.UploadApi* | [**generateUrl**](docs/UploadApi.md#generateUrl) | **POST** /uploads/generate_url | Create a presigned URL for Amazon S3
*Api.UserApi* | [**getUser**](docs/UserApi.md#getUser) | **GET** /users/{id} | Get user by User ID
*Api.UserApi* | [**updateUserPassword**](docs/UserApi.md#updateUserPassword) | **PUT** /users/{id}/update_password | Update user password
*Api.UsersApi* | [**getUsersInvestments**](docs/UsersApi.md#getUsersInvestments) | **GET** /users/investments | Gets the investments for a specific user.


## Documentation for Models

 - [Api.Add506cDocumentRequest](docs/Add506cDocumentRequest.md)
 - [Api.AddDocumentRequest](docs/AddDocumentRequest.md)
 - [Api.BulkUploadInvestorsRequest](docs/BulkUploadInvestorsRequest.md)
 - [Api.CreateBulkUploadDetailRequest](docs/CreateBulkUploadDetailRequest.md)
 - [Api.CreateBulkUploadRequest](docs/CreateBulkUploadRequest.md)
 - [Api.CreateCompanyRequest](docs/CreateCompanyRequest.md)
 - [Api.CreateDealSetupRequest](docs/CreateDealSetupRequest.md)
 - [Api.CreateEmailTemplateRequest](docs/CreateEmailTemplateRequest.md)
 - [Api.CreateMembersBulkUploadRequest](docs/CreateMembersBulkUploadRequest.md)
 - [Api.CreateShareholderActionRequest](docs/CreateShareholderActionRequest.md)
 - [Api.EditInvestorTagsRequest](docs/EditInvestorTagsRequest.md)
 - [Api.GenerateUrlRequest](docs/GenerateUrlRequest.md)
 - [Api.GetAccessTokenRequest](docs/GetAccessTokenRequest.md)
 - [Api.PatchDealIncentivePlanRequest](docs/PatchDealIncentivePlanRequest.md)
 - [Api.PatchInvestorProfilesCorporations](docs/PatchInvestorProfilesCorporations.md)
 - [Api.PatchInvestorProfilesCorporationsBeneficialOwnersInner](docs/PatchInvestorProfilesCorporationsBeneficialOwnersInner.md)
 - [Api.PatchInvestorProfilesIndividuals](docs/PatchInvestorProfilesIndividuals.md)
 - [Api.PatchInvestorProfilesJoints](docs/PatchInvestorProfilesJoints.md)
 - [Api.PatchInvestorProfilesTrusts](docs/PatchInvestorProfilesTrusts.md)
 - [Api.PatchInvestorProfilesTrustsTrusteesInner](docs/PatchInvestorProfilesTrustsTrusteesInner.md)
 - [Api.PatchInvestorRequest](docs/PatchInvestorRequest.md)
 - [Api.PostDealIncentivePlanRequest](docs/PostDealIncentivePlanRequest.md)
 - [Api.PostDealsIdInvestors](docs/PostDealsIdInvestors.md)
 - [Api.PostInvestorProfilesCorporations](docs/PostInvestorProfilesCorporations.md)
 - [Api.PostInvestorProfilesCorporationsBeneficialOwnersInner](docs/PostInvestorProfilesCorporationsBeneficialOwnersInner.md)
 - [Api.PostInvestorProfilesIndividuals](docs/PostInvestorProfilesIndividuals.md)
 - [Api.PostInvestorProfilesJoints](docs/PostInvestorProfilesJoints.md)
 - [Api.PostInvestorProfilesManaged](docs/PostInvestorProfilesManaged.md)
 - [Api.PostInvestorProfilesTrusts](docs/PostInvestorProfilesTrusts.md)
 - [Api.PostInvestorProfilesTrustsTrusteesInner](docs/PostInvestorProfilesTrustsTrusteesInner.md)
 - [Api.PostWebhooksRequest](docs/PostWebhooksRequest.md)
 - [Api.PutDealsIdInvestors](docs/PutDealsIdInvestors.md)
 - [Api.PutDealsIdScriptTagEnvironmentRequest](docs/PutDealsIdScriptTagEnvironmentRequest.md)
 - [Api.PutWebhooksIdRequest](docs/PutWebhooksIdRequest.md)
 - [Api.RunBackgroundSearchRequest](docs/RunBackgroundSearchRequest.md)
 - [Api.SendPortalInviteRequest](docs/SendPortalInviteRequest.md)
 - [Api.UpdateUserPasswordRequest](docs/UpdateUserPasswordRequest.md)
 - [Api.V1EntitiesAddress](docs/V1EntitiesAddress.md)
 - [Api.V1EntitiesAddresses](docs/V1EntitiesAddresses.md)
 - [Api.V1EntitiesAttachment](docs/V1EntitiesAttachment.md)
 - [Api.V1EntitiesBackgroundCheckSearch](docs/V1EntitiesBackgroundCheckSearch.md)
 - [Api.V1EntitiesBeefreeAccessToken](docs/V1EntitiesBeefreeAccessToken.md)
 - [Api.V1EntitiesBulkUpload](docs/V1EntitiesBulkUpload.md)
 - [Api.V1EntitiesBulkUploadDetail](docs/V1EntitiesBulkUploadDetail.md)
 - [Api.V1EntitiesBulkUploadDetails](docs/V1EntitiesBulkUploadDetails.md)
 - [Api.V1EntitiesBulkUploads](docs/V1EntitiesBulkUploads.md)
 - [Api.V1EntitiesCompany](docs/V1EntitiesCompany.md)
 - [Api.V1EntitiesCompanyDeal](docs/V1EntitiesCompanyDeal.md)
 - [Api.V1EntitiesCompanyDeals](docs/V1EntitiesCompanyDeals.md)
 - [Api.V1EntitiesCountries](docs/V1EntitiesCountries.md)
 - [Api.V1EntitiesCountry](docs/V1EntitiesCountry.md)
 - [Api.V1EntitiesDeal](docs/V1EntitiesDeal.md)
 - [Api.V1EntitiesDealEnterprise](docs/V1EntitiesDealEnterprise.md)
 - [Api.V1EntitiesDealFundingMetrics](docs/V1EntitiesDealFundingMetrics.md)
 - [Api.V1EntitiesDealInvestorMetrics](docs/V1EntitiesDealInvestorMetrics.md)
 - [Api.V1EntitiesDealIssuer](docs/V1EntitiesDealIssuer.md)
 - [Api.V1EntitiesDealSetup](docs/V1EntitiesDealSetup.md)
 - [Api.V1EntitiesDealSetupUser](docs/V1EntitiesDealSetupUser.md)
 - [Api.V1EntitiesDeals](docs/V1EntitiesDeals.md)
 - [Api.V1EntitiesDealsIncentivePlan](docs/V1EntitiesDealsIncentivePlan.md)
 - [Api.V1EntitiesDealsIncentivePlansIncentiveTier](docs/V1EntitiesDealsIncentivePlansIncentiveTier.md)
 - [Api.V1EntitiesDealsPriceDetails](docs/V1EntitiesDealsPriceDetails.md)
 - [Api.V1EntitiesDividend](docs/V1EntitiesDividend.md)
 - [Api.V1EntitiesDividends](docs/V1EntitiesDividends.md)
 - [Api.V1EntitiesEmailEvent](docs/V1EntitiesEmailEvent.md)
 - [Api.V1EntitiesEmailEvents](docs/V1EntitiesEmailEvents.md)
 - [Api.V1EntitiesEmailTemplate](docs/V1EntitiesEmailTemplate.md)
 - [Api.V1EntitiesExpressWireInstruction](docs/V1EntitiesExpressWireInstruction.md)
 - [Api.V1EntitiesExpressWireInstructions](docs/V1EntitiesExpressWireInstructions.md)
 - [Api.V1EntitiesGenericResponse](docs/V1EntitiesGenericResponse.md)
 - [Api.V1EntitiesInvestor](docs/V1EntitiesInvestor.md)
 - [Api.V1EntitiesInvestorOtpAccessLink](docs/V1EntitiesInvestorOtpAccessLink.md)
 - [Api.V1EntitiesInvestorProfileAddress](docs/V1EntitiesInvestorProfileAddress.md)
 - [Api.V1EntitiesInvestorProfileCorporation](docs/V1EntitiesInvestorProfileCorporation.md)
 - [Api.V1EntitiesInvestorProfileFieldsAccountHolder](docs/V1EntitiesInvestorProfileFieldsAccountHolder.md)
 - [Api.V1EntitiesInvestorProfileFieldsBeneficialOwner](docs/V1EntitiesInvestorProfileFieldsBeneficialOwner.md)
 - [Api.V1EntitiesInvestorProfileFieldsBeneficiary](docs/V1EntitiesInvestorProfileFieldsBeneficiary.md)
 - [Api.V1EntitiesInvestorProfileFieldsCorporation](docs/V1EntitiesInvestorProfileFieldsCorporation.md)
 - [Api.V1EntitiesInvestorProfileFieldsPrimaryHolder](docs/V1EntitiesInvestorProfileFieldsPrimaryHolder.md)
 - [Api.V1EntitiesInvestorProfileFieldsProvider](docs/V1EntitiesInvestorProfileFieldsProvider.md)
 - [Api.V1EntitiesInvestorProfileFieldsSigningOfficer](docs/V1EntitiesInvestorProfileFieldsSigningOfficer.md)
 - [Api.V1EntitiesInvestorProfileFieldsTrust](docs/V1EntitiesInvestorProfileFieldsTrust.md)
 - [Api.V1EntitiesInvestorProfileFieldsTrustee](docs/V1EntitiesInvestorProfileFieldsTrustee.md)
 - [Api.V1EntitiesInvestorProfileId](docs/V1EntitiesInvestorProfileId.md)
 - [Api.V1EntitiesInvestorProfileIndividual](docs/V1EntitiesInvestorProfileIndividual.md)
 - [Api.V1EntitiesInvestorProfileItem](docs/V1EntitiesInvestorProfileItem.md)
 - [Api.V1EntitiesInvestorProfileJoint](docs/V1EntitiesInvestorProfileJoint.md)
 - [Api.V1EntitiesInvestorProfileManaged](docs/V1EntitiesInvestorProfileManaged.md)
 - [Api.V1EntitiesInvestorProfileOwner](docs/V1EntitiesInvestorProfileOwner.md)
 - [Api.V1EntitiesInvestorProfileTrust](docs/V1EntitiesInvestorProfileTrust.md)
 - [Api.V1EntitiesInvestorProfiles](docs/V1EntitiesInvestorProfiles.md)
 - [Api.V1EntitiesInvestorSearchEntities](docs/V1EntitiesInvestorSearchEntities.md)
 - [Api.V1EntitiesInvestorSearchEntitiesRequiredFields](docs/V1EntitiesInvestorSearchEntitiesRequiredFields.md)
 - [Api.V1EntitiesInvestorUser](docs/V1EntitiesInvestorUser.md)
 - [Api.V1EntitiesInvestors](docs/V1EntitiesInvestors.md)
 - [Api.V1EntitiesMembersBulkUpload](docs/V1EntitiesMembersBulkUpload.md)
 - [Api.V1EntitiesMembersBulkUploads](docs/V1EntitiesMembersBulkUploads.md)
 - [Api.V1EntitiesMoneyEntity](docs/V1EntitiesMoneyEntity.md)
 - [Api.V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData](docs/V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData.md)
 - [Api.V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData](docs/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData.md)
 - [Api.V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult](docs/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult.md)
 - [Api.V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult](docs/V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult.md)
 - [Api.V1EntitiesPresignedUrlResult](docs/V1EntitiesPresignedUrlResult.md)
 - [Api.V1EntitiesShareholder](docs/V1EntitiesShareholder.md)
 - [Api.V1EntitiesShareholderLedger](docs/V1EntitiesShareholderLedger.md)
 - [Api.V1EntitiesShareholders](docs/V1EntitiesShareholders.md)
 - [Api.V1EntitiesShareholdersTags](docs/V1EntitiesShareholdersTags.md)
 - [Api.V1EntitiesState](docs/V1EntitiesState.md)
 - [Api.V1EntitiesSubscriptionAgreement](docs/V1EntitiesSubscriptionAgreement.md)
 - [Api.V1EntitiesUser](docs/V1EntitiesUser.md)
 - [Api.V1EntitiesWebhooksDeal](docs/V1EntitiesWebhooksDeal.md)
 - [Api.V1EntitiesWebhooksSecurityToken](docs/V1EntitiesWebhooksSecurityToken.md)
 - [Api.V1EntitiesWebhooksSubscription](docs/V1EntitiesWebhooksSubscription.md)
 - [Api.V1EntitiesWebhooksSubscriptionDeal](docs/V1EntitiesWebhooksSubscriptionDeal.md)
 - [Api.V1EntitiesWebhooksSubscriptionDeals](docs/V1EntitiesWebhooksSubscriptionDeals.md)


## Documentation for Authorization

Endpoints do not require authorization.

