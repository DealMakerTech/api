/**
 * DealMaker API
 * # Introduction  Welcome to DealMaker’s Web API v1! This API is RESTful, easy to integrate with, and offers support in 2 different languages. This is the technical documentation for our API. There are tutorials and examples of integrations with our API available on our [knowledge centre](https://help.dealmaker.tech/training-centre) as well.  # Libraries  - Javascript - Ruby  # Authentication  To authenticate, add an Authorization header to your API request that contains an access token. Before you [generate an access token](#how-to-generate-an-access-token) your must first [create an application](#create-an-application) on your portal and retrieve the your client ID and secret  ## Create an Application  DealMaker’s Web API v1 supports the use of OAuth applications. Applications can be generated in your [account](https://app.dealmaker.tech/developer/applications).  To create an API Application, click on your user name in the top right corner to open a dropdown menu, and select \"Integrations\". Under the API settings tab, click the `Create New Application` button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-1.png)  Name your application and assign the level of permissions for this application  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-2.png)  Once your application is created, save in a secure space your client ID and secret.  **WARNING**: The secret key will not be visible after you click the close button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-3.png)  From the developer tab, you will be able to view and manage all the available applications  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-4.png)  Each Application consists of a client id, secret and set of scopes. The scopes define what resources you want to have access to. The client ID and secret are used to generate an access token. You will need to create an application to use API endpoints.  ## How to generate an access token  After creating an application, you must make a call to obtain a bearer token using the Generate an OAuth token operation. This operation requires the following parameters:  `token endpoint` - https://app.dealmaker.tech/oauth/token  `grant_type` - must be set to `client_credentials`  `client_id` - the Client ID displayed when you created the OAuth application in the previous step  `client_secret` - the Client Secret displayed when you created the OAuth application in the previous step  `scope` - the scope is established when you created the OAuth application in the previous step  Note: The Generate an OAuth token response specifies how long the bearer token is valid for. You should reuse the bearer token until it is expired. When the token is expired, call Generate an OAuth token again to generate a new one.  To use the access token, you must set a plain text header named `Authorization` with the contents of the header being “Bearer XXX” where XXX is your generated access token.  ### Example  #### Postman  Here's an example on how to generate the access token with Postman, where `{{CLIENT_ID}}` and `{{CLIENT_SECRET}}` are the values generated after following the steps on [Create an Application](#create-an-application)  ![Get access token postman example](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/token-postman.png)  # Status Codes  ## Content-Type Header  All responses are returned in JSON format. We specify this by sending the Content-Type header.  ## Status Codes  Below is a table containing descriptions of the various status codes we currently support against various resources.  Sometimes your API call will generate an error. Here you will find additional information about what to expect if you don’t format your request properly, or we fail to properly process your request.  | Status Code | Description | | ----------- | ----------- | | `200`       | Success     | | `403`       | Forbidden   | | `404`       | Not found   |  # Pagination  Pagination is used to divide large responses is smaller portions (pages). By default, all endpoints return a maximum of 25 records per page. You can change the number of records on a per request basis by passing a `per_page` parameter in the request header parameters. The largest supported `per_page` parameter is 100.  When the response exceeds the `per_page` parameter, you can paginate through the records by increasing the `offset` parameter. Example: `offset=25` will return 25 records starting from 26th record. You may also paginate using the `page` parameter to indicate the page number you would like to show on the response.  Please review the table below for the input parameters  ## Inputs  | Parameter  | Description                                                                     | | ---------- | ------------------------------------------------------------------------------- | | `per_page` | Amount of records included on each page (Default is 25)                         | | `page`     | Page number                                                                     | | `offset`   | Amount of records offset on the API request where 0 represents the first record |  ## Response Headers  | Response Header | Description                                  | | --------------- | -------------------------------------------- | | `X-Total`       | Total number of records of response          | | `X-Total-Pages` | Total number of pages of response            | | `X-Per-Page`    | Total number of records per page of response | | `X-Page`        | Number of current page                       | | `X-Next-Page`   | Number of next page                          | | `X-Prev-Page`   | Number of previous page                      | | `X-Offset`      | Total number of records offset               |  # Search and Filtering (The q parameter)  The q optional parameter accepts a string as input and allows you to filter the request based on that string. Please note that search strings must be encoded according to ASCII. For example, \"john+investor&#64;dealmaker.tech\" should be passed as “john%2Binvestor%40dealmaker.tech”. There are two main ways to filter with it.  ## Keyword filtering  Some keywords allow you to filter investors based on a specific “scope” of the investors, for example using the string “Invited” will filter all investors with the status invited, and the keyword “Has attachments” will filter investors with attachments.  Here’s a list of possible keywords and the “scope” each one of the keywords filters by:  | Keywords                                       | Scope                                                                       | Decoded Example                                                      | Encoded Example                                                                          | | ---------------------------------------------- | --------------------------------------------------------------------------- | -------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | | Signed on \\(date range\\)                       | Investors who signed in the provided date range                             | Signed on (date range) [2020-07-01:2020-07-31]                       | `Signed%20on%20%28date%20range%29%20%5B2020-07-01%3A2020-07-31%5D`                       | | Enabled for countersignature on \\(date range\\) | Investors who were enabled for counter signature in the provided date range | Enabled for countersignature on (date range) [2022-05-24:2022-05-25] | `Enabled%20for%20countersignature%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D` | | Accepted on \\(date range\\)                     | Investors accepted in the provided date rage                                | Accepted on (date range) [2022-05-24:2022-05-25]                     | `Accepted%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D`                         | | Offline                                        | Investors added to the deal offline                                         | Offline                                                              | `Offline`                                                                                | | Online                                         | Investors added to the deal online                                          | Online                                                               | `Online`                                                                                 | | Signed                                         | Investors who signed their agreement                                        | Signed                                                               | `Signed`                                                                                 | | Waiting for countersignature                   | Investors who have signed and are waiting for counter signature             | Waiting for countersignature                                         | `Waiting%20for%20countersignature`                                                       | | Invited                                        | Investors on the Invited Status                                             | Invited                                                              | `Invited`                                                                                | | Accepted                                       | Investors in the Accepted Status                                            | Accepted                                                             | `Accepted`                                                                               | | Questionnaire in progress                      | All Investors who have not finished completing the questionnaire            | Questionnaire in progress                                            | `Questionnaire%20in%20progress`                                                          | | Has attachments                                | All Investors with attachments                                              | Has attachments                                                      | `Has%20attachments`                                                                      | | Has notes                                      | All Investors with notes                                                    | Has notes                                                            | `Has%20notes`                                                                            | | Waiting for co-signature                       | Investors who have signed and are waiting for co-signature                  | Waiting for co-signature                                             | `Waiting%20for%20co-signature`                                                           | | Background Check Approved                      | Investors with approved background check                                    | Background Check Approved                                            | `Background%20Check%20Approved`                                                          | | Document Review Pending                        | Investors with pending review                                               | Document Review Pending                                              | `Document%20Review%20Pending`                                                            | | Document Upload Pending                        | Investors with pending documents to upload                                  | Document Upload Pending                                              | `Document%20Upload%20Pending`                                                            | | Required adjudicator review                    | Investors who are required to be review by the adjudicator                  | Required adjudicator review                                          | `Required%20adjudicator%20review`                                                        |  ---  **NOTE**  Filtering keywords are case sensitive and need to be encoded  ---  ## Search String  Any value for the parameter which does not match one of the keywords listed above, will use fields like `first name`, `last name`, `email`, `tags` to search for the investor.  For example, if you search “Robert”, because this does not match one of the keywords listed above, it will then return any investors who have the string “Robert” in their name, email, or tags fields.  # Versioning  The latest version is v1.  The version can be updated on the `Accept` header, just set the version as stated on the following example:  ```  Accept:application/vnd.dealmaker-v1+json  ```  | Version | Accept Header                       | | ------- | ----------------------------------- | | `v1`    | application/vnd.dealmaker-`v1`+json |  # SDK’s  For instruction on installing SDKs, please view the following links  - [Javascript](https://github.com/DealMakerTech/api/tree/main/v1/clients/javascript) - [Ruby](https://github.com/DealMakerTech/api/tree/main/v1/clients/ruby)  # Webhooks  Our webhooks functionality allows clients to automatically receive updates on a deal's investor data.  The type of data that the webhooks include:  - Investor Name - Date created - Email - Phone - Allocation - Attachments - Accredited investor status - Accredited investor category - Status (Draft, Invited, Accepted, Waiting)  Via webhooks clients can subscribe to the following events as they happen on Dealmaker:  - Investor is created - Investor details are updated (any of the investor details above change or are updated) - Investor is deleted  A URL supplied by the client will receive all the events with the information as part of the payload. Clients are able to add and update the URL within DealMaker.  ## Configuration  For a comprehensive guide on how to configure Webhooks please visit our support article: [Configuring Webhooks on DealMaker – DealMaker Support](https://help.dealmaker.tech/configuring-webhooks-on-dealmaker).  As a developer user on DealMaker, you are able to configure webhooks by following the steps below:  1. Sign into Dealmaker 2. Go to **“Your profile”** in the top right corner 3. Access an **“Integrations”** configuration via the left menu 4. The developer configures webhooks by including:    - The HTTPS URL where the request will be sent    - Optionally, a security token that we would use to build a SHA1 hash that would be included in the request headers. The name of the header is `X-DealMaker-Signature`. If the secret is not specified, the hash won’t be included in the headers.    - An email address that will be used to notify about errors. 5. The developers can disable webhooks temporarily if needed  ## Specification  ### Events  The initial set of events will be related to the investor. The events are:  1. `investor.created`     - Triggers every time a new investor is added to a deal  2. `investor.updated`     - Triggers on updates to any of the following fields:      1. Status      2. Name      3. Email - (this is a user field so we trigger event for all investors with webhook subscription)      4. Allocated Amount      5. Investment Amount      6. Accredited investor fields      7. Adding or removing attachments      8. Tags    - When the investor status is signed, the payload also includes a link to the signed document; the link expires after 30 minutes  3. `investor.deleted`     - Triggers when the investor is removed from the deal    - The investor key of the payload only includes investor ID    - The deal is not included in the payload. Due to our implementation it’s impossible to retrieve the deal the investor was part of  ### Requests  - The request is a `POST` - The payload’s `content-type` is `application/json` - Only `2XX` responses are considered successful. In the event of a different response, we consider it failed and queue the event for retry - We retry the request five times, after the initial attempt. Doubling the waiting time between intervals with each try. The first retry happens after 30 seconds, then 60 seconds, 2 mins, 4 minutes, and 8 minutes. This timing scheme gives the receiver about 1 hour if all the requests fail - If an event fails all the attempts to be delivered, we send an email to the address that the user configured  ### Payload  #### Common Properties  There will be some properties that are common to all the events on the system.  | Key               | Type   | Description                                                                            | | ----------------- | ------ | -------------------------------------------------------------------------------------- | | event             | String | The event that triggered the call                                                      | | event_id          | String | A unique identifier for the event                                                      | | deal<sup>\\*</sup> | Object | The deal in which the event occurred. It includes id, title, created_at and updated_at |  <sup>\\*</sup>This field is not included when deleting a resource  #### Common Properties (investor scope)  Every event on this scope must contain an investor object, here are some properties that are common to this object on all events in the investor scope:  | Key                 | Type             | Description                                                                                                              | | ------------------- | ---------------- | ------------------------------------------------------------------------------------------------------------------------ | | id                  | Integer          | The unique ID of the Investor                                                                                            | | name                | String           | Investor’s Name                                                                                                          | | status              | String           | Current status of the investor<br />Possible states are: <br />draft<br />invited<br />signed<br />waiting<br />accepted | | email               | String           |                                                                                                                          | | phone_number        | String           |                                                                                                                          | | investment_amount   | Double           |                                                                                                                          | | allocated_amount    | Double           |                                                                                                                          | | accredited_investor | Object           | See format in respective ticket                                                                                          | | attachments         | Array of Objects | List of supporting documents uploaded to the investor, including URL (expire after 30 minutes) and title (caption)       | | funding_state       | String           | Investor’s current funding state (unfunded, underfunded, funded, overfunded)                                             | | funds_pending       | Boolean          | True if there are pending transactions, False otherwise                                                                  | | created_at          | Date             |                                                                                                                          | | updated_at          | Date             |                                                                                                                          | | tags                | Array of Strings | a list of the investor's tags, separated by comma.                                                                       |  ### investor.status >= signed Specific Properties  | Key                    | Type   | Description            | | ---------------------- | ------ | ---------------------- | | subscription_agreement | object | id, url (expiring URL) |  #### Investor Status  Here is a brief description of each investor state:  - **Draft:** the investor is added to the platform but hasn't been invited yet and cannot access the portal - **Invited:** the investor was added to the platform but hasn’t completed the questionnaire - **Signed:** the investor signed the document (needs approval from Lawyer or Reviewer before countersignature) - **Waiting:** the investor was approved for countersignature by any of the Lawyers or Reviewers in the deal - **Accepted:** the investor's agreement was countersigned by the Signatory  #### Update Delay  Given the high number of updates our platform performs on any investor, we’ve added a cool down period on update events that allows us to “group” updates and trigger only one every minute. In consequence, update events will be delivered 1 minute after the initial request was made and will include the latest version of the investor data at delivery time. 
 *
 * The version of the OpenAPI document: 1.0.0
 * 
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 *
 */

