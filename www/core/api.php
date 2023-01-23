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
        $qs = http_build_query($this->parameters); // la chaîne de requête encode les paramètres
        $request = "{$this->url}/listings/latest?{$qs}"; // créer l'URL de la demande

        $curl = curl_init(); // Obtenir la ressource cURL
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // définir l'URL de la demande
            CURLOPT_HTTPHEADER => $this->headers,     // définir les en-têtes
            CURLOPT_RETURNTRANSFER => 1         // demander une réponse brute au lieu de bool
        ));

        $response = curl_exec($curl); // Envoyez la demande, enregistrez la réponse

        if (property_exists(json_decode($response), "data")) {
            $data = json_decode($response)->data;// réponse décodée json
        } else {
            $data = null;
        }
        curl_close($curl); // Fermer la demande
        return $data;
    }

    function queryById($params)
    {
        $this->parameters = [
            'id' => implode(',', $params)
        ];
        $qs = http_build_query($this->parameters); // la chaîne de requête encode les paramètres
        $request = "{$this->url}/quotes/latest?{$qs}"; // créer l'URL de la demande

        $curl = curl_init(); // Obtenir la ressource cURL
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request,            // définir l'URL de la demande
            CURLOPT_HTTPHEADER => $this->headers,     // définir les en-têtes
            CURLOPT_RETURNTRANSFER => 1          // demander une réponse brute au lieu de bool
        ));

        $response = curl_exec($curl); // Envoyez la demande, enregistrez la réponse

        if (property_exists(json_decode($response), "data")) {
            $data = json_decode($response)->data;// réponse décodée json
        } else {
            $data = null;
        }
        curl_close($curl); // Fermer la demande
        return $data;
    }

}

