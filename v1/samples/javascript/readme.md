# DealMaker API JavaScript Sample

## Requirements

* NodeJS
* Git

## Usage Instructions

### Preparing the Client

1. First, clone this repository to your local machine: `$ git clone https://github.com/DealMakerTech/api`.
2. In a terminal, navigate to `v1/clients/javascript`: `$ cd v1/clients/javascript`.
3. Install client dependencies: `$ npm install`.
4. Build the client: `$ npm run build`.
5. Make the client available to the sample: `$ npm link`.

### Running the Sample

1. In your terminal, navigate to `v1/samples/javascript`: `$ cd v1/samples/javascript`.
2. Install dependencies: `$ npm install`.
3. Copy the file `.env.template` to `.env` in `v1/samples/javascript` and fill in the appropriate values, which are visible on your DealMaker account.
4. In your terminal, run `$ node app.js [deal-id]` to output basic information about a deal. Replace `[deal-id]` with the numeric id of your deal. 