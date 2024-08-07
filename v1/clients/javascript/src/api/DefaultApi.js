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


import ApiClient from "../ApiClient";
import PatchDealsIdPlatformEmailsDomainRequest from '../model/PatchDealsIdPlatformEmailsDomainRequest';
import PostWebhooksRequest from '../model/PostWebhooksRequest';
import PutWebhooksIdRequest from '../model/PutWebhooksIdRequest';
import V1EntitiesDealsPlatformEmailsDomainSettings from '../model/V1EntitiesDealsPlatformEmailsDomainSettings';
import V1EntitiesDealsProgress from '../model/V1EntitiesDealsProgress';
import V1EntitiesDealsProgressPageSummary from '../model/V1EntitiesDealsProgressPageSummary';
import V1EntitiesExpressWireInstruction from '../model/V1EntitiesExpressWireInstruction';
import V1EntitiesExpressWireInstructions from '../model/V1EntitiesExpressWireInstructions';
import V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData from '../model/V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData';
import V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData from '../model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData';
import V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult from '../model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult';
import V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult from '../model/V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult';
import V1EntitiesWebhooksDeal from '../model/V1EntitiesWebhooksDeal';
import V1EntitiesWebhooksSecurityToken from '../model/V1EntitiesWebhooksSecurityToken';
import V1EntitiesWebhooksSubscription from '../model/V1EntitiesWebhooksSubscription';

/**
* Default service.
* @module api/DefaultApi
* @version 0.107.5
*/
export default class DefaultApi {

    /**
    * Constructs a new DefaultApi. 
    * @alias module:api/DefaultApi
    * @class
    * @param {module:ApiClient} [apiClient] Optional API client implementation to use,
    * default to {@link module:ApiClient#instance} if unspecified.
    */
    constructor(apiClient) {
        this.apiClient = apiClient || ApiClient.instance;
    }