import ApiClient from '../ApiClient';
import V1EntitiesAttachment from './V1EntitiesAttachment';
import V1EntitiesBackgroundCheckSearch from './V1EntitiesBackgroundCheckSearch';
import V1EntitiesInvestorUser from './V1EntitiesInvestorUser';
import V1EntitiesSubscriptionAgreement from './V1EntitiesSubscriptionAgreement';

/**
 * The V1EntitiesInvestor model module.
 * @module model/V1EntitiesInvestor
 * @version 0.75.5
 */
class V1EntitiesInvestor {
    /**
     * Constructs a new <code>V1EntitiesInvestor</code>.
     * V1_Entities_Investor model
     * @alias module:model/V1EntitiesInvestor
     */
    constructor() { 
        
        V1EntitiesInvestor.initialize(this);
    }

    /**
     * Initializes the fields of this object.
     * This method is used by the constructors of any subclasses, in order to implement multiple inheritance (mix-ins).
     * Only for internal use.
     */
    static initialize(obj) { 
    }

    /**
     * Constructs a <code>V1EntitiesInvestor</code> from a plain JavaScript object, optionally creating a new instance.
     * Copies all relevant properties from <code>data</code> to <code>obj</code> if supplied or a new instance if not.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @param {module:model/V1EntitiesInvestor} obj Optional instance to populate.
     * @return {module:model/V1EntitiesInvestor} The populated <code>V1EntitiesInvestor</code> instance.
     */
    static constructFromObject(data, obj) {
        if (data) {
            obj = obj || new V1EntitiesInvestor();

            if (data.hasOwnProperty('id')) {
                obj['id'] = ApiClient.convertToType(data['id'], 'Number');
            }
            if (data.hasOwnProperty('user')) {
                obj['user'] = V1EntitiesInvestorUser.constructFromObject(data['user']);
            }
            if (data.hasOwnProperty('created_at')) {
                obj['created_at'] = ApiClient.convertToType(data['created_at'], 'Date');
            }
            if (data.hasOwnProperty('updated_at')) {
                obj['updated_at'] = ApiClient.convertToType(data['updated_at'], 'Date');
            }
            if (data.hasOwnProperty('name')) {
                obj['name'] = ApiClient.convertToType(data['name'], 'String');
            }
            if (data.hasOwnProperty('allocation_unit')) {
                obj['allocation_unit'] = ApiClient.convertToType(data['allocation_unit'], 'String');
            }
            if (data.hasOwnProperty('state')) {
                obj['state'] = ApiClient.convertToType(data['state'], 'String');
            }
            if (data.hasOwnProperty('funding_state')) {
                obj['funding_state'] = ApiClient.convertToType(data['funding_state'], 'String');
            }
            if (data.hasOwnProperty('funds_pending')) {
                obj['funds_pending'] = ApiClient.convertToType(data['funds_pending'], 'Boolean');
            }
            if (data.hasOwnProperty('beneficial_address')) {
                obj['beneficial_address'] = ApiClient.convertToType(data['beneficial_address'], 'String');
            }
            if (data.hasOwnProperty('phone_number')) {
                obj['phone_number'] = ApiClient.convertToType(data['phone_number'], 'String');
            }
            if (data.hasOwnProperty('investor_currency')) {
                obj['investor_currency'] = ApiClient.convertToType(data['investor_currency'], 'String');
            }
            if (data.hasOwnProperty('investment_value')) {
                obj['investment_value'] = ApiClient.convertToType(data['investment_value'], 'Number');
            }
            if (data.hasOwnProperty('number_of_securities')) {
                obj['number_of_securities'] = ApiClient.convertToType(data['number_of_securities'], 'Number');
            }
            if (data.hasOwnProperty('allocated_amount')) {
                obj['allocated_amount'] = ApiClient.convertToType(data['allocated_amount'], 'Number');
            }
            if (data.hasOwnProperty('funds_value')) {
                obj['funds_value'] = ApiClient.convertToType(data['funds_value'], 'Number');
            }
            if (data.hasOwnProperty('access_link')) {
                obj['access_link'] = ApiClient.convertToType(data['access_link'], 'String');
            }
            if (data.hasOwnProperty('subscription_agreement')) {
                obj['subscription_agreement'] = V1EntitiesSubscriptionAgreement.constructFromObject(data['subscription_agreement']);
            }
            if (data.hasOwnProperty('attachments')) {
                obj['attachments'] = V1EntitiesAttachment.constructFromObject(data['attachments']);
            }
            if (data.hasOwnProperty('background_check_searches')) {
                obj['background_check_searches'] = V1EntitiesBackgroundCheckSearch.constructFromObject(data['background_check_searches']);
            }
            if (data.hasOwnProperty('verification_status')) {
                obj['verification_status'] = ApiClient.convertToType(data['verification_status'], 'String');
            }
            if (data.hasOwnProperty('warrant_expiry_date')) {
                obj['warrant_expiry_date'] = ApiClient.convertToType(data['warrant_expiry_date'], 'Date');
            }
            if (data.hasOwnProperty('warrant_certificate_number')) {
                obj['warrant_certificate_number'] = ApiClient.convertToType(data['warrant_certificate_number'], 'Number');
            }
            if (data.hasOwnProperty('ranking_score')) {
                obj['ranking_score'] = ApiClient.convertToType(data['ranking_score'], 'Number');
            }
            if (data.hasOwnProperty('investor_profile')) {
                obj['investor_profile'] = ApiClient.convertToType(data['investor_profile'], 'String');
            }
            if (data.hasOwnProperty('investor_profile_id')) {
                obj['investor_profile_id'] = ApiClient.convertToType(data['investor_profile_id'], 'Number');
            }
            if (data.hasOwnProperty('checkout_state')) {
                obj['checkout_state'] = ApiClient.convertToType(data['checkout_state'], 'String');
            }
        }
        return obj;
    }

