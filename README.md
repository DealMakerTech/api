# DealMaker API
![DealMaker Logo](v1/assets/images/DealMaker-Logo-Dark-SM.png)
## About

This README is for the `1.0.0` version of the DealMaker API

## Support

If you want to see how API will render your requests, you can try it out online at https://docs.dealmaker.tech/

For more support, contact [email]

## List of Features

- [Listing Investors on a Deal](https://docs.dealmaker.tech/#operation/listInvestors)

- [Listing a Specific Investor](https://docs.dealmaker.tech/#operation/getInvestor)

- Create an Investor

- [Get Information about a Deal](https://docs.dealmaker.tech/#operation/getDeal)

## Releases

| Version  | Release Date |
| ------------- | ------------- |
| `1.0.0`  | TBD  |

## Supported Languages
The current version supports the following languages:

- Javascript
- Ruby

Please review the next sections for each supported languages and available samples.

### Clients
- #### [Javascript](v1/clients/javascript)

- #### [Ruby](v1/clients/ruby)

### Samples
- #### [Javascript](v1/samples/javascript)

- #### [Ruby](v1/samples/ruby)

## Generating a Custom Client

Custom clients can be generated using OpenAPI/Swagger codegen. We currently provide a `swagger.json` configuration file which can be used to generate your client. The client structure will be similar to our current clients as they are also built using OpenAPI.

This example uses the Docker version of [OpenAPI Generator](https://github.com/OpenAPITools/openapi-generator). More information and a list of supported languages can be found on their GitHub repository.

To generate a custom client with OpenAPI Generator, follow these steps:
1. Clone the repository
2. Ensure [Docker](https://www.docker.com) is installed and running
3. From the repository folder, run the following command (replace `$CLIENT_LANGUAGE` with the id of your desired language):

```
docker run --rm -v "${PWD}:/local" openapitools/openapi-generator-cli generate \
  -i /local/v1/swagger.json \
  -g $CLIENT_LANGUAGE \
  -o /local/v1/clients/$CLIENT_LANGUAGE
```

4. Your generated client will be generated into `v1/clients/$CLIENT_LANGUAGE`.
