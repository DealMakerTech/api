=begin
#DealMaker API

## Introduction  Welcome to DealMaker’s Web API v1! This API is RESTful, easy to integrate with, and offers support in 2 different languages. This is the technical documentation for our API. There are tutorials and examples of integrations with our API available on our [knowledge centre](https://help.dealmaker.tech/training-centre) as well.  # Libraries  - Javascript - Ruby  # Authentication  To authenticate, add an Authorization header to your API request that contains an access token. Before you [generate an access token](#how-to-generate-an-access-token) your must first [create an application](#create-an-application) on your portal and retrieve the your client ID and secret  ## Create an Application  DealMaker’s Web API v1 supports the use of OAuth applications. Applications can be generated in your [account](https://app.dealmaker.tech/developer/applications).  To create an API Application, click on your user name in the top right corner to open a dropdown menu, and select \"Integrations\". Under the API settings tab, click the `Create New Application` button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-1.png)  Name your application and assign the level of permissions for this application  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-2.png)  Once your application is created, save in a secure space your client ID and secret.  **WARNING**: The secret key will not be visible after you click the close button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-3.png)  From the developer tab, you will be able to view and manage all the available applications  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-4.png)  Each Application consists of a client id, secret and set of scopes. The scopes define what resources you want to have access to. The client ID and secret are used to generate an access token. You will need to create an application to use API endpoints.  ## How to generate an access token  After creating an application, you must make a call to obtain a bearer token using the Generate an OAuth token operation. This operation requires the following parameters:  `token endpoint` - https://app.dealmaker.tech/oauth/token  `grant_type` - must be set to `client_credentials`  `client_id` - the Client ID displayed when you created the OAuth application in the previous step  `client_secret` - the Client Secret displayed when you created the OAuth application in the previous step  `scope` - the scope is established when you created the OAuth application in the previous step  Note: The Generate an OAuth token response specifies how long the bearer token is valid for. You should reuse the bearer token until it is expired. When the token is expired, call Generate an OAuth token again to generate a new one.  To use the access token, you must set a plain text header named `Authorization` with the contents of the header being “Bearer XXX” where XXX is your generated access token.  ### Example  #### Postman  Here's an example on how to generate the access token with Postman, where `{{CLIENT_ID}}` and `{{CLIENT_SECRET}}` are the values generated after following the steps on [Create an Application](#create-an-application)  ![Get access token postman example](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/token-postman.png)  # Status Codes  ## Content-Type Header  All responses are returned in JSON format. We specify this by sending the Content-Type header.  ## Status Codes  Below is a table containing descriptions of the various status codes we currently support against various resources.  Sometimes your API call will generate an error. Here you will find additional information about what to expect if you don’t format your request properly, or we fail to properly process your request.  | Status Code | Description | | ----------- | ----------- | | `200`       | Success     | | `403`       | Forbidden   | | `404`       | Not found   |  # Pagination  Pagination is used to divide large responses is smaller portions (pages). By default, all endpoints return a maximum of 25 records per page. You can change the number of records on a per request basis by passing a `per_page` parameter in the request header parameters. The largest supported `per_page` parameter is 100.  When the response exceeds the `per_page` parameter, you can paginate through the records by increasing the `offset` parameter. Example: `offset=25` will return 25 records starting from 26th record. You may also paginate using the `page` parameter to indicate the page number you would like to show on the response.  Please review the table below for the input parameters  ## Inputs  | Parameter  | Description                                                                     | | ---------- | ------------------------------------------------------------------------------- | | `per_page` | Amount of records included on each page (Default is 25)                         | | `page`     | Page number                                                                     | | `offset`   | Amount of records offset on the API request where 0 represents the first record |  ## Response Headers  | Response Header | Description                                  | | --------------- | -------------------------------------------- | | `X-Total`       | Total number of records of response          | | `X-Total-Pages` | Total number of pages of response            | | `X-Per-Page`    | Total number of records per page of response | | `X-Page`        | Number of current page                       | | `X-Next-Page`   | Number of next page                          | | `X-Prev-Page`   | Number of previous page                      | | `X-Offset`      | Total number of records offset               |  # Search and Filtering (The q parameter)  The q optional parameter accepts a string as input and allows you to filter the request based on that string. Please note that search strings must be encoded according to ASCII. For example, \"john+investor&#64;dealmaker.tech\" should be passed as “john%2Binvestor%40dealmaker.tech”. There are two main ways to filter with it.  ## Keyword filtering  Some keywords allow you to filter investors based on a specific “scope” of the investors, for example using the string “Invited” will filter all investors with the status invited, and the keyword “Has attachments” will filter investors with attachments.  Here’s a list of possible keywords and the “scope” each one of the keywords filters by:  | Keywords                                       | Scope                                                                       | Decoded Example                                                      | Encoded Example                                                                          | | ---------------------------------------------- | --------------------------------------------------------------------------- | -------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | | Signed on \\(date range\\)                       | Investors who signed in the provided date range                             | Signed on (date range) [2020-07-01:2020-07-31]                       | `Signed%20on%20%28date%20range%29%20%5B2020-07-01%3A2020-07-31%5D`                       | | Enabled for countersignature on \\(date range\\) | Investors who were enabled for counter signature in the provided date range | Enabled for countersignature on (date range) [2022-05-24:2022-05-25] | `Enabled%20for%20countersignature%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D` | | Accepted on \\(date range\\)                     | Investors accepted in the provided date rage                                | Accepted on (date range) [2022-05-24:2022-05-25]                     | `Accepted%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D`                         | | Offline                                        | Investors added to the deal offline                                         | Offline                                                              | `Offline`                                                                                | | Online                                         | Investors added to the deal online                                          | Online                                                               | `Online`                                                                                 | | Signed                                         | Investors who signed their agreement                                        | Signed                                                               | `Signed`                                                                                 | | Waiting for countersignature                   | Investors who have signed and are waiting for counter signature             | Waiting for countersignature                                         | `Waiting%20for%20countersignature`                                                       | | Invited                                        | Investors on the Invited Status                                             | Invited                                                              | `Invited`                                                                                | | Accepted                                       | Investors in the Accepted Status                                            | Accepted                                                             | `Accepted`                                                                               | | Questionnaire in progress                      | All Investors who have not finished completing the questionnaire            | Questionnaire in progress                                            | `Questionnaire%20in%20progress`                                                          | | Has attachments                                | All Investors with attachments                                              | Has attachments                                                      | `Has%20attachments`                                                                      | | Has notes                                      | All Investors with notes                                                    | Has notes                                                            | `Has%20notes`                                                                            | | Waiting for co-signature                       | Investors who have signed and are waiting for co-signature                  | Waiting for co-signature                                             | `Waiting%20for%20co-signature`                                                           | | Background Check Approved                      | Investors with approved background check                                    | Background Check Approved                                            | `Background%20Check%20Approved`                                                          | | Document Review Pending                        | Investors with pending review                                               | Document Review Pending                                              | `Document%20Review%20Pending`                                                            | | Document Upload Pending                        | Investors with pending documents to upload                                  | Document Upload Pending                                              | `Document%20Upload%20Pending`                                                            | | Required adjudicator review                    | Investors who are required to be review by the adjudicator                  | Required adjudicator review                                          | `Required%20adjudicator%20review`                                                        |  ---  **NOTE**  Filtering keywords are case sensitive and need to be encoded  ---  ## Search String  Any value for the parameter which does not match one of the keywords listed above, will use fields like `first name`, `last name`, `email`, `tags` to search for the investor.  For example, if you search “Robert”, because this does not match one of the keywords listed above, it will then return any investors who have the string “Robert” in their name, email, or tags fields.  # Versioning  The latest version is v1.  The version can be updated on the `Accept` header, just set the version as stated on the following example:  ```  Accept:application/vnd.dealmaker-v1+json  ```  | Version | Accept Header                       | | ------- | ----------------------------------- | | `v1`    | application/vnd.dealmaker-`v1`+json |  # SDK’s  For instruction on installing SDKs, please view the following links  - [Javascript](https://github.com/DealMakerTech/api/tree/main/v1/clients/javascript) - [Ruby](https://github.com/DealMakerTech/api/tree/main/v1/clients/ruby)  # Webhooks  Our webhooks functionality allows clients to automatically receive updates on a deal's investor data.  Some of the data that the webhooks include:  - Investor Name - Date created - Email - Phone - Allocation - Attachments - Accredited investor status - Accredited investor category - State (Draft, Invited, Signed, Accepted, Waiting, Inactive)  Via webhooks clients can subscribe to the following events as they happen on Dealmaker:  - Investor is created - Investor details are updated (any of the investor details above change or are updated) - Investor has signed their agreement - Invertor fully funded their investment - Investor has been accepted - Investor is deleted  A URL supplied by the client will receive all the events with the information as part of the payload. Clients are able to add and update the URL within DealMaker.  ## Configuration  For a comprehensive guide on how to configure Webhooks please visit our support article: [Configuring Webhooks on DealMaker – DealMaker Support](https://help.dealmaker.tech/configuring-webhooks-on-dealmaker).  As a developer user on DealMaker, you are able to configure webhooks by following the steps below:  1. Sign into Dealmaker 2. Go to **“Your profile”** in the top right corner 3. Access an **“Integrations”** configuration via the left menu 4. The developer configures webhooks by including:    - The HTTPS URL where the request will be sent    - Optionally, a security token that we would use to build a SHA1 hash that would be included in the request headers. The name of the header is `X-DealMaker-Signature`. If the secret is not specified, the hash won’t be included in the headers.    - The Deal(s) to include in the webhook subscription    - An email address that will be used to notify about errors. 5. The developers can disable webhooks temporarily if needed  ## Specification  ### Events  The initial set of events will be related to the investor. The events are:  1. `investor.created`     - Triggers every time a new investor is added to a deal  2. `investor.updated`     - Triggers on updates to any of the following fields:      - Status      - Name      - Email - (this is a user field so we trigger event for all investors with webhook subscription)      - Allocated Amount      - Investment Amount      - Accredited investor fields      - Adding or removing attachments      - Tags    - When the investor status is signed, the payload also includes a link to the signed document; the link expires after 30 minutes    3. `investor.signed`     - Triggers when the investor signs their subscription agreement (terms and conditions)      - When this happens the investor.state becomes `signed`    - This event includes the same fields as the `investor.updated` event  4. `investor.funded`     - Triggers when the investor becomes fully funded      - This happens when the investor.funded_state becomes `funded`    - This event includes the same fields as the `investor.updated` event  5. `investor.accepted`     - Triggers when the investor is countersigned      - When this happens the investor.state becomes `accepted`    - This event includes the same fields as the `investor.updated` event  6.  `investor.deleted`     - Triggers when the investor is removed from the deal    - The investor key of the payload only includes investor ID    - The deal is not included in the payload. Due to our implementation it’s impossible to retrieve the deal the investor was part of  ### Requests  - The request is a `POST` - The payload’s `content-type` is `application/json` - Only `2XX` responses are considered successful. In the event of a different response, we consider it failed and queue the event for retry - We retry the request five times, after the initial attempt. Doubling the waiting time between intervals with each try. The first retry happens after 30 seconds, then 60 seconds, 2 mins, 4 minutes, and 8 minutes. This timing scheme gives the receiver about 1 hour if all the requests fail - If an event fails all the attempts to be delivered, we send an email to the address that the user configured  ### Payload  #### Common Properties  There will be some properties that are common to all the events on the system.  | Key               | Type   | Description                                                                              | | ----------------- | ------ | --------------------------------------------------------------------------------------   | | event             | String | The event that triggered the call                                                        | | event_id          | String | A unique identifier for the event                                                        | | deal<sup>\\*</sup> | Object | The deal in which the event occurred. please see below for an example on the deal object<sup>\\*\\*</sup> |  <sup>\\*</sup>This field is not included when deleting a resource  <sup>\\*\\*</sup> Sample Deal Object in the webhook payload  ```json \"deal\": {         \"id\": 0,         \"title\": \"string\",         \"created_at\": \"2022-12-06T18:14:44.000Z\",         \"updated_at\": \"2022-12-08T12:46:48.000Z\",         \"state\": \"string\",         \"currency\": \"string\",         \"security_type\": \"string\",         \"price_per_security\": 0.00,         \"deal_type\": \"string\",         \"minimum_investment\": 0,         \"maximum_investment\": 0,         \"issuer\": {             \"id\": 0,             \"name\": \"string\"         },         \"enterprise\": {             \"id\": 0,             \"name\": \"string\"         }     } ```  #### Common Properties (investor scope)  By design, we have incorporated on the webhooks payload the same investor-related fields included in the Investor model, for reference on the included fields, their types and values please click [here](https://docs.dealmaker.tech/#tag/investor_model). This will allow you to get all the necessary information you need about a particular investor without having to call the Get Investor by ID endpoint.                                                           | #### Investor State  Here is a brief description of each investor state:  - **Draft:** the investor is added to the platform but hasn't been invited yet and cannot access the portal - **Invited:** the investor was added to the platform but hasn’t completed the questionnaire - **Signed:** the investor signed the document (needs approval from Lawyer or Reviewer before countersignature) - **Waiting:** the investor was approved for countersignature by any of the Lawyers or Reviewers in the deal - **Accepted:** the investor's agreement was countersigned by the Signatory - **Inactive** the investor is no longer eligible to participate in the offering. This may be because their warrant expired, they requested a refund, or they opted out of the offering  #### Update Delay  Given the high number of updates our platform performs on any investor, we’ve added a cool down period on update events that allows us to “group” updates and trigger only one every minute. In consequence, update events will be delivered 1 minute after the initial request was made and will include the latest version of the investor data at delivery time. 

