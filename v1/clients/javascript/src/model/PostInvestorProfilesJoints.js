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

import ApiClient from '../ApiClient';

/**
 * The PostInvestorProfilesJoints model module.
 * @module model/PostInvestorProfilesJoints
 * @version 0.86.0
 */
class PostInvestorProfilesJoints {
    /**
     * Constructs a new <code>PostInvestorProfilesJoints</code>.
     * Create new joint investor profile
     * @alias module:model/PostInvestorProfilesJoints
     * @param email {String} User email which is associated with investor profile.
     */
    constructor(email) { 
        
        PostInvestorProfilesJoints.initialize(this, email);
    }

    /**
     * Initializes the fields of this object.
     * This method is used by the constructors of any subclasses, in order to implement multiple inheritance (mix-ins).
     * Only for internal use.
     */
    static initialize(obj, email) { 
        obj['email'] = email;
    }

    /**
     * Constructs a <code>PostInvestorProfilesJoints</code> from a plain JavaScript object, optionally creating a new instance.
     * Copies all relevant properties from <code>data</code> to <code>obj</code> if supplied or a new instance if not.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @param {module:model/PostInvestorProfilesJoints} obj Optional instance to populate.
     * @return {module:model/PostInvestorProfilesJoints} The populated <code>PostInvestorProfilesJoints</code> instance.
     */
    static constructFromObject(data, obj) {
        if (data) {
            obj = obj || new PostInvestorProfilesJoints();

            if (data.hasOwnProperty('email')) {
                obj['email'] = ApiClient.convertToType(data['email'], 'String');
            }
            if (data.hasOwnProperty('us_accredited_category')) {
                obj['us_accredited_category'] = ApiClient.convertToType(data['us_accredited_category'], 'String');
            }
            if (data.hasOwnProperty('ca_accredited_investor')) {
                obj['ca_accredited_investor'] = ApiClient.convertToType(data['ca_accredited_investor'], 'String');
            }
            if (data.hasOwnProperty('joint_type')) {
                obj['joint_type'] = ApiClient.convertToType(data['joint_type'], 'String');
            }
            if (data.hasOwnProperty('first_name')) {
                obj['first_name'] = ApiClient.convertToType(data['first_name'], 'String');
            }
            if (data.hasOwnProperty('last_name')) {
                obj['last_name'] = ApiClient.convertToType(data['last_name'], 'String');
            }
            if (data.hasOwnProperty('suffix')) {
                obj['suffix'] = ApiClient.convertToType(data['suffix'], 'String');
            }
            if (data.hasOwnProperty('street_address')) {
                obj['street_address'] = ApiClient.convertToType(data['street_address'], 'String');
            }
            if (data.hasOwnProperty('unit2')) {
                obj['unit2'] = ApiClient.convertToType(data['unit2'], 'String');
            }
            if (data.hasOwnProperty('city')) {
                obj['city'] = ApiClient.convertToType(data['city'], 'String');
            }
            if (data.hasOwnProperty('region')) {
                obj['region'] = ApiClient.convertToType(data['region'], 'String');
            }
            if (data.hasOwnProperty('postal_code')) {
                obj['postal_code'] = ApiClient.convertToType(data['postal_code'], 'String');
            }
            if (data.hasOwnProperty('date_of_birth')) {
                obj['date_of_birth'] = ApiClient.convertToType(data['date_of_birth'], 'String');
            }
            if (data.hasOwnProperty('taxpayer_id')) {
                obj['taxpayer_id'] = ApiClient.convertToType(data['taxpayer_id'], 'String');
            }
            if (data.hasOwnProperty('phone_number')) {
                obj['phone_number'] = ApiClient.convertToType(data['phone_number'], 'String');
            }
            if (data.hasOwnProperty('income')) {
                obj['income'] = ApiClient.convertToType(data['income'], 'Number');
            }
            if (data.hasOwnProperty('net_worth')) {
                obj['net_worth'] = ApiClient.convertToType(data['net_worth'], 'Number');
            }
            if (data.hasOwnProperty('reg_cf_prior_offerings_amount')) {
                obj['reg_cf_prior_offerings_amount'] = ApiClient.convertToType(data['reg_cf_prior_offerings_amount'], 'Number');
            }
            if (data.hasOwnProperty('joint_holder_first_name')) {
                obj['joint_holder_first_name'] = ApiClient.convertToType(data['joint_holder_first_name'], 'String');
            }
            if (data.hasOwnProperty('joint_holder_last_name')) {
                obj['joint_holder_last_name'] = ApiClient.convertToType(data['joint_holder_last_name'], 'String');
            }
            if (data.hasOwnProperty('joint_holder_suffix')) {
                obj['joint_holder_suffix'] = ApiClient.convertToType(data['joint_holder_suffix'], 'String');
            }
            if (data.hasOwnProperty('joint_holder_street_address')) {
                obj['joint_holder_street_address'] = ApiClient.convertToType(data['joint_holder_street_address'], 'String');
            }
            if (data.hasOwnProperty('joint_holder_unit2')) {
                obj['joint_holder_unit2'] = ApiClient.convertToType(data['joint_holder_unit2'], 'String');
            }
            if (data.hasOwnProperty('joint_holder_city')) {
                obj['joint_holder_city'] = ApiClient.convertToType(data['joint_holder_city'], 'String');
            }
            if (data.hasOwnProperty('joint_holder_region')) {
                obj['joint_holder_region'] = ApiClient.convertToType(data['joint_holder_region'], 'String');
            }
            if (data.hasOwnProperty('joint_holder_postal_code')) {
                obj['joint_holder_postal_code'] = ApiClient.convertToType(data['joint_holder_postal_code'], 'String');
            }
            if (data.hasOwnProperty('joint_holder_date_of_birth')) {
                obj['joint_holder_date_of_birth'] = ApiClient.convertToType(data['joint_holder_date_of_birth'], 'String');
            }
            if (data.hasOwnProperty('joint_holder_taxpayer_id')) {
                obj['joint_holder_taxpayer_id'] = ApiClient.convertToType(data['joint_holder_taxpayer_id'], 'String');
            }
        }
        return obj;
    }

