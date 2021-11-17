<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function companyClients() {
        return $this->hasMany('App\Client', 'company_id', 'id');
    }
}
