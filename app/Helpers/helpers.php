<?php
use \Illuminate\Support\Str;
use WebPConvert\WebPConvert;

if (! function_exists('asset_public')) {
    /**
    * Full asset public path
    */
    function asset_public($path = null)
    {
        return env('FRONT_PUBLIC', 'http://localhost/dash_laravel8/public/') . $path;
    }
}

if (! function_exists('upload_image'))
{
    /**
     * @param $fileRequest
     * @return string
     * @throws \WebPConvert\Convert\Exceptions\ConversionFailedException
     */
    function upload_image($fileRequest)
     {
         $imageName = 'image'. time() . '.' . $fileRequest->getClientOriginalExtension();

         $fileRequest->move(public_path('image'), $imageName);

         $source =public_path('image/'.$imageName) ;

         $output = $source.'.webp';

         WebPConvert::convert( $source , $output) ;

         return $imageName ;
     }
}


if (! function_exists('upload_images')){

    /**
     * @param $fileRequests
     * @return array
     * @throws \WebPConvert\Convert\Exceptions\ConversionFailedException
     */
    function upload_images($fileRequests){

        $totalImages = [];
         for($i=0 ; $i<count($fileRequests) ; $i++)
        {
            $imageName = 'image'. time() . $i . '.' . $fileRequests[$i]->getClientOriginalExtension();

            $fileRequests[$i]->move(public_path('image'), $imageName);

            $source =public_path('image/'.$imageName) ;

            $output = $source.'.webp';
            WebPConvert::convert( $source , $output) ;

            $totalImages[] = $imageName ;
        }

        return  json_encode($totalImages) ;
    }
}

if (! function_exists('updateMultiImage')){

    /**
     * @param $files
     * @param $oldFiles
     * @return array
     * @throws \WebPConvert\Convert\Exceptions\ConversionFailedException
     */
    function updateMultiImage($files ,$oldFiles){

        $totalFiles = [];
        $files = collect($files)->values() ;
        for($i=0 ; $i<count($files) ; $i++)
        {
            $imageName = 'image'. time() . $i . '.' . $files[$i]->getClientOriginalExtension();

            $files[$i]->move(public_path('image'), $imageName);

            $source =public_path('image/'.$imageName) ;

            $output = $source.'.webp';

            WebPConvert::convert( $source , $output) ;

            $totalFiles[] = $imageName ;
        }
        empty($oldFiles) ?
            $totalFiles = json_encode($totalFiles) :
            $totalFiles= json_encode(array_merge(json_decode($oldFiles, true),$totalFiles ), true) ;

        return  $totalFiles ;
    }
}

if (! function_exists('current_lang'))
{
    /**
     * Return Current Url With Same Language
     * @return string
     */
    function current_lang()
    {
        $language = Str::after(URL::current(), env('FRONT_PUBLIC', 'http://akwanmedia.com/'));
        return Str::substr($language ,0,2);
    }
}
