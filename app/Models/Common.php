<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;


class Common extends Model
{
    use HasFactory;

    public static function uploadFile($directory,$file)
    {
        try {
            $extension = $file->getClientOriginalExtension();
            if (!in_array($extension, ['png', 'jpg', 'jpeg']))
                throw new Exception('File format is not matched, upload in list (PNG/JPG/JPEG', 1);

            $tempName = Str::random(30) . '-' . time() . '.' . $extension;
            $storeFile = $file->storeAs($directory, $tempName, 'public');

            if (empty($storeFile))
                return false;

            return $tempName;
        } catch (Exception $e) {
            throw $e;
        }
    }


    public static function deleteSingleData($post, $model,  $status)
    {
        try {
            // Ensure 'id' and 'status' are present in the post data
            if (empty($post['id']) || empty($status)) {
                throw new Exception("Record ID or status is missing.");
            }

            // Find the record by ID
            
            $record = $model::find($post['id']);
            if (!$record) {
                throw new Exception("Record not found.");
            }

            // Update the status
            $record->status = $status;
            if ($record->save()) {
                return true;
            }

            throw new Exception("Couldn't update the status for record with ID: {$post['id']}");
            
        } catch (Exception $e) {
            \Log::error("Update status error: " . $e->getMessage()); // Log the error
            return false; // Return false if an error occurs
        }
    }

       //upload cropped image
       public static function uploadCroppedImage($location, $file)
       {
           try {
               if (!empty($file)) {
                   $image_parts = explode(";base64,", $file);
                   $image_base64 = base64_decode($image_parts[1]);
                   $imageName = Str::random(30) . '-' . time() . '.png';
                   $storeFile = Storage::disk('public')->put($location . '/' . $imageName, $image_base64);
               }
               if (empty($storeFile))
                   return false;
   
               return $imageName;
           } catch (Exception $e) {
               throw $e;
           }
       }

       public static function deleteRelationData($post, $class, $filepath)
    {
        try {
            $query = $class::query();
            if ($post['type'] === "trashed") {

                if (method_exists($class, 'images')) {
                    $query->with('images');
                }

                if (method_exists($class, 'videos')) {
                    $query->with('videos');
                }
                if (method_exists($class, 'teamCategory')) {
                    $query->with('teamCategory');
                }

                $postInstance = $query->findOrFail($post['id']);


                //delete relation -start
                // Delete related images
                if ($postInstance->images) {
                    foreach ($postInstance->images as $image) {

                        if (!$image->delete()) {
                            throw new Exception("Couldn't Delete Data. Please try again", 1);
                        }

                        if (file_exists($filepath)) {
                            unlink($filepath . '/' . $image->image);
                        } else {
                            throw new Exception("Couldn't Delete Data. Please try again", 1);
                        }
                    }
                }

                // Delete related videos
                if ($postInstance->video) {
                    foreach ($postInstance->videos as $video) {
                        if (!$video->delete()) {
                            throw new Exception("Couldn't Delete Data. Please try again", 1);
                        }
                    }
                }

                // Delete related teamCategory
                if ($postInstance->teamCategory) {
                    if (!$postInstance->delete()) {
                        throw new Exception("Couldn't Delete Data. Please try again", 1);
                    }
                }

                //delete relation -end


                // Delete the main Gallery instance
                if ($postInstance->image) {
                    if (file_exists($filepath . '/' . $postInstance->image)) {
                        unlink($filepath . '/' . $postInstance->image);
                    }
                }

                if (!$postInstance->delete()) {
                    throw new Exception("Couldn't Delete Data. Please try again", 1);
                }
            } else {
                if (!$class::where(['id' => $post['id']])->update(['status' => 'N', 'updated_at' => Carbon::now()])) {
                    throw new Exception("Couldn't Delete Data. Please try again", 1);
                }
            }
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function deleteDataFileDoesnotExists($post, $class)
    {
        try {
            if ($post['type'] === "trashed") {
                $postInstance =  $class->findOrFail($post['id']);
                if (!$postInstance->delete()) {
                    throw new Exception("Couldn't Delete Data. Please try again", 1);
                }
            } else {
                if (!$class::where(['id' => $post['id']])->update(['status' => 'N', 'updated_at' => Carbon::now()])) {
                    throw new Exception("Couldn't Delete Data. Please try again", 1);
                }
            }
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
    



}
