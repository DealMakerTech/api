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
import Add506cDocumentRequest from '../model/Add506cDocumentRequest';
import AddDocumentRequest from '../model/AddDocumentRequest';
import BulkUploadInvestorsRequest from '../model/BulkUploadInvestorsRequest';
import EditInvestorTagsRequest from '../model/EditInvestorTagsRequest';
import PatchInvestorRequest from '../model/PatchInvestorRequest';
import PostDealsIdInvestors from '../model/PostDealsIdInvestors';
import PutDealsIdInvestors from '../model/PutDealsIdInvestors';
import V1EntitiesInvestor from '../model/V1EntitiesInvestor';
import V1EntitiesInvestorOtpAccessLink from '../model/V1EntitiesInvestorOtpAccessLink';
import V1EntitiesInvestors from '../model/V1EntitiesInvestors';

/**
* Investor service.
* @module api/InvestorApi
* @version 0.90.1
*/
export default class InvestorApi {

    /**
    * Constructs a new InvestorApi. 
    * @alias module:api/InvestorApi
    * @class
    * @param {module:ApiClient} [apiClient] Optional API client implementation to use,
    * default to {@link module:ApiClient#instance} if unspecified.
    */
    constructor(apiClient) {
        this.apiClient = apiClient || ApiClient.instance;
    }


