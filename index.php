<?php
$error = $_GET['error'];
$url = isset($_GET['url']) ? $_GET['url'] : "unknown";
$protocol = (isset($_GET['protocol']) && $_GET['protocol'] === "https" ? "<span style='color:green'>secure" : "<span style='color:red'>insecure") . "</span>";

function errorDesc(int $code) {
    // Array of error descriptions
    $errorDescriptions = [
        301 => "Moved Permanently: The requested page has been moved to a new URL.",
        400 => "Bad Request: The server could not understand the request due to invalid syntax.",
        401 => "Unauthorized: The client must authenticate itself to get the requested response.",
        402 => "Payment Required: This response code is reserved for future use.",
        403 => "Forbidden: The client does not have access rights to the content; the server is refusing to give the requested resource.",
        404 => "Not Found: The server can not find the requested resource. This can also indicate that the URL is incorrect.",
        405 => "Method Not Allowed: The request method is known by the server but has been disabled and cannot be used.",
        406 => "Not Acceptable: The server cannot produce a response matching the list of acceptable values defined in the request's headers.",
        407 => "Proxy Authentication Required: The client must first authenticate itself with the proxy.",
        408 => "Request Timeout: The server would like to shut down this unused connection.",
        409 => "Conflict: The request could not be completed due to a conflict with the current state of the resource.",
        410 => "Gone: The requested resource is no longer available on the server and no forwarding address is known.",
        411 => "Length Required: The server refuses to accept the request without a defined Content-Length.",
        412 => "Precondition Failed: The server does not meet one of the preconditions that the requester put on the request.",
        413 => "Payload Too Large: The request is larger than the server is willing or able to process.",
        414 => "URI Too Long: The URI provided was too long for the server to process.",
        415 => "Unsupported Media Type: The media type of the request data is not supported by the server.",
        416 => "Range Not Satisfiable: The range specified by the Range header field in the request can't be fulfilled.",
        417 => "Expectation Failed: The server cannot meet the requirements of the Expect request-header field.",
        418 => "I'm a teapot: Any attempt to instruct a teapot to brew coffee should result in the error 'teapot' instead of producing coffee.",
        421 => "Misdirected Request: The request was directed at a server that is not able to produce a response.",
        422 => "Unprocessable Entity: The request was well-formed but was unable to be followed due to semantic errors.",
        423 => "Locked: The resource that is being accessed is locked.",
        424 => "Failed Dependency: The request failed due to failure of a previous request.",
        425 => "Too Early: Indicates that the server is unwilling to risk processing a request that might be replayed.",
        426 => "Upgrade Required: The client should switch to a different protocol such as TLS/1.0.",
        428 => "Precondition Required: The origin server requires the request to be conditional.",
        429 => "Too Many Requests: The user has sent too many requests in a given amount of time.",
        431 => "Request Header Fields Too Large: The server is unwilling to process the request because its header fields are too large.",
        451 => "Unavailable For Legal Reasons: The user requests an illegal resource, such as a web page censored by a government.",
        500 => "Internal Server Error: The server has encountered a situation it doesn't know how to handle.",
        501 => "Not Implemented: The request method is not supported by the server and cannot be handled.",
        502 => "Bad Gateway: The server, while acting as a gateway or proxy, received an invalid response from the upstream server.",
        503 => "Service Unavailable: The server is not ready to handle the request, usually due to maintenance or overload.",
        504 => "Gateway Timeout: The server is acting as a gateway and cannot get a response in time.",
        505 => "HTTP Version Not Supported: The HTTP version used in the request is not supported by the server.",
        506 => "Variant Also Negotiates: The server has an internal configuration error: transparent content negotiation for the request results in a circular reference.",
        507 => "Insufficient Storage: The server is unable to store the representation needed to successfully complete the request.",
        508 => "Loop Detected: The server detected an infinite loop while processing a request.",
        510 => "Not Extended: Further extensions to the request are required for the server to fulfill it.",
        511 => "Network Authentication Required: The client needs to authenticate to gain network access."
    ];

    // Return the description if the code exists, otherwise return a default message
    return $errorDescriptions[$code] ?? "unknown error code: $code";
}
?>
<!DOCTYPE html>
<html lang="cs">
    <head>
        <title>ERROR <?= $error;?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="ERROR <?= $error;?>">
        <meta name="keywords" content="error, HTML">
        <meta name="author" content="YOUR_PAGE_NAME">
        <meta name="robots" content="noindex, nofollow">
        <!-- favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="YOUR_FAVICON">
	  <style>
@import url('https://fonts.googleapis.com/css2?family=Major+Mono+Display&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap');

* {
    font-family: "Pixelify Sans", sans-serif;
}
html {
    background-color: rgb(0, 0, 0);
    line-height: 1;
}

body {
    height: 100vh;
}

a {
    text-decoration: none;
    color: white;
    transition: background-color 1.5s, color 1.5s;
    padding: 5px;
    border-radius: 5px;
    display: flex;
}

a:hover {
    background-color: white;
    color: black;
}

p {
    text-align: center;
    color: rgb(238, 238, 238);
    margin-inline: 0;
    margin-block: 0;   
}

p.error {
    font-size: 240px;
    animation: back 2s infinite linear;
}

.main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
    gap: 10px;

    & .box {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
}

details {
    color: white;
    font-size: 20px;
    font-family: 'Major Mono Display', monospace;
    margin: 10px;
    padding: 10px;
    border: 1px solid white;
    border-radius: 5px;
    background-color: black;
    line-height: 1.5;
    margin-top: 20px;
    
    & summary {
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1;
    }
}

p.text {
    animation: text 7s infinite alternate linear;
    padding: 10px;
    box-sizin: border-box;
    font-size: 40px;
    font-weight: bold;
    display: flex;
    gap: 10px;
}

@keyframes back {
    0% { transform: skewY(-2deg); }
    5% { transform: skewY(2deg); }
    10% { transform: skewY(-2deg); }
    15% { transform: skewY(2deg); }
    20% { transform: skewY(0deg); }
    100% { transform: skewY(0deg); }
}

@keyframes text {
    0% { background-color: black; }
    75% {color: black}
    100% { background-color: red; color: black}
}
</style>
    </head>
    <body>
        <div class="main">
            <div class="box">
                <p class="text">SITE'S DOWN <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M5 3h14v2H5zm0 16H3V5h2zm14 0v2H5v-2zm0 0h2V5h-2zM10 8H8v2h2zm4 0h2v2h-2zm-5 8v-2h6v2h2v-2h-2v-2H9v2H7v2z"/></svg></p>
            </div>
            <div class="box">
                
            </div>
            <div class="box">
                <p class="error"><?= $error;?></p>
                <details>
                    <summary><span style="font-size: 75%; color:gray"><?= $url;?> (<?= $protocol;?>)</span></summary>
                    <p>
                        <span style="font-size: 75%;"><?= errorDesc($error);?></span>
                    </p>
                </details>
            </div>

            <div class="box">
                <p style="font-size: 200%">
                    <a href="<?= $_GET['protocol'] . '://' . $url;?>"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M16 2h-2v2h2v2H4v2H2v5h2V8h12v2h-2v2h2v-2h2V8h2V6h-2V4h-2zM6 20h2v2h2v-2H8v-2h12v-2h2v-5h-2v5H8v-2h2v-2H8v2H6v2H4v2h2z"/></svg></a>
                </p>
            </div>
        </div>
    </body>
</html>
