# Add client to the load path
$LOAD_PATH.unshift File.expand_path('../../../clients/ruby/lib', __FILE__)

# Include required libraries
require 'oauth2'
require 'dotenv'
require 'DealMakerAPI'

# Load environment variables from the file
Dotenv.load('.env')

# Check to make sure the deal id is provided by command line
if ARGV.size != 1
  puts "Please specify a deal id."
  return
end

# The application client id
client_id = ENV['DEALMAKER_CLIENT_ID']
# The application client secret
client_secret = ENV['DEALMAKER_CLIENT_SECRET']
# The OAuth access token url
token_url = ENV['DEALMAKER_TOKEN_URL']
# The api host url
api_host = ENV['DEALMAKER_API_HOST']
# The requested scopes
scopes = ENV['DEALMAKER_SCOPES']

# The deal id pulled from the command line
deal_id = ARGV[0]

# Create an OAuth2 client that will be requesting a token
client = OAuth2::Client.new(client_id, client_secret, token_url: token_url)

# Request a token with the given scopes
token = client.client_credentials.get_token({ :scope => scopes })

DealMakerAPI.configure do |config|
  # Configure the default host of the api
  config.host = api_host
  # Configure the default scheme of the api
  config.scheme = 'https'
  # Set the default server index
  config.server_index = nil
end

# Merge authorization headers into the headers collection for all requests
DealMakerAPI::ApiClient.default.default_headers.merge!(token.headers)

# Create an instance of the deal API client
api = DealMakerAPI::DealApi.new

# Make a request to lookup the deal with the given deal id
result = api.get_deals_id(deal_id)

puts result