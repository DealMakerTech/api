/**
 * DealMaker API
 * # Introduction  Welcome to DealMaker’s Web API v1! This API is RESTful, easy to integrate with, and offers support in 2 different languages. This is the technical documentation for our API. There are tutorials and examples of integrations with our API available on our [knowledge centre](https://help.dealmaker.tech/training-centre) as well.  # Libraries  - Javascript - Ruby  # Authentication  To authenticate, add an Authorization header to your API request that contains an access token. Before you [generate an access token](#how-to-generate-an-access-token) your must first [create an application](#create-an-application) on your portal and retrieve the your client ID and secret  ## Create an Application  DealMaker’s Web API v1 supports the use of OAuth applications. Applications can be generated in your [account](https://app.dealmaker.tech/developer/applications).  To create an API Application, click on your user name in the top right corner to open a dropdown menu, and select \"Integrations\". Under the API settings tab, click the `Create New Application` button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-1.png)  Name your application and assign the level of permissions for this application  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-2.png)  Once your application is created, save in a secure space your client ID and secret.  **WARNING**: The secret key will not be visible after you click the close button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-3.png)  From the developer tab, you will be able to view and manage all the available applications  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-4.png)  Each Application consists of a client id, secret and set of scopes. The scopes define what resources you want to have access to. The client ID and secret are used to generate an access token. You will need to create an application to use API endpoints.  ## How to generate an access token  After creating an application, you must make a call to obtain a bearer token using the Generate an OAuth token operation. This operation requires the following parameters:  `token endpoint` - https://app.dealmaker.tech/oauth/token  `grant_type` - must be set to `client_credentials`  `client_id` - the Client ID displayed when you created the OAuth application in the previous step  `client_secret` - the Client Secret displayed when you created the OAuth application in the previous step  `scope` - the scope is established when you created the OAuth application in the previous step  Note: The Generate an OAuth token response specifies how long the bearer token is valid for. You should reuse the bearer token until it is expired. When the token is expired, call Generate an OAuth token again to generate a new one.  To use the access token, you must set a plain text header named `Authorization` with the contents of the header being “Bearer XXX” where XXX is your generated access token.  ### Example  #### Postman  Here's an example on how to generate the access token with Postman, where `{{CLIENT_ID}}` and `{{CLIENT_SECRET}}` are the values generated after following the steps on [Create an Application](#create-an-application)  ![Get access token postman example](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/token-postman.png)  # Status Codes  ## Content-Type Header  All responses are returned in JSON format. We specify this by sending the Content-Type header.  ## Status Codes  Below is a table containing descriptions of the various status codes we currently support against various resources.  Sometimes your API call will generate an error. Here you will find additional information about what to expect if you don’t format your request properly, or we fail to properly process your request.  | Status Code | Description | | ----------- | ----------- | | `200`       | Success     | | `403`       | Forbidden   | | `404`       | Not found   |  # Pagination  Pagination is used to divide large responses is smaller portions (pages). By default, all endpoints return a maximum of 25 records per page. You can change the number of records on a per request basis by passing a `per_page` parameter in the request header parameters. The largest supported `per_page` parameter is 100.  When the response exceeds the `per_page` parameter, you can paginate through the records by increasing the `offset` parameter. Example: `offset=25` will return 25 records starting from 26th record. You may also paginate using the `page` parameter to indicate the page number you would like to show on the response.  Please review the table below for the input parameters  ## Inputs  | Parameter  | Description                                                                     | | ---------- | ------------------------------------------------------------------------------- | | `per_page` | Amount of records included on each page (Default is 25)                         | | `page`     | Page number                                                                     | | `offset`   | Amount of records offset on the API request where 0 represents the first record |  ## Response Headers  | Response Header | Description                                  | | --------------- | -------------------------------------------- | | `X-Total`       | Total number of records of response          | | `X-Total-Pages` | Total number of pages of response            | | `X-Per-Page`    | Total number of records per page of response | | `X-Page`        | Number of current page                       | | `X-Next-Page`   | Number of next page                          | | `X-Prev-Page`   | Number of previous page                      | | `X-Offset`      | Total number of records offset               |  # Search and Filtering (The q parameter)  The q optional parameter accepts a string as input and allows you to filter the request based on that string. Please note that search strings must be encoded according to ASCII. For example, \"john+investor&#64;dealmaker.tech\" should be passed as “john%2Binvestor%40dealmaker.tech”. There are two main ways to filter with it.  ## Keyword filtering  Some keywords allow you to filter investors based on a specific “scope” of the investors, for example using the string “Invited” will filter all investors with the status invited, and the keyword “Has attachments” will filter investors with attachments.  Here’s a list of possible keywords and the “scope” each one of the keywords filters by:  | Keywords                                       | Scope                                                                       | Decoded Example                                                      | Encoded Example                                                                          | | ---------------------------------------------- | --------------------------------------------------------------------------- | -------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | | Signed on \\(date range\\)                       | Investors who signed in the provided date range                             | Signed on (date range) [2020-07-01:2020-07-31]                       | `Signed%20on%20%28date%20range%29%20%5B2020-07-01%3A2020-07-31%5D`                       | | Enabled for countersignature on \\(date range\\) | Investors who were enabled for counter signature in the provided date range | Enabled for countersignature on (date range) [2022-05-24:2022-05-25] | `Enabled%20for%20countersignature%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D` | | Accepted on \\(date range\\)                     | Investors accepted in the provided date rage                                | Accepted on (date range) [2022-05-24:2022-05-25]                     | `Accepted%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D`                         | | Offline                                        | Investors added to the deal offline                                         | Offline                                                              | `Offline`                                                                                | | Online                                         | Investors added to the deal online                                          | Online                                                               | `Online`                                                                                 | | Signed                                         | Investors who signed their agreement                                        | Signed                                                               | `Signed`                                                                                 | | Waiting for countersignature                   | Investors who have signed and are waiting for counter signature             | Waiting for countersignature                                         | `Waiting%20for%20countersignature`                                                       | | Invited                                        | Investors on the Invited Status                                             | Invited                                                              | `Invited`                                                                                | | Accepted                                       | Investors in the Accepted Status                                            | Accepted                                                             | `Accepted`                                                                               | | Questionnaire in progress                      | All Investors who have not finished completing the questionnaire            | Questionnaire in progress                                            | `Questionnaire%20in%20progress`                                                          | | Has attachments                                | All Investors with attachments                                              | Has attachments                                                      | `Has%20attachments`                                                                      | | Has notes                                      | All Investors with notes                                                    | Has notes                                                            | `Has%20notes`                                                                            | | Waiting for co-signature                       | Investors who have signed and are waiting for co-signature                  | Waiting for co-signature                                             | `Waiting%20for%20co-signature`                                                           | | Background Check Approved                      | Investors with approved background check                                    | Background Check Approved                                            | `Background%20Check%20Approved`                                                          | | Document Review Pending                        | Investors with pending review                                               | Document Review Pending                                              | `Document%20Review%20Pending`                                                            | | Document Upload Pending                        | Investors with pending documents to upload                                  | Document Upload Pending                                              | `Document%20Upload%20Pending`                                                            | | Required adjudicator review                    | Investors who are required to be review by the adjudicator                  | Required adjudicator review                                          | `Required%20adjudicator%20review`                                                        |  ---  **NOTE**  Filtering keywords are case sensitive and need to be encoded  ---  ## Search String  Any value for the parameter which does not match one of the keywords listed above, will use fields like `first name`, `last name`, `email`, `tags` to search for the investor.  For example, if you search “Robert”, because this does not match one of the keywords listed above, it will then return any investors who have the string “Robert” in their name, email, or tags fields.  # Versioning  The latest version is v1.  The version can be updated on the `Accept` header, just set the version as stated on the following example:  ```  Accept:application/vnd.dealmaker-v1+json  ```  | Version | Accept Header                       | | ------- | ----------------------------------- | | `v1`    | application/vnd.dealmaker-`v1`+json |  # SDK’s  For instruction on installing SDKs, please view the following links  - [Javascript](https://github.com/DealMakerTech/api/tree/main/v1/clients/javascript) - [Ruby](https://github.com/DealMakerTech/api/tree/main/v1/clients/ruby)  # Webhooks  Our webhooks functionality allows clients to automatically receive updates on a deal's investor data.  Some of the data that the webhooks include:  - Investor Name - Date created - Email - Phone - Allocation - Attachments - Accredited investor status - Accredited investor category - State (Draft, Invited, Signed, Accepted, Waiting, Inactive)  Via webhooks clients can subscribe to the following events as they happen on Dealmaker:  - Investor is created - Investor details are updated (any of the investor details above change or are updated) - Investor has signed their agreement - Invertor fully funded their investment - Investor has been accepted - Investor is deleted  A URL supplied by the client will receive all the events with the information as part of the payload. Clients are able to add and update the URL within DealMaker.  ## Configuration  For a comprehensive guide on how to configure Webhooks please visit our support article: [Configuring Webhooks on DealMaker – DealMaker Support](https://help.dealmaker.tech/configuring-webhooks-on-dealmaker).  As a developer user on DealMaker, you are able to configure webhooks by following the steps below:  1. Sign into Dealmaker 2. Go to **“Your profile”** in the top right corner 3. Access an **“Integrations”** configuration via the left menu 4. The developer configures webhooks by including:    - The HTTPS URL where the request will be sent    - Optionally, a security token that we would use to build a SHA1 hash that would be included in the request headers. The name of the header is `X-DealMaker-Signature`. If the secret is not specified, the hash won’t be included in the headers.    - The Deal(s) to include in the webhook subscription    - An email address that will be used to notify about errors. 5. The developers can disable webhooks temporarily if needed  ## Specification  ### Events  The initial set of events will be related to the investor. The events are:  1. `investor.created`     - Triggers every time a new investor is added to a deal  2. `investor.updated`     - Triggers on updates to any of the following fields:      - Status      - Name      - Email - (this is a user field so we trigger event for all investors with webhook subscription)      - Allocated Amount      - Investment Amount      - Accredited investor fields      - Adding or removing attachments      - Tags    - When the investor status is signed, the payload also includes a link to the signed document; the link expires after 30 minutes    3. `investor.signed`     - Triggers when the investor signs their subscription agreement (terms and conditions)      - When this happens the investor.state becomes `signed`    - This event includes the same fields as the `investor.updated` event  4. `investor.funded`     - Triggers when the investor becomes fully funded      - This happens when the investor.funded_state becomes `funded`    - This event includes the same fields as the `investor.updated` event  5. `investor.accepted`     - Triggers when the investor is countersigned      - When this happens the investor.state becomes `accepted`    - This event includes the same fields as the `investor.updated` event  6.  `investor.deleted`     - Triggers when the investor is removed from the deal    - The investor key of the payload only includes investor ID    - The deal is not included in the payload. Due to our implementation it’s impossible to retrieve the deal the investor was part of  ### Requests  - The request is a `POST` - The payload’s `content-type` is `application/json` - Only `2XX` responses are considered successful. In the event of a different response, we consider it failed and queue the event for retry - We retry the request five times, after the initial attempt. Doubling the waiting time between intervals with each try. The first retry happens after 30 seconds, then 60 seconds, 2 mins, 4 minutes, and 8 minutes. This timing scheme gives the receiver about 1 hour if all the requests fail - If an event fails all the attempts to be delivered, we send an email to the address that the user configured  ### Payload  #### Common Properties  There will be some properties that are common to all the events on the system.  | Key               | Type   | Description                                                                              | | ----------------- | ------ | --------------------------------------------------------------------------------------   | | event             | String | The event that triggered the call                                                        | | event_id          | String | A unique identifier for the event                                                        | | deal<sup>\\*</sup> | Object | The deal in which the event occurred. please see below for an example on the deal object<sup>\\*\\*</sup> |  <sup>\\*</sup>This field is not included when deleting a resource  <sup>\\*\\*</sup> Sample Deal Object in the webhook payload  ```json \"deal\": {         \"id\": 0,         \"title\": \"string\",         \"created_at\": \"2022-12-06T18:14:44.000Z\",         \"updated_at\": \"2022-12-08T12:46:48.000Z\",         \"state\": \"string\",         \"currency\": \"string\",         \"security_type\": \"string\",         \"price_per_security\": 0.00,         \"deal_type\": \"string\",         \"minimum_investment\": 0,         \"maximum_investment\": 0,         \"issuer\": {             \"id\": 0,             \"name\": \"string\"         },         \"enterprise\": {             \"id\": 0,             \"name\": \"string\"         }     } ```  #### Common Properties (investor scope)  By design, we have incorporated on the webhooks payload the same investor-related fields included in the Investor model, for reference on the included fields, their types and values please click [here](https://docs.dealmaker.tech/#tag/investor_model). This will allow you to get all the necessary information you need about a particular investor without having to call the Get Investor by ID endpoint.                                                           | #### Investor State  Here is a brief description of each investor state:  - **Draft:** the investor is added to the platform but hasn't been invited yet and cannot access the portal - **Invited:** the investor was added to the platform but hasn’t completed the questionnaire - **Signed:** the investor signed the document (needs approval from Lawyer or Reviewer before countersignature) - **Waiting:** the investor was approved for countersignature by any of the Lawyers or Reviewers in the deal - **Accepted:** the investor's agreement was countersigned by the Signatory - **Inactive** the investor is no longer eligible to participate in the offering. This may be because their warrant expired, they requested a refund, or they opted out of the offering  #### Update Delay  Given the high number of updates our platform performs on any investor, we’ve added a cool down period on update events that allows us to “group” updates and trigger only one every minute. In consequence, update events will be delivered 1 minute after the initial request was made and will include the latest version of the investor data at delivery time. 
 *
 * The version of the OpenAPI document: 1.75.0
 * 
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 *
 */