    /**
     * Validates the JSON data with respect to <code>V1EntitiesInvestor</code>.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @return {boolean} to indicate whether the JSON data is valid with respect to <code>V1EntitiesInvestor</code>.
     */
    static validateJSON(data) {
        // validate the optional field `user`
        if (data['user']) { // data not null
          V1EntitiesInvestorUser.validateJSON(data['user']);
        }
        // ensure the json data is a string
        if (data['name'] && !(typeof data['name'] === 'string' || data['name'] instanceof String)) {
            throw new Error("Expected the field `name` to be a primitive type in the JSON string but got " + data['name']);
        }
        // ensure the json data is a string
        if (data['allocation_unit'] && !(typeof data['allocation_unit'] === 'string' || data['allocation_unit'] instanceof String)) {
            throw new Error("Expected the field `allocation_unit` to be a primitive type in the JSON string but got " + data['allocation_unit']);
        }
        // ensure the json data is a string
        if (data['state'] && !(typeof data['state'] === 'string' || data['state'] instanceof String)) {
            throw new Error("Expected the field `state` to be a primitive type in the JSON string but got " + data['state']);
        }
        // ensure the json data is a string
        if (data['funding_state'] && !(typeof data['funding_state'] === 'string' || data['funding_state'] instanceof String)) {
            throw new Error("Expected the field `funding_state` to be a primitive type in the JSON string but got " + data['funding_state']);
        }
        // ensure the json data is a string
        if (data['beneficial_address'] && !(typeof data['beneficial_address'] === 'string' || data['beneficial_address'] instanceof String)) {
            throw new Error("Expected the field `beneficial_address` to be a primitive type in the JSON string but got " + data['beneficial_address']);
        }
        // ensure the json data is a string
        if (data['phone_number'] && !(typeof data['phone_number'] === 'string' || data['phone_number'] instanceof String)) {
            throw new Error("Expected the field `phone_number` to be a primitive type in the JSON string but got " + data['phone_number']);
        }
        // ensure the json data is a string
        if (data['investor_currency'] && !(typeof data['investor_currency'] === 'string' || data['investor_currency'] instanceof String)) {
            throw new Error("Expected the field `investor_currency` to be a primitive type in the JSON string but got " + data['investor_currency']);
        }
        // ensure the json data is a string
        if (data['access_link'] && !(typeof data['access_link'] === 'string' || data['access_link'] instanceof String)) {
            throw new Error("Expected the field `access_link` to be a primitive type in the JSON string but got " + data['access_link']);
        }
        // validate the optional field `subscription_agreement`
        if (data['subscription_agreement']) { // data not null
          V1EntitiesSubscriptionAgreement.validateJSON(data['subscription_agreement']);
        }
        // validate the optional field `attachments`
        if (data['attachments']) { // data not null
          V1EntitiesAttachment.validateJSON(data['attachments']);
        }
        // validate the optional field `background_check_searches`
        if (data['background_check_searches']) { // data not null
          V1EntitiesBackgroundCheckSearch.validateJSON(data['background_check_searches']);
        }
        // ensure the json data is a string
        if (data['verification_status'] && !(typeof data['verification_status'] === 'string' || data['verification_status'] instanceof String)) {
            throw new Error("Expected the field `verification_status` to be a primitive type in the JSON string but got " + data['verification_status']);
        }
        // ensure the json data is a string
        if (data['investor_profile'] && !(typeof data['investor_profile'] === 'string' || data['investor_profile'] instanceof String)) {
            throw new Error("Expected the field `investor_profile` to be a primitive type in the JSON string but got " + data['investor_profile']);
        }
        // ensure the json data is a string
        if (data['checkout_state'] && !(typeof data['checkout_state'] === 'string' || data['checkout_state'] instanceof String)) {
            throw new Error("Expected the field `checkout_state` to be a primitive type in the JSON string but got " + data['checkout_state']);
        }

        return true;
    }


}



