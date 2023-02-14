=begin
#DealMaker API

## Introduction  Welcome to DealMaker’s Web API v1! This API is RESTful, easy to integrate with, and offers support in 2 different languages. This is the technical documentation for our API. There are tutorials and examples of integrations with our API available on our [knowledge centre](https://help.dealmaker.tech/training-centre) as well.  # Libraries  - Javascript - Ruby  # Authentication  To authenticate, add an Authorization header to your API request that contains an access token. Before you [generate an access token](#how-to-generate-an-access-token) your must first [create an application](#create-an-application) on your portal and retrieve the your client ID and secret  ## Create an Application  DealMaker’s Web API v1 supports the use of OAuth applications. Applications can be generated in your [account](https://app.dealmaker.tech/developer/applications).  To create an API Application, click on your user name in the top right corner to open a dropdown menu, and select \"Integrations\". Under the API settings tab, click the `Create New Application` button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-1.png)  Name your application and assign the level of permissions for this application  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-2.png)  Once your application is created, save in a secure space your client ID and secret.  **WARNING**: The secret key will not be visible after you click the close button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-3.png)  From the developer tab, you will be able to view and manage all the available applications  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-4.png)  Each Application consists of a client id, secret and set of scopes. The scopes define what resources you want to have access to. The client ID and secret are used to generate an access token. You will need to create an application to use API endpoints.  ## How to generate an access token  After creating an application, you must make a call to obtain a bearer token using the Generate an OAuth token operation. This operation requires the following parameters:  `token endpoint` - https://app.dealmaker.tech/oauth/token  `grant_type` - must be set to `client_credentials`  `client_id` - the Client ID displayed when you created the OAuth application in the previous step  `client_secret` - the Client Secret displayed when you created the OAuth application in the previous step  `scope` - the scope is established when you created the OAuth application in the previous step  Note: The Generate an OAuth token response specifies how long the bearer token is valid for. You should reuse the bearer token until it is expired. When the token is expired, call Generate an OAuth token again to generate a new one.  To use the access token, you must set a plain text header named `Authorization` with the contents of the header being “Bearer XXX” where XXX is your generated access token.  ### Example  #### Postman  Here's an example on how to generate the access token with Postman, where `{{CLIENT_ID}}` and `{{CLIENT_SECRET}}` are the values generated after following the steps on [Create an Application](#create-an-application)  ![Get access token postman example](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/token-postman.png)  # Status Codes  ## Content-Type Header  All responses are returned in JSON format. We specify this by sending the Content-Type header.  ## Status Codes  Below is a table containing descriptions of the various status codes we currently support against various resources.  Sometimes your API call will generate an error. Here you will find additional information about what to expect if you don’t format your request properly, or we fail to properly process your request.  | Status Code | Description | | ----------- | ----------- | | `200`       | Success     | | `403`       | Forbidden   | | `404`       | Not found   |  # Pagination  Pagination is used to divide large responses is smaller portions (pages). By default, all endpoints return a maximum of 25 records per page. You can change the number of records on a per request basis by passing a `per_page` parameter in the request header parameters. The largest supported `per_page` parameter is 100.  When the response exceeds the `per_page` parameter, you can paginate through the records by increasing the `offset` parameter. Example: `offset=25` will return 25 records starting from 26th record. You may also paginate using the `page` parameter to indicate the page number you would like to show on the response.  Please review the table below for the input parameters  ## Inputs  | Parameter  | Description                                                                     | | ---------- | ------------------------------------------------------------------------------- | | `per_page` | Amount of records included on each page (Default is 25)                         | | `page`     | Page number                                                                     | | `offset`   | Amount of records offset on the API request where 0 represents the first record |  ## Response Headers  | Response Header | Description                                  | | --------------- | -------------------------------------------- | | `X-Total`       | Total number of records of response          | | `X-Total-Pages` | Total number of pages of response            | | `X-Per-Page`    | Total number of records per page of response | | `X-Page`        | Number of current page                       | | `X-Next-Page`   | Number of next page                          | | `X-Prev-Page`   | Number of previous page                      | | `X-Offset`      | Total number of records offset               |  # Search and Filtering (The q parameter)  The q optional parameter accepts a string as input and allows you to filter the request based on that string. Please note that search strings must be encoded according to ASCII. For example, \"john+investor&#64;dealmaker.tech\" should be passed as “john%2Binvestor%40dealmaker.tech”. There are two main ways to filter with it.  ## Keyword filtering  Some keywords allow you to filter investors based on a specific “scope” of the investors, for example using the string “Invited” will filter all investors with the status invited, and the keyword “Has attachments” will filter investors with attachments.  Here’s a list of possible keywords and the “scope” each one of the keywords filters by:  | Keywords                                       | Scope                                                                       | Decoded Example                                                      | Encoded Example                                                                          | | ---------------------------------------------- | --------------------------------------------------------------------------- | -------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | | Signed on \\(date range\\)                       | Investors who signed in the provided date range                             | Signed on (date range) [2020-07-01:2020-07-31]                       | `Signed%20on%20%28date%20range%29%20%5B2020-07-01%3A2020-07-31%5D`                       | | Enabled for countersignature on \\(date range\\) | Investors who were enabled for counter signature in the provided date range | Enabled for countersignature on (date range) [2022-05-24:2022-05-25] | `Enabled%20for%20countersignature%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D` | | Accepted on \\(date range\\)                     | Investors accepted in the provided date rage                                | Accepted on (date range) [2022-05-24:2022-05-25]                     | `Accepted%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D`                         | | Offline                                        | Investors added to the deal offline                                         | Offline                                                              | `Offline`                                                                                | | Online                                         | Investors added to the deal online                                          | Online                                                               | `Online`                                                                                 | | Signed                                         | Investors who signed their agreement                                        | Signed                                                               | `Signed`                                                                                 | | Waiting for countersignature                   | Investors who have signed and are waiting for counter signature             | Waiting for countersignature                                         | `Waiting%20for%20countersignature`                                                       | | Invited                                        | Investors on the Invited Status                                             | Invited                                                              | `Invited`                                                                                | | Accepted                                       | Investors in the Accepted Status                                            | Accepted                                                             | `Accepted`                                                                               | | Questionnaire in progress                      | All Investors who have not finished completing the questionnaire            | Questionnaire in progress                                            | `Questionnaire%20in%20progress`                                                          | | Has attachments                                | All Investors with attachments                                              | Has attachments                                                      | `Has%20attachments`                                                                      | | Has notes                                      | All Investors with notes                                                    | Has notes                                                            | `Has%20notes`                                                                            | | Waiting for co-signature                       | Investors who have signed and are waiting for co-signature                  | Waiting for co-signature                                             | `Waiting%20for%20co-signature`                                                           | | Background Check Approved                      | Investors with approved background check                                    | Background Check Approved                                            | `Background%20Check%20Approved`                                                          | | Document Review Pending                        | Investors with pending review                                               | Document Review Pending                                              | `Document%20Review%20Pending`                                                            | | Document Upload Pending                        | Investors with pending documents to upload                                  | Document Upload Pending                                              | `Document%20Upload%20Pending`                                                            | | Required adjudicator review                    | Investors who are required to be review by the adjudicator                  | Required adjudicator review                                          | `Required%20adjudicator%20review`                                                        |  ---  **NOTE**  Filtering keywords are case sensitive and need to be encoded  ---  ## Search String  Any value for the parameter which does not match one of the keywords listed above, will use fields like `first name`, `last name`, `email`, `tags` to search for the investor.  For example, if you search “Robert”, because this does not match one of the keywords listed above, it will then return any investors who have the string “Robert” in their name, email, or tags fields.  # Versioning  The latest version is v1.  The version can be updated on the `Accept` header, just set the version as stated on the following example:  ```  Accept:application/vnd.dealmaker-v1+json  ```  | Version | Accept Header                       | | ------- | ----------------------------------- | | `v1`    | application/vnd.dealmaker-`v1`+json |  # SDK’s  For instruction on installing SDKs, please view the following links  - [Javascript](https://github.com/DealMakerTech/api/tree/main/v1/clients/javascript) - [Ruby](https://github.com/DealMakerTech/api/tree/main/v1/clients/ruby)  # Webhooks  Our webhooks functionality allows clients to automatically receive updates on a deal's investor data.  The type of data that the webhooks include:  - Investor Name - Date created - Email - Phone - Allocation - Attachments - Accredited investor status - Accredited investor category - Status (Draft, Invited, Accepted, Waiting)  Via webhooks clients can subscribe to the following events as they happen on Dealmaker:  - Investor is created - Investor details are updated (any of the investor details above change or are updated) - Investor is deleted  A URL supplied by the client will receive all the events with the information as part of the payload. Clients are able to add and update the URL within DealMaker.  ## Configuration  For a comprehensive guide on how to configure Webhooks please visit our support article: [Configuring Webhooks on DealMaker – DealMaker Support](https://help.dealmaker.tech/configuring-webhooks-on-dealmaker).  As a developer user on DealMaker, you are able to configure webhooks by following the steps below:  1. Sign into Dealmaker 2. Go to **“Your profile”** in the top right corner 3. Access an **“Integrations”** configuration via the left menu 4. The developer configures webhooks by including:    - The HTTPS URL where the request will be sent    - Optionally, a security token that we would use to build a SHA1 hash that would be included in the request headers. The name of the header is `X-DealMaker-Signature`. If the secret is not specified, the hash won’t be included in the headers.    - An email address that will be used to notify about errors. 5. The developers can disable webhooks temporarily if needed  ## Specification  ### Events  The initial set of events will be related to the investor. The events are:  1. `investor.created`     - Triggers every time a new investor is added to a deal  2. `investor.updated`     - Triggers on updates to any of the following fields:      1. Status      2. Name      3. Email - (this is a user field so we trigger event for all investors with webhook subscription)      4. Allocated Amount      5. Investment Amount      6. Accredited investor fields      7. Adding or removing attachments      8. Tags    - When the investor status is signed, the payload also includes a link to the signed document; the link expires after 30 minutes  3. `investor.deleted`     - Triggers when the investor is removed from the deal    - The investor key of the payload only includes investor ID    - The deal is not included in the payload. Due to our implementation it’s impossible to retrieve the deal the investor was part of  ### Requests  - The request is a `POST` - The payload’s `content-type` is `application/json` - Only `2XX` responses are considered successful. In the event of a different response, we consider it failed and queue the event for retry - We retry the request five times, after the initial attempt. Doubling the waiting time between intervals with each try. The first retry happens after 30 seconds, then 60 seconds, 2 mins, 4 minutes, and 8 minutes. This timing scheme gives the receiver about 1 hour if all the requests fail - If an event fails all the attempts to be delivered, we send an email to the address that the user configured  ### Payload  #### Common Properties  There will be some properties that are common to all the events on the system.  | Key               | Type   | Description                                                                            | | ----------------- | ------ | -------------------------------------------------------------------------------------- | | event             | String | The event that triggered the call                                                      | | event_id          | String | A unique identifier for the event                                                      | | deal<sup>\\*</sup> | Object | The deal in which the event occurred. It includes id, title, created_at and updated_at |  <sup>\\*</sup>This field is not included when deleting a resource  #### Common Properties (investor scope)  Every event on this scope must contain an investor object, here are some properties that are common to this object on all events in the investor scope:  | Key                 | Type             | Description                                                                                                              | | ------------------- | ---------------- | ------------------------------------------------------------------------------------------------------------------------ | | id                  | Integer          | The unique ID of the Investor                                                                                            | | name                | String           | Investor’s Name                                                                                                          | | status              | String           | Current status of the investor<br />Possible states are: <br />draft<br />invited<br />signed<br />waiting<br />accepted | | email               | String           |                                                                                                                          | | phone_number        | String           |                                                                                                                          | | investment_amount   | Double           |                                                                                                                          | | allocated_amount    | Double           |                                                                                                                          | | accredited_investor | Object           | See format in respective ticket                                                                                          | | attachments         | Array of Objects | List of supporting documents uploaded to the investor, including URL (expire after 30 minutes) and title (caption)       | | funding_state       | String           | Investor’s current funding state (unfunded, underfunded, funded, overfunded)                                             | | funds_pending       | Boolean          | True if there are pending transactions, False otherwise                                                                  | | created_at          | Date             |                                                                                                                          | | updated_at          | Date             |                                                                                                                          | | tags                | Array of Strings | a list of the investor's tags, separated by comma.                                                                       |  ### investor.status >= signed Specific Properties  | Key                    | Type   | Description            | | ---------------------- | ------ | ---------------------- | | subscription_agreement | object | id, url (expiring URL) |  #### Investor Status  Here is a brief description of each investor state:  - **Draft:** the investor is added to the platform but hasn't been invited yet and cannot access the portal - **Invited:** the investor was added to the platform but hasn’t completed the questionnaire - **Signed:** the investor signed the document (needs approval from Lawyer or Reviewer before countersignature) - **Waiting:** the investor was approved for countersignature by any of the Lawyers or Reviewers in the deal - **Accepted:** the investor's agreement was countersigned by the Signatory  #### Update Delay  Given the high number of updates our platform performs on any investor, we’ve added a cool down period on update events that allows us to “group” updates and trigger only one every minute. In consequence, update events will be delivered 1 minute after the initial request was made and will include the latest version of the investor data at delivery time. 

