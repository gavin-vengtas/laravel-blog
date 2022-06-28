<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter 
{   
    // public function __construct(ApiClient $client)
    // {
    //     # code...
    // }

    public function subscribe(string $email,string $list = null)
    {
        $list = $list == null ? config('services.mailchimp.lists.subscribers'):$list;

        return $this->client()->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }

    protected function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us13'
        ]);
    }
}