/**
 * Investor id.
 * @member {Number} id
 */
V1EntitiesInvestor.prototype['id'] = undefined;

/**
 * @member {module:model/V1EntitiesInvestorUser} user
 */
V1EntitiesInvestor.prototype['user'] = undefined;

/**
 * The creation time.
 * @member {Date} created_at
 */
V1EntitiesInvestor.prototype['created_at'] = undefined;

/**
 * The last update time.
 * @member {Date} updated_at
 */
V1EntitiesInvestor.prototype['updated_at'] = undefined;

/**
 * The full name of the investor.
 * @member {String} name
 */
V1EntitiesInvestor.prototype['name'] = undefined;

/**
 * The allocation unit.
 * @member {module:model/V1EntitiesInvestor.AllocationUnitEnum} allocation_unit
 */
V1EntitiesInvestor.prototype['allocation_unit'] = undefined;

/**
 * The state.
 * @member {module:model/V1EntitiesInvestor.StateEnum} state
 */
V1EntitiesInvestor.prototype['state'] = undefined;

/**
 * The funding state.
 * @member {module:model/V1EntitiesInvestor.FundingStateEnum} funding_state
 */
V1EntitiesInvestor.prototype['funding_state'] = undefined;

/**
 * True if any funds are pending; false otherwise.
 * @member {Boolean} funds_pending
 */
