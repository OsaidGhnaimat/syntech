<?php

namespace App;

class Constant
{
    const HTTP_CODE   = ['success' => 200, 'created' => 201, 'updated' => 202, 'bad_request' => 400, 'unauthorized' => 401, 'forbidden' => 403, 'not_found' => 404, 'server_error' => 500];
    const HTTP_STATUS = ['success' => 'success', 'failed' => 'failed'];
}
