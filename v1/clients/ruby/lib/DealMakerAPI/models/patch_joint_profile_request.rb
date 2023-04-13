=begin
#DealMaker API

## Introduction  Welcome to DealMaker’s Web API v1! This API is RESTful, easy to integrate with, and offers support in 2 different languages. This is the technical documentation for our API. There are tutorials and examples of integrations with our API available on our [knowledge centre](https://help.dealmaker.tech/training-centre) as well.  # Libraries  - Javascript - Ruby  # Authentication  To authenticate, add an Authorization header to your API request that contains an access token. Before you [generate an access token](#how-to-generate-an-access-token) your must first [create an application](#create-an-application) on your portal and retrieve the your client ID and secret  ## Create an Application  DealMaker’s Web API v1 supports the use of OAuth applications. Applications can be generated in your [account](https://app.dealmaker.tech/developer/applications).  To create an API Application, click on your user name in the top right corner to open a dropdown menu, and select \"Integrations\". Under the API settings tab, click the `Create New Application` button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-1.png)  Name your application and assign the level of permissions for this application  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-2.png)  Once your application is created, save in a secure space your client ID and secret.  **WARNING**: The secret key will not be visible after you click the close button  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-3.png)  From the developer tab, you will be able to view and manage all the available applications  ![Screenshot](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/api-application-4.png)  Each Application consists of a client id, secret and set of scopes. The scopes define what resources you want to have access to. The client ID and secret are used to generate an access token. You will need to create an application to use API endpoints.  ## How to generate an access token  After creating an application, you must make a call to obtain a bearer token using the Generate an OAuth token operation. This operation requires the following parameters:  `token endpoint` - https://app.dealmaker.tech/oauth/token  `grant_type` - must be set to `client_credentials`  `client_id` - the Client ID displayed when you created the OAuth application in the previous step  `client_secret` - the Client Secret displayed when you created the OAuth application in the previous step  `scope` - the scope is established when you created the OAuth application in the previous step  Note: The Generate an OAuth token response specifies how long the bearer token is valid for. You should reuse the bearer token until it is expired. When the token is expired, call Generate an OAuth token again to generate a new one.  To use the access token, you must set a plain text header named `Authorization` with the contents of the header being “Bearer XXX” where XXX is your generated access token.  ### Example  #### Postman  Here's an example on how to generate the access token with Postman, where `{{CLIENT_ID}}` and `{{CLIENT_SECRET}}` are the values generated after following the steps on [Create an Application](#create-an-application)  ![Get access token postman example](https://s3.ca-central-1.amazonaws.com/docs.dealmaker.tech/images/token-postman.png)  # Status Codes  ## Content-Type Header  All responses are returned in JSON format. We specify this by sending the Content-Type header.  ## Status Codes  Below is a table containing descriptions of the various status codes we currently support against various resources.  Sometimes your API call will generate an error. Here you will find additional information about what to expect if you don’t format your request properly, or we fail to properly process your request.  | Status Code | Description | | ----------- | ----------- | | `200`       | Success     | | `403`       | Forbidden   | | `404`       | Not found   |  # Pagination  Pagination is used to divide large responses is smaller portions (pages). By default, all endpoints return a maximum of 25 records per page. You can change the number of records on a per request basis by passing a `per_page` parameter in the request header parameters. The largest supported `per_page` parameter is 100.  When the response exceeds the `per_page` parameter, you can paginate through the records by increasing the `offset` parameter. Example: `offset=25` will return 25 records starting from 26th record. You may also paginate using the `page` parameter to indicate the page number you would like to show on the response.  Please review the table below for the input parameters  ## Inputs  | Parameter  | Description                                                                     | | ---------- | ------------------------------------------------------------------------------- | | `per_page` | Amount of records included on each page (Default is 25)                         | | `page`     | Page number                                                                     | | `offset`   | Amount of records offset on the API request where 0 represents the first record |  ## Response Headers  | Response Header | Description                                  | | --------------- | -------------------------------------------- | | `X-Total`       | Total number of records of response          | | `X-Total-Pages` | Total number of pages of response            | | `X-Per-Page`    | Total number of records per page of response | | `X-Page`        | Number of current page                       | | `X-Next-Page`   | Number of next page                          | | `X-Prev-Page`   | Number of previous page                      | | `X-Offset`      | Total number of records offset               |  # Search and Filtering (The q parameter)  The q optional parameter accepts a string as input and allows you to filter the request based on that string. Please note that search strings must be encoded according to ASCII. For example, \"john+investor&#64;dealmaker.tech\" should be passed as “john%2Binvestor%40dealmaker.tech”. There are two main ways to filter with it.  ## Keyword filtering  Some keywords allow you to filter investors based on a specific “scope” of the investors, for example using the string “Invited” will filter all investors with the status invited, and the keyword “Has attachments” will filter investors with attachments.  Here’s a list of possible keywords and the “scope” each one of the keywords filters by:  | Keywords                                       | Scope                                                                       | Decoded Example                                                      | Encoded Example                                                                          | | ---------------------------------------------- | --------------------------------------------------------------------------- | -------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | | Signed on \\(date range\\)                       | Investors who signed in the provided date range                             | Signed on (date range) [2020-07-01:2020-07-31]                       | `Signed%20on%20%28date%20range%29%20%5B2020-07-01%3A2020-07-31%5D`                       | | Enabled for countersignature on \\(date range\\) | Investors who were enabled for counter signature in the provided date range | Enabled for countersignature on (date range) [2022-05-24:2022-05-25] | `Enabled%20for%20countersignature%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D` | | Accepted on \\(date range\\)                     | Investors accepted in the provided date rage                                | Accepted on (date range) [2022-05-24:2022-05-25]                     | `Accepted%20on%20(date%20range)%20%5B2022-05-24%3A2022-05-25%5D`                         | | Offline                                        | Investors added to the deal offline                                         | Offline                                                              | `Offline`                                                                                | | Online                                         | Investors added to the deal online                                          | Online                                                               | `Online`                                                                                 | | Signed                                         | Investors who signed their agreement                                        | Signed                                                               | `Signed`                                                                                 | | Waiting for countersignature                   | Investors who have signed and are waiting for counter signature             | Waiting for countersignature                                         | `Waiting%20for%20countersignature`                                                       | | Invited                                        | Investors on the Invited Status                                             | Invited                                                              | `Invited`                                                                                | | Accepted                                       | Investors in the Accepted Status                                            | Accepted                                                             | `Accepted`                                                                               | | Questionnaire in progress                      | All Investors who have not finished completing the questionnaire            | Questionnaire in progress                                            | `Questionnaire%20in%20progress`                                                          | | Has attachments                                | All Investors with attachments                                              | Has attachments                                                      | `Has%20attachments`                                                                      | | Has notes                                      | All Investors with notes                                                    | Has notes                                                            | `Has%20notes`                                                                            | | Waiting for co-signature                       | Investors who have signed and are waiting for co-signature                  | Waiting for co-signature                                             | `Waiting%20for%20co-signature`                                                           | | Background Check Approved                      | Investors with approved background check                                    | Background Check Approved                                            | `Background%20Check%20Approved`                                                          | | Document Review Pending                        | Investors with pending review                                               | Document Review Pending                                              | `Document%20Review%20Pending`                                                            | | Document Upload Pending                        | Investors with pending documents to upload                                  | Document Upload Pending                                              | `Document%20Upload%20Pending`                                                            | | Required adjudicator review                    | Investors who are required to be review by the adjudicator                  | Required adjudicator review                                          | `Required%20adjudicator%20review`                                                        |  ---  **NOTE**  Filtering keywords are case sensitive and need to be encoded  ---  ## Search String  Any value for the parameter which does not match one of the keywords listed above, will use fields like `first name`, `last name`, `email`, `tags` to search for the investor.  For example, if you search “Robert”, because this does not match one of the keywords listed above, it will then return any investors who have the string “Robert” in their name, email, or tags fields.  # Versioning  The latest version is v1.  The version can be updated on the `Accept` header, just set the version as stated on the following example:  ```  Accept:application/vnd.dealmaker-v1+json  ```  | Version | Accept Header                       | | ------- | ----------------------------------- | | `v1`    | application/vnd.dealmaker-`v1`+json |  # SDK’s  For instruction on installing SDKs, please view the following links  - [Javascript](https://github.com/DealMakerTech/api/tree/main/v1/clients/javascript) - [Ruby](https://github.com/DealMakerTech/api/tree/main/v1/clients/ruby)  # Webhooks  Our webhooks functionality allows clients to automatically receive updates on a deal's investor data.  The type of data that the webhooks include:  - Investor Name - Date created - Email - Phone - Allocation - Attachments - Accredited investor status - Accredited investor category - Status (Draft, Invited, Accepted, Waiting)  Via webhooks clients can subscribe to the following events as they happen on Dealmaker:  - Investor is created - Investor details are updated (any of the investor details above change or are updated) - Investor is deleted  A URL supplied by the client will receive all the events with the information as part of the payload. Clients are able to add and update the URL within DealMaker.  ## Configuration  For a comprehensive guide on how to configure Webhooks please visit our support article: [Configuring Webhooks on DealMaker – DealMaker Support](https://help.dealmaker.tech/configuring-webhooks-on-dealmaker).  As a developer user on DealMaker, you are able to configure webhooks by following the steps below:  1. Sign into Dealmaker 2. Go to **“Your profile”** in the top right corner 3. Access an **“Integrations”** configuration via the left menu 4. The developer configures webhooks by including:    - The HTTPS URL where the request will be sent    - Optionally, a security token that we would use to build a SHA1 hash that would be included in the request headers. The name of the header is `X-DealMaker-Signature`. If the secret is not specified, the hash won’t be included in the headers.    - An email address that will be used to notify about errors. 5. The developers can disable webhooks temporarily if needed  ## Specification  ### Events  The initial set of events will be related to the investor. The events are:  1. `investor.created`     - Triggers every time a new investor is added to a deal  2. `investor.updated`     - Triggers on updates to any of the following fields:      1. Status      2. Name      3. Email - (this is a user field so we trigger event for all investors with webhook subscription)      4. Allocated Amount      5. Investment Amount      6. Accredited investor fields      7. Adding or removing attachments      8. Tags    - When the investor status is signed, the payload also includes a link to the signed document; the link expires after 30 minutes  3. `investor.deleted`     - Triggers when the investor is removed from the deal    - The investor key of the payload only includes investor ID    - The deal is not included in the payload. Due to our implementation it’s impossible to retrieve the deal the investor was part of  ### Requests  - The request is a `POST` - The payload’s `content-type` is `application/json` - Only `2XX` responses are considered successful. In the event of a different response, we consider it failed and queue the event for retry - We retry the request five times, after the initial attempt. Doubling the waiting time between intervals with each try. The first retry happens after 30 seconds, then 60 seconds, 2 mins, 4 minutes, and 8 minutes. This timing scheme gives the receiver about 1 hour if all the requests fail - If an event fails all the attempts to be delivered, we send an email to the address that the user configured  ### Payload  #### Common Properties  There will be some properties that are common to all the events on the system.  | Key               | Type   | Description                                                                            | | ----------------- | ------ | -------------------------------------------------------------------------------------- | | event             | String | The event that triggered the call                                                      | | event_id          | String | A unique identifier for the event                                                      | | deal<sup>\\*</sup> | Object | The deal in which the event occurred. It includes id, title, created_at and updated_at |  <sup>\\*</sup>This field is not included when deleting a resource  #### Common Properties (investor scope)  Every event on this scope must contain an investor object, here are some properties that are common to this object on all events in the investor scope:  | Key                 | Type             | Description                                                                                                              | | ------------------- | ---------------- | ------------------------------------------------------------------------------------------------------------------------ | | id                  | Integer          | The unique ID of the Investor                                                                                            | | name                | String           | Investor’s Name                                                                                                          | | status              | String           | Current status of the investor<br />Possible states are: <br />draft<br />invited<br />signed<br />waiting<br />accepted | | email               | String           |                                                                                                                          | | phone_number        | String           |                                                                                                                          | | investment_amount   | Double           |                                                                                                                          | | allocated_amount    | Double           |                                                                                                                          | | accredited_investor | Object           | See format in respective ticket                                                                                          | | attachments         | Array of Objects | List of supporting documents uploaded to the investor, including URL (expire after 30 minutes) and title (caption)       | | funding_state       | String           | Investor’s current funding state (unfunded, underfunded, funded, overfunded)                                             | | funds_pending       | Boolean          | True if there are pending transactions, False otherwise                                                                  | | created_at          | Date             |                                                                                                                          | | updated_at          | Date             |                                                                                                                          | | tags                | Array of Strings | a list of the investor's tags, separated by comma.                                                                       |  ### investor.status >= signed Specific Properties  | Key                    | Type   | Description            | | ---------------------- | ------ | ---------------------- | | subscription_agreement | object | id, url (expiring URL) |  #### Investor Status  Here is a brief description of each investor state:  - **Draft:** the investor is added to the platform but hasn't been invited yet and cannot access the portal - **Invited:** the investor was added to the platform but hasn’t completed the questionnaire - **Signed:** the investor signed the document (needs approval from Lawyer or Reviewer before countersignature) - **Waiting:** the investor was approved for countersignature by any of the Lawyers or Reviewers in the deal - **Accepted:** the investor's agreement was countersigned by the Signatory  #### Update Delay  Given the high number of updates our platform performs on any investor, we’ve added a cool down period on update events that allows us to “group” updates and trigger only one every minute. In consequence, update events will be delivered 1 minute after the initial request was made and will include the latest version of the investor data at delivery time. 