V1EntitiesInvestor.prototype['funds_pending'] = undefined;

/**
 * The address.
 * @member {String} beneficial_address
 */
V1EntitiesInvestor.prototype['beneficial_address'] = undefined;

/**
 * The beneficial phone number associated with the investor. If there is no phone number, this returns the phone number associated with the user profile.
 * @member {String} phone_number
 */
V1EntitiesInvestor.prototype['phone_number'] = undefined;

/**
 * The investor currency.
 * @member {String} investor_currency
 */
V1EntitiesInvestor.prototype['investor_currency'] = undefined;

/**
 * The current investment value.
 * @member {Number} investment_value
 */
V1EntitiesInvestor.prototype['investment_value'] = undefined;

/**
 * The number of securities.
 * @member {Number} number_of_securities
 */
V1EntitiesInvestor.prototype['number_of_securities'] = undefined;

/**
 * The amount allocated.
 * @member {Number} allocated_amount
 */
V1EntitiesInvestor.prototype['allocated_amount'] = undefined;

/**
 * The current amount that has been funded.
 * @member {Number} funds_value
 */
V1EntitiesInvestor.prototype['funds_value'] = undefined;

/**
 * The access link for the investor. This is the access link for the specific investment, not the user. If the same user has multiple investments, each one will have a different access link.
 * @member {String} access_link
 */
