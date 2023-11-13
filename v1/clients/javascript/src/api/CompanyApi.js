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
import CreateBulkUploadDetailRequest from '../model/CreateBulkUploadDetailRequest';
import CreateBulkUploadRequest from '../model/CreateBulkUploadRequest';
import CreateCompanyRequest from '../model/CreateCompanyRequest';
import CreateShareholderActionRequest from '../model/CreateShareholderActionRequest';
import SendPortalInviteRequest from '../model/SendPortalInviteRequest';
import V1EntitiesBulkUpload from '../model/V1EntitiesBulkUpload';
import V1EntitiesBulkUploadDetail from '../model/V1EntitiesBulkUploadDetail';
import V1EntitiesBulkUploadDetails from '../model/V1EntitiesBulkUploadDetails';
import V1EntitiesBulkUploads from '../model/V1EntitiesBulkUploads';
import V1EntitiesCompany from '../model/V1EntitiesCompany';
import V1EntitiesDividends from '../model/V1EntitiesDividends';
import V1EntitiesGenericResponse from '../model/V1EntitiesGenericResponse';

/**
* Company service.
* @module api/CompanyApi
* @version 0.91.1
*/
export default class CompanyApi {

    /**
    * Constructs a new CompanyApi. 
    * @alias module:api/CompanyApi
    * @class
    * @param {module:ApiClient} [apiClient] Optional API client implementation to use,
    * default to {@link module:ApiClient#instance} if unspecified.
    */
    constructor(apiClient) {
        this.apiClient = apiClient || ApiClient.instance;
    }