import ApiClient from './ApiClient';
import Add506cDocumentRequest from './model/Add506cDocumentRequest';
import AddDocumentRequest from './model/AddDocumentRequest';
import BulkUploadInvestorsRequest from './model/BulkUploadInvestorsRequest';
import CreateBulkUploadDetailRequest from './model/CreateBulkUploadDetailRequest';
import CreateBulkUploadRequest from './model/CreateBulkUploadRequest';
import CreateCompanyRequest from './model/CreateCompanyRequest';
import CreateDealSetupRequest from './model/CreateDealSetupRequest';
import CreateEmailTemplateRequest from './model/CreateEmailTemplateRequest';
import CreateMembersBulkUploadRequest from './model/CreateMembersBulkUploadRequest';
import CreateShareholderActionRequest from './model/CreateShareholderActionRequest';
import EditInvestorTagsRequest from './model/EditInvestorTagsRequest';
import GenerateUrlRequest from './model/GenerateUrlRequest';
import GetAccessTokenRequest from './model/GetAccessTokenRequest';
import PatchDealIncentivePlanRequest from './model/PatchDealIncentivePlanRequest';
import PatchInvestorProfilesCorporations from './model/PatchInvestorProfilesCorporations';
import PatchInvestorProfilesCorporationsBeneficialOwnersInner from './model/PatchInvestorProfilesCorporationsBeneficialOwnersInner';
import PatchInvestorProfilesIndividuals from './model/PatchInvestorProfilesIndividuals';
import PatchInvestorProfilesJoints from './model/PatchInvestorProfilesJoints';
import PatchInvestorProfilesTrusts from './model/PatchInvestorProfilesTrusts';
import PatchInvestorProfilesTrustsTrusteesInner from './model/PatchInvestorProfilesTrustsTrusteesInner';
import PatchInvestorRequest from './model/PatchInvestorRequest';
import PostDealIncentivePlanRequest from './model/PostDealIncentivePlanRequest';
import PostDealsIdInvestors from './model/PostDealsIdInvestors';
import PostInvestorProfilesCorporations from './model/PostInvestorProfilesCorporations';
import PostInvestorProfilesCorporationsBeneficialOwnersInner from './model/PostInvestorProfilesCorporationsBeneficialOwnersInner';
import PostInvestorProfilesIndividuals from './model/PostInvestorProfilesIndividuals';
import PostInvestorProfilesJoints from './model/PostInvestorProfilesJoints';
import PostInvestorProfilesManaged from './model/PostInvestorProfilesManaged';
import PostInvestorProfilesTrusts from './model/PostInvestorProfilesTrusts';
import PostInvestorProfilesTrustsTrusteesInner from './model/PostInvestorProfilesTrustsTrusteesInner';
import PostWebhooksRequest from './model/PostWebhooksRequest';
import PutDealsIdInvestors from './model/PutDealsIdInvestors';
import PutDealsIdScriptTagEnvironmentRequest from './model/PutDealsIdScriptTagEnvironmentRequest';
import PutWebhooksIdRequest from './model/PutWebhooksIdRequest';
import RequestNewDocumentRequest from './model/RequestNewDocumentRequest';
import RunBackgroundSearchRequest from './model/RunBackgroundSearchRequest';
import SendPortalInviteRequest from './model/SendPortalInviteRequest';
import UpdateUserPasswordRequest from './model/UpdateUserPasswordRequest';
import V1EntitiesAddress from './model/V1EntitiesAddress';
import V1EntitiesAddresses from './model/V1EntitiesAddresses';
import V1EntitiesAttachment from './model/V1EntitiesAttachment';
import V1EntitiesBackgroundCheckSearch from './model/V1EntitiesBackgroundCheckSearch';
import V1EntitiesBeefreeAccessToken from './model/V1EntitiesBeefreeAccessToken';
import V1EntitiesBulkUpload from './model/V1EntitiesBulkUpload';
import V1EntitiesBulkUploadDetail from './model/V1EntitiesBulkUploadDetail';
import V1EntitiesBulkUploadDetails from './model/V1EntitiesBulkUploadDetails';
import V1EntitiesBulkUploads from './model/V1EntitiesBulkUploads';
import V1EntitiesCompany from './model/V1EntitiesCompany';
import V1EntitiesCompanyDeal from './model/V1EntitiesCompanyDeal';
import V1EntitiesCompanyDeals from './model/V1EntitiesCompanyDeals';
import V1EntitiesCountries from './model/V1EntitiesCountries';
import V1EntitiesCountry from './model/V1EntitiesCountry';
import V1EntitiesDeal from './model/V1EntitiesDeal';
import V1EntitiesDealEnterprise from './model/V1EntitiesDealEnterprise';
import V1EntitiesDealFundingMetrics from './model/V1EntitiesDealFundingMetrics';
import V1EntitiesDealInvestorMetrics from './model/V1EntitiesDealInvestorMetrics';
import V1EntitiesDealIssuer from './model/V1EntitiesDealIssuer';
import V1EntitiesDealSetup from './model/V1EntitiesDealSetup';
import V1EntitiesDealSetupUser from './model/V1EntitiesDealSetupUser';
import V1EntitiesDeals from './model/V1EntitiesDeals';
import V1EntitiesDealsIncentivePlan from './model/V1EntitiesDealsIncentivePlan';
import V1EntitiesDealsIncentivePlansIncentiveTier from './model/V1EntitiesDealsIncentivePlansIncentiveTier';
import V1EntitiesDealsPriceDetails from './model/V1EntitiesDealsPriceDetails';
import V1EntitiesDividend from './model/V1EntitiesDividend';
import V1EntitiesDividends from './model/V1EntitiesDividends';
import V1EntitiesEmailEvent from './model/V1EntitiesEmailEvent';
import V1EntitiesEmailEvents from './model/V1EntitiesEmailEvents';
import V1EntitiesEmailTemplate from './model/V1EntitiesEmailTemplate';
import V1EntitiesExpressWireInstruction from './model/V1EntitiesExpressWireInstruction';
import V1EntitiesExpressWireInstructions from './model/V1EntitiesExpressWireInstructions';
import V1EntitiesGenericResponse from './model/V1EntitiesGenericResponse';
import V1EntitiesInvestor from './model/V1EntitiesInvestor';
import V1EntitiesInvestorOtpAccessLink from './model/V1EntitiesInvestorOtpAccessLink';
import V1EntitiesInvestorProfileAddress from './model/V1EntitiesInvestorProfileAddress';
import V1EntitiesInvestorProfileCorporation from './model/V1EntitiesInvestorProfileCorporation';
import V1EntitiesInvestorProfileFieldsAccountHolder from './model/V1EntitiesInvestorProfileFieldsAccountHolder';
import V1EntitiesInvestorProfileFieldsBeneficialOwner from './model/V1EntitiesInvestorProfileFieldsBeneficialOwner';
import V1EntitiesInvestorProfileFieldsBeneficiary from './model/V1EntitiesInvestorProfileFieldsBeneficiary';
import V1EntitiesInvestorProfileFieldsCorporation from './model/V1EntitiesInvestorProfileFieldsCorporation';
import V1EntitiesInvestorProfileFieldsPrimaryHolder from './model/V1EntitiesInvestorProfileFieldsPrimaryHolder';
import V1EntitiesInvestorProfileFieldsProvider from './model/V1EntitiesInvestorProfileFieldsProvider';
import V1EntitiesInvestorProfileFieldsSigningOfficer from './model/V1EntitiesInvestorProfileFieldsSigningOfficer';
import V1EntitiesInvestorProfileFieldsTrust from './model/V1EntitiesInvestorProfileFieldsTrust';
import V1EntitiesInvestorProfileFieldsTrustee from './model/V1EntitiesInvestorProfileFieldsTrustee';
import V1EntitiesInvestorProfileId from './model/V1EntitiesInvestorProfileId';
import V1EntitiesInvestorProfileIndividual from './model/V1EntitiesInvestorProfileIndividual';
import V1EntitiesInvestorProfileItem from './model/V1EntitiesInvestorProfileItem';
import V1EntitiesInvestorProfileJoint from './model/V1EntitiesInvestorProfileJoint';
import V1EntitiesInvestorProfileManaged from './model/V1EntitiesInvestorProfileManaged';
import V1EntitiesInvestorProfileOwner from './model/V1EntitiesInvestorProfileOwner';
import V1EntitiesInvestorProfileTrust from './model/V1EntitiesInvestorProfileTrust';
import V1EntitiesInvestorProfiles from './model/V1EntitiesInvestorProfiles';
import V1EntitiesInvestorSearchEntities from './model/V1EntitiesInvestorSearchEntities';
import V1EntitiesInvestorSearchEntitiesRequiredFields from './model/V1EntitiesInvestorSearchEntitiesRequiredFields';
import V1EntitiesInvestorUser from './model/V1EntitiesInvestorUser';
import V1EntitiesInvestors from './model/V1EntitiesInvestors';
import V1EntitiesMembersBulkUpload from './model/V1EntitiesMembersBulkUpload';
import V1EntitiesMembersBulkUploads from './model/V1EntitiesMembersBulkUploads';
import V1EntitiesMoneyEntity from './model/V1EntitiesMoneyEntity';
import V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData from './model/V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData';
import V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData from './model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData';
import V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult from './model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult';
import V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult from './model/V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult';
import V1EntitiesPresignedUrlResult from './model/V1EntitiesPresignedUrlResult';
import V1EntitiesShareholder from './model/V1EntitiesShareholder';
import V1EntitiesShareholderLedger from './model/V1EntitiesShareholderLedger';
import V1EntitiesShareholders from './model/V1EntitiesShareholders';
import V1EntitiesShareholdersTags from './model/V1EntitiesShareholdersTags';
import V1EntitiesState from './model/V1EntitiesState';
import V1EntitiesSubscriptionAgreement from './model/V1EntitiesSubscriptionAgreement';
import V1EntitiesUser from './model/V1EntitiesUser';
import V1EntitiesWebhooksDeal from './model/V1EntitiesWebhooksDeal';
import V1EntitiesWebhooksSecurityToken from './model/V1EntitiesWebhooksSecurityToken';
import V1EntitiesWebhooksSubscription from './model/V1EntitiesWebhooksSubscription';
import V1EntitiesWebhooksSubscriptionDeal from './model/V1EntitiesWebhooksSubscriptionDeal';
import V1EntitiesWebhooksSubscriptionDeals from './model/V1EntitiesWebhooksSubscriptionDeals';
import CompanyApi from './api/CompanyApi';
import CountryApi from './api/CountryApi';
import CustomEmailsApi from './api/CustomEmailsApi';
import DealApi from './api/DealApi';
import DealsApi from './api/DealsApi';
import DefaultApi from './api/DefaultApi';
import IncentivePlanApi from './api/IncentivePlanApi';
import InvestorApi from './api/InvestorApi';
import InvestorProfileApi from './api/InvestorProfileApi';
import ShareholderApi from './api/ShareholderApi';
import UploadApi from './api/UploadApi';
import UserApi from './api/UserApi';
import UsersApi from './api/UsersApi';