V1EntitiesInvestor.prototype['access_link'] = undefined;

/**
 * @member {module:model/V1EntitiesSubscriptionAgreement} subscription_agreement
 */
V1EntitiesInvestor.prototype['subscription_agreement'] = undefined;

/**
 * @member {module:model/V1EntitiesAttachment} attachments
 */
V1EntitiesInvestor.prototype['attachments'] = undefined;

/**
 * @member {module:model/V1EntitiesBackgroundCheckSearch} background_check_searches
 */
V1EntitiesInvestor.prototype['background_check_searches'] = undefined;

/**
 * The current 506c verification state.
 * @member {module:model/V1EntitiesInvestor.VerificationStatusEnum} verification_status
 */
V1EntitiesInvestor.prototype['verification_status'] = undefined;

/**
 * The warrant expiry date.
 * @member {Date} warrant_expiry_date
 */
V1EntitiesInvestor.prototype['warrant_expiry_date'] = undefined;

/**
 * The warrant certificate number.
 * @member {Number} warrant_certificate_number
 */
V1EntitiesInvestor.prototype['warrant_certificate_number'] = undefined;

/**
 * A value `[0, 1]` that represents the propensity for the investor to complete payment for the investment. A larger value indicates a higher likelihood of payment, as predicted by DealMaker’s machine learning algorithm. This field will only populate if DealMaker Compass is enabled for a deal and the investor `funds_state` value is not `funded` or `overfunded`
 * @member {Number} ranking_score
 */
