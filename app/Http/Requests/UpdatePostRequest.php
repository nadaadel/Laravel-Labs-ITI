<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Post;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    { 
        $id = $this->route('id');
        $post = Post::find($id);
        return [
          
            'title' => ['required','min:3'  ,
            Rule::unique('posts')->ignore($post->title , 'title')],
            'body'  => 'required|unique:posts|min:10'  
         ];
    
    }
}
