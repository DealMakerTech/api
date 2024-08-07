<?php
/**
 * DealApi
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
 * DealApi Class Doc Comment
 *
 * @category Class
 * @package  DealMaker
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class DealApi
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
        'achBankAccountSetupIntent' => [
            'application/json',
        ],
        'acssBankAccountSetupIntent' => [
            'application/json',
        ],
        'createDealSetup' => [
            'application/json',
        ],
        'getDeal' => [
            'application/json',
        ],
        'getDealIncentivePlan' => [
            'application/json',
        ],
        'getPlatformEmailPage' => [
            'application/json',
        ],
        'listDeals' => [
            'application/json',
        ],
        'listPlatformEmails' => [
            'application/json',
        ],
        'patchPlatformEmail' => [
            'application/json',
        ],
        'patchPlatformEmailPage' => [
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
     * Operation achBankAccountSetupIntent
     *
     * Prepares an investor for payment
     *
     * @param  string $id The deal id (required)
     * @param  int $investor_id The investor id (required)
     * @param  int $subscription_id The subscription id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['achBankAccountSetupIntent'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent
     */
    public function achBankAccountSetupIntent($id, $investor_id, $subscription_id, string $contentType = self::contentTypes['achBankAccountSetupIntent'][0])
    {
        list($response) = $this->achBankAccountSetupIntentWithHttpInfo($id, $investor_id, $subscription_id, $contentType);
        return $response;
    }

    /**
     * Operation achBankAccountSetupIntentWithHttpInfo
     *
     * Prepares an investor for payment
     *
     * @param  string $id The deal id (required)
     * @param  int $investor_id The investor id (required)
     * @param  int $subscription_id The subscription id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['achBankAccountSetupIntent'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent, HTTP status code, HTTP response headers (array of strings)
     */
    public function achBankAccountSetupIntentWithHttpInfo($id, $investor_id, $subscription_id, string $contentType = self::contentTypes['achBankAccountSetupIntent'][0])
    {
        $request = $this->achBankAccountSetupIntentRequest($id, $investor_id, $subscription_id, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent';
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
                        '\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation achBankAccountSetupIntentAsync
     *
     * Prepares an investor for payment
     *
     * @param  string $id The deal id (required)
     * @param  int $investor_id The investor id (required)
     * @param  int $subscription_id The subscription id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['achBankAccountSetupIntent'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function achBankAccountSetupIntentAsync($id, $investor_id, $subscription_id, string $contentType = self::contentTypes['achBankAccountSetupIntent'][0])
    {
        return $this->achBankAccountSetupIntentAsyncWithHttpInfo($id, $investor_id, $subscription_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation achBankAccountSetupIntentAsyncWithHttpInfo
     *
     * Prepares an investor for payment
     *
     * @param  string $id The deal id (required)
     * @param  int $investor_id The investor id (required)
     * @param  int $subscription_id The subscription id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['achBankAccountSetupIntent'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function achBankAccountSetupIntentAsyncWithHttpInfo($id, $investor_id, $subscription_id, string $contentType = self::contentTypes['achBankAccountSetupIntent'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent';
        $request = $this->achBankAccountSetupIntentRequest($id, $investor_id, $subscription_id, $contentType);

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
     * Create request for operation 'achBankAccountSetupIntent'
     *
     * @param  string $id The deal id (required)
     * @param  int $investor_id The investor id (required)
     * @param  int $subscription_id The subscription id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['achBankAccountSetupIntent'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function achBankAccountSetupIntentRequest($id, $investor_id, $subscription_id, string $contentType = self::contentTypes['achBankAccountSetupIntent'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling achBankAccountSetupIntent'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling achBankAccountSetupIntent'
            );
        }

        // verify the required parameter 'subscription_id' is set
        if ($subscription_id === null || (is_array($subscription_id) && count($subscription_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription_id when calling achBankAccountSetupIntent'
            );
        }


        $resourcePath = '/deals/{id}/investor/{investor_id}/subscription/{subscription_id}/payments/ach/bank_account_setup_intent';
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
        if ($subscription_id !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription_id' . '}',
                ObjectSerializer::toPathValue($subscription_id),
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
     * Operation acssBankAccountSetupIntent
     *
     * Prepares an investor for payment
     *
     * @param  string $id The deal id (required)
     * @param  int $investor_id The investor id (required)
     * @param  int $subscription_id The subscription id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['acssBankAccountSetupIntent'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent
     */
    public function acssBankAccountSetupIntent($id, $investor_id, $subscription_id, string $contentType = self::contentTypes['acssBankAccountSetupIntent'][0])
    {
        list($response) = $this->acssBankAccountSetupIntentWithHttpInfo($id, $investor_id, $subscription_id, $contentType);
        return $response;
    }

    /**
     * Operation acssBankAccountSetupIntentWithHttpInfo
     *
     * Prepares an investor for payment
     *
     * @param  string $id The deal id (required)
     * @param  int $investor_id The investor id (required)
     * @param  int $subscription_id The subscription id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['acssBankAccountSetupIntent'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent, HTTP status code, HTTP response headers (array of strings)
     */
    public function acssBankAccountSetupIntentWithHttpInfo($id, $investor_id, $subscription_id, string $contentType = self::contentTypes['acssBankAccountSetupIntent'][0])
    {
        $request = $this->acssBankAccountSetupIntentRequest($id, $investor_id, $subscription_id, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent';
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
                        '\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation acssBankAccountSetupIntentAsync
     *
     * Prepares an investor for payment
     *
     * @param  string $id The deal id (required)
     * @param  int $investor_id The investor id (required)
     * @param  int $subscription_id The subscription id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['acssBankAccountSetupIntent'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function acssBankAccountSetupIntentAsync($id, $investor_id, $subscription_id, string $contentType = self::contentTypes['acssBankAccountSetupIntent'][0])
    {
        return $this->acssBankAccountSetupIntentAsyncWithHttpInfo($id, $investor_id, $subscription_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation acssBankAccountSetupIntentAsyncWithHttpInfo
     *
     * Prepares an investor for payment
     *
     * @param  string $id The deal id (required)
     * @param  int $investor_id The investor id (required)
     * @param  int $subscription_id The subscription id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['acssBankAccountSetupIntent'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function acssBankAccountSetupIntentAsyncWithHttpInfo($id, $investor_id, $subscription_id, string $contentType = self::contentTypes['acssBankAccountSetupIntent'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent';
        $request = $this->acssBankAccountSetupIntentRequest($id, $investor_id, $subscription_id, $contentType);

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
     * Create request for operation 'acssBankAccountSetupIntent'
     *
     * @param  string $id The deal id (required)
     * @param  int $investor_id The investor id (required)
     * @param  int $subscription_id The subscription id (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['acssBankAccountSetupIntent'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function acssBankAccountSetupIntentRequest($id, $investor_id, $subscription_id, string $contentType = self::contentTypes['acssBankAccountSetupIntent'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling acssBankAccountSetupIntent'
            );
        }

        // verify the required parameter 'investor_id' is set
        if ($investor_id === null || (is_array($investor_id) && count($investor_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $investor_id when calling acssBankAccountSetupIntent'
            );
        }

        // verify the required parameter 'subscription_id' is set
        if ($subscription_id === null || (is_array($subscription_id) && count($subscription_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription_id when calling acssBankAccountSetupIntent'
            );
        }


        $resourcePath = '/deals/{id}/investor/{investor_id}/subscription/{subscription_id}/payments/acss/bank_account_setup_intent';
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
        if ($subscription_id !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription_id' . '}',
                ObjectSerializer::toPathValue($subscription_id),
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
     * Operation createDealSetup
     *
     * Create deal setup
     *
     * @param  \DealMaker\Model\CreateDealSetupRequest $create_deal_setup_request create_deal_setup_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDealSetup'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesDealSetup
     */
    public function createDealSetup($create_deal_setup_request, string $contentType = self::contentTypes['createDealSetup'][0])
    {
        list($response) = $this->createDealSetupWithHttpInfo($create_deal_setup_request, $contentType);
        return $response;
    }

    /**
     * Operation createDealSetupWithHttpInfo
     *
     * Create deal setup
     *
     * @param  \DealMaker\Model\CreateDealSetupRequest $create_deal_setup_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDealSetup'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesDealSetup, HTTP status code, HTTP response headers (array of strings)
     */
    public function createDealSetupWithHttpInfo($create_deal_setup_request, string $contentType = self::contentTypes['createDealSetup'][0])
    {
        $request = $this->createDealSetupRequest($create_deal_setup_request, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesDealSetup' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesDealSetup' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesDealSetup', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesDealSetup';
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
                        '\DealMaker\Model\V1EntitiesDealSetup',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation createDealSetupAsync
     *
     * Create deal setup
     *
     * @param  \DealMaker\Model\CreateDealSetupRequest $create_deal_setup_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDealSetup'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createDealSetupAsync($create_deal_setup_request, string $contentType = self::contentTypes['createDealSetup'][0])
    {
        return $this->createDealSetupAsyncWithHttpInfo($create_deal_setup_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createDealSetupAsyncWithHttpInfo
     *
     * Create deal setup
     *
     * @param  \DealMaker\Model\CreateDealSetupRequest $create_deal_setup_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDealSetup'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function createDealSetupAsyncWithHttpInfo($create_deal_setup_request, string $contentType = self::contentTypes['createDealSetup'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesDealSetup';
        $request = $this->createDealSetupRequest($create_deal_setup_request, $contentType);

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
     * Create request for operation 'createDealSetup'
     *
     * @param  \DealMaker\Model\CreateDealSetupRequest $create_deal_setup_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['createDealSetup'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function createDealSetupRequest($create_deal_setup_request, string $contentType = self::contentTypes['createDealSetup'][0])
    {

        // verify the required parameter 'create_deal_setup_request' is set
        if ($create_deal_setup_request === null || (is_array($create_deal_setup_request) && count($create_deal_setup_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $create_deal_setup_request when calling createDealSetup'
            );
        }


        $resourcePath = '/deal_setups';
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
        if (isset($create_deal_setup_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($create_deal_setup_request));
            } else {
                $httpBody = $create_deal_setup_request;
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
     * Operation getDeal
     *
     * Get deal by Deal ID
     *
     * @param  int $id The deal id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDeal'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesDeal
     */
    public function getDeal($id, string $contentType = self::contentTypes['getDeal'][0])
    {
        list($response) = $this->getDealWithHttpInfo($id, $contentType);
        return $response;
    }

    /**
     * Operation getDealWithHttpInfo
     *
     * Get deal by Deal ID
     *
     * @param  int $id The deal id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDeal'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesDeal, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDealWithHttpInfo($id, string $contentType = self::contentTypes['getDeal'][0])
    {
        $request = $this->getDealRequest($id, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesDeal' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesDeal' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesDeal', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesDeal';
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
                        '\DealMaker\Model\V1EntitiesDeal',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getDealAsync
     *
     * Get deal by Deal ID
     *
     * @param  int $id The deal id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDeal'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDealAsync($id, string $contentType = self::contentTypes['getDeal'][0])
    {
        return $this->getDealAsyncWithHttpInfo($id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDealAsyncWithHttpInfo
     *
     * Get deal by Deal ID
     *
     * @param  int $id The deal id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDeal'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDealAsyncWithHttpInfo($id, string $contentType = self::contentTypes['getDeal'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesDeal';
        $request = $this->getDealRequest($id, $contentType);

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
     * Create request for operation 'getDeal'
     *
     * @param  int $id The deal id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDeal'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getDealRequest($id, string $contentType = self::contentTypes['getDeal'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getDeal'
            );
        }


        $resourcePath = '/deals/{id}';
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
     * Operation getDealIncentivePlan
     *
     * Get incentive plan by deal id
     *
     * @param  int $id The deal id. (required)
     * @param  float $investment_amount The investment amount to get the security price for. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealIncentivePlan'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesDealsPriceDetails
     */
    public function getDealIncentivePlan($id, $investment_amount = null, string $contentType = self::contentTypes['getDealIncentivePlan'][0])
    {
        list($response) = $this->getDealIncentivePlanWithHttpInfo($id, $investment_amount, $contentType);
        return $response;
    }

    /**
     * Operation getDealIncentivePlanWithHttpInfo
     *
     * Get incentive plan by deal id
     *
     * @param  int $id The deal id. (required)
     * @param  float $investment_amount The investment amount to get the security price for. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealIncentivePlan'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesDealsPriceDetails, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDealIncentivePlanWithHttpInfo($id, $investment_amount = null, string $contentType = self::contentTypes['getDealIncentivePlan'][0])
    {
        $request = $this->getDealIncentivePlanRequest($id, $investment_amount, $contentType);

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
     * Operation getDealIncentivePlanAsync
     *
     * Get incentive plan by deal id
     *
     * @param  int $id The deal id. (required)
     * @param  float $investment_amount The investment amount to get the security price for. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealIncentivePlan'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDealIncentivePlanAsync($id, $investment_amount = null, string $contentType = self::contentTypes['getDealIncentivePlan'][0])
    {
        return $this->getDealIncentivePlanAsyncWithHttpInfo($id, $investment_amount, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDealIncentivePlanAsyncWithHttpInfo
     *
     * Get incentive plan by deal id
     *
     * @param  int $id The deal id. (required)
     * @param  float $investment_amount The investment amount to get the security price for. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealIncentivePlan'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDealIncentivePlanAsyncWithHttpInfo($id, $investment_amount = null, string $contentType = self::contentTypes['getDealIncentivePlan'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesDealsPriceDetails';
        $request = $this->getDealIncentivePlanRequest($id, $investment_amount, $contentType);

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
     * Create request for operation 'getDealIncentivePlan'
     *
     * @param  int $id The deal id. (required)
     * @param  float $investment_amount The investment amount to get the security price for. (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getDealIncentivePlan'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getDealIncentivePlanRequest($id, $investment_amount = null, string $contentType = self::contentTypes['getDealIncentivePlan'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getDealIncentivePlan'
            );
        }



        $resourcePath = '/deals/{id}/incentive_plan';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $investment_amount,
            'investment_amount', // param base name
            'number', // openApiType
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
     * Operation getPlatformEmailPage
     *
     * Get the Page for a given Platform Email
     *
     * @param  int $id The deal id. (required)
     * @param  string $kind The platform email id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPlatformEmailPage'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesPage
     */
    public function getPlatformEmailPage($id, $kind, string $contentType = self::contentTypes['getPlatformEmailPage'][0])
    {
        list($response) = $this->getPlatformEmailPageWithHttpInfo($id, $kind, $contentType);
        return $response;
    }

    /**
     * Operation getPlatformEmailPageWithHttpInfo
     *
     * Get the Page for a given Platform Email
     *
     * @param  int $id The deal id. (required)
     * @param  string $kind The platform email id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPlatformEmailPage'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesPage, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPlatformEmailPageWithHttpInfo($id, $kind, string $contentType = self::contentTypes['getPlatformEmailPage'][0])
    {
        $request = $this->getPlatformEmailPageRequest($id, $kind, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesPage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesPage' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesPage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesPage';
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
                        '\DealMaker\Model\V1EntitiesPage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getPlatformEmailPageAsync
     *
     * Get the Page for a given Platform Email
     *
     * @param  int $id The deal id. (required)
     * @param  string $kind The platform email id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPlatformEmailPage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPlatformEmailPageAsync($id, $kind, string $contentType = self::contentTypes['getPlatformEmailPage'][0])
    {
        return $this->getPlatformEmailPageAsyncWithHttpInfo($id, $kind, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getPlatformEmailPageAsyncWithHttpInfo
     *
     * Get the Page for a given Platform Email
     *
     * @param  int $id The deal id. (required)
     * @param  string $kind The platform email id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPlatformEmailPage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getPlatformEmailPageAsyncWithHttpInfo($id, $kind, string $contentType = self::contentTypes['getPlatformEmailPage'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesPage';
        $request = $this->getPlatformEmailPageRequest($id, $kind, $contentType);

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
     * Create request for operation 'getPlatformEmailPage'
     *
     * @param  int $id The deal id. (required)
     * @param  string $kind The platform email id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getPlatformEmailPage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function getPlatformEmailPageRequest($id, $kind, string $contentType = self::contentTypes['getPlatformEmailPage'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling getPlatformEmailPage'
            );
        }

        // verify the required parameter 'kind' is set
        if ($kind === null || (is_array($kind) && count($kind) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $kind when calling getPlatformEmailPage'
            );
        }


        $resourcePath = '/deals/{id}/platform_emails/{kind}/page';
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
        if ($kind !== null) {
            $resourcePath = str_replace(
                '{' . 'kind' . '}',
                ObjectSerializer::toPathValue($kind),
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
     * Operation listDeals
     *
     * List available deals
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listDeals'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesDeals
     */
    public function listDeals($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['listDeals'][0])
    {
        list($response) = $this->listDealsWithHttpInfo($page, $per_page, $offset, $contentType);
        return $response;
    }

    /**
     * Operation listDealsWithHttpInfo
     *
     * List available deals
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listDeals'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesDeals, HTTP status code, HTTP response headers (array of strings)
     */
    public function listDealsWithHttpInfo($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['listDeals'][0])
    {
        $request = $this->listDealsRequest($page, $per_page, $offset, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesDeals' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesDeals' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesDeals', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesDeals';
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
                        '\DealMaker\Model\V1EntitiesDeals',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listDealsAsync
     *
     * List available deals
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listDeals'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listDealsAsync($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['listDeals'][0])
    {
        return $this->listDealsAsyncWithHttpInfo($page, $per_page, $offset, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listDealsAsyncWithHttpInfo
     *
     * List available deals
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listDeals'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listDealsAsyncWithHttpInfo($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['listDeals'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesDeals';
        $request = $this->listDealsRequest($page, $per_page, $offset, $contentType);

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
     * Create request for operation 'listDeals'
     *
     * @param  int $page Page offset to fetch. (optional, default to 1)
     * @param  int $per_page Number of results to return per page. (optional, default to 25)
     * @param  int $offset Pad a number of results. (optional, default to 0)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listDeals'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listDealsRequest($page = 1, $per_page = 25, $offset = 0, string $contentType = self::contentTypes['listDeals'][0])
    {





        $resourcePath = '/deals';
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
     * Operation listPlatformEmails
     *
     * Get a list of platform emails for the deal
     *
     * @param  int $id The deal id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPlatformEmails'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesDealsPlatformEmails
     */
    public function listPlatformEmails($id, string $contentType = self::contentTypes['listPlatformEmails'][0])
    {
        list($response) = $this->listPlatformEmailsWithHttpInfo($id, $contentType);
        return $response;
    }

    /**
     * Operation listPlatformEmailsWithHttpInfo
     *
     * Get a list of platform emails for the deal
     *
     * @param  int $id The deal id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPlatformEmails'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesDealsPlatformEmails, HTTP status code, HTTP response headers (array of strings)
     */
    public function listPlatformEmailsWithHttpInfo($id, string $contentType = self::contentTypes['listPlatformEmails'][0])
    {
        $request = $this->listPlatformEmailsRequest($id, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesDealsPlatformEmails' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesDealsPlatformEmails' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesDealsPlatformEmails', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesDealsPlatformEmails';
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
                        '\DealMaker\Model\V1EntitiesDealsPlatformEmails',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation listPlatformEmailsAsync
     *
     * Get a list of platform emails for the deal
     *
     * @param  int $id The deal id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPlatformEmails'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listPlatformEmailsAsync($id, string $contentType = self::contentTypes['listPlatformEmails'][0])
    {
        return $this->listPlatformEmailsAsyncWithHttpInfo($id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation listPlatformEmailsAsyncWithHttpInfo
     *
     * Get a list of platform emails for the deal
     *
     * @param  int $id The deal id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPlatformEmails'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function listPlatformEmailsAsyncWithHttpInfo($id, string $contentType = self::contentTypes['listPlatformEmails'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesDealsPlatformEmails';
        $request = $this->listPlatformEmailsRequest($id, $contentType);

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
     * Create request for operation 'listPlatformEmails'
     *
     * @param  int $id The deal id. (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['listPlatformEmails'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function listPlatformEmailsRequest($id, string $contentType = self::contentTypes['listPlatformEmails'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling listPlatformEmails'
            );
        }


        $resourcePath = '/deals/{id}/platform_emails';
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
     * Operation patchPlatformEmail
     *
     * Patch platform email by kind and deal.
     *
     * @param  int $id id (required)
     * @param  int $kind kind (required)
     * @param  \DealMaker\Model\PatchPlatformEmailRequest $patch_platform_email_request patch_platform_email_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchPlatformEmail'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesDealsPlatformEmail
     */
    public function patchPlatformEmail($id, $kind, $patch_platform_email_request, string $contentType = self::contentTypes['patchPlatformEmail'][0])
    {
        list($response) = $this->patchPlatformEmailWithHttpInfo($id, $kind, $patch_platform_email_request, $contentType);
        return $response;
    }

    /**
     * Operation patchPlatformEmailWithHttpInfo
     *
     * Patch platform email by kind and deal.
     *
     * @param  int $id (required)
     * @param  int $kind (required)
     * @param  \DealMaker\Model\PatchPlatformEmailRequest $patch_platform_email_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchPlatformEmail'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesDealsPlatformEmail, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchPlatformEmailWithHttpInfo($id, $kind, $patch_platform_email_request, string $contentType = self::contentTypes['patchPlatformEmail'][0])
    {
        $request = $this->patchPlatformEmailRequest($id, $kind, $patch_platform_email_request, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesDealsPlatformEmail' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesDealsPlatformEmail' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesDealsPlatformEmail', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesDealsPlatformEmail';
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
                        '\DealMaker\Model\V1EntitiesDealsPlatformEmail',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation patchPlatformEmailAsync
     *
     * Patch platform email by kind and deal.
     *
     * @param  int $id (required)
     * @param  int $kind (required)
     * @param  \DealMaker\Model\PatchPlatformEmailRequest $patch_platform_email_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchPlatformEmail'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchPlatformEmailAsync($id, $kind, $patch_platform_email_request, string $contentType = self::contentTypes['patchPlatformEmail'][0])
    {
        return $this->patchPlatformEmailAsyncWithHttpInfo($id, $kind, $patch_platform_email_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchPlatformEmailAsyncWithHttpInfo
     *
     * Patch platform email by kind and deal.
     *
     * @param  int $id (required)
     * @param  int $kind (required)
     * @param  \DealMaker\Model\PatchPlatformEmailRequest $patch_platform_email_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchPlatformEmail'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchPlatformEmailAsyncWithHttpInfo($id, $kind, $patch_platform_email_request, string $contentType = self::contentTypes['patchPlatformEmail'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesDealsPlatformEmail';
        $request = $this->patchPlatformEmailRequest($id, $kind, $patch_platform_email_request, $contentType);

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
     * Create request for operation 'patchPlatformEmail'
     *
     * @param  int $id (required)
     * @param  int $kind (required)
     * @param  \DealMaker\Model\PatchPlatformEmailRequest $patch_platform_email_request (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchPlatformEmail'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function patchPlatformEmailRequest($id, $kind, $patch_platform_email_request, string $contentType = self::contentTypes['patchPlatformEmail'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling patchPlatformEmail'
            );
        }

        // verify the required parameter 'kind' is set
        if ($kind === null || (is_array($kind) && count($kind) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $kind when calling patchPlatformEmail'
            );
        }

        // verify the required parameter 'patch_platform_email_request' is set
        if ($patch_platform_email_request === null || (is_array($patch_platform_email_request) && count($patch_platform_email_request) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $patch_platform_email_request when calling patchPlatformEmail'
            );
        }


        $resourcePath = '/deals/{id}/platform_emails/{kind}/update';
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
        if ($kind !== null) {
            $resourcePath = str_replace(
                '{' . 'kind' . '}',
                ObjectSerializer::toPathValue($kind),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($patch_platform_email_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($patch_platform_email_request));
            } else {
                $httpBody = $patch_platform_email_request;
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
     * Operation patchPlatformEmailPage
     *
     * Create and associate a page with a platform email or update the existing page
     *
     * @param  int $id The deal id. (required)
     * @param  string $kind The platform email id. (required)
     * @param  \DealMaker\Model\PatchPlatformEmailPageRequest $patch_platform_email_page_request patch_platform_email_page_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchPlatformEmailPage'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return \DealMaker\Model\V1EntitiesPage
     */
    public function patchPlatformEmailPage($id, $kind, $patch_platform_email_page_request = null, string $contentType = self::contentTypes['patchPlatformEmailPage'][0])
    {
        list($response) = $this->patchPlatformEmailPageWithHttpInfo($id, $kind, $patch_platform_email_page_request, $contentType);
        return $response;
    }

    /**
     * Operation patchPlatformEmailPageWithHttpInfo
     *
     * Create and associate a page with a platform email or update the existing page
     *
     * @param  int $id The deal id. (required)
     * @param  string $kind The platform email id. (required)
     * @param  \DealMaker\Model\PatchPlatformEmailPageRequest $patch_platform_email_page_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchPlatformEmailPage'] to see the possible values for this operation
     *
     * @throws \DealMaker\ApiException on non-2xx response or if the response body is not in the expected format
     * @throws \InvalidArgumentException
     * @return array of \DealMaker\Model\V1EntitiesPage, HTTP status code, HTTP response headers (array of strings)
     */
    public function patchPlatformEmailPageWithHttpInfo($id, $kind, $patch_platform_email_page_request = null, string $contentType = self::contentTypes['patchPlatformEmailPage'][0])
    {
        $request = $this->patchPlatformEmailPageRequest($id, $kind, $patch_platform_email_page_request, $contentType);

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
                    if ('\DealMaker\Model\V1EntitiesPage' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\DealMaker\Model\V1EntitiesPage' !== 'string') {
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
                        ObjectSerializer::deserialize($content, '\DealMaker\Model\V1EntitiesPage', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DealMaker\Model\V1EntitiesPage';
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
                        '\DealMaker\Model\V1EntitiesPage',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation patchPlatformEmailPageAsync
     *
     * Create and associate a page with a platform email or update the existing page
     *
     * @param  int $id The deal id. (required)
     * @param  string $kind The platform email id. (required)
     * @param  \DealMaker\Model\PatchPlatformEmailPageRequest $patch_platform_email_page_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchPlatformEmailPage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchPlatformEmailPageAsync($id, $kind, $patch_platform_email_page_request = null, string $contentType = self::contentTypes['patchPlatformEmailPage'][0])
    {
        return $this->patchPlatformEmailPageAsyncWithHttpInfo($id, $kind, $patch_platform_email_page_request, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation patchPlatformEmailPageAsyncWithHttpInfo
     *
     * Create and associate a page with a platform email or update the existing page
     *
     * @param  int $id The deal id. (required)
     * @param  string $kind The platform email id. (required)
     * @param  \DealMaker\Model\PatchPlatformEmailPageRequest $patch_platform_email_page_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchPlatformEmailPage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function patchPlatformEmailPageAsyncWithHttpInfo($id, $kind, $patch_platform_email_page_request = null, string $contentType = self::contentTypes['patchPlatformEmailPage'][0])
    {
        $returnType = '\DealMaker\Model\V1EntitiesPage';
        $request = $this->patchPlatformEmailPageRequest($id, $kind, $patch_platform_email_page_request, $contentType);

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
     * Create request for operation 'patchPlatformEmailPage'
     *
     * @param  int $id The deal id. (required)
     * @param  string $kind The platform email id. (required)
     * @param  \DealMaker\Model\PatchPlatformEmailPageRequest $patch_platform_email_page_request (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['patchPlatformEmailPage'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function patchPlatformEmailPageRequest($id, $kind, $patch_platform_email_page_request = null, string $contentType = self::contentTypes['patchPlatformEmailPage'][0])
    {

        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling patchPlatformEmailPage'
            );
        }

        // verify the required parameter 'kind' is set
        if ($kind === null || (is_array($kind) && count($kind) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $kind when calling patchPlatformEmailPage'
            );
        }



        $resourcePath = '/deals/{id}/platform_emails/{kind}/page';
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
        if ($kind !== null) {
            $resourcePath = str_replace(
                '{' . 'kind' . '}',
                ObjectSerializer::toPathValue($kind),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($patch_platform_email_page_request)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($patch_platform_email_page_request));
            } else {
                $httpBody = $patch_platform_email_page_request;
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
