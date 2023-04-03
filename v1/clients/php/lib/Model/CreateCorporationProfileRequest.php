<?php
/**
 * CreateCorporationProfileRequest
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
 * # Introduction  Welcome to DealMaker’s Web API v1! This API is RESTful, easy to integrate with, and offers support in 2 different languages. This is the technical documentation for our API. There are tutorials and examples of integrations with our API available on our [knowledge centre](https://help.dealmaker.tech/training-centre) as well.  # Libraries  - Javascript - Ruby  # Authentication  To authenticate, add an Authorization header to your API request that contains an access token. Before you [generate an access token](#how-to-generate-an-access-token) your must first [create an application](#create-an-application) on your portal and retrieve the your client ID and secret  ## Create an Application  DealMaker’s Web API v1 supports the use of OAuth applications. Applications can be generated in your [account](https://app.dealmaker.tech/developer/applications).  To create an API Application, click on your user name in the top right corner to open a dropdown menu, and select \"Integrations\". Under the API settings tab, click the `Create New Application` button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-1.png)  Name your application and assign the level of permissions for this application  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-2.png)  Once your application is created, save in a secure space your client ID and secret.  **WARNING**: The secret key will not be visible after you click the close button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-3.png)  From the developer tab, you will be able to view and manage all the available applications  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-4.png)  Each Application consists of a client id, secret and set of scopes. The scopes define what resources you want to have access to. The client ID and secret are used to generate an access token. You will need to create an application to use API endpoints.  ## How to generate an access token  After creating an application, you must make a call to obtain a bearer token using the Generate an OAuth token operation. This operation requires the following parameters:  `token endpoint` - https://app.dealmaker.tech/oauth/token  `grant_type` - must be set to `client_credentials`  `client_id` - the Client ID displayed when you created the OAuth application in the previous step  `client_secret` - the Client Secret displayed when you created the OAuth application in the previous step  `scope` - the scope is established when you created the OAuth application in the previous step  Note: The Generate an OAuth token response specifies how long the bearer token is valid for. You should reuse the bearer token until it is expired. When the token is expired, call Generate an OAuth token again to generate a new one.  To use the access token, you must set a plain text header named `Authorization` with the contents of the header being “Bearer XXX” where XXX is your generated access token.  ### Example  #### Postman  Here's an example on how to generate the access token with Postman, where `{{CLIENT_ID}}` and `{{CLIENT_SECRET}}` are the values generated after following the steps on [Create an Application](#create-an-application)  ![Get access token postman example](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/token-postman.png)  # Status Codes  ## Content-Type Header  All responses are returned in JSON format. We specify this by sending the Content-Type header.  ## Status Codes  Below is a table containing descriptions of the various status codes we currently support against various resources.  Sometimes your API call will generate an error. Here you will find additional information about what to expect if you don’t format your request properly, or we fail to properly process your request.  | Status Code | Description | | ----------- | ----------- | | `200`       | Success     | | `403`       | Forbidden   | | `404`       | Not found   |  # Pagination  Pagination is used to divide large responses is smaller portions (pages). By default, all endpoints return a maximum of 25 records per page. You can change the number of records on a per request basis by passing a `per_page` parameter in the request header parameters. The largest supported `per_page` parameter is 100.  When the response exceeds the `per_page` parameter, you can paginate through the records by increasing the `offset` parameter. Example: `offset=25` will return 25 records starting from 26th record. You may also paginate using the `page` parameter to indicate the page number you would like to show on the response.  Please review the table below for the input parameters  ## Inputs  | Parameter  | Description                                                                     | | ---------- | ------------------------------------------------------------------------------- | | `per_page` | Amount of records included on each page (Default is 25)                         | | `page`     | Page number                                                                     | | `offset`   | Amount of records offset on the API request where 0 represents the first record |  ## Response Headers  | Response Header | Description                                  | | --------------- | -------------------------------------------- | | `X-Total`       | Total number of records of response          | | `X-Total-Pages` | Total number of pages of response            | | `X-Per-Page`    | Total number of records per page of response | | `X-Page`        | Number of current page                       | | `X-Next-Page`   | Number of next page                          | | `X-Prev-Page`   | Number of previous page                      | | `X-Offset`      | Total number of records offset               |  # Search and Filtering (The q parameter)  The q optional parameter accepts a string as input and allows you to filter the request based on that string. Please note that search strings must be encoded according to ASCII. For example, \"john+investor&#64;dealmaker.tech\" should be passed as “john%2Binvestor%40dealmaker.tech”. There are two main ways to filter with it.  ## Keyword filtering  Some keywords allow you to filter investors based on a specific “scope” of the investors, for example using the string “Invited” will filter all investors with the status invited, and the keyword “Has attachments” will filter investors with attachments.  Here’s a list of possible keywords and the “scope” each one of the keywords filters by:  | Keywords                                       | Scope                                                                       | Decoded Example                                                      | Encoded Example                                                                          | | ---------------------------------------------- | --------------------------------------------------------------------------- | -------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | | Signed on \\(date range\\)                       | Investors who signed in the provided date range                             | Signed on (date range) [2020-07-01:2020-07-31]                       | `Signed%20on%20%28date%20range%29%20%5B2020-07-01%3A2020-07-31%5D`                       | | Enabled for countersignature on \\(date range\\) | Investors who were enabled for counter signature in the provided date range | Enabled for countersignature on (date range) [2022-05-24:2022-05-25] | `Enabled%20for%20countersignature%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D` | | Accepted on \\(date range\\)                     | Investors accepted in the provided date rage                                | Accepted on (date range) [2022-05-24:2022-05-25]                     | `Accepted%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D`                         | | Offline                                        | Investors added to the deal offline                                         | Offline                                                              | `Offline`                                                                                | | Online                                         | Investors added to the deal online                                          | Online                                                               | `Online`                                                                                 | | Signed                                         | Investors who signed their agreement                                        | Signed                                                               | `Signed`                                                                                 | | Waiting for countersignature                   | Investors who have signed and are waiting for counter signature             | Waiting for countersignature                                         | `Waiting%20for%20countersignature`                                                       | | Invited                                        | Investors on the Invited Status                                             | Invited                                                              | `Invited`                                                                                | | Accepted                                       | Investors in the Accepted Status                                            | Accepted                                                             | `Accepted`                                                                               | | Questionnaire in progress                      | All Investors who have not finished completing the questionnaire            | Questionnaire in progress                                            | `Questionnaire%20in%20progress`                                                          | | Has attachments                                | All Investors with attachments                                              | Has attachments                                                      | `Has%20attachments`                                                                      | | Has notes                                      | All Investors with notes                                                    | Has notes                                                            | `Has%20notes`                                                                            | | Waiting for co-signature                       | Investors who have signed and are waiting for co-signature                  | Waiting for co-signature                                             | `Waiting%20for%20co-signature`                                                           | | Background Check Approved                      | Investors with approved background check                                    | Background Check Approved                                            | `Background%20Check%20Approved`                                                          | | Document Review Pending                        | Investors with pending review                                               | Document Review Pending                                              | `Document%20Review%20Pending`                                                            | | Document Upload Pending                        | Investors with pending documents to upload                                  | Document Upload Pending                                              | `Document%20Upload%20Pending`                                                            | | Required adjudicator review                    | Investors who are required to be review by the adjudicator                  | Required adjudicator review                                          | `Required%20adjudicator%20review`                                                        |  ---  **NOTE**  Filtering keywords are case sensitive and need to be encoded  ---  ## Search String  Any value for the parameter which does not match one of the keywords listed above, will use fields like `first name`, `last name`, `email`, `tags` to search for the investor.  For example, if you search “Robert”, because this does not match one of the keywords listed above, it will then return any investors who have the string “Robert” in their name, email, or tags fields.  # Versioning  The latest version is v1.  The version can be updated on the `Accept` header, just set the version as stated on the following example:  ```  Accept:application/vnd.dealmaker-v1+json  ```  | Version | Accept Header                       | | ------- | ----------------------------------- | | `v1`    | application/vnd.dealmaker-`v1`+json |  # SDK’s  For instruction on installing SDKs, please view the following links  - [Javascript](https://github.com/DealMakerTech/api/tree/main/v1/clients/javascript) - [Ruby](https://github.com/DealMakerTech/api/tree/main/v1/clients/ruby)  # Webhooks  Our webhooks functionality allows clients to automatically receive updates on a deal's investor data.  The type of data that the webhooks include:  - Investor Name - Date created - Email - Phone - Allocation - Attachments - Accredited investor status - Accredited investor category - Status (Draft, Invited, Accepted, Waiting)  Via webhooks clients can subscribe to the following events as they happen on Dealmaker:  - Investor is created - Investor details are updated (any of the investor details above change or are updated) - Investor is deleted  A URL supplied by the client will receive all the events with the information as part of the payload. Clients are able to add and update the URL within DealMaker.  ## Configuration  For a comprehensive guide on how to configure Webhooks please visit our support article: [Configuring Webhooks on DealMaker – DealMaker Support](https://help.dealmaker.tech/configuring-webhooks-on-dealmaker).  As a developer user on DealMaker, you are able to configure webhooks by following the steps below:  1. Sign into Dealmaker 2. Go to **“Your profile”** in the top right corner 3. Access an **“Integrations”** configuration via the left menu 4. The developer configures webhooks by including:    - The HTTPS URL where the request will be sent    - Optionally, a security token that we would use to build a SHA1 hash that would be included in the request headers. The name of the header is `X-DealMaker-Signature`. If the secret is not specified, the hash won’t be included in the headers.    - An email address that will be used to notify about errors. 5. The developers can disable webhooks temporarily if needed  ## Specification  ### Events  The initial set of events will be related to the investor. The events are:  1. `investor.created`     - Triggers every time a new investor is added to a deal  2. `investor.updated`     - Triggers on updates to any of the following fields:      1. Status      2. Name      3. Email - (this is a user field so we trigger event for all investors with webhook subscription)      4. Allocated Amount      5. Investment Amount      6. Accredited investor fields      7. Adding or removing attachments      8. Tags    - When the investor status is signed, the payload also includes a link to the signed document; the link expires after 30 minutes  3. `investor.deleted`     - Triggers when the investor is removed from the deal    - The investor key of the payload only includes investor ID    - The deal is not included in the payload. Due to our implementation it’s impossible to retrieve the deal the investor was part of  ### Requests  - The request is a `POST` - The payload’s `content-type` is `application/json` - Only `2XX` responses are considered successful. In the event of a different response, we consider it failed and queue the event for retry - We retry the request five times, after the initial attempt. Doubling the waiting time between intervals with each try. The first retry happens after 30 seconds, then 60 seconds, 2 mins, 4 minutes, and 8 minutes. This timing scheme gives the receiver about 1 hour if all the requests fail - If an event fails all the attempts to be delivered, we send an email to the address that the user configured  ### Payload  #### Common Properties  There will be some properties that are common to all the events on the system.  | Key               | Type   | Description                                                                            | | ----------------- | ------ | -------------------------------------------------------------------------------------- | | event             | String | The event that triggered the call                                                      | | event_id          | String | A unique identifier for the event                                                      | | deal<sup>\\*</sup> | Object | The deal in which the event occurred. It includes id, title, created_at and updated_at |  <sup>\\*</sup>This field is not included when deleting a resource  #### Common Properties (investor scope)  Every event on this scope must contain an investor object, here are some properties that are common to this object on all events in the investor scope:  | Key                 | Type             | Description                                                                                                              | | ------------------- | ---------------- | ------------------------------------------------------------------------------------------------------------------------ | | id                  | Integer          | The unique ID of the Investor                                                                                            | | name                | String           | Investor’s Name                                                                                                          | | status              | String           | Current status of the investor<br />Possible states are: <br />draft<br />invited<br />signed<br />waiting<br />accepted | | email               | String           |                                                                                                                          | | phone_number        | String           |                                                                                                                          | | investment_amount   | Double           |                                                                                                                          | | allocated_amount    | Double           |                                                                                                                          | | accredited_investor | Object           | See format in respective ticket                                                                                          | | attachments         | Array of Objects | List of supporting documents uploaded to the investor, including URL (expire after 30 minutes) and title (caption)       | | funding_state       | String           | Investor’s current funding state (unfunded, underfunded, funded, overfunded)                                             | | funds_pending       | Boolean          | True if there are pending transactions, False otherwise                                                                  | | created_at          | Date             |                                                                                                                          | | updated_at          | Date             |                                                                                                                          | | tags                | Array of Strings | a list of the investor's tags, separated by comma.                                                                       |  ### investor.status >= signed Specific Properties  | Key                    | Type   | Description            | | ---------------------- | ------ | ---------------------- | | subscription_agreement | object | id, url (expiring URL) |  #### Investor Status  Here is a brief description of each investor state:  - **Draft:** the investor is added to the platform but hasn't been invited yet and cannot access the portal - **Invited:** the investor was added to the platform but hasn’t completed the questionnaire - **Signed:** the investor signed the document (needs approval from Lawyer or Reviewer before countersignature) - **Waiting:** the investor was approved for countersignature by any of the Lawyers or Reviewers in the deal - **Accepted:** the investor's agreement was countersigned by the Signatory  #### Update Delay  Given the high number of updates our platform performs on any investor, we’ve added a cool down period on update events that allows us to “group” updates and trigger only one every minute. In consequence, update events will be delivered 1 minute after the initial request was made and will include the latest version of the investor data at delivery time.
 *
 * The version of the OpenAPI document: 1.0.0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.5.0
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
 * CreateCorporationProfileRequest Class Doc Comment
 *
 * @category Class
 * @package  DealMaker
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateCorporationProfileRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'createCorporationProfile_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'email' => 'string',
        'us_accredited_category' => 'string',
        'name' => 'string',
        'country' => 'string',
        'street_address' => 'string',
        'unit2' => 'string',
        'city' => 'string',
        'region' => 'string',
        'postal_code' => 'string',
        'business_number' => 'string',
        'phone_number' => 'string',
        'signing_officer_first_name' => 'string',
        'signing_officer_last_name' => 'string',
        'signing_officer_suffix' => 'string',
        'signing_officer_country' => 'string',
        'signing_officer_street_address' => 'string',
        'signing_officer_unit2' => 'string',
        'signing_officer_city' => 'string',
        'signing_officer_region' => 'string',
        'signing_officer_postal_code' => 'string',
        'signing_officer_date_of_birth' => 'string',
        'signing_officer_taxpayer_id' => 'string',
        'beneficial_owners_first_name' => 'string[]',
        'beneficial_owners_last_name' => 'string[]',
        'beneficial_owners_suffix' => 'string[]',
        'beneficial_owners_country' => 'string[]',
        'beneficial_owners_street_address' => 'string[]',
        'beneficial_owners_unit_2' => 'string[]',
        'beneficial_owners_city' => 'string[]',
        'beneficial_owners_region' => 'string[]',
        'beneficial_owners_postal_code' => 'string[]',
        'beneficial_owners_date_of_birth' => 'string[]',
        'beneficial_owners_taxpayer_id' => 'string[]'
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
        'name' => null,
        'country' => null,
        'street_address' => null,
        'unit2' => null,
        'city' => null,
        'region' => null,
        'postal_code' => null,
        'business_number' => null,
        'phone_number' => null,
        'signing_officer_first_name' => null,
        'signing_officer_last_name' => null,
        'signing_officer_suffix' => null,
        'signing_officer_country' => null,
        'signing_officer_street_address' => null,
        'signing_officer_unit2' => null,
        'signing_officer_city' => null,
        'signing_officer_region' => null,
        'signing_officer_postal_code' => null,
        'signing_officer_date_of_birth' => null,
        'signing_officer_taxpayer_id' => null,
        'beneficial_owners_first_name' => null,
        'beneficial_owners_last_name' => null,
        'beneficial_owners_suffix' => null,
        'beneficial_owners_country' => null,
        'beneficial_owners_street_address' => null,
        'beneficial_owners_unit_2' => null,
        'beneficial_owners_city' => null,
        'beneficial_owners_region' => null,
        'beneficial_owners_postal_code' => null,
        'beneficial_owners_date_of_birth' => null,
        'beneficial_owners_taxpayer_id' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'email' => false,
		'us_accredited_category' => false,
		'name' => false,
		'country' => false,
		'street_address' => false,
		'unit2' => false,
		'city' => false,
		'region' => false,
		'postal_code' => false,
		'business_number' => false,
		'phone_number' => false,
		'signing_officer_first_name' => false,
		'signing_officer_last_name' => false,
		'signing_officer_suffix' => false,
		'signing_officer_country' => false,
		'signing_officer_street_address' => false,
		'signing_officer_unit2' => false,
		'signing_officer_city' => false,
		'signing_officer_region' => false,
		'signing_officer_postal_code' => false,
		'signing_officer_date_of_birth' => false,
		'signing_officer_taxpayer_id' => false,
		'beneficial_owners_first_name' => false,
		'beneficial_owners_last_name' => false,
		'beneficial_owners_suffix' => false,
		'beneficial_owners_country' => false,
		'beneficial_owners_street_address' => false,
		'beneficial_owners_unit_2' => false,
		'beneficial_owners_city' => false,
		'beneficial_owners_region' => false,
		'beneficial_owners_postal_code' => false,
		'beneficial_owners_date_of_birth' => false,
		'beneficial_owners_taxpayer_id' => false
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
        'name' => 'name',
        'country' => 'country',
        'street_address' => 'street_address',
        'unit2' => 'unit2',
        'city' => 'city',
        'region' => 'region',
        'postal_code' => 'postal_code',
        'business_number' => 'business_number',
        'phone_number' => 'phone_number',
        'signing_officer_first_name' => 'signing_officer_first_name',
        'signing_officer_last_name' => 'signing_officer_last_name',
        'signing_officer_suffix' => 'signing_officer_suffix',
        'signing_officer_country' => 'signing_officer_country',
        'signing_officer_street_address' => 'signing_officer_street_address',
        'signing_officer_unit2' => 'signing_officer_unit2',
        'signing_officer_city' => 'signing_officer_city',
        'signing_officer_region' => 'signing_officer_region',
        'signing_officer_postal_code' => 'signing_officer_postal_code',
        'signing_officer_date_of_birth' => 'signing_officer_date_of_birth',
        'signing_officer_taxpayer_id' => 'signing_officer_taxpayer_id',
        'beneficial_owners_first_name' => 'beneficial_owners[first_name]',
        'beneficial_owners_last_name' => 'beneficial_owners[last_name]',
        'beneficial_owners_suffix' => 'beneficial_owners[suffix]',
        'beneficial_owners_country' => 'beneficial_owners[country]',
        'beneficial_owners_street_address' => 'beneficial_owners[street_address]',
        'beneficial_owners_unit_2' => 'beneficial_owners[unit_2]',
        'beneficial_owners_city' => 'beneficial_owners[city]',
        'beneficial_owners_region' => 'beneficial_owners[region]',
        'beneficial_owners_postal_code' => 'beneficial_owners[postal_code]',
        'beneficial_owners_date_of_birth' => 'beneficial_owners[date_of_birth]',
        'beneficial_owners_taxpayer_id' => 'beneficial_owners[taxpayer_id]'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'email' => 'setEmail',
        'us_accredited_category' => 'setUsAccreditedCategory',
        'name' => 'setName',
        'country' => 'setCountry',
        'street_address' => 'setStreetAddress',
        'unit2' => 'setUnit2',
        'city' => 'setCity',
        'region' => 'setRegion',
        'postal_code' => 'setPostalCode',
        'business_number' => 'setBusinessNumber',
        'phone_number' => 'setPhoneNumber',
        'signing_officer_first_name' => 'setSigningOfficerFirstName',
        'signing_officer_last_name' => 'setSigningOfficerLastName',
        'signing_officer_suffix' => 'setSigningOfficerSuffix',
        'signing_officer_country' => 'setSigningOfficerCountry',
        'signing_officer_street_address' => 'setSigningOfficerStreetAddress',
        'signing_officer_unit2' => 'setSigningOfficerUnit2',
        'signing_officer_city' => 'setSigningOfficerCity',
        'signing_officer_region' => 'setSigningOfficerRegion',
        'signing_officer_postal_code' => 'setSigningOfficerPostalCode',
        'signing_officer_date_of_birth' => 'setSigningOfficerDateOfBirth',
        'signing_officer_taxpayer_id' => 'setSigningOfficerTaxpayerId',
        'beneficial_owners_first_name' => 'setBeneficialOwnersFirstName',
        'beneficial_owners_last_name' => 'setBeneficialOwnersLastName',
        'beneficial_owners_suffix' => 'setBeneficialOwnersSuffix',
        'beneficial_owners_country' => 'setBeneficialOwnersCountry',
        'beneficial_owners_street_address' => 'setBeneficialOwnersStreetAddress',
        'beneficial_owners_unit_2' => 'setBeneficialOwnersUnit2',
        'beneficial_owners_city' => 'setBeneficialOwnersCity',
        'beneficial_owners_region' => 'setBeneficialOwnersRegion',
        'beneficial_owners_postal_code' => 'setBeneficialOwnersPostalCode',
        'beneficial_owners_date_of_birth' => 'setBeneficialOwnersDateOfBirth',
        'beneficial_owners_taxpayer_id' => 'setBeneficialOwnersTaxpayerId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'email' => 'getEmail',
        'us_accredited_category' => 'getUsAccreditedCategory',
        'name' => 'getName',
        'country' => 'getCountry',
        'street_address' => 'getStreetAddress',
        'unit2' => 'getUnit2',
        'city' => 'getCity',
        'region' => 'getRegion',
        'postal_code' => 'getPostalCode',
        'business_number' => 'getBusinessNumber',
        'phone_number' => 'getPhoneNumber',
        'signing_officer_first_name' => 'getSigningOfficerFirstName',
        'signing_officer_last_name' => 'getSigningOfficerLastName',
        'signing_officer_suffix' => 'getSigningOfficerSuffix',
        'signing_officer_country' => 'getSigningOfficerCountry',
        'signing_officer_street_address' => 'getSigningOfficerStreetAddress',
        'signing_officer_unit2' => 'getSigningOfficerUnit2',
        'signing_officer_city' => 'getSigningOfficerCity',
        'signing_officer_region' => 'getSigningOfficerRegion',
        'signing_officer_postal_code' => 'getSigningOfficerPostalCode',
        'signing_officer_date_of_birth' => 'getSigningOfficerDateOfBirth',
        'signing_officer_taxpayer_id' => 'getSigningOfficerTaxpayerId',
        'beneficial_owners_first_name' => 'getBeneficialOwnersFirstName',
        'beneficial_owners_last_name' => 'getBeneficialOwnersLastName',
        'beneficial_owners_suffix' => 'getBeneficialOwnersSuffix',
        'beneficial_owners_country' => 'getBeneficialOwnersCountry',
        'beneficial_owners_street_address' => 'getBeneficialOwnersStreetAddress',
        'beneficial_owners_unit_2' => 'getBeneficialOwnersUnit2',
        'beneficial_owners_city' => 'getBeneficialOwnersCity',
        'beneficial_owners_region' => 'getBeneficialOwnersRegion',
        'beneficial_owners_postal_code' => 'getBeneficialOwnersPostalCode',
        'beneficial_owners_date_of_birth' => 'getBeneficialOwnersDateOfBirth',
        'beneficial_owners_taxpayer_id' => 'getBeneficialOwnersTaxpayerId'
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

    public const US_ACCREDITED_CATEGORY_ENTITY_OWNED_BY_ACCREDITED_INVESTORS = 'entity_owned_by_accredited_investors';
    public const US_ACCREDITED_CATEGORY_ASSETS_OTHER = 'assets_other';
    public const US_ACCREDITED_CATEGORY_ASSETS_FAMILY_OFFICE = 'assets_family_office';
    public const US_ACCREDITED_CATEGORY_ASSETS_BENEFIT_PLAN = 'assets_benefit_plan';
    public const US_ACCREDITED_CATEGORY_ASSETS_STATE_PLAN = 'assets_state_plan';
    public const US_ACCREDITED_CATEGORY_ASSETS_501_C_3 = 'assets_501_c_3';
    public const US_ACCREDITED_CATEGORY_ASSETS_CORPORATION = 'assets_corporation';
    public const US_ACCREDITED_CATEGORY_BROKER_OR_DEALER = 'broker_or_dealer';
    public const US_ACCREDITED_CATEGORY_BANK_3_A_2 = 'bank_3_a_2';
    public const US_ACCREDITED_CATEGORY_BUSINESS_DEVELOPMENT_COMPANY = 'business_development_company';
    public const US_ACCREDITED_CATEGORY_PRIVATE_BUSINESS_DEVELOPMENT_COMPANY = 'private_business_development_company';
    public const US_ACCREDITED_CATEGORY_INVESTMENT_COMPANY = 'investment_company';
    public const US_ACCREDITED_CATEGORY_RURAL_BUSINESS_INVESTMENT_COMPANY = 'rural_business_investment_company';
    public const US_ACCREDITED_CATEGORY_INSURANCE_COMPANY = 'insurance_company';
    public const US_ACCREDITED_CATEGORY_FAMILY_CLIENT = 'family_client';
    public const US_ACCREDITED_CATEGORY_NOT_ACCREDITED = 'not_accredited';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getUsAccreditedCategoryAllowableValues()
    {
        return [
            self::US_ACCREDITED_CATEGORY_ENTITY_OWNED_BY_ACCREDITED_INVESTORS,
            self::US_ACCREDITED_CATEGORY_ASSETS_OTHER,
            self::US_ACCREDITED_CATEGORY_ASSETS_FAMILY_OFFICE,
            self::US_ACCREDITED_CATEGORY_ASSETS_BENEFIT_PLAN,
            self::US_ACCREDITED_CATEGORY_ASSETS_STATE_PLAN,
            self::US_ACCREDITED_CATEGORY_ASSETS_501_C_3,
            self::US_ACCREDITED_CATEGORY_ASSETS_CORPORATION,
            self::US_ACCREDITED_CATEGORY_BROKER_OR_DEALER,
            self::US_ACCREDITED_CATEGORY_BANK_3_A_2,
            self::US_ACCREDITED_CATEGORY_BUSINESS_DEVELOPMENT_COMPANY,
            self::US_ACCREDITED_CATEGORY_PRIVATE_BUSINESS_DEVELOPMENT_COMPANY,
            self::US_ACCREDITED_CATEGORY_INVESTMENT_COMPANY,
            self::US_ACCREDITED_CATEGORY_RURAL_BUSINESS_INVESTMENT_COMPANY,
            self::US_ACCREDITED_CATEGORY_INSURANCE_COMPANY,
            self::US_ACCREDITED_CATEGORY_FAMILY_CLIENT,
            self::US_ACCREDITED_CATEGORY_NOT_ACCREDITED,
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
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('country', $data ?? [], null);
        $this->setIfExists('street_address', $data ?? [], null);
        $this->setIfExists('unit2', $data ?? [], null);
        $this->setIfExists('city', $data ?? [], null);
        $this->setIfExists('region', $data ?? [], null);
        $this->setIfExists('postal_code', $data ?? [], null);
        $this->setIfExists('business_number', $data ?? [], null);
        $this->setIfExists('phone_number', $data ?? [], null);
        $this->setIfExists('signing_officer_first_name', $data ?? [], null);
        $this->setIfExists('signing_officer_last_name', $data ?? [], null);
        $this->setIfExists('signing_officer_suffix', $data ?? [], null);
        $this->setIfExists('signing_officer_country', $data ?? [], null);
        $this->setIfExists('signing_officer_street_address', $data ?? [], null);
        $this->setIfExists('signing_officer_unit2', $data ?? [], null);
        $this->setIfExists('signing_officer_city', $data ?? [], null);
        $this->setIfExists('signing_officer_region', $data ?? [], null);
        $this->setIfExists('signing_officer_postal_code', $data ?? [], null);
        $this->setIfExists('signing_officer_date_of_birth', $data ?? [], null);
        $this->setIfExists('signing_officer_taxpayer_id', $data ?? [], null);
        $this->setIfExists('beneficial_owners_first_name', $data ?? [], null);
        $this->setIfExists('beneficial_owners_last_name', $data ?? [], null);
        $this->setIfExists('beneficial_owners_suffix', $data ?? [], null);
        $this->setIfExists('beneficial_owners_country', $data ?? [], null);
        $this->setIfExists('beneficial_owners_street_address', $data ?? [], null);
        $this->setIfExists('beneficial_owners_unit_2', $data ?? [], null);
        $this->setIfExists('beneficial_owners_city', $data ?? [], null);
        $this->setIfExists('beneficial_owners_region', $data ?? [], null);
        $this->setIfExists('beneficial_owners_postal_code', $data ?? [], null);
        $this->setIfExists('beneficial_owners_date_of_birth', $data ?? [], null);
        $this->setIfExists('beneficial_owners_taxpayer_id', $data ?? [], null);
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
     * @param string $email User email which is associated with investor profile (required).
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
     * @param string|null $us_accredited_category The accredited investor information.
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
     * @param string|null $name The name of the corporation (required).
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
     * Gets country
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string|null $country The country of the corporation (required).
     *
     * @return self
     */
    public function setCountry($country)
    {
        if (is_null($country)) {
            throw new \InvalidArgumentException('non-nullable country cannot be null');
        }
        $this->container['country'] = $country;

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
     * @param string|null $street_address The street address of the corporation (required).
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
     * @param string|null $unit2 The street address line 2 of the corporation.
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
     * @param string|null $city The city of the corporation (required).
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
     * @param string|null $region The region or state of the corporation (required).
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
     * @param string|null $postal_code The postal code or zipcode of the corporation (required).
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
     * Gets business_number
     *
     * @return string|null
     */
    public function getBusinessNumber()
    {
        return $this->container['business_number'];
    }

    /**
     * Sets business_number
     *
     * @param string|null $business_number The taxpayer identification number  of the corporation (required).
     *
     * @return self
     */
    public function setBusinessNumber($business_number)
    {
        if (is_null($business_number)) {
            throw new \InvalidArgumentException('non-nullable business_number cannot be null');
        }
        $this->container['business_number'] = $business_number;

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
     * @param string|null $phone_number The phone number o of the corporation (required).
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
     * Gets signing_officer_first_name
     *
     * @return string|null
     */
    public function getSigningOfficerFirstName()
    {
        return $this->container['signing_officer_first_name'];
    }

    /**
     * Sets signing_officer_first_name
     *
     * @param string|null $signing_officer_first_name The first name of the signing officer (required).
     *
     * @return self
     */
    public function setSigningOfficerFirstName($signing_officer_first_name)
    {
        if (is_null($signing_officer_first_name)) {
            throw new \InvalidArgumentException('non-nullable signing_officer_first_name cannot be null');
        }
        $this->container['signing_officer_first_name'] = $signing_officer_first_name;

        return $this;
    }

    /**
     * Gets signing_officer_last_name
     *
     * @return string|null
     */
    public function getSigningOfficerLastName()
    {
        return $this->container['signing_officer_last_name'];
    }

    /**
     * Sets signing_officer_last_name
     *
     * @param string|null $signing_officer_last_name The last name of the signing officer (required).
     *
     * @return self
     */
    public function setSigningOfficerLastName($signing_officer_last_name)
    {
        if (is_null($signing_officer_last_name)) {
            throw new \InvalidArgumentException('non-nullable signing_officer_last_name cannot be null');
        }
        $this->container['signing_officer_last_name'] = $signing_officer_last_name;

        return $this;
    }

    /**
     * Gets signing_officer_suffix
     *
     * @return string|null
     */
    public function getSigningOfficerSuffix()
    {
        return $this->container['signing_officer_suffix'];
    }

    /**
     * Sets signing_officer_suffix
     *
     * @param string|null $signing_officer_suffix The suffix of the signing officer.
     *
     * @return self
     */
    public function setSigningOfficerSuffix($signing_officer_suffix)
    {
        if (is_null($signing_officer_suffix)) {
            throw new \InvalidArgumentException('non-nullable signing_officer_suffix cannot be null');
        }
        $this->container['signing_officer_suffix'] = $signing_officer_suffix;

        return $this;
    }

    /**
     * Gets signing_officer_country
     *
     * @return string|null
     */
    public function getSigningOfficerCountry()
    {
        return $this->container['signing_officer_country'];
    }

    /**
     * Sets signing_officer_country
     *
     * @param string|null $signing_officer_country The country of the signing officer (required).
     *
     * @return self
     */
    public function setSigningOfficerCountry($signing_officer_country)
    {
        if (is_null($signing_officer_country)) {
            throw new \InvalidArgumentException('non-nullable signing_officer_country cannot be null');
        }
        $this->container['signing_officer_country'] = $signing_officer_country;

        return $this;
    }

    /**
     * Gets signing_officer_street_address
     *
     * @return string|null
     */
    public function getSigningOfficerStreetAddress()
    {
        return $this->container['signing_officer_street_address'];
    }

    /**
     * Sets signing_officer_street_address
     *
     * @param string|null $signing_officer_street_address The street address of the signing officer (required).
     *
     * @return self
     */
    public function setSigningOfficerStreetAddress($signing_officer_street_address)
    {
        if (is_null($signing_officer_street_address)) {
            throw new \InvalidArgumentException('non-nullable signing_officer_street_address cannot be null');
        }
        $this->container['signing_officer_street_address'] = $signing_officer_street_address;

        return $this;
    }

    /**
     * Gets signing_officer_unit2
     *
     * @return string|null
     */
    public function getSigningOfficerUnit2()
    {
        return $this->container['signing_officer_unit2'];
    }

    /**
     * Sets signing_officer_unit2
     *
     * @param string|null $signing_officer_unit2 The street address line 2 of the signing officer.
     *
     * @return self
     */
    public function setSigningOfficerUnit2($signing_officer_unit2)
    {
        if (is_null($signing_officer_unit2)) {
            throw new \InvalidArgumentException('non-nullable signing_officer_unit2 cannot be null');
        }
        $this->container['signing_officer_unit2'] = $signing_officer_unit2;

        return $this;
    }

    /**
     * Gets signing_officer_city
     *
     * @return string|null
     */
    public function getSigningOfficerCity()
    {
        return $this->container['signing_officer_city'];
    }

    /**
     * Sets signing_officer_city
     *
     * @param string|null $signing_officer_city The city of the signing officer (required).
     *
     * @return self
     */
    public function setSigningOfficerCity($signing_officer_city)
    {
        if (is_null($signing_officer_city)) {
            throw new \InvalidArgumentException('non-nullable signing_officer_city cannot be null');
        }
        $this->container['signing_officer_city'] = $signing_officer_city;

        return $this;
    }

    /**
     * Gets signing_officer_region
     *
     * @return string|null
     */
    public function getSigningOfficerRegion()
    {
        return $this->container['signing_officer_region'];
    }

    /**
     * Sets signing_officer_region
     *
     * @param string|null $signing_officer_region The region or state of the signing officer (required).
     *
     * @return self
     */
    public function setSigningOfficerRegion($signing_officer_region)
    {
        if (is_null($signing_officer_region)) {
            throw new \InvalidArgumentException('non-nullable signing_officer_region cannot be null');
        }
        $this->container['signing_officer_region'] = $signing_officer_region;

        return $this;
    }

    /**
     * Gets signing_officer_postal_code
     *
     * @return string|null
     */
    public function getSigningOfficerPostalCode()
    {
        return $this->container['signing_officer_postal_code'];
    }

    /**
     * Sets signing_officer_postal_code
     *
     * @param string|null $signing_officer_postal_code The postal code or zipcode of the signing officer (required).
     *
     * @return self
     */
    public function setSigningOfficerPostalCode($signing_officer_postal_code)
    {
        if (is_null($signing_officer_postal_code)) {
            throw new \InvalidArgumentException('non-nullable signing_officer_postal_code cannot be null');
        }
        $this->container['signing_officer_postal_code'] = $signing_officer_postal_code;

        return $this;
    }

    /**
     * Gets signing_officer_date_of_birth
     *
     * @return string|null
     */
    public function getSigningOfficerDateOfBirth()
    {
        return $this->container['signing_officer_date_of_birth'];
    }

    /**
     * Sets signing_officer_date_of_birth
     *
     * @param string|null $signing_officer_date_of_birth The date of birth of the signing officer (required).
     *
     * @return self
     */
    public function setSigningOfficerDateOfBirth($signing_officer_date_of_birth)
    {
        if (is_null($signing_officer_date_of_birth)) {
            throw new \InvalidArgumentException('non-nullable signing_officer_date_of_birth cannot be null');
        }
        $this->container['signing_officer_date_of_birth'] = $signing_officer_date_of_birth;

        return $this;
    }

    /**
     * Gets signing_officer_taxpayer_id
     *
     * @return string|null
     */
    public function getSigningOfficerTaxpayerId()
    {
        return $this->container['signing_officer_taxpayer_id'];
    }

    /**
     * Sets signing_officer_taxpayer_id
     *
     * @param string|null $signing_officer_taxpayer_id The taxpayer identification number of the signing officer (required).
     *
     * @return self
     */
    public function setSigningOfficerTaxpayerId($signing_officer_taxpayer_id)
    {
        if (is_null($signing_officer_taxpayer_id)) {
            throw new \InvalidArgumentException('non-nullable signing_officer_taxpayer_id cannot be null');
        }
        $this->container['signing_officer_taxpayer_id'] = $signing_officer_taxpayer_id;

        return $this;
    }

    /**
     * Gets beneficial_owners_first_name
     *
     * @return string[]|null
     */
    public function getBeneficialOwnersFirstName()
    {
        return $this->container['beneficial_owners_first_name'];
    }

    /**
     * Sets beneficial_owners_first_name
     *
     * @param string[]|null $beneficial_owners_first_name The list of first names for the beneficial owners (required for beneficial owner 1).
     *
     * @return self
     */
    public function setBeneficialOwnersFirstName($beneficial_owners_first_name)
    {
        if (is_null($beneficial_owners_first_name)) {
            throw new \InvalidArgumentException('non-nullable beneficial_owners_first_name cannot be null');
        }
        $this->container['beneficial_owners_first_name'] = $beneficial_owners_first_name;

        return $this;
    }

    /**
     * Gets beneficial_owners_last_name
     *
     * @return string[]|null
     */
    public function getBeneficialOwnersLastName()
    {
        return $this->container['beneficial_owners_last_name'];
    }

    /**
     * Sets beneficial_owners_last_name
     *
     * @param string[]|null $beneficial_owners_last_name The list of last names for the beneficial owners (required for beneficial owner 1).
     *
     * @return self
     */
    public function setBeneficialOwnersLastName($beneficial_owners_last_name)
    {
        if (is_null($beneficial_owners_last_name)) {
            throw new \InvalidArgumentException('non-nullable beneficial_owners_last_name cannot be null');
        }
        $this->container['beneficial_owners_last_name'] = $beneficial_owners_last_name;

        return $this;
    }

    /**
     * Gets beneficial_owners_suffix
     *
     * @return string[]|null
     */
    public function getBeneficialOwnersSuffix()
    {
        return $this->container['beneficial_owners_suffix'];
    }

    /**
     * Sets beneficial_owners_suffix
     *
     * @param string[]|null $beneficial_owners_suffix The list of suffixes for the beneficial owners.
     *
     * @return self
     */
    public function setBeneficialOwnersSuffix($beneficial_owners_suffix)
    {
        if (is_null($beneficial_owners_suffix)) {
            throw new \InvalidArgumentException('non-nullable beneficial_owners_suffix cannot be null');
        }
        $this->container['beneficial_owners_suffix'] = $beneficial_owners_suffix;

        return $this;
    }

    /**
     * Gets beneficial_owners_country
     *
     * @return string[]|null
     */
    public function getBeneficialOwnersCountry()
    {
        return $this->container['beneficial_owners_country'];
    }

    /**
     * Sets beneficial_owners_country
     *
     * @param string[]|null $beneficial_owners_country The list of countries for the beneficial owners (required for beneficial owner 1).
     *
     * @return self
     */
    public function setBeneficialOwnersCountry($beneficial_owners_country)
    {
        if (is_null($beneficial_owners_country)) {
            throw new \InvalidArgumentException('non-nullable beneficial_owners_country cannot be null');
        }
        $this->container['beneficial_owners_country'] = $beneficial_owners_country;

        return $this;
    }

    /**
     * Gets beneficial_owners_street_address
     *
     * @return string[]|null
     */
    public function getBeneficialOwnersStreetAddress()
    {
        return $this->container['beneficial_owners_street_address'];
    }

    /**
     * Sets beneficial_owners_street_address
     *
     * @param string[]|null $beneficial_owners_street_address The list of street addresses for the beneficial owners (required for beneficial owner 1).
     *
     * @return self
     */
    public function setBeneficialOwnersStreetAddress($beneficial_owners_street_address)
    {
        if (is_null($beneficial_owners_street_address)) {
            throw new \InvalidArgumentException('non-nullable beneficial_owners_street_address cannot be null');
        }
        $this->container['beneficial_owners_street_address'] = $beneficial_owners_street_address;

        return $this;
    }

    /**
     * Gets beneficial_owners_unit_2
     *
     * @return string[]|null
     */
    public function getBeneficialOwnersUnit2()
    {
        return $this->container['beneficial_owners_unit_2'];
    }

    /**
     * Sets beneficial_owners_unit_2
     *
     * @param string[]|null $beneficial_owners_unit_2 The list of street address line 2 for the beneficial owners.
     *
     * @return self
     */
    public function setBeneficialOwnersUnit2($beneficial_owners_unit_2)
    {
        if (is_null($beneficial_owners_unit_2)) {
            throw new \InvalidArgumentException('non-nullable beneficial_owners_unit_2 cannot be null');
        }
        $this->container['beneficial_owners_unit_2'] = $beneficial_owners_unit_2;

        return $this;
    }

    /**
     * Gets beneficial_owners_city
     *
     * @return string[]|null
     */
    public function getBeneficialOwnersCity()
    {
        return $this->container['beneficial_owners_city'];
    }

    /**
     * Sets beneficial_owners_city
     *
     * @param string[]|null $beneficial_owners_city The list of cities for the beneficial owners (required for beneficial owner 1).
     *
     * @return self
     */
    public function setBeneficialOwnersCity($beneficial_owners_city)
    {
        if (is_null($beneficial_owners_city)) {
            throw new \InvalidArgumentException('non-nullable beneficial_owners_city cannot be null');
        }
        $this->container['beneficial_owners_city'] = $beneficial_owners_city;

        return $this;
    }

    /**
     * Gets beneficial_owners_region
     *
     * @return string[]|null
     */
    public function getBeneficialOwnersRegion()
    {
        return $this->container['beneficial_owners_region'];
    }

    /**
     * Sets beneficial_owners_region
     *
     * @param string[]|null $beneficial_owners_region The list of region or states for the beneficial owners (required for beneficial owner 1).
     *
     * @return self
     */
    public function setBeneficialOwnersRegion($beneficial_owners_region)
    {
        if (is_null($beneficial_owners_region)) {
            throw new \InvalidArgumentException('non-nullable beneficial_owners_region cannot be null');
        }
        $this->container['beneficial_owners_region'] = $beneficial_owners_region;

        return $this;
    }

    /**
     * Gets beneficial_owners_postal_code
     *
     * @return string[]|null
     */
    public function getBeneficialOwnersPostalCode()
    {
        return $this->container['beneficial_owners_postal_code'];
    }

    /**
     * Sets beneficial_owners_postal_code
     *
     * @param string[]|null $beneficial_owners_postal_code The list of postal codes or zipcodes for the beneficial owners (required for beneficial owner 1).
     *
     * @return self
     */
    public function setBeneficialOwnersPostalCode($beneficial_owners_postal_code)
    {
        if (is_null($beneficial_owners_postal_code)) {
            throw new \InvalidArgumentException('non-nullable beneficial_owners_postal_code cannot be null');
        }
        $this->container['beneficial_owners_postal_code'] = $beneficial_owners_postal_code;

        return $this;
    }

    /**
     * Gets beneficial_owners_date_of_birth
     *
     * @return string[]|null
     */
    public function getBeneficialOwnersDateOfBirth()
    {
        return $this->container['beneficial_owners_date_of_birth'];
    }

    /**
     * Sets beneficial_owners_date_of_birth
     *
     * @param string[]|null $beneficial_owners_date_of_birth The list of dates of birth for the beneficial owners (required for beneficial owner 1).
     *
     * @return self
     */
    public function setBeneficialOwnersDateOfBirth($beneficial_owners_date_of_birth)
    {
        if (is_null($beneficial_owners_date_of_birth)) {
            throw new \InvalidArgumentException('non-nullable beneficial_owners_date_of_birth cannot be null');
        }
        $this->container['beneficial_owners_date_of_birth'] = $beneficial_owners_date_of_birth;

        return $this;
    }

    /**
     * Gets beneficial_owners_taxpayer_id
     *
     * @return string[]|null
     */
    public function getBeneficialOwnersTaxpayerId()
    {
        return $this->container['beneficial_owners_taxpayer_id'];
    }

    /**
     * Sets beneficial_owners_taxpayer_id
     *
     * @param string[]|null $beneficial_owners_taxpayer_id The list of taxpayer identification numbers for the beneficial owners (required for beneficial owner 1).
     *
     * @return self
     */
    public function setBeneficialOwnersTaxpayerId($beneficial_owners_taxpayer_id)
    {
        if (is_null($beneficial_owners_taxpayer_id)) {
            throw new \InvalidArgumentException('non-nullable beneficial_owners_taxpayer_id cannot be null');
        }
        $this->container['beneficial_owners_taxpayer_id'] = $beneficial_owners_taxpayer_id;

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