    /**
     * Callback function to receive the result of the createBulkUpload operation.
     * @callback module:api/CompanyApi~createBulkUploadCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesBulkUpload} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Create bulk upload record
     * Create bulk upload record
     * @param {Number} id The company id
     * @param {module:model/CreateBulkUploadRequest} createBulkUploadRequest 
     * @param {module:api/CompanyApi~createBulkUploadCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesBulkUpload}
     */
    createBulkUpload(id, createBulkUploadRequest, callback) {
      let postBody = createBulkUploadRequest;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling createBulkUpload");
      }
      // verify the required parameter 'createBulkUploadRequest' is set
      if (createBulkUploadRequest === undefined || createBulkUploadRequest === null) {
        throw new Error("Missing the required parameter 'createBulkUploadRequest' when calling createBulkUpload");
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
      let returnType = V1EntitiesBulkUpload;
      return this.apiClient.callApi(
        '/companies/{id}/documents/bulk_uploads', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the createBulkUploadDetail operation.
     * @callback module:api/CompanyApi~createBulkUploadDetailCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesBulkUploadDetail} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Create a BulkUploadDetail class record
     * Create a BulkUploadDetail class record
     * @param {String} bulkUploadId The Bulk upload ID from which detail is associated with
     * @param {Number} companyId 
     * @param {module:model/CreateBulkUploadDetailRequest} createBulkUploadDetailRequest 
     * @param {module:api/CompanyApi~createBulkUploadDetailCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesBulkUploadDetail}
     */
    createBulkUploadDetail(bulkUploadId, companyId, createBulkUploadDetailRequest, callback) {
      let postBody = createBulkUploadDetailRequest;
      // verify the required parameter 'bulkUploadId' is set
      if (bulkUploadId === undefined || bulkUploadId === null) {
        throw new Error("Missing the required parameter 'bulkUploadId' when calling createBulkUploadDetail");
      }
      // verify the required parameter 'companyId' is set
      if (companyId === undefined || companyId === null) {
        throw new Error("Missing the required parameter 'companyId' when calling createBulkUploadDetail");
      }
      // verify the required parameter 'createBulkUploadDetailRequest' is set
      if (createBulkUploadDetailRequest === undefined || createBulkUploadDetailRequest === null) {
        throw new Error("Missing the required parameter 'createBulkUploadDetailRequest' when calling createBulkUploadDetail");
      }

      let pathParams = {
        'bulk_upload_id': bulkUploadId,
        'company_id': companyId
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
      let returnType = V1EntitiesBulkUploadDetail;
      return this.apiClient.callApi(
        '/companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the createCompany operation.
     * @callback module:api/CompanyApi~createCompanyCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesCompany} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Create new company
     * Creates a new company.
     * @param {module:model/CreateCompanyRequest} createCompanyRequest 
     * @param {module:api/CompanyApi~createCompanyCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesCompany}
     */
    createCompany(createCompanyRequest, callback) {
      let postBody = createCompanyRequest;
      // verify the required parameter 'createCompanyRequest' is set
      if (createCompanyRequest === undefined || createCompanyRequest === null) {
        throw new Error("Missing the required parameter 'createCompanyRequest' when calling createCompany");
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
      let returnType = V1EntitiesCompany;
      return this.apiClient.callApi(
        '/companies', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the createShareholderAction operation.
     * @callback module:api/CompanyApi~createShareholderActionCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesGenericResponse} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Create a shareholder action
     * Create a shareholder action
     * @param {Number} companyId The company id
     * @param {Number} shareholderId The shareholder id
     * @param {module:model/CreateShareholderActionRequest} createShareholderActionRequest 
     * @param {module:api/CompanyApi~createShareholderActionCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesGenericResponse}
     */
    createShareholderAction(companyId, shareholderId, createShareholderActionRequest, callback) {
      let postBody = createShareholderActionRequest;
      // verify the required parameter 'companyId' is set
      if (companyId === undefined || companyId === null) {
        throw new Error("Missing the required parameter 'companyId' when calling createShareholderAction");
      }
      // verify the required parameter 'shareholderId' is set
      if (shareholderId === undefined || shareholderId === null) {
        throw new Error("Missing the required parameter 'shareholderId' when calling createShareholderAction");
      }
      // verify the required parameter 'createShareholderActionRequest' is set
      if (createShareholderActionRequest === undefined || createShareholderActionRequest === null) {
        throw new Error("Missing the required parameter 'createShareholderActionRequest' when calling createShareholderAction");
      }

      let pathParams = {
        'company_id': companyId,
        'shareholder_id': shareholderId
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
      let returnType = V1EntitiesGenericResponse;
      return this.apiClient.callApi(
        '/companies/{company_id}/shareholders/{shareholder_id}/actions', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getBulkUpload operation.
     * @callback module:api/CompanyApi~getBulkUploadCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesBulkUpload} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Return a given bulk upload by id
     * Return a given bulk upload by id
     * @param {Number} id 
     * @param {Number} bulkUploadId 
     * @param {Object} opts Optional parameters
     * @param {Number} [page = 1)] Page offset to fetch.
     * @param {Number} [perPage = 25)] Number of results to return per page.
     * @param {Number} [offset = 0)] Pad a number of results.
     * @param {module:api/CompanyApi~getBulkUploadCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesBulkUpload}
     */
    getBulkUpload(id, bulkUploadId, opts, callback) {
      opts = opts || {};
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getBulkUpload");
      }
      // verify the required parameter 'bulkUploadId' is set
      if (bulkUploadId === undefined || bulkUploadId === null) {
        throw new Error("Missing the required parameter 'bulkUploadId' when calling getBulkUpload");
      }

      let pathParams = {
        'id': id,
        'bulk_upload_id': bulkUploadId
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
      let returnType = V1EntitiesBulkUpload;
      return this.apiClient.callApi(
        '/companies/{id}/documents/bulk_uploads/{bulk_upload_id}', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getBulkUploadDetailsErrors operation.
     * @callback module:api/CompanyApi~getBulkUploadDetailsErrorsCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesBulkUploadDetails} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc
     * Returns a full list of details with errors of the given bulk upload
     * @param {Number} companyId 
     * @param {Number} bulkUploadId 
     * @param {module:api/CompanyApi~getBulkUploadDetailsErrorsCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesBulkUploadDetails}
     */
    getBulkUploadDetailsErrors(companyId, bulkUploadId, callback) {
      let postBody = null;
      // verify the required parameter 'companyId' is set
      if (companyId === undefined || companyId === null) {
        throw new Error("Missing the required parameter 'companyId' when calling getBulkUploadDetailsErrors");
      }
      // verify the required parameter 'bulkUploadId' is set
      if (bulkUploadId === undefined || bulkUploadId === null) {
        throw new Error("Missing the required parameter 'bulkUploadId' when calling getBulkUploadDetailsErrors");
      }

      let pathParams = {
        'company_id': companyId,
        'bulk_upload_id': bulkUploadId
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
      let returnType = V1EntitiesBulkUploadDetails;
      return this.apiClient.callApi(
        '/companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/errors', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getBulkUploads operation.
     * @callback module:api/CompanyApi~getBulkUploadsCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesBulkUploads} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Return bulk uploads
     * Return bulk uploads
     * @param {Number} id 
     * @param {Object} opts Optional parameters
     * @param {Number} [page = 1)] Page offset to fetch.
     * @param {Number} [perPage = 25)] Number of results to return per page.
     * @param {Number} [offset = 0)] Pad a number of results.
     * @param {module:api/CompanyApi~getBulkUploadsCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesBulkUploads}
     */
    getBulkUploads(id, opts, callback) {
      opts = opts || {};
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getBulkUploads");
      }

      let pathParams = {
        'id': id
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
      let returnType = V1EntitiesBulkUploads;
      return this.apiClient.callApi(
        '/companies/{id}/documents/bulk_uploads', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getCompanies operation.
     * @callback module:api/CompanyApi~getCompaniesCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesCompany} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get list of Companies
     * Get companies
     * @param {Object} opts Optional parameters
     * @param {Number} [page = 1)] Page offset to fetch.
     * @param {Number} [perPage = 25)] Number of results to return per page.
     * @param {Number} [offset = 0)] Pad a number of results.
     * @param {module:api/CompanyApi~getCompaniesCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesCompany}
     */
    getCompanies(opts, callback) {
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
      let returnType = V1EntitiesCompany;
      return this.apiClient.callApi(
        '/companies', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getCompany operation.
     * @callback module:api/CompanyApi~getCompanyCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesCompany} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get a Company
     * Get a Company.
     * @param {Number} id 
     * @param {module:api/CompanyApi~getCompanyCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesCompany}
     */
    getCompany(id, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getCompany");
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
      let returnType = V1EntitiesCompany;
      return this.apiClient.callApi(
        '/companies/{id}', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getDetailsErrorsGrouped operation.
     * @callback module:api/CompanyApi~getDetailsErrorsGroupedCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesBulkUploadDetails} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Return bulk upload details grouped by status
     * Return bulk upload details grouped by status
     * @param {Number} companyId 
     * @param {Number} bulkUploadId 
     * @param {module:api/CompanyApi~getDetailsErrorsGroupedCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesBulkUploadDetails}
     */
    getDetailsErrorsGrouped(companyId, bulkUploadId, callback) {
      let postBody = null;
      // verify the required parameter 'companyId' is set
      if (companyId === undefined || companyId === null) {
        throw new Error("Missing the required parameter 'companyId' when calling getDetailsErrorsGrouped");
      }
      // verify the required parameter 'bulkUploadId' is set
      if (bulkUploadId === undefined || bulkUploadId === null) {
        throw new Error("Missing the required parameter 'bulkUploadId' when calling getDetailsErrorsGrouped");
      }

      let pathParams = {
        'company_id': companyId,
        'bulk_upload_id': bulkUploadId
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
      let returnType = V1EntitiesBulkUploadDetails;
      return this.apiClient.callApi(
        '/companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/grouped_errors', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getDividends operation.
     * @callback module:api/CompanyApi~getDividendsCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesDividends} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Return dividends
     * Return dividends associated with a shareholder
     * @param {Number} companyId 
     * @param {module:api/CompanyApi~getDividendsCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesDividends}
     */
    getDividends(companyId, callback) {
      let postBody = null;
      // verify the required parameter 'companyId' is set
      if (companyId === undefined || companyId === null) {
        throw new Error("Missing the required parameter 'companyId' when calling getDividends");
      }

      let pathParams = {
        'company_id': companyId
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
      let returnType = V1EntitiesDividends;
      return this.apiClient.callApi(
        '/companies/{company_id}/portal/dividends', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the getUserAccessibleCompanies operation.
     * @callback module:api/CompanyApi~getUserAccessibleCompaniesCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesCompany} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get list of all Companies accessible by the user
     * Get user accessible companies
     * @param {Object} opts Optional parameters
     * @param {Number} [page = 1)] Page offset to fetch.
     * @param {Number} [perPage = 25)] Number of results to return per page.
     * @param {Number} [offset = 0)] Pad a number of results.
     * @param {module:api/CompanyApi~getUserAccessibleCompaniesCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesCompany}
     */
    getUserAccessibleCompanies(opts, callback) {
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
      let returnType = V1EntitiesCompany;
      return this.apiClient.callApi(
        '/users/accessible_companies', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }

    /**
     * Callback function to receive the result of the sendPortalInvite operation.
     * @callback module:api/CompanyApi~sendPortalInviteCallback
     * @param {String} error Error message, if any.
     * @param data This operation does not return a value.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Send portal invite to shareholder
     * Send portal invite to shareholder.
     * @param {Number} id 
     * @param {Number} shareholderId 
     * @param {Object} opts Optional parameters
     * @param {module:model/SendPortalInviteRequest} [sendPortalInviteRequest] 
     * @param {module:api/CompanyApi~sendPortalInviteCallback} callback The callback function, accepting three arguments: error, data, response
     */
    sendPortalInvite(id, shareholderId, opts, callback) {
      opts = opts || {};
      let postBody = opts['sendPortalInviteRequest'];
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling sendPortalInvite");
      }
      // verify the required parameter 'shareholderId' is set
      if (shareholderId === undefined || shareholderId === null) {
        throw new Error("Missing the required parameter 'shareholderId' when calling sendPortalInvite");
      }

      let pathParams = {
        'id': id,
        'shareholder_id': shareholderId
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
        '/companies/{id}/shareholders/{shareholder_id}/send_portal_invite', 'POST',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }


}
