<?php
/**
 * V1EntitiesInvestor
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
 * OpenAPI Generator version: 7.2.0-SNAPSHOT
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
 * V1EntitiesInvestor Class Doc Comment
 *
 * @category Class
 * @description V1_Entities_Investor model
 * @package  DealMaker
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class V1EntitiesInvestor implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'V1_Entities_Investor';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'user' => '\DealMaker\Model\V1EntitiesInvestorUser',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime',
        'name' => 'string',
        'allocation_unit' => 'string',
        'state' => 'string',
        'funding_state' => 'string',
        'funds_pending' => 'bool',
        'beneficial_address' => 'string',
        'phone_number' => 'string',
        'investor_currency' => 'string',
        'number_of_securities' => 'int',
        'investment_value' => 'float',
        'allocated_amount' => 'float',
        'funds_value' => 'float',
        'access_link' => 'string',
        'subscription_agreement' => '\DealMaker\Model\V1EntitiesSubscriptionAgreement',
        'attachments' => '\DealMaker\Model\V1EntitiesAttachment',
        'background_check_searches' => '\DealMaker\Model\V1EntitiesBackgroundCheckSearch',
        'verification_status' => 'string',
        'warrant_expiry_date' => '\DateTime',
        'warrant_certificate_number' => 'int',
        'ranking_score' => 'float',
        'investor_profile' => 'string',
        'investor_profile_id' => 'int',
        'checkout_state' => 'string',
        'legacy_flow_link' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => 'int32',
        'user' => null,
        'created_at' => 'date-time',
        'updated_at' => 'date-time',
        'name' => null,
        'allocation_unit' => null,
        'state' => null,
        'funding_state' => null,
        'funds_pending' => null,
        'beneficial_address' => null,
        'phone_number' => null,
        'investor_currency' => null,
        'number_of_securities' => 'int32',
        'investment_value' => 'float',
        'allocated_amount' => 'float',
        'funds_value' => 'float',
        'access_link' => null,
        'subscription_agreement' => null,
        'attachments' => null,
        'background_check_searches' => null,
        'verification_status' => null,
        'warrant_expiry_date' => 'date',
        'warrant_certificate_number' => 'int32',
        'ranking_score' => 'float',
        'investor_profile' => null,
        'investor_profile_id' => 'int32',
        'checkout_state' => null,
        'legacy_flow_link' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'user' => false,
		'created_at' => false,
		'updated_at' => false,
		'name' => false,
		'allocation_unit' => false,
		'state' => false,
		'funding_state' => false,
		'funds_pending' => false,
		'beneficial_address' => false,
		'phone_number' => false,
		'investor_currency' => false,
		'number_of_securities' => false,
		'investment_value' => false,
		'allocated_amount' => false,
		'funds_value' => false,
		'access_link' => false,
		'subscription_agreement' => false,
		'attachments' => false,
		'background_check_searches' => false,
		'verification_status' => false,
		'warrant_expiry_date' => false,
		'warrant_certificate_number' => false,
		'ranking_score' => false,
		'investor_profile' => false,
		'investor_profile_id' => false,
		'checkout_state' => false,
		'legacy_flow_link' => false
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
        'id' => 'id',
        'user' => 'user',
        'created_at' => 'created_at',
        'updated_at' => 'updated_at',
        'name' => 'name',
        'allocation_unit' => 'allocation_unit',
        'state' => 'state',
        'funding_state' => 'funding_state',
        'funds_pending' => 'funds_pending',
        'beneficial_address' => 'beneficial_address',
        'phone_number' => 'phone_number',
        'investor_currency' => 'investor_currency',
        'number_of_securities' => 'number_of_securities',
        'investment_value' => 'investment_value',
        'allocated_amount' => 'allocated_amount',
        'funds_value' => 'funds_value',
        'access_link' => 'access_link',
        'subscription_agreement' => 'subscription_agreement',
        'attachments' => 'attachments',
        'background_check_searches' => 'background_check_searches',
        'verification_status' => 'verification_status',
        'warrant_expiry_date' => 'warrant_expiry_date',
        'warrant_certificate_number' => 'warrant_certificate_number',
        'ranking_score' => 'ranking_score',
        'investor_profile' => 'investor_profile',
        'investor_profile_id' => 'investor_profile_id',
        'checkout_state' => 'checkout_state',
        'legacy_flow_link' => 'legacy_flow_link'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'user' => 'setUser',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt',
        'name' => 'setName',
        'allocation_unit' => 'setAllocationUnit',
        'state' => 'setState',
        'funding_state' => 'setFundingState',
        'funds_pending' => 'setFundsPending',
        'beneficial_address' => 'setBeneficialAddress',
        'phone_number' => 'setPhoneNumber',
        'investor_currency' => 'setInvestorCurrency',
        'number_of_securities' => 'setNumberOfSecurities',
        'investment_value' => 'setInvestmentValue',
        'allocated_amount' => 'setAllocatedAmount',
        'funds_value' => 'setFundsValue',
        'access_link' => 'setAccessLink',
        'subscription_agreement' => 'setSubscriptionAgreement',
        'attachments' => 'setAttachments',
        'background_check_searches' => 'setBackgroundCheckSearches',
        'verification_status' => 'setVerificationStatus',
        'warrant_expiry_date' => 'setWarrantExpiryDate',
        'warrant_certificate_number' => 'setWarrantCertificateNumber',
        'ranking_score' => 'setRankingScore',
        'investor_profile' => 'setInvestorProfile',
        'investor_profile_id' => 'setInvestorProfileId',
        'checkout_state' => 'setCheckoutState',
        'legacy_flow_link' => 'setLegacyFlowLink'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'user' => 'getUser',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt',
        'name' => 'getName',
        'allocation_unit' => 'getAllocationUnit',
        'state' => 'getState',
        'funding_state' => 'getFundingState',
        'funds_pending' => 'getFundsPending',
        'beneficial_address' => 'getBeneficialAddress',
        'phone_number' => 'getPhoneNumber',
        'investor_currency' => 'getInvestorCurrency',
        'number_of_securities' => 'getNumberOfSecurities',
        'investment_value' => 'getInvestmentValue',
        'allocated_amount' => 'getAllocatedAmount',
        'funds_value' => 'getFundsValue',
        'access_link' => 'getAccessLink',
        'subscription_agreement' => 'getSubscriptionAgreement',
        'attachments' => 'getAttachments',
        'background_check_searches' => 'getBackgroundCheckSearches',
        'verification_status' => 'getVerificationStatus',
        'warrant_expiry_date' => 'getWarrantExpiryDate',
        'warrant_certificate_number' => 'getWarrantCertificateNumber',
        'ranking_score' => 'getRankingScore',
        'investor_profile' => 'getInvestorProfile',
        'investor_profile_id' => 'getInvestorProfileId',
        'checkout_state' => 'getCheckoutState',
        'legacy_flow_link' => 'getLegacyFlowLink'
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

    public const ALLOCATION_UNIT_SECURITIES = 'securities';
    public const ALLOCATION_UNIT_AMOUNT = 'amount';
    public const STATE_DRAFT = 'draft';
    public const STATE_INVITED = 'invited';
    public const STATE_COSIGNING = 'cosigning';
    public const STATE_SIGNED = 'signed';
    public const STATE_WAITING = 'waiting';
    public const STATE_ACCEPTED = 'accepted';
    public const STATE_INACTIVE = 'inactive';
    public const STATE_PROCESSING_COUNTERSIGN = 'processing_countersign';
    public const FUNDING_STATE_UNFUNDED = 'unfunded';
    public const FUNDING_STATE_UNDERFUNDED = 'underfunded';
    public const FUNDING_STATE_FUNDED = 'funded';
    public const FUNDING_STATE_OVERFUNDED = 'overfunded';
    public const VERIFICATION_STATUS_PENDING = 'pending';
    public const VERIFICATION_STATUS_APPROVED = 'approved';
    public const VERIFICATION_STATUS_REJECTED = 'rejected';
    public const VERIFICATION_STATUS_NEW_DOCUMENTS_REQUESTED = 'new_documents_requested';
    public const CHECKOUT_STATE_PRE_CHECKOUT = 'pre_checkout';
    public const CHECKOUT_STATE_INVESTMENT_AMOUNT = 'investment_amount';
    public const CHECKOUT_STATE_CONTACT_INFORMATION = 'contact_information';
    public const CHECKOUT_STATE_INVESTOR_CONFIRMATION = 'investor_confirmation';
    public const CHECKOUT_STATE_TERMS_CONDITIONS = 'terms_conditions';
    public const CHECKOUT_STATE_PAYMENT = 'payment';
    public const CHECKOUT_STATE_CHECKOUT_COMPLETE = 'checkout_complete';
    public const CHECKOUT_STATE_RESUBMIT_AGREEMENT = 'resubmit_agreement';
    public const CHECKOUT_STATE_LEGACY_CHECKOUT = 'legacy_checkout';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAllocationUnitAllowableValues()
    {
        return [
            self::ALLOCATION_UNIT_SECURITIES,
            self::ALLOCATION_UNIT_AMOUNT,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStateAllowableValues()
    {
        return [
            self::STATE_DRAFT,
            self::STATE_INVITED,
            self::STATE_COSIGNING,
            self::STATE_SIGNED,
            self::STATE_WAITING,
            self::STATE_ACCEPTED,
            self::STATE_INACTIVE,
            self::STATE_PROCESSING_COUNTERSIGN,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFundingStateAllowableValues()
    {
        return [
            self::FUNDING_STATE_UNFUNDED,
            self::FUNDING_STATE_UNDERFUNDED,
            self::FUNDING_STATE_FUNDED,
            self::FUNDING_STATE_OVERFUNDED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getVerificationStatusAllowableValues()
    {
        return [
            self::VERIFICATION_STATUS_PENDING,
            self::VERIFICATION_STATUS_APPROVED,
            self::VERIFICATION_STATUS_REJECTED,
            self::VERIFICATION_STATUS_NEW_DOCUMENTS_REQUESTED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCheckoutStateAllowableValues()
    {
        return [
            self::CHECKOUT_STATE_PRE_CHECKOUT,
            self::CHECKOUT_STATE_INVESTMENT_AMOUNT,
            self::CHECKOUT_STATE_CONTACT_INFORMATION,
            self::CHECKOUT_STATE_INVESTOR_CONFIRMATION,
            self::CHECKOUT_STATE_TERMS_CONDITIONS,
            self::CHECKOUT_STATE_PAYMENT,
            self::CHECKOUT_STATE_CHECKOUT_COMPLETE,
            self::CHECKOUT_STATE_RESUBMIT_AGREEMENT,
            self::CHECKOUT_STATE_LEGACY_CHECKOUT,
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
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('user', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('allocation_unit', $data ?? [], null);
        $this->setIfExists('state', $data ?? [], null);
        $this->setIfExists('funding_state', $data ?? [], null);
        $this->setIfExists('funds_pending', $data ?? [], null);
        $this->setIfExists('beneficial_address', $data ?? [], null);
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('investor_currency', $data ?? [], null);
        $this->setIfExists('number_of_securities', $data ?? [], null);
        $this->setIfExists('investment_value', $data ?? [], null);
        $this->setIfExists('allocated_amount', $data ?? [], null);
        $this->setIfExists('funds_value', $data ?? [], null);
        $this->setIfExists('access_link', $data ?? [], null);
        $this->setIfExists('subscription_agreement', $data ?? [], null);
        $this->setIfExists('attachments', $data ?? [], null);
        $this->setIfExists('background_check_searches', $data ?? [], null);
        $this->setIfExists('verification_status', $data ?? [], null);
        $this->setIfExists('warrant_expiry_date', $data ?? [], null);
        $this->setIfExists('warrant_certificate_number', $data ?? [], null);
        $this->setIfExists('ranking_score', $data ?? [], null);
        $this->setIfExists('investor_profile', $data ?? [], null);
        $this->setIfExists('investor_profile_id', $data ?? [], null);
        $this->setIfExists('checkout_state', $data ?? [], null);
        $this->setIfExists('legacy_flow_link', $data ?? [], null);
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

        $allowedValues = $this->getAllocationUnitAllowableValues();
        if (!is_null($this->container['allocation_unit']) && !in_array($this->container['allocation_unit'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'allocation_unit', must be one of '%s'",
                $this->container['allocation_unit'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getStateAllowableValues();
        if (!is_null($this->container['state']) && !in_array($this->container['state'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'state', must be one of '%s'",
                $this->container['state'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getFundingStateAllowableValues();
        if (!is_null($this->container['funding_state']) && !in_array($this->container['funding_state'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'funding_state', must be one of '%s'",
                $this->container['funding_state'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getVerificationStatusAllowableValues();
        if (!is_null($this->container['verification_status']) && !in_array($this->container['verification_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'verification_status', must be one of '%s'",
                $this->container['verification_status'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getCheckoutStateAllowableValues();
        if (!is_null($this->container['checkout_state']) && !in_array($this->container['checkout_state'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'checkout_state', must be one of '%s'",
                $this->container['checkout_state'],
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
     * Gets id
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int|null $id Investor id.
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets user
     *
     * @return \DealMaker\Model\V1EntitiesInvestorUser|null
     */
    public function getUser()
    {
        return $this->container['user'];
    }

    /**
     * Sets user
     *
     * @param \DealMaker\Model\V1EntitiesInvestorUser|null $user user
     *
     * @return self
     */
    public function setUser($user)
    {
        if (is_null($user)) {
            throw new \InvalidArgumentException('non-nullable user cannot be null');
        }
        $this->container['user'] = $user;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return \DateTime|null
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime|null $created_at The creation time.
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        if (is_null($created_at)) {
            throw new \InvalidArgumentException('non-nullable created_at cannot be null');
        }
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param \DateTime|null $updated_at The last update time.
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        if (is_null($updated_at)) {
            throw new \InvalidArgumentException('non-nullable updated_at cannot be null');
        }
        $this->container['updated_at'] = $updated_at;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name The full name of the investor.
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets allocation_unit
     *
     * @return string|null
     */
    public function getAllocationUnit()
    {
        return $this->container['allocation_unit'];
    }

    /**
     * Sets allocation_unit
     *
     * @param string|null $allocation_unit The allocation unit.
     *
     * @return self
     */
    public function setAllocationUnit($allocation_unit)
    {
        if (is_null($allocation_unit)) {
            throw new \InvalidArgumentException('non-nullable allocation_unit cannot be null');
        }
        $allowedValues = $this->getAllocationUnitAllowableValues();
        if (!in_array($allocation_unit, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'allocation_unit', must be one of '%s'",
                    $allocation_unit,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['allocation_unit'] = $allocation_unit;

        return $this;
    }

    /**
     * Gets state
     *
     * @return string|null
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     *
     * @param string|null $state The state.
     *
     * @return self
     */
    public function setState($state)
    {
        if (is_null($state)) {
            throw new \InvalidArgumentException('non-nullable state cannot be null');
        }
        $allowedValues = $this->getStateAllowableValues();
        if (!in_array($state, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'state', must be one of '%s'",
                    $state,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets funding_state
     *
     * @return string|null
     */
    public function getFundingState()
    {
        return $this->container['funding_state'];
    }

    /**
     * Sets funding_state
     *
     * @param string|null $funding_state The funding state.
     *
     * @return self
     */
    public function setFundingState($funding_state)
    {
        if (is_null($funding_state)) {
            throw new \InvalidArgumentException('non-nullable funding_state cannot be null');
        }
        $allowedValues = $this->getFundingStateAllowableValues();
        if (!in_array($funding_state, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'funding_state', must be one of '%s'",
                    $funding_state,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['funding_state'] = $funding_state;

        return $this;
    }

    /**
     * Gets funds_pending
     *
     * @return bool|null
     */
    public function getFundsPending()
    {
        return $this->container['funds_pending'];
    }

    /**
     * Sets funds_pending
     *
     * @param bool|null $funds_pending True if any funds are pending; false otherwise.
     *
     * @return self
     */
    public function setFundsPending($funds_pending)
    {
        if (is_null($funds_pending)) {
            throw new \InvalidArgumentException('non-nullable funds_pending cannot be null');
        }
        $this->container['funds_pending'] = $funds_pending;

        return $this;
    }

    /**
     * Gets beneficial_address
     *
     * @return string|null
     */
    public function getBeneficialAddress()
    {
        return $this->container['beneficial_address'];
    }

    /**
     * Sets beneficial_address
     *
     * @param string|null $beneficial_address The address.
     *
     * @return self
     */
    public function setBeneficialAddress($beneficial_address)
    {
        if (is_null($beneficial_address)) {
            throw new \InvalidArgumentException('non-nullable beneficial_address cannot be null');
        }
        $this->container['beneficial_address'] = $beneficial_address;

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
     * @param string|null $phone_number The beneficial phone number associated with the investor. If there is no phone number, this returns the phone number associated with the user profile.
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
     * Gets investor_currency
     *
     * @return string|null
     */
    public function getInvestorCurrency()
    {
        return $this->container['investor_currency'];
    }

    /**
     * Sets investor_currency
     *
     * @param string|null $investor_currency The investor currency.
     *
     * @return self
     */
    public function setInvestorCurrency($investor_currency)
    {
        if (is_null($investor_currency)) {
            throw new \InvalidArgumentException('non-nullable investor_currency cannot be null');
        }
        $this->container['investor_currency'] = $investor_currency;

        return $this;
    }

    /**
     * Gets number_of_securities
     *
     * @return int|null
     */
    public function getNumberOfSecurities()
    {
        return $this->container['number_of_securities'];
    }

    /**
     * Sets number_of_securities
     *
     * @param int|null $number_of_securities The number of securities.
     *
     * @return self
     */
    public function setNumberOfSecurities($number_of_securities)
    {
        if (is_null($number_of_securities)) {
            throw new \InvalidArgumentException('non-nullable number_of_securities cannot be null');
        }
        $this->container['number_of_securities'] = $number_of_securities;

        return $this;
    }

    /**
     * Gets investment_value
     *
     * @return float|null
     */
    public function getInvestmentValue()
    {
        return $this->container['investment_value'];
    }

    /**
     * Sets investment_value
     *
     * @param float|null $investment_value The current investment value.
     *
     * @return self
     */
    public function setInvestmentValue($investment_value)
    {
        if (is_null($investment_value)) {
            throw new \InvalidArgumentException('non-nullable investment_value cannot be null');
        }
        $this->container['investment_value'] = $investment_value;

        return $this;
    }

    /**
     * Gets allocated_amount
     *
     * @return float|null
     */
    public function getAllocatedAmount()
    {
        return $this->container['allocated_amount'];
    }

    /**
     * Sets allocated_amount
     *
     * @param float|null $allocated_amount The amount allocated.
     *
     * @return self
     */
    public function setAllocatedAmount($allocated_amount)
    {
        if (is_null($allocated_amount)) {
            throw new \InvalidArgumentException('non-nullable allocated_amount cannot be null');
        }
        $this->container['allocated_amount'] = $allocated_amount;

        return $this;
    }

    /**
     * Gets funds_value
     *
     * @return float|null
     */
    public function getFundsValue()
    {
        return $this->container['funds_value'];
    }

    /**
     * Sets funds_value
     *
     * @param float|null $funds_value The current amount that has been funded.
     *
     * @return self
     */
    public function setFundsValue($funds_value)
    {
        if (is_null($funds_value)) {
            throw new \InvalidArgumentException('non-nullable funds_value cannot be null');
        }
        $this->container['funds_value'] = $funds_value;

        return $this;
    }

    /**
     * Gets access_link
     *
     * @return string|null
     */
    public function getAccessLink()
    {
        return $this->container['access_link'];
    }

    /**
     * Sets access_link
     *
     * @param string|null $access_link The access link for the investor. This is the access link for the specific investment, not the user. If the same user has multiple investments, each one will have a different access link. Please note that this access link expires every hour. In order to redirect the investor into their authentication screen, use the https://app.dealmaker.tech/deals/{{deal_id}}/investors/{{investor_id}}/otp_access url.
     *
     * @return self
     */
    public function setAccessLink($access_link)
    {
        if (is_null($access_link)) {
            throw new \InvalidArgumentException('non-nullable access_link cannot be null');
        }
        $this->container['access_link'] = $access_link;

        return $this;
    }

    /**
     * Gets subscription_agreement
     *
     * @return \DealMaker\Model\V1EntitiesSubscriptionAgreement|null
     */
    public function getSubscriptionAgreement()
    {
        return $this->container['subscription_agreement'];
    }

    /**
     * Sets subscription_agreement
     *
     * @param \DealMaker\Model\V1EntitiesSubscriptionAgreement|null $subscription_agreement subscription_agreement
     *
     * @return self
     */
    public function setSubscriptionAgreement($subscription_agreement)
    {
        if (is_null($subscription_agreement)) {
            throw new \InvalidArgumentException('non-nullable subscription_agreement cannot be null');
        }
        $this->container['subscription_agreement'] = $subscription_agreement;

        return $this;
    }

    /**
     * Gets attachments
     *
     * @return \DealMaker\Model\V1EntitiesAttachment|null
     */
    public function getAttachments()
    {
        return $this->container['attachments'];
    }

    /**
     * Sets attachments
     *
     * @param \DealMaker\Model\V1EntitiesAttachment|null $attachments attachments
     *
     * @return self
     */
    public function setAttachments($attachments)
    {
        if (is_null($attachments)) {
            throw new \InvalidArgumentException('non-nullable attachments cannot be null');
        }
        $this->container['attachments'] = $attachments;

        return $this;
    }

    /**
     * Gets background_check_searches
     *
     * @return \DealMaker\Model\V1EntitiesBackgroundCheckSearch|null
     */
    public function getBackgroundCheckSearches()
    {
        return $this->container['background_check_searches'];
    }

    /**
     * Sets background_check_searches
     *
     * @param \DealMaker\Model\V1EntitiesBackgroundCheckSearch|null $background_check_searches background_check_searches
     *
     * @return self
     */
    public function setBackgroundCheckSearches($background_check_searches)
    {
        if (is_null($background_check_searches)) {
            throw new \InvalidArgumentException('non-nullable background_check_searches cannot be null');
        }
        $this->container['background_check_searches'] = $background_check_searches;

        return $this;
    }

    /**
     * Gets verification_status
     *
     * @return string|null
     */
    public function getVerificationStatus()
    {
        return $this->container['verification_status'];
    }

    /**
     * Sets verification_status
     *
     * @param string|null $verification_status The current 506c verification state.
     *
     * @return self
     */
    public function setVerificationStatus($verification_status)
    {
        if (is_null($verification_status)) {
            throw new \InvalidArgumentException('non-nullable verification_status cannot be null');
        }
        $allowedValues = $this->getVerificationStatusAllowableValues();
        if (!in_array($verification_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'verification_status', must be one of '%s'",
                    $verification_status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['verification_status'] = $verification_status;

        return $this;
    }

    /**
     * Gets warrant_expiry_date
     *
     * @return \DateTime|null
     */
    public function getWarrantExpiryDate()
    {
        return $this->container['warrant_expiry_date'];
    }

    /**
     * Sets warrant_expiry_date
     *
     * @param \DateTime|null $warrant_expiry_date The warrant expiry date.
     *
     * @return self
     */
    public function setWarrantExpiryDate($warrant_expiry_date)
    {
        if (is_null($warrant_expiry_date)) {
            throw new \InvalidArgumentException('non-nullable warrant_expiry_date cannot be null');
        }
        $this->container['warrant_expiry_date'] = $warrant_expiry_date;

        return $this;
    }

    /**
     * Gets warrant_certificate_number
     *
     * @return int|null
     */
    public function getWarrantCertificateNumber()
    {
        return $this->container['warrant_certificate_number'];
    }

    /**
     * Sets warrant_certificate_number
     *
     * @param int|null $warrant_certificate_number The warrant certificate number.
     *
     * @return self
     */
    public function setWarrantCertificateNumber($warrant_certificate_number)
    {
        if (is_null($warrant_certificate_number)) {
            throw new \InvalidArgumentException('non-nullable warrant_certificate_number cannot be null');
        }
        $this->container['warrant_certificate_number'] = $warrant_certificate_number;

        return $this;
    }

    /**
     * Gets ranking_score
     *
     * @return float|null
     */
    public function getRankingScore()
    {
        return $this->container['ranking_score'];
    }

    /**
     * Sets ranking_score
     *
     * @param float|null $ranking_score A value `[0, 1]` that represents the propensity for the investor to complete payment for the investment. A larger value indicates a higher likelihood of payment, as predicted by DealMaker’s machine learning algorithm. This field will only populate if DealMaker Compass is enabled for a deal and the investor `funds_state` value is not `funded` or `overfunded`
     *
     * @return self
     */
    public function setRankingScore($ranking_score)
    {
        if (is_null($ranking_score)) {
            throw new \InvalidArgumentException('non-nullable ranking_score cannot be null');
        }
        $this->container['ranking_score'] = $ranking_score;

        return $this;
    }

    /**
     * Gets investor_profile
     *
     * @return string|null
     */
    public function getInvestorProfile()
    {
        return $this->container['investor_profile'];
    }

    /**
     * Sets investor_profile
     *
     * @param string|null $investor_profile investor_profile
     *
     * @return self
     */
    public function setInvestorProfile($investor_profile)
    {
        if (is_null($investor_profile)) {
            throw new \InvalidArgumentException('non-nullable investor_profile cannot be null');
        }
        $this->container['investor_profile'] = $investor_profile;

        return $this;
    }

    /**
     * Gets investor_profile_id
     *
     * @return int|null
     */
    public function getInvestorProfileId()
    {
        return $this->container['investor_profile_id'];
    }

    /**
     * Sets investor_profile_id
     *
     * @param int|null $investor_profile_id The investor profile id.
     *
     * @return self
     */
    public function setInvestorProfileId($investor_profile_id)
    {
        if (is_null($investor_profile_id)) {
            throw new \InvalidArgumentException('non-nullable investor_profile_id cannot be null');
        }
        $this->container['investor_profile_id'] = $investor_profile_id;

        return $this;
    }

    /**
     * Gets checkout_state
     *
     * @return string|null
     */
    public function getCheckoutState()
    {
        return $this->container['checkout_state'];
    }

    /**
     * Sets checkout_state
     *
     * @param string|null $checkout_state Current state on the checkout page.
     *
     * @return self
     */
    public function setCheckoutState($checkout_state)
    {
        if (is_null($checkout_state)) {
            throw new \InvalidArgumentException('non-nullable checkout_state cannot be null');
        }
        $allowedValues = $this->getCheckoutStateAllowableValues();
        if (!in_array($checkout_state, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'checkout_state', must be one of '%s'",
                    $checkout_state,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['checkout_state'] = $checkout_state;

        return $this;
    }

    /**
     * Gets legacy_flow_link
     *
     * @return string|null
     */
    public function getLegacyFlowLink()
    {
        return $this->container['legacy_flow_link'];
    }

    /**
     * Sets legacy_flow_link
     *
     * @param string|null $legacy_flow_link The legacy link for the investor. If the investor is already on the legacy flow, this link will be null.
     *
     * @return self
     */
    public function setLegacyFlowLink($legacy_flow_link)
    {
        if (is_null($legacy_flow_link)) {
            throw new \InvalidArgumentException('non-nullable legacy_flow_link cannot be null');
        }
        $this->container['legacy_flow_link'] = $legacy_flow_link;

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


