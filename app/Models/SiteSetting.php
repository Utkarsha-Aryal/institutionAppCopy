<?php

namespace App\Models;

use App\Models\Common;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    public static function updatedata($post)
    {
        try {
            $updateArray = [
                'name' => $post['name'],
                'email' => $post['email'],
                'phone_number' => $post['phone_number'],
                'address' => $post['address'],
                'link_facebook' => $post['link_facebook'],
                'link_youtube' => $post['link_youtube'],
                'link_instagram' => $post['link_instagram'],
                'link_twitter' => $post['link_twitter'],
                'link_linkedin' => $post['link_linkedin'],
                'link_map' => $post['link_map'],
            ];

            if (!empty($post['croppedImg'])) {
                $fileName =  Common::uploadCroppedImage('setting', $post['croppedImg']);
                if (!$fileName) {
                    return false;
                }
                $updateArray['img_logo'] = $fileName;
            } else {

                if (!empty($post['img_logo'])) {
                    $fileName = Common::uploadFile('setting', $post['img_logo']);
                    if (!$fileName) {
                        return false;
                    }
                    $updateArray['img_logo'] = $fileName;
                }
            }


            if (!empty($post['croppedImgFavicon'])) {
                $fileName =  Common::uploadCroppedImage('setting', $post['croppedImgFavicon']);
                if (!$fileName) {
                    return false;
                }
                $updateArray['img_favicon'] = $fileName;
            } else {
                if (!empty($post['img_favicon'])) {
                    $fileName = Common::uploadFile('setting', $post['img_favicon']);
                    if (!$fileName) {
                        return false;
                    }
                    $updateArray['img_favicon'] = $fileName;
                }
            }

            $updateArray['updated_at'] = Carbon::now();

            if (!SiteSetting::where('id', 1)->update($updateArray)) {
                throw new Exception("Couldn't Save Records", 1);
            }

            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