The version of the OpenAPI document: 1.0.0

Generated by: https://openapi-generator.tech
OpenAPI Generator version: 6.4.0-SNAPSHOT

=end

require 'cgi'

module DealMakerAPI
  class InvestorApi
    attr_accessor :api_client

    def initialize(api_client = ApiClient.default)
      @api_client = api_client
    end
    # Create a deal investor
    # Create a single deal investor.
    # @param id [Integer] The deal id.
    # @param create_investor_request [CreateInvestorRequest] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesInvestor]
    def create_investor(id, create_investor_request, opts = {})
      data, _status_code, _headers = create_investor_with_http_info(id, create_investor_request, opts)
      data
    end

    # Create a deal investor
    # Create a single deal investor.
    # @param id [Integer] The deal id.
    # @param create_investor_request [CreateInvestorRequest] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesInvestor, Integer, Hash)>] V1EntitiesInvestor data, response status code and response headers
    def create_investor_with_http_info(id, create_investor_request, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: InvestorApi.create_investor ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling InvestorApi.create_investor"
      end
      # verify the required parameter 'create_investor_request' is set
      if @api_client.config.client_side_validation && create_investor_request.nil?
        fail ArgumentError, "Missing the required parameter 'create_investor_request' when calling InvestorApi.create_investor"
      end
      # resource path
      local_var_path = '/deals/{id}/investors'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

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
      post_body = opts[:debug_body] || @api_client.object_to_http_body(create_investor_request)

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesInvestor'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"InvestorApi.create_investor",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: InvestorApi#create_investor\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get a deal investor by id
    # Gets a single investor by the id.
    # @param id [Integer] The deal id.
    # @param investor_id [Integer] The investor id.
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesInvestor]
    def get_investor(id, investor_id, opts = {})
      data, _status_code, _headers = get_investor_with_http_info(id, investor_id, opts)
      data
    end

    # Get a deal investor by id
    # Gets a single investor by the id.
    # @param id [Integer] The deal id.
    # @param investor_id [Integer] The investor id.
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesInvestor, Integer, Hash)>] V1EntitiesInvestor data, response status code and response headers
    def get_investor_with_http_info(id, investor_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: InvestorApi.get_investor ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling InvestorApi.get_investor"
      end
      # verify the required parameter 'investor_id' is set
      if @api_client.config.client_side_validation && investor_id.nil?
        fail ArgumentError, "Missing the required parameter 'investor_id' when calling InvestorApi.get_investor"
      end
      # resource path
      local_var_path = '/deals/{id}/investors/{investor_id}'.sub('{' + 'id' + '}', CGI.escape(id.to_s)).sub('{' + 'investor_id' + '}', CGI.escape(investor_id.to_s))

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
      return_type = opts[:debug_return_type] || 'V1EntitiesInvestor'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"InvestorApi.get_investor",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: InvestorApi#get_investor\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # List deal investors
    # List deal investors according to the specified search criteria.
    # @param id [Integer] The deal id.
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page Page offset to fetch. (default to 1)
    # @option opts [Integer] :per_page Number of results to return per page. (default to 25)
    # @option opts [Integer] :offset Pad a number of results. (default to 0)
    # @option opts [Array<Integer>] :investor_ids An array of investor ids.
    # @option opts [String] :q The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering)
    # @return [V1EntitiesInvestors]
    def list_investors(id, opts = {})
      data, _status_code, _headers = list_investors_with_http_info(id, opts)
      data
    end

    # List deal investors
    # List deal investors according to the specified search criteria.
    # @param id [Integer] The deal id.
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page Page offset to fetch. (default to 1)
    # @option opts [Integer] :per_page Number of results to return per page. (default to 25)
    # @option opts [Integer] :offset Pad a number of results. (default to 0)
    # @option opts [Array<Integer>] :investor_ids An array of investor ids.
    # @option opts [String] :q The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering)
    # @return [Array<(V1EntitiesInvestors, Integer, Hash)>] V1EntitiesInvestors data, response status code and response headers
    def list_investors_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: InvestorApi.list_investors ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling InvestorApi.list_investors"
      end
      # resource path
      local_var_path = '/deals/{id}/investors'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}
      query_params[:'page'] = opts[:'page'] if !opts[:'page'].nil?
      query_params[:'per_page'] = opts[:'per_page'] if !opts[:'per_page'].nil?
      query_params[:'offset'] = opts[:'offset'] if !opts[:'offset'].nil?
      query_params[:'investor_ids'] = @api_client.build_collection_param(opts[:'investor_ids'], :csv) if !opts[:'investor_ids'].nil?
      query_params[:'q'] = opts[:'q'] if !opts[:'q'].nil?

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json'])

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesInvestors'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"InvestorApi.list_investors",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: InvestorApi#list_investors\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Patch a deal investor
    # Patch deal investor
    # @param id [Integer] The deal id.
    # @param investor_id [Integer] The investor id.
    # @param patch_investor_request [PatchInvestorRequest] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesInvestor]
    def patch_investor(id, investor_id, patch_investor_request, opts = {})
      data, _status_code, _headers = patch_investor_with_http_info(id, investor_id, patch_investor_request, opts)
      data
    end

    # Patch a deal investor
    # Patch deal investor
    # @param id [Integer] The deal id.
    # @param investor_id [Integer] The investor id.
    # @param patch_investor_request [PatchInvestorRequest] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesInvestor, Integer, Hash)>] V1EntitiesInvestor data, response status code and response headers
    def patch_investor_with_http_info(id, investor_id, patch_investor_request, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: InvestorApi.patch_investor ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling InvestorApi.patch_investor"
      end
      # verify the required parameter 'investor_id' is set
      if @api_client.config.client_side_validation && investor_id.nil?
        fail ArgumentError, "Missing the required parameter 'investor_id' when calling InvestorApi.patch_investor"
      end
      # verify the required parameter 'patch_investor_request' is set
      if @api_client.config.client_side_validation && patch_investor_request.nil?
        fail ArgumentError, "Missing the required parameter 'patch_investor_request' when calling InvestorApi.patch_investor"
      end
      # resource path
      local_var_path = '/deals/{id}/investors/{investor_id}'.sub('{' + 'id' + '}', CGI.escape(id.to_s)).sub('{' + 'investor_id' + '}', CGI.escape(investor_id.to_s))

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
      post_body = opts[:debug_body] || @api_client.object_to_http_body(patch_investor_request)

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesInvestor'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"InvestorApi.patch_investor",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:PATCH, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: InvestorApi#patch_investor\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Update a deal investor
    # Update deal investor
    # @param id [Integer] The deal id.
    # @param investor_id [Integer] The investor id.
    # @param [Hash] opts the optional parameters
    # @option opts [UpdateInvestorRequest] :update_investor_request 
    # @return [V1EntitiesInvestor]
    def update_investor(id, investor_id, opts = {})
      data, _status_code, _headers = update_investor_with_http_info(id, investor_id, opts)
      data
    end

    # Update a deal investor
    # Update deal investor
    # @param id [Integer] The deal id.
    # @param investor_id [Integer] The investor id.
    # @param [Hash] opts the optional parameters
    # @option opts [UpdateInvestorRequest] :update_investor_request 
    # @return [Array<(V1EntitiesInvestor, Integer, Hash)>] V1EntitiesInvestor data, response status code and response headers
    def update_investor_with_http_info(id, investor_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: InvestorApi.update_investor ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling InvestorApi.update_investor"
      end
      # verify the required parameter 'investor_id' is set
      if @api_client.config.client_side_validation && investor_id.nil?
        fail ArgumentError, "Missing the required parameter 'investor_id' when calling InvestorApi.update_investor"
      end
      # resource path
      local_var_path = '/deals/{id}/investors/{investor_id}'.sub('{' + 'id' + '}', CGI.escape(id.to_s)).sub('{' + 'investor_id' + '}', CGI.escape(investor_id.to_s))

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
      post_body = opts[:debug_body] || @api_client.object_to_http_body(opts[:'update_investor_request'])

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesInvestor'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"InvestorApi.update_investor",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:PUT, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: InvestorApi#update_investor\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end
  end
end
