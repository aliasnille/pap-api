# PAP-API
*PAP is a abbreviation of "Postnummer - Adress - Postort" in Swedish.*

**_Simple API that check and verify Swedish street addresses and postal codes / zip codes._**

## Introduction

For 10 years I worked as a web developer and in recent years I have been working more and more APIs of various kinds. This has created an interest in me for APIs.
When the vacation were approaching, I got time to develop my own API, maybe nothing revolutionary but a moderate project for me to test and learn.
My API is now finished and launched publicly. With PAP-API, you can easily retrieve data in XML and / or JSON to check and verify street addresses and postal codes / zip codes in Sweden.

## Usage

PAP-API is free to use, but abnormally high usage (more than 6,000 requests per user and day) may result in suspension. Before you can start using PAP-API, you must sign up on [http://pap.devr.se/registration](http://pap.devr.se/registration) with your first name, last name and e-mail address. After registration you will receive a unique "token" that you use to connect to PAP-API.

**Note:** No registration details will disclosed to a third party.

### Specification

Parameter|Explanation|Example
---|---|---
**z**|Postal code / zip code|`z=114+34`
**s**|Street address|`s=Birger+Jarlsgatan` or `s=Birger+Jarlsgatan+10`
**c**|City|`c=Stockholm`

**Note** Only the parameters `s` (street address) and `c` (city) can be combined. Values may not contain any spaces, these must be replaced with `+`.

### Request data

#### XML

##### Examples of possible requests

*Note: Max 250 rows per result.*

Street address + City

`http://pap.devr.se/xml/?s=Birger+Jarlsgatan&c=Stockholm&token=YOUR_TOKEN`

Street address + Number + City

`http://pap.devr.se/xml/?s=Birger+Jarlsgatan+10&c=Stockholm&token=YOUR_TOKEN`

Street address

`http://pap.devr.se/xml/?s=Birger+Jarlsgatan&token=YOUR_TOKEN`

Street address + Number

`http://pap.devr.se/xml/?s=Birger+Jarlsgatan+10&token=YOUR_TOKEN`

Postal code / zip code

`http://pap.devr.se/xml/?z=114+34&token=YOUR_TOKEN`

City

`http://pap.devr.se/xml/?c=Stockholm&token=YOUR_TOKEN`

#### JSON

##### Examples of possible requests

*Note: Max 250 rows per result.*

Street address + City

`http://pap.devr.se/json/?s=Birger+Jarlsgatan&c=Stockholm&token=YOUR_TOKEN`

Street address + Number + City

`http://pap.devr.se/json/?s=Birger+Jarlsgatan+10&c=Stockholm&token=YOUR_TOKEN`

Street address

`http://pap.devr.se/json/?s=Birger+Jarlsgatan&token=YOUR_TOKEN`

Street address + Number

`http://pap.devr.se/json/?s=Birger+Jarlsgatan+10&token=YOUR_TOKEN`

Postal code / zip code

`http://pap.devr.se/json/?z=114+34&token=YOUR_TOKEN`

City

`http://pap.devr.se/json/?c=Stockholm&token=YOUR_TOKEN`

### Response data

####XML

```
<result>
	<item>
		<street>BIRGER JARLSGATAN</street>
		<number>2-14</number>
		<zipcode>114 34</zipcode>
		<city>STOCKHOLM</city>
	</item>
</result>
```

####JSON

```
{
	"result":[
		{
			"street":"BIRGER JARLSGATAN",
			"number":"2-14",
			"zipcode":"114 34",
			"city":"STOCKHOLM"
		}
	]
}
```

## Uptime

Check uptime for PAP-API, [http://pap.devr.se/uptime](http://pap.devr.se/uptime).

## Updates

**08/02/2015** - PAP-API launched.

## License

This project is released under the [MIT License](https://github.com/aliasnille/pap-api/blob/master/LICENSE).

**_Please report any bugs!_**