    /**
     * Callback function to receive the result of the getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData operation.
     * @callback module:api/DefaultApi~getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionDataCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Load data for the digital payments connection stage
     * Load data for the digital payments connection stage
     * @param {Number} dealId 
     * @param {module:api/DefaultApi~getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionDataCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData}
     */
    getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData(dealId, callback) {
      let postBody = null;
      // verify the required parameter 'dealId' is set
      if (dealId === undefined || dealId === null) {
        throw new Error("Missing the required parameter 'dealId' when calling getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData");
      }

      let pathParams = {
        'deal_id': dealId
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData;
      return this.apiClient.callApi(
        '/deals/{deal_id}/payment_onboarding/questionnaire/digital_payments_connection/data', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData operation.
     * @callback module:api/DefaultApi~getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsDataCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get payout account data
     * Get payout account data
     * @param {Number} dealId 
     * @param {module:api/DefaultApi~getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsDataCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData}
     */
    getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData(dealId, callback) {
      let postBody = null;
      // verify the required parameter 'dealId' is set
      if (dealId === undefined || dealId === null) {
        throw new Error("Missing the required parameter 'dealId' when calling getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData");
      }

      let pathParams = {
        'deal_id': dealId
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData;
      return this.apiClient.callApi(
        '/deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/data', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions operation.
     * @callback module:api/DefaultApi~getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesExpressWireInstruction} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Displays the express wire instructions for an investor on a deal
     * Get express wire instructions
     * @param {Number} id 
     * @param {Number} investorId 
     * @param {module:api/DefaultApi~getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesExpressWireInstruction}
     */
    getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions(id, investorId, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions");
      }
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions");
      }

      let pathParams = {
        'id': id,
        'investor_id': investorId
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesExpressWireInstruction;
      return this.apiClient.callApi(
        '/deals/{id}/investors/{investor_id}/payments/express_wire/instructions', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getDealsIdInvestorsPaymentsExpressWireInstructions operation.
     * @callback module:api/DefaultApi~getDealsIdInvestorsPaymentsExpressWireInstructionsCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesExpressWireInstructions} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Displays the express wire instructions for all the investors on a deal
     * Get list of express wire instructions
     * @param {Number} id 
     * @param {module:api/DefaultApi~getDealsIdInvestorsPaymentsExpressWireInstructionsCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesExpressWireInstructions}
     */
    getDealsIdInvestorsPaymentsExpressWireInstructions(id, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getDealsIdInvestorsPaymentsExpressWireInstructions");
      }

      let pathParams = {
        'id': id
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesExpressWireInstructions;
      return this.apiClient.callApi(
        '/deals/{id}/investors/payments/express_wire/instructions', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getDealsIdPlatformEmailsDomain operation.
     * @callback module:api/DefaultApi~getDealsIdPlatformEmailsDomainCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesDealsPlatformEmailsDomainSettings} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get the email domain settings for the deal
     * Get the email domain settings for the deal
     * @param {Number} id The deal id.
     * @param {module:api/DefaultApi~getDealsIdPlatformEmailsDomainCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesDealsPlatformEmailsDomainSettings}
     */
    getDealsIdPlatformEmailsDomain(id, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getDealsIdPlatformEmailsDomain");
      }

      let pathParams = {
        'id': id
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesDealsPlatformEmailsDomainSettings;
      return this.apiClient.callApi(
        '/deals/{id}/platform_emails/domain', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getDealsIdProgressPage operation.
     * @callback module:api/DefaultApi~getDealsIdProgressPageCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesDealsProgress} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get deal progress
     * Get deal progress
     * @param {Number} id The deal id.
     * @param {module:api/DefaultApi~getDealsIdProgressPageCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesDealsProgress}
     */
    getDealsIdProgressPage(id, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getDealsIdProgressPage");
      }

      let pathParams = {
        'id': id
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesDealsProgress;
      return this.apiClient.callApi(
        '/deals/{id}/progress_page', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getDealsIdProgressPageSummary operation.
     * @callback module:api/DefaultApi~getDealsIdProgressPageSummaryCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesDealsProgressPageSummary} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get the deal progress summary
     * Get the deal progress summary
     * @param {Number} id The deal id.
     * @param {module:api/DefaultApi~getDealsIdProgressPageSummaryCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesDealsProgressPageSummary}
     */
    getDealsIdProgressPageSummary(id, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getDealsIdProgressPageSummary");
      }

      let pathParams = {
        'id': id
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesDealsProgressPageSummary;
      return this.apiClient.callApi(
        '/deals/{id}/progress_page/summary', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getDealsIdSummary operation.
     * @callback module:api/DefaultApi~getDealsIdSummaryCallback
     * @param {String} error Error message, if any.
     * @param data This operation does not return a value.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get Deal Overview
     * Get Deal Overview
     * @param {Number} id 
     * @param {module:api/DefaultApi~getDealsIdSummaryCallback} callback The callback function, accepting three arguments: error, data, response
     */
    getDealsIdSummary(id, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getDealsIdSummary");
      }

      let pathParams = {
        'id': id
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = [];
      let returnType = null;
      return this.apiClient.callApi(
        '/deals/{id}/summary', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getDealsPaymentOnboardingQuestionnaireInitialQuestions operation.
     * @callback module:api/DefaultApi~getDealsPaymentOnboardingQuestionnaireInitialQuestionsCallback
     * @param {String} error Error message, if any.
     * @param data This operation does not return a value.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get initial questions
     * Get initial questions
     * @param {module:api/DefaultApi~getDealsPaymentOnboardingQuestionnaireInitialQuestionsCallback} callback The callback function, accepting three arguments: error, data, response
     */
    getDealsPaymentOnboardingQuestionnaireInitialQuestions(callback) {
      let postBody = null;

      let pathParams = {
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = [];
      let returnType = null;
      return this.apiClient.callApi(
        '/deals/payment_onboarding/questionnaire/initial_questions', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getWebhooks operation.
     * @callback module:api/DefaultApi~getWebhooksCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesWebhooksSubscription} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Returns a list of webhook subscription which is associated to the user
     * Returns a list of webhook subscription
     * @param {Object} opts Optional parameters
     * @param {Number} [page = 1)] Page offset to fetch.
     * @param {Number} [perPage = 25)] Number of results to return per page.
     * @param {Number} [offset = 0)] Pad a number of results.
     * @param {module:api/DefaultApi~getWebhooksCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesWebhooksSubscription}
     */
    getWebhooks(opts, callback) {
      opts = opts || {};
      let postBody = null;

      let pathParams = {
      };
      let queryParams = {
        'page': opts['page'],
        'per_page': opts['perPage'],
        'offset': opts['offset']
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesWebhooksSubscription;
      return this.apiClient.callApi(
        '/webhooks', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getWebhooksDealId operation.
     * @callback module:api/DefaultApi~getWebhooksDealIdCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesWebhooksDeal} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Finds a deal using the id
     * Returns a deal
     * @param {Number} id 
     * @param {module:api/DefaultApi~getWebhooksDealIdCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesWebhooksDeal}
     */
    getWebhooksDealId(id, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getWebhooksDealId");
      }

      let pathParams = {
        'id': id
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesWebhooksDeal;
      return this.apiClient.callApi(
        '/webhooks/deal/{id}', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getWebhooksDealsSearch operation.
     * @callback module:api/DefaultApi~getWebhooksDealsSearchCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesWebhooksSecurityToken} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Searches for deals for a given user
     * Searches for deals for a given user
     * @param {module:api/DefaultApi~getWebhooksDealsSearchCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesWebhooksSecurityToken}
     */
    getWebhooksDealsSearch(callback) {
      let postBody = null;

      let pathParams = {
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesWebhooksSecurityToken;
      return this.apiClient.callApi(
        '/webhooks/deals/search', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getWebhooksSecurityToken operation.
     * @callback module:api/DefaultApi~getWebhooksSecurityTokenCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesWebhooksSecurityToken} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Creates a new security token for webhook subscription
     * Creates a new security token for webhook subscription
     * @param {module:api/DefaultApi~getWebhooksSecurityTokenCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesWebhooksSecurityToken}
     */
    getWebhooksSecurityToken(callback) {
      let postBody = null;

      let pathParams = {
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesWebhooksSecurityToken;
      return this.apiClient.callApi(
        '/webhooks/security_token', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the patchDealsIdPlatformEmailsDomain operation.
     * @callback module:api/DefaultApi~patchDealsIdPlatformEmailsDomainCallback
     * @param {String} error Error message, if any.
     * @param data This operation does not return a value.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Update the email domain settings for the deal
     * Update the email domain settings for the deal
     * @param {Number} id The deal id.
     * @param {module:model/PatchDealsIdPlatformEmailsDomainRequest} patchDealsIdPlatformEmailsDomainRequest 
     * @param {module:api/DefaultApi~patchDealsIdPlatformEmailsDomainCallback} callback The callback function, accepting three arguments: error, data, response
     */
    patchDealsIdPlatformEmailsDomain(id, patchDealsIdPlatformEmailsDomainRequest, callback) {
      let postBody = patchDealsIdPlatformEmailsDomainRequest;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling patchDealsIdPlatformEmailsDomain");
      }
      // verify the required parameter 'patchDealsIdPlatformEmailsDomainRequest' is set
      if (patchDealsIdPlatformEmailsDomainRequest === undefined || patchDealsIdPlatformEmailsDomainRequest === null) {
        throw new Error("Missing the required parameter 'patchDealsIdPlatformEmailsDomainRequest' when calling patchDealsIdPlatformEmailsDomain");
      }

      let pathParams = {
        'id': id
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = ['application/json'];
      let accepts = [];
      let returnType = null;
      return this.apiClient.callApi(
        '/deals/{id}/platform_emails/domain', 'PATCH',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit operation.
     * @callback module:api/DefaultApi~postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmitCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Submit a payout account details form
     * Submit a payout account details form
     * @param {Number} dealId 
     * @param {module:api/DefaultApi~postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmitCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult}
     */
    postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit(dealId, callback) {
      let postBody = null;
      // verify the required parameter 'dealId' is set
      if (dealId === undefined || dealId === null) {
        throw new Error("Missing the required parameter 'dealId' when calling postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit");
      }

      let pathParams = {
        'deal_id': dealId
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult;
      return this.apiClient.callApi(
        '/deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/submit', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit operation.
     * @callback module:api/DefaultApi~postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmitCallback
     * @param {String} error Error message, if any.
     * @param data This operation does not return a value.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Submit a qualification questionnaire response
     * Submit a qualification questionnaire response
     * @param {Number} dealId 
     * @param {module:api/DefaultApi~postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmitCallback} callback The callback function, accepting three arguments: error, data, response
     */
    postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit(dealId, callback) {
      let postBody = null;
      // verify the required parameter 'dealId' is set
      if (dealId === undefined || dealId === null) {
        throw new Error("Missing the required parameter 'dealId' when calling postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit");
      }

      let pathParams = {
        'deal_id': dealId
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = [];
      let returnType = null;
      return this.apiClient.callApi(
        '/deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/response/submit', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit operation.
     * @callback module:api/DefaultApi~postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmitCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Submit a qualification questionnaire form
     * Submit a qualification questionnaire form
     * @param {Number} dealId 
     * @param {module:api/DefaultApi~postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmitCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult}
     */
    postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit(dealId, callback) {
      let postBody = null;
      // verify the required parameter 'dealId' is set
      if (dealId === undefined || dealId === null) {
        throw new Error("Missing the required parameter 'dealId' when calling postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit");
      }

      let pathParams = {
        'deal_id': dealId
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult;
      return this.apiClient.callApi(
        '/deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/submit', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the postInvestorsInvestorIdDeleteInvestmentProcess operation.
     * @callback module:api/DefaultApi~postInvestorsInvestorIdDeleteInvestmentProcessCallback
     * @param {String} error Error message, if any.
     * @param data This operation does not return a value.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Delete investment
     * Delete investment
     * @param {Number} investorId 
     * @param {module:api/DefaultApi~postInvestorsInvestorIdDeleteInvestmentProcessCallback} callback The callback function, accepting three arguments: error, data, response
     */
    postInvestorsInvestorIdDeleteInvestmentProcess(investorId, callback) {
      let postBody = null;
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling postInvestorsInvestorIdDeleteInvestmentProcess");
      }

      let pathParams = {
        'investor_id': investorId
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = [];
      let returnType = null;
      return this.apiClient.callApi(
        '/investors/{investor_id}/delete_investment/process', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the postInvestorsInvestorIdTransactionsRequestRefundProcess operation.
     * @callback module:api/DefaultApi~postInvestorsInvestorIdTransactionsRequestRefundProcessCallback
     * @param {String} error Error message, if any.
     * @param data This operation does not return a value.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Request refund for investor transactions
     * Request refund for investor transactions
     * @param {Number} investorId 
     * @param {module:api/DefaultApi~postInvestorsInvestorIdTransactionsRequestRefundProcessCallback} callback The callback function, accepting three arguments: error, data, response
     */
    postInvestorsInvestorIdTransactionsRequestRefundProcess(investorId, callback) {
      let postBody = null;
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling postInvestorsInvestorIdTransactionsRequestRefundProcess");
      }

      let pathParams = {
        'investor_id': investorId
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = [];
      let returnType = null;
      return this.apiClient.callApi(
        '/investors/{investor_id}/transactions/request_refund/process', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the postWebhooks operation.
     * @callback module:api/DefaultApi~postWebhooksCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesWebhooksSubscription} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Creates a webhook subscription which is associated to the user
     * Creates new webhook subscription
     * @param {module:model/PostWebhooksRequest} postWebhooksRequest 
     * @param {module:api/DefaultApi~postWebhooksCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesWebhooksSubscription}
     */
    postWebhooks(postWebhooksRequest, callback) {
      let postBody = postWebhooksRequest;
      // verify the required parameter 'postWebhooksRequest' is set
      if (postWebhooksRequest === undefined || postWebhooksRequest === null) {
        throw new Error("Missing the required parameter 'postWebhooksRequest' when calling postWebhooks");
      }

      let pathParams = {
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = ['application/json'];
      let accepts = ['application/json'];
      let returnType = V1EntitiesWebhooksSubscription;
      return this.apiClient.callApi(
        '/webhooks', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the putWebhooksId operation.
     * @callback module:api/DefaultApi~putWebhooksIdCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesWebhooksSubscription} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Updates webhook subscription and webhooks subcription deals
     * Updates webhook subscription
     * @param {Number} id 
     * @param {Object} opts Optional parameters
     * @param {module:model/PutWebhooksIdRequest} [putWebhooksIdRequest] 
     * @param {module:api/DefaultApi~putWebhooksIdCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesWebhooksSubscription}
     */
    putWebhooksId(id, opts, callback) {
      opts = opts || {};
      let postBody = opts['putWebhooksIdRequest'];
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling putWebhooksId");
      }

      let pathParams = {
        'id': id
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = ['application/json'];
      let accepts = ['application/json'];
      let returnType = V1EntitiesWebhooksSubscription;
      return this.apiClient.callApi(
        '/webhooks/{id}', 'PUT',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }


}
