=begin
#DealMaker API

## Introduction  Welcome to DealMaker’s Web API v1! This API is RESTful, easy to integrate with, and offers support in 2 different languages. This is the technical documentation for our API. There are tutorials and examples of integrations with our API available on our [knowledge centre](https://help.dealmaker.tech/training-centre) as well.  # Libraries  - Javascript - Ruby  # Authentication  To authenticate, add an Authorization header to your API request that contains an access token. Before you [generate an access token](#how-to-generate-an-access-token) your must first [create an application](#create-an-application) on your portal and retrieve the your client ID and secret  ## Create an Application  DealMaker’s Web API v1 supports the use of OAuth applications. Applications can be generated in your [account](https://app.dealmaker.tech/developer/applications).  To create an API Application, click on your user name in the top right corner to open a dropdown menu, and select \"Integrations\". Under the API settings tab, click the `Create New Application` button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-1.png)  Name your application and assign the level of permissions for this application  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-2.png)  Once your application is created, save in a secure space your client ID and secret.  **WARNING**: The secret key will not be visible after you click the close button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-3.png)  From the developer tab, you will be able to view and manage all the available applications  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-4.png)  Each Application consists of a client id, secret and set of scopes. The scopes define what resources you want to have access to. The client ID and secret are used to generate an access token. You will need to create an application to use API endpoints.  ## How to generate an access token  After creating an application, you must make a call to obtain a bearer token using the Generate an OAuth token operation. This operation requires the following parameters:  `token endpoint` - https://app.dealmaker.tech/oauth/token  `grant_type` - must be set to `client_credentials`  `client_id` - the Client ID displayed when you created the OAuth application in the previous step  `client_secret` - the Client Secret displayed when you created the OAuth application in the previous step  `scope` - the scope is established when you created the OAuth application in the previous step  Note: The Generate an OAuth token response specifies how long the bearer token is valid for. You should reuse the bearer token until it is expired. When the token is expired, call Generate an OAuth token again to generate a new one.  To use the access token, you must set a plain text header named `Authorization` with the contents of the header being “Bearer XXX” where XXX is your generated access token.  ### Example  #### Postman  Here's an example on how to generate the access token with Postman, where `{{CLIENT_ID}}` and `{{CLIENT_SECRET}}` are the values generated after following the steps on [Create an Application](#create-an-application)  ![Get access token postman example](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/token-postman.png)  # Status Codes  ## Content-Type Header  All responses are returned in JSON format. We specify this by sending the Content-Type header.  ## Status Codes  Below is a table containing descriptions of the various status codes we currently support against various resources.  Sometimes your API call will generate an error. Here you will find additional information about what to expect if you don’t format your request properly, or we fail to properly process your request.  | Status Code | Description | | ----------- | ----------- | | `200`       | Success     | | `403`       | Forbidden   | | `404`       | Not found   |  # Pagination  Pagination is used to divide large responses is smaller portions (pages). By default, all endpoints return a maximum of 25 records per page. You can change the number of records on a per request basis by passing a `per_page` parameter in the request header parameters. The largest supported `per_page` parameter is 100.  When the response exceeds the `per_page` parameter, you can paginate through the records by increasing the `offset` parameter. Example: `offset=25` will return 25 records starting from 26th record. You may also paginate using the `page` parameter to indicate the page number you would like to show on the response.  Please review the table below for the input parameters  ## Inputs  | Parameter  | Description                                                                     | | ---------- | ------------------------------------------------------------------------------- | | `per_page` | Amount of records included on each page (Default is 25)                         | | `page`     | Page number                                                                     | | `offset`   | Amount of records offset on the API request where 0 represents the first record |  ## Response Headers  | Response Header | Description                                  | | --------------- | -------------------------------------------- | | `X-Total`       | Total number of records of response          | | `X-Total-Pages` | Total number of pages of response            | | `X-Per-Page`    | Total number of records per page of response | | `X-Page`        | Number of current page                       | | `X-Next-Page`   | Number of next page                          | | `X-Prev-Page`   | Number of previous page                      | | `X-Offset`      | Total number of records offset               |  # Search and Filtering (The q parameter)  The q optional parameter accepts a string as input and allows you to filter the request based on that string. Please note that search strings must be encoded according to ASCII. For example, \"john+investor&#64;dealmaker.tech\" should be passed as “john%2Binvestor%40dealmaker.tech”. There are two main ways to filter with it.  ## Keyword filtering  Some keywords allow you to filter investors based on a specific “scope” of the investors, for example using the string “Invited” will filter all investors with the status invited, and the keyword “Has attachments” will filter investors with attachments.  Here’s a list of possible keywords and the “scope” each one of the keywords filters by:  | Keywords                                       | Scope                                                                       | Decoded Example                                                      | Encoded Example                                                                          | | ---------------------------------------------- | --------------------------------------------------------------------------- | -------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | | Signed on \\(date range\\)                       | Investors who signed in the provided date range                             | Signed on (date range) [2020-07-01:2020-07-31]                       | `Signed%20on%20%28date%20range%29%20%5B2020-07-01%3A2020-07-31%5D`                       | | Enabled for countersignature on \\(date range\\) | Investors who were enabled for counter signature in the provided date range | Enabled for countersignature on (date range) [2022-05-24:2022-05-25] | `Enabled%20for%20countersignature%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D` | | Accepted on \\(date range\\)                     | Investors accepted in the provided date rage                                | Accepted on (date range) [2022-05-24:2022-05-25]                     | `Accepted%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D`                         | | Offline                                        | Investors added to the deal offline                                         | Offline                                                              | `Offline`                                                                                | | Online                                         | Investors added to the deal online                                          | Online                                                               | `Online`                                                                                 | | Signed                                         | Investors who signed their agreement                                        | Signed                                                               | `Signed`                                                                                 | | Waiting for countersignature                   | Investors who have signed and are waiting for counter signature             | Waiting for countersignature                                         | `Waiting%20for%20countersignature`                                                       | | Invited                                        | Investors on the Invited Status                                             | Invited                                                              | `Invited`                                                                                | | Accepted                                       | Investors in the Accepted Status                                            | Accepted                                                             | `Accepted`                                                                               | | Questionnaire in progress                      | All Investors who have not finished completing the questionnaire            | Questionnaire in progress                                            | `Questionnaire%20in%20progress`                                                          | | Has attachments                                | All Investors with attachments                                              | Has attachments                                                      | `Has%20attachments`                                                                      | | Has notes                                      | All Investors with notes                                                    | Has notes                                                            | `Has%20notes`                                                                            | | Waiting for co-signature                       | Investors who have signed and are waiting for co-signature                  | Waiting for co-signature                                             | `Waiting%20for%20co-signature`                                                           | | Background Check Approved                      | Investors with approved background check                                    | Background Check Approved                                            | `Background%20Check%20Approved`                                                          | | Document Review Pending                        | Investors with pending review                                               | Document Review Pending                                              | `Document%20Review%20Pending`                                                            | | Document Upload Pending                        | Investors with pending documents to upload                                  | Document Upload Pending                                              | `Document%20Upload%20Pending`                                                            | | Required adjudicator review                    | Investors who are required to be review by the adjudicator                  | Required adjudicator review                                          | `Required%20adjudicator%20review`                                                        |  ---  **NOTE**  Filtering keywords are case sensitive and need to be encoded  ---  ## Search String  Any value for the parameter which does not match one of the keywords listed above, will use fields like `first name`, `last name`, `email`, `tags` to search for the investor.  For example, if you search “Robert”, because this does not match one of the keywords listed above, it will then return any investors who have the string “Robert” in their name, email, or tags fields.  # Versioning  The latest version is v1.  The version can be updated on the `Accept` header, just set the version as stated on the following example:  ```  Accept:application/vnd.dealmaker-v1+json  ```  | Version | Accept Header                       | | ------- | ----------------------------------- | | `v1`    | application/vnd.dealmaker-`v1`+json |  # SDK’s  For instruction on installing SDKs, please view the following links  - [Javascript](https://github.com/DealMakerTech/api/tree/main/v1/clients/javascript) - [Ruby](https://github.com/DealMakerTech/api/tree/main/v1/clients/ruby)  # Webhooks  Our webhooks functionality allows clients to automatically receive updates on a deal's investor data.  Some of the data that the webhooks include:  - Investor Name - Date created - Email - Phone - Allocation - Attachments - Accredited investor status - Accredited investor category - State (Draft, Invited, Signed, Accepted, Waiting, Inactive)  Via webhooks clients can subscribe to the following events as they happen on Dealmaker:  - Investor is created - Investor details are updated (any of the investor details above change or are updated) - Investor has signed their agreement - Invertor fully funded their investment - Investor has been accepted - Investor is deleted  A URL supplied by the client will receive all the events with the information as part of the payload. Clients are able to add and update the URL within DealMaker.  ## Configuration  For a comprehensive guide on how to configure Webhooks please visit our support article: [Configuring Webhooks on DealMaker – DealMaker Support](https://help.dealmaker.tech/configuring-webhooks-on-dealmaker).  As a developer user on DealMaker, you are able to configure webhooks by following the steps below:  1. Sign into Dealmaker 2. Go to **“Your profile”** in the top right corner 3. Access an **“Integrations”** configuration via the left menu 4. The developer configures webhooks by including:    - The HTTPS URL where the request will be sent    - Optionally, a security token that we would use to build a SHA1 hash that would be included in the request headers. The name of the header is `X-DealMaker-Signature`. If the secret is not specified, the hash won’t be included in the headers.    - The Deal(s) to include in the webhook subscription    - An email address that will be used to notify about errors. 5. The developers can disable webhooks temporarily if needed  ## Specification  ### Events  The initial set of events will be related to the investor. The events are:  1. `investor.created`     - Triggers every time a new investor is added to a deal  2. `investor.updated`     - Triggers on updates to any of the following fields:      - Status      - Name      - Email - (this is a user field so we trigger event for all investors with webhook subscription)      - Allocated Amount      - Investment Amount      - Accredited investor fields      - Adding or removing attachments      - Tags    - When the investor status is signed, the payload also includes a link to the signed document; the link expires after 30 minutes    3. `investor.signed`     - Triggers when the investor signs their subscription agreement (terms and conditions)      - When this happens the investor.state becomes `signed`    - This event includes the same fields as the `investor.updated` event  4. `investor.funded`     - Triggers when the investor becomes fully funded      - This happens when the investor.funded_state becomes `funded`    - This event includes the same fields as the `investor.updated` event  5. `investor.accepted`     - Triggers when the investor is countersigned      - When this happens the investor.state becomes `accepted`    - This event includes the same fields as the `investor.updated` event  6.  `investor.deleted`     - Triggers when the investor is removed from the deal    - The investor key of the payload only includes investor ID    - The deal is not included in the payload. Due to our implementation it’s impossible to retrieve the deal the investor was part of  ### Requests  - The request is a `POST` - The payload’s `content-type` is `application/json` - Only `2XX` responses are considered successful. In the event of a different response, we consider it failed and queue the event for retry - We retry the request five times, after the initial attempt. Doubling the waiting time between intervals with each try. The first retry happens after 30 seconds, then 60 seconds, 2 mins, 4 minutes, and 8 minutes. This timing scheme gives the receiver about 1 hour if all the requests fail - If an event fails all the attempts to be delivered, we send an email to the address that the user configured  ### Payload  #### Common Properties  There will be some properties that are common to all the events on the system.  | Key               | Type   | Description                                                                              | | ----------------- | ------ | --------------------------------------------------------------------------------------   | | event             | String | The event that triggered the call                                                        | | event_id          | String | A unique identifier for the event                                                        | | deal<sup>\\*</sup> | Object | The deal in which the event occurred. please see below for an example on the deal object<sup>\\*\\*</sup> |  <sup>\\*</sup>This field is not included when deleting a resource  <sup>\\*\\*</sup> Sample Deal Object in the webhook payload  ```json \"deal\": {         \"id\": 0,         \"title\": \"string\",         \"created_at\": \"2022-12-06T18:14:44.000Z\",         \"updated_at\": \"2022-12-08T12:46:48.000Z\",         \"state\": \"string\",         \"currency\": \"string\",         \"security_type\": \"string\",         \"price_per_security\": 0.00,         \"deal_type\": \"string\",         \"minimum_investment\": 0,         \"maximum_investment\": 0,         \"issuer\": {             \"id\": 0,             \"name\": \"string\"         },         \"enterprise\": {             \"id\": 0,             \"name\": \"string\"         }     } ```  #### Common Properties (investor scope)  By design, we have incorporated on the webhooks payload the same investor-related fields included in the Investor model, for reference on the included fields, their types and values please click [here](https://docs.dealmaker.tech/#tag/investor_model). This will allow you to get all the necessary information you need about a particular investor without having to call the Get Investor by ID endpoint.                                                           | #### Investor State  Here is a brief description of each investor state:  - **Draft:** the investor is added to the platform but hasn't been invited yet and cannot access the portal - **Invited:** the investor was added to the platform but hasn’t completed the questionnaire - **Signed:** the investor signed the document (needs approval from Lawyer or Reviewer before countersignature) - **Waiting:** the investor was approved for countersignature by any of the Lawyers or Reviewers in the deal - **Accepted:** the investor's agreement was countersigned by the Signatory - **Inactive** the investor is no longer eligible to participate in the offering. This may be because their warrant expired, they requested a refund, or they opted out of the offering  #### Update Delay  Given the high number of updates our platform performs on any investor, we’ve added a cool down period on update events that allows us to “group” updates and trigger only one every minute. In consequence, update events will be delivered 1 minute after the initial request was made and will include the latest version of the investor data at delivery time. 

