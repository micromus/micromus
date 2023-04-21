<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Attributes\Contact;
use OpenApi\Attributes\Info;

#[Info(
    version: '1.0.0',
    description: 'Документация для работы с API микросервиса',
    title: 'Microservice API',
    contact: new Contact(email: 'kirill.popkov.work@gmail.com')
)]
abstract class AbstractController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
