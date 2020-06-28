<?php

use App\Models\Language;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

function getActiveLanguages()
{
	return Language::active()->get();
}

function getDefaultLanguage()
{
	return Config::get('app.locale');
}

function getLanguagesWithOutTheDefault()
{
	return Language::where('abbr', '!=', getDefaultLanguage())->active()->get();
}


function savePhoto($requestData, $folderName)
{
	$path = $requestData->file('photo')->store($folderName, 's3');
	$url = Storage::disk('s3')->url($path);
	return $url;
}