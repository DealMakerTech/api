/**
 * DealMaker API
 * # Introduction  Welcome to DealMaker’s Web API v1! This API is RESTful, easy to integrate with, and offers support in 2 different languages.  # Libraries  * Javascript * Ruby  # Authentication  To authenticate, add an Authorization header to your API request that contains an access token.  ## Create an Application  DealMaker’s Web API v1 supports the use of OAuth applications. Applications can be generated in your [account](https://app.dealmaker.tech/developer/applications).   Unde the developer tab, click the `Create New Application` button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-1.png)  Name your application and assign the level of permissions for this application  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-2.png)  Once your application is created, save in a secure space your public and secret keys.  **WARNING**: The secret key will not be visible after you click the close button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-3.png)  From the developer tab, you will be able to view and manage all the available applications  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-4.png)   Each Application consists of a client id, secret and set of scopes. The scopes define what resources you want to have access to. The client ID and secret are used to generate an access token. You will need to create an application to use API endpoints.   ## How to generate an access token   After creating an application, you must make a call to obtain a bearer token using the Generate an OAuth token operation. This operation requires the following parameters:  `token endpoint` - https://app.dealmaker.tech/oauth/token  `grant_type` - must be set to `client_credentials`  `client_id` - the Client ID displayed when you created the OAuth application in the previous step  `client_secret` - the Client Secret displayed when you created the OAuth application in the previous step   `scope` - the scope is established when you created the OAuth application in the previous step  Note: The Generate an OAuth token response specifies how long the bearer token is valid for. You should reuse the bearer token until it is expired. When the token is expired, call Generate an OAuth token again to generate a new one.  To use the access token, you must set a plain text header named `Authorization` with the contents of the header being “Bearer XXX” where XXX is your generated access token.  # Status Codes  ## Content-Type Header   All responses are returned in JSON format. We specify this by sending the Content-Type header.   ## Status Codes  Below is a table containing descriptions of the various status codes we currently support against various resources.  Sometimes your API call will generate an error. Here you will find additional information about what to expect if you don’t format your request properly, or we fail to properly process your request.  | Status Code      | Description | | ----------- | ----------- | | `200`    | Success       | | `403`   | Forbiden        | | `404` | Not found |   # Pagination  Pagination is used to divide large resposes is smaller portions (pages). By default, all endpoints return a maximum of 25 records per page. You can change the number of records on a per request basis by passing a `per_page` parameter in the request header parameters.   When the response exceeds the `per_page` parameter, you can paginate through the records by increasing the `offset` parameter. Example: `offset=25` will return 25 records starting from 26th record. You may also paginate using the `page` parameter to indicate the page number you would like to show on the response.  Please review the table below for the input parameters  ## Inputs  | Parameter      | Description | | ----------- | ----------- | | `per_page` | Amount of records included on each page (Default is 25)       | | `page`   | Page number        | | `offset` | Amount of records offset on the API request where 0 represents the first record |   ## Respose Headers  To review additional information about pagination on a specific response, including how to determine the total number of pages of the avaialble data set, the API returns the following header fields with every paginated response:   | Response Header |  Description | | ----------- |  ----------- | | `X-Total`    | Total number of records of response | | `X-Total-Pages`   | Total number of pages of response | | `X-Per-Page` |  Total number of records per page of response | | `X-Page` |  Number of current page | | `X-Next-Page` |  Number of next page | | `X-Prev-Page` |  Number of previous page| | `X-Offset` |  Total number of records offset |  # Versioning  The latest version is v1.  The version can be updated on the `Accept` header, just set the version as stated on the following example:   ```  Accept:application/vnd.dealmaker-v1+json  ``` | Version |  Accept Header | | ----------- |  ----------- | | `v1`    | application/vnd.dealmaker-`v1`+json |  # SDK’s  For instruction on installing SDKs, please view the following links  * [Javascript](https://github.com/DealMakerTech/api/tree/main/v1/clients/javascript) * [Ruby](https://github.com/DealMakerTech/api/tree/main/v1/clients/ruby)  # Webhooks  Our webhooks functionality allows clients to automatically receive updates on a deal's investor data.  The type of data that the webhooks include:  * Investor Name * Date created  * Email * Phone * Allocation * Attachments * Accredited investor status * Accredited investor category * Status (Draft, Invited, Accepted, Waiting)  Via webhooks clients can subscribe to the following events as they happen on Dealmaker:  * Investor is created * Investor details are updated (any of the investor details above change or are updated) * Investor is deleted  A URL supplied by the client will receive all the events with the information as part of the payload. Clients are able to add and update the URL within DealMaker.  ## Configuration  For a comprehensive guide on how to configure Webhooks please visit our support article: [Configuring Webhooks on DealMaker – DealMaker Support](https://help.dealmaker.tech/configuring-webhooks-on-dealmaker).    As a developer user on DealMaker, you are able to configure webhooks by following the steps below:  1. Sign into Dealmaker 2. Go to **“Your profile”** in the top right corner 3. Access an **“Integrations”** configuration via the left menu 4. The developer configures webhooks by including:     * The HTTPS URL where the request will be sent     * Optionally, a security token that we would use to build a SHA1 hash that would be included in the request headers. The name of the header is `X-DealMaker-Signature`. If the secret is not specified, the hash won’t be included in the headers.     * An email address that will be used to notify about errors. 5. The developers can disable webhooks temporarily if needed  ## Specification  ### Events  The initial set of events will be related to the investor. The events are:  1. `investor.created`      * Triggers every time a new investor is added to a deal  2. `investor.updated`      * Triggers on updates to any of the following fields:         1. Status         2. Name         3. Email - (this is a user field so we trigger event for all investors with webhook subscription)         4. Allocated Amount         5. Investment Amount         6. Accredited investor fields         7. Adding or removing attachments         8. Tags     * When the investor status is signed, the payload also includes a link to the signed document; the link expires after 30  minutes  3. `investor.deleted`      * Triggers when the investor is removed from the deal     * The investor key of the payload only includes investor ID     * The deal is not included in the payload. Due to our implementation it’s impossible to retrieve the deal the investor was part of  ### Requests  * The request is a `POST` * The payload’s `content-type` is `application/json` * Only `2XX` responses are considered successful. In the event of a different response, we consider it failed and queue the event for retry * We retry the request five times, after the initial attempt. Doubling the waiting time between intervals with each try. The first retry happens after 30 seconds, then 60 seconds, 2 mins, 4 minutes, and 8 minutes. This timing scheme gives the receiver about 1 hour if all the requests fail * If an event fails all the attempts to be delivered, we send an email to the address that the user configured  ### Payload  #### Common Properties  There will be some properties that are common to all the events on the system.   |Key|Type|Description| |--- |--- |--- | |event|String|The event that triggered the call| |event_id|String|A unique identifier for the event| |deal<sup>*</sup>|Object|The deal in which the event occurred. It includes id, title, created_at and updated_at|   <sup>*</sup>This field is not included when deleting a resource  #### Common Properties (investor scope)  Every event on this scope must contain an investor object, here are some properties that are common to this object on all events in the investor scope:  |Key|Type|Description| |--- |--- |--- | |id|Integer|The unique ID of the Investor| |name|String|Investor’s Name| |status|String|Current status of the investor<br />Possible states are: <br />draft<br />invited<br />signed<br />waiting<br />accepted| |email|String|| |phone_number|String|| |investment_amount|Double|| |allocated_amount|Double|| |accredited_investor|Object|See format in respective ticket| |attachments|Array of Objects|List of supporting documents uploaded to the investor, including URL (expire after 30 minutes) and title (caption)| |funding_state|String|Investor’s current funding state (unfunded, underfunded, funded, overfunded)| |funds_pending|Boolean|True if there are pending transactions, False otherwise| |created_at|Date|| |updated_at|Date|| |tags|Array of Strings|a list of the investor's tags, separated by comma.|   ### investor.status >= signed Specific Properties   |Key|Type|Description| |--- |--- |--- | |subscription_agreement|object|id, url (expiring URL)|  #### Investor Status  Here is a brief description of each investor state:  * **Draft:** the investor is added to the platform but hasn't been invited yet and cannot access the portal * **Invited:** the investor was added to the platform but hasn’t completed the questionnaire  * **Signed:** the investor signed the document (needs approval from Lawyer or Reviewer before countersignature) * **Waiting:** the investor was approved for countersignature by any of the Lawyers or Reviewers in the deal * **Accepted:** the investor's agreement was countersigned by the Signatory  #### Update Delay  Given the high number of updates our platform performs on any investor, we’ve added a cool down period on update events that allows us to “group” updates and trigger only one every minute. In consequence, update events will be delivered 1 minute after the initial request was made and will include the latest version of the investor data at delivery time.   
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

/**
 * The V1EntitiesDealEnterprise model module.
 * @module model/V1EntitiesDealEnterprise
 * @version 0.0.1
 */
