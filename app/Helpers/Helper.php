<?php

use Illuminate\Http\Request;

function upload($file = null)
{
	$path = '';
    if(is_file($file)){
    	$fileName = md5($file->getClientOriginalName().''.strtotime('now')).'.'.$file->getClientOriginalExtension();
        $file->storeAs('images', $fileName, 'public');
        $path = 'images/'.$fileName;
    }
    return $path;
}

