<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResponse extends JsonResource
{
    /**
     * ApiResponse coustructor
     *
     * @param null $data
     * @param int $status
     * @param array $headers
     * @param int $options
     *
     * @throws ApiResponseForamtException
     *
     */

     public function __construct($data=[], $status = 200, $header = [], $options = 0 ){
         $this->encodingOptions = $options;

        //  http code >= 300, data 須符合格式
         if($status >= 300){
             if(!array_key_exists('message', $data)){
                 throw new ApiResponseForamtException('message');
             }
             if(!array_key_exits('status', $data)){
                //  api 預設成功為 success
                 $data['status'] = true;
             }
         }
         elseif($status < 300){
             if(!array_key_exists('message', $data)){
                 $data['message'] = 'success';
             }
             if(!array_key_exists('status', $data)){
                 $data['status'] = true;
             }
         }

         parent::__construct($dsata, $status, $header);
     }
}
