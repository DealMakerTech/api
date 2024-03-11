<?php
/**
 * CreateDealSetupRequest
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
 * Generator version: 7.5.0-SNAPSHOT
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
 * CreateDealSetupRequest Class Doc Comment
 *
 * @category Class
 * @package  DealMaker
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateDealSetupRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'createDealSetup_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'invoicing_email' => 'string',
        'issuer_industry' => 'string',
        'prohibited_industry' => 'string',
        'offering_type' => 'string',
        'title' => 'string',
        'company_id' => 'int',
        'representative' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'invoicing_email' => null,
        'issuer_industry' => null,
        'prohibited_industry' => null,
        'offering_type' => null,
        'title' => null,
        'company_id' => 'int32',
        'representative' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'invoicing_email' => false,
        'issuer_industry' => false,
        'prohibited_industry' => false,
        'offering_type' => false,
        'title' => false,
        'company_id' => false,
        'representative' => false
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
        'invoicing_email' => 'invoicing_email',
        'issuer_industry' => 'issuer_industry',
        'prohibited_industry' => 'prohibited_industry',
        'offering_type' => 'offering_type',
        'title' => 'title',
        'company_id' => 'company_id',
        'representative' => 'representative'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'invoicing_email' => 'setInvoicingEmail',
        'issuer_industry' => 'setIssuerIndustry',
        'prohibited_industry' => 'setProhibitedIndustry',
        'offering_type' => 'setOfferingType',
        'title' => 'setTitle',
        'company_id' => 'setCompanyId',
        'representative' => 'setRepresentative'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'invoicing_email' => 'getInvoicingEmail',
        'issuer_industry' => 'getIssuerIndustry',
        'prohibited_industry' => 'getProhibitedIndustry',
        'offering_type' => 'getOfferingType',
        'title' => 'getTitle',
        'company_id' => 'getCompanyId',
        'representative' => 'getRepresentative'
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

    public const ISSUER_INDUSTRY_OTHER = 'other';
    public const ISSUER_INDUSTRY_BEVERAGE = 'beverage';
    public const ISSUER_INDUSTRY_BLOCKCHAIN = 'blockchain';
    public const ISSUER_INDUSTRY_CANNABIS = 'cannabis';
    public const ISSUER_INDUSTRY_CPC = 'cpc';
    public const ISSUER_INDUSTRY_GAMING = 'gaming';
    public const ISSUER_INDUSTRY_HEALTH = 'health';
    public const ISSUER_INDUSTRY_INDUSTRY = 'industry';
    public const ISSUER_INDUSTRY_MINING = 'mining';
    public const ISSUER_INDUSTRY_REAL_ESTATE = 'real_estate';
    public const ISSUER_INDUSTRY_RETAIL = 'retail';
    public const ISSUER_INDUSTRY_TECH = 'tech';
    public const ISSUER_INDUSTRY_PSYCHEDELICS = 'psychedelics';
    public const ISSUER_INDUSTRY_OFFICE_OF_LIFE_SCIENCES = 'office_of_life_sciences';
    public const ISSUER_INDUSTRY_OFFICE_OF_ENERGY_AND_TRANSPORTATION = 'office_of_energy_and_transportation';
    public const ISSUER_INDUSTRY_OFFICE_OF_REAL_ESTATE_AND_CONSTRUCTION = 'office_of_real_estate_and_construction';
    public const ISSUER_INDUSTRY_OFFICE_OF_MANUFACTURING = 'office_of_manufacturing';
    public const ISSUER_INDUSTRY_OFFICE_OF_TECHNOLOGY = 'office_of_technology';
    public const ISSUER_INDUSTRY_OFFICE_OF_TRADE_AND_SERVICES = 'office_of_trade_and_services';
    public const ISSUER_INDUSTRY_OFFICE_OF_FINANCE = 'office_of_finance';
    public const ISSUER_INDUSTRY_OFFICE_OF_INTERNATIONAL_CORP_FIN = 'office_of_international_corp_fin';
    public const PROHIBITED_INDUSTRY_PROHIBITED = 'prohibited';
    public const PROHIBITED_INDUSTRY_NOT_PROHIBITED = 'not_prohibited';
    public const OFFERING_TYPE_OTHER = 'other';
    public const OFFERING_TYPE_CANADIAN_PRIVATE_PLACEMENT = 'canadian_private_placement';
    public const OFFERING_TYPE_REGULATION_A_PLUS_OFFERING = 'regulation_a_plus_offering';
    public const OFFERING_TYPE_OFFERING_MEMORANDUM = 'offering_memorandum';
    public const OFFERING_TYPE_REGULATION_CF_OFFERING = 'regulation_cf_offering';
    public const OFFERING_TYPE_REG_D_506_C = 'reg_d_506_c';
    public const OFFERING_TYPE_REG_D_506_B = 'reg_d_506_b';
    public const OFFERING_TYPE_REG_S = 'reg_s';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getIssuerIndustryAllowableValues()
    {
        return [
            self::ISSUER_INDUSTRY_OTHER,
            self::ISSUER_INDUSTRY_BEVERAGE,
            self::ISSUER_INDUSTRY_BLOCKCHAIN,
            self::ISSUER_INDUSTRY_CANNABIS,
            self::ISSUER_INDUSTRY_CPC,
            self::ISSUER_INDUSTRY_GAMING,
            self::ISSUER_INDUSTRY_HEALTH,
            self::ISSUER_INDUSTRY_INDUSTRY,
            self::ISSUER_INDUSTRY_MINING,
            self::ISSUER_INDUSTRY_REAL_ESTATE,
            self::ISSUER_INDUSTRY_RETAIL,
            self::ISSUER_INDUSTRY_TECH,
            self::ISSUER_INDUSTRY_PSYCHEDELICS,
            self::ISSUER_INDUSTRY_OFFICE_OF_LIFE_SCIENCES,
            self::ISSUER_INDUSTRY_OFFICE_OF_ENERGY_AND_TRANSPORTATION,
            self::ISSUER_INDUSTRY_OFFICE_OF_REAL_ESTATE_AND_CONSTRUCTION,
            self::ISSUER_INDUSTRY_OFFICE_OF_MANUFACTURING,
            self::ISSUER_INDUSTRY_OFFICE_OF_TECHNOLOGY,
            self::ISSUER_INDUSTRY_OFFICE_OF_TRADE_AND_SERVICES,
            self::ISSUER_INDUSTRY_OFFICE_OF_FINANCE,
            self::ISSUER_INDUSTRY_OFFICE_OF_INTERNATIONAL_CORP_FIN,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getProhibitedIndustryAllowableValues()
    {
        return [
            self::PROHIBITED_INDUSTRY_PROHIBITED,
            self::PROHIBITED_INDUSTRY_NOT_PROHIBITED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getOfferingTypeAllowableValues()
    {
        return [
            self::OFFERING_TYPE_OTHER,
            self::OFFERING_TYPE_CANADIAN_PRIVATE_PLACEMENT,
            self::OFFERING_TYPE_REGULATION_A_PLUS_OFFERING,
            self::OFFERING_TYPE_OFFERING_MEMORANDUM,
            self::OFFERING_TYPE_REGULATION_CF_OFFERING,
            self::OFFERING_TYPE_REG_D_506_C,
            self::OFFERING_TYPE_REG_D_506_B,
            self::OFFERING_TYPE_REG_S,
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
        $this->setIfExists('invoicing_email', $data ?? [], null);
        $this->setIfExists('issuer_industry', $data ?? [], 'other');
        $this->setIfExists('prohibited_industry', $data ?? [], 'prohibited');
        $this->setIfExists('offering_type', $data ?? [], 'other');
        $this->setIfExists('title', $data ?? [], null);
        $this->setIfExists('company_id', $data ?? [], null);
        $this->setIfExists('representative', $data ?? [], null);
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

        if ($this->container['invoicing_email'] === null) {
            $invalidProperties[] = "'invoicing_email' can't be null";
        }
        $allowedValues = $this->getIssuerIndustryAllowableValues();
        if (!is_null($this->container['issuer_industry']) && !in_array($this->container['issuer_industry'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'issuer_industry', must be one of '%s'",
                $this->container['issuer_industry'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getProhibitedIndustryAllowableValues();
        if (!is_null($this->container['prohibited_industry']) && !in_array($this->container['prohibited_industry'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'prohibited_industry', must be one of '%s'",
                $this->container['prohibited_industry'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['offering_type'] === null) {
            $invalidProperties[] = "'offering_type' can't be null";
        }
        $allowedValues = $this->getOfferingTypeAllowableValues();
        if (!is_null($this->container['offering_type']) && !in_array($this->container['offering_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'offering_type', must be one of '%s'",
                $this->container['offering_type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['title'] === null) {
            $invalidProperties[] = "'title' can't be null";
        }
        if ($this->container['company_id'] === null) {
            $invalidProperties[] = "'company_id' can't be null";
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
     * Gets invoicing_email
     *
     * @return string
     */
    public function getInvoicingEmail()
    {
        return $this->container['invoicing_email'];
    }

    /**
     * Sets invoicing_email
     *
     * @param string $invoicing_email The invoice email address.
     *
     * @return self
     */
    public function setInvoicingEmail($invoicing_email)
    {
        if (is_null($invoicing_email)) {
            throw new \InvalidArgumentException('non-nullable invoicing_email cannot be null');
        }
        $this->container['invoicing_email'] = $invoicing_email;

        return $this;
    }

    /**
     * Gets issuer_industry
     *
     * @return string|null
     */
    public function getIssuerIndustry()
    {
        return $this->container['issuer_industry'];
    }

    /**
     * Sets issuer_industry
     *
     * @param string|null $issuer_industry The industry.
     *
     * @return self
     */
    public function setIssuerIndustry($issuer_industry)
    {
        if (is_null($issuer_industry)) {
            throw new \InvalidArgumentException('non-nullable issuer_industry cannot be null');
        }
        $allowedValues = $this->getIssuerIndustryAllowableValues();
        if (!in_array($issuer_industry, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'issuer_industry', must be one of '%s'",
                    $issuer_industry,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['issuer_industry'] = $issuer_industry;

        return $this;
    }

    /**
     * Gets prohibited_industry
     *
     * @return string|null
     */
    public function getProhibitedIndustry()
    {
        return $this->container['prohibited_industry'];
    }

    /**
     * Sets prohibited_industry
     *
     * @param string|null $prohibited_industry Determine if the deal is a high risk or not.
     *
     * @return self
     */
    public function setProhibitedIndustry($prohibited_industry)
    {
        if (is_null($prohibited_industry)) {
            throw new \InvalidArgumentException('non-nullable prohibited_industry cannot be null');
        }
        $allowedValues = $this->getProhibitedIndustryAllowableValues();
        if (!in_array($prohibited_industry, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'prohibited_industry', must be one of '%s'",
                    $prohibited_industry,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['prohibited_industry'] = $prohibited_industry;

        return $this;
    }

    /**
     * Gets offering_type
     *
     * @return string
     */
    public function getOfferingType()
    {
        return $this->container['offering_type'];
    }

    /**
     * Sets offering_type
     *
     * @param string $offering_type The deal kind
     *
     * @return self
     */
    public function setOfferingType($offering_type)
    {
        if (is_null($offering_type)) {
            throw new \InvalidArgumentException('non-nullable offering_type cannot be null');
        }
        $allowedValues = $this->getOfferingTypeAllowableValues();
        if (!in_array($offering_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'offering_type', must be one of '%s'",
                    $offering_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['offering_type'] = $offering_type;

        return $this;
    }

    /**
     * Gets title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string $title The name of deal to setup.
     *
     * @return self
     */
    public function setTitle($title)
    {
        if (is_null($title)) {
            throw new \InvalidArgumentException('non-nullable title cannot be null');
        }
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets company_id
     *
     * @return int
     */
    public function getCompanyId()
    {
        return $this->container['company_id'];
    }

    /**
     * Sets company_id
     *
     * @param int $company_id the company id.
     *
     * @return self
     */
    public function setCompanyId($company_id)
    {
        if (is_null($company_id)) {
            throw new \InvalidArgumentException('non-nullable company_id cannot be null');
        }
        $this->container['company_id'] = $company_id;

        return $this;
    }

    /**
     * Gets representative
     *
     * @return string|null
     */
    public function getRepresentative()
    {
        return $this->container['representative'];
    }

    /**
     * Sets representative
     *
     * @param string|null $representative The email of the representative.
     *
     * @return self
     */
    public function setRepresentative($representative)
    {
        if (is_null($representative)) {
            throw new \InvalidArgumentException('non-nullable representative cannot be null');
        }
        $this->container['representative'] = $representative;

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


