<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class CallZohoEndPoint
{
    private $uri;
    private $token;
    private $data;
    private $headers;
    private $req;
    public function __construct()
    {
        $this->uri = 'https://www.zohoapis.com/books/v3/';
        $this->token = '1000.894b862e90074d252088aa4475c7d080.4089bc87265ecc902a8187ab24929f8e';
        $this->headers = ['Authorization' => 'Zoho-oauthtoken '.$this->token];
        $this->req = Http::withHeaders($this->headers);
    }
    public function getRequest($params = null)
    {
        $response = $this->req->get($this->uri.$params);
            return $response->json();
    }
    public function postRequest($params = null, $data = null)
    {
        $response = $this->req->post($this->uri.$params, $data);
        return $response->json();
    }
    public function putRequest($params = null, $data = null)
    {
        $response = $this->req->put($this->uri.$params, $data);
        return $response->json();
    }
}
