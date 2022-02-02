# DealMakerAPI

DealMakerAPI - the Ruby gem for the DealMaker API

Welcome to the DealMaker API.

# Introduction

This is a test introduction.

# Usage

This is a usage example.

# Support

For more support, contact [email].

This SDK is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: 1.0.0
- Package version: 0.0.1
- Build package: org.openapitools.codegen.languages.RubyClientCodegen

## Installation

### Build a gem

To build the Ruby code into a gem:

```shell
gem build DealMakerAPI.gemspec
```

Then either install the gem locally:

```shell
gem install ./DealMakerAPI-0.0.1.gem
```

(for development, run `gem install --dev ./DealMakerAPI-0.0.1.gem` to install the development dependencies)

or publish the gem to a gem hosting service, e.g. [RubyGems](https://rubygems.org/).

Finally add this to the Gemfile:

    gem 'DealMakerAPI', '~> 0.0.1'

### Install from Git

If the Ruby gem is hosted at a git repository: https://github.com/GIT_USER_ID/GIT_REPO_ID, then add the following in the Gemfile:

    gem 'DealMakerAPI', :git => 'https://github.com/GIT_USER_ID/GIT_REPO_ID.git'

### Include the Ruby code directly

Include the Ruby code directly using `-I` as follows:

```shell
ruby -Ilib script.rb
```

## Getting Started

Please follow the [installation](#installation) procedure and then run the following code:

```ruby
# Load the gem
require 'DealMakerAPI'

# Setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DealApi.new
id = 56 # Integer | The deal id.

begin
  #Get a deal by id
  result = api_instance.get_deals_id(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Exception when calling DealApi->get_deals_id: #{e}"
end

```

## Documentation for API Endpoints

All URIs are relative to *http://api.dealmaker.tech*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DealMakerAPI::DealApi* | [**get_deals_id**](docs/DealApi.md#get_deals_id) | **GET** /deals/{id} | Get a deal by id


## Documentation for Models

 - [DealMakerAPI::V1EntitiesDeal](docs/V1EntitiesDeal.md)


## Documentation for Authorization

 All endpoints do not require authorization.
