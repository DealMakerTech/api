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

(function(root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD.
    define(['expect.js', process.cwd()+'/src/index'], factory);
  } else if (typeof module === 'object' && module.exports) {
    // CommonJS-like environments that support module.exports, like Node.
    factory(require('expect.js'), require(process.cwd()+'/src/index'));
  } else {
    // Browser globals (root is window)
    factory(root.expect, root.Dealmakerapi);
  }
}(this, function(expect, Dealmakerapi) {
  'use strict';

  var instance;

  beforeEach(function() {
    instance = new Dealmakerapi.DealApi();
  });

  var getProperty = function(object, getter, property) {
    // Use getter method if present; otherwise, get the property directly.
    if (typeof object[getter] === 'function')
      return object[getter]();
    else
      return object[property];
  }

  var setProperty = function(object, setter, property, value) {
    // Use setter method if present; otherwise, set the property directly.
    if (typeof object[setter] === 'function')
      object[setter](value);
    else
      object[property] = value;
  }

  describe('DealApi', function() {
    describe('getDealsId', function() {
      it('should call getDealsId successfully', function(done) {
        //uncomment below and update the code to test getDealsId
        //instance.getDealsId(function(error) {
        //  if (error) throw error;
        //expect().to.be();
        //});
        done();
      });
    });
  });

}));