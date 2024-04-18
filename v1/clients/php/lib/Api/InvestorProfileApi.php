<?php
/**
 * InvestorProfileApi
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
 * Generator version: 7.6.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace DealMaker\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use DealMaker\ApiException;
use DealMaker\Configuration;
use DealMaker\HeaderSelector;
use DealMaker\ObjectSerializer;

/**
 * InvestorProfileApi Class Doc Comment
 *
 * @category Class
 * @package  DealMaker
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class InvestorProfileApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'createCorporationProfile' => [
            'application/json',
        ],
        'createIndividualProfile' => [
            'application/json',
        ],
        'createJointProfile' => [
            'application/json',
        ],
        'createManagedProfile' => [
            'application/json',
        ],
        'createTrustProfile' => [
            'application/json',
        ],
        'getDealInvestorProfiles' => [
            'application/json',
        ],
        'getInvestorProfile' => [
            'application/json',
        ],
        'getInvestorProfiles' => [
            'application/json',
        ],
        'patchCorporationProfile' => [
            'application/json',
        ],
        'patchIndividualProfile' => [
            'application/json',
        ],
        'patchJointProfile' => [
            'application/json',
        ],
        'patchManagedProfile' => [
            'application/json',
        ],
        'patchTrustProfile' => [
            'application/json',
        ],
    ];

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation createCorporationProfile
     *
     * Create new corporation investor profile.
     *
     * @param  \DealMaker\Model\PostInvestorProfilesCorporations $investor_profiles_corporations investor_profiles_corporations (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createCorporationProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfileId
     */
    public function createCorporationProfile($investor_profiles_corporations, string $contentType = self::contentTypes['createCorporationProfile'][0])
    {
        list($response) = $this->createCorporationProfileWithHttpInfo($investor_profiles_corporations, $contentType);
        return $response;
    }

    /**
     * Operation createCorporationProfileWithHttpInfo
     *
     * Create new corporation investor profile.
     *
     * @param  \DealMaker\Model\PostInvestorProfilesCorporations $investor_profiles_corporations (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createCorporationProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfileId, HTTP status code, HTTP response headers (array of strings)
     */
    public function createCorporationProfileWithHttpInfo($investor_profiles_corporations, string $contentType = self::contentTypes['createCorporationProfile'][0])
    {
        $request = $this->createCorporationProfileRequest($investor_profiles_corporations, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 201:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfileId' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfileId' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfileId', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfileId',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createCorporationProfileAsync
     *
     * Create new corporation investor profile.
     *
     * @param  \DealMaker\Model\PostInvestorProfilesCorporations $investor_profiles_corporations (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createCorporationProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createCorporationProfileAsync($investor_profiles_corporations, string $contentType = self::contentTypes['createCorporationProfile'][0])
    {
        return $this->createCorporationProfileAsyncWithHttpInfo($investor_profiles_corporations, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createCorporationProfileAsyncWithHttpInfo
     *
     * Create new corporation investor profile.
     *
     * @param  \DealMaker\Model\PostInvestorProfilesCorporations $investor_profiles_corporations (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createCorporationProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createCorporationProfileAsyncWithHttpInfo($investor_profiles_corporations, string $contentType = self::contentTypes['createCorporationProfile'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
        $request = $this->createCorporationProfileRequest($investor_profiles_corporations, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createCorporationProfile'
     *
     * @param  \DealMaker\Model\PostInvestorProfilesCorporations $investor_profiles_corporations (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createCorporationProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createCorporationProfileRequest($investor_profiles_corporations, string $contentType = self::contentTypes['createCorporationProfile'][0])
    {

        // verify the required parameter 'investor_profiles_corporations' is set
        if ($investor_profiles_corporations === null || (is_array($investor_profiles_corporations) && count($investor_profiles_corporations) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profiles_corporations when calling createCorporationProfile'
            );
        }


        $resourcePath = '/investor_profiles/corporations';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($investor_profiles_corporations)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($investor_profiles_corporations));
            } else {
                $httpBody = $investor_profiles_corporations;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createIndividualProfile
     *
     * Create new individual investor profile
     *
     * @param  \DealMaker\Model\PostInvestorProfilesIndividuals $investor_profiles_individuals investor_profiles_individuals (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createIndividualProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfileId
     */
    public function createIndividualProfile($investor_profiles_individuals, string $contentType = self::contentTypes['createIndividualProfile'][0])
    {
        list($response) = $this->createIndividualProfileWithHttpInfo($investor_profiles_individuals, $contentType);
        return $response;
    }

    /**
     * Operation createIndividualProfileWithHttpInfo
     *
     * Create new individual investor profile
     *
     * @param  \DealMaker\Model\PostInvestorProfilesIndividuals $investor_profiles_individuals (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createIndividualProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfileId, HTTP status code, HTTP response headers (array of strings)
     */
    public function createIndividualProfileWithHttpInfo($investor_profiles_individuals, string $contentType = self::contentTypes['createIndividualProfile'][0])
    {
        $request = $this->createIndividualProfileRequest($investor_profiles_individuals, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 201:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfileId' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfileId' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfileId', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfileId',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createIndividualProfileAsync
     *
     * Create new individual investor profile
     *
     * @param  \DealMaker\Model\PostInvestorProfilesIndividuals $investor_profiles_individuals (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createIndividualProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createIndividualProfileAsync($investor_profiles_individuals, string $contentType = self::contentTypes['createIndividualProfile'][0])
    {
        return $this->createIndividualProfileAsyncWithHttpInfo($investor_profiles_individuals, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createIndividualProfileAsyncWithHttpInfo
     *
     * Create new individual investor profile
     *
     * @param  \DealMaker\Model\PostInvestorProfilesIndividuals $investor_profiles_individuals (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createIndividualProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createIndividualProfileAsyncWithHttpInfo($investor_profiles_individuals, string $contentType = self::contentTypes['createIndividualProfile'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
        $request = $this->createIndividualProfileRequest($investor_profiles_individuals, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createIndividualProfile'
     *
     * @param  \DealMaker\Model\PostInvestorProfilesIndividuals $investor_profiles_individuals (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createIndividualProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createIndividualProfileRequest($investor_profiles_individuals, string $contentType = self::contentTypes['createIndividualProfile'][0])
    {

        // verify the required parameter 'investor_profiles_individuals' is set
        if ($investor_profiles_individuals === null || (is_array($investor_profiles_individuals) && count($investor_profiles_individuals) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profiles_individuals when calling createIndividualProfile'
            );
        }


        $resourcePath = '/investor_profiles/individuals';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($investor_profiles_individuals)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($investor_profiles_individuals));
            } else {
                $httpBody = $investor_profiles_individuals;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createJointProfile
     *
     * Create new joint investor profile
     *
     * @param  \DealMaker\Model\PostInvestorProfilesJoints $investor_profiles_joints investor_profiles_joints (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createJointProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfileId
     */
    public function createJointProfile($investor_profiles_joints, string $contentType = self::contentTypes['createJointProfile'][0])
    {
        list($response) = $this->createJointProfileWithHttpInfo($investor_profiles_joints, $contentType);
        return $response;
    }

    /**
     * Operation createJointProfileWithHttpInfo
     *
     * Create new joint investor profile
     *
     * @param  \DealMaker\Model\PostInvestorProfilesJoints $investor_profiles_joints (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createJointProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfileId, HTTP status code, HTTP response headers (array of strings)
     */
    public function createJointProfileWithHttpInfo($investor_profiles_joints, string $contentType = self::contentTypes['createJointProfile'][0])
    {
        $request = $this->createJointProfileRequest($investor_profiles_joints, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 201:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfileId' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfileId' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfileId', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfileId',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createJointProfileAsync
     *
     * Create new joint investor profile
     *
     * @param  \DealMaker\Model\PostInvestorProfilesJoints $investor_profiles_joints (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createJointProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createJointProfileAsync($investor_profiles_joints, string $contentType = self::contentTypes['createJointProfile'][0])
    {
        return $this->createJointProfileAsyncWithHttpInfo($investor_profiles_joints, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createJointProfileAsyncWithHttpInfo
     *
     * Create new joint investor profile
     *
     * @param  \DealMaker\Model\PostInvestorProfilesJoints $investor_profiles_joints (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createJointProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createJointProfileAsyncWithHttpInfo($investor_profiles_joints, string $contentType = self::contentTypes['createJointProfile'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
        $request = $this->createJointProfileRequest($investor_profiles_joints, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createJointProfile'
     *
     * @param  \DealMaker\Model\PostInvestorProfilesJoints $investor_profiles_joints (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createJointProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createJointProfileRequest($investor_profiles_joints, string $contentType = self::contentTypes['createJointProfile'][0])
    {

        // verify the required parameter 'investor_profiles_joints' is set
        if ($investor_profiles_joints === null || (is_array($investor_profiles_joints) && count($investor_profiles_joints) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profiles_joints when calling createJointProfile'
            );
        }


        $resourcePath = '/investor_profiles/joints';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($investor_profiles_joints)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($investor_profiles_joints));
            } else {
                $httpBody = $investor_profiles_joints;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createManagedProfile
     *
     * Create new managed investor profile.
     *
     * @param  \DealMaker\Model\PostInvestorProfilesManaged $investor_profiles_managed investor_profiles_managed (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createManagedProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfileId
     */
    public function createManagedProfile($investor_profiles_managed, string $contentType = self::contentTypes['createManagedProfile'][0])
    {
        list($response) = $this->createManagedProfileWithHttpInfo($investor_profiles_managed, $contentType);
        return $response;
    }

    /**
     * Operation createManagedProfileWithHttpInfo
     *
     * Create new managed investor profile.
     *
     * @param  \DealMaker\Model\PostInvestorProfilesManaged $investor_profiles_managed (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createManagedProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfileId, HTTP status code, HTTP response headers (array of strings)
     */
    public function createManagedProfileWithHttpInfo($investor_profiles_managed, string $contentType = self::contentTypes['createManagedProfile'][0])
    {
        $request = $this->createManagedProfileRequest($investor_profiles_managed, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 201:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfileId' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfileId' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfileId', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfileId',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createManagedProfileAsync
     *
     * Create new managed investor profile.
     *
     * @param  \DealMaker\Model\PostInvestorProfilesManaged $investor_profiles_managed (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createManagedProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createManagedProfileAsync($investor_profiles_managed, string $contentType = self::contentTypes['createManagedProfile'][0])
    {
        return $this->createManagedProfileAsyncWithHttpInfo($investor_profiles_managed, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createManagedProfileAsyncWithHttpInfo
     *
     * Create new managed investor profile.
     *
     * @param  \DealMaker\Model\PostInvestorProfilesManaged $investor_profiles_managed (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createManagedProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createManagedProfileAsyncWithHttpInfo($investor_profiles_managed, string $contentType = self::contentTypes['createManagedProfile'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
        $request = $this->createManagedProfileRequest($investor_profiles_managed, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createManagedProfile'
     *
     * @param  \DealMaker\Model\PostInvestorProfilesManaged $investor_profiles_managed (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createManagedProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createManagedProfileRequest($investor_profiles_managed, string $contentType = self::contentTypes['createManagedProfile'][0])
    {

        // verify the required parameter 'investor_profiles_managed' is set
        if ($investor_profiles_managed === null || (is_array($investor_profiles_managed) && count($investor_profiles_managed) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profiles_managed when calling createManagedProfile'
            );
        }


        $resourcePath = '/investor_profiles/managed';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($investor_profiles_managed)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($investor_profiles_managed));
            } else {
                $httpBody = $investor_profiles_managed;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation createTrustProfile
     *
     * Create new trust investor profile.
     *
     * @param  \DealMaker\Model\PostInvestorProfilesTrusts $investor_profiles_trusts investor_profiles_trusts (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createTrustProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfileId
     */
    public function createTrustProfile($investor_profiles_trusts, string $contentType = self::contentTypes['createTrustProfile'][0])
    {
        list($response) = $this->createTrustProfileWithHttpInfo($investor_profiles_trusts, $contentType);
        return $response;
    }

    /**
     * Operation createTrustProfileWithHttpInfo
     *
     * Create new trust investor profile.
     *
     * @param  \DealMaker\Model\PostInvestorProfilesTrusts $investor_profiles_trusts (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createTrustProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfileId, HTTP status code, HTTP response headers (array of strings)
     */
    public function createTrustProfileWithHttpInfo($investor_profiles_trusts, string $contentType = self::contentTypes['createTrustProfile'][0])
    {
        $request = $this->createTrustProfileRequest($investor_profiles_trusts, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 201:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfileId' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfileId' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfileId', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfileId',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createTrustProfileAsync
     *
     * Create new trust investor profile.
     *
     * @param  \DealMaker\Model\PostInvestorProfilesTrusts $investor_profiles_trusts (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createTrustProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTrustProfileAsync($investor_profiles_trusts, string $contentType = self::contentTypes['createTrustProfile'][0])
    {
        return $this->createTrustProfileAsyncWithHttpInfo($investor_profiles_trusts, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createTrustProfileAsyncWithHttpInfo
     *
     * Create new trust investor profile.
     *
     * @param  \DealMaker\Model\PostInvestorProfilesTrusts $investor_profiles_trusts (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createTrustProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createTrustProfileAsyncWithHttpInfo($investor_profiles_trusts, string $contentType = self::contentTypes['createTrustProfile'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
        $request = $this->createTrustProfileRequest($investor_profiles_trusts, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'createTrustProfile'
     *
     * @param  \DealMaker\Model\PostInvestorProfilesTrusts $investor_profiles_trusts (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createTrustProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createTrustProfileRequest($investor_profiles_trusts, string $contentType = self::contentTypes['createTrustProfile'][0])
    {

        // verify the required parameter 'investor_profiles_trusts' is set
        if ($investor_profiles_trusts === null || (is_array($investor_profiles_trusts) && count($investor_profiles_trusts) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profiles_trusts when calling createTrustProfile'
            );
        }


        $resourcePath = '/investor_profiles/trusts';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($investor_profiles_trusts)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($investor_profiles_trusts));
            } else {
                $httpBody = $investor_profiles_trusts;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getDealInvestorProfiles
     *
     * Get list of InvestorProfiles for a specific deal
     *
     * @param  int $deal_id The deal id. (required)
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  int $user_id The user id filter. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealInvestorProfiles'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfiles
     */
    public function getDealInvestorProfiles($deal_id, $page = 1, $per_page = 25, $offset = 0, $user_id = null, string $contentType = self::contentTypes['getDealInvestorProfiles'][0])
    {
        list($response) = $this->getDealInvestorProfilesWithHttpInfo($deal_id, $page, $per_page, $offset, $user_id, $contentType);
        return $response;
    }

    /**
     * Operation getDealInvestorProfilesWithHttpInfo
     *
     * Get list of InvestorProfiles for a specific deal
     *
     * @param  int $deal_id The deal id. (required)
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  int $user_id The user id filter. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealInvestorProfiles'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfiles, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDealInvestorProfilesWithHttpInfo($deal_id, $page = 1, $per_page = 25, $offset = 0, $user_id = null, string $contentType = self::contentTypes['getDealInvestorProfiles'][0])
    {
        $request = $this->getDealInvestorProfilesRequest($deal_id, $page, $per_page, $offset, $user_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfiles' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfiles' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfiles', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfiles';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfiles',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getDealInvestorProfilesAsync
     *
     * Get list of InvestorProfiles for a specific deal
     *
     * @param  int $deal_id The deal id. (required)
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  int $user_id The user id filter. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealInvestorProfiles'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDealInvestorProfilesAsync($deal_id, $page = 1, $per_page = 25, $offset = 0, $user_id = null, string $contentType = self::contentTypes['getDealInvestorProfiles'][0])
    {
        return $this->getDealInvestorProfilesAsyncWithHttpInfo($deal_id, $page, $per_page, $offset, $user_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDealInvestorProfilesAsyncWithHttpInfo
     *
     * Get list of InvestorProfiles for a specific deal
     *
     * @param  int $deal_id The deal id. (required)
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  int $user_id The user id filter. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealInvestorProfiles'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDealInvestorProfilesAsyncWithHttpInfo($deal_id, $page = 1, $per_page = 25, $offset = 0, $user_id = null, string $contentType = self::contentTypes['getDealInvestorProfiles'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfiles';
        $request = $this->getDealInvestorProfilesRequest($deal_id, $page, $per_page, $offset, $user_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getDealInvestorProfiles'
     *
     * @param  int $deal_id The deal id. (required)
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  int $user_id The user id filter. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealInvestorProfiles'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getDealInvestorProfilesRequest($deal_id, $page = 1, $per_page = 25, $offset = 0, $user_id = null, string $contentType = self::contentTypes['getDealInvestorProfiles'][0])
    {

        // verify the required parameter 'deal_id' is set
        if ($deal_id === null || (is_array($deal_id) && count($deal_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $deal_id when calling getDealInvestorProfiles'
            );
        }






        $resourcePath = '/investor_profiles/{deal_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $per_page,
            'per_page', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $offset,
            'offset', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $user_id,
            'user_id', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);


        // path params
        if ($deal_id !== null) {
            $resourcePath = str_replace(
                '{' . 'deal_id' . '}',
                ObjectSerializer::toPathValue($deal_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getInvestorProfile
     *
     * Get an investor profile by id
     *
     * @param  int $id The id of the investor profile. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfileItem
     */
    public function getInvestorProfile($id, string $contentType = self::contentTypes['getInvestorProfile'][0])
    {
        list($response) = $this->getInvestorProfileWithHttpInfo($id, $contentType);
        return $response;
    }

    /**
     * Operation getInvestorProfileWithHttpInfo
     *
     * Get an investor profile by id
     *
     * @param  int $id The id of the investor profile. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfileItem, HTTP status code, HTTP response headers (array of strings)
     */
    public function getInvestorProfileWithHttpInfo($id, string $contentType = self::contentTypes['getInvestorProfile'][0])
    {
        $request = $this->getInvestorProfileRequest($id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfileItem' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfileItem' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfileItem', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileItem';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfileItem',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getInvestorProfileAsync
     *
     * Get an investor profile by id
     *
     * @param  int $id The id of the investor profile. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInvestorProfileAsync($id, string $contentType = self::contentTypes['getInvestorProfile'][0])
    {
        return $this->getInvestorProfileAsyncWithHttpInfo($id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getInvestorProfileAsyncWithHttpInfo
     *
     * Get an investor profile by id
     *
     * @param  int $id The id of the investor profile. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInvestorProfileAsyncWithHttpInfo($id, string $contentType = self::contentTypes['getInvestorProfile'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileItem';
        $request = $this->getInvestorProfileRequest($id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getInvestorProfile'
     *
     * @param  int $id The id of the investor profile. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getInvestorProfileRequest($id, string $contentType = self::contentTypes['getInvestorProfile'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getInvestorProfile'
            );
        }


        $resourcePath = '/investor_profiles/profile/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getInvestorProfiles
     *
     * Get list of InvestorProfiles
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorProfiles'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfiles
     */
    public function getInvestorProfiles($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['getInvestorProfiles'][0])
    {
        list($response) = $this->getInvestorProfilesWithHttpInfo($page, $per_page, $offset, $contentType);
        return $response;
    }

    /**
     * Operation getInvestorProfilesWithHttpInfo
     *
     * Get list of InvestorProfiles
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorProfiles'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfiles, HTTP status code, HTTP response headers (array of strings)
     */
    public function getInvestorProfilesWithHttpInfo($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['getInvestorProfiles'][0])
    {
        $request = $this->getInvestorProfilesRequest($page, $per_page, $offset, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfiles' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfiles' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfiles', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfiles';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfiles',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getInvestorProfilesAsync
     *
     * Get list of InvestorProfiles
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorProfiles'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInvestorProfilesAsync($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['getInvestorProfiles'][0])
    {
        return $this->getInvestorProfilesAsyncWithHttpInfo($page, $per_page, $offset, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getInvestorProfilesAsyncWithHttpInfo
     *
     * Get list of InvestorProfiles
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorProfiles'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInvestorProfilesAsyncWithHttpInfo($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['getInvestorProfiles'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfiles';
        $request = $this->getInvestorProfilesRequest($page, $per_page, $offset, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getInvestorProfiles'
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorProfiles'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getInvestorProfilesRequest($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['getInvestorProfiles'][0])
    {





        $resourcePath = '/investor_profiles';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $page,
            'page', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $per_page,
            'per_page', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $offset,
            'offset', // param base name
            'integer', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation patchCorporationProfile
     *
     * Patch a corporation investor profile
     *
     * @param  int $investor_profile_id investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesCorporations $investor_profiles_corporations investor_profiles_corporations (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchCorporationProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfileId
     */
    public function patchCorporationProfile($investor_profile_id, $investor_profiles_corporations, string $contentType = self::contentTypes['patchCorporationProfile'][0])
    {
        list($response) = $this->patchCorporationProfileWithHttpInfo($investor_profile_id, $investor_profiles_corporations, $contentType);
        return $response;
    }

    /**
     * Operation patchCorporationProfileWithHttpInfo
     *
     * Patch a corporation investor profile
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesCorporations $investor_profiles_corporations (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchCorporationProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfileId, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchCorporationProfileWithHttpInfo($investor_profile_id, $investor_profiles_corporations, string $contentType = self::contentTypes['patchCorporationProfile'][0])
    {
        $request = $this->patchCorporationProfileRequest($investor_profile_id, $investor_profiles_corporations, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfileId' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfileId' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfileId', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfileId',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation patchCorporationProfileAsync
     *
     * Patch a corporation investor profile
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesCorporations $investor_profiles_corporations (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchCorporationProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchCorporationProfileAsync($investor_profile_id, $investor_profiles_corporations, string $contentType = self::contentTypes['patchCorporationProfile'][0])
    {
        return $this->patchCorporationProfileAsyncWithHttpInfo($investor_profile_id, $investor_profiles_corporations, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchCorporationProfileAsyncWithHttpInfo
     *
     * Patch a corporation investor profile
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesCorporations $investor_profiles_corporations (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchCorporationProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchCorporationProfileAsyncWithHttpInfo($investor_profile_id, $investor_profiles_corporations, string $contentType = self::contentTypes['patchCorporationProfile'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
        $request = $this->patchCorporationProfileRequest($investor_profile_id, $investor_profiles_corporations, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'patchCorporationProfile'
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesCorporations $investor_profiles_corporations (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchCorporationProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function patchCorporationProfileRequest($investor_profile_id, $investor_profiles_corporations, string $contentType = self::contentTypes['patchCorporationProfile'][0])
    {

        // verify the required parameter 'investor_profile_id' is set
        if ($investor_profile_id === null || (is_array($investor_profile_id) && count($investor_profile_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profile_id when calling patchCorporationProfile'
            );
        }

        // verify the required parameter 'investor_profiles_corporations' is set
        if ($investor_profiles_corporations === null || (is_array($investor_profiles_corporations) && count($investor_profiles_corporations) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profiles_corporations when calling patchCorporationProfile'
            );
        }


        $resourcePath = '/investor_profiles/corporations/{investor_profile_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($investor_profile_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_profile_id' . '}',
                ObjectSerializer::toPathValue($investor_profile_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($investor_profiles_corporations)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($investor_profiles_corporations));
            } else {
                $httpBody = $investor_profiles_corporations;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation patchIndividualProfile
     *
     * Patch an individual investor profile.
     *
     * @param  int $investor_profile_id investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesIndividuals $investor_profiles_individuals investor_profiles_individuals (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchIndividualProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfileId
     */
    public function patchIndividualProfile($investor_profile_id, $investor_profiles_individuals, string $contentType = self::contentTypes['patchIndividualProfile'][0])
    {
        list($response) = $this->patchIndividualProfileWithHttpInfo($investor_profile_id, $investor_profiles_individuals, $contentType);
        return $response;
    }

    /**
     * Operation patchIndividualProfileWithHttpInfo
     *
     * Patch an individual investor profile.
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesIndividuals $investor_profiles_individuals (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchIndividualProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfileId, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchIndividualProfileWithHttpInfo($investor_profile_id, $investor_profiles_individuals, string $contentType = self::contentTypes['patchIndividualProfile'][0])
    {
        $request = $this->patchIndividualProfileRequest($investor_profile_id, $investor_profiles_individuals, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfileId' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfileId' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfileId', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfileId',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation patchIndividualProfileAsync
     *
     * Patch an individual investor profile.
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesIndividuals $investor_profiles_individuals (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchIndividualProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchIndividualProfileAsync($investor_profile_id, $investor_profiles_individuals, string $contentType = self::contentTypes['patchIndividualProfile'][0])
    {
        return $this->patchIndividualProfileAsyncWithHttpInfo($investor_profile_id, $investor_profiles_individuals, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchIndividualProfileAsyncWithHttpInfo
     *
     * Patch an individual investor profile.
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesIndividuals $investor_profiles_individuals (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchIndividualProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchIndividualProfileAsyncWithHttpInfo($investor_profile_id, $investor_profiles_individuals, string $contentType = self::contentTypes['patchIndividualProfile'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
        $request = $this->patchIndividualProfileRequest($investor_profile_id, $investor_profiles_individuals, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'patchIndividualProfile'
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesIndividuals $investor_profiles_individuals (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchIndividualProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function patchIndividualProfileRequest($investor_profile_id, $investor_profiles_individuals, string $contentType = self::contentTypes['patchIndividualProfile'][0])
    {

        // verify the required parameter 'investor_profile_id' is set
        if ($investor_profile_id === null || (is_array($investor_profile_id) && count($investor_profile_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profile_id when calling patchIndividualProfile'
            );
        }

        // verify the required parameter 'investor_profiles_individuals' is set
        if ($investor_profiles_individuals === null || (is_array($investor_profiles_individuals) && count($investor_profiles_individuals) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profiles_individuals when calling patchIndividualProfile'
            );
        }


        $resourcePath = '/investor_profiles/individuals/{investor_profile_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($investor_profile_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_profile_id' . '}',
                ObjectSerializer::toPathValue($investor_profile_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($investor_profiles_individuals)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($investor_profiles_individuals));
            } else {
                $httpBody = $investor_profiles_individuals;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation patchJointProfile
     *
     * Patch a joint investor profile
     *
     * @param  int $investor_profile_id investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesJoints $investor_profiles_joints investor_profiles_joints (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchJointProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfileId
     */
    public function patchJointProfile($investor_profile_id, $investor_profiles_joints, string $contentType = self::contentTypes['patchJointProfile'][0])
    {
        list($response) = $this->patchJointProfileWithHttpInfo($investor_profile_id, $investor_profiles_joints, $contentType);
        return $response;
    }

    /**
     * Operation patchJointProfileWithHttpInfo
     *
     * Patch a joint investor profile
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesJoints $investor_profiles_joints (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchJointProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfileId, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchJointProfileWithHttpInfo($investor_profile_id, $investor_profiles_joints, string $contentType = self::contentTypes['patchJointProfile'][0])
    {
        $request = $this->patchJointProfileRequest($investor_profile_id, $investor_profiles_joints, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfileId' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfileId' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfileId', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfileId',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation patchJointProfileAsync
     *
     * Patch a joint investor profile
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesJoints $investor_profiles_joints (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchJointProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchJointProfileAsync($investor_profile_id, $investor_profiles_joints, string $contentType = self::contentTypes['patchJointProfile'][0])
    {
        return $this->patchJointProfileAsyncWithHttpInfo($investor_profile_id, $investor_profiles_joints, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchJointProfileAsyncWithHttpInfo
     *
     * Patch a joint investor profile
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesJoints $investor_profiles_joints (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchJointProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchJointProfileAsyncWithHttpInfo($investor_profile_id, $investor_profiles_joints, string $contentType = self::contentTypes['patchJointProfile'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
        $request = $this->patchJointProfileRequest($investor_profile_id, $investor_profiles_joints, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'patchJointProfile'
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesJoints $investor_profiles_joints (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchJointProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function patchJointProfileRequest($investor_profile_id, $investor_profiles_joints, string $contentType = self::contentTypes['patchJointProfile'][0])
    {

        // verify the required parameter 'investor_profile_id' is set
        if ($investor_profile_id === null || (is_array($investor_profile_id) && count($investor_profile_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profile_id when calling patchJointProfile'
            );
        }

        // verify the required parameter 'investor_profiles_joints' is set
        if ($investor_profiles_joints === null || (is_array($investor_profiles_joints) && count($investor_profiles_joints) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profiles_joints when calling patchJointProfile'
            );
        }


        $resourcePath = '/investor_profiles/joints/{investor_profile_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($investor_profile_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_profile_id' . '}',
                ObjectSerializer::toPathValue($investor_profile_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($investor_profiles_joints)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($investor_profiles_joints));
            } else {
                $httpBody = $investor_profiles_joints;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation patchManagedProfile
     *
     * Patch managed investor profile.
     *
     * @param  int $investor_profile_id investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesManaged $investor_profiles_managed investor_profiles_managed (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchManagedProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfileId
     */
    public function patchManagedProfile($investor_profile_id, $investor_profiles_managed, string $contentType = self::contentTypes['patchManagedProfile'][0])
    {
        list($response) = $this->patchManagedProfileWithHttpInfo($investor_profile_id, $investor_profiles_managed, $contentType);
        return $response;
    }

    /**
     * Operation patchManagedProfileWithHttpInfo
     *
     * Patch managed investor profile.
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesManaged $investor_profiles_managed (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchManagedProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfileId, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchManagedProfileWithHttpInfo($investor_profile_id, $investor_profiles_managed, string $contentType = self::contentTypes['patchManagedProfile'][0])
    {
        $request = $this->patchManagedProfileRequest($investor_profile_id, $investor_profiles_managed, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfileId' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfileId' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfileId', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfileId',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation patchManagedProfileAsync
     *
     * Patch managed investor profile.
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesManaged $investor_profiles_managed (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchManagedProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchManagedProfileAsync($investor_profile_id, $investor_profiles_managed, string $contentType = self::contentTypes['patchManagedProfile'][0])
    {
        return $this->patchManagedProfileAsyncWithHttpInfo($investor_profile_id, $investor_profiles_managed, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchManagedProfileAsyncWithHttpInfo
     *
     * Patch managed investor profile.
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesManaged $investor_profiles_managed (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchManagedProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchManagedProfileAsyncWithHttpInfo($investor_profile_id, $investor_profiles_managed, string $contentType = self::contentTypes['patchManagedProfile'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
        $request = $this->patchManagedProfileRequest($investor_profile_id, $investor_profiles_managed, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'patchManagedProfile'
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesManaged $investor_profiles_managed (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchManagedProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function patchManagedProfileRequest($investor_profile_id, $investor_profiles_managed, string $contentType = self::contentTypes['patchManagedProfile'][0])
    {

        // verify the required parameter 'investor_profile_id' is set
        if ($investor_profile_id === null || (is_array($investor_profile_id) && count($investor_profile_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profile_id when calling patchManagedProfile'
            );
        }

        // verify the required parameter 'investor_profiles_managed' is set
        if ($investor_profiles_managed === null || (is_array($investor_profiles_managed) && count($investor_profiles_managed) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profiles_managed when calling patchManagedProfile'
            );
        }


        $resourcePath = '/investor_profiles/managed/{investor_profile_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($investor_profile_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_profile_id' . '}',
                ObjectSerializer::toPathValue($investor_profile_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($investor_profiles_managed)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($investor_profiles_managed));
            } else {
                $httpBody = $investor_profiles_managed;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation patchTrustProfile
     *
     * Patch a trust investor profile
     *
     * @param  int $investor_profile_id investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesTrusts $investor_profiles_trusts investor_profiles_trusts (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchTrustProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorProfileId
     */
    public function patchTrustProfile($investor_profile_id, $investor_profiles_trusts, string $contentType = self::contentTypes['patchTrustProfile'][0])
    {
        list($response) = $this->patchTrustProfileWithHttpInfo($investor_profile_id, $investor_profiles_trusts, $contentType);
        return $response;
    }

    /**
     * Operation patchTrustProfileWithHttpInfo
     *
     * Patch a trust investor profile
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesTrusts $investor_profiles_trusts (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchTrustProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorProfileId, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchTrustProfileWithHttpInfo($investor_profile_id, $investor_profiles_trusts, string $contentType = self::contentTypes['patchTrustProfile'][0])
    {
        $request = $this->patchTrustProfileRequest($investor_profile_id, $investor_profiles_trusts, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\DealMaker\Model\V1EntitiesInvestorProfileId' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorProfileId' !== 'string') {
                            try {
                                $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                            } catch (\JsonException $exception) {
                                throw new ApiException(
                                    sprintf(
                                        'Error JSON decoding server response (%s)',
                                        $request->getUri()
                                    ),
                                    $statusCode,
                                    $response->getHeaders(),
                                    $content
                                );
                            }
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorProfileId', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    try {
                        $content = json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                    } catch (\JsonException $exception) {
                        throw new ApiException(
                            sprintf(
                                'Error JSON decoding server response (%s)',
                                $request->getUri()
                            ),
                            $statusCode,
                            $response->getHeaders(),
                            $content
                        );
                    }
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesInvestorProfileId',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation patchTrustProfileAsync
     *
     * Patch a trust investor profile
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesTrusts $investor_profiles_trusts (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchTrustProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchTrustProfileAsync($investor_profile_id, $investor_profiles_trusts, string $contentType = self::contentTypes['patchTrustProfile'][0])
    {
        return $this->patchTrustProfileAsyncWithHttpInfo($investor_profile_id, $investor_profiles_trusts, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchTrustProfileAsyncWithHttpInfo
     *
     * Patch a trust investor profile
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesTrusts $investor_profiles_trusts (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchTrustProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchTrustProfileAsyncWithHttpInfo($investor_profile_id, $investor_profiles_trusts, string $contentType = self::contentTypes['patchTrustProfile'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorProfileId';
        $request = $this->patchTrustProfileRequest($investor_profile_id, $investor_profiles_trusts, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'patchTrustProfile'
     *
     * @param  int $investor_profile_id (required)
     * @param  \DealMaker\Model\PatchInvestorProfilesTrusts $investor_profiles_trusts (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchTrustProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function patchTrustProfileRequest($investor_profile_id, $investor_profiles_trusts, string $contentType = self::contentTypes['patchTrustProfile'][0])
    {

        // verify the required parameter 'investor_profile_id' is set
        if ($investor_profile_id === null || (is_array($investor_profile_id) && count($investor_profile_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profile_id when calling patchTrustProfile'
            );
        }

        // verify the required parameter 'investor_profiles_trusts' is set
        if ($investor_profiles_trusts === null || (is_array($investor_profiles_trusts) && count($investor_profiles_trusts) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_profiles_trusts when calling patchTrustProfile'
            );
        }


        $resourcePath = '/investor_profiles/trusts/{investor_profile_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($investor_profile_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_profile_id' . '}',
                ObjectSerializer::toPathValue($investor_profile_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($investor_profiles_trusts)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($investor_profiles_trusts));
            } else {
                $httpBody = $investor_profiles_trusts;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
