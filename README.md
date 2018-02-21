

# Wargaming Api

This package composer, allows to use more simply the 
**wargaming API** with a very simple and well documented 
object-oriented code for your IDE (*integrated development environment*).

## Documentation. [full doc here](DOC.md)

1) Get your application id [here](https://developers.wargaming.net/applications/)
2) Initialise your application

	| Region        | code |
	| ------------- | ---- |
	| Russia        | ru   |
	| Europe        | eu   |
	| Asia          | asia |
	| North America | na   |
	```php
	$WarGaming = new WargamingApi($application_id = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx", $region = "eu");
	```
3) Make request
	
	1) Search player
		```php
		$WarGaming->searchPlayers($search = "volca", $options = [
			"limit" => 10,
			"method" => "startswith",
			"region" => "eu"
		]);
		```
	2) Search player(s) by id
		```php
		$WarGaming->infoPlayersById($players_id = ["500080014", "514444123", "514444121"], $options = [
			"region" => "eu"
		]);
		```
	3) Server info
		```php
		$WarGaming->serverInfo($region = "eu");
		```
	4) Search clans
		```php
		$WarGaming->searchClans($search = "volca", $options = [
			"limit" => 10,
			"pagination" => "1",
			"region" => "eu"
		]);
		```
	5) Search clans by id
		```php
		$WarGaming->infoClansById($clans_id = ["500041879", "500034196"], $options = [
			"region" => "eu"
		]);
		```
	5) Search clans of player(s) id
		```php
		$WarGaming->playerClans($players_id = ["500450795", "503197062", "500435236"]);
		```

## License

```
The MIT License (MIT)

Copyright (c) 2018 

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