    /**
     * Validates the JSON data with respect to <code>PostInvestorProfilesJoints</code>.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @return {boolean} to indicate whether the JSON data is valid with respect to <code>PostInvestorProfilesJoints</code>.
     */
    static validateJSON(data) {
        // check to make sure all required properties are present in the JSON string
        for (const property of PostInvestorProfilesJoints.RequiredProperties) {
            if (!data[property]) {
                throw new Error("The required field `" + property + "` is not found in the JSON data: " + JSON.stringify(data));
            }
        }
        // ensure the json data is a string
        if (data['email'] && !(typeof data['email'] === 'string' || data['email'] instanceof String)) {
            throw new Error("Expected the field `email` to be a primitive type in the JSON string but got " + data['email']);
        }
        // ensure the json data is a string
        if (data['us_accredited_category'] && !(typeof data['us_accredited_category'] === 'string' || data['us_accredited_category'] instanceof String)) {
            throw new Error("Expected the field `us_accredited_category` to be a primitive type in the JSON string but got " + data['us_accredited_category']);
        }
        // ensure the json data is a string
        if (data['ca_accredited_investor'] && !(typeof data['ca_accredited_investor'] === 'string' || data['ca_accredited_investor'] instanceof String)) {
            throw new Error("Expected the field `ca_accredited_investor` to be a primitive type in the JSON string but got " + data['ca_accredited_investor']);
        }
        // ensure the json data is a string
        if (data['joint_type'] && !(typeof data['joint_type'] === 'string' || data['joint_type'] instanceof String)) {
            throw new Error("Expected the field `joint_type` to be a primitive type in the JSON string but got " + data['joint_type']);
        }
        // ensure the json data is a string
        if (data['first_name'] && !(typeof data['first_name'] === 'string' || data['first_name'] instanceof String)) {
            throw new Error("Expected the field `first_name` to be a primitive type in the JSON string but got " + data['first_name']);
        }
        // ensure the json data is a string
        if (data['last_name'] && !(typeof data['last_name'] === 'string' || data['last_name'] instanceof String)) {
            throw new Error("Expected the field `last_name` to be a primitive type in the JSON string but got " + data['last_name']);
        }
        // ensure the json data is a string
        if (data['suffix'] && !(typeof data['suffix'] === 'string' || data['suffix'] instanceof String)) {
            throw new Error("Expected the field `suffix` to be a primitive type in the JSON string but got " + data['suffix']);
        }
        // ensure the json data is a string
        if (data['street_address'] && !(typeof data['street_address'] === 'string' || data['street_address'] instanceof String)) {
            throw new Error("Expected the field `street_address` to be a primitive type in the JSON string but got " + data['street_address']);
        }
        // ensure the json data is a string
        if (data['unit2'] && !(typeof data['unit2'] === 'string' || data['unit2'] instanceof String)) {
            throw new Error("Expected the field `unit2` to be a primitive type in the JSON string but got " + data['unit2']);
        }
        // ensure the json data is a string
        if (data['city'] && !(typeof data['city'] === 'string' || data['city'] instanceof String)) {
            throw new Error("Expected the field `city` to be a primitive type in the JSON string but got " + data['city']);
        }
        // ensure the json data is a string
        if (data['region'] && !(typeof data['region'] === 'string' || data['region'] instanceof String)) {
            throw new Error("Expected the field `region` to be a primitive type in the JSON string but got " + data['region']);
        }
        // ensure the json data is a string
        if (data['postal_code'] && !(typeof data['postal_code'] === 'string' || data['postal_code'] instanceof String)) {
            throw new Error("Expected the field `postal_code` to be a primitive type in the JSON string but got " + data['postal_code']);
        }
        // ensure the json data is a string
        if (data['date_of_birth'] && !(typeof data['date_of_birth'] === 'string' || data['date_of_birth'] instanceof String)) {
            throw new Error("Expected the field `date_of_birth` to be a primitive type in the JSON string but got " + data['date_of_birth']);
        }
        // ensure the json data is a string
        if (data['taxpayer_id'] && !(typeof data['taxpayer_id'] === 'string' || data['taxpayer_id'] instanceof String)) {
            throw new Error("Expected the field `taxpayer_id` to be a primitive type in the JSON string but got " + data['taxpayer_id']);
        }
        // ensure the json data is a string
        if (data['phone_number'] && !(typeof data['phone_number'] === 'string' || data['phone_number'] instanceof String)) {
            throw new Error("Expected the field `phone_number` to be a primitive type in the JSON string but got " + data['phone_number']);
        }
        // ensure the json data is a string
        if (data['joint_holder_first_name'] && !(typeof data['joint_holder_first_name'] === 'string' || data['joint_holder_first_name'] instanceof String)) {
            throw new Error("Expected the field `joint_holder_first_name` to be a primitive type in the JSON string but got " + data['joint_holder_first_name']);
        }
        // ensure the json data is a string
        if (data['joint_holder_last_name'] && !(typeof data['joint_holder_last_name'] === 'string' || data['joint_holder_last_name'] instanceof String)) {
            throw new Error("Expected the field `joint_holder_last_name` to be a primitive type in the JSON string but got " + data['joint_holder_last_name']);
        }
        // ensure the json data is a string
        if (data['joint_holder_suffix'] && !(typeof data['joint_holder_suffix'] === 'string' || data['joint_holder_suffix'] instanceof String)) {
            throw new Error("Expected the field `joint_holder_suffix` to be a primitive type in the JSON string but got " + data['joint_holder_suffix']);
        }
        // ensure the json data is a string
        if (data['joint_holder_street_address'] && !(typeof data['joint_holder_street_address'] === 'string' || data['joint_holder_street_address'] instanceof String)) {
            throw new Error("Expected the field `joint_holder_street_address` to be a primitive type in the JSON string but got " + data['joint_holder_street_address']);
        }
        // ensure the json data is a string
        if (data['joint_holder_unit2'] && !(typeof data['joint_holder_unit2'] === 'string' || data['joint_holder_unit2'] instanceof String)) {
            throw new Error("Expected the field `joint_holder_unit2` to be a primitive type in the JSON string but got " + data['joint_holder_unit2']);
        }
        // ensure the json data is a string
        if (data['joint_holder_city'] && !(typeof data['joint_holder_city'] === 'string' || data['joint_holder_city'] instanceof String)) {
            throw new Error("Expected the field `joint_holder_city` to be a primitive type in the JSON string but got " + data['joint_holder_city']);
        }
        // ensure the json data is a string
        if (data['joint_holder_region'] && !(typeof data['joint_holder_region'] === 'string' || data['joint_holder_region'] instanceof String)) {
            throw new Error("Expected the field `joint_holder_region` to be a primitive type in the JSON string but got " + data['joint_holder_region']);
        }
        // ensure the json data is a string
        if (data['joint_holder_postal_code'] && !(typeof data['joint_holder_postal_code'] === 'string' || data['joint_holder_postal_code'] instanceof String)) {
            throw new Error("Expected the field `joint_holder_postal_code` to be a primitive type in the JSON string but got " + data['joint_holder_postal_code']);
        }
        // ensure the json data is a string
        if (data['joint_holder_date_of_birth'] && !(typeof data['joint_holder_date_of_birth'] === 'string' || data['joint_holder_date_of_birth'] instanceof String)) {
            throw new Error("Expected the field `joint_holder_date_of_birth` to be a primitive type in the JSON string but got " + data['joint_holder_date_of_birth']);
        }
        // ensure the json data is a string
        if (data['joint_holder_taxpayer_id'] && !(typeof data['joint_holder_taxpayer_id'] === 'string' || data['joint_holder_taxpayer_id'] instanceof String)) {
            throw new Error("Expected the field `joint_holder_taxpayer_id` to be a primitive type in the JSON string but got " + data['joint_holder_taxpayer_id']);
        }

        return true;
    }


}