class V1EntitiesDealEnterprise {
    /**
     * Constructs a new <code>V1EntitiesDealEnterprise</code>.
     * @alias module:model/V1EntitiesDealEnterprise
     */
    constructor() { 
        
        V1EntitiesDealEnterprise.initialize(this);
    }

    /**
     * Initializes the fields of this object.
     * This method is used by the constructors of any subclasses, in order to implement multiple inheritance (mix-ins).
     * Only for internal use.
     */
    static initialize(obj) { 
    }

    /**
     * Constructs a <code>V1EntitiesDealEnterprise</code> from a plain JavaScript object, optionally creating a new instance.
     * Copies all relevant properties from <code>data</code> to <code>obj</code> if supplied or a new instance if not.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @param {module:model/V1EntitiesDealEnterprise} obj Optional instance to populate.
     * @return {module:model/V1EntitiesDealEnterprise} The populated <code>V1EntitiesDealEnterprise</code> instance.
     */
    static constructFromObject(data, obj) {
        if (data) {
            obj = obj || new V1EntitiesDealEnterprise();

            if (data.hasOwnProperty('id')) {
                obj['id'] = ApiClient.convertToType(data['id'], 'Number');
            }
            if (data.hasOwnProperty('name')) {
                obj['name'] = ApiClient.convertToType(data['name'], 'String');
            }
        }
        return obj;
    }


}

/**
 * The enterprise id.
 * @member {Number} id
 */
V1EntitiesDealEnterprise.prototype['id'] = undefined;

/**
 * The enterprise name.
 * @member {String} name
 */
V1EntitiesDealEnterprise.prototype['name'] = undefined;






export default V1EntitiesDealEnterprise;

