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

The type of data that the webhooks include:

- Investor Name
- Date created
- Email
- Phone
- Allocation
- Attachments
- Accredited investor status
- Accredited investor category
- Status (Draft, Invited, Accepted, Waiting)

Via webhooks clients can subscribe to the following events as they happen on Dealmaker:

- Investor is created
- Investor details are updated (any of the investor details above change or are updated)
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
   - An email address that will be used to notify about errors.
5. The developers can disable webhooks temporarily if needed

## Specification

### Events

The initial set of events will be related to the investor. The events are:

1. `investor.created`

   - Triggers every time a new investor is added to a deal

2. `investor.updated`

   - Triggers on updates to any of the following fields:
     1. Status
     2. Name
     3. Email - (this is a user field so we trigger event for all investors with webhook subscription)
     4. Allocated Amount
     5. Investment Amount
     6. Accredited investor fields
     7. Adding or removing attachments
     8. Tags
   - When the investor status is signed, the payload also includes a link to the signed document; the link expires after 30 minutes

3. `investor.deleted`

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

| Key               | Type   | Description                                                                            |
| ----------------- | ------ | -------------------------------------------------------------------------------------- |
| event             | String | The event that triggered the call                                                      |
| event_id          | String | A unique identifier for the event                                                      |
| deal<sup>\\*</sup> | Object | The deal in which the event occurred. It includes id, title, created_at and updated_at |

<sup>\\*</sup>This field is not included when deleting a resource

#### Common Properties (investor scope)

Every event on this scope must contain an investor object, here are some properties that are common to this object on all events in the investor scope:

| Key                 | Type             | Description                                                                                                              |
| ------------------- | ---------------- | ------------------------------------------------------------------------------------------------------------------------ |
| id                  | Integer          | The unique ID of the Investor                                                                                            |
| name                | String           | Investor’s Name                                                                                                          |
| status              | String           | Current status of the investor<br />Possible states are: <br />draft<br />invited<br />signed<br />waiting<br />accepted |
| email               | String           |                                                                                                                          |
| phone_number        | String           |                                                                                                                          |
| investment_amount   | Double           |                                                                                                                          |
| allocated_amount    | Double           |                                                                                                                          |
| accredited_investor | Object           | See format in respective ticket                                                                                          |
| attachments         | Array of Objects | List of supporting documents uploaded to the investor, including URL (expire after 30 minutes) and title (caption)       |
| funding_state       | String           | Investor’s current funding state (unfunded, underfunded, funded, overfunded)                                             |
| funds_pending       | Boolean          | True if there are pending transactions, False otherwise                                                                  |
| created_at          | Date             |                                                                                                                          |
| updated_at          | Date             |                                                                                                                          |
| tags                | Array of Strings | a list of the investor's tags, separated by comma.                                                                       |

### investor.status >= signed Specific Properties

| Key                    | Type   | Description            |
| ---------------------- | ------ | ---------------------- |
| subscription_agreement | object | id, url (expiring URL) |

#### Investor Status

Here is a brief description of each investor state:

- **Draft:** the investor is added to the platform but hasn't been invited yet and cannot access the portal
- **Invited:** the investor was added to the platform but hasn’t completed the questionnaire
- **Signed:** the investor signed the document (needs approval from Lawyer or Reviewer before countersignature)
- **Waiting:** the investor was approved for countersignature by any of the Lawyers or Reviewers in the deal
- **Accepted:** the investor's agreement was countersigned by the Signatory

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




$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_company_request = new \DealMaker\Model\CreateCompanyRequest(); // \DealMaker\Model\CreateCompanyRequest