PostInvestorProfilesJoints.RequiredProperties = ["email"];

/**
 * User email which is associated with investor profile.
 * @member {String} email
 */
PostInvestorProfilesJoints.prototype['email'] = undefined;

/**
 * The United States accredited investor information.
 * @member {module:model/PostInvestorProfilesJoints.UsAccreditedCategoryEnum} us_accredited_category
 */
PostInvestorProfilesJoints.prototype['us_accredited_category'] = undefined;

/**
 * The Canadian accredited investor information.
 * @member {module:model/PostInvestorProfilesJoints.CaAccreditedInvestorEnum} ca_accredited_investor
 */
PostInvestorProfilesJoints.prototype['ca_accredited_investor'] = undefined;

/**
 * The types of joint investor.
 * @member {module:model/PostInvestorProfilesJoints.JointTypeEnum} joint_type
 */
PostInvestorProfilesJoints.prototype['joint_type'] = undefined;

/**
 * The first name of the primary holder (required).
 * @member {String} first_name
 */
PostInvestorProfilesJoints.prototype['first_name'] = undefined;

/**
 * The last name of the primary holder (required).
 * @member {String} last_name
 */
PostInvestorProfilesJoints.prototype['last_name'] = undefined;

/**
 * The suffix of the primary holder.
 * @member {String} suffix
 */
