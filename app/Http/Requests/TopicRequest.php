<?php

namespace App\Http\Requests;

class TopicRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    // CREATE ROLES
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    // UPDATE ROLES
                    'title'         =>  'required|min:2',
                    'body'          =>  'required|min:3',
                    'category_id'   =>  'required|numeric',
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }

    public function messages()
    {
        return [
            // Validation messages
            'title.min' =>  '标题至少要两个字以上',
            'body.min'  =>  '文章内容至少要三个字以上',
        ];
    }
}
