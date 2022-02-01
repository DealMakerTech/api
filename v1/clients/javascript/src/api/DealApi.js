/**
 * DealMaker API
 * Welcome to the DealMaker API.  # Introduction  This is a test introduction.  # Usage  This is a usage example.  # Support  For more support, contact [email].
 *
 * The version of the OpenAPI document: 1.0.0
 * 
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 *
 */


import ApiClient from "../ApiClient";
import V1EntitiesDeal from '../model/V1EntitiesDeal';

/**
* Deal service.
* @module api/DealApi
* @version 0.0.1
*/
export default class DealApi {

    /**
    * Constructs a new DealApi. 
    * @alias module:api/DealApi
    * @class
    * @param {module:ApiClient} [apiClient] Optional API client implementation to use,
    * default to {@link module:ApiClient#instance} if unspecified.
    */
    constructor(apiClient) {
        this.apiClient = apiClient || ApiClient.instance;
    }


    /**
     * Callback function to receive the result of the getDealsId operation.
     * @callback module:api/DealApi~getDealsIdCallback
     * @param {String} error Error message, if any.
     * @param {module:model/V1EntitiesDeal} data The data returned by the service call.
     * @param {String} response The complete HTTP response.
     */

    /**
     * Get a deal by id
     * Get a deal
     * @param {Number} id The deal id.
     * @param {module:api/DealApi~getDealsIdCallback} callback The callback function, accepting three arguments: error, data, response
     * data is of type: {@link module:model/V1EntitiesDeal}
     */
    getDealsId(id, callback) {
      let postBody = null;
      // verify the required parameter 'id' is set
      if (id === undefined || id === null) {
        throw new Error("Missing the required parameter 'id' when calling getDealsId");
      }

      let pathParams = {
        'id': id
      };
      let queryParams = {
      };
      let headerParams = {
      };
      let formParams = {
      };

      let authNames = [];
      let contentTypes = [];
      let accepts = ['application/json'];
      let returnType = V1EntitiesDeal;
      return this.apiClient.callApi(
        '/deals/{id}', 'GET',
        pathParams, queryParams, headerParams, formParams, postBody,
        authNames, contentTypes, accepts, returnType, null, callback
      );
    }


}
