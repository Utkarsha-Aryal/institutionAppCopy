<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Common;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Exception;

class TeamMember extends Model
{
    use HasFactory;

    public function teamCategory()
    {
        return $this->belongsTo(TeamCategory::class,);
    }

    // save
    public static function saveData($post)
    {
        try {
            $dataArray = [
                'name' => $post['name'],
                'slug' =>  Str::slug($post['name']) . '-' . time(),
                'team_category_id' => $post['category'],
                'order' => $post['order'],
                'designation' => $post['designation'],
                'facebook_url' => $post['facebook_url'],
                'instagram_url' => $post['instagram_url'],
                'linkedin_url' => $post['linkedin_url'],
                'twitter_url' => $post['twitter_url'],
                'short_bio' => $post['short_bio'],
                'phone_number' => $post['phone_number'],

            ];

            if (!empty($post['croppedImg'])) {

                $fileName =  Common::uploadCroppedImage('community', $post['croppedImg']);
                if (!$fileName) {
                    return false;
                }
                $dataArray['photo'] = $fileName;
            } else {

                if (!empty($post['photo'])) {
                    $fileName =  Common::uploadFile('community', $post['photo']);
                    if (!$fileName) {
                        return false;
                    }
                    $dataArray['photo'] = $fileName;
                }
            }

            if (!empty($post['id'])) {
                $dataArray['updated_at'] = Carbon::now();
                if (!TeamMember::where('id', $post['id'])->update($dataArray)) {
                    throw new Exception("Couldn't update Records", 1);
                }
            } else {
                $dataArray['created_at'] = Carbon::now();
                if (!TeamMember::insert($dataArray)) {
                    throw new Exception("Couldn't Save Records", 1);
                }
            }

            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }


    // List
    public static function list($post)
    {
        try {
            $get = $post;
            foreach ($get['columns'] as $key => $value) {
                $get['columns'][$key]['search']['value'] = trim(strtolower(htmlspecialchars($value['search']['value'], ENT_QUOTES)));
            }
            $cond = "status = 'Y'";

            if (!empty($post['type']) && $post['type'] === "trashed") {
                $cond = " status = 'N'";
            }

            if ($get['columns'][1]['search']['value'])
                $cond .= " and lower(name) like '%" . $get['columns'][1]['search']['value'] . "%'";

            if ($get['columns'][2]['search']['value'])
                $cond .= " and lower(phone_number) like '%" . $get['columns'][2]['search']['value'] . "%'";
            if ($get['columns'][3]['search']['value'])
                $cond .= " and lower(member_order) like '%" . $get['columns'][3]['search']['value'] . "%'";

            if ($get['columns'][4]['search']['value'])
                $cond .= " and lower(member_type) like '%" . $get['columns'][4]['search']['value'] . "%'";

            $limit = 15;
            $offset = 0;
            if (!empty($get["length"]) && $get["length"]) {
                $limit = $get['length'];
                $offset = $get["start"];
            }

            // $query = TeamMember::selectRaw("count(*) OVER() AS totalrecs, name,`order`,id as id, designation,facebook_url,instagram_url,linkedin_url,twitter_url,short_bio,phone_number,photo")
            //     ->whereRaw($cond);

            // $query = TeamMember::with('teamCategory')->where('status', 'Y')->orderBy('id', 'DESC')->limit(2)->get();
            $query = TeamMember::with('teamCategory')
                ->whereRaw($cond);

            if ($limit > -1) {
                $result = $query->orderBy('order', 'asc')->offset($offset)->limit($limit)->get();
            } else {
                $result = $query->orderBy('order', 'asc')->get();
            }
            if ($result) {
                $ndata = $result;
                $ndata['totalrecs'] = @$result[0]->totalrecs ? $result[0]->totalrecs : 0;
                $ndata['totalfilteredrecs'] = @$result[0]->totalrecs ? $result[0]->totalrecs : 0;
            } else {
                $ndata = array();
            }
            return $ndata;
        } catch (Exception $e) {
            throw $e;
        }
}

}