The version of the OpenAPI document: 1.0.0

Generated by: https://openapi-generator.tech
OpenAPI Generator version: 6.6.0-SNAPSHOT

=end

require 'date'
require 'time'

module DealMakerAPI
  class PatchJointProfileRequest
    # The accredited investor information.
    attr_accessor :us_accredited_category

    # The kind of joint investor.
    attr_accessor :joint_type

    # The first name of the investor profile.
    attr_accessor :first_name

    # The last name of the investor profile.
    attr_accessor :last_name

    # The suffix of the investor profile.
    attr_accessor :suffix

    # The country the investor profile.
    attr_accessor :country

    # The street address of the investor profile.
    attr_accessor :street_address

    # The street address line 2 of the investor profile.
    attr_accessor :unit2

    # The city of the investor profile.
    attr_accessor :city

    # The region or State of the investor profile.
    attr_accessor :region

    # The postal code or zipcode of the investor profile.
    attr_accessor :postal_code

    # The date of birth of the investor profile.
    attr_accessor :date_of_birth

    # The taxpayer identification number of the investor profile.
    attr_accessor :taxpayer_id

    # The phone number of the investor profile.
    attr_accessor :phone_number

    # The joint holder first name of the investor profile.
    attr_accessor :joint_holder_first_name

    # The joint holder last name of the investor profile.
    attr_accessor :joint_holder_last_name

    # The suffix of the individual investor profile.
    attr_accessor :joint_holder_suffix

    # The joint holder country of the investor profile.
    attr_accessor :joint_holder_country

    # The joint holder street address of the investor profile.
    attr_accessor :joint_holder_street_address

    # The Joint holder street address line 2 of the investor profile.
    attr_accessor :joint_holder_unit2

    # The Joint holder city of the investor profile.
    attr_accessor :joint_holder_city

    # The joint holder region or state of the investor profile.
    attr_accessor :joint_holder_region

    # The joint holder postal code or zipcode of the investor profile.
    attr_accessor :joint_holder_postal_code

    # The joint holder date of birth of the investor profile.
    attr_accessor :joint_holder_date_of_birth

    # The joint holder taxpayer identification number of the investor profile.
    attr_accessor :joint_holder_taxpayer_id

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
        :'us_accredited_category' => :'us_accredited_category',
        :'joint_type' => :'joint_type',
        :'first_name' => :'first_name',
        :'last_name' => :'last_name',
        :'suffix' => :'suffix',
        :'country' => :'country',
        :'street_address' => :'street_address',
        :'unit2' => :'unit2',
        :'city' => :'city',
        :'region' => :'region',
        :'postal_code' => :'postal_code',
        :'date_of_birth' => :'date_of_birth',
        :'taxpayer_id' => :'taxpayer_id',
        :'phone_number' => :'phone_number',
        :'joint_holder_first_name' => :'joint_holder_first_name',
        :'joint_holder_last_name' => :'joint_holder_last_name',
        :'joint_holder_suffix' => :'joint_holder_suffix',
        :'joint_holder_country' => :'joint_holder_country',
        :'joint_holder_street_address' => :'joint_holder_street_address',
        :'joint_holder_unit2' => :'joint_holder_unit2',
        :'joint_holder_city' => :'joint_holder_city',
        :'joint_holder_region' => :'joint_holder_region',
        :'joint_holder_postal_code' => :'joint_holder_postal_code',
        :'joint_holder_date_of_birth' => :'joint_holder_date_of_birth',
        :'joint_holder_taxpayer_id' => :'joint_holder_taxpayer_id'
      }
    end

    # Returns all the JSON keys this model knows about
    def self.acceptable_attributes
      attribute_map.values
    end

    # Attribute type mapping.
    def self.openapi_types
      {
        :'us_accredited_category' => :'String',
        :'joint_type' => :'String',
        :'first_name' => :'String',
        :'last_name' => :'String',
        :'suffix' => :'String',
        :'country' => :'String',
        :'street_address' => :'String',
        :'unit2' => :'String',
        :'city' => :'String',
        :'region' => :'String',
        :'postal_code' => :'String',
        :'date_of_birth' => :'String',
        :'taxpayer_id' => :'String',
        :'phone_number' => :'String',
        :'joint_holder_first_name' => :'String',
        :'joint_holder_last_name' => :'String',
        :'joint_holder_suffix' => :'String',
        :'joint_holder_country' => :'String',
        :'joint_holder_street_address' => :'String',
        :'joint_holder_unit2' => :'String',
        :'joint_holder_city' => :'String',
        :'joint_holder_region' => :'String',
        :'joint_holder_postal_code' => :'String',
        :'joint_holder_date_of_birth' => :'String',
        :'joint_holder_taxpayer_id' => :'String'
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
        fail ArgumentError, "The input argument (attributes) must be a hash in `DealMakerAPI::PatchJointProfileRequest` initialize method"
      end

      # check to see if the attribute exists and convert string to symbol for hash key
      attributes = attributes.each_with_object({}) { |(k, v), h|
        if (!self.class.attribute_map.key?(k.to_sym))
          fail ArgumentError, "`#{k}` is not a valid attribute in `DealMakerAPI::PatchJointProfileRequest`. Please check the name to make sure it's valid. List of attributes: " + self.class.attribute_map.keys.inspect
        end
        h[k.to_sym] = v
      }

      if attributes.key?(:'us_accredited_category')
        self.us_accredited_category = attributes[:'us_accredited_category']
      end

      if attributes.key?(:'joint_type')
        self.joint_type = attributes[:'joint_type']
      end

      if attributes.key?(:'first_name')
        self.first_name = attributes[:'first_name']
      end

      if attributes.key?(:'last_name')
        self.last_name = attributes[:'last_name']
      end

      if attributes.key?(:'suffix')
        self.suffix = attributes[:'suffix']
      end

      if attributes.key?(:'country')
        self.country = attributes[:'country']
      end

      if attributes.key?(:'street_address')
        self.street_address = attributes[:'street_address']
      end

      if attributes.key?(:'unit2')
        self.unit2 = attributes[:'unit2']
      end

      if attributes.key?(:'city')
        self.city = attributes[:'city']
      end

      if attributes.key?(:'region')
        self.region = attributes[:'region']
      end

      if attributes.key?(:'postal_code')
        self.postal_code = attributes[:'postal_code']
      end

      if attributes.key?(:'date_of_birth')
        self.date_of_birth = attributes[:'date_of_birth']
      end

      if attributes.key?(:'taxpayer_id')
        self.taxpayer_id = attributes[:'taxpayer_id']
      end

      if attributes.key?(:'phone_number')
        self.phone_number = attributes[:'phone_number']
      end

      if attributes.key?(:'joint_holder_first_name')
        self.joint_holder_first_name = attributes[:'joint_holder_first_name']
      end

      if attributes.key?(:'joint_holder_last_name')
        self.joint_holder_last_name = attributes[:'joint_holder_last_name']
      end

      if attributes.key?(:'joint_holder_suffix')
        self.joint_holder_suffix = attributes[:'joint_holder_suffix']
      end

      if attributes.key?(:'joint_holder_country')
        self.joint_holder_country = attributes[:'joint_holder_country']
      end

      if attributes.key?(:'joint_holder_street_address')
        self.joint_holder_street_address = attributes[:'joint_holder_street_address']
      end

      if attributes.key?(:'joint_holder_unit2')
        self.joint_holder_unit2 = attributes[:'joint_holder_unit2']
      end

      if attributes.key?(:'joint_holder_city')
        self.joint_holder_city = attributes[:'joint_holder_city']
      end

      if attributes.key?(:'joint_holder_region')
        self.joint_holder_region = attributes[:'joint_holder_region']
      end

      if attributes.key?(:'joint_holder_postal_code')
        self.joint_holder_postal_code = attributes[:'joint_holder_postal_code']
      end

      if attributes.key?(:'joint_holder_date_of_birth')
        self.joint_holder_date_of_birth = attributes[:'joint_holder_date_of_birth']
      end

      if attributes.key?(:'joint_holder_taxpayer_id')
        self.joint_holder_taxpayer_id = attributes[:'joint_holder_taxpayer_id']
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
      us_accredited_category_validator = EnumAttributeValidator.new('String', ["income_individual", "assets_individual", "director", "knowledgable_employee", "broker_or_dealer", "investment_advisor_registered", "investment_advisor_relying", "designated_accredited_investor", "not_accredited"])
      return false unless us_accredited_category_validator.valid?(@us_accredited_category)
      joint_type_validator = EnumAttributeValidator.new('String', ["joint_tenant", "tenants_in_common", "community_property"])
      return false unless joint_type_validator.valid?(@joint_type)
      true
    end

    # Custom attribute writer method checking allowed values (enum).
    # @param [Object] us_accredited_category Object to be assigned
    def us_accredited_category=(us_accredited_category)
      validator = EnumAttributeValidator.new('String', ["income_individual", "assets_individual", "director", "knowledgable_employee", "broker_or_dealer", "investment_advisor_registered", "investment_advisor_relying", "designated_accredited_investor", "not_accredited"])
      unless validator.valid?(us_accredited_category)
        fail ArgumentError, "invalid value for \"us_accredited_category\", must be one of #{validator.allowable_values}."
      end
      @us_accredited_category = us_accredited_category
    end

    # Custom attribute writer method checking allowed values (enum).
    # @param [Object] joint_type Object to be assigned
    def joint_type=(joint_type)
      validator = EnumAttributeValidator.new('String', ["joint_tenant", "tenants_in_common", "community_property"])
      unless validator.valid?(joint_type)
        fail ArgumentError, "invalid value for \"joint_type\", must be one of #{validator.allowable_values}."
      end
      @joint_type = joint_type
    end

    # Checks equality by comparing each attribute.
    # @param [Object] Object to be compared
    def ==(o)
      return true if self.equal?(o)
      self.class == o.class &&
          us_accredited_category == o.us_accredited_category &&
          joint_type == o.joint_type &&
          first_name == o.first_name &&
          last_name == o.last_name &&
          suffix == o.suffix &&
          country == o.country &&
          street_address == o.street_address &&
          unit2 == o.unit2 &&
          city == o.city &&
          region == o.region &&
          postal_code == o.postal_code &&
          date_of_birth == o.date_of_birth &&
          taxpayer_id == o.taxpayer_id &&
          phone_number == o.phone_number &&
          joint_holder_first_name == o.joint_holder_first_name &&
          joint_holder_last_name == o.joint_holder_last_name &&
          joint_holder_suffix == o.joint_holder_suffix &&
          joint_holder_country == o.joint_holder_country &&
          joint_holder_street_address == o.joint_holder_street_address &&
          joint_holder_unit2 == o.joint_holder_unit2 &&
          joint_holder_city == o.joint_holder_city &&
          joint_holder_region == o.joint_holder_region &&
          joint_holder_postal_code == o.joint_holder_postal_code &&
          joint_holder_date_of_birth == o.joint_holder_date_of_birth &&
          joint_holder_taxpayer_id == o.joint_holder_taxpayer_id
    end

    # @see the `==` method
    # @param [Object] Object to be compared
    def eql?(o)
      self == o
    end

    # Calculates hash code according to all attributes.
    # @return [Integer] Hash code
    def hash
      [us_accredited_category, joint_type, first_name, last_name, suffix, country, street_address, unit2, city, region, postal_code, date_of_birth, taxpayer_id, phone_number, joint_holder_first_name, joint_holder_last_name, joint_holder_suffix, joint_holder_country, joint_holder_street_address, joint_holder_unit2, joint_holder_city, joint_holder_region, joint_holder_postal_code, joint_holder_date_of_birth, joint_holder_taxpayer_id].hash
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
