=begin
#DealMaker API

## Introduction  Welcome to DealMaker’s Web API v1! This API is RESTful, easy to integrate with, and offers support in 2 different languages. This is the technical documentation for our API. There are tutorials and examples of integrations with our API available on our [knowledge centre](https://help.dealmaker.tech/training-centre) as well.  # Libraries  - Javascript - Ruby  # Authentication  To authenticate, add an Authorization header to your API request that contains an access token. Before you [generate an access token](#how-to-generate-an-access-token) your must first [create an application](#create-an-application) on your portal and retrieve the your client ID and secret  ## Create an Application  DealMaker’s Web API v1 supports the use of OAuth applications. Applications can be generated in your [account](https://app.dealmaker.tech/developer/applications).  To create an API Application, click on your user name in the top right corner to open a dropdown menu, and select \"Integrations\". Under the API settings tab, click the `Create New Application` button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-1.png)  Name your application and assign the level of permissions for this application  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-2.png)  Once your application is created, save in a secure space your client ID and secret.  **WARNING**: The secret key will not be visible after you click the close button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-3.png)  From the developer tab, you will be able to view and manage all the available applications  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-4.png)  Each Application consists of a client id, secret and set of scopes. The scopes define what resources you want to have access to. The client ID and secret are used to generate an access token. You will need to create an application to use API endpoints.  ## How to generate an access token  After creating an application, you must make a call to obtain a bearer token using the Generate an OAuth token operation. This operation requires the following parameters:  `token endpoint` - https://app.dealmaker.tech/oauth/token  `grant_type` - must be set to `client_credentials`  `client_id` - the Client ID displayed when you created the OAuth application in the previous step  `client_secret` - the Client Secret displayed when you created the OAuth application in the previous step  `scope` - the scope is established when you created the OAuth application in the previous step  Note: The Generate an OAuth token response specifies how long the bearer token is valid for. You should reuse the bearer token until it is expired. When the token is expired, call Generate an OAuth token again to generate a new one.  To use the access token, you must set a plain text header named `Authorization` with the contents of the header being “Bearer XXX” where XXX is your generated access token.  ### Example  #### Postman  Here's an example on how to generate the access token with Postman, where `{{CLIENT_ID}}` and `{{CLIENT_SECRET}}` are the values generated after following the steps on [Create an Application](#create-an-application)  ![Get access token postman example](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/token-postman.png)  # Status Codes  ## Content-Type Header  All responses are returned in JSON format. We specify this by sending the Content-Type header.  ## Status Codes  Below is a table containing descriptions of the various status codes we currently support against various resources.  Sometimes your API call will generate an error. Here you will find additional information about what to expect if you don’t format your request properly, or we fail to properly process your request.  | Status Code | Description | | ----------- | ----------- | | `200`       | Success     | | `403`       | Forbidden   | | `404`       | Not found   |  # Pagination  Pagination is used to divide large responses is smaller portions (pages). By default, all endpoints return a maximum of 25 records per page. You can change the number of records on a per request basis by passing a `per_page` parameter in the request header parameters. The largest supported `per_page` parameter is 100.  When the response exceeds the `per_page` parameter, you can paginate through the records by increasing the `offset` parameter. Example: `offset=25` will return 25 records starting from 26th record. You may also paginate using the `page` parameter to indicate the page number you would like to show on the response.  Please review the table below for the input parameters  ## Inputs  | Parameter  | Description                                                                     | | ---------- | ------------------------------------------------------------------------------- | | `per_page` | Amount of records included on each page (Default is 25)                         | | `page`     | Page number                                                                     | | `offset`   | Amount of records offset on the API request where 0 represents the first record |  ## Response Headers  | Response Header | Description                                  | | --------------- | -------------------------------------------- | | `X-Total`       | Total number of records of response          | | `X-Total-Pages` | Total number of pages of response            | | `X-Per-Page`    | Total number of records per page of response | | `X-Page`        | Number of current page                       | | `X-Next-Page`   | Number of next page                          | | `X-Prev-Page`   | Number of previous page                      | | `X-Offset`      | Total number of records offset               |  # Search and Filtering (The q parameter)  The q optional parameter accepts a string as input and allows you to filter the request based on that string. Please note that search strings must be encoded according to ASCII. For example, \"john+investor&#64;dealmaker.tech\" should be passed as “john%2Binvestor%40dealmaker.tech”. There are two main ways to filter with it.  ## Keyword filtering  Some keywords allow you to filter investors based on a specific “scope” of the investors, for example using the string “Invited” will filter all investors with the status invited, and the keyword “Has attachments” will filter investors with attachments.  Here’s a list of possible keywords and the “scope” each one of the keywords filters by:  | Keywords                                       | Scope                                                                       | Decoded Example                                                      | Encoded Example                                                                          | | ---------------------------------------------- | --------------------------------------------------------------------------- | -------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | | Signed on \\(date range\\)                       | Investors who signed in the provided date range                             | Signed on (date range) [2020-07-01:2020-07-31]                       | `Signed%20on%20%28date%20range%29%20%5B2020-07-01%3A2020-07-31%5D`                       | | Enabled for countersignature on \\(date range\\) | Investors who were enabled for counter signature in the provided date range | Enabled for countersignature on (date range) [2022-05-24:2022-05-25] | `Enabled%20for%20countersignature%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D` | | Accepted on \\(date range\\)                     | Investors accepted in the provided date rage                                | Accepted on (date range) [2022-05-24:2022-05-25]                     | `Accepted%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D`                         | | Offline                                        | Investors added to the deal offline                                         | Offline                                                              | `Offline`                                                                                | | Online                                         | Investors added to the deal online                                          | Online                                                               | `Online`                                                                                 | | Signed                                         | Investors who signed their agreement                                        | Signed                                                               | `Signed`                                                                                 | | Waiting for countersignature                   | Investors who have signed and are waiting for counter signature             | Waiting for countersignature                                         | `Waiting%20for%20countersignature`                                                       | | Invited                                        | Investors on the Invited Status                                             | Invited                                                              | `Invited`                                                                                | | Accepted                                       | Investors in the Accepted Status                                            | Accepted                                                             | `Accepted`                                                                               | | Questionnaire in progress                      | All Investors who have not finished completing the questionnaire            | Questionnaire in progress                                            | `Questionnaire%20in%20progress`                                                          | | Has attachments                                | All Investors with attachments                                              | Has attachments                                                      | `Has%20attachments`                                                                      | | Has notes                                      | All Investors with notes                                                    | Has notes                                                            | `Has%20notes`                                                                            | | Waiting for co-signature                       | Investors who have signed and are waiting for co-signature                  | Waiting for co-signature                                             | `Waiting%20for%20co-signature`                                                           | | Background Check Approved                      | Investors with approved background check                                    | Background Check Approved                                            | `Background%20Check%20Approved`                                                          | | Document Review Pending                        | Investors with pending review                                               | Document Review Pending                                              | `Document%20Review%20Pending`                                                            | | Document Upload Pending                        | Investors with pending documents to upload                                  | Document Upload Pending                                              | `Document%20Upload%20Pending`                                                            | | Required adjudicator review                    | Investors who are required to be review by the adjudicator                  | Required adjudicator review                                          | `Required%20adjudicator%20review`                                                        |  ---  **NOTE**  Filtering keywords are case sensitive and need to be encoded  ---  ## Search String  Any value for the parameter which does not match one of the keywords listed above, will use fields like `first name`, `last name`, `email`, `tags` to search for the investor.  For example, if you search “Robert”, because this does not match one of the keywords listed above, it will then return any investors who have the string “Robert” in their name, email, or tags fields.  # Versioning  The latest version is v1.  The version can be updated on the `Accept` header, just set the version as stated on the following example:  ```  Accept:application/vnd.dealmaker-v1+json  ```  | Version | Accept Header                       | | ------- | ----------------------------------- | | `v1`    | application/vnd.dealmaker-`v1`+json |  # SDK’s  For instruction on installing SDKs, please view the following links  - [Javascript](https://github.com/DealMakerTech/api/tree/main/v1/clients/javascript) - [Ruby](https://github.com/DealMakerTech/api/tree/main/v1/clients/ruby)  # Webhooks  Our webhooks functionality allows clients to automatically receive updates on a deal's investor data.  Some of the data that the webhooks include:  - Investor Name - Date created - Email - Phone - Allocation - Attachments - Accredited investor status - Accredited investor category - State (Draft, Invited, Signed, Accepted, Waiting, Inactive)  Via webhooks clients can subscribe to the following events as they happen on Dealmaker:  - Investor is created - Investor details are updated (any of the investor details above change or are updated) - Investor has signed their agreement - Invertor fully funded their investment - Investor has been accepted - Investor is deleted  A URL supplied by the client will receive all the events with the information as part of the payload. Clients are able to add and update the URL within DealMaker.  ## Configuration  For a comprehensive guide on how to configure Webhooks please visit our support article: [Configuring Webhooks on DealMaker – DealMaker Support](https://help.dealmaker.tech/configuring-webhooks-on-dealmaker).  As a developer user on DealMaker, you are able to configure webhooks by following the steps below:  1. Sign into Dealmaker 2. Go to **“Your profile”** in the top right corner 3. Access an **“Integrations”** configuration via the left menu 4. The developer configures webhooks by including:    - The HTTPS URL where the request will be sent    - Optionally, a security token that we would use to build a SHA1 hash that would be included in the request headers. The name of the header is `X-DealMaker-Signature`. If the secret is not specified, the hash won’t be included in the headers.    - The Deal(s) to include in the webhook subscription    - An email address that will be used to notify about errors. 5. The developers can disable webhooks temporarily if needed  ## Specification  ### Events  The initial set of events will be related to the investor. The events are:  1. `investor.created`     - Triggers every time a new investor is added to a deal  2. `investor.updated`     - Triggers on updates to any of the following fields:      - Status      - Name      - Email - (this is a user field so we trigger event for all investors with webhook subscription)      - Allocated Amount      - Investment Amount      - Accredited investor fields      - Adding or removing attachments      - Tags    - When the investor status is signed, the payload also includes a link to the signed document; the link expires after 30 minutes    3. `investor.signed`     - Triggers when the investor signs their subscription agreement (terms and conditions)      - When this happens the investor.state becomes `signed`    - This event includes the same fields as the `investor.updated` event  4. `investor.funded`     - Triggers when the investor becomes fully funded      - This happens when the investor.funded_state becomes `funded`    - This event includes the same fields as the `investor.updated` event  5. `investor.accepted`     - Triggers when the investor is countersigned      - When this happens the investor.state becomes `accepted`    - This event includes the same fields as the `investor.updated` event  6.  `investor.deleted`     - Triggers when the investor is removed from the deal    - The investor key of the payload only includes investor ID    - The deal is not included in the payload. Due to our implementation it’s impossible to retrieve the deal the investor was part of  ### Requests  - The request is a `POST` - The payload’s `content-type` is `application/json` - Only `2XX` responses are considered successful. In the event of a different response, we consider it failed and queue the event for retry - We retry the request five times, after the initial attempt. Doubling the waiting time between intervals with each try. The first retry happens after 30 seconds, then 60 seconds, 2 mins, 4 minutes, and 8 minutes. This timing scheme gives the receiver about 1 hour if all the requests fail - If an event fails all the attempts to be delivered, we send an email to the address that the user configured  ### Payload  #### Common Properties  There will be some properties that are common to all the events on the system.  | Key               | Type   | Description                                                                              | | ----------------- | ------ | --------------------------------------------------------------------------------------   | | event             | String | The event that triggered the call                                                        | | event_id          | String | A unique identifier for the event                                                        | | deal<sup>\\*</sup> | Object | The deal in which the event occurred. please see below for an example on the deal object<sup>\\*\\*</sup> |  <sup>\\*</sup>This field is not included when deleting a resource  <sup>\\*\\*</sup> Sample Deal Object in the webhook payload  ```json \"deal\": {         \"id\": 0,         \"title\": \"string\",         \"created_at\": \"2022-12-06T18:14:44.000Z\",         \"updated_at\": \"2022-12-08T12:46:48.000Z\",         \"state\": \"string\",         \"currency\": \"string\",         \"security_type\": \"string\",         \"price_per_security\": 0.00,         \"deal_type\": \"string\",         \"minimum_investment\": 0,         \"maximum_investment\": 0,         \"issuer\": {             \"id\": 0,             \"name\": \"string\"         },         \"enterprise\": {             \"id\": 0,             \"name\": \"string\"         }     } ```  #### Common Properties (investor scope)  By design, we have incorporated on the webhooks payload the same investor-related fields included in the Investor model, for reference on the included fields, their types and values please click [here](https://docs.dealmaker.tech/#tag/investor_model). This will allow you to get all the necessary information you need about a particular investor without having to call the Get Investor by ID endpoint.                                                           | #### Investor State  Here is a brief description of each investor state:  - **Draft:** the investor is added to the platform but hasn't been invited yet and cannot access the portal - **Invited:** the investor was added to the platform but hasn’t completed the questionnaire - **Signed:** the investor signed the document (needs approval from Lawyer or Reviewer before countersignature) - **Waiting:** the investor was approved for countersignature by any of the Lawyers or Reviewers in the deal - **Accepted:** the investor's agreement was countersigned by the Signatory - **Inactive** the investor is no longer eligible to participate in the offering. This may be because their warrant expired, they requested a refund, or they opted out of the offering  #### Update Delay  Given the high number of updates our platform performs on any investor, we’ve added a cool down period on update events that allows us to “group” updates and trigger only one every minute. In consequence, update events will be delivered 1 minute after the initial request was made and will include the latest version of the investor data at delivery time. 

