# DealMaker API Ruby Sample

## Requirements

* Ruby (minimum 2.7.2)
* Git
* Bundler

## Usage Instructions

1. First, clone this repository to your local machine: `$ git clone https://github.com/DealMakerTech/api`.
2. In a terminal, navigate to `v1/samples/ruby`: `$ cd v1/samples/ruby`.
3. Install Bundler: `$ gem install bundler`.
4. Run `bundle install` to install dependencies.
5. Copy the file `.env.template` to `.env` in `v1/samples/ruby` and fill in the appropriate values, which are visible on your DealMaker account.
6. In your terminal, run `$ ruby app.rb [deal-id]` to output basic information about a deal. Replace `[deal-id]` with the numeric id of your deal. 