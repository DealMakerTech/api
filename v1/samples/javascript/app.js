// Include required libraries
const axios = require('axios')
const Dealmakerapi = require('dealmakerapi')

// Load environment variables from .env
require('dotenv').config()

async function main() {
    // Remove the first two command line arguments
    const args = process.argv.slice(2)

    // Check to make sure the deal id is provided by command line
    if (args.length !== 1) {
        console.log('Please specify a deal id.')
        return
    }

    // The application client id
    const clientId = process.env['DEALMAKER_CLIENT_ID']
    // The application client secret
    const clientSecret = process.env['DEALMAKER_CLIENT_SECRET']
    // The OAuth access token url
    const tokenUrl = process.env['DEALMAKER_TOKEN_URL']
    // The api host url
    const apiHost = process.env['DEALMAKER_API_HOST']
    // The requested scopes
    const scopes = process.env['DEALMAKER_SCOPES']

    // Load the requested deal id from the command line
    const dealId = args[0];

    // Request an access token using the provided credentials
    const { data } = await axios.post(tokenUrl, {
        'grant_type': 'client_credentials',
        'client_id': clientId,
        'client_secret': clientSecret,
        'scope': scopes
    })

    var defaultClient = Dealmakerapi.ApiClient.instance
    // Configure the default host of the API
    defaultClient.basePath = apiHost
    // Add authorization headers for all requests
    defaultClient.defaultHeaders['Authorization'] = `Bearer ${data.access_token}`

    // Create an instance of the deal API client
    const api = new Dealmakerapi.DealApi()

    // Make a request to lookup the deal with the given deal id
    api.getDeal(dealId, function(error, data, response) {
        if (error) {
            // If an error occurs, print the error
            console.error(error);
        } else {
            // If successful, print the output
            console.log(JSON.stringify(data))
        }
    });
}

main()