The version of the OpenAPI document: 1.75.0

Generated by: https://openapi-generator.tech
Generator version: 7.7.0-SNAPSHOT

=end

require 'cgi'

module DealMakerAPI
  class DefaultApi
    attr_accessor :api_client

    def initialize(api_client = ApiClient.default)
      @api_client = api_client
    end
    # Load data for the digital payments connection stage
    # Load data for the digital payments connection stage
    # @param deal_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData]
    def get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data(deal_id, opts = {})
      data, _status_code, _headers = get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data_with_http_info(deal_id, opts)
      data
    end

    # Load data for the digital payments connection stage
    # Load data for the digital payments connection stage
    # @param deal_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData, Integer, Hash)>] V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData data, response status code and response headers
    def get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data_with_http_info(deal_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data ...'
      end
      # verify the required parameter 'deal_id' is set
      if @api_client.config.client_side_validation && deal_id.nil?
        fail ArgumentError, "Missing the required parameter 'deal_id' when calling DefaultApi.get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data"
      end
      # resource path
      local_var_path = '/deals/{deal_id}/payment_onboarding/questionnaire/digital_payments_connection/data'.sub('{' + 'deal_id' + '}', CGI.escape(deal_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get payout account data
    # Get payout account data
    # @param deal_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData]
    def get_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_data(deal_id, opts = {})
      data, _status_code, _headers = get_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_data_with_http_info(deal_id, opts)
      data
    end

    # Get payout account data
    # Get payout account data
    # @param deal_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData, Integer, Hash)>] V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData data, response status code and response headers
    def get_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_data_with_http_info(deal_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_data ...'
      end
      # verify the required parameter 'deal_id' is set
      if @api_client.config.client_side_validation && deal_id.nil?
        fail ArgumentError, "Missing the required parameter 'deal_id' when calling DefaultApi.get_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_data"
      end
      # resource path
      local_var_path = '/deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/data'.sub('{' + 'deal_id' + '}', CGI.escape(deal_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_data",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_data\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Displays the express wire instructions for an investor on a deal
    # Get express wire instructions
    # @param id [Integer] 
    # @param investor_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesExpressWireInstruction]
    def get_deals_id_investors_investor_id_payments_express_wire_instructions(id, investor_id, opts = {})
      data, _status_code, _headers = get_deals_id_investors_investor_id_payments_express_wire_instructions_with_http_info(id, investor_id, opts)
      data
    end

    # Displays the express wire instructions for an investor on a deal
    # Get express wire instructions
    # @param id [Integer] 
    # @param investor_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesExpressWireInstruction, Integer, Hash)>] V1EntitiesExpressWireInstruction data, response status code and response headers
    def get_deals_id_investors_investor_id_payments_express_wire_instructions_with_http_info(id, investor_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_deals_id_investors_investor_id_payments_express_wire_instructions ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling DefaultApi.get_deals_id_investors_investor_id_payments_express_wire_instructions"
      end
      # verify the required parameter 'investor_id' is set
      if @api_client.config.client_side_validation && investor_id.nil?
        fail ArgumentError, "Missing the required parameter 'investor_id' when calling DefaultApi.get_deals_id_investors_investor_id_payments_express_wire_instructions"
      end
      # resource path
      local_var_path = '/deals/{id}/investors/{investor_id}/payments/express_wire/instructions'.sub('{' + 'id' + '}', CGI.escape(id.to_s)).sub('{' + 'investor_id' + '}', CGI.escape(investor_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesExpressWireInstruction'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_deals_id_investors_investor_id_payments_express_wire_instructions",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_deals_id_investors_investor_id_payments_express_wire_instructions\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Displays the express wire instructions for all the investors on a deal
    # Get list of express wire instructions
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesExpressWireInstructions]
    def get_deals_id_investors_payments_express_wire_instructions(id, opts = {})
      data, _status_code, _headers = get_deals_id_investors_payments_express_wire_instructions_with_http_info(id, opts)
      data
    end

    # Displays the express wire instructions for all the investors on a deal
    # Get list of express wire instructions
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesExpressWireInstructions, Integer, Hash)>] V1EntitiesExpressWireInstructions data, response status code and response headers
    def get_deals_id_investors_payments_express_wire_instructions_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_deals_id_investors_payments_express_wire_instructions ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling DefaultApi.get_deals_id_investors_payments_express_wire_instructions"
      end
      # resource path
      local_var_path = '/deals/{id}/investors/payments/express_wire/instructions'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesExpressWireInstructions'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_deals_id_investors_payments_express_wire_instructions",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_deals_id_investors_payments_express_wire_instructions\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get the email domain settings for the deal
    # Get the email domain settings for the deal
    # @param id [Integer] The deal id.
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesDealsPlatformEmailsDomainSettings]
    def get_deals_id_platform_emails_domain(id, opts = {})
      data, _status_code, _headers = get_deals_id_platform_emails_domain_with_http_info(id, opts)
      data
    end

    # Get the email domain settings for the deal
    # Get the email domain settings for the deal
    # @param id [Integer] The deal id.
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesDealsPlatformEmailsDomainSettings, Integer, Hash)>] V1EntitiesDealsPlatformEmailsDomainSettings data, response status code and response headers
    def get_deals_id_platform_emails_domain_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_deals_id_platform_emails_domain ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling DefaultApi.get_deals_id_platform_emails_domain"
      end
      # resource path
      local_var_path = '/deals/{id}/platform_emails/domain'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesDealsPlatformEmailsDomainSettings'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_deals_id_platform_emails_domain",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_deals_id_platform_emails_domain\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get deal progress
    # Get deal progress
    # @param id [Integer] The deal id.
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesDealsProgress]
    def get_deals_id_progress_page(id, opts = {})
      data, _status_code, _headers = get_deals_id_progress_page_with_http_info(id, opts)
      data
    end

    # Get deal progress
    # Get deal progress
    # @param id [Integer] The deal id.
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesDealsProgress, Integer, Hash)>] V1EntitiesDealsProgress data, response status code and response headers
    def get_deals_id_progress_page_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_deals_id_progress_page ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling DefaultApi.get_deals_id_progress_page"
      end
      # resource path
      local_var_path = '/deals/{id}/progress_page'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesDealsProgress'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_deals_id_progress_page",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_deals_id_progress_page\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get the deal progress summary
    # Get the deal progress summary
    # @param id [Integer] The deal id.
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesDealsProgressPageSummary]
    def get_deals_id_progress_page_summary(id, opts = {})
      data, _status_code, _headers = get_deals_id_progress_page_summary_with_http_info(id, opts)
      data
    end

    # Get the deal progress summary
    # Get the deal progress summary
    # @param id [Integer] The deal id.
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesDealsProgressPageSummary, Integer, Hash)>] V1EntitiesDealsProgressPageSummary data, response status code and response headers
    def get_deals_id_progress_page_summary_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_deals_id_progress_page_summary ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling DefaultApi.get_deals_id_progress_page_summary"
      end
      # resource path
      local_var_path = '/deals/{id}/progress_page/summary'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesDealsProgressPageSummary'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_deals_id_progress_page_summary",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_deals_id_progress_page_summary\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get Deal Overview
    # Get Deal Overview
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [nil]
    def get_deals_id_summary(id, opts = {})
      get_deals_id_summary_with_http_info(id, opts)
      nil
    end

    # Get Deal Overview
    # Get Deal Overview
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(nil, Integer, Hash)>] nil, response status code and response headers
    def get_deals_id_summary_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_deals_id_summary ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling DefaultApi.get_deals_id_summary"
      end
      # resource path
      local_var_path = '/deals/{id}/summary'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type]

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_deals_id_summary",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_deals_id_summary\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get initial questions
    # Get initial questions
    # @param [Hash] opts the optional parameters
    # @return [nil]
    def get_deals_payment_onboarding_questionnaire_initial_questions(opts = {})
      get_deals_payment_onboarding_questionnaire_initial_questions_with_http_info(opts)
      nil
    end

    # Get initial questions
    # Get initial questions
    # @param [Hash] opts the optional parameters
    # @return [Array<(nil, Integer, Hash)>] nil, response status code and response headers
    def get_deals_payment_onboarding_questionnaire_initial_questions_with_http_info(opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_deals_payment_onboarding_questionnaire_initial_questions ...'
      end
      # resource path
      local_var_path = '/deals/payment_onboarding/questionnaire/initial_questions'

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type]

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_deals_payment_onboarding_questionnaire_initial_questions",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_deals_payment_onboarding_questionnaire_initial_questions\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Returns a list of webhook subscription which is associated to the user
    # Returns a list of webhook subscription
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page Page offset to fetch. (default to 1)
    # @option opts [Integer] :per_page Number of results to return per page. (default to 25)
    # @option opts [Integer] :offset Pad a number of results. (default to 0)
    # @return [V1EntitiesWebhooksSubscription]
    def get_webhooks(opts = {})
      data, _status_code, _headers = get_webhooks_with_http_info(opts)
      data
    end

    # Returns a list of webhook subscription which is associated to the user
    # Returns a list of webhook subscription
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page Page offset to fetch. (default to 1)
    # @option opts [Integer] :per_page Number of results to return per page. (default to 25)
    # @option opts [Integer] :offset Pad a number of results. (default to 0)
    # @return [Array<(V1EntitiesWebhooksSubscription, Integer, Hash)>] V1EntitiesWebhooksSubscription data, response status code and response headers
    def get_webhooks_with_http_info(opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_webhooks ...'
      end
      # resource path
      local_var_path = '/webhooks'

      # query parameters
      query_params = opts[:query_params] || {}
      query_params[:'page'] = opts[:'page'] if !opts[:'page'].nil?
      query_params[:'per_page'] = opts[:'per_page'] if !opts[:'per_page'].nil?
      query_params[:'offset'] = opts[:'offset'] if !opts[:'offset'].nil?

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesWebhooksSubscription'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_webhooks",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_webhooks\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Finds a deal using the id
    # Returns a deal
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesWebhooksDeal]
    def get_webhooks_deal_id(id, opts = {})
      data, _status_code, _headers = get_webhooks_deal_id_with_http_info(id, opts)
      data
    end

    # Finds a deal using the id
    # Returns a deal
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesWebhooksDeal, Integer, Hash)>] V1EntitiesWebhooksDeal data, response status code and response headers
    def get_webhooks_deal_id_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_webhooks_deal_id ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling DefaultApi.get_webhooks_deal_id"
      end
      # resource path
      local_var_path = '/webhooks/deal/{id}'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesWebhooksDeal'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_webhooks_deal_id",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_webhooks_deal_id\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Searches for deals for a given user
    # Searches for deals for a given user
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesWebhooksSecurityToken]
    def get_webhooks_deals_search(opts = {})
      data, _status_code, _headers = get_webhooks_deals_search_with_http_info(opts)
      data
    end

    # Searches for deals for a given user
    # Searches for deals for a given user
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesWebhooksSecurityToken, Integer, Hash)>] V1EntitiesWebhooksSecurityToken data, response status code and response headers
    def get_webhooks_deals_search_with_http_info(opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_webhooks_deals_search ...'
      end
      # resource path
      local_var_path = '/webhooks/deals/search'

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesWebhooksSecurityToken'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_webhooks_deals_search",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_webhooks_deals_search\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Creates a new security token for webhook subscription
    # Creates a new security token for webhook subscription
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesWebhooksSecurityToken]
    def get_webhooks_security_token(opts = {})
      data, _status_code, _headers = get_webhooks_security_token_with_http_info(opts)
      data
    end

    # Creates a new security token for webhook subscription
    # Creates a new security token for webhook subscription
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesWebhooksSecurityToken, Integer, Hash)>] V1EntitiesWebhooksSecurityToken data, response status code and response headers
    def get_webhooks_security_token_with_http_info(opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.get_webhooks_security_token ...'
      end
      # resource path
      local_var_path = '/webhooks/security_token'

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesWebhooksSecurityToken'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.get_webhooks_security_token",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#get_webhooks_security_token\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Submit a payout account details form
    # Submit a payout account details form
    # @param deal_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult]
    def post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit(deal_id, opts = {})
      data, _status_code, _headers = post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit_with_http_info(deal_id, opts)
      data
    end

    # Submit a payout account details form
    # Submit a payout account details form
    # @param deal_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult, Integer, Hash)>] V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult data, response status code and response headers
    def post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit_with_http_info(deal_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit ...'
      end
      # verify the required parameter 'deal_id' is set
      if @api_client.config.client_side_validation && deal_id.nil?
        fail ArgumentError, "Missing the required parameter 'deal_id' when calling DefaultApi.post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit"
      end
      # resource path
      local_var_path = '/deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/submit'.sub('{' + 'deal_id' + '}', CGI.escape(deal_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Submit a qualification questionnaire response
    # Submit a qualification questionnaire response
    # @param deal_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [nil]
    def post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit(deal_id, opts = {})
      post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit_with_http_info(deal_id, opts)
      nil
    end

    # Submit a qualification questionnaire response
    # Submit a qualification questionnaire response
    # @param deal_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(nil, Integer, Hash)>] nil, response status code and response headers
    def post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit_with_http_info(deal_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit ...'
      end
      # verify the required parameter 'deal_id' is set
      if @api_client.config.client_side_validation && deal_id.nil?
        fail ArgumentError, "Missing the required parameter 'deal_id' when calling DefaultApi.post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit"
      end
      # resource path
      local_var_path = '/deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/response/submit'.sub('{' + 'deal_id' + '}', CGI.escape(deal_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type]

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Submit a qualification questionnaire form
    # Submit a qualification questionnaire form
    # @param deal_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult]
    def post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit(deal_id, opts = {})
      data, _status_code, _headers = post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit_with_http_info(deal_id, opts)
      data
    end

    # Submit a qualification questionnaire form
    # Submit a qualification questionnaire form
    # @param deal_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult, Integer, Hash)>] V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult data, response status code and response headers
    def post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit_with_http_info(deal_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit ...'
      end
      # verify the required parameter 'deal_id' is set
      if @api_client.config.client_side_validation && deal_id.nil?
        fail ArgumentError, "Missing the required parameter 'deal_id' when calling DefaultApi.post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit"
      end
      # resource path
      local_var_path = '/deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/submit'.sub('{' + 'deal_id' + '}', CGI.escape(deal_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Request refund for investor transactions
    # Request refund for investor transactions
    # @param investor_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [nil]
    def post_investors_investor_id_transactions_request_refund_process(investor_id, opts = {})
      post_investors_investor_id_transactions_request_refund_process_with_http_info(investor_id, opts)
      nil
    end

    # Request refund for investor transactions
    # Request refund for investor transactions
    # @param investor_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(nil, Integer, Hash)>] nil, response status code and response headers
    def post_investors_investor_id_transactions_request_refund_process_with_http_info(investor_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.post_investors_investor_id_transactions_request_refund_process ...'
      end
      # verify the required parameter 'investor_id' is set
      if @api_client.config.client_side_validation && investor_id.nil?
        fail ArgumentError, "Missing the required parameter 'investor_id' when calling DefaultApi.post_investors_investor_id_transactions_request_refund_process"
      end
      # resource path
      local_var_path = '/investors/{investor_id}/transactions/request_refund/process'.sub('{' + 'investor_id' + '}', CGI.escape(investor_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type]

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.post_investors_investor_id_transactions_request_refund_process",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#post_investors_investor_id_transactions_request_refund_process\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Creates a webhook subscription which is associated to the user
    # Creates new webhook subscription
    # @param post_webhooks_request [PostWebhooksRequest] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesWebhooksSubscription]
    def post_webhooks(post_webhooks_request, opts = {})
      data, _status_code, _headers = post_webhooks_with_http_info(post_webhooks_request, opts)
      data
    end

    # Creates a webhook subscription which is associated to the user
    # Creates new webhook subscription
    # @param post_webhooks_request [PostWebhooksRequest] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesWebhooksSubscription, Integer, Hash)>] V1EntitiesWebhooksSubscription data, response status code and response headers
    def post_webhooks_with_http_info(post_webhooks_request, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.post_webhooks ...'
      end
      # verify the required parameter 'post_webhooks_request' is set
      if @api_client.config.client_side_validation && post_webhooks_request.nil?
        fail ArgumentError, "Missing the required parameter 'post_webhooks_request' when calling DefaultApi.post_webhooks"
      end
      # resource path
      local_var_path = '/webhooks'

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])
      # HTTP header 'Content-Type'
      content_type = @api_client.select_header_content_type(['application/json'])
      if !content_type.nil?
          header_params['Content-Type'] = content_type
      end

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body] || @api_client.object_to_http_body(post_webhooks_request)

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesWebhooksSubscription'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.post_webhooks",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#post_webhooks\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Updates webhook subscription and webhooks subcription deals
    # Updates webhook subscription
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @option opts [PutWebhooksIdRequest] :put_webhooks_id_request 
    # @return [V1EntitiesWebhooksSubscription]
    def put_webhooks_id(id, opts = {})
      data, _status_code, _headers = put_webhooks_id_with_http_info(id, opts)
      data
    end

    # Updates webhook subscription and webhooks subcription deals
    # Updates webhook subscription
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @option opts [PutWebhooksIdRequest] :put_webhooks_id_request 
    # @return [Array<(V1EntitiesWebhooksSubscription, Integer, Hash)>] V1EntitiesWebhooksSubscription data, response status code and response headers
    def put_webhooks_id_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: DefaultApi.put_webhooks_id ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling DefaultApi.put_webhooks_id"
      end
      # resource path
      local_var_path = '/webhooks/{id}'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])
      # HTTP header 'Content-Type'
      content_type = @api_client.select_header_content_type(['application/json'])
      if !content_type.nil?
          header_params['Content-Type'] = content_type
      end

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body] || @api_client.object_to_http_body(opts[:'put_webhooks_id_request'])

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesWebhooksSubscription'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"DefaultApi.put_webhooks_id",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:PUT, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: DefaultApi#put_webhooks_id\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end
  end
end
