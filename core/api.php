<?php

namespace Core;

use Core\Auth;

class Api
{

    protected string $url;
    protected array $parameters;
    protected array $headers;

    function __construct()
    {
        $this->url = Auth::API;

        $this->headers = [
            'Accept: */*',
            'X-CMC_PRO_API_KEY: ' . Auth::X_CMC_PRO_API_KEY
        ];
    }

    function queryAll($start, $limit, $convert)
    {
        $this->parameters = [
            'start' => $start,
            'limit' => $limit,
            'convert' => $convert
        ];
        $qs = http_build_query($this->parameters); // query string encode the parameters
        $request = "{$this->url}/listings/latest?{$qs}"; // create the request URL

        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $this->headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response

        if (property_exists(json_decode($response), "data")) {
            $data = json_decode($response)->data;// json decoded response
        } else {
            $data = null;
        }
        curl_close($curl); // Close request
        return $data;
    }

    function queryById($params)
    {
        $this->parameters = [
            'id' => implode(',', $params)
        ];
        $qs = http_build_query($this->parameters); // query string encode the parameters
        $request = "{$this->url}/quotes/latest?{$qs}"; // create the request URL

        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // set the request URL
            CURLOPT_HTTPHEADER => $this->headers,     // set the headers
            CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response

        if (property_exists(json_decode($response), "data")) {
            $data = json_decode($response)->data;// json decoded response
        } else {
            $data = null;
        }
        curl_close($curl); // Close request
        return $data;
    }

}

