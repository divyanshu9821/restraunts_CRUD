<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Model_master_location;
use Response;

class Master_location extends Controller
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

        $city = $request->input('city');
        $state = $request->input('state');

        if ($city)
            $insertion_data['city'] = $city;
        if ($state)
            $insertion_data['state'] = $state;

        try {

            $inserted = Model_master_location::create($insertion_data);

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

        $city_state = Model_master_location::select('*');

        if ($id) {
            $city_state->where('id', '=', $id);
        }

        $response = [
            'status' => 'success',
            'data' => $city_state->get()
        ];

        return Response::json($response);
    }










    public function update(Request $request)
    {

        $id = $this->check_id_input();

        $city = $request->input('city');
        $state = $request->input('state');
        $active = $request->input('active');

        if ($city)
            $updation_data['city'] = $city;
        if ($state)
            $updation_data['state'] = $state;

        $location_model_obj = Model_master_location::withTrashed()->find($id);

        if ($location_model_obj && $active !== null) {
            if ($active == 0) {
                $location_model_obj->delete();
            } else {
                $location_model_obj->restore();
            }
        }

        try {
            $location_model_obj->update($updation_data);

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

        $location_model_obj = Model_master_location::find($id);

        if ($location_model_obj) {

            $location_model_obj->delete();

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
