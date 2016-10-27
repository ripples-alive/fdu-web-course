#!/usr/bin/env python

import requests

url = "http://localhost/level8/AdminForXss.php"

requests.get(url, cookies=dict(flag="THE_END_OF_THE_GAME"))
