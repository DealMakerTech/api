<?php
/**
 * PostInvestorProfilesJoints
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  DealMaker
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * DealMaker API
 *
 * # Introduction  Welcome to DealMaker’s Web API v1! This API is RESTful, easy to integrate with, and offers support in 2 different languages. This is the technical documentation for our API. There are tutorials and examples of integrations with our API available on our [knowledge centre](https://help.dealmaker.tech/training-centre) as well.  # Libraries  - Javascript - Ruby  # Authentication  To authenticate, add an Authorization header to your API request that contains an access token. Before you [generate an access token](#how-to-generate-an-access-token) your must first [create an application](#create-an-application) on your portal and retrieve the your client ID and secret  ## Create an Application  DealMaker’s Web API v1 supports the use of OAuth applications. Applications can be generated in your [account](https://app.dealmaker.tech/developer/applications).  To create an API Application, click on your user name in the top right corner to open a dropdown menu, and select \"Integrations\". Under the API settings tab, click the `Create New Application` button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-1.png)  Name your application and assign the level of permissions for this application  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-2.png)  Once your application is created, save in a secure space your client ID and secret.  **WARNING**: The secret key will not be visible after you click the close button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-3.png)  From the developer tab, you will be able to view and manage all the available applications  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-4.png)  Each Application consists of a client id, secret and set of scopes. The scopes define what resources you want to have access to. The client ID and secret are used to generate an access token. You will need to create an application to use API endpoints.  ## How to generate an access token  After creating an application, you must make a call to obtain a bearer token using the Generate an OAuth token operation. This operation requires the following parameters:  `token endpoint` - https://app.dealmaker.tech/oauth/token  `grant_type` - must be set to `client_credentials`  `client_id` - the Client ID displayed when you created the OAuth application in the previous step  `client_secret` - the Client Secret displayed when you created the OAuth application in the previous step  `scope` - the scope is established when you created the OAuth application in the previous step  Note: The Generate an OAuth token response specifies how long the bearer token is valid for. You should reuse the bearer token until it is expired. When the token is expired, call Generate an OAuth token again to generate a new one.  To use the access token, you must set a plain text header named `Authorization` with the contents of the header being “Bearer XXX” where XXX is your generated access token.  ### Example  #### Postman  Here's an example on how to generate the access token with Postman, where `{{CLIENT_ID}}` and `{{CLIENT_SECRET}}` are the values generated after following the steps on [Create an Application](#create-an-application)  ![Get access token postman example](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/token-postman.png)  # Status Codes  ## Content-Type Header  All responses are returned in JSON format. We specify this by sending the Content-Type header.  ## Status Codes  Below is a table containing descriptions of the various status codes we currently support against various resources.  Sometimes your API call will generate an error. Here you will find additional information about what to expect if you don’t format your request properly, or we fail to properly process your request.  | Status Code | Description | | ----------- | ----------- | | `200`       | Success     | | `403`       | Forbidden   | | `404`       | Not found   |  # Pagination  Pagination is used to divide large responses is smaller portions (pages). By default, all endpoints return a maximum of 25 records per page. You can change the number of records on a per request basis by passing a `per_page` parameter in the request header parameters. The largest supported `per_page` parameter is 100.  When the response exceeds the `per_page` parameter, you can paginate through the records by increasing the `offset` parameter. Example: `offset=25` will return 25 records starting from 26th record. You may also paginate using the `page` parameter to indicate the page number you would like to show on the response.  Please review the table below for the input parameters  ## Inputs  | Parameter  | Description                                                                     | | ---------- | ------------------------------------------------------------------------------- | | `per_page` | Amount of records included on each page (Default is 25)                         | | `page`     | Page number                                                                     | | `offset`   | Amount of records offset on the API request where 0 represents the first record |  ## Response Headers  | Response Header | Description                                  | | --------------- | -------------------------------------------- | | `X-Total`       | Total number of records of response          | | `X-Total-Pages` | Total number of pages of response            | | `X-Per-Page`    | Total number of records per page of response | | `X-Page`        | Number of current page                       | | `X-Next-Page`   | Number of next page                          | | `X-Prev-Page`   | Number of previous page                      | | `X-Offset`      | Total number of records offset               |  # Search and Filtering (The q parameter)  The q optional parameter accepts a string as input and allows you to filter the request based on that string. Please note that search strings must be encoded according to ASCII. For example, \"john+investor&#64;dealmaker.tech\" should be passed as “john%2Binvestor%40dealmaker.tech”. There are two main ways to filter with it.  ## Keyword filtering  Some keywords allow you to filter investors based on a specific “scope” of the investors, for example using the string “Invited” will filter all investors with the status invited, and the keyword “Has attachments” will filter investors with attachments.  Here’s a list of possible keywords and the “scope” each one of the keywords filters by:  | Keywords                                       | Scope                                                                       | Decoded Example                                                      | Encoded Example                                                                          | | ---------------------------------------------- | --------------------------------------------------------------------------- | -------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | | Signed on \\(date range\\)                       | Investors who signed in the provided date range                             | Signed on (date range) [2020-07-01:2020-07-31]                       | `Signed%20on%20%28date%20range%29%20%5B2020-07-01%3A2020-07-31%5D`                       | | Enabled for countersignature on \\(date range\\) | Investors who were enabled for counter signature in the provided date range | Enabled for countersignature on (date range) [2022-05-24:2022-05-25] | `Enabled%20for%20countersignature%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D` | | Accepted on \\(date range\\)                     | Investors accepted in the provided date rage                                | Accepted on (date range) [2022-05-24:2022-05-25]                     | `Accepted%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D`                         | | Offline                                        | Investors added to the deal offline                                         | Offline                                                              | `Offline`                                                                                | | Online                                         | Investors added to the deal online                                          | Online                                                               | `Online`                                                                                 | | Signed                                         | Investors who signed their agreement                                        | Signed                                                               | `Signed`                                                                                 | | Waiting for countersignature                   | Investors who have signed and are waiting for counter signature             | Waiting for countersignature                                         | `Waiting%20for%20countersignature`                                                       | | Invited                                        | Investors on the Invited Status                                             | Invited                                                              | `Invited`                                                                                | | Accepted                                       | Investors in the Accepted Status                                            | Accepted                                                             | `Accepted`                                                                               | | Questionnaire in progress                      | All Investors who have not finished completing the questionnaire            | Questionnaire in progress                                            | `Questionnaire%20in%20progress`                                                          | | Has attachments                                | All Investors with attachments                                              | Has attachments                                                      | `Has%20attachments`                                                                      | | Has notes                                      | All Investors with notes                                                    | Has notes                                                            | `Has%20notes`                                                                            | | Waiting for co-signature                       | Investors who have signed and are waiting for co-signature                  | Waiting for co-signature                                             | `Waiting%20for%20co-signature`                                                           | | Background Check Approved                      | Investors with approved background check                                    | Background Check Approved                                            | `Background%20Check%20Approved`                                                          | | Document Review Pending                        | Investors with pending review                                               | Document Review Pending                                              | `Document%20Review%20Pending`                                                            | | Document Upload Pending                        | Investors with pending documents to upload                                  | Document Upload Pending                                              | `Document%20Upload%20Pending`                                                            | | Required adjudicator review                    | Investors who are required to be review by the adjudicator                  | Required adjudicator review                                          | `Required%20adjudicator%20review`                                                        |  ---  **NOTE**  Filtering keywords are case sensitive and need to be encoded  ---  ## Search String  Any value for the parameter which does not match one of the keywords listed above, will use fields like `first name`, `last name`, `email`, `tags` to search for the investor.  For example, if you search “Robert”, because this does not match one of the keywords listed above, it will then return any investors who have the string “Robert” in their name, email, or tags fields.  # Versioning  The latest version is v1.  The version can be updated on the `Accept` header, just set the version as stated on the following example:  ```  Accept:application/vnd.dealmaker-v1+json  ```  | Version | Accept Header                       | | ------- | ----------------------------------- | | `v1`    | application/vnd.dealmaker-`v1`+json |  # SDK’s  For instruction on installing SDKs, please view the following links  - [Javascript](https://github.com/DealMakerTech/api/tree/main/v1/clients/javascript) - [Ruby](https://github.com/DealMakerTech/api/tree/main/v1/clients/ruby)  # Webhooks  Our webhooks functionality allows clients to automatically receive updates on a deal's investor data.  Some of the data that the webhooks include:  - Investor Name - Date created - Email - Phone - Allocation - Attachments - Accredited investor status - Accredited investor category - State (Draft, Invited, Signed, Accepted, Waiting, Inactive)  Via webhooks clients can subscribe to the following events as they happen on Dealmaker:  - Investor is created - Investor details are updated (any of the investor details above change or are updated) - Investor has signed their agreement - Invertor fully funded their investment - Investor has been accepted - Investor is deleted  A URL supplied by the client will receive all the events with the information as part of the payload. Clients are able to add and update the URL within DealMaker.  ## Configuration  For a comprehensive guide on how to configure Webhooks please visit our support article: [Configuring Webhooks on DealMaker – DealMaker Support](https://help.dealmaker.tech/configuring-webhooks-on-dealmaker).  As a developer user on DealMaker, you are able to configure webhooks by following the steps below:  1. Sign into Dealmaker 2. Go to **“Your profile”** in the top right corner 3. Access an **“Integrations”** configuration via the left menu 4. The developer configures webhooks by including:    - The HTTPS URL where the request will be sent    - Optionally, a security token that we would use to build a SHA1 hash that would be included in the request headers. The name of the header is `X-DealMaker-Signature`. If the secret is not specified, the hash won’t be included in the headers.    - The Deal(s) to include in the webhook subscription    - An email address that will be used to notify about errors. 5. The developers can disable webhooks temporarily if needed  ## Specification  ### Events  The initial set of events will be related to the investor. The events are:  1. `investor.created`     - Triggers every time a new investor is added to a deal  2. `investor.updated`     - Triggers on updates to any of the following fields:      - Status      - Name      - Email - (this is a user field so we trigger event for all investors with webhook subscription)      - Allocated Amount      - Investment Amount      - Accredited investor fields      - Adding or removing attachments      - Tags    - When the investor status is signed, the payload also includes a link to the signed document; the link expires after 30 minutes    3. `investor.signed`     - Triggers when the investor signs their subscription agreement (terms and conditions)      - When this happens the investor.state becomes `signed`    - This event includes the same fields as the `investor.updated` event  4. `investor.funded`     - Triggers when the investor becomes fully funded      - This happens when the investor.funded_state becomes `funded`    - This event includes the same fields as the `investor.updated` event  5. `investor.accepted`     - Triggers when the investor is countersigned      - When this happens the investor.state becomes `accepted`    - This event includes the same fields as the `investor.updated` event  6.  `investor.deleted`     - Triggers when the investor is removed from the deal    - The investor key of the payload only includes investor ID    - The deal is not included in the payload. Due to our implementation it’s impossible to retrieve the deal the investor was part of  ### Requests  - The request is a `POST` - The payload’s `content-type` is `application/json` - Only `2XX` responses are considered successful. In the event of a different response, we consider it failed and queue the event for retry - We retry the request five times, after the initial attempt. Doubling the waiting time between intervals with each try. The first retry happens after 30 seconds, then 60 seconds, 2 mins, 4 minutes, and 8 minutes. This timing scheme gives the receiver about 1 hour if all the requests fail - If an event fails all the attempts to be delivered, we send an email to the address that the user configured  ### Payload  #### Common Properties  There will be some properties that are common to all the events on the system.  | Key               | Type   | Description                                                                              | | ----------------- | ------ | --------------------------------------------------------------------------------------   | | event             | String | The event that triggered the call                                                        | | event_id          | String | A unique identifier for the event                                                        | | deal<sup>\\*</sup> | Object | The deal in which the event occurred. please see below for an example on the deal object<sup>\\*\\*</sup> |  <sup>\\*</sup>This field is not included when deleting a resource  <sup>\\*\\*</sup> Sample Deal Object in the webhook payload  ```json \"deal\": {         \"id\": 0,         \"title\": \"string\",         \"created_at\": \"2022-12-06T18:14:44.000Z\",         \"updated_at\": \"2022-12-08T12:46:48.000Z\",         \"state\": \"string\",         \"currency\": \"string\",         \"security_type\": \"string\",         \"price_per_security\": 0.00,         \"deal_type\": \"string\",         \"minimum_investment\": 0,         \"maximum_investment\": 0,         \"issuer\": {             \"id\": 0,             \"name\": \"string\"         },         \"enterprise\": {             \"id\": 0,             \"name\": \"string\"         }     } ```  #### Common Properties (investor scope)  By design, we have incorporated on the webhooks payload the same investor-related fields included in the Investor model, for reference on the included fields, their types and values please click [here](https://docs.dealmaker.tech/#tag/investor_model). This will allow you to get all the necessary information you need about a particular investor without having to call the Get Investor by ID endpoint.                                                           | #### Investor State  Here is a brief description of each investor state:  - **Draft:** the investor is added to the platform but hasn't been invited yet and cannot access the portal - **Invited:** the investor was added to the platform but hasn’t completed the questionnaire - **Signed:** the investor signed the document (needs approval from Lawyer or Reviewer before countersignature) - **Waiting:** the investor was approved for countersignature by any of the Lawyers or Reviewers in the deal - **Accepted:** the investor's agreement was countersigned by the Signatory - **Inactive** the investor is no longer eligible to participate in the offering. This may be because their warrant expired, they requested a refund, or they opted out of the offering  #### Update Delay  Given the high number of updates our platform performs on any investor, we’ve added a cool down period on update events that allows us to “group” updates and trigger only one every minute. In consequence, update events will be delivered 1 minute after the initial request was made and will include the latest version of the investor data at delivery time.
 *
 * The version of the OpenAPI document: 1.75.0
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.8.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace DealMaker\Model;

use \ArrayAccess;
use \DealMaker\ObjectSerializer;

/**
 * PostInvestorProfilesJoints Class Doc Comment
 *
 * @category Class
 * @description Create new joint investor profile
 * @package  DealMaker
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PostInvestorProfilesJoints implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'postInvestorProfilesJoints';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'email' => 'string',
        'us_accredited_category' => 'string',
        'ca_accredited_investor' => 'string',
        'joint_type' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'suffix' => 'string',
        'street_address' => 'string',
        'unit2' => 'string',
        'city' => 'string',
        'region' => 'string',
        'postal_code' => 'string',
        'date_of_birth' => 'string',
        'taxpayer_id' => 'string',
        'phone_number' => 'string',
        'income' => 'float',
        'net_worth' => 'float',
        'reg_cf_prior_offerings_amount' => 'float',
        'joint_holder_first_name' => 'string',
        'joint_holder_last_name' => 'string',
        'joint_holder_suffix' => 'string',
        'joint_holder_street_address' => 'string',
        'joint_holder_unit2' => 'string',
        'joint_holder_city' => 'string',
        'joint_holder_region' => 'string',
        'joint_holder_postal_code' => 'string',
        'joint_holder_date_of_birth' => 'string',
        'joint_holder_taxpayer_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'email' => null,
        'us_accredited_category' => null,
        'ca_accredited_investor' => null,
        'joint_type' => null,
        'first_name' => null,
        'last_name' => null,
        'suffix' => null,
        'street_address' => null,
        'unit2' => null,
        'city' => null,
        'region' => null,
        'postal_code' => null,
        'date_of_birth' => null,
        'taxpayer_id' => null,
        'phone_number' => null,
        'income' => 'float',
        'net_worth' => 'float',
        'reg_cf_prior_offerings_amount' => 'float',
        'joint_holder_first_name' => null,
        'joint_holder_last_name' => null,
        'joint_holder_suffix' => null,
        'joint_holder_street_address' => null,
        'joint_holder_unit2' => null,
        'joint_holder_city' => null,
        'joint_holder_region' => null,
        'joint_holder_postal_code' => null,
        'joint_holder_date_of_birth' => null,
        'joint_holder_taxpayer_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'email' => false,
        'us_accredited_category' => false,
        'ca_accredited_investor' => false,
        'joint_type' => false,
        'first_name' => false,
        'last_name' => false,
        'suffix' => false,
        'street_address' => false,
        'unit2' => false,
        'city' => false,
        'region' => false,
        'postal_code' => false,
        'date_of_birth' => false,
        'taxpayer_id' => false,
        'phone_number' => false,
        'income' => false,
        'net_worth' => false,
        'reg_cf_prior_offerings_amount' => false,
        'joint_holder_first_name' => false,
        'joint_holder_last_name' => false,
        'joint_holder_suffix' => false,
        'joint_holder_street_address' => false,
        'joint_holder_unit2' => false,
        'joint_holder_city' => false,
        'joint_holder_region' => false,
        'joint_holder_postal_code' => false,
        'joint_holder_date_of_birth' => false,
        'joint_holder_taxpayer_id' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'email' => 'email',
        'us_accredited_category' => 'us_accredited_category',
        'ca_accredited_investor' => 'ca_accredited_investor',
        'joint_type' => 'joint_type',
        'first_name' => 'first_name',
        'last_name' => 'last_name',
        'suffix' => 'suffix',
        'street_address' => 'street_address',
        'unit2' => 'unit2',
        'city' => 'city',
        'region' => 'region',
        'postal_code' => 'postal_code',
        'date_of_birth' => 'date_of_birth',
        'taxpayer_id' => 'taxpayer_id',
        'phone_number' => 'phone_number',
        'income' => 'income',
        'net_worth' => 'net_worth',
        'reg_cf_prior_offerings_amount' => 'reg_cf_prior_offerings_amount',
        'joint_holder_first_name' => 'joint_holder_first_name',
        'joint_holder_last_name' => 'joint_holder_last_name',
        'joint_holder_suffix' => 'joint_holder_suffix',
        'joint_holder_street_address' => 'joint_holder_street_address',
        'joint_holder_unit2' => 'joint_holder_unit2',
        'joint_holder_city' => 'joint_holder_city',
        'joint_holder_region' => 'joint_holder_region',
        'joint_holder_postal_code' => 'joint_holder_postal_code',
        'joint_holder_date_of_birth' => 'joint_holder_date_of_birth',
        'joint_holder_taxpayer_id' => 'joint_holder_taxpayer_id'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'email' => 'setEmail',
        'us_accredited_category' => 'setUsAccreditedCategory',
        'ca_accredited_investor' => 'setCaAccreditedInvestor',
        'joint_type' => 'setJointType',
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'suffix' => 'setSuffix',
        'street_address' => 'setStreetAddress',
        'unit2' => 'setUnit2',
        'city' => 'setCity',
        'region' => 'setRegion',
        'postal_code' => 'setPostalCode',
        'date_of_birth' => 'setDateOfBirth',
        'taxpayer_id' => 'setTaxpayerId',
        'phone_number' => 'setPhoneNumber',
        'income' => 'setIncome',
        'net_worth' => 'setNetWorth',
        'reg_cf_prior_offerings_amount' => 'setRegCfPriorOfferingsAmount',
        'joint_holder_first_name' => 'setJointHolderFirstName',
        'joint_holder_last_name' => 'setJointHolderLastName',
        'joint_holder_suffix' => 'setJointHolderSuffix',
        'joint_holder_street_address' => 'setJointHolderStreetAddress',
        'joint_holder_unit2' => 'setJointHolderUnit2',
        'joint_holder_city' => 'setJointHolderCity',
        'joint_holder_region' => 'setJointHolderRegion',
        'joint_holder_postal_code' => 'setJointHolderPostalCode',
        'joint_holder_date_of_birth' => 'setJointHolderDateOfBirth',
        'joint_holder_taxpayer_id' => 'setJointHolderTaxpayerId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'email' => 'getEmail',
        'us_accredited_category' => 'getUsAccreditedCategory',
        'ca_accredited_investor' => 'getCaAccreditedInvestor',
        'joint_type' => 'getJointType',
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'suffix' => 'getSuffix',
        'street_address' => 'getStreetAddress',
        'unit2' => 'getUnit2',
        'city' => 'getCity',
        'region' => 'getRegion',
        'postal_code' => 'getPostalCode',
        'date_of_birth' => 'getDateOfBirth',
        'taxpayer_id' => 'getTaxpayerId',
        'phone_number' => 'getPhoneNumber',
        'income' => 'getIncome',
        'net_worth' => 'getNetWorth',
        'reg_cf_prior_offerings_amount' => 'getRegCfPriorOfferingsAmount',
        'joint_holder_first_name' => 'getJointHolderFirstName',
        'joint_holder_last_name' => 'getJointHolderLastName',
        'joint_holder_suffix' => 'getJointHolderSuffix',
        'joint_holder_street_address' => 'getJointHolderStreetAddress',
        'joint_holder_unit2' => 'getJointHolderUnit2',
        'joint_holder_city' => 'getJointHolderCity',
        'joint_holder_region' => 'getJointHolderRegion',
        'joint_holder_postal_code' => 'getJointHolderPostalCode',
        'joint_holder_date_of_birth' => 'getJointHolderDateOfBirth',
        'joint_holder_taxpayer_id' => 'getJointHolderTaxpayerId'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const US_ACCREDITED_CATEGORY_INCOME_INDIVIDUAL = 'income_individual';
    public const US_ACCREDITED_CATEGORY_ASSETS_INDIVIDUAL = 'assets_individual';
    public const US_ACCREDITED_CATEGORY_DIRECTOR = 'director';
    public const US_ACCREDITED_CATEGORY_KNOWLEDGABLE_EMPLOYEE = 'knowledgable_employee';
    public const US_ACCREDITED_CATEGORY_BROKER_OR_DEALER = 'broker_or_dealer';
    public const US_ACCREDITED_CATEGORY_INVESTMENT_ADVISOR_REGISTERED = 'investment_advisor_registered';
    public const US_ACCREDITED_CATEGORY_INVESTMENT_ADVISOR_RELYING = 'investment_advisor_relying';
    public const US_ACCREDITED_CATEGORY_DESIGNATED_ACCREDITED_INVESTOR = 'designated_accredited_investor';
    public const US_ACCREDITED_CATEGORY_NOT_ACCREDITED = 'not_accredited';
    public const CA_ACCREDITED_INVESTOR_D = 'd';
    public const CA_ACCREDITED_INVESTOR_E = 'e';
    public const CA_ACCREDITED_INVESTOR_E_1 = 'e_1';
    public const CA_ACCREDITED_INVESTOR_J = 'j';
    public const CA_ACCREDITED_INVESTOR_J_1 = 'j_1';
    public const CA_ACCREDITED_INVESTOR_K_INDIVIDUAL = 'k_individual';
    public const CA_ACCREDITED_INVESTOR_K_SPOUSE = 'k_spouse';
    public const CA_ACCREDITED_INVESTOR_L = 'l';
    public const CA_ACCREDITED_INVESTOR_Q = 'q';
    public const CA_ACCREDITED_INVESTOR_V = 'v';
    public const CA_ACCREDITED_INVESTOR_X = 'x';
    public const JOINT_TYPE_JOINT_TENANT = 'joint_tenant';
    public const JOINT_TYPE_TENANTS_IN_COMMON = 'tenants_in_common';
    public const JOINT_TYPE_COMMUNITY_PROPERTY = 'community_property';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getUsAccreditedCategoryAllowableValues()
    {
        return [
            self::US_ACCREDITED_CATEGORY_INCOME_INDIVIDUAL,
            self::US_ACCREDITED_CATEGORY_ASSETS_INDIVIDUAL,
            self::US_ACCREDITED_CATEGORY_DIRECTOR,
            self::US_ACCREDITED_CATEGORY_KNOWLEDGABLE_EMPLOYEE,
            self::US_ACCREDITED_CATEGORY_BROKER_OR_DEALER,
            self::US_ACCREDITED_CATEGORY_INVESTMENT_ADVISOR_REGISTERED,
            self::US_ACCREDITED_CATEGORY_INVESTMENT_ADVISOR_RELYING,
            self::US_ACCREDITED_CATEGORY_DESIGNATED_ACCREDITED_INVESTOR,
            self::US_ACCREDITED_CATEGORY_NOT_ACCREDITED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCaAccreditedInvestorAllowableValues()
    {
        return [
            self::CA_ACCREDITED_INVESTOR_D,
            self::CA_ACCREDITED_INVESTOR_E,
            self::CA_ACCREDITED_INVESTOR_E_1,
            self::CA_ACCREDITED_INVESTOR_J,
            self::CA_ACCREDITED_INVESTOR_J_1,
            self::CA_ACCREDITED_INVESTOR_K_INDIVIDUAL,
            self::CA_ACCREDITED_INVESTOR_K_SPOUSE,
            self::CA_ACCREDITED_INVESTOR_L,
            self::CA_ACCREDITED_INVESTOR_Q,
            self::CA_ACCREDITED_INVESTOR_V,
            self::CA_ACCREDITED_INVESTOR_X,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getJointTypeAllowableValues()
    {
        return [
            self::JOINT_TYPE_JOINT_TENANT,
            self::JOINT_TYPE_TENANTS_IN_COMMON,
            self::JOINT_TYPE_COMMUNITY_PROPERTY,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('us_accredited_category', $data ?? [], null);
        $this->setIfExists('ca_accredited_investor', $data ?? [], null);
        $this->setIfExists('joint_type', $data ?? [], null);
        $this->setIfExists('first_name', $data ?? [], null);
        $this->setIfExists('last_name', $data ?? [], null);
        $this->setIfExists('suffix', $data ?? [], null);
        $this->setIfExists('street_address', $data ?? [], null);
        $this->setIfExists('unit2', $data ?? [], null);
        $this->setIfExists('city', $data ?? [], null);
        $this->setIfExists('region', $data ?? [], null);
        $this->setIfExists('postal_code', $data ?? [], null);
        $this->setIfExists('date_of_birth', $data ?? [], null);
        $this->setIfExists('taxpayer_id', $data ?? [], null);
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('income', $data ?? [], null);
        $this->setIfExists('net_worth', $data ?? [], null);
        $this->setIfExists('reg_cf_prior_offerings_amount', $data ?? [], null);
        $this->setIfExists('joint_holder_first_name', $data ?? [], null);
        $this->setIfExists('joint_holder_last_name', $data ?? [], null);
        $this->setIfExists('joint_holder_suffix', $data ?? [], null);
        $this->setIfExists('joint_holder_street_address', $data ?? [], null);
        $this->setIfExists('joint_holder_unit2', $data ?? [], null);
        $this->setIfExists('joint_holder_city', $data ?? [], null);
        $this->setIfExists('joint_holder_region', $data ?? [], null);
        $this->setIfExists('joint_holder_postal_code', $data ?? [], null);
        $this->setIfExists('joint_holder_date_of_birth', $data ?? [], null);
        $this->setIfExists('joint_holder_taxpayer_id', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['email'] === null) {
            $invalidProperties[] = "'email' can't be null";
        }
        $allowedValues = $this->getUsAccreditedCategoryAllowableValues();
        if (!is_null($this->container['us_accredited_category']) && !in_array($this->container['us_accredited_category'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'us_accredited_category', must be one of '%s'",
                $this->container['us_accredited_category'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getCaAccreditedInvestorAllowableValues();
        if (!is_null($this->container['ca_accredited_investor']) && !in_array($this->container['ca_accredited_investor'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'ca_accredited_investor', must be one of '%s'",
                $this->container['ca_accredited_investor'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getJointTypeAllowableValues();
        if (!is_null($this->container['joint_type']) && !in_array($this->container['joint_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'joint_type', must be one of '%s'",
                $this->container['joint_type'],
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email User email which is associated with investor profile.
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (is_null($email)) {
            throw new \InvalidArgumentException('non-nullable email cannot be null');
        }
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets us_accredited_category
     *
     * @return string|null
     */
    public function getUsAccreditedCategory()
    {
        return $this->container['us_accredited_category'];
    }

    /**
     * Sets us_accredited_category
     *
     * @param string|null $us_accredited_category The United States accredited investor information.
     *
     * @return self
     */
    public function setUsAccreditedCategory($us_accredited_category)
    {
        if (is_null($us_accredited_category)) {
            throw new \InvalidArgumentException('non-nullable us_accredited_category cannot be null');
        }
        $allowedValues = $this->getUsAccreditedCategoryAllowableValues();
        if (!in_array($us_accredited_category, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'us_accredited_category', must be one of '%s'",
                    $us_accredited_category,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['us_accredited_category'] = $us_accredited_category;

        return $this;
    }

    /**
     * Gets ca_accredited_investor
     *
     * @return string|null
     */
    public function getCaAccreditedInvestor()
    {
        return $this->container['ca_accredited_investor'];
    }

    /**
     * Sets ca_accredited_investor
     *
     * @param string|null $ca_accredited_investor The Canadian accredited investor information.
     *
     * @return self
     */
    public function setCaAccreditedInvestor($ca_accredited_investor)
    {
        if (is_null($ca_accredited_investor)) {
            throw new \InvalidArgumentException('non-nullable ca_accredited_investor cannot be null');
        }
        $allowedValues = $this->getCaAccreditedInvestorAllowableValues();
        if (!in_array($ca_accredited_investor, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'ca_accredited_investor', must be one of '%s'",
                    $ca_accredited_investor,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['ca_accredited_investor'] = $ca_accredited_investor;

        return $this;
    }

    /**
     * Gets joint_type
     *
     * @return string|null
     */
    public function getJointType()
    {
        return $this->container['joint_type'];
    }

    /**
     * Sets joint_type
     *
     * @param string|null $joint_type The types of joint investor.
     *
     * @return self
     */
    public function setJointType($joint_type)
    {
        if (is_null($joint_type)) {
            throw new \InvalidArgumentException('non-nullable joint_type cannot be null');
        }
        $allowedValues = $this->getJointTypeAllowableValues();
        if (!in_array($joint_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'joint_type', must be one of '%s'",
                    $joint_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['joint_type'] = $joint_type;

        return $this;
    }

    /**
     * Gets first_name
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     *
     * @param string|null $first_name The first name of the primary holder (required).
     *
     * @return self
     */
    public function setFirstName($first_name)
    {
        if (is_null($first_name)) {
            throw new \InvalidArgumentException('non-nullable first_name cannot be null');
        }
        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets last_name
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     *
     * @param string|null $last_name The last name of the primary holder (required).
     *
     * @return self
     */
    public function setLastName($last_name)
    {
        if (is_null($last_name)) {
            throw new \InvalidArgumentException('non-nullable last_name cannot be null');
        }
        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets suffix
     *
     * @return string|null
     */
    public function getSuffix()
    {
        return $this->container['suffix'];
    }

    /**
     * Sets suffix
     *
     * @param string|null $suffix The suffix of the primary holder.
     *
     * @return self
     */
    public function setSuffix($suffix)
    {
        if (is_null($suffix)) {
            throw new \InvalidArgumentException('non-nullable suffix cannot be null');
        }
        $this->container['suffix'] = $suffix;

        return $this;
    }

    /**
     * Gets street_address
     *
     * @return string|null
     */
    public function getStreetAddress()
    {
        return $this->container['street_address'];
    }

    /**
     * Sets street_address
     *
     * @param string|null $street_address The street address of the primary holder (required).
     *
     * @return self
     */
    public function setStreetAddress($street_address)
    {
        if (is_null($street_address)) {
            throw new \InvalidArgumentException('non-nullable street_address cannot be null');
        }
        $this->container['street_address'] = $street_address;

        return $this;
    }

    /**
     * Gets unit2
     *
     * @return string|null
     */
    public function getUnit2()
    {
        return $this->container['unit2'];
    }

    /**
     * Sets unit2
     *
     * @param string|null $unit2 The street address line 2 of the primary holder.
     *
     * @return self
     */
    public function setUnit2($unit2)
    {
        if (is_null($unit2)) {
            throw new \InvalidArgumentException('non-nullable unit2 cannot be null');
        }
        $this->container['unit2'] = $unit2;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string|null
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string|null $city The city of the primary holder (required).
     *
     * @return self
     */
    public function setCity($city)
    {
        if (is_null($city)) {
            throw new \InvalidArgumentException('non-nullable city cannot be null');
        }
        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets region
     *
     * @return string|null
     */
    public function getRegion()
    {
        return $this->container['region'];
    }

    /**
     * Sets region
     *
     * @param string|null $region The region or State of the primary holder (required).
     *
     * @return self
     */
    public function setRegion($region)
    {
        if (is_null($region)) {
            throw new \InvalidArgumentException('non-nullable region cannot be null');
        }
        $this->container['region'] = $region;

        return $this;
    }

    /**
     * Gets postal_code
     *
     * @return string|null
     */
    public function getPostalCode()
    {
        return $this->container['postal_code'];
    }

    /**
     * Sets postal_code
     *
     * @param string|null $postal_code The postal code or zipcode of the primary holder (required).
     *
     * @return self
     */
    public function setPostalCode($postal_code)
    {
        if (is_null($postal_code)) {
            throw new \InvalidArgumentException('non-nullable postal_code cannot be null');
        }
        $this->container['postal_code'] = $postal_code;

        return $this;
    }

    /**
     * Gets date_of_birth
     *
     * @return string|null
     */
    public function getDateOfBirth()
    {
        return $this->container['date_of_birth'];
    }

    /**
     * Sets date_of_birth
     *
     * @param string|null $date_of_birth The date of birth of the primary holder (required).
     *
     * @return self
     */
    public function setDateOfBirth($date_of_birth)
    {
        if (is_null($date_of_birth)) {
            throw new \InvalidArgumentException('non-nullable date_of_birth cannot be null');
        }
        $this->container['date_of_birth'] = $date_of_birth;

        return $this;
    }

    /**
     * Gets taxpayer_id
     *
     * @return string|null
     */
    public function getTaxpayerId()
    {
        return $this->container['taxpayer_id'];
    }

    /**
     * Sets taxpayer_id
     *
     * @param string|null $taxpayer_id The taxpayer identification number of the primary holder (required).
     *
     * @return self
     */
    public function setTaxpayerId($taxpayer_id)
    {
        if (is_null($taxpayer_id)) {
            throw new \InvalidArgumentException('non-nullable taxpayer_id cannot be null');
        }
        $this->container['taxpayer_id'] = $taxpayer_id;

        return $this;
    }

    /**
     * Gets phone_number
     *
     * @return string|null
     */
    public function getPhoneNumber()
    {
        return $this->container['phone_number'];
    }

    /**
     * Sets phone_number
     *
     * @param string|null $phone_number The phone number of the primary holder (required).
     *
     * @return self
     */
    public function setPhoneNumber($phone_number)
    {
        if (is_null($phone_number)) {
            throw new \InvalidArgumentException('non-nullable phone_number cannot be null');
        }
        $this->container['phone_number'] = $phone_number;

        return $this;
    }

    /**
     * Gets income
     *
     * @return float|null
     */
    public function getIncome()
    {
        return $this->container['income'];
    }

    /**
     * Sets income
     *
     * @param float|null $income The income of the primary holder.
     *
     * @return self
     */
    public function setIncome($income)
    {
        if (is_null($income)) {
            throw new \InvalidArgumentException('non-nullable income cannot be null');
        }
        $this->container['income'] = $income;

        return $this;
    }

    /**
     * Gets net_worth
     *
     * @return float|null
     */
    public function getNetWorth()
    {
        return $this->container['net_worth'];
    }

    /**
     * Sets net_worth
     *
     * @param float|null $net_worth The net worth of the primary holder.
     *
     * @return self
     */
    public function setNetWorth($net_worth)
    {
        if (is_null($net_worth)) {
            throw new \InvalidArgumentException('non-nullable net_worth cannot be null');
        }
        $this->container['net_worth'] = $net_worth;

        return $this;
    }

    /**
     * Gets reg_cf_prior_offerings_amount
     *
     * @return float|null
     */
    public function getRegCfPriorOfferingsAmount()
    {
        return $this->container['reg_cf_prior_offerings_amount'];
    }

    /**
     * Sets reg_cf_prior_offerings_amount
     *
     * @param float|null $reg_cf_prior_offerings_amount The prior offerings amount of the primary holder.
     *
     * @return self
     */
    public function setRegCfPriorOfferingsAmount($reg_cf_prior_offerings_amount)
    {
        if (is_null($reg_cf_prior_offerings_amount)) {
            throw new \InvalidArgumentException('non-nullable reg_cf_prior_offerings_amount cannot be null');
        }
        $this->container['reg_cf_prior_offerings_amount'] = $reg_cf_prior_offerings_amount;

        return $this;
    }

    /**
     * Gets joint_holder_first_name
     *
     * @return string|null
     */
    public function getJointHolderFirstName()
    {
        return $this->container['joint_holder_first_name'];
    }

    /**
     * Sets joint_holder_first_name
     *
     * @param string|null $joint_holder_first_name The first name of the joint holder (required).
     *
     * @return self
     */
    public function setJointHolderFirstName($joint_holder_first_name)
    {
        if (is_null($joint_holder_first_name)) {
            throw new \InvalidArgumentException('non-nullable joint_holder_first_name cannot be null');
        }
        $this->container['joint_holder_first_name'] = $joint_holder_first_name;

        return $this;
    }

    /**
     * Gets joint_holder_last_name
     *
     * @return string|null
     */
    public function getJointHolderLastName()
    {
        return $this->container['joint_holder_last_name'];
    }

    /**
     * Sets joint_holder_last_name
     *
     * @param string|null $joint_holder_last_name The last name of the joint holder (required).
     *
     * @return self
     */
    public function setJointHolderLastName($joint_holder_last_name)
    {
        if (is_null($joint_holder_last_name)) {
            throw new \InvalidArgumentException('non-nullable joint_holder_last_name cannot be null');
        }
        $this->container['joint_holder_last_name'] = $joint_holder_last_name;

        return $this;
    }

    /**
     * Gets joint_holder_suffix
     *
     * @return string|null
     */
    public function getJointHolderSuffix()
    {
        return $this->container['joint_holder_suffix'];
    }

    /**
     * Sets joint_holder_suffix
     *
     * @param string|null $joint_holder_suffix The suffix of the joint holder.
     *
     * @return self
     */
    public function setJointHolderSuffix($joint_holder_suffix)
    {
        if (is_null($joint_holder_suffix)) {
            throw new \InvalidArgumentException('non-nullable joint_holder_suffix cannot be null');
        }
        $this->container['joint_holder_suffix'] = $joint_holder_suffix;

        return $this;
    }

    /**
     * Gets joint_holder_street_address
     *
     * @return string|null
     */
    public function getJointHolderStreetAddress()
    {
        return $this->container['joint_holder_street_address'];
    }

    /**
     * Sets joint_holder_street_address
     *
     * @param string|null $joint_holder_street_address The street address of the joint holder (required).
     *
     * @return self
     */
    public function setJointHolderStreetAddress($joint_holder_street_address)
    {
        if (is_null($joint_holder_street_address)) {
            throw new \InvalidArgumentException('non-nullable joint_holder_street_address cannot be null');
        }
        $this->container['joint_holder_street_address'] = $joint_holder_street_address;

        return $this;
    }

    /**
     * Gets joint_holder_unit2
     *
     * @return string|null
     */
    public function getJointHolderUnit2()
    {
        return $this->container['joint_holder_unit2'];
    }

    /**
     * Sets joint_holder_unit2
     *
     * @param string|null $joint_holder_unit2 The street address line 2 of the joint holder.
     *
     * @return self
     */
    public function setJointHolderUnit2($joint_holder_unit2)
    {
        if (is_null($joint_holder_unit2)) {
            throw new \InvalidArgumentException('non-nullable joint_holder_unit2 cannot be null');
        }
        $this->container['joint_holder_unit2'] = $joint_holder_unit2;

        return $this;
    }

    /**
     * Gets joint_holder_city
     *
     * @return string|null
     */
    public function getJointHolderCity()
    {
        return $this->container['joint_holder_city'];
    }

    /**
     * Sets joint_holder_city
     *
     * @param string|null $joint_holder_city The city of the joint holder (required).
     *
     * @return self
     */
    public function setJointHolderCity($joint_holder_city)
    {
        if (is_null($joint_holder_city)) {
            throw new \InvalidArgumentException('non-nullable joint_holder_city cannot be null');
        }
        $this->container['joint_holder_city'] = $joint_holder_city;

        return $this;
    }

    /**
     * Gets joint_holder_region
     *
     * @return string|null
     */
    public function getJointHolderRegion()
    {
        return $this->container['joint_holder_region'];
    }

    /**
     * Sets joint_holder_region
     *
     * @param string|null $joint_holder_region The region or state of the joint holder (required).
     *
     * @return self
     */
    public function setJointHolderRegion($joint_holder_region)
    {
        if (is_null($joint_holder_region)) {
            throw new \InvalidArgumentException('non-nullable joint_holder_region cannot be null');
        }
        $this->container['joint_holder_region'] = $joint_holder_region;

        return $this;
    }

    /**
     * Gets joint_holder_postal_code
     *
     * @return string|null
     */
    public function getJointHolderPostalCode()
    {
        return $this->container['joint_holder_postal_code'];
    }

    /**
     * Sets joint_holder_postal_code
     *
     * @param string|null $joint_holder_postal_code The postal code or zipcode of the joint holder (required).
     *
     * @return self
     */
    public function setJointHolderPostalCode($joint_holder_postal_code)
    {
        if (is_null($joint_holder_postal_code)) {
            throw new \InvalidArgumentException('non-nullable joint_holder_postal_code cannot be null');
        }
        $this->container['joint_holder_postal_code'] = $joint_holder_postal_code;

        return $this;
    }

    /**
     * Gets joint_holder_date_of_birth
     *
     * @return string|null
     */
    public function getJointHolderDateOfBirth()
    {
        return $this->container['joint_holder_date_of_birth'];
    }

    /**
     * Sets joint_holder_date_of_birth
     *
     * @param string|null $joint_holder_date_of_birth The date of birth of the joint holder (required).
     *
     * @return self
     */
    public function setJointHolderDateOfBirth($joint_holder_date_of_birth)
    {
        if (is_null($joint_holder_date_of_birth)) {
            throw new \InvalidArgumentException('non-nullable joint_holder_date_of_birth cannot be null');
        }
        $this->container['joint_holder_date_of_birth'] = $joint_holder_date_of_birth;

        return $this;
    }

    /**
     * Gets joint_holder_taxpayer_id
     *
     * @return string|null
     */
    public function getJointHolderTaxpayerId()
    {
        return $this->container['joint_holder_taxpayer_id'];
    }

    /**
     * Sets joint_holder_taxpayer_id
     *
     * @param string|null $joint_holder_taxpayer_id The taxpayer identification number of the joint holder (required).
     *
     * @return self
     */
    public function setJointHolderTaxpayerId($joint_holder_taxpayer_id)
    {
        if (is_null($joint_holder_taxpayer_id)) {
            throw new \InvalidArgumentException('non-nullable joint_holder_taxpayer_id cannot be null');
        }
        $this->container['joint_holder_taxpayer_id'] = $joint_holder_taxpayer_id;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


