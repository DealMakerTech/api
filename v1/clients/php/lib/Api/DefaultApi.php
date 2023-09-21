<?php
/**
 * DefaultApi
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
 * OpenAPI Generator version: 7.1.0-SNAPSHOT
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
 * DefaultApi Class Doc Comment
 *
 * @category Class
 * @package  DealMaker
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class DefaultApi
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
        'getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions' => [
            'application/json',
        ],
        'getDealsIdInvestorsPaymentsExpressWireInstructions' => [
            'application/json',
        ],
        'getWebhooks' => [
            'application/json',
        ],
        'getWebhooksDealId' => [
            'application/json',
        ],
        'getWebhooksDealsSearch' => [
            'application/json',
        ],
        'getWebhooksSecurityToken' => [
            'application/json',
        ],
        'postWebhooks' => [
            'application/json',
        ],
        'putWebhooksId' => [
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
     * Operation getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions
     *
     * Displays the express wire instructions for an investor on a deal
     *
     * @param  int $id id (required)
     * @param  int $investor_id investor_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesExpressWireInstruction
     */
    public function getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions($id, $investor_id, string $contentType = self::contentTypes['getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'][0])
    {
        list($response) = $this->getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsWithHttpInfo($id, $investor_id, $contentType);
        return $response;
    }

    /**
     * Operation getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsWithHttpInfo
     *
     * Displays the express wire instructions for an investor on a deal
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesExpressWireInstruction, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsWithHttpInfo($id, $investor_id, string $contentType = self::contentTypes['getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'][0])
    {
        $request = $this->getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsRequest($id, $investor_id, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesExpressWireInstruction' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesExpressWireInstruction' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesExpressWireInstruction', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesExpressWireInstruction';
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

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesExpressWireInstruction',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsAsync
     *
     * Displays the express wire instructions for an investor on a deal
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsAsync($id, $investor_id, string $contentType = self::contentTypes['getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'][0])
    {
        return $this->getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsAsyncWithHttpInfo($id, $investor_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsAsyncWithHttpInfo
     *
     * Displays the express wire instructions for an investor on a deal
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsAsyncWithHttpInfo($id, $investor_id, string $contentType = self::contentTypes['getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesExpressWireInstruction';
        $request = $this->getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsRequest($id, $investor_id, $contentType);

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
     * Create request for operation 'getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'
     *
     * @param  int $id (required)
     * @param  int $investor_id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructionsRequest($id, $investor_id, string $contentType = self::contentTypes['getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions'
            );
        }


        $resourcePath = '/deals/{id}/investors/{investor_id}/payments/express_wire/instructions';
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
     * Operation getDealsIdInvestorsPaymentsExpressWireInstructions
     *
     * Displays the express wire instructions for all the investors on a deal
     *
     * @param  int $id id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealsIdInvestorsPaymentsExpressWireInstructions'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesExpressWireInstructions
     */
    public function getDealsIdInvestorsPaymentsExpressWireInstructions($id, string $contentType = self::contentTypes['getDealsIdInvestorsPaymentsExpressWireInstructions'][0])
    {
        list($response) = $this->getDealsIdInvestorsPaymentsExpressWireInstructionsWithHttpInfo($id, $contentType);
        return $response;
    }

    /**
     * Operation getDealsIdInvestorsPaymentsExpressWireInstructionsWithHttpInfo
     *
     * Displays the express wire instructions for all the investors on a deal
     *
     * @param  int $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealsIdInvestorsPaymentsExpressWireInstructions'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesExpressWireInstructions, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDealsIdInvestorsPaymentsExpressWireInstructionsWithHttpInfo($id, string $contentType = self::contentTypes['getDealsIdInvestorsPaymentsExpressWireInstructions'][0])
    {
        $request = $this->getDealsIdInvestorsPaymentsExpressWireInstructionsRequest($id, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesExpressWireInstructions' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesExpressWireInstructions' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesExpressWireInstructions', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesExpressWireInstructions';
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

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesExpressWireInstructions',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getDealsIdInvestorsPaymentsExpressWireInstructionsAsync
     *
     * Displays the express wire instructions for all the investors on a deal
     *
     * @param  int $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealsIdInvestorsPaymentsExpressWireInstructions'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDealsIdInvestorsPaymentsExpressWireInstructionsAsync($id, string $contentType = self::contentTypes['getDealsIdInvestorsPaymentsExpressWireInstructions'][0])
    {
        return $this->getDealsIdInvestorsPaymentsExpressWireInstructionsAsyncWithHttpInfo($id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDealsIdInvestorsPaymentsExpressWireInstructionsAsyncWithHttpInfo
     *
     * Displays the express wire instructions for all the investors on a deal
     *
     * @param  int $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealsIdInvestorsPaymentsExpressWireInstructions'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDealsIdInvestorsPaymentsExpressWireInstructionsAsyncWithHttpInfo($id, string $contentType = self::contentTypes['getDealsIdInvestorsPaymentsExpressWireInstructions'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesExpressWireInstructions';
        $request = $this->getDealsIdInvestorsPaymentsExpressWireInstructionsRequest($id, $contentType);

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
     * Create request for operation 'getDealsIdInvestorsPaymentsExpressWireInstructions'
     *
     * @param  int $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealsIdInvestorsPaymentsExpressWireInstructions'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getDealsIdInvestorsPaymentsExpressWireInstructionsRequest($id, string $contentType = self::contentTypes['getDealsIdInvestorsPaymentsExpressWireInstructions'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getDealsIdInvestorsPaymentsExpressWireInstructions'
            );
        }


        $resourcePath = '/deals/{id}/investors/payments/express_wire/instructions';
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
     * Operation getWebhooks
     *
     * Returns a list of webhook subscription which is associated to the user
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooks'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesWebhooksSubscription
     */
    public function getWebhooks($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['getWebhooks'][0])
    {
        list($response) = $this->getWebhooksWithHttpInfo($page, $per_page, $offset, $contentType);
        return $response;
    }

    /**
     * Operation getWebhooksWithHttpInfo
     *
     * Returns a list of webhook subscription which is associated to the user
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooks'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesWebhooksSubscription, HTTP status code, HTTP response headers (array of strings)
     */
    public function getWebhooksWithHttpInfo($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['getWebhooks'][0])
    {
        $request = $this->getWebhooksRequest($page, $per_page, $offset, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesWebhooksSubscription' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesWebhooksSubscription' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesWebhooksSubscription', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesWebhooksSubscription';
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

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesWebhooksSubscription',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getWebhooksAsync
     *
     * Returns a list of webhook subscription which is associated to the user
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooks'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getWebhooksAsync($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['getWebhooks'][0])
    {
        return $this->getWebhooksAsyncWithHttpInfo($page, $per_page, $offset, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getWebhooksAsyncWithHttpInfo
     *
     * Returns a list of webhook subscription which is associated to the user
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooks'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getWebhooksAsyncWithHttpInfo($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['getWebhooks'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesWebhooksSubscription';
        $request = $this->getWebhooksRequest($page, $per_page, $offset, $contentType);

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
     * Create request for operation 'getWebhooks'
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooks'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getWebhooksRequest($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['getWebhooks'][0])
    {





        $resourcePath = '/webhooks';
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
     * Operation getWebhooksDealId
     *
     * Finds a deal using the id
     *
     * @param  int $id id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksDealId'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesWebhooksDeal
     */
    public function getWebhooksDealId($id, string $contentType = self::contentTypes['getWebhooksDealId'][0])
    {
        list($response) = $this->getWebhooksDealIdWithHttpInfo($id, $contentType);
        return $response;
    }

    /**
     * Operation getWebhooksDealIdWithHttpInfo
     *
     * Finds a deal using the id
     *
     * @param  int $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksDealId'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesWebhooksDeal, HTTP status code, HTTP response headers (array of strings)
     */
    public function getWebhooksDealIdWithHttpInfo($id, string $contentType = self::contentTypes['getWebhooksDealId'][0])
    {
        $request = $this->getWebhooksDealIdRequest($id, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesWebhooksDeal' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesWebhooksDeal' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesWebhooksDeal', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesWebhooksDeal';
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

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesWebhooksDeal',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getWebhooksDealIdAsync
     *
     * Finds a deal using the id
     *
     * @param  int $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksDealId'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getWebhooksDealIdAsync($id, string $contentType = self::contentTypes['getWebhooksDealId'][0])
    {
        return $this->getWebhooksDealIdAsyncWithHttpInfo($id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getWebhooksDealIdAsyncWithHttpInfo
     *
     * Finds a deal using the id
     *
     * @param  int $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksDealId'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getWebhooksDealIdAsyncWithHttpInfo($id, string $contentType = self::contentTypes['getWebhooksDealId'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesWebhooksDeal';
        $request = $this->getWebhooksDealIdRequest($id, $contentType);

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
     * Create request for operation 'getWebhooksDealId'
     *
     * @param  int $id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksDealId'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getWebhooksDealIdRequest($id, string $contentType = self::contentTypes['getWebhooksDealId'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getWebhooksDealId'
            );
        }


        $resourcePath = '/webhooks/deal/{id}';
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
     * Operation getWebhooksDealsSearch
     *
     * Searches for deals for a given user
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksDealsSearch'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesWebhooksSecurityToken
     */
    public function getWebhooksDealsSearch(string $contentType = self::contentTypes['getWebhooksDealsSearch'][0])
    {
        list($response) = $this->getWebhooksDealsSearchWithHttpInfo($contentType);
        return $response;
    }

    /**
     * Operation getWebhooksDealsSearchWithHttpInfo
     *
     * Searches for deals for a given user
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksDealsSearch'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesWebhooksSecurityToken, HTTP status code, HTTP response headers (array of strings)
     */
    public function getWebhooksDealsSearchWithHttpInfo(string $contentType = self::contentTypes['getWebhooksDealsSearch'][0])
    {
        $request = $this->getWebhooksDealsSearchRequest($contentType);

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
                    if ('\DealMaker\Model\V1EntitiesWebhooksSecurityToken' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesWebhooksSecurityToken' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesWebhooksSecurityToken', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesWebhooksSecurityToken';
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

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesWebhooksSecurityToken',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getWebhooksDealsSearchAsync
     *
     * Searches for deals for a given user
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksDealsSearch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getWebhooksDealsSearchAsync(string $contentType = self::contentTypes['getWebhooksDealsSearch'][0])
    {
        return $this->getWebhooksDealsSearchAsyncWithHttpInfo($contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getWebhooksDealsSearchAsyncWithHttpInfo
     *
     * Searches for deals for a given user
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksDealsSearch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getWebhooksDealsSearchAsyncWithHttpInfo(string $contentType = self::contentTypes['getWebhooksDealsSearch'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesWebhooksSecurityToken';
        $request = $this->getWebhooksDealsSearchRequest($contentType);

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
     * Create request for operation 'getWebhooksDealsSearch'
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksDealsSearch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getWebhooksDealsSearchRequest(string $contentType = self::contentTypes['getWebhooksDealsSearch'][0])
    {


        $resourcePath = '/webhooks/deals/search';
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
     * Operation getWebhooksSecurityToken
     *
     * Creates a new security token for webhook subscription
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksSecurityToken'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesWebhooksSecurityToken
     */
    public function getWebhooksSecurityToken(string $contentType = self::contentTypes['getWebhooksSecurityToken'][0])
    {
        list($response) = $this->getWebhooksSecurityTokenWithHttpInfo($contentType);
        return $response;
    }

    /**
     * Operation getWebhooksSecurityTokenWithHttpInfo
     *
     * Creates a new security token for webhook subscription
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksSecurityToken'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesWebhooksSecurityToken, HTTP status code, HTTP response headers (array of strings)
     */
    public function getWebhooksSecurityTokenWithHttpInfo(string $contentType = self::contentTypes['getWebhooksSecurityToken'][0])
    {
        $request = $this->getWebhooksSecurityTokenRequest($contentType);

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
                    if ('\DealMaker\Model\V1EntitiesWebhooksSecurityToken' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesWebhooksSecurityToken' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesWebhooksSecurityToken', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesWebhooksSecurityToken';
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

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesWebhooksSecurityToken',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getWebhooksSecurityTokenAsync
     *
     * Creates a new security token for webhook subscription
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksSecurityToken'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getWebhooksSecurityTokenAsync(string $contentType = self::contentTypes['getWebhooksSecurityToken'][0])
    {
        return $this->getWebhooksSecurityTokenAsyncWithHttpInfo($contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getWebhooksSecurityTokenAsyncWithHttpInfo
     *
     * Creates a new security token for webhook subscription
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksSecurityToken'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getWebhooksSecurityTokenAsyncWithHttpInfo(string $contentType = self::contentTypes['getWebhooksSecurityToken'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesWebhooksSecurityToken';
        $request = $this->getWebhooksSecurityTokenRequest($contentType);

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
     * Create request for operation 'getWebhooksSecurityToken'
     *
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getWebhooksSecurityToken'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getWebhooksSecurityTokenRequest(string $contentType = self::contentTypes['getWebhooksSecurityToken'][0])
    {


        $resourcePath = '/webhooks/security_token';
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
     * Operation postWebhooks
     *
     * Creates a webhook subscription which is associated to the user
     *
     * @param  \DealMaker\Model\PostWebhooksRequest $post_webhooks_request post_webhooks_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postWebhooks'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesWebhooksSubscription
     */
    public function postWebhooks($post_webhooks_request, string $contentType = self::contentTypes['postWebhooks'][0])
    {
        list($response) = $this->postWebhooksWithHttpInfo($post_webhooks_request, $contentType);
        return $response;
    }

    /**
     * Operation postWebhooksWithHttpInfo
     *
     * Creates a webhook subscription which is associated to the user
     *
     * @param  \DealMaker\Model\PostWebhooksRequest $post_webhooks_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postWebhooks'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesWebhooksSubscription, HTTP status code, HTTP response headers (array of strings)
     */
    public function postWebhooksWithHttpInfo($post_webhooks_request, string $contentType = self::contentTypes['postWebhooks'][0])
    {
        $request = $this->postWebhooksRequest($post_webhooks_request, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesWebhooksSubscription' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesWebhooksSubscription' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesWebhooksSubscription', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesWebhooksSubscription';
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

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesWebhooksSubscription',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation postWebhooksAsync
     *
     * Creates a webhook subscription which is associated to the user
     *
     * @param  \DealMaker\Model\PostWebhooksRequest $post_webhooks_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postWebhooks'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postWebhooksAsync($post_webhooks_request, string $contentType = self::contentTypes['postWebhooks'][0])
    {
        return $this->postWebhooksAsyncWithHttpInfo($post_webhooks_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postWebhooksAsyncWithHttpInfo
     *
     * Creates a webhook subscription which is associated to the user
     *
     * @param  \DealMaker\Model\PostWebhooksRequest $post_webhooks_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postWebhooks'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function postWebhooksAsyncWithHttpInfo($post_webhooks_request, string $contentType = self::contentTypes['postWebhooks'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesWebhooksSubscription';
        $request = $this->postWebhooksRequest($post_webhooks_request, $contentType);

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
     * Create request for operation 'postWebhooks'
     *
     * @param  \DealMaker\Model\PostWebhooksRequest $post_webhooks_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['postWebhooks'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function postWebhooksRequest($post_webhooks_request, string $contentType = self::contentTypes['postWebhooks'][0])
    {

        // verify the required parameter 'post_webhooks_request' is set
        if ($post_webhooks_request === null || (is_array($post_webhooks_request) && count($post_webhooks_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $post_webhooks_request when calling postWebhooks'
            );
        }


        $resourcePath = '/webhooks';
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
        if (isset($post_webhooks_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($post_webhooks_request));
            } else {
                $httpBody = $post_webhooks_request;
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
     * Operation putWebhooksId
     *
     * Updates webhook subscription and webhooks subcription deals
     *
     * @param  int $id id (required)
     * @param  \DealMaker\Model\PutWebhooksIdRequest $put_webhooks_id_request put_webhooks_id_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['putWebhooksId'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesWebhooksSubscription
     */
    public function putWebhooksId($id, $put_webhooks_id_request = null, string $contentType = self::contentTypes['putWebhooksId'][0])
    {
        list($response) = $this->putWebhooksIdWithHttpInfo($id, $put_webhooks_id_request, $contentType);
        return $response;
    }

    /**
     * Operation putWebhooksIdWithHttpInfo
     *
     * Updates webhook subscription and webhooks subcription deals
     *
     * @param  int $id (required)
     * @param  \DealMaker\Model\PutWebhooksIdRequest $put_webhooks_id_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['putWebhooksId'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesWebhooksSubscription, HTTP status code, HTTP response headers (array of strings)
     */
    public function putWebhooksIdWithHttpInfo($id, $put_webhooks_id_request = null, string $contentType = self::contentTypes['putWebhooksId'][0])
    {
        $request = $this->putWebhooksIdRequest($id, $put_webhooks_id_request, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesWebhooksSubscription' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesWebhooksSubscription' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesWebhooksSubscription', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesWebhooksSubscription';
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

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DealMaker\Model\V1EntitiesWebhooksSubscription',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation putWebhooksIdAsync
     *
     * Updates webhook subscription and webhooks subcription deals
     *
     * @param  int $id (required)
     * @param  \DealMaker\Model\PutWebhooksIdRequest $put_webhooks_id_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['putWebhooksId'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putWebhooksIdAsync($id, $put_webhooks_id_request = null, string $contentType = self::contentTypes['putWebhooksId'][0])
    {
        return $this->putWebhooksIdAsyncWithHttpInfo($id, $put_webhooks_id_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation putWebhooksIdAsyncWithHttpInfo
     *
     * Updates webhook subscription and webhooks subcription deals
     *
     * @param  int $id (required)
     * @param  \DealMaker\Model\PutWebhooksIdRequest $put_webhooks_id_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['putWebhooksId'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function putWebhooksIdAsyncWithHttpInfo($id, $put_webhooks_id_request = null, string $contentType = self::contentTypes['putWebhooksId'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesWebhooksSubscription';
        $request = $this->putWebhooksIdRequest($id, $put_webhooks_id_request, $contentType);

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
     * Create request for operation 'putWebhooksId'
     *
     * @param  int $id (required)
     * @param  \DealMaker\Model\PutWebhooksIdRequest $put_webhooks_id_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['putWebhooksId'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function putWebhooksIdRequest($id, $put_webhooks_id_request = null, string $contentType = self::contentTypes['putWebhooksId'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling putWebhooksId'
            );
        }



        $resourcePath = '/webhooks/{id}';
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
        if (isset($put_webhooks_id_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($put_webhooks_id_request));
            } else {
                $httpBody = $put_webhooks_id_request;
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
