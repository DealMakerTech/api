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

import ApiClient from '../ApiClient';

/**
 * The V1EntitiesDeal model module.
 * @module model/V1EntitiesDeal
 * @version 0.0.1
 */
class V1EntitiesDeal {
    /**
     * Constructs a new <code>V1EntitiesDeal</code>.
     * V1_Entities_Deal model
     * @alias module:model/V1EntitiesDeal
     */
    constructor() { 
        
        V1EntitiesDeal.initialize(this);
    }

    /**
     * Initializes the fields of this object.
     * This method is used by the constructors of any subclasses, in order to implement multiple inheritance (mix-ins).
     * Only for internal use.
     */
    static initialize(obj) { 
    }

    /**
     * Constructs a <code>V1EntitiesDeal</code> from a plain JavaScript object, optionally creating a new instance.
     * Copies all relevant properties from <code>data</code> to <code>obj</code> if supplied or a new instance if not.
     * @param {Object} data The plain JavaScript object bearing properties of interest.
     * @param {module:model/V1EntitiesDeal} obj Optional instance to populate.
     * @return {module:model/V1EntitiesDeal} The populated <code>V1EntitiesDeal</code> instance.
     */
    static constructFromObject(data, obj) {
        if (data) {
            obj = obj || new V1EntitiesDeal();

            if (data.hasOwnProperty('title')) {
                obj['title'] = ApiClient.convertToType(data['title'], 'String');
            }
        }
        return obj;
    }


}

/**
 * Deal title.
 * @member {String} title
 */
V1EntitiesDeal.prototype['title'] = undefined;






export default V1EntitiesDeal;

