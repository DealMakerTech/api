<?php
/**
 * InvestorApi
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
 * InvestorApi Class Doc Comment
 *
 * @category Class
 * @package  DealMaker
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class InvestorApi
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
        'add506cDocument' => [
            'application/json',
        ],
        'addDocument' => [
            'application/json',
        ],
        'bulkUploadInvestors' => [
            'application/json',
        ],
        'createInvestor' => [
            'application/json',
        ],
        'deleteDocument' => [
            'application/json',
        ],
        'deleteInvestorProfile' => [
            'application/json',
        ],
        'editInvestorTags' => [
            'application/json',
        ],
        'getEnforcements' => [
            'application/json',
        ],
        'getIncentivePlan' => [
            'application/json',
        ],
        'getInvestor' => [
            'application/json',
        ],
        'getInvestorOtpLink' => [
            'application/json',
        ],
        'listInvestors' => [
            'application/json',
        ],
        'patchInvestor' => [
            'application/json',
        ],
        'runBackgroundSearch' => [
            'application/json',
        ],
        'updateInvestor' => [
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
     * Operation add506cDocument
     *
     * Add 506c document for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\Add506cDocumentRequest $add506c_document_request add506c_document_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['add506cDocument'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestor
     */
    public function add506cDocument($id, $investor_id, $add506c_document_request, string $contentType = self::contentTypes['add506cDocument'][0])
    {
        list($response) = $this->add506cDocumentWithHttpInfo($id, $investor_id, $add506c_document_request, $contentType);
        return $response;
    }

    /**
     * Operation add506cDocumentWithHttpInfo
     *
     * Add 506c document for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\Add506cDocumentRequest $add506c_document_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['add506cDocument'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestor, HTTP status code, HTTP response headers (array of strings)
     */
    public function add506cDocumentWithHttpInfo($id, $investor_id, $add506c_document_request, string $contentType = self::contentTypes['add506cDocument'][0])
    {
        $request = $this->add506cDocumentRequest($id, $investor_id, $add506c_document_request, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesInvestor' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestor' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestor', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestor';
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
                        '\DealMaker\Model\V1EntitiesInvestor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation add506cDocumentAsync
     *
     * Add 506c document for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\Add506cDocumentRequest $add506c_document_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['add506cDocument'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function add506cDocumentAsync($id, $investor_id, $add506c_document_request, string $contentType = self::contentTypes['add506cDocument'][0])
    {
        return $this->add506cDocumentAsyncWithHttpInfo($id, $investor_id, $add506c_document_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation add506cDocumentAsyncWithHttpInfo
     *
     * Add 506c document for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\Add506cDocumentRequest $add506c_document_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['add506cDocument'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function add506cDocumentAsyncWithHttpInfo($id, $investor_id, $add506c_document_request, string $contentType = self::contentTypes['add506cDocument'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestor';
        $request = $this->add506cDocumentRequest($id, $investor_id, $add506c_document_request, $contentType);

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
     * Create request for operation 'add506cDocument'
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\Add506cDocumentRequest $add506c_document_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['add506cDocument'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function add506cDocumentRequest($id, $investor_id, $add506c_document_request, string $contentType = self::contentTypes['add506cDocument'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling add506cDocument'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling add506cDocument'
            );
        }

        // verify the required parameter 'add506c_document_request' is set
        if ($add506c_document_request === null || (is_array($add506c_document_request) && count($add506c_document_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $add506c_document_request when calling add506cDocument'
            );
        }


        $resourcePath = '/deals/{id}/investors/{investor_id}/add_506c_document';
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
        // path params
        if ($investor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_id' . '}',
                ObjectSerializer::toPathValue($investor_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($add506c_document_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($add506c_document_request));
            } else {
                $httpBody = $add506c_document_request;
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
     * Operation addDocument
     *
     * Add document for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\AddDocumentRequest $add_document_request add_document_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addDocument'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestor
     */
    public function addDocument($id, $investor_id, $add_document_request, string $contentType = self::contentTypes['addDocument'][0])
    {
        list($response) = $this->addDocumentWithHttpInfo($id, $investor_id, $add_document_request, $contentType);
        return $response;
    }

    /**
     * Operation addDocumentWithHttpInfo
     *
     * Add document for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\AddDocumentRequest $add_document_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addDocument'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestor, HTTP status code, HTTP response headers (array of strings)
     */
    public function addDocumentWithHttpInfo($id, $investor_id, $add_document_request, string $contentType = self::contentTypes['addDocument'][0])
    {
        $request = $this->addDocumentRequest($id, $investor_id, $add_document_request, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesInvestor' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestor' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestor', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestor';
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
                        '\DealMaker\Model\V1EntitiesInvestor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation addDocumentAsync
     *
     * Add document for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\AddDocumentRequest $add_document_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addDocument'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addDocumentAsync($id, $investor_id, $add_document_request, string $contentType = self::contentTypes['addDocument'][0])
    {
        return $this->addDocumentAsyncWithHttpInfo($id, $investor_id, $add_document_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation addDocumentAsyncWithHttpInfo
     *
     * Add document for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\AddDocumentRequest $add_document_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addDocument'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function addDocumentAsyncWithHttpInfo($id, $investor_id, $add_document_request, string $contentType = self::contentTypes['addDocument'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestor';
        $request = $this->addDocumentRequest($id, $investor_id, $add_document_request, $contentType);

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
     * Create request for operation 'addDocument'
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\AddDocumentRequest $add_document_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['addDocument'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function addDocumentRequest($id, $investor_id, $add_document_request, string $contentType = self::contentTypes['addDocument'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling addDocument'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling addDocument'
            );
        }

        // verify the required parameter 'add_document_request' is set
        if ($add_document_request === null || (is_array($add_document_request) && count($add_document_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $add_document_request when calling addDocument'
            );
        }


        $resourcePath = '/deals/{id}/investors/{investor_id}/add_document';
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
        // path params
        if ($investor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_id' . '}',
                ObjectSerializer::toPathValue($investor_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($add_document_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($add_document_request));
            } else {
                $httpBody = $add_document_request;
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
     * Operation bulkUploadInvestors
     *
     * Bulk upload investors for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  \DealMaker\Model\BulkUploadInvestorsRequest $bulk_upload_investors_request bulk_upload_investors_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['bulkUploadInvestors'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestor
     */
    public function bulkUploadInvestors($id, $bulk_upload_investors_request, string $contentType = self::contentTypes['bulkUploadInvestors'][0])
    {
        list($response) = $this->bulkUploadInvestorsWithHttpInfo($id, $bulk_upload_investors_request, $contentType);
        return $response;
    }

    /**
     * Operation bulkUploadInvestorsWithHttpInfo
     *
     * Bulk upload investors for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  \DealMaker\Model\BulkUploadInvestorsRequest $bulk_upload_investors_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['bulkUploadInvestors'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestor, HTTP status code, HTTP response headers (array of strings)
     */
    public function bulkUploadInvestorsWithHttpInfo($id, $bulk_upload_investors_request, string $contentType = self::contentTypes['bulkUploadInvestors'][0])
    {
        $request = $this->bulkUploadInvestorsRequest($id, $bulk_upload_investors_request, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesInvestor' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestor' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestor', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestor';
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
                        '\DealMaker\Model\V1EntitiesInvestor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation bulkUploadInvestorsAsync
     *
     * Bulk upload investors for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  \DealMaker\Model\BulkUploadInvestorsRequest $bulk_upload_investors_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['bulkUploadInvestors'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bulkUploadInvestorsAsync($id, $bulk_upload_investors_request, string $contentType = self::contentTypes['bulkUploadInvestors'][0])
    {
        return $this->bulkUploadInvestorsAsyncWithHttpInfo($id, $bulk_upload_investors_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation bulkUploadInvestorsAsyncWithHttpInfo
     *
     * Bulk upload investors for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  \DealMaker\Model\BulkUploadInvestorsRequest $bulk_upload_investors_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['bulkUploadInvestors'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bulkUploadInvestorsAsyncWithHttpInfo($id, $bulk_upload_investors_request, string $contentType = self::contentTypes['bulkUploadInvestors'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestor';
        $request = $this->bulkUploadInvestorsRequest($id, $bulk_upload_investors_request, $contentType);

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
     * Create request for operation 'bulkUploadInvestors'
     *
     * @param  int $id The deal id. (required)
     * @param  \DealMaker\Model\BulkUploadInvestorsRequest $bulk_upload_investors_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['bulkUploadInvestors'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function bulkUploadInvestorsRequest($id, $bulk_upload_investors_request, string $contentType = self::contentTypes['bulkUploadInvestors'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling bulkUploadInvestors'
            );
        }

        // verify the required parameter 'bulk_upload_investors_request' is set
        if ($bulk_upload_investors_request === null || (is_array($bulk_upload_investors_request) && count($bulk_upload_investors_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $bulk_upload_investors_request when calling bulkUploadInvestors'
            );
        }


        $resourcePath = '/deals/{id}/investors/bulk_upload';
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
        if (isset($bulk_upload_investors_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($bulk_upload_investors_request));
            } else {
                $httpBody = $bulk_upload_investors_request;
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
     * Operation createInvestor
     *
     * Create a deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  \DealMaker\Model\PostDealsIdInvestors $deals_id_investors deals_id_investors (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createInvestor'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestor
     */
    public function createInvestor($id, $deals_id_investors, string $contentType = self::contentTypes['createInvestor'][0])
    {
        list($response) = $this->createInvestorWithHttpInfo($id, $deals_id_investors, $contentType);
        return $response;
    }

    /**
     * Operation createInvestorWithHttpInfo
     *
     * Create a deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  \DealMaker\Model\PostDealsIdInvestors $deals_id_investors (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createInvestor'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestor, HTTP status code, HTTP response headers (array of strings)
     */
    public function createInvestorWithHttpInfo($id, $deals_id_investors, string $contentType = self::contentTypes['createInvestor'][0])
    {
        $request = $this->createInvestorRequest($id, $deals_id_investors, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesInvestor' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestor' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestor', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestor';
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
                        '\DealMaker\Model\V1EntitiesInvestor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createInvestorAsync
     *
     * Create a deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  \DealMaker\Model\PostDealsIdInvestors $deals_id_investors (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createInvestor'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createInvestorAsync($id, $deals_id_investors, string $contentType = self::contentTypes['createInvestor'][0])
    {
        return $this->createInvestorAsyncWithHttpInfo($id, $deals_id_investors, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createInvestorAsyncWithHttpInfo
     *
     * Create a deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  \DealMaker\Model\PostDealsIdInvestors $deals_id_investors (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createInvestor'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createInvestorAsyncWithHttpInfo($id, $deals_id_investors, string $contentType = self::contentTypes['createInvestor'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestor';
        $request = $this->createInvestorRequest($id, $deals_id_investors, $contentType);

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
     * Create request for operation 'createInvestor'
     *
     * @param  int $id The deal id. (required)
     * @param  \DealMaker\Model\PostDealsIdInvestors $deals_id_investors (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createInvestor'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createInvestorRequest($id, $deals_id_investors, string $contentType = self::contentTypes['createInvestor'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling createInvestor'
            );
        }

        // verify the required parameter 'deals_id_investors' is set
        if ($deals_id_investors === null || (is_array($deals_id_investors) && count($deals_id_investors) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $deals_id_investors when calling createInvestor'
            );
        }


        $resourcePath = '/deals/{id}/investors';
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
        if (isset($deals_id_investors)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($deals_id_investors));
            } else {
                $httpBody = $deals_id_investors;
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
     * Operation deleteDocument
     *
     * Delete document for deal investor
     *
     * @param  int $id id (required)
     * @param  int $investor_id investor_id (required)
     * @param  int $document_id document_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteDocument'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteDocument($id, $investor_id, $document_id, string $contentType = self::contentTypes['deleteDocument'][0])
    {
        $this->deleteDocumentWithHttpInfo($id, $investor_id, $document_id, $contentType);
    }

    /**
     * Operation deleteDocumentWithHttpInfo
     *
     * Delete document for deal investor
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  int $document_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteDocument'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteDocumentWithHttpInfo($id, $investor_id, $document_id, string $contentType = self::contentTypes['deleteDocument'][0])
    {
        $request = $this->deleteDocumentRequest($id, $investor_id, $document_id, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation deleteDocumentAsync
     *
     * Delete document for deal investor
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  int $document_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteDocument'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteDocumentAsync($id, $investor_id, $document_id, string $contentType = self::contentTypes['deleteDocument'][0])
    {
        return $this->deleteDocumentAsyncWithHttpInfo($id, $investor_id, $document_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteDocumentAsyncWithHttpInfo
     *
     * Delete document for deal investor
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  int $document_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteDocument'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteDocumentAsyncWithHttpInfo($id, $investor_id, $document_id, string $contentType = self::contentTypes['deleteDocument'][0])
    {
        $returnType = '';
        $request = $this->deleteDocumentRequest($id, $investor_id, $document_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'deleteDocument'
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  int $document_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteDocument'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteDocumentRequest($id, $investor_id, $document_id, string $contentType = self::contentTypes['deleteDocument'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling deleteDocument'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling deleteDocument'
            );
        }

        // verify the required parameter 'document_id' is set
        if ($document_id === null || (is_array($document_id) && count($document_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $document_id when calling deleteDocument'
            );
        }


        $resourcePath = '/deals/{id}/investors/{investor_id}/delete_document/{document_id}';
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
        // path params
        if ($investor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_id' . '}',
                ObjectSerializer::toPathValue($investor_id),
                $resourcePath
            );
        }
        // path params
        if ($document_id !== null) {
            $resourcePath = str_replace(
                '{' . 'document_id' . '}',
                ObjectSerializer::toPathValue($document_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            [],
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
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteInvestorProfile
     *
     * Delete investor profile.
     *
     * @param  int $type type (required)
     * @param  int $id id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteInvestorProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteInvestorProfile($type, $id, string $contentType = self::contentTypes['deleteInvestorProfile'][0])
    {
        $this->deleteInvestorProfileWithHttpInfo($type, $id, $contentType);
    }

    /**
     * Operation deleteInvestorProfileWithHttpInfo
     *
     * Delete investor profile.
     *
     * @param  int $type (required)
     * @param  int $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteInvestorProfile'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteInvestorProfileWithHttpInfo($type, $id, string $contentType = self::contentTypes['deleteInvestorProfile'][0])
    {
        $request = $this->deleteInvestorProfileRequest($type, $id, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation deleteInvestorProfileAsync
     *
     * Delete investor profile.
     *
     * @param  int $type (required)
     * @param  int $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteInvestorProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteInvestorProfileAsync($type, $id, string $contentType = self::contentTypes['deleteInvestorProfile'][0])
    {
        return $this->deleteInvestorProfileAsyncWithHttpInfo($type, $id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteInvestorProfileAsyncWithHttpInfo
     *
     * Delete investor profile.
     *
     * @param  int $type (required)
     * @param  int $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteInvestorProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteInvestorProfileAsyncWithHttpInfo($type, $id, string $contentType = self::contentTypes['deleteInvestorProfile'][0])
    {
        $returnType = '';
        $request = $this->deleteInvestorProfileRequest($type, $id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'deleteInvestorProfile'
     *
     * @param  int $type (required)
     * @param  int $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['deleteInvestorProfile'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function deleteInvestorProfileRequest($type, $id, string $contentType = self::contentTypes['deleteInvestorProfile'][0])
    {

        // verify the required parameter 'type' is set
        if ($type === null || (is_array($type) && count($type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $type when calling deleteInvestorProfile'
            );
        }

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling deleteInvestorProfile'
            );
        }


        $resourcePath = '/investor_profiles/{type}/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($type !== null) {
            $resourcePath = str_replace(
                '{' . 'type' . '}',
                ObjectSerializer::toPathValue($type),
                $resourcePath
            );
        }
        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            [],
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
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation editInvestorTags
     *
     * Append or replace tag(s) for a specific investor
     *
     * @param  int $id id (required)
     * @param  int $investor_id investor_id (required)
     * @param  \DealMaker\Model\EditInvestorTagsRequest $edit_investor_tags_request edit_investor_tags_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['editInvestorTags'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestor
     */
    public function editInvestorTags($id, $investor_id, $edit_investor_tags_request, string $contentType = self::contentTypes['editInvestorTags'][0])
    {
        list($response) = $this->editInvestorTagsWithHttpInfo($id, $investor_id, $edit_investor_tags_request, $contentType);
        return $response;
    }

    /**
     * Operation editInvestorTagsWithHttpInfo
     *
     * Append or replace tag(s) for a specific investor
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  \DealMaker\Model\EditInvestorTagsRequest $edit_investor_tags_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['editInvestorTags'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestor, HTTP status code, HTTP response headers (array of strings)
     */
    public function editInvestorTagsWithHttpInfo($id, $investor_id, $edit_investor_tags_request, string $contentType = self::contentTypes['editInvestorTags'][0])
    {
        $request = $this->editInvestorTagsRequest($id, $investor_id, $edit_investor_tags_request, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesInvestor' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestor' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestor', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestor';
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
                        '\DealMaker\Model\V1EntitiesInvestor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation editInvestorTagsAsync
     *
     * Append or replace tag(s) for a specific investor
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  \DealMaker\Model\EditInvestorTagsRequest $edit_investor_tags_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['editInvestorTags'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function editInvestorTagsAsync($id, $investor_id, $edit_investor_tags_request, string $contentType = self::contentTypes['editInvestorTags'][0])
    {
        return $this->editInvestorTagsAsyncWithHttpInfo($id, $investor_id, $edit_investor_tags_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation editInvestorTagsAsyncWithHttpInfo
     *
     * Append or replace tag(s) for a specific investor
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  \DealMaker\Model\EditInvestorTagsRequest $edit_investor_tags_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['editInvestorTags'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function editInvestorTagsAsyncWithHttpInfo($id, $investor_id, $edit_investor_tags_request, string $contentType = self::contentTypes['editInvestorTags'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestor';
        $request = $this->editInvestorTagsRequest($id, $investor_id, $edit_investor_tags_request, $contentType);

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
     * Create request for operation 'editInvestorTags'
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  \DealMaker\Model\EditInvestorTagsRequest $edit_investor_tags_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['editInvestorTags'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function editInvestorTagsRequest($id, $investor_id, $edit_investor_tags_request, string $contentType = self::contentTypes['editInvestorTags'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling editInvestorTags'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling editInvestorTags'
            );
        }

        // verify the required parameter 'edit_investor_tags_request' is set
        if ($edit_investor_tags_request === null || (is_array($edit_investor_tags_request) && count($edit_investor_tags_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $edit_investor_tags_request when calling editInvestorTags'
            );
        }


        $resourcePath = '/deals/{id}/investors/{investor_id}/edit_tags';
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
        // path params
        if ($investor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_id' . '}',
                ObjectSerializer::toPathValue($investor_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($edit_investor_tags_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($edit_investor_tags_request));
            } else {
                $httpBody = $edit_investor_tags_request;
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
     * Operation getEnforcements
     *
     * Get enforcements for a background search
     *
     * @param  int $id id (required)
     * @param  int $investor_id investor_id (required)
     * @param  int $search_entity_id search_entity_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getEnforcements'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestor
     */
    public function getEnforcements($id, $investor_id, $search_entity_id, string $contentType = self::contentTypes['getEnforcements'][0])
    {
        list($response) = $this->getEnforcementsWithHttpInfo($id, $investor_id, $search_entity_id, $contentType);
        return $response;
    }

    /**
     * Operation getEnforcementsWithHttpInfo
     *
     * Get enforcements for a background search
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  int $search_entity_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getEnforcements'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestor, HTTP status code, HTTP response headers (array of strings)
     */
    public function getEnforcementsWithHttpInfo($id, $investor_id, $search_entity_id, string $contentType = self::contentTypes['getEnforcements'][0])
    {
        $request = $this->getEnforcementsRequest($id, $investor_id, $search_entity_id, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesInvestor' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestor' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestor', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestor';
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
                        '\DealMaker\Model\V1EntitiesInvestor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getEnforcementsAsync
     *
     * Get enforcements for a background search
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  int $search_entity_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getEnforcements'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getEnforcementsAsync($id, $investor_id, $search_entity_id, string $contentType = self::contentTypes['getEnforcements'][0])
    {
        return $this->getEnforcementsAsyncWithHttpInfo($id, $investor_id, $search_entity_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getEnforcementsAsyncWithHttpInfo
     *
     * Get enforcements for a background search
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  int $search_entity_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getEnforcements'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getEnforcementsAsyncWithHttpInfo($id, $investor_id, $search_entity_id, string $contentType = self::contentTypes['getEnforcements'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestor';
        $request = $this->getEnforcementsRequest($id, $investor_id, $search_entity_id, $contentType);

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
     * Create request for operation 'getEnforcements'
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  int $search_entity_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getEnforcements'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getEnforcementsRequest($id, $investor_id, $search_entity_id, string $contentType = self::contentTypes['getEnforcements'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getEnforcements'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling getEnforcements'
            );
        }

        // verify the required parameter 'search_entity_id' is set
        if ($search_entity_id === null || (is_array($search_entity_id) && count($search_entity_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $search_entity_id when calling getEnforcements'
            );
        }


        $resourcePath = '/deals/{id}/investors/{investor_id}/background_checks/{search_entity_id}/enforcements';
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
        // path params
        if ($investor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_id' . '}',
                ObjectSerializer::toPathValue($investor_id),
                $resourcePath
            );
        }
        // path params
        if ($search_entity_id !== null) {
            $resourcePath = str_replace(
                '{' . 'search_entity_id' . '}',
                ObjectSerializer::toPathValue($search_entity_id),
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
     * Operation getIncentivePlan
     *
     * Get investor incentive plan by investor id
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getIncentivePlan'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesDealsPriceDetails
     */
    public function getIncentivePlan($id, $investor_id, string $contentType = self::contentTypes['getIncentivePlan'][0])
    {
        list($response) = $this->getIncentivePlanWithHttpInfo($id, $investor_id, $contentType);
        return $response;
    }

    /**
     * Operation getIncentivePlanWithHttpInfo
     *
     * Get investor incentive plan by investor id
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getIncentivePlan'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesDealsPriceDetails, HTTP status code, HTTP response headers (array of strings)
     */
    public function getIncentivePlanWithHttpInfo($id, $investor_id, string $contentType = self::contentTypes['getIncentivePlan'][0])
    {
        $request = $this->getIncentivePlanRequest($id, $investor_id, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesDealsPriceDetails' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesDealsPriceDetails' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesDealsPriceDetails', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesDealsPriceDetails';
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
                        '\DealMaker\Model\V1EntitiesDealsPriceDetails',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getIncentivePlanAsync
     *
     * Get investor incentive plan by investor id
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getIncentivePlan'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getIncentivePlanAsync($id, $investor_id, string $contentType = self::contentTypes['getIncentivePlan'][0])
    {
        return $this->getIncentivePlanAsyncWithHttpInfo($id, $investor_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getIncentivePlanAsyncWithHttpInfo
     *
     * Get investor incentive plan by investor id
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getIncentivePlan'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getIncentivePlanAsyncWithHttpInfo($id, $investor_id, string $contentType = self::contentTypes['getIncentivePlan'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesDealsPriceDetails';
        $request = $this->getIncentivePlanRequest($id, $investor_id, $contentType);

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
     * Create request for operation 'getIncentivePlan'
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getIncentivePlan'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getIncentivePlanRequest($id, $investor_id, string $contentType = self::contentTypes['getIncentivePlan'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getIncentivePlan'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling getIncentivePlan'
            );
        }


        $resourcePath = '/deals/{id}/investors/{investor_id}/incentive_plan';
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
        // path params
        if ($investor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_id' . '}',
                ObjectSerializer::toPathValue($investor_id),
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
     * Operation getInvestor
     *
     * Get a deal investor by id
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestor'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestor
     */
    public function getInvestor($id, $investor_id, string $contentType = self::contentTypes['getInvestor'][0])
    {
        list($response) = $this->getInvestorWithHttpInfo($id, $investor_id, $contentType);
        return $response;
    }

    /**
     * Operation getInvestorWithHttpInfo
     *
     * Get a deal investor by id
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestor'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestor, HTTP status code, HTTP response headers (array of strings)
     */
    public function getInvestorWithHttpInfo($id, $investor_id, string $contentType = self::contentTypes['getInvestor'][0])
    {
        $request = $this->getInvestorRequest($id, $investor_id, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesInvestor' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestor' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestor', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestor';
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
                        '\DealMaker\Model\V1EntitiesInvestor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getInvestorAsync
     *
     * Get a deal investor by id
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestor'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInvestorAsync($id, $investor_id, string $contentType = self::contentTypes['getInvestor'][0])
    {
        return $this->getInvestorAsyncWithHttpInfo($id, $investor_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getInvestorAsyncWithHttpInfo
     *
     * Get a deal investor by id
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestor'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInvestorAsyncWithHttpInfo($id, $investor_id, string $contentType = self::contentTypes['getInvestor'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestor';
        $request = $this->getInvestorRequest($id, $investor_id, $contentType);

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
     * Create request for operation 'getInvestor'
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestor'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getInvestorRequest($id, $investor_id, string $contentType = self::contentTypes['getInvestor'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getInvestor'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling getInvestor'
            );
        }


        $resourcePath = '/deals/{id}/investors/{investor_id}';
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
        // path params
        if ($investor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_id' . '}',
                ObjectSerializer::toPathValue($investor_id),
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
     * Operation getInvestorOtpLink
     *
     * Get OTP access link for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorOtpLink'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestorOtpAccessLink
     */
    public function getInvestorOtpLink($id, $investor_id, string $contentType = self::contentTypes['getInvestorOtpLink'][0])
    {
        list($response) = $this->getInvestorOtpLinkWithHttpInfo($id, $investor_id, $contentType);
        return $response;
    }

    /**
     * Operation getInvestorOtpLinkWithHttpInfo
     *
     * Get OTP access link for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorOtpLink'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestorOtpAccessLink, HTTP status code, HTTP response headers (array of strings)
     */
    public function getInvestorOtpLinkWithHttpInfo($id, $investor_id, string $contentType = self::contentTypes['getInvestorOtpLink'][0])
    {
        $request = $this->getInvestorOtpLinkRequest($id, $investor_id, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesInvestorOtpAccessLink' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestorOtpAccessLink' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestorOtpAccessLink', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestorOtpAccessLink';
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
                        '\DealMaker\Model\V1EntitiesInvestorOtpAccessLink',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getInvestorOtpLinkAsync
     *
     * Get OTP access link for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorOtpLink'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInvestorOtpLinkAsync($id, $investor_id, string $contentType = self::contentTypes['getInvestorOtpLink'][0])
    {
        return $this->getInvestorOtpLinkAsyncWithHttpInfo($id, $investor_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getInvestorOtpLinkAsyncWithHttpInfo
     *
     * Get OTP access link for deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorOtpLink'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getInvestorOtpLinkAsyncWithHttpInfo($id, $investor_id, string $contentType = self::contentTypes['getInvestorOtpLink'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestorOtpAccessLink';
        $request = $this->getInvestorOtpLinkRequest($id, $investor_id, $contentType);

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
     * Create request for operation 'getInvestorOtpLink'
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getInvestorOtpLink'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getInvestorOtpLinkRequest($id, $investor_id, string $contentType = self::contentTypes['getInvestorOtpLink'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getInvestorOtpLink'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling getInvestorOtpLink'
            );
        }


        $resourcePath = '/deals/{id}/investors/{investor_id}/otp_access_link';
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
        // path params
        if ($investor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_id' . '}',
                ObjectSerializer::toPathValue($investor_id),
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
     * Operation listInvestors
     *
     * List deal investors
     *
     * @param  int $id The deal id. (required)
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  int[] $investor_ids An array of investor ids. (optional)
     * @param  string $q The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listInvestors'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestors
     */
    public function listInvestors($id, $page = 1, $per_page = 25, $offset = 0, $investor_ids = null, $q = null, string $contentType = self::contentTypes['listInvestors'][0])
    {
        list($response) = $this->listInvestorsWithHttpInfo($id, $page, $per_page, $offset, $investor_ids, $q, $contentType);
        return $response;
    }

    /**
     * Operation listInvestorsWithHttpInfo
     *
     * List deal investors
     *
     * @param  int $id The deal id. (required)
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  int[] $investor_ids An array of investor ids. (optional)
     * @param  string $q The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listInvestors'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestors, HTTP status code, HTTP response headers (array of strings)
     */
    public function listInvestorsWithHttpInfo($id, $page = 1, $per_page = 25, $offset = 0, $investor_ids = null, $q = null, string $contentType = self::contentTypes['listInvestors'][0])
    {
        $request = $this->listInvestorsRequest($id, $page, $per_page, $offset, $investor_ids, $q, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesInvestors' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestors' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestors', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestors';
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
                        '\DealMaker\Model\V1EntitiesInvestors',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listInvestorsAsync
     *
     * List deal investors
     *
     * @param  int $id The deal id. (required)
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  int[] $investor_ids An array of investor ids. (optional)
     * @param  string $q The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listInvestors'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listInvestorsAsync($id, $page = 1, $per_page = 25, $offset = 0, $investor_ids = null, $q = null, string $contentType = self::contentTypes['listInvestors'][0])
    {
        return $this->listInvestorsAsyncWithHttpInfo($id, $page, $per_page, $offset, $investor_ids, $q, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listInvestorsAsyncWithHttpInfo
     *
     * List deal investors
     *
     * @param  int $id The deal id. (required)
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  int[] $investor_ids An array of investor ids. (optional)
     * @param  string $q The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listInvestors'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listInvestorsAsyncWithHttpInfo($id, $page = 1, $per_page = 25, $offset = 0, $investor_ids = null, $q = null, string $contentType = self::contentTypes['listInvestors'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestors';
        $request = $this->listInvestorsRequest($id, $page, $per_page, $offset, $investor_ids, $q, $contentType);

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
     * Create request for operation 'listInvestors'
     *
     * @param  int $id The deal id. (required)
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  int[] $investor_ids An array of investor ids. (optional)
     * @param  string $q The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering) (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listInvestors'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listInvestorsRequest($id, $page = 1, $per_page = 25, $offset = 0, $investor_ids = null, $q = null, string $contentType = self::contentTypes['listInvestors'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling listInvestors'
            );
        }







        $resourcePath = '/deals/{id}/investors';
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
            $investor_ids,
            'investor_ids', // param base name
            'array', // openApiType
            'form', // style
            false, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $q,
            'q', // param base name
            'string', // openApiType
            '', // style
            false, // explode
            false // required
        ) ?? []);


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
     * Operation patchInvestor
     *
     * Patch a deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\PatchInvestorRequest $patch_investor_request patch_investor_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchInvestor'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestor
     */
    public function patchInvestor($id, $investor_id, $patch_investor_request, string $contentType = self::contentTypes['patchInvestor'][0])
    {
        list($response) = $this->patchInvestorWithHttpInfo($id, $investor_id, $patch_investor_request, $contentType);
        return $response;
    }

    /**
     * Operation patchInvestorWithHttpInfo
     *
     * Patch a deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\PatchInvestorRequest $patch_investor_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchInvestor'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestor, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchInvestorWithHttpInfo($id, $investor_id, $patch_investor_request, string $contentType = self::contentTypes['patchInvestor'][0])
    {
        $request = $this->patchInvestorRequest($id, $investor_id, $patch_investor_request, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesInvestor' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestor' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestor', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestor';
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
                        '\DealMaker\Model\V1EntitiesInvestor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation patchInvestorAsync
     *
     * Patch a deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\PatchInvestorRequest $patch_investor_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchInvestor'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchInvestorAsync($id, $investor_id, $patch_investor_request, string $contentType = self::contentTypes['patchInvestor'][0])
    {
        return $this->patchInvestorAsyncWithHttpInfo($id, $investor_id, $patch_investor_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchInvestorAsyncWithHttpInfo
     *
     * Patch a deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\PatchInvestorRequest $patch_investor_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchInvestor'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchInvestorAsyncWithHttpInfo($id, $investor_id, $patch_investor_request, string $contentType = self::contentTypes['patchInvestor'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestor';
        $request = $this->patchInvestorRequest($id, $investor_id, $patch_investor_request, $contentType);

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
     * Create request for operation 'patchInvestor'
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\PatchInvestorRequest $patch_investor_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchInvestor'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function patchInvestorRequest($id, $investor_id, $patch_investor_request, string $contentType = self::contentTypes['patchInvestor'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling patchInvestor'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling patchInvestor'
            );
        }

        // verify the required parameter 'patch_investor_request' is set
        if ($patch_investor_request === null || (is_array($patch_investor_request) && count($patch_investor_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $patch_investor_request when calling patchInvestor'
            );
        }


        $resourcePath = '/deals/{id}/investors/{investor_id}';
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
        // path params
        if ($investor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_id' . '}',
                ObjectSerializer::toPathValue($investor_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($patch_investor_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($patch_investor_request));
            } else {
                $httpBody = $patch_investor_request;
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
     * Operation runBackgroundSearch
     *
     * Run Alloy background search for the investor
     *
     * @param  int $id id (required)
     * @param  int $investor_id investor_id (required)
     * @param  \DealMaker\Model\RunBackgroundSearchRequest $run_background_search_request run_background_search_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['runBackgroundSearch'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestor
     */
    public function runBackgroundSearch($id, $investor_id, $run_background_search_request, string $contentType = self::contentTypes['runBackgroundSearch'][0])
    {
        list($response) = $this->runBackgroundSearchWithHttpInfo($id, $investor_id, $run_background_search_request, $contentType);
        return $response;
    }

    /**
     * Operation runBackgroundSearchWithHttpInfo
     *
     * Run Alloy background search for the investor
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  \DealMaker\Model\RunBackgroundSearchRequest $run_background_search_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['runBackgroundSearch'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestor, HTTP status code, HTTP response headers (array of strings)
     */
    public function runBackgroundSearchWithHttpInfo($id, $investor_id, $run_background_search_request, string $contentType = self::contentTypes['runBackgroundSearch'][0])
    {
        $request = $this->runBackgroundSearchRequest($id, $investor_id, $run_background_search_request, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesInvestor' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestor' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestor', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestor';
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
                        '\DealMaker\Model\V1EntitiesInvestor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation runBackgroundSearchAsync
     *
     * Run Alloy background search for the investor
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  \DealMaker\Model\RunBackgroundSearchRequest $run_background_search_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['runBackgroundSearch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function runBackgroundSearchAsync($id, $investor_id, $run_background_search_request, string $contentType = self::contentTypes['runBackgroundSearch'][0])
    {
        return $this->runBackgroundSearchAsyncWithHttpInfo($id, $investor_id, $run_background_search_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation runBackgroundSearchAsyncWithHttpInfo
     *
     * Run Alloy background search for the investor
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  \DealMaker\Model\RunBackgroundSearchRequest $run_background_search_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['runBackgroundSearch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function runBackgroundSearchAsyncWithHttpInfo($id, $investor_id, $run_background_search_request, string $contentType = self::contentTypes['runBackgroundSearch'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestor';
        $request = $this->runBackgroundSearchRequest($id, $investor_id, $run_background_search_request, $contentType);

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
     * Create request for operation 'runBackgroundSearch'
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  \DealMaker\Model\RunBackgroundSearchRequest $run_background_search_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['runBackgroundSearch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function runBackgroundSearchRequest($id, $investor_id, $run_background_search_request, string $contentType = self::contentTypes['runBackgroundSearch'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling runBackgroundSearch'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling runBackgroundSearch'
            );
        }

        // verify the required parameter 'run_background_search_request' is set
        if ($run_background_search_request === null || (is_array($run_background_search_request) && count($run_background_search_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $run_background_search_request when calling runBackgroundSearch'
            );
        }


        $resourcePath = '/deals/{id}/investors/{investor_id}/background_checks/run';
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
        // path params
        if ($investor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_id' . '}',
                ObjectSerializer::toPathValue($investor_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($run_background_search_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($run_background_search_request));
            } else {
                $httpBody = $run_background_search_request;
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
     * Operation updateInvestor
     *
     * Update a deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\PutDealsIdInvestors $deals_id_investors deals_id_investors (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateInvestor'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesInvestor
     */
    public function updateInvestor($id, $investor_id, $deals_id_investors, string $contentType = self::contentTypes['updateInvestor'][0])
    {
        list($response) = $this->updateInvestorWithHttpInfo($id, $investor_id, $deals_id_investors, $contentType);
        return $response;
    }

    /**
     * Operation updateInvestorWithHttpInfo
     *
     * Update a deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\PutDealsIdInvestors $deals_id_investors (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateInvestor'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesInvestor, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateInvestorWithHttpInfo($id, $investor_id, $deals_id_investors, string $contentType = self::contentTypes['updateInvestor'][0])
    {
        $request = $this->updateInvestorRequest($id, $investor_id, $deals_id_investors, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesInvestor' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesInvestor' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesInvestor', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesInvestor';
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
                        '\DealMaker\Model\V1EntitiesInvestor',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateInvestorAsync
     *
     * Update a deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\PutDealsIdInvestors $deals_id_investors (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateInvestor'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateInvestorAsync($id, $investor_id, $deals_id_investors, string $contentType = self::contentTypes['updateInvestor'][0])
    {
        return $this->updateInvestorAsyncWithHttpInfo($id, $investor_id, $deals_id_investors, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateInvestorAsyncWithHttpInfo
     *
     * Update a deal investor
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\PutDealsIdInvestors $deals_id_investors (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateInvestor'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateInvestorAsyncWithHttpInfo($id, $investor_id, $deals_id_investors, string $contentType = self::contentTypes['updateInvestor'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesInvestor';
        $request = $this->updateInvestorRequest($id, $investor_id, $deals_id_investors, $contentType);

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
     * Create request for operation 'updateInvestor'
     *
     * @param  int $id The deal id. (required)
     * @param  int $investor_id The investor id. (required)
     * @param  \DealMaker\Model\PutDealsIdInvestors $deals_id_investors (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['updateInvestor'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function updateInvestorRequest($id, $investor_id, $deals_id_investors, string $contentType = self::contentTypes['updateInvestor'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling updateInvestor'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling updateInvestor'
            );
        }

        // verify the required parameter 'deals_id_investors' is set
        if ($deals_id_investors === null || (is_array($deals_id_investors) && count($deals_id_investors) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $deals_id_investors when calling updateInvestor'
            );
        }


        $resourcePath = '/deals/{id}/investors/{investor_id}';
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
        // path params
        if ($investor_id !== null) {
            $resourcePath = str_replace(
                '{' . 'investor_id' . '}',
                ObjectSerializer::toPathValue($investor_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($deals_id_investors)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($deals_id_investors));
            } else {
                $httpBody = $deals_id_investors;
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
            'PUT',
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