PostInvestorProfilesJoints.prototype['suffix'] = undefined;

/**
 * The street address of the primary holder (required).
 * @member {String} street_address
 */
PostInvestorProfilesJoints.prototype['street_address'] = undefined;

/**
 * The street address line 2 of the primary holder.
 * @member {String} unit2
 */
PostInvestorProfilesJoints.prototype['unit2'] = undefined;

/**
 * The city of the primary holder (required).
 * @member {String} city
 */
PostInvestorProfilesJoints.prototype['city'] = undefined;

/**
 * The region or State of the primary holder (required).
 * @member {String} region
 */
PostInvestorProfilesJoints.prototype['region'] = undefined;

/**
 * The postal code or zipcode of the primary holder (required).
 * @member {String} postal_code
 */
PostInvestorProfilesJoints.prototype['postal_code'] = undefined;

/**
 * The date of birth of the primary holder (required).
 * @member {String} date_of_birth
 */
PostInvestorProfilesJoints.prototype['date_of_birth'] = undefined;

/**
 * The taxpayer identification number of the primary holder (required).
 * @member {String} taxpayer_id
 */
PostInvestorProfilesJoints.prototype['taxpayer_id'] = undefined;

/**
 * The phone number of the primary holder (required).
 * @member {String} phone_number
 */
PostInvestorProfilesJoints.prototype['phone_number'] = undefined;

/**
 * The income of the primary holder.
 * @member {Number} income
 */
PostInvestorProfilesJoints.prototype['income'] = undefined;

/**
 * The net worth of the primary holder.
 * @member {Number} net_worth
 */
PostInvestorProfilesJoints.prototype['net_worth'] = undefined;

/**
 * The prior offerings amount of the primary holder.
 * @member {Number} reg_cf_prior_offerings_amount
 */
PostInvestorProfilesJoints.prototype['reg_cf_prior_offerings_amount'] = undefined;

/**
 * The first name of the joint holder (required).
 * @member {String} joint_holder_first_name
 */
PostInvestorProfilesJoints.prototype['joint_holder_first_name'] = undefined;

/**
 * The last name of the joint holder (required).
 * @member {String} joint_holder_last_name
 */