The version of the OpenAPI document: 1.0.0

Generated by: https://openapi-generator.tech
OpenAPI Generator version: 6.6.0-SNAPSHOT

=end

require 'date'
require 'time'

module DealMakerAPI
  # V1_Entities_Investor model
  class V1EntitiesInvestor
    # Investor id.
    attr_accessor :id

    attr_accessor :user

    # The creation time.
    attr_accessor :created_at

    # The last update time.
    attr_accessor :updated_at

    # The full name of the investor.
    attr_accessor :name

    # The allocation unit.
    attr_accessor :allocation_unit

    # The state.
    attr_accessor :state

    # The funding state.
    attr_accessor :funding_state

    # True if any funds are pending; false otherwise.
    attr_accessor :funds_pending

    # The address.
    attr_accessor :beneficial_address

    # The beneficial phone number associated with the investor. If there is no phone number, this returns the phone number associated with the user profile.
    attr_accessor :phone_number

    # The investor currency.
    attr_accessor :investor_currency

    # The number of securities.
    attr_accessor :number_of_securities

    # The current investment value.
    attr_accessor :investment_value

    # The amount allocated.
    attr_accessor :allocated_amount

    # The current amount that has been funded.
    attr_accessor :funds_value

    # The access link for the investor. This is the access link for the specific investment, not the user. If the same user has multiple investments, each one will have a different access link.
    attr_accessor :access_link

    attr_accessor :subscription_agreement

    attr_accessor :attachments

    attr_accessor :background_check_searches

    # The current 506c verification state.
    attr_accessor :verification_status

    # The warrant expiry date.
    attr_accessor :warrant_expiry_date

    # The warrant certificate number.
    attr_accessor :warrant_certificate_number

    # A value `[0, 1]` that represents the propensity for the investor to complete payment for the investment. A larger value indicates a higher likelihood of payment, as predicted by DealMaker’s machine learning algorithm. This field will only populate if DealMaker Compass is enabled for a deal and the investor `funds_state` value is not `funded` or `overfunded`
    attr_accessor :ranking_score

    attr_accessor :investor_profile

    # The investor profile id.
    attr_accessor :investor_profile_id

    # Current state on checkout page.
    attr_accessor :checkout_state

    class EnumAttributeValidator
      attr_reader :datatype
      attr_reader :allowable_values

      def initialize(datatype, allowable_values)
        @allowable_values = allowable_values.map do |value|
          case datatype.to_s
          when /Integer/i
            value.to_i
          when /Float/i
            value.to_f
          else
            value
          end
        end
      end

      def valid?(value)
        !value || allowable_values.include?(value)
      end
    end

    # Attribute mapping from ruby-style variable name to JSON key.
    def self.attribute_map
      {
        :'id' => :'id',
        :'user' => :'user',
        :'created_at' => :'created_at',
        :'updated_at' => :'updated_at',
        :'name' => :'name',
        :'allocation_unit' => :'allocation_unit',
        :'state' => :'state',
        :'funding_state' => :'funding_state',
        :'funds_pending' => :'funds_pending',
        :'beneficial_address' => :'beneficial_address',
        :'phone_number' => :'phone_number',
        :'investor_currency' => :'investor_currency',
        :'number_of_securities' => :'number_of_securities',
        :'investment_value' => :'investment_value',
        :'allocated_amount' => :'allocated_amount',
        :'funds_value' => :'funds_value',
        :'access_link' => :'access_link',
        :'subscription_agreement' => :'subscription_agreement',
        :'attachments' => :'attachments',
        :'background_check_searches' => :'background_check_searches',
        :'verification_status' => :'verification_status',
        :'warrant_expiry_date' => :'warrant_expiry_date',
        :'warrant_certificate_number' => :'warrant_certificate_number',
        :'ranking_score' => :'ranking_score',
        :'investor_profile' => :'investor_profile',
        :'investor_profile_id' => :'investor_profile_id',
        :'checkout_state' => :'checkout_state'
      }
    end

    # Returns all the JSON keys this model knows about
    def self.acceptable_attributes
      attribute_map.values
    end

    # Attribute type mapping.
    def self.openapi_types
      {
        :'id' => :'Integer',
        :'user' => :'V1EntitiesInvestorUser',
        :'created_at' => :'Time',
        :'updated_at' => :'Time',
        :'name' => :'String',
        :'allocation_unit' => :'String',
        :'state' => :'String',
        :'funding_state' => :'String',
        :'funds_pending' => :'Boolean',
        :'beneficial_address' => :'String',
        :'phone_number' => :'String',
        :'investor_currency' => :'String',
        :'number_of_securities' => :'Integer',
        :'investment_value' => :'Float',
        :'allocated_amount' => :'Float',
        :'funds_value' => :'Float',
        :'access_link' => :'String',
        :'subscription_agreement' => :'V1EntitiesSubscriptionAgreement',
        :'attachments' => :'V1EntitiesAttachment',
        :'background_check_searches' => :'V1EntitiesBackgroundCheckSearch',
        :'verification_status' => :'String',
        :'warrant_expiry_date' => :'Date',
        :'warrant_certificate_number' => :'Integer',
        :'ranking_score' => :'Float',
        :'investor_profile' => :'String',
        :'investor_profile_id' => :'Integer',
        :'checkout_state' => :'String'
      }
    end

    # List of attributes with nullable: true
    def self.openapi_nullable
      Set.new([
      ])
    end

    # Initializes the object
    # @param [Hash] attributes Model attributes in the form of hash
    def initialize(attributes = {})
      if (!attributes.is_a?(Hash))
        fail ArgumentError, "The input argument (attributes) must be a hash in `DealMakerAPI::V1EntitiesInvestor` initialize method"
      end

      # check to see if the attribute exists and convert string to symbol for hash key
      attributes = attributes.each_with_object({}) { |(k, v), h|
        if (!self.class.attribute_map.key?(k.to_sym))
          fail ArgumentError, "`#{k}` is not a valid attribute in `DealMakerAPI::V1EntitiesInvestor`. Please check the name to make sure it's valid. List of attributes: " + self.class.attribute_map.keys.inspect
        end
        h[k.to_sym] = v
      }

      if attributes.key?(:'id')
        self.id = attributes[:'id']
      end

      if attributes.key?(:'user')
        self.user = attributes[:'user']
      end

      if attributes.key?(:'created_at')
        self.created_at = attributes[:'created_at']
      end

      if attributes.key?(:'updated_at')
        self.updated_at = attributes[:'updated_at']
      end

      if attributes.key?(:'name')
        self.name = attributes[:'name']
      end

      if attributes.key?(:'allocation_unit')
        self.allocation_unit = attributes[:'allocation_unit']
      end

      if attributes.key?(:'state')
        self.state = attributes[:'state']
      end

      if attributes.key?(:'funding_state')
        self.funding_state = attributes[:'funding_state']
      end

      if attributes.key?(:'funds_pending')
        self.funds_pending = attributes[:'funds_pending']
      end

      if attributes.key?(:'beneficial_address')
        self.beneficial_address = attributes[:'beneficial_address']
      end

      if attributes.key?(:'phone_number')
        self.phone_number = attributes[:'phone_number']
      end

      if attributes.key?(:'investor_currency')
        self.investor_currency = attributes[:'investor_currency']
      end

      if attributes.key?(:'number_of_securities')
        self.number_of_securities = attributes[:'number_of_securities']
      end

      if attributes.key?(:'investment_value')
        self.investment_value = attributes[:'investment_value']
      end

      if attributes.key?(:'allocated_amount')
        self.allocated_amount = attributes[:'allocated_amount']
      end

      if attributes.key?(:'funds_value')
        self.funds_value = attributes[:'funds_value']
      end

      if attributes.key?(:'access_link')
        self.access_link = attributes[:'access_link']
      end

      if attributes.key?(:'subscription_agreement')
        self.subscription_agreement = attributes[:'subscription_agreement']
      end

      if attributes.key?(:'attachments')
        self.attachments = attributes[:'attachments']
      end

      if attributes.key?(:'background_check_searches')
        self.background_check_searches = attributes[:'background_check_searches']
      end

      if attributes.key?(:'verification_status')
        self.verification_status = attributes[:'verification_status']
      end

      if attributes.key?(:'warrant_expiry_date')
        self.warrant_expiry_date = attributes[:'warrant_expiry_date']
      end

      if attributes.key?(:'warrant_certificate_number')
        self.warrant_certificate_number = attributes[:'warrant_certificate_number']
      end

      if attributes.key?(:'ranking_score')
        self.ranking_score = attributes[:'ranking_score']
      end

      if attributes.key?(:'investor_profile')
        self.investor_profile = attributes[:'investor_profile']
      end

      if attributes.key?(:'investor_profile_id')
        self.investor_profile_id = attributes[:'investor_profile_id']
      end

      if attributes.key?(:'checkout_state')
        self.checkout_state = attributes[:'checkout_state']
      end
    end

    # Show invalid properties with the reasons. Usually used together with valid?
    # @return Array for valid properties with the reasons
    def list_invalid_properties
      invalid_properties = Array.new
      invalid_properties
    end

    # Check to see if the all the properties in the model are valid
    # @return true if the model is valid
    def valid?
      allocation_unit_validator = EnumAttributeValidator.new('String', ["securities", "amount"])
      return false unless allocation_unit_validator.valid?(@allocation_unit)
      state_validator = EnumAttributeValidator.new('String', ["draft", "invited", "cosigning", "signed", "waiting", "accepted", "inactive"])
      return false unless state_validator.valid?(@state)
      funding_state_validator = EnumAttributeValidator.new('String', ["unfunded", "underfunded", "funded", "overfunded"])
      return false unless funding_state_validator.valid?(@funding_state)
      verification_status_validator = EnumAttributeValidator.new('String', ["pending", "approved", "rejected", "new_documents_requested"])
      return false unless verification_status_validator.valid?(@verification_status)
      true
    end

    # Custom attribute writer method checking allowed values (enum).
    # @param [Object] allocation_unit Object to be assigned
    def allocation_unit=(allocation_unit)
      validator = EnumAttributeValidator.new('String', ["securities", "amount"])
      unless validator.valid?(allocation_unit)
        fail ArgumentError, "invalid value for \"allocation_unit\", must be one of #{validator.allowable_values}."
      end
      @allocation_unit = allocation_unit
    end

    # Custom attribute writer method checking allowed values (enum).
    # @param [Object] state Object to be assigned
    def state=(state)
      validator = EnumAttributeValidator.new('String', ["draft", "invited", "cosigning", "signed", "waiting", "accepted", "inactive"])
      unless validator.valid?(state)
        fail ArgumentError, "invalid value for \"state\", must be one of #{validator.allowable_values}."
      end
      @state = state
    end

    # Custom attribute writer method checking allowed values (enum).
    # @param [Object] funding_state Object to be assigned
    def funding_state=(funding_state)
      validator = EnumAttributeValidator.new('String', ["unfunded", "underfunded", "funded", "overfunded"])
      unless validator.valid?(funding_state)
        fail ArgumentError, "invalid value for \"funding_state\", must be one of #{validator.allowable_values}."
      end
      @funding_state = funding_state
    end

    # Custom attribute writer method checking allowed values (enum).
    # @param [Object] verification_status Object to be assigned
    def verification_status=(verification_status)
      validator = EnumAttributeValidator.new('String', ["pending", "approved", "rejected", "new_documents_requested"])
      unless validator.valid?(verification_status)
        fail ArgumentError, "invalid value for \"verification_status\", must be one of #{validator.allowable_values}."
      end
      @verification_status = verification_status
    end

    # Checks equality by comparing each attribute.
    # @param [Object] Object to be compared
    def ==(o)
      return true if self.equal?(o)
      self.class == o.class &&
          id == o.id &&
          user == o.user &&
          created_at == o.created_at &&
          updated_at == o.updated_at &&
          name == o.name &&
          allocation_unit == o.allocation_unit &&
          state == o.state &&
          funding_state == o.funding_state &&
          funds_pending == o.funds_pending &&
          beneficial_address == o.beneficial_address &&
          phone_number == o.phone_number &&
          investor_currency == o.investor_currency &&
          number_of_securities == o.number_of_securities &&
          investment_value == o.investment_value &&
          allocated_amount == o.allocated_amount &&
          funds_value == o.funds_value &&
          access_link == o.access_link &&
          subscription_agreement == o.subscription_agreement &&
          attachments == o.attachments &&
          background_check_searches == o.background_check_searches &&
          verification_status == o.verification_status &&
          warrant_expiry_date == o.warrant_expiry_date &&
          warrant_certificate_number == o.warrant_certificate_number &&
          ranking_score == o.ranking_score &&
          investor_profile == o.investor_profile &&
          investor_profile_id == o.investor_profile_id &&
          checkout_state == o.checkout_state
    end

    # @see the `==` method
    # @param [Object] Object to be compared
    def eql?(o)
      self == o
    end

    # Calculates hash code according to all attributes.
    # @return [Integer] Hash code
    def hash
      [id, user, created_at, updated_at, name, allocation_unit, state, funding_state, funds_pending, beneficial_address, phone_number, investor_currency, number_of_securities, investment_value, allocated_amount, funds_value, access_link, subscription_agreement, attachments, background_check_searches, verification_status, warrant_expiry_date, warrant_certificate_number, ranking_score, investor_profile, investor_profile_id, checkout_state].hash
    end

    # Builds the object from hash
    # @param [Hash] attributes Model attributes in the form of hash
    # @return [Object] Returns the model itself
    def self.build_from_hash(attributes)
      new.build_from_hash(attributes)
    end

    # Builds the object from hash
    # @param [Hash] attributes Model attributes in the form of hash
    # @return [Object] Returns the model itself
    def build_from_hash(attributes)
      return nil unless attributes.is_a?(Hash)
      attributes = attributes.transform_keys(&:to_sym)
      self.class.openapi_types.each_pair do |key, type|
        if attributes[self.class.attribute_map[key]].nil? && self.class.openapi_nullable.include?(key)
          self.send("#{key}=", nil)
        elsif type =~ /\AArray<(.*)>/i
          # check to ensure the input is an array given that the attribute
          # is documented as an array but the input is not
          if attributes[self.class.attribute_map[key]].is_a?(Array)
            self.send("#{key}=", attributes[self.class.attribute_map[key]].map { |v| _deserialize($1, v) })
          end
        elsif !attributes[self.class.attribute_map[key]].nil?
          self.send("#{key}=", _deserialize(type, attributes[self.class.attribute_map[key]]))
        end
      end

      self
    end

    # Deserializes the data based on type
    # @param string type Data type
    # @param string value Value to be deserialized
    # @return [Object] Deserialized data
    def _deserialize(type, value)
      case type.to_sym
      when :Time
        Time.parse(value)
      when :Date
        Date.parse(value)
      when :String
        value.to_s
      when :Integer
        value.to_i
      when :Float
        value.to_f
      when :Boolean
        if value.to_s =~ /\A(true|t|yes|y|1)\z/i
          true
        else
          false
        end
      when :Object
        # generic object (usually a Hash), return directly
        value
      when /\AArray<(?<inner_type>.+)>\z/
        inner_type = Regexp.last_match[:inner_type]
        value.map { |v| _deserialize(inner_type, v) }
      when /\AHash<(?<k_type>.+?), (?<v_type>.+)>\z/
        k_type = Regexp.last_match[:k_type]
        v_type = Regexp.last_match[:v_type]
        {}.tap do |hash|
          value.each do |k, v|
            hash[_deserialize(k_type, k)] = _deserialize(v_type, v)
          end
        end
      else # model
        # models (e.g. Pet) or oneOf
        klass = DealMakerAPI.const_get(type)
        klass.respond_to?(:openapi_one_of) ? klass.build(value) : klass.build_from_hash(value)
      end
    end

    # Returns the string representation of the object
    # @return [String] String presentation of the object
    def to_s
      to_hash.to_s
    end

    # to_body is an alias to to_hash (backward compatibility)
    # @return [Hash] Returns the object in the form of hash
    def to_body
      to_hash
    end

    # Returns the object in the form of hash
    # @return [Hash] Returns the object in the form of hash
    def to_hash
      hash = {}
      self.class.attribute_map.each_pair do |attr, param|
        value = self.send(attr)
        if value.nil?
          is_nullable = self.class.openapi_nullable.include?(attr)
          next if !is_nullable || (is_nullable && !instance_variable_defined?(:"@#{attr}"))
        end

        hash[param] = _to_hash(value)
      end
      hash
    end

    # Outputs non-array value in the form of hash
    # For object, use to_hash. Otherwise, just return the value
    # @param [Object] value Any valid value
    # @return [Hash] Returns the value in the form of hash
    def _to_hash(value)
      if value.is_a?(Array)
        value.compact.map { |v| _to_hash(v) }
      elsif value.is_a?(Hash)
        {}.tap do |hash|
          value.each { |k, v| hash[k] = _to_hash(v) }
        end
      elsif value.respond_to? :to_hash
        value.to_hash
      else
        value
      end
    end

  end

end
