# CEP - Custom Error Page
Simple yet elegant custom HTML error page [single PHP file]
- should work with any webserver, tested for NGINX

# Fast setup
- instead of hosting it yourself, use 'error.modernalt.eu' as ERROR_PAGE_DOMAIN

# Usage
- pass the error from webserver to error site => http(s)://ERROR_PAGE_DOMAIN/?error=$ERROR_CODE&url=$origin.domain.tld&protocol=https;
- properties:
  - error (error code)
  - url (url of origin without protocol)
  - protocol (protocol of origin - http/https) 

## Inside NGINX site config (in /location)
```
# Error handling inside the server block
error_page 400 =301 https://ERROR_PAGE_DOMAIN/?error=400&url=$origin.domain.tld&protocol=https;
error_page 401 =301 https://ERROR_PAGE_DOMAIN/?error=401&url=$origin.domain.tld&protocol=https;
error_page 403 =301 https://ERROR_PAGE_DOMAIN/?error=403&url=$origin.domain.tld&protocol=https;
error_page 404 =301 https://ERROR_PAGE_DOMAIN/?error=404&url=$origin.domain.tld&protocol=https;
error_page 500 =301 https://ERROR_PAGE_DOMAIN/?error=500&url=$origin.domain.tld&protocol=https;
error_page 502 =301 https://ERROR_PAGE_DOMAIN/?error=502&url=$origin.domain.tld&protocol=https;
error_page 503 =301 https://ERROR_PAGE_DOMAIN/?error=503&url=$origin.domain.tld&protocol=https;
error_page 504 =301 https://ERROR_PAGE_DOMAIN/?error=504&url=$origin.domain.tld&protocol=https;
```

## Inside NGINX config (nginx.conf, inside server {})
```
# Error handling inside server block
error_page 400 401 402 403 404 405 406 407 408 409 410 411 412 413 414 415 416 417 418 421 422 423 424 425 426 428 429 431 451 500 501 502 503 504 505 506 507 508 510 511 = @error_handler;

location @error_handler {
    internal;
    return 301 https://ERROR_PAGE_DOMAIN/?error=$status&url=$host&protocol=https;
}
```