PostInvestorProfilesJoints.prototype['joint_holder_last_name'] = undefined;

/**
 * The suffix of the joint holder.
 * @member {String} joint_holder_suffix
 */
PostInvestorProfilesJoints.prototype['joint_holder_suffix'] = undefined;

/**
 * The street address of the joint holder (required).
 * @member {String} joint_holder_street_address
 */
PostInvestorProfilesJoints.prototype['joint_holder_street_address'] = undefined;

/**
 * The street address line 2 of the joint holder.
 * @member {String} joint_holder_unit2
 */
PostInvestorProfilesJoints.prototype['joint_holder_unit2'] = undefined;

/**
 * The city of the joint holder (required).
 * @member {String} joint_holder_city
 */
PostInvestorProfilesJoints.prototype['joint_holder_city'] = undefined;

/**
 * The region or state of the joint holder (required).
 * @member {String} joint_holder_region
 */
PostInvestorProfilesJoints.prototype['joint_holder_region'] = undefined;

/**
 * The postal code or zipcode of the joint holder (required).
 * @member {String} joint_holder_postal_code
 */
PostInvestorProfilesJoints.prototype['joint_holder_postal_code'] = undefined;

/**
 * The date of birth of the joint holder (required).
 * @member {String} joint_holder_date_of_birth
 */
PostInvestorProfilesJoints.prototype['joint_holder_date_of_birth'] = undefined;

/**
 * The taxpayer identification number of the joint holder (required).
 * @member {String} joint_holder_taxpayer_id
 */
PostInvestorProfilesJoints.prototype['joint_holder_taxpayer_id'] = undefined;





/**
 * Allowed values for the <code>us_accredited_category</code> property.
 * @enum {String}
 * @readonly
 */
PostInvestorProfilesJoints['UsAccreditedCategoryEnum'] = {

    /**
     * value: "income_individual"
     * @const
     */
    "income_individual": "income_individual",

    /**
     * value: "assets_individual"
     * @const
     */
    "assets_individual": "assets_individual",

    /**
     * value: "director"
     * @const
     */
    "director": "director",

    /**
     * value: "knowledgable_employee"
     * @const
     */
    "knowledgable_employee": "knowledgable_employee",

    /**
     * value: "broker_or_dealer"
     * @const
     */
    "broker_or_dealer": "broker_or_dealer",

    /**
     * value: "investment_advisor_registered"
     * @const
     */
    "investment_advisor_registered": "investment_advisor_registered",

    /**
     * value: "investment_advisor_relying"
     * @const
     */
    "investment_advisor_relying": "investment_advisor_relying",

    /**
     * value: "designated_accredited_investor"
     * @const
     */
    "designated_accredited_investor": "designated_accredited_investor",

    /**
     * value: "not_accredited"
     * @const
     */
    "not_accredited": "not_accredited"
};


/**
 * Allowed values for the <code>ca_accredited_investor</code> property.
 * @enum {String}
 * @readonly
 */
PostInvestorProfilesJoints['CaAccreditedInvestorEnum'] = {

    /**
     * value: "d"
     * @const
     */
    "d": "d",

    /**
     * value: "e"
     * @const
     */
    "e": "e",

    /**
     * value: "e_1"
     * @const
     */
    "e_1": "e_1",

    /**
     * value: "j"
     * @const
     */
    "j": "j",

    /**
     * value: "j_1"
     * @const
     */
    "j_1": "j_1",

    /**
     * value: "k_alone"
     * @const
     */
    "k_alone": "k_alone",

    /**
     * value: "k_spouse"
     * @const
     */
    "k_spouse": "k_spouse",

    /**
     * value: "l"
     * @const
     */
    "l": "l",

    /**
     * value: "q"
     * @const
     */
    "q": "q",

    /**
     * value: "v"
     * @const
     */
    "v": "v",

    /**
     * value: "x"
     * @const
     */
    "x": "x"
};


/**
 * Allowed values for the <code>joint_type</code> property.
 * @enum {String}
 * @readonly
 */
PostInvestorProfilesJoints['JointTypeEnum'] = {

    /**
     * value: "joint_tenant"
     * @const
     */
    "joint_tenant": "joint_tenant",

    /**
     * value: "tenants_in_common"
     * @const
     */
    "tenants_in_common": "tenants_in_common",

    /**
     * value: "community_property"
     * @const
     */
    "community_property": "community_property"
};



export default PostInvestorProfilesJoints;

