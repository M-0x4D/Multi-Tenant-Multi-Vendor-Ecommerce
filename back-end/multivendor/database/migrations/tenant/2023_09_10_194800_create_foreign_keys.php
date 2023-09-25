<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration
{

    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('offers', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('shipping_governrate', function (Blueprint $table) {
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('shipping_governrate', function (Blueprint $table) {
            $table->foreign('governrate_id')->references('id')->on('governrates')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('shipping_addresses', function (Blueprint $table) {
            $table->foreign('rememberToken')->references('id')->on('governrates')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('shipping_addresses', function (Blueprint $table) {
            $table->foreign('governrate_id')->references('id')->on('governrates')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });


        Schema::table('order_product', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('order_product', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('product_cart', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('product_cart', function (Blueprint $table) {
            $table->foreign('cart_id')->references('id')->on('cart')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });


        Schema::table('favourite_user', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('favourite_user', function (Blueprint $table) {
            $table->foreign('favourite_id')->references('id')->on('favourites')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('favourite_user', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('product_size', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

        Schema::table('product_size', function (Blueprint $table) {
            $table->foreign('size_id')->references('id')->on('sizes')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });


        Schema::table('profiles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });


    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign('images_product_id_foreign');
        });
        Schema::table('offers', function (Blueprint $table) {
            $table->dropForeign('offers_category_id_foreign');
        });
        Schema::table('offers', function (Blueprint $table) {
            $table->dropForeign('offers_product_id_foreign');
        });
        Schema::table('shipping_governrate', function (Blueprint $table) {
            $table->dropForeign('shipping_governrate_shipping_method_id_foreign');
        });
        Schema::table('shipping_governrate', function (Blueprint $table) {
            $table->dropForeign('shipping_governrate_governrate_id_foreign');
        });
        Schema::table('shipping_addresses', function (Blueprint $table) {
            $table->dropForeign('shipping_addresses_rememberToken_foreign');
        });
        Schema::table('shipping_addresses', function (Blueprint $table) {
            $table->dropForeign('shipping_addresses_governrate_id_foreign');
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign('profiles_user_id_foreign');
        });
    }
}
