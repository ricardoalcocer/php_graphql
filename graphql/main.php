<?php
    /*
    This is the main GraphQL Entry Point.  This is whare data comes in from the browser and passed over to the GraphQL Server
    */

    use GraphQL\GraphQL;
    use GraphQL\Type\Schema;

    require('objects.php');
    require('query.php');
    require('mutation.php');

    $schema = new Schema([
        'query'     => $rootQuery,
        'mutation'  => $rootMutation
    ]);

    try{
        $rawIn  = file_get_contents('php://input');
        $in     = json_decode($rawIn, true);
        $query  = $in['query'];
        $result = GraphQL::executeQuery($schema, $query);
        $output = $result->toArray();
    }catch(\Exception $e){
        $output = [
            'error' => [
                'message' => $e->getMessage()
            ]
        ];
    }

    Header('Content-Type: application/json');
    echo json_encode($output);