/**
* A javascript wrapper for the DealMaker API.<br>
* The <code>index</code> module provides access to constructors for all the classes which comprise the public API.
* <p>
* An AMD (recommended!) or CommonJS application will generally do something equivalent to the following:
* <pre>
* var Api = require('index'); // See note below*.
* var xxxSvc = new Api.XxxApi(); // Allocate the API class we're going to use.
* var yyyModel = new Api.Yyy(); // Construct a model instance.
* yyyModel.someProperty = 'someValue';
* ...
* var zzz = xxxSvc.doSomething(yyyModel); // Invoke the service.
* ...
* </pre>
* <em>*NOTE: For a top-level AMD script, use require(['index'], function(){...})
* and put the application logic within the callback function.</em>
* </p>
* <p>
* A non-AMD browser application (discouraged) might do something like this:
* <pre>
* var xxxSvc = new Api.XxxApi(); // Allocate the API class we're going to use.
* var yyy = new Api.Yyy(); // Construct a model instance.
* yyyModel.someProperty = 'someValue';
* ...
* var zzz = xxxSvc.doSomething(yyyModel); // Invoke the service.
* ...
* </pre>
* </p>
* @module index
* @version 0.101.1
*/
export {
    /**
     * The ApiClient constructor.
     * @property {module:ApiClient}
     */
    ApiClient,

    /**
     * The Add506cDocumentRequest model constructor.
     * @property {module:model/Add506cDocumentRequest}
     */
    Add506cDocumentRequest,

    /**
     * The AddDocumentRequest model constructor.
     * @property {module:model/AddDocumentRequest}
     */
    AddDocumentRequest,

    /**
     * The BulkUploadInvestorsRequest model constructor.
     * @property {module:model/BulkUploadInvestorsRequest}
     */
    BulkUploadInvestorsRequest,

    /**
     * The CreateBulkUploadDetailRequest model constructor.
     * @property {module:model/CreateBulkUploadDetailRequest}
     */
    CreateBulkUploadDetailRequest,

    /**
     * The CreateBulkUploadRequest model constructor.
     * @property {module:model/CreateBulkUploadRequest}
     */
    CreateBulkUploadRequest,

    /**
     * The CreateCompanyRequest model constructor.
     * @property {module:model/CreateCompanyRequest}
     */
    CreateCompanyRequest,

    /**
     * The CreateDealSetupRequest model constructor.
     * @property {module:model/CreateDealSetupRequest}
     */
    CreateDealSetupRequest,

    /**
     * The CreateEmailTemplateRequest model constructor.
     * @property {module:model/CreateEmailTemplateRequest}
     */
    CreateEmailTemplateRequest,

    /**
     * The CreateMembersBulkUploadRequest model constructor.
     * @property {module:model/CreateMembersBulkUploadRequest}
     */
    CreateMembersBulkUploadRequest,

    /**
     * The CreateShareholderActionRequest model constructor.
     * @property {module:model/CreateShareholderActionRequest}
     */
    CreateShareholderActionRequest,

    /**
     * The EditInvestorTagsRequest model constructor.
     * @property {module:model/EditInvestorTagsRequest}
     */
    EditInvestorTagsRequest,

    /**
     * The GenerateUrlRequest model constructor.
     * @property {module:model/GenerateUrlRequest}
     */
    GenerateUrlRequest,

    /**
     * The GetAccessTokenRequest model constructor.
     * @property {module:model/GetAccessTokenRequest}
     */
    GetAccessTokenRequest,

    /**
     * The PatchDealIncentivePlanRequest model constructor.
     * @property {module:model/PatchDealIncentivePlanRequest}
     */
    PatchDealIncentivePlanRequest,

    /**
     * The PatchInvestorProfilesCorporations model constructor.
     * @property {module:model/PatchInvestorProfilesCorporations}
     */
    PatchInvestorProfilesCorporations,

    /**
     * The PatchInvestorProfilesCorporationsBeneficialOwnersInner model constructor.
     * @property {module:model/PatchInvestorProfilesCorporationsBeneficialOwnersInner}
     */
    PatchInvestorProfilesCorporationsBeneficialOwnersInner,

    /**
     * The PatchInvestorProfilesIndividuals model constructor.
     * @property {module:model/PatchInvestorProfilesIndividuals}
     */
    PatchInvestorProfilesIndividuals,

    /**
     * The PatchInvestorProfilesJoints model constructor.
     * @property {module:model/PatchInvestorProfilesJoints}
     */
    PatchInvestorProfilesJoints,

    /**
     * The PatchInvestorProfilesTrusts model constructor.
     * @property {module:model/PatchInvestorProfilesTrusts}
     */
    PatchInvestorProfilesTrusts,

    /**
     * The PatchInvestorProfilesTrustsTrusteesInner model constructor.
     * @property {module:model/PatchInvestorProfilesTrustsTrusteesInner}
     */
    PatchInvestorProfilesTrustsTrusteesInner,

    /**
     * The PatchInvestorRequest model constructor.
     * @property {module:model/PatchInvestorRequest}
     */
    PatchInvestorRequest,

    /**
     * The PostDealIncentivePlanRequest model constructor.
     * @property {module:model/PostDealIncentivePlanRequest}
     */
    PostDealIncentivePlanRequest,

    /**
     * The PostDealsIdInvestors model constructor.
     * @property {module:model/PostDealsIdInvestors}
     */
    PostDealsIdInvestors,

    /**
     * The PostInvestorProfilesCorporations model constructor.
     * @property {module:model/PostInvestorProfilesCorporations}
     */
    PostInvestorProfilesCorporations,

    /**
     * The PostInvestorProfilesCorporationsBeneficialOwnersInner model constructor.
     * @property {module:model/PostInvestorProfilesCorporationsBeneficialOwnersInner}
     */
    PostInvestorProfilesCorporationsBeneficialOwnersInner,

    /**
     * The PostInvestorProfilesIndividuals model constructor.
     * @property {module:model/PostInvestorProfilesIndividuals}
     */
    PostInvestorProfilesIndividuals,

    /**
     * The PostInvestorProfilesJoints model constructor.
     * @property {module:model/PostInvestorProfilesJoints}
     */
    PostInvestorProfilesJoints,

    /**
     * The PostInvestorProfilesManaged model constructor.
     * @property {module:model/PostInvestorProfilesManaged}
     */
    PostInvestorProfilesManaged,

    /**
     * The PostInvestorProfilesTrusts model constructor.
     * @property {module:model/PostInvestorProfilesTrusts}
     */
    PostInvestorProfilesTrusts,

    /**
     * The PostInvestorProfilesTrustsTrusteesInner model constructor.
     * @property {module:model/PostInvestorProfilesTrustsTrusteesInner}
     */
    PostInvestorProfilesTrustsTrusteesInner,

    /**
     * The PostWebhooksRequest model constructor.
     * @property {module:model/PostWebhooksRequest}
     */
    PostWebhooksRequest,

    /**
     * The PutDealsIdInvestors model constructor.
     * @property {module:model/PutDealsIdInvestors}
     */
    PutDealsIdInvestors,

    /**
     * The PutDealsIdScriptTagEnvironmentRequest model constructor.
     * @property {module:model/PutDealsIdScriptTagEnvironmentRequest}
     */
    PutDealsIdScriptTagEnvironmentRequest,

    /**
     * The PutWebhooksIdRequest model constructor.
     * @property {module:model/PutWebhooksIdRequest}
     */
    PutWebhooksIdRequest,

    /**
     * The RequestNewDocumentRequest model constructor.
     * @property {module:model/RequestNewDocumentRequest}
     */
    RequestNewDocumentRequest,

    /**
     * The RunBackgroundSearchRequest model constructor.
     * @property {module:model/RunBackgroundSearchRequest}
     */
    RunBackgroundSearchRequest,

    /**
     * The SendPortalInviteRequest model constructor.
     * @property {module:model/SendPortalInviteRequest}
     */
    SendPortalInviteRequest,

    /**
     * The UpdateUserPasswordRequest model constructor.
     * @property {module:model/UpdateUserPasswordRequest}
     */
    UpdateUserPasswordRequest,

    /**
     * The V1EntitiesAddress model constructor.
     * @property {module:model/V1EntitiesAddress}
     */
    V1EntitiesAddress,

    /**
     * The V1EntitiesAddresses model constructor.
     * @property {module:model/V1EntitiesAddresses}
     */
    V1EntitiesAddresses,

    /**
     * The V1EntitiesAttachment model constructor.
     * @property {module:model/V1EntitiesAttachment}
     */
    V1EntitiesAttachment,

    /**
     * The V1EntitiesBackgroundCheckSearch model constructor.
     * @property {module:model/V1EntitiesBackgroundCheckSearch}
     */
    V1EntitiesBackgroundCheckSearch,

    /**
     * The V1EntitiesBeefreeAccessToken model constructor.
     * @property {module:model/V1EntitiesBeefreeAccessToken}
     */
    V1EntitiesBeefreeAccessToken,

    /**
     * The V1EntitiesBulkUpload model constructor.
     * @property {module:model/V1EntitiesBulkUpload}
     */
    V1EntitiesBulkUpload,

    /**
     * The V1EntitiesBulkUploadDetail model constructor.
     * @property {module:model/V1EntitiesBulkUploadDetail}
     */
    V1EntitiesBulkUploadDetail,

    /**
     * The V1EntitiesBulkUploadDetails model constructor.
     * @property {module:model/V1EntitiesBulkUploadDetails}
     */
    V1EntitiesBulkUploadDetails,

    /**
     * The V1EntitiesBulkUploads model constructor.
     * @property {module:model/V1EntitiesBulkUploads}
     */
    V1EntitiesBulkUploads,

    /**
     * The V1EntitiesCompany model constructor.
     * @property {module:model/V1EntitiesCompany}
     */
    V1EntitiesCompany,

    /**
     * The V1EntitiesCompanyDeal model constructor.
     * @property {module:model/V1EntitiesCompanyDeal}
     */
    V1EntitiesCompanyDeal,

    /**
     * The V1EntitiesCompanyDeals model constructor.
     * @property {module:model/V1EntitiesCompanyDeals}
     */
    V1EntitiesCompanyDeals,

    /**
     * The V1EntitiesCountries model constructor.
     * @property {module:model/V1EntitiesCountries}
     */
    V1EntitiesCountries,

    /**
     * The V1EntitiesCountry model constructor.
     * @property {module:model/V1EntitiesCountry}
     */
    V1EntitiesCountry,

    /**
     * The V1EntitiesDeal model constructor.
     * @property {module:model/V1EntitiesDeal}
     */
    V1EntitiesDeal,

    /**
     * The V1EntitiesDealEnterprise model constructor.
     * @property {module:model/V1EntitiesDealEnterprise}
     */
    V1EntitiesDealEnterprise,

    /**
     * The V1EntitiesDealFundingMetrics model constructor.
     * @property {module:model/V1EntitiesDealFundingMetrics}
     */
    V1EntitiesDealFundingMetrics,

    /**
     * The V1EntitiesDealInvestorMetrics model constructor.
     * @property {module:model/V1EntitiesDealInvestorMetrics}
     */
    V1EntitiesDealInvestorMetrics,

    /**
     * The V1EntitiesDealIssuer model constructor.
     * @property {module:model/V1EntitiesDealIssuer}
     */
    V1EntitiesDealIssuer,

    /**
     * The V1EntitiesDealSetup model constructor.
     * @property {module:model/V1EntitiesDealSetup}
     */
    V1EntitiesDealSetup,

    /**
     * The V1EntitiesDealSetupUser model constructor.
     * @property {module:model/V1EntitiesDealSetupUser}
     */
    V1EntitiesDealSetupUser,

    /**
     * The V1EntitiesDeals model constructor.
     * @property {module:model/V1EntitiesDeals}
     */
    V1EntitiesDeals,

    /**
     * The V1EntitiesDealsIncentivePlan model constructor.
     * @property {module:model/V1EntitiesDealsIncentivePlan}
     */
    V1EntitiesDealsIncentivePlan,

    /**
     * The V1EntitiesDealsIncentivePlansIncentiveTier model constructor.
     * @property {module:model/V1EntitiesDealsIncentivePlansIncentiveTier}
     */
    V1EntitiesDealsIncentivePlansIncentiveTier,

    /**
     * The V1EntitiesDealsPriceDetails model constructor.
     * @property {module:model/V1EntitiesDealsPriceDetails}
     */
    V1EntitiesDealsPriceDetails,

    /**
     * The V1EntitiesDividend model constructor.
     * @property {module:model/V1EntitiesDividend}
     */
    V1EntitiesDividend,

    /**
     * The V1EntitiesDividends model constructor.
     * @property {module:model/V1EntitiesDividends}
     */
    V1EntitiesDividends,

    /**
     * The V1EntitiesEmailEvent model constructor.
     * @property {module:model/V1EntitiesEmailEvent}
     */
    V1EntitiesEmailEvent,

    /**
     * The V1EntitiesEmailEvents model constructor.
     * @property {module:model/V1EntitiesEmailEvents}
     */
    V1EntitiesEmailEvents,

    /**
     * The V1EntitiesEmailTemplate model constructor.
     * @property {module:model/V1EntitiesEmailTemplate}
     */
    V1EntitiesEmailTemplate,

    /**
     * The V1EntitiesExpressWireInstruction model constructor.
     * @property {module:model/V1EntitiesExpressWireInstruction}
     */
    V1EntitiesExpressWireInstruction,

    /**
     * The V1EntitiesExpressWireInstructions model constructor.
     * @property {module:model/V1EntitiesExpressWireInstructions}
     */
    V1EntitiesExpressWireInstructions,

    /**
     * The V1EntitiesGenericResponse model constructor.
     * @property {module:model/V1EntitiesGenericResponse}
     */
    V1EntitiesGenericResponse,

    /**
     * The V1EntitiesInvestor model constructor.
     * @property {module:model/V1EntitiesInvestor}
     */
    V1EntitiesInvestor,

    /**
     * The V1EntitiesInvestorOtpAccessLink model constructor.
     * @property {module:model/V1EntitiesInvestorOtpAccessLink}
     */
    V1EntitiesInvestorOtpAccessLink,

    /**
     * The V1EntitiesInvestorProfileAddress model constructor.
     * @property {module:model/V1EntitiesInvestorProfileAddress}
     */
    V1EntitiesInvestorProfileAddress,

    /**
     * The V1EntitiesInvestorProfileCorporation model constructor.
     * @property {module:model/V1EntitiesInvestorProfileCorporation}
     */
    V1EntitiesInvestorProfileCorporation,

    /**
     * The V1EntitiesInvestorProfileFieldsAccountHolder model constructor.
     * @property {module:model/V1EntitiesInvestorProfileFieldsAccountHolder}
     */
    V1EntitiesInvestorProfileFieldsAccountHolder,

    /**
     * The V1EntitiesInvestorProfileFieldsBeneficialOwner model constructor.
     * @property {module:model/V1EntitiesInvestorProfileFieldsBeneficialOwner}
     */
    V1EntitiesInvestorProfileFieldsBeneficialOwner,

    /**
     * The V1EntitiesInvestorProfileFieldsBeneficiary model constructor.
     * @property {module:model/V1EntitiesInvestorProfileFieldsBeneficiary}
     */
    V1EntitiesInvestorProfileFieldsBeneficiary,

    /**
     * The V1EntitiesInvestorProfileFieldsCorporation model constructor.
     * @property {module:model/V1EntitiesInvestorProfileFieldsCorporation}
     */
    V1EntitiesInvestorProfileFieldsCorporation,

    /**
     * The V1EntitiesInvestorProfileFieldsPrimaryHolder model constructor.
     * @property {module:model/V1EntitiesInvestorProfileFieldsPrimaryHolder}
     */
    V1EntitiesInvestorProfileFieldsPrimaryHolder,

    /**
     * The V1EntitiesInvestorProfileFieldsProvider model constructor.
     * @property {module:model/V1EntitiesInvestorProfileFieldsProvider}
     */
    V1EntitiesInvestorProfileFieldsProvider,

    /**
     * The V1EntitiesInvestorProfileFieldsSigningOfficer model constructor.
     * @property {module:model/V1EntitiesInvestorProfileFieldsSigningOfficer}
     */
    V1EntitiesInvestorProfileFieldsSigningOfficer,

    /**
     * The V1EntitiesInvestorProfileFieldsTrust model constructor.
     * @property {module:model/V1EntitiesInvestorProfileFieldsTrust}
     */
    V1EntitiesInvestorProfileFieldsTrust,

    /**
     * The V1EntitiesInvestorProfileFieldsTrustee model constructor.
     * @property {module:model/V1EntitiesInvestorProfileFieldsTrustee}
     */
    V1EntitiesInvestorProfileFieldsTrustee,

    /**
     * The V1EntitiesInvestorProfileId model constructor.
     * @property {module:model/V1EntitiesInvestorProfileId}
     */
    V1EntitiesInvestorProfileId,

    /**
     * The V1EntitiesInvestorProfileIndividual model constructor.
     * @property {module:model/V1EntitiesInvestorProfileIndividual}
     */
    V1EntitiesInvestorProfileIndividual,

    /**
     * The V1EntitiesInvestorProfileItem model constructor.
     * @property {module:model/V1EntitiesInvestorProfileItem}
     */
    V1EntitiesInvestorProfileItem,

    /**
     * The V1EntitiesInvestorProfileJoint model constructor.
     * @property {module:model/V1EntitiesInvestorProfileJoint}
     */
    V1EntitiesInvestorProfileJoint,

    /**
     * The V1EntitiesInvestorProfileManaged model constructor.
     * @property {module:model/V1EntitiesInvestorProfileManaged}
     */
    V1EntitiesInvestorProfileManaged,

    /**
     * The V1EntitiesInvestorProfileOwner model constructor.
     * @property {module:model/V1EntitiesInvestorProfileOwner}
     */
    V1EntitiesInvestorProfileOwner,

    /**
     * The V1EntitiesInvestorProfileTrust model constructor.
     * @property {module:model/V1EntitiesInvestorProfileTrust}
     */
    V1EntitiesInvestorProfileTrust,

    /**
     * The V1EntitiesInvestorProfiles model constructor.
     * @property {module:model/V1EntitiesInvestorProfiles}
     */
    V1EntitiesInvestorProfiles,

    /**
     * The V1EntitiesInvestorSearchEntities model constructor.
     * @property {module:model/V1EntitiesInvestorSearchEntities}
     */
    V1EntitiesInvestorSearchEntities,

    /**
     * The V1EntitiesInvestorSearchEntitiesRequiredFields model constructor.
     * @property {module:model/V1EntitiesInvestorSearchEntitiesRequiredFields}
     */
    V1EntitiesInvestorSearchEntitiesRequiredFields,

    /**
     * The V1EntitiesInvestorUser model constructor.
     * @property {module:model/V1EntitiesInvestorUser}
     */
    V1EntitiesInvestorUser,

    /**
     * The V1EntitiesInvestors model constructor.
     * @property {module:model/V1EntitiesInvestors}
     */
    V1EntitiesInvestors,

    /**
     * The V1EntitiesMembersBulkUpload model constructor.
     * @property {module:model/V1EntitiesMembersBulkUpload}
     */
    V1EntitiesMembersBulkUpload,

    /**
     * The V1EntitiesMembersBulkUploads model constructor.
     * @property {module:model/V1EntitiesMembersBulkUploads}
     */
    V1EntitiesMembersBulkUploads,

    /**
     * The V1EntitiesMoneyEntity model constructor.
     * @property {module:model/V1EntitiesMoneyEntity}
     */
    V1EntitiesMoneyEntity,

    /**
     * The V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData model constructor.
     * @property {module:model/V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData}
     */
    V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData,

    /**
     * The V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData model constructor.
     * @property {module:model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData}
     */
    V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData,

    /**
     * The V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult model constructor.
     * @property {module:model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult}
     */
    V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult,

    /**
     * The V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult model constructor.
     * @property {module:model/V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult}
     */
    V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult,

    /**
     * The V1EntitiesPresignedUrlResult model constructor.
     * @property {module:model/V1EntitiesPresignedUrlResult}
     */
    V1EntitiesPresignedUrlResult,

    /**
     * The V1EntitiesShareholder model constructor.
     * @property {module:model/V1EntitiesShareholder}
     */
    V1EntitiesShareholder,

    /**
     * The V1EntitiesShareholderLedger model constructor.
     * @property {module:model/V1EntitiesShareholderLedger}
     */
    V1EntitiesShareholderLedger,

    /**
     * The V1EntitiesShareholders model constructor.
     * @property {module:model/V1EntitiesShareholders}
     */
    V1EntitiesShareholders,

    /**
     * The V1EntitiesShareholdersTags model constructor.
     * @property {module:model/V1EntitiesShareholdersTags}
     */
    V1EntitiesShareholdersTags,

    /**
     * The V1EntitiesState model constructor.
     * @property {module:model/V1EntitiesState}
     */
    V1EntitiesState,

    /**
     * The V1EntitiesSubscriptionAgreement model constructor.
     * @property {module:model/V1EntitiesSubscriptionAgreement}
     */
    V1EntitiesSubscriptionAgreement,

    /**
     * The V1EntitiesUser model constructor.
     * @property {module:model/V1EntitiesUser}
     */
    V1EntitiesUser,

    /**
     * The V1EntitiesWebhooksDeal model constructor.
     * @property {module:model/V1EntitiesWebhooksDeal}
     */
    V1EntitiesWebhooksDeal,

    /**
     * The V1EntitiesWebhooksSecurityToken model constructor.
     * @property {module:model/V1EntitiesWebhooksSecurityToken}
     */
    V1EntitiesWebhooksSecurityToken,

    /**
     * The V1EntitiesWebhooksSubscription model constructor.
     * @property {module:model/V1EntitiesWebhooksSubscription}
     */
    V1EntitiesWebhooksSubscription,

    /**
     * The V1EntitiesWebhooksSubscriptionDeal model constructor.
     * @property {module:model/V1EntitiesWebhooksSubscriptionDeal}
     */
    V1EntitiesWebhooksSubscriptionDeal,

    /**
     * The V1EntitiesWebhooksSubscriptionDeals model constructor.
     * @property {module:model/V1EntitiesWebhooksSubscriptionDeals}
     */
    V1EntitiesWebhooksSubscriptionDeals,

    /**
    * The CompanyApi service constructor.
    * @property {module:api/CompanyApi}
    */
    CompanyApi,

    /**
    * The CountryApi service constructor.
    * @property {module:api/CountryApi}
    */
    CountryApi,

    /**
    * The CustomEmailsApi service constructor.
    * @property {module:api/CustomEmailsApi}
    */
    CustomEmailsApi,

    /**
    * The DealApi service constructor.
    * @property {module:api/DealApi}
    */
    DealApi,

    /**
    * The DealsApi service constructor.
    * @property {module:api/DealsApi}
    */
    DealsApi,

    /**
    * The DefaultApi service constructor.
    * @property {module:api/DefaultApi}
    */
    DefaultApi,

    /**
    * The IncentivePlanApi service constructor.
    * @property {module:api/IncentivePlanApi}
    */
    IncentivePlanApi,

    /**
    * The InvestorApi service constructor.
    * @property {module:api/InvestorApi}
    */
    InvestorApi,

    /**
    * The InvestorProfileApi service constructor.
    * @property {module:api/InvestorProfileApi}
    */
    InvestorProfileApi,

    /**
    * The ShareholderApi service constructor.
    * @property {module:api/ShareholderApi}
    */
    ShareholderApi,

    /**
    * The UploadApi service constructor.
    * @property {module:api/UploadApi}
    */
    UploadApi,

    /**
    * The UserApi service constructor.
    * @property {module:api/UserApi}
    */
    UserApi,

    /**
    * The UsersApi service constructor.
    * @property {module:api/UsersApi}
    */
    UsersApi
};
