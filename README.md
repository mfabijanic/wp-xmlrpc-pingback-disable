# WordPress XML-RPC Pingback Disable
Disable vulnerability "WordPress XML-RPC Pingback Abuse".

Zip wp-xmlrpc-pingback-disable directory with the plugin.

```sh
cd src
zip -r wp-xmlrpc-pingback-disable.zip wp-xmlrpc-pingback-disable
```

Upload in your WordPress site and activate the plugin.


Check if site is affected with this vulnerability. Change URL to your site in request.

```sh
curl -k -X POST -H 'Content-type: text/xml' -d '<?xml version="1.0" encoding="iso-8859-1"?><methodCall><methodName>pingback.ping</methodName><params><param><value><string>http://127.0.0.1</string></value></param><param><value><string></string></value></param></params></methodCall>' https://example.com/xmlrpc.php
```

Response
```xml
<?xml version="1.0" encoding="UTF-8"?>
<methodResponse>
  <fault>
    <value>
      <struct>
        <member>
          <name>faultCode</name>
          <value><int>0</int></value>
        </member>
        <member>
          <name>faultString</name>
          <value><string></string></value>
        </member>
      </struct>
    </value>
  </fault>
</methodResponse>
```

Response after plugin activation, "No pingbacks".

```xml
<?xml version="1.0" encoding="UTF-8"?>
<methodResponse>
  <fault>
    <value>
      <struct>
        <member>
          <name>faultCode</name>
          <value><int>403</int></value>
        </member>
        <member>
          <name>faultString</name>
          <value><string>No pingbacks</string></value>
        </member>
      </struct>
    </value>
  </fault>
</methodResponse>
```

