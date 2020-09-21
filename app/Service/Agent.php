<?php

namespace App\Service ;

use Illuminate\Support\Str;



class Agent
{
    public static function  searchByMatricule (string $matricule) :array
    {
        return collect(self::agents())->filter(function ($agents) use ($matricule){
            return Str::contains($agents['matricule'],$matricule);
        })->all();


    }
    public static function agents() :array
    {
        return [
            [
                'matricule'=> "agents",
                'id'=> "agents",
               'title'=> "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
                'body'=> "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
              ],
              [
                'matricule'=> "agents",
                'id'=> 2,
               'title'=> "qui est esse",
                'body'=> "est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla"
            ],
              [
                'matricule'=> "agents",
                'id'=> 3,
               'title'=> "ea molestias quasi exercitationem repellat qui ipsa sit aut",
                'body'=> "et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut"
            ],
              [
                'matricule'=> "agents",
                'id'=> 4,
               'title'=> "eum et est occaecati",
                'body'=> "ullam et saepe reiciendis voluptatem adipisci\nsit amet autem assumenda provident rerum culpa\nquis hic commodi nesciunt rem tenetur doloremque ipsam iure\nquis sunt voluptatem rerum illo velit"
            ],
              [
                'matricule'=> "agents",
                'id'=> 5,
               'title'=> "nesciunt quas odio",
                'body'=> "repudiandae veniam quaerat sunt sed\nalias aut fugiat sit autem sed est\nvoluptatem omnis possimus esse voluptatibus quis\nest aut tenetur dolor neque"
            ],
              [
                'matricule'=> "agents",
                'id'=> 6,
               'title'=> "dolorem eum magni eos aperiam quia",
                'body'=> "ut aspernatur corporis harum nihil quis provident sequi\nmollitia nobis aliquid molestiae\nperspiciatis et ea nemo ab reprehenderit accusantium quas\nvoluptate dolores velit et doloremque molestiae"
            ],
              [
                'matricule'=> "agents",
                'id'=> 7,
               'title'=> "magnam facilis autem",
                'body'=> "dolore placeat quibusdam ea quo vitae\nmagni quis enim qui quis quo nemo aut saepe\nquidem repellat excepturi ut quia\nsunt ut sequi eos ea sed quas"
            ],
              [
                'matricule'=> "agents",
                'id'=> 8,
               'title'=> "dolorem dolore est ipsam",
                'body'=> "dignissimos aperiam dolorem qui eum\nfacilis quibusdam animi sint suscipit qui sint possimus cum\nquaerat magni maiores excepturi\nipsam ut commodi dolor voluptatum modi aut vitae"
            ],
              [
                'matricule'=> "agents",
                'id'=> 9,
               'title'=> "nesciunt iure omnis dolorem tempora et accusantium",
                'body'=> "consectetur animi nesciunt iure dolore\nenim quia ad\nveniam autem ut quam aut nobis\net est aut quod aut provident voluptas autem voluptas"
            ],
              [
                'matricule'=> "agents",
                'id'=> "agents",
               'title'=> "optio molestias id quia eum",
                'body'=> "quo et expedita modi cum officia vel magni\ndoloribus qui repudiandae\nvero nisi sit\nquos veniam quod sed accusamus veritatis error"
            ],
              [
                'matricule'=> 2,
                'id'=> "agents",
               'title'=> "et ea vero quia laudantium autem",
                'body'=> "delectus reiciendis molestiae occaecati non minima eveniet qui voluptatibus\naccusamus in eum beatae sit\nvel qui neque voluptates ut commodi qui incidunt\nut animi commodi"
            ],
              [
                'matricule'=> 2,
                'id'=> "agents",
               'title'=> "in quibusdam tempore odit est dolorem",
                'body'=> "itaque id aut magnam\npraesentium quia et ea odit et ea voluptas et\nsapiente quia nihil amet "
            ]

              ];
    }
}
