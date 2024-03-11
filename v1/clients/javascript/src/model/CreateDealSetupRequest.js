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
 * The CreateDealSetupRequest model module.
 * @module model/CreateDealSetupRequest
 * @version 0.98.3
 */
class CreateDealSetupRequest {
    /**
     * Constructs a new <code>CreateDealSetupRequest</code>.
     * @alias module:model/CreateDealSetupRequest
     * @param invoicingEmail {String} The invoice email address.
     * @param offeringType {module:model/CreateDealSetupRequest.OfferingTypeEnum} The deal kind
     * @param title {String} The name of deal to setup.
     * @param companyId {Number} the company id.
     */
    constructor(invoicingEmail, offeringType, title, companyId) { 
        
        CreateDealSetupRequest.initialize(this, invoicingEmail, offeringType, title, companyId);
    }

    /**
     * Initializes the fields of this object.
     * This method is used by the constructors of any subclasses, in order to implement multiple inheritance (mix-ins).
     * Only for internal use.
     */
    static initialize(obj, invoicingEmail, offeringType, title, companyId) { 
        obj['invoicing_email'] = invoicingEmail;
        obj['offering_type'] = offeringType || 'other';
        obj['title'] = title;
        obj['company_id'] = companyId;
    }

    /**
     * Constructs a <code>CreateDealSetupRequest</code> from a plain JavaScript object, optionally creating a new instance.
     * Copies all relevant properties from <code>data</code> to <code>obj</code> if supplied or a new instance if not.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @param {module:model/CreateDealSetupRequest} obj Optional instance to populate.
     * @return {module:model/CreateDealSetupRequest} The populated <code>CreateDealSetupRequest</code> instance.
     */
    static constructFromObject(data, obj) {
        if (data) {
            obj = obj || new CreateDealSetupRequest();

            if (data.hasOwnProperty('invoicing_email')) {
                obj['invoicing_email'] = ApiClient.convertToType(data['invoicing_email'], 'String');
            }
            if (data.hasOwnProperty('issuer_industry')) {
                obj['issuer_industry'] = ApiClient.convertToType(data['issuer_industry'], 'String');
            }
            if (data.hasOwnProperty('prohibited_industry')) {
                obj['prohibited_industry'] = ApiClient.convertToType(data['prohibited_industry'], 'String');
            }
            if (data.hasOwnProperty('offering_type')) {
                obj['offering_type'] = ApiClient.convertToType(data['offering_type'], 'String');
            }
            if (data.hasOwnProperty('title')) {
                obj['title'] = ApiClient.convertToType(data['title'], 'String');
            }
            if (data.hasOwnProperty('company_id')) {
                obj['company_id'] = ApiClient.convertToType(data['company_id'], 'Number');
            }
            if (data.hasOwnProperty('representative')) {
                obj['representative'] = ApiClient.convertToType(data['representative'], 'String');
            }
        }
        return obj;
    }

    /**
     * Validates the JSON data with respect to <code>CreateDealSetupRequest</code>.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @return {boolean} to indicate whether the JSON data is valid with respect to <code>CreateDealSetupRequest</code>.
     */
    static validateJSON(data) {
        // check to make sure all required properties are present in the JSON string
        for (const property of CreateDealSetupRequest.RequiredProperties) {
            if (!data.hasOwnProperty(property)) {
                throw new Error("The required field `" + property + "` is not found in the JSON data: " + JSON.stringify(data));
            }
        }
        // ensure the json data is a string
        if (data['invoicing_email'] && !(typeof data['invoicing_email'] === 'string' || data['invoicing_email'] instanceof String)) {
            throw new Error("Expected the field `invoicing_email` to be a primitive type in the JSON string but got " + data['invoicing_email']);
        }
        // ensure the json data is a string
        if (data['issuer_industry'] && !(typeof data['issuer_industry'] === 'string' || data['issuer_industry'] instanceof String)) {
            throw new Error("Expected the field `issuer_industry` to be a primitive type in the JSON string but got " + data['issuer_industry']);
        }
        // ensure the json data is a string
        if (data['prohibited_industry'] && !(typeof data['prohibited_industry'] === 'string' || data['prohibited_industry'] instanceof String)) {
            throw new Error("Expected the field `prohibited_industry` to be a primitive type in the JSON string but got " + data['prohibited_industry']);
        }
        // ensure the json data is a string
        if (data['offering_type'] && !(typeof data['offering_type'] === 'string' || data['offering_type'] instanceof String)) {
            throw new Error("Expected the field `offering_type` to be a primitive type in the JSON string but got " + data['offering_type']);
        }
        // ensure the json data is a string
        if (data['title'] && !(typeof data['title'] === 'string' || data['title'] instanceof String)) {
            throw new Error("Expected the field `title` to be a primitive type in the JSON string but got " + data['title']);
        }
        // ensure the json data is a string
        if (data['representative'] && !(typeof data['representative'] === 'string' || data['representative'] instanceof String)) {
            throw new Error("Expected the field `representative` to be a primitive type in the JSON string but got " + data['representative']);
        }

        return true;
    }


}

CreateDealSetupRequest.RequiredProperties = ["invoicing_email", "offering_type", "title", "company_id"];

