<?php

$app->post('/api/Ghost/getTag', function ($request, $response) {


    $option = array(
        "accessToken" => "access_token",
        "blogUrl" => "blogUrl",
        "includeCountPosts" => "include",
        "tagId" => "tagId"
    );
    $arrayType = array();

    $url = '/ghost/api/v0.1/tags/';
    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['accessToken','blogUrl','tagId']);
    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $postData = $validateRes;
    }



    //Change alias and formatted array
    foreach($option as $alias => $value)
    {

        if(!empty($postData['args'][$alias]))
        {

            if(isset($arrayType[$alias]))
            {
                $postData['args'][$alias] = implode($arrayType[$alias],$postData['args'][$alias]);
            }

            $queryParam[$value] = $postData['args'][$alias];
        }
    }




    $client = $this->httpClient;
    $blogUrl = $queryParam['blogUrl'];
    $url = $blogUrl.$url;
    unset($queryParam['blogUrl']);
    $url .= $queryParam['tagId'];
    unset($queryParam['tagId']);

    if(!empty($queryParam['include']) && $queryParam['include'] == 'Yes')
    {
        $queryParam['include'] = 'count.posts';
    }


    try {

        $resp =  $client->request('GET', $url ,['query' => $queryParam] );



        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {

            $dataBody = $resp->getBody()->getContents();

            $result['callback'] = 'success';
            $result['contextWrites']['to'] = array('result' => json_decode($dataBody) );




        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = $resp->getBody()->getContents();
        }
    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;
    } catch (GuzzleHttp\Exception\ServerException $exception) {
        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;
    } catch (GuzzleHttp\Exception\ConnectException $exception) {
        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';
    }
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);





});