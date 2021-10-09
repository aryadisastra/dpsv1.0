<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Menu;

class AddDataToTableMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $array = array(
        
            [
                'name' => 'Dashboard',
                'link' => '/dashboard',
                'status' => '1',
                'icon' => 'dashboard',
                'current' => 'dashboard',
                'rec_creator' => 'arya',
                'rec_editor' => 'arya'
            ],
            [
                'name' => 'Request',
                'link' => '/request',
                'status' => '1',
                'icon' => 'list',
                'current' => 'request',
                'rec_creator' => 'arya',
                'rec_editor' => 'arya'
            ],
            [
                'name' => 'Inventories',
                'link' => '/inventories',
                'status' => '1',
                'icon' => 'inventory',
                'current' => 'inventories',
                'rec_creator' => 'arya',
                'rec_editor' => 'arya'
            ],
            [
                'name' => 'User Management',
                'link' => '/user-management',
                'status' => '1',
                'icon' => 'person',
                'current' => 'user-management',
                'rec_creator' => 'arya',
                'rec_editor' => 'arya'
            ]
        );

        foreach($array as $key => $data)
        {
            $add = new Menu();
            $add->name = $data['name'];
            $add->link = $data['link'];
            $add->status = $data['status'];
            $add->icon = $data['icon'];
            $add->current = $data['current'];
            $add->rec_creator = $data['rec_creator'];
            $add->rec_editor = $data['rec_editor'];
            $add->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