/**
 * The invoice email address.
 * @member {String} invoicing_email
 */
CreateDealSetupRequest.prototype['invoicing_email'] = undefined;

/**
 * The industry.
 * @member {module:model/CreateDealSetupRequest.IssuerIndustryEnum} issuer_industry
 * @default 'other'
 */
CreateDealSetupRequest.prototype['issuer_industry'] = 'other';

/**
 * Determine if the deal is a high risk or not.
 * @member {module:model/CreateDealSetupRequest.ProhibitedIndustryEnum} prohibited_industry
 * @default 'prohibited'
 */
CreateDealSetupRequest.prototype['prohibited_industry'] = 'prohibited';

/**
 * The deal kind
 * @member {module:model/CreateDealSetupRequest.OfferingTypeEnum} offering_type
 * @default 'other'
 */
CreateDealSetupRequest.prototype['offering_type'] = 'other';

/**
 * The name of deal to setup.
 * @member {String} title
 */
CreateDealSetupRequest.prototype['title'] = undefined;

/**
 * the company id.
 * @member {Number} company_id
 */
CreateDealSetupRequest.prototype['company_id'] = undefined;

/**
 * The email of the representative.
 * @member {String} representative
 */
CreateDealSetupRequest.prototype['representative'] = undefined;





/**
 * Allowed values for the <code>issuer_industry</code> property.
 * @enum {String}
 * @readonly
 */
CreateDealSetupRequest['IssuerIndustryEnum'] = {

    /**
     * value: "other"
     * @const
     */
    "other": "other",

    /**
     * value: "beverage"
     * @const
     */
    "beverage": "beverage",

    /**
     * value: "blockchain"
     * @const
     */
    "blockchain": "blockchain",

    /**
     * value: "cannabis"
     * @const
     */
    "cannabis": "cannabis",

    /**
     * value: "cpc"
     * @const
     */
    "cpc": "cpc",

    /**
     * value: "gaming"
     * @const
     */
    "gaming": "gaming",

    /**
     * value: "health"
     * @const
     */
    "health": "health",

    /**
     * value: "industry"
     * @const
     */
    "industry": "industry",

    /**
     * value: "mining"
     * @const
     */
    "mining": "mining",

    /**
     * value: "real_estate"
     * @const
     */
    "real_estate": "real_estate",

    /**
     * value: "retail"
     * @const
     */
    "retail": "retail",

    /**
     * value: "tech"
     * @const
     */
    "tech": "tech",

    /**
     * value: "psychedelics"
     * @const
     */
    "psychedelics": "psychedelics",

    /**
     * value: "office_of_life_sciences"
     * @const
     */
    "office_of_life_sciences": "office_of_life_sciences",

    /**
     * value: "office_of_energy_and_transportation"
     * @const
     */
    "office_of_energy_and_transportation": "office_of_energy_and_transportation",

    /**
     * value: "office_of_real_estate_and_construction"
     * @const
     */
    "office_of_real_estate_and_construction": "office_of_real_estate_and_construction",

    /**
     * value: "office_of_manufacturing"
     * @const
     */
    "office_of_manufacturing": "office_of_manufacturing",

    /**
     * value: "office_of_technology"
     * @const
     */
    "office_of_technology": "office_of_technology",

    /**
     * value: "office_of_trade_and_services"
     * @const
     */
    "office_of_trade_and_services": "office_of_trade_and_services",

    /**
     * value: "office_of_finance"
     * @const
     */
    "office_of_finance": "office_of_finance",

    /**
     * value: "office_of_international_corp_fin"
     * @const
     */
    "office_of_international_corp_fin": "office_of_international_corp_fin"
};


/**
 * Allowed values for the <code>prohibited_industry</code> property.
 * @enum {String}
 * @readonly
 */
CreateDealSetupRequest['ProhibitedIndustryEnum'] = {

    /**
     * value: "prohibited"
     * @const
     */
    "prohibited": "prohibited",

    /**
     * value: "not_prohibited"
     * @const
     */
    "not_prohibited": "not_prohibited"
};


/**
 * Allowed values for the <code>offering_type</code> property.
 * @enum {String}
 * @readonly
 */
CreateDealSetupRequest['OfferingTypeEnum'] = {

    /**
     * value: "other"
     * @const
     */
    "other": "other",

    /**
     * value: "canadian_private_placement"
     * @const
     */
    "canadian_private_placement": "canadian_private_placement",

    /**
     * value: "regulation_a_plus_offering"
     * @const
     */
    "regulation_a_plus_offering": "regulation_a_plus_offering",

    /**
     * value: "offering_memorandum"
     * @const
     */
    "offering_memorandum": "offering_memorandum",

    /**
     * value: "regulation_cf_offering"
     * @const
     */
    "regulation_cf_offering": "regulation_cf_offering",

    /**
     * value: "reg_d_506_c"
     * @const
     */
    "reg_d_506_c": "reg_d_506_c",

    /**
     * value: "reg_d_506_b"
     * @const
     */
    "reg_d_506_b": "reg_d_506_b",

    /**
     * value: "reg_s"
     * @const
     */
    "reg_s": "reg_s"
};



export default CreateDealSetupRequest;