try {
    $result = $apiInstance->createCompany($create_company_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->createCompany: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *http://api.dealmaker.tech*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*CompanyApi* | [**createCompany**](docs/Api/CompanyApi.md#createcompany) | **POST** /companies | Create new company
*CompanyApi* | [**getCompanies**](docs/Api/CompanyApi.md#getcompanies) | **GET** /companies | Get list of Companies
*CompanyApi* | [**getCompany**](docs/Api/CompanyApi.md#getcompany) | **GET** /companies/{id} | Get a Company
*DealApi* | [**getDeal**](docs/Api/DealApi.md#getdeal) | **GET** /deals/{id} | Get deal by Deal ID
*DealApi* | [**listDeals**](docs/Api/DealApi.md#listdeals) | **GET** /deals | List available deals
*DealSetupApi* | [**createDealSetup**](docs/Api/DealSetupApi.md#createdealsetup) | **POST** /deal_setups | Create deal setup
*DefaultApi* | [**getWebhooks**](docs/Api/DefaultApi.md#getwebhooks) | **GET** /webhooks | Returns a list of webhook subscription which is associated to the user
*DefaultApi* | [**getWebhooksDealId**](docs/Api/DefaultApi.md#getwebhooksdealid) | **GET** /webhooks/deal/{id} | Finds a deal using the id
*DefaultApi* | [**getWebhooksDealsSearch**](docs/Api/DefaultApi.md#getwebhooksdealssearch) | **GET** /webhooks/deals/search | Searches for deals for a given user
*DefaultApi* | [**getWebhooksSecurityToken**](docs/Api/DefaultApi.md#getwebhookssecuritytoken) | **GET** /webhooks/security_token | Creates a new security token for webhook subscription
*DefaultApi* | [**postWebhooks**](docs/Api/DefaultApi.md#postwebhooks) | **POST** /webhooks | Creates a webhook subscription which is associated to the user
*DefaultApi* | [**putWebhooksId**](docs/Api/DefaultApi.md#putwebhooksid) | **PUT** /webhooks/{id} | Updates webhook subscription and webhooks subcription deals
*InvestorApi* | [**createInvestor**](docs/Api/InvestorApi.md#createinvestor) | **POST** /deals/{id}/investors | Create a deal investor
*InvestorApi* | [**getInvestor**](docs/Api/InvestorApi.md#getinvestor) | **GET** /deals/{id}/investors/{investor_id} | Get a deal investor by id
*InvestorApi* | [**listInvestors**](docs/Api/InvestorApi.md#listinvestors) | **GET** /deals/{id}/investors | List deal investors
*InvestorApi* | [**patchInvestor**](docs/Api/InvestorApi.md#patchinvestor) | **PATCH** /deals/{id}/investors/{investor_id} | Patch a deal investor
*InvestorApi* | [**updateInvestor**](docs/Api/InvestorApi.md#updateinvestor) | **PUT** /deals/{id}/investors/{investor_id} | Update a deal investor
*InvestorProfileApi* | [**createCorporationProfile**](docs/Api/InvestorProfileApi.md#createcorporationprofile) | **POST** /investor_profiles/corporations | Create new corporation investor profile.
*InvestorProfileApi* | [**createIndividualProfile**](docs/Api/InvestorProfileApi.md#createindividualprofile) | **POST** /investor_profiles/individuals | Create new individual investor profile
*InvestorProfileApi* | [**createJointProfile**](docs/Api/InvestorProfileApi.md#createjointprofile) | **POST** /investor_profiles/joints | Create new joint investor profile
*InvestorProfileApi* | [**createTrustProfile**](docs/Api/InvestorProfileApi.md#createtrustprofile) | **POST** /investor_profiles/trusts | Create new trust investor profile.
*InvestorProfileApi* | [**getInvestorProfiles**](docs/Api/InvestorProfileApi.md#getinvestorprofiles) | **GET** /investor_profiles | Get list of InvestorProfiles
*InvestorProfileApi* | [**patchCorporationProfile**](docs/Api/InvestorProfileApi.md#patchcorporationprofile) | **PATCH** /investor_profiles/corporations/{investor_profile_id} | Patch a corporation investor profile
*InvestorProfileApi* | [**patchIndividualProfile**](docs/Api/InvestorProfileApi.md#patchindividualprofile) | **PATCH** /investor_profiles/individuals/{investor_profile_id} | Patch an individual investor profile.
*InvestorProfileApi* | [**patchJointProfile**](docs/Api/InvestorProfileApi.md#patchjointprofile) | **PATCH** /investor_profiles/joints/{investor_profile_id} | Patch a joint investor profile
*InvestorProfileApi* | [**patchTrustProfile**](docs/Api/InvestorProfileApi.md#patchtrustprofile) | **PATCH** /investor_profiles/trusts/{investor_profile_id} | Patch a trust investor profile

## Models

- [CreateCompanyRequest](docs/Model/CreateCompanyRequest.md)
- [CreateCorporationProfileRequest](docs/Model/CreateCorporationProfileRequest.md)
- [CreateDealSetupRequest](docs/Model/CreateDealSetupRequest.md)
- [CreateIndividualProfileRequest](docs/Model/CreateIndividualProfileRequest.md)
- [CreateInvestorRequest](docs/Model/CreateInvestorRequest.md)
- [CreateJointProfileRequest](docs/Model/CreateJointProfileRequest.md)
- [CreateTrustProfileRequest](docs/Model/CreateTrustProfileRequest.md)
- [PatchCorporationProfileRequest](docs/Model/PatchCorporationProfileRequest.md)
- [PatchIndividualProfileRequest](docs/Model/PatchIndividualProfileRequest.md)
- [PatchInvestorRequest](docs/Model/PatchInvestorRequest.md)
- [PatchJointProfileRequest](docs/Model/PatchJointProfileRequest.md)
- [PatchTrustProfileRequest](docs/Model/PatchTrustProfileRequest.md)
- [PostWebhooksRequest](docs/Model/PostWebhooksRequest.md)
- [PutWebhooksIdRequest](docs/Model/PutWebhooksIdRequest.md)
- [UpdateInvestorRequest](docs/Model/UpdateInvestorRequest.md)
- [V1EntitiesAddress](docs/Model/V1EntitiesAddress.md)
- [V1EntitiesAddresses](docs/Model/V1EntitiesAddresses.md)
- [V1EntitiesAttachment](docs/Model/V1EntitiesAttachment.md)
- [V1EntitiesBackgroundCheckSearch](docs/Model/V1EntitiesBackgroundCheckSearch.md)
- [V1EntitiesCompany](docs/Model/V1EntitiesCompany.md)
- [V1EntitiesCompanyDeal](docs/Model/V1EntitiesCompanyDeal.md)
- [V1EntitiesCompanyDeals](docs/Model/V1EntitiesCompanyDeals.md)
- [V1EntitiesDeal](docs/Model/V1EntitiesDeal.md)
- [V1EntitiesDealEnterprise](docs/Model/V1EntitiesDealEnterprise.md)
- [V1EntitiesDealFundingMetrics](docs/Model/V1EntitiesDealFundingMetrics.md)
- [V1EntitiesDealInvestorMetrics](docs/Model/V1EntitiesDealInvestorMetrics.md)
- [V1EntitiesDealIssuer](docs/Model/V1EntitiesDealIssuer.md)
- [V1EntitiesDealSetup](docs/Model/V1EntitiesDealSetup.md)
- [V1EntitiesDealSetupUser](docs/Model/V1EntitiesDealSetupUser.md)
- [V1EntitiesDeals](docs/Model/V1EntitiesDeals.md)
- [V1EntitiesInvestor](docs/Model/V1EntitiesInvestor.md)
- [V1EntitiesInvestorProfileAddress](docs/Model/V1EntitiesInvestorProfileAddress.md)
- [V1EntitiesInvestorProfileCorporation](docs/Model/V1EntitiesInvestorProfileCorporation.md)
- [V1EntitiesInvestorProfileFieldsAccountHolder](docs/Model/V1EntitiesInvestorProfileFieldsAccountHolder.md)
- [V1EntitiesInvestorProfileFieldsCorporation](docs/Model/V1EntitiesInvestorProfileFieldsCorporation.md)
- [V1EntitiesInvestorProfileFieldsPrimaryHolder](docs/Model/V1EntitiesInvestorProfileFieldsPrimaryHolder.md)
- [V1EntitiesInvestorProfileFieldsTrust](docs/Model/V1EntitiesInvestorProfileFieldsTrust.md)
- [V1EntitiesInvestorProfileIndividual](docs/Model/V1EntitiesInvestorProfileIndividual.md)
- [V1EntitiesInvestorProfileItem](docs/Model/V1EntitiesInvestorProfileItem.md)
- [V1EntitiesInvestorProfileJoint](docs/Model/V1EntitiesInvestorProfileJoint.md)
- [V1EntitiesInvestorProfileTrust](docs/Model/V1EntitiesInvestorProfileTrust.md)
- [V1EntitiesInvestorProfiles](docs/Model/V1EntitiesInvestorProfiles.md)
- [V1EntitiesInvestorUser](docs/Model/V1EntitiesInvestorUser.md)
- [V1EntitiesInvestors](docs/Model/V1EntitiesInvestors.md)
- [V1EntitiesSubscriptionAgreement](docs/Model/V1EntitiesSubscriptionAgreement.md)
- [V1EntitiesWebhooksDeal](docs/Model/V1EntitiesWebhooksDeal.md)
- [V1EntitiesWebhooksSecurityToken](docs/Model/V1EntitiesWebhooksSecurityToken.md)
- [V1EntitiesWebhooksSubscription](docs/Model/V1EntitiesWebhooksSubscription.md)
- [V1EntitiesWebhooksSubscriptionDeal](docs/Model/V1EntitiesWebhooksSubscriptionDeal.md)
- [V1EntitiesWebhooksSubscriptionDeals](docs/Model/V1EntitiesWebhooksSubscriptionDeals.md)

## Authorization
All endpoints do not require authorization.
## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0.0`
    - Package version: `0.70.5`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