V1EntitiesInvestor.prototype['ranking_score'] = undefined;

/**
 * @member {String} investor_profile
 */
V1EntitiesInvestor.prototype['investor_profile'] = undefined;

/**
 * The investor profile id.
 * @member {Number} investor_profile_id
 */
V1EntitiesInvestor.prototype['investor_profile_id'] = undefined;

/**
 * Current state on checkout page.
 * @member {String} checkout_state
 */
V1EntitiesInvestor.prototype['checkout_state'] = undefined;





/**
 * Allowed values for the <code>allocation_unit</code> property.
 * @enum {String}
 * @readonly
 */
V1EntitiesInvestor['AllocationUnitEnum'] = {

    /**
     * value: "securities"
     * @const
     */
    "securities": "securities",

    /**
     * value: "amount"
     * @const
     */
    "amount": "amount"
};


/**
 * Allowed values for the <code>state</code> property.
 * @enum {String}
 * @readonly
 */
V1EntitiesInvestor['StateEnum'] = {

    /**
     * value: "draft"
     * @const
     */
    "draft": "draft",

    /**
     * value: "invited"
     * @const
     */
    "invited": "invited",

    /**
     * value: "cosigning"
     * @const
     */
    "cosigning": "cosigning",

    /**
     * value: "signed"
     * @const
     */
    "signed": "signed",

    /**
     * value: "waiting"
     * @const
     */
    "waiting": "waiting",

    /**
     * value: "accepted"
     * @const
     */
    "accepted": "accepted",

    /**
     * value: "inactive"
     * @const
     */
    "inactive": "inactive"
};


/**
 * Allowed values for the <code>funding_state</code> property.
 * @enum {String}
 * @readonly
 */
V1EntitiesInvestor['FundingStateEnum'] = {

    /**
     * value: "unfunded"
     * @const
     */
    "unfunded": "unfunded",

    /**
     * value: "underfunded"
     * @const
     */
    "underfunded": "underfunded",

    /**
     * value: "funded"
     * @const
     */
    "funded": "funded",

    /**
     * value: "overfunded"
     * @const
     */
    "overfunded": "overfunded"
};


/**
 * Allowed values for the <code>verification_status</code> property.
 * @enum {String}
 * @readonly
 */
V1EntitiesInvestor['VerificationStatusEnum'] = {

    /**
     * value: "pending"
     * @const
     */
    "pending": "pending",

    /**
     * value: "approved"
     * @const
     */
    "approved": "approved",

    /**
     * value: "rejected"
     * @const
     */
    "rejected": "rejected",

    /**
     * value: "new_documents_requested"
     * @const
     */
    "new_documents_requested": "new_documents_requested"
};



export default V1EntitiesInvestor;