    /**
     * Callback function to receive the result of the add506cDocument operation.
     * @callback module:api/InvestorApi~add506cDocumentCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesInvestor} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Add 506c document for deal investor
     * Add 506c document for deal investor
     * @param {Number} id The deal id.
     * @param {Number} investorId The investor id.
     * @param {module:model/Add506cDocumentRequest} add506cDocumentRequest 
     * @param {module:api/InvestorApi~add506cDocumentCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesInvestor}
     */
    add506cDocument(id, investorId, add506cDocumentRequest, callback) {
      let postBody = add506cDocumentRequest;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling add506cDocument");
      }
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling add506cDocument");
      }
      // verify the required parameter 'add506cDocumentRequest' is set
      if (add506cDocumentRequest === undefined || add506cDocumentRequest === null) {
        throw new Error("Missing the required parameter 'add506cDocumentRequest' when calling add506cDocument");
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
      let contentTypes = ['application/json'];
      let accepts = ['application/json'];
      let returnType = V1EntitiesInvestor;
      return this.apiClient.callApi(
        '/deals/{id}/investors/{investor_id}/add_506c_document', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the addDocument operation.
     * @callback module:api/InvestorApi~addDocumentCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesInvestor} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Add document for deal investor
     * Add document for deal investor
     * @param {Number} id The deal id.
     * @param {Number} investorId The investor id.
     * @param {module:model/AddDocumentRequest} addDocumentRequest 
     * @param {module:api/InvestorApi~addDocumentCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesInvestor}
     */
    addDocument(id, investorId, addDocumentRequest, callback) {
      let postBody = addDocumentRequest;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling addDocument");
      }
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling addDocument");
      }
      // verify the required parameter 'addDocumentRequest' is set
      if (addDocumentRequest === undefined || addDocumentRequest === null) {
        throw new Error("Missing the required parameter 'addDocumentRequest' when calling addDocument");
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
      let contentTypes = ['application/json'];
      let accepts = ['application/json'];
      let returnType = V1EntitiesInvestor;
      return this.apiClient.callApi(
        '/deals/{id}/investors/{investor_id}/add_document', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the bulkUploadInvestors operation.
     * @callback module:api/InvestorApi~bulkUploadInvestorsCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesInvestor} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Bulk upload investors for deal investor
     * Bulk upload investors
     * @param {Number} id The deal id.
     * @param {module:model/BulkUploadInvestorsRequest} bulkUploadInvestorsRequest 
     * @param {module:api/InvestorApi~bulkUploadInvestorsCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesInvestor}
     */
    bulkUploadInvestors(id, bulkUploadInvestorsRequest, callback) {
      let postBody = bulkUploadInvestorsRequest;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling bulkUploadInvestors");
      }
      // verify the required parameter 'bulkUploadInvestorsRequest' is set
      if (bulkUploadInvestorsRequest === undefined || bulkUploadInvestorsRequest === null) {
        throw new Error("Missing the required parameter 'bulkUploadInvestorsRequest' when calling bulkUploadInvestors");
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
      let returnType = V1EntitiesInvestor;
      return this.apiClient.callApi(
        '/deals/{id}/investors/bulk_upload', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the createInvestor operation.
     * @callback module:api/InvestorApi~createInvestorCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesInvestor} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Create a deal investor
     * Create a single deal investor.
     * @param {Number} id The deal id.
     * @param {module:model/PostDealsIdInvestors} dealsIdInvestors 
     * @param {module:api/InvestorApi~createInvestorCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesInvestor}
     */
    createInvestor(id, dealsIdInvestors, callback) {
      let postBody = dealsIdInvestors;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling createInvestor");
      }
      // verify the required parameter 'dealsIdInvestors' is set
      if (dealsIdInvestors === undefined || dealsIdInvestors === null) {
        throw new Error("Missing the required parameter 'dealsIdInvestors' when calling createInvestor");
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
      let returnType = V1EntitiesInvestor;
      return this.apiClient.callApi(
        '/deals/{id}/investors', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the deleteDocument operation.
     * @callback module:api/InvestorApi~deleteDocumentCallback
     * @param {String} error Error message, if any.
     * @param data This operation does not return a value.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Delete document for deal investor
     * Delete document for deal investor
     * @param {Number} id 
     * @param {Number} investorId 
     * @param {Number} documentId 
     * @param {module:api/InvestorApi~deleteDocumentCallback} callback The callback function, accepting three arguments: error, data, response
     */
    deleteDocument(id, investorId, documentId, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling deleteDocument");
      }
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling deleteDocument");
      }
      // verify the required parameter 'documentId' is set
      if (documentId === undefined || documentId === null) {
        throw new Error("Missing the required parameter 'documentId' when calling deleteDocument");
      }

      let pathParams = {
        'id': id,
        'investor_id': investorId,
        'document_id': documentId
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
        '/deals/{id}/investors/{investor_id}/delete_document/{document_id}', 'DELETE',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the deleteInvestorProfile operation.
     * @callback module:api/InvestorApi~deleteInvestorProfileCallback
     * @param {String} error Error message, if any.
     * @param data This operation does not return a value.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Delete investor profile.
     * Deletes the investor profile.
     * @param {Number} type 
     * @param {Number} id 
     * @param {module:api/InvestorApi~deleteInvestorProfileCallback} callback The callback function, accepting three arguments: error, data, response
     */
    deleteInvestorProfile(type, id, callback) {
      let postBody = null;
      // verify the required parameter 'type' is set
      if (type === undefined || type === null) {
        throw new Error("Missing the required parameter 'type' when calling deleteInvestorProfile");
      }
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling deleteInvestorProfile");
      }

      let pathParams = {
        'type': type,
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
        '/investor_profiles/{type}/{id}', 'DELETE',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the editInvestorTags operation.
     * @callback module:api/InvestorApi~editInvestorTagsCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesInvestor} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Append or replace tag(s) for a specific investor
     * Edit investor tag
     * @param {Number} id 
     * @param {Number} investorId 
     * @param {module:model/EditInvestorTagsRequest} editInvestorTagsRequest 
     * @param {module:api/InvestorApi~editInvestorTagsCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesInvestor}
     */
    editInvestorTags(id, investorId, editInvestorTagsRequest, callback) {
      let postBody = editInvestorTagsRequest;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling editInvestorTags");
      }
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling editInvestorTags");
      }
      // verify the required parameter 'editInvestorTagsRequest' is set
      if (editInvestorTagsRequest === undefined || editInvestorTagsRequest === null) {
        throw new Error("Missing the required parameter 'editInvestorTagsRequest' when calling editInvestorTags");
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
      let contentTypes = ['application/json'];
      let accepts = ['application/json'];
      let returnType = V1EntitiesInvestor;
      return this.apiClient.callApi(
        '/deals/{id}/investors/{investor_id}/edit_tags', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getEnforcements operation.
     * @callback module:api/InvestorApi~getEnforcementsCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesInvestor} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get enforcements for a background search
     * Get enforcements for a background search
     * @param {Number} id 
     * @param {Number} investorId 
     * @param {Number} searchEntityId 
     * @param {module:api/InvestorApi~getEnforcementsCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesInvestor}
     */
    getEnforcements(id, investorId, searchEntityId, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getEnforcements");
      }
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling getEnforcements");
      }
      // verify the required parameter 'searchEntityId' is set
      if (searchEntityId === undefined || searchEntityId === null) {
        throw new Error("Missing the required parameter 'searchEntityId' when calling getEnforcements");
      }

      let pathParams = {
        'id': id,
        'investor_id': investorId,
        'search_entity_id': searchEntityId
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
      let returnType = V1EntitiesInvestor;
      return this.apiClient.callApi(
        '/deals/{id}/investors/{investor_id}/background_checks/{search_entity_id}/enforcements', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getInvestor operation.
     * @callback module:api/InvestorApi~getInvestorCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesInvestor} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get a deal investor by id
     * Gets a single investor by the id.
     * @param {Number} id The deal id.
     * @param {Number} investorId The investor id.
     * @param {module:api/InvestorApi~getInvestorCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesInvestor}
     */
    getInvestor(id, investorId, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getInvestor");
      }
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling getInvestor");
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
      let returnType = V1EntitiesInvestor;
      return this.apiClient.callApi(
        '/deals/{id}/investors/{investor_id}', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getInvestorOtpLink operation.
     * @callback module:api/InvestorApi~getInvestorOtpLinkCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesInvestorOtpAccessLink} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get OTP access link for deal investor
     * The access link for the investor. This is the access link for the specific investment, not the user.                       If the same user has multiple investments, each one will have a different access link.                       Please note that this access link expires every hour. In order to redirect the investor into their authentication screen,                       use the https://app.dealmaker.tech/deals/{{deal_id}}/investors/{{investor_id}}/otp_access url.
     * @param {Number} id The deal id.
     * @param {Number} investorId The investor id.
     * @param {module:api/InvestorApi~getInvestorOtpLinkCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesInvestorOtpAccessLink}
     */
    getInvestorOtpLink(id, investorId, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getInvestorOtpLink");
      }
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling getInvestorOtpLink");
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
      let returnType = V1EntitiesInvestorOtpAccessLink;
      return this.apiClient.callApi(
        '/deals/{id}/investors/{investor_id}/otp_access_link', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the listInvestors operation.
     * @callback module:api/InvestorApi~listInvestorsCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesInvestors} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * List deal investors
     * List deal investors according to the specified search criteria.
     * @param {Number} id The deal id.
     * @param {Object} opts Optional parameters
     * @param {Number} [page = 1)] Page offset to fetch.
     * @param {Number} [perPage = 25)] Number of results to return per page.
     * @param {Number} [offset = 0)] Pad a number of results.
     * @param {Array.<Number>} [investorIds] An array of investor ids.
     * @param {String} [q] The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering)
     * @param {module:api/InvestorApi~listInvestorsCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesInvestors}
     */
    listInvestors(id, opts, callback) {
      opts = opts || {};
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling listInvestors");
      }

      let pathParams = {
        'id': id
      };
      let queryParams = {
        'page': opts['page'],
        'per_page': opts['perPage'],
        'offset': opts['offset'],
        'investor_ids': this.apiClient.buildCollectionParam(opts['investorIds'], 'csv'),
        'q': opts['q']
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesInvestors;
      return this.apiClient.callApi(
        '/deals/{id}/investors', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the patchInvestor operation.
     * @callback module:api/InvestorApi~patchInvestorCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesInvestor} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Patch a deal investor
     * Patch deal investor
     * @param {Number} id The deal id.
     * @param {Number} investorId The investor id.
     * @param {module:model/PatchInvestorRequest} patchInvestorRequest 
     * @param {module:api/InvestorApi~patchInvestorCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesInvestor}
     */
    patchInvestor(id, investorId, patchInvestorRequest, callback) {
      let postBody = patchInvestorRequest;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling patchInvestor");
      }
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling patchInvestor");
      }
      // verify the required parameter 'patchInvestorRequest' is set
      if (patchInvestorRequest === undefined || patchInvestorRequest === null) {
        throw new Error("Missing the required parameter 'patchInvestorRequest' when calling patchInvestor");
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
      let contentTypes = ['application/json'];
      let accepts = ['application/json'];
      let returnType = V1EntitiesInvestor;
      return this.apiClient.callApi(
        '/deals/{id}/investors/{investor_id}', 'PATCH',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the runBackgroundSearch operation.
     * @callback module:api/InvestorApi~runBackgroundSearchCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesInvestor} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Run Alloy background search for the investor
     * Run Alloy background search for the investor
     * @param {Number} id 
     * @param {Number} investorId 
     * @param {Number} searchEntityId 
     * @param {module:api/InvestorApi~runBackgroundSearchCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesInvestor}
     */
    runBackgroundSearch(id, investorId, searchEntityId, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling runBackgroundSearch");
      }
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling runBackgroundSearch");
      }
      // verify the required parameter 'searchEntityId' is set
      if (searchEntityId === undefined || searchEntityId === null) {
        throw new Error("Missing the required parameter 'searchEntityId' when calling runBackgroundSearch");
      }

      let pathParams = {
        'id': id,
        'investor_id': investorId,
        'search_entity_id': searchEntityId
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
      let returnType = V1EntitiesInvestor;
      return this.apiClient.callApi(
        '/deals/{id}/investors/{investor_id}/background_checks/{search_entity_id}/run', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the updateInvestor operation.
     * @callback module:api/InvestorApi~updateInvestorCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesInvestor} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Update a deal investor
     * Update deal investor
     * @param {Number} id The deal id.
     * @param {Number} investorId The investor id.
     * @param {module:model/PutDealsIdInvestors} dealsIdInvestors 
     * @param {module:api/InvestorApi~updateInvestorCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesInvestor}
     */
    updateInvestor(id, investorId, dealsIdInvestors, callback) {
      let postBody = dealsIdInvestors;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling updateInvestor");
      }
      // verify the required parameter 'investorId' is set
      if (investorId === undefined || investorId === null) {
        throw new Error("Missing the required parameter 'investorId' when calling updateInvestor");
      }
      // verify the required parameter 'dealsIdInvestors' is set
      if (dealsIdInvestors === undefined || dealsIdInvestors === null) {
        throw new Error("Missing the required parameter 'dealsIdInvestors' when calling updateInvestor");
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
      let contentTypes = ['application/json'];
      let accepts = ['application/json'];
      let returnType = V1EntitiesInvestor;
      return this.apiClient.callApi(
        '/deals/{id}/investors/{investor_id}', 'PUT',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }


}
