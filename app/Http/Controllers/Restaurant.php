<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use app\Models\Model_restaurants;
use Exception;

class Restaurant extends Controller
{
    //









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

        $master_restaurant_brand_id = $request->input('master_restaurant_brand_id');
        $address = $request->input('address');
        $master_city_state_id = $request->input('master_city_state_id');
        $rating = $request->input('rating');
        $deal_amount = $request->input('deal_amount');
        $deal_options = $request->input('deal_options');
        $bought_count = $request->input('bought_count');


        if ($master_restaurant_brand_id)
            $insertion_data['master_restaurant_brand_id'] = $master_restaurant_brand_id;
        if ($address)
            $insertion_data['address'] = $address;
        if ($master_city_state_id)
            $insertion_data['master_city_state_id'] = $master_city_state_id;
        if ($rating)
            $insertion_data['rating'] = $rating;
        if ($deal_amount)
            $insertion_data['deal_amount'] = $deal_amount;
        if ($deal_options)
            $insertion_data['deal_options'] = $deal_options;
        if ($bought_count)
            $insertion_data['bought_count'] = $bought_count;


        try {

            $inserted = Model_restaurants::create($insertion_data);

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

        $restaurants = Model_restaurants::select('*');

        if ($id) {
            $restaurants->where('id', '=', $id);
        }

        $response = [
            'status' => 'success',
            'data' => $restaurants->get()
        ];

        return Response::json($response);
    }










    public function update(Request $request)
    {

        $id = $this->check_id_input();

        $master_restaurant_brand_id = $request->input('master_restaurant_brand_id');
        $address = $request->input('address');
        $master_city_state_id = $request->input('master_city_state_id');
        $rating = $request->input('rating');
        $deal_amount = $request->input('deal_amount');
        $deal_options = $request->input('deal_options');
        $bought_count = $request->input('bought_count');
        $active = $request->input('active');

        if ($master_restaurant_brand_id)
            $updation_data['master_restaurant_brand_id'] = $master_restaurant_brand_id;
        if ($address)
            $updation_data['address'] = $address;
        if ($master_city_state_id)
            $updation_data['master_city_state_id'] = $master_city_state_id;
        if ($rating)
            $updation_data['rating'] = $rating;
        if ($deal_amount)
            $updation_data['deal_amount'] = $deal_amount;
        if ($deal_options)
            $updation_data['deal_options'] = $deal_options;
        if ($bought_count)
            $updation_data['bought_count'] = $bought_count;

        $restaurants_model_obj = Model_restaurants::withTrashed()->find($id);

        if ($restaurants_model_obj && $active !== null) {
            if ($active == 0) {
                $restaurants_model_obj->delete();
            } else {
                $restaurants_model_obj->restore();
            }
        }

        try {
            $restaurants_model_obj->update($updation_data);

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

        $restaurants_model_obj = Model_restaurants::find($id);

        if ($restaurants_model_obj) {

            $restaurants_model_obj->delete();

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
