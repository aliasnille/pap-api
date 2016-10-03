![PAP-API - Open API that checks and verifies Swedish addresses and postal codes](http://www.papapi.se/img/papapi-main.png)

# PAP-API
*PAP is a abbreviation of "Postnummer - Adress - Postort" in Swedish.*

**_Open API that checks and verifies Swedish addresses and postal codes._**

## Introduction

For 10 years I worked as a web developer and in recent years I have been working more and more APIs of various kinds. This has created an interest in me for APIs.
When the vacation were approaching, I got time to develop my own API, maybe nothing revolutionary but a moderate project for me to test and learn.
My API is now finished and launched publicly. With PAP-API, you can easily retrieve data in XML, JSON or JSONP to check and verify addresses and postal codes in Sweden.

## Usage

PAP-API is free to use, but abnormally high usage (more than 5,000 requests per user and day) may result in suspension. Before you can start using PAP-API, you must sign up on [http://www.papapi.se/#registration](http://www.papapi.se/#registration) with your first name, last name and e-mail address. After registration you will receive a unique "token" that you use to connect to PAP-API.

**Note:** No registration details will disclosed to a third party.

### Specification

Parameter|Explanation|Example
---|---|---
**z**|Postal code / zip code|`z=114+34`
**s**|Street address|`s=Birger+Jarlsgatan` or `s=Birger+Jarlsgatan+10`
**c**|City|`c=Stockholm`
**v**|Address validation|`v=Birger+Jarlsgatan|10|114+34|Stockholm`

**Note** Only the parameters `s` (street address) and `c` (city) can be combined. To address validation separate street, street number, postal code and city with `|` (vertical bar). Values may not contain any spaces, these must be replaced with `+` (plus).

### Status codes (address validation)

Status code|Explanation
---|---
**100**|Correct specified address
**200**|Incorrect street number for the specified address
**300**|Incorrect street and/or street number for the specified address
**400**|Inorrect city for the specified address
**500**|Incorrect zipcode for the specified address
**600**|Incorrect street number and city for the specified address
**700**|Incorrect street number and zipcode for the specified address
**800**|Incorrect specified address
**900**|Generally error message

### Request data

#### XML

##### Examples of possible requests

Street address + City

`https://papapi.se/xml/?s=Birger+Jarlsgatan&c=Stockholm&token=YOUR_TOKEN`

Street address + Number + City

`https://papapi.se/xml/?s=Birger+Jarlsgatan+10&c=Stockholm&token=YOUR_TOKEN`

Street address

`https://papapi.se/xml/?s=Birger+Jarlsgatan&token=YOUR_TOKEN`

Street address + Number

`https://papapi.se/xml/?s=Birger+Jarlsgatan+10&token=YOUR_TOKEN`

Postal code

`https://papapi.se/xml/?z=114+34&token=YOUR_TOKEN`

City

`https://papapi.se/xml/?c=Stockholm&token=YOUR_TOKEN`

Address validation

`https://papapi.se/xml/?v=Birger+Jarlsgatan|10|114+34|Stockholm&token=YOUR_TOKEN`

#### JSON

##### Examples of possible requests

Street address + City

`https://papapi.se/json/?s=Birger+Jarlsgatan&c=Stockholm&token=YOUR_TOKEN`

Street address + Number + City

`https://papapi.se/json/?s=Birger+Jarlsgatan+10&c=Stockholm&token=YOUR_TOKEN`

Street address

`https://papapi.se/json/?s=Birger+Jarlsgatan&token=YOUR_TOKEN`

Street address + Number

`https://papapi.se/json/?s=Birger+Jarlsgatan+10&token=YOUR_TOKEN`

Postal code

`https://papapi.se/json/?z=114+34&token=YOUR_TOKEN`

City

`https://papapi.se/json/?c=Stockholm&token=YOUR_TOKEN`

Address validation

`https://papapi.se/json/?v=Birger+Jarlsgatan|10|114+34|Stockholm&token=YOUR_TOKEN`

#### JSONP

##### Examples of possible requests

Street address + City

`https://papapi.se/jsonp/?s=Birger+Jarlsgatan&c=Stockholm&token=YOUR_TOKEN`

Street address + Number + City

`https://papapi.se/jsonp/?s=Birger+Jarlsgatan+10&c=Stockholm&callback=YOUR_CALLBACK&token=YOUR_TOKEN`

Street address

`https://papapi.se/jsonp/?s=Birger+Jarlsgatan&callback=YOUR_CALLBACK&token=YOUR_TOKEN`

Street address + Number

`https://papapi.se/jsonp/?s=Birger+Jarlsgatan+10&callback=YOUR_CALLBACK&token=YOUR_TOKEN`

Postal code

`https://papapi.se/jsonp/?z=114+34&callback=YOUR_CALLBACK&token=YOUR_TOKEN`

City

`https://papapi.se/jsonp/?c=Stockholm&callback=YOUR_CALLBACK&token=YOUR_TOKEN`

Address validation

`https://papapi.se/jsonp/?v=Birger+Jarlsgatan|10|114+34|Stockholm&callback=YOUR_CALLBACK&token=YOUR_TOKEN`

### Response data

*Note: Max 200 rows per response.*

####XML

```
<result>
	<api>
		<name>PAP-API</name>
		<url>HTTP://WWW.PAPAPI.SE/</url>
		<version>1.21</version>
		<encoding>UTF-8</encoding>
	</api>
	<item>
		<street>BIRGER JARLSGATAN</street>
		<number>2-14</number>
		<zipcode>114 34</zipcode>
		<city>STOCKHOLM</city>
		<municipality>STOCKHOLM</municipality>
		<code>0180</code>
		<state>STOCKHOLM</state>		
	</item>
</result>
```

####XML (address validation)

```
<result>
	<api>
		<name>PAP-API</name>
		<url>HTTP://WWW.PAPAPI.SE/</url>
		<version>1.21</version>
		<encoding>UTF-8</encoding>
	</api>
	<address>
		<street>BIRGER JARLSGATAN</street>
		<number>10</number>
		<zipcode>114 34</zipcode>
		<city>STOCKHOLM</city>      
	</address>
	<status>
		<code>100</code>
		<description_sv>KORREKT ANGIVEN ADRESS</description_sv>
		<description_en>CORRECT SPECIFIED ADDRESS</description_en>     
	</status>
</result>
```

####JSON

```
{
	"api":{
			"name":"PAP-API",
			"url":"HTTP://WWW.PAPAPI.SE/",
			"version":"1.21",
			"encoding":"UTF-8"        
	},
	"result":[
		{
			"street":"BIRGER JARLSGATAN",
			"number":"2-14",
			"zipcode":"114 34",
			"city":"STOCKHOLM",
			"municipality":"STOCKHOLM",
			"code":"0180",
			"state":"STOCKHOLM"			
		}
	]
}
```

####JSON (address validation)

```
{
	"api":{
			"name":"PAP-API",
			"url":"HTTP://WWW.PAPAPI.SE/",
			"version":"1.21",
			"encoding":"UTF-8"        
	},
	"result":{
		"address":{
			"street":"BIRGER JARLSGATAN",
			"number":"10",
			"zipcode":"114 34",
			"city":"STOCKHOLM"
		},
		"status":{
			"code":"100",
			"description_sv":"KORREKT ANGIVEN ADRESS",
			"description_en":"CORRECT SPECIFIED ADDRESS"
		} 
	}
}
```

####JSONP

```
YOUR_CALLBACK(
	{
		"api":{
				"name":"PAP-API",
				"url":"HTTP://WWW.PAPAPI.SE/",
				"version":"1.21",
				"encoding":"UTF-8"        
		},
		"result":[
			{
				"street":"BIRGER JARLSGATAN",
				"number":"2-14",
				"zipcode":"114 34",
				"city":"STOCKHOLM",
				"municipality":"STOCKHOLM",
				"code":"0180",
				"state":"STOCKHOLM"			
			}
		]
	}
);
```

####JSONP (address validation)

```
YOUR_CALLBACK(
	{
		"api":{
				"name":"PAP-API",
				"url":"HTTP://WWW.PAPAPI.SE/",
				"version":"1.21",
				"encoding":"UTF-8"        
		},
		"result":{
			"address":{
				"street":"BIRGER JARLSGATAN",
				"number":"10",
				"zipcode":"114 34",
				"city":"STOCKHOLM"
			},
			"status":{
				"code":"100",
				"description_sv":"KORREKT ANGIVEN ADRESS",
				"description_en":"CORRECT SPECIFIED ADDRESS"
			} 
		}
	}
);
```

### Code examples

####XML TO PHP

```php
$token  = 'YOUR_TOKEN';
$url    = 'https://papapi.se/xml/?s=Birger+Jarlsgatan+10&c=Stockholm&token='.$token;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$xml = simplexml_load_string($response);

if ($xml->item) {
  // LIST RESULT
  foreach($xml->item as $item) {
    echo '<p>';
    echo 'Street: '.$item->street.'<br>';
    echo 'Number: '.$item->number.'<br>';
    echo 'Postal code: '.$item->zipcode.'<br>';
    echo 'City: '.$item->city.'<br>';
    echo 'Municipality: '.$item->municipality.'<br>';
    echo 'Code: '.$item->code.'<br>';
    echo 'State: '.$item->state;
    echo '</p>';
  }
} else {
  // EMPTY RESULT
  echo 'No result!';
}
```

####JSON TO PHP

```php
$token  = 'YOUR_TOKEN';
$url    = 'https://papapi.se/json/?s=Birger+Jarlsgatan+10&c=Stockholm&token='.$token;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$json = json_decode($response, true);

if (!$json['result']['message']) {
  // LIST RESULT
  foreach($json['result'] as $key => $val) {
    echo '<p>';
    echo 'Street: '.$val['street'].'<br>';
    echo 'Number: '.$val['number'].'<br>';
    echo 'Postal code: '.$val['zipcode'].'<br>';
    echo 'City: '.$val['city'].'<br>';
    echo 'Municipality: '.$val['municipality'].'<br>';
    echo 'Code: '.$val['code'].'<br>';
    echo 'State: '.$val['state'];
    echo '</p>';
  }
} else {
  // EMPTY RESULT
  echo 'No result!';
}
```

## Uptime

Check uptime for PAP-API, [http://www.papapi.se/#uptime](http://www.papapi.se/#uptime).

## Updates

**10/03/2016** - Regular monthly update of the database.

**09/13/2016** - Regular monthly update of the database.

**08/10/2016** - PAP-API now supports HTTPS (HTTP will continue working). Retrieve also data in [JSONP](https://github.com/aliasnille/pap-api#jsonp) with custom callback.

**08/08/2016** - Regular monthly update of the database.

**07/09/2016** - Regular monthly update of the database.

**06/09/2016** - Regular monthly update of the database.

**05/01/2016** - Regular monthly update of the database. This time a major update.

**04/06/2016** - Regular monthly update of the database.

**03/13/2016** - **Address validation new feature!** Use PAP-API to easily validate addresses. Learn more about address validation in the documentation above or visit [http://www.papapi.se/](http://www.papapi.se/). Even minor updates are made.

**03/06/2016** - Regular monthly update of the database.

**02/07/2016** - Regular monthly update of the database.

**01/03/2016** - Major update! PAP-API has moved to a new domain ([http://www.papapi.se/](http://www.papapi.se/)) and has launched a website. Please visit the website! PAP-API will continue to work on the old domain (pap.devr.se) for six months (07/03/2016). If you use PAP API, you only need to replace **pap.devr.se** with **papapi.se**.

**01/01/2016** - Regular monthly update of the database.

**12/15/2015** - Regular monthly update of the database.

**11/17/2015** - Regular monthly update of the database.

**10/08/2015** - Regular monthly update of the database.

**09/03/2015** - Regular monthly update + added municipality code ("kommunkod" in Swedish) in [response data](https://github.com/aliasnille/pap-api#response-data). Decreased the number of requests from 6,000 to 5,000 per user and day. Also decreased the number of rows per result from 250 to 200.

**08/22/2015** - Redesign of [registration](http://pap.devr.se/registration) and [uptime](http://pap.devr.se/uptime).

**08/18/2015** - Major update of the database and optimization. The database now contains nearly 650,000 unique rows. Guarantee an accuracy of 95 % for each request. Many updates are underway.

**08/07/2015** - New major update of the database. Added municipality ("kommun" in Swedish) and state ("län" in Swedish). The added data is also available in the [response data](https://github.com/aliasnille/pap-api#response-data).

**08/06/2015** - Major update of the database (now more than 430,000 unique rows).

**08/02/2015** - PAP-API launched.

## License

This project is released under the [MIT License](https://github.com/aliasnille/pap-api/blob/master/LICENSE).

**_Please report any bugs!_**
