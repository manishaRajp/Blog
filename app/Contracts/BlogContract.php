<?php

namespace App\Contracts;

use App\Http\Requests\Category\StoreRequest;
use Illuminate\Support\Arr;

interface BlogContract
{
    public function all();

    public function edit($slug);

    public function store($request);

    public function update($request);
 
    public function delete($slug);
}