The version of the OpenAPI document: 1.75.0

Generated by: https://openapi-generator.tech
Generator version: 7.8.0-SNAPSHOT

=end

require 'cgi'

module DealMakerAPI
  class CompanyApi
    attr_accessor :api_client

    def initialize(api_client = ApiClient.default)
      @api_client = api_client
    end
    # Create bulk upload record
    # Create bulk upload record
    # @param id [Integer] The company id
    # @param create_bulk_upload_request [CreateBulkUploadRequest] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesBulkUpload]
    def create_bulk_upload(id, create_bulk_upload_request, opts = {})
      data, _status_code, _headers = create_bulk_upload_with_http_info(id, create_bulk_upload_request, opts)
      data
    end

    # Create bulk upload record
    # Create bulk upload record
    # @param id [Integer] The company id
    # @param create_bulk_upload_request [CreateBulkUploadRequest] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesBulkUpload, Integer, Hash)>] V1EntitiesBulkUpload data, response status code and response headers
    def create_bulk_upload_with_http_info(id, create_bulk_upload_request, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.create_bulk_upload ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.create_bulk_upload"
      end
      # verify the required parameter 'create_bulk_upload_request' is set
      if @api_client.config.client_side_validation && create_bulk_upload_request.nil?
        fail ArgumentError, "Missing the required parameter 'create_bulk_upload_request' when calling CompanyApi.create_bulk_upload"
      end
      # resource path
      local_var_path = '/companies/{id}/documents/bulk_uploads'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']
      # HTTP header 'Content-Type'
      content_type = @api_client.select_header_content_type(['application/json'])
      if !content_type.nil?
          header_params['Content-Type'] = content_type
      end

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body] || @api_client.object_to_http_body(create_bulk_upload_request)

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesBulkUpload'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.create_bulk_upload",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#create_bulk_upload\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Create a BulkUploadDetail class record
    # Create a BulkUploadDetail class record
    # @param bulk_upload_id [String] The Bulk upload ID from which detail is associated with
    # @param company_id [Integer] 
    # @param create_bulk_upload_detail_request [CreateBulkUploadDetailRequest] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesBulkUploadDetail]
    def create_bulk_upload_detail(bulk_upload_id, company_id, create_bulk_upload_detail_request, opts = {})
      data, _status_code, _headers = create_bulk_upload_detail_with_http_info(bulk_upload_id, company_id, create_bulk_upload_detail_request, opts)
      data
    end

    # Create a BulkUploadDetail class record
    # Create a BulkUploadDetail class record
    # @param bulk_upload_id [String] The Bulk upload ID from which detail is associated with
    # @param company_id [Integer] 
    # @param create_bulk_upload_detail_request [CreateBulkUploadDetailRequest] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesBulkUploadDetail, Integer, Hash)>] V1EntitiesBulkUploadDetail data, response status code and response headers
    def create_bulk_upload_detail_with_http_info(bulk_upload_id, company_id, create_bulk_upload_detail_request, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.create_bulk_upload_detail ...'
      end
      # verify the required parameter 'bulk_upload_id' is set
      if @api_client.config.client_side_validation && bulk_upload_id.nil?
        fail ArgumentError, "Missing the required parameter 'bulk_upload_id' when calling CompanyApi.create_bulk_upload_detail"
      end
      # verify the required parameter 'company_id' is set
      if @api_client.config.client_side_validation && company_id.nil?
        fail ArgumentError, "Missing the required parameter 'company_id' when calling CompanyApi.create_bulk_upload_detail"
      end
      # verify the required parameter 'create_bulk_upload_detail_request' is set
      if @api_client.config.client_side_validation && create_bulk_upload_detail_request.nil?
        fail ArgumentError, "Missing the required parameter 'create_bulk_upload_detail_request' when calling CompanyApi.create_bulk_upload_detail"
      end
      # resource path
      local_var_path = '/companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details'.sub('{' + 'bulk_upload_id' + '}', CGI.escape(bulk_upload_id.to_s)).sub('{' + 'company_id' + '}', CGI.escape(company_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']
      # HTTP header 'Content-Type'
      content_type = @api_client.select_header_content_type(['application/json'])
      if !content_type.nil?
          header_params['Content-Type'] = content_type
      end

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body] || @api_client.object_to_http_body(create_bulk_upload_detail_request)

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesBulkUploadDetail'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.create_bulk_upload_detail",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#create_bulk_upload_detail\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Create new company
    # Creates a new company.
    # @param create_company_request [CreateCompanyRequest] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesCompany]
    def create_company(create_company_request, opts = {})
      data, _status_code, _headers = create_company_with_http_info(create_company_request, opts)
      data
    end

    # Create new company
    # Creates a new company.
    # @param create_company_request [CreateCompanyRequest] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesCompany, Integer, Hash)>] V1EntitiesCompany data, response status code and response headers
    def create_company_with_http_info(create_company_request, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.create_company ...'
      end
      # verify the required parameter 'create_company_request' is set
      if @api_client.config.client_side_validation && create_company_request.nil?
        fail ArgumentError, "Missing the required parameter 'create_company_request' when calling CompanyApi.create_company"
      end
      # resource path
      local_var_path = '/companies'

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']
      # HTTP header 'Content-Type'
      content_type = @api_client.select_header_content_type(['application/json'])
      if !content_type.nil?
          header_params['Content-Type'] = content_type
      end

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body] || @api_client.object_to_http_body(create_company_request)

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesCompany'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.create_company",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#create_company\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Creates an email template
    # Create new email template
    # @param id [Integer] 
    # @param create_email_template_request [CreateEmailTemplateRequest] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesEmailTemplate]
    def create_email_template(id, create_email_template_request, opts = {})
      data, _status_code, _headers = create_email_template_with_http_info(id, create_email_template_request, opts)
      data
    end

    # Creates an email template
    # Create new email template
    # @param id [Integer] 
    # @param create_email_template_request [CreateEmailTemplateRequest] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesEmailTemplate, Integer, Hash)>] V1EntitiesEmailTemplate data, response status code and response headers
    def create_email_template_with_http_info(id, create_email_template_request, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.create_email_template ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.create_email_template"
      end
      # verify the required parameter 'create_email_template_request' is set
      if @api_client.config.client_side_validation && create_email_template_request.nil?
        fail ArgumentError, "Missing the required parameter 'create_email_template_request' when calling CompanyApi.create_email_template"
      end
      # resource path
      local_var_path = '/companies/{id}/news_releases/email_templates'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']
      # HTTP header 'Content-Type'
      content_type = @api_client.select_header_content_type(['application/json'])
      if !content_type.nil?
          header_params['Content-Type'] = content_type
      end

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body] || @api_client.object_to_http_body(create_email_template_request)

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesEmailTemplate'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.create_email_template",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#create_email_template\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Create bulk upload record
    # Create members bulk upload record
    # @param id [Integer] The company id
    # @param create_members_bulk_upload_request [CreateMembersBulkUploadRequest] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesMembersBulkUpload]
    def create_members_bulk_upload(id, create_members_bulk_upload_request, opts = {})
      data, _status_code, _headers = create_members_bulk_upload_with_http_info(id, create_members_bulk_upload_request, opts)
      data
    end

    # Create bulk upload record
    # Create members bulk upload record
    # @param id [Integer] The company id
    # @param create_members_bulk_upload_request [CreateMembersBulkUploadRequest] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesMembersBulkUpload, Integer, Hash)>] V1EntitiesMembersBulkUpload data, response status code and response headers
    def create_members_bulk_upload_with_http_info(id, create_members_bulk_upload_request, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.create_members_bulk_upload ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.create_members_bulk_upload"
      end
      # verify the required parameter 'create_members_bulk_upload_request' is set
      if @api_client.config.client_side_validation && create_members_bulk_upload_request.nil?
        fail ArgumentError, "Missing the required parameter 'create_members_bulk_upload_request' when calling CompanyApi.create_members_bulk_upload"
      end
      # resource path
      local_var_path = '/companies/{id}/members/bulk_uploads'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']
      # HTTP header 'Content-Type'
      content_type = @api_client.select_header_content_type(['application/json'])
      if !content_type.nil?
          header_params['Content-Type'] = content_type
      end

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body] || @api_client.object_to_http_body(create_members_bulk_upload_request)

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesMembersBulkUpload'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.create_members_bulk_upload",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#create_members_bulk_upload\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Create a shareholder action
    # Create a shareholder action
    # @param company_id [Integer] The company id
    # @param shareholder_id [Integer] The shareholder id
    # @param create_shareholder_action_request [CreateShareholderActionRequest] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesGenericResponse]
    def create_shareholder_action(company_id, shareholder_id, create_shareholder_action_request, opts = {})
      data, _status_code, _headers = create_shareholder_action_with_http_info(company_id, shareholder_id, create_shareholder_action_request, opts)
      data
    end

    # Create a shareholder action
    # Create a shareholder action
    # @param company_id [Integer] The company id
    # @param shareholder_id [Integer] The shareholder id
    # @param create_shareholder_action_request [CreateShareholderActionRequest] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesGenericResponse, Integer, Hash)>] V1EntitiesGenericResponse data, response status code and response headers
    def create_shareholder_action_with_http_info(company_id, shareholder_id, create_shareholder_action_request, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.create_shareholder_action ...'
      end
      # verify the required parameter 'company_id' is set
      if @api_client.config.client_side_validation && company_id.nil?
        fail ArgumentError, "Missing the required parameter 'company_id' when calling CompanyApi.create_shareholder_action"
      end
      # verify the required parameter 'shareholder_id' is set
      if @api_client.config.client_side_validation && shareholder_id.nil?
        fail ArgumentError, "Missing the required parameter 'shareholder_id' when calling CompanyApi.create_shareholder_action"
      end
      # verify the required parameter 'create_shareholder_action_request' is set
      if @api_client.config.client_side_validation && create_shareholder_action_request.nil?
        fail ArgumentError, "Missing the required parameter 'create_shareholder_action_request' when calling CompanyApi.create_shareholder_action"
      end
      # resource path
      local_var_path = '/companies/{company_id}/shareholders/{shareholder_id}/actions'.sub('{' + 'company_id' + '}', CGI.escape(company_id.to_s)).sub('{' + 'shareholder_id' + '}', CGI.escape(shareholder_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']
      # HTTP header 'Content-Type'
      content_type = @api_client.select_header_content_type(['application/json'])
      if !content_type.nil?
          header_params['Content-Type'] = content_type
      end

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body] || @api_client.object_to_http_body(create_shareholder_action_request)

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesGenericResponse'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.create_shareholder_action",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#create_shareholder_action\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Deletes an email template
    # Delete an email template
    # @param id [Integer] The company id
    # @param template_id [Integer] The email template id
    # @param [Hash] opts the optional parameters
    # @return [nil]
    def delete_email_template(id, template_id, opts = {})
      delete_email_template_with_http_info(id, template_id, opts)
      nil
    end

    # Deletes an email template
    # Delete an email template
    # @param id [Integer] The company id
    # @param template_id [Integer] The email template id
    # @param [Hash] opts the optional parameters
    # @return [Array<(nil, Integer, Hash)>] nil, response status code and response headers
    def delete_email_template_with_http_info(id, template_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.delete_email_template ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.delete_email_template"
      end
      # verify the required parameter 'template_id' is set
      if @api_client.config.client_side_validation && template_id.nil?
        fail ArgumentError, "Missing the required parameter 'template_id' when calling CompanyApi.delete_email_template"
      end
      # resource path
      local_var_path = '/companies/{id}/news_releases/email_templates/{template_id}'.sub('{' + 'id' + '}', CGI.escape(id.to_s)).sub('{' + 'template_id' + '}', CGI.escape(template_id.to_s))

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
        :operation => :"CompanyApi.delete_email_template",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:DELETE, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#delete_email_template\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Return a given bulk upload by id
    # Return a given bulk upload by id
    # @param id [Integer] 
    # @param bulk_upload_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page Page offset to fetch. (default to 1)
    # @option opts [Integer] :per_page Number of results to return per page. (default to 25)
    # @option opts [Integer] :offset Pad a number of results. (default to 0)
    # @return [V1EntitiesBulkUpload]
    def get_bulk_upload(id, bulk_upload_id, opts = {})
      data, _status_code, _headers = get_bulk_upload_with_http_info(id, bulk_upload_id, opts)
      data
    end

    # Return a given bulk upload by id
    # Return a given bulk upload by id
    # @param id [Integer] 
    # @param bulk_upload_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page Page offset to fetch. (default to 1)
    # @option opts [Integer] :per_page Number of results to return per page. (default to 25)
    # @option opts [Integer] :offset Pad a number of results. (default to 0)
    # @return [Array<(V1EntitiesBulkUpload, Integer, Hash)>] V1EntitiesBulkUpload data, response status code and response headers
    def get_bulk_upload_with_http_info(id, bulk_upload_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_bulk_upload ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.get_bulk_upload"
      end
      # verify the required parameter 'bulk_upload_id' is set
      if @api_client.config.client_side_validation && bulk_upload_id.nil?
        fail ArgumentError, "Missing the required parameter 'bulk_upload_id' when calling CompanyApi.get_bulk_upload"
      end
      # resource path
      local_var_path = '/companies/{id}/documents/bulk_uploads/{bulk_upload_id}'.sub('{' + 'id' + '}', CGI.escape(id.to_s)).sub('{' + 'bulk_upload_id' + '}', CGI.escape(bulk_upload_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}
      query_params[:'page'] = opts[:'page'] if !opts[:'page'].nil?
      query_params[:'per_page'] = opts[:'per_page'] if !opts[:'per_page'].nil?
      query_params[:'offset'] = opts[:'offset'] if !opts[:'offset'].nil?

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesBulkUpload'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_bulk_upload",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_bulk_upload\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc
    # Returns a full list of details with errors of the given bulk upload
    # @param company_id [Integer] 
    # @param bulk_upload_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesBulkUploadDetails]
    def get_bulk_upload_details_errors(company_id, bulk_upload_id, opts = {})
      data, _status_code, _headers = get_bulk_upload_details_errors_with_http_info(company_id, bulk_upload_id, opts)
      data
    end

    # Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc
    # Returns a full list of details with errors of the given bulk upload
    # @param company_id [Integer] 
    # @param bulk_upload_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesBulkUploadDetails, Integer, Hash)>] V1EntitiesBulkUploadDetails data, response status code and response headers
    def get_bulk_upload_details_errors_with_http_info(company_id, bulk_upload_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_bulk_upload_details_errors ...'
      end
      # verify the required parameter 'company_id' is set
      if @api_client.config.client_side_validation && company_id.nil?
        fail ArgumentError, "Missing the required parameter 'company_id' when calling CompanyApi.get_bulk_upload_details_errors"
      end
      # verify the required parameter 'bulk_upload_id' is set
      if @api_client.config.client_side_validation && bulk_upload_id.nil?
        fail ArgumentError, "Missing the required parameter 'bulk_upload_id' when calling CompanyApi.get_bulk_upload_details_errors"
      end
      # resource path
      local_var_path = '/companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/errors'.sub('{' + 'company_id' + '}', CGI.escape(company_id.to_s)).sub('{' + 'bulk_upload_id' + '}', CGI.escape(bulk_upload_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesBulkUploadDetails'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_bulk_upload_details_errors",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_bulk_upload_details_errors\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Return bulk uploads
    # Return bulk uploads
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page Page offset to fetch. (default to 1)
    # @option opts [Integer] :per_page Number of results to return per page. (default to 25)
    # @option opts [Integer] :offset Pad a number of results. (default to 0)
    # @return [V1EntitiesBulkUploads]
    def get_bulk_uploads(id, opts = {})
      data, _status_code, _headers = get_bulk_uploads_with_http_info(id, opts)
      data
    end

    # Return bulk uploads
    # Return bulk uploads
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page Page offset to fetch. (default to 1)
    # @option opts [Integer] :per_page Number of results to return per page. (default to 25)
    # @option opts [Integer] :offset Pad a number of results. (default to 0)
    # @return [Array<(V1EntitiesBulkUploads, Integer, Hash)>] V1EntitiesBulkUploads data, response status code and response headers
    def get_bulk_uploads_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_bulk_uploads ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.get_bulk_uploads"
      end
      # resource path
      local_var_path = '/companies/{id}/documents/bulk_uploads'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}
      query_params[:'page'] = opts[:'page'] if !opts[:'page'].nil?
      query_params[:'per_page'] = opts[:'per_page'] if !opts[:'per_page'].nil?
      query_params[:'offset'] = opts[:'offset'] if !opts[:'offset'].nil?

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesBulkUploads'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_bulk_uploads",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_bulk_uploads\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get list of Companies
    # Get companies
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page Page offset to fetch. (default to 1)
    # @option opts [Integer] :per_page Number of results to return per page. (default to 25)
    # @option opts [Integer] :offset Pad a number of results. (default to 0)
    # @return [V1EntitiesCompany]
    def get_companies(opts = {})
      data, _status_code, _headers = get_companies_with_http_info(opts)
      data
    end

    # Get list of Companies
    # Get companies
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page Page offset to fetch. (default to 1)
    # @option opts [Integer] :per_page Number of results to return per page. (default to 25)
    # @option opts [Integer] :offset Pad a number of results. (default to 0)
    # @return [Array<(V1EntitiesCompany, Integer, Hash)>] V1EntitiesCompany data, response status code and response headers
    def get_companies_with_http_info(opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_companies ...'
      end
      # resource path
      local_var_path = '/companies'

      # query parameters
      query_params = opts[:query_params] || {}
      query_params[:'page'] = opts[:'page'] if !opts[:'page'].nil?
      query_params[:'per_page'] = opts[:'per_page'] if !opts[:'per_page'].nil?
      query_params[:'offset'] = opts[:'offset'] if !opts[:'offset'].nil?

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesCompany'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_companies",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_companies\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get a Company
    # Get a Company.
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesCompany]
    def get_company(id, opts = {})
      data, _status_code, _headers = get_company_with_http_info(id, opts)
      data
    end

    # Get a Company
    # Get a Company.
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesCompany, Integer, Hash)>] V1EntitiesCompany data, response status code and response headers
    def get_company_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_company ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.get_company"
      end
      # resource path
      local_var_path = '/companies/{id}'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesCompany'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_company",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_company\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Return bulk upload details grouped by status
    # Return bulk upload details grouped by status
    # @param company_id [Integer] 
    # @param bulk_upload_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesBulkUploadDetails]
    def get_details_errors_grouped(company_id, bulk_upload_id, opts = {})
      data, _status_code, _headers = get_details_errors_grouped_with_http_info(company_id, bulk_upload_id, opts)
      data
    end

    # Return bulk upload details grouped by status
    # Return bulk upload details grouped by status
    # @param company_id [Integer] 
    # @param bulk_upload_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesBulkUploadDetails, Integer, Hash)>] V1EntitiesBulkUploadDetails data, response status code and response headers
    def get_details_errors_grouped_with_http_info(company_id, bulk_upload_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_details_errors_grouped ...'
      end
      # verify the required parameter 'company_id' is set
      if @api_client.config.client_side_validation && company_id.nil?
        fail ArgumentError, "Missing the required parameter 'company_id' when calling CompanyApi.get_details_errors_grouped"
      end
      # verify the required parameter 'bulk_upload_id' is set
      if @api_client.config.client_side_validation && bulk_upload_id.nil?
        fail ArgumentError, "Missing the required parameter 'bulk_upload_id' when calling CompanyApi.get_details_errors_grouped"
      end
      # resource path
      local_var_path = '/companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/grouped_errors'.sub('{' + 'company_id' + '}', CGI.escape(company_id.to_s)).sub('{' + 'bulk_upload_id' + '}', CGI.escape(bulk_upload_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesBulkUploadDetails'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_details_errors_grouped",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_details_errors_grouped\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Return dividends
    # Return dividends associated with a shareholder
    # @param company_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesDividends]
    def get_dividends(company_id, opts = {})
      data, _status_code, _headers = get_dividends_with_http_info(company_id, opts)
      data
    end

    # Return dividends
    # Return dividends associated with a shareholder
    # @param company_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesDividends, Integer, Hash)>] V1EntitiesDividends data, response status code and response headers
    def get_dividends_with_http_info(company_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_dividends ...'
      end
      # verify the required parameter 'company_id' is set
      if @api_client.config.client_side_validation && company_id.nil?
        fail ArgumentError, "Missing the required parameter 'company_id' when calling CompanyApi.get_dividends"
      end
      # resource path
      local_var_path = '/companies/{company_id}/portal/dividends'.sub('{' + 'company_id' + '}', CGI.escape(company_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesDividends'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_dividends",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_dividends\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get a list of email events for a company communication
    # Gets a list of email events for a specific company communication.
    # @param company_communication_id [Integer] The id of the company communication.
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesEmailEvents]
    def get_email_events(company_communication_id, opts = {})
      data, _status_code, _headers = get_email_events_with_http_info(company_communication_id, opts)
      data
    end

    # Get a list of email events for a company communication
    # Gets a list of email events for a specific company communication.
    # @param company_communication_id [Integer] The id of the company communication.
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesEmailEvents, Integer, Hash)>] V1EntitiesEmailEvents data, response status code and response headers
    def get_email_events_with_http_info(company_communication_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_email_events ...'
      end
      # verify the required parameter 'company_communication_id' is set
      if @api_client.config.client_side_validation && company_communication_id.nil?
        fail ArgumentError, "Missing the required parameter 'company_communication_id' when calling CompanyApi.get_email_events"
      end
      # resource path
      local_var_path = '/companies/{company_communication_id}/email_events'.sub('{' + 'company_communication_id' + '}', CGI.escape(company_communication_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesEmailEvents'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_email_events",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_email_events\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get an email template
    # Get an email template
    # @param id [Integer] The company id
    # @param template_id [Integer] The email template id
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesEmailTemplate]
    def get_email_template(id, template_id, opts = {})
      data, _status_code, _headers = get_email_template_with_http_info(id, template_id, opts)
      data
    end

    # Get an email template
    # Get an email template
    # @param id [Integer] The company id
    # @param template_id [Integer] The email template id
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesEmailTemplate, Integer, Hash)>] V1EntitiesEmailTemplate data, response status code and response headers
    def get_email_template_with_http_info(id, template_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_email_template ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.get_email_template"
      end
      # verify the required parameter 'template_id' is set
      if @api_client.config.client_side_validation && template_id.nil?
        fail ArgumentError, "Missing the required parameter 'template_id' when calling CompanyApi.get_email_template"
      end
      # resource path
      local_var_path = '/companies/{id}/news_releases/email_templates/{template_id}'.sub('{' + 'id' + '}', CGI.escape(id.to_s)).sub('{' + 'template_id' + '}', CGI.escape(template_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesEmailTemplate'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_email_template",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_email_template\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get list of email template
    # Get list of email template
    # @param id [Integer] The company id
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page The page number (default to 0)
    # @option opts [Integer] :per_page The number of items per page (default to 10)
    # @option opts [Boolean] :public_template The public template (default to false)
    # @return [V1EntitiesEmailTemplate]
    def get_email_templates(id, opts = {})
      data, _status_code, _headers = get_email_templates_with_http_info(id, opts)
      data
    end

    # Get list of email template
    # Get list of email template
    # @param id [Integer] The company id
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page The page number (default to 0)
    # @option opts [Integer] :per_page The number of items per page (default to 10)
    # @option opts [Boolean] :public_template The public template (default to false)
    # @return [Array<(V1EntitiesEmailTemplate, Integer, Hash)>] V1EntitiesEmailTemplate data, response status code and response headers
    def get_email_templates_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_email_templates ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.get_email_templates"
      end
      # resource path
      local_var_path = '/companies/{id}/news_releases/email_templates'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}
      query_params[:'page'] = opts[:'page'] if !opts[:'page'].nil?
      query_params[:'per_page'] = opts[:'per_page'] if !opts[:'per_page'].nil?
      query_params[:'public_template'] = opts[:'public_template'] if !opts[:'public_template'].nil?

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesEmailTemplate'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_email_templates",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_email_templates\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get bulk upload record
    # Get members bulk upload record
    # @param id [Integer] The company id
    # @param id_members_bulk_upload [Integer] The bulk upload id
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesMembersBulkUpload]
    def get_members_bulk_upload(id, id_members_bulk_upload, opts = {})
      data, _status_code, _headers = get_members_bulk_upload_with_http_info(id, id_members_bulk_upload, opts)
      data
    end

    # Get bulk upload record
    # Get members bulk upload record
    # @param id [Integer] The company id
    # @param id_members_bulk_upload [Integer] The bulk upload id
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesMembersBulkUpload, Integer, Hash)>] V1EntitiesMembersBulkUpload data, response status code and response headers
    def get_members_bulk_upload_with_http_info(id, id_members_bulk_upload, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_members_bulk_upload ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.get_members_bulk_upload"
      end
      # verify the required parameter 'id_members_bulk_upload' is set
      if @api_client.config.client_side_validation && id_members_bulk_upload.nil?
        fail ArgumentError, "Missing the required parameter 'id_members_bulk_upload' when calling CompanyApi.get_members_bulk_upload"
      end
      # resource path
      local_var_path = '/companies/{id}/members/bulk_uploads/{id_members_bulk_upload}'.sub('{' + 'id' + '}', CGI.escape(id.to_s)).sub('{' + 'id_members_bulk_upload' + '}', CGI.escape(id_members_bulk_upload.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesMembersBulkUpload'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_members_bulk_upload",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_members_bulk_upload\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get bulk uploads records
    # Get members bulk uploads records
    # @param id [Integer] The company id
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesMembersBulkUploads]
    def get_members_bulk_uploads(id, opts = {})
      data, _status_code, _headers = get_members_bulk_uploads_with_http_info(id, opts)
      data
    end

    # Get bulk uploads records
    # Get members bulk uploads records
    # @param id [Integer] The company id
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesMembersBulkUploads, Integer, Hash)>] V1EntitiesMembersBulkUploads data, response status code and response headers
    def get_members_bulk_uploads_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_members_bulk_uploads ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.get_members_bulk_uploads"
      end
      # resource path
      local_var_path = '/companies/{id}/members/bulk_uploads'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesMembersBulkUploads'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_members_bulk_uploads",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_members_bulk_uploads\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get shareholder ledger by company
    # Get shareholder ledger by company.
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [V1EntitiesShareholderLedger]
    def get_shareholder_ledger(id, opts = {})
      data, _status_code, _headers = get_shareholder_ledger_with_http_info(id, opts)
      data
    end

    # Get shareholder ledger by company
    # Get shareholder ledger by company.
    # @param id [Integer] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(V1EntitiesShareholderLedger, Integer, Hash)>] V1EntitiesShareholderLedger data, response status code and response headers
    def get_shareholder_ledger_with_http_info(id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_shareholder_ledger ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.get_shareholder_ledger"
      end
      # resource path
      local_var_path = '/companies/{id}/shareholder_ledger'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesShareholderLedger'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_shareholder_ledger",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_shareholder_ledger\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Get list of all Companies accessible by the user
    # Get user accessible companies
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page Page offset to fetch. (default to 1)
    # @option opts [Integer] :per_page Number of results to return per page. (default to 25)
    # @option opts [Integer] :offset Pad a number of results. (default to 0)
    # @return [V1EntitiesCompany]
    def get_user_accessible_companies(opts = {})
      data, _status_code, _headers = get_user_accessible_companies_with_http_info(opts)
      data
    end

    # Get list of all Companies accessible by the user
    # Get user accessible companies
    # @param [Hash] opts the optional parameters
    # @option opts [Integer] :page Page offset to fetch. (default to 1)
    # @option opts [Integer] :per_page Number of results to return per page. (default to 25)
    # @option opts [Integer] :offset Pad a number of results. (default to 0)
    # @return [Array<(V1EntitiesCompany, Integer, Hash)>] V1EntitiesCompany data, response status code and response headers
    def get_user_accessible_companies_with_http_info(opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.get_user_accessible_companies ...'
      end
      # resource path
      local_var_path = '/users/accessible_companies'

      # query parameters
      query_params = opts[:query_params] || {}
      query_params[:'page'] = opts[:'page'] if !opts[:'page'].nil?
      query_params[:'per_page'] = opts[:'per_page'] if !opts[:'per_page'].nil?
      query_params[:'offset'] = opts[:'offset'] if !opts[:'offset'].nil?

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Accept' (if needed)
      header_params['Accept'] = @api_client.select_header_accept(['application/json']) unless header_params['Accept']

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body]

      # return_type
      return_type = opts[:debug_return_type] || 'V1EntitiesCompany'

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.get_user_accessible_companies",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:GET, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#get_user_accessible_companies\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Send portal invite to shareholder
    # Send portal invite to shareholder.
    # @param id [Integer] 
    # @param shareholder_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @option opts [SendPortalInviteRequest] :send_portal_invite_request 
    # @return [nil]
    def send_portal_invite(id, shareholder_id, opts = {})
      send_portal_invite_with_http_info(id, shareholder_id, opts)
      nil
    end

    # Send portal invite to shareholder
    # Send portal invite to shareholder.
    # @param id [Integer] 
    # @param shareholder_id [Integer] 
    # @param [Hash] opts the optional parameters
    # @option opts [SendPortalInviteRequest] :send_portal_invite_request 
    # @return [Array<(nil, Integer, Hash)>] nil, response status code and response headers
    def send_portal_invite_with_http_info(id, shareholder_id, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.send_portal_invite ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.send_portal_invite"
      end
      # verify the required parameter 'shareholder_id' is set
      if @api_client.config.client_side_validation && shareholder_id.nil?
        fail ArgumentError, "Missing the required parameter 'shareholder_id' when calling CompanyApi.send_portal_invite"
      end
      # resource path
      local_var_path = '/companies/{id}/shareholders/{shareholder_id}/send_portal_invite'.sub('{' + 'id' + '}', CGI.escape(id.to_s)).sub('{' + 'shareholder_id' + '}', CGI.escape(shareholder_id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Content-Type'
      content_type = @api_client.select_header_content_type(['application/json'])
      if !content_type.nil?
          header_params['Content-Type'] = content_type
      end

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body] || @api_client.object_to_http_body(opts[:'send_portal_invite_request'])

      # return_type
      return_type = opts[:debug_return_type]

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.send_portal_invite",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#send_portal_invite\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end

    # Send document upload test email to given user
    # Send document upload test email to given user
    # @param id [Integer] 
    # @param test_document_upload_email_request [TestDocumentUploadEmailRequest] 
    # @param [Hash] opts the optional parameters
    # @return [nil]
    def test_document_upload_email(id, test_document_upload_email_request, opts = {})
      test_document_upload_email_with_http_info(id, test_document_upload_email_request, opts)
      nil
    end

    # Send document upload test email to given user
    # Send document upload test email to given user
    # @param id [Integer] 
    # @param test_document_upload_email_request [TestDocumentUploadEmailRequest] 
    # @param [Hash] opts the optional parameters
    # @return [Array<(nil, Integer, Hash)>] nil, response status code and response headers
    def test_document_upload_email_with_http_info(id, test_document_upload_email_request, opts = {})
      if @api_client.config.debugging
        @api_client.config.logger.debug 'Calling API: CompanyApi.test_document_upload_email ...'
      end
      # verify the required parameter 'id' is set
      if @api_client.config.client_side_validation && id.nil?
        fail ArgumentError, "Missing the required parameter 'id' when calling CompanyApi.test_document_upload_email"
      end
      # verify the required parameter 'test_document_upload_email_request' is set
      if @api_client.config.client_side_validation && test_document_upload_email_request.nil?
        fail ArgumentError, "Missing the required parameter 'test_document_upload_email_request' when calling CompanyApi.test_document_upload_email"
      end
      # resource path
      local_var_path = '/companies/{id}/documents/test_upload_email'.sub('{' + 'id' + '}', CGI.escape(id.to_s))

      # query parameters
      query_params = opts[:query_params] || {}

      # header parameters
      header_params = opts[:header_params] || {}
      # HTTP header 'Content-Type'
      content_type = @api_client.select_header_content_type(['application/json'])
      if !content_type.nil?
          header_params['Content-Type'] = content_type
      end

      # form parameters
      form_params = opts[:form_params] || {}

      # http body (model)
      post_body = opts[:debug_body] || @api_client.object_to_http_body(test_document_upload_email_request)

      # return_type
      return_type = opts[:debug_return_type]

      # auth_names
      auth_names = opts[:debug_auth_names] || []

      new_options = opts.merge(
        :operation => :"CompanyApi.test_document_upload_email",
        :header_params => header_params,
        :query_params => query_params,
        :form_params => form_params,
        :body => post_body,
        :auth_names => auth_names,
        :return_type => return_type
      )

      data, status_code, headers = @api_client.call_api(:POST, local_var_path, new_options)
      if @api_client.config.debugging
        @api_client.config.logger.debug "API called: CompanyApi#test_document_upload_email\nData: #{data.inspect}\nStatus code: #{status_code}\nHeaders: #{headers}"
      end
      return data, status_code, headers
    end
  end
end
