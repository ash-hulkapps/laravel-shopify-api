<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Osiset\BasicShopifyAPI\BasicShopifyAPI;
use Osiset\BasicShopifyAPI\Options;
use Osiset\BasicShopifyAPI\Session;

class ProductController extends Controller
{
//    private $options;
//    public function __construct()
//    {
//        $this->options = new Options();
//        $this->options->setVersion('2021-04');
//        $this->options->setApiKey(config('shopify-config.shopify_api_key'));
//        $this->options->setApiSecret(config('shopify-config.shopify_api_secret'));
//        $this->options->setApiPassword(config('shopify-config.shopify_api_password'));
//    }

    public function index ()
    {
        $customers = Http::get($this->prepareUrl('https://{{api_key}}:{{api_password}}@{{store_name}}.myshopify.com/admin/api/{{api_version}}/customers.json'));
        $customers = json_decode($customers->body())->customers;

        $products = Http::get($this->prepareUrl('https://{{api_key}}:{{api_password}}@{{store_name}}.myshopify.com/admin/api/{{api_version}}/products.json'));
        $products = json_decode($products->body())->products;

//        $query = '
//            {
//              customers(first:2) {
//                edges {
//                  node {
//                    firstName
//                  }
//                }
//              }
//            }';

//        $api = new BasicShopifyAPI($this->options);
//        $api->setSession(new Session('demo-ashish.myshopify.com', config('shopify-config.shopify_api_key')));
//
//// Now run your requests...
//        $result = $api->graph($query);
//        $customers = $result['body']['container']['data']['customers']['edges'];
//
//        $input = "
//         'input': {
//            email: 'pasras@gmail.com',
//            customer_id: 5172487979180,
//         }
//        ";

//        $customerUpdateQuery = 'mutation customerUpdate('.$input.': CustomerInput!) {
//                                  customerUpdate(input: '.$input.') {
//                                    customer {
//                                      id
//                                    }
//                                    userErrors {
//                                      field
//                                      message
//                                    }
//                                  }
//                                }';

//        dd($products);
        return view('home.index', compact('customers', 'products'));
    }

    public function prepareUrl($url)
    {
        $shopifyApi = config('shopify-config.shopify_api_key');
        $shopifyPassword = config('shopify-config.shopify_api_password');
        $shopifyStore = 'demo-ashish';
        $shopifyVersion = '2021-04';
        $url = str_replace("{{api_key}}", $shopifyApi, $url);
        $url = str_replace('{{api_password}}', $shopifyPassword, $url);
        $url = str_replace('{{store_name}}', $shopifyStore, $url);
        $url = str_replace('{{api_version}}', $shopifyVersion, $url);

        return $url;
    }
}
