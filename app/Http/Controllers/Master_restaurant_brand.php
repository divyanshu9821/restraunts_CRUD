<?php

namespace App\Http\Controllers;

use App\Models\Model_master_restaurant_brand;
use Illuminate\Http\Request;
use Exception;
use Response;

class Master_restaurant_brand extends Controller
{










    private function check_id_input()
    {

        $id = request()->input('id');

        if (empty($id)) {

            $response = [
                'status' => 'Error!',
                'data' => 'ID not passed'
            ];

            return Response::json($response);
        }

        return $id;

    }










    public function create(Request $request)
    {


        $name = $request->input('name');
        $logo = $request->input('logo');

        if ($name)
            $insertion_data['name'] = $name;
        if ($logo)
            $insertion_data['logo'] = $logo;

        try {

            $inserted = Model_master_restaurant_brand::create($insertion_data);

            if ($inserted) {

                $response = [
                    'status' => 'success',
                    'data' => 'Data inserted successfully'
                ];

            } else {

                $response = [
                    'status' => 'error',
                    'data' => 'Data not inserted'
                ];

            }

        } catch (Exception $ex) {

            $response = [
                'status' => 'failure',
                'data' => $ex->getMessage()
            ];

        }

        return Response::json($response);
    }










    public function read($id = 0)
    {

        $restaurant_brand = Model_master_restaurant_brand::select('*');

        if ($id) {
            $restaurant_brand->where('id', '=', $id);
        }

        $response = [
            'status' => 'success',
            'data' => $restaurant_brand->get()
        ];

        return Response::json($response);
    }










    public function update(Request $request)
    {

        $id = $this->check_id_input();

        $name = $request->input('name');
        $logo = $request->input('logo');
        $active = $request->input('active');

        if ($name)
            $updation_data['name'] = $name;
        if ($logo)
            $updation_data['logo'] = $logo;
        if ($active)
            $updation_data['active'] = $active;


        $restaurant_brand_obj = Model_master_restaurant_brand::withTrashed()->find($id);

        if ($restaurant_brand_obj && $active !== null) {
            if ($active == 0) {
                $restaurant_brand_obj->delete();
            } else {
                $restaurant_brand_obj->restore();
            }
        }

        try {
            $restaurant_brand_obj->update($updation_data);

            $response = [
                'status' => 'success',
                'data' => 'Data update Successfully'
            ];
        } catch (Exception $ex) {

            $response = [
                'status' => 'failure',
                'data' => $ex->getMessage()
            ];
        }

        return Response::json($response);
    }










    public function delete()
    {

        $id = $this->check_id_input();

        $restaurant_brand_obj = Model_master_restaurant_brand::find($id);

        if ($restaurant_brand_obj) {

            $restaurant_brand_obj->delete();

            $response = [
                'status' => 'success',
                'data' => 'Data deleted successfully'
            ];

        } else {

            $response = [
                'status' => 'failure',
                'data' => 'Error! Not found'
            ];

        }

        return Response::json($response);

    }










}